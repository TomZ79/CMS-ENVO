<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_list_table_upload_docu.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../include/functions.php");

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-Type: application/json;charset=utf-8');

// PHP CODE and DB
//-------------------------

// Define variable
$data_array = array();

// Valid extensions
$valid_extensions = array(
  'doc',    // Legacy Word document; Microsoft Office refers to them as "Microsoft Word 97 - 2003 Document"
  'docx',   // Word document
  'docm',   // Word macro-enabled document
  'xls',    // Legacy Excel worksheets; officially designated "Microsoft Excel 97-2003 Worksheet"
  'xlsx',   // Excel workbook
  'xlsm',   // Excel macro-enabled workbook
  'pdf',    // Adobe Acrobat
  'ai'      // Adobe Illustrator
);

// Upload directory
$pathfull = APP_PATH . '/' . ENVO_FILES_DIRECTORY . $_REQUEST['folderpath'] . '/documents/';

if (isset($_FILES['file'])) {
  $filename = $_FILES['file']['name'];
  $tmp      = $_FILES['file']['tmp_name'];

  // Get uploaded file's extension
  $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

  // Can upload same image using rand function
  $final_file = strtolower(rand(1000, 1000000) . '_' . $filename);

  //
  $fullpath = $_REQUEST['folderpath'] . '/documents/' . $final_file;

  // Check's valid format
  if (in_array($ext, $valid_extensions)) {
    $pathfull = $pathfull . $final_file;

    if (move_uploaded_file($tmp, $pathfull)) {

      // Insert info about file into DB
      $envodb->query('INSERT ' . DB_PREFIX . 'int_houseanalyticsdocu SET id = NULL, houseid = "' . $_REQUEST['houseID'] . '", description = "", filename = "' . $filename . '", fullpath = "' . $fullpath . '", timedefault = NOW(), timeedit = NOW()');

      // Get all files for house
      $result = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'int_houseanalyticsdocu WHERE houseid = "' . $_REQUEST['houseID'] . '" ORDER BY id ASC');

      while ($row = $result->fetch_assoc()) {
        $data_array[] = array(
          'id'          => $row["id"],
          'description' => $row["description"],
          'fileicon'    => envo_extension_icon($row["filename"]),
          'fullpath'    => '/' . ENVO_FILES_DIRECTORY . $row["fullpath"]
        );
      }

      // Data for JSON
      $envodata = array(
        'status'     => 'upload_success',
        'status_msg' => 'File upload was successful.',
        'data'       => $data_array
      );

    } else {
      // Data for JSON
      $envodata = array(
        'status'     => 'upload_error_E03',
        'status_msg' => 'Unable to move file.'
      );
    }

  } else {
    // Data for JSON
    $envodata = array(
      'status'     => 'upload_error_E02',
      'status_msg' => 'Please upload only valid files ' . implode(", ", $valid_extensions) . '.'
    );

  }
} else {
  // Data for JSON
  $envodata = array(
    'status'     => 'upload_error_E01',
    'status_msg' => 'The uploaded file does not exist.'
  );
}

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>