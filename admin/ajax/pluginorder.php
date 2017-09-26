<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/pluginorder.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || !$jakuser->jakAdminaccess($jakuser->getVar("usergroupid"))) die("Nothing to see here");

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-Type: application/json;charset=utf-8');

// PHP CODE and DB
//-------------------------

// EN: Get value from ajax
// CZ: Získání dat z ajax
$id        = $_POST['id'];
$positions = $_POST['positions'];

// Define basic variable
$envodata = array();

if (!is_numeric($id) && !is_array($positions)) {

	// Data for JSON
	$envodata = array(
		'status'     => 'error_E02',
		'status_msg' => 'There is no content for the update',
	);

} else {

	foreach ($positions as $k => $v) {
		$strVals[] = 'WHEN ' . (int)$v . ' THEN ' . ((int)$k + 1) . PHP_EOL;
	}

	if (!$strVals) {
		// Data for JSON
		$envodata = array(
			'status'     => 'error_E03',
			'status_msg' => 'There is no content for the update',
		);
	} else {

		// We are using the CASE SQL operator to update the plugin positions en masse:
		$result = $envodb->query('UPDATE '.DB_PREFIX.'plugins SET pluginorder = CASE id
				'.join($strVals).'
				ELSE pluginorder
				END');

		if ($result) {
			// Data for JSON
			$envodata = array(
				'status'     => 'success',
				'status_msg' => 'Update the plugin positions was successful',
			);
		} else {
			// Data for JSON
			$envodata = array(
				'status'     => 'error_E01',
				'status_msg' => 'Update the plugin positions was incorrect',
			);
		}

	}

}

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>
