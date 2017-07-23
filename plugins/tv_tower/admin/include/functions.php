<?php

// EN: Getting all the data about the TV Channel with limit
// CZ: Získání všech dat o televizním kanálu s limitem
function envo_get_tvchannel($limit, $table)
{

  global $jakdb;
  $envodata = array();
  $result  = $jakdb->query('SELECT * FROM ' . $table . ' ORDER BY id DESC ' . $limit);
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

// EN: Getting all the data about the TV Channel without limit
// CZ: Získání všech dat o televizním kanálu bez limitu
function envo_get_tvchannel_info($table)
{
  global $jakdb;
  $envodata = array();
  $result = $jakdb->query('SELECT * FROM ' . $table . ' ORDER BY number ASC');
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

// EN: Getting all the data about the TV Tower with limit
// CZ: Získání všech dat o televizním vysílači s limitem
function envo_get_tvtower($limit, $table)
{

  global $jakdb;
  $envodata = array();
  $result  = $jakdb->query('SELECT * FROM ' . $table . ' ORDER BY id DESC ' . $limit);
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

// EN: Getting the data about the TV Tower without limit
// CZ: Získání dat o televizním vysílači bez limitu
function envo_get_tvtower_info($table)
{
  global $jakdb;
  $envodata = array();
  $result = $jakdb->query('SELECT * FROM ' . $table . ' ORDER BY name ASC');
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

// EN: Getting all the data about the TV Program with limit
// CZ: Získání všech dat o televizních programech s limitem
function envo_get_tvprogram($limit, $table)
{

  global $jakdb;
  $envodata = array();
  $result  = $jakdb->query('SELECT * FROM ' . $table . ' ORDER BY id DESC ' . $limit);
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

// EN: Check if channel exist
// CZ: Kontrola jestli kanál existuje
function envo_channel_not_exist($tower, $channel, $table)
{
  global $jakdb;
  $result = $jakdb->query('SELECT id FROM ' . $table . ' WHERE towerid = "' . smartsql($tower) . '" AND number = "' . smartsql($channel) . '" LIMIT 1');
  if ($jakdb->affected_rows === 1) {
    return TRUE;
  } else {
    return FALSE;
  }
}

?>