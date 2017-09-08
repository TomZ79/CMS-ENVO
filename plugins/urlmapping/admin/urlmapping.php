<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$jakuser->jakModuleaccess(JAK_USERID, JAK_ACCESSURLMAPPING)) envo_redirect(BASE_URL);

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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (empty($defaults['jak_oldurl']) && empty($defaults['jak_newurl']) && (($defaults['jak_baseurl'] == 0) || ($defaults['jak_baseurl'] == 1))) {
        $errors['e1'] = $tlum['urlmap_error']['urler'];
      }

      if (empty($defaults['jak_oldurl']) && !empty($defaults['jak_newurl']) && ($defaults['jak_baseurl'] == 0)) {
        $errors['e2'] = $tlum['urlmap_error']['urler1'];
      }

      if (empty($defaults['jak_newurl']) && !empty($defaults['jak_oldurl']) && ($defaults['jak_baseurl'] == 0)) {
        $errors['e3'] = $tlum['urlmap_error']['urler2'];
      }

      if (count($errors) == 0) {

        /* EN: Convert value
         * smartsql - secure method to insert form data into a MySQL DB
         * ------------------
         * CZ: Převod hodnot
         * smartsql - secure method to insert form data into a MySQL DB
        */
        $result = $jakdb->query('INSERT INTO ' . $envotable . ' SET
                  urlold = "' . smartsql($defaults['jak_oldurl']) . '",
                  urlnew = "' . smartsql($defaults['jak_newurl']) . '",
                  baseurl = "' . smartsql($defaults['jak_baseurl']) . '",
                  redirect = "' . smartsql($defaults['envo_redirect']) . '",
                  time = NOW()');

        $rowid = $jakdb->jak_last_id();

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
  default:

    switch ($page1) {
      case 'delete':
        if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

          // Delete the Content
          $result = $jakdb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');

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

        $result = $jakdb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = ' . smartsql($page2));

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
      case 'edit':

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (empty($defaults['jak_oldurl']) && empty($defaults['jak_newurl']) && (($defaults['jak_baseurl'] == 0) || ($defaults['jak_baseurl'] == 1))) {
            $errors['e1'] = $tlum['urlmap_error']['urler'];
          }

          if (empty($defaults['jak_oldurl']) && !empty($defaults['jak_newurl']) && ($defaults['jak_baseurl'] == 0)) {
            $errors['e2'] = $tlum['urlmap_error']['urler1'];
          }

          if (empty($defaults['jak_newurl']) && !empty($defaults['jak_oldurl']) && ($defaults['jak_baseurl'] == 0)) {
            $errors['e3'] = $tlum['urlmap_error']['urler1'];
          }

          if (count($errors) == 0) {

            if ($defaults['jak_baseurl'] == 1) {
              $urlnew = '';
            } else {
              $urlnew = smartsql($defaults['jak_newurl']);
            }

            /* EN: Convert value
             * smartsql - secure method to insert form data into a MySQL DB
             * ------------------
             * CZ: Převod hodnot
             * smartsql - secure method to insert form data into a MySQL DB
            */
            $result = $jakdb->query('UPDATE ' . $envotable . ' SET
                      urlold = "' . smartsql($defaults['jak_oldurl']) . '",
                      urlnew = "' . $urlnew . '",
                      baseurl = "' . smartsql($defaults['jak_baseurl']) . '",
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

        // Hello we have a post request
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['jak_delete_urlmapping'])) {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (isset($defaults['delete'])) {

            $lockuser = $defaults['jak_delete_urlmapping'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];
              $result = $jakdb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($locked) . '"');
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

            $lockuser = $defaults['jak_delete_urlmapping'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              // Delete the pics associated with the Nivo Slider
              $result = $jakdb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($locked) . '"');
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

        // Get all
        $result = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'urlmapping ORDER BY id ASC');
        while ($row = $result->fetch_assoc()) {
          // EN: Insert each record into array
          // CZ: Vložení získaných dat do pole
          $JAK_UM_ALL[] = $row;
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