<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/cuzk_code.php] => "config.php" not found');
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
$adIdtxt = intval($_REQUEST['adIdtxt']);
$street  = filter_var($_REQUEST['street'], FILTER_SANITIZE_STRING);
$city    = filter_var($_REQUEST['city'], FILTER_SANITIZE_STRING);
// Define http KATASTR
define('KATASTR', 'http://vdp.cuzk.cz/vdp/ruian/adresnimista/' . $adIdtxt);
// Read the contents of the HTML remote file into a string -> variable
$file = @file_get_contents(KATASTR);
$file = mb_convert_encoding($file, 'UTF-8', mb_detect_encoding($file));
// The fix: mb_convert_encoding conversion
$file = mb_convert_encoding($file, 'HTML-ENTITIES', 'UTF-8');

// Prevents Warnings - enables user error handling
libxml_use_internal_errors(true);
// Creating new DOM document instance and loading HTML content
$dom = new DOMDocument();
if (!$dom->loadHTML($file)) {
  
  $error = 'Error while loading source HTML!';
  
} else {
  
  $dom->formatOutput = true;
  // Use DomXPath
  $xpath = new DomXPath($dom);
  
  // TD with contains 'Adresní bod'
  $parentNode2 = $xpath->query('//td[contains(., "Adresní bod")]/..')->item(0);
  $nodes2_0    = $xpath->query('./td', $parentNode2)->item(0);
  $nodes2_1    = $xpath->query('./td', $parentNode2)->item(1);
  //
  $nodes3 = $xpath->query('//select[@name="path"]/optgroup/option/@value');
  
  $envodata .= '
			<div  class="col-sm-12">
			<h5>Získaná data z databáze ČÚZK dle adresního místa</h5>
			<hr>
			<p><strong>ČÚZK: Data byla nalezena a stažena</strong></p>
			<p>Doba zpracování požadavku: <span id="ajaxTime_katastr"></span></p><hr>
			<p>Vybraná adresa pro vyhledání dat: ' . $street . ', ' . $city . '</p>
			<p>Vybrané adresní místo pro vyhledání dat: ' . $adIdtxt . '</p><hr>
	';
  
  $envodata .= '<p><strong>' . $nodes2_0->nodeValue . '</strong> ' . $nodes2_1->nodeValue . '</p>';
  
  for ($i = -1; $i < $nodes3->length; $i++) {
    
    $string = ltrim($nodes3->item($i)->nodeValue, '/');
    $string = str_replace('/', ',', $string);
    $str    = explode(',', $string);
    
    if ($str[0] == 'stavebniobjekty') {
      $buVdpId  = $str[1];
      $envodata .= '<p><strong style="color: #C10000;">Kód objektu (buVdpId):</strong> ' . $str[1] . '</p>';
      $envodata .= '<span id="stavebniobjekty" class="hidden">' . $str[1] . '</span>';
    }
  }
  
  $envodata .= '<p><strong>Detail adresního místa: </strong><a href="http://vdp.cuzk.cz/vdp/ruian/adresnimista/' . $adIdtxt . '" target="WindowCUZK">Zobrazit detail adresy na ČÚZK</a></p>';
  $envodata .= '<p><strong>Detail stavebního objektu: </strong><a href="http://vdp.cuzk.cz/vdp/ruian/stavebniobjekty/' . $buVdpId . '" target="WindowCUZK">Zobrazit detail objektu na ČÚZK</a></p><hr>';
  
  $envodata .= '
			</div>
	';
 
}


// RETURN HTML OUTPUT
//-------------------------
echo $envodata;

?>