<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/getter.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../include/functions.php");

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// PHP CODE and DB
//-------------------------
/// EN: Get value from ajax
// CZ: Získání dat z ajax
$choice = filter_var($_REQUEST['datacity'], FILTER_SANITIZE_NUMBER_INT);

$result = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'int2_settings_street WHERE city_cuzk_code = "' . $choice . '" ORDER BY street_name ASC');
// EN: Determine the number of rows in the result from DB
// CZ: Určení počtu řádků ve výsledku z DB
$row_cnt = $result->num_rows;

$envodata .= '<option value=""></option>';
if ($row_cnt === 0) {
  $envodata .= '<option value="" data-street_cuzk_code="">Nenalezeny žádné ulice</option>';
} else {
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata .= '<option value="' . $row["street_name"] . '" data-street_cuzk_code="' . $row["street_cuzk_code"] . '">' . $row["street_name"] . '</option>';
  }
}


// RETURN HTML OUTPUT
//-------------------------
echo $envodata;

?>