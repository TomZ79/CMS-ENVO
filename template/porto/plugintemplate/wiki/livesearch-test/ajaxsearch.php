<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/ajaxsearch.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-Type: application/json;charset=utf-8');

// CHECK REQUEST METHOD
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $_POST = filter_input_array(INPUT_POST);
} else {
  $_POST = filter_input_array(INPUT_GET);
}
// PHP CODE and DB
//-------------------------

// EN: Get value from ajax
// CZ: Získání dat z ajax
$title = $_POST['search'];

if (isset($_POST['search'])) {

  // Search query
  $result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'wiki WHERE title LIKE "%' . $title . '%" LIMIT 10');
  $row    = $result -> fetch_assoc();

  // EN: Determine the number of rows in the result from DB
  // CZ: Určení počtu řádků ve výsledku z DB
  $row_cnt = $result -> num_rows;


  if ($row_cnt > 0) {
    // Number of Entrance exists

    // Search query
    $result1 = $envodb -> query('SELECT id, title FROM ' . DB_PREFIX . 'wiki WHERE title LIKE "%' . $title . '%" LIMIT 10');

    $data_array = array();

    while ($row1 = $result1 -> fetch_assoc()) {

      $data_array[] = $row1;

    }

    // Data for JSON
    $envodata = array (
      'status'     => 'success',
      'status_msg' => 'Count of rows in DB: ' . $row_cnt,
      'data'       => $data_array
    );

  } else {
    // Number of Entrance NOT exists

    // Data for JSON
    $envodata = array (
      'status'     => 'error_E01',
      'status_msg' => 'Not found rows in DB'
    );

  }
}

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>