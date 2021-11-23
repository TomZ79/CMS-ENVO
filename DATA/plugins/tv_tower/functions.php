<?php

/**
 * EN: Getting all the data about the TV Channel
 * CZ: Získání všech dat o televizním kanálu
 *
 * @author  Thomas Zukal
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $table
 * @return array
 *
 */
function envo_get_tvchannel_info ($table)
{
	global $envodb;
	$envodata = array ();
	$result   = $envodb -> query('SELECT * FROM ' . $table . ' ORDER BY number ASC');
	while ($row = $result -> fetch_assoc()) {
		// EN: Insert each record into array
		// CZ: Vložení získaných dat do pole
		$envodata[] = $row;
	}

	if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting the data about the TV Tower
 * CZ: Získání dat o televizním vysílači
 *
 * @author  Thomas Zukal
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $table
 * @return array
 *
 */
function envo_get_tvtower_info ($table)
{
	global $envodb;
	$envodata = array ();
	$result   = $envodb -> query('SELECT * FROM ' . $table . ' ORDER BY name ASC');
	while ($row = $result -> fetch_assoc()) {
		// EN: Insert each record into array
		// CZ: Vložení získaných dat do pole
		$envodata[] = $row;
	}

	if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting the data about the TV Program
 * CZ: Získání všech dat o televizních programech
 * @author  Thomas Zukal
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $table
 * @return array
 *
 */
function envo_get_tvprogram_info ($table)
{
	global $envodb;
	$envodata = array ();
	$result   = $envodb -> query('SELECT * FROM ' . $table . ' ORDER BY channelid DESC');
	while ($row = $result -> fetch_assoc()) {
		// EN: Insert each record into array
		// CZ: Vložení získaných dat do pole
		$envodata[] = $row;
	}

	if (isset($envodata)) return $envodata;
}

?>