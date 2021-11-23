<?php

// Basic require file
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/db.php';

// Do not go any further if install folder still exists
if (is_dir('install')) die('Please delete or rename install folder.');

?>