<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_addnew_apt.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-Type: application/json;charset=utf-8');

// CHECK REQUEST METHOD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $input = filter_input_array(INPUT_POST);
} else {
  $input = filter_input_array(INPUT_GET);
}

// PHP CODE and DB
//-------------------------

// Search query
$result = $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'wikilink ORDER BY id DESC LIMIT 1');
$row    = $result -> fetch_assoc();

// EN: Determine the number of rows in the result from DB
// CZ: Určení počtu řádků ve výsledku z DB
$row_cnt = $result -> num_rows;

if ($row_cnt > 0) {
  // Count of Contact exists

  $envodata = array (
    'status'     => 'success',
    'status_msg' => '',
    'data'       => $row['id']
  );

} else {
  // Count of Contact NOT exists

  $envodata = array (
    'status'     => 'success',
    'status_msg' => '',
    'data'       => 0
  );

}

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>