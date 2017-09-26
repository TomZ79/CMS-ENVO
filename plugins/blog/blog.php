<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

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
$JAK_SEARCH_WHERE = JAK_PLUGIN_VAR_BLOG;
$JAK_SEARCH_LINK  = JAK_PLUGIN_VAR_BLOG;

// AJAX Search
$AJAX_SEARCH_PLUGIN_WHERE = $envotable;
$AJAX_SEARCH_PLUGIN_URL   = 'plugins/blog/ajaxsearch.php';
$AJAX_SEARCH_PLUGIN_SEO   = $jkv["blogurl"];

// Get the rss if active
if ($jkv["blogrss"]) {
  $JAK_RSS_DISPLAY = 1;
  $P_RSS_LINK      = JAK_rewrite::jakParseurl('rss.xml', JAK_PLUGIN_VAR_BLOG, '', '', '');
}

// Parse links once if needed a lot of time
$backtoblog = JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_BLOG, '', '', '', '');

// Template Call
$JAK_TPL_PLUG_T   = JAK_PLUGIN_NAME_BLOG;
$JAK_TPL_PLUG_URL = $backtoblog;

// -------- DATA FOR SELECTED FRONTEND PAGES --------
// -------- DATA PRO VYBRANÉ FRONTEND STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'c':

    if (is_numeric($page2) && envo_row_permission($page2, $envotable1, JAK_USERGROUPID)) {

      if ($jkv["blogurl"]) {
        $getWhere = JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_BLOG, $page1, $page2, $page3, '');
        $getPage  = $page4;
      } else {
        $getWhere = JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_BLOG, $page1, $page2, '', '');
        $getPage  = $page3;
      }

      $resultgt = $envodb->query('SELECT COUNT(*) as totalAll FROM ' . $envotable . ' WHERE ((startdate = 0 OR startdate <= ' . time() . ') AND (enddate = 0 || enddate >= ' . time() . ')) AND catid LIKE "%' . smartsql($page2) . '%" AND active = 1');
      $getTotal = $resultgt->fetch_assoc();

      if ($getTotal["totalAll"] != 0) {

        // Paginator
        $blogc                 = new JAK_Paginator;
        $blogc->items_total    = $getTotal["totalAll"];
        $blogc->mid_range      = $jkv["blogpagemid"];
        $blogc->items_per_page = $jkv["blogpageitem"];
        $blogc->jak_get_page   = $getPage;
        $blogc->jak_where      = $getWhere;
        $blogc->jak_prevtext   = $tl["pagination"]["pagin"];
        $blogc->jak_nexttext   = $tl["pagination"]["pagin1"];
        $blogc->paginate();
        $JAK_PAGINATE = $blogc->display_pages();

      }

      $JAK_BLOG_ALL = envo_get_blog($blogc->limit, $jkv["blogorder"], $page2, 't1.catid', $jkv["blogurl"], $tl['global_text']['gtxt4']);

      $row = $envodb->queryRow('SELECT name, content FROM ' . $envotable1 . ' WHERE id = "' . smartsql($page2) . '" LIMIT 1');

      $PAGE_TITLE              = JAK_PLUGIN_NAME_BLOG . ' - ' . $row['name'];
      $PAGE_CONTENT            = $row['content'];
      $MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
      $MAIN_SITE_DESCRIPTION   = $jkv['metadesc'];

      // Get the sort orders for the grid
      $JAK_HOOK_SIDE_GRID = FALSE;
      $grid               = $envodb->query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = ' . JAK_PLUGIN_ID_BLOG . ' AND blogid = 0 ORDER BY orderid ASC');
      while ($grow = $grid->fetch_assoc()) {
        // EN: Insert each record into array
        // CZ: Vložení získaných dat do pole
        $JAK_HOOK_SIDE_GRID[] = $grow;
      }

      // Get the url session
      $_SESSION['jak_lastURL'] = $getWhere;

      // Now get the new meta keywords and description maker
      if (isset($JAK_BLOG_ALL) && is_array($JAK_BLOG_ALL)) foreach ($JAK_BLOG_ALL as $kv) $seokeywords[] = JAK_Base::jakCleanurl($kv['title']);

      if (!empty($seokeywords)) $keylist = join(",", $seokeywords);

      $PAGE_KEYWORDS = str_replace(" ", " ", JAK_Base::jakCleanurl($row['name']) . ($keylist ? "," . $keylist : "") . ($jkv["metakey"] ? "," . $jkv["metakey"] : ""));

      // SEO from the category content if available
      if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
        $PAGE_DESCRIPTION = envo_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
      } else {
        $PAGE_DESCRIPTION = envo_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
      }

      $JAK_HEADER_CSS        = $jkv["blog_css"];
      $JAK_FOOTER_JAVASCRIPT = $jkv["blog_javascript"];

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
  case 'a':

    if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {


      $result = $envodb->query('SELECT * FROM ' . $envotable . ' WHERE ((startdate = 0 OR startdate <= ' . time() . ') AND (enddate = 0 || enddate >= ' . time() . ')) AND id = "' . smartsql($page2) . '" LIMIT 1');
      $row    = $result->fetch_assoc();

      if ($row['active'] != 1) {

        envo_redirect(JAK_rewrite::jakParseurl('offline'));

      } else {

        if (!envo_row_permission($row['catid'], $envotable1, JAK_USERGROUPID)) {
          envo_redirect($backtoblog);

        } else {

          // Now let's check the hits cookie
          if (!envo_cookie_voted_hits($envotable, $row['id'], 'hits')) {

            envo_write_vote_hits_cookie($envotable, $row['id'], 'hits');

            // Update hits each time
            JAK_base::jakUpdatehits($row['id'], $envotable);
          }

          // Now output the data
          $PAGE_ID                     = $row['id'];
          $PAGE_TITLE                  = $row['title'];
          $PAGE_CONTENT                = envo_secure_site($row['content']);
          $SHOWTITLE                   = $row['showtitle'];
          $SHOWIMG                     = $row['previmg'];
          $SHOWDATE                    = $row['showdate'];
          $SHOWSOCIALBUTTON            = $row['socialbutton'];
          $BLOG_HITS                   = $row['hits'];
          $JAK_HEADER_CSS              = $row['blog_css'];
          $JAK_FOOTER_JAVASCRIPT       = $row['blog_javascript'];
          $jkv["sidebar_location_tpl"] = ($row['sidebar'] ? "left" : "right");

          $PAGE_TIME       = JAK_Base::jakTimesince($row['time'], $jkv["blogdateformat"], $jkv["blogtimeformat"], $tl['global_text']['gtxt4']);
          $PAGE_TIME_HTML5 = date("Y-m-d T H:i:s P", strtotime($row['time']));

          // Display contact form if whish so and do the caching
          $JAK_SHOW_C_FORM = FALSE;
          if ($row['showcontact'] != 0) {
            $JAK_SHOW_C_FORM      = envo_create_contact_form($row['showcontact'], $tl['form_text']['formt']);
            $JAK_SHOW_C_FORM_NAME = envo_contact_form_title($row['showcontact']);
          }

          // Get the url session
          $_SESSION['jak_lastURL'] = JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_BLOG, $page1, $page2, $page3, '');

        }

        // Get the sort orders for the grid
        $grid = $envodb->query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE blogid = "' . $row['id'] . '" ORDER BY orderid ASC');
        while ($grow = $grid->fetch_assoc()) {

          // the sidebar grid
          if ($grow["hookid"]) {
            $JAK_HOOK_SIDE_GRID[] = $grow;
          }
        }

        // Show Tags
        $JAK_TAGLIST = JAK_tags::jakGettaglist_class($page2, JAK_PLUGIN_ID_BLOG, JAK_PLUGIN_VAR_TAGS, 'tips', $tl["title_element"]["tel"]);

        // Page Nav
        $nextp = envo_next_page($page2, 'title', $envotable, 'id', ' AND catid != 0', '', 'active');
        if ($nextp) {

          if ($jkv["blogurl"]) {
            $seo = JAK_base::jakCleanurl($nextp['title']);
          }

          $JAK_NAV_NEXT       = JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_BLOG, 'a', $nextp['id'], $seo, '');
          $JAK_NAV_NEXT_TITLE = $nextp['title'];
        }

        $prevp = envo_previous_page($page2, 'title', $envotable, 'id', ' AND catid != 0', '', 'active');
        if ($prevp) {

          if ($jkv["blogurl"]) {
            $seop = JAK_base::jakCleanurl($prevp['title']);
          }

          $JAK_NAV_PREV       = JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_BLOG, 'a', $prevp['id'], $seop, '');
          $JAK_NAV_PREV_TITLE = $prevp['title'];
        }

        // Get the categories into a list
        $resultc = $envodb->query('SELECT id, name, varname FROM ' . $envotable1 . ' WHERE id IN(' . $row['catid'] . ') ORDER BY id ASC');
        while ($rowc = $resultc->fetch_assoc()) {

          if ($jkv["blogurl"]) {
            $seoc = JAK_base::jakCleanurl($rowc['varname']);
          }

          // EN: Create array with all categories ( Plugin Blog have one or more categories for one article, in array will be it one or more categories )
          // CZ: Vytvoření pole se všemi kategoriemi ( Plugin Blog má jednu nebo více kategorií pro jeden článek, v poli bude jedna nebo více kategorií )
          $catids[] = '<span class="blog-cat-list"><a href="' . JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_BLOG, 'c', $rowc['id'], $seoc, '', '') . '" title="' . $tlblog["blog_frontend"]["blog1"] . '">' . $rowc['name'] . '</a></span>';

          // EN: Get 'varname' for category
          // CZ: Získaní 'varname' kategorie
          $BLOG_CAT = $rowc['varname'];
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
    if ($JAK_TAGLIST) {
      $keytags = preg_split('/\s+/', strip_tags($JAK_TAGLIST));
      $keytags = ',' . implode(',', $keytags);
    }
    $PAGE_KEYWORDS    = str_replace(" ", " ", JAK_Base::jakCleanurl($PAGE_TITLE) . $keytags . ($jkv["metakey"] ? "," . $jkv["metakey"] : ""));
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
    // MAIN PAGE OF PLUGIN

    $getTotal = envo_get_total_permission_blog();

    if ($getTotal != 0) {
      // Paginator
      $blog                 = new JAK_Paginator;
      $blog->items_total    = $getTotal;
      $blog->mid_range      = $jkv["blogpagemid"];
      $blog->items_per_page = $jkv["blogpageitem"];
      $blog->jak_get_page   = $page1;
      $blog->jak_where      = $backtoblog;
      $blog->jak_prevtext   = $tl["pagination"]["pagin"];
      $blog->jak_nexttext   = $tl["pagination"]["pagin1"];
      $blog->paginate();

      // Pagination
      $JAK_PAGINATE = $blog->display_pages();
      // Get all blogs
      $JAK_BLOG_ALL = envo_get_blog($blog->limit, $jkv["blogorder"], '', '', $jkv["blogurl"], $tl['global_text']['gtxt4']);

    }

    // Get the categories
    $JAK_BLOG_CAT = JAK_Base::jakGetcatmix(JAK_PLUGIN_VAR_BLOG, '', $envotable1, JAK_USERGROUPID, $jkv["blogurl"]);

    // EN: Set data for the frontend page - Title, Description, Keywords and other ...
    // CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
    $PAGE_TITLE              = $jkv["blogtitle"];
    $MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
    $MAIN_SITE_DESCRIPTION   = $jkv['metadesc'];

    // Get the url session
    $_SESSION['jak_lastURL'] = $backtoblog;

    // Get the sort orders for the grid
    $JAK_HOOK_SIDE_GRID = FALSE;
    $grid               = $envodb->query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = ' . JAK_PLUGIN_ID_BLOG . ' AND blogid = 0 ORDER BY orderid ASC');
    while ($grow = $grid->fetch_assoc()) {
      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $JAK_HOOK_SIDE_GRID[] = $grow;
    }

    // Now get the new meta keywords and description maker
    if (isset($JAK_BLOG_ALL) && is_array($JAK_BLOG_ALL)) foreach ($JAK_BLOG_ALL as $kv) $seokeywords[] = JAK_Base::jakCleanurl($kv['title']);

    if (!empty($seokeywords)) $keylist = join(",", $seokeywords);

    $PAGE_KEYWORDS = str_replace(" ", " ", JAK_Base::jakCleanurl($PAGE_TITLE) . ($keylist ? "," . $keylist : "") . ($jkv["metakey"] ? "," . $jkv["metakey"] : ""));

    // SEO from the category content if available
    if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
      $PAGE_DESCRIPTION = envo_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
    } else {
      $PAGE_DESCRIPTION = envo_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
    }

    // Get the CSS and Javascript into the page
    $JAK_HEADER_CSS        = $jkv["blog_css"];
    $JAK_FOOTER_JAVASCRIPT = $jkv["blog_javascript"];

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