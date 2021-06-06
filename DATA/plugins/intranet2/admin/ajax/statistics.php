<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/statistics.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../include/functions.php");

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// PHP CODE and DB
//-------------------------

// Define basic variable
$objcode = filter_var($_REQUEST['objcode'], FILTER_SANITIZE_NUMBER_INT);
// Define http STATISTIC
define('STATISTIC', 'https://regiony.kurzy.cz/katastr/o' . $objcode . '/stats/');
$file = file_get_contents(STATISTIC);
$file = mb_convert_encoding($file, 'utf-8', mb_detect_encoding($file));
// The fix: mb_convert_encoding conversion
$file = mb_convert_encoding($file, 'html-entities', 'utf-8');

// Prevents Warnings - enables user error handling
libxml_use_internal_errors(true);
// Creating new DOM document instance and loading HTML content
$dom = new DOMDocument();
if (!$dom -> loadHTML($file)) {

	$error = 'Error while loading source HTML!';

} else {

	$dom -> formatOutput = true;
	// Use DomXPath
	$xpath = new DomXPath($dom);

	// TD with contains 'Období výstavby nebo rekonstrukce domu dle SLDB 	'
	$parentNode1 = $xpath -> query('//th[contains(., "Období výstavby")]/..') -> item(0);
	$nodes1      = $xpath -> query('./td', $parentNode1);
	// TD with contains 'Materiál nosných zdí budovy'
	$parentNode2 = $xpath -> query('//th[contains(., "Materiál nosných zdí")]/..') -> item(0);
	$nodes2      = $xpath -> query('./td', $parentNode2);
	// TD with contains 'V Registru sčítacích obvodů a budov'
	$parentNode3 = $xpath -> query('//th[contains(., "sčítacích obvodů a budov")]/..') -> item(0);
	$nodes3      = $xpath -> query('./td', $parentNode3) -> item(0);
	// TD with contains 'V Informačním systému katastru nemovitostí'
	$parentNode4 = $xpath -> query('//th[contains(., "systému katastru nemovitostí")]/..') -> item(0);
	$nodes4      = $xpath -> query('./td', $parentNode4) -> item(0);
	// TD with contains 'V informačním systému základního registru RÚIAN 	'
	$parentNode5 = $xpath -> query('//th[contains(., "systému základního registru RÚIAN")]/..') -> item(0);
	$nodes5      = $xpath -> query('./td', $parentNode5) -> item(0);
	// TD with contains 'Druh domu dle SLDB'
	$parentNode6 = $xpath -> query('//th[contains(., "Druh domu dle SLDB")]/..') -> item(0);
	$nodes6      = $xpath -> query('./td', $parentNode6);
	// TD with contains 'Typ využití budovy'
	$parentNode7 = $xpath -> query('//th[contains(., "Typ využití budovy")]/..') -> item(0);
	$nodes7      = $xpath -> query('./td', $parentNode7);
	// TD with contains 'Kraj (dle statistické klasifikace NUTS)'
	$parentNode8 = $xpath -> query('//th[contains(., "Kraj (dle statistické klasifikace NUTS)")]/..') -> item(0);
	$nodes8      = $xpath -> query('./td', $parentNode8);
	// TD with contains 'Okres'
	$parentNode9 = $xpath -> query('//th[contains(., "Okres")]/..') -> item(0);
	$nodes9      = $xpath -> query('./td', $parentNode9);
	// TD with contains 'Obec'
	$parentNode10 = $xpath -> query('//th[contains(., "Obec")]/..') -> item(0);
	$nodes10      = $xpath -> query('./td', $parentNode10);
	// TD with contains 'Katastrální území'
	$parentNode11 = $xpath -> query('//th[contains(., "Katastrální území")]/..') -> item(0);
	$nodes11      = $xpath -> query('./td', $parentNode11);

	$envodata .= '
			<div  class="col-sm-12">
			<h5>Získaná Statistická data dle kódu objektu</h5>
			<hr>
			<p><strong>STATISTIKA: Data byla nalezena a stažena</strong></p>
			<p>Doba zpracování požadavku: <span id="ajaxTime_statistics"></span></p><hr>
			<p>Vybrané číslo objektu pro vyhledání dat: ' . $objcode . '</p><hr>
	';
	$envodata .= '<div>';
	$envodata .= '<h4>Identifikace území</h4>';
	$envodata .= '<p><strong>Kraj (dle statistické klasifikace NUTS):</strong> ' . $nodes8 -> item(0) -> nodeValue . ' | ' . $nodes8 -> item(1) -> nodeValue . '</p>';
	$envodata .= '<p><strong>Okres:</strong> ' . $nodes9 -> item(0) -> nodeValue . ' | ' . $nodes9 -> item(1) -> nodeValue . '</p>';
	$envodata .= '<p><strong>Obec:</strong> ' . $nodes10 -> item(0) -> nodeValue . ' | ' . $nodes10 -> item(1) -> nodeValue . '</p>';
	$envodata .= '<p><strong>Katastrální území:</strong> ' . $nodes11 -> item(0) -> nodeValue . ' | ' . $nodes11 -> item(1) -> nodeValue . '</p>';
	$envodata .= '<h4>Převažující využití budovy</h4>';
	$envodata .= '<p><strong style="color: #C10000;">Typ využití budovy:</strong> ' . $nodes7 -> item(0) -> nodeValue . ' | ' . $nodes7 -> item(1) -> nodeValue . '</p>';
	$envodata .= '<input type="hidden" class="123456" data-val="' . $nodes7 -> item(0) -> nodeValue . '" data-val-upl="' . $nodes7 -> item(0) -> nodeValue . ' | ' . $nodes7 -> item(1) -> nodeValue . '" data-el="select" data-el-name="envo_housetypeuse">';
	$envodata .= '<h4>Technické údaje budovy</h4>';
	$envodata .= '<p><strong style="color: #C10000;">Období výstavby bytového domu dle SLDB:</strong> ' . $nodes1 -> item(1) -> nodeValue . ' | ' . $nodes1 -> item(2) -> nodeValue . '</p>';
	$envodata .= '<input type="hidden" class="123456" data-val="' . $nodes1 -> item(1) -> nodeValue . '" data-val-upl="' . $nodes1 -> item(1) -> nodeValue . ' | ' . $nodes1 -> item(2) -> nodeValue . '" data-el="select" data-el-name="envo_houseperiodconstruction">';
	$envodata .= '<p><strong style="color: #C10000;">Materiál nosných zdí budovy dle ISÚI:</strong> ' . $nodes2 -> item(1) -> nodeValue . ' | ' . $nodes2 -> item(2) -> nodeValue . '</p>';
	$envodata .= '<input type="hidden" class="123456" data-val="' . $nodes2 -> item(1) -> nodeValue . '" data-val-upl="' . $nodes2 -> item(1) -> nodeValue . ' | ' . $nodes2 -> item(2) -> nodeValue . '" data-el="select" data-el-name="envo_housebuildingstructure">';
	$envodata .= '<p><strong style="color: #C10000;">Druh domu dle SLDB:</strong> ' . $nodes6 -> item(1) -> nodeValue . ' | ' . $nodes6 -> item(2) -> nodeValue . '</p>';
	$envodata .= '<input type="hidden" class="123456" data-val="' . $nodes6 -> item(1) -> nodeValue . '" data-val-upl="' . $nodes6 -> item(1) -> nodeValue . ' | ' . $nodes6 -> item(2) -> nodeValue . '" data-el="select" data-el-name="envo_housetype">';
	$envodata .= '</div>';
	$envodata .= '<div>';
	$envodata .= '<h4>Jednoznačný identifikátor budovy v rámci ČR </h4>';
	$envodata .= '<p><strong>V Registru sčítacích obvodů a budov:</strong> ' . $nodes3 -> nodeValue . '</p>';
	$envodata .= '<p><strong>V Informačním systému katastru nemovitostí:</strong> ' . $nodes4 -> nodeValue . '</p>';
	$envodata .= '<p><strong>V informačním systému základního registru RÚIAN:</strong> ' . $nodes5 -> nodeValue . '</p>';
	$envodata .= '</div>';

}


// RETURN HTML OUTPUT
//-------------------------
echo $envodata;

?>