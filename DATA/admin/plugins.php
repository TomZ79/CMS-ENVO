<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_SUPERADMINACCESS) envo_redirect(BASE_URL_ORIG);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'categories';
$envotable1 = DB_PREFIX . 'plugins';
$envotable2 = DB_PREFIX . 'pluginhooks';

// Get all the Hooks
$envohooks = new ENVO_hooks('', '');

// EN: Import important settings for the template from the DB
// CZ: Importuj důležité nastavení pro šablonu z DB
$ENVO_SETTING = envo_get_setting('module');

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$ENVO_SETTING_VAL = envo_get_setting_val('module');

// Get all the hooks out the class file
$ENVO_HOOK_LOCATIONS = ENVO_hooks::EnvoAllhooks();

// Clear Session
$_SESSION['acemode'] = '';

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'hooks':
    // HOOKS

    switch ($page2) {
      case 'newhook':
        // ADD NEW HOOK TO DB

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (empty($defaults['envo_name'])) {
            $errors['e1'] = $tl['hook_error']['hookerror1'] . '<br>';
          }

          if (empty($defaults['envo_hook'])) {
            $errors['e2'] = $tl['hook_error']['hookerror2'] . '<br>';
          }

          if (!is_numeric($defaults['envo_exorder'])) {
            $errors['e3'] = $tl['hook_error']['hookerror3'] . '<br>';
          }

          if (count($errors) == 0) {

            /* EN: Convert value
             * smartsql - secure method to insert form data into a MySQL DB
             * ------------------
             * CZ: Převod hodnot
             * smartsql - secure method to insert form data into a MySQL DB
            */
            $result = $envodb->query('INSERT INTO ' . $envotable2 . ' SET
                  name = "' . smartsql($defaults['envo_name']) . '",
                  hook_name = "' . smartsql($defaults['envo_hook']) . '",
                  phpcode = "' . smartsql($defaults['envo_phpcode']) . '",
                  exorder = "' . smartsql($defaults['envo_exorder']) . '",
                  pluginid = "' . smartsql($defaults['envo_plugin']) . '",
                  time = NOW(),
                  active = 1');

            $rowid = $envodb->envo_last_id();

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=plugins&sp=newhook&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=plugins&sp=hooks&ssp=edithook&id=' . $rowid . '&status=s');
            }
          } else {

            $errors['e'] = $tl['general_error']['generror'] . '<br>';
            $errors      = $errors;
          }
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["hook_sec_title"]["hookt3"];
        $SECTION_DESC  = $tl["hook_sec_desc"]["hookd4"];

        // EN: Set ACE Editor mode
        // CZ: Nastavení módu ACE Editoru
        $_SESSION['acemode'] = 'php';

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $template = 'newhook.php';

        break;
      case 'edithook':
        // EDIT HOOK

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $pageID = $page3;

        if (envo_row_exist($pageID, $envotable2)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            if (empty($defaults['envo_name'])) {
              $errors['e1'] = $tl['hook_error']['hookerror1'] . '<br>';
            }

            if (empty($defaults['envo_hook'])) {
              $errors['e2'] = $tl['hook_error']['hookerror2'] . '<br>';
            }

            if (!is_numeric($defaults['envo_exorder'])) {
              $errors['e3'] = $tl['hook_error']['hookerror3'] . '<br>';
            }

            if (count($errors) == 0) {

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
              */
              $result = $envodb->query('UPDATE ' . $envotable2 . ' SET
                        name = "' . smartsql($defaults['envo_name']) . '",
                        hook_name = "' . smartsql($defaults['envo_hook']) . '",
                        phpcode = "' . smartsql($defaults['envo_phpcode']) . '",
                        exorder = "' . smartsql($defaults['envo_exorder']) . '",
                        pluginid = "' . smartsql($defaults['envo_plugin']) . '",
                        time = NOW() ,
                        active = 1
                        WHERE id = "' . smartsql($pageID) . '"');


              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=plugins&sp=hooks&ssp=edithook&id=' . $pageID . '&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=plugins&sp=hooks&ssp=edithook&id=' . $pageID . '&status=s');
              }
            } else {

              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }

          // Get the data from thbe hook
          $ENVO_FORM_DATA = envo_get_data($pageID, $envotable2);

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tl["hook_sec_title"]["hookt"];
          $SECTION_DESC  = $tl["hook_sec_desc"]["hookd"];

          // EN: Set ACE Editor mode
          // CZ: Nastavení módu ACE Editoru
          $_SESSION['acemode'] = 'php';

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $template = 'edithook.php';
        }

        break;
      case 'lock':
        // LIST OF HOOKS - LOCK HOOK IN DB

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $pageID = $page3;

        if (envo_row_exist($pageID, $envotable2)) {
          $envodb->query('UPDATE ' . $envotable2 . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($pageID) . '"');
        }

        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL . 'index.php?p=plugins&sp=hooks&status=s');

        break;
      case 'delete':
        // LIST OF HOOKS - DELETE HOOK FROM DB

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $pageID = $page3;

        if (envo_row_exist($pageID, $envotable2)) {

          if ($pageID >= 5) {

            $envodb->query('DELETE FROM ' . $envotable2 . ' WHERE id = "' . smartsql($pageID) . '" LIMIT 1');


            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=plugins&sp=hooks&status=s');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=plugins&sp=hooks&status=edn');
          }
        }

        break;
      case 'sorthooks':
        // SORT HOOKS BY NAME

        // Important template Stuff
        if (is_numeric($page3)) {
          $sortwhere = 'pluginid';
        } else {
          $sortwhere = 'hook_name';
        }

        // SQL Query
        $result = $envodb->query('SELECT t1.id, t1.hook_name, t1.name, t1.pluginid, t1.active, t2.name AS pluginname FROM ' . DB_PREFIX . 'pluginhooks AS t1 LEFT JOIN ' . DB_PREFIX . 'plugins AS t2 ON(t1.pluginid = t2.id) WHERE ' . $sortwhere . ' = "' . smartsql($page3) . '" ORDER BY exorder ASC');
        while ($row = $result->fetch_assoc()) {
          $ENVO_HOOKS[] = $row;
        }

        // Get the plugin name
        if (isset($ENVO_HOOKS) && is_array($ENVO_HOOKS)) foreach ($ENVO_HOOKS as $vpn) {
          if ($vpn['pluginid'] == $page3) $ENVO_PLUGIN_NAME = $vpn['pluginname'];
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["hook_sec_title"]["hookt2"];
        $SECTION_DESC  = (is_numeric($page3) ? $tl["hook_sec_desc"]["hookd2"] . ': ' . $ENVO_PLUGIN_NAME : $tl["hook_sec_desc"]["hookd3"] . ': ' . $page3);

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $template = 'sorthooks.php';

        break;
      default:
        // LIST OF HOOKS

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envo_delete_hook'])) {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (isset($defaults['lock'])) {

            $lockuser = $defaults['envo_delete_hook'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              $result = $envodb->query('UPDATE ' . $envotable2 . ' SET active = IF (active = 1, 0, 1) WHERE id = ' . $locked . '');
            }


            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=plugins&sp=hooks&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=plugins&sp=hooks&status=s');
            }

          }

          if (isset($defaults['delete'])) {

            $deleteuser = $defaults['envo_delete_hook'];

            for ($i = 0; $i < count($deleteuser); $i++) {
              $deleted = $deleteuser[$i];

              if ($deleted >= 5) {

                $result = $envodb->query('DELETE FROM ' . $envotable2 . ' WHERE id = "' . smartsql($deleted) . '"');
              }

            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=plugins&sp=hooks&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=plugins&sp=hooks&status=s');
            }

          }

        }

        $getTotal = envo_get_total($envotable2, '', '', '');

        if ($getTotal != 0) {

          // SQL Query
          $result = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'pluginhooks ORDER BY exorder ASC ');
          while ($row = $result->fetch_assoc()) {
            $plhooks[] = $row;
          }

          // Get all plugins out the databse
          $ENVO_HOOKS = $plhooks;

        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["hook_sec_title"]["hookt1"];
        $SECTION_DESC  = $tl["hook_sec_desc"]["hookd1"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $template = 'hooks.php';

        break;
    }

    break;
  default:
    // PLUGINS

    switch ($page1) {
      case 'lock':
        // LIST OF PLUGINS - LOCK PLUGIN IN DB

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $pageID = $page2;

        if (envo_row_exist($pageID, $envotable1)) {
          $envodb->query('UPDATE ' . $envotable1 . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($pageID) . '"');
          $envodb->query('UPDATE ' . $envotable . ' SET activeplugin = IF (activeplugin = 1, 0, 1) WHERE pluginid = "' . smartsql($pageID) . '"');
          $envodb->query('UPDATE ' . $envotable2 . ' SET active = IF (active = 1, 0, 1) WHERE pluginid = "' . smartsql($pageID) . '"');
        }

        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL . 'index.php?p=plugins&status=s');

        break;
      default:
        // LIST OF PLUGINS

        // Let's go on with the script
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (isset($defaults['real_id'])) {

            $pluginid   = $defaults['real_id'];
            $realid     = implode(',', $defaults['real_id']);
            $realaccess = $defaults['access'];
            $changea    = array_combine($pluginid, $realaccess);

            // Then go on with the access rights
            $updatesqla = "";
            foreach ($changea as $keya => $pluga) {
              $updatesqla .= sprintf("WHEN %d THEN '%s' ", $keya, $pluga);
            }

            // Update in one query
            $result1a = $envodb->query('UPDATE ' . $envotable1 . ' SET access = CASE id
		 			    	' . $updatesqla . '
		 			    	END
		 			    	WHERE id IN (' . $realid . ')');

            if ($result1a) {

              // and finaly update the setting table
              $result1 = $envodb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
		 							WHEN "accessgeneral" THEN "' . smartsql($defaults['envo_generala']) . '"
		 						    WHEN "accessmanage" THEN "' . smartsql($defaults['envo_managea']) . '"
		 						END
		 							WHERE varname IN ("accessgeneral","accessmanage")');

              if (!$result1) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=plugins&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=plugins&status=s');
              }
            }

          }

        }

        // Get all styles in the directory
        $site_plugins = envo_get_site_style('../plugins/');

        // EN: Getting modification time of updete file
        // CZ:
        foreach ($site_plugins as $sp) {
          $filenamepath = $filetime = $dbtime = '';
          // Set update file path
          $filenamepath = '../plugins/' . $sp . '/update.php';

          if (stream_resolve_include_path($filenamepath)) {
            // Getting file modification time - Unixtimestamp
            $filetime = strtotime(date("Y-m-d H:i:s", filemtime($filenamepath)));
          } else {
            $filetime = '0';
          }

          $update_files[] = array(
            'pluginname'      => $sp,
            'update_filename' => $filenamepath,
            'time_updatefile' => $filetime
          );
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["plug_sec_title"]["plugt"];
        $SECTION_DESC  = $tl["plug_sec_desc"]["plugd"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $template = 'plugins.php';
    }
}
?>