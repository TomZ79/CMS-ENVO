<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$jakuser->jakModuleaccess(JAK_USERID, $jkv["accessmanage"])) jak_redirect(BASE_URL);

// Form 1-2
if (isset($_POST['action']) && $_POST['action'] == 'form1') {
  // Form 1 - Edit robots.txt

  // EN: Default Variable
  // CZ: Hlavní proměnné
  $defaults = $_POST;

  // Get value from Form 1
  $txtfile = $defaults['jak_file1'];

  if (isset($_POST['save1'])) {
    // Create backup file
    $file    = APP_PATH . "robots.txt";
    $newfile = APP_PATH . "robots.txt.backup";
    copy($file, $newfile);

    // Write to Robots.txt
    $content = stripslashes($txtfile);
    file_put_contents($file, $content);
  }

  if (isset($_POST['reset1'])) {

    // EN: Redirect page
    // CZ: Přesměrování stránky
    jak_redirect(BASE_URL . 'index.php?p=site-editor');

  }

}

// EN: Title and Description
// CZ: Titulek a Popis
$SECTION_TITLE = $tlsedi["siteedit_sec_title"]["set"];
$SECTION_DESC  = $tlsedi["siteedit_sec_desc"]["sed"];

// EN: Load the template
// CZ: Načti template (šablonu)
$plugin_template = 'plugins/site_editor/admin/template/site_editor.php';
?>