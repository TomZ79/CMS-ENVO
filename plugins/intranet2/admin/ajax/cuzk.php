<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/katastr.php] => "config.php" not found');
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
$x      = intval($_REQUEST['x']);
$y      = intval($_REQUEST['y']);
$street = filter_var($_REQUEST['street'], FILTER_SANITIZE_STRING);
$city   = filter_var($_REQUEST['$city'], FILTER_SANITIZE_STRING);
// Define http KATASTR
define('KATASTR', 'http://nahlizenidokn.cuzk.cz/MapaIdentifikace.aspx?l=KN&x=-' . $x . '&y=-' . $y);
// Read the contents of the HTML remote file into a string -> variable
$file = @file_get_contents(KATASTR);
$file = mb_convert_encoding($file, 'UTF-8', mb_detect_encoding($file));
// The fix: mb_convert_encoding conversion
$file = mb_convert_encoding($file, 'HTML-ENTITIES', 'UTF-8');

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

	// Table with class 'atributySMapou'
	$nodes1 = $xpath -> query('//*[contains(concat(" ", normalize-space(@class), " "), " atributySMapou ")]//td');
	// Table with class 'atributy'
	$nodes2 = $xpath -> query('//*[contains(concat(" ", normalize-space(@class), " "), " atributy ")]//td');
	// TD with contains 'Obec'
	$parentNode3 = $xpath -> query('//td[contains(., "Obec")]/..') -> item(0);
	$nodes3_1    = $xpath -> query('./td', $parentNode3) -> item(1);
	// TD with contains 'Katastrální území'
	$parentNode4 = $xpath -> query('//td[contains(., "Katastrální")]/..') -> item(0);
	$nodes4_0    = $xpath -> query('./td', $parentNode4) -> item(0);
	$nodes4_1    = $xpath -> query('./td', $parentNode4) -> item(1);

	$envodata .= '
			<div  class="col-sm-12">
			<h5>Získaná data z databáze ČÚZK dle adresy sídla</h5>
			<hr>
			<p><strong>ČÚZK: GPS data byla nalezena a data byla stažena</strong></p>
			<p>Doba zpracování požadavku: <span id="ajaxTime_katastr"></span></p><hr>
			<p>Vybraná adresa pro vyhledání dat: ' . $street . ', ' . $city . '</p><hr>
	';

	for ($i = -1; $i < $nodes1 -> length; $i++) {
		if (($i % 2) == 0) {
			// Odd (Lichá položka)
			if ((strpos($nodes1 -> item($i) -> nodeValue, 'Katastrální') !== false) || strpos($nodes1 -> item($i) -> nodeValue, 'Obec') !== false) {
				$envodata .= '<p><strong style="color: #C10000;">' . $nodes1 -> item($i) -> nodeValue . '</strong> ';
			} else {
				$envodata .= '<p><strong>' . $nodes1 -> item($i) -> nodeValue . '</strong> ';
			}
		} else {
			// Even (Sudá položka)
			$envodata .= $nodes1 -> item($i) -> nodeValue . '</p>';
		}
	}

	$envodata .= '
			<hr>
	';

	for ($i = -1; $i < $nodes2 -> length; $i++) {
		if (($i % 2) == 0) {
			// Odd (Lichá položka)
			$envodata .= '<p><strong>' . $nodes2 -> item($i) -> nodeValue . '</strong> ';
		} else {
			// Even (Sudá položka)
			$envodata .= $nodes2 -> item($i) -> nodeValue . '</p>';
		}
	}

	$envodata .= '
			<hr>
	';

	$envodata .= '<span id="ku_obec" class="hidden">' . $nodes3_1 -> nodeValue . '</span>';
	$envodata .= '<span id="ku_name_code" class="hidden">' . $nodes4_1 -> nodeValue . '</span>';

	$envodata .= '
			</div>
	';

	/*
	$envodata .= '
			<div  class="col-sm-12">
			<h5>Získaná data z databáze ČÚZK</h5>
			<hr>
			<p><strong>ČÚZK: GPS data byla nalezena a data byla stažena</strong></p>
			<p>Doba zpracování požadavku: <span id="ajaxtimecuzk"></span></p><hr>
			<p><strong>' . $nodes -> item(2) -> nodeValue . '</strong> ' . $nodes -> item(3) -> nodeValue . '</p>
			<p><strong>' . $nodes -> item(4) -> nodeValue . '</strong> ' . $nodes -> item(5) -> nodeValue . '</p>
			<p><strong>' . $nodes -> item(14) -> nodeValue . '</strong> ' . $nodes -> item(15) -> nodeValue . '</p>
			<hr>
			</div>
	';
	*/

	/**
	 * Výpis dat do tabulky
	 * echo "<table>";
	 * foreach ($nodes as $node) {
	 * echo "<tr><td>" . $node->nodeValue . "</td></tr>\n";
	 * }
	 * echo "</table>";
	 */
}


// RETURN HTML OUTPUT
//-------------------------
echo $envodata;

?>