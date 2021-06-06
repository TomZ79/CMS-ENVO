<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/selectchannel.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Get value from ajax
// CZ: Získání dat z ajax
$transId = $_POST['transId'];
$ids     = implode(',', $transId);

// EN: Get data of TV Tower
// CZ: Získání dat o televizních vysílačích
$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'tvtowertvtower WHERE id IN (' . $ids . ')');

$tower_array   = array ();
$channel_array = array ();

while ($row = $result -> fetch_assoc()) {

	$tower = $row['id'];

	// EN: Get data of TV Channel
	// CZ: Získání dat o televizních kanálech
	$result1 = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'tvtowertvchannel WHERE towerid IN (' . $ids . ')');

	while ($row1 = $result1 -> fetch_assoc()) {

		if ($row1['towerid'] == $tower) {
			$tower_array[$row['station'] . ' - ' . $row['name']][$row1['number']] = array ();

			$channel_array['towerid']       = $row['id'];
			$channel_array['towername']     = $row['name'];
			$channel_array['channelid']     = $row1['id'];
			$channel_array['channelnumber'] = $row1['number'];

			array_push($tower_array[$row['station'] . ' - ' . $row['name']][$row1['number']], $channel_array);
		}

	}

}

echo json_encode($tower_array);

?>