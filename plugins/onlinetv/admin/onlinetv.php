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
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/onlinetv/admin/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/onlinetv/admin/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable = DB_PREFIX . 'otv_film';
$envotable1 = DB_PREFIX . 'otv_settings_genre';
$envotable2 = DB_PREFIX . 'otv_settings_country';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../plugins/onlinetv/admin/include/functions.php");

// EN:
// CZ:

// EN: Get all the data about genres
// CZ: Získání všech dat o žánrech
$result = $envodb -> query('SELECT * FROM ' . $envotable1 . ' ORDER BY id ASC');
while ($row = $result -> fetch_assoc()) {
	// EN: Insert each record into array
	// CZ: Vložení získaných dat do pole
	$ENVO_GENRE[] = $row;
}

// EN: Get all the data about country
// CZ: Získání všech dat o zemích původu
$result = $envodb -> query('SELECT * FROM ' . $envotable2 . ' ORDER BY id ASC');
while ($row = $result -> fetch_assoc()) {
	// EN: Insert each record into array
	// CZ: Vložení získaných dat do pole
	$ENVO_COUNTRY[] = $row;
}

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
	case 'film':
		// FILMS

		switch ($page2) {
			case 'newfilm':
				// ADD NEW FILM TO DB

				// EN: POST REQUEST
				// CZ: POST REQUEST
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					// EN: Default Variable
					// CZ: Hlavní proměnné
					$defaults = $_POST;

					if (isset($_POST['btnSave'])) {

						// EN: Check if name of film isn't empty
						// CZ: Kontrola jestli je zadáný název filmu
						if (empty($defaults['envo_filmname'])) {
							$errors['e1'] = $tlotv['otv2_error']['otv2error'] . '<br>';
						}

						// EN: Check if year of film isn't empty
						// CZ: Kontrola jestli je zadáný rok
						if (!isset($defaults['envo_filmyear']) || !is_numeric($defaults['envo_filmyear'])) {
							$errors['e2'] = $tlotv['otv2_error']['otv2error1'] . '<br>';
						}

						// EN: All checks are OK without Errors - Start the form processing
						// CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
						if (count($errors) == 0) {

							// Genre
							if (!isset($defaults['envo_filmgenre'])) {
								$genre = 0;
							} elseif (in_array(0, $defaults['envo_filmgenre'])) {
								$genre = 0;
							} else {
								$genre = join(',', $defaults['envo_filmgenre']);
							}

							// EN: New folder of house for documents, images and other ...
							// CZ: Nová složka domu pro dokumenty, obrázky a další ...
							// -----------------
							//The name of the directory that we need to create
							$uniqfolder = uniqid('film_');
							$pathfolder = '/onlinetv/film/' . $uniqfolder;
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
FILM NAME - ' . $defaults['envo_filmname'] . '
-----------------------------------------------
Format date: Y-m-d H:i:s
Film created: ' . date('Y-m-d H:i:s') . '

INFO ABOUT FILM
-----------------------------------------------
Originální název filmu:    ' . $defaults['envo_filmname'] . '
Název Filmu (English):     ' . $defaults['envo_filmname_en'] . '
Název Filmu (Česky):       ' . $defaults['envo_filmname_cz'] . '
Název Filmu (Slovensky):   ' . $defaults['envo_filmname_sk'] . '
Složka filmu:   				   ' . $pathfolder . '
';
								$data = iconv(mb_detect_encoding($data, mb_detect_order(), TRUE), 'UTF-8', $data);
								file_put_contents(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder . '/film_info.txt', $data);

								/* EN: Convert value
							 * smartsql - secure method to insert form data into a MySQL DB
							 * url_slug  - friendly URL slug from a string
							 * ------------------
							 * CZ: Převod hodnot
							 * smartsql - secure method to insert form data into a MySQL DB
							 * url_slug  - friendly URL slug from a string
							*/
								$result = $envodb -> query('INSERT INTO ' . $envotable . ' SET 
                        original_name = "' . smartsql($defaults['envo_filmname']) . '",
                        en_name = "' . smartsql($defaults['envo_filmname_en']) . '",
                        cs_name = "' . smartsql($defaults['envo_filmname_cz']) . '",
                        sk_name = "' . smartsql($defaults['envo_filmname_sk']) . '",
                        cs_varname = "' . url_slug($defaults['envo_filmname_cz'], array ('transliterate' => TRUE)) . '",
                        film_year = "' . smartsql($defaults['envo_filmyear']) . '",
                        filmcsfd = "' . smartsql($defaults['envo_filmcsfd']) . '",
                        filmimdb = "' . smartsql($defaults['envo_filmimdb']) . '",
                        folder = "' . $pathfolder . '",
                        filmdescription = "' . smartsql($defaults['envo_filmdesc']) . '",
                        genre = "' . $genre . '",
                        country = "' . smartsql($defaults['envo_filmcountry']) . '",
                        direction = "' . smartsql($defaults['envo_filmdirection']) . '",
                        template = "' . smartsql($defaults['envo_filmtemplate']) . '",
                        screenplay = "' . smartsql($defaults['envo_filmscreenplay']) . '",
                        actors = "' . smartsql($defaults['envo_filmactors']) . '",
                        video_o_2160 = "' . smartsql($defaults['envo_filmvideo_o_2160']) . '",
                        video_o_1440 = "' . smartsql($defaults['envo_filmvideo_o_1440']) . '",
                        video_o_1080 = "' . smartsql($defaults['envo_filmvideo_o_1080']) . '",
                        video_o_720 = "' . smartsql($defaults['envo_filmvideo_o_720']) . '",
                        video_o_576 = "' . smartsql($defaults['envo_filmvideo_o_576']) . '",
                        video_o_360 = "' . smartsql($defaults['envo_filmvideo_o_360']) . '",
                        video_cs_2160 = "' . smartsql($defaults['envo_filmvideo_cs_2160']) . '",
                        video_cs_1440 = "' . smartsql($defaults['envo_filmvideo_cs_1440']) . '",
                        video_cs_1080 = "' . smartsql($defaults['envo_filmvideo_cs_1080']) . '",
                        video_cs_720 = "' . smartsql($defaults['envo_filmvideo_cs_720']) . '",
                        video_cs_576 = "' . smartsql($defaults['envo_filmvideo_cs_576']) . '",
                        video_cs_360 = "' . smartsql($defaults['envo_filmvideo_cs_360']) . '",
                        subtitle_en = "' . smartsql($defaults['envo_filmsubtitle_en']) . '",
                        subtitle_cs = "' . smartsql($defaults['envo_filmsubtitle_cs']) . '",
                        subtitle_sk = "' . smartsql($defaults['envo_filmsubtitle_sk']) . '",
                        poster_1 = "' . smartsql($defaults['envo_filmposter_1']) . '",
                        poster_2 = "' . smartsql($defaults['envo_filmposter_2']) . '",
                        poster_3 = "' . smartsql($defaults['envo_filmposter_3']) . '",
                        poster_4 = "' . smartsql($defaults['envo_filmposter_4']) . '",
                        poster_5 = "' . smartsql($defaults['envo_filmposter_5']) . '",
                        trailer_1_link = "' . smartsql($defaults['envo_filmtrailer_1_link']) . '",
                        trailer_1_text = "' . smartsql($defaults['envo_filmtrailer_1_text']) . '",
                        trailer_2_link = "' . smartsql($defaults['envo_filmtrailer_2_link']) . '",
                        trailer_2_text = "' . smartsql($defaults['envo_filmtrailer_2_text']) . '",
                        created = "' . smartsql($defaults['envo_created']) . '",
                        updated = "' . smartsql($defaults['envo_created']) . '"');

								$rowid = $envodb -> envo_last_id();

								if (!$result) {
									// EN: Redirect page
									// CZ: Přesměrování stránky
									envo_redirect(BASE_URL . 'index.php?p=onlinetv&sp=film&ssp=newfilm&status=e');
								} else {

									// EN: Redirect page
									// CZ: Přesměrování stránky
									envo_redirect(BASE_URL . 'index.php?p=onlinetv&sp=film&ssp=editfilm&id=' . $rowid . '&status=s');
								}

							}

						} else {
							$errors['e'] = $tl['general_error']['generror'] . '<br>';
							$errors      = $errors;
						}
					}
				}

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = $tlotv["otv_sec_title"]["otvt2"];
				$SECTION_DESC  = $tlotv["otv_sec_desc"]["otvd2"];

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'onlinetv_newfilm.php';

				break;
			case 'editfilm':
				// EDIT FILM IN DB

				// EN: Default Variable
				// CZ: Hlavní proměnné
				$pageID = $page3;

				if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

					// EN: POST REQUEST
					// CZ: POST REQUEST
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						// EN: Default Variable
						// CZ: Hlavní proměnné
						$defaults = $_POST;

						if (isset($_POST['btnSave'])) {

							// EN: Check if name of film isn't empty
							// CZ: Kontrola jestli je zadáný název filmu
							if (empty($defaults['envo_filmname'])) {
								$errors['e1'] = $tlotv['otv2_error']['otv2error'] . '<br>';
							}

							// EN: Check if year of film isn't empty
							// CZ: Kontrola jestli je zadáný rok
							if (!isset($defaults['envo_filmyear']) || !is_numeric($defaults['envo_filmyear'])) {
								$errors['e2'] = $tlotv['otv2_error']['otv2error1'] . '<br>';
							}

							// EN: All checks are OK without Errors - Start the form processing
							// CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
							if (count($errors) == 0) {

								// Genre
								if (!isset($defaults['envo_filmgenre'])) {
									$genre = 0;
								} elseif (in_array(0, $defaults['envo_filmgenre'])) {
									$genre = 0;
								} else {
									$genre = join(',', $defaults['envo_filmgenre']);
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
                        original_name = "' . smartsql($defaults['envo_filmname']) . '",
                        en_name = "' . smartsql($defaults['envo_filmname_en']) . '",
                        cs_name = "' . smartsql($defaults['envo_filmname_cz']) . '",
                        sk_name = "' . smartsql($defaults['envo_filmname_sk']) . '",
                        cs_varname = "' . url_slug($defaults['envo_filmname_cz'], array ('transliterate' => TRUE)) . '",
                        film_year = "' . smartsql($defaults['envo_filmyear']) . '",
                        filmcsfd = "' . smartsql($defaults['envo_filmcsfd']) . '",
                        filmimdb = "' . smartsql($defaults['envo_filmimdb']) . '",
                        filmdescription = "' . smartsql($defaults['envo_filmdesc']) . '",
                        genre = "' . $genre . '",
                        country = "' . smartsql($defaults['envo_filmcountry']) . '",
                        direction = "' . smartsql($defaults['envo_filmdirection']) . '",
                        template = "' . smartsql($defaults['envo_filmtemplate']) . '",
                        screenplay = "' . smartsql($defaults['envo_filmscreenplay']) . '",
                        actors = "' . smartsql($defaults['envo_filmactors']) . '",
                        video_o_2160 = "' . smartsql($defaults['envo_filmvideo_o_2160']) . '",
                        video_o_1440 = "' . smartsql($defaults['envo_filmvideo_o_1440']) . '",
                        video_o_1080 = "' . smartsql($defaults['envo_filmvideo_o_1080']) . '",
                        video_o_720 = "' . smartsql($defaults['envo_filmvideo_o_720']) . '",
                        video_o_576 = "' . smartsql($defaults['envo_filmvideo_o_576']) . '",
                        video_o_360 = "' . smartsql($defaults['envo_filmvideo_o_360']) . '",
                        video_cs_2160 = "' . smartsql($defaults['envo_filmvideo_cs_2160']) . '",
                        video_cs_1440 = "' . smartsql($defaults['envo_filmvideo_cs_1440']) . '",
                        video_cs_1080 = "' . smartsql($defaults['envo_filmvideo_cs_1080']) . '",
                        video_cs_720 = "' . smartsql($defaults['envo_filmvideo_cs_720']) . '",
                        video_cs_576 = "' . smartsql($defaults['envo_filmvideo_cs_576']) . '",
                        video_cs_360 = "' . smartsql($defaults['envo_filmvideo_cs_360']) . '",
                        subtitle_en = "' . smartsql($defaults['envo_filmsubtitle_en']) . '",
                        subtitle_cs = "' . smartsql($defaults['envo_filmsubtitle_cs']) . '",
                        subtitle_sk = "' . smartsql($defaults['envo_filmsubtitle_sk']) . '",
                        poster_1 = "' . smartsql($defaults['envo_filmposter_1']) . '",
                        poster_2 = "' . smartsql($defaults['envo_filmposter_2']) . '",
                        poster_3 = "' . smartsql($defaults['envo_filmposter_3']) . '",
                        poster_4 = "' . smartsql($defaults['envo_filmposter_4']) . '",
                        poster_5 = "' . smartsql($defaults['envo_filmposter_5']) . '",
                        trailer_1_link = "' . smartsql($defaults['envo_filmtrailer_1_link']) . '",
                        trailer_1_text = "' . smartsql($defaults['envo_filmtrailer_1_text']) . '",
                        trailer_2_link = "' . smartsql($defaults['envo_filmtrailer_2_link']) . '",
                        trailer_2_text = "' . smartsql($defaults['envo_filmtrailer_2_text']) . '",
                        created = "' . smartsql($defaults['envo_created']) . '",
                        updated = NOW()
                        WHERE id = "' . smartsql($pageID) . '"');

								if (!$result) {
									// EN: Redirect page
									// CZ: Přesměrování stránky
									envo_redirect(BASE_URL . 'index.php?p=onlinetv&sp=film&ssp=editfilm&id=' . $pageID . 'status=e');
								} else {

									// EN: Redirect page
									// CZ: Přesměrování stránky
									envo_redirect(BASE_URL . 'index.php?p=onlinetv&sp=film&ssp=editfilm&id=' . $pageID . '&status=s');
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
					envo_redirect(BASE_URL . 'index.php?p=onlinetv&sp=film&status=ene');
				}

				// EN: Get all the data about film
				// CZ: Získání všech dat o filmu
				$ENVO_FORM_DATA = envo_get_data($pageID, $envotable);

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = $tlotv["otv_sec_title"]["otvt3"];
				$SECTION_DESC  = $tlotv["otv_sec_desc"]["otvd3"];

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'onlinetv_editfilm.php';

				break;
			case 'delete':

				break;
			case 'filmlist':

				// EN: Getting the data about the Houses
				// CZ: Získání dat o bytových domech
				$ENVO_FILM_ALL = envo_get_film_info($envotable);

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = $tlotv["otv_sec_title"]["otvt2"];
				$SECTION_DESC  = $tlotv["otv_sec_desc"]["otvd2"];

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'onlinetv_film_list.php';

				break;
			default:
				// FILM SEARCHING

				// ----------- ERROR: REDIRECT PAGE ------------
				// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

				// EN: If not exist value in 'case', redirect page to 404
				// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
				if (!empty($page2)) {
					if ($page2 != 'newfilm' || $page2 != 'editfilm' || $page2 != 'delete' || $page2 != 'filmlist') {
						envo_redirect(ENVO_rewrite ::envoParseurl('404'));
					}
				}

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = $tlotv["otv_sec_title"]["otvt1"];
				$SECTION_DESC  = $tlotv["otv_sec_desc"]["otvd1"];

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'onlinetv_film.php';

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
                    WHEN "onlinetvplugintitle" THEN "' . smartsql($defaults['envo_title']) . '"
                  END
                  WHERE varname IN ("onlinetvplugintitle")');

				if (!$result) {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=onlinetv&sp=setting&status=e');
				} else {
					// EN: Redirect page
					// CZ: Přesměrování stránky
					envo_redirect(BASE_URL . 'index.php?p=onlinetv&sp=setting&status=s');
				}
			} else {
				$errors['e'] = $tl['general_error']['generror'] . '<br>';
				$errors      = $errors;
			}
		}

		// EN: Import important settings for the template from the DB
		// CZ: Importuj důležité nastavení pro šablonu z DB
		$ENVO_SETTING = envo_get_setting('onlinetv');

		// EN: Import important settings for the template from the DB (only VALUE)
		// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
		$ENVO_SETTING_VAL = envo_get_setting_val('onlinetv');

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = $tlotv["otv_sec_title"]["otvt"];
		$SECTION_DESC  = $tlotv["otv_sec_desc"]["otvd"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'onlinetv_setting.php';

		break;
	default:
		// MAIN PAGE OF PLUGIN - LIST

		// ----------- ERROR: REDIRECT PAGE ------------
		// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

		// EN: If not exist value in 'case', redirect page to 404
		// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
		$pagearray = array ('setting');
		if (!empty($page1) && !is_numeric($page1)) {
			if (in_array($page1, $pagearray)) {
				envo_redirect(ENVO_rewrite ::envoParseurl('404', '', '', '', ''));
			}
		}

	// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
	// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

}

?>