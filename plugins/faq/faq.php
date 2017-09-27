<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

$CHECK_USR_SESSION = session_id();

// -------- DATA FOR ALL FRONTEND PAGES --------
// -------- DATA PRO VŠECHNY FRONTEND STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/faq/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/faq/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'faq';
$envotable1 = DB_PREFIX . 'faqcategories';

// EN: Include the functions
// CZ: Vložené funkce
include_once 'functions.php';

// Get the important template stuff
$JAK_SEARCH_WHERE = JAK_PLUGIN_VAR_FAQ;
$JAK_SEARCH_LINK  = JAK_PLUGIN_VAR_FAQ;

// AJAX Search
$AJAX_SEARCH_PLUGIN_WHERE = $envotable;
$AJAX_SEARCH_PLUGIN_URL   = 'plugins/faq/ajaxsearch.php';
$AJAX_SEARCH_PLUGIN_SEO   = $jkv["faqurl"];

// Get the rss if active
if ($jkv["faqrss"]) {
  $JAK_RSS_DISPLAY = 1;
  $P_RSS_LINK      = ENVO_rewrite::envoParseurl('rss.xml', JAK_PLUGIN_VAR_FAQ, '', '', '');
}

// Parse links once if needed a lot of time
$backtofaq = ENVO_rewrite::envoParseurl(JAK_PLUGIN_VAR_FAQ, '', '', '', '');

// Template Call
$JAK_TPL_PLUG_T   = JAK_PLUGIN_NAME_FAQ;
$JAK_TPL_PLUG_URL = $backtofaq;

