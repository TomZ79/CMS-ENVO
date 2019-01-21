<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

$CHECK_USR_SESSION = session_id();

// -------- DATA FOR ALL FRONTEND PAGES --------
// -------- DATA PRO VŠECHNY FRONTEND STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/download/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/download/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'download';
$envotable1 = DB_PREFIX . 'downloadcategories';
$envotable3 = DB_PREFIX . 'downloadhistory';

// EN: Include the functions
// CZ: Vložené funkce
include_once 'functions.php';

// Get the important template stuff
$ENVO_SEARCH_WHERE = ENVO_PLUGIN_VAR_DOWNLOAD;
$ENVO_SEARCH_LINK  = ENVO_PLUGIN_VAR_DOWNLOAD;

// Wright the Usergroup permission into define and for template
define('ENVO_DOWNLOADCAN', $envousergroup -> getVar("downloadcan"));

// AJAX Search
$AJAX_SEARCH_PLUGIN_WHERE = $envotable;
$AJAX_SEARCH_PLUGIN_URL   = 'plugins/download/ajaxsearch.php';
$AJAX_SEARCH_PLUGIN_SEO   = $setting["downloadurl"];

// Get the rss if active
if ($setting["downloadrss"]) {
	$ENVO_RSS_DISPLAY = 1;
	$P_RSS_LINK       = ENVO_rewrite ::envoParseurl('rss.xml', ENVO_PLUGIN_VAR_DOWNLOAD, '', '', '');
}

// Parse links once if needed a lot of time
$backtodl = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_DOWNLOAD, '', '', '', '');

// Template Call
$ENVO_TPL_PLUG_T   = ENVO_PLUGIN_NAME_DOWNLOAD;
$ENVO_TPL_PLUG_URL = $backtodl;

// -------- DATA FOR SELECTED FRONTEND PAGES --------
// -------- DATA PRO VYBRANÉ FRONTEND STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
	case 'category':
		// DOWNLOAD CATEGORY

		// EN: Default Variable
		// CZ: Hlavní proměnné
		$catID   = $page2;
		if ($setting["downloadurl"]) {
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
			if ($setting["downloadurl"]) {
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
				if ($setting["downloadurl"]) {
					$getWhere = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_DOWNLOAD, $page1, $page2, $page3, '');
					$getPage  = $page4;
				} else {
					$getWhere = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_DOWNLOAD, $page1, $page2, '', '');
					$getPage  = $page3;
				}

				// EN: Getting data from DB about the files for a selected category | Pagination
				// CZ: Získání dat z DB o souborech pro vybranou kategorii | Stránkování
				// ------------------------------------------------------------------------------
				// The total count of files in the category
				$result   = $envodb -> query('SELECT COUNT(*) AS count FROM ' . $envotable . ' WHERE catid LIKE "%' . smartsql($catID) . '%" AND active = 1');
				$getTotal = $result -> fetch_assoc();

				if ($getTotal["count"] != 0) {
					// Paginator
					$dlc                   = new ENVO_paginator;
					$dlc -> items_total    = $getTotal["count"];
					$dlc -> mid_range      = $setting["downloadpagemid"];
					$dlc -> items_per_page = $setting["downloadpageitem"];
					$dlc -> envo_get_page  = $getPage;
					$dlc -> envo_where     = $getWhere;
					$dlc -> envo_prevtext  = $tl["pagination"]["pagin"];
					$dlc -> envo_nexttext  = $tl["pagination"]["pagin1"];
					$dlc -> paginate();

					// Pagination
					$ENVO_PAGINATE = $dlc -> display_pages();

					// EN: Getting data from DB about the files for a selected category
					// CZ: Získání dat z DB o souborech pro vybranou kategorii
					$ENVO_DOWNLOAD_ALL = envo_get_download($dlc -> limit, $setting["downloadorder"], $catID, 't1.catid', $setting["downloadurl"], $tl['global_text']['gtxt4']);

				}

				// EN: Getting data from DB about the selected category
				// CZ: Získání dat z DB o vybrané kategorii
				// ---------------------------------------------------------------------
				$row = $envodb -> queryRow('SELECT name, content FROM ' . $envotable1 . ' WHERE id = "' . smartsql($catID) . '" LIMIT 1');

				// EN: Getting data from DB for the grid of page
				// CZ: Získání dat z DB pro mřížku stránky
				// ---------------------------------------------------------------------
				$ENVO_HOOK_SIDE_GRID = FALSE;
				$grid                = $envodb -> query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = "' . smartsql(ENVO_PLUGIN_ID_DOWNLOAD) . '" AND fileid = 0 ORDER BY orderid ASC');

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

					if ($setting["downloadurl"]) {
						$seoc = ENVO_base ::envoCleanurl($rowc['varname']);
					}

					// EN: Get 'id, varname' for category
					// CZ: Získaní 'id, varname' kategorie
					$DOWNLOAD_CAT[] = array (
						'id'      => $rowc['id'],
						'varname' => $seoc,
					);
				}

				// EN: Setting output value - Title, Description, Keywords and other ...
				// CZ: Nastavení výstupních hodnot - Titulek, Popis, Klíčová slova a další ...
				// -----------------------------------------------------------------------------
				$PAGE_TITLE = ENVO_PLUGIN_NAME_DOWNLOAD . ' - ' . $row['name'];
				// TODO! Vyřešit $PAGE_CONTENT - není zahrnuto ve frontend | přejmenovat nejlépe na $CAT_DESCRIPTION - je to popis kategorie
				$PAGE_CONTENT = $row['content'];
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
				if (isset($ENVO_DOWNLOAD_ALL) && is_array($ENVO_DOWNLOAD_ALL)) {
					foreach ($ENVO_DOWNLOAD_ALL as $kv) {
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
				$ENVO_HEADER_CSS        = $setting["download_css"];
				$ENVO_FOOTER_JAVASCRIPT = $setting["download_javascript"];

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				// ---------------------------------------------------------------------
				$pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'download.php';
				$pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/download/download.php';

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
	case 'f':
		// DOWNLOAD ARTICLE

		// EN: Default Variable
		// CZ: Hlavní proměnné
		$pageID   = $page2;
		if ($setting["downloadurl"]) {
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
			if ($setting["downloadurl"]) {
				if (envo_rowExists($envotable, 'varname', $pageNAME)) {
					$checkrow = TRUE;
				} else {
					$checkrow = FALSE;
				}
			} else {
				$checkrow = TRUE;
			}

			if ($checkrow) {

				// EN: Gain access to page
				// CZ:
				// ---------------------------------------------------------------------
				if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['dlprotect'])) {
					// EN: Default Variable
					// CZ: Hlavní proměnné
					$defaults = $_POST;

					$passcrypt = hash_hmac('sha256', $defaults['dlpass'], DB_PASS_HASH);

					if (!is_numeric($defaults['dlsec'])) {
						envo_redirect($backtodl);
					}

					// EN: Get password crypted
					// CZ:
					// ---------------------------------------------------------------------
					$passcrypt = hash_hmac('sha256', $defaults['dlpass'], DB_PASS_HASH);

					// EN: Check if the password is correct
					// CZ:
					$dl_check = ENVO_base ::envoCheckProtectedArea($passcrypt, 'download', $defaults['dlsec']);

					if (!$dl_check) {
						$errors['e'] = $tl['general_error']['generror8'];
					}

					if (count($errors) == 0) {

						$_SESSION['pagesecurehash' . $defaults['dlsec']] = $passcrypt;
						envo_redirect($_SERVER['HTTP_REFERER']);

					} else {
						$errorpp = $errors;
					}
				}

				// EN: Getting all the data about the selected file from the DB
				// CZ: Získání všech dat o vybraném souboru z DB
				// ---------------------------------------------------------------------
				$result = $envodb -> query('SELECT * FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '" LIMIT 1');
				$row    = $result -> fetch_assoc();

				if ($row['active'] != 1) {

					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(ENVO_rewrite ::envoParseurl('offline'));

				} else {

					if (!envo_row_permission($row['catid'], $envotable1, ENVO_USERGROUPID)) {

						// EN: Redirect page
						// CZ: Přesměrování stránky
						envo_redirect($backtodl);

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
						$PAGE_ID          = $row['id'];
						$PAGE_TITLE       = $row['title'];
						$PAGE_CONTENT     = envo_secure_site($row['content']);
						$SHOWTITLE        = $row['showtitle'];
						$THUMBIMG         = $row['previmg'];
						$SHOWDATE         = $row['showdate'];
						$SHOWCATS         = $row['showcat'];
						$SHOWDL           = $row['showdl'];
						$FT_SHARE         = $row['ftshare'];
						$SHOWSOCIALBUTTON = $row['socialbutton'];
						$DL_HITS          = $row['hits'];
						$DL_DOWNLOADS     = $row['countdl'];
						// EN: Facebook image
						// CZ: Obrázek pro Facebook
						if (!empty($row['previmgfbsm']) || !empty($row['previmgfblg'])) {
							if (isset($row['previmgfbsm']) && !isset($row['previmgfblg'])) {
								$imgsm      = urldecode($row['previmgfbsm']);
								$FB_IMAGE   = BASE_URL . ltrim($imgsm, '/') . '?v=' . rand();
								$data       = getimagesize(APP_PATH . ltrim($imgsm, '/'));
								$FB_IMAGE_W = $data[0];
								$FB_IMAGE_H = $data[1];
							} else {
								$imglg      = urldecode($row['previmgfblg']);
								$FB_IMAGE   = BASE_URL . ltrim($imglg, '/') . '?v=' . rand();
								$data       = getimagesize(APP_PATH . ltrim($imglg, '/'));
								$FB_IMAGE_W = $data[0];
								$FB_IMAGE_H = $data[1];
							}
						}
						// EN: $DL_PASSWORD - variable if page have password
						// CZ: $DL_PASSWORD - proměná pro zaheslovanou stránku
						$DL_PASSWORD = $row['password'];
						// EN: $PAGE_PASSWORD - main variable if page have password, use in template
						// CZ: $PAGE_PASSWORD - hlavní proměnná pro zaheslovanou stránku, používá se pro template
						$PAGE_PASSWORD                   = $DL_PASSWORD;
						$ENVO_HEADER_CSS                 = $row['dl_css'];
						$ENVO_FOOTER_JAVASCRIPT          = $row['dl_javascript'];
						$setting["sidebar_location_tpl"] = ($row['sidebar'] ? "left" : "right");
						$DL_LINK                         = html_entity_decode(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_DOWNLOAD, 'dl', $row['id'], '', ''));

						$PAGE_TIME       = ENVO_base ::envoTimesince($row['time'], $setting["downloaddateformat"], $setting["downloadtimeformat"], $tl['global_text']['gtxt4']);
						$PAGE_TIME_HTML5 = date("Y-m-d T H:i:s P", strtotime($row['time']));

						// Set download to false
						$DL_FILE_BUTTON = FALSE;

						// Fix the download if allowed to
						if (ENVO_DOWNLOADCAN && $row['candownload'] == 0 || envo_get_access(ENVO_USERGROUPID, $row['candownload'])) {

							$DL_FILE_BUTTON = TRUE;
						}

						// Get the url session
						$_SESSION['envo_lastURL']    = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_DOWNLOAD, $page1, $page2, $page3, '');
						$_SESSION['envo_thisFileID'] = $row['id'];

					}

					// EN: Getting data from DB for the grid of page
					// CZ: Získání dat z DB pro mřížku stránky
					// ---------------------------------------------------------------------
					$grid = $envodb -> query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE fileid = "' . smartsql($row['id']) . '" ORDER BY orderid ASC');
					while ($grow = $grid -> fetch_assoc()) {

						// the sidebar grid
						$ENVO_HOOK_SIDE_GRID[] = $grow;

					}

					// EN: Show Tags
					// CZ:
					// ---------------------------------------------------------------------
					$ENVO_TAGLIST = ENVO_tags ::envoGetTagList_class($pageID, ENVO_PLUGIN_ID_DOWNLOAD, ENVO_PLUGIN_VAR_TAGS, 'tags-list-item', $tl["title_element"]["tel"]);

					// EN: Getting categories in the list
					// CZ: Získání kategorií do seznamu
					// ---------------------------------------------------------------------
					$resultc = $envodb -> query('SELECT id, name, varname FROM ' . $envotable1 . ' WHERE id IN(' . $row['catid'] . ') ORDER BY id ASC');
					while ($rowc = $resultc -> fetch_assoc()) {

						if ($setting["downloadurl"]) {
							$seoc = ENVO_base ::envoCleanurl($rowc['varname']);
						}

						// EN: Create array with all categories
						// CZ: Vytvoření pole se všemi kategoriemi
						$catids[] = '<span class="cat-list"><a href="' . ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_DOWNLOAD, 'category', $rowc['id'], $seoc, '', '') . '" title="' . $tld["downl_frontend"]["downl11"] . '">' . $rowc['name'] . '</a></span>';

						// EN: Get 'varname' for category
						// CZ: Získaní 'varname' kategorie
						$DOWNLOAD_CAT[] = array (
							'id'      => $rowc['id'],
							'varname' => $seoc,
						);
					}

					if (!empty($catids)) {
						// EN: Returns a string from the elements of an array
						// CZ: Získání elementů z pole
						$DOWNLOAD_CATLIST = join(" ", $catids);
					}

					// EN: Page Navigation
					// CZ: Navigace stránky
					// ---------------------------------------------------------------------
					$nextp = envo_next_page($pageID, 'title', $envotable, 'id', ' AND catid = "' . smartsql($row["catid"]) . '"', '', 'active');
					if ($nextp) {

						if ($setting["downloadurl"]) {
							$seo = ENVO_base ::envoCleanurl($nextp['title']);
						}

						$ENVO_NAV_NEXT       = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_DOWNLOAD, 'f', $nextp['id'], $seo, '');
						$ENVO_NAV_NEXT_TITLE = addslashes($nextp['title']);
					}

					$prevp = envo_previous_page($pageID, 'title', $envotable, 'id', ' AND catid = "' . smartsql($row["catid"]) . '"', '', 'active');
					if ($prevp) {

						if ($setting["downloadurl"]) {
							$seop = ENVO_base ::envoCleanurl($prevp['title']);
						}

						$ENVO_NAV_PREV       = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_DOWNLOAD, 'f', $prevp['id'], $seop, '');
						$ENVO_NAV_PREV_TITLE = addslashes($prevp['title']);
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

				// Get Facebook SDK Connection
				$row = $envodb -> queryRow('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "facebookconnect"  LIMIT 1');

				// Get script for Facebook SDK
				$ENVO_FACEBOOK_SDK_CONNECTION = $row['value'];

				// EN: Get random image from folder for Facebook
				// CZ: Získání náhodného obrázku z adresáře pro Facebook
				// $fbarray  = envo_get_random_image(ENVO_FILES_DIRECTORY . '/facebook/');
				// $FB_IMAGE = BASE_URL . ltrim (envo_get_random_from_array($fbarray), '/');

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				// ---------------------------------------------------------------------
				$pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'downloadfile.php';
				$pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/download/downloadfile.php';

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
	case 'dl':
		// DOWNLOAD

		// EN: Default Variable
		// CZ: Hlavní proměnné
		$pageID = $page2;

		if ($_SESSION['envo_thisFileID'] == $pageID && is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

			// EN: Get the file from DB
			// CZ: Získání souboru z DB
			$row = $envodb -> queryRow('SELECT candownload, catid, file, extfile, active FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '" LIMIT 1');

			// Not active back to download
			if ($row['active'] != 1) envo_redirect($backtodl);

			if (!ENVO_DOWNLOADCAN) {
				/*
				 * EN: CHECK ACCESS to DOWNLOADS
				 * CZ: KONTROLA PŘÍSTUPU ke STAŽENÍ SOUBORU
				*/

				// EN: Create error message
				// CZ: Vytvoření chybové zprávy
				$_SESSION["errormsg"] = $tld["downl_frontend"]["downl9"];
				// EN: Redirect page with download file
				// CZ: Přesměrování stránky
				envo_redirect(str_replace('/dl/', '/f/', $_SERVER['REQUEST_URI']));

			} else {

				// No access to the file
				if ($row['candownload'] != 0 && !envo_get_access(ENVO_USERGROUPID, $row['candownload'])) envo_redirect($backtodl);

				$dluserid = 0;
				$dlemail  = "guest";
				if (ENVO_USERID) {
					$dluserid = ENVO_USERID;
					$dlemail  = $envouser -> getVar("email");
				}

				// EN: Write data to download history ( table 'DBPrefix_downloadhistory' in DB )
				// CZ: Zápis informací do historie stahování ( tabulka 'DBPrefix_downloadhistory' v DB ) - pokud je zadán soubor v sloupci 'file' tabulky 'download' má tento soubor přednost před zadaným souborem 'extfile'
				if (isset($row['file'])) {
					$file = smartsql($row['file']);
				} else {
					$file = smartsql($row['extfile']);
				}

				$envodb -> query('INSERT INTO ' . $envotable3 . ' VALUES (NULL, "' . $pageID . '", "' . smartsql($dluserid) . '", "' . smartsql($dlemail) . '", "' . $file . '", "' . smartsql($ipa) . '", NOW())');

				if (!empty($row['extfile'])) {
					/*
					 * EN: IF EXIST 'extfile' ( external file )
					 * CZ: POKUD EXTISTUJE SOUBOR 'extfile' ( external file )
					 */

					// EN: Update count download in DB
					// CZ: Update počet stažení v DB
					$envodb -> query('UPDATE ' . $envotable . ' SET countdl = countdl + 1 WHERE id = "' . smartsql($pageID) . '"');
					// EN: Redirect page with download file
					// CZ: Přesměrování stránky
					envo_redirect($row['extfile']);

				} else {
					/*
					 * EN: IF NOT EXIST 'extfile' and EXIST 'file'
					 * CZ: POKUD NEEXISTUJE 'extfile' a EXISTUJE SOUBOR 'file'
					 */

					// Specify file path
					$dlfile = $setting["downloadpath"] . '/' . $row['file'];
					$dlfile = str_replace("//", "/", $dlfile);

					if (file_exists($dlfile)) {

						/*
						* EN: IF FILE EXIST
						* CZ: POKUD STAHOVANÝ SOUBOR EXISTUJE
						*/

						if (!is_file($dlfile)) {
							header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
							echo 'File not found';
						} else if (!is_readable($dlfile)) {
							header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
							echo 'File not readable';
						} else {

							/*
								Do any processing you'd like here:
								1.  Increment a counter
								2.  Do something with the DB
								3.  Check user permissions
								4.  Anything you want!
							*/

							// required for IE
							//if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off'); }

							// get the file mime type using the file extension
							switch (strtolower(substr(strrchr($dlfile, '.'), 1))) {
								case 'pdf':
									$mime = 'application/pdf';
									break;
								case 'zip':
									$mime = 'application/zip';
									break;
								case 'jpeg':
								case 'jpg':
									$mime = 'image/jpg';
									break;
								default:
									$mime = 'application/force-download';
							}
							header('Pragma: ');   // required
							header('Expires: 0');   // no cache
							header('Cache-Control: ');
							header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($dlfile)) . ' GMT');
							header('Cache-Control: private', FALSE);
							header('Content-Type: application/force-download');
							header('Content-Disposition: attachment; filename="' . basename($dlfile) . '"');
							header('Content-Transfer-Encoding: binary');
							header('Content-Length: ' . filesize($dlfile));  // provide file size
							ob_clean();
							flush();
							readfile($dlfile);   // push it out
						}


					} else {
						/*
						 * EN: IF FILE NOT EXIST or IS BLANK
						 * CZ: POKUD STAHOVANÝ SOUBOR NEEXISTUJE nebo NENÍ ZADÁN
						 */

						// EN: Create error message
						// CZ: Vytvoření chybové zprávy
						$_SESSION["errormsg"] = $tld["downl_frontend"]["downl10"];
						// EN: Redirect page with download file
						// CZ: Přesměrování stránky
						envo_redirect(str_replace('/dl/', '/f/', $_SERVER['REQUEST_URI']));

					}

					// EN: Update count download in DB
					// CZ: Update počet stažení v DB
					$envodb -> query('UPDATE ' . $envotable . ' SET countdl = countdl + 1 WHERE id = "' . smartsql($pageID) . '"');

				}

			}

		} else {
			envo_redirect($backtodl);
		}

		break;
	default:
		// MAIN PAGE OF PLUGIN - LIST OF DOWNLOAD ARTICLE

		// ----------- ERROR: REDIRECT PAGE ------------
		// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

		// EN: If not exist value in 'case', redirect page to 404
		// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
		if (!empty($page1) && !is_numeric($page1)) {
			if ($page1 != 'category' || $page1 != 'f' || $page1 != 'dl') {
				envo_redirect(ENVO_rewrite ::envoParseurl('404'));
			}
		}

		// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
		// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

		// EN: Getting data from DB about the files for a selected category | Pagination
		// CZ: Získání dat z DB o souborech pro vybranou kategorii | Stránkování
		// ------------------------------------------------------------------------------
		// The total count of files in the category
		$getTotal = envo_get_total_permission_dl();

		if ($getTotal != 0) {
			// Paginator
			$dl                   = new ENVO_paginator;
			$dl -> items_total    = $getTotal;
			$dl -> mid_range      = $setting["downloadpagemid"];
			$dl -> items_per_page = $setting["downloadpageitem"];
			$dl -> envo_get_page  = $page1;
			$dl -> envo_where     = $backtodl;
			$dl -> envo_prevtext  = $tl["pagination"]["pagin"];
			$dl -> envo_nexttext  = $tl["pagination"]["pagin1"];
			$dl -> paginate();

			// Pagination
			$ENVO_PAGINATE = $dl -> display_pages();

			// EN: Getting data from DB about the all files
			// CZ: Získání dat z DB o všech souborech
			$ENVO_DOWNLOAD_ALL = envo_get_download($dl -> limit, $setting["downloadorder"], '', '', $setting["downloadurl"], $tl['global_text']['gtxt4']);

		}

		// EN: Getting data from DB for the grid of page
		// CZ: Získání dat z DB pro mřížku stránky
		// ---------------------------------------------------------------------
		$ENVO_HOOK_SIDE_GRID = FALSE;
		$grid                = $envodb -> query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = "' . smartsql(ENVO_PLUGIN_ID_DOWNLOAD) . '" AND fileid = 0 ORDER BY orderid ASC');
		while ($grow = $grid -> fetch_assoc()) {
			// EN: Insert each record into array
			// CZ: Vložení získaných dat do pole
			$ENVO_HOOK_SIDE_GRID[] = $grow;
		}

		// EN: Setting basic value - Title, Description, Keywords and other ...
		// CZ: Nastavení základních hodnot - Titulek, Popis, Klíčová slova a další ...
		// -----------------------------------------------------------------------------
		$PAGE_TITLE = $setting["downloadtitle"];
		// TODO! Vyřešit $MAIN_PLUGIN_DESCRIPTION a $MAIN_SITE_DESCRIPTION - přejmenovat
		$MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
		$MAIN_SITE_DESCRIPTION   = $setting['metadesc'];

		// EN: Add URL to session
		// CZ: Přidání URL do session
		// ---------------------------------------------------------------------
		$_SESSION['envo_lastURL'] = $backtodl;

		// EN: Creatting the new meta keywords and description maker
		// CZ: Vytvoření nových meta klíčových slov a popisovačů
		// ---------------------------------------------------------------------
		if (isset($ENVO_DOWNLOAD_ALL) && is_array($ENVO_DOWNLOAD_ALL)) {
			foreach ($ENVO_DOWNLOAD_ALL as $kv) {
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
		$ENVO_HEADER_CSS        = $setting["download_css"];
		$ENVO_FOOTER_JAVASCRIPT = $setting["download_javascript"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		// ---------------------------------------------------------------------
		$pluginbasic_template = $SHORT_PLUGIN_URL_TEMPLATE . 'download.php';
		$pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/download/download.php';

		if (file_exists($pluginsite_template)) {
			$plugin_template = $pluginsite_template;
		} else {
			$plugin_template = $pluginbasic_template;
		}
}

?>