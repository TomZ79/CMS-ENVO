<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

$CHECK_USR_SESSION = session_id();

// -------- DATA FOR ALL FRONTEND PAGES --------
// -------- DATA PRO VŠECHNY FRONTEND STRÁNKY --------

// Show content in template only the user have access
$ENVO_MODULES = $envouser->envoModuleAccess(ENVO_USERID, "1,23");

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/intranet/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/intranet/template/';

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$ENVO_SETTING_VAL = envo_get_setting_val('intranet');

// EN: Set data for the frontend page - Title, Description, Keywords and other ...
// CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
$PAGE_TITLE = $setting["intranettitle"];

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'intranethouse';
$envotable1 = DB_PREFIX . 'intranethousecontact';
$envotable2 = DB_PREFIX . 'intranethouseserv';
$envotable3 = DB_PREFIX . 'intranethouseimg';
$envotable4 = DB_PREFIX . 'intranethousenotifications';
$envotable5 = DB_PREFIX . 'intranethousenotificationug';
$envotable6 = DB_PREFIX . 'intranethousedocu';
$envotable7 = DB_PREFIX . 'intranethouseent';
$envotable8 = DB_PREFIX . 'intranethouseapt';
$envotable9 = DB_PREFIX . 'intranethousetasks';

// Parse links once if needed a lot of time
$backtoblog = ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, '', '', '', '');

// EN: If the user is logged in, get username and usergroup name
// CZ: Pokud je uživatel přihlášen, získej uživatelské jméno a jméno uživatelské skupiny
if (ENVO_USERID) {

  // Get the user name
  $ENVO_USER_NAME = $envouser->getVar('name');
  // Get the user avatar
  $ENVO_USER_AVATAR = $envouser->getVar('picture');
  // Get the user group name
  $result          = $envodb->query('SELECT name FROM ' . DB_PREFIX . 'usergroup WHERE id="' . $envouser->getVar("usergroupid") . '"');
  $row             = $result->fetch_assoc();
  $ENVO_USER_GROUP = $row['name'];

}

// EN: Include the functions
// CZ: Vložené funkce
include_once("functions.php");

