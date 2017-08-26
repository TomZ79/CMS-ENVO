<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_update_apt.php] => "config.php" not found');
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

  $jakdb->query('UPDATE ' . DB_PREFIX . 'intranethouseapt SET number = "' . $input['number'] . '", etage = "' . $input['etage'] . '", name = "' . $input['name'] . '", phone = "' . $input['phone'] . '", commission = "' . $input['commission'] . '" WHERE id = "' . $input['id'] . '"');

  $envodata = json_encode($input);

} else if ($input['action'] === 'delete') {

  $jakdb->query('DELETE FROM ' . DB_PREFIX . 'intranethouseapt WHERE id = "' . $input['id'] . '"');

  $envodata = json_encode($input);

} else if ($input['action'] === 'restore') {


}

// RETURN JSON OUTPUT
//-------------------------
echo $envodata;

?>