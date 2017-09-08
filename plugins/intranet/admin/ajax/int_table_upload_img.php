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

// Set basic value

// Min dimensions of uploaded image
$minDimens = 800;

// Max dimensions of thumbnail
$maxDimens = 1200;

// Compress quality of image
// Ranges from 0 (worst quality, smaller file) to 100 (best quality, biggest file)
$compress = 80;

// Valid the valid file extensions
$valid_extensions = array('jpg', 'jpeg', 'png', 'gif');

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
  // Can upload same image using rand function for original image and thumbs
  $rand          = rand(1000, 1000000);
  $name_original = strtolower($rand . '_' . $filename . '_original.' . $ext);
  $name_thumbs   = strtolower($rand . '_' . $filename . '_thumbs.' . $ext);
  // Setting main image folder
  $mainfolder = $_REQUEST['folderpath'] . '/images/';
  // Setting image path - original and thumbs
  $pathimg_original = $mainfolder . $name_original;
  $pathimg_thumbs   = $mainfolder . $name_thumbs;
  // Set Upload directory - original and thumbs
  $pathimgfull_original = APP_PATH . JAK_FILES_DIRECTORY . $pathimg_original;
  $pathimgfull_thumbs   = APP_PATH . JAK_FILES_DIRECTORY . $pathimg_thumbs;
  //  The dimensions with the file type and a height/width - thumbs
  list($width_o, $height_o, $type, $attr) = getimagesize($tmp_name);

  // Check's dimensions of uploaded image
  if ($width_o > $minDimens || $height_o > $minDimens) {

    // Check's valid format
    if (in_array($ext, $valid_extensions)) {

      if (move_uploaded_file($tmp_name, $pathimgfull_original)) {
        // CREATE THUMBNAIL - COVNERT IMAGE TO JPG

        // Set variable, get images size
        // The getimagesize() function is used to find the size of any given image file and return the dimensions along with the file type
        $thumbs_file   = $pathimgfull_thumbs;
        $original_file = $pathimgfull_original;
        list($width_o, $height_o) = getimagesize($original_file);
        $ratio = $width_o / $height_o;

        // If image have EXIF data
        $exifData = @exif_read_data($original_file);
        // Exif data for DB
        $exifmake        = $exifData['Make'];
        $exifmodel       = $exifData['Model'];
        $exifsoftware    = $exifData['Software'];
        $exifimagewidth  = $exifData['ExifImageWidth'];
        $exifimageheight = $exifData['ExifImageLength'];
        $exiforientation = $exifData['Orientation'];
        $exifcreatedate  = $exifData['CreateDate'];
        // Fix Orientation Function
        function rotateExif($imagesource, $orientation)
        {
          if (!empty($orientation)) {
            switch ($orientation) {
              case 1:
                // Horizontal (normal)
                $image = $imagesource;
                break;
              case 2:
                // Mirror horizontal

                break;
              case 3:
                // Rotate 180
                $image = imagerotate($imagesource, 180, 0);
                break;
              case 4:
                // Mirror vertical

                break;
              case 5:
                // Mirror horizontal and rotate 270 CW

                break;
              case 6:
                // Rotate 90 CW
                $image = imagerotate($imagesource, -90, 0);
                break;
              case 7:
                // Mirror horizontal and rotate 90 CW

                break;
              case 8:
                // Rotate 270 CW
                $image = imagerotate($imagesource, 90, 0);
                break;
              default:
                $image = $imagesource;
            }
          }

          return $image;
        }

        // Set image new dimensions
        if ($width_o > $maxDimens || $height_o > $maxDimens) {

          if ($ratio > 1) {
            // widht > height
            if ($width_o > $height_o) {
              // Landscape (Na šířku)
              $width_n  = $maxDimens;
              $height_n = $maxDimens / $ratio;
            }
          } else if ($ratio < 1) {
            // width < height
            if ($width_o < $height_o) {
              // Portrait (Na výšku)
              $width_n  = $maxDimens * $ratio;
              $height_n = $maxDimens;
            }
          } else {
            // width == height
            $width_n  = $maxDimens;
            $height_n = $maxDimens;
          }

        } else {
          if ($ratio > 1) {
            // widht > height
            if ($width_o > $height_o) {
              // Landscape (Na šířku)
              $width_n  = $maxDimens;
              $height_n = $maxDimens / $ratio;
            }
          } else if ($ratio < 1) {
            // width < height
            if ($width_o < $height_o) {
              // Portrait (Na výšku)
              $width_n  = $maxDimens * $ratio;
              $height_n = $maxDimens;
            }
          } else {
            // width == height
            $width_n  = $width_o;
            $height_n = $height_o;
          }

        }

        // Resize output image file from the given image
        switch ($ext) {
          case 'jpg':
          case 'jpeg':

            // Get image from file
            $src = imagecreatefromjpeg($original_file);

            // Create a new thumbnail image
            $dst = imagecreatetruecolor($width_n, $height_n);

            // Copy and resize part of an image with resampling
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $width_n, $height_n, $width_o, $height_o);

            // Rotate image if image have Exif Data
            if (!empty($exiforientation)) {
              $dst = rotateExif($dst, $exiforientation);
            }

            // Output the image - imagejpeg( $resource_image, $destination, $quality )
            imagejpeg($dst, $thumbs_file, $compress);

            break;
          case 'png':

            // Get image from file
            $src = imagecreatefrompng($original_file);

            // Create a new thumbnail image
            $dst = imagecreatetruecolor($width_n, $height_n);

            // Preserve transparency
            imagecolortransparent($dst, imagecolorallocatealpha($dst, 0, 0, 0, 127));
            imagealphablending($dst, FALSE);
            imagesavealpha($dst, TRUE);

            // Copy and resize part of an image with resampling
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $width_n, $height_n, $width_o, $height_o);

            // Output the image - imagepng ( $resource_image, $destination )
            imagepng($dst, $thumbs_file);

            break;
          case 'gif':

            // Get image from file
            $src = imagecreatefromgif($original_file);

            // Create a new thumbnail image
            $dst = imagecreatetruecolor($width_n, $height_n);

            // Preserve transparency
            imagecolortransparent($dst, imagecolorallocatealpha($dst, 0, 0, 0, 127));
            imagealphablending($dst, FALSE);
            imagesavealpha($dst, TRUE);

            // Copy and resize part of an image with resampling
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $width_n, $height_n, $width_o, $height_o);

            // Output the image - imagegif  ( $resource_image, $destination )
            imagegif($dst, $thumbs_file);

            break;
        }

        // Free memory - destroy an image
        imagedestroy($src);
        imagedestroy($dst);

        // Insert info about image into DB
        $result = $jakdb->query('INSERT ' . DB_PREFIX . 'intranethouseimg SET id = NULL, houseid = "' . $_REQUEST['houseID'] . '", shortdescription = "", description = "", filenameoriginal = "' . $name_original . '", filenamethumb = "' . $name_thumbs . '", widthoriginal = "' . $width_o . '", heightoriginal = "' . $height_o . '", widththumb = "' . $width_n . '", heightthumb = "' . $height_n . '", mainfolder = "' . $mainfolder . '", category = "' . $_REQUEST['imageCategory'] . '", subcategory = "", timedefault = NOW(), timeedit = NOW(), exifmake = "' . $exifmake . '", exifmodel = "' . $exifmodel . '", exifsoftware = "' . $exifsoftware . '", exifimagewidth = "' . $exifimagewidth . '", exifimageheight = "' . $exifimageheight . '", exiforientation = "' . $exiforientation . '", exifcreatedate = "' . $exifcreatedate . '"');

        // Get last row ID from DB
        $rowid = $jakdb->jak_last_id();

        // Getting info uploaded image from DB
        $result1 = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'intranethouseimg WHERE id = "' . $rowid . '"');
        $row1    = $result1->fetch_assoc();

        $data_array[] = array(
          'id'              => $row1["id"],
          'shortdescription'     => $row1["shortdescription"],
          'description'     => $row1["description"],
          'filenamethumb'   => $row1["filenamethumb"],
          'filethumbpath'   => '/' . JAK_FILES_DIRECTORY . $row1["mainfolder"] . $row1["filenamethumb"],
          'category'        => $row1["category"],
          'exifmake'        => $row1["exifmake"],
          'exifmodel'       => $row1["exifmodel"],
          'exifsoftware'    => $row1["exifsoftware"],
          'exifimagewidth'  => $row1["exifimagewidth"],
          'exifimageheight' => $row1["exifimageheight"],
          'exiforientation' => $row1["exiforientation"],
          'exifcreatedate'  => $row1["exifcreatedate"],
          'timedefault'     => $row1["timedefault"],
          'timeedit'        => $row1["timeedit"],
        );

        // Data for JSON
        $envodata = array(
          'status'     => 'upload_success',
          'status_msg' => 'Image upload was successful.',
          'data'       => $data_array
        );

      } else {
        // Data for JSON
        $envodata = array(
          'status'     => 'upload_error_E04',
          'status_msg' => 'Unable to move image.'
        );
      }

    } else {
      // Data for JSON
      $envodata = array(
        'status'     => 'upload_error_E03',
        'status_msg' => 'Please upload only valid images ' . implode(", ", $valid_extensions) . '.'
      );
    }

  } else {
    // Data for JSON
    $envodata = array(
      'status'     => 'upload_error_E02',
      'status_msg' => 'Minimum image dimensions is ' . $minDimens . ' px'
    );
  }
} else {
  // Data for JSON
  $envodata = array(
    'status'     => 'upload_error_E01',
    'status_msg' => 'The uploaded image does not exist.'
  );
}

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>