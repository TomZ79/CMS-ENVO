<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int2_table_delete_ent.php] => "config.php" not found');
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
$entID = $_POST['entID'];

// Define basic variable
$data_array = array ();

// Delete row in DB
$result = $envodb -> query('DELETE FROM ' . DB_PREFIX . 'int2_houseent WHERE id = "' . $entID . '"');

if ($result) {
	$data_array[] = array (
		'id' => $entID,
	);

	// Data for JSON
	$envodata = array (
		'status'     => 'delete_success',
		'status_msg' => 'Deleting the record from DB was successful',
		'data'       => $data_array
	);
} else {
	$data_array[] = array (
		'id' => $entID
	);

	// Data for JSON
	$envodata = array (
		'status'     => 'delete_error_E01',
		'status_msg' => 'Deleting the record from DB was incorrect',
		'data'       => $data_array
	);
}

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>