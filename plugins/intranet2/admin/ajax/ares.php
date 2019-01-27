<?php

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
$ic       = intval($_REQUEST['ic']);
$file     = @file_get_contents(ARES . $ic);
$envodata = array ();

if ($file) $xml = @simplexml_load_string($file);

if ($ic) {

	if ($xml) {

		$ns   = $xml -> getDocNamespaces();
		$data = $xml -> children($ns['are']);
		$el   = $data -> children($ns['D']) -> VBAS;

		if (strval($el -> ICO) == $ic) {
			$envodata['status']           = 'upload_success';
			$envodata['status_msg']       = 'ARES: IČ společnosti bylo nalezeno a data byla stažena';
			$envodata['name']             = strval($el -> OF);
			$envodata['ic']               = strval($el -> ICO);
			$envodata['dic']              = strval($el -> DIC);
			$envodata['spolecnost']       = strval($el -> OF);
			$envodata['ulice']            = strval($el -> AA -> NU) . ' ' . strval($el -> AA -> CD) . '/' . strval($el -> AA -> CO);
			$envodata['mesto']            = strval($el -> AA -> N);
			$envodata['katastralniuzemi'] = strval($el -> AA -> NCO);
			$envodata['psc']              = strval($el -> AA -> PSC);
		} else {
			$envodata['status']     = 'upload_error_E03';
			$envodata['status_msg'] = 'Error E03 - IČ společnosti nebylo nalezeno';
		}

	} else {

		$envodata['status']     = 'upload_error_E02';
		$envodata['status_msg'] = 'Error E02 - Databáze ARES není dostupná';
	}

} else {

	$envodata['status']     = 'upload_error_E01';
	$envodata['status_msg'] = 'Error E01 - Zadejte IČ společnosti';
}


// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>