<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int2_table_addnew_cont.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die('Nothing to see here');

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-Type: application/json;charset=utf-8');

// PHP CODE and DB
//-------------------------

// EN: Get value from ajax
// CZ: Získání dat z ajax
$houseID     = $_POST['houseID'];
$degree      = $_POST['degree'];
$name        = $_POST['name'];
$surname     = $_POST['surname'];
$address     = $_POST['address'];
$phone       = $_POST['phone'];
$email       = $_POST['email'];
$status      = $_POST['status'];
$birthdate   = $_POST['birthdate'];
$birthdate   = (!empty($birthdate) ? date('Y-m-d H:i:s', strtotime($birthdate)) : '');
$gender      = $_POST['gender'];
$description = $_POST['description'];

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$envo_setting_val = envo_get_setting_val('intranet2');
$dateformat       = $envo_setting_val['int2dateformat'];

// Insert info about service into DB
$result = $envodb -> query('INSERT ' . DB_PREFIX . 'int2_housecontacts SET 
                          houseid = "' . $houseID . '",  
                          degree = "' . $degree . '", 
                          name = "' . $name . '", 
                          surname = "' . $surname . '", 
                          address = "' . $address . '", 
                          phone = "' . $phone . '", 
                          email = "' . $email . '", 
                          status = "' . $status . '", 
                          birthdate = "' . $birthdate . '",
                          gender = "' . $gender . '",
                          description = "' . $description . '", 
                          created = NOW(),
                          updated = NOW()');

// Get last row ID from DB
$rowid = $envodb -> envo_last_id();

// Getting info uploaded Task from DB
$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_housecontacts WHERE houseid = "' . $houseID . '" AND id = "' . $rowid . '"');
$row    = $result -> fetch_assoc();

switch ($row['status']) {
	case '0':
		$status = 'Bez funkce';
		break;
	case '1':
		$status = 'Předseda';
		break;
	case '2':
		$status = 'Místopředseda';
		break;
	case '3':
		$status = 'Člen výboru';
		break;
}
switch ($row['gender']) {
	case '0':
		$gender = '';
		break;
	case '1':
		$gender = 'Muž';
		break;
	case '2':
		$gender = 'Žena';
		break;
}
if ($row['gender'] == 0) $genderimg = '/_files/userfiles/standard.png';
if ($row['gender'] == 1) $genderimg = '/_files/userfiles/avatar4.png';
if ($row['gender'] == 2) $genderimg = '/_files/userfiles/avatar7.png';

$data_array[] = array (
	'id'          => $row['id'],
	'houseid'     => $row['houseid'],
	'degree'      => $row['degree'],
	'name'        => $row['name'],
	'surname'     => $row['surname'],
	'address'     => $row['address'],
	'phone'       => $row['phone'],
	'email'       => $row['email'],
	'status'      => $status,
	'birthdate'   => (!empty((int)$row['birthdate']) ? date($dateformat, strtotime($row['birthdate'])) : ''),
	'gender'      => $gender,
	'genderimg'   => $genderimg,
	'description' => $row['description'],
);

// Data for JSON
$envodata = array (
	'status'     => 'success',
	'status_msg' => 'New row insert do DB',
	'data'       => $data_array
);

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>