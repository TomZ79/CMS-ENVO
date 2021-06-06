<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/searchares_other.php] => "config.php" not found');
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
$ares_maxcount    = filter_var($_REQUEST['ares_maxcount'], FILTER_SANITIZE_NUMBER_INT);
$ares_sort        = filter_var($_REQUEST['ares_sort'], FILTER_SANITIZE_STRING);
$ares_word        = filter_var($_REQUEST['ares_word'], FILTER_SANITIZE_STRING);
$ares_obec        = filter_var($_REQUEST['ares_obec'], FILTER_SANITIZE_NUMBER_INT);
$ares_ulice       = filter_var($_REQUEST['ares_ulice'], FILTER_SANITIZE_STRING);
$ares_ulice       = url_slug($ares_ulice, array ('delimiter' => '+', 'lowercase' => FALSE, 'transliterate' => TRUE));
$ares_corientacni = filter_var($_REQUEST['ares_corientacni'], FILTER_SANITIZE_NUMBER_INT);
$ares_cpopisne    = filter_var($_REQUEST['ares_cpopisne'], FILTER_SANITIZE_NUMBER_INT);
$ares_record      = filter_var($_REQUEST['ares_record'], FILTER_SANITIZE_NUMBER_INT);
$envodata         = array ();
$data_array       = array ();
$searchstring     = array (
	'ares_obec'        => $ares_obec,
	'ares_ulice'       => $ares_ulice,
	'ares_corientacni' => $ares_corientacni,
	'ares_cpopisne'    => $ares_cpopisne
);

// Refresh time in cache
$n_day = 10;
define('REFRESH_TIME', 3600 * 24 * $n_day);
// Path for cache files
define('TMP_PATH', APP_PATH . 'plugins/intranet2/admin/tmp/');
// Define http ARES
define('ARES', 'https://wwwinfo.mfcr.cz/ares/cgi-bin/ares/ares_es.cgi?jazyk=cz&obch_jm=&ico=&cestina=cestina&obec=' . $ares_obec . '&k_fu=&maxpoc=' . $ares_maxcount . '&ulice=' . $ares_ulice . '&cis_or=' . $ares_corientacni . '&cis_po=' . $ares_cpopisne . '&setrid=' . $ares_sort . '&xml=1&filtr=1');
// Set locale cached file
$localFile = TMP_PATH . 'ares_other.preloaded.' . md5($ares_maxcount . $ares_sort . $ares_obec . $ares_ulice . $ares_corientacni . $ares_cpopisne) . '.tmp';
// Search in array by '$ares_word'
function filter_array ($array, $condition)
{
	$matches = array ();
	// Remove space in '$condition'
	$condition = preg_replace('/\s/', '', $condition);
	// Create array for '$condition'
	$keywords = explode(',', $condition);
	// Loop array
	foreach ($array as $a => $item) {
		foreach ($keywords as $k => $kitem) {
			$kitem = url_slug($kitem, array ('lowercase' => TRUE, 'transliterate' => TRUE));
			// Check if array items contains '$condition'
			if (strpos(url_slug($item['ojm'], array ('lowercase' => TRUE, 'transliterate' => TRUE)), $kitem) !== false) {
				$matches[] = $item;
			}
		}
	}
	return $matches;
}

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
	$file = file_get_contents(ARES, false, $ctx);
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
			if ($ares_record === '1') {
				$c = 0;
				foreach ($el as $elV) {
					foreach ($elV -> S as $item) {
						$array[] = $item;
						$c++;
					}
				}
				$count_data = $c;
				$array      = json_decode(json_encode((array)$array), TRUE);

			} else {
				$c = 0;
				foreach ($el as $elV) {
					foreach ($elV -> S as $item) {
						$value = $item -> ico;

						// EN: Check if '$value' exists in table -> IČ
						// CZ:
						$result = $envodb -> query('SELECT id FROM cms_int2_house WHERE ic = "' . trim($value) . '" LIMIT 1');
						$row    = $result -> fetch_assoc();
						// EN: Determine the number of rows in the result from DB
						// CZ: Určení počtu řádků ve výsledku z DB
						$row_cnt = $result -> num_rows;

						if ($row_cnt === 1) {

						} else {
							$array[] = $item;
							$c++;
						}
					}
				}
				$count_data = $c;
				$array      = json_decode(json_encode((array)$array), TRUE);

			}

			// Filter by '$ares_word'
			if (!empty($ares_word)) {
				$tmp_array  = filter_array($array, $ares_word);
				$data_array = $tmp_array;
				$c          = 0;
				$count_data = 0;
				foreach ($tmp_array as $tmpa) {
					$c++;
				}
				$count_data = $c;
			} else {
				$data_array = $array;
			}

			// Setting output array
			$envodata = array (
				'status'        => 'upload_success',
				'status_msg'    => 'ARES: Vyhledávání bylo úspěšné a data byla stažena',
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