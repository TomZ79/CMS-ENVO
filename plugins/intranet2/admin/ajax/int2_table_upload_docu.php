<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int2_table_upload_docu.php] => "config.php" not found');
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

// EN: Define variable
// CZ: Definice proměných
$data_array = array ();

// EN: List of allowed files by extensions
// CZ: Seznam povolených souborů podle přípony
$valid_extensions = array (
	'doc',    // Legacy Word document; Microsoft Office refers to them as "Microsoft Word 97 - 2003 Document"
	'docx',   // Word document
	'docm',   // Word macro-enabled document
	'xls',    // Legacy Excel worksheets; officially designated "Microsoft Excel 97-2003 Worksheet"
	'xlsx',   // Excel workbook
	'xlsm',   // Excel macro-enabled workbook
	'pdf',    // Adobe Acrobat
	'ai',     // Adobe Illustrator
	'jpg', 	  // JPG Image
	'jpeg',	  // JPEG Image
	'png',	  // PNG Image
);

// EN: Setting a folder to upload file
// CZ:
$pathfull = APP_PATH . '/' . ENVO_FILES_DIRECTORY . $_REQUEST['folderpath'] . '/documents/';

if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
	// Get the name of the file
	$name = $_FILES['file']['name'];
	// Get the temp name of the file
	$tmp_name      = $_FILES['file']['tmp_name'];
// Get the size of the file
	$size = $_FILES['file']['size'];

	// EN: Getting the extension of the uploaded file
	// CZ: Získání přípony uplodovaného souboru
	$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

	// EN: Rename a file - add a random number
	// CZ:
	$final_file = strtolower(rand(1000, 100000) . '_' . $name);

	// EN:
	$fullpath = $_REQUEST['folderpath'] . '/documents/' . $final_file;

	/**
	 * EN: Getting uploaded file info
	 * CZ:
	 * @mtime    $stat['mtime']  |  Last modified time as Unix timestamp
	 * @size    $stat['size']    |  Size in bytes
	 *
	 */
	$stat = stat($tmp_name);
	$time = $stat['mtime'];
	$size = $stat['size'];


	// Check's valid format
	if (in_array($ext, $valid_extensions)) {
		$pathfull = $pathfull . $final_file;

		if (move_uploaded_file($tmp_name, $pathfull)) {

			// Insert info about file into DB
			$envodb -> query('INSERT ' . DB_PREFIX . 'int2_housedocu SET id = NULL, houseid = "' . $_REQUEST['houseID'] . '", description = "' . $_REQUEST['description'] . '", fname = "' . $name . '", fullpath = "' . $fullpath . '", ftime = "' . $time . '", fsize = "' . $size . '", created = NOW(), updated = NOW()');

			// Get all files for house
			$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_housedocu WHERE houseid = "' . $_REQUEST['houseID'] . '" ORDER BY id ASC');

			while ($row = $result -> fetch_assoc()) {
				$data_array[] = array (
					'id'          => $row["id"],
					'description' => $row["description"],
					'ftime'       => $row["ftime"],
					'fsize'       => $row["fsize"],
					'ficon'       => envo_extension_icon($row["fname"]),
					'fullpath'    => '/' . ENVO_FILES_DIRECTORY . $row["fullpath"]
				);
			}

			// Data for JSON
			$envodata = array (
				'status'     => 'upload_success',
				'status_msg' => 'File upload was successful.',
				'data'       => $data_array
			);

		} else {
			// Data for JSON
			$envodata = array (
				'status'     => 'upload_error_E03',
				'status_msg' => 'Unable to move file.'
			);
		}

	} else {
		// Data for JSON
		$envodata = array (
			'status'     => 'upload_error_E02',
			'status_msg' => 'Please upload only valid files ' . implode(", ", $valid_extensions) . '.'
		);

	}
} else {
	// Data for JSON
	$envodata = array (
		'status'     => 'upload_error_E01',
		'status_msg' => 'The uploaded file does not exist. Please Select a File.'
	);
}

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>