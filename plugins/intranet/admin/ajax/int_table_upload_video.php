<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_upload_img.php] => "config.php" not found');
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

// Define basic variable
$data_array = array();

// Valid the valid file extensions
$valid_extensions = array('wmv', 'mp4', 'mpg' , 'avi');

// Upload image, creating thumbnails and insert data to DB
if (isset($_FILES['file'])) {
  // Get the name of the file
  $name = $_FILES['file']['name'];
  // Get the temp name of the file
  $tmp_name = $_FILES['file']['tmp_name'];
  // Get the size of the file
  $size = $_FILES['file']['size'];

  // Get uploaded file's extension and name
  $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));
  $filename = pathinfo($name, PATHINFO_FILENAME);
  // Can upload same videso using rand function
  $rand          = rand(1000, 1000000);
  $name_original = strtolower($rand . '_' . $filename . '.' .  $ext);
  // Setting main video folder
  $mainfolder = $_REQUEST['folderpath'] . '/videos/';
  // Setting video path
  $pathimg_original = $mainfolder . $name_original;
  // Set Upload directory
  $pathimgfull_original = APP_PATH . ENVO_FILES_DIRECTORY . $pathimg_original;

  // Check's valid format
  if (in_array($ext, $valid_extensions)) {

    if (move_uploaded_file($tmp_name, $pathimgfull_original)) {
      // UPLOAD VIDEOS TO SERVER

      // Insert info about image into DB
      $result = $envodb->query('INSERT ' . DB_PREFIX . 'intranethousevideo SET id = NULL, houseid = "' . $_REQUEST['houseID'] . '", shortdescription = "", description = "", filename = "' . $name_original . '", mainfolder = "' . $mainfolder . '", category = "' . $_REQUEST['videoCategory'] . '", subcategory = "", timedefault = NOW(), timeedit = NOW()');

      // Get last row ID from DB
      $rowid = $envodb->envo_last_id();

      // Data for JSON
      $envodata = array(
        'status'     => 'upload_success',
        'status_msg' => 'Video upload was successful.',
        'data'       => $data_array
      );

    } else {
      // Data for JSON
      $envodata = array(
        'status'     => 'upload_error_E03',
        'status_msg' => 'Unable to move video.'
      );
    }

  } else {
    // Data for JSON
    $envodata = array(
      'status'     => 'upload_error_E02',
      'status_msg' => 'Please upload only valid images ' . implode(", ", $valid_extensions) . '.'
    );
  }
} else {
  // Data for JSON
  $envodata = array(
    'status'     => 'upload_error_E01',
    'status_msg' => 'The uploaded video does not exist.'
  );
}

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>