<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_update_cont.php] => "config.php" not found');
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

// Define basic variable
$data_array = array();

if ($input['action'] === 'edit') {
  // ACTION - EDIT

  $result = $envodb->query('UPDATE ' . DB_PREFIX . 'int_housecontact SET name = "' . $input['name'] . '", address = "' . $input['address'] . '", phone = "' . $input['phone'] . '", email = "' . $input['email'] . '", commission = "' . $input['commission'] . '" WHERE id = "' . $input['id'] . '"');

  $data_array[] = array(
    'id'     => $input["id"],
    'action' => $input["action"],
  );

  if ($result) {
    // Data for JSON
    $envodata = array(
      'status'     => 'update_success',
      'status_msg' => 'Update the record in DB was successful',
      'data'       => $data_array
    );
  } else {
    // Data for JSON
    $envodata = array(
      'status'     => 'update_error_E01',
      'status_msg' => 'Update the record in DB was incorrect',
      'data'       => $data_array
    );
  }

} else if ($input['action'] === 'delete') {
  // ACTION - DELETE

  $result = $envodb->query('DELETE FROM ' . DB_PREFIX . 'int_housecontact WHERE id = "' . $input['id'] . '"');

  $data_array[] = array(
    'id'     => $input["id"],
    'action' => $input["action"],
  );

  if ($result) {
    // Data for JSON
    $envodata = array(
      'status'     => 'delete_success',
      'status_msg' => 'Deleting the record from DB was successful',
      'data'       => $data_array
    );
  } else {
    // Data for JSON
    $envodata = array(
      'status'     => 'delete_error_E01',
      'status_msg' => 'Deleting the record from DB was incorrect',
      'data'       => $data_array
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