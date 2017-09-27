<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$JAK_MODULES) envo_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'pagesgrid';
$envotable2 = DB_PREFIX . 'pluginhooks';

// EN: Import important settings for the template from the DB
// CZ: Importuj důležité nastavení pro šablonu z DB
$JAK_SETTING = envo_get_setting('sitemap');

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$JAK_SETTING_VAL = envo_get_setting_val('sitemap');

// Let's go on with the script
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
  $result = $envodb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
              WHEN "sitemaptitle" THEN "' . smartsql($defaults['jak_title']) . '"
              WHEN "sitemapdesc" THEN "' . smartsql($defaults['jak_lcontent']) . '"
            END
            WHERE varname IN ("sitemaptitle", "sitemapdesc")');

  // Save order for sidebar widget
  if (isset($defaults['jak_hookshow_new']) && is_array($defaults['jak_hookshow_new'])) {

    $exorder = $defaults['horder_new'];
    $hookid  = $defaults['real_hook_id_new'];
    $plugind = $defaults['sreal_plugin_id_new'];
    $doith   = array_combine($hookid, $exorder);
    $pdoith  = array_combine($hookid, $plugind);

    foreach ($doith as $key => $exorder) {

      if (in_array($key, $defaults['jak_hookshow_new'])) {

        // Get the real what id
        $whatid = 0;
        if (isset($defaults['whatid_' . $pdoith[$key]])) $whatid = $defaults['whatid_' . $pdoith[$key]];

        $envodb->query('INSERT INTO ' . $envotable . ' SET plugin = 2, hookid = "' . smartsql($key) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", orderid = "' . smartsql($exorder) . '"');

      }

    }

  }

  // Now check if all the sidebar a deselct and hooks exist, if so delete all associated to this page
  if (!isset($defaults['jak_hookshow_new']) && !isset($defaults['jak_hookshow'])) {

    // Now check if all the sidebar a deselected and hooks exist, if so delete all associated to this page
    $row = $envodb->queryRow('SELECT id FROM ' . $envotable . ' WHERE plugin = 2 AND hookid != 0');

    // We have something to delete
    if ($row["id"]) {
      $envodb->query('DELETE FROM ' . $envotable . ' WHERE plugin = 2 AND hookid != 0');
    }

  }

  // Save order or delete for extra sidebar widget
  if (isset($defaults['jak_hookshow']) && is_array($defaults['jak_hookshow'])) {

    $exorder    = $defaults['horder'];
    $hookid     = $defaults['real_hook_id'];
    $hookrealid = implode(',', $defaults['real_hook_id']);
    $doith      = array_combine($hookid, $exorder);

    foreach ($doith as $key => $exorder) {

      // Get the real what id
      $result = $envodb->query('SELECT pluginid FROM ' . $envotable . ' WHERE id = "' . smartsql($key) . '" AND hookid != 0');
      $row    = $result->fetch_assoc();

      $whatid = 0;
      if (isset($defaults['whatid_' . $row["pluginid"]])) $whatid = $defaults['whatid_' . $row["pluginid"]];

      if (in_array($key, $defaults['jak_hookshow'])) {
        $updatesql .= sprintf("WHEN %d THEN %d ", $key, $exorder);
        $updatesql1 .= sprintf("WHEN %d THEN %d ", $key, $whatid);

      } else {
        $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = ' . $key);
      }
    }

    $envodb->query('UPDATE ' . $envotable . ' SET orderid = CASE id
			' . $updatesql . '
			END
			WHERE id IN (' . $hookrealid . ')');

    $envodb->query('UPDATE ' . $envotable . ' SET whatid = CASE id
			' . $updatesql1 . '
			END
			WHERE id IN (' . $hookrealid . ')');

  }

  if (!$result) {
    // EN: Redirect page
    // CZ: Přesměrování stránky
    envo_redirect(BASE_URL . 'index.php?p=sitemap&status=e');
  } else {
    // EN: Redirect page
    // CZ: Přesměrování stránky
    envo_redirect(BASE_URL . 'index.php?p=sitemap&status=s');
  }
}

// Get the sort orders for the grid
$grid = $envodb->query('SELECT id, hookid, whatid, orderid FROM ' . $envotable . ' WHERE plugin = 2 ORDER BY orderid ASC');
while ($grow = $grid->fetch_assoc()) {
  // EN: Insert each record into array
  // CZ: Vložení získaných dat do pole
  $JAK_PAGE_GRID[] = $grow;
}

// Get the sidebar templates
$result = $envodb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable2 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
while ($row = $result->fetch_assoc()) {
  $JAK_HOOKS[] = $row;
}

// EN: Get all the php Hook by name of Hook
// CZ: Načtení všech php dat z Hook podle jména Hook
$ENVO_FORM_DATA = array();
$hookpagei     = $envohooks->EnvoGethook("php_admin_pages_news_info");
if ($hookpagei) {
  foreach ($hookpagei as $hpagi) {
    eval($hpagi['phpcode']);
  }
}

// EN: Title and Description
// CZ: Titulek a Popis
$SECTION_TITLE = $tl["sm_sec_title"]["smt"];
$SECTION_DESC  = $tl["sm_sec_desc"]["smd"];

// EN: Load the php template
// CZ: Načtení php template (šablony)
$template = 'sitemapsetting.php';

?>