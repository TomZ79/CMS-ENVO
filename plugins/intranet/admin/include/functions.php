<?php
// EN: Getting the data about the Houses without limit
// CZ: Získání dat o bytových domech bez limitu
function envo_get_house_info($table)
{
  global $jakdb;
  $envodata = array();
  $result   = $jakdb->query('SELECT * FROM ' . $table . ' ORDER BY id ASC');
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
  $result   = $jakdb->query('SELECT * FROM ' . $table . ' WHERE houseid = "' . smartsql($id) . '" ORDER BY id ASC');
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
  $result   = $jakdb->query('SELECT * FROM ' . $table . ' WHERE houseid = "' . smartsql($id) . '" ORDER BY id ASC');
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
  $result   = $jakdb->query('SELECT * FROM ' . $table . ' WHERE houseid = "' . smartsql($id) . '" ORDER BY id ASC');
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
  $result   = $jakdb->query('SELECT * FROM ' . $table . ' WHERE houseid = "' . smartsql($id) . '" ORDER BY id ASC');
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

// EN: Check if house exist
// CZ: Kontrola jestli dům existuje
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

// EN:
// CZ:
function envo_extension_icon($filename)
{
  $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

  switch ($extension){
    case ('doc'):
      return '<i class="fa fa-file-word-o fa-2x m-l-30" style="color:#000;"></i>';
      break;
    case ('docx'):
      return '<i class="fa fa-file-word-o fa-2x m-l-30" style="color:#000;;"></i>';
      break;
    case ('docm'):
      return '<i class="fa fa-file-word-o fa-2x m-l-30" style="color:#000;;"></i>';
      break;
    case ('xls'):
      return '<i class="fa fa-file-excel-o fa-2x m-l-30" style="color:#000;;"></i>';
      break;
    case ('xlsx'):
      return '<i class="fa fa-file-excel-o fa-2x m-l-30" style="color:#000;;"></i>';
      break;
    case ('xlsm'):
      return '<i class="fa fa-file-excel-o fa-2x m-l-30" style="color:#000;;"></i>';
      break;
    case 'pdf':
      return '<i class="fa fa-file-pdf-o fa-2x m-l-30" style="color:#000;;"></i>';
      break;
    case ('jpg'):
      return '<i class="fa fa-file-image-o fa-2x m-l-30" style="color:#000;;"></i>';
      break;
    default:
      return FALSE;
  }
}

?>