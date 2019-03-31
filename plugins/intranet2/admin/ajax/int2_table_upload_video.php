<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int2_table_upload_img.php] => "config.php" not found');
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
$data_array = array ();

// Set basic value

// Max dimensions of video thumbnail
$maxDimens = 800;

// Compress quality of video thumbnail
// Ranges from 0 (worst quality, smaller file) to 100 (best quality, biggest file)
$compress = 70;

// Valid the valid video thumbs file extensions
$valid_imgextensions = array ('jpg', 'jpeg', 'png', 'gif');

// Valid the valid video file extensions
$valid_videoextensions = array ('wmv', 'mp4', 'mpg', 'avi');

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
	$rand      = rand(1000, 1000000);
	$videoname = strtolower($rand . '_' . $filevideoname . '_video.' . $extvideo);
	// Setting video path
	$pathvideo = $mainfolder . $videoname;
	// Set Upload Video directory
	$pathivideofull = APP_PATH . ENVO_FILES_DIRECTORY . $pathvideo;

	// -------- IMAGE ----------
	$extthumb           = strtolower(pathinfo($videothumbname, PATHINFO_EXTENSION));
	$filevideothumbname = pathinfo($videoname, PATHINFO_FILENAME);
	// Can upload same videos thumbnail using rand function
	$videothumbname = strtolower($filevideothumbname . '_thumbs');
	// Setting video thumbnail path
	$pathvideothumb = $mainfolder . $videothumbname . '.' . $extthumb;
	// Set Upload Video thumbnail directory
	$pathivideothumbfull = APP_PATH . ENVO_FILES_DIRECTORY . $pathvideothumb;
	//  The dimensions with the file type and a height/width - video thumbs
	list($width_o, $height_o, $type, $attr) = getimagesize($tmp_videothumbname);
	$ratio = $width_o / $height_o;

	/**
	 * EN: Getting uploaded file info
	 * CZ:
	 * @time     $stat['mtime']  |  Last modified time as Unix timestamp
	 * @size     $stat['size']   |  Size in bytes
	 *
	 */
	$stat = stat($tmp_videoname);
	$time = $stat['mtime'];
	$size = $stat['size'];

	// -------- UPLOAD ----------
	// Check's valid format
	if (in_array($extvideo, $valid_videoextensions)) {

		// Check's valid video thumbs format
		if (in_array($extthumb, $valid_imgextensions)) {

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
			switch ($extthumb) {
				case 'jpg':
				case 'jpeg':

					// Fix for JPEG warnings for PHP smaller than 7.1.0 - Invalid SOS parameters for sequential JPEG
					// For PHP 7.1.0 - The default of gd.jpeg_ignore_warning has been changed from 0 to 1.
					ini_set('gd.jpeg_ignore_warning', 1);

					// Get image from file
					$src = imagecreatefromjpeg($tmp_videothumbname);

					break;
				case 'png':

					// Get image from file
					$src = imagecreatefrompng($tmp_videothumbname);

					break;
				case 'gif':

					// Get image from file
					$src = imagecreatefromgif($tmp_videothumbname);

					break;
			}

			// CREATE THUMBNAIL - COVNERT IMAGE TO JPG

			// Fix for JPEG warnings for PHP smaller than 7.1.0 - Invalid SOS parameters for sequential JPEG
			// For PHP 7.1.0 - The default of gd.jpeg_ignore_warning has been changed from 0 to 1.
			ini_set('gd.jpeg_ignore_warning', 1);

			// Create a new thumbnail image
			$tmp = imagecreatetruecolor($width_n, $height_n);

			// Copy and resize part of an image with resampling
			imagecopyresampled($tmp, $src, 0, 0, 0, 0, $width_n, $height_n, $width_o, $height_o);

			// Output the image - imagejpeg( $resource_image, $destination, $quality )
			imagejpeg($tmp, APP_PATH . ENVO_FILES_DIRECTORY . $mainfolder . $videothumbname . '.jpg', $compress);

			// Free memory - destroy an image
			imagedestroy($src);
			imagedestroy($tmp);

			if (move_uploaded_file($tmp_videoname, $pathivideofull)) {
				// UPLOAD VIDEOS TO SERVER

				// Insert info about image into DB
				$result = $envodb -> query('INSERT ' . DB_PREFIX . 'int2_housevideo SET 
																		id = NULL,
																		houseid = "' . $_REQUEST['houseID'] . '",
																		shortdescription = "' . smartsql($_REQUEST['videoSdesc']) . '",
																		description = "",
																		filename = "' . $videoname . '",
																		filenamethumb = "' . $videothumbname . '.jpg",
																		mainfolder = "' . $mainfolder . '",
																		category = "' . smartsql($_REQUEST['videoCat']) . '",
																		subcategory = "",
																		ftime = "' . smartsql($time) . '",
																		fsize = "' . smartsql($size) . '",
																		created = NOW(),
																		updated = NOW()');

				// Get last row ID from DB
				$rowid = $envodb -> envo_last_id();

				// Getting info uploaded image from DB
				$result1 = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_housevideo WHERE id = "' . $rowid . '"');
				$row1    = $result1 -> fetch_assoc();

				$data_array[] = array (
					'id'               => $row1["id"],
					'shortdescription' => $row1["shortdescription"],
					'description'      => $row1["description"],
					'filename'         => $row1["filename"],
					'filenamethumb'    => $row1["filenamethumb"],
					'filepath'         => '/' . ENVO_FILES_DIRECTORY . $row1["mainfolder"] . $row1["filename"],
					'filethumbpath'    => '/' . ENVO_FILES_DIRECTORY . $row1["mainfolder"] . $row1["filenamethumb"],
					'category'         => $row1["category"],
					'created'          => $row1["created"],
					'updated'          => $row1["updated"],
				);

				// Data for JSON
				$envodata = array (
					'status'     => 'upload_success',
					'status_msg' => 'Video upload was successful.',
					'data'       => $data_array
				);

			} else {
				// Data for JSON
				$envodata = array (
					'status'     => 'upload_error_E03',
					'status_msg' => 'Unable to move video.'
				);
			}

		} else {
			// Data for JSON
			$envodata = array (
				'status'     => 'upload_error_E04',
				'status_msg' => 'Please upload only valid video thumbnails ' . implode(", ", $valid_imgextensions) . '.'
			);
		}

	} else {
		// Data for JSON
		$envodata = array (
			'status'     => 'upload_error_E02',
			'status_msg' => 'Please upload only valid video ' . implode(", ", $valid_videoextensions) . '.'
		);
	}
} else {
	// Data for JSON
	$envodata = array (
		'status'     => 'upload_error_E01',
		'status_msg' => 'The uploaded video or thubnails does not exist.'
	);
}

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>