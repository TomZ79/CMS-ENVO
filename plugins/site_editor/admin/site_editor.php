<?php

// Check if the file is accessed only via index.php if not stop the script from running
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die('You cannot access this file directly.');

// Check if the user has access to this file
if (!JAK_USERID || !$jakuser->jakModuleaccess(JAK_USERID, $jkv["accessmanage"])) jak_redirect(BASE_URL);

// Form 1-2
if (isset($_POST['action']) && $_POST['action'] == 'form1') {
  // Form 1 - Edit robots.txt
  $defaults = $_POST;

  // Get value from Form 1
  $txtfile = $defaults['jak_file1'];

  if (isset($_POST['save1'])) {
    // Create backup file
    $file = APP_PATH . "robots.txt";
    $newfile = APP_PATH . "robots.txt.backup";
    copy($file, $newfile);

    // Write to Robots.txt
    $content = stripslashes($txtfile);
    file_put_contents($file, $content);
  }

  if (isset($_POST['reset1'])) {

    jak_redirect(BASE_URL . 'index.php?p=site_editor');

  }

}

// Title and Description
$SECTION_TITLE = $tlsedi["siteedit"]["m1"];
$SECTION_DESC = $tlsedi["siteedit"]["t"];

// Call the template
$plugin_template = 'plugins/site_editor/admin/template/site_editor.php';
?>