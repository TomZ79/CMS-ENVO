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
$imageID        = $_POST['imageID'];
$descImage      = $_POST['descImage'];
$shortdescImage = $_POST['shortdescImage'];
$catImage       = $_POST['catImage'];

// Define basic variable
$data_array = array ();

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$envo_setting_val = envo_get_setting_val('intranet2');
$dateformat       = $envo_setting_val['int2dateformat'];

// Update row in DB
$envodb -> query('UPDATE ' . DB_PREFIX . 'int2_houseimg SET 
									shortdescription = "' . smartsql($shortdescImage) . '",
									description = "' . smartsql($descImage) . '",
									category = "' . smartsql($catImage) . '",
									updated = NOW()
									WHERE id = "' . smartsql($imageID) . '"');

// Getting info from DB
$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_houseimg WHERE id = "' . $imageID . '"');
$row    = $result -> fetch_assoc();

$data_array[] = array (
	'id'                    => $row["id"],
	'shortdescription'      => $row["shortdescription"],
	'exifcreatedate_format' => date($dateformat, strtotime($row["exifcreatedate"])),
	'updated'               => $row["updated"],
	'category'              => $row["category"]
);

// Data for JSON
$envodata = array (
	'status'     => 'update_success',
	'status_msg' => 'Saving data was successful.',
	'data'       => $data_array
);

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>