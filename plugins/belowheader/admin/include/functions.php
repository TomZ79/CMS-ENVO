<?php
// EN:
// CZ:
function jak_get_belowheader()
{

  global $envodb;
  $envodata = array();
  $result   = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'belowheader ORDER BY id DESC');
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (!empty($envodata)) return $envodata;
}

?>