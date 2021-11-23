<?php

session_cache_limiter('nocache');
header('Expires: ' . gmdate('r', 0));

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-type: application/json');


// PHP CODE
//-------------------------
$code  = $_POST['code'];

?>