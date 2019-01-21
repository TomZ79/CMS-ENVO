<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$envouser -> envoModuleAccess(ENVO_USERID, ENVO_ACCESSTAGS)) envo_redirect(BASE_URL);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'tags';
$envotable1 = DB_PREFIX . 'tagcloud';
$envotable2 = DB_PREFIX . 'pagesgrid';
$envotable3 = DB_PREFIX . 'pluginhooks';

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
	case 'cloud':
		// TAGS CLOUD

		switch ($page2) {
			case 'delete':

				if (envo_field_not_exist($page3, $envotable1, 'tag')) {

					$result  = $envodb -> query('DELETE FROM ' . $envotable1 . ' WHERE tag = "' . smartsql($page3) . '"');
					$result1 = $envodb -> query('DELETE FROM ' . $envotable . ' WHERE tag = "' . smartsql($page3) . '"');

					if (!$result || !$result1) {
						// EN: Redirect page
						// CZ: Přesměrování stránky s notifikací - chybné
						envo_redirect(BASE_URL . 'index.php?p=tags&sp=cloud&status=e');
					} else {
						// EN: Redirect page
						// CZ: Přesměrování stránky s notifikací - úspěšné
						/*
						NOTIFIKACE:
						'status=s'    - Záznam úspěšně uložen
						'status1=s1'  - Záznam úspěšně odstraněn
						*/
						envo_redirect(BASE_URL . 'index.php?p=tags&sp=cloud&status=s&status1=s1');
					}

				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=tags&sp=cloud&status=ene');
				}

				break;
			default:
				define('TAG_DELETE_CLOUD', $tl['tag_notification']['delall']);

				// Important template Stuff
				$ENVO_TAGCLOUD = envo_admin_tag_cloud();

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = $tl["tag_sec_title"]["tagt1"];
				$SECTION_DESC  = $tl["tag_sec_desc"]["tagd1"];

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$template = 'tagcloud.php';
		}

		break;
	case 'setting':
		// SETTINGS OF TAGS

		// EN: Import important settings for the template from the DB
		// CZ: Importuj důležité nastavení pro šablonu z DB
		$ENVO_SETTING = envo_get_setting('tags');

		// EN: Import important settings for the template from the DB (only VALUE)
		// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
		$ENVO_SETTING_VAL = envo_get_setting_val('tags');

		// Let's go on with the script
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// EN: Default Variable
			// CZ: Hlavní proměnné
			$defaults = $_POST;

			if (!is_numeric($defaults['envo_limit'])) {
				$errors['e1'] = $tl['general_error']['generror27'] . '<br>';
			}

			if (!is_numeric($defaults['envo_min'])) {
				$errors['e2'] = $tl['general_error']['generror27'] . '<br>';
			}

			if (!is_numeric($defaults['envo_max'])) {
				$errors['e3'] = $tl['general_error']['generror27'] . '<br>';
			}

			if (count($errors) == 0) {

				/* EN: Convert value
				 * smartsql - secure method to insert form data into a MySQL DB
				 * ------------------
				 * CZ: Převod hodnot
				 * smartsql - secure method to insert form data into a MySQL DB
				*/
				$result = $envodb -> query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
                    WHEN "tagtitle" THEN "' . smartsql($defaults['envo_title']) . '"
                    WHEN "tagdesc" THEN "' . smartsql($defaults['envo_lcontent']) . '"
                    WHEN "taglimit" THEN "' . smartsql($defaults['envo_limit']) . '"
                    WHEN "tagminfont" THEN "' . smartsql($defaults['envo_min']) . '"
                    WHEN "tagmaxfont" THEN "' . smartsql($defaults['envo_max']) . '"
                  END
                  WHERE varname IN ("tagtitle", "tagdesc", "taglimit", "tagminfont", "tagmaxfont")');

				// Save order for sidebar widget
				if (isset($defaults['envo_hookshow_new']) && is_array($defaults['envo_hookshow_new'])) {

					$exorder = $defaults['horder_new'];
					$hookid  = $defaults['real_hook_id_new'];
					$plugind = $defaults['sreal_plugin_id_new'];
					$doith   = array_combine($hookid, $exorder);
					$pdoith  = array_combine($hookid, $plugind);

					foreach ($doith as $key => $exorder) {

						if (in_array($key, $defaults['envo_hookshow_new'])) {

							// Get the real what id
							$whatid = 0;
							if (isset($defaults['whatid_' . $pdoith[$key]])) $whatid = $defaults['whatid_' . $pdoith[$key]];

							$envodb -> query('INSERT INTO ' . $envotable2 . ' SET plugin = 3, hookid = "' . smartsql($key) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", orderid = "' . smartsql($exorder) . '"');

						}

					}

				}

				// Now check if all the sidebar a deselct and hooks exist, if so delete all associated to this page
				if (!isset($defaults['envo_hookshow_new']) && !isset($defaults['envo_hookshow'])) {

					// Now check if all the sidebar a deselected and hooks exist, if so delete all associated to this page
					$row = $envodb -> queryRow('SELECT id FROM ' . $envotable2 . ' WHERE plugin = 3 AND hookid != 0');

					// We have something to delete
					if ($row["id"]) {
						$envodb -> query('DELETE FROM ' . $envotable2 . ' WHERE plugin = 3 AND hookid != 0');
					}

				}

				// Save order or delete for extra sidebar widget
				if (isset($defaults['envo_hookshow']) && is_array($defaults['envo_hookshow'])) {

					$exorder    = $defaults['horder'];
					$hookid     = $defaults['real_hook_id'];
					$hookrealid = implode(',', $defaults['real_hook_id']);
					$doith      = array_combine($hookid, $exorder);

					// Reset update
					$updatesql = $updatesql1 = "";

					// Run the foreach for the hooks
					foreach ($doith as $key => $exorder) {

						// Get the real what id
						$result = $envodb -> query('SELECT pluginid FROM ' . $envotable2 . ' WHERE id = "' . smartsql($key) . '" AND hookid != 0');
						$row    = $result -> fetch_assoc();

						// Get the whatid
						$whatid = 0;
						if (isset($defaults['whatid_' . $row["pluginid"]])) $whatid = $defaults['whatid_' . $row["pluginid"]];

						if (in_array($key, $defaults['envo_hookshow'])) {
							$updatesql  .= sprintf("WHEN %d THEN %d ", $key, $exorder);
							$updatesql1 .= sprintf("WHEN %d THEN %d ", $key, $whatid);

						} else {
							$envodb -> query('DELETE FROM ' . $envotable2 . ' WHERE id = "' . smartsql($key) . '"');
						}
					}

					$envodb -> query('UPDATE ' . $envotable2 . ' SET orderid = CASE id
					' . $updatesql . '
					END
					WHERE id IN (' . $hookrealid . ')');

					$envodb -> query('UPDATE ' . $envotable2 . ' SET whatid = CASE id
					' . $updatesql1 . '
					END
					WHERE id IN (' . $hookrealid . ')');

				}

				if (!$result) {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=tags&sp=setting&status=e');
				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=tags&sp=setting&status=s');
				}
			} else {

				$errors['e'] = $tl['general_error']['generror'] . '<br>';
				$errors      = $errors;
			}
		}

		// EN: Getting data from DB for the grid of page
		// CZ: Získání dat z DB pro mřížku stránky
		$grid = $envodb -> query('SELECT id, hookid, whatid, orderid FROM ' . $envotable2 . ' WHERE plugin = 3 ORDER BY orderid ASC');
		while ($grow = $grid -> fetch_assoc()) {
			// EN: Insert each record into array
			// CZ: Vložení získaných dat do pole
			$ENVO_PAGE_GRID[] = $grow;
		}

		// Get the sidebar templates
		$result = $envodb -> query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable3 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
		while ($row = $result -> fetch_assoc()) {
			$ENVO_HOOKS[] = $row;
		}

		// EN: Get all the php Hook by name of Hook
		// CZ: Načtení všech php dat z Hook podle jména Hook
		$ENVO_FORM_DATA = array ();
		$hookpagei      = $envohooks -> EnvoGethook("php_admin_pages_news_info");
		if ($hookpagei) {
			foreach ($hookpagei as $hpagi) {
				eval($hpagi['phpcode']);
			}
		}

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = $tl["tag_sec_title"]["tagt2"];
		$SECTION_DESC  = $tl["tag_sec_desc"]["tagd2"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$template = 'tagsetting.php';

		break;
	default:
		// LIST OF TAGS

		// Let's go on with the script
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envo_delete_tag'])) {
			// EN: Default Variable
			// CZ: Hlavní proměnné
			$defaults = $_POST;

			if (isset($defaults['delete'])) {

				$deletetags = $defaults['envo_delete_tag'];

				for ($i = 0; $i < count($deletetags); $i++) {
					$tag = $deletetags[$i];
					ENVO_tags ::envoDeleteOneTag($tag);
				}

				// EN: Redirect page
				// CZ: Přesměrování stránky s notifikací - úspěšné
				/*
				NOTIFIKACE:
				'status=s'   - Záznam úspěšně uložen
				'status1=s1'  - Záznam úspěšně odstraněn
				*/
				envo_redirect(BASE_URL . 'index.php?p=tags&status=s&status1=s1');

			}
		}

		switch ($page1) {
			case 'lock':
				// LIST OF TAGS - LOCK TAG IN DB

				if (is_numeric($page2)) {

					ENVO_tags ::envoLockTag($page2);

					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=tags&status=s');

				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=tags&status=ene');
				}

				break;
			case 'delete':
				// LIST OF TAGS - DELETE TAG FROM DB

				if (envo_row_exist($page2, $envotable)) {

					ENVO_tags ::envoDeleteOneTag($page2);

					// EN: Redirect page
					// CZ: Přesměrování stránky s notifikací - úspěšné
					/*
					NOTIFIKACE:
					'status=s'   - Záznam úspěšně uložen
					'status1=s'  - Záznam úspěšně odstraněn
					*/
					envo_redirect(BASE_URL . 'index.php?p=tags&status=s&status=s');

				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=tags&status=ene');
				}
				break;
			default:
				// LIST OF TAGS

				// Important template Stuff
				$getTotal = envo_get_total($envotable, '', '', '');
				// Paginator
				if ($getTotal != 0) {
					$tags                   = new ENVO_paginator;
					$tags -> items_total    = $getTotal;
					$tags -> mid_range      = $setting["adminpagemid"];
					$tags -> items_per_page = $setting["adminpageitem"];
					$tags -> envo_get_page  = $page1;
					$tags -> envo_where     = 'index.php?p=tags';
					$tags -> paginate();
					$ENVO_PAGINATE = $tags -> display_pages();

					$ENVO_TAG_ALL = envo_get_tag($tags -> limit, FALSE, $envoplugins -> envoAdminTag(), FALSE);
				}

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = $tl["tag_sec_title"]["tagt"];
				$SECTION_DESC  = $tl["tag_sec_desc"]["tagd"];

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$template = 'tag.php';
		}
}
?>