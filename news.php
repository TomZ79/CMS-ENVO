<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// -------- DATA FOR ALL FRONTEND PAGES --------
// -------- DATA PRO VŠECHNY FRONTEND STRÁNKY --------

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable = DB_PREFIX . 'news';

// parse url
$backtonews = ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_NEWS, '', '', '', '');

// AJAX Search
$AJAX_SEARCH_PLUGIN_WHERE = $envotable;
$AJAX_SEARCH_PLUGIN_URL   = 'include/ajax/news.php';
$AJAX_SEARCH_PLUGIN_SEO   = 1;
$ENVO_SEARCH_LINK          = ENVO_PLUGIN_VAR_NEWS;

// The new parsing method for url and passing it to template
$P_NEWS_URL = $backtonews;

// Template Call
$ENVO_TPL_PLUG_T   = ENVO_PLUGIN_NAME_NEWS;
$ENVO_TPL_PLUG_URL = $backtonews;

// Get the CSS and Javascript into the page
$ENVO_HEADER_CSS        = $setting["news_css"];
$ENVO_FOOTER_JAVASCRIPT = $setting["news_javascript"];


// -------- DATA FOR SELECTED FRONTEND PAGES --------
// -------- DATA PRO VYBRANÉ FRONTEND STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {

  case 'news-article':
    // NEWS ARTICLE

    if (is_numeric($page2)) {

      $page2 = filter_var($page2, FILTER_SANITIZE_NUMBER_INT);

      // Now perform the query
      $result = $envodb->query('SELECT * FROM ' . $envotable . ' WHERE ((startdate = 0 OR startdate <= ' . time() . ') AND (enddate = 0 OR enddate >= ' . time() . ')) AND (FIND_IN_SET(' . ENVO_USERGROUPID . ',permission) OR permission = 0) AND id = ' . smartsql($page2));

      if ($envodb->affected_rows == 0) envo_redirect($backtonews);

      $row = $result->fetch_assoc();

      if ($row['active'] != 1 && !ENVO_ASACCESS) {
        // EN: News is not active redirect to list of news
        // CZ: Zpráva není aktivní, přesměrování na seznam zpráv
        envo_redirect($backtonews);

      } else {
        // EN: News is active, display news
        // CZ: Zpráva je aktivní, zobrazit zprávu

        // Now let's check the hits cookie
        if (!envo_cookie_voted_hits($envotable, $row['id'], 'hits')) {

          envo_write_vote_hits_cookie($envotable, $row['id'], 'hits');

          // Update hits each time
          ENVO_base::envoUpdatehits($row['id'], $envotable);
        }

        // EN: Set variable for page
        // CZ: Nastavení hodnot (proměných) pro stránku
        $PAGE_ID                     = $row['id'];
        $PAGE_TITLE                  = $row['title'];
        $MAIN_PLUGIN_DESCRIPTION     = $ca['metadesc'];
        $MAIN_SITE_DESCRIPTION       = $setting['metadesc'];
        $PAGE_IMAGE                  = $row['previmg'];
        $PAGE_CONTENT                = envo_secure_site($row['content']);
        $ENVO_HEADER_CSS              = $row['news_css'];
        $ENVO_FOOTER_JAVASCRIPT       = $row['news_javascript'];
        $setting["sidebar_location_tpl"] = ($row['sidebar'] ? "left" : "right");
        $SHOWTITLE                   = $row['showtitle'];
        $SHOWDATE                    = $row['showdate'];
        $SHOWHITS                    = $row['showhits'];
        $SHOWSOCIALBUTTON            = $row['socialbutton'];
        $PAGE_ACTIVE                 = $row['active'];
        $PAGE_HITS                   = $row['hits'];
        $PAGE_TIME                   = ENVO_base::envoTimesince($row['time'], $setting["newsdateformat"], $setting["newstimeformat"], $tl['global_text']['gtxt4']);
        $DATE_TIME                   = $row['time'];
        $PAGE_TIME_HTML5             = date("Y-m-d T H:i:s P", strtotime($row['time']));

        // EN: Get all the php Hook by name of Hook for 'news'
        // CZ: Načtení všech php dat z Hook podle jména Hook pro 'news'
        $hna = $envohooks->EnvoGethook("php_pages_news");
        if ($hna) {
          foreach ($hna as $c) {
            eval($c["phpcode"]);
          }
        }

        // Get the sort orders for the grid
        $ENVO_HOOK_SIDE_GRID = $ENVO_PAGE_GRID = FALSE;
        $grid               = $envodb->query('SELECT id, pluginid, hookid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE newsid = "' . $row['id'] . '" ORDER BY orderid ASC');
        while ($grow = $grid->fetch_assoc()) {
          // EN: Insert each record into array
          // CZ: Vložení získaných dat do pole
          if ($grow["pluginid"] && !$grow["hookid"]) {
            $ENVO_PAGE_GRID[] = $grow;
          }

          if ($grow["hookid"]) {
            $ENVO_HOOK_SIDE_GRID[] = $grow;
          }
        }

        // Show Tags
        $ENVO_TAGLIST = ENVO_tags::envoGetTagList_class($page2, ENVO_PLUGIN_ID_NEWS, ENVO_PLUGIN_VAR_TAGS, '', $tl["title_element"]["tel"]);

        // Page Nav
        $nextp = envo_next_page($page2, 'title', $envotable, 'id', '', '', 'active');
        if ($nextp) {
          $ENVO_NAV_NEXT       = ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_NEWS, 'news-article', $nextp['id'], ENVO_base::envoCleanurl($nextp['title']), '');
          $ENVO_NAV_NEXT_TITLE = $nextp['title'];
        }

        $prevp = envo_previous_page($page2, 'title', $envotable, 'id', '', '', 'active');
        if ($prevp) {
          $ENVO_NAV_PREV       = ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_NEWS, 'news-article', $prevp['id'], ENVO_base::envoCleanurl($prevp['title']), '');
          $ENVO_NAV_PREV_TITLE = $prevp['title'];
        }

        // EN: Get all the php Hook by name of Hook
        // CZ: Načtení všech php dat z Hook podle jména Hook
        $ENVO_HOOK_NEWS_GRID = $envohooks->EnvoGethook("tpl_page_news_grid");

        // Get the url session
        $_SESSION['envo_lastURL'] = ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_NEWS, $page1, $page2, $page3, '');

      }

      // Now get the new meta keywords and description maker
      $keytags = '';
      if ($ENVO_TAGLIST) {
        $keytags = preg_split('/\s+/', strip_tags($ENVO_TAGLIST));
        $keytags = ',' . implode(',', $keytags);
      }
      $PAGE_KEYWORDS    = str_replace(" ", " ", ENVO_base::envoCleanurl($PAGE_TITLE) . $keytags . ($setting["metakey"] ? "," . $setting["metakey"] : ""));
      $PAGE_DESCRIPTION = envo_cut_text($PAGE_CONTENT, 155, '');

      // EN: Load the php template
      // CZ: Načtení php template (šablony)
      $template = 'newsart.php';

    } else {
      envo_redirect($backtonews);
    }

    break;
  default:
    // MAIN PAGE OF PLUGIN - LIST OF NEWS ARTICLE

    // ----------- ERROR: REDIRECT PAGE ------------
    // -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

    // EN: If not exist value in 'case', redirect page to 404
    // CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
    if (!empty($page1) && !is_numeric($page1)) {
      if ($page1 != 'news-article') {
        envo_redirect(ENVO_rewrite::envoParseurl('404', '', '', '', ''));
      }
    }

    // ----------- SUCCESS: CODE FOR MAIN PAGE ------------
    // -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

    $newsloadonce = FALSE;

    $getTotal = envo_get_total($envotable, 1, 'active', '');

    if ($getTotal != 0) {
      // Paginator
      $news                 = new ENVO_paginator;
      $news->items_total    = $getTotal;
      $news->mid_range      = $setting["newspagemid"];
      $news->items_per_page = $setting["newspageitem"];
      $news->envo_get_page   = $page1;
      $news->envo_where      = $backtonews;
      $news->envo_prevtext   = $tl["pagination"]["pagin"];
      $news->envo_nexttext   = $tl["pagination"]["pagin1"];
      $news->paginate();

      $ENVO_PAGINATE = $news->display_pages();

      // Display the news
      $ENVO_NEWS_ALL = envo_get_news($news->limit, '', ENVO_PLUGIN_VAR_NEWS, $setting["newsorder"], $setting["newsdateformat"], $setting["newstimeformat"], $tl['global_text']['gtxt4']);
    }

    // EN: Set data for the frontend page - Title, Description, Keywords and other ...
    // CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
    $PAGE_TITLE              = $setting["newstitle"];
    $PAGE_CONTENT            = $setting["newsdesc"];
    $MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
    $MAIN_SITE_DESCRIPTION   = $setting['metadesc'];

    // EN: Get all the php Hook by name of Hook
    // CZ: Načtení všech php dat z Hook podle jména Hook
    $ENVO_HOOK_NEWS = $envohooks->EnvoGethook("tpl_news");

    $PAGE_SHOWTITLE = 1;

    // Get the url session
    $_SESSION['envo_lastURL'] = $backtonews;

    // Get the sort orders for the grid
    $grid = $envodb->query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = ' . ENVO_PLUGIN_ID_NEWS . ' ORDER BY orderid ASC');
    while ($grow = $grid->fetch_assoc()) {
      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $ENVO_HOOK_SIDE_GRID[] = $grow;
    }

    // Now get the new meta keywords and description maker
    if (isset($ENVO_NEWS_ALL) && is_array($ENVO_NEWS_ALL)) foreach ($ENVO_NEWS_ALL as $v) $seokeywords[] = ENVO_base::envoCleanurl($v['title']);

    $keylist = "";
    if (!empty($seokeywords)) $keylist = join(",", $seokeywords);

    $PAGE_KEYWORDS = str_replace(" ", " ", ENVO_base::envoCleanurl($PAGE_TITLE) . ($keylist ? "," . $keylist : "") . ($setting["metakey"] ? "," . $setting["metakey"] : ""));

    // SEO from the category content if available
    if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
      $PAGE_DESCRIPTION = envo_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
    } else {
      $PAGE_DESCRIPTION = envo_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
    }

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'news.php';
}

?>