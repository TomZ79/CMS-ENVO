<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/gpscoordinates_osm.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../include/functions.php");

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-Type: application/json;charset=utf-8');

// PHP CODE and DB
//-------------------------
// Define basic variable
$street        = filter_var($_REQUEST['street'], FILTER_SANITIZE_STRING);
$city          = filter_var($_REQUEST['city'], FILTER_SANITIZE_STRING);
$envodata      = array();
$data_array    = array();
$data_allarray = array();
$searchstring  = array(
  'street' => $street,
  'city'   => $city,
);

// Refresh time in cache
$n_day = 60;
define('REFRESH_TIME', 3600 * 24 * $n_day);
// Path for cache files
define('TMP_PATH', APP_PATH . 'plugins/intranet2/admin/tmp/');
// Define http OSM
define('OSM', 'https://nominatim.openstreetmap.org/search?street=' . $street . '&city=' . $city . '&format=json&addressdetails=1');
$remoteURL = html_entity_decode(OSM);
//
$USERAGENT = $_SERVER['HTTP_USER_AGENT'];
// Set locale cached file
$localFile = TMP_PATH . 'gps_osm.preloaded.' . md5($street . $city) . '.tmp';

// Check if folder 'TMP_PATH' exists
if (!folder_exist(TMP_PATH)) {
  $envodata = array(
    'status'        => 'error_E01',
    'status_msg'    => 'PHP SCRIPT: Pracovní adresář "..tmp" neexistuje',
    'status_info'   => 'Zkontrolujte zdali existuje pracovní adresář "..tmp" pro ukládání dat.',
    'tmp_directory' => TMP_PATH
  );
  
  // RETURN JSON OUTPUT
  //-------------------------
  $json_output = json_encode($envodata);
  echo $json_output;
  exit;
}

if (!file_exists($localFile) || filemtime($localFile) <= (time() - REFRESH_TIME)) {
  // IF NOT EXISTS CACHE
  
  // Set attribute for 'file_get_contents'
  $ctx = stream_context_create(array(
      'http' => array(
        'timeout' => 60,
        'header'  => "User-Agent: $USERAGENT\r\n"
      )
    )
  );
  
  // Read the contents of the JSON remote file into a string -> variable
  $file = file_get_contents($remoteURL, false, $ctx);
  if ($file) {
    // Save data to local file
    file_put_contents($localFile, $file);
  }
  
} else {
  // IF EXISTS CACHE
  
  // Read the contents of the JSON local file into a string -> variable
  $file = file_get_contents($localFile);
}

if ($file) {
  $json = json_decode($file, true);
  if ($json) {
    
    $data_allarray = $json;
    $i             = 0;
    foreach ($data_allarray as $result) {
      $data_array[$i] = array(
        'display_name' => $data_allarray[$i]['display_name'],
        'lat'          => $data_allarray[$i]['lat'],
        'lon'          => $data_allarray[$i]['lon'],
      );
      $i++;
    }
    $count_data = $i;
    
    $envodata = array(
      'status'        => 'success',
      'status_msg'    => 'GPS OSM: Vyhledávání bylo ÚSPĚŠNÉ a data byla stažena',
      'status_info'   => '',
      'tmp_directory' => TMP_PATH,
      'http'          => OSM,
      'search_string' => $searchstring,
      'count_data'    => $count_data,
      'data_all'      => $data_allarray,
      'data'          => $data_array
    );
    
  } else {
    // XML se nepodařilo načíst - nějaká chyba
    
    $envodata = array(
      'status'      => 'error_E03',
      'status_msg'  => 'PHP SCRIPT: ',
      'status_info' => '',
    );
    
  }
} else {
  // došlo k chybě připojení, nebo se nepodařilo soubor stáhnout či přečíst z nějakého jiného důvodu
  
  $envodata = array(
    'status'      => 'error_E02',
    'status_msg'  => 'PHP SCRIPT: ',
    'status_info' => '',
  );
  
}


// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>