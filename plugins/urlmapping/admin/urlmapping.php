<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die('You cannot access this file directly.');

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$jakuser->jakModuleaccess(JAK_USERID, JAK_ACCESSURLMAPPING)) jak_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$jaktable = DB_PREFIX . 'urlmapping';

// Now start with the plugin use a switch to access all pages
switch ($page1) {

  // Create new urlmapping
  case 'new':

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $defaults = $_POST;

      if (empty($defaults['jak_oldurl']) && empty($defaults['jak_newurl']) && (($defaults['jak_baseurl'] == 0) || ($defaults['jak_baseurl'] == 1))) {
        $errors['e1'] = $tlum['um']['e'];
      }

      if (empty($defaults['jak_oldurl']) && !empty($defaults['jak_newurl']) && ($defaults['jak_baseurl'] == 0)) {
        $errors['e2'] = $tlum['um']['e1'];
      }

      if (empty($defaults['jak_newurl']) && !empty($defaults['jak_oldurl']) && ($defaults['jak_baseurl'] == 0)) {
        $errors['e3'] = $tlum['um']['e2'];
      }

      if (count($errors) == 0) {

        // Do the dirty work in mysql
        $result = $jakdb->query('INSERT INTO ' . $jaktable . ' SET
		    urlold = "' . smartsql($defaults['jak_oldurl']) . '",
		    urlnew = "' . smartsql($defaults['jak_newurl']) . '",
		    baseurl = "' . smartsql($defaults['jak_baseurl']) . '",
		    redirect = "' . smartsql($defaults['jak_redirect']) . '",
		    time = NOW()');

        $rowid = $jakdb->jak_last_id();

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=urlmapping&sp=newbh&ssp=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=urlmapping&sp=edit&ssp=' . $rowid . '&sssp=s');
        }
      } else {

        $errors['e'] = $tl['error']['e'];
        $errors = $errors;
      }
    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlum["um"]["m1"];
    $SECTION_DESC = $tlum["um"]["t"];

    // EN: Load the template
    // CZ: Načti template (šablonu)
    $plugin_template = 'plugins/urlmapping/admin/template/new.php';

    break;
  default:

    switch ($page1) {
      case 'delete':
        if (is_numeric($page2) && jak_row_exist($page2, $jaktable)) {

          // Delete the Content
          $result = $jakdb->query('DELETE FROM ' . $jaktable . ' WHERE id = "' . smartsql($page2) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            jak_redirect(BASE_URL . 'index.php?p=urlmapping&sp=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - úspěšné
            /*
            NOTIFIKACE:
            'sp=s'   - Záznam úspěšně uložen
            'ssp=s'  - Zázanm úspěšně odstraněn
            */
            jak_redirect(BASE_URL . 'index.php?p=urlmapping&sp=s&ssp=s');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=urlmapping&sp=ene');
        }
        break;
      case 'lock':

        $result = $jakdb->query('UPDATE ' . $jaktable . ' SET active = IF (active = 1, 0, 1) WHERE id = ' . smartsql($page2));

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=urlmapping&sp=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=urlmapping&sp=s');
        }

        break;
      case 'edit':

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $defaults = $_POST;

          if (empty($defaults['jak_oldurl']) && empty($defaults['jak_newurl']) && (($defaults['jak_baseurl'] == 0) || ($defaults['jak_baseurl'] == 1))) {
            $errors['e1'] = $tlum['um']['e'];
          }

          if (empty($defaults['jak_oldurl']) && !empty($defaults['jak_newurl']) && ($defaults['jak_baseurl'] == 0)) {
            $errors['e2'] = $tlum['um']['e1'];
          }

          if (empty($defaults['jak_newurl']) && !empty($defaults['jak_oldurl']) && ($defaults['jak_baseurl'] == 0)) {
            $errors['e3'] = $tlum['um']['e2'];
          }

          if (count($errors) == 0) {

            if ($defaults['jak_baseurl'] == 1) {
              $urlnew = '';
            } else {
              $urlnew = smartsql($defaults['jak_newurl']);
            }

            // Do the dirty work in mysql
            $result = $jakdb->query('UPDATE ' . $jaktable . ' SET
				    urlold = "' . smartsql($defaults['jak_oldurl']) . '",
				    urlnew = "' . $urlnew . '",
				    baseurl = "' . smartsql($defaults['jak_baseurl']) . '",
				    redirect = "' . smartsql($defaults['jak_redirect']) . '",
				    time = NOW()
				    WHERE id = "' . smartsql($page2) . '"');

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=urlmapping&sp=edit&ssp=' . $page2 . '&sssp=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=urlmapping&sp=edit&ssp=' . $page2 . '&sssp=s');
            }

          } else {
            $errors['e'] = $tl['error']['e'];
            $errors = $errors;
          }
        }

        // Get the data
        $JAK_FORM_DATA = jak_get_data($page2, $jaktable);

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlum["um"]["m2"];
        $SECTION_DESC = $tlum["um"]["t1"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $plugin_template = 'plugins/urlmapping/admin/template/edit.php';

        break;
      default:

        // Hello we have a post request
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['jak_delete_urlmapping'])) {
          $defaults = $_POST;

          if (isset($defaults['delete'])) {

            $lockuser = $defaults['jak_delete_urlmapping'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];
              $result = $jakdb->query('DELETE FROM ' . $jaktable . ' WHERE id = "' . smartsql($locked) . '"');
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky s notifikací - chybné
              jak_redirect(BASE_URL . 'index.php?p=urlmapping&sp=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky s notifikací - úspěšné
              /*
              NOTIFIKACE:
              'sp=s'   - Záznam úspěšně uložen
              'ssp=s'  - Zázanm úspěšně odstraněn
              */
              jak_redirect(BASE_URL . 'index.php?p=urlmapping&sp=s&ssp=s');
            }

          }

          if (isset($defaults['lock'])) {

            $lockuser = $defaults['jak_delete_urlmapping'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              // Delete the pics associated with the Nivo Slider
              $result = $jakdb->query('UPDATE ' . $jaktable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($locked) . '"');
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=urlmapping&sp=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=urlmapping&sp=s');
            }

          }

        }

        // Get all
        $result = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'urlmapping ORDER BY id ASC');
        while ($row = $result->fetch_assoc()) {
          // collect each record into $_data
          $JAK_UM_ALL[] = $row;
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlum["um"]["m"];
        $SECTION_DESC = $tlum["um"]["t"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $plugin_template = 'plugins/urlmapping/admin/template/mapping.php';
    }
}
?>