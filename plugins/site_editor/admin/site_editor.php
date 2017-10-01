<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$envouser->envoModuleAccess(ENVO_USERID, $setting["accessmanage"])) envo_redirect(BASE_URL);

if (isset($_POST['action'])) {
  // EDIT FILE 'robots.txt'

  // EN: Default Variable
  // CZ: Hlavní proměnné
  $defaults = $_POST;

  // EN: Get value from 'textarea'
  // CZ: Získání hodnoty z 'textarea'
  $txtfile = $defaults['envo_file'];

  if (isset($_POST['save'])) {
    // EN: Create backup file
    // CZ: Zálohování souboru
    $file    = APP_PATH . "robots.txt";
    $newfile = APP_PATH . "robots.txt.backup";
    copy($file, $newfile);

    // EN: Write to 'robots.txt'
    // CZ: Zápis a uložení souboru 'robots.txt'
    if (!is_dir(APP_PATH) || !is_writable(APP_PATH)) {
      // EN: Error if directory doesn't exist or isn't writable.

    } elseif (is_file($file) && !is_writable($file)) {
      // EN: Error if the file exists and isn't writable.

    } else {
      // EN: All is success
      $content = stripslashes($txtfile);
      file_put_contents($file, $content);
    }
  }

  if (isset($_POST['reset'])) {

    // EN: Redirect page
    // CZ: Přesměrování stránky
    envo_redirect(BASE_URL . 'index.php?p=site-editor');

  }

}

// EN: Title and Description
// CZ: Titulek a Popis
$SECTION_TITLE = $tlsedi["siteedit_sec_title"]["set"];
$SECTION_DESC  = $tlsedi["siteedit_sec_desc"]["sed"];

// EN: Load the php template
// CZ: Načtení php template (šablony)
$plugin_template = 'plugins/site_editor/admin/template/site_editor.php';

?>