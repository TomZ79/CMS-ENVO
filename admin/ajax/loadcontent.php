<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/loadcontent.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || !JAK_USERID || !$jakuser->jakAdminaccess($jakuser->getVar("usergroupid"))) die("Nothing to see here");

$content_array = array("status" => 0, "rcontent" => "");

if (!is_numeric($_POST['backupid']) && !is_numeric($_POST['contentid'])) die("There is no such content!");

$row = $jakdb->queryRow('SELECT content FROM '.DB_PREFIX.'backup_content WHERE id = "'.smartsql($_POST['contentid']).'" AND '.$_POST['fid'].' = "'.smartsql($_POST['backupid']).'"');

if (!$row) die("There is no such content!");
die(json_encode(array("status" => 1, "rcontent" => $row['content'])));

?>
