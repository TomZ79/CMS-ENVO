<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die('You cannot access this file directly.');

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID) jak_redirect(BASE_URL);

// If not super admin...
if (!JAK_SUPERADMINACCESS) jak_redirect(BASE_URL_ORIG);

$success = $errors = FALSE;

include_once('dbbackup/class.dbie.php');

$dbimpexp = new dbimpexp();

// Flag to select step
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $defaults = $_POST;

  // Execute Optinos
  if (isset($defaults['download'])) {

    $dbimpexp->addValue('download_path', '')->addValue('download', TRUE)->addValue('file_name', JAK_base::jakCleanurl($jkv["title"]) . '-' . date("y_m_d", time()) . '.xml')->export();
  }

  if (isset($defaults['import'])) {

    $xmlfiledb = $_FILES['uploaddb']['tmp_name'];

    $filename     = $_FILES['uploaddb']['name']; // original filename
    $tmpf         = explode(".", $filename);
    $jak_xtension = end($tmpf);

    if ($xmlfiledb && $jak_xtension == "xml") {

      $dbimpexp->addValue('import_path', $xmlfiledb)->import();

      $success['s'] = $tl['general']['g111'];
      $success      = $success;

    } else {

      $errors['e'] = $tl['error']['e39'];
      $errors      = $errors;

    }
  }

  if (isset($defaults['optimize'])) {

    $dbimpexp->optimize();

    $success['s'] = $tl['general']['g113'];
    $success      = $success;

  }

}

// EN: Title and Description
// CZ: Titulek a Popis
$SECTION_TITLE = $tl["mtn_sec_title"]["mtnt"];
$SECTION_DESC  = $tl["mtn_sec_desc"]["mtnd"];

// EN: Load the template
// CZ: Načti template (šablonu)
$template = 'maintenance.php';

?>