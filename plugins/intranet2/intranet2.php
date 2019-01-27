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
include_once("functions.php");

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
				// INFO ABOUT HOUSE



				// EN: Breadcrumbs activation
				// CZ: Aktivace Breadcrumbs
				$BREADCRUMBS = TRUE;

				// EN: Title and Description
				// CZ: Titulek a Popis
				$SECTION_TITLE = 'Bytové domy';
				$SECTION_DESC  = 'Seznam bytových domů';

				// EN: Load the php template
				// CZ: Načtení php template (šablony)
				$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_house_list.php';

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
					if ($page2 != 'h' || $page2 != 'statistics') {
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
	default:
		// MAIN PAGE OF PLUGIN

		// ----------- ERROR: REDIRECT PAGE ------------
		// -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

		// EN: If not exist value in 'case', redirect page to 404
		// CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
		if (!empty($page1)) {
			if ($page1 != 'house' || $page1 != 'case2') {
				envo_redirect(ENVO_rewrite ::envoParseurl('404'));
			}
		}

		// ----------- SUCCESS: CODE FOR MAIN PAGE ------------
		// -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

		// ------------------------
		// EN: Breadcrumbs activation
		// CZ: Aktivace Breadcrumbs
		$BREADCRUMBS = FALSE;

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int2_index.php';

}

?>