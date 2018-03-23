<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/generated_js.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Standard Language
$site_language = $setting["lang"];

// EN: Import the language file
// CZ: Import jazykových souborů
if ($setting["lang"] != $site_language && file_exists(APP_PATH . 'lang/' . $site_language . '.ini')) {
  $tl = parse_ini_file(APP_PATH . 'lang/' . $site_language . '.ini', TRUE);
} else {
  $tl            = parse_ini_file(APP_PATH . 'lang/' . $setting["lang"] . '.ini', TRUE);
  $site_language = $setting["lang"];
}

// Set define variable
$BASE_URL_ORIG  = BASE_URL;
$BASE_URL       = BASE_URL;
$BASE_PATH_ORIG = BASE_PATH_ORIG;
$ENVO_TEMPLATE  = $setting["sitestyle"];
$REQUEST_URI    = ENVO_PARSE_REQUEST;
$FORGOT_LOGIN   = (isset($errorfp) && !empty($errorfp) ? '1' : '0');

// GENERATED JAVASCRIPT FILE
//---------------------------

// Set content type header
header('Content-Type: application/x-javascript;charset=utf-8');

echo $page2;
echo <<<EOT

/*
 * CMS ENVO
 * PHP Generated javascript file with variable for external js files  - FRONTEND
 * Copyright (c) 2016 - 2018 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 *
 */
 
// Global options
envoWeb.envo_url_orig = '{$BASE_URL_ORIG}';
envoWeb.envo_url = '{$BASE_URL}';
envoWeb.envo_lang = '{$site_language}';
envoWeb.envo_jslang = '{$jslangdata_output}';
envoWeb.envo_template = '{$ENVO_TEMPLATE}';
envoWeb.envo_search_link = '{$ENVO_SEARCH_LINK}';
envoWeb.request_uri = '{$REQUEST_URI}';
envoWeb.envo_quickedit = '{$tl["global_text"]["gtxt6"]}';
envoWeb.envo_forgotlogin = '{$FORGOT_LOGIN}';

// Name of options
var Name = {
  Subname: '{$VAR}',
};

EOT;

?>