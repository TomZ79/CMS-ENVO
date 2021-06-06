<?php

/**
 * EN: Get the data per array for belowheaders
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    07/2019
 *
 * @param $limit
 * @param $cid
 * @param $table
 * @return array
 *
 */
function envo_get_belowheader ($limit, $table)
{

	global $envodb;
	$envodata = array ();
	$result   = $envodb -> query('SELECT * FROM ' . $table . ' ORDER BY id DESC ' . $limit);
	while ($row = $result -> fetch_assoc()) {
		// EN: Insert each record into array
		// CZ: Vložení získaných dat do pole
		$envodata[] = $row;
	}

	if (!empty($envodata)) return $envodata;
}

?>