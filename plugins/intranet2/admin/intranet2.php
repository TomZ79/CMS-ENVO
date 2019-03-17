<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$envouser -> envoModuleAccess(ENVO_USERID, ENVO_ACCESS_INTRANET2)) envo_redirect(BASE_URL);

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
$envotable9  = DB_PREFIX . 'int2_housecontacts';
$envotable10 = DB_PREFIX . 'int2_contract';
$envotable11 = DB_PREFIX . 'int2_contractdocu';
$envotable20 = DB_PREFIX . 'int2_settings_city';
$envotable21 = DB_PREFIX . 'int2_settings_ku';
$envotable22 = DB_PREFIX . 'int2_settings_district';

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
		// HOUSE

		switch ($page2) {
			case 'newhouse':
				// ADD NEW HOUSE TO DB

				// EN: Default Variable
				// CZ: Hlavní proměnné
				$ico = $page3;

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					// EN: Default Variable
					// CZ: Hlavní proměnné
					$defaults = $_POST;

					if (isset($_POST['btnSave'])) {

						// EN: Check if name of house isn't empty
						// CZ: Kontrola jestli je zadáný název domu
						if (empty($defaults['envo_housename'])) {
							$errors['e1'] = $tlint2['int2_error']['int2error'] . '<br>';
						}

						// EN: Check if ic of house isn't empty
						// CZ: Kontrola jestli je zadáné ič
						if (!isset($defaults['envo_houseic']) || !is_numeric($defaults['envo_houseic'])) {
							$errors['e2'] = $tlint2['int2_error']['int2error8'] . '<br>';
						}

						// EN: Check if the ic exists
						// CZ: Kontrola jestli ič existuje
						if (isset($defaults['envo_houseic']) && is_numeric($defaults['envo_houseic']) && envo_house_exist($defaults['envo_houseic'], $envotable) && ($defaults['envo_houseic'] != '0')) {
							$errors['e3'] = $tlint2['int2_error']['int2error5'] . '<br>';
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


							// EN:
							// CZ:
							if (!empty($defaults['envo_house_cuzk_city'])) {
								$result       = $envodb -> query('SELECT city_name, city_cuzk_code FROM ' . $envotable20 . ' WHERE id = "' . smartsql($defaults['envo_house_cuzk_city']) . '" LIMIT 1 ');
								$envocuzkcity = $result -> fetch_assoc();
							}

							// EN:
							// CZ:
							if (!empty($defaults['envo_house_cuzk_ku'])) {
								$result     = $envodb -> query('SELECT ku_name, ku_cuzk_code FROM ' . $envotable21 . ' WHERE id = "' . smartsql($defaults['envo_house_cuzk_ku']) . '" LIMIT 1 ');
								$envocuzkku = $result -> fetch_assoc();
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
Město:     						' . $envocuzkcity["city_name"] . ' [' . $envocuzkcity["city_cuzk_code"] . ']
Katastrální území:    ' . $envocuzkku["ku_name"] . ' [' . $envocuzkku["ku_cuzk_code"] . ']
PSČ:      						' . $defaults['envo_housepsc'] . '
IČ:       						' . $defaults['envo_houseic'] . '
Složka domu:   				' . $pathfolder . '
';
								$data = iconv(mb_detect_encoding($data, mb_detect_order(), TRUE), 'UTF-8', $data);
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
                        psc = "' . smartsql($defaults['envo_housepsc']) . '",
                        ic = "' . smartsql($defaults['envo_houseic']) . '",
                        cuzk_city = "' . smartsql($defaults['envo_house_cuzk_city']) . '",
                        cuzk_ku_id = "' . smartsql($defaults['envo_house_cuzk_ku']) . '",
                        cuzk_objcode = "' . smartsql($defaults['envo_house_cuzk_objcode']) . '",
                        state = "' . smartsql($defaults['envo_housestate']) . '",
                        housefname = "' . smartsql($defaults['envo_housefname']) . '",
                        housefstreet = "' . smartsql($defaults['envo_housefstreet']) . '",
                        housefcity = "' . smartsql($defaults['envo_housefcity']) . '",
                        housefpsc = "' . smartsql($defaults['envo_housefpsc']) . '",
                        housefic = "' . smartsql($defaults['envo_housefic']) . '",
                        housefdic = "' . smartsql($defaults['envo_housefdic']) . '",
                        maingpsstreet = "' . smartsql($defaults['envo_house_maingpsstreet']) . '",
                        maingpscity = "' . smartsql($defaults['envo_house_maingpscity']) . '",
                        maingpslat = "' . smartsql($defaults['envo_house_maingpslat']) . '",
                        maingpslng = "' . smartsql($defaults['envo_house_maingpslng']) . '",
                        permission = "' . smartsql($permission) . '",
                        ares = "' . smartsql($defaults['envo_houseares']) . '",
                        justice = "' . smartsql($defaults['envo_housejustice']) . '",
                        estatemanagement = "' . smartsql($defaults['envo_estatemanagement']) . '",
                        estatemanagementdesc = "' . smartsql($defaults['envo_estatemanagementdesc']) . '",
                        administration = "' . smartsql($defaults['envo_houseadministration']) . '",
                        administrationdate = "' . $admtime . '",
                        housedescription = "' . smartsql($defaults['envo_housedescription']) . '",
                        folder = "' . $pathfolder . '",
                        blacklist = "' . smartsql($defaults['envo_houseblacklist']) . '",
                        blacklistdesc = "' . smartsql($defaults['envo_houseblacklistdesc']) . '",
                        created = "' . smartsql($defaults['envo_created']) . '",
                        updated = "' . smartsql($defaults['envo_created']) . '"');

							$rowid = $envodb -> envo_last_id();

							if (!$result) {
								// EN: Redirect page
								// CZ: Přesměrování stránky
								envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=house&ssp=newhouse&status=e');
							} else {

								// EN:
								// CZ: Uložení statistických dat o bytovém domě
								$envodb -> query('INSERT INTO ' . DB_PREFIX . 'int2_statistical_data SET 
                        houseid = "' . smartsql($rowid) . '",
                        b_structure = "' . smartsql($defaults['envo_housebuildingstructure']) . '",
                        b_structure_upl = "' . smartsql($defaults['envo_housebuildingstructure_upl']) . '",
                        p_construction = "' . smartsql($defaults['envo_houseperiodconstruction']) . '",
                        p_construction_upl = "' . smartsql($defaults['envo_houseperiodconstruction_upl']) . '",
                        p_typehouse = "' . smartsql($defaults['envo_housetype']) . '",
                        p_typehouse_upl = "' . smartsql($defaults['envo_housetype_upl']) . '",
                        p_typeuse = "' . smartsql($defaults['envo_housetypeuse']) . '",
                        p_typeuse_upl = "' . smartsql($defaults['envo_housetypeuse_upl']) . '",
                        created = NOW(),
                        updated = NOW()');

								// EN: Write to log
								// CZ: Zápis dat do logu
								// Get IP address
								if (($remote_ipaddr = $_SERVER['REMOTE_ADDR']) == '') {
									$remote_ipaddr = "REMOTE_ADDR_UNKNOWN";
								}

								// Get User agent
								if (($user_agent = $_SERVER['HTTP_USER_AGENT']) == '') {
									$user_agent = "REMOTE_USERAGENT_UNKNOWN";
								}

								// Get requested script
								if (($request_uri = $_SERVER['REQUEST_URI']) == '') {
									$request_uri = "REQUEST_URI_UNKNOWN";
								}

								write_mysql_log(ENVO_USERID, $remote_ipaddr, $request_uri, $user_agent, $page2, '', $rowid);

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

				// EN: Select category by "Add article" in "Categories"
				// CZ: Výběr kategorie pro "Přidat článek" v "Kategoriích"
				if (is_numeric($ico)) {
					$ENVO_ICO_SELECTED = $ico;
				}

				// EN: Getting the data about the city
				// CZ: Získání dat o městech
				$envocity = $envodb -> query('SELECT 
                                        t1.*,
                                        t2.district_name
                                      FROM
                                        ' . $envotable20 . ' t1
                                      LEFT JOIN 
                                        ' . $envotable22 . ' t2
                                          ON t1.district_id = t2.id
                                        ORDER BY t1.city_name ASC');
				while ($rowcity = $envocity -> fetch_assoc()) {
					// EN: Insert each record into array
					// CZ: Vložení získaných dat do pole
					$ENVO_CITY[] = $rowcity;
				}
				// EN: Getting the data about the katastrální území
				// CZ: Získání dat o katastrálních území
				$resultku = $envodb -> query('SELECT 
                                        t1.id,
                                        t1.city_name,
                                        t2.id,
                                        t2.city_id,
                                        t2.ku_name,
                                        t2.ku_cuzk_code
                                      FROM
                                        cms_int2_settings_city t1
                                      LEFT JOIN 
                                        cms_int2_settings_ku t2
                                          ON t1.id = t2.city_id
                                        ORDER BY t2.ku_name');
				while ($rowku = $resultku -> fetch_assoc()) {
					// EN: Insert each record into array
					// CZ: Vložení získaných dat do pole
					$ENVO_KU[] = $rowku;
				}

				// Sort array
				$ENVO_KU = sort_array_mutlidim($ENVO_KU, 'city_name ASC');

				// EN: Getting the data about the Období výstavby domu
				// CZ: Získání dat o Období výstavby domu
				$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_settings_period_construction');
				while ($row = $result -> fetch_assoc()) {
					// EN: Insert each record into array
					// CZ: Vložení získaných dat do pole
					$ENVO_PERIOD_CONSTRUCTION[] = $row;
				}

				// EN: Getting the data about the Druhy konstrukcí stavebního objektu
				// CZ: Získání dat o Druhy konstrukcí stavebního objektu
				$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_settings_building_structure');
				while ($row = $result -> fetch_assoc()) {
					// EN: Insert each record into array
					// CZ: Vložení získaných dat do pole
					$ENVO_BUILDING_STRUCTURE[] = $row;
				}

				// EN: Getting the data about the Type of house
				// CZ: Získání dat o Druhu domu
				$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_settings_type_house');
				while ($row = $result -> fetch_assoc()) {
					// EN: Insert each record into array
					// CZ: Vložení získaných dat do pole
					$ENVO_TYPE_HOUSE[] = $row;
				}

				// EN: Getting the data about the Building use type
				// CZ: Získání dat o Typ využití budovy
				$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_settings_type_use');
				while ($row = $result -> fetch_assoc()) {
					// EN: Insert each record into array
					// CZ: Vložení získaných dat do pole
					$ENVO_TYPE_USE[] = $row;
				}

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
								$errors['e1'] = $tlint2['int2_error']['int2error'] . '<br>';
							}

							// EN: Check if ic of house isn't empty
							// CZ: Kontrola jestli je zadáné ič
							if (!isset($defaults['envo_houseic']) || !is_numeric($defaults['envo_houseic'])) {
								$errors['e2'] = $tlint2['int2_error']['int2error8'] . '<br>';
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
                        psc = "' . smartsql($defaults['envo_housepsc']) . '",
                        ic = "' . smartsql($defaults['envo_houseic']) . '",
                        state = "' . smartsql($defaults['envo_housestate']) . '",
                        cuzk_city = "' . smartsql($defaults['envo_house_cuzk_city']) . '",
                        cuzk_ku_id = "' . smartsql($defaults['envo_house_cuzk_ku']) . '",
                        cuzk_objcode = "' . smartsql($defaults['envo_house_cuzk_objcode']) . '",
                        housefname = "' . smartsql($defaults['envo_housefname']) . '",
                        housefstreet = "' . smartsql($defaults['envo_housefstreet']) . '",
                        housefcity = "' . smartsql($defaults['envo_housefcity']) . '",
                        housefpsc = "' . smartsql($defaults['envo_housefpsc']) . '",
                        housefic = "' . smartsql($defaults['envo_housefic']) . '",
                        housefdic = "' . smartsql($defaults['envo_housefdic']) . '",
                        maingpsstreet = "' . smartsql($defaults['envo_house_maingpsstreet']) . '",
                        maingpscity = "' . smartsql($defaults['envo_house_maingpscity']) . '",
                        maingpslat = "' . smartsql($defaults['envo_house_maingpslat']) . '",
                        maingpslng = "' . smartsql($defaults['envo_house_maingpslng']) . '",
                        permission = "' . smartsql($permission) . '",
                        ares = "' . smartsql($defaults['envo_houseares']) . '",
                        justice = "' . smartsql($defaults['envo_housejustice']) . '",
                        estatemanagement = "' . smartsql($defaults['envo_estatemanagement']) . '",
                        estatemanagementdesc = "' . smartsql($defaults['envo_estatemanagementdesc']) . '",
                        administration = "' . smartsql($defaults['envo_houseadministration']) . '",
                        administrationdate = "' . $admtime . '",
                        housedescription = "' . smartsql($defaults['envo_housedescription']) . '",
                        mainemail = "' . smartsql($defaults['envo_houseemail']) . '",
                        blacklist = "' . smartsql($defaults['envo_houseblacklist']) . '",
                        blacklistdesc = "' . smartsql($defaults['envo_houseblacklistdesc']) . '",
                        created = "' . smartsql($defaults['envo_created']) . '",
                        updated = NOW()
                        WHERE id = "' . smartsql($pageID) . '"');

								if (!$result) {
									// EN: Redirect page
									// CZ: Přesměrování stránky
									envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=house&ssp=edithouse&id=' . $pageID . '&status=e');
								} else {

									// EN:
									// CZ: Uložení statistických dat o bytovém domě
									$resultA = $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'int2_statistical_data WHERE houseid = "' . smartsql($pageID) . '" LIMIT 1');
									// EN: Determine the number of rows in the result from DB
									// CZ: Určení počtu řádků ve výsledku z DB
									$row_cntA = $resultA -> num_rows;

									if ($row_cntA > 0) {
										$envodb -> query('UPDATE ' . DB_PREFIX . 'int2_statistical_data SET
                        b_structure = "' . smartsql($defaults['envo_housebuildingstructure']) . '",
                        b_structure_upl = "' . smartsql($defaults['envo_housebuildingstructure_upl']) . '",
                        p_construction = "' . smartsql($defaults['envo_houseperiodconstruction']) . '",
                        p_construction_upl = "' . smartsql($defaults['envo_houseperiodconstruction_upl']) . '",
                        p_typehouse = "' . smartsql($defaults['envo_housetype']) . '",
                        p_typehouse_upl = "' . smartsql($defaults['envo_housetype_upl']) . '",
                        p_typeuse = "' . smartsql($defaults['envo_housetypeuse']) . '",
                        p_typeuse_upl = "' . smartsql($defaults['envo_housetypeuse_upl']) . '",
                        updated = NOW()
                        WHERE houseid = "' . smartsql($pageID) . '"');
									} else {
										$envodb -> query('INSERT INTO ' . DB_PREFIX . 'int2_statistical_data SET 
                        houseid = "' . smartsql($pageID) . '",
                        b_structure = "' . smartsql($defaults['envo_housebuildingstructure']) . '",
                        b_structure_upl = "' . smartsql($defaults['envo_housebuildingstructure_upl']) . '",
                        p_construction = "' . smartsql($defaults['envo_houseperiodconstruction']) . '",
                        p_construction_upl = "' . smartsql($defaults['envo_houseperiodconstruction_upl']) . '",
                        p_typehouse = "' . smartsql($defaults['envo_housetype']) . '",
                        p_typehouse_upl = "' . smartsql($defaults['envo_housetype_upl']) . '",
                        p_typeuse = "' . smartsql($defaults['envo_housetypeuse']) . '",
                        p_typeuse_upl = "' . smartsql($defaults['envo_housetypeuse_upl']) . '",
                        created = NOW(),
                        updated = NOW()');
									}

									// EN: Write to log
									// CZ: Zápis dat do logu
									// Get IP address
									if (($remote_ipaddr = $_SERVER['REMOTE_ADDR']) == '') {
										$remote_ipaddr = "REMOTE_ADDR_UNKNOWN";
									}

									// Get User agent
									if (($user_agent = $_SERVER['HTTP_USER_AGENT']) == '') {
										$user_agent = "REMOTE_USERAGENT_UNKNOWN";
									}

									// Get requested script
									if (($request_uri = $_SERVER['REQUEST_URI']) == '') {
										$request_uri = "REQUEST_URI_UNKNOWN";
									}

									$resultC = $envodb -> query('UPDATE ' . DB_PREFIX . 'int2_houselog SET  user_action = "edithouse" WHERE houseedit_id > 0 ');

									write_mysql_log(ENVO_USERID, $remote_ipaddr, $request_uri, $user_agent, $page2, $pageID, '');

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
					$envocity = $envodb -> query('SELECT 
                                        t1.*,
                                        t2.district_name
                                      FROM
                                        ' . $envotable20 . ' t1
                                      LEFT JOIN 
                                        ' . $envotable22 . ' t2
                                          ON t1.district_id = t2.id
                                        ORDER BY t1.city_name ASC');
					while ($rowcity = $envocity -> fetch_assoc()) {
						// EN: Insert each record into array
						// CZ: Vložení získaných dat do pole
						$ENVO_CITY[] = $rowcity;
					}

					// EN: Getting the data about the katastrální území
					// CZ: Získání dat o katastrálních území
					$resultku = $envodb -> query('SELECT 
                                        t1.id,
                                        t1.city_name,
                                        t2.id,
                                        t2.city_id,
                                        t2.ku_name,
                                        t2.ku_cuzk_code
                                      FROM
                                        cms_int2_settings_city t1
                                      LEFT JOIN 
                                        cms_int2_settings_ku t2
                                          ON t1.id = t2.city_id
                                        ORDER BY t2.ku_name');
					while ($rowku = $resultku -> fetch_assoc()) {
						// EN: Insert each record into array
						// CZ: Vložení získaných dat do pole
						$ENVO_KU[] = $rowku;
					}

					// Sort array
					$ENVO_KU = sort_array_mutlidim($ENVO_KU, 'city_name ASC');

					// EN: Getting the data about the Období výstavby domu
					// CZ: Získání dat o Období výstavby domu
					$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_settings_period_construction');
					while ($row = $result -> fetch_assoc()) {
						// EN: Insert each record into array
						// CZ: Vložení získaných dat do pole
						$ENVO_PERIOD_CONSTRUCTION[] = $row;
					}

					// EN: Getting the data about the Druhy konstrukcí stavebního objektu
					// CZ: Získání dat o Druhy konstrukcí stavebního objektu
					$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_settings_building_structure');
					while ($row = $result -> fetch_assoc()) {
						// EN: Insert each record into array
						// CZ: Vložení získaných dat do pole
						$ENVO_BUILDING_STRUCTURE[] = $row;
					}

					// EN: Getting the data about the Type of house
					// CZ: Získání dat o Druhu domu
					$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_settings_type_house');
					while ($row = $result -> fetch_assoc()) {
						// EN: Insert each record into array
						// CZ: Vložení získaných dat do pole
						$ENVO_TYPE_HOUSE[] = $row;
					}

					// EN: Getting the data about the Building use type
					// CZ: Získání dat o Typ využití budovy
					$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_settings_type_use');
					while ($row = $result -> fetch_assoc()) {
						// EN: Insert each record into array
						// CZ: Vložení získaných dat do pole
						$ENVO_TYPE_USE[] = $row;
					}

					// EN: Getting the data about the statistical
					// CZ: Získání statistických dat
					$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int2_statistical_data  WHERE houseid = "' . smartsql($pageID) . '" LIMIT 1');
					while ($row = $result -> fetch_assoc()) {
						// EN: Insert each record into array
						// CZ: Vložení získaných dat do pole
						$envostatistical[] = $row;
					}

					// Convert multidimensional array to associated array
					$ENVO_STATISTICAL = array ();
					if (isset($envostatistical) && is_array($envostatistical)) {
						foreach ($envostatistical as $array) {
							foreach ($array as $k => $v) {
								$ENVO_STATISTICAL[$k] = $v;
							}
						}
					}

					// EN: Get all the data for the form - Entrance
					// CZ: Získání všech dat pro formulář - Vchody
					$ENVO_FORM_DATA_ENT = envo_get_house_entrance($pageID, $envotable3);

					// EN: Get all the data for the form - Contacts
					// CZ: Získání všech dat pro formulář - Kontakty
					$ENVO_FORM_DATA_CONT = envo_get_house_contact($pageID, $envotable9, $ENVO_SETTING_VAL['int2dateformat']);

					// EN: Get all the data for the form - Tasks
					// CZ: Získání všech dat pro formulář - Úkoly
					$ENVO_FORM_DATA_TASK = envo_get_house_task($pageID, $envotable2, $ENVO_SETTING_VAL['int2dateformat']);

					// EN: Get all the data for the form - Documents
					// CZ: Získání všech dat pro formulář - Dokumenty
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
						$dateFormat = ucwords(strtolower($date), '\'- ');

						$test0_array[$date]['created'] = $dateFormat;

						//
						$result1 = $envodb -> query('SELECT * FROM ' . $envotable5 . ' WHERE houseid = "' . smartsql($pageID) . '" AND DATE_FORMAT(created,"%Y - %M") = "' . $date . '"');

						while ($row1 = $result1 -> fetch_assoc()) {

							$test0_array[$date]['photos'][] = $row1;

						}
					}

					// EN: Getting count image in each year
					// CZ:
					$result2 = $envodb -> query('SELECT COUNT(id) AS countimg, YEAR(exifcreatedate) AS year FROM ' . $envotable5 . ' WHERE houseid = "' . smartsql($pageID) . '" GROUP BY YEAR(exifcreatedate)');
					while ($row2 = $result2 -> fetch_assoc()) {
						// EN: Insert each record into array
						// CZ: Vložení získaných dat do pole
						$ENVO_FORM_DATA_IMG_COUNT[] = $row2;
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
			case 'houselist':
				// HOUSE LIST

				switch ($page3) {
					case 'city':
						// HOUSE LIST - RECORDS BY CITY

						// EN: Default Variable
						// CZ: Hlavní proměnné
						$pageID = $page4;

						if (is_numeric($pageID) && envo_row_exist($pageID, $envotable20)) {

							// EN: Getting the data about the Houses by usergroupid
							// CZ: Získání dat o bytových domech podle 'id' uživatelské skupiny
							$ENVO_HOUSE_ALL = envo_get_house_info($envotable, $envotable20, 't1.city = ' . $pageID);

							// EN: Title and Description
							// CZ: Titulek a Popis
							$SECTION_TITLE = $tlint2["int2_sec_title"]["int2t7"];
							$SECTION_DESC  = $tlint2["int2_sec_desc"]["int2d7"];

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

						if (is_numeric($pageID) && envo_row_exist($pageID, $envotable1)) {

							// EN: Getting the data about the Houses by usergroupid
							// CZ: Získání dat o bytových domech podle 'id' uživatelské skupiny
							$ENVO_HOUSE_ALL = envo_get_house_info($envotable, $envotable20, 't1.estatemanagement = ' . $pageID);

							// EN: Title and Description
							// CZ: Titulek a Popis
							$SECTION_TITLE = $tlint2["int2_sec_title"]["int2t7"];
							$SECTION_DESC  = $tlint2["int2_sec_desc"]["int2d7"];

							// EN: Load the php template
							// CZ: Načtení php template (šablony)
							$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_house_list.php';

						} else {

							envo_redirect($backtoplugin);

						}

						break;
					case 'livesearch':
						// HOUSE LIST - RECORDS BY LIVE SEARCH

						if ($_SERVER['REQUEST_METHOD'] == 'POST') {
							// EN: Default Variable
							// CZ: Hlavní proměnné
							$defaults = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

							// EN: Getting the data about the Houses
							// CZ: Získání dat o bytových domech
							$search = $defaults['searchtext'];
							// Slug by charatcter maps
							$search_slug = simpleslug($search);
							// Create array by multiexplode function
							$search_list = multiexplode(array (',', ', ', '|', ':', '+', '-', ' '), $search_slug);
							$string_impl = implode(',', $search_list);
							$sql         = '';
							if (count($search_list) >= 1) {

								for ($i = 0; $i < count($search_list); $i++) {
									if (is_numeric($search_list[$i]) && (strlen((string)$search_list[$i]) == 8)) {
										$search_ic[] = $search_list[$i];
									} else {
										$search_query[] = $search_list[$i];
									}
								}

								if (isset($search_ic) && is_array($search_ic)) {

									$sql = 't1.ic = "' . $search_ic[0] . '"';

								} else {

									for ($i = 0; $i < count($search_list); $i++) {
										if ($i == 0) {
											$sql = '(t1.name LIKE "%' . $search_list[0] . '%" OR t1.ic LIKE "%' . $search_list[0] . '%")';
										} else {
											$sql .= 'AND (t1.name LIKE "%' . $search_list[$i] . '%" OR t1.ic LIKE "%' . $search_list[0] . '%")';
										}
									}

								}

							}

							$result = $envodb -> query('SELECT
																		t1.*,
																		t2.city_name
																	FROM
																		' . $envotable . ' t1
																	LEFT JOIN 
																		' . $envotable20 . ' t2
																			ON t1.city = t2.id
																	WHERE ' . $sql . ' 
																	ORDER BY t1.id ASC');

							while ($row = $result -> fetch_assoc()) {

								// EN: Insert each record into array
								// CZ: Vložení získaných dat do pole
								$ENVO_HOUSE_ALL[] = array (
									'id'         => $row['id'],
									'name'       => $row['name'],
									'street'     => $row['street'],
									'city_name'  => $row['city_name'],
									'ic'         => $row['ic'],
									'searchtext' => $string_impl
								);
							}

						}

						// EN: Title and Description
						// CZ: Titulek a Popis
						$SECTION_TITLE = $tlint2["int2_sec_title"]["int2t7"];
						$SECTION_DESC  = $tlint2["int2_sec_desc"]["int2d7"];

						// EN: Load the php template
						// CZ: Načtení php template (šablony)
						$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_house_list.php';

						break;
					case 'filtersearch':
						// HOUSE LIST - RECORDS BY FILTER SEARCH

						if ($_SERVER['REQUEST_METHOD'] == 'POST') {
							// EN: Default Variable
							// CZ: Hlavní proměnné
							//$defaults = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
							$defaults = $_POST;

							if (empty($defaults['envo_filtercondition']) || empty($defaults['envo_filtercolumn']) || empty($defaults['envo_filtervalue'])) {
								$errors['e1'] = 'Nekompletní dotaz Mysql';
							}

							// EN: All checks are OK without Errors - Start the form processing
							// CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
							if (count($errors) == 0) {

								if (!empty($defaults['envo_filtercity'])) {
									$sqlcity = 'WHERE t1.city = ' . $defaults['envo_filtercity'];
								}

								if (!empty($defaults['envo_filtercity']) && !empty($defaults['envo_filtercolumn'])) {
									$sql = ' AND ' . $defaults['envo_filtercolumn'] . ' ' . $defaults['envo_filtervalue'];
								} else if (($defaults['envo_filtercolumn'] == 't1.housedescription') && ($defaults['envo_filtervalue'] == 'IS NOT NULL')) {
									$sql = $defaults['envo_filtercondition'] . ' ' . $defaults['envo_filtercolumn'] . ' != ""';
								} else {
									$sql = $defaults['envo_filtercondition'] . ' ' . $defaults['envo_filtercolumn'] . ' ' . $defaults['envo_filtervalue'];
								}

								$result = $envodb -> query('SELECT
																		t1.*,
																		t2.city_name
																	FROM
																		' . $envotable . ' t1
																	LEFT JOIN 
																		' . $envotable20 . ' t2
																			ON t1.city = t2.id
																	' . $sqlcity . $sql . '
																	ORDER BY t1.id ASC');

								while ($row = $result -> fetch_assoc()) {

									// EN: Insert each record into array
									// CZ: Vložení získaných dat do pole
									$ENVO_HOUSE_ALL[] = array (
										'id'         => $row['id'],
										'name'       => $row['name'],
										'street'     => $row['street'],
										'city_name'  => $row['city_name'],
										'ic'         => $row['ic'],
										'searchtext' => $string_impl
									);
								}

								// EN: Title and Description
								// CZ: Titulek a Popis
								$SECTION_TITLE = $tlint2["int2_sec_title"]["int2t7"];
								$SECTION_DESC  = $tlint2["int2_sec_desc"]["int2d7"];

								// EN: Load the php template
								// CZ: Načtení php template (šablony)
								$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_house_list.php';

							} else {
								$errors = $errors;

								// EN: Title and Description
								// CZ: Titulek a Popis
								$SECTION_TITLE = $tlint2["int2_sec_title"]["int2t1"];
								$SECTION_DESC  = $tlint2["int2_sec_desc"]["int2d1"];

								// EN: Load the php template
								// CZ: Načtení php template (šablony)
								$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_house.php';
							}

						}

						break;
					default:
						// HOUSE LIST - ALL RECORDS

						// ----------- ERROR: REDIRECT PAGE ------------
						// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

						// EN: If not exist value in 'case', redirect page to 404
						// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
						if (!empty($page3)) {
							if ($page3 != 'city' || $page3 != 'estatemanagement' || $page3 != 'livesearch' || $page3 != 'filtersearch') {
								envo_redirect(ENVO_rewrite ::envoParseurl('404'));
							}
						}

						// EN: Getting the data about the Houses
						// CZ: Získání dat o bytových domech
						$ENVO_HOUSE_ALL = envo_get_house_info($envotable, $envotable20);

						// EN: Title and Description
						// CZ: Titulek a Popis
						$SECTION_TITLE = $tlint2["int2_sec_title"]["int2t7"];
						$SECTION_DESC  = $tlint2["int2_sec_desc"]["int2d7"];

						// EN: Load the php template
						// CZ: Načtení php template (šablony)
						$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_house_list.php';

				}
				break;
			default:
				// HOUSE SEARCHING

				// ----------- ERROR: REDIRECT PAGE ------------
				// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

				// EN: If not exist value in 'case', redirect page to 404
				// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
				if (!empty($page2)) {
					if ($page2 != 'newhouse' || $page2 != 'edithouse' || $page2 != 'delete' || $page2 != 'houselist') {
						envo_redirect(ENVO_rewrite ::envoParseurl('404'));
					}
				}

				// EN: Getting the data about the Období výstavby domu
				// CZ: Získání dat o Období výstavby domu
				$result = $envodb -> query('SELECT * FROM ' . $envotable1);
				while ($row = $result -> fetch_assoc()) {
					// EN: Insert each record into array
					// CZ: Vložení získaných dat do pole
					$ENVO_MANAGEMENT[] = $row;
				}

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

		switch ($page2) {
			case 'maps1':
				// MAPS 1

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Intranet 2 - Mapy';
				$SECTION_DESC  = '';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_maps1.php';
				break;
			default:
		}

		break;
	case 'search_db':

		switch ($page2) {
			case 'ares':
				// SEARCH ARES

				// EN: Getting the data about the city
				// CZ: Získání dat o městech
				$envocity = $envodb -> query('SELECT 
                                        t1.*,
                                        t2.district_name
                                      FROM
                                        ' . $envotable20 . ' t1
                                      LEFT JOIN 
                                        ' . $envotable22 . ' t2
                                          ON t1.district_id = t2.id
                                        ORDER BY t1.city_name ASC');
				while ($rowcity = $envocity -> fetch_assoc()) {
					// EN: Insert each record into array
					// CZ: Vložení získaných dat do pole
					$ENVO_CITY[] = $rowcity;
				}

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Intranet 2 - ARES';
				$SECTION_DESC  = 'Vyhledávání v databázi ARES';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_search_ares.php';
				break;
			case 'justice':
				// SEARCH JUSTICE

				// EN: Getting the data about the city
				// CZ: Získání dat o městech
				$envocity = $envodb -> query('SELECT 
                                        t1.*,
                                        t2.district_name
                                      FROM
                                        ' . $envotable20 . ' t1
                                      LEFT JOIN 
                                        ' . $envotable22 . ' t2
                                          ON t1.district_id = t2.id
                                        ORDER BY t1.city_name ASC');
				while ($rowcity = $envocity -> fetch_assoc()) {
					// EN: Insert each record into array
					// CZ: Vložení získaných dat do pole
					$ENVO_CITY[] = $rowcity;
				}

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Intranet 2 - JUSTICE';
				$SECTION_DESC  = 'Vyhledávání v databázi JUSTICE';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_search_justice.php';
				break;
			default:
		}

		break;
	case 'contract':

		switch ($page2) {
			case 'newcontract':
				// NEW CONTRACT

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					// EN: Default Variable
					// CZ: Hlavní proměnné
					$defaults = $_POST;

					if (isset($_POST['btnSave'])) {

						// EN: Check if number of contract isn't empty
						// CZ: Kontrola jestli je zadáné číslo zakázky
						if (!isset($defaults['envo_contractnumber']) || !is_numeric($defaults['envo_contractnumber'])) {
							$errors['e1'] = $tlint2['int2_error']['int2error8'] . '<br>';
						}

						// EN: Check if name of contract isn't empty
						// CZ: Kontrola jestli je zadáný název zakázky
						if (empty($defaults['envo_contractname'])) {
							$errors['e2'] = $tlint2['int2_error']['int2error'] . '<br>';
						}

						// EN: All checks are OK without Errors - Start the form processing
						// CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
						if (count($errors) == 0) {

							// EN: New folder of contract for documents, images and other ...
							// CZ: Nová složka zakázky pro dokumenty, obrázky a další ...
							// -----------------
							//The name of the directory that we need to create
							$uniqfolder = uniqid('contract_');
							$pathfolder = '/intranet2/countract/' . $uniqfolder;
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
CONTRACT NUMBER (ČÍSLO ZAKÁZKY) - ' . $defaults['envo_contractnumber'] . '
----------------------------------------------------------------------------------
Format date: Y-m-d H:i:s
Contract created: ' . date('Y-m-d H:i:s') . '

INFO ABOUT CONTRACT (INFORMACE O ZAKÁZCE)
----------------------------------------------------------------------------------
Name (Název):' . "\t\t\t\t\t\t" . $defaults['envo_contractname'] . '
Budget number (Číslo Rozpočtu):' . "\t\t" . $defaults['envo_contractbudget'] . '
Price (Cena):' . "\t\t\t\t\t\t" . $defaults['envo_contractprice'] . '
Contract folder (Složka zakázky):' . "\t" . $pathfolder . '
';
								$data = iconv(mb_detect_encoding($data, mb_detect_order(), TRUE), 'UTF-8', $data);
								file_put_contents(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder . '/contract_info.txt', $data);
							}

							/* EN: Convert value
							 * smartsql - secure method to insert form data into a MySQL DB
							 * url_slug  - friendly URL slug from a string
							 * ------------------
							 * CZ: Převod hodnot
							 * smartsql - secure method to insert form data into a MySQL DB
							 * url_slug  - friendly URL slug from a string
							*/

							$result = $envodb -> query('INSERT INTO ' . $envotable10 . ' SET 
                        number = "' . smartsql($defaults['envo_contractnumber']) . '",
                        name = "' . smartsql($defaults['envo_contractname']) . '",
                        varname = "' . url_slug($defaults['envo_contractname'], array ('transliterate' => TRUE)) . '",
                        object = "' . smartsql($defaults['envo_contractobject']) . '",
                        subject = "' . smartsql($defaults['envo_contractsubject']) . '",
                        contractbudget = "' . smartsql($defaults['envo_contractbudget']) . '",
                        contractprice = "' . smartsql($defaults['envo_contractprice']) . '",
                        status = "' . smartsql($defaults['envo_contractstatus']) . '",
                        description = "' . smartsql($defaults['envo_contractdescription']) . '",
                        folder = "' . $pathfolder . '",
                        created = "' . smartsql($defaults['envo_created']) . '",
                        updated = "' . smartsql($defaults['envo_created']) . '"');

							$rowid = $envodb -> envo_last_id();

							if (!$result) {
								// EN: Redirect page
								// CZ: Přesměrování stránky
								envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=contract&ssp=newcontract&status=e');
							} else {
								// EN: Redirect page
								// CZ: Přesměrování stránky
								envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=contract&ssp=editcontract&id=' . $rowid . '&status=s');
							}


						} else {
							$errors['e'] = $tl['general_error']['generror'] . '<br>';
							$errors      = $errors;
						}

					}

				}
				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Intranet 2 - Zakázky';
				$SECTION_DESC  = 'Zadání nové zakázky';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_newcontract.php';
				break;
			case 'editcontract':
				// EDIT CONTRACT

				// EN: Default Variable
				// CZ: Hlavní proměnné
				$pageID = $page3;

				if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

					if ($_SERVER['REQUEST_METHOD'] == 'POST') {

						// EN: Default Variable
						// CZ: Hlavní proměnné
						$defaults = $_POST;

						if (isset($_POST['btnSave'])) {

							// EN: Check if number of contract isn't empty
							// CZ: Kontrola jestli je zadáné číslo zakázky
							if (!isset($defaults['envo_contractnumber']) || !is_numeric($defaults['envo_contractnumber'])) {
								$errors['e1'] = $tlint2['int2_error']['int2error8'] . '<br>';
							}

							// EN: Check if name of contract isn't empty
							// CZ: Kontrola jestli je zadáný název zakázky
							if (empty($defaults['envo_contractname'])) {
								$errors['e2'] = $tlint2['int2_error']['int2error'] . '<br>';
							}

							// EN: All checks are OK without Errors - Start the form processing
							// CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
							if (count($errors) == 0) {

								/* EN: Convert value
								 * smartsql - secure method to insert form data into a MySQL DB
								 * url_slug  - friendly URL slug from a string
								 * ------------------
								 * CZ: Převod hodnot
								 * smartsql - secure method to insert form data into a MySQL DB
								 * url_slug  - friendly URL slug from a string
								*/
								$result = $envodb -> query('UPDATE ' . $envotable10 . ' SET
                         number = "' . smartsql($defaults['envo_contractnumber']) . '",
                        name = "' . smartsql($defaults['envo_contractname']) . '",
                        varname = "' . url_slug($defaults['envo_contractname'], array ('transliterate' => TRUE)) . '",
                        object = "' . smartsql($defaults['envo_contractobject']) . '",
                        subject = "' . smartsql($defaults['envo_contractsubject']) . '",
                        contractbudget = "' . smartsql($defaults['envo_contractbudget']) . '",
                        contractprice = "' . smartsql($defaults['envo_contractprice']) . '",
                        status = "' . smartsql($defaults['envo_contractstatus']) . '",
                        description = "' . smartsql($defaults['envo_contractdescription']) . '",
                        plannedmonths_start = "' . smartsql($defaults['envo_plannedmonths_start']) . '",
                        plannedyear_start = "' . smartsql($defaults['envo_plannedyear_start']) . '",
                        plannedmonths_end = "' . smartsql($defaults['envo_plannedmonths_end']) . '",
                        plannedyear_end = "' . smartsql($defaults['envo_plannedyear_end']) . '",
                        created = "' . smartsql($defaults['envo_created']) . '",
                        updated = NOW()
                        WHERE id = "' . smartsql($pageID) . '"');

								if (!$result) {
									// EN: Redirect page
									// CZ: Přesměrování stránky
									envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=contract&ssp=editcontract&id=' . $pageID . '&status=e');
								} else {
									// EN: Redirect page
									// CZ: Přesměrování stránky
									envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=contract&ssp=editcontract&id=' . $pageID . '&status=s');
								}

							} else {
								$errors['e'] = $tl['general_error']['generror'] . '<br>';
								$errors      = $errors;
							}
						}
					}

				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=contract&status=ene');
				}

				// EN: Get all the data for the form - Contract
				// CZ: Získání všech dat pro formulář - Zakázky
				$ENVO_FORM_DATA = envo_get_data($pageID, $envotable10);

				// EN: Get all the data for the form - Documents
				// CZ: Získání všech dat pro formulář - Dokumenty
				$ENVO_FORM_DATA_DOCU = envo_get_contract_documents($pageID, $envotable11);

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Intranet 2 - Zakázky';
				$SECTION_DESC  = 'Editace zakázky';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_editcontract.php';
				break;
			case 'delete':
				// DELETE HOUSE FROM DB

				// EN: Default Variable
				// CZ: Hlavní proměnné
				$pageID = $page3;

				if (is_numeric($pageID) && envo_row_exist($pageID, $envotable10)) {
					/* EN: Delete all records
					 * 1. Get data for deleting
					 * 2. Delete records from DB 'int2_contract'
					 * 3. Delete records from DB 'int2_contractdocu'
					 * 4. Delete all files and folder
					*/

					// EN: 1. Get data for deleting - main folder
					// CZ: 1. Získání dat potřebná k odstranění - hlavní adresář
					$resultfolder = $envodb -> query('SELECT folder FROM ' . $envotable10 . ' WHERE id = "' . smartsql($pageID) . '" LIMIT 1 ');
					$folder       = $resultfolder -> fetch_assoc();

					// EN: 2. Delete row from DB 'int2_contract' - Main records about contract
					// CZ: 2. Odstranění záznamu z DB 'int2_contract' - Hlavní záznam o zakázce
					$result = $envodb -> query('DELETE FROM ' . $envotable10 . ' WHERE id = "' . smartsql($pageID) . '"');

					if (!$result) {
						// EN: Redirect page
						// CZ: Přesměrování stránky s notifikací - chybné
						envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=contract&status=e');
					} else {

						// EN: 3. Delete row from DB 'int2_housedocu' - Documents
						// CZ: 3. Odstranění záznamu z DB 'int2_housedocu' - Dokumenty
						$envodb -> query('DELETE FROM ' . $envotable11 . ' WHERE contractid = "' . smartsql($pageID) . '"');

						// EN: 4. Delete files, folder
						// CZ: 4. Odstranění souborů a složek
						$pathfolder = APP_PATH . ENVO_FILES_DIRECTORY . $folder['folder'];
						delete_files($pathfolder);

						// EN: Redirect page
						// CZ: Přesměrování stránky s notifikací - úspěšné
						/*
						NOTIFIKACE:
						'status=s'    - Záznam úspěšně uložen
						'status1=s1'  - Záznam úspěšně odstraněn
						*/
						envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=contract&status=&status1=s1');
					}

				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=contract&status=ene');
				}

				break;
			case 'reports':
				// REPORTS CONTRACT

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Intranet 2 - Report';
				$SECTION_DESC  = 'Report zakázek';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_reportcontract.php';
				break;
			case 'contractlist':
				// CONTRACT LIST

				switch ($page3) {
					case 'xxx':

						break;
					default:
						// HOUSE LIST - ALL RECORDS

						// ----------- ERROR: REDIRECT PAGE ------------
						// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

						// EN: If not exist value in 'case', redirect page to 404
						// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
						if (!empty($page3)) {
							if ($page3 != 'xxx') {
								envo_redirect(ENVO_rewrite ::envoParseurl('404'));
							}
						}

						// EN: Getting the data about the Houses
						// CZ: Získání dat o bytových domech
						$ENVO_CONTRACT_ALL = envo_get_contract_info($envotable10);

						// EN: Title and Description
						// CZ: Titulek a Popis
						$SECTION_TITLE = $tlint2["int2_sec_title"]["int2t7"];
						$SECTION_DESC  = $tlint2["int2_sec_desc"]["int2d7"];

						// EN: Load the php template
						// CZ: Načtení php template (šablony)
						$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_contract_list.php';

				}
				break;
			default:
				// CONTRACT SEARCHING

				// ----------- ERROR: REDIRECT PAGE ------------
				// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

				// EN: If not exist value in 'case', redirect page to 404
				// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
				if (!empty($page2)) {
					if ($page2 != 'newcontract' || $page2 != 'editcontract') {
						envo_redirect(ENVO_rewrite ::envoParseurl('404'));
					}
				}

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Intranet 2 - Vyhledávání';
				$SECTION_DESC  = 'Vyhledávání zakázky';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_contract.php';
		}

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
							$errors['e1'] = $tlint2['int2_error']['int2error7'] . '<br>';
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
                        varname = "' . url_slug($defaults['envo_title'], array ('transliterate' => TRUE)) . '",
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
                        created = NOW()');

							} elseif (in_array(0, $defaults['envo_permission'])) {
								// EN: Usergroup exists, selection contains '0' value
								// CZ: Uživatelská skupina existuje, výběr obsahuje hodnotu "0"

								$envodb -> query('INSERT INTO ' . $envotable8 . ' SET 
                        notification_id = "' . $rowid . '",
                        usergroup_id = "0",
                        unread = "0",
                        created = NOW()');

							} else {
								// EN: Usergoup exists, selection contains array
								// CZ: Uživatelská skupina existuje, výběr obsahuje pole

								foreach ($defaults['envo_permission'] as $permission) {
									$envodb -> query('INSERT INTO ' . $envotable8 . ' SET 
                        notification_id = "' . $rowid . '",
                        usergroup_id = "' . $permission . '",
                        unread = "0",
                        created = NOW()');
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
								$errors['e1'] = $tlint2['int2_error']['int2error7'] . '<br>';
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
                        varname = "' . url_slug($defaults['envo_title'], array ('transliterate' => TRUE)) . '",
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
                        created = NOW()');

								} elseif (in_array(0, $defaults['envo_permission'])) {
									// EN: Usergroup exists, selection contains '0' value
									// CZ: Uživatelská skupina existuje, výběr obsahuje hodnotu "0"

									$envodb -> query('INSERT INTO ' . $envotable8 . ' SET 
                        notification_id = "' . $pageID . '",
                        usergroup_id = "0",
                        unread = "0",
                        created = NOW()');

								} else {
									// EN: Usergoup exists, selection contains array
									// CZ: Uživatelská skupina existuje, výběr obsahuje pole

									foreach ($defaults['envo_permission'] as $permission) {
										$envodb -> query('INSERT INTO ' . $envotable8 . ' SET 
                        notification_id = "' . $pageID . '",
                        usergroup_id = "' . $permission . '",
                        unread = "0",
                        created = NOW()');
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
                    WHEN "int2dateformat" THEN "' . smartsql($defaults['envo_date']) . '"
                    WHEN "int2timeformat" THEN "' . smartsql($defaults['envo_time']) . '"
                  END
                  WHERE varname IN ("int2title", "int2dateformat", "int2timeformat")');

				if (!$result) {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=intranet2&sp=setting&status=e');
				} else {

					// EN: Set permissions for Analytics
					// CZ: Nastavení přístupových práv do analýzy
					if (!isset($defaults['envo_permission'])) {

						$envodb -> query('UPDATE ' . DB_PREFIX . 'usergroup SET
                        int2analytics = "0"');

					} elseif (in_array(0, $defaults['envo_permission'])) {

						$envodb -> query('UPDATE ' . DB_PREFIX . 'usergroup SET
                        int2analytics = "0"');

					} else {

						$permission = join(',', $defaults['envo_permission']);
						$envodb -> query('UPDATE ' . DB_PREFIX . 'usergroup SET
                        int2analytics = "0"');
						$envodb -> query('UPDATE ' . DB_PREFIX . 'usergroup SET
                        int2analytics = "1"
                        WHERE id IN (' . $permission . ')');
					}

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

		// EN: Get all usergroup's for active plugin
		// CZ:
		$ENVO_USERGROUP = envo_plugin_usergroup_all('usergroup', 'intranet2');

		// Get permission for Analytics
		$result = $envodb -> query('SELECT id, name, int2analytics FROM ' . DB_PREFIX . 'usergroup');
		while ($row = $result -> fetch_assoc()) {
			$ENVO_SETTING_PERMISSION[] = $row;
		}

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
	case 'help':
		// HELP

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = 'Intranet 2 - Nápověda';
		$SECTION_DESC  = '';

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_help.php';

		break;
	default:
		// MAIN PAGE OF PLUGIN - LIST

		// ----------- ERROR: REDIRECT PAGE ------------
		// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

		// EN: If not exist value in 'case', redirect page to 404
		// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
		$pagearray = array ('house', 'katastr', 'maps', 'search_db', 'contract', 'notification', 'setting', 'help');
		if (!empty($page1) && !is_numeric($page1)) {
			if (in_array($page1, $pagearray)) {
				envo_redirect(ENVO_rewrite ::envoParseurl('404'));
			}
		}

	// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
	// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

}

?>