<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/search_data.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-Type: application/json;charset=utf-8');

// PHP CODE and DB
//-------------------------
// Define basic variable
$city             = filter_var($_REQUEST['city'], FILTER_SANITIZE_NUMBER_INT);
$estatemanagement = filter_var($_REQUEST['estatemanagement'], FILTER_SANITIZE_NUMBER_INT);
$management       = filter_var($_REQUEST['management'], FILTER_VALIDATE_BOOLEAN);
$envodata         = array ();
$data_array       = array ();
$sql              = '';
$searchstring     = array (
	'city'             => $city,
	'estatemanagement' => $estatemanagement,
	'management'       => $management
);

if (!empty($city)) {
	$sql .= 't2.city = ' . $city . ' ';
}

if (!empty($estatemanagement)) {
	if (!empty($sql)) {
		$sql .= 'AND t2.estatemanagement = ' . $estatemanagement . ' ';
	} else {
		$sql .= 't2.estatemanagement = ' . $estatemanagement . ' ';
	}
}

if ($management == TRUE) {
	if (!empty($sql)) {
		$sql .= 'AND t2.administration = ' . $management . ' ';
	} else {
		$sql .= 't2.administration = ' . $management . ' ';
	}
}

if (!empty($sql)) {
	$cond .= 'WHERE ' . $sql;
}

$result = $envodb -> query('SELECT
																		t1.*,
																		t2.id as obj_id,
																		t2.name as obj_name,
																		t2.estatemanagement as estatemanagement_id,
																		t3.city_name,
																		t4.name as estatemanagement_name
																	FROM
																		' . DB_PREFIX . 'int2_houseent t1
																	LEFT JOIN 
																		' . DB_PREFIX . 'int2_house t2
																			ON t1.houseid = t2.id
																	LEFT JOIN 
																		' . DB_PREFIX . 'int2_settings_city t3
																			ON t2.city = t3.id
																	LEFT JOIN 
																		' . DB_PREFIX . 'int2_settings_estatemanagement t4
																			ON t2.estatemanagement = t4.id
																	' . $cond . ' 
																	ORDER BY t1.id ASC');

// EN: Determine the number of rows in the result from DB
// CZ: Určení počtu řádků ve výsledku z DB
$row_cnt = $result -> num_rows;

while ($row = $result -> fetch_assoc()) {

	// There should be always a varname in categories and check if seo is valid
	$parseurl = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2 . '/house', 'h', $row['obj_id'], FALSE);

	// EN: Insert each record into array
	// CZ: Vložení získaných dat do pole
	$data_array[] = array (
		'id'                    => $row['id'],
		'obj_name'              => $row['obj_name'],
		'street'                => $row['street'],
		'city_name'             => $row['city_name'],
		'estatemanagement_id'   => $row['estatemanagement_id'],
		'estatemanagement_name' => $row['estatemanagement_name'],
		'gpslat'                => $row['gpslat'],
		'gpslng'                => $row['gpslng'],
		'parseurl'              => $parseurl,
	);
}
// Setting output array
$envodata = array (
	'status'        => 'data_success',
	'status_msg'    => '',
	'status_info'   => '',
	'search_string' => $searchstring,
	'count_data'    => $row_cnt,
	'data'          => $data_array
);


// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>