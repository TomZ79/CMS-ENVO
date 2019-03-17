<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

$CHECK_USR_SESSION = session_id();

// -------- DATA FOR ALL FRONTEND PAGES --------
// -------- DATA PRO VŠECHNY FRONTEND STRÁNKY --------

// EN: Show content in template only the user have access (SuperAdmin always has access)
// CZ:
$ENVO_MODULES_ACCESS = $envouser -> envoModuleAccess(ENVO_USERID, '1,2');

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

// EN: Get permissions for House Analytics
// CZ: Získání přístupových práv do analýzy bytových domů
$result = $envodb -> query('SELECT int2analytics FROM ' . DB_PREFIX . 'usergroup WHERE id = "' . ENVO_USERGROUPID . '" LIMIT 1');
if ($envodb -> affected_rows === 1) {
	$row = $result -> fetch_assoc();
	if ($row['int2analytics'] == 1 || ENVO_USERGROUPID == 3) {
		$useracessanalytics = $ENVO_ACCESS_ANALYTICS = TRUE;
	}
} else {
	if ($row['int2analytics'] == 0 || ENVO_USERGROUPID == 3) {
		$useracessanalytics = $ENVO_ACCESS_ANALYTICS = TRUE;
	} else {
		$useracessanalytics = $ENVO_ACCESS_ANALYTICS = FALSE;
	}
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
$envotable8  = DB_PREFIX . 'int2_housecontacts';
$envotable10 = DB_PREFIX . 'int2_housenotifications';
$envotable11 = DB_PREFIX . 'int2_housenotificationug';
$envotable12 = DB_PREFIX . 'int2_settings_city';
$envotable13 = DB_PREFIX . 'int2_settings_estatemanagement';
$envotable14 = DB_PREFIX . 'int2_settings_ku';

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

							// EN: Check if user has permission to see it - usergroup 'Administrator' have permission to all data automatically
							// Cz: Kontrola jestli má uživatel přístup k datům - Uživatelská skupina 'Administrátor' má přístup ke všem datům automaticky
							if (envo_analytics_access(ENVO_USERGROUPID)) {
								// USER HAVE PERMISSION

								// EN: Getting the data about the Houses by usergroupid
								// CZ: Získání dat o bytových domech podle 'id' uživatelské skupiny
								$ENVO_HOUSE_ALL = envo_get_house_info($envotable, $envotable12, FALSE, 3, 't1.city = ' . $pageID);

							} else {
								// USER HAVE NOT PERMISSION

								// EN: Getting the data about the Houses by usergroupid
								// CZ: Získání dat o bytových domech podle 'id' uživatelské skupiny
								$ENVO_HOUSE_ALL = envo_get_house_info($envotable, $envotable12, FALSE, ENVO_USERGROUPID, 't1.city = ' . $pageID);
							}

							// EN: Getting the data about City name
							// CZ:
							$result = $envodb -> query('SELECT city_name FROM ' . $envotable12 . ' WHERE id = ' . $pageID . ' LIMIT 1');
							$row    = $result -> fetch_assoc();

							// EN: Breadcrumbs activation
							// CZ: Aktivace Breadcrumbs
							$BREADCRUMBS = TRUE;

							// EN: Title and Description
							// CZ: Titulek a Popis
							$SECTION_TITLE = 'Bytové domy';
							$SECTION_DESC  = 'Seznam bytových domů podle města - <strong>' . $row["city_name"] . '</strong>';

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

							// EN: Check if user has permission to see it - usergroup 'Administrator' have permission to all data automatically
							// Cz: Kontrola jestli má uživatel přístup k datům - Uživatelská skupina 'Administrátor' má přístup ke všem datům automaticky
							if (envo_analytics_access(ENVO_USERGROUPID)) {
								// USER HAVE PERMISSION

								// EN: Getting the data about the Houses by usergroupid
								// CZ: Získání dat o bytových domech podle 'id' uživatelské skupiny
								$ENVO_HOUSE_ALL = envo_get_house_info($envotable, $envotable12, FALSE, 3, 't1.estatemanagement = ' . $pageID);

							} else {
								// USER HAVE NOT PERMISSION

								// EN: Getting the data about the Houses by usergroupid
								// CZ: Získání dat o bytových domech podle 'id' uživatelské skupiny
								$ENVO_HOUSE_ALL = envo_get_house_info($envotable, $envotable12, FALSE, ENVO_USERGROUPID, 't1.estatemanagement = ' . $pageID);
							}

							// EN: Getting the data about Estate Management name
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
					case 'livesearch':
						// HOUSE LIST - RECORDS BY SEARCH

						if ($_SERVER['REQUEST_METHOD'] == 'POST') {
							// EN: Default Variable
							// CZ: Hlavní proměnné
							$defaults = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

							// EN: Getting the data about the Houses
							// CZ: Získání dat o bytových domech
							$search      = $defaults['searchtext'];
							// Slug by charatcter maps
							$search_slug      = simpleslug($search);
							// Create array by multiexplode function
							$search_list = multiexplode(array (',', ', ', '|', ':', '+', '-', ' '), $search_slug);
							$string_impl = implode(',', $search_list);
							$sql         = '';
							if (count($search_list) >= 1) {
								for ($i = 0; $i < count($search_list); $i++) {
									if ($i == 0) {
										$sql = 't1.name LIKE "%' . $search_list[0] . '%" ';
									} else {
										$sql .= 'AND t1.name LIKE "%' . $search_list[$i] . '%" ';
									}
								}
							}

							// EN: Check if user has permission to see it - usergroup 'Administrator' have permission to all data automatically
							// Cz: Kontrola jestli má uživatel přístup k datům - Uživatelská skupina 'Administrátor' má přístup ke všem datům automaticky
							if (envo_analytics_access(ENVO_USERGROUPID)) {
								// USER HAVE PERMISSION

								$result = $envodb -> query('SELECT
																		t1.*,
																		t2.city_name
																	FROM
																		' . $envotable . ' t1
																	LEFT JOIN 
																		' . $envotable12 . ' t2
																			ON t1.city = t2.id
																	WHERE ' . $sql . ' COLLATE utf8_czech_ci 
																	ORDER BY t1.id ASC');

							} else {
								// USER HAVE NOT PERMISSION

								$result = $envodb -> query('SELECT 
																		t1.*,
																		t2.city_name
																	FROM
																		' . $envotable . ' t1
																	LEFT JOIN 
																		' . $envotable12 . ' t2
																			ON t1.city = t2.id
																	WHERE ' . $sql . ' AND t1.permission LIKE "%' . ENVO_USERGROUPID . '%"
																	ORDER BY t1.id ASC');
							}

							while ($row = $result -> fetch_assoc()) {

								// There should be always a varname in categories and check if seo is valid
								$parseurl = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2 . '/house', 'h', $row['id'], FALSE);

								// EN: Insert each record into array
								// CZ: Vložení získaných dat do pole
								$ENVO_HOUSE_SEARCH[] = array (
									'id'        => $row['id'],
									'name'      => $row['name'],
									'street'    => $row['street'],
									'city_name' => $row['city_name'],
									'parseurl'  => $parseurl,
									'searchtext' => $string_impl
								);
							}

						}

						// EN: Breadcrumbs activation
						// CZ: Aktivace Breadcrumbs
						$BREADCRUMBS = TRUE;

						// EN: Title and Description
						// CZ: Titulek a Popis
						$SECTION_TITLE = 'Bytové domy';
						$SECTION_DESC  = 'Seznam bytových domů - <strong>Live vyhledávání</strong>';

						// EN: Load the php template
						// CZ: Načtení php template (šablony)
						$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_house_list.php';

						break;
					default:
						// HOUSE LIST - ALL RECORDS

						// ----------- ERROR: REDIRECT PAGE ------------
						// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

						// EN: If not exist value in 'case', redirect page to 404
						// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
						if (!empty($page3)) {
							if ($page3 != 'city' || $page3 != 'estatemanagement' || $page3 != 'livesearch') {
								envo_redirect(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, '404'));
							}
						}

						// EN: Check if user has permission to see it - usergroup 'Administrator' have permission to all data automatically
						// Cz: Kontrola jestli má uživatel přístup k datům - Uživatelská skupina 'Administrátor' má přístup ke všem datům automaticky
						if (envo_analytics_access(ENVO_USERGROUPID)) {
							// USER HAVE PERMISSION

							// EN: Getting the data about the Houses by usergroupid
							// CZ: Získání dat o bytových domech podle 'id' uživatelské skupiny
							$ENVO_HOUSE_ALL = envo_get_house_info($envotable, $envotable12, FALSE, 3);

						} else {
							// USER HAVE NOT PERMISSION

							// EN: Getting the data about the Houses by usergroupid
							// CZ: Získání dat o bytových domech podle 'id' uživatelské skupiny
							$ENVO_HOUSE_ALL = envo_get_house_info($envotable, $envotable12, FALSE, ENVO_USERGROUPID);
						}



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
				// HOUSE DETAIL

				// EN: Default Variable
				// CZ: Hlavní proměnné
				$pageID = $page3;

				if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

					// EN: Check if user has permission to see it - usergroup 'Administrator' have permission to all data automatically
					// Cz: Kontrola jestli má uživatel přístup k datům - Uživatelská skupina 'Administrátor' má přístup ke všem datům automaticky
					if (envo_row_permission($pageID, $envotable, ENVO_USERGROUPID) || envo_analytics_access(ENVO_USERGROUPID)) {
						// USER HAVE PERMISSION

						$result = $envodb -> query('SELECT 
																		t1.*,
																		t2.city_name,
																		t2.city_cuzk_code,
																		t3.ku_name,
																		t3.ku_cuzk_code,
																		t4.name AS estatemanagement_name
																	FROM
																		' . $envotable . ' t1
																	LEFT JOIN 
																		' . $envotable12 . ' t2
																			ON t1.city = t2.id
																	LEFT JOIN 
																		' . $envotable14 . ' t3
																			ON t1.cuzk_ku_id = t3.id
																	LEFT JOIN 
																		' . $envotable13 . ' t4
																			ON t1.estatemanagement = t4.id
																	WHERE t1.id = "' . smartsql($pageID) . '" LIMIT 1');

						while ($row = $result -> fetch_assoc()) {
							// EN: Insert each record into array
							// CZ: Vložení získaných dat do pole
							$envodetail[]    = $row;
						}

						// Convert multidimensional array to associated array
						$ENVO_HOUSE_DETAIL = array ();
						foreach ($envodetail as $array) {
							foreach ($array as $k => $v) {
								$ENVO_HOUSE_DETAIL[$k] = $v;
							}
						}

						// EN: Get the data of entrance
						// CZ: Získání dat o vchodech
						$result = $envodb -> query('SELECT * FROM ' . $envotable2 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY id ASC');
						while ($row = $result -> fetch_assoc()) {
							// EN: Insert each record into array
							// CZ: Vložení získaných dat do pole
							$ENVO_HOUSE_ENT[] = $row;
						}

						// EN: Get the data of Contacts
						// CZ: Získání dat o Kontaktech
						$result = $envodb -> query('SELECT * FROM ' . $envotable8 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY id DESC');
						// EN: Determine the number of rows in the result from DB
						// CZ: Určení počtu řádků ve výsledku z DB
						$row_cnt = $result -> num_rows;
						$ENVO_HOUSE_CONT['count_of_cont'] = $row_cnt;

						while ($row = $result -> fetch_assoc()) {
							// EN: Change number to string
							// CZ: Změna čísla na text
							switch ($row['status']) {
								case '0':
									$status = 'Bez funkce';
									break;
								case '1':
									$status = 'Předseda';
									break;
								case '2':
									$status = 'Místopředseda';
									break;
								case '3':
									$status = 'Člen výboru';
									break;
							}

							// EN: Insert each record into array
							// CZ: Vložení získaných dat do pole
							$ENVO_HOUSE_CONT[] = array (
								'id'          => $row['id'],
								'houseid'     => $row['houseid'],
								'degree'      => $row['degree'],
								'name'        => $row['name'],
								'surname'     => $row['surname'],
								'address'     => $row['address'],
								'phone'       => $row['phone'],
								'email'       => $row['email'],
								'status'      => $status,
								'birthdate'   => (!empty((int)$row['birthdate']) ? date($ENVO_SETTING_VAL['int2dateformat'], strtotime($row['birthdate'])) : ''),
								'description' => $row['description'],
							);

						}

						// EN: Get the data of Tasks
						// CZ: Získání dat o Úkolech
						$result = $envodb -> query('SELECT * FROM ' . $envotable3 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY id DESC');
						// EN: Determine the number of rows in the result from DB
						// CZ: Určení počtu řádků ve výsledku z DB
						$row_cnt = $result -> num_rows;
						$ENVO_HOUSE_TASK['count_of_task'] = $row_cnt;

						while ($row = $result -> fetch_assoc()) {
							// EN: Change number to string
							// CZ: Změna čísla na text
							switch ($row['priority']) {
								case '0':
									$priority = '<span class="label">Nedůležitá</span>';
									break;
								case '1':
									$priority = '<span class="label">Nízká priorita</span>';
									break;
								case '2':
									$priority = '<span class="label label-warning">Střední priorita</span>';
									break;
								case '3':
									$priority = '<span class="label label-important">Vysoká priorita</span>';
									break;
								case '4':
									$priority = '<span class="label label-important">Nejvyšší priorita</span>';
									break;
							}

							switch ($row['status']) {
								case '0':
									$status = 'Žádný status';
									break;
								case '1':
									$status = 'Zápis';
									break;
								case '2':
									$status = 'V řešení';
									break;
								case '3':
									$status = 'Vyřešeno - Uzavřeno';
									break;
								case '4':
									$status = 'Stornováno';
									break;
							}

							// EN: Insert each record into array
							// CZ: Vložení získaných dat do pole
							$ENVO_HOUSE_TASK[] = array (
								'id'          => $row['id'],
								'houseid'     => $row['houseid'],
								'priority'    => $priority,
								'status'      => $status,
								'title'       => $row['title'],
								'description' => $row['description'],
								'reminder'    => date($ENVO_SETTING_VAL['int2dateformat'], strtotime($row['reminder'])),
								'time'        => date($ENVO_SETTING_VAL['int2dateformat'], strtotime($row['time'])),
							);

						}

					} else {
						// USER HAVE NOT PERMISSION
						envo_redirect(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, '404'));
					}

				} else {
					envo_redirect($backtoplugin);
				}


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
				// STATISTICS

				// EN: Check if user has permission to see it - usergroup 'Administrator' have permission to all data automatically
				// Cz: Kontrola jestli má uživatel přístup k datům - Uživatelská skupina 'Administrátor' má přístup ke všem datům automaticky
				if (envo_analytics_access(ENVO_USERGROUPID)) {
					// USER HAVE PERMISSION


				} else {
					// USER HAVE NOT PERMISSION

				}

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
				// HOUSE SEARCHING

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
						envo_redirect(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, '404'));
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
	case 'opendata':
		// OPEN DATA

		switch ($page2) {
			case 'ares':
				// ARES

				// EN: Breadcrumbs activation
				// CZ: Aktivace Breadcrumbs
				$BREADCRUMBS = TRUE;

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Otevřená data';
				$SECTION_DESC  = 'ARES';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_opendata_ares.php';

				break;
			case 'justice':
				// JUSTICE

				// EN: Breadcrumbs activation
				// CZ: Aktivace Breadcrumbs
				$BREADCRUMBS = TRUE;

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Otevřená data';
				$SECTION_DESC  = 'JUSTICE';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_opendata_justice.php';

				break;
			case 'csu':
				// ČESKÝ STATISTICKÝ ÚŘAD

				// EN: Breadcrumbs activation
				// CZ: Aktivace Breadcrumbs
				$BREADCRUMBS = TRUE;

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Otevřená data';
				$SECTION_DESC  = 'ČSÚ';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_opendata_csu.php';

				break;
			case 'kn':
				// KATASTR

				// EN: Breadcrumbs activation
				// CZ: Aktivace Breadcrumbs
				$BREADCRUMBS = TRUE;

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Otevřená data';
				$SECTION_DESC  = 'Katastr nemovitostí';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_opendata_kn.php';

				break;
			case 'databox':
				// DATOVÁ SCHRÁNKA

				// EN: Breadcrumbs activation
				// CZ: Aktivace Breadcrumbs
				$BREADCRUMBS = TRUE;

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Otevřená data';
				$SECTION_DESC  = 'Datová schránka';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_opendata_databox.php';

				break;
			case 'dph':
				// PLÁTCI DPH

				// EN: Breadcrumbs activation
				// CZ: Aktivace Breadcrumbs
				$BREADCRUMBS = TRUE;

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Otevřená data';
				$SECTION_DESC  = 'Plátci DPH';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_opendata_dph.php';

				break;
			case 'drazby':
				// PORTÁL DRAŽEB

				// EN: Breadcrumbs activation
				// CZ: Aktivace Breadcrumbs
				$BREADCRUMBS = TRUE;

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Otevřená data';
				$SECTION_DESC  = 'Portál dražeb';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_opendata_drazby.php';

				break;
			default:

				// ----------- ERROR: REDIRECT PAGE ------------
				// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

				// EN: If not exist value in 'case', redirect page to 404
				// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
				if (!empty($page2)) {
					if ($page2 != 'ares' || $page2 != 'justice') {
						envo_redirect(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, '404'));
					}
				}

				// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
				// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

		}
		break;
	default:
		// MAIN PAGE OF PLUGIN

		// ----------- ERROR: REDIRECT PAGE ------------
		// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

		// EN: If not exist value in 'case', redirect page to 404
		// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
		if (!empty($page1)) {
			if ($page1 != 'house' || $page1 != 'maps' || $page1 != 'notification' || $page1 != 'opendata') {
				envo_redirect(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, '404'));
			}
		}

		// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
		// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

		if (ENVO_USERGROUPID == 3 || $ENVO_ACCESS_ANALYTICS) {
			// EN: Data for ADMINISTRATOR User group and $ENVO_ACCESS_ANALYTICS
			// CZ: Pokud je uživatelská skupinA přihlášeného uživatele 'Administrator' nebo pokud má uživatel přístup k analýze

			/* =====================================================
			 *  HOUSE - STATISTIC - STATISTIKA DOMŮ
			 * ===================================================== */
			// EN: Getting count of all records in DB
			// CZ: Získání počtu všech záznamů v DB
			$result    = $envodb -> query('SELECT COUNT(*) AS houseCtotal FROM ' . $envotable);
			$rowCtotal = $result -> fetch_assoc();
			// Count of records
			$ENVO_COUNTS_ALL = $rowCtotal['houseCtotal'];
			// Percentage of records
			$ENVO_PERCENT_ALL = '100%';

			// ------------------------
			// EN: Getting count of records by IČ > 0
			// CZ: Získání počtu záznamů podle IČ > 0
			$result1 = $envodb -> query('SELECT COUNT(*) AS notnullic FROM ' . $envotable . ' WHERE ic > 0');
			$rowCnt  = $result1 -> fetch_assoc();
			// Count of records
			$ENVO_COUNTS_ANALYTICS1 = $rowCnt['notnullic'];

			// ------------------------
			// EN: Getting count of records by IČ = 0
			// CZ: Získání počtu záznamů podle IČ = 0
			$result2                = $envodb -> query('SELECT COUNT(*) AS nullic FROM ' . $envotable . ' WHERE ic = 0');
			$rowCtotal              = $result2 -> fetch_assoc();
			$ENVO_COUNTS_ANALYTICS2 = $rowCtotal['nullic'];

			/* =====================================================
       *  HOUSE - TASKS STATISTIC - STATISTIKA ÚKOLŮ
       * ===================================================== */
			// EN: Get the data about delayed Task
			// CZ: Získání dat o zpožděných Úkolech
			$ENVO_HOUSE_TASK_DELAY = envo_get_task_delayed_info(ENVO_USERGROUPID, TRUE, 'tabs6', $ENVO_SETTING_VAL['int2dateformat'], $ENVO_SETTING_VAL['int2timeformat']);

			// Count of all records
			$ENVO_TASK_DELAY_COUNTS = $ENVO_HOUSE_TASK_DELAY['count_of_task'];
			// Percentage - records by usergroup / all records
			$ENVO_TASK_DELAY_PERCENT = ($ENVO_HOUSE_TASK_DELAY['count_of_task'] * 100) . '%';

			// EN: Get the data about active Task
			// CZ: Získání dat o aktivních Úkolech
			$ENVO_HOUSE_TASK = envo_get_task_info(ENVO_USERGROUPID, TRUE, 'tabs6', $ENVO_SETTING_VAL['int2dateformat'], $ENVO_SETTING_VAL['int2timeformat']);

			// Count of all records
			$ENVO_TASK_COUNTS = $ENVO_HOUSE_TASK['count_of_task'];
			// Percentage - records by usergroup / all records
			$ENVO_TASK_PERCENT = '100%';


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