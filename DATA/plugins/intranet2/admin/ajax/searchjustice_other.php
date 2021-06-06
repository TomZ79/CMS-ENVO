<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/searchjustice_other.php] => "config.php" not found');
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
$justice_maxcount    = filter_var($_REQUEST['justice_maxcount'], FILTER_SANITIZE_NUMBER_INT);
$justice_filtr       = filter_var($_REQUEST['justice_filtr'], FILTER_SANITIZE_STRING);
$justice_stype       = filter_var($_REQUEST['justice_stype'], FILTER_SANITIZE_STRING);
$justice_subject     = filter_var($_REQUEST['justice_subject'], FILTER_SANITIZE_STRING);
$justice_subject     = url_slug($justice_subject, array ('lowercase' => FALSE, 'transliterate' => TRUE));
$justice_obec        = filter_var($_REQUEST['justice_obec'], FILTER_SANITIZE_STRING);
$justice_obec        = url_slug($justice_obec, array ('delimiter' => '+', 'lowercase' => FALSE, 'transliterate' => TRUE));
$justice_ulice       = filter_var($_REQUEST['justice_ulice'], FILTER_SANITIZE_STRING);
$justice_ulice       = url_slug($justice_ulice, array ('delimiter' => '+', 'lowercase' => FALSE, 'transliterate' => TRUE));
$justice_corientacni = filter_var($_REQUEST['justice_corientacni'], FILTER_SANITIZE_NUMBER_INT);
$justice_cpopisne    = filter_var($_REQUEST['justice_cpopisne'], FILTER_SANITIZE_NUMBER_INT);
$justice_record      = filter_var($_REQUEST['justice_record'], FILTER_SANITIZE_NUMBER_INT);
$envodata            = array ();
$data_array          = array ();

// Setting street number
if ($justice_corientacni) {
	if ($justice_cpopisne) {
		$streetnumber = '+' . $justice_corientacni . '%2F' . $justice_cpopisne;
	} else {
		$streetnumber = '+' . $justice_corientacni;
	}
} else if ($justice_cpopisne) {
	$streetnumber = '+' . $justice_cpopisne;
} else {
	$streetnumber = '';
}

// Refresh time in cache
$n_day = 10;
define('REFRESH_TIME', 3600 * 24 * $n_day);
// Path for cache files
define('TMP_PATH', APP_PATH . 'plugins/intranet2/admin/tmp/');
// Define http JUSTICE
define('JUSTICE', 'https://or.justice.cz/ias/ui/rejstrik-$firma?p%3A%3Asubmit=x&.%2Frejstrik-%24firma=&nazev=' . $justice_subject . '&ico=&obec=' . $justice_obec . '&ulice=' . $justice_ulice . $streetnumber . '&forma=&oddil=&vlozka=&soud=&polozek=' . $justice_maxcount . '&typHledani=' . $justice_stype . '&jenPlatne=' . $justice_filtr);
// Set locale cached file
$localFile = TMP_PATH . 'justice_other.preloaded.' . md5($justice_maxcount . $justice_record . $justice_subject . $justice_obec . $justice_ulice . $streetnumber) . '.tmp';

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
				'timeout' => 60,
				'method'  => "GET",
				'header'  => "User-Agent: $USERAGENT\r\n"
			)
		)
	);

	// Read the contents of the HTML remote file into a string -> variable
	$file = file_get_contents(JUSTICE, false, $ctx);
	$file = mb_convert_encoding($file, 'UTF-8', 'UTF-8');
	if ($file) {
		// Save data to local file
		file_put_contents($localFile, $file);
	}

} else {
	// IF EXISTS CACHE

	// Read the contents of the HTML local file into a string -> variable
	$file = file_get_contents($localFile);
}

if ($file) {
	// Prevents Warnings - enables user error handling
	libxml_use_internal_errors(true);
	// Creating new DOM document instance and loading HTML content
	$dom                       = new DOMDocument();
	$dom -> preserveWhiteSpace = false;
	if (!$dom -> loadHTML($file)) {

		$envodata = array (
			'status'      => 'upload_error_E02',
			'status_msg'  => 'JUSTICE: Vyhledávání bylo NEÚSPĚŠNÉ',
			'status_info' => '',
			'http'        => JUSTICE,
		);

	} else {
		$dom -> formatOutput = true;
		// Use DomXPath
		$xpath = new DomXPath($dom);


		$div         = $xpath -> query('//div[@id="SearchResults"]//div[contains(@class,"search-results")]//li[contains(@class,"result")] ');
		$parentNode1 = $xpath -> query('//th[contains(text(),"subjekt")][1]/following-sibling::td[1]');
		$parentNode2 = $xpath -> query('//th[contains(text(),"IČO")][1]/following-sibling::td[1]');
		$parentNode3 = $xpath -> query('//th[contains(text(),"Sídlo")][1]/following-sibling::td[1]');

		if ($div -> length > 0) {


			if ($justice_record === '1') {
				$i = 0;
				foreach ($parentNode1 as $item1) {
					$item2          = $parentNode2 -> item($i) -> nodeValue;
					$item3          = $parentNode3 -> item($i) -> nodeValue;
					$data_array[$i] = array (
						'ojm' => trim($item1 -> nodeValue),
						'ico' => trim($item2),
						'jmn' => trim($item3)
					);
					$i++;
				}
				$count_data = $i;
			} else {
				$i = 0;
				$c = 0;
				foreach ($parentNode1 as $item1) {
					$item2 = $parentNode2 -> item($i) -> nodeValue;
					$item3 = $parentNode3 -> item($i) -> nodeValue;
					// EN: Check if '$value' exists in table -> IČ
					// CZ:
					$result = $envodb -> query('SELECT id FROM cms_int2_house WHERE ic = "' . trim($item2) . '" LIMIT 1');
					$row    = $result -> fetch_assoc();
					// EN: Determine the number of rows in the result from DB
					// CZ: Určení počtu řádků ve výsledku z DB
					$row_cnt = $result -> num_rows;

					if ($row_cnt === 1) {


					} else {
						$data_array[$i] = array (
							'ojm' => trim($item1 -> nodeValue),
							'ico' => trim($item2),
							'jmn' => trim($item3)
						);
						$c++;
					}
					$i++;
				}
				$count_data = $c;
			}

			$envodata = array (
				'status'        => 'upload_success',
				'status_msg'    => 'JUSTICE: Vyhledávání bylo ÚSPĚŠNÉ a data byla stažena',
				'status_info'   => '',
				'tmp_directory' => TMP_PATH,
				'http'          => JUSTICE,
				'count_data'    => $count_data,
				'data'          => $data_array
			);

		} else {

			$envodata = array (
				'status'      => 'upload_error_E02',
				'status_msg'  => 'JUSTICE: Vyhledávání bylo NEÚSPĚŠNÉ',
				'status_info' => 'Nebyl nalezen žádný záznam. Zvolte nová vyhledávací kritéria a vyhledejte znovu záznam v databázi.',
				'http'        => JUSTICE,
				'count_data'  => '0'
			);

		};
	}

} else {
	// Error connection
	$envodata = array (
		'status'      => 'upload_error_E01',
		'status_msg'  => 'JUSTICE: Vyhledávání bylo NEÚSPĚŠNÉ',
		'status_info' => '',
		'http'        => JUSTICE,
		'count_data'  => '0'
	);
}


// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>