<?php

session_cache_limiter('nocache');
header('Expires: ' . gmdate('r', 0));

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-type: application/json');

// CHECK REQUEST METHOD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $_POST = filter_input_array(INPUT_POST);
} else {
  $_POST = filter_input_array(INPUT_GET);
}

// PHP CODE and DB
//-------------------------

// EN: Get value from ajax
// CZ: Získání dat z ajax
$code = $_POST['code'];

// Define basic variable
$jsondata = array();

// DB
if (!empty($code)) {

  if ($code == 'AA1') {

    // Data for JSON
    $jsondata = array(
      'response'     => 'success',
      'responsemsg' => '',
      'code'       => $code,
      'price'      => '15 658,- Kč'
    );

  } else {

    // Data for JSON
    $jsondata = array(
      'response'     => 'error E02',
      'responsemsg' => 'Zadaný kód ' . $code . ' nebyl nalezen!'
    );
  }

} else {

  // Data for JSON
  $jsondata = array(
    'response'     => 'error E01',
    'responsemsg' => 'Zadejte prosím Váš kód!'
  );
}


// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($jsondata);
echo $json_output;

?>