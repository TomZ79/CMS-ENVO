<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int2_table_update_img.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-Type: application/json;charset=utf-8');

// PHP CODE and DB
//-------------------------

// EN: Get value from ajax
// CZ: Získání dat z ajax
$imageID = $_POST['imageID'];

// Define basic variable
$data_array = array ();

// Delete file from folder
$result = $envodb -> query('SELECT filenameoriginal, filenamethumb, mainfolder FROM ' . DB_PREFIX . 'int2_houseimg WHERE id = "' . $imageID . '" LIMIT 1');
$row    = $result -> fetch_assoc();

// EN: Determine the number of rows in the result from DB
// CZ: Určení počtu řádků ve výsledku z DB
$row_cntA = $result -> num_rows;

if ($row_cntA > 0) {

	$deletefiles[] = APP_PATH . ENVO_FILES_DIRECTORY . $row['mainfolder'] . $row['filenameoriginal'];
	$deletefiles[] = APP_PATH . ENVO_FILES_DIRECTORY . $row['mainfolder'] . $row['filenamethumb'];
	foreach ($deletefiles as $files) {
		unlink(realpath($files));
	}

// Delete row in DB
	$result = $envodb -> query('DELETE FROM ' . DB_PREFIX . 'int2_houseimg WHERE id = "' . $imageID . '"');

	if ($result) {
		$data_array[] = array (
			'id' => $imageID,
		);

		// Data for JSON
		$envodata = array (
			'status'      => 'delete_success',
			'status_msg'  => 'Deleting the record from DB was successful',
			'status_info' => '',
			'data'        => $data_array
		);
	} else {
		$data_array[] = array (
			'id' => $imageID
		);

		// Data for JSON
		$envodata = array (
			'status'      => 'delete_error_E02',
			'status_msg'  => 'Deleting the record from DB was incorrect',
			'status_info' => '',
			'data'        => $data_array
		);
	}

} else {

	$data_array[] = array (
		'id' => $imageID
	);

	// Data for JSON
	$envodata = array (
		'status'      => 'delete_error_E01',
		'status_msg'  => 'Deleting the record from DB was incorrect',
		'status_info' => 'Nebyl nalezen požadovaný záznam v DB.',
		'data'        => $data_array
	);

}


// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>