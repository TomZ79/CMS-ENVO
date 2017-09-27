<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable = DB_PREFIX . 'news';

// parse url
$backtonews = ENVO_rewrite::envoParseurl(JAK_PLUGIN_VAR_NEWS, '', '', '', '');

// AJAX Search
$AJAX_SEARCH_PLUGIN_WHERE = $envotable;
$AJAX_SEARCH_PLUGIN_URL   = 'include/ajax/news.php';
$AJAX_SEARCH_PLUGIN_SEO   = 1;
$JAK_SEARCH_LINK          = JAK_PLUGIN_VAR_NEWS;

// The new parsing method for url and passing it to template
$P_NEWS_URL = $backtonews;

// Template Call
$JAK_TPL_PLUG_T   = JAK_PLUGIN_NAME_NEWS;
$JAK_TPL_PLUG_URL = $backtonews;

// Get the CSS and Javascript into the page
$JAK_HEADER_CSS        = $jkv["news_css"];
$JAK_FOOTER_JAVASCRIPT = $jkv["news_javascript"];

switch ($page1) {

  case 'a':

    if (is_numeric($page2)) {

      $page2 = filter_var($page2, FILTER_SANITIZE_NUMBER_INT);

      // Now perform the query
      $result = $envodb->query('SELECT * FROM ' . $envotable . ' WHERE ((startdate = 0 OR startdate <= ' . time() . ') AND (enddate = 0 OR enddate >= ' . time() . ')) AND (FIND_IN_SET(' . JAK_USERGROUPID . ',permission) OR permission = 0) AND id = ' . smartsql($page2));

      if ($envodb->affected_rows == 0) envo_redirect($backtonews);

      $row = $result->fetch_assoc();

      if ($row['active'] != 1 && !JAK_ASACCESS) {
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
          ENVO_base::jakUpdatehits($row['id'], $envotable);
        }

        // EN: Set variable for page
        // CZ: Nastavení hodnot (proměných) pro stránku
        $PAGE_ID                     = $row['id'];
        $PAGE_TITLE                  = $row['title'];
        $MAIN_PLUGIN_DESCRIPTION     = $ca['metadesc'];
        $MAIN_SITE_DESCRIPTION       = $jkv['metadesc'];
        $PAGE_IMAGE                  = $row['previmg'];
        $PAGE_CONTENT                = envo_secure_site($row['content']);
        $JAK_HEADER_CSS              = $row['news_css'];
        $JAK_FOOTER_JAVASCRIPT       = $row['news_javascript'];
        $jkv["sidebar_location_tpl"] = ($row['sidebar'] ? "left" : "right");
        $SHOWTITLE                   = $row['showtitle'];
        $SHOWDATE                    = $row['showdate'];
        $SHOWHITS                    = $row['showhits'];
        $SHOWSOCIALBUTTON            = $row['socialbutton'];
        $PAGE_ACTIVE                 = $row['active'];
        $PAGE_HITS                   = $row['hits'];
        $PAGE_TIME                   = ENVO_base::jakTimesince($row['time'], $jkv["newsdateformat"], $jkv["newstimeformat"], $tl['global_text']['gtxt4']);
        $DATE_TIME                   = $row['time'];
        $PAGE_TIME_HTML5             = date("Y-m-d T H:i:s P", strtotime($row['time']));

        // Display contact form if whish so and do the caching
        $JAK_SHOW_C_FORM = FALSE;
        if ($row['showcontact'] != 0) {
          $JAK_SHOW_C_FORM      = envo_create_contact_form($row['showcontact'], $tl['form_text']['formt']);
          $JAK_SHOW_C_FORM_NAME = envo_contact_form_title($row['showcontact']);

        }

        // EN: Get all the php Hook by name of Hook for 'news'
        // CZ: Načtení všech php dat z Hook podle jména Hook pro 'news'
        $hna = $envohooks->EnvoGethook("php_pages_news");
        if ($hna) {
          foreach ($hna as $c) {
            eval($c["phpcode"]);
          }
        }

        // Get the sort orders for the grid
        $JAK_HOOK_SIDE_GRID = $JAK_PAGE_GRID = FALSE;
        $grid               = $envodb->query('SELECT id, pluginid, hookid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE newsid = "' . $row['id'] . '" ORDER BY orderid ASC');
        while ($grow = $grid->fetch_assoc()) {
          // EN: Insert each record into array
          // CZ: Vložení získaných dat do pole
          if ($grow["pluginid"] && !$grow["hookid"]) {
            $JAK_PAGE_GRID[] = $grow;
          }

          if ($grow["hookid"]) {
            $JAK_HOOK_SIDE_GRID[] = $grow;
          }
        }

        // Show Tags
        $JAK_TAGLIST = ENVO_tags::jakGettaglist_class($page2, JAK_PLUGIN_ID_NEWS, JAK_PLUGIN_VAR_TAGS, '', $tl["title_element"]["tel"]);

        // Page Nav
        $nextp = envo_next_page($page2, 'title', $envotable, 'id', '', '', 'active');
        if ($nextp) {
          $JAK_NAV_NEXT       = ENVO_rewrite::envoParseurl(JAK_PLUGIN_VAR_NEWS, 'a', $nextp['id'], ENVO_base::jakCleanurl($nextp['title']), '');
          $JAK_NAV_NEXT_TITLE = $nextp['title'];
        }

        $prevp = envo_previous_page($page2, 'title', $envotable, 'id', '', '', 'active');
        if ($prevp) {
          $JAK_NAV_PREV       = ENVO_rewrite::envoParseurl(JAK_PLUGIN_VAR_NEWS, 'a', $prevp['id'], ENVO_base::jakCleanurl($prevp['title']), '');
          $JAK_NAV_PREV_TITLE = $prevp['title'];
        }

        // EN: Get all the php Hook by name of Hook
        // CZ: Načtení všech php dat z Hook podle jména Hook
        $JAK_HOOK_NEWS_GRID = $envohooks->EnvoGethook("tpl_page_news_grid");

        // Get the url session
        $_SESSION['jak_lastURL'] = ENVO_rewrite::envoParseurl(JAK_PLUGIN_VAR_NEWS, $page1, $page2, $page3, '');

      }

      // Now get the new meta keywords and description maker
      $keytags = '';
      if ($JAK_TAGLIST) {
        $keytags = preg_split('/\s+/', strip_tags($JAK_TAGLIST));
        $keytags = ',' . implode(',', $keytags);
      }
      $PAGE_KEYWORDS    = str_replace(" ", " ", JAK_Base::jakCleanurl($PAGE_TITLE) . $keytags . ($jkv["metakey"] ? "," . $jkv["metakey"] : ""));
      $PAGE_DESCRIPTION = envo_cut_text($PAGE_CONTENT, 155, '');

      // EN: Load the php template
      // CZ: Načtení php template (šablony)
      $template = 'newsart.php';

    } else {
      envo_redirect($backtonews);
    }

    break;
  default:

    $newsloadonce = FALSE;

    $getTotal = envo_get_total($envotable, 1, 'active', '');

    if ($getTotal != 0) {
      // Paginator
      $news                 = new JAK_Paginator;
      $news->items_total    = $getTotal;
      $news->mid_range      = $jkv["newspagemid"];
      $news->items_per_page = $jkv["newspageitem"];
      $news->jak_get_page   = $page1;
      $news->jak_where      = $backtonews;
      $news->jak_prevtext   = $tl["pagination"]["pagin"];
      $news->jak_nexttext   = $tl["pagination"]["pagin1"];
      $news->paginate();

      $JAK_PAGINATE = $news->display_pages();

      // Display the news
      $JAK_NEWS_ALL = envo_get_news($news->limit, '', JAK_PLUGIN_VAR_NEWS, $jkv["newsorder"], $jkv["newsdateformat"], $jkv["newstimeformat"], $tl['global_text']['gtxt4']);
    }

    // EN: Set data for the frontend page - Title, Description, Keywords and other ...
    // CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
    $PAGE_TITLE              = $jkv["newstitle"];
    $PAGE_CONTENT            = $jkv["newsdesc"];
    $MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
    $MAIN_SITE_DESCRIPTION   = $jkv['metadesc'];

    // EN: Get all the php Hook by name of Hook
    // CZ: Načtení všech php dat z Hook podle jména Hook
    $JAK_HOOK_NEWS = $envohooks->EnvoGethook("tpl_news");

    $PAGE_SHOWTITLE = 1;

    // Get the url session
    $_SESSION['jak_lastURL'] = $backtonews;

    // Get the sort orders for the grid
    $grid = $envodb->query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = ' . JAK_PLUGIN_ID_NEWS . ' ORDER BY orderid ASC');
    while ($grow = $grid->fetch_assoc()) {
      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $JAK_HOOK_SIDE_GRID[] = $grow;
    }

    // Now get the new meta keywords and description maker
    if (isset($JAK_NEWS_ALL) && is_array($JAK_NEWS_ALL)) foreach ($JAK_NEWS_ALL as $v) $seokeywords[] = JAK_Base::jakCleanurl($v['title']);

    $keylist = "";
    if (!empty($seokeywords)) $keylist = join(",", $seokeywords);

    $PAGE_KEYWORDS = str_replace(" ", " ", JAK_Base::jakCleanurl($PAGE_TITLE) . ($keylist ? "," . $keylist : "") . ($jkv["metakey"] ? "," . $jkv["metakey"] : ""));

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