<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

$CHECK_USR_SESSION = session_id();

// -------- DATA FOR ALL FRONTEND PAGES --------
// -------- DATA PRO VŠECHNY FRONTEND STRÁNKY --------

// Show content in template only the user have access
$JAK_MODULES = $jakuser->jakModuleaccess(JAK_USERID, "1,23");

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/intranet/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/intranet/template/';

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$ENVO_SETTING_VAL = envo_get_setting_val('intranet');

// EN: Set data for the frontend page - Title, Description, Keywords and other ...
// CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
$PAGE_TITLE = $jkv["intranettitle"];

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'intranethouse';
$envotable1 = DB_PREFIX . 'intranethousecontact';
$envotable2 = DB_PREFIX . 'intranethouseserv';
$envotable3 = DB_PREFIX . 'intranethouseimg';

// Parse links once if needed a lot of time
$backtoblog = JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_INTRANET, '', '', '', '');

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
    $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_404.php';

    break;
  case 'house':
    // HOUSE

    switch ($page2) {
      case 'h':
        // INFO ABOUT HOUSE

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $pageID = $page3;

        if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

          // EN: Check if user has permission to see it - usergroup 'Administrator' have permission to all data automatically
          // Cz: Kontrola jestli má uživatel přístup k datům - Uživatelská skupina 'Administrátor' má přístup ke všem datům automaticky
          if (envo_row_permission($pageID, $envotable, JAK_USERGROUPID)) {
            // USER HAVE PERMISSION

            $result = $jakdb->query('SELECT * FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '" LIMIT 1');
            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_HOUSE_DETAIL[]  = $row;
              $envo_house_latitude  = $row['latitude'];
              $envo_house_longitude = $row['longitude'];
            }

            $result = $jakdb->query('SELECT * FROM ' . $envotable1 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY id ASC');
            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_HOUSE_CONT[] = $row;
            }

            $result = $jakdb->query('SELECT * FROM ' . $envotable2 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY id DESC');
            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_HOUSE_SERV[] = $row;
            }

            $result = $jakdb->query('SELECT * FROM ' . $envotable2 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY id DESC');
            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_HOUSE_DOCU[] = $row;
            }

            $result = $jakdb->query('SELECT * FROM ' . $envotable3 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY id DESC');
            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_HOUSE_IMG[] = $row;
            }

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = 'Bytové domy';
            $SECTION_DESC  = 'Detail bytového domu';

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_house_detail.php';

          } else {
            // USER HAVE NOT PERMISSION

            envo_redirect(JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_INTRANET, '404', '', '', ''));

          }


        } else {
          envo_redirect($backtoblog);
        }

        break;
      default:

        // ----------- ERROR: REDIRECT PAGE ------------
        // -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

        // EN: If not exist value in 'case', redirect page to 404
        // CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
        if (!empty($page2)) {
          if ($page2 != 'h') {
            envo_redirect(JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_INTRANET, '404', '', '', ''));
          }
        }

        // ----------- SUCCESS: CODE FOR MAIN PAGE ------------
        // -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

        // EN: Getting the data about the Houses by usergroupid
        // CZ: Získání dat o bytových domech podle id uživatelské skupiny
        $ENVO_HOUSE_ALL = envo_get_house_info($envotable, FALSE, JAK_USERGROUPID);

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = 'Bytové domy';
        $SECTION_DESC  = 'Seznam bytových domů';

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_house.php';

    }

    break;
  default:
    // MAIN PAGE OF PLUGIN - DASHBOARD

    // ----------- ERROR: REDIRECT PAGE ------------
    // -------- CHYBA: PŘESMĚROVÁNÍ STRÁNKY --------

    // EN: If not exist value in 'case', redirect page to 404
    // CZ: Pokud neexistuje 'case', dochází k přesměrování stránek na 404
    if (!empty($page1)) {
      if ($page1 != 'house') {
        envo_redirect(JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_INTRANET, '404', '', '', ''));
      }
    }

    // ----------- SUCCESS: CODE FOR MAIN PAGE ------------
    // -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

    // Get the stats
    if (JAK_USERGROUPID == 3) {
      // If usergroup is 'Administrator'

      // EN: Getting count of records in DB
      // CZ: Získání počtu záznamů v DB
      $result = $jakdb->query('SELECT COUNT(*) as houseCtotal FROM ' . $envotable);
      $row    = $result->fetch_assoc();

      $ENVO_COUNTS = $row['houseCtotal'];

    } else {
      // For other usergroup

      // EN: Getting count of records in DB
      // CZ: Získání počtu záznamů v DB
      // Find in permission column 'usergroupid' or '0'. 0 means availability for all user groups.
      $result         = $jakdb->query('SELECT * FROM ' . $envotable . ' WHERE FIND_IN_SET("' . JAK_USERGROUPID . '", permission) OR  FIND_IN_SET("0", permission)');
      // Determine number of rows result set
      $row_cnt = $result->num_rows;
      $ENVO_COUNTS = $row_cnt;
    }

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_index.php';

}
?>