<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

$CHECK_USR_SESSION = session_id();

// -------- DATA FOR ALL FRONTEND PAGES --------
// -------- DATA PRO VŠECHNY FRONTEND STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/wiki/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/wiki/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'wiki';
$envotable1 = DB_PREFIX . 'wikicategories';
$envotable2 = DB_PREFIX . 'wikiliterature';
$envotable3 = DB_PREFIX . 'wikilink';

// EN: Include the functions
// CZ: Vložené funkce
include_once 'functions.php';

// Get the important template stuff
$ENVO_SEARCH_WHERE = ENVO_PLUGIN_VAR_WIKI;
$ENVO_SEARCH_LINK  = ENVO_PLUGIN_VAR_WIKI;

// AJAX Search
$AJAX_SEARCH_PLUGIN_WHERE = $envotable;
$AJAX_SEARCH_PLUGIN_URL   = 'plugins/wiki/ajaxsearch.php';
$AJAX_SEARCH_PLUGIN_SEO   = $setting["wikiurl"];

// Get the rss if active
if ($setting["wikirss"]) {
  $ENVO_RSS_DISPLAY = 1;
  $P_RSS_LINK       = ENVO_rewrite ::envoParseurl('rss.xml', ENVO_PLUGIN_VAR_WIKI, '', '', '');
}

// Parse links once if needed a lot of time
$backtowiki = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_WIKI, '', '', '', '');

// Template Call
$ENVO_TPL_PLUG_T   = ENVO_PLUGIN_NAME_WIKI;
$ENVO_TPL_PLUG_URL = $backtowiki;

