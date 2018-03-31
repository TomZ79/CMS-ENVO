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
$valid_videoextensions = array('wmv', 'mp4', 'mpg', 'avi');

// Upload image, creating thumbnails and insert data to DB
if (isset($_FILES['file']) && isset($_FILES['filethumb'])) {
  // Get the name of the videofile
  $videoname = $_FILES['file']['name'];
  // Get the name of the videofile thumbnail
  $videothumbname = $_FILES['filethumb']['name'];
  // Get the temp name of the videofile
  $tmp_videoname = $_FILES['file']['tmp_name'];
  // Get the temp name of the videofile thubnail
  $tmp_videothumbname = $_FILES['filethumb']['tmp_name'];
  // Get the size of the file
  $size = $_FILES['file']['size'];
  // Setting main video folder
  $mainfolder = $_REQUEST['folderpath'] . '/videos/';

  // -------- VIDEO ----------
  // Get uploaded file's extension and name
  $extvideo      = strtolower(pathinfo($videoname, PATHINFO_EXTENSION));
  $filevideoname = pathinfo($videoname, PATHINFO_FILENAME);
  // Can upload same videos using rand function
  $rand          = rand(1000, 1000000);
  $videoname = strtolower($rand . '_' . $filevideoname . '.' . $extvideo);
  // Setting video path
  $pathvideo = $mainfolder . $videoname;
  // Set Upload Video directory
  $pathivideofull = APP_PATH . ENVO_FILES_DIRECTORY . $pathvideo;

  // -------- IMAGE ----------
  $extthumb      = strtolower(pathinfo($videothumbname, PATHINFO_EXTENSION));
  $filevideothumbname = pathinfo($videoname, PATHINFO_FILENAME);
  // Can upload same videos thumbnail using rand function
  $rand          = rand(1000, 1000000);
  $videothumbname = strtolower($rand . '_' . $filevideothumbname . '.' . $extthumb);
  // Setting video thumbnail path
  $pathvideothumb = $mainfolder . $videothumbname;
  // Set Upload Video thumbnail directory
  $pathivideothumbfull = APP_PATH . ENVO_FILES_DIRECTORY . $pathvideothumb;

  // -------- UPLOAD ----------
  // Check's valid format
  if (in_array($extvideo, $valid_videoextensions)) {

    if (move_uploaded_file($tmp_videoname, $pathivideofull) && move_uploaded_file($tmp_videothumbname, $pathivideothumbfull)) {
      // UPLOAD VIDEOS TO SERVER

      // Insert info about image into DB
      $result = $envodb->query('INSERT ' . DB_PREFIX . 'intranethousevideo SET id = NULL, houseid = "' . $_REQUEST['houseID'] . '", shortdescription = "", description = "", filename = "' . $videoname . '", filenamethumb = "' . $videothumbname . '", mainfolder = "' . $mainfolder . '", category = "' . $_REQUEST['videoCategory'] . '", subcategory = "", timedefault = NOW(), timeedit = NOW()');

      // Get last row ID from DB
      $rowid = $envodb->envo_last_id();

      $data_array[] = array(
        'tmp_name'       => $tmp_videoname,
        'tmp_name_thumb' => $tmp_videothumbname
      );

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
      'status_msg' => 'Please upload only valid images ' . implode(", ", $valid_videoextensions) . '.'
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