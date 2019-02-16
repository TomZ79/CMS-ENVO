<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

$CHECK_USR_SESSION = session_id();

// -------- DATA FOR ALL FRONTEND PAGES --------
// -------- DATA PRO VŠECHNY FRONTEND STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/intranet2/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/intranet2/template/';

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$ENVO_SETTING_VAL = envo_get_setting_val('intranet2');

// EN: Set data for the frontend page - Title, Description, Keywords and other ...
// CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
$PAGE_TITLE = $setting["int2title"];

// Parse links once if needed a lot of time
$backtoplugin = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2);

// EN: If the user is logged in, get username and usergroup name
// CZ: Pokud je uživatel přihlášen, získej uživatelské jméno a jméno uživatelské skupiny
if (ENVO_USERID) {

	// Get the user name
	$ENVO_USER_NAME = $envouser -> getVar('name');
	// Get the user avatar
	$ENVO_USER_AVATAR = $envouser -> getVar('picture');
	// Get the user group name
	$result          = $envodb -> query('SELECT name FROM ' . DB_PREFIX . 'usergroup WHERE id="' . $envouser -> getVar("usergroupid") . '"');
	$row             = $result -> fetch_assoc();
	$ENVO_USER_GROUP = $row['name'];

}

// EN: Include the functions
// CZ: Vložené funkce
include_once('functions.php');

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable   = DB_PREFIX . 'int2_house';
$envotable2  = DB_PREFIX . 'int2_houseent';
$envotable3  = DB_PREFIX . 'int2_housetasks';
$envotable4  = DB_PREFIX . 'int2_houseserv';
$envotable5  = DB_PREFIX . 'int2_housedocu';
$envotable6  = DB_PREFIX . 'int2_houseimg';
$envotable7  = DB_PREFIX . 'int2_housevideo';
$envotable10 = DB_PREFIX . 'int2_housenotifications';
$envotable11 = DB_PREFIX . 'int2_housenotificationug';
$envotable12 = DB_PREFIX . 'int2_settings_city';
$envotable13 = DB_PREFIX . 'int2_settings_estatemanagement';

// EN: Info about notifications
// CZ: Info o notifikacích
$ENVO_NOTIFICATION = envo_get_notification_unread(ENVO_USERGROUPID, FALSE, $ENVO_SETTING_VAL['int2dateformat'], $ENVO_SETTING_VAL['int2timeformat']);

