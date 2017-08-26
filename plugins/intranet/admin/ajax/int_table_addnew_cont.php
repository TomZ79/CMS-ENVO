<?php
// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_addnew_cont.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.
header('Content-Type: application/json');

// EN: Get value from ajax
// CZ: Získání dat z ajax
$houseID = $_POST['houseID'];
$contact = $_POST['contact'];

// Check if Entrance not exist
$result = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'intranethousecontact WHERE houseid = "' . $houseID . '" AND name = "' . $contact . '" ORDER BY id ASC');
$row    = $result->fetch_assoc();
// Determine number of rows result set
$row_cnt = $result->num_rows;

if ($row_cnt > 0) {
  // Count of Contact exists

  // Data for JSON
  $envodata = array(
    'status'     => 'error',
    'status_msg' => 'Contact Exist. Count of rows in DB: ' . $row_cnt,
    'data'       => array(
      'id' => $row["id"]
    )
  );

} else {
  // Count of Contact NOT exists

  // Insert new Entrance
  $jakdb->query('INSERT ' . DB_PREFIX . 'intranethousecontact SET id = NULL, houseid = "' . $houseID . '", name = "' . $contact . '", address = "", phone = "", email = "", commission = "0"');

  // Get all Entrance for House
  $result1 = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'intranethousecontact WHERE houseid = "' . $houseID . '" ORDER BY id ASC');

  $myarray = array();

  while ($row1 = $result1->fetch_assoc()) {
    switch ($row1["commission"]) {
      case '0':
        $commission = 'Není ve Výboru';
        break;
      case '1':
        $commission = 'Předseda';
        break;
      case '2':
        $commission = 'Člen Výboru';
        break;
      case '2':
        $commission = 'Pověřený vlastník';
        break;
    }

    $myarray[] = array(
      'id'         => $row1["id"],
      'name'       => $row1["name"],
      'address'    => $row1["address"],
      'phone'      => $row1["phone"],
      'email'      => $row1["email"],
      'commission' => $commission
    );

  }

  // Data for JSON
  $envodata = array(
    'status'     => 'success',
    'status_msg' => 'New row insert do DB',
    'data'       => $myarray
  );

}

// RETURN JSON OUTPUT
$json_output = json_encode($envodata);
echo $json_output;

?>