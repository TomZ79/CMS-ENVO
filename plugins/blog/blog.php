<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

$CHECK_USR_SESSION = session_id();

// -------- DATA FOR ALL FRONTEND PAGES --------
// -------- DATA PRO VŠECHNY FRONTEND STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/blog/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/blog/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'blog';
$envotable1 = DB_PREFIX . 'blogcategories';

// Functions we need for this plugin
include_once 'functions.php';

// Get the important template stuff
$ENVO_SEARCH_WHERE = ENVO_PLUGIN_VAR_BLOG;
$ENVO_SEARCH_LINK  = ENVO_PLUGIN_VAR_BLOG;

// AJAX Search
$AJAX_SEARCH_PLUGIN_WHERE = $envotable;
$AJAX_SEARCH_PLUGIN_URL   = 'plugins/blog/ajaxsearch.php';
$AJAX_SEARCH_PLUGIN_SEO   = $setting["blogurl"];

// Get the rss if active
if ($setting["blogrss"]) {
  $ENVO_RSS_DISPLAY = 1;
  $P_RSS_LINK       = ENVO_rewrite ::envoParseurl('rss.xml', ENVO_PLUGIN_VAR_BLOG, '', '', '');
}

// Parse links once if needed a lot of time
$backtoblog = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_BLOG, '', '', '', '');

// Template Call
$ENVO_TPL_PLUG_T   = ENVO_PLUGIN_NAME_BLOG;
$ENVO_TPL_PLUG_URL = $backtoblog;

