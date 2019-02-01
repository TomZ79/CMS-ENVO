<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/ares.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../include/functions.php");

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-Type: application/json;charset=utf-8');

// PHP CODE and DB
//-------------------------


// Define basic variable
define('ARES', 'http://wwwinfo.mfcr.cz/cgi-bin/ares/darv_bas.cgi?ico=');
$ic       = filter_var($_REQUEST['ic'], FILTER_SANITIZE_STRING);
$envodata = array ();

// EN: Check if '$value' exists in table -> IČ
// CZ:
$result = $envodb -> query('SELECT id, name FROM ' . DB_PREFIX . 'int2_house WHERE ic = "' . smartsql($ic) . '" LIMIT 1');
$row    = $result -> fetch_assoc();
// EN: Determine the number of rows in the result from DB
// CZ: Určení počtu řádků ve výsledku z DB
$row_cnt = $result -> num_rows;

if ($row_cnt === 1) {
	// EN: '$value' exists in DB!
	// CZ: '$value' existuje v DB!
	$icControl = TRUE;
} else {
	// EN: '$value' NOT exists in DB!
	// CZ: '$value' NEexistuje v DB!
	$icControl = FALSE;
}

if (!$icControl) {

	// Getting XML file
	$file = @file_get_contents(ARES . $ic);

	// Convert a well-formed XML string into a SimpleXMLElement object
	if ($file) $xml = @simplexml_load_string($file);

	if ($ic) {

		if ($xml) {

			$ns   = $xml -> getDocNamespaces();
			$data = $xml -> children($ns['are']);
			$el   = $data -> children($ns['D']) -> VBAS;

			// Ulice
			if (strval($el -> AA -> CO)) {
				$ulice = strval($el -> AA -> NU) . ' ' . strval($el -> AA -> CD) . '/' . strval($el -> AA -> CO);
			} else {
				$ulice = strval($el -> AA -> NU) . ' ' . strval($el -> AA -> CD);
			}

			// ID mesta
			$str    = strval($el -> AA -> N);
			$result = $envodb -> query('SELECT id, city FROM ' . DB_PREFIX . 'int2_settings_city WHERE city ="' . $str . '" ');
			$row    = $result -> fetch_assoc();

			if (strval($el -> ICO) == $ic) {
				$envodata['status']           = 'upload_success';
				$envodata['status_msg']       = 'ARES: IČ společnosti bylo nalezeno a data byla stažena';
				$envodata['status_info']      = '';
				$envodata['name']             = trim(strval($el -> OF), '"');
				$envodata['ic']               = strval($el -> ICO);
				$envodata['dic']              = strval($el -> DIC);
				$envodata['spolecnost']       = strval($el -> OF);
				$envodata['ulice']            = $ulice;
				$envodata['mesto']            = strval($el -> AA -> N);
				$envodata['mesto_id']         = $row['id'];
				$envodata['katastralniuzemi'] = strval($el -> AA -> NCO);
				$envodata['psc']              = strval($el -> AA -> PSC);
			} else {
				$envodata['status']      = 'upload_error_E04';
				$envodata['status_msg']  = 'Error E04 - IČ společnosti nebylo nalezeno';
				$envodata['status_info'] = '';
			}

		} else {

			$envodata['status']      = 'upload_error_E03';
			$envodata['status_msg']  = 'Error E03 - Databáze ARES není dostupná';
			$envodata['status_info'] = '';
		}

	} else {

		$envodata['status']      = 'upload_error_E02';
		$envodata['status_msg']  = 'Error E02 - Zadejte IČ společnosti';
		$envodata['status_info'] = '';
	}

} else {

	$envodata['status']      = 'upload_error_E01';
	$envodata['status_msg']  = 'Error E01 - Hledané IČ je již uložené v DB!';
	$envodata['status_info'] = 'Hledané IČ odpovídá bytovému domu: ' . $row['name'];
}


// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>