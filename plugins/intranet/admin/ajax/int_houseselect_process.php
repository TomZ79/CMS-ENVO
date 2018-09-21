<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/tt_selectprogram_process.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Get value from ajax
// CZ: Získání dat z ajax
$id = $_POST['valID'];

$house_array = array();

// EN: Get data of TV Tower
// CZ: Získání dat o televizních vysílačích
$result = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'int_houselist WHERE id IN (' . $id . ')');

while ($row = $result->fetch_assoc()) {

  $house_array['name'] = $row['name'];
  $house_array['street'] = $row['street'];
  $house_array['city'] = $row['city'];
  $house_array['cityarea'] = $row['cityarea'];
  $house_array['psc'] = $row['psc'];
  $house_array['ic'] = $row['ic'];
  $house_array['state'] = $row['state'];
  $house_array['justice'] = $row['justice'];
  $house_array['housejusticelaw'] = $row['housejusticelaw'];
  $house_array['description'] = $row['description'];
  $house_array['contact1'] = $row['contact1'];
  $house_array['contactphone1'] = $row['contactphone1'];
  $house_array['contactmail1'] = $row['contactmail1'];
  $house_array['contactdate1'] = $row['contactdate1'];
  $house_array['contactaddress1'] = $row['contactaddress1'];
  $house_array['contact2'] = $row['contact2'];
  $house_array['contactphone2'] = $row['contactphone2'];
  $house_array['contactmail2'] = $row['contactmail2'];
  $house_array['contactdate2'] = $row['contactdate2'];
  $house_array['contactaddress2'] = $row['contactaddress2'];
  $house_array['contact3'] = $row['contact3'];
  $house_array['contactphone3'] = $row['contactphone3'];
  $house_array['contactmail3'] = $row['contactmail3'];
  $house_array['contactdate3'] = $row['contactdate3'];
  $house_array['contactaddress3'] = $row['contactaddress3'];
  $house_array['contact4'] = $row['contact4'];
  $house_array['contactphone4'] = $row['contactphone4'];
  $house_array['contactmail4'] = $row['contactmail4'];
  $house_array['contactdate4'] = $row['contactdate4'];
  $house_array['contactaddress4'] = $row['contactaddress4'];
  $house_array['contact5'] = $row['contact5'];
  $house_array['contactphone5'] = $row['contactphone5'];
  $house_array['contactmail5'] = $row['contactmail5'];
  $house_array['contactdate5'] = $row['contactdate5'];
  $house_array['contactaddress5'] = $row['contactaddress5'];
  $house_array['contact6'] = $row['contact6'];
  $house_array['contactphone6'] = $row['contactphone6'];
  $house_array['contactmail6'] = $row['contactmail6'];
  $house_array['contactdate6'] = $row['contactdate6'];
  $house_array['contactaddress6'] = $row['contactaddress6'];
  $house_array['contact7'] = $row['contact7'];
  $house_array['contact8'] = $row['contact8'];
  $house_array['contact9'] = $row['contact9'];
  $house_array['contact10'] = $row['contact10'];
  $house_array['contact11'] = $row['contact11'];
  $house_array['contact12'] = $row['contact12'];

}

echo json_encode($house_array);

?>