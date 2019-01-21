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

		// EN: Default Variable
		// CZ: Hlavní proměnné
		$catID = $page2;
		if ($setting["blogurl"]) {
			$catNAME = $page3;
			// '$page4' can be a number for Paginator
			$undesirableArr = array ($page5, $page6);
		} else {
			// '$page3' can be a number for Paginator
			$undesirableArr = array ($page4, $page5, $page6);
		}

		// EN: Control of undesirable URLs
		// CZ: Kontrola nežádoucích URL adres
		// ---------------------------------------------------------------------
		if (!empty(array_filter($undesirableArr))) {

			// ----------- ERROR: REDIRECT PAGE ------------
			// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

			// EN: If not exist '$pageID' in DB, redirect page
			// CZ: Pokud neexistuje '$pageID', dochází k přesměrování stránky

			envo_redirect(ENVO_rewrite ::envoParseurl('404'));

			exit();
		}

		/**
		 * EN: Check if ID of category exists in the DB
		 * CZ: Kontrola jestli existuje ID kategorie v DB
		 *
		 * @example envo_rowExists ($table, $where, $value )
		 * ---------------------------------------------------------------------
		 */
		if (is_numeric($catID) && envo_rowExists($envotable1, 'id', $catID) && envo_row_permission($catID, $envotable1, ENVO_USERGROUPID)) {


			/**
			 * EN: Check if category exists in the DB
			 * CZ: Kontrola jestli existuje kategorie v DB
			 *
			 * @example envo_rowExists ($table, $where, $value )
			 */
			if ($setting["blogurl"]) {
				if (envo_rowExists($envotable1, 'varname', $catNAME)) {
					$checkrow = TRUE;
				} else {
					$checkrow = FALSE;
				}
			} else {
				$checkrow = TRUE;
			}

			if ($checkrow) {

				// EN:
				// CZ:
				// ---------------------------------------------------------------------
				if ($setting["blogurl"]) {
					$getWhere = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_BLOG, $page1, $page2, $page3, '');
					$getPage  = $page4;
				} else {
					$getWhere = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_BLOG, $page1, $page2, '', '');
					$getPage  = $page3;
				}

				// EN: Getting data from DB about the articles for a selected category | Pagination
				// CZ: Získání dat z DB o článcích pro vybranou kategorii | Stránkování
				// ------------------------------------------------------------------------------
				// The total count of files in the category
				$result = $envodb -> query('SELECT COUNT(*) as count FROM ' . $envotable . ' WHERE ((startdate = 0 OR startdate <= ' . time() . ') AND (enddate = 0 || enddate >= ' . time() . ')) AND catid LIKE "%' . smartsql($catID) . '%" AND active = 1');
				$getTotal = $result -> fetch_assoc();

				if ($getTotal["count"] != 0) {
					// Paginator
					$blogc                   = new ENVO_paginator;
					$blogc -> items_total    = $getTotal["count"];
					$blogc -> mid_range      = $setting["blogpagemid"];
					$blogc -> items_per_page = $setting["blogpageitem"];
					$blogc -> envo_get_page  = $getPage;
					$blogc -> envo_where     = $getWhere;
					$blogc -> envo_prevtext  = $tl["pagination"]["pagin"];
					$blogc -> envo_nexttext  = $tl["pagination"]["pagin1"];
					$blogc -> paginate();

					// Pagination
					$ENVO_PAGINATE = $blogc -> display_pages();

					// EN: Getting data from DB about the articles for a selected category
					// CZ: Získání dat z DB o článcích pro vybranou kategorii
					$ENVO_BLOG_ALL = envo_get_blog($blogc -> limit, $setting["blogorder"], $catID, 't1.catid', $setting["blogurl"], $tl['global_text']['gtxt4']);

				}

				// EN: Getting data from DB about the selected category
				// CZ: Získání dat z DB o vybrané kategorii
				// ---------------------------------------------------------------------
				$row = $envodb -> queryRow('SELECT name, content FROM ' . $envotable1 . ' WHERE id = "' . smartsql($catID) . '" LIMIT 1');

				// EN: Getting data from DB for the grid of page
				// CZ: Získání dat z DB pro mřížku stránky
				// ---------------------------------------------------------------------
				$ENVO_HOOK_SIDE_GRID = FALSE;
				$grid                = $envodb -> query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = ' . ENVO_PLUGIN_ID_BLOG . ' AND blogid = 0 ORDER BY orderid ASC');

				while ($grow = $grid -> fetch_assoc()) {
					// EN: Insert each record into array
					// CZ: Vložení získaných dat do pole
					$ENVO_HOOK_SIDE_GRID[] = $grow;
				}

				// EN: Getting only one category in the list
				// CZ: Získání pouze jedné kategorie do seznamu
				// ---------------------------------------------------------------------
				$resultc = $envodb -> query('SELECT id, name, varname FROM ' . $envotable1 . ' WHERE id =' . $catID);
				while ($rowc = $resultc -> fetch_assoc()) {

					if ($setting["blogurl"]) {
						$seoc = ENVO_base ::envoCleanurl($rowc['varname']);
					}

					// EN: Get 'id, varname' for category
					// CZ: Získaní 'id, varname' kategorie
					$BLOG_CAT[] = array (
						'id'      => $rowc['id'],
						'varname' => $seoc,
					);
				}

				// EN: Setting output value - Title, Description, Keywords and other ...
				// CZ: Nastavení výstupních hodnot - Titulek, Popis, Klíčová slova a další ...
				// -----------------------------------------------------------------------------
				$PAGE_TITLE              = ENVO_PLUGIN_NAME_BLOG . ' - ' . $row['name'];
				// TODO! Vyřešit $PAGE_CONTENT - není zahrnuto ve frontend | přejmenovat nejlépe na $CAT_DESCRIPTION - je to popis kategorie
				$PAGE_CONTENT            = $row['content'];
				// TODO! Vyřešit $MAIN_PLUGIN_DESCRIPTION a $MAIN_SITE_DESCRIPTION - přejmenovat | pokud přejmenujeme $PAGE_CONTENT
				$MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
				$MAIN_SITE_DESCRIPTION   = $setting['metadesc'];

				// EN: Add URL to session
				// CZ: Přidání URL do session
				// ---------------------------------------------------------------------
				$_SESSION['envo_lastURL'] = $getWhere;

				// EN: Creatting the new meta keywords and description maker
				// CZ: Vytváření nových meta klíčových slov a popisovačů
				// ---------------------------------------------------------------------
				if (isset($ENVO_BLOG_ALL) && is_array($ENVO_BLOG_ALL)) {
					foreach ($ENVO_BLOG_ALL as $kv) {
						$seokeywords[] = ENVO_base ::envoCleanurl($kv['title']);
					}
				}

				if (!empty($seokeywords)) {
					$keylist = join(",", $seokeywords);
				}

				$PAGE_KEYWORDS = str_replace(" ", " ", ENVO_base ::envoCleanurl($row['name']) . ($keylist ? "," . $keylist : "") . ($setting["metakey"] ? "," . $setting["metakey"] : ""));

				// EN: SEO Meta tag
				// CZ: SEO Meta tag
				if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
					$PAGE_DESCRIPTION = envo_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
				} else {
					$PAGE_DESCRIPTION = envo_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
				}

				// EN: Getting the CSS and Javascript into the page
				// CZ: Získání CSS a Javascript pro stránku
				// ---------------------------------------------------------------------
				$ENVO_HEADER_CSS        = $setting["blog_css"];
				$ENVO_FOOTER_JAVASCRIPT = $setting["blog_javascript"];

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				// ---------------------------------------------------------------------
				$pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'blog.php';
				$pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/blog/blog.php';

				if (file_exists($pluginsite_template)) {
					$plugin_template = $pluginsite_template;
				} else {
					$plugin_template = $pluginbasic_template;
				}

			} else {

				// ----------- ERROR: REDIRECT PAGE ------------
				// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

				// EN: If not exist '$pageID' in DB, redirect page
				// CZ: Pokud neexistuje '$pageID', dochází k přesměrování stránky

				envo_redirect(ENVO_rewrite ::envoParseurl('404'));

			}

		} else {

			// ----------- ERROR: REDIRECT PAGE ------------
			// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

			// EN: If not exist '$pageID' in DB, redirect page
			// CZ: Pokud neexistuje '$pageID', dochází k přesměrování stránky

			envo_redirect(ENVO_rewrite ::envoParseurl('404'));

		}

		break;
	case 'blog-article':
		// BLOG ARTICLE

		// EN: Default Variable
		// CZ: Hlavní proměnné
		$pageID = $page2;
		if ($setting["blogurl"]) {
			$pageNAME = $page3;
			$undesirableArr = array ($page4, $page5, $page6);
		} else {
			$undesirableArr = array ($page3, $page4, $page5, $page6);
		}

		// EN: Control of undesirable URLs
		// CZ: Kontrola nežádoucích URL adres
		// ---------------------------------------------------------------------
		if (!empty(array_filter($undesirableArr))) {

			// ----------- ERROR: REDIRECT PAGE ------------
			// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

			// EN: If not exist '$pageID' in DB, redirect page
			// CZ: Pokud neexistuje '$pageID', dochází k přesměrování stránky

			envo_redirect(ENVO_rewrite ::envoParseurl('404'));

			exit();
		}

		/**
		 * EN: Check if ID of page exists in the DB
		 * CZ: Kontrola jestli existuje ID stránky v DB
		 *
		 * @example envo_rowExists ($table, $where, $value )
		 * ---------------------------------------------------------------------
		 */
		if (is_numeric($pageID) && envo_rowExists($envotable, 'id', $pageID)) {

			/**
			 * EN: Check if page exists in the DB
			 * CZ: Kontrola jestli existuje stránka v DB
			 *
			 * @example envo_rowExists ($table, $where, $value )
			 * ---------------------------------------------------------------------
			 */
			if ($setting["blogurl"]) {
				if (envo_rowExists($envotable, 'varname', $pageNAME)) {
					$checkrow = TRUE;
				} else {
					$checkrow = FALSE;
				}
			} else {
				$checkrow = TRUE;
			}

			if ($checkrow) {

				// EN: Getting all the data about the selected article from the DB
				// CZ: Získání všech dat o vybraném článku z DB
				// ---------------------------------------------------------------------
				$result = $envodb -> query('SELECT * FROM ' . $envotable . ' WHERE ((startdate = 0 OR startdate <= ' . time() . ') AND (enddate = 0 || enddate >= ' . time() . ')) AND id = "' . smartsql($pageID) . '" LIMIT 1');
				$row    = $result -> fetch_assoc();

				if ($row['active'] != 1) {

					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(ENVO_rewrite ::envoParseurl('offline'));

				} else {

					if (!envo_row_permission($row['catid'], $envotable1, ENVO_USERGROUPID)) {

						// EN: Redirect page
						// CZ: Přesměrování stránky
						envo_redirect($backtoblog);

					} else {

						// Now let's check the hits cookie
						if (!envo_cookie_voted_hits($envotable, $row['id'], 'hits')) {

							envo_write_vote_hits_cookie($envotable, $row['id'], 'hits');

							// Update hits each time
							ENVO_base ::envoUpdatehits($row['id'], $envotable);
						}

						// EN: Setting output value - Title, Description, Keywords and other ...
						// CZ: Nastavení výstupních hodnot - Titulek, Popis, Klíčová slova a další ...
						// -----------------------------------------------------------------------------
						$PAGE_ID                         = $row['id'];
						$PAGE_TITLE                      = $row['title'];
						$PAGE_CONTENT                    = envo_secure_site($row['content']);
						$SHOWTITLE                       = $row['showtitle'];
						$THUMBIMG                        = $row['previmg'];
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

					// EN: Getting data from DB for the grid of page
					// CZ: Získání dat z DB pro mřížku stránky
					// ---------------------------------------------------------------------
					$grid = $envodb -> query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE blogid = "' . $row['id'] . '" ORDER BY orderid ASC');
					while ($grow = $grid -> fetch_assoc()) {

						// the sidebar grid
						if ($grow["hookid"]) {
							$ENVO_HOOK_SIDE_GRID[] = $grow;
						}
					}

					// EN: Show Tags
					// CZ:
					// ---------------------------------------------------------------------
					$ENVO_TAGLIST = ENVO_tags ::envoGetTagList_class($pageID, ENVO_PLUGIN_ID_BLOG, ENVO_PLUGIN_VAR_TAGS, 'tags-list-item', $tl["title_element"]["tel"]);

					// EN: Getting categories in the list
					// CZ: Získání kategorií do seznamu
					// ---------------------------------------------------------------------
					$resultc = $envodb -> query('SELECT id, name, varname FROM ' . $envotable1 . ' WHERE id IN(' . $row['catid'] . ') ORDER BY id ASC');
					while ($rowc = $resultc -> fetch_assoc()) {

						if ($setting["blogurl"]) {
							$seoc = ENVO_base ::envoCleanurl($rowc['varname']);
						}

						// EN: Create array with all categories
						// CZ: Vytvoření pole se všemi kategoriemi
						$catids[] = '<span class="cat-list"><a href="' . ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_BLOG, 'category', $rowc['id'], $seoc, '', '') . '" title="' . $tlblog["blog_frontend"]["blog1"] . '">' . $rowc['name'] . '</a></span>';

						// EN: Get 'varname' for category
						// CZ: Získaní 'varname' kategorie
						$BLOG_CAT[] = array (
							'id'      => $rowc['id'],
							'varname' => $seoc,
						);
					}

					if (!empty($catids)) {
						// EN: Returns a string from the elements of an array
						// CZ: Získání elementů z pole
						$BLOG_CATLIST = join(" ", $catids);
					}

					// EN: Page Navigation
					// CZ: Navigace stránky
					// ---------------------------------------------------------------------
					$nextp = envo_next_page($pageID, 'title', $envotable, 'id', ' AND catid != 0', '', 'active');
					if ($nextp) {

						if ($setting["blogurl"]) {
							$seo = ENVO_base ::envoCleanurl($nextp['title']);
						}

						$ENVO_NAV_NEXT       = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_BLOG, 'blog-article', $nextp['id'], $seo, '');
						$ENVO_NAV_NEXT_TITLE = $nextp['title'];
					}

					$prevp = envo_previous_page($pageID, 'title', $envotable, 'id', ' AND catid != 0', '', 'active');
					if ($prevp) {

						if ($setting["blogurl"]) {
							$seop = ENVO_base ::envoCleanurl($prevp['title']);
						}

						$ENVO_NAV_PREV       = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_BLOG, 'blog-article', $prevp['id'], $seop, '');
						$ENVO_NAV_PREV_TITLE = $prevp['title'];
					}

				}

				// EN: Creatting the new meta keywords and description maker
				// CZ: Vytváření nových meta klíčových slov a popisovačů
				// ---------------------------------------------------------------------
				$keytags = '';
				if ($ENVO_TAGLIST) {
					$keytags = preg_split('/\s+/', strip_tags($ENVO_TAGLIST));
					$keytags = ',' . implode(',', $keytags);
				}

				$PAGE_KEYWORDS    = str_replace(" ", " ", ENVO_base ::envoCleanurl($PAGE_TITLE) . $keytags . ($setting["metakey"] ? "," . $setting["metakey"] : ""));
				$PAGE_DESCRIPTION = envo_cut_text($PAGE_CONTENT, 155, '');

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				// ---------------------------------------------------------------------
				$pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'blogart.php';
				$pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/blog/blogart.php';

				if (file_exists($pluginsite_template)) {
					$plugin_template = $pluginsite_template;
				} else {
					$plugin_template = $pluginbasic_template;
				}

			} else {

				// ----------- ERROR: REDIRECT PAGE ------------
				// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

				// EN: If not exist '$pageNAME' in DB, redirect page  to 404
				// CZ: Pokud neexistuje '$pageNAME', dochází k přesměrování stránky na 404

				envo_redirect(ENVO_rewrite ::envoParseurl('404'));

			}

		} else {

			// ----------- ERROR: REDIRECT PAGE ------------
			// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

			// EN: If not exist '$pageID' in DB, redirect page
			// CZ: Pokud neexistuje '$pageID', dochází k přesměrování stránky

			envo_redirect(ENVO_rewrite ::envoParseurl('404'));

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
				envo_redirect(ENVO_rewrite ::envoParseurl('404'));
			}
		}

		// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
		// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------
		// The total count of articles in the category
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

			// EN: Getting data from DB about the all articles
			// CZ: Získání dat z DB o všech článcích
			$ENVO_BLOG_ALL = envo_get_blog($blog -> limit, $setting["blogorder"], '', '', $setting["blogurl"], $tl['global_text']['gtxt4']);

		}

		// EN: Getting data from DB for the grid of page
		// CZ: Získání dat z DB pro mřížku stránky
		// ---------------------------------------------------------------------
		$ENVO_HOOK_SIDE_GRID = FALSE;
		$grid                = $envodb -> query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = ' . ENVO_PLUGIN_ID_BLOG . ' AND blogid = 0 ORDER BY orderid ASC');
		while ($grow = $grid -> fetch_assoc()) {
			// EN: Insert each record into array
			// CZ: Vložení získaných dat do pole
			$ENVO_HOOK_SIDE_GRID[] = $grow;
		}

		// EN: Setting basic value - Title, Description, Keywords and other ...
		// CZ: Nastavení základních hodnot - Titulek, Popis, Klíčová slova a další ...
		// -----------------------------------------------------------------------------
		$PAGE_TITLE              = $setting["blogtitle"];
		// TODO! Vyřešit $MAIN_PLUGIN_DESCRIPTION a $MAIN_SITE_DESCRIPTION - přejmenovat
		$MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
		$MAIN_SITE_DESCRIPTION   = $setting['metadesc'];

		// EN: Add URL to session
		// CZ: Přidání URL do session
		// ---------------------------------------------------------------------
		$_SESSION['envo_lastURL'] = $backtoblog;

		// EN: Creatting the new meta keywords and description maker
		// CZ: Vytvoření nových meta klíčových slov a popisovačů
		// ---------------------------------------------------------------------
		if (isset($ENVO_BLOG_ALL) && is_array($ENVO_BLOG_ALL)) {
			foreach ($ENVO_BLOG_ALL as $kv) {
				$seokeywords[] = ENVO_base ::envoCleanurl($kv['title']);
			}
		}

		if (!empty($seokeywords)) {
			$keylist = join(",", $seokeywords);
		}

		$PAGE_KEYWORDS = str_replace(" ", " ", ENVO_base ::envoCleanurl($PAGE_TITLE) . ($keylist ? "," . $keylist : "") . ($setting["metakey"] ? "," . $setting["metakey"] : ""));

		// EN: SEO Meta tag
		// CZ: SEO Meta tag
		if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
			$PAGE_DESCRIPTION = envo_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
		} else {
			$PAGE_DESCRIPTION = envo_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
		}

		// EN: Getting the CSS and Javascript into the page
		// CZ: Získání CSS a Javascript pro stránku
		// ---------------------------------------------------------------------
		$ENVO_HEADER_CSS        = $setting["blog_css"];
		$ENVO_FOOTER_JAVASCRIPT = $setting["blog_javascript"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		// ---------------------------------------------------------------------
		$pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'blog.php';
		$pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/blog/blog.php';

		if (file_exists($pluginsite_template)) {
			$plugin_template = $pluginsite_template;
		} else {
			$plugin_template = $pluginbasic_template;
		}

}

?>