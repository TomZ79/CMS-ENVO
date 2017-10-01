<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$envouser->envoModuleAccess(ENVO_USERID, ENVO_ACCESSURLMAPPING)) envo_redirect(BASE_URL);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/urlmapping/admin/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/urlmapping/admin/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable = DB_PREFIX . 'urlmapping';

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'new':
    // ADD NEW URL MAPPING

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (empty($defaults['envo_oldurl']) && empty($defaults['envo_newurl']) && (($defaults['envo_baseurl'] == 0) || ($defaults['envo_baseurl'] == 1))) {
        $errors['e1'] = $tlum['urlmap_error']['urler'];
      }

      if (empty($defaults['envo_oldurl']) && !empty($defaults['envo_newurl']) && ($defaults['envo_baseurl'] == 0)) {
        $errors['e2'] = $tlum['urlmap_error']['urler1'];
      }

      if (empty($defaults['envo_newurl']) && !empty($defaults['envo_oldurl']) && ($defaults['envo_baseurl'] == 0)) {
        $errors['e3'] = $tlum['urlmap_error']['urler2'];
      }

      if (count($errors) == 0) {

        /* EN: Convert value
         * smartsql - secure method to insert form data into a MySQL DB
         * ------------------
         * CZ: Převod hodnot
         * smartsql - secure method to insert form data into a MySQL DB
        */
        $result = $envodb->query('INSERT INTO ' . $envotable . ' SET
                  urlold = "' . smartsql($defaults['envo_oldurl']) . '",
                  urlnew = "' . smartsql($defaults['envo_newurl']) . '",
                  baseurl = "' . smartsql($defaults['envo_baseurl']) . '",
                  redirect = "' . smartsql($defaults['envo_redirect']) . '",
                  time = NOW()');

        $rowid = $envodb->envo_last_id();

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=urlmapping&sp=newbh&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=urlmapping&sp=edit&ssp=' . $rowid . '&status=s');
        }
      } else {
        $errors['e'] = $tl['urlmap_error']['urler'];
        $errors      = $errors;
      }
    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlum["urlmap_title"]["urlt1"];
    $SECTION_DESC  = $tlum["urlmap_desc"]["urld1"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'new.php';

    break;
  case 'edit':
    // EDIT URL MAPPING

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (empty($defaults['envo_oldurl']) && empty($defaults['envo_newurl']) && (($defaults['envo_baseurl'] == 0) || ($defaults['envo_baseurl'] == 1))) {
        $errors['e1'] = $tlum['urlmap_error']['urler'];
      }

      if (empty($defaults['envo_oldurl']) && !empty($defaults['envo_newurl']) && ($defaults['envo_baseurl'] == 0)) {
        $errors['e2'] = $tlum['urlmap_error']['urler1'];
      }

      if (empty($defaults['envo_newurl']) && !empty($defaults['envo_oldurl']) && ($defaults['envo_baseurl'] == 0)) {
        $errors['e3'] = $tlum['urlmap_error']['urler1'];
      }

      if (count($errors) == 0) {

        if ($defaults['envo_baseurl'] == 1) {
          $urlnew = '';
        } else {
          $urlnew = smartsql($defaults['envo_newurl']);
        }

        /* EN: Convert value
         * smartsql - secure method to insert form data into a MySQL DB
         * ------------------
         * CZ: Převod hodnot
         * smartsql - secure method to insert form data into a MySQL DB
        */
        $result = $envodb->query('UPDATE ' . $envotable . ' SET
                      urlold = "' . smartsql($defaults['envo_oldurl']) . '",
                      urlnew = "' . $urlnew . '",
                      baseurl = "' . smartsql($defaults['envo_baseurl']) . '",
                      redirect = "' . smartsql($defaults['envo_redirect']) . '",
                      time = NOW()
                      WHERE id = "' . smartsql($page2) . '"');

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=urlmapping&sp=edit&ssp=' . $page2 . '&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=urlmapping&sp=edit&ssp=' . $page2 . '&status=s');
        }

      } else {
        $errors['e'] = $tl['urlmap_error']['urler'];
        $errors      = $errors;
      }
    }

    // Get the data
    $ENVO_FORM_DATA = envo_get_data($page2, $envotable);

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlum["urlmap_title"]["urlt2"];
    $SECTION_DESC  = $tlum["urlmap_desc"]["urld2"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'edit.php';

    break;
  default:

    switch ($page1) {
      case 'delete':
        if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

          // Delete the Content
          $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            envo_redirect(BASE_URL . 'index.php?p=urlmapping&status=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - úspěšné
            /*
            NOTIFIKACE:
            'status=s'    - Záznam úspěšně uložen
            'status1=s1'  - Záznam úspěšně odstraněn
            */
            envo_redirect(BASE_URL . 'index.php?p=urlmapping&status=s&status1=s1');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=urlmapping&status=ene');
        }
        break;
      case 'lock':

        $result = $envodb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = ' . smartsql($page2));

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=urlmapping&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=urlmapping&status=s');
        }

        break;
      default:
        // LIST OF URL MAPPING

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envo_delete_urlmapping'])) {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (isset($defaults['delete'])) {

            $lockuser = $defaults['envo_delete_urlmapping'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];
              $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($locked) . '"');
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky s notifikací - chybné
              envo_redirect(BASE_URL . 'index.php?p=urlmapping&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky s notifikací - úspěšné
              /*
              NOTIFIKACE:
              'status=s'    - Záznam úspěšně uložen
              'status1=s1'  - Záznam úspěšně odstraněn
              */
              envo_redirect(BASE_URL . 'index.php?p=urlmapping&status=s&status1=s1');
            }

          }

          if (isset($defaults['lock'])) {

            $lockuser = $defaults['envo_delete_urlmapping'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              // Delete the pics associated with the Nivo Slider
              $result = $envodb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($locked) . '"');
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=urlmapping&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=urlmapping&status=s');
            }

          }

        }

        // EN: Get all the data of URL Mapping
        // CZ: Získání všech dat pro URL Mapování
        $result = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'urlmapping ORDER BY id ASC');
        while ($row = $result->fetch_assoc()) {
          // EN: Insert each record into array
          // CZ: Vložení získaných dat do pole
          $ENVO_UM_ALL[] = $row;
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlum["urlmap_title"]["urlt"];
        $SECTION_DESC  = $tlum["urlmap_desc"]["urld"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'mapping.php';
    }
}

?>