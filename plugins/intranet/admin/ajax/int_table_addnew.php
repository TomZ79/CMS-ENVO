<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/select.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Get value from ajax
// CZ: Získání dat z ajax
$houseID = $_POST['houseID'];

$jakdb->query('INSERT ' . DB_PREFIX . 'intranethousedetail SET id = NULL, houseid = "' . $houseID . '", numberentrance = "' . $input['numberentrance'] . '", countapartment = "' . $input['countapartment'] . '", countetage = "' . $input['countetage'] . '", elevator = "' . $input['elevator'] . '"');

$result = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'intranethousedetail WHERE houseid = "' . $houseID . '" ORDER BY id ASC');

while ($row = $result->fetch_assoc()) {
  $envodata .= '<tr>  
                   <td>' . $row["id"] . '</td>  
                   <td>' . $row["numberentrance"] . '</td>  
                   <td>' . $row["countapartment"] . '</td>  
                   <td>' . $row["countetage"] . '</td>  
                   <td>' . $row["elevator"] . '</td>  
                </tr>  
               ';
}

echo $envodata;

?>