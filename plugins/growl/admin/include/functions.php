<?php
// EN:
// CZ:
function jak_get_growl()
{

  global $jakdb;
  $envodata = array();
  $result  = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'growl ORDER BY id DESC');
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (!empty($envodata)) return $envodata;
}

?>