// -------- DATA FOR SELECTED FRONTEND PAGES --------
// -------- DATA PRO VYBRANÉ FRONTEND STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'c':

    if (is_numeric($page2) && envo_row_permission($page2, $envotable1, JAK_USERGROUPID)) {

      $getTotal = envo_get_total($envotable, $page2, 'catid', 'active');

      if ($jkv["faqurl"]) {
        $getWhere = ENVO_rewrite::envoParseurl(JAK_PLUGIN_VAR_FAQ, $page1, $page2, $page3, '');
        $getPage  = $page4;
      } else {
        $getWhere = ENVO_rewrite::envoParseurl(JAK_PLUGIN_VAR_FAQ, $page1, $page2, '', '');
        $getPage  = $page3;
      }

      if ($getTotal != 0) {

        // Paginator
        $faqc                 = new JAK_Paginator;
        $faqc->items_total    = $getTotal;
        $faqc->mid_range      = $jkv["faqpagemid"];
        $faqc->items_per_page = $jkv["faqpageitem"];
        $faqc->jak_get_page   = $getPage;
        $faqc->jak_where      = $getWhere;
        $faqc->jak_prevtext   = $tl["pagination"]["pagin"];
        $faqc->jak_nexttext   = $tl["pagination"]["pagin1"];
        $faqc->paginate();
        $JAK_PAGINATE = $faqc->display_pages();
      }

      $JAK_FAQ_ALL = envo_get_faq($faqc->limit, $jkv["faqorder"], $page2, 't1.catid', $jkv["faqurl"], $tl['global_text']['gtxt4']);

      $result = $envodb->query('SELECT name' . ', content' . ' FROM ' . $envotable1 . ' WHERE id = "' . smartsql($page2) . '" LIMIT 1');
      $row    = $result->fetch_assoc();

      $PAGE_TITLE              = JAK_PLUGIN_NAME_FAQ . ' - ' . $row['name'];
      $PAGE_CONTENT            = $row['content'];
      $MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
      $MAIN_SITE_DESCRIPTION   = $jkv['metadesc'];

      // Get the sort orders for the grid
      $JAK_HOOK_SIDE_GRID = FALSE;
      $grid               = $envodb->query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = ' . JAK_PLUGIN_ID_FAQ . ' AND faqid = 0 ORDER BY orderid ASC');
      while ($grow = $grid->fetch_assoc()) {
        // EN: Insert each record into array
        // CZ: Vložení získaných dat do pole
        $JAK_HOOK_SIDE_GRID[] = $grow;
      }

      // Get the url session
      $_SESSION['jak_lastURL'] = $getWhere;

      // Now get the new meta keywords and description maker
      if (isset($JAK_FAQ_ALL) && is_array($JAK_FAQ_ALL)) foreach ($JAK_FAQ_ALL as $kv) $seokeywords[] = JAK_Base::jakCleanurl($kv['title']);

      if (!empty($seokeywords)) $keylist = join(",", $seokeywords);

      $PAGE_KEYWORDS = str_replace(" ", " ", JAK_Base::jakCleanurl($PAGE_TITLE) . ($keylist ? "," . $keylist : "") . ($jkv["metakey"] ? "," . $jkv["metakey"] : ""));

      // SEO from the category content if available
      if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
        $PAGE_DESCRIPTION = envo_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
      } else {
        $PAGE_DESCRIPTION = envo_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
      }

      // Get the CSS and Javascript into the page
      $JAK_HEADER_CSS        = $jkv["faq_css"];
      $JAK_FOOTER_JAVASCRIPT = $jkv["faq_javascript"];

      // EN: Load the php template
      // CZ: Načtení php template (šablony)
      $pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'faq.php';
      $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/faq/faq.php';

      if (file_exists($pluginsite_template)) {
        $plugin_template = $pluginsite_template;
      } else {
        $plugin_template = $pluginbasic_template;
      }

    } else {
      envo_redirect($backtofaq);
    }

    break;
  case 'a':

    if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

      $result = $envodb->query('SELECT * FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '" LIMIT 1');
      $row    = $result->fetch_assoc();

      if ($row['active'] != 1) {
        envo_redirect(ENVO_rewrite::envoParseurl('offline'));
      } else {

        if (!envo_row_permission($row['catid'], $envotable1, JAK_USERGROUPID)) {
          envo_redirect($backtofaq);
        } else {

          // Now let's check the hits cookie
          if (!envo_cookie_voted_hits($envotable, $row['id'], 'hits')) {

            envo_write_vote_hits_cookie($envotable, $row['id'], 'hits');

            // Update hits each time
            ENVO_base::jakUpdatehits($row['id'], $envotable);
          }

          // Now output the data
          $PAGE_ID          = $row['id'];
          $PAGE_TITLE       = $row['title'];
          $PAGE_CONTENT     = envo_secure_site($row['content']);
          $SHOWTITLE        = $row['showtitle'];
          $SHOWDATE         = $row['showdate'];
          $SHOWSOCIALBUTTON = $row['socialbutton'];
          $FAQ_HITS         = $row['hits'];

          $PAGE_TIME       = JAK_Base::jakTimesince($row['time'], $jkv["faqdateformat"], $jkv["faqtimeformat"], $tl['global_text']['gtxt4']);
          $PAGE_TIME_HTML5 = date("Y-m-d T H:i:s P", strtotime($row['time']));

          // Display contact form if whish so and do the caching
          $JAK_SHOW_C_FORM = FALSE;
          if ($row['showcontact'] != 0) {
            $JAK_SHOW_C_FORM      = envo_create_contact_form($row['showcontact'], $tl['form_text']['formt']);
            $JAK_SHOW_C_FORM_NAME = envo_contact_form_title($row['showcontact']);
          }

          // Get the url session
          $_SESSION['jak_lastURL'] = ENVO_rewrite::envoParseurl(JAK_PLUGIN_VAR_FAQ, $page1, $page2, $page3, '');

        }

        // Get the sort orders for the grid
        $grid = $envodb->query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE faqid = "' . $row['id'] . '" ORDER BY orderid ASC');
        while ($grow = $grid->fetch_assoc()) {

          // the sidebar grid
          if ($grow["hookid"]) {
            $JAK_HOOK_SIDE_GRID[] = $grow;
          }
        }

        // Show Tags
        $JAK_TAGLIST = ENVO_tags::jakGettaglist($page2, JAK_PLUGIN_ID_FAQ, JAK_PLUGIN_VAR_TAGS);

        // Get the categories into a list
        $resultc = $envodb->query('SELECT id, name, varname FROM ' . $envotable1 . ' WHERE id IN(' . $row['catid'] . ') ORDER BY id ASC');
        while ($rowc = $resultc->fetch_assoc()) {

          if ($jkv["faqurl"]) {
            $seoc = ENVO_base::jakCleanurl($rowc['varname']);
          }

          // EN: Create array with all categories ( Plugin Download have only one category for one download file, in array will be it only one category )
          // CZ: Vytvoření pole se všemi kategoriemi ( Plugin Download má pouze jednu kategorie pro jeden stahovaný soubor, v poli bude jen jedna kategorie )
          $catids[] = '<a class="category-label"  href="' . ENVO_rewrite::envoParseurl(JAK_PLUGIN_VAR_FAQ, 'c', $rowc['id'], $seoc, '', '') . '" title="' . $tlf["faq_frontend"]["faq2"] . '">' . $rowc['name'] . '</a>';

          // EN: Get 'varname' for category
          // CZ: Získaní 'varname' kategorie
          $FAQ_CAT = $rowc['varname'];
        }

        if (!empty($catids)) {
          // EN: Returns a string from the elements of an array
          // CZ: Získání elementů z pole
          $FAQ_CATLIST = join(" ", $catids);
        }

        // Page Nav
        $nextp = envo_next_page($page2, 'title', $envotable, 'id', ' AND catid = "' . smartsql($row["catid"]) . '"', '', 'active');
        if ($nextp) {

          if ($jkv["faqurl"]) {
            $seo = ENVO_base::jakCleanurl($nextp['title']);
          }

          $JAK_NAV_NEXT       = ENVO_rewrite::envoParseurl(JAK_PLUGIN_VAR_FAQ, 'a', $nextp['id'], $seo, '');
          $JAK_NAV_NEXT_TITLE = addslashes($nextp['title']);
        }

        $prevp = envo_previous_page($page2, 'title', $envotable, 'id', ' AND catid = "' . smartsql($row["catid"]) . '"', '', 'active');
        if ($prevp) {

          if ($jkv["faqurl"]) {
            $seop = ENVO_base::jakCleanurl($prevp['title']);
          }

          $JAK_NAV_PREV       = ENVO_rewrite::envoParseurl(JAK_PLUGIN_VAR_FAQ, 'a', $prevp['id'], $seop, '');
          $JAK_NAV_PREV_TITLE = addslashes($prevp['title']);
        }

      }
    } else {
      envo_redirect($backtofaq);
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
    $pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'faqart.php';
    $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/faq/faqart.php';

    if (file_exists($pluginsite_template)) {
      $plugin_template = $pluginsite_template;
    } else {
      $plugin_template = $pluginbasic_template;
    }

    break;
  default:
    // MAIN PAGE OF PLUGIN

    $getTotal = envo_get_total_permission_faq();

    if ($getTotal != 0) {
      // Paginator
      $faq                 = new JAK_Paginator;
      $faq->items_total    = $getTotal;
      $faq->mid_range      = $jkv["faqpagemid"];
      $faq->items_per_page = $jkv["faqpageitem"];
      $faq->jak_get_page   = $page1;
      $faq->jak_where      = $backtofaq;
      $faq->jak_prevtext   = $tl["pagination"]["pagin"];
      $faq->jak_nexttext   = $tl["pagination"]["pagin1"];
      $faq->paginate();

      // Pagination
      $JAK_PAGINATE = $faq->display_pages();

      // Get all FAQ articles
      $JAK_FAQ_ALL = envo_get_faq($faq->limit, $jkv["faqorder"], '', '', $jkv["faqurl"], $tl['global_text']['gtxt4']);

    }

    // EN: Set data for the frontend page - Title, Description, Keywords and other ...
    // CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
    $PAGE_TITLE              = $jkv["faqtitle"];
    $PAGE_CONTENT            = $jkv["faqdesc"];
    $MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
    $MAIN_SITE_DESCRIPTION   = $jkv['metadesc'];

    // Get the url session
    $_SESSION['jak_lastURL'] = $backtofaq;

    // Get the sort orders for the grid
    $grid = $envodb->query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = ' . JAK_PLUGIN_ID_FAQ . ' AND faqid = 0 ORDER BY orderid ASC');
    while ($grow = $grid->fetch_assoc()) {
      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $JAK_HOOK_SIDE_GRID[] = $grow;
    }

    // Now get the new meta keywords and description maker
    if (isset($JAK_FAQ_ALL) && is_array($JAK_FAQ_ALL)) foreach ($JAK_FAQ_ALL as $kv) $seokeywords[] = JAK_Base::jakCleanurl($kv['title']);

    if (!empty($seokeywords)) $keylist = join(",", $seokeywords);

    $PAGE_KEYWORDS = str_replace(" ", " ", JAK_Base::jakCleanurl($PAGE_TITLE) . ($keylist ? "," . $keylist : "") . ($jkv["metakey"] ? "," . $jkv["metakey"] : ""));

    // SEO from the category content if available
    if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
      $PAGE_DESCRIPTION = envo_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
    } else {
      $PAGE_DESCRIPTION = envo_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
    }

    // Get the CSS and Javascript into the page
    $JAK_HEADER_CSS        = $jkv["faq_css"];
    $JAK_FOOTER_JAVASCRIPT = $jkv["faq_javascript"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'faq.php';
    $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/faq/faq.php';

    if (file_exists($pluginsite_template)) {
      $plugin_template = $pluginsite_template;
    } else {
      $plugin_template = $pluginbasic_template;
    }

}

?>