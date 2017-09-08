<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_addnew_serv.php] => "config.php" not found');
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
$houseID = $_POST['houseID'];

// Insert info about service into DB
$result = $jakdb->query('INSERT ' . DB_PREFIX . 'intranethouseserv SET id = NULL, houseid = "' . $houseID . '",  description = "", timedefault = NOW(), timestart = "", timeend = "", timeedit = "", deleted = ""');

// Get last row ID from DB
$rowid = $jakdb->jak_last_id();

// Getting info uploaded image from DB
$result = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'intranethouseserv WHERE houseid = "' . $houseID . '" AND id = "' . $rowid . '"');
$row    = $result->fetch_assoc();

$data_array[] = array(
  'id'          => $row["id"],
  'description' => $row["description"],
  'timedefault' => $row["timedefault"],
  'timestart'   => $row["timestart"],
  'timeend'     => $row["timeend"]
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