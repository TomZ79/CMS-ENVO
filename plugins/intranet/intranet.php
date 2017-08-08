<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

$CHECK_USR_SESSION = session_id();

// -------- DATA FOR ALL FRONTEND PAGES --------
// -------- DATA PRO VŠECHNY FRONTEND STRÁNKY --------

// EN: Set base plugin folder
// CZ: Nastavení základní složky pluginu
$BASE_PLUGIN_URL  = APP_PATH . 'plugins/intranet/template/';
$SHORT_PLUGIN_URL = '/plugins/intranet/template/';

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$JAK_SETTING_VAL = envo_get_setting_val('intranet');

// EN: Set data for the frontend page - Title, Description, Keywords and other ...
// CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
$PAGE_TITLE = $jkv["intranettitle"];


// -------- DATA FOR SELECTED FRONTEND PAGES --------
// -------- DATA PRO VYBRANÉ FRONTEND STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case '404':
    // CUSTOM ERROR PAGE FOR PLUGIN

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = 'plugins/intranet/template/int_404.php';

    break;
  case 'XXXX':

    break;
  case 'mast':
    // ANTENNA MASTS

    switch ($page2) {
      case 'assembly':

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = 'plugins/intranet/template/int_mast_assembly.php';

        break;
      case 'disassembly':

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = 'plugins/intranet/template/int_mast_disassembly.php';

        break;
      default:

        // ----------- ERROR: REDIRECT PAGE ------------
        // -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

        // EN: If not exist value in 'case', redirect page to 404
        // CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
        if (!empty($page2)) {
          if ($page2 != 'assembly' || $page2 != 'disassembly') {
            envo_redirect(JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_INTRANET . '/404', '', '', '', ''));
          }
        }

    }

    break;
  default:
    // MAIN PAGE OF PLUGIN - DASHBOARD

    // ----------- ERROR: REDIRECT PAGE ------------
    // -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

    // EN: If not exist value in 'case', redirect page to 404
    // CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
    if (!empty($page1)) {
      if ($page1 != 'mast') {
        envo_redirect(JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_INTRANET . '/404', '', '', '', ''));
      }
    }

    // ----------- SUCCESS: CODE FOR MAIN PAGE ------------
    // -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = 'plugins/intranet/template/int_index.php';

}
?>