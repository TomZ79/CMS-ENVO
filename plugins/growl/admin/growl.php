<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$envouser->envoModuleAccess(ENVO_USERID, ENVO_ACCESSGROWL)) envo_redirect(BASE_URL);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/growl/admin/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/growl/admin/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'growl';
$envotable1 = DB_PREFIX . 'pages';
$envotable2 = DB_PREFIX . 'news';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../plugins/growl/admin/include/functions.php");

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'new':

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (empty($defaults['envo_title'])) {
        $errors['e1'] = $tl['general_error']['generror18'] . '<br>';
      }

      if (!empty($defaults['envo_datefrom'])) {
        $finalfrom = strtotime($defaults['envo_datefrom']);
      }

      if (!empty($defaults['envo_dateto'])) {
        $finalto = strtotime($defaults['envo_dateto']);
      }

      if (isset($finalto) && isset($finalfrom) && $finalto < $finalfrom) {
        $errors['e2'] = $tl['general_error']['generror25'] . '<br>';
      }

      if (count($errors) == 0) {

        if (!isset($defaults['envo_permission'])) {
          $permission = 0;
        } elseif (in_array(0, $defaults['envo_permission'])) {
          $permission = 0;
        } else {
          $permission = join(',', $defaults['envo_permission']);
        }

        if (!isset($defaults['envo_pageid'])) {
          $pageid = 0;
        } elseif (in_array(0, $defaults['envo_pageid'])) {
          $pageid = 0;
        } else {
          $pageid = join(',', $defaults['envo_pageid']);
        }

        if (!isset($defaults['envo_newsid'])) {
          $newsid = 0;
        } elseif (in_array(0, $defaults['envo_newsid'])) {
          $newsid = 0;
        } else {
          $newsid = join(',', $defaults['envo_newsid']);
        }

        // save the time if available
        if (isset($finalfrom)) {
          $insert .= 'startdate = "' . smartsql($finalfrom) . '",';
        }

        if (isset($finalto)) {
          $insert .= 'enddate = "' . smartsql($finalto) . '",';
        }

        /* EN: Convert value
         * smartsql - secure method to insert form data into a MySQL DB
         * ------------------
         * CZ: Převod hodnot
         * smartsql - secure method to insert form data into a MySQL DB
        */
        $result = $envodb->query('INSERT INTO ' . $envotable . ' SET
                  everywhere = "' . smartsql($defaults['envo_all']) . '",
                  remember = "' . smartsql($defaults['envo_cookies']) . '",
                  remembertime = "' . smartsql($defaults['envo_cookiestime']) . '",
                  duration = "' . smartsql($defaults['envo_dur']) . '",
                  sticky = "' . smartsql($defaults['envo_sticky']) . '",
                  position = "' . smartsql($defaults['envo_class']) . '",
                  color = "' . smartsql($defaults['envo_color']) . '",
                  pageid = "' . smartsql($pageid) . '",
                  newsid = "' . smartsql($newsid) . '",
                  newsmain = "' . smartsql($defaults['envo_mainnews']) . '",
                  tags = "' . smartsql($defaults['envo_tags']) . '",
                  search = "' . smartsql($defaults['envo_search']) . '",
                  sitemap = "' . smartsql($defaults['envo_sitemap']) . '",
                  title = "' . smartsql($defaults['envo_title']) . '",
                  previmg = "' . smartsql($defaults['envo_img']) . '",
                  content = "' . smartsql($defaults['envo_content']) . '",
                  permission = "' . smartsql($permission) . '",
                  ' . $insert . '
                  time = NOW()');

        $rowid = $envodb->envo_last_id();

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=growl&sp=new&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=growl&sp=edit&id=' . $rowid . '&status=s');
        }
      } else {

        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // Get all usergroup's
    $ENVO_USERGROUP = envo_get_usergroup_all('usergroup');

    // Pages and News
    $ENVO_PAGES = envo_get_page_info($envotable1, '');
    $ENVO_NEWS  = envo_get_page_info($envotable2, '');

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlgwl["gwl_sec_title"]["gwlt1"];
    $SECTION_DESC  = $tlgwl["gwl_sec_desc"]["gwld1"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'new.php';

    break;
  case 'edit':

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (empty($defaults['envo_title'])) {
        $errors['e1'] = $tl['general_error']['generror18'] . '<br>';
      }

      if (!empty($defaults['envo_datefrom'])) {
        $finalfrom = strtotime($defaults['envo_datefrom']);
      } else {
        $finalfrom = '0';
      }

      if (!empty($defaults['envo_dateto'])) {
        $finalto = strtotime($defaults['envo_dateto']);
      } else {
        $finalto = '0';
      }

      if (isset($finalto) && isset($finalfrom) && $finalto < $finalfrom) {
        $errors['e2'] = $tl['general_error']['generror25'] . '<br>';
      }

      if (count($errors) == 0) {

        if (!isset($defaults['envo_permission'])) {
          $permission = 0;
        } elseif (in_array(0, $defaults['envo_permission'])) {
          $permission = 0;
        } else {
          $permission = join(',', $defaults['envo_permission']);
        }

        if (!isset($defaults['envo_pageid'])) {
          $pageid = 0;
        } elseif (in_array(0, $defaults['envo_pageid'])) {
          $pageid = 0;
        } else {
          $pageid = join(',', $defaults['envo_pageid']);
        }

        if (!isset($defaults['envo_newsid'])) {
          $newsid = 0;
        } elseif (in_array(0, $defaults['envo_newsid'])) {
          $newsid = 0;
        } else {
          $newsid = join(',', $defaults['envo_newsid']);
        }

        // Save the time if available
        if (isset($finalfrom)) {
          $insert .= 'startdate = "' . smartsql($finalfrom) . '",';
        }

        if (isset($finalto)) {
          $insert .= 'enddate = "' . smartsql($finalto) . '",';
        }

        /* EN: Convert value
         * smartsql - secure method to insert form data into a MySQL DB
         * ------------------
         * CZ: Převod hodnot
         * smartsql - secure method to insert form data into a MySQL DB
        */
        $result = $envodb->query('UPDATE ' . $envotable . ' SET
                      everywhere = "' . smartsql($defaults['envo_all']) . '",
                      remember = "' . smartsql($defaults['envo_cookies']) . '",
                      remembertime = "' . smartsql($defaults['envo_cookiestime']) . '",
                      duration = "' . smartsql($defaults['envo_dur']) . '",
                      sticky = "' . smartsql($defaults['envo_sticky']) . '",
                      position = "' . smartsql($defaults['envo_class']) . '",
                      color = "' . smartsql($defaults['envo_color']) . '",
                      pageid = "' . smartsql($pageid) . '",
                      newsid = "' . smartsql($newsid) . '",
                      newsmain = "' . smartsql($defaults['envo_mainnews']) . '",
                      tags = "' . smartsql($defaults['envo_tags']) . '",
                      search = "' . smartsql($defaults['envo_search']) . '",
                      sitemap = "' . smartsql($defaults['envo_sitemap']) . '",
                      title = "' . smartsql($defaults['envo_title']) . '",
                      previmg = "' . smartsql($defaults['envo_img']) . '",
                      content = "' . smartsql($defaults['envo_content']) . '",
                      permission = "' . smartsql($permission) . '",
                      ' . $insert . '
                      time = NOW() WHERE id = "' . smartsql($page2) . '"');

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=growl&sp=edit&id=' . $page2 . '&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=growl&sp=edit&id=' . $page2 . '&status=s');
        }
      } else {

        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // Get all usergroup's
    $ENVO_USERGROUP = envo_get_usergroup_all('usergroup');

    // Pages and News
    $ENVO_PAGES = envo_get_page_info($envotable1, '');
    $ENVO_NEWS  = envo_get_page_info($envotable2, '');

    // Get the data
    $ENVO_FORM_DATA = envo_get_data($page2, $envotable);

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlgwl["gwl_sec_title"]["gwlt2"];
    $SECTION_DESC  = $tlgwl["gwl_sec_desc"]["gwld2"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'edit.php';

    break;
  case 'lock':

    $result = $envodb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = ' . smartsql($page2));

    if (!$result) {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=growl&status=e');
    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=growl&status=s');
    }

    break;
  case 'delete':
    if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

      // EN: Delete the Content
      // CZ: Odstranění obsahu
      $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');

      if (!$result) {
        // EN: Redirect page
        // CZ: Přesměrování stránky s notifikací - chybné
        envo_redirect(BASE_URL . 'index.php?p=growl&status=e');
      } else {
        // EN: Redirect page
        // CZ: Přesměrování stránky s notifikací - úspěšné
        /*
        NOTIFIKACE:
        'status=s'    - Záznam úspěšně uložen
        'status1=s1'  - Záznam úspěšně odstraněn
        */
        envo_redirect(BASE_URL . 'index.php?p=growl&status=s&status1=s1');
      }

    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=growl&status=ene');
    }
    break;
  default:

    // Hello we have a post request
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envo_delete_growl'])) {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (isset($defaults['delete'])) {

        $deleteuser = $defaults['envo_delete_growl'];

        for ($i = 0; $i < count($deleteuser); $i++) {
          $deleted = $deleteuser[$i];

          $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($deleted) . '"');
        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky s notifikací - chybné
          envo_redirect(BASE_URL . 'index.php?p=growl&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky s notifikací - úspěšné
          /*
          NOTIFIKACE:
          'status=s'    - Záznam úspěšně uložen
          'status1=s1'  - Záznam úspěšně odstraněn
          */
          envo_redirect(BASE_URL . 'index.php?p=growl&status=s&status1=s1');
        }

      }

      if (isset($defaults['lock'])) {

        $lockuser = $defaults['envo_delete_growl'];

        for ($i = 0; $i < count($lockuser); $i++) {
          $locked = $lockuser[$i];

          // Delete the pics associated with the Nivo Slider
          $result = $envodb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($locked) . '"');
        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=growl&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=growl&status=s');
        }

      }

    }

    $ENVO_GROWL_ALL = envo_get_growl();

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlgwl["gwl_sec_title"]["gwlt"];
    $SECTION_DESC  = $tlgwl["gwl_sec_desc"]["gwld"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'growl.php';
}

?>