// -------- DATA FOR SELECTED FRONTEND PAGES --------
// -------- DATA PRO VYBRANÉ FRONTEND STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'category':
    // WIKI CATEGORY

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $catID = $page2;

    if (is_numeric($catID) && envo_row_permission($catID, $envotable1, ENVO_USERGROUPID)) {

      if ($setting["wikiurl"]) {
        $getWhere = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_WIKI, $page1, $page2, $page3, '');
        $getPage  = $page4;
      } else {
        $getWhere = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_WIKI, $page1, $page2, '', '');
        $getPage  = $page3;
      }

      $resultgt = $envodb -> query('SELECT COUNT(*) as totalAll FROM ' . $envotable . ' WHERE catid LIKE "%' . smartsql($catID) . '%" AND active = 1');
      $getTotal = $resultgt -> fetch_assoc();

      if ($getTotal["totalAll"] != 0) {

        // Paginator
        $wikic                   = new ENVO_paginator;
        $wikic -> items_total    = $getTotal["totalAll"];
        $wikic -> mid_range      = $setting["wikipagemid"];
        $wikic -> items_per_page = $setting["wikipageitem"];
        $wikic -> envo_get_page  = $getPage;
        $wikic -> envo_where     = $getWhere;
        $wikic -> envo_prevtext  = $tl["pagination"]["pagin"];
        $wikic -> envo_nexttext  = $tl["pagination"]["pagin1"];
        $wikic -> paginate();
        $ENVO_PAGINATE = $wikic -> display_pages();

      }

      $ENVO_WIKI_ALL = envo_get_wiki($wikic -> limit, $setting["wikiorder"], $catID, 't1.catid', $setting["wikiurl"], $tl['global_text']['gtxt4']);

      $result = $envodb -> query('SELECT name, content FROM ' . $envotable1 . ' WHERE id = "' . smartsql($catID) . '" LIMIT 1');
      $row    = $result -> fetch_assoc();

      $PAGE_TITLE              = ENVO_PLUGIN_NAME_WIKI . ' - ' . $row['name'];
      $PAGE_CONTENT            = $row['content'];
      $MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
      $MAIN_SITE_DESCRIPTION   = $setting['metadesc'];

      // Get the sort orders for the grid
      $ENVO_HOOK_SIDE_GRID = FALSE;
      $grid                = $envodb -> query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = ' . ENVO_PLUGIN_ID_WIKI . ' AND wikiid = 0 ORDER BY orderid ASC');
      while ($grow = $grid -> fetch_assoc()) {
        // EN: Insert each record into array
        // CZ: Vložení získaných dat do pole
        $ENVO_HOOK_SIDE_GRID[] = $grow;
      }

      // Get the url session
      $_SESSION['envo_lastURL'] = $getWhere;

      // Now get the new meta keywords and description maker
      if (isset($ENVO_WIKI_ALL) && is_array($ENVO_WIKI_ALL)) foreach ($ENVO_WIKI_ALL as $wa) $seokeywords[] = ENVO_base ::envoCleanurl($wa['title']);

      if (!empty($seokeywords)) $keylist = join(",", $seokeywords);

      $PAGE_KEYWORDS = str_replace(" ", " ", ENVO_base ::envoCleanurl($PAGE_TITLE) . ($keylist ? "," . $keylist : "") . ($setting["metakey"] ? "," . $setting["metakey"] : ""));

      // SEO from the category content if available
      if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
        $PAGE_DESCRIPTION = envo_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
      } else {
        $PAGE_DESCRIPTION = envo_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
      }

      // Get the CSS and Javascript into the page
      $ENVO_HEADER_CSS        = $setting["wiki_css"];
      $ENVO_FOOTER_JAVASCRIPT = $setting["wiki_javascript"];

      // EN: Load the php template
      // CZ: Načtení php template (šablony)
      $pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'wiki.php';
      $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/wiki/wiki.php';

      if (file_exists($pluginsite_template)) {
        $plugin_template = $pluginsite_template;
      } else {
        $plugin_template = $pluginbasic_template;
      }

    } else {
      envo_redirect($backtowiki);
    }

    break;
  case 'wiki-article':
    // WIKI ARTICLE

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $pageID = $page2;

    if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

      $result = $envodb -> query('SELECT * FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '" LIMIT 1');
      $row    = $result -> fetch_assoc();

      if ($row['active'] != 1) {
        envo_redirect(ENVO_rewrite ::envoParseurl('offline'));
      } else {

        if (!envo_row_permission($row['catid'], $envotable1, ENVO_USERGROUPID)) {
          envo_redirect($backtowiki);
        } else {

          // Now let's check the hits cookie
          if (!envo_cookie_voted_hits($envotable, $row['id'], 'hits')) {

            envo_write_vote_hits_cookie($envotable, $row['id'], 'hits');

            // Update hits each time
            ENVO_base ::envoUpdatehits($row['id'], $envotable);
          }

          // Now output the data
          $PAGE_ID                = $row['id'];
          $PAGE_TITLE             = $row['title'];
          $PAGE_CONTENT           = envo_secure_site($row['content']);
          $SHOWTITLE              = $row['showtitle'];
          $SHOWDATE               = $row['showdate'];
          $SHOWUPDATE             = $row['showupdate'];
          $SHOWCATS               = $row['showcat'];
          $SHOWHITS               = $row['showhits'];
          $SHOWSOCIALBUTTON       = $row['socialbutton'];
          $WIKI_HITS              = $row['hits'];
          $ENVO_HEADER_CSS        = $row['wiki_css'];
          $ENVO_FOOTER_JAVASCRIPT = $row['wiki_javascript'];

          // Get Created time
          $PAGE_TIME_CREATE       = ENVO_base ::envoTimesince($row['created'], $setting["wikidateformat"], $setting["wikitimeformat"], $tl['global_text']['gtxt4']);
          $PAGE_TIME_CREATE_HTML5 = date("Y-m-d T H:i:s P", strtotime($row['created']));

          // Get Updated time
          $PAGE_TIME_UPDATE       = ENVO_base ::envoTimesince($row['updated'], $setting["wikidateformat"], $setting["wikitimeformat"], $tl['global_text']['gtxt4']);
          $PAGE_TIME_UPDATE_HTML5 = date("Y-m-d T H:i:s P", strtotime($row['updated']));

          // Get the url session
          $_SESSION['envo_lastURL'] = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_WIKI, $page1, $page2, $page3, '');

        }

        // Get the sort orders for the grid
        $grid = $envodb -> query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE wikiid = "' . $row['id'] . '" ORDER BY orderid ASC');
        while ($grow = $grid -> fetch_assoc()) {

          // the sidebar grid
          if ($grow["hookid"]) {
            $ENVO_HOOK_SIDE_GRID[] = $grow;
          }
        }

        // Show Tags
        $ENVO_TAGLIST = ENVO_tags ::envoGetTagList_class($pageID, ENVO_PLUGIN_ID_WIKI, ENVO_PLUGIN_VAR_TAGS, 'tags-list-item', $tl["title_element"]["tel"]);

        // Get the categories into a list
        $resultc = $envodb -> query('SELECT id, name, varname FROM ' . $envotable1 . ' WHERE id IN(' . $row['catid'] . ') ORDER BY id ASC');
        while ($rowc = $resultc -> fetch_assoc()) {

          if ($setting["wikiurl"]) {
            $seoc = ENVO_base ::envoCleanurl($rowc['varname']);
          }

          // EN: Create array with all categories
          // CZ: Vytvoření pole se všemi kategoriemi
          $catids[] = '<span class="cat-list"><a href="' . ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_WIKI, 'category', $rowc['id'], $seoc, '', '') . '" title="' . $tlw["wiki_frontend"]["wiki2"] . '">' . $rowc['name'] . '</a></span>';

          // EN: Get 'varname' for category
          // CZ: Získaní 'varname' kategorie
          $WIKI_CAT[] = $rowc['varname'];
        }

        if (!empty($catids)) {
          // EN: Returns a string from the elements of an array
          // CZ: Získání elementů z pole
          $WIKI_CATLIST = join(" ", $catids);
        }

        // EN: Getting the data about the extern anchor - Literature
        // CZ: Získání dat o externích odkazech - Literatura
        $ENVO_LITERATURE = envo_get_anchor('', '', $envotable2, 'article_id = ' . $pageID, 'id ASC');

        // EN: Getting the data about the extern anchor - Links
        // CZ: Získání dat o externích odkazech - Odkazy
        $ENVO_LINKS = envo_get_anchor('', '', $envotable3, 'article_id = ' . $pageID, 'id ASC');

        // Page Navigation
        $nextp = envo_next_page($pageID, 'title', $envotable, 'id', ' AND catid = "' . smartsql($row["catid"]) . '"', '', 'active');
        if ($nextp) {

          if ($setting["wikiurl"]) {
            $seo = ENVO_base ::envoCleanurl($nextp['title']);
          }

          $ENVO_NAV_NEXT       = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_WIKI, 'wiki-article', $nextp['id'], $seo, '');
          $ENVO_NAV_NEXT_TITLE = addslashes($nextp['title']);
        }

        $prevp = envo_previous_page($pageID, 'title', $envotable, 'id', ' AND catid = "' . smartsql($row["catid"]) . '"', '', 'active');
        if ($prevp) {

          if ($setting["wikiurl"]) {
            $seop = ENVO_base ::envoCleanurl($prevp['title']);
          }

          $ENVO_NAV_PREV       = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_WIKI, 'wiki-article', $prevp['id'], $seop, '');
          $ENVO_NAV_PREV_TITLE = addslashes($prevp['title']);
        }

      }
    } else {
      envo_redirect($backtowiki);
    }

    // Now get the new meta keywords and description maker
    $keytags = '';
    if ($ENVO_TAGLIST) {
      $keytags = preg_split('/\s+/', strip_tags($ENVO_TAGLIST));
      $keytags = ',' . implode(',', $keytags);
    }
    $PAGE_KEYWORDS    = str_replace(" ", " ", ENVO_base ::envoCleanurl($PAGE_TITLE) . $keytags . ($setting["metakey"] ? "," . $setting["metakey"] : ""));
    $PAGE_DESCRIPTION = envo_cut_text($PAGE_CONTENT, 155, '');


    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'wikiart.php';
    $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/wiki/wikiart.php';

    if (file_exists($pluginsite_template)) {
      $plugin_template = $pluginsite_template;
    } else {
      $plugin_template = $pluginbasic_template;
    }

    break;
  default:
    // MAIN PAGE OF PLUGIN - LIST OF WIKI ARTICLE

    // ----------- ERROR: REDIRECT PAGE ------------
    // -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

    // EN: If not exist value in 'case', redirect page to 404
    // CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
    if (!empty($page1) && !is_numeric($page1)) {
      if ($page1 != 'category' || $page1 != 'wiki-article') {
        envo_redirect(ENVO_rewrite ::envoParseurl('404', '', '', '', ''));
      }
    }

    // ----------- SUCCESS: CODE FOR MAIN PAGE ------------
    // -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

    $getTotal = envo_get_total_permission_wiki();

    if ($getTotal != 0) {
      // Paginator
      $wiki                   = new ENVO_paginator;
      $wiki -> items_total    = $getTotal;
      $wiki -> mid_range      = $setting["wikipagemid"];
      $wiki -> items_per_page = $setting["wikipageitem"];
      $wiki -> envo_get_page  = $page1;
      $wiki -> envo_where     = $backtowiki;
      $wiki -> envo_prevtext  = $tl["pagination"]["pagin"];
      $wiki -> envo_nexttext  = $tl["pagination"]["pagin1"];
      $wiki -> paginate();

      // Pagination
      $ENVO_PAGINATE = $wiki -> display_pages();

      // Get all WIKI articles
      $ENVO_WIKI_ALL = envo_get_wiki($wiki -> limit, $setting["wikiorder"], '', '', $setting["wikiurl"], $tl['global_text']['gtxt4']);

    }

    // EN: Set data for the frontend page - Title, Description, Keywords and other ...
    // CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
    $PAGE_TITLE              = $setting["wikititle"];
    $PAGE_CONTENT            = $setting["wikidesc"];
    $MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
    $MAIN_SITE_DESCRIPTION   = $setting['metadesc'];

    // Get the url session
    $_SESSION['envo_lastURL'] = $backtowiki;

    // Get the sort orders for the grid
    $grid = $envodb -> query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = ' . ENVO_PLUGIN_ID_WIKI . ' AND wikiid = 0 ORDER BY orderid ASC');
    while ($grow = $grid -> fetch_assoc()) {
      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $ENVO_HOOK_SIDE_GRID[] = $grow;
    }

    // Now get the new meta keywords and description maker
    if (isset($ENVO_WIKI_ALL) && is_array($ENVO_WIKI_ALL)) foreach ($ENVO_WIKI_ALL as $wa) $seokeywords[] = ENVO_base ::envoCleanurl($wa['title']);

    if (!empty($seokeywords)) $keylist = join(",", $seokeywords);

    $PAGE_KEYWORDS = str_replace(" ", " ", ENVO_base ::envoCleanurl($PAGE_TITLE) . ($keylist ? "," . $keylist : "") . ($setting["metakey"] ? "," . $setting["metakey"] : ""));

    // SEO from the category content if available
    if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
      $PAGE_DESCRIPTION = envo_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
    } else {
      $PAGE_DESCRIPTION = envo_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
    }

    // Get the CSS and Javascript into the page
    $ENVO_HEADER_CSS        = $setting["wiki_css"];
    $ENVO_FOOTER_JAVASCRIPT = $setting["wiki_javascript"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'wiki.php';
    $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/wiki/wiki.php';

    if (file_exists($pluginsite_template)) {
      $plugin_template = $pluginsite_template;
    } else {
      $plugin_template = $pluginbasic_template;
    }

}

?>