<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/vote.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

//
$vote = strip_tags(smartsql($_POST['vote']));
$voteid = $_POST['voteid'];
$commid = $_POST['votecommentid'];
$table = $_POST['votetable'];

// Narrow down search, only three charactars and more
if (is_numeric($voteid) && ($vote == 'up' || $vote == 'down')) {

  $jakdb->query('SHOW TABLES LIKE "' . smartsql($table) . '"');
  if ($jakdb->affected_rows == 1) {

    $result = jak_save_vote($vote, $voteid, $table, $commid);

    echo $_POST['vote'];

  }

}

?>