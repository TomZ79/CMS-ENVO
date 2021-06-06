<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'tags';
$envotable1 = DB_PREFIX . 'pages';
$envotable2 = DB_PREFIX . 'categories';
$envotable3 = 'news';

// EN: Get all the php Hook by name of Hook
// CZ: Načtení všech php dat z Hook podle jména Hook
$ENVO_HOOK_TAGS = $envohooks -> EnvoGethook("tpl_tags");
$PAGE_SHOWTITLE = 1;

// AJAX Search
$AJAX_SEARCH_PLUGIN_WHERE = $envotable1;
$AJAX_SEARCH_PLUGIN_URL   = 'include/ajax/page.php';
$AJAX_SEARCH_PLUGIN_SEO   = 0;

$swaplang = ENVO_PLUGIN_ID_TAGS;

if (empty($page1)) {

	$PAGE_TITLE       = ENVO_PLUGIN_NAME_TAGS;
	$PAGE_CONTENT     = $setting["tagdesc"];
	$ENVO_NO_TAG_DATA = $tl['general_error']['generror11'];

} else {

	// Clean the tag if someone is funny and tries to type something weird
	$cleanTag = filter_var($page1, FILTER_SANITIZE_STRING);

	// let's check if the tag exists
	$result = $envodb -> query('SELECT SQL_CALC_FOUND_ROWS itemid, pluginid FROM ' . $envotable . ' WHERE tag = "' . smartsql($cleanTag) . '"');
	if ($result) {
		while ($row = $result -> fetch_assoc()) {

			if ($row['pluginid'] > 0 && $row['pluginid'] != 1 && in_array($row['pluginid'], $usraccesspl)) {

				/// EN: Get all the php Hook by name of Hook for tags
				// CZ: Načtení všech php dat z Hook podle jména Hook pro tagy
				$hooktags = $envohooks -> EnvoGethook("php_tags");
				if ($hooktags) {
					foreach ($hooktags as $th) {
						eval($th["phpcode"]);
					}
				}

			} elseif ($row['pluginid'] == 0) {

				$result2 = $envodb -> query('SELECT t1.varname, t2.title' . ', t2.content' . ' FROM ' . $envotable2 . ' AS t1 LEFT JOIN ' . $envotable1 . ' AS t2 ON t1.id = t2.catid WHERE t2.id = "' . smartsql($row['itemid']) . '" AND t2.active = 1 LIMIT 1');
				$row2    = $result2 -> fetch_assoc();

				if ($envodb -> affected_rows > 0) {
					$getStriped = envo_cut_text($row2['content'], $setting["shortmsg"], '...');

					$parseurl = ENVO_rewrite ::envoParseurl($row2['varname'], '', '', '', '');

					$pageData[]         = array ('parseurl' => $parseurl, 'title' => $row2['title'], 'content' => $getStriped);
					$ENVO_TAG_PAGE_DATA = $pageData;
				}
				// Get the news data
			} elseif ($row['pluginid'] == 1) {
				$newstagData[]      = ENVO_tags ::envoTagSql($envotable3, $row['itemid'], "id, title, content", "content", ENVO_PLUGIN_VAR_NEWS, 'a', 1);
				$ENVO_TAG_NEWS_DATA = $newstagData;
			} else {
				// No Tag Data in the while
				$ENVO_NO_TAG_DATA = $tl['general_error']['generror12'];
			}

		}
		// Post the page title
		$PAGE_TITLE   = strtoupper($page1) . ' - ' . $setting["tagtitle"];
		$PAGE_CONTENT = $setting["tagdesc"];
	} else {
		// No tag data at all
		$ENVO_NO_TAG_DATA = $tl['general_error']['generror12'];
	}
}

// EN: Getting data from DB for the grid of page
// CZ: Získání dat z DB pro mřížku stránky
$ENVO_HOOK_SIDE_GRID = FALSE;
$grid                = $envodb -> query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = ' . ENVO_PLUGIN_ID_TAGS . ' ORDER BY orderid ASC');
while ($grow = $grid -> fetch_assoc()) {
	// EN: Insert each record into array
	// CZ: Vložení získaných dat do pole
	$ENVO_HOOK_SIDE_GRID[] = $grow;
}

// EN: Creatting the new meta keywords and description maker
// CZ: Vytváření nových meta klíčových slov a popisovačů
$PAGE_KEYWORDS    = str_replace(" ", " ", ENVO_base ::envoCleanurl(ENVO_PLUGIN_NAME_TAGS) . ($setting["metakey"] ? "," . $setting["metakey"] : ""));
$PAGE_DESCRIPTION = $setting["metadesc"];

// EN: Load the php template
// CZ: Načtení php template (šablony)
$template = 'tags.php';

?>