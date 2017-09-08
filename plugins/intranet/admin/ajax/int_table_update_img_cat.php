<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_update_.php] => "config.php" not found');
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
$imageID  = $_POST['imageID'];
$catImage = $_POST['catImage'];

// Define basic variable
$data_array = array();

// Update row in DB
$jakdb->query('UPDATE ' . DB_PREFIX . 'intranethouseimg SET category = "' . $catImage . '", timeedit = NOW() WHERE id = "' . $imageID . '"');

// Getting info from DB
$result = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'intranethouseimg WHERE id = "' . $imageID . '"');
$row    = $result->fetch_assoc();

$data_array[] = array(
  'id'       => $row["id"],
  'timeedit' => $row["timeedit"],
  'category' => $row["category"]
);

// Data for JSON
$envodata = array(
  'status'     => 'update_success',
  'status_msg' => 'Saving data was successful.',
  'data'       => $data_array
);

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>