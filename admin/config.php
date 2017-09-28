<?php

// EN: Error reporting, if install folder exists
// CZ: Zobrazení chybového hlášení, pokud existuje instalační složka
if (is_dir('../install')) die($tl['general_error']['generror41']);

// EN: The DB connections data
// CZ: Data pro připojení do DB
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/db.php';

// Get the real stuff
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// EN: Base definition
// CZ: Základní definice
define('BASE_URL_ADMIN', BASE_URL);
define('BASE_URL_ORIG', str_replace('/admin/', '/', BASE_URL));
define('BASE_PATH_ORIG', str_replace('/admin', '/', _APP_MAIN_DIR));

// EN: Include some functions for the ADMIN Area
// CZ: Vložení funkcí pro Administrační rozhraní
include_once 'include/admin.function.php';

// Overwrite url for admin
// We are not using apache so take the ugly urls
$temppa  = $getURL->envoGetsegAdmin(0);
$temppa1 = $getURL->envoGetsegAdmin(1);
$temppa2 = $getURL->envoGetsegAdmin(2);
$temppa3 = $getURL->envoGetsegAdmin(3);
$temppa4 = $getURL->envoGetsegAdmin(4);
$temppa5 = $getURL->envoGetsegAdmin(5);
$temppa6 = $getURL->envoGetsegAdmin(6);

?>