<?php

/**
 * EN: Get all the data from 'belowheader' table
 * CZ: Získání všech dat z tabulky 'belowheader'
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @return array
 *
 */

function envo_get_belowheader()
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