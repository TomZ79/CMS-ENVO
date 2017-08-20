<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/select.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Get value from ajax
// CZ: Získání dat z ajax
$houseID = $_POST['houseID'];
$entrance = $_POST['entrance'];

$jakdb->query('INSERT ' . DB_PREFIX . 'intranethousedetail SET id = NULL, houseid = "' . $houseID . '", numberentrance = "' . $entrance . '", countapartment = "", countetage = "", elevator = ""');

$result = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'intranethousedetail WHERE houseid = "' . $houseID . '" ORDER BY id ASC');

while ($row = $result->fetch_assoc()) {

  switch ($row["elevator"]) {
    case '0':
      $elevator = 'Není známo';
      break;
    case '1':
      $elevator = 'Ano';
      break;
    case '2':
      $elevator = 'Ne';
      break;
  }

  $envodata .= '<tr>  
                   <td>' . $row["id"] . '</td>  
                   <td>' . $row["numberentrance"] . '</td>  
                   <td>' . $row["countapartment"] . '</td>  
                   <td>' . $row["countetage"] . '</td>  
                   <td>' . $elevator . '</td>  
                </tr>  
               ';
}

$jakdb->query('INSERT ' . DB_PREFIX . 'intranetappartement SET id = NULL, houseid = "' . $houseID . '",  entrance = "' . $entrance . '", number = "", etage = "", name = "", phone = "", commission = ""');

echo $envodata;

?>