<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/statistics2.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../include/functions.php");

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");


// PHP CODE and DB
//-------------------------
/**
 * ASCII Encoding Reference Windows-1252
 * @param $string
 * @return mixed
 *
 */
function envoUrlEncode($string) {
	$entities = array(
		'!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]", " ", "¦", "|", "{", "}",
		'á', 'â', 'ã', 'ä', 'Á', 'Â', 'Ã', 'Ä',
		'č', 'Č',
		'ď', 'Ď',
		'é', 'ë', 'ě', 'É', 'Ë', 'Ě',
		'í', 'î', 'Í', 'Î',
		'ń', 'ň',
		'ó', 'ô', 'õ', 'ö', 'Ó', 'Ô', 'Õ', 'Ö',
		'ř', 'Ř',
		'ů', 'ú', 'û', 'ü', 'Ů', 'Ú', 'Û', 'Ü',
		'š', 'Š',
		'ť', 'Ť',
		'ž', 'Ž',
		'ý', 'Ý'
	);
	$replacements  = array(
		'%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D', '%20', '%A6', '%7C', '%7B', '%7D',
		'%E1', '%E2', '%E3', '%E4', '%C1', '%C2', '%C3', '%C4',
		'%E8', '%C8',
		'%EF', '%CF',
		'%E9', '%EB', '%EC', '%C9', '%CB', '%CC',
		'%ED', '%EE', '%CD', '%CE',
		'%F1', '%F2',
		'%F3', '%F4', '%F5', '%F6', '%D3', '%D4', '%D5', '%D6',
		'%F8', '%D8',
		'%F9', '%FA', '%FB', '%FC', '%D9', '%DA', '%DB', '%DC',
		'%9A', '%8A',
		'%9D', '%8D',
		'%9E', '%8E',
		'%FD', '%DD'
	);
	return str_replace($entities, $replacements, $string);
}

// Define basic variable
$objcode = filter_var($_REQUEST['objcode'], FILTER_SANITIZE_NUMBER_INT);
$city    = filter_var($_REQUEST['city'], FILTER_SANITIZE_STRING);
$street  = filter_var($_REQUEST['street'], FILTER_SANITIZE_STRING);
// Define http STATISTIC
define('STATISTIC', 'https://apl.czso.cz/irso4/budlist.jsp?b=11&textobce=' . envoUrlEncode($city) . '&kodobce=&textulice=' . envoUrlEncode('Nová') . '&kodulice=&cisdom=450&typcisdom=0&cisori=&typhled=0&hledej=Vyhledat');
$file = file_get_contents(STATISTIC);

// Prevents Warnings - enables user error handling
//libxml_use_internal_errors(true);
// Creating new DOM document instance and loading HTML content
$dom = new DOMDocument();
if (!$dom -> loadHTML($file)) {

	$error = 'Error while loading source HTML!';

} else {

	//$dom -> formatOutput = true;
	// Use DomXPath
	$xpath = new DomXPath($dom);

	$div = $xpath -> query('//div[contains(@class, "chyba")]');

	if ($div -> length > 0) {

		$envodata .= 'Chyba';
		$envodata .= STATISTIC;

	} else {

		$table = $xpath -> query('//div[contains(@class, "tablist")]/table') -> item(0);
		$rows  = $table -> getElementsByTagName('tr');

		$envodata .= '
			<div class="col-sm-12" style="word-break: break-word;">
			<h5>Získaná Statistická data dle adresy</h5>
			<hr>
			<p><strong>STATISTIKA 2: Data byla nalezena a stažena</strong></p>
			<p>Doba zpracování požadavku: <span id="ajaxTime_statistics"></span></p>
			<p>Vybrané číslo objektu pro vyhledání dat: ' . $objcode . '</p>
			<p>' . STATISTIC . '</p><hr>
	';
		$envodata .= '</div>';
		$envodata .= '<div class="col-sm-12">';
		$envodata .= '<div class="table-responsive">';
		$envodata .= '<table class="table">';


		foreach ($rows as $row) {
			$envodata .= '<tr>';
			$ths = $row -> getElementsByTagName('th');
			foreach ($ths as $th) {
				$envodata .= '<th style="border-top: inherit;">' . $th -> nodeValue . '</th>';
			}
			$envodata .= '</tr>';
			$envodata .= '<tr>';
			$tds = $row -> getElementsByTagName('td');
			foreach ($tds as $td) {
				$envodata .= '<td>' . $td -> nodeValue . '</td>';
			}
			$envodata .= '</tr>';
		}

		$envodata .= '</table>';
		$envodata .= '</div>';
		$envodata .= '</div>';

	}

}

// RETURN HTML OUTPUT
//-------------------------
echo $envodata;

?>