// -------- DATA FOR SELECTED FRONTEND PAGES --------
// -------- DATA PRO VYBRANÉ FRONTEND STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'category':
    // BLOG CATEGORY

    if (is_numeric($page2) && envo_row_permission($page2, $envotable1, ENVO_USERGROUPID)) {

      if ($setting["blogurl"]) {
        $getWhere = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_BLOG, $page1, $page2, $page3, '');
        $getPage  = $page4;
      } else {
        $getWhere = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_BLOG, $page1, $page2, '', '');
        $getPage  = $page3;
      }

      $resultgt = $envodb -> query('SELECT COUNT(*) as totalAll FROM ' . $envotable . ' WHERE ((startdate = 0 OR startdate <= ' . time() . ') AND (enddate = 0 || enddate >= ' . time() . ')) AND catid LIKE "%' . smartsql($page2) . '%" AND active = 1');
      $getTotal = $resultgt -> fetch_assoc();

      if ($getTotal["totalAll"] != 0) {

        // Paginator
        $blogc                   = new ENVO_paginator;
        $blogc -> items_total    = $getTotal["totalAll"];
        $blogc -> mid_range      = $setting["blogpagemid"];
        $blogc -> items_per_page = $setting["blogpageitem"];
        $blogc -> envo_get_page  = $getPage;
        $blogc -> envo_where     = $getWhere;
        $blogc -> envo_prevtext  = $tl["pagination"]["pagin"];
        $blogc -> envo_nexttext  = $tl["pagination"]["pagin1"];
        $blogc -> paginate();
        $ENVO_PAGINATE = $blogc -> display_pages();

      }

      $ENVO_BLOG_ALL = envo_get_blog($blogc -> limit, $setting["blogorder"], $page2, 't1.catid', $setting["blogurl"], $tl['global_text']['gtxt4']);

      $row = $envodb -> queryRow('SELECT name, content FROM ' . $envotable1 . ' WHERE id = "' . smartsql($page2) . '" LIMIT 1');

      $PAGE_TITLE              = ENVO_PLUGIN_NAME_BLOG . ' - ' . $row['name'];
      $PAGE_CONTENT            = $row['content'];
      $MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
      $MAIN_SITE_DESCRIPTION   = $setting['metadesc'];

      // Get the sort orders for the grid
      $ENVO_HOOK_SIDE_GRID = FALSE;
      $grid                = $envodb -> query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = ' . ENVO_PLUGIN_ID_BLOG . ' AND blogid = 0 ORDER BY orderid ASC');
      while ($grow = $grid -> fetch_assoc()) {
        // EN: Insert each record into array
        // CZ: Vložení získaných dat do pole
        $ENVO_HOOK_SIDE_GRID[] = $grow;
      }

      // Get the url session
      $_SESSION['envo_lastURL'] = $getWhere;

      // Now get the new meta keywords and description maker
      if (isset($ENVO_BLOG_ALL) && is_array($ENVO_BLOG_ALL)) foreach ($ENVO_BLOG_ALL as $kv) $seokeywords[] = ENVO_base ::envoCleanurl($kv['title']);

      if (!empty($seokeywords)) $keylist = join(",", $seokeywords);

      $PAGE_KEYWORDS = str_replace(" ", " ", ENVO_base ::envoCleanurl($row['name']) . ($keylist ? "," . $keylist : "") . ($setting["metakey"] ? "," . $setting["metakey"] : ""));

      // SEO from the category content if available
      if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
        $PAGE_DESCRIPTION = envo_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
      } else {
        $PAGE_DESCRIPTION = envo_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
      }

      $ENVO_HEADER_CSS        = $setting["blog_css"];
      $ENVO_FOOTER_JAVASCRIPT = $setting["blog_javascript"];

      // EN: Load the php template
      // CZ: Načtení php template (šablony)
      $pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'blog.php';
      $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/blog/blog.php';

      if (file_exists($pluginsite_template)) {
        $plugin_template = $pluginsite_template;
      } else {
        $plugin_template = $pluginbasic_template;
      }


    } else {
      envo_redirect($backtoblog);
    }

    break;
  case 'blog-article':
    // BLOG ARTICLE

    if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {


      $result = $envodb -> query('SELECT * FROM ' . $envotable . ' WHERE ((startdate = 0 OR startdate <= ' . time() . ') AND (enddate = 0 || enddate >= ' . time() . ')) AND id = "' . smartsql($page2) . '" LIMIT 1');
      $row    = $result -> fetch_assoc();

      if ($row['active'] != 1) {

        envo_redirect(ENVO_rewrite ::envoParseurl('offline'));

      } else {

        if (!envo_row_permission($row['catid'], $envotable1, ENVO_USERGROUPID)) {
          envo_redirect($backtoblog);

        } else {

          // Now let's check the hits cookie
          if (!envo_cookie_voted_hits($envotable, $row['id'], 'hits')) {

            envo_write_vote_hits_cookie($envotable, $row['id'], 'hits');

            // Update hits each time
            ENVO_base ::envoUpdatehits($row['id'], $envotable);
          }

          // Now output the data
          $PAGE_ID                         = $row['id'];
          $PAGE_TITLE                      = $row['title'];
          $PAGE_CONTENT                    = envo_secure_site($row['content']);
          $SHOWTITLE                       = $row['showtitle'];
          $SHOWIMG                         = $row['previmg'];
          $SHOWDATE                        = $row['showdate'];
          $SHOWSOCIALBUTTON                = $row['socialbutton'];
          $BLOG_HITS                       = $row['hits'];
          $ENVO_HEADER_CSS                 = $row['blog_css'];
          $ENVO_FOOTER_JAVASCRIPT          = $row['blog_javascript'];
          $setting["sidebar_location_tpl"] = ($row['sidebar'] ? "left" : "right");

          $PAGE_TIME       = ENVO_base ::envoTimesince($row['time'], $setting["blogdateformat"], $setting["blogtimeformat"], $tl['global_text']['gtxt4']);
          $PAGE_TIME_HTML5 = date("Y-m-d T H:i:s P", strtotime($row['time']));

          // Get the url session
          $_SESSION['envo_lastURL'] = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_BLOG, $page1, $page2, $page3, '');

        }

        // Get the sort orders for the grid
        $grid = $envodb -> query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE blogid = "' . $row['id'] . '" ORDER BY orderid ASC');
        while ($grow = $grid -> fetch_assoc()) {

          // the sidebar grid
          if ($grow["hookid"]) {
            $ENVO_HOOK_SIDE_GRID[] = $grow;
          }
        }

        // Show Tags
        $ENVO_TAGLIST = ENVO_tags ::envoGetTagList_class($page2, ENVO_PLUGIN_ID_BLOG, ENVO_PLUGIN_VAR_TAGS, 'tags-list-item', $tl["title_element"]["tel"]);

        // Page Navigation
        $nextp = envo_next_page($page2, 'title', $envotable, 'id', ' AND catid != 0', '', 'active');
        if ($nextp) {

          if ($setting["blogurl"]) {
            $seo = ENVO_base ::envoCleanurl($nextp['title']);
          }

          $ENVO_NAV_NEXT       = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_BLOG, 'blog-article', $nextp['id'], $seo, '');
          $ENVO_NAV_NEXT_TITLE = $nextp['title'];
        }

        $prevp = envo_previous_page($page2, 'title', $envotable, 'id', ' AND catid != 0', '', 'active');
        if ($prevp) {

          if ($setting["blogurl"]) {
            $seop = ENVO_base ::envoCleanurl($prevp['title']);
          }

          $ENVO_NAV_PREV       = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_BLOG, 'blog-article', $prevp['id'], $seop, '');
          $ENVO_NAV_PREV_TITLE = $prevp['title'];
        }

        // Get the categories into a list
        $resultc = $envodb -> query('SELECT id, name, varname FROM ' . $envotable1 . ' WHERE id IN(' . $row['catid'] . ') ORDER BY id ASC');
        while ($rowc = $resultc -> fetch_assoc()) {

          if ($setting["blogurl"]) {
            $seoc = ENVO_base ::envoCleanurl($rowc['varname']);
          }

          // EN: Create array with all categories ( Plugin Blog have one or more categories for one article, in array will be it one or more categories )
          // CZ: Vytvoření pole se všemi kategoriemi ( Plugin Blog má jednu nebo více kategorií pro jeden článek, v poli bude jedna nebo více kategorií )
          $catids[] = '<span class="cat-list"><a href="' . ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_BLOG, 'category', $rowc['id'], $seoc, '', '') . '" title="' . $tlblog["blog_frontend"]["blog1"] . '">' . $rowc['name'] . '</a></span>';

          // EN: Get 'varname' for category
          // CZ: Získaní 'varname' kategorie
          $BLOG_CAT[] = $rowc['varname'];
        }

        if (!empty($catids)) {
          // EN: Returns a string from the elements of an array
          // CZ: Získání elementů z pole
          $BLOG_CATLIST = join(" ", $catids);
        }

      }
    } else {
      envo_redirect($backtoblog);
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
    $pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'blogart.php';
    $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/blog/blogart.php';

    if (file_exists($pluginsite_template)) {
      $plugin_template = $pluginsite_template;
    } else {
      $plugin_template = $pluginbasic_template;
    }

    break;
  default:
    // MAIN PAGE OF PLUGIN - LIST OF BLOG ARTICLE

    // ----------- ERROR: REDIRECT PAGE ------------
    // -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

    // EN: If not exist value in 'case', redirect page to 404
    // CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
    if (!empty($page1) && !is_numeric($page1)) {
      if ($page1 != 'category' || $page1 != 'blog-article') {
        envo_redirect(ENVO_rewrite ::envoParseurl('404', '', '', '', ''));
      }
    }

    // ----------- SUCCESS: CODE FOR MAIN PAGE ------------
    // -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

    $getTotal = envo_get_total_permission_blog();

    if ($getTotal != 0) {
      // Paginator
      $blog                   = new ENVO_paginator;
      $blog -> items_total    = $getTotal;
      $blog -> mid_range      = $setting["blogpagemid"];
      $blog -> items_per_page = $setting["blogpageitem"];
      $blog -> envo_get_page  = $page1;
      $blog -> envo_where     = $backtoblog;
      $blog -> envo_prevtext  = $tl["pagination"]["pagin"];
      $blog -> envo_nexttext  = $tl["pagination"]["pagin1"];
      $blog -> paginate();

      // Pagination
      $ENVO_PAGINATE = $blog -> display_pages();
      // Get all blogs
      $ENVO_BLOG_ALL = envo_get_blog($blog -> limit, $setting["blogorder"], '', '', $setting["blogurl"], $tl['global_text']['gtxt4']);

    }

    // Get the categories
    $ENVO_BLOG_CAT = ENVO_base ::envoGetcatmix(ENVO_PLUGIN_VAR_BLOG, '', $envotable1, ENVO_USERGROUPID, $setting["blogurl"]);

    // EN: Set data for the frontend page - Title, Description, Keywords and other ...
    // CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
    $PAGE_TITLE              = $setting["blogtitle"];
    $MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
    $MAIN_SITE_DESCRIPTION   = $setting['metadesc'];

    // Get the url session
    $_SESSION['envo_lastURL'] = $backtoblog;

    // Get the sort orders for the grid
    $ENVO_HOOK_SIDE_GRID = FALSE;
    $grid                = $envodb -> query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = ' . ENVO_PLUGIN_ID_BLOG . ' AND blogid = 0 ORDER BY orderid ASC');
    while ($grow = $grid -> fetch_assoc()) {
      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $ENVO_HOOK_SIDE_GRID[] = $grow;
    }

    // Now get the new meta keywords and description maker
    if (isset($ENVO_BLOG_ALL) && is_array($ENVO_BLOG_ALL)) foreach ($ENVO_BLOG_ALL as $kv) $seokeywords[] = ENVO_base ::envoCleanurl($kv['title']);

    if (!empty($seokeywords)) $keylist = join(",", $seokeywords);

    $PAGE_KEYWORDS = str_replace(" ", " ", ENVO_base ::envoCleanurl($PAGE_TITLE) . ($keylist ? "," . $keylist : "") . ($setting["metakey"] ? "," . $setting["metakey"] : ""));

    // SEO from the category content if available
    if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
      $PAGE_DESCRIPTION = envo_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
    } else {
      $PAGE_DESCRIPTION = envo_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
    }

    // Get the CSS and Javascript into the page
    $ENVO_HEADER_CSS        = $setting["blog_css"];
    $ENVO_FOOTER_JAVASCRIPT = $setting["blog_javascript"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'blog.php';
    $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/blog/blog.php';

    if (file_exists($pluginsite_template)) {
      $plugin_template = $pluginsite_template;
    } else {
      $plugin_template = $pluginbasic_template;
    }

}

?>