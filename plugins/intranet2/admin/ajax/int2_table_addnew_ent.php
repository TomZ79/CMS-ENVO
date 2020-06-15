<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int2_table_addnew_ent.php] => "config.php" not found');
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
$houseID   = $_POST['houseID'];
$street    = $_POST['street'];
$elevator  = $_POST['elevator'];
$apartment = $_POST['apartment'];
$gpslat    = $_POST['gpslat'];
$gpslng    = $_POST['gpslng'];
$ikatastr  = $_POST['ikatastr'];

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$envo_setting_val = envo_get_setting_val('intranet2');
$dateformat       = $envo_setting_val['int2dateformat'];

// Insert info about service into DB
$result = $envodb->query('INSERT ' . DB_PREFIX . 'int2_houseent SET
                          houseid = "' . smartsql($houseID) . '",  
                          street = "' . smartsql($street) . '", 
                          elevator = "' . smartsql($elevator) . '", 
                          apartment = "' . smartsql($apartment) . '", 
                          gpslat = "' . smartsql($gpslat) . '", 
                          gpslng = "' . smartsql($gpslng) . '", 
                          katastr = "' . smartsql($ikatastr) . '", 
                          created = NOW(),
                          updated = NOW()');

// Get last row ID from DB
$rowid = $envodb->envo_last_id();

// Getting info uploaded Task from DB
$result = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'int2_houseent WHERE houseid = "' . $houseID . '" AND id = "' . $rowid . '"');
$row    = $result->fetch_assoc();

$data_array[] = array(
  'id'        => $row['id'],
  'street'    => $row['street'],
  'elevator'  => $row['elevator'],
  'apartment' => $row['apartment'],
  'gpslat'    => $row['gpslat'],
  'gpslng'    => $row['gpslng'],
  'katastr'   => $row['katastr'],
);

// Data for JSON
$envodata = array(
  'status'     => 'success',
  'status_msg' => 'New row insert do DB',
  'data'       => $data_array
);

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>