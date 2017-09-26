<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

$CHECK_USR_SESSION = session_id();

// -------- DATA FOR ALL FRONTEND PAGES --------
// -------- DATA PRO VŠECHNY FRONTEND STRÁNKY --------

// Show content in template only the user have access
$ENVO_MODULES = $jakuser->jakModuleaccess(JAK_USERID, "1,23");

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
$envotable4 = DB_PREFIX . 'intranethousenotifications';
$envotable5 = DB_PREFIX . 'intranethousenotificationug';
$envotable6 = DB_PREFIX . 'intranethousedocu';

// Parse links once if needed a lot of time
$backtoblog = JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_INTRANET, '', '', '', '');

// EN: If the user is logged in, get username and usergroup name
// CZ: Pokud je uživatel přihlášen, získej uživatelské jméno a jméno uživatelské skupiny
if (JAK_USERID) {

  // Get the user name
  $ENVO_USER_NAME = $jakuser->getVar('name');
  // Get the user avatar
  $ENVO_USER_AVATAR = $jakuser->getVar('picture');
  // Get the user group name
  $result          = $jakdb->query('SELECT name FROM ' . DB_PREFIX . 'usergroup WHERE id="' . $jakuser->getVar("usergroupid") . '"');
  $row             = $result->fetch_assoc();
  $ENVO_USER_GROUP = $row['name'];

}

// EN: Include the functions
// CZ: Vložené funkce
include_once("functions.php");

// EN: Info about notifications
// CZ: Info o notifikacích
$ENVO_NOTIFICATION = envo_get_notification_unread(JAK_USERGROUPID, FALSE, $ENVO_SETTING_VAL['intranetdateformat'], $ENVO_SETTING_VAL['intranettimeformat']);

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

            // EN: Get the data of house
            // CZ: Získání dat o domu
            $result = $jakdb->query('SELECT * FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '" LIMIT 1');
            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_HOUSE_DETAIL[]  = $row;
              $envo_house_latitude  = $row['latitude'];
              $envo_house_longitude = $row['longitude'];
            }

            // EN: Get the data of main contacts
            // CZ: Získání dat o hlavních kontaktech
            $result = $jakdb->query('SELECT * FROM ' . $envotable1 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY id ASC');
            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_HOUSE_CONT[] = $row;
            }

            // EN: Get the data of services
            // CZ: Získání dat o servisech
            $result = $jakdb->query('SELECT * FROM ' . $envotable2 . ' WHERE houseid = "' . smartsql($pageID) . '" AND deleted = 0 ORDER BY id DESC');
            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_HOUSE_SERV[] = $row;
            }

            // EN: Get the data of documentation
            // CZ: Získání dat o dokumentech
            $result = $jakdb->query('SELECT * FROM ' . $envotable6 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY id ASC');
            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_HOUSE_DOCU[] = $row;
            }

            // EN: Get the data of images
            // CZ: Získání dat o obrázcích
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
        // CZ: Získání dat o bytových domech podle 'id' uživatelské skupiny
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
  case 'notification':
    // NOTIFICATION

    switch ($page2) {
      case 'n':
        // INFO ABOUT NOTIFICATION

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $pageID = $page3;

        if (is_numeric($pageID) && envo_row_exist($pageID, $envotable4)) {

          // EN: Check if user has permission to see it - usergroup 'Administrator' have permission to all data automatically
          // Cz: Kontrola jestli má uživatel přístup k datům - Uživatelská skupina 'Administrátor' má přístup ke všem datům automaticky
          if (envo_row_permission($pageID, $envotable4, JAK_USERGROUPID)) {
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
                $result = $jakdb->query('UPDATE ' . $envotable5 . ' SET
                          unread = "1"
                          WHERE notification_id = "' . smartsql($pageID) . '"
                          AND usergroup_id = "' . JAK_USERGROUPID . '"');

                if (!$result) {

                } else {
                  // EN: Info about notifications - refresh data
                  // CZ: Info o notifikacích - refresh data
                  $ENVO_NOTIFICATION = envo_get_notification_unread(JAK_USERGROUPID, FALSE, $ENVO_SETTING_VAL['intranetdateformat'], $ENVO_SETTING_VAL['intranettimeformat']);
                }

              }

            }

            $result = $jakdb->query('
                      SELECT ' . $envotable4 . '.*, ' . $envotable5 . '.unread 
                      FROM ' . $envotable4 . ', ' . $envotable5 . ' 
                      WHERE ' . $envotable4 . '.id = "' . smartsql($pageID) . '"
                      AND ' . $envotable5 . '.notification_id="' . smartsql($pageID) . '"
                      AND ' . $envotable5 . '.usergroup_id="' . JAK_USERGROUPID . '"
                      LIMIT 1
                      ');

            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_NOTIFICATION_DETAIL[] = array(
                'name'     => $row['name'],
                'type'     => $row['type'],
                'content'  => $row['content'],
                'created'  => date($ENVO_SETTING_VAL['intranetdateformat'] . $ENVO_SETTING_VAL['intranettimeformat'], strtotime($row['created']))
              );
            }

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = 'Notifikace';
            $SECTION_DESC  = 'Detail notifikace';

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_notification_detail.php';

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
          if ($page2 != 'n') {
            envo_redirect(JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_INTRANET, '404', '', '', ''));
          }
        }

        // ----------- SUCCESS: CODE FOR MAIN PAGE ------------
        // -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

        // EN: Getting the data about the Notifications by usergroupid
        // CZ: Získání dat o Notifikacích podle 'id' uživatelské skupiny
        $ENVO_NOTIFICATION_ALL = envo_get_notification_all(JAK_USERGROUPID, FALSE, $ENVO_SETTING_VAL['intranetdateformat'], $ENVO_SETTING_VAL['intranettimeformat']);

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = 'Notifikace';
        $SECTION_DESC  = 'Seznam notifikací';

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_notification.php';

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
      // EN: If usergroup is 'Administrator'
      // CZ: Pokud je uživatelská skupiny přihlášeného uživatele 'Administrator'

      // EN: Getting count of all records in DB
      // CZ: Získání počtu všech záznamů v DB
      $result    = $jakdb->query('SELECT COUNT(*) as houseCtotal FROM ' . $envotable);
      $rowCtotal = $result->fetch_assoc();

      // Count of all records by usergroup
      $ENVO_COUNTS = $rowCtotal['houseCtotal'];
      // Percentage - records by usergroup / all records
      $ENVO_PERCENT = ($rowCtotal['houseCtotal'] * 100) . '%';

    } else {
      // EN: For other usergroup
      // CZ: Ostatní uživatelské skupiny přihlášených uživatelů

      // EN: Getting count of all records in DB
      // CZ: Získání počtu všech záznamů v DB
      $result    = $jakdb->query('SELECT COUNT(*) as houseCtotal FROM ' . $envotable);
      $rowCtotal = $result->fetch_assoc();

      if ($rowCtotal['houseCtotal'] > 0) {
        // EN: If '$rowCtotal' have some record
        // CZ: Pokud '$rowCtotal' obsahuje záznam

        // EN: Getting count of records in DB by usergroup
        // CZ: Získání počtu záznamů v DB podle uživatelské skupiny
        // Find in permission column 'usergroupid' or '0'. 0 means availability for all user groups.
        $result = $jakdb->query('SELECT * FROM ' . $envotable . ' WHERE FIND_IN_SET("' . JAK_USERGROUPID . '", permission) OR  FIND_IN_SET("0", permission)');
        // Determine number of rows result set
        $row_cnt = $result->num_rows;

        // Count of all records by usergroup
        $ENVO_COUNTS = $row_cnt;
        // Percentage - records by usergroup / all records
        $ENVO_PERCENT = ($row_cnt / $rowCtotal['houseCtotal'] * 100) . '%';

      } else {
        // EN: If '$rowCtotal' have not some record
        // CZ: Pokud '$rowCtotal' neobsahuje záznam

        // Count of all records by usergroup
        $ENVO_COUNTS = 0;
        // Percentage - records by usergroup / all records
        $ENVO_PERCENT = '0%';

      }

    }

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_index.php';

}
?>