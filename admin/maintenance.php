<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID) envo_redirect(BASE_URL);

// If not super admin...
if (!ENVO_SUPERADMINACCESS) envo_redirect(BASE_URL_ORIG);

$success = $errors = FALSE;

include_once('dbbackup/class.dbie.php');

$dbimpexp = new dbimpexp();

// Flag to select step
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // EN: Default Variable
  // CZ: Hlavní proměnné
  $defaults = $_POST;

  // Execute Optinos
  if (isset($defaults['download'])) {

    $dbimpexp->addValue('download_path', '')->addValue('download', TRUE)->addValue('file_name', ENVO_base::envoCleanurl($setting["title"]) . '-' . date("y_m_d", time()) . '.xml')->export();
  }

  if (isset($defaults['import'])) {

    $xmlfiledb = $_FILES['uploaddb']['tmp_name'];

    $filename     = $_FILES['uploaddb']['name']; // original filename
    $tmpf         = explode(".", $filename);
    $envo_xtension = end($tmpf);

    if ($xmlfiledb && $envo_xtension == "xml") {

      $dbimpexp->addValue('import_path', $xmlfiledb)->import();

      $success['s'] = $tl['general_error']['generror51'] . '<br>';
      $success      = $success;

    } else {

      $errors['e'] = $tl['general_error']['generror50'] . '<br>';
      $errors      = $errors;

    }
  }

  if (isset($defaults['optimize'])) {

    $dbimpexp->optimize();

    $success['s'] = $tl['general_error']['generror52'] . '<br>';
    $success      = $success;

  }

}

// EN: Title and Description
// CZ: Titulek a Popis
$SECTION_TITLE = $tl["mtn_sec_title"]["mtnt"];
$SECTION_DESC  = $tl["mtn_sec_desc"]["mtnd"];

// EN: Load the php template
// CZ: Načtení php template (šablony)
$template = 'maintenance.php';

?>