// -------- DATA FOR SELECTED FRONTEND PAGES --------
// -------- DATA PRO VYBRANÉ FRONTEND STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
	case '404':
		// CUSTOM ERROR PAGE FOR PLUGIN

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_404.php';

		break;
	case 'house':
		// HOUSE

		switch ($page2) {
			case 'houselist':
				// HOUSE LIST

				switch ($page3) {
					case 'city':
						// HOUSE LIST - RECORDS BY CITY

						// EN: Default Variable
						// CZ: Hlavní proměnné
						$pageID = $page4;

						if (is_numeric($pageID) && envo_row_exist($pageID, $envotable12)) {

							// EN: Getting the data about the Houses by usergroupid
							// CZ: Získání dat o bytových domech podle 'id' uživatelské skupiny
							$ENVO_HOUSE_ALL = envo_get_house_info($envotable, $envotable12, FALSE, ENVO_USERGROUPID, 't1.city = ' . $pageID);

							// EN: Breadcrumbs activation
							// CZ: Aktivace Breadcrumbs
							$BREADCRUMBS = TRUE;

							// EN: Title and Description
							// CZ: Titulek a Popis
							$SECTION_TITLE = 'Bytové domy';
							$SECTION_DESC  = 'Seznam bytových domů podle města - <strong>' . $row["city"] . '</strong>';

							// EN: Load the php template
							// CZ: Načtení php template (šablony)
							$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_house_list.php';

						} else {

							envo_redirect($backtoplugin);

						}

						break;
					case 'estatemanagement':
						// HOUSE LIST - RECORDS BY ESTATEMANAGEMENT

						// EN: Default Variable
						// CZ: Hlavní proměnné
						$pageID = $page4;

						if (is_numeric($pageID) && envo_row_exist($pageID, $envotable13)) {

							// EN: Getting the data about the Houses by usergroupid
							// CZ: Získání dat o bytových domech podle 'id' uživatelské skupiny
							$ENVO_HOUSE_ALL = envo_get_house_info($envotable, $envotable12, FALSE, ENVO_USERGROUPID, 't1.estatemanagement = ' . $pageID);

							// EN: Getting the data about City
							// CZ:
							$result = $envodb -> query('SELECT name FROM ' . $envotable13 . ' WHERE id = ' . $pageID . ' LIMIT 1');
							$row    = $result -> fetch_assoc();

							// EN: Breadcrumbs activation
							// CZ: Aktivace Breadcrumbs
							$BREADCRUMBS = TRUE;

							// EN: Title and Description
							// CZ: Titulek a Popis
							$SECTION_TITLE = 'Bytové domy';
							$SECTION_DESC  = 'Seznam bytových domů podle Správy nemovitosti - <strong>' . $row["name"] . '</strong>';

							// EN: Load the php template
							// CZ: Načtení php template (šablony)
							$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_house_list.php';

						} else {

							envo_redirect($backtoplugin);

						}

						break;
					default:
						// HOUSE LIST - ALL RECORDS

						// ----------- ERROR: REDIRECT PAGE ------------
						// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

						// EN: If not exist value in 'case', redirect page to 404
						// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
						if (!empty($page3)) {
							if ($page3 != 'city' || $page3 != 'estatemanagement') {
								envo_redirect(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, '404'));
							}
						}

						// EN: Getting the data about the Houses by usergroupid
						// CZ: Získání dat o bytových domech podle 'id' uživatelské skupiny
						$ENVO_HOUSE_ALL = envo_get_house_info($envotable, $envotable12, FALSE, ENVO_USERGROUPID);

						// EN: Breadcrumbs activation
						// CZ: Aktivace Breadcrumbs
						$BREADCRUMBS = TRUE;

						// EN: Title and Description
						// CZ: Titulek a Popis
						$SECTION_TITLE = 'Bytové domy';
						$SECTION_DESC  = 'Seznam bytových domů - všechny záznamy';

						// EN: Load the php template
						// CZ: Načtení php template (šablony)
						$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_house_list.php';



				}

				break;
			case 'h':
				// INFO ABOUT HOUSE


				// EN: Breadcrumbs activation
				// CZ: Aktivace Breadcrumbs
				$BREADCRUMBS = TRUE;

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Bytové domy';
				$SECTION_DESC  = 'Detail bytového domu';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_house_detail.php';

				break;
			case 'statistics':
				// Statistics


				// EN: Breadcrumbs activation
				// CZ: Aktivace Breadcrumbs
				$BREADCRUMBS = TRUE;

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Bytové domy';
				$SECTION_DESC  = 'Statistika';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_house_statistics.php';

				break;
			default:

				// ----------- ERROR: REDIRECT PAGE ------------
				// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

				// EN: If not exist value in 'case', redirect page to 404
				// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
				if (!empty($page2)) {
					if ($page2 != 'houselist' || $page2 != 'h' || $page2 != 'statistics') {
						envo_redirect(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, '404'));
					}
				}

				// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
				// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

				// EN: Getting the data about the Období výstavby domu
				// CZ: Získání dat o Období výstavby domu
				$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_settings_estatemanagement');
				while ($row = $result -> fetch_assoc()) {
					// EN: Insert each record into array
					// CZ: Vložení získaných dat do pole
					$ENVO_MANAGEMENT[] = $row;
				}

				// EN: Breadcrumbs activation
				// CZ: Aktivace Breadcrumbs
				$BREADCRUMBS = TRUE;

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Bytové domy';
				$SECTION_DESC  = 'Výběr bytových domů';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_house.php';
		}

		break;
	case 'maps':
		// MAPS

		switch ($page2) {
			case 'maps1':
				// MAPS 1


				// EN: Breadcrumbs activation
				// CZ: Aktivace Breadcrumbs
				$BREADCRUMBS = TRUE;

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Mapové podklady';
				$SECTION_DESC  = 'Přehledová mapa';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_maps1.php';

				break;
			default:
				// DEFAULT MAPS

				// ----------- ERROR: REDIRECT PAGE ------------
				// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

				// EN: If not exist value in 'case', redirect page to 404
				// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
				if (!empty($page2)) {
					if ($page2 != 'maps1') {
						envo_redirect(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, '404'));
					}
				}

				// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
				// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

				// EN: Breadcrumbs activation
				// CZ: Aktivace Breadcrumbs
				$BREADCRUMBS = TRUE;

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Mapové podklady';
				$SECTION_DESC  = '';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_maps.php';
		}

		break;
	case 'notification':
		// NOTIFICATION

		switch ($page2) {
			case 'n':
				// INFO ABOUT NOTIFICATION

				// EN: Default Variable
				// CZ: Hlavní proměnné
				$pageID = $page3;

				if (is_numeric($pageID) && envo_row_exist($pageID, $envotable10)) {

					// EN: Check if user has permission to see it - usergroup 'Administrator' have permission to all data automatically
					// Cz: Kontrola jestli má uživatel přístup k datům - Uživatelská skupina 'Administrátor' má přístup ke všem datům automaticky
					if (envo_row_permission($pageID, $envotable10, ENVO_USERGROUPID)) {
						// USER HAVE PERMISSION

						if ($_SERVER['REQUEST_METHOD'] == 'POST') {
							// EN: Default Variable
							// CZ: Hlavní proměnné
							$defaults = $_POST;

							if (isset($_POST['btnRead'])) {

								/* EN: Convert value
									 * smartsql - secure method to insert form data into a MySQL DB
									 * url_slug  - friendly URL slug from a string
									 * ------------------
									 * CZ: Převod hodnot
									 * smartsql - secure method to insert form data into a MySQL DB
									 * url_slug  - friendly URL slug from a string
									*/
								$result = $envodb -> query('UPDATE ' . $envotable11 . ' SET
                          unread = "1"
                          WHERE notification_id = "' . smartsql($pageID) . '"
                          AND usergroup_id = "' . ENVO_USERGROUPID . '"');

								if (!$result) {

								} else {
									// EN: Info about notifications - refresh data
									// CZ: Info o notifikacích - refresh data
									$ENVO_NOTIFICATION = envo_get_notification_unread(ENVO_USERGROUPID, FALSE, $ENVO_SETTING_VAL['int2dateformat'], $ENVO_SETTING_VAL['int2timeformat']);
								}

							}

						}

						$result = $envodb -> query('
                      SELECT ' . $envotable10 . '.*, ' . $envotable11 . '.unread 
                      FROM ' . $envotable10 . ', ' . $envotable11 . ' 
                      WHERE ' . $envotable10 . '.id = "' . smartsql($pageID) . '"
                      AND ' . $envotable11 . '.notification_id="' . smartsql($pageID) . '"
                      AND ' . $envotable11 . '.usergroup_id="' . ENVO_USERGROUPID . '"
                      LIMIT 1
                      ');

						while ($row = $result -> fetch_assoc()) {
							// EN: Insert each record into array
							// CZ: Vložení získaných dat do pole
							$ENVO_NOTIFICATION_DETAIL[] = array (
								'name'    => $row['name'],
								'type'    => $row['type'],
								'content' => $row['content'],
								'created' => date($ENVO_SETTING_VAL['int2dateformat'] . $ENVO_SETTING_VAL['int2timeformat'], strtotime($row['created']))
							);
						}

						// EN: Breadcrumbs activation
						// CZ: Aktivace Breadcrumbs
						$BREADCRUMBS = TRUE;

						// EN: Title and Description
						// CZ: Titulek a Popis
						$SECTION_TITLE = 'Notifikace';
						$SECTION_DESC  = 'Detail notifikace';

						// EN: Load the php template
						// CZ: Načtení php template (šablony)
						$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_notification_detail.php';

					} else {
						// USER HAVE NOT PERMISSION

						envo_redirect(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, '404', '', '', ''));

					}

				} else {

					envo_redirect($backtoplugin);

				}

				break;
			default:

				// ----------- ERROR: REDIRECT PAGE ------------
				// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

				// EN: If not exist value in 'case', redirect page to 404
				// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
				if (!empty($page2)) {
					if ($page2 != 'n') {
						envo_redirect(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, '404', '', '', ''));
					}
				}

				// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
				// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

				// EN: Getting the data about the Notifications by usergroupid
				// CZ: Získání dat o Notifikacích podle 'id' uživatelské skupiny
				$ENVO_NOTIFICATION_ALL = envo_get_notification_all(ENVO_USERGROUPID, FALSE, $ENVO_SETTING_VAL['int2dateformat'], $ENVO_SETTING_VAL['int2timeformat']);

				// EN: Breadcrumbs activation
				// CZ: Aktivace Breadcrumbs
				$BREADCRUMBS = TRUE;

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Notifikace';
				$SECTION_DESC  = 'Seznam notifikací';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_notification.php';

		}
		break;
	default:
		// MAIN PAGE OF PLUGIN

		// ----------- ERROR: REDIRECT PAGE ------------
		// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

		// EN: If not exist value in 'case', redirect page to 404
		// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
		if (!empty($page1)) {
			if ($page1 != 'house' || $page1 != 'maps') {
				envo_redirect(ENVO_rewrite ::envoParseurl('404'));
			}
		}

		// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
		// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

		if (ENVO_USERGROUPID == 3) {
			// EN: Data for ADMINISTRATOR User group
			// CZ: Pokud je uživatelská skupinA přihlášeného uživatele 'Administrator'

			/* =====================================================
			 *  HOUSE - STATISTIC - STATISTIKA DOMŮ VE SPRÁVĚ
			 * ===================================================== */
			// EN: Getting count of all records in DB
			// CZ: Získání počtu všech záznamů v DB
			$result    = $envodb -> query('SELECT COUNT(*) as houseCtotal FROM ' . $envotable);
			$rowCtotal = $result -> fetch_assoc();

			// Count of all records by usergroup
			$ENVO_COUNTS = $rowCtotal['houseCtotal'];
			// Percentage - records by usergroup / all records
			$ENVO_PERCENT = ($rowCtotal['houseCtotal'] * 100) . '%';

			/* =====================================================
       *  HOUSE - TASKS STATISTIC - STATISTIKA ÚKOLŮ
       * ===================================================== */
			// EN: Get the data about delayed Task
			// CZ: Získání dat o zpožděných Úkolech
			$ENVO_HOUSE_TASK_DELAY = envo_get_task_delayed_info(ENVO_USERGROUPID, TRUE, 'tabs3', $ENVO_SETTING_VAL['int2dateformat'], $ENVO_SETTING_VAL['int2timeformat']);

			// Count of all records by usergroup
			$ENVO_TASK_DELAY_COUNTS = $ENVO_HOUSE_TASK_DELAY['count_of_task'];
			// Percentage - records by usergroup / all records
			$ENVO_TASK_DELAY_PERCENT = ($ENVO_HOUSE_TASK_DELAY['count_of_task'] * 100) . '%';

			// EN: Get the data about active Task
			// CZ: Získání dat o aktivních Úkolech
			$ENVO_HOUSE_TASK = envo_get_task_info(ENVO_USERGROUPID, TRUE, 'tabs3', $ENVO_SETTING_VAL['int2dateformat'], $ENVO_SETTING_VAL['int2timeformat']);

			// Count of all records by usergroup
			$ENVO_TASK_COUNTS = $ENVO_HOUSE_TASK['count_of_task'];
			// Percentage - records by usergroup / all records
			$ENVO_TASK_PERCENT = ($ENVO_HOUSE_TASK['count_of_task'] * 100) . '%';


		} else {
			// EN: Data for User group by USERGROUPID

		}

		// ------------------------
		// EN: Breadcrumbs activation
		// CZ: Aktivace Breadcrumbs
		$BREADCRUMBS = FALSE;

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_index.php';

}

?>