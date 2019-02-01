<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/searchares.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../include/functions.php");

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
// header('Content-Type: application/json;charset=utf-8');

// PHP CODE and DB
//-------------------------


// Define basic variable
// https://wwwinfo.mfcr.cz/ares/cgi-bin/ares/ares_es.cgi?jazyk=cz&obch_jm=&ico=&cestina=cestina&obec=554961&k_fu=&maxpoc=200&ulice=Jate%E8n%ED&cis_or=592&cis_po=&setrid=ZADNE&pr_for=&nace=&xml=1&filtr=1
define('ARES', 'https://wwwinfo.mfcr.cz/ares/cgi-bin/ares/ares_es.cgi?jazyk=cz&obch_jm=&ico=');
$ares_ico = filter_var($_REQUEST['ares_ico'], FILTER_SANITIZE_STRING);
$envodata = array ();

// Getting XML file
$file = @file_get_contents('https://wwwinfo.mfcr.cz/ares/cgi-bin/ares/ares_es.cgi?jazyk=cz&obch_jm=&ico=72549777');

// Convert a well-formed XML string into a SimpleXMLElement object
if ($file) $xml = simplexml_load_string($file);


if ($xml) {

	$data  = $xml -> getDocNamespaces();
	$res = $data -> children($ns['are']) -> S;

	$envodata['status']      = 'upload_success';
	$envodata['status_msg']  = 'ARES: IČ společnosti bylo nalezeno a data byla stažena';
	$envodata['status_info'] = '';
	$envodata['ico']         = $el;

	echo $ns;

} else {

	$envodata['status']      = 'upload_error_E01';
	$envodata['status_msg']  = 'Error E01 - Databáze ARES není dostupná';
	$envodata['status_info'] = '';
}


// RETURN JSON OUTPUT
//-------------------------
//$json_output = json_encode($envodata);
print_r(trim(strval($res -> ico)));

?>