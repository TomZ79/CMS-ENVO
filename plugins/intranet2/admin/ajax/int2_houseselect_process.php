<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int2_houseselect_process.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Get value from ajax
// CZ: Získání dat z ajax
$id = $_POST['valID'];

$house_array = array ();

// EN: Get data of TV Tower
// CZ: Získání dat o televizních vysílačích
$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_house WHERE id IN (' . $id . ')');

while ($row = $result -> fetch_assoc()) {

	$house_array['name']             = $row['name'];
	$house_array['headquarters']     = $row['headquarters'];
	$house_array['street']           = $row['street'];
	$house_array['city']             = $row['city'];
	$house_array['cityarea']         = $row['cityarea'];
	$house_array['psc']              = $row['psc'];
	$house_array['ic']               = $row['ic'];
	$house_array['state']            = $row['state'];
	$house_array['housefname']       = $row['housefname'];
	$house_array['housefstreet']     = $row['housefstreet'];
	$house_array['housefcity']       = $row['housefcity'];
	$house_array['housefpsc']        = $row['housefpsc'];
	$house_array['housefic']         = $row['housefic'];
	$house_array['housefdic']        = $row['housefdic'];
	$house_array['estatemanagement'] = $row['estatemanagement'];

}

echo json_encode($house_array);

?>