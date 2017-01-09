<?php

// Include config path
include $_SERVER['DOCUMENT_ROOT'] . '/config.php';

/* BOOTSTRAP FILE INPUT UPLOADER
 * ===============================================================
 * EN: Settings for Bootstrap File Input HTML5 upload file
 * CZ: Nastavení pro Bootstrap File Input HTML5
 */

// 'images' refers to your file input name attribute
if (empty($_FILES['images'])) {
  echo json_encode(['error'=>'No files found for upload.']);
  // or you can throw an exception
  return; // terminate
}

// get the files posted
$images = $_FILES['images'];

// A flag to see if everything is ok
$success = null;

// File paths to store
$paths= [];

// Get file names
$filenames = $images['name'];

// Loop and process files
for($i=0; $i < count($filenames); $i++){
  $ext = explode('.', basename($filenames[$i]));
  $filename = md5(uniqid());
  $filenameext = $filename . "." . array_pop($ext);
  $target = $_SERVER['DOCUMENT_ROOT'] . '/' . JAK_FILES_DIRECTORY . '/facebook' . DIRECTORY_SEPARATOR . $filenameext ;

  if(move_uploaded_file($images['tmp_name'][$i], $target)) {
    $success = true;
    $paths[] = $target;
  } else {
    $success = false;
    break;
  }

  // Write data to DB and create thumbnail

  // EN: Base variable
  // CZ: Nastavení základních proměných
  $fileDir = '/' . JAK_FILES_DIRECTORY . '/facebook/';
  $fileDirThumb = '/' . JAK_FILES_DIRECTORY . '/facebook/thumb/';

  // EN: Settings all the tables we need for our work
  // CZ: Nastavení všech tabulek, které potřebujeme pro práci
  $jaktable = DB_PREFIX . 'galleryfacebook';

  /* Get image data
   * Example:
   * $info   = getimagesize($_FILES['image']);
   * $mime   = $info['mime']; // mime-type as string for ex. "image/jpeg" etc.
   * $width  = $info[0];      // width as integer for ex. 512
   * $height = $info[1];      // height as integer for ex. 384
   * $type   = $info[2];      // same as exif_imagetype
  */

  $imagesize  = getimagesize($target);

  // EN: Insert to DB
  // CZ: Zápis dat do DB
  $jakdb->query('INSERT INTO ' . $jaktable . ' SET id = NULL,  title = "' . $filenameext . '", paththumb = "' . $fileDirThumb . '", pathoriginal = "' . $fileDir . '", width = "' . $imagesize[0] . '", height = "' . $imagesize[1] . '",  size = "' . filesize($target) . '", time = NOW()');

  // *** 1) Initialise / load image
  $file = $_SERVER['DOCUMENT_ROOT'] . '/' . JAK_FILES_DIRECTORY . '/facebook/' . $filenameext;
  $resizeObj = new resize($file);

  // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
  $resizeObj->resizeImage(200, 200, 'crop');

  // *** 3) Save image ('image-name', 'quality [int]')
  $resizeObj->saveImage($_SERVER['DOCUMENT_ROOT'] . '/' . JAK_FILES_DIRECTORY . '/facebook/thumb/thumb_' . $filenameext, 100);

}

// check and process based on successful status
if ($success === true) {
  // call the function to save all data to database
  // code for the following function `save_data` is not
  // mentioned in this example

  // save_data($userid, $username, $paths);

    // store a successful response (default at least an empty array). You
  // could return any additional response info you need to the plugin for
  // advanced implementations.
  $output = ['uploaded' => $paths];
  // for example you can get the list of files uploaded this way
  // $output = ['uploaded' => $paths];
} elseif ($success === false) {
  $output = ['error'=>'Error while uploading images. Contact the system administrator'];
  // delete any uploaded files
  foreach ($paths as $file) {
    unlink($file);
  }
} else {
  $output = ['error'=>'No files were processed.'];
}

// return a json encoded response for plugin to process successfully
echo json_encode($output);
?>