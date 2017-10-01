<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/php_feeder.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// Standard Language
$site_language = $setting["lang"];

// EN: Import the language file
// CZ: Import jazykových souborů
if ($setting["lang"] != $site_language && file_exists(APP_PATH . 'admin/lang/' . $site_language . '.ini')) {
  $tl = parse_ini_file(APP_PATH . 'admin/lang/' . $site_language . '.ini', TRUE);
} else {
  $tl            = parse_ini_file(APP_PATH . 'admin/lang/' . $setting["lang"] . '.ini', TRUE);
  $site_language = $setting["lang"];
}

// Set define variable
$BASE_URL_ORIG = BASE_URL_ORIG;
$BASE_URL_ADMIN = BASE_URL_ADMIN;
$BASE_PATH_ORIG = BASE_PATH_ORIG;
$ENVO_TEMPLATE = $setting["sitestyle"];

// GENERATED JAVASCRIPT FILE
//---------------------------

// Set content type header
header('Content-Type: application/x-javascript;charset=utf-8');

echo $page2;
echo <<<EOT

/*
 * CMS ENVO
 * PHP Generated javascript file with variable for external js files  - ADMIN
 * Copyright (c) 2016 - 2017 Bluesat.cz
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
envoWeb.envo_url = '{$BASE_URL_ADMIN}';
envoWeb.envo_path = '{$BASE_PATH_ORIG}';
envoWeb.envo_lang = '{$site_language}';
envoWeb.envo_template = '{$ENVO_TEMPLATE}';

// ACE Editor options
var aceEditor = {
  acetheme: '{$setting["acetheme"]}',
  acewraplimit: '{$setting["acewraplimit"]}',
  acetabSize: '{$setting["acetabSize"]}',
  aceactiveline: '{$setting["aceactiveline"]}',
  fontSize: '{$setting["acefontsize"]}',
  aceinvisible: '{$setting["aceinvisible"]}',
  acegutter: '{$setting["acegutter"]}'
};

// Icon Picker options
var iconPicker = {
  searchText: '{$tl["placeholder"]["p4"]}',
  labelFooter: '{$tl["global_text"]["globaltxt18"]}'
};

// Notification
var notification = {
  confirmRestore: '{$tl["page_notification"]["restore"]}',
};

// Global settings
var globalSettings = {
  advEditor: '{$setting["adv_editor"]}',
};
EOT;

?>