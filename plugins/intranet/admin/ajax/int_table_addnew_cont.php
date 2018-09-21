<?php
// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_addnew_cont.php] => "config.php" not found');
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
$houseID = $_POST['houseID'];
$contact = $_POST['contact'];

// Check if Entrance not exist
$result = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'int_housecontact WHERE houseid = "' . $houseID . '" AND name = "' . $contact . '" ORDER BY id ASC');
$row    = $result->fetch_assoc();

// EN: Determine the number of rows in the result from DB
// CZ: Určení počtu řádků ve výsledku z DB
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
  $envodb->query('INSERT ' . DB_PREFIX . 'int_housecontact SET id = NULL, houseid = "' . $houseID . '", name = "' . $contact . '", address = "", phone = "", email = "", commission = "0"');

  // Get all Entrance for House
  $result1 = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'int_housecontact WHERE houseid = "' . $houseID . '" ORDER BY id ASC');

  $data_array = array();

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

    $data_array[] = array(
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
    'data'       => $data_array
  );

}

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>