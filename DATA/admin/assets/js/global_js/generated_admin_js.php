<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/generated_admin_js.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Start a PHP Session
// CZ: Start PHP Session
session_start();

// Standard Language
$site_language = $setting["lang"];

// EN: Import the language file
// CZ: Import jazykových souborů
if ($setting["lang"] != $site_language && file_exists(ROOT_ADMIN . 'lang/' . $site_language . '.ini')) {
  $tl = parse_ini_file(ROOT_ADMIN . 'lang/' . $site_language . '.ini', TRUE);
} else {
  $tl            = parse_ini_file(ROOT_ADMIN . 'lang/' . $setting["lang"] . '.ini', TRUE);
  $site_language = $setting["lang"];
}

// Set define variable
$BASE_URL_ORIG  = $_SERVER['HTTP_HOST'];
$BASE_URL_ADMIN = $_SERVER['HTTP_HOST'] . '/admin/';
$BASE_PATH_ORIG = $_SERVER['DOCUMENT_ROOT'];
$BASE_PATH_ADMIN = $_SERVER['DOCUMENT_ROOT'] . '/admin/';
$ENVO_TEMPLATE  = $setting["sitestyle"];
$acemode = $_SESSION['acemode'];

// GENERATED JAVASCRIPT FILE
//---------------------------

// Set content type header
header('Content-Type: application/x-javascript;charset=utf-8');

echo <<<EOT
 
/*
 * CMS ENVO
 * PHP Generated javascript file with variable for external js files  - ADMIN
 * Copyright (c) 2016 - 2021 Bluesat.cz
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
envoWeb.envo_path = '{$BASE_PATH_ADMIN}';
envoWeb.envo_lang = '{$site_language}';
envoWeb.envo_template = '{$ENVO_TEMPLATE}';

// ACE Editor options
var aceEditor = {
  acetheme: '{$setting["acetheme"]}',
  aceactivewrap: '{$setting["aceactivewrap"]}',
  acewraplimit: '{$setting["acewraplimit"]}',
  acetabSize: '{$setting["acetabSize"]}',
  aceactiveline: '{$setting["aceactiveline"]}',
  fontSize: '{$setting["acefontsize"]}',
  aceinvisible: '{$setting["aceinvisible"]}',
  acegutter: '{$setting["acegutter"]}',
  acemode: '{$acemode}'
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

// DataTables settings
var dataTablesSettings = {
  pageLenght: {$setting["adminpageitem"]},
};
EOT;

?>