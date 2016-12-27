<?php

// Include config path
include $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Base variable
$filedir = '/' . JAK_FILES_DIRECTORY . '/facebook/';
$filedirThumb = '/' . JAK_FILES_DIRECTORY . '/facebook/thumb/';


// Upload file to folder
$uploader = new Uploader();
$data = $uploader->upload($_FILES['files'], array(
  'limit' => 10, //Maximum Limit of files. {null, Number}
  'maxSize' => 10, //Maximum Size of files {null, Number(in MB's)}
  'extensions' => null, //Whitelist for file extension. {null, Array(ex: array('jpg', 'png'))}
  'required' => false, //Minimum one file is required for upload {Boolean}
  'uploadDir' => $_SERVER['DOCUMENT_ROOT'] . '/' . JAK_FILES_DIRECTORY . '/facebook/', //Upload directory {String}
  'title' => array('name'), //New file name {null, String, Array} *please read documentation in README.md
  'removeFiles' => true, //Enable file exclusion {Boolean(extra for jQuery.filer), String($_POST field name containing json data with file names)}
  'replace' => true, //Replace the file if it already exists  {Boolean}
  'perms' => null, //Uploaded file permisions {null, Number}
  'onCheck' => null, //A callback function name to be called by checking a file for errors (must return an array) | ($file) | Callback
  'onError' => null, //A callback function name to be called if an error occured (must return an array) | ($errors, $file) | Callback
  'onSuccess' => null, //A callback function name to be called if all files were successfully uploaded | ($files, $metas) | Callback
  'onUpload' => null, //A callback function name to be called if all files were successfully uploaded (must return an array) | ($file) | Callback
  'onComplete' => null, //A callback function name to be called when upload is complete | ($file) | Callback
  'onRemove' => null //A callback function name to be called by removing files (must return an array) | ($removed_files) | Callback
));

if ($data['isComplete']) {
  $files = $data['data'];

  // EN: Settings all the tables we need for our work
  // CZ: Nastavení všech tabulek, které potřebujeme pro práci
  $jaktable = DB_PREFIX . 'galleryfacebook';

  // Insert to DB
  $jakdb->query('INSERT INTO ' . $jaktable . ' SET id = NULL,  title = "' . $files['metas'][0]['name'] . '", paththumb = "' .   $filedirThumb . '", pathoriginal = "' . $filedir . '", size = "' . $files['metas'][0]['size'] . '", time = NOW()');

  // *** 1) Initialise / load image
  $file = $_SERVER['DOCUMENT_ROOT'] . '/' . JAK_FILES_DIRECTORY . '/facebook/' . $files['metas'][0]['name'];
  $resizeObj = new resize($file);

// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
  $resizeObj->resizeImage(200, 200, 'crop');

// *** 3) Save image ('image-name', 'quality [int]')
  $resizeObj->saveImage($_SERVER['DOCUMENT_ROOT'] . '/' . JAK_FILES_DIRECTORY . '/facebook/thumb/thumb_' . $files['metas'][0]['name'], 100);

  // Json output
  echo json_encode($files['metas'][0]['name']);
}

if ($data['hasErrors']) {
  $errors = $data['errors'];
  echo json_encode($errors);
}

exit;
?>
