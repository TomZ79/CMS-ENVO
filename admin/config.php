<?php

// Do not go any further if install folder still exists
if (is_dir('../install')) die('Please delete or rename install folder.');
if (is_dir('../install')) die($tl['general_error']['generror41']);

// EN: The DB connections data
// CZ: Spojení do DB
require_once '../include/db.php';

// Get the real stuff
require_once '../config.php';

// EN: Base definition
// CZ: Základní definice
define('BASE_URL_ADMIN', BASE_URL);
define('BASE_URL_ORIG', str_replace('/admin/', '/', BASE_URL));
define('BASE_PATH_ORIG', str_replace('/admin', '/', _APP_MAIN_DIR));

// EN: Include some functions for the ADMIN Area
// CZ: Vložení funkcí pro ADMINistrační rozhraní
include_once 'include/admin.function.php';

// Overwrite url for admin
// We are not using apache so take the ugly urls
$temppa  = $getURL->jakGetsegAdmin(0);
$temppa1 = $getURL->jakGetsegAdmin(1);
$temppa2 = $getURL->jakGetsegAdmin(2);
$temppa3 = $getURL->jakGetsegAdmin(3);
$temppa4 = $getURL->jakGetsegAdmin(4);
$temppa5 = $getURL->jakGetsegAdmin(5);
$temppa6 = $getURL->jakGetsegAdmin(6);
?>