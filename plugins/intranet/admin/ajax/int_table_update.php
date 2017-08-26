<?php
// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_update.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-Type: application/json;charset=utf-8');

// CHECK REQUEST METHOD
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $input = filter_input_array(INPUT_POST);
} else {
  $input = filter_input_array(INPUT_GET);
}

// PHP CODE and DB
//-------------------------

if ($input['action'] === 'edit') {
  // ACTION - EDIT

  $jakdb->query('UPDATE ' . DB_PREFIX . 'intranethouseent SET entrance = "' . $input['entrance'] . '", countapartment = "' . $input['countapartment'] . '", countetage = "' . $input['countetage'] . '", elevator = "' . $input['elevator'] . '" WHERE id = "' . $input['id'] . '"');

  $envodata = $input;

} else if ($input['action'] === 'delete') {
  // ACTION - DELETE

  $result = $jakdb->query('DELETE FROM ' . DB_PREFIX . 'intranethouseent WHERE id = "' . $input['id'] . '"');

  if ($result) {
    // Data for JSON
    $envodata = array(
      'status'     => 'delete_success',
      'status_msg' => 'Deleting the record from DB was successful',
      'data'       => $input
    );
  } else {
    // Data for JSON
    $envodata = array(
      'status'     => 'delete_error',
      'status_msg' => 'Deleting the record from DB was incorrect',
      'data'       => ''
    );
  }

} else if ($input['action'] === 'restore') {
  // ACTION - RESTORE

  $envodata = $input;
}

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>