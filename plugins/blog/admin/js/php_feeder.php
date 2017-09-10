<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/php_feeder.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// Standard Language
$site_language = $jkv["lang"];

// EN: Import the language file
// CZ: Import jazykových souborů
if ($jkv["lang"] != $site_language && file_exists(APP_PATH . 'admin/lang/' . $site_language . '.ini')) {
  $tl = parse_ini_file(APP_PATH . 'admin/lang/' . $site_language . '.ini', TRUE);
} else {
  $tl            = parse_ini_file(APP_PATH . 'admin/lang/' . $jkv["lang"] . '.ini', TRUE);
  $site_language = $jkv["lang"];
}

// Set define variable

$BASE_URL_ORIG = BASE_URL_ORIG;
$BASE_URL_ADMIN = BASE_URL_ADMIN;
$BASE_PATH_ORIG = BASE_PATH_ORIG;
$ENVO_TEMPLATE = $jkv["sitestyle"];

// Set content type header
header("content-type: application/x-javascript");

echo <<<EOT

/*
 * CMS ENVO
 * PHP Generated javascript file with variable for external js files  - Admin
 * Copyright © 2016 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 *
 */
 
envoWeb.envo_url_orig = '{$BASE_URL_ORIG}',
envoWeb.envo_url = '{$BASE_URL_ADMIN}',
envoWeb.envo_path = '{$BASE_PATH_ORIG}',
envoWeb.envo_lang = '{$site_language}',
envoWeb.envo_template = '{$ENVO_TEMPLATE}',
  
var aceEditor = {
  acetheme: '{$jkv["acetheme"]}',
  acewraplimit: '{$jkv["acewraplimit"]}',
  acetabSize: '{$jkv["acetabSize"]}',
  aceactiveline: '{$jkv["aceactiveline"]}',
  aceinvisible: '{$jkv["aceinvisible"]}',
  acegutter: '{$jkv["acegutter"]}'
};

var iconPicker = {
  searchText: '{$tl["placeholder"]["p4"]}',
  labelFooter: '{$tl["global_text"]["globaltxt18"]}'
};

EOT;


?>