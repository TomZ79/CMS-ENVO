<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/tt_selectprogram_process.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Get value from ajax
// CZ: Získání dat z ajax
$type = $_POST['valType'];
$id   = $_POST['valID'];

$program_array = array ();

switch ($type) {
	case 'tv':

		// EN: Get data of TV Tower
		// CZ: Získání dat o televizních vysílačích
		$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'tvtowersidtv WHERE id IN (' . $id . ')');

		while ($row = $result -> fetch_assoc()) {

			$program_array['sid']  = $row['sid'];
			$program_array['name'] = $row['name'];

		}

		break;
	case 'radio':

		// EN: Get data of TV Tower
		// CZ: Získání dat o televizních vysílačích
		$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'tvtowersidr WHERE id IN (' . $id . ')');

		while ($row = $result -> fetch_assoc()) {

			$program_array['sid']  = $row['sid'];
			$program_array['name'] = $row['name'];

		}

		break;
	case 'service':

		// EN: Get data of TV Tower
		// CZ: Získání dat o televizních vysílačích
		$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'tvtowersids WHERE id IN (' . $id . ')');

		while ($row = $result -> fetch_assoc()) {

			$program_array['sid']  = $row['sid'];
			$program_array['name'] = $row['name'];

		}

		break;
	default:

}

echo json_encode($program_array);

?>