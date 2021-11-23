<?php

/**
 * EN: Getting the data about Films without limit
 * CZ: Získání dat o filmech bez limitu
 *
 * @author  Thomas Zukal
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $table
 * @return array
 *
 */

function envo_get_film_info ($table)
{

	global $envodb;
	$envodata = array ();
	$result   = $envodb -> query('SELECT * FROM ' . $table . ' ORDER BY id DESC ');
	while ($row = $result -> fetch_assoc()) {
		// EN: Insert each record into array
		// CZ: Vložení získaných dat do pole
		$envodata[] = $row;
	}

	if (!empty($envodata)) return $envodata;
}

?>