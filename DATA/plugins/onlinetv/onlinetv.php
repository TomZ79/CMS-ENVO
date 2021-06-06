<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

$CHECK_USR_SESSION = session_id();

// -------- DATA FOR ALL FRONTEND PAGES --------
// -------- DATA PRO VŠECHNY FRONTEND STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/onlinetv/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/onlinetv/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'otv_film';
$envotable1 = DB_PREFIX . 'otv_settings_genre';

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

// -------- DATA FOR SELECTED FRONTEND PAGES --------
// -------- DATA PRO VYBRANÉ FRONTEND STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
	case '404':
		// CUSTOM ERROR PAGE FOR PLUGIN

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'onlinetv_404.php';

		break;
	case 'film':
		// FILMS

		switch ($page2) {
			case 'f':
				// FILM DETAIL

				// EN: Default Variable
				// CZ: Hlavní proměnné
				$pageID = $page3;

				if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

					// EN: Get the data of entrance
					// CZ: Získání dat o vchodech
					$result = $envodb -> query('SELECT * FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '"');
					while ($row = $result -> fetch_assoc()) {
						// EN: Insert each record into array
						// CZ: Vložení získaných dat do pole
						$envofilmdetail[] = $row;
					}

					// Convert multidimensional array to associated array
					$ENVO_FILM_DETAIL = array ();
					foreach ($envofilmdetail as $array) {
						foreach ($array as $k => $v) {
							$ENVO_FILM_DETAIL[$k] = $v;
						}
					}

				} else {
					envo_redirect($backtoplugin);
				}

				// EN: Set data for the frontend page - Title, Description, Keywords and other ...
				// CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
				if (isset($ENVO_FILM_DETAIL["cs_name"])) {
					$PAGE_TITLE = $ENVO_FILM_DETAIL["cs_name"] . ' (' . $ENVO_FILM_DETAIL["film_year"] . ')';
				} else if (isset($ENVO_FILM_DETAIL["en_name"])) {
					$PAGE_TITLE = $ENVO_FILM_DETAIL["en_name"] . ' (' . $ENVO_FILM_DETAIL["film_year"] . ')';
				} else {
					$PAGE_TITLE = $ENVO_FILM_DETAIL["original_name"] . ' (' . $ENVO_FILM_DETAIL["film_year"] . ')';
				}

				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'onlinetv_film_detail.php';

				break;
			default:
				// FILM MAIN

				// ----------- ERROR: REDIRECT PAGE ------------
				// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

				// EN: If not exist value in 'case', redirect page to 404
				// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
				if (!empty($page2)) {
					if ($page2 != 'f') {
						envo_redirect(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_ONLINE_TV, '404'));
					}
				}

				// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
				// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------


				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'onlinetv_film_detail.php';
		}

		break;
	case 'documentation':
		// DOKUMENTACE

		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'onlinetv_docu.php';

		break;
	case 'case':

		break;
	default:
		// MAIN PAGE OF PLUGIN

		// ----------- ERROR: REDIRECT PAGE ------------
		// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

		// EN: If not exist value in 'case', redirect page to 404
		// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
		if (!empty($page1)) {
			if ($page1 != 'film' || $page1 != 'documentation' || $page1 != 'case') {
				envo_redirect(ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_ONLINE_TV, '404'));
			}
		}

		// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
		// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

		// EN: Set data for the frontend page - Title, Description, Keywords and other ...
		// CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
		$PAGE_TITLE              = $setting["onlinetvplugintitle"];
		$MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
		$MAIN_SITE_DESCRIPTION   = $setting['metadesc'];

		// SEO from the category content if available
		if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
			$PAGE_DESCRIPTION = envo_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
		} else {
			$PAGE_DESCRIPTION = envo_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
		}

		// EN: Get the data of entrance
		// CZ: Získání dat o vchodech
		$result = $envodb -> query('SELECT id, original_name, en_name, cs_name, film_year, genre, poster_1, poster_2, poster_3 FROM ' . $envotable . ' ORDER BY id DESC');
		while ($row = $result -> fetch_assoc()) {
			// EN: Insert each record into array
			// CZ: Vložení získaných dat do pole
			$ENVO_FILM_ALL[] = $row;
		}

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'onlinetv_index.php';

}

?>