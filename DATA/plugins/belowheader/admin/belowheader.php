<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$envouser -> envoModuleAccess(ENVO_USERID, ENVO_ACCESS_BELOWHEADER)) envo_redirect(BASE_URL);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/belowheader/admin/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/belowheader/admin/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'belowheader';
$envotable1 = DB_PREFIX . 'pages';
$envotable2 = DB_PREFIX . 'news';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../plugins/belowheader/admin/include/functions.php");

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
	case 'newbh':
		// ADD NEW BELOWHEADER

		// EN: POST REQUEST
		// CZ: POST REQUEST
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// EN: Default Variable
			// CZ: Hlavní proměnné
			$defaults = $_POST;

			if (empty($defaults['envo_title'])) {
				$errors['e1'] = $tl['general_error']['generror18'] . '<br>';
			}

			if (count($errors) == 0) {

				if (!isset($defaults['envo_permission'])) {
					$permission = 0;
				} elseif (in_array(0, $defaults['envo_permission'])) {
					$permission = 0;
				} else {
					$permission = join(',', $defaults['envo_permission']);
				}

				if (!isset($defaults['envo_pageid'])) {
					$pageid = 0;
				} elseif (in_array(0, $defaults['envo_pageid'])) {
					$pageid = 0;
				} else {
					$pageid = join(',', $defaults['envo_pageid']);
				}

				if (!isset($defaults['envo_newsid'])) {
					$newsid = 0;
				} elseif (in_array(0, $defaults['envo_newsid'])) {
					$newsid = 0;
				} else {
					$newsid = join(',', $defaults['envo_newsid']);
				}

				// Do the dirty work in mysql
				$result = $envodb -> query('INSERT INTO ' . $envotable . ' SET
                  allpage = "' . smartsql($defaults['envo_allpage']) . '",
                  pageid = "' . smartsql($pageid) . '",
                  newsid = "' . smartsql($newsid) . '",
                  newsmain = "' . smartsql($defaults['envo_mainnews']) . '",
                  tags = "' . smartsql($defaults['envo_tags']) . '",
                  search = "' . smartsql($defaults['envo_search']) . '",
                  sitemap = "' . smartsql($defaults['envo_sitemap']) . '",
                  title = "' . smartsql($defaults['envo_title']) . '",
                  content_before = "' . smartsql($defaults['envo_content']) . '",
                  content_after = "' . smartsql($defaults['envo_contentb']) . '",
                  permission = "' . smartsql($permission) . '",
                  time = NOW()');

				$rowid = $envodb -> envo_last_id();

				if (!$result) {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=belowheader&sp=newbh&status=e');
				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=belowheader&sp=edit&id=' . $rowid . '&status=s');
				}
			} else {

				$errors['e'] = $tl['general_error']['generror'] . '<br>';
				$errors      = $errors;
			}
		}

		// Get all usergroup's
		$ENVO_USERGROUP = envo_get_usergroup_all('usergroup');

		// Pages and News
		$ENVO_PAGES = envo_get_page_info($envotable1, '');
		$ENVO_NEWS  = envo_get_page_info($envotable2, '');

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = $tlbh["bh_sec_title"]["bht1"];
		$SECTION_DESC  = $tlbh["bh_sec_desc"]["bhd1"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'bh_new.php';

		break;
	case 'edit':
		// EDIT BELOWHEADER

		// EN: POST REQUEST
		// CZ: POST REQUEST
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// EN: Default Variable
			// CZ: Hlavní proměnné
			$defaults = $_POST;

			if (empty($defaults['envo_title'])) {
				$errors['e1'] = $tl['general_error']['generror18'] . '<br>';
			}

			if (count($errors) == 0) {

				if (!isset($defaults['envo_permission'])) {
					$permission = 0;
				} elseif (in_array(0, $defaults['envo_permission'])) {
					$permission = 0;
				} else {
					$permission = join(',', $defaults['envo_permission']);
				}

				if (!isset($defaults['envo_pageid'])) {
					$pageid = 0;
				} elseif (in_array(0, $defaults['envo_pageid'])) {
					$pageid = 0;
				} else {
					$pageid = join(',', $defaults['envo_pageid']);
				}

				if (!isset($defaults['envo_newsid'])) {
					$newsid = 0;
				} elseif (in_array(0, $defaults['envo_newsid'])) {
					$newsid = 0;
				} else {
					$newsid = join(',', $defaults['envo_newsid']);
				}

				/* EN: Convert value
				 * smartsql - secure method to insert form data into a MySQL DB
				 * ------------------
				 * CZ: Převod hodnot
				 * smartsql - secure method to insert form data into a MySQL DB
				*/
				$result = $envodb -> query('UPDATE ' . $envotable . ' SET
                      allpage = "' . smartsql($defaults['envo_allpage']) . '",
                      pageid = "' . smartsql($pageid) . '",
                      newsid = "' . smartsql($newsid) . '",
                      newsmain = "' . smartsql($defaults['envo_mainnews']) . '",
                      tags = "' . smartsql($defaults['envo_tags']) . '",
                      search = "' . smartsql($defaults['envo_search']) . '",
                      sitemap = "' . smartsql($defaults['envo_sitemap']) . '",
                      title = "' . smartsql($defaults['envo_title']) . '",
                      content_before = "' . smartsql($defaults['envo_content']) . '",
                      content_after = "' . smartsql($defaults['envo_contentb']) . '",
                      permission = "' . smartsql($permission) . '",
                      time = NOW() WHERE id = "' . smartsql($page2) . '"');

				if (!$result) {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=belowheader&sp=edit&id=' . $page2 . '&status=e');
				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=belowheader&sp=edit&id=' . $page2 . '&status=s');
				}
			} else {
				$errors['e'] = $tl['general_error']['generror'] . '<br>';
				$errors      = $errors;
			}
		}

		// Get all usergroup's
		$ENVO_USERGROUP = envo_get_usergroup_all('usergroup');

		// Pages and News
		$ENVO_PAGES = envo_get_page_info($envotable1, '');
		$ENVO_NEWS  = envo_get_page_info($envotable2, '');

		// Get the data
		$ENVO_FORM_DATA = envo_get_data($page2, $envotable);

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = $tlbh["bh_sec_title"]["bht2"];
		$SECTION_DESC  = $tlbh["bh_sec_desc"]["bhd2"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'bh_edit.php';

		break;
	case 'lock':
		// LOCK BELOWHEADER

		$result = $envodb -> query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = ' . smartsql($page2));

		if (!$result) {
			// EN: Redirect page
			// CZ: Přesměrování stránky
			envo_redirect(BASE_URL . 'index.php?p=belowheader&status=e');
		} else {
			// EN: Redirect page
			// CZ: Přesměrování stránky
			envo_redirect(BASE_URL . 'index.php?p=belowheader&status=s');
		}

		break;
	case 'delete':
		// DELETE BELOWHEADER

		// EN: Default Variable
		// CZ: Hlavní proměnné
		$pageID = $page2;

		if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

			// Delete the Content
			$result = $envodb -> query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '"');

			if (!$result) {
				// EN: Redirect page
				// CZ: Přesměrování stránky s notifikací - chybné
				envo_redirect(BASE_URL . 'index.php?p=belowheader&status=e');
			} else {
				// EN: Redirect page
				// CZ: Přesměrování stránky s notifikací - úspěšné
				/*
				NOTIFIKACE:
				'status=s'    - Záznam úspěšně uložen
				'status1=s1'  - Záznam úspěšně odstraněn
				*/
				envo_redirect(BASE_URL . 'index.php?p=belowheader&status=s&status1=s1');
			}

		} else {
			// EN: Redirect page
			// CZ: Přesměrování stránky
			envo_redirect(BASE_URL . 'index.php?p=belowheader&status=ene');
		}
		break;
	default:
		// MAIN PAGE OF PLUGIN - LIST OF BELOWHEADER ARTICLE

		// ----------- ERROR: REDIRECT PAGE ------------
		// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

		// EN: If not exist value in 'case', redirect page to 404
		// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
		$pagearray = array ('newbh', 'edit', 'lock', 'delete');
		if (!empty($page1) && !is_numeric($page1)) {
			if (in_array($page1, $pagearray)) {
				envo_redirect(ENVO_rewrite ::envoParseurl('admin', 'index.php?p=404'));
			}
		}

		// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
		// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

		// EN: POST REQUEST
		// CZ: POST REQUEST
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envo_delete_belowheader'])) {
			// EN: Default Variable
			// CZ: Hlavní proměnné
			$defaults = $_POST;

			if (isset($defaults['delete'])) {

				$deleteuser = $defaults['envo_delete_belowheader'];

				for ($i = 0; $i < count($deleteuser); $i++) {
					$deleted = $deleteuser[$i];

					$result = $envodb -> query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($deleted) . '"');
				}

				if (!$result) {
					// EN: Redirect page
					// CZ: Přesměrování stránky s notifikací - chybné
					envo_redirect(BASE_URL . 'index.php?p=belowheader&status=e');
				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky s notifikací - úspěšné
					/*
					NOTIFIKACE:
					'status=s'    - Záznam úspěšně uložen
					'status1=s1'  - Záznam úspěšně odstraněn
					*/
					envo_redirect(BASE_URL . 'index.php?p=belowheader&status=s&status1=s1');
				}

			}

			if (isset($defaults['lock'])) {

				$lockuser = $defaults['envo_delete_belowheader'];

				for ($i = 0; $i < count($lockuser); $i++) {
					$locked = $lockuser[$i];

					// Delete the pics associated with the Nivo Slider
					$result = $envodb -> query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($locked) . '"');
				}

				if (!$result) {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=belowheader&status=e');
				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=belowheader&status=s');
				}

			}

		}

		// EN: Check data
		// CZ: Kontrola dat
		$getTotal = envo_get_total($envotable, '', '', '');

		if ($getTotal != 0) {

			// EN: Get all data from DB
			// CZ: Získání všech dat z DB
			$ENVO_BELOWHEADER_ALL = envo_get_belowheader('', $envotable);

			// EN: Title and Description
			// CZ: Titulek a Popis
			$SECTION_TITLE = $tlbh["bh_sec_title"]["bht"];
			$SECTION_DESC  = $tlbh["bh_sec_desc"]["bhd"];

			// EN: Load the php template
			// CZ: Načtení php template (šablony)
			$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'bh.php';

		} else {
			// EN: Redirect page
			// CZ: Přesměrování stránky
			envo_redirect(BASE_URL . 'index.php?p=belowheader&status=ene');
		}


}

?>