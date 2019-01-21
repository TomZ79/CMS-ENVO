<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Get all the php Hook by name of Hook
// CZ: Načtení všech php dat z Hook podle jména Hook
$ENVO_HOOK_SITEMAP = $envohooks -> EnvoGethook("tpl_sitemap");

// Get the url session
$_SESSION['envo_lastURL'] = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_SITEMAP, '', '', '', '');

// EN: Get all the php Hook by name of Hook for sitemap
// CZ: Načtení všech php dat z Hook podle jména Hook pro mapu stránek
$hooksitemap = $envohooks -> EnvoGethook("php_sitemap");
if ($hooksitemap) {
	foreach ($hooksitemap as $th) {
		eval($th['phpcode']);
	}
}

// EN: Set data for the frontend page - Title, Description, Keywords and other ...
// CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
$PAGE_TITLE     = $setting["sitemaptitle"];
$PAGE_CONTENT   = $setting["sitemapdesc"];
$PAGE_SHOWTITLE = 1;

// EN: Getting data from DB for the grid of page
// CZ: Získání dat z DB pro mřížku stránky
$ENVO_HOOK_SIDE_GRID = FALSE;
$grid                = $envodb -> query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = ' . ENVO_PLUGIN_ID_SITEMAP . ' ORDER BY orderid ASC');
while ($grow = $grid -> fetch_assoc()) {
	// EN: Insert each record into array
	// CZ: Vložení získaných dat do pole
	$ENVO_HOOK_SIDE_GRID[] = $grow;
}

// EN: Creatting the new meta keywords and description maker
// CZ: Vytváření nových meta klíčových slov a popisovačů
$PAGE_KEYWORDS    = str_replace(" ", " ", ENVO_base ::envoCleanurl(ENVO_PLUGIN_NAME_SITEMAP) . ($setting["metakey"] ? "," . $setting["metakey"] : ""));
$PAGE_DESCRIPTION = $setting["metadesc"];

// EN: Load the php template
// CZ: Načtení php template (šablony)
$template = 'sitemap.php';

?>