<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$envouser -> envoModuleAccess(ENVO_USERID, ENVO_ACCESSREGISTER_FORM)) envo_redirect(BASE_URL);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/register_form/admin/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/register_form/admin/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'registeroptions';
$envotable1 = DB_PREFIX . 'user';
$envotable2 = DB_PREFIX . 'pagesgrid';
$envotable3 = DB_PREFIX . 'pluginhooks';

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'settings':
    // REGISTER FORM SETTING

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      /* EN: Convert value
       * smartsql - secure method to insert form data into a MySQL DB
       * ------------------
       * CZ: Převod hodnot
       * smartsql - secure method to insert form data into a MySQL DB
      */
      $result = $envodb -> query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
                  WHEN "rf_title" THEN "' . smartsql($defaults['envo_title']) . '"
                  WHEN "rf_active" THEN ' . $defaults['envo_register'] . '
                  WHEN "rf_simple" THEN ' . $defaults['envo_simple'] . '
                  WHEN "rf_confirm" THEN "' . smartsql($defaults['envo_usrapprove']) . '"
                  WHEN "rf_redirect" THEN ' . $defaults['envo_redirect'] . '
                  WHEN "rf_usergroup" THEN ' . $defaults['envo_usergroup'] . '
                  WHEN "rf_welcome" THEN "' . smartsql($defaults['envo_lcontent']) . '"
                  WHEN "rf_welcome_email" THEN "' . smartsql($defaults['envo_lcontent1']) . '"
                END
                  WHERE varname IN ("rf_title", "rf_active", "rf_simple", "rf_confirm", "rf_redirect", "rf_usergroup", "rf_welcome", "rf_welcome_email")');

      // Save order for sidebar widget
      if (isset($defaults['envo_hookshow_new']) && is_array($defaults['envo_hookshow_new'])) {

        $exorder = $defaults['horder_new'];
        $hookid  = $defaults['real_hook_id_new'];
        $plugind = $defaults['sreal_plugin_id_new'];
        $doith   = array_combine($hookid, $exorder);
        $pdoith  = array_combine($hookid, $plugind);

        foreach ($doith as $key => $exorder) {

          if (in_array($key, $defaults['envo_hookshow_new'])) {

            // Get the real what id
            $whatid = 0;
            if (isset($defaults['whatid_' . $pdoith[$key]])) $whatid = $defaults['whatid_' . $pdoith[$key]];

            $envodb -> query('INSERT INTO ' . $envotable2 . ' SET plugin = ' . ENVO_PLUGIN_REGISTER_FORM . ', hookid = "' . smartsql($key) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", orderid = "' . smartsql($exorder) . '"');

          }

        }

      }

      // Now check if all the sidebar a deselct and hooks exist, if so delete all associated to this page
      if (!isset($defaults['envo_hookshow_new']) && !isset($defaults['envo_hookshow'])) {

        // Now check if all the sidebar a deselected and hooks exist, if so delete all associated to this page
        $row = $envodb -> queryRow('SELECT id FROM ' . $envotable2 . ' WHERE plugin = ' . smartsql(ENVO_PLUGIN_REGISTER_FORM) . ' AND hookid != 0');

        // We have something to delete
        if ($row["id"]) {
          $envodb -> query('DELETE FROM ' . $envotable2 . ' WHERE plugin = ' . smartsql(ENVO_PLUGIN_REGISTER_FORM) . ' AND hookid != 0');
        }

      }

      // Save order or delete for extra sidebar widget
      if (isset($defaults['envo_hookshow']) && is_array($defaults['envo_hookshow'])) {

        $exorder    = $defaults['horder'];
        $hookid     = $defaults['real_hook_id'];
        $hookrealid = implode(',', $defaults['real_hook_id']);
        $doith      = array_combine($hookid, $exorder);

        foreach ($doith as $key => $exorder) {

          // Get the real what id
          $result = $envodb -> query('SELECT pluginid FROM ' . $envotable2 . ' WHERE id = "' . smartsql($key) . '" AND hookid != 0');
          $row    = $result -> fetch_assoc();

          $whatid = 0;
          if (isset($defaults['whatid_' . $row["pluginid"]])) $whatid = $defaults['whatid_' . $row["pluginid"]];

          if (in_array($key, $defaults['envo_hookshow'])) {
            $updatesql  .= sprintf("WHEN %d THEN %d ", $key, $exorder);
            $updatesql1 .= sprintf("WHEN %d THEN %d ", $key, $whatid);

          } else {
            $envodb -> query('DELETE FROM ' . $envotable2 . ' WHERE id = ' . $key);
          }
        }

        $envodb -> query('UPDATE ' . $envotable2 . ' SET orderid = CASE id
				' . $updatesql . '
				END
				WHERE id IN (' . $hookrealid . ')');

        $envodb -> query('UPDATE ' . $envotable2 . ' SET whatid = CASE id
				' . $updatesql1 . '
				END
				WHERE id IN (' . $hookrealid . ')');

      }

      if (!$result) {
        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL . 'index.php?p=register-form&sp=settings&status=e');
      } else {
        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL . 'index.php?p=register-form&sp=settings&status=s');
      }

    }

    // Get the sort orders for the grid
    $grid = $envodb -> query('SELECT id, hookid, whatid, orderid FROM ' . $envotable2 . ' WHERE plugin = ' . ENVO_PLUGIN_REGISTER_FORM . ' ORDER BY orderid ASC');
    while ($grow = $grid -> fetch_assoc()) {
      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $ENVO_PAGE_GRID[] = $grow;
    }

    // Get the sidebar templates
    $result = $envodb -> query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable3 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
    while ($row = $result -> fetch_assoc()) {
      $ENVO_HOOKS[] = $row;
    }

    $ENVO_USERGROUP_ALL = envo_get_usergroup_all('usergroup');

    // EN: Import important settings for the template from the DB
    // CZ: Importuj důležité nastavení pro šablonu z DB
    $ENVO_SETTING = envo_get_setting('register_form');

    // EN: Import important settings for the template from the DB (only VALUE)
    // CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
    $ENVO_SETTING_VAL = envo_get_setting_val('register_form');


    $ENVO_CAT = envo_get_cat_info(DB_PREFIX . 'categories', 0);

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlrf["reg_sec_title"]["regt1"];
    $SECTION_DESC  = "";

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'settings.php';

    break;
  default:
    // MAIN PAGE OF PLUGIN

    // ----------- ERROR: REDIRECT PAGE ------------
    // -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

    // EN: If not exist value in 'case', redirect page to 404
    // CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
    $pagearray = array ( 'settings' );
    if (!empty($page1) && !is_numeric($page1)) {
      if (in_array($page1, $pagearray)) {
        envo_redirect(ENVO_rewrite ::envoParseurl('404', '', '', '', ''));
      }
    }

    // ----------- SUCCESS: CODE FOR MAIN PAGE ------------
    // -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      // Write new options
      $countoption = $defaults['envo_option'];

      for ($u = 0; $u < count($countoption); $u++) {
        $name = $countoption[$u];

        if (!empty($name)) {

          $sqloptions = '';
          if (!empty($defaults['envo_options'][$u]) && $defaults['envo_optiontype'][$u] >= 3) {
            $sqloptions = smartsql(trim($defaults['envo_options'][$u]));
          }

          if ($defaults['envo_optiontype'][$u] >= 3 && $defaults['envo_optionmandatory'][$u] > 0) {
            $sqlmand = 1;
          } else {
            $sqlmand = $defaults['envo_optionmandatory'][$u];
          }

          $envodb -> query('INSERT INTO ' . $envotable . ' SET
		   	       name = "' . smartsql($name) . '",
		   	       typeid = "' . smartsql($defaults['envo_optiontype'][$u]) . '",
		   	       options = "' . $sqloptions . '",
		   	       showregister = 1,
		   	       mandatory = "' . smartsql($sqlmand) . '",
		   	       forder = "' . smartsql($defaults['envo_optionsort'][$u]) . '"');

          $rowid = $envodb -> envo_last_id();

          // Insert a new field into user table, so the option will be available
          $envodb -> query('ALTER TABLE ' . $envotable1 . ' ADD ' . strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $name)) . '_' . $rowid . ' VARCHAR(100) NULL AFTER picture');

        }
      }

      // Delete the options
      if (!empty($defaults['envo_sod'])) {
        $odel = $defaults['envo_sod'];

        for ($i = 0; $i < count($odel); $i++) {
          $optiondel = $odel[$i];

          $result = $envodb -> query('SELECT name FROM ' . $envotable . ' WHERE id = ' . $optiondel);
          while ($row = $result -> fetch_assoc()) {

            // Delete the user table option
            if ($optiondel > 3) {
              $envodb -> query('ALTER TABLE ' . $envotable1 . ' DROP ' . strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $row['name'])) . '_' . $optiondel);
            }

          }

          // Now finally delete the option
          $envodb -> query('DELETE FROM ' . $envotable . ' WHERE id = ' . $optiondel);

        }
      }

      // Edit options
      $countoption_old = $defaults['envo_option_old'];

      for ($i = 0; $i < count($countoption_old); $i++) {
        $name_old = $countoption_old[$i];

        if ($defaults['envo_optiontype_old'][$i] >= 3 && $defaults['envo_optionmandatory_old'][$i] > 0) {
          $sqlmand = 1;
        } else {
          $sqlmand = $defaults['envo_optionmandatory_old'][$i];
        }

        // Do we show the fields in the register form
        $showregister = 0;
        if ($defaults['envo_showregister'][$i] == 1) $showregister = 1;

        // Username, email and password we show always
        if ($defaults['envo_optionid'][$i] <= 3) $showregister = 1;

        /* EN: Convert value
         * smartsql - secure method to insert form data into a MySQL DB
         * ------------------
         * CZ: Převod hodnot
         * smartsql - secure method to insert form data into a MySQL DB
        */
        $result = $envodb -> query('UPDATE ' . $envotable . ' SET
                  name = "' . smartsql(trim($name_old)) . '",
                  typeid = "' . smartsql($defaults['envo_optiontype_old'][$i]) . '",
                  options = "' . smartsql(trim($defaults['envo_options_old'][$i])) . '",
                  showregister = "' . smartsql($showregister) . '",
                  mandatory = "' . smartsql($sqlmand) . '",
                  forder = "' . smartsql($defaults['envo_optionsort_old'][$i]) . '"
                  WHERE id = "' . smartsql($defaults['envo_optionid'][$i]) . '"');

        if ($result && $defaults['envo_optionid'][$i] > 3 && $defaults['envo_option_name_old'][$i] != $name_old) {

          $envodb -> query('ALTER TABLE ' . $envotable1 . ' DROP ' . strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $defaults['envo_option_name_old'][$i])) . '_' . $defaults['envo_optionid'][$i]);

          if ($defaults['envo_optiontype_old'][$i] == 2) {

            $envodb -> query('ALTER TABLE ' . $envotable1 . ' ADD ' . strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $name_old)) . '_' . $defaults['envo_optionid'][$i] . ' VARCHAR(100) NULL AFTER picture');

          } else {
            $envodb -> query('ALTER TABLE ' . $envotable1 . ' ADD ' . strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $name_old)) . '_' . $defaults['envo_optionid'][$i] . ' VARCHAR(100) NULL AFTER picture');
          }


        }
      }

      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=register-form&status=s');
    }

    // Get contact options
    $result = $envodb -> query('SELECT * FROM ' . $envotable . ' ORDER BY forder ASC');
    while ($row = $result -> fetch_assoc()) {
      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $ENVO_REGISTEROPTION_ALL[] = $row;
    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlrf["reg_sec_title"]["regt"];
    $SECTION_DESC  = $tlrf["reg_sec_desc"]["regd"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'rfcreate.php';
}

?>