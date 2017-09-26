<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$jakuser->jakModuleaccess(JAK_USERID, JAK_ACCESSBELOWHEADER)) envo_redirect(BASE_URL);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/belowheader/admin/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/belowheader/admin/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'belowheader';
$envotable1 = DB_PREFIX . 'pages';
$envotable2 = DB_PREFIX . 'news';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../plugins/belowheader/admin/include/functions.php");

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {

  case 'newbh':

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (empty($defaults['jak_title'])) {
        $errors['e1'] = $tl['general_error']['generror18'] . '<br>';
      }

      if (count($errors) == 0) {

        if (!isset($defaults['jak_permission'])) {
          $permission = 0;
        } elseif (in_array(0, $defaults['jak_permission'])) {
          $permission = 0;
        } else {
          $permission = join(',', $defaults['jak_permission']);
        }

        if (!isset($defaults['jak_pageid'])) {
          $pageid = 0;
        } elseif (in_array(0, $defaults['jak_pageid'])) {
          $pageid = 0;
        } else {
          $pageid = join(',', $defaults['jak_pageid']);
        }

        if (!isset($defaults['jak_newsid'])) {
          $newsid = 0;
        } elseif (in_array(0, $defaults['jak_newsid'])) {
          $newsid = 0;
        } else {
          $newsid = join(',', $defaults['jak_newsid']);
        }

        // Do the dirty work in mysql
        $result = $jakdb->query('INSERT INTO ' . $envotable . ' SET
                  pageid = "' . smartsql($pageid) . '",
                  newsid = "' . smartsql($newsid) . '",
                  newsmain = "' . smartsql($defaults['jak_mainnews']) . '",
                  tags = "' . smartsql($defaults['jak_tags']) . '",
                  search = "' . smartsql($defaults['jak_search']) . '",
                  sitemap = "' . smartsql($defaults['jak_sitemap']) . '",
                  title = "' . smartsql($defaults['jak_title']) . '",
                  content = "' . smartsql($defaults['jak_content']) . '",
                  content_below = "' . smartsql($defaults['jak_contentb']) . '",
                  permission = "' . smartsql($permission) . '",
                  time = NOW()');

        $rowid = $jakdb->jak_last_id();

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=belowheader&sp=newbh&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=belowheader&sp=edit&ssp=' . $rowid . '&status=s');
        }
      } else {

        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // Get all usergroup's
    $JAK_USERGROUP = envo_get_usergroup_all('usergroup');

    // Pages and News
    $JAK_PAGES = envo_get_page_info($envotable1, '');
    $JAK_NEWS  = envo_get_page_info($envotable2, '');

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlbh["bh_sec_title"]["bht1"];
    $SECTION_DESC  = $tlbh["bh_sec_desc"]["bhd1"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'newbh.php';

    break;
  default:

    switch ($page1) {
      case 'delete':
        if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

          // Delete the Content
          $result = $jakdb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            envo_redirect(BASE_URL . 'index.php?p=belowheader&status=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - úspěšné
            /*
            NOTIFIKACE:
            'status=s'    - Záznam úspěšně uložen
            'status1=s1'  - Záznam úspěšně odstraněn
            */
            envo_redirect(BASE_URL . 'index.php?p=belowheader&status=s&status1=s1');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=belowheader&status=ene');
        }
        break;
      case 'lock':

        $result = $jakdb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = ' . smartsql($page2));

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=belowheader&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=belowheader&status=s');
        }

        break;
      case 'edit':

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (empty($defaults['jak_title'])) {
            $errors['e1'] = $tl['general_error']['generror18'] . '<br>';
          }

          if (count($errors) == 0) {

            if (!isset($defaults['jak_permission'])) {
              $permission = 0;
            } elseif (in_array(0, $defaults['jak_permission'])) {
              $permission = 0;
            } else {
              $permission = join(',', $defaults['jak_permission']);
            }

            if (!isset($defaults['jak_pageid'])) {
              $pageid = 0;
            } elseif (in_array(0, $defaults['jak_pageid'])) {
              $pageid = 0;
            } else {
              $pageid = join(',', $defaults['jak_pageid']);
            }

            if (!isset($defaults['jak_newsid'])) {
              $newsid = 0;
            } elseif (in_array(0, $defaults['jak_newsid'])) {
              $newsid = 0;
            } else {
              $newsid = join(',', $defaults['jak_newsid']);
            }

            /* EN: Convert value
             * smartsql - secure method to insert form data into a MySQL DB
             * ------------------
             * CZ: Převod hodnot
             * smartsql - secure method to insert form data into a MySQL DB
            */
            $result = $jakdb->query('UPDATE ' . $envotable . ' SET
                      pageid = "' . smartsql($pageid) . '",
                      newsid = "' . smartsql($newsid) . '",
                      newsmain = "' . smartsql($defaults['jak_mainnews']) . '",
                      tags = "' . smartsql($defaults['jak_tags']) . '",
                      search = "' . smartsql($defaults['jak_search']) . '",
                      sitemap = "' . smartsql($defaults['jak_sitemap']) . '",
                      title = "' . smartsql($defaults['jak_title']) . '",
                      content = "' . smartsql($defaults['jak_content']) . '",
                      content_below = "' . smartsql($defaults['jak_contentb']) . '",
                      permission = "' . smartsql($permission) . '",
                      time = NOW() WHERE id = "' . smartsql($page2) . '"');

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=belowheader&sp=edit&ssp=' . $page2 . '&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=belowheader&sp=edit&ssp=' . $page2 . '&status=s');
            }
          } else {
            $errors['e'] = $tl['general_error']['generror'] . '<br>';
            $errors      = $errors;
          }
        }

        // Get all usergroup's
        $JAK_USERGROUP = envo_get_usergroup_all('usergroup');

        // Pages and News
        $JAK_PAGES = envo_get_page_info($envotable1, '');
        $JAK_NEWS  = envo_get_page_info($envotable2, '');

        // Get the data
        $ENVO_FORM_DATA = envo_get_data($page2, $envotable);

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlbh["bh_sec_title"]["bht2"];
        $SECTION_DESC  = $tlbh["bh_sec_desc"]["bhd2"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'editbh.php';

        break;
      default:

        // Hello we have a post request
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['jak_delete_belowheader'])) {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (isset($defaults['delete'])) {

            $lockuser = $defaults['jak_delete_belowheader'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              $result = $jakdb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($locked) . '"');
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky s notifikací - chybné
              envo_redirect(BASE_URL . 'index.php?p=belowheader&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky s notifikací - úspěšné
              /*
              NOTIFIKACE:
              'status=s'    - Záznam úspěšně uložen
              'status1=s1'  - Záznam úspěšně odstraněn
              */
              envo_redirect(BASE_URL . 'index.php?p=belowheader&status=s&status1=s1');
            }

          }

          if (isset($defaults['lock'])) {

            $lockuser = $defaults['jak_delete_belowheader'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              // Delete the pics associated with the Nivo Slider
              $result = $jakdb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($locked) . '"');
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=belowheader&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=belowheader&status=s');
            }

          }

        }

        $JAK_BELOWHEADER_ALL = jak_get_belowheader();

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlbh["bh_sec_title"]["bht"];
        $SECTION_DESC  = $tlbh["bh_sec_desc"]["bhd"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'bh.php';
    }
}

?>