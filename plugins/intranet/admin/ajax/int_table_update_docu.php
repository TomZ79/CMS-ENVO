<?php
// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_update_docu.php] => "config.php" not found');
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

// Define basic variable
$data_array = array();

if ($input['action'] === 'edit') {
  // ACTION - EDIT

  $envodb->query('UPDATE ' . DB_PREFIX . 'intranethousedocu SET description = "' . $input['description'] . '", timeedit = NOW() WHERE id = "' . $input['id'] . '"');

  $envodata = $input;

} else if ($input['action'] === 'delete') {
  // ACTION - DELETE

  // Delete file from folder
  $result = $envodb->query('SELECT fullpath FROM ' . DB_PREFIX . 'intranethousedocu WHERE id = "' . $input['id'] . '"');
  $row    = $result->fetch_assoc();

  $fullpath = APP_PATH . JAK_FILES_DIRECTORY . $row['fullpath'];
  unlink($fullpath);

  // Delete row in DB
  $result = $envodb->query('DELETE FROM ' . DB_PREFIX . 'intranethousedocu WHERE id = "' . $input['id'] . '"');

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
      'status'     => 'delete_error',
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