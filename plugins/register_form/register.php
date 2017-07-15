<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable = DB_PREFIX . 'user';

// AJAX Search
$AJAX_SEARCH_PLUGIN_WHERE = DB_PREFIX . 'pages';
$AJAX_SEARCH_PLUGIN_URL   = 'include/ajax/page.php';
$AJAX_SEARCH_PLUGIN_SEO   = 0;

$errors_rfp = $errors_rf = $errorsA = array();
$insert     = '';

if (JAK_USERID) {

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['avatarR'])) {
    // EN: Default Variable
    // CZ: Hlavní proměnné
    $defaults = $_POST;

    if (!empty($_FILES['uploadpp']['name'])) {

      if ($_FILES['uploadpp']['name'] != '') {

        $filename     = $_FILES['uploadpp']['name']; // original filename
        $tmpf         = explode(".", $filename);
        $jak_xtension = end($tmpf);

        if ($jak_xtension == "jpg" || $jak_xtension == "jpeg" || $jak_xtension == "png" || $jak_xtension == "gif") {

          if ($_FILES['uploadpp']['size'] <= 500000) {

            list($width, $height, $type, $attr) = getimagesize($_FILES['uploadpp']['tmp_name']);
            $mime = image_type_to_mime_type($type);

            if (($mime == "image/jpeg") || ($mime == "image/pjpeg") || ($mime == "image/png") || ($mime == "image/gif")) {

              // first get the target path
              $targetPathd = JAK_FILES_DIRECTORY . '/userfiles' . '/' . JAK_USERID . '/';
              $targetPath  = str_replace("//", "/", $targetPathd);

              // Create the target path
              if (!is_dir($targetPath)) {
                mkdir($targetPath, 0775);
                copy(JAK_FILES_DIRECTORY . "/index.html", $targetPath . "/index.html");
              }

              // if old avatars exist delete it
              foreach (glob($targetPath . '*.*') as $jak_unlink) {
                unlink($jak_unlink);
                copy(JAK_FILES_DIRECTORY . "/index.html", $targetPath . "/index.html");
              }

              $tempFile    = $_FILES['uploadpp']['tmp_name'];
              $origName    = substr($_FILES['uploadpp']['name'], 0, -4);
              $name_space  = strtolower($_FILES['uploadpp']['name']);
              $middle_name = str_replace(" ", "_", $name_space);
              $middle_name = str_replace(".jpeg", ".jpg", $name_space);
              $glnrrand    = rand(10, 99);
              $bigPhoto    = str_replace(".", "_" . $glnrrand . ".", $middle_name);
              $smallPhoto  = str_replace(".", "_t.", $bigPhoto);

              $targetFile = str_replace('//', '/', $targetPath) . $bigPhoto;
              $origPath   = '/' . JAK_USERID . '/';
              $dbSmall    = $origPath . $smallPhoto;
              $dbBig      = $origPath . $bigPhoto;

              require_once 'include/functions_thumb.php';

              // Move file and create thumb
              move_uploaded_file($tempFile, $targetFile);

              // Create thumbnail
              create_thumbnail($targetPath, $targetFile, $smallPhoto, $jkv["useravatwidth"], $jkv["useravatheight"], 80);

              // SQL insert
              $result = $jakdb->query('UPDATE ' . $envotable . ' SET picture = "' . $dbSmall . '" WHERE id = "' . JAK_USERID . '" LIMIT 1');


              if (!$result) {
                envo_redirect(JAK_PARSE_ERROR);
              } else {
                envo_redirect(JAK_PARSE_SUCCESS);
              }

            } else {
              $errors['e'] = $tl['general_error']['generror13'] . '<br />';
            }

          } else {
            $errors['e'] = $tl['general_error']['generror13'] . '<br />';
          }

        } else {
          $errors['e'] = $tl['general_error']['generror13'] . '<br />';
        }

      } else {
        $errors['e'] = $tl['general_error']['generror13'] . '<br />';
      }

    } else {
      $errors['e'] = $tl['general_error']['generror13'] . '<br />';
      $errors_rf   = $errors;
    }
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['avatarS'])) {

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $defaults = $_POST;

    // Set Avatar if yes
    if (!empty($defaults['avatar'])) {

      // first get the target path
      $targetPathd = JAK_FILES_DIRECTORY . '/userfiles' . '/' . JAK_USERID . '/';
      $targetPath  = str_replace("//", "/", $targetPathd);

      // if old avatars exist delete it
      foreach (glob($targetPath . '*.*') as $jak_unlink) {
        unlink($jak_unlink);
        copy(JAK_FILES_DIRECTORY . "/index.html", $targetPath . "/index.html");
      }

      $result = $jakdb->query('UPDATE ' . $envotable . ' SET picture = "' . smartsql($defaults['avatar']) . '" WHERE id = "' . smartsql(JAK_USERID) . '"');
    }

    if (!$result) {
      envo_redirect(JAK_PARSE_ERROR);
    } else {
      envo_redirect(JAK_PARSE_SUCCESS);
    }

  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['stuffR'])) {

    $defaults   = $_POST;
    $errors_rfs = array();

    if ($defaults['email'] != $jakuser->getVar("email")) {

      if (!filter_var($defaults['email'], FILTER_VALIDATE_EMAIL)) {
        $errors_rfs['e1'] = $tl['general_error']['generror14'] . '<br />';
      }

      if (envo_field_not_exist(filter_var($defaults['email'], FILTER_SANITIZE_EMAIL), $envotable, 'email')) {
        $errors_rfs['e1'] = $tl['general_error']['generror15'] . '<br />';
      }

      // Check if email address has been blocked
      if ($jkv["email_block"]) {
        $blockede = explode(',', $jkv["email_block"]);
        if (in_array($defaults['email'], $blockede) || in_array(strrchr($defaults['email'], "@"), $blockede)) {
          $errors_rfs['e1'] = $tl['general_error']['generror16'] . '<br />';
        }
      }

    }

    // Decode the list for security reasons
    $declist     = base64_decode($defaults['optlist']);
    $declistname = $defaults['optlistname'];
    $declistmand = base64_decode($defaults['optlistmandatory']);
    $declisttype = base64_decode($defaults['optlisttype']);

    // Get the list of used optionsid
    $formarray = explode(',', $declist);
    // Get the names out the list
    $formnamearray = explode(',', $declistname);
    // Get the mandatory out the list
    $formmandarray = explode(',', $declistmand);
    // Get the types out the list
    $formtype = explode(',', $declisttype);

    // Now run thru the whole form options to get some errors or send the form after with phpmail
    for ($i = 0; $i < count($formarray); $i++) {

      // Now check the rest of the fields
      if ($formarray[$i] > 3) {
        if ($formmandarray[$i] == 1) {
          if ($formtype[$i] <= 3) {
            if ($defaults[$formarray[$i]] == '') {
              $errorsA[$i] = $tl['general_error']['generror17'] . ' (' . $formnamearray[$i] . ')<br />';
            }
          } elseif ($formtype[$i] == 4) {
            if ($defaults[$formnamearray[$i]] == '') {
              $errorsA[$i] = $tl['general_error']['generror17'] . ' (' . $formnamearray[$i] . ')<br />';
            }
          }
        } elseif ($formmandarray[$i] == 2) {
          if (!is_numeric($defaults[$formarray[$i]])) {
            $errorsA[$i] = $tl['general_error']['generror18'] . ' (' . $formnamearray[$i] . ')<br />';
          }
        } elseif ($formmandarray[$i] == 3) {
          if ($defaults[$formarray[$i]] == '' || !filter_var($defaults[$formarray[$i]], FILTER_VALIDATE_EMAIL)) {
            $errorsA[$i] = $tl['general_error']['generror14'] . ' (' . $formnamearray[$i] . ')<br />';
          }
        }
      }

      if (count($errorsA) == 0) {

        if ($formarray[$i] > 3) {

          if ($formmandarray[$i] == 3) {
            $listEmail = $defaults[$formarray[$i]];
          }

          if ($formtype[$i] <= 3) {
            $insert .= ', ' . strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $formnamearray[$i])) . '_' . $formarray[$i] . ' = "' . smartsql($defaults[$formarray[$i]]) . '"';
          } else {
            $insert .= ', ' . strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $formnamearray[$i])) . '_' . $formarray[$i] . ' = "' . smartsql($defaults[$formnamearray[$i]]) . '"';
          }

        }

      }
    }

    if (count($errorsA) == 0 && count($errors_rfs) == 0) {

      $safeemail = '';
      if ($defaults['email'] != $jakuser->getVar("email")) {
        $safeemail = ', email = "' . smartsql(filter_var($defaults['email'], FILTER_SANITIZE_EMAIL)) . '"';
      }

      /* EN: Convert value
       * smartsql - secure method to insert form data into a MySQL DB
       * ------------------
       * CZ: Převod hodnot
       * smartsql - secure method to insert form data into a MySQL DB
      */
      $result = $jakdb->query('UPDATE ' . $envotable . ' SET
                name = "' . smartsql($defaults['name']) . '",
                phone = "' . smartsql($defaults['phone']) . '"
                ' . $safeemail . $insert . '
                WHERE id = "' . smartsql(JAK_USERID) . '"');

      if (!$result) {
        envo_redirect(JAK_PARSE_ERROR);
      } else {
        envo_redirect(JAK_PARSE_SUCCESS);
      }

    } else {
      $errors_rf = $errors_rfs;
      $errorsA   = $errorsA;
    }

  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email_passR'])) {

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $defaults = $_POST;

    $passold = smartsql($defaults['passold']);
    $pass    = smartsql($defaults['passnew']);
    $newpass = smartsql($defaults['passnewc']);

    if ($pass != $newpass) {
      $errors_rfp['e1'] = $tl['general_error']['generror19'] . '<br />';
    } elseif (strlen($pass) <= '7') {
      $errors_rfp['e2'] = $tl['general_error']['generror20'] . '<br />';
    }

    $fwhen = 0;

    $user_check = $jakuserlogin->jakCheckuserdata($JAK_USERNAME_LINK, $passold);

    if (!$user_check) {
      $errors_rfp['e5'] = $tl['general_error']['generror21'] . '<br />';
    }

    if ($user_check == TRUE && count($errors_rfp) == 0) {

      // The new password encrypt with hash_hmac
      $passcrypt = hash_hmac('sha256', $pass, DB_PASS_HASH);

      $result = $jakdb->query('UPDATE ' . $envotable . ' SET password = "' . $passcrypt . '" WHERE id = ' . JAK_USERID);

      if (!$result) {
        envo_redirect(JAK_PARSE_ERROR);
      } else {
        envo_redirect(JAK_PARSE_SUCCESS);
      }

    } else {
      $errors_rf = $errors_rfp;
    }

  }

  // Get the sort orders for the grid
  $grid = $jakdb->query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = ' . JAK_PLUGIN_ID_REGISTER_FORM . ' ORDER BY orderid ASC');
  while ($grow = $grid->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $JAK_HOOK_SIDE_GRID[] = $grow;
  }

  include_once APP_PATH . 'plugins/register_form/rf_createform.php';
  $regform = jak_create_register_form($tl['form_text']['formt'], 3);

  $PAGE_TITLE = sprintf($tlrf["rf_frontend"]["rf"], $jakuser->getVar("username"));

  // Template Call
  $JAK_TPL_PLUG_T   = $PAGE_TITLE;
  $JAK_TPL_PLUG_URL = 1;

  // EN: Load the php template
  // CZ: Načtení php template (šablony)
  $pluginbasic_template = 'plugins/register_form/template/rf_editprofile.php';
  $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/register_form/rf_editprofile.php';

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

?>