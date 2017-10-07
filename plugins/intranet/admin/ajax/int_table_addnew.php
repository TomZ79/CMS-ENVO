<?php
// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_addnew.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-Type: application/json;charset=utf-8');

// PHP CODE and DB
//-------------------------

// EN: Get value from ajax
// CZ: Získání dat z ajax
$houseID  = $_POST['houseID'];
$entrance = $_POST['entrance'];

// Check if Entrance not exist
$result = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'intranethouseent WHERE houseid = "' . $houseID . '" AND entrance = "' . $entrance . '" ORDER BY id ASC');
$row = $result->fetch_assoc();

// EN: Determine the number of rows in the result from DB
// CZ: Určení počtu řádků ve výsledku z DB
$row_cnt = $result->num_rows;

if ($row_cnt > 0) {
  // Number of Entrance exists

  // Data for JSON
  $envodata = array(
    'status'     => 'error',
    'status_msg' => 'Entrance Exist. Count of rows in DB: ' . $row_cnt,
    'data'       => array(
                      'id' => $row["id"]
                    )
  );

} else {
  // Number of Entrance NOT exists

  // Insert new Entrance
  $envodb->query('INSERT ' . DB_PREFIX . 'intranethouseent SET id = NULL, houseid = "' . $houseID . '", entrance = "' . $entrance . '", countapartment = "", countetage = "", elevator = "0"');

  // Get all Entrance for House
  $result1 = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'intranethouseent WHERE houseid = "' . $houseID . '" ORDER BY id ASC');

  $data_array = array();

  while ($row1 = $result1->fetch_assoc()) {
    switch ($row1["elevator"]) {
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

    $data_array[] = array(
      'id'             => $row1["id"],
      'entrance'       => $row1["entrance"],
      'countapartment' => $row1["countapartment"],
      'countetage'     => $row1["countetage"],
      'elevator'       => $elevator
    );

  }

  // Data for JSON
  $envodata = array(
    'status'     => 'success',
    'status_msg' => 'New row insert do DB',
    'data'       => $data_array
  );

}


// $envodb->query('INSERT ' . DB_PREFIX . 'intranethouseapt SET id = NULL, houseid = "' . $houseID . '",  entrance = "' . $entrance . '", number = "", etage = "", name = "", phone = "", commission = ""');

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>