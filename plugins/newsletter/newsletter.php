<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

$CHECK_USR_SESSION = session_id();

// -------- DATA FOR ALL FRONTEND PAGES --------
// -------- DATA PRO VŠECHNY FRONTEND STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/newsletter/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/newsletter/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'newsletter';
$envotable1 = DB_PREFIX . 'newslettergroup';
$envotable2 = DB_PREFIX . 'newsletteruser';
$envotable3 = DB_PREFIX . 'user';

// Wright the Usergroup permission into define and for template
define('JAK_NEWSLETTER', $jakusergroup->getVar("newsletter"));

// Parse links once if needed a lot of time
$backtonl = JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_NEWSLETTER, '', '', '', '');

// -------- DATA FOR SELECTED FRONTEND PAGES --------
// -------- DATA PRO VYBRANÉ FRONTEND STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'signup':

    // Check the contact page and fire errors or emails
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;
      // Create Session, so contact form can only used once
      $_SESSION['jak_nl_sent'] = -1;
      // Errors in Array
      $errorsnl = array();

      if ($defaults['nlUser'] == '') {
        $errorsnl['nlUser'] = $tl['general_error']['generror22'] . '<br />';
      }

      if ($defaults['nlEmail'] == '' || !filter_var($defaults['nlEmail'], FILTER_VALIDATE_EMAIL)) {
        $errorsnl['nlEmail'] = $tl['general_error']['generror14'] . '<br />';
      }

      if (envo_field_not_exist($defaults['nlEmail'], $envotable2, 'email')) {
        $errorsnl['nlEmail'] = $tlnl['general_error']['generror14'];
      }

      if (count($errorsnl) > 0) {

        /* Outputtng the error messages */
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {

          header('Cache-Control: no-cache');
          die('{"status":0, "errors":' . json_encode($errorsnl) . '}');

        } else {

          $_SESSION['jak_nl_errors'] = $errorsnl;
          envo_redirect($_SERVER['HTTP_REFERER']);
        }

      } else {

        // Destroy error session
        unset($_SESSION['jak_nl_errors']);

        // Create random number
        $random = substr(number_format(time() * rand(), 0, '', ''), 0, 10);

        // Insert user into database
        $result = $jakdb->query('INSERT INTO ' . $envotable2 . ' SET name = "' . smartsql($defaults['nlUser']) . '", email = "' . smartsql($defaults['nlEmail']) . '", delcode = "' . $random . '", time = NOW()');

        if ($result) {

          // Ajax Request
          if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {

            $_SESSION['jak_nl_sent']     = 1;
            $_SESSION['jak_thankyou_nl'] = JAK_NLTHANKYOU;

            header('Cache-Control: no-cache');
            die(json_encode(array('status' => 1, 'html' => JAK_NLTHANKYOU)));

          } else {

            $_SESSION['jak_nl_sent']     = 1;
            $_SESSION['jak_thankyou_nl'] = JAK_NLTHANKYOU;
            envo_redirect($_SERVER['HTTP_REFERER']);

          }
        }
      }
    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL);
    }

    break;
  case 'fv':

    if (is_numeric($page2) && is_numeric($page3) && envo_field_not_exist($page3, $envotable, 'fullview')) {

      // Get the data from the newsletter
      $row = $jakdb->queryRow('SELECT content FROM ' . $envotable . ' WHERE id = ' . smartsql($page2));

      // Just the content
      $cssAtt       = array('{myweburl}', '{mywebname}', '{browserversion}', '{unsubscribe}', '{username}', '{fullname}', '{useremail}');
      $cssUrl       = array(BASE_URL, $jkv["title"], '', '', $tlnl['nletter']['d5'], $tlnl['nletter']['d5'], '');
      $PAGE_CONTENT = str_replace($cssAtt, $cssUrl, $row['content']);

      // Get the CSS and Javascript into the page
      $JAK_HEADER_CSS        = $jkv["blog_css"];
      $JAK_FOOTER_JAVASCRIPT = $jkv["blog_javascript"];

      // EN: Load the php template
      // CZ: Načtení php template (šablony)
      $pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'newsletter.php';
      $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/newsletter/newsletter.php';

      if (file_exists($pluginsite_template)) {
        $plugin_template = $pluginsite_template;
      } else {
        $plugin_template = $pluginbasic_template;
      }

    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL);
    }

    break;
  case 'nlo':

    if (is_numeric($page2) && envo_field_not_exist($page2, $envotable2, 'delcode')) {

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nlOff'])) {
        // EN: Default Variable
        // CZ: Hlavní proměnné
        $defaults = $_POST;

        if ($defaults['nlEmail'] == '' || !filter_var($defaults['nlEmail'], FILTER_VALIDATE_EMAIL)) {
          $errors['e'] = $tl['general_error']['generror14'];
          $email_blank = TRUE;
        }

        if (!$email_blank && !envo_field_not_exist($defaults['nlEmail'], $envotable2, 'email')) {
          $errors['e'] = $tlnl['nletter']['e'];
        }

        if (count($errors) == 0) {
          $cleanemail = filter_var($defaults['nlEmail'], FILTER_SANITIZE_EMAIL);

          $result = $jakdb->query('DELETE FROM ' . $envotable2 . ' WHERE email = "' . smartsql($cleanemail) . '" AND delcode = "' . smartsql($page2) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(JAK_PARSE_ERROR);
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(JAK_PARSE_SUCCESS);
          }

        } else {
          $errorsnl = $errors;
        }

      }

      // Content and title
      $PAGE_TITLE   = JAK_NLTITLE;
      $PAGE_CONTENT = JAK_NLSIGNOFF;
      $NL_MEMBER    = FALSE;

      // EN: Load the php template
      // CZ: Načtení php template (šablony)
      $pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'nloff.php';
      $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/newsletter/nloff.php';

      if (file_exists($pluginsite_template)) {
        $plugin_template = $pluginsite_template;
      } else {
        $plugin_template = $pluginbasic_template;
      }

    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL);
    }

    break;
  case 'nlom':

    if (is_numeric($page2) && envo_field_not_exist($page2, $envotable3, 'id')) {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['nlOff'])) {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if ($page2 != JAK_USERID) {
            $errors['e'] = $tlnl['nletter']['e2'];
          }

          if (count($errors) == 0 && JAK_USERID) {

            $result = $jakdb->query('UPDATE ' . $envotable3 . ' SET newsletter = 0 WHERE id = ' . smartsql(JAK_USERID));

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(JAK_PARSE_ERROR);
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(JAK_PARSE_SUCCESS);
            }

          } else {
            $errorsnl = $errors;
          }

        }

        if (isset($_POST['nlOn'])) {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if ($page2 != JAK_USERID) {
            $errors['e'] = $tlnl['nletter']['e2'];
          }

          if (count($errors) == 0 && JAK_USERID) {

            $result = $jakdb->query('UPDATE ' . $envotable3 . ' SET newsletter = 1 WHERE id = ' . smartsql(JAK_USERID));

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(JAK_PARSE_ERROR);
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(JAK_PARSE_SUCCESS);
            }

          } else {
            $errorsnl = $errors;
          }

        }

      }

      // content and title
      $PAGE_TITLE        = JAK_NLTITLE;
      $PAGE_CONTENT      = $tlnl['nletter']['d2'];
      $NL_MEMBER         = TRUE;
      $row['newsletter'] = 1;

      if (JAK_USERID) {

        // Get the newsletter status from the newsletter
        $result = $jakdb->query('SELECT newsletter FROM ' . $envotable3 . ' WHERE id = ' . smartsql(JAK_USERID));
        $row    = $result->fetch_assoc();

      }

      // EN: Load the php template
      // CZ: Načtení php template (šablony)
      $pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'nloff.php';
      $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/newsletter/nloff.php';

      if (file_exists($pluginsite_template)) {
        $plugin_template = $pluginsite_template;
      } else {
        $plugin_template = $pluginbasic_template;
      }

    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL);
    }

    break;
  default:
    // MAIN PAGE OF PLUGIN

    // EN: Redirect page
    // CZ: Přesměrování stránky
    envo_redirect(BASE_URL);
}

?>