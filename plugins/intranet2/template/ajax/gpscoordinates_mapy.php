<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/gpscoordinates_mapy.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-Type: application/json;charset=utf-8');


// https://outlandish.com/blog/tutorial/xml-to-json/
function xmlToArray ($xml, $options = array ())
{
	$defaults       = array (
		'namespaceSeparator' => ':',//you may want this to be something other than a colon
		'attributePrefix'    => '@',   //to distinguish between attributes and nodes with the same name
		'alwaysArray'        => array (),   //array of xml tag names which should always become arrays
		'autoArray'          => false,        //only create arrays for tags which appear more than once
		'textContent'        => '$',       //key used for the text content of elements
		'autoText'           => true,         //skip textContent key if node has no attributes or child nodes
		'keySearch'          => false,       //optional search and replace on tag and attribute names
		'keyReplace'         => false       //replace values for above search values (as passed to str_replace())
	);
	$options        = array_merge($defaults, $options);
	$namespaces     = $xml -> getDocNamespaces();
	$namespaces[''] = null; //add base (empty) namespace

	//get attributes from all namespaces
	$attributesArray = array ();
	foreach ($namespaces as $prefix => $namespace) {
		foreach ($xml -> attributes($namespace) as $attributeName => $attribute) {
			//replace characters in attribute name
			if ($options['keySearch']) $attributeName =
				str_replace($options['keySearch'], $options['keyReplace'], $attributeName);
			$attributeKey                   = $options['attributePrefix']
				. ($prefix ? $prefix . $options['namespaceSeparator'] : '')
				. $attributeName;
			$attributesArray[$attributeKey] = (string)$attribute;
		}
	}

	//get child nodes from all namespaces
	$tagsArray = array ();
	foreach ($namespaces as $prefix => $namespace) {
		foreach ($xml -> children($namespace) as $childXml) {
			//recurse into child nodes
			$childArray = xmlToArray($childXml, $options);
			list($childTagName, $childProperties) = each($childArray);

			//replace characters in tag name
			if ($options['keySearch']) $childTagName =
				str_replace($options['keySearch'], $options['keyReplace'], $childTagName);
			//add namespace prefix, if any
			if ($prefix) $childTagName = $prefix . $options['namespaceSeparator'] . $childTagName;

			if (!isset($tagsArray[$childTagName])) {
				//only entry with this key
				//test if tags of this type should always be arrays, no matter the element count
				$tagsArray[$childTagName] =
					in_array($childTagName, $options['alwaysArray']) || !$options['autoArray']
						? array ($childProperties) : $childProperties;
			} elseif (
				is_array($tagsArray[$childTagName]) && array_keys($tagsArray[$childTagName])
				=== range(0, count($tagsArray[$childTagName]) - 1)
			) {
				//key already exists and is integer indexed array
				$tagsArray[$childTagName][] = $childProperties;
			} else {
				//key exists so convert to integer indexed array with previous value in position 0
				$tagsArray[$childTagName] = array ($tagsArray[$childTagName], $childProperties);
			}
		}
	}

	//get text content of node
	$textContentArray = array ();
	$plainText        = trim((string)$xml);
	if ($plainText !== '') $textContentArray[$options['textContent']] = $plainText;

	//stick it all together
	$propertiesArray = !$options['autoText'] || $attributesArray || $tagsArray || ($plainText === '')
		? array_merge($attributesArray, $tagsArray, $textContentArray) : $plainText;

	//return node as array
	return array (
		$xml -> getName() => $propertiesArray
	);
}

// https://gist.github.com/icetee/0d12dc6703e23f33da6dfbb78a37d814
function replaceKeys (array $input)
{
	$return = array ();
	foreach ($input as $key => $value) {
		if (strpos($key, '@') === 0)
			$key = substr($key, 1);

		if (is_array($value))
			$value = replaceKeys($value);

		$return[$key] = $value;
	}
	return $return;
}

// PHP CODE and DB
//-------------------------
// Define basic variable
$query        = filter_var($_REQUEST['query'], FILTER_SANITIZE_STRING);
$envodata      = array ();
$data_array    = array ();
$data_allarray = array ();
$searchstring  = array (
	'query' => $query
);

// Refresh time in cache
$n_day = 60;
define('REFRESH_TIME', 3600 * 24 * $n_day);
// Path for cache files
define('TMP_PATH', APP_PATH . 'plugins/intranet2/admin/tmp/');
// Define http MAPY
define('MAPY', 'https://api.mapy.cz/geocode?query=' . $query);
$remoteURL = html_entity_decode(MAPY);
//
$USERAGENT = $_SERVER['HTTP_USER_AGENT'];

// Set attribute for 'file_get_contents'
$ctx = stream_context_create(array (
		'http' => array (
			'timeout' => 60,
			'header'  => "User-Agent: $USERAGENT\r\n"
		)
	)
);

// Read the contents of the JSON remote file into a string -> variable
$file = file_get_contents($remoteURL, false, $ctx);

if ($file) {
	$xml = simplexml_load_string($file);
	if ($xml) {

		// Getting array from XML file
		$data_allarray = xmlToArray($xml);
		$i             = 0;
		foreach ($data_allarray as $result) {
			foreach ($result as $point) {
				foreach ($point as $point1) {
					foreach ($point1 as $key => $value) {
						if ($key == 'item') {
							foreach ($value as $item) {
								$data_array[] = $item;
								$i++;
							}
						}
					}
				}
			}
		}
		$count_data = $i;

		$data_array = replaceKeys($data_array);

		$envodata = array (
			'status'        => 'success',
			'status_msg'    => 'GPS MAPY: Vyhledávání bylo ÚSPĚŠNÉ a data byla stažena',
			'status_info'   => '',
			'tmp_directory' => TMP_PATH,
			'http'          => MAPY,
			'search_string' => $query,
			'count_data'    => $count_data,
			'data_all'      => $data_allarray,
			'data'          => $data_array
		);

	} else {
		// XML se nepodařilo načíst - nějaká chyba

		$envodata = array (
			'status'      => 'error_E03',
			'status_msg'  => 'PHP SCRIPT: ',
			'status_info' => '',
		);

	}
} else {
	// došlo k chybě připojení, nebo se nepodařilo soubor stáhnout či přečíst z nějakého jiného důvodu

	$envodata = array (
		'status'      => 'error_E02',
		'status_msg'  => 'PHP SCRIPT: ',
		'status_info' => '',
	);

}


// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>