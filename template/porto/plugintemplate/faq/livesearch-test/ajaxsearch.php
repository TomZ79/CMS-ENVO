<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/ajaxsearch.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// PHP CODE and DB
//-------------------------

// EN: Get value from ajax
// CZ: Získání dat z ajax
$title = $_POST['search'];

// Reset
$envodata = '';

if (isset($_POST['search'])) {


  // Search query
  $result = $envodb -> query('SELECT title FROM ' . DB_PREFIX . 'faq WHERE title LIKE "%' . $title . '%" LIMIT 10');

  // Create HTML Output
  $envodata = '<ul style="margin: 0;list-style-type: none;padding: 15px 40px;">';

  while ($row = $result -> fetch_assoc()) {

    $envodata .= '<li><a href="#" onclick="fill(\'' . $row["title"] . '\'); event.preventDefault();">' . $row["title"] . '</a></li>';

  }

  $envodata .= '</ul>';
}

// RETURN HTML OUTPUT
//-------------------------
echo $envodata;

?>