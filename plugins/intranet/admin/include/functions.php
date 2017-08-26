<?php
// EN: Getting the data about the Houses without limit
// CZ: Získání dat o bytových domech bez limitu
function envo_get_house_info($table)
{
  global $jakdb;
  $envodata = array();
  $result = $jakdb->query('SELECT * FROM ' . $table . ' ORDER BY id ASC');
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

// EN: Getting the data about the contacts of Houses without limit
// CZ: Získání dat o hlavních kontaktech bytových domů bez limitu
function envo_get_house_contact($id, $table)
{

  global $jakdb;
  $envodata = array();
  $result  = $jakdb->query('SELECT * FROM ' . $table . ' WHERE houseid = "' . smartsql($id) . '" ORDER BY id ASC');
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

// EN: Getting the data about the entrance of Houses without limit
// CZ: Získání dat o vchodech bytových domů bez limitu
function envo_get_house_entrance($id, $table)
{

  global $jakdb;
  $envodata = array();
  $result  = $jakdb->query('SELECT * FROM ' . $table . ' WHERE houseid = "' . smartsql($id) . '" ORDER BY id ASC');
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

// EN: Getting the data about the apartment of Houses without limit
// CZ: Získání dat o bytech bytových domů bez limitu
function envo_get_house_apartment($id, $table)
{

  global $jakdb;
  $envodata = array();
  $result  = $jakdb->query('SELECT * FROM ' . $table . ' WHERE houseid = "' . smartsql($id) . '" ORDER BY id ASC');
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

// EN: Getting the data about the documents of Houses without limit
// CZ: Získání dat o dokumentech bytových domů bez limitu
function envo_get_house_documents($id, $table)
{

  global $jakdb;
  $envodata = array();
  $result  = $jakdb->query('SELECT * FROM ' . $table . ' WHERE houseid = "' . smartsql($id) . '" ORDER BY id ASC');
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

// EN: Check if channel exist
// CZ: Kontrola jestli kanál existuje
function envo_house_not_exist($ic, $table)
{
  global $jakdb;
  $result = $jakdb->query('SELECT id FROM ' . $table . ' WHERE ic = "' . smartsql($ic) . '" LIMIT 1');
  if ($jakdb->affected_rows === 1) {
    return TRUE;
  } else {
    return FALSE;
  }
}

?>