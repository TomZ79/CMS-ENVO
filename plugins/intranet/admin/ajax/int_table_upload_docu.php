<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_upload_docu.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

header("Content-Type: application/json;charset=utf-8");

// PHP UPLOAD FILE
//-------------------------

// Define variable
$myarray = array();

// Valid extensions
$valid_extensions = array(
  'doc',    // Legacy Word document; Microsoft Office refers to them as "Microsoft Word 97 - 2003 Document"
  'docx',   // Word document
  'docm',   // Word macro-enabled document
  'xls',    // Legacy Excel worksheets; officially designated "Microsoft Excel 97-2003 Worksheet"
  'xlsx',   // Excel workbook
  'xlsm',   // Excel macro-enabled workbook
  'pdf'
);

// Upload directory
$pathfull = APP_PATH . '/' . JAK_FILES_DIRECTORY . $_REQUEST['folderdocumentspath'] . '/documents/';

if (isset($_FILES['file'])) {
  $file = $_FILES['file']['name'];
  $tmp = $_FILES['file']['tmp_name'];

  // Get uploaded file's extension
  $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

  // Can upload same image using rand function
  $final_file = strtolower(rand(1000, 1000000) . '_' . $file);

  //
  $filepath = $_REQUEST['folderdocumentspath'] . '/documents/' . $final_file;

  // Check's valid format
  if (in_array($ext, $valid_extensions)) {
    $pathfull = $pathfull . $final_file;

    if (move_uploaded_file($tmp, $pathfull)) {

      //
      $jakdb->query('INSERT ' . DB_PREFIX . 'intranethousedocu SET id = NULL, houseid = "' . $_REQUEST['houseID'] . '", description = "", filepath = "' . $filepath . '"');

      //
      $result = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'intranethousedocu WHERE houseid = "' . $_REQUEST['houseID'] . '" ORDER BY id ASC');

      while ($row = $result->fetch_assoc()) {
        $myarray[] = array(
          'id'          => $row["id"],
          'description' => $row["description"],
          'filepath'    => $row["filepath"]
        );
      }

      // Data for JSON
      $envodata = array(
        'status'     => 'upload_success',
        'status_msg' => 'File Upload successfull.',
        'data'       => $myarray
      );

    } else {
      // Data for JSON
      $envodata = array(
        'status'     => 'upload_error_E03',
        'status_msg' => 'Unable to move image.'
      );
    }

  } else {
    // Data for JSON
    $envodata = array(
      'status'     => 'upload_error_E02',
      'status_msg' => 'Please upload only valid files ' . implode(", ",$valid_extensions) . '.'
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