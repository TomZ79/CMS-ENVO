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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
  $result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'faq WHERE title LIKE "%' . $title . '%" LIMIT 10');
  $row    = $result -> fetch_assoc();

  // EN: Determine the number of rows in the result from DB
  // CZ: Určení počtu řádků ve výsledku z DB
  $row_cnt = $result -> num_rows;


  if ($row_cnt > 0) {
    // Number of Entrance exists

    $data_array = array ();

    // Search query
    $result1 = $envodb -> query('SELECT id, title FROM ' . DB_PREFIX . 'faq WHERE title LIKE "%' . $title . '%" LIMIT 10');

    // Search the plugin name and id
    $result2 = $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "FAQ"');
    $row2    = $result2 -> fetch_assoc();

    $result3 = $envodb -> query('SELECT name, varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = "' . smartsql($row2['id']) . '"');
    $row3    = $result3 -> fetch_assoc();

    while ($row1 = $result1 -> fetch_assoc()) {

      $data_array[] = array (
        'id'    => $row1["id"],
        'title' => $row1["title"],
      );

    }

    // Data for JSON
    $envodata = array (
      'status'             => 'success',
      'status_msg'         => 'Count of rows in DB: ' . $row_cnt,
      'plugin_id'          => $row2['id'],
      'plugin_cat_name'    => $row3['name'],
      'plugin_cat_varname' => $row3['varname'],
      'data'               => $data_array
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