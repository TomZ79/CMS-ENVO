<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable = DB_PREFIX . 'pages';

// Get the database stuff
$row = $envodb -> queryRow('SELECT * FROM ' . $envotable . ' WHERE id = "' . smartsql($pageid) . '"');

// Check if the page is not active and we are not an admin then we redirect
if ($row['active'] != 1 && !ENVO_ASACCESS) envo_redirect(ENVO_rewrite ::envoParseurl($tl['link']['l3'], $tl['link']['l1'], '', '', ''));

// Now let's check the hits cookie
if (!envo_cookie_voted_hits($envotable, $row['id'], 'hits')) {

  envo_write_vote_hits_cookie($envotable, $row['id'], 'hits');

  // Update hits each time
  ENVO_base ::envoUpdatehits($row['id'], $envotable);
}

// EN: Set data for the frontend page - Title, Description, Keywords and other ...
// CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
$PAGE_ID                         = $row['id'];
$PAGE_TITLE                      = $row['title'];
$PAGE_CONTENT                    = $row['content'];
$PAGE_SHOWTITLE                  = $row['showtitle'];
$MAIN_DESCRIPTION                = $ca['metadesc'];
$MAIN_SITE_DESCRIPTION           = $setting['metadesc'];
$SHOWDATE                        = $row['showdate'];
$SHOWHITS                        = $row['showhits'];
$SHOWTAGS                        = $row['showtags'];
$SHOWSOCIALBUTTON                = $row['socialbutton'];
$PAGE_ACTIVE                     = $row['active'];
$PAGE_HITS                       = $row['hits'];
$PAGE_PASSWORD                   = $row['password'];
$ENVO_HEADER_CSS                 = $row['page_css'];
$ENVO_FOOTER_JAVASCRIPT          = $row['page_javascript'];
$setting["sidebar_location_tpl"] = ($row['sidebar'] ? "left" : "right");

$PAGE_TIME       = ENVO_base ::envoTimesince($row['time'], $setting["dateformat"], $setting["timeformat"], $tl['global_text']['gtxt4']);
$PAGE_TIME_HTML5 = date("Y-m-d T H:i:s P", strtotime($row['time']));

if (ENVO_USERID) {
  $PAGE_CONTENT = envo_render_string($PAGE_CONTENT, array ( 'members' => ENVO_USERID ));
} else {
  $PAGE_CONTENT = envo_render_string($PAGE_CONTENT, array ( 'notmembers' => 0 ));
}

// We do not show the navbar
if ($row['shownav'] == 0) $ENVO_SHOW_NAVBAR = FALSE;

// We do not show the footer
if ($row['showfooter'] == 0) $ENVO_SHOW_FOOTER = FALSE;

// Get news if news id is > 0
$ENVO_NEWS_IN_CONTENT = FALSE;
if (!empty($row['shownews'])) {

  // Now let's check if we display news with second option
  $shownewsarray = explode(":", $row['shownews']);

  if (is_array($shownewsarray) && in_array("ASC", $shownewsarray) || in_array("DESC", $shownewsarray)) {

    $ENVO_NEWS_IN_CONTENT = envo_get_news('LIMIT ' . $shownewsarray[2], '', ENVO_PLUGIN_VAR_NEWS, $shownewsarray[0] . ' ' . $shownewsarray[1], $setting["newsdateformat"], $setting["newstimeformat"], $tl['global_text']['gtxt4']);

  } else {

    $ENVO_NEWS_IN_CONTENT = envo_get_news('', $row['shownews'], ENVO_PLUGIN_VAR_NEWS, $setting["newsorder"], $setting["newsdateformat"], $setting["newstimeformat"], $tl['global_text']['gtxt4']);
  }

  // Set news load to false
  $newsloadonce = FALSE;
}

// EN: Get all the php Hook by name of Hook
// CZ: Načtení všech php dat z Hook podle jména Hook
$hookpages = $envohooks -> EnvoGethook("php_pages_news");
if ($hookpages) foreach ($hookpages as $hpag) {
  eval($hpag["phpcode"]);
}

// Get the sort orders for the grid
$ENVO_PAGE_GRID = $ENVO_HOOK_SIDE_GRID = array ();
$grid           = $envodb -> query('SELECT id, pluginid, hookid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE pageid = "' . $row['id'] . '" ORDER BY orderid ASC');
while ($grow = $grid -> fetch_assoc()) {
  // Load the main grid
  if ($grow["pluginid"] && !$grow["hookid"]) $ENVO_PAGE_GRID[] = $grow;
  // Load the side grid
  if ($grow["hookid"]) $ENVO_HOOK_SIDE_GRID[] = $grow;
}

// Get the tags for this page
$ENVO_TAGLIST = ENVO_tags ::envoGetTagList_class($row['id'], 0, ENVO_PLUGIN_VAR_TAGS, 'tags-list-item', $tl["title_element"]["tel"]);

// EN: Get all the php Hook by name of Hook from page and news grid
// CZ: Načtení všech php dat z Hook podle jména Hook z rozložení stránky a zpráv (news)
$ENVO_HOOK_PAGE_GRID = $envohooks -> EnvoGethook("tpl_page_news_grid");

// Get the url session
$_SESSION['envo_lastURL'] = ENVO_rewrite ::envoParseurl($page, $page1, $page2, '', '');

// AJAX Search
$AJAX_SEARCH_PLUGIN_WHERE = $envotable;
$AJAX_SEARCH_PLUGIN_URL   = 'include/ajax/page.php';
$AJAX_SEARCH_PLUGIN_SEO   = 0;

// Now get the new meta keywords and description maker
$keytags = '';
if ($ENVO_TAGLIST) {
  $keytags = preg_split('/\s+/', strip_tags($ENVO_TAGLIST));
  $keytags = ',' . implode(',', $keytags);
}
$PAGE_KEYWORDS = str_replace(" ", " ", ($setting["metakey"] ? $setting["metakey"] : ENVO_base ::envoCleanurl($row['title']) . $keytags) . ($ca['metakey'] ? "," . $ca['metakey'] : ""));


// SEO from the category content if available
if (!empty($MAIN_DESCRIPTION)) {
  $PAGE_DESCRIPTION = $MAIN_DESCRIPTION;
} else {
  $PAGE_DESCRIPTION = $MAIN_SITE_DESCRIPTION;
}

// EN: Load the php template
// CZ: Načtení php template (šablony)
$template = 'page.php';

?>