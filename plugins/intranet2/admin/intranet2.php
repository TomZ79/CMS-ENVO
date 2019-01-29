<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$envouser -> envoModuleAccess(ENVO_USERID, ENVO_ACCESS_BLANK_PLUGIN)) envo_redirect(BASE_URL);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/intranet2/admin/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/intranet2/admin/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable   = DB_PREFIX . 'int2_house';
$envotable1  = DB_PREFIX . 'int2_settings_estatemanagement';
$envotable2  = DB_PREFIX . 'int2_housetasks';
$envotable3  = DB_PREFIX . 'int2_houseent';
$envotable4  = DB_PREFIX . 'int2_housedocu';
$envotable5  = DB_PREFIX . 'int2_houseimg';
$envotable6  = DB_PREFIX . 'int2_houseserv';
$envotable7  = DB_PREFIX . 'int2_housenotifications';
$envotable8  = DB_PREFIX . 'int2_housenotificationug';
$envotable20 = DB_PREFIX . 'int2_settings_city';
$envotable21 = DB_PREFIX . 'int2_settings_ku';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../plugins/intranet2/admin/include/functions.php");

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$ENVO_SETTING_VAL = envo_get_setting_val('intranet2');

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
	case 'house':
		// HOUSE LIST

		switch ($page2) {
			case 'newhouse':
				// ADD NEW HOUSE TO DB

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					// EN: Default Variable
					// CZ: Hlavní proměnné
					$defaults = $_POST;

					if (isset($_POST['btnSave'])) {

						// EN: Check if name of house isn't empty
						// CZ: Kontrola jestli je zadáný název domu
						if (empty($defaults['envo_housename'])) {
							$errors['e1'] = $tlint['int_error']['interror'] . '<br>';
						}

						// EN: Check if ic of house isn't empty
						// CZ: Kontrola jestli je zadáné ič
						if (!isset($defaults['envo_houseic']) || !is_numeric($defaults['envo_houseic'])) {
							$errors['e2'] = $tlint['int_error']['interror8'] . '<br>';
						}

						// EN: All checks are OK without Errors - Start the form processing
						// CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
						if (count($errors) == 0) {

							// Permissions
							if (!isset($defaults['envo_permission'])) {
								$permission = 0;
							} elseif (in_array(0, $defaults['envo_permission'])) {
								$permission = 0;
							} else {
								$permission = join(',', $defaults['envo_permission']);
							}

							if (!empty($defaults['envo_datedministration'])) {
								$admtime = date('Y-m-d H:i:s', strtotime($defaults['envo_datedministration']));
							} else {
								$admtime = '';
							}


							// EN: Get city name
							// CZ:
							if (!empty($defaults['envo_housecity'])) {
								$result   = $envodb -> query('SELECT city FROM ' . $envotable20 . ' WHERE id = "' . smartsql($defaults['envo_housecity']) . '" LIMIT 1 ');
								$envocity = $result -> fetch_assoc();
							}

							// EN: Get city area name
							// CZ:
							if (!empty($defaults['envo_houseku'])) {
								$result     = $envodb -> query('SELECT ku FROM ' . $envotable21 . ' WHERE id = "' . smartsql($defaults['envo_houseku']) . '" LIMIT 1 ');
								$envocityku = $result -> fetch_assoc();
							}

							// EN: New folder of house for documents, images and other ...
							// CZ: Nová složka domu pro dokumenty, obrázky a další ...
							// -----------------
							//The name of the directory that we need to create
							$uniqfolder = uniqid('house_');
							$pathfolder = '/intranet2/house/' . $uniqfolder;
							//Check if the directory already exists.
							if (!is_dir(APP_PATH . $pathfolder)) {
								//Directory does not exist, so lets create it.

								// Main folder
								mkdir(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder, 0755, TRUE);
								// Document folder
								mkdir(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder . '/documents/', 0755, TRUE);
								// Fotogallery folder
								mkdir(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder . '/images/', 0755, TRUE);
								// Videogallery folder
								mkdir(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder . '/videos/', 0755, TRUE);
								// Create '*.txt' info file
								$data = '
HOUSE NAME - ' . $defaults['envo_housename'] . '
-----------------------------------------------
Format date: Y-m-d H:i:s
House created: ' . date('Y-m-d H:i:s') . '

INFO ABOUT HOUSE
-----------------------------------------------
Jméno:     						' . $defaults['envo_housename'] . '
Ulice:   							' . $defaults['envo_housestreet'] . '
Město:     						' . $envocity["city"] . '
Katastrální území:    ' . envocityku["ku"] . '
PSČ:      						' . $defaults['envo_housepsc'] . '
IČ:       						' . $defaults['envo_houseic'] . '
Složka domu:   				' . $pathfolder . '
                        ';
								$data = iconv(mb_detect_encoding($data, mb_detect_order(), true), 'UTF-8', $data);
								file_put_contents(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder . '/house_info.txt', $data);

							}

							/* EN: Convert value
							 * smartsql - secure method to insert form data into a MySQL DB
							 * url_slug  - friendly URL slug from a string
							 * ------------------
							 * CZ: Převod hodnot
							 * smartsql - secure method to insert form data into a MySQL DB
							 * url_slug  - friendly URL slug from a string
							*/
							$result = $envodb -> query('INSERT INTO ' . $envotable . ' SET 
                        name = "' . smartsql($defaults['envo_housename']) . '",
                        varname = "' . url_slug($defaults['envo_housename'], array ('transliterate' => TRUE)) . '",
                        headquarters = "' . smartsql($defaults['envo_househeadquarters']) . '",
                        street = "' . smartsql($defaults['envo_housestreet']) . '",
                        city = "' . smartsql($defaults['envo_housecity']) . '",
                        ku = "' . smartsql($defaults['envo_houseku']) . '",
                        psc = "' . smartsql($defaults['envo_housepsc']) . '",
                        ic = "' . smartsql($defaults['envo_houseic']) . '",
                        state = "' . smartsql($defaults['envo_housestate']) . '",
                        housefname = "' . smartsql($defaults['envo_housefname']) . '",
                        housefstreet = "' . smartsql($defaults['envo_housefstreet']) . '",
                        housefcity = "' . smartsql($defaults['envo_housefcity']) . '",
                        housefpsc = "' . smartsql($defaults['envo_housefpsc']) . '",
                        housefic = "' . smartsql($defaults['envo_housefic']) . '",
                        housefdic = "' . smartsql($defaults['envo_housefdic']) . '",
                        permission = "' . smartsql($permission) . '",
                        ares = "' . smartsql($defaults['envo_houseares']) . '",
                        justice = "' . smartsql($defaults['envo_housejustice']) . '",
                        estatemanagement = "' . smartsql($defaults['envo_estatemanagement']) . '",
                        administration = "' . smartsql($defaults['envo_houseadministration']) . '",
                        administrationdate = "' . $admtime . '",
                        housedescription = "' . smartsql($defaults['envo_housedescription']) . '",
                        mainemail = "' . smartsql($defaults['envo_houseemail']) . '",
                        folder = "' . $pathfolder . '",
                        created = "' . smartsql($defaults['envo_created']) . '",
                        updated = "' . smartsql($defaults['envo_created']) . '"');

							$rowid = $envodb -> envo_last_id();

							if (!$result) {
								// EN: Redirect page
								// CZ: Přesměrování stránky
								envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=house&ssp=newhouse&status=e');
							} else {
								// EN: Redirect page
								// CZ: Přesměrování stránky
								envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=house&ssp=edithouse&id=' . $rowid . '&status=s');
							}

						} else {
							$errors['e'] = $tl['general_error']['generror'] . '<br>';
							$errors      = $errors;
						}
					}
				}

				// EN: Getting the data about the city
				// CZ: Získání dat o městech
				$envocity = envo_get_region('', 'id, city', $envotable20, 'city ASC', 1);

				// Convert multidimensional array into single array
				$ENVO_CITY = [];
				foreach ($envocity as $ec) {
					$ENVO_CITY[] = array (
						'id'   => $ec['id'],
						'city' => $ec['city'],
					);
				}

				// EN: Getting the data about the katastrální území
				// CZ: Získání dat o katastrálních území
				$resultku = $envodb -> query('SELECT 
                                        t1.id,
                                        t1.city,
                                        t2.id,
                                        t2.city_id,
                                        t2.ku,
                                        t2.ku_code
                                      FROM
                                        cms_int2_settings_city t1
                                      LEFT JOIN 
                                        cms_int2_settings_ku t2
                                          ON t1.id = t2.city_id
                                        ORDER BY t2.ku');
				while ($rowku = $resultku -> fetch_assoc()) {
					// EN: Insert each record into array
					// CZ: Vložení získaných dat do pole
					$ENVO_KU[] = $rowku;
				}

				// Sort array
				$ENVO_KU = sort_array_mutlidim($ENVO_KU, 'city ASC');

				// Get all usergroup's for active plugin
				$ENVO_USERGROUP = envo_plugin_usergroup_all('usergroup', 'intranet2');

				// Get all real estate management
				$ENVO_RESTMANA = envo_plugin_estate_management($envotable1, '');

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = $tlint2["int2_sec_title"]["int2t2"];
				$SECTION_DESC  = $tlint2["int2_sec_desc"]["int2d2"];

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_newhouse.php';

				break;
			case 'edithouse':
				// EDIT HOUSE IN DB

				// EN: Default Variable
				// CZ: Hlavní proměnné
				$pageID = $page3;

				if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						// EN: Default Variable
						// CZ: Hlavní proměnné
						$defaults = $_POST;

						if (isset($_POST['btnSave'])) {

							// EN: Check if name of house isn't empty
							// CZ: Kontrola jestli je zadáný název domu
							if (empty($defaults['envo_housename'])) {
								$errors['e1'] = $tlint['int_error']['interror'] . '<br>';
							}

							// EN: Check if ic of house isn't empty
							// CZ: Kontrola jestli je zadáné ič
							if (!isset($defaults['envo_houseic']) || !is_numeric($defaults['envo_houseic'])) {
								$errors['e2'] = $tlint['int_error']['interror8'] . '<br>';
							}

							// EN: All checks are OK without Errors - Start the form processing
							// CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
							if (count($errors) == 0) {

								// Permissions
								if (!isset($defaults['envo_permission'])) {
									$permission = 0;
								} elseif (in_array(0, $defaults['envo_permission'])) {
									$permission = 0;
								} else {
									$permission = join(',', $defaults['envo_permission']);
								}

								// EN:
								// CZ:
								if (!empty($defaults['envo_datedministration'])) {
									$admtime = date('Y-m-d H:i:s', strtotime($defaults['envo_datedministration']));
								} else {
									$admtime = '';
								}

								/* EN: Convert value
								 * smartsql - secure method to insert form data into a MySQL DB
								 * url_slug  - friendly URL slug from a string
								 * ------------------
								 * CZ: Převod hodnot
								 * smartsql - secure method to insert form data into a MySQL DB
								 * url_slug  - friendly URL slug from a string
								*/
								$result = $envodb -> query('UPDATE ' . $envotable . ' SET
                        name = "' . smartsql($defaults['envo_housename']) . '",
                        varname = "' . url_slug($defaults['envo_housename'], array ('transliterate' => TRUE)) . '",
                        headquarters = "' . smartsql($defaults['envo_househeadquarters']) . '",
                        street = "' . smartsql($defaults['envo_housestreet']) . '",
                        city = "' . smartsql($defaults['envo_housecity']) . '",
                        ku = "' . smartsql($defaults['envo_houseku']) . '",
                        psc = "' . smartsql($defaults['envo_housepsc']) . '",
                        ic = "' . smartsql($defaults['envo_houseic']) . '",
                        state = "' . smartsql($defaults['envo_housestate']) . '",
                        housefname = "' . smartsql($defaults['envo_housefname']) . '",
                        housefstreet = "' . smartsql($defaults['envo_housefstreet']) . '",
                        housefcity = "' . smartsql($defaults['envo_housefcity']) . '",
                        housefpsc = "' . smartsql($defaults['envo_housefpsc']) . '",
                        housefic = "' . smartsql($defaults['envo_housefic']) . '",
                        housefdic = "' . smartsql($defaults['envo_housefdic']) . '",
                        permission = "' . smartsql($permission) . '",
                        ares = "' . smartsql($defaults['envo_houseares']) . '",
                        justice = "' . smartsql($defaults['envo_housejustice']) . '",
                        estatemanagement = "' . smartsql($defaults['envo_estatemanagement']) . '",
                        administration = "' . smartsql($defaults['envo_houseadministration']) . '",
                        administrationdate = "' . $admtime . '",
                        housedescription = "' . smartsql($defaults['envo_housedescription']) . '",
                        mainemail = "' . smartsql($defaults['envo_houseemail']) . '",
                        created = "' . smartsql($defaults['envo_created']) . '",
                        updated = NOW()
                        WHERE id = "' . smartsql($pageID) . '"');

								if (!$result) {
									// EN: Redirect page
									// CZ: Přesměrování stránky
									envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=house&ssp=edithouse&id=' . $pageID . '&status=e');
								} else {
									// EN: Redirect page
									// CZ: Přesměrování stránky
									envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=house&ssp=edithouse&id=' . $pageID . '&status=s');
								}

							} else {
								$errors['e'] = $tl['general_error']['generror'] . '<br>';
								$errors      = $errors;
							}
						}
					}

					// Get all usergroup's for active plugin
					$ENVO_USERGROUP = envo_plugin_usergroup_all('usergroup', 'intranet2');

					// EN: Get all the data for the form - house
					// CZ: Získání všech dat pro formulář - bytový dům
					$ENVO_FORM_DATA = envo_get_data($pageID, $envotable);

					// Get all real estate management
					$ENVO_RESTMANA = envo_plugin_estate_management($envotable1, '');

					// EN: Getting the data about the city
					// CZ: Získání dat o městech
					$envocity = envo_get_region('', 'id, city', $envotable20, 'city ASC', 1);

					// Convert multidimensional array into single array
					$ENVO_CITY = [];
					foreach ($envocity as $ec) {
						$ENVO_CITY[] = array (
							'id'   => $ec['id'],
							'city' => $ec['city'],
						);
					}

					// EN: Getting the data about the katastrální území
					// CZ: Získání dat o katastrálních území
					$resultku = $envodb -> query('SELECT 
                                        t1.id,
                                        t1.city,
                                        t2.id,
                                        t2.city_id,
                                        t2.ku,
                                        t2.ku_code
                                      FROM
                                        cms_int2_settings_city t1
                                      LEFT JOIN 
                                        cms_int2_settings_ku t2
                                          ON t1.id = t2.city_id
                                        ORDER BY t2.ku');
					while ($rowku = $resultku -> fetch_assoc()) {
						// EN: Insert each record into array
						// CZ: Vložení získaných dat do pole
						$ENVO_KU[] = $rowku;
					}

					// Sort array
					$ENVO_KU = sort_array_mutlidim($ENVO_KU, 'city ASC');

					// EN: Get all the data for the form - Entrance
					// CZ: Získání všech dat pro formulář - Vchody
					$ENVO_FORM_DATA_ENT = envo_get_house_entrance($pageID, $envotable3);

					// EN: Get all the data for the form - Tasks
					// CZ: Získání všech dat pro formulář - Úkoly
					$ENVO_FORM_DATA_TASK = envo_get_house_task($pageID, $envotable2, $ENVO_SETTING_VAL['int2dateformat']);

					// EN: Get all the data for the form - documents
					// CZ: Získání všech dat pro formulář - dokumenty
					$ENVO_FORM_DATA_DOCU = envo_get_house_documents($pageID, $envotable4);

					// EN: Get all the data for the Photogallery - isotop photo
					// CZ: Získání všech dat pro Fotogalerii - isotop photo
					$ENVO_FORM_DATA_IMG = envo_get_house_image($pageID, $envotable5);

					// EN: Get all the data for the Photogallery - list photo
					// CZ: Získání všech dat pro Fotogalerii - list photo

					// EN: Setlocale
					$envodb -> query('SET lc_time_names = "' . $setting["locale"] . '"');
					// EN: Get 'timedefault'
					$result = $envodb -> query('SELECT DISTINCT(DATE_FORMAT(created, "%Y - %M")) as d FROM ' . $envotable5 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY created DESC');
					// EN: Get all photo by date for house
					while ($row = $result -> fetch_assoc()) {

						$date       = $row['d'];
						$dateFormat = ucwords(strtolower($date), '\'- ');;

						$test0_array[$date]['created'] = $dateFormat;

						//
						$result1 = $envodb -> query('SELECT * FROM ' . $envotable5 . ' WHERE houseid = "' . smartsql($pageID) . '" AND DATE_FORMAT(created,"%Y - %M") = "' . $date . '"');

						while ($row1 = $result1 -> fetch_assoc()) {

							$test0_array[$date]['photos'][] = $row1;

						}
					}

				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=house&status=ene');
				}


				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = $tlint2["int2_sec_title"]["int2t3"];
				$SECTION_DESC  = $tlint2["int2_sec_desc"]["int2d3"];

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_edithouse.php';

				break;
			case 'delete':
				// DELETE HOUSE FROM DB

				// EN: Default Variable
				// CZ: Hlavní proměnné
				$pageID = $page3;

				if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {
					/* EN: Delete all records
					 * 1. Get data for deleting
					 * 2. Delete records from DB 'int2_house'
					 * 3. Delete records from DB 'int2_houseent'
					 * 4. Delete records from DB 'int2_housetasks'
					 * 5. Delete records from DB 'int2_housedocu'
					 * 6. Delete records from DB 'int2_houseimg'
					 * 7. Delete all files and folder
					*/

					// EN: 1. Get data for deleting - main folder
					// CZ: 1. Získání dat potřebná k odstranění - hlavní adresář
					$resultfolder = $envodb -> query('SELECT folder FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '" LIMIT 1 ');
					$folder       = $resultfolder -> fetch_assoc();

					// EN: 2. Delete row from DB 'int2_house' - Main records about house
					// CZ: 2. Odstranění záznamu z DB 'int2_house' - Hlavní záznam o domu
					$result = $envodb -> query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '"');

					if (!$result) {
						// EN: Redirect page
						// CZ: Přesměrování stránky s notifikací - chybné
						envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=house&status=e');
					} else {

						// EN: 3. Delete row from DB 'int2_houseent' - Entrance
						// CZ: 3. Odstranění záznamu z DB 'int2_houseent' - Vchody
						$envodb -> query('DELETE FROM ' . $envotable3 . ' WHERE houseid = "' . smartsql($pageID) . '"');

						// EN: 4. Delete row from DB 'int2_housetasks' - Tasks
						// CZ: 4. Odstranění záznamu z DB 'int2_housetasks' - Úkoly
						$envodb -> query('DELETE FROM ' . $envotable2 . ' WHERE houseid = "' . smartsql($pageID) . '"');

						// EN: 5. Delete row from DB 'int2_housedocu' - Documents
						// CZ: 5. Odstranění záznamu z DB 'int2_housedocu' - Dokumenty
						$envodb -> query('DELETE FROM ' . $envotable4 . ' WHERE houseid = "' . smartsql($pageID) . '"');

						// EN: XX. Delete row from DB 'int2_houseimg' - Photogallery
						// CZ: XX. Odstranění záznamu z DB 'int2_houseimg' - Fotogalerie
						$envodb -> query('DELETE FROM ' . $envotable5 . ' WHERE houseid = "' . smartsql($pageID) . '"');

						// EN: 6. Delete files, folder
						// CZ: 6. Odstranění souborů a složek
						$pathfolder = APP_PATH . ENVO_FILES_DIRECTORY . $folder['folder'];
						delete_files($pathfolder);

						// EN: Redirect page
						// CZ: Přesměrování stránky s notifikací - úspěšné
						/*
						NOTIFIKACE:
						'status=s'    - Záznam úspěšně uložen
						'status1=s1'  - Záznam úspěšně odstraněn
						*/
						envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=house&status=&status1=s1');
					}

				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=house&status=ene');
				}

				break;
			case 'wizard':

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Intranet 2 - Průvodce';
				$SECTION_DESC  = 'Průvodce přidáním bytového domu do databáze';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_wizard.php';

				break;
			default:
				// HOUSE LIST

				// EN: Getting the data about the Houses
				// CZ: Získání dat o bytových domech
				$ENVO_HOUSE_ALL = envo_get_house_info($envotable);

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = $tlint2["int2_sec_title"]["int2t1"];
				$SECTION_DESC  = $tlint2["int2_sec_desc"]["int2d1"];

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_house.php';
		}

		break;
	case 'katastr':

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = 'Intranet 2 - Katastr';
		$SECTION_DESC  = '';

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_katastr.php';

		break;
	case 'maps':

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = 'Intranet 2 - Mapy';
		$SECTION_DESC  = '';

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_maps.php';

		break;
	case 'notification':
		// INTRANET NOTIFICATION

		switch ($page2) {
			case 'newnotification':
				// ADD NEW NOTIFICATION TO DB

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					// EN: Default Variable
					// CZ: Hlavní proměnné
					$defaults = $_POST;

					if (isset($_POST['btnSave'])) {

						// EN: Check if name of house isn't empty
						// CZ: Kontrola jestli je zadáný název domu
						if (empty($defaults['envo_title'])) {
							$errors['e1'] = $tlint2['int_error']['interror7'] . '<br>';
						}

						// EN: All checks are OK without Errors - Start the form processing
						// CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
						if (count($errors) == 0) {

							// Permissions
							if (!isset($defaults['envo_permission'])) {
								$permission = 0;
							} elseif (in_array(0, $defaults['envo_permission'])) {
								$permission = 0;
							} else {
								$permission = join(',', $defaults['envo_permission']);
							}

							/* EN: Convert value
							 * smartsql - secure method to insert form data into a MySQL DB
							 * url_slug  - friendly URL slug from a string
							 * ------------------
							 * CZ: Převod hodnot
							 * smartsql - secure method to insert form data into a MySQL DB
							 * url_slug  - friendly URL slug from a string
							*/
							$result = $envodb -> query('INSERT INTO ' . $envotable7 . ' SET 
                        name = "' . smartsql($defaults['envo_title']) . '",
                        varname = "' . url_slug($defaults['envo_title'], array ( 'transliterate' => TRUE )) . '",
                        type = "' . smartsql($defaults['envo_type']) . '",
                        shortdescription = "' . smartsql($defaults['envo_shortdescription']) . '",
                        content = "' . smartsql($defaults['envo_content']) . '",
                        permission = "' . smartsql($permission) . '",
                        created = NOW(),
                        updated = NOW()');

							$rowid = $envodb -> envo_last_id();

							// EN: User group access for notification
							// CZ: Přístup jednotlivých uživatelských skupin k notifikaci
							if (!isset($defaults['envo_permission'])) {
								// EN: Usergroup not exists
								// CZ: Uživatelská skupina neexistuje

								$envodb -> query('INSERT INTO ' . $envotable8 . ' SET 
                        notification_id = "' . $rowid . '",
                        usergroup_id = "0",
                        unread = "0",
                        created = NOW(),
                        updated = NOW()');

							} elseif (in_array(0, $defaults['envo_permission'])) {
								// EN: Usergroup exists, selection contains '0' value
								// CZ: Uživatelská skupina existuje, výběr obsahuje hodnotu "0"

								$envodb -> query('INSERT INTO ' . $envotable8 . ' SET 
                        notification_id = "' . $rowid . '",
                        usergroup_id = "0",
                        unread = "0",
                        created = NOW(),
                        updated = NOW()');

							} else {
								// EN: Usergoup exists, selection contains array
								// CZ: Uživatelská skupina existuje, výběr obsahuje pole

								foreach ($defaults['envo_permission'] as $permission) {
									$envodb -> query('INSERT INTO ' . $envotable8 . ' SET 
                        notification_id = "' . $rowid . '",
                        usergroup_id = "' . $permission . '",
                        unread = "0",
                        created = NOW(),
                        updated = NOW()');
								}

							}

							if (!$result) {
								// EN: Redirect page
								// CZ: Přesměrování stránky
								envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=notification&ssp=newnotification&status=e');
							} else {
								// EN: Redirect page
								// CZ: Přesměrování stránky
								envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=notification&ssp=editnotification&id=' . $rowid . '&status=s');
							}

						} else {
							$errors['e'] = $tl['general_error']['generror'] . '<br>';
							$errors      = $errors;
						}
					}
				}

				// Get all usergroup's for active plugin
				$ENVO_USERGROUP = envo_plugin_usergroup_all('usergroup', 'intranet2');

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = $tlint2["int2_sec_title"]["int2t5"];
				$SECTION_DESC  = $tlint2["int2_sec_desc"]["int2d5"];

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_newnotification.php';

				break;
			case 'editnotification':
				// EDIT NOTIFICATION

				// EN: Default Variable
				// CZ: Hlavní proměnné
				$pageID = $page3;

				if (is_numeric($pageID) && envo_row_exist($pageID, $envotable7)) {

					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						// EN: Default Variable
						// CZ: Hlavní proměnné
						$defaults = $_POST;

						if (isset($_POST['btnSave'])) {

							// EN: Check if name of house isn't empty
							// CZ: Kontrola jestli je zadáný název domu
							if (empty($defaults['envo_title'])) {
								$errors['e1'] = $tlint2['int_error']['interror7'] . '<br>';
							}

							// EN: All checks are OK without Errors - Start the form processing
							// CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
							if (count($errors) == 0) {

								// Permissions
								if (!isset($defaults['envo_permission'])) {
									$permission = 0;
								} elseif (in_array(0, $defaults['envo_permission'])) {
									$permission = 0;
								} else {
									$permission = join(',', $defaults['envo_permission']);
								}

								/* EN: Convert value
								 * smartsql - secure method to insert form data into a MySQL DB
								 * url_slug  - friendly URL slug from a string
								 * ------------------
								 * CZ: Převod hodnot
								 * smartsql - secure method to insert form data into a MySQL DB
								 * url_slug  - friendly URL slug from a string
								*/
								$result = $envodb -> query('UPDATE ' . $envotable7 . ' SET
                        name = "' . smartsql($defaults['envo_title']) . '",
                        varname = "' . url_slug($defaults['envo_title'], array ( 'transliterate' => TRUE )) . '",
                        type = "' . smartsql($defaults['envo_type']) . '",
                        shortdescription = "' . smartsql($defaults['envo_shortdescription']) . '",
                        content = "' . smartsql($defaults['envo_content']) . '",
                        permission = "' . smartsql($permission) . '",
                        updated = NOW()
                        WHERE id = "' . smartsql($pageID) . '"');

								// EN: Delete user group acces for notification by 'id'
								// CZ: Odstranění přístupu uživatelské skupiny pro notifikaci podle 'id'
								$envodb -> query('DELETE FROM ' . $envotable8 . ' WHERE notification_id = "' . smartsql($pageID) . '"');

								// EN: User group access for notification
								// CZ: Přístup jednotlivých uživatelských skupin k notifikaci
								if (!isset($defaults['envo_permission'])) {
									// EN: Usergroup not exists
									// CZ: Uživatelská skupina neexistuje

									$envodb -> query('INSERT INTO ' . $envotable8 . ' SET 
                        notification_id = "' . $pageID . '",
                        usergroup_id = "0",
                        unread = "0",
                        updated = NOW()');

								} elseif (in_array(0, $defaults['envo_permission'])) {
									// EN: Usergroup exists, selection contains '0' value
									// CZ: Uživatelská skupina existuje, výběr obsahuje hodnotu "0"

									$envodb -> query('INSERT INTO ' . $envotable8 . ' SET 
                        notification_id = "' . $pageID . '",
                        usergroup_id = "0",
                        unread = "0",
                        updated = NOW()');

								} else {
									// EN: Usergoup exists, selection contains array
									// CZ: Uživatelská skupina existuje, výběr obsahuje pole

									foreach ($defaults['envo_permission'] as $permission) {
										$envodb -> query('INSERT INTO ' . $envotable8 . ' SET 
                        notification_id = "' . $pageID . '",
                        usergroup_id = "' . $permission . '",
                        unread = "0",
                        updated = NOW()');
									}

								}

								if (!$result) {
									// EN: Redirect page
									// CZ: Přesměrování stránky
									envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=notification&ssp=editnotification&id=' . $pageID . '&status=e');
								} else {
									// EN: Redirect page
									// CZ: Přesměrování stránky
									envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=notification&ssp=editnotification&id=' . $pageID . '&status=s');
								}

							} else {
								$errors['e'] = $tl['general_error']['generror'] . '<br>';
								$errors      = $errors;
							}

						}
					}

					// Get all usergroup's for active plugin
					$ENVO_USERGROUP = envo_plugin_usergroup_all('usergroup', 'intranet2');

					// EN: Get all the data for the form - Notification
					// CZ: Získání všech dat pro formulář - Notifikace
					$ENVO_FORM_DATA = envo_get_data($pageID, $envotable7);

					// EN: Title and Description
					// CZ: Titulek a Popis
					$SECTION_TITLE = $tlint2["int2_sec_title"]["int2t6"];
					$SECTION_DESC  = $tlint2["int2_sec_desc"]["int2d6"];

					// EN: Load the php template
					// CZ: Načtení php template (šablony)
					$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_editnotification.php';

				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=notification&status=ene');
				}

				break;
			case 'delete':
				// DELETE NOTIFICATION FROM DB

				// EN: Default Variable
				// CZ: Hlavní proměnné
				$pageID = $page3;

				if (is_numeric($pageID) && envo_row_exist($pageID, $envotable7)) {

					// Delete the Content
					$result = $envodb -> query('DELETE FROM ' . $envotable7 . ' WHERE id = "' . smartsql($pageID) . '"');
					$result = $envodb -> query('DELETE FROM ' . $envotable8 . ' WHERE notification_id = "' . smartsql($pageID) . '"');

					if (!$result) {
						// EN: Redirect page
						// CZ: Přesměrování stránky s notifikací - chybné
						envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=notification&status=e');
					} else {
						// EN: Redirect page
						// CZ: Přesměrování stránky s notifikací - úspěšné
						/*
						NOTIFIKACE:
						'status=s'    - Záznam úspěšně uložen
						'status1=s1'  - Záznam úspěšně odstraněn
						*/
						envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=notification&status=s&status1=s1');
					}

				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=notification&status=ene');
				}
				break;
			default:
				// LIST OF NOTIFICATIONS

				// EN: Getting the data about the Houses
				// CZ: Získání dat o bytových domech
				$ENVO_NOTIFICATION_ALL = envo_get_notification_info($envotable7);

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = $tlint2["int2_sec_title"]["int2t4"];
				$SECTION_DESC  = $tlint2["int2_sec_desc"]["int2d4"];

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_notification.php';

		}

		break;
	case 'setting':
		// SETTING

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// EN: Default Variable
			// CZ: Hlavní proměnné
			$defaults = $_POST;

			if (count($errors) == 0) {

				/* EN: Convert value
				 * smartsql - secure method to insert form data into a MySQL DB
				 * ------------------
				 * CZ: Převod hodnot
				 * smartsql - secure method to insert form data into a MySQL DB
				*/
				$result = $envodb -> query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
                    WHEN "int2title" THEN "' . smartsql($defaults['envo_title']) . '"
                  END
                  WHERE varname IN ("int2title")');

				if (!$result) {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=setting&status=e');
				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=setting&status=s');
				}
			} else {
				$errors['e'] = $tl['general_error']['generror'] . '<br>';
				$errors      = $errors;
			}
		}

		// EN: Import important settings for the template from the DB
		// CZ: Importuj důležité nastavení pro šablonu z DB
		$ENVO_SETTING = envo_get_setting('intranet2');

		// EN: Import important settings for the template from the DB (only VALUE)
		// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
		$ENVO_SETTING_VAL = envo_get_setting_val('intranet2');

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = $tlint2["int2_sec_title"]["int2t"];
		$SECTION_DESC  = $tlint2["int2_sec_desc"]["int2d"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_setting.php';

		break;
	default:
		// MAIN PAGE OF PLUGIN - LIST

		// ----------- ERROR: REDIRECT PAGE ------------
		// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

		// EN: If not exist value in 'case', redirect page to 404
		// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
		$pagearray = array ('house', 'setting');
		if (!empty($page1) && !is_numeric($page1)) {
			if (in_array($page1, $pagearray)) {
				envo_redirect(ENVO_rewrite ::envoParseurl('404'));
			}
		}

	// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
	// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

}

?>