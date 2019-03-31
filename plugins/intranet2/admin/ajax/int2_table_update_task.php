<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int2_table_update_task.php] => "config.php" not found');
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
$taskID      = $_POST['taskID'];
$houseID     = $_POST['houseID'];
$priority    = $_POST['priority'];
$status      = $_POST['status'];
$title       = smartsql($_POST['title']);
$description = smartsql($_POST['description']);
$reminder    = $_POST['reminder'];
$time        = $_POST['time'];

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$envo_setting_val = envo_get_setting_val('intranet2');
$dateformat       = $envo_setting_val['int2dateformat'];

// Update row in DB
$result = $envodb -> query('UPDATE ' . DB_PREFIX . 'int2_housetasks SET 
                          houseid = "' . smartsql($houseID) . '",  
                          priority = "' . smartsql($priority) . '", 
                          status = "' . smartsql($status) . '",
                          title = "' . smartsql($title) . '", 
                          description = "' . smartsql($description) . '", 
                          reminder = "' . smartsql(date('Y-m-d H:i:s', strtotime($reminder))) . '", 
                          time = "' . smartsql(date('Y-m-d H:i:s', strtotime($time))) . '", 
                          updated = NOW() 
                          WHERE id = "' . smartsql($taskID) . '"');

// Getting info from DB
$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_housetasks WHERE id = "' . $taskID . '"');
$row    = $result -> fetch_assoc();

// EN: Change number to string
// CZ: Změna čísla na text
switch ($row['priority']) {
	case '0':
		$priority = 'Nedůležitá';
		break;
	case '1':
		$priority = 'Nízká priorita';
		break;
	case '2':
		$priority = 'Střední priorita';
		break;
	case '3':
		$priority = 'Vysoká priorita';
		break;
	case '4':
		$priority = 'Nejvyšší priorita';
		break;
}

switch ($row['status']) {
	case '0':
		$status = 'Žádný status';
		break;
	case '1':
		$status = 'Zápis';
		break;
	case '2':
		$status = 'V řešení';
		break;
	case '3':
		$status = 'Vyřešeno - Uzavřeno';
		break;
	case '4':
		$status = 'Stornováno';
		break;
}

$data_array[] = array (
	'id'          => $row['id'],
	'priority'    => $priority,
	'status'      => $status,
	'title'       => $row['title'],
	'description' => $row['description'],
	'reminder'    => date($dateformat, strtotime($row["reminder"])),
	'time'        => date($dateformat, strtotime($row["time"])),
);

// Data for JSON
$envodata = array (
	'status'     => 'update_success',
	'status_msg' => 'Saving data was successful.',
	'data'       => $data_array
);

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>