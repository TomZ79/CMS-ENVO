<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$envouser -> envoModuleAccess(ENVO_USERID, $setting["accessmanage"])) envo_redirect(BASE_URL);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/xml_seo/admin/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/xml_seo/admin/template/';

// Get the xmlseo path and time from db
$result = $envodb -> query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "xmlseopath"');
$row    = $result -> fetch_assoc();

$XMLSEOPATH = $row['value'];

$result = $envodb -> query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "xmlseodate"');
$row    = $result -> fetch_assoc();

// Check if sitemap was creating by including time in db
if (!empty($row['value'])) {
	$XMLSEODATE = $row['value'];
	$XMLSEODATE = date("d-m-Y H:i:s", strtotime($XMLSEODATE));
} else {
	$XMLSEODATE = $tlxml["xml_error"]["xmler"];
}

// EN: Require the functions
// CZ: Požadované funkce
require_once('class/xml.sitemap.generator.php');

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
	case 'create':
		// CREATE NEW 'sitemap.xml'

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Create sitemap

			// EN: Default Variable
			// CZ: Hlavní proměnné
			$defaults = $_POST;

			// Create sitemap for pages
			//  - pageid !=0 means that page wasn't created
			//  - pluginid > 0 means that page is for plugins
			//  - permission < 2 means that pages hasn't member or administrator access
			//  - id != 1 means that pages isn't 'Home'
			//  - pluginid != 1 means that page isn't 'News'
			$result = $envodb -> query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE (pageid != 0 OR pluginid > 0) AND (permission < 2) AND (id != 1) AND (pluginid != 1)');
			$row    = $result -> fetch_assoc();

			/* =====================================================
			 *  BASIC URL
			 * ===================================================== */
			$entries[] = new xml_sitemap_entry('/', '1.0', $FREQUENCYPAGES);
			// Other pages
			while ($row = $result -> fetch_assoc()) {

				$parseurl = ENVO_rewrite ::envoParseurl($row['varname'], '', '', '', '');

				// EN: Insert each record into array
				// CZ: Vložení získaných dat do pole
				$entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', $FREQUENCYPAGES);
			}

			/* =====================================================
			 *  BASIC URL FOR NEWS
			 * ===================================================== */
			$result1      = $envodb -> query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = 1');
			$row1         = $result1 -> fetch_assoc();
			$result2      = $envodb -> query('SELECT id, title FROM ' . DB_PREFIX . 'news WHERE active = 1');
			$row2         = $result2 -> fetch_assoc();
			$num_results1 = $result1 -> num_rows;
			$num_results2 = $result2 -> num_rows;

			if ($num_results1 !== 0 && $num_results2 !== 0) {
				$parseurl = ENVO_rewrite ::envoParseurl($row1['varname'], '', '', '', '');
				// EN: Insert each record into array
				// CZ: Vložení získaných dat do pole
				$entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', 'weekly');
			}

			/* =====================================================
			 *  SITEMAP FOR NEWS
			 * ===================================================== */
			$result = $envodb -> query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = 1');
			$row    = $result -> fetch_assoc();

			$result1 = $envodb -> query('SELECT id, title FROM ' . DB_PREFIX . 'news WHERE active = 1');

			while ($row1 = $result1 -> fetch_assoc()) {
				$parseurl = ENVO_rewrite ::envoParseurl($row['varname'], 'news-article', $row1['id'], ENVO_base ::envoCleanurl($row1['title']), '');
				// EN: Insert each record into array
				// CZ: Vložení získaných dat do pole
				$entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', 'weekly');
			}

			/* =====================================================
			 *  SITEMAP FOR TAGS
			 * ===================================================== */
			$result = $envodb -> query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = 3');
			$row    = $result -> fetch_assoc();

			$result1 = $envodb -> query('SELECT tag FROM ' . DB_PREFIX . 'tags WHERE active = 1 GROUP BY tag');

			while ($row1 = $result1 -> fetch_assoc()) {
				$parseurl = ENVO_rewrite ::envoParseurl($row['varname'], $row1['tag'], '', '', '');
				// EN: Insert each record into array
				// CZ: Vložení získaných dat do pole
				$entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', 'weekly');
			}

			/* =====================================================
			 *  SITEMAP FOR DOWNLOAD
			 * ===================================================== */
			$results = $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Download"');
			$rows    = $results -> fetch_assoc();

			if ($rows) {

				$result = $envodb -> query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = ' . $rows['id']);
				$row    = $result -> fetch_assoc();

				$result1 = $envodb -> query('SELECT id, title FROM ' . DB_PREFIX . 'download WHERE active = 1 && catid != 0');

				while ($row1 = $result1 -> fetch_assoc()) {
					if ($setting["downloadurl"]) {
						$seo = ENVO_base ::envoCleanurl($row1['title']);
					}
					$parseurl = ENVO_rewrite ::envoParseurl($row['varname'], 'f', $row1['id'], $seo, '', '');
					// EN: Insert each record into array
					// CZ: Vložení získaných dat do pole
					$entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', $FREQUENCYDOWNLOAD);
				}

				$ENVO_DOWNLOAD_CAT = ENVO_base ::envoGetcatmix($row['varname'], '', DB_PREFIX . 'downloadcategories', 0, $setting["downloadurl"]);

				if (isset($ENVO_DOWNLOAD_CAT) && is_array($ENVO_DOWNLOAD_CAT)) foreach ($ENVO_DOWNLOAD_CAT as $c) {
					$entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($c["parseurl"])), '1.0', 'monthly');
				}
			}

			/* =====================================================
			 *  SITEMAP FOR FAQ
			 * ===================================================== */
			$results = $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "FAQ"');
			$rows    = $results -> fetch_assoc();

			if ($rows) {

				$result = $envodb -> query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = ' . $rows['id']);
				$row    = $result -> fetch_assoc();

				$result1 = $envodb -> query('SELECT id, title FROM ' . DB_PREFIX . 'faq WHERE active = 1 && catid != 0');

				while ($row1 = $result1 -> fetch_assoc()) {
					if ($setting["faqurl"]) {
						$seo = ENVO_base ::envoCleanurl($row1['title']);
					}
					$parseurl = ENVO_rewrite ::envoParseurl($row['varname'], 'faq-article', $row1['id'], $seo, '', '');
					// EN: Insert each record into array
					// CZ: Vložení získaných dat do pole
					$entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', 'weekly');
				}
				$ENVO_FAQ_CAT = ENVO_base ::envoGetcatmix($row['varname'], '', DB_PREFIX . 'faqcategories', 0, $setting["faqurl"]);

				if (isset($ENVO_FAQ_CAT) && is_array($ENVO_FAQ_CAT)) foreach ($ENVO_FAQ_CAT as $c) {
					$entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($c["parseurl"])), '1.0', 'monthly');
				}
			}

			/* =====================================================
			 *  SITEMAP FOR BLOG
			 * ===================================================== */
			$results = $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Blog"');
			$rows    = $results -> fetch_assoc();

			if ($rows) {

				$result = $envodb -> query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = ' . $rows['id']);
				$row    = $result -> fetch_assoc();

				$result1 = $envodb -> query('SELECT id, title FROM ' . DB_PREFIX . 'blog WHERE active = 1 && catid != 0');

				while ($row1 = $result1 -> fetch_assoc()) {
					if ($setting["blogurl"]) {
						$seo = ENVO_base ::envoCleanurl($row1['title']);
					}
					$parseurl = ENVO_rewrite ::envoParseurl($row['varname'], 'blog-article', $row1['id'], $seo, '', '');

					// EN: Insert each record into array
					// CZ: Vložení získaných dat do pole
					$entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', $FREQUENCYBLOG);
				}

				$ENVO_BLOG_CAT = ENVO_base ::envoGetcatmix($row['varname'], '', DB_PREFIX . 'blogcategories', 0, $setting["blogurl"]);
				if (isset($ENVO_BLOG_CAT) && is_array($ENVO_BLOG_CAT)) foreach ($ENVO_BLOG_CAT as $c) {
					$entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($c["parseurl"])), '1.0', 'monthly');
				}
			}

			/* =====================================================
			 *  SITEMAP FOR WIKI
			 * ===================================================== */
			$results = $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "WIKI"');
			$rows    = $results -> fetch_assoc();

			if ($rows) {

				$result = $envodb -> query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = ' . $rows['id']);
				$row    = $result -> fetch_assoc();

				$result1 = $envodb -> query('SELECT id, title FROM ' . DB_PREFIX . 'wiki WHERE active = 1 && catid != 0');

				while ($row1 = $result1 -> fetch_assoc()) {
					if ($setting["wikiurl"]) {
						$seo = ENVO_base ::envoCleanurl($row1['title']);
					}
					$parseurl = ENVO_rewrite ::envoParseurl($row['varname'], 'wiki-article', $row1['id'], $seo, '', '');
					// EN: Insert each record into array
					// CZ: Vložení získaných dat do pole
					$entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', 'weekly');
				}
				$ENVO_WIKI_CAT = ENVO_base ::envoGetcatmix($row['varname'], '', DB_PREFIX . 'wikicategories', 0, $setting["wikiurl"]);

				if (isset($ENVO_WIKI_CAT) && is_array($ENVO_WIKI_CAT)) foreach ($ENVO_WIKI_CAT as $c) {
					$entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($c["parseurl"])), '1.0', 'monthly');
				}
			}

			if ($setting["sitehttps"]) {
				$newURL = str_replace("https://", "", (ENVO_USE_APACHE ? substr(BASE_URL_ORIG, 0, -1) : BASE_URL_ORIG));
			} else {
				$newURL = str_replace("http://", "", (ENVO_USE_APACHE ? substr(BASE_URL_ORIG, 0, -1) : BASE_URL_ORIG));
			}

			$conf = new xml_sitemap_generator_config;
			$conf -> setDomain($newURL);
			$conf -> setPath(APP_PATH . $XMLSEOPATH);
			$conf -> setFilename('sitemap.xml');
			$conf -> setEntries($entries);

			$generator = new xml_sitemap_generator($conf);

			$xml_result = $generator -> write();

			// Do the dirty work in mysql
			$result = $envodb -> query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
                  WHEN "xmlseodate" THEN NOW()
                END
                WHERE varname IN ("xmlseodate")');

			$error = $error;
		}

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = $tlxml["xml_sec_title"]["xmlt1"];
		$SECTION_DESC  = $tlxml["xml_sec_desc"]["xmld1"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'xmlseo_create.php';

		break;
	case 'view':
		// VIEW 'sitemap.xml'

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// EN: Default Variable
			// CZ: Hlavní proměnné
			$defaults = $_POST;

			// Show/Hide Sitemap.xml
			if (isset($defaults['submit_one'])) {
				// Content of file
				$filexml = APP_PATH . $XMLSEOPATH . "sitemap.xml";
				if (file_exists($filexml)) {
					// File exist, get content
					$contentxml = file_get_contents($filexml);
				} else {
					// File not exist
					$contentxml = $tlxml["xml_box_content"]["xmlbc25"];
				}
			} else if (isset($defaults['submit_two'])) {

			} else {
				die("Invalid submission");
			}
		}

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = $tlxml["xml_sec_title"]["xmlt2"];
		$SECTION_DESC  = $tlxml["xml_sec_desc"]["xmld2"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'xmlseo_view.php';

		break;
	default:
		// MAIN PAGE OF PLUGIN - XML SEO SETTING

		// ----------- ERROR: REDIRECT PAGE ------------
		// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

		// EN: If not exist value in 'case', redirect page to 404
		// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
		$pagearray = array ('create', 'view');
		if (!empty($page1) && !is_numeric($page1)) {
			if (in_array($page1, $pagearray)) {
				envo_redirect(ENVO_rewrite ::envoParseurl('admin', 'index.php?p=404'));
			}
		}

		// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
		// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			// EN: Default Variable
			// CZ: Hlavní proměnné
			$defaults = $_POST;

			// EN: Get value from 'form'
			// CZ: Získání hodnoty z 'form'
			$path    = $defaults['envo_xmlseopath'];
			$txtfile = $defaults['envo_filetxt'];

			// Folder settings - Check if last character is '/'
			if (!empty($defaults['envo_xmlseopath'])) {
				$path = rtrim($path, '/') . '/';
			}

			// Check if directory is valid and save setting to db and file
			if (!is_dir(APP_PATH . $path)) {
				$error1 = $tlxml["xml_error"]["xmler1"] . ' ' . BASE_URL_ORIG . $path;
			} else if (!is_writable(APP_PATH . $path)) {
				$error2 = $tlxml["xml_error"]["xmler2"] . ' ' . BASE_URL_ORIG . $path;
			} else {
				$succes1 = str_replace("%s", BASE_URL_ORIG . $path, $tlxml["xml_error"]["xmler3"]);
				// Create backup file
				$file    = APP_PATH . "robots.txt";
				$newfile = APP_PATH . "robots.txt.backup";
				copy($file, $newfile);
				// Write to Robots.txt
				$content = stripslashes($txtfile);
				file_put_contents($file, $content);

				/* EN: Convert value
				 * smartsql - secure method to insert form data into a MySQL DB
				 * ------------------
				 * CZ: Převod hodnot
				 * smartsql - secure method to insert form data into a MySQL DB
				*/
				$result = $envodb -> query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
                    WHEN "xmlseopath" THEN "' . smartsql($path) . '"
                    WHEN "frequency_pages" THEN "' . smartsql($defaults['envo_frepages']) . '"
                    WHEN "frequency_blog" THEN "' . smartsql($defaults['envo_freblog']) . '"
                    WHEN "frequency_download" THEN "' . smartsql($defaults['envo_fredownload']) . '"
                  END
                  WHERE varname IN ("xmlseopath","frequency_pages","frequency_blog","frequency_download")');

				// Set new path and frequency change
				$XMLSEOPATH        = $path;
				$FREQUENCYPAGES    = $defaults['envo_frepages'];
				$FREQUENCYBLOG     = $defaults['envo_freblog'];
				$FREQUENCYDOWNLOAD = $defaults['envo_fredownload'];

			}
		}

		// Get the data - Change Frequency Pages
		$result = $envodb -> query('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE (varname = "frequency_pages")');
		$row    = $result -> fetch_assoc();

		$FREQUENCYPAGES = $row['value'];

		// Get the data - Change Frequency Blog
		$result = $envodb -> query('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE (varname = "frequency_blog")');
		$row    = $result -> fetch_assoc();

		$FREQUENCYBLOG = $row['value'];

		// Get the data - Change Frequency Download
		$result = $envodb -> query('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE (varname = "frequency_download")');
		$row    = $result -> fetch_assoc();

		$FREQUENCYDOWNLOAD = $row['value'];

		// Get the xmlseo path and time from db
		$result = $envodb -> query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "xmlseopath"');
		$row    = $result -> fetch_assoc();

		$XMLSEOPATH = $row['value'];

		$result = $envodb -> query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "xmlseodate"');
		$row    = $result -> fetch_assoc();

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = $tlxml["xml_sec_title"]["xmlt"];
		$SECTION_DESC  = $tlxml["xml_sec_desc"]["xmld"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'xmlseo_setting.php';
}

?>