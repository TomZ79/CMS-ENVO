<?php


// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/fileuploader_list_upload_img.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// PHP CODE and DB
//-------------------------

// Include the class.fileuploader.php
include('../plugins/fileuploader/2.0/src/class.fileuploader.php');

// EN: Get value from ajax
// CZ: Získání dat z ajax
$houseID = $_POST['houseID'];

// Set variable
$envodata = array ();

if (isset($_FILES['files'])) {
  // Upload - files exists

  // Get house data
  $result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int_houselist WHERE id = "' . $houseID . '" LIMIT 1');
  $row    = $result -> fetch_assoc();

  $housefolder = $row['folder'];

  // Initialize FileUploader
  $fileInput    = 'files';
  $FileUploader = new FileUploader($fileInput, array (
    // upload directory {String}
    // note that main directory is the directory where you are initializing the FileUploader class
    // example: '../uploads/'
    'uploadDir' => APP_PATH . ENVO_FILES_DIRECTORY . $housefolder . '/images/',
    // file title {String, Array}
    // example: 'name' - original file name
    // example: 'auto' - random text from 12 letters
    // example: 'my_custom_filename' - custom file name
    // example: 'my_custom_filename_{random}' - my_custom_filename_(+ random text from 12 letters)
    // '{random} {file_name} {file_size} {timestamp} {date} {extension}' - variables that can be used to generate a new file name
    // example: array('auto', 24) - [0] is a string as in the examples above, [1] is the length of the random string
    'title'     => '{random}_original'
  ));

  // Call to upload the files and return array
  $upload = $FileUploader -> upload();

  // Data for JSON
  $envodata['housefolder'] = APP_PATH . ENVO_FILES_DIRECTORY . $housefolder . '/images/';
  $envodata['houseID']     = $houseID;
  $envodata['message']     = 'Success:&nbsp;The <a href="#" class="link">files</a> has been uploaded.';
  $envodata                = array_merge($envodata, $upload);

  //
  // loop to get individual element from the array
  foreach ($upload as $key => $value) {
    for ($i = 0; $i < count($value); $i++) {

      $shortname  = str_replace('_original', '', $value[$i]['name']);
      $thumbname  = str_replace('_original', '_thumbs', $value[$i]['name']);
      $mainfolder = APP_PATH . ENVO_FILES_DIRECTORY . $housefolder . '/images/';

      // If image have EXIF data
      $exifData = @exif_read_data($mainfolder . $value[$i]['name']);
      // Exif data for DB
      $exifmake        = $exifData['Make'];
      $exifmodel       = $exifData['Model'];
      $exifsoftware    = $exifData['Software'];
      $exifimagewidth  = $exifData['ExifImageWidth'];
      $exifimageheight = $exifData['ExifImageLength'];
      $exiforientation = $exifData['Orientation'];
      $exifcreatedate  = $exifData['DateTimeOriginal'];

      // Get Default time
      if ($exifcreatedate > 0) {
        // If exists 'Exif create date'
        $timedefault = $exifcreatedate;
      } else {
        // If not exists 'Exif create date'
        $timedefault = date('Y-m-d H:i:s');
      }

      // Insert info about image into DB
      // $result = $envodb -> query('INSERT ' . DB_PREFIX . 'int_houselistimg SET id = NULL, houseid = "' . $houseID . '", shortdescription = "", description = "", filenameoriginal = "' . $value[$i]['name'] . '", filenamethumb = "' . $thumbname . '", sizeoriginal = "' . $value[$i]['size'] . '", sizethumb = "", widthoriginal = "' . $exifimagewidth . '", heightoriginal = "' . $exifimageheight . '", widththumb = "", heightthumb = "", mainfolder = "' . $mainfolder . '", category = "", subcategory = "", timedefault = "' . $timedefault . '", timeupload = NOW(), timeedit = NOW(), exifmake = "' . $exifmake . '", exifmodel = "' . $exifmodel . '", exifsoftware = "' . $exifsoftware . '", exifimagewidth = "' . $exifimagewidth . '", exifimageheight = "' . $exifimageheight . '", exiforientation = "' . $exiforientation . '", exifcreatedate = "' . $exifcreatedate . '"');

      //
      $data_array[$i] = array (
        'file'            => $value[$i]['file'],
        'name'            => $value[$i]['name'],
        'shortname'       => $shortname,
        'thumbname'       => $thumbname,
        'size'            => $value[$i]['size'],
        'size2'           => $value[$i]['size2'],
        'exifmake'        => $exifmake,
        'exifmodel'       => $exifmodel,
        'exifsoftware'    => $exifsoftware,
        'exifimagewidth'  => $exifimagewidth,
        'exifimageheight' => $exifimageheight,
        'exiforientation' => $exiforientation,
        'exifcreatedate'  => $exifcreatedate,
      );

      $envodata['envofiles'] = $data_array;
    }
  }

} else {
  // Upload - files not exists

  // Data for JSON
  $envodata = array (
    'houseID'     => $houseID,
    'hasWarnings' => true,
    'isSuccess'   => false,
    'warnings'    => array (),
    'message'     => 'Warning:&nbsp;Insert <a href="#" class="link"> the files</a> for uploading.'
  );
}


// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

exit;