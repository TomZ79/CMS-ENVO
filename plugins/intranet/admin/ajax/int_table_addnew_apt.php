<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_addnew_apt.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Get value from ajax
// CZ: Získání dat z ajax
$houseID = $_POST['houseID'];
$entrance = $_POST['entrance'];

$jakdb->query('INSERT ' . DB_PREFIX . 'intranethouseapt SET id = NULL, houseid = "' . $houseID . '",  entrance = "' . $entrance . '", number = "", etage = "", name = "", phone = "", commission = ""');

$result = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'intranethouseapt WHERE houseid = "' . $houseID . '" AND entrance = "' . $entrance . '" ORDER BY id ASC');

while ($row = $result->fetch_assoc()) {

  switch ($row["commission"]) {
    case '0':
      $commission = 'Není ve Výboru';
      break;
    case '1':
      $commission = 'Předseda';
      break;
    case '2':
      $commission = 'Člen Výboru';
      break;
    case '3':
      $commission = 'Pověřený vlastník';
      break;
  }

  $envodata .= '<tr>  
                   <td>' . $row["id"] . '</td>  
                   <td>' . $row["number"] . '</td>  
                   <td>' . $row["etage"] . '</td>  
                   <td>' . $row["name"] . '</td>  
                   <td>' . $row["phone"] . '</td>  
                   <td>' . $commission . '</td>  
                </tr>  
               ';
}

echo $envodata;

?>