<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/searchares_ic.php] => "config.php" not found');
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
$ares_ico     = filter_var($_REQUEST['ares_ico'], FILTER_SANITIZE_NUMBER_INT);
$ares_ico     = str_pad($ares_ico, 8, '0', STR_PAD_LEFT);
$envodata     = array ();
$data_array   = array ();
$searchstring = array (
	'ares_ico' => $ares_ico
);

// Refresh time in cache
$n_day = 30;
define('REFRESH_TIME', 3600 * 24 * $n_day);
// Path for cache files
define('TMP_PATH', APP_PATH . 'plugins/intranet2/admin/tmp/');
// Define http ARES
define('ARES', 'https://wwwinfo.mfcr.cz/ares/cgi-bin/ares/ares_es.cgi?jazyk=cz&ico=' . $ares_ico . '&cestina=cestina&xml=1&filtr=1');
// Set locale cached file
$localFile = TMP_PATH . 'ares_ic.preloaded.' . md5($ares_ico) . '.tmp';

// Check if folder 'TMP_PATH' exists
if (!folder_exist(TMP_PATH)) {
	$envodata = array (
		'status'        => 'upload_error_E01',
		'status_msg'    => 'PHP SCRIPT: Pracovní adresář "..tmp" neexistuje',
		'status_info'   => 'Zkontrolujte zdali existuje pracovní adresář "..tmp" pro ukládání dat.',
		'tmp_directory' => TMP_PATH
	);

	// RETURN JSON OUTPUT
	//-------------------------
	$json_output = json_encode($envodata);
	echo $json_output;
	exit;
}

if (!file_exists($localFile) || filemtime($localFile) <= (time() - REFRESH_TIME)) {
	// IF NOT EXISTS CACHE

	// Set attribute for 'file_get_contents'
	$ctx = stream_context_create(array (
			'http' => array (
				'timeout' => 60
			)
		)
	);

	// Read the contents of the XML remote file into a string -> variable
	$file = file_get_contents(ARES, FALSE, $ctx);
	if ($file) {
		// Save data to local file
		file_put_contents($localFile, $file);
	}

} else {
	// IF EXISTS CACHE

	// Read the contents of the XML local file into a string -> variable
	$file = file_get_contents($localFile);
}

if ($file) {
	$xml = simplexml_load_string($file);
	if ($xml) {
		$ns   = $xml -> getDocNamespaces();
		$data = $xml -> children($ns['are']);
		$el   = $data -> children($ns['dtt']) -> V;

		if ($el) {

			// Getting array from XML file
			$i = 0;
			foreach ($el as $elV) {
				foreach ($elV -> S as $item) {
					$data_array[] = $item;
					$i++;
				}
			}
			$count_data = $i;

			// Setting output array
			$envodata = array (
				'status'        => 'upload_success',
				'status_msg'    => 'ARES: Vyhledávání bylo ÚSPĚŠNÉ a data byla stažena',
				'status_info'   => '',
				'tmp_directory' => TMP_PATH,
				'http'          => ARES,
				'search_string' => $searchstring,
				'count_data'    => $count_data,
				'data'          => $data_array
			);

		} else {

			$data = $xml -> children($ns['are']);
			$el   = $data -> children($ns['dtt']) -> Help;

			// Getting array from XML file
			foreach ($el -> R as $item) {
				$data_array[] = $item;
			}

			// Setting output array
			$envodata = array (
				'status'        => 'upload_error_E03',
				'status_msg'    => 'ARES: Vyhledávání bylo NEÚSPĚŠNÉ',
				'status_info'   => 'Vyhledávání v databázi ARES bylo neúspěšné.',
				'http'          => ARES,
				'search_string' => $searchstring,
				'count_data'    => '0',
				'data'          => $data_array
			);

		}

	} else {
		// XML not loading
		$envodata = array (
			'status'        => 'upload_error_E02',
			'status_msg'    => 'ARES: Vyhledávání bylo NEÚSPĚŠNÉ',
			'status_info'   => '',
			'http'          => ARES,
			'search_string' => $searchstring,
			'count_data'    => '0'
		);
	}
} else {
	// Error connection
	$envodata = array (
		'status'        => 'upload_error_E01',
		'status_msg'    => 'ARES: Vyhledávání bylo NEÚSPĚŠNÉ',
		'status_info'   => '',
		'http'          => ARES,
		'search_string' => $searchstring,
		'count_data'    => '0'
	);
}


// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>