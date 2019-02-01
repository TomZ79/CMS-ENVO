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
$x = intval($_REQUEST['x']);
$y = intval($_REQUEST['y']);
define('KATASTR', 'http://nahlizenidokn.cuzk.cz/MapaIdentifikace.aspx?l=KN&x=-' . $x . '&y=-' . $y);
$file = @file_get_contents(KATASTR);
$file = mb_convert_encoding($file, 'utf-8', mb_detect_encoding($file));
// The fix: mb_convert_encoding conversion
$file = mb_convert_encoding($file, 'html-entities', 'utf-8');

//Prevents Warnings, remove if desired
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
	$parentNode = $xpath -> query('//td[contains(., "Katastr")]/..') -> item(0);

	$nodes2 = $xpath -> query('./td', $parentNode)->item(1);
	// Table with class 'atributy'
	$nodes3 = $xpath -> query('//*[contains(concat(" ", normalize-space(@class), " "), " atributy ")]//td');

	$envodata .= '
			<div  class="col-sm-12">
			<h5>Získaná data z databáze ČÚZK dle sídla</h5>
			<hr>
			<p><strong>ČÚZK: GPS data byla nalezena a data byla stažena</strong></p>
			<p>Doba zpracování požadavku: <span id="ajaxKatastrTime1"></span></p><hr>
	';

	for ($i = -1; $i < $nodes1 -> length; $i++) {
		if (($i % 2) == 0) {
			// Odd (Lichá položka)
			$envodata .= '<p><strong>' . $nodes1 -> item($i) -> nodeValue . '</strong> ';
		} else {
			// Even (Sudá položka)
			$envodata .= $nodes1 -> item($i) -> nodeValue . '</p>';
		}
	}

	$envodata .= '<span id="ku_nc" class="hidden">' . $nodes2 -> nodeValue . '</span>';

	$envodata .= '
			<hr>
	';

	for ($i = -1; $i < $nodes3 -> length; $i++) {
		if (($i % 2) == 0) {
			// Odd (Lichá položka)
			$envodata .= '<p><strong>' . $nodes3 -> item($i) -> nodeValue . '</strong> ';
		} else {
			// Even (Sudá položka)
			$envodata .= $nodes3 -> item($i) -> nodeValue . '</p>';
		}
	}

	$envodata .= '
			<hr>
	';

	$envodata .= '
			</div>
	';

	/*
	$envodata .= '
			<div  class="col-sm-12">
			<h5>Získaná data z databáze ČÚZK</h5>
			<hr>
			<p><strong>ČÚZK: GPS data byla nalezena a data byla stažena</strong></p>
			<p>Doba zpracování požadavku: <span id="ajaxKatastrTime1"></span></p><hr>
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