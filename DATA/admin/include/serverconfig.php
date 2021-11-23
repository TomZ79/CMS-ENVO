<?php

$webserver = $addsapi = '';

if (preg_match('#(Apache)/([0-9\.]+)\s#siU', $_SERVER['SERVER_SOFTWARE'], $wsregs)) {
  $webserver = "$wsregs[1] v$wsregs[2]";
} elseif (preg_match('#Microsoft-IIS/([0-9\.]+)#siU', $_SERVER['SERVER_SOFTWARE'], $wsregs)) {
  $webserver = "IIS v$wsregs[1]";
  $addsapi   = true;
} elseif (preg_match('#Zeus/([0-9\.]+)#siU', $_SERVER['SERVER_SOFTWARE'], $wsregs)) {
  $webserver = "Zeus v$wsregs[1]";
  $addsapi   = true;
} elseif (strtoupper($_SERVER['SERVER_SOFTWARE']) == 'APACHE') {
  $webserver = 'Apache';
}

if ($addsapi) $webserver .= ' (' . SAPI_NAME . ')';

$serverinfo = (ini_get('file_uploads') == 0 or strtolower(ini_get('file_uploads')) == 'off') ? "<br />disabled" : '';

$memorylimit = ini_get('memory_limit') . 'B';
$postmax     = ini_get('upload_max_filesize') . 'B';

$mysqlversion = envo_cut_text(mysqli_get_client_info(), 19, '...');

$phpversion = PHP_VERSION;

$serverip = $_SERVER['SERVER_ADDR'];

$WEBS  = $webserver;
$SERVI = $serverinfo;
$POSTM = $postmax;
$MEML  = $memorylimit;
$MYV   = $mysqlversion;
$PHPV  = $phpversion;
$SRVIP = $serverip;

?>