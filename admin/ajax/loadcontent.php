<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/loadcontent.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || !JAK_USERID || !$jakuser->jakAdminaccess($jakuser->getVar("usergroupid"))) die("Nothing to see here");

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-Type: application/json;charset=utf-8');

// PHP CODE and DB
//-------------------------

// EN: Get value from ajax
// CZ: Získání dat z ajax
$backupid  = $_POST['backupid'];
$contentid = $_POST['contentid'];
$fid       = $_POST['fid'];

// Define basic variable
$envodata = array();

if (!is_numeric($_POST['backupid']) && !is_numeric($_POST['contentid'])) die("There is no such content!");

$row = $jakdb->queryRow('SELECT content FROM ' . DB_PREFIX . 'backup_content WHERE id = "' . smartsql($contentid) . '" AND ' . $fid . ' = "' . smartsql($backupid) . '"');

if (!$row) {
    // Data for JSON
  $envodata = array(
    'status'     => 0,
    'status_msg' => 'There is no such content!',
  );
} else {
  // Data for JSON
  $envodata = array(
    'status'     => 1,
    'status_msg' => 'Update the categories positions was incorrect',
    'rcontent'   => $row['content'],
  );
}

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>
