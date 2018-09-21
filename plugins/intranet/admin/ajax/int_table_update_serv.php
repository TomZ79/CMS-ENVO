<?php
// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_update_serv.php] => "config.php" not found');
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

  $result = $envodb->query('UPDATE ' . DB_PREFIX . 'int_houseserv SET description = "' . $input['description'] . '", timestart = "' . $input['timestart'] . '", timeend = "' . $input['timeend'] . '" WHERE id = "' . $input['id'] . '"');

  if ($result) {
    // Data for JSON
    $envodata = array(
      'status'     => 'update_success',
      'status_msg' => 'Update the record in DB was successful',
      'data'       => $input
    );
  } else {
    // Data for JSON
    $envodata = array(
      'status'     => 'update_error_E01',
      'status_msg' => 'Update the record in DB was incorrect',
      'data'       => ''
    );
  }

} else if ($input['action'] === 'delete') {
  // ACTION - DELETE

  $result = $envodb->query('UPDATE ' . DB_PREFIX . 'int_houseserv SET deleted = "1" WHERE id = "' . $input['id'] . '"');

  if ($result) {
    $data_array[] = array(
      'id'     => $input["id"],
      'action' => $input["action"],
    );

    // Data for JSON
    $envodata = array(
      'status'     => 'delete_success',
      'status_msg' => 'Deleting the record from DB was successful',
      'data'       => $data_array
    );
  } else {
    $data_array[] = array(
      'id'     => $input["id"]
    );

    // Data for JSON
    $envodata = array(
      'status'     => 'delete_error_E01',
      'status_msg' => 'Deleting the record from DB was incorrect',
      'data'       => $data_array
    );
  }

} else if ($input['action'] === 'restore') {
  // ACTION - RESTORE

  $result = $envodb->query('UPDATE ' . DB_PREFIX . 'int_houseserv SET deleted = "0" WHERE id = "' . $input['id'] . '"');

  if ($result) {
    $data_array[] = array(
      'id'     => $input["id"],
      'action' => $input["action"],
    );

    // Data for JSON
    $envodata = array(
      'status'     => 'restore_success',
      'status_msg' => 'Restore the record in DB was successful',
      'data'       => $data_array
    );
  } else {
    $data_array[] = array(
      'id'     => $input["id"]
    );

    // Data for JSON
    $envodata = array(
      'status'     => 'restore_error_E01',
      'status_msg' => 'Restore the record in DB was incorrect',
      'data'       => $data_array
    );
  }
}

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>