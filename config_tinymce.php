<?php

// Basic require file
require_once '../../../../../include/db.php';
require_once '../../../../../class/class.db.php';

// Do not go any further if install folder still exists
if (is_dir('install')) die('Please delete or rename install folder.');

// Absolute Path
define('APP_PATH', dirname(__file__) . DIRECTORY_SEPARATOR);

// MySQLi connection
$envodb = new ENVO_mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
$envodb -> set_charset("utf8");

// Get the lang settings out the database
$result = $envodb -> query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "lang" LIMIT 1');
$row    = $result -> fetch_assoc();

// Set lang for Filemanager
if ($row["value"] == 'en') {
  $managerlang = 'en_EN';
} else {
  $managerlang = 'cs';
}

?>