// EN: Info about notifications
// CZ: Info o notifikacích
$ENVO_NOTIFICATION = envo_get_notification_unread(ENVO_USERGROUPID, FALSE, $ENVO_SETTING_VAL['intranetdateformat'], $ENVO_SETTING_VAL['intranettimeformat']);

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$ENVO_SETTING_VAL = envo_get_setting_val('intranet');

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
          if (envo_row_permission($pageID, $envotable, ENVO_USERGROUPID)) {
            // USER HAVE PERMISSION

            // EN: Get the data of house
            // CZ: Získání dat o domu
            $result = $envodb->query('SELECT * FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '" LIMIT 1');
            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_HOUSE_DETAIL[]  = $row;
              $envo_house_latitude  = $row['latitude'];
              $envo_house_longitude = $row['longitude'];
            }

            // EN: Get the data of Tasks
            // CZ: Získání dat o Úkolech
            $result = $envodb->query('SELECT * FROM ' . $envotable9 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY id DESC');
            while ($row = $result->fetch_assoc()) {
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
              $ENVO_HOUSE_TASK[] = array(
                'id'            => $row['id'],
                'houseid'       => $row['houseid'],
                'priority'      => $priority,
                'status'        => $status,
                'title'         => $row['title'],
                'description'   => $row['description'],
                'reminder'      => date($ENVO_SETTING_VAL['intranetdateformat'], strtotime($row['reminder'])),
                'time'          => date($ENVO_SETTING_VAL['intranetdateformat'], strtotime($row['time'])),
              );

            }

            // EN: Get the data of main contacts
            // CZ: Získání dat o hlavních kontaktech
            $result = $envodb->query('SELECT * FROM ' . $envotable1 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY id ASC');
            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_HOUSE_CONT[] = $row;
            }

            // EN: Get the data of entrance
            // CZ: Získání dat o vchodech
            $result = $envodb->query('SELECT * FROM ' . $envotable7 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY id ASC');
            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_HOUSE_ENT[] = $row;
            }

            // EN: Get the data of apartment
            // CZ: Získání dat o bytech
            $result = $envodb->query('SELECT * FROM ' . $envotable8 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY id ASC');
            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_HOUSE_APT[] = $row;
            }

            // EN: Get the data of services
            // CZ: Získání dat o servisech
            $result = $envodb->query('SELECT * FROM ' . $envotable2 . ' WHERE houseid = "' . smartsql($pageID) . '" AND deleted = 0 ORDER BY id DESC');
            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_HOUSE_SERV[] = $row;
            }

            // EN: Get the data of documentation
            // CZ: Získání dat o dokumentech
            $result = $envodb->query('SELECT * FROM ' . $envotable6 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY id ASC');
            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_HOUSE_DOCU[] = $row;
            }

            // EN: Get the data of images
            // CZ: Získání dat o obrázcích
            $result = $envodb->query('SELECT * FROM ' . $envotable3 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY id DESC');
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

            envo_redirect(ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, '404', '', '', ''));

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
            envo_redirect(ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, '404', '', '', ''));
          }
        }

        // ----------- SUCCESS: CODE FOR MAIN PAGE ------------
        // -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

        // EN: Getting the data about the Houses by usergroupid
        // CZ: Získání dat o bytových domech podle 'id' uživatelské skupiny
        $ENVO_HOUSE_ALL = envo_get_house_info($envotable, FALSE, ENVO_USERGROUPID);

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
          if (envo_row_permission($pageID, $envotable4, ENVO_USERGROUPID)) {
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
                $result = $envodb->query('UPDATE ' . $envotable5 . ' SET
                          unread = "1"
                          WHERE notification_id = "' . smartsql($pageID) . '"
                          AND usergroup_id = "' . ENVO_USERGROUPID . '"');

                if (!$result) {

                } else {
                  // EN: Info about notifications - refresh data
                  // CZ: Info o notifikacích - refresh data
                  $ENVO_NOTIFICATION = envo_get_notification_unread(ENVO_USERGROUPID, FALSE, $ENVO_SETTING_VAL['intranetdateformat'], $ENVO_SETTING_VAL['intranettimeformat']);
                }

              }

            }

            $result = $envodb->query('
                      SELECT ' . $envotable4 . '.*, ' . $envotable5 . '.unread 
                      FROM ' . $envotable4 . ', ' . $envotable5 . ' 
                      WHERE ' . $envotable4 . '.id = "' . smartsql($pageID) . '"
                      AND ' . $envotable5 . '.notification_id="' . smartsql($pageID) . '"
                      AND ' . $envotable5 . '.usergroup_id="' . ENVO_USERGROUPID . '"
                      LIMIT 1
                      ');

            while ($row = $result->fetch_assoc()) {
              // EN: Insert each record into array
              // CZ: Vložení získaných dat do pole
              $ENVO_NOTIFICATION_DETAIL[] = array(
                'name'    => $row['name'],
                'type'    => $row['type'],
                'content' => $row['content'],
                'created' => date($ENVO_SETTING_VAL['intranetdateformat'] . $ENVO_SETTING_VAL['intranettimeformat'], strtotime($row['created']))
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

            envo_redirect(ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, '404', '', '', ''));

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
            envo_redirect(ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, '404', '', '', ''));
          }
        }

        // ----------- SUCCESS: CODE FOR MAIN PAGE ------------
        // -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

        // EN: Getting the data about the Notifications by usergroupid
        // CZ: Získání dat o Notifikacích podle 'id' uživatelské skupiny
        $ENVO_NOTIFICATION_ALL = envo_get_notification_all(ENVO_USERGROUPID, FALSE, $ENVO_SETTING_VAL['intranetdateformat'], $ENVO_SETTING_VAL['intranettimeformat']);

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
        envo_redirect(ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, '404', '', '', ''));
      }
    }

    // ----------- SUCCESS: CODE FOR MAIN PAGE ------------
    // -------- VŠE V POŘÁDKU: KÓD PRO HLAVNÍ STRÁNKU --------

    // Get the stats
    if (ENVO_USERGROUPID == 3) {
      // EN: If usergroup is 'Administrator'
      // CZ: Pokud je uživatelská skupiny přihlášeného uživatele 'Administrator'

      /* =====================================================
       *  HOUSE STATISTIC - STATISTIKA DOMŮ
       * ===================================================== */
      // EN: Getting count of all records in DB
      // CZ: Získání počtu všech záznamů v DB
      $result    = $envodb->query('SELECT COUNT(*) as houseCtotal FROM ' . $envotable);
      $rowCtotal = $result->fetch_assoc();

      // Count of all records by usergroup
      $ENVO_COUNTS = $rowCtotal['houseCtotal'];
      // Percentage - records by usergroup / all records
      $ENVO_PERCENT = ($rowCtotal['houseCtotal'] * 100) . '%';

      /* =====================================================
       *  TASKS STATISTIC - STATISTIKA ÚKOLŮ
       * ===================================================== */
      // EN: Get the data of main contacts
      // CZ: Získání dat o hlavních kontaktech
      $ENVO_HOUSE_TASK = envo_get_task_info(ENVO_USERGROUPID, TRUE, 'tabs2', $ENVO_SETTING_VAL['intranetdateformat'], $ENVO_SETTING_VAL['intranettimeformat']);

      // Count of all records by usergroup
      $ENVO_TASK_COUNTS = $ENVO_HOUSE_TASK['count_of_task'];
      // Percentage - records by usergroup / all records
      $ENVO_TASK_PERCENT = ($ENVO_HOUSE_TASK['count_of_task'] * 100) . '%';

    } else {
      // EN: For other usergroup
      // CZ: Ostatní uživatelské skupiny přihlášených uživatelů

      /* =====================================================
       *  HOUSE STATISTIC - STATISTIKA DOMŮ
       * ===================================================== */
      // EN: Getting count of all records in DB
      // CZ: Získání počtu všech záznamů v DB
      $result    = $envodb->query('SELECT COUNT(*) as houseCtotal FROM ' . $envotable);
      $rowCtotal = $result->fetch_assoc();

      if ($rowCtotal['houseCtotal'] > 0) {
        // EN: If '$rowCtotal' have some record
        // CZ: Pokud '$rowCtotal' obsahuje záznam

        // EN: Getting count of records in DB by usergroup
        // CZ: Získání počtu záznamů v DB podle uživatelské skupiny
        // Find in permission column 'usergroupid' or '0'. 0 means availability for all user groups.
        $result = $envodb->query('SELECT * FROM ' . $envotable . ' WHERE FIND_IN_SET("' . ENVO_USERGROUPID . '", permission) OR  FIND_IN_SET("0", permission)');

        // EN: Determine the number of rows in the result from DB
        // CZ: Určení počtu řádků ve výsledku z DB
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

      /* =====================================================
       *  TASKS STATISTIC - STATISTIKA ÚKOLŮ
       * ===================================================== */
      // EN: Get the data of main contacts
      // CZ: Získání dat o hlavních kontaktech
      $ENVO_HOUSE_TASK = envo_get_task_info(ENVO_USERGROUPID, TRUE, 'tabs2', $ENVO_SETTING_VAL['intranetdateformat']);

      // EN: Getting count of all records in DB
      // CZ: Získání počtu všech záznamů v DB
      $result     = $envodb->query('SELECT COUNT(*) as taskCtotal FROM ' . $envotable9);
      $taskCtotal = $result->fetch_assoc();

      // Count of all records by usergroup
      $ENVO_TASK_COUNTS = $ENVO_HOUSE_TASK['count_of_task'];
      // Percentage - records by usergroup / all records
      $ENVO_TASK_PERCENT = ($ENVO_TASK_COUNTS / $taskCtotal['taskCtotal'] * 100) . '%';

    }

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_index.php';

}
?>