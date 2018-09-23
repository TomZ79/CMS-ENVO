<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$ENVO_MODULES) envo_redirect(BASE_URL);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable = DB_PREFIX . 'loginlog';

$ENVO_LOGINLOG_ALL = "";

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'delete':
    // LIST OF LOGS - DELETE LOGS FROM DB

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $pageID = $page2;

    $result = $envodb -> query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '"');

    if (!$result) {
      // EN: Redirect page
      // CZ: Přesměrování stránky s notifikací - chybné
      envo_redirect(BASE_URL . 'index.php?p=logs&status=e');
    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky s notifikací - úspěšné
      /*
      NOTIFIKACE:
      'status=s'    - Záznam úspěšně uložen
      'status1=s1'  - Záznam úspěšně odstraněn
      */
      envo_redirect(BASE_URL . 'index.php?p=logs&status=s&status1=s1');
    }
    break;
  case 'truncate':
    // LIST OF LOGS - TRUNCATE ALL LOGS

    $result = $envodb -> query('TRUNCATE ' . $envotable);

    if (!$result) {
      // EN: Redirect page
      // CZ: Přesměrování stránky s notifikací - chybné
      envo_redirect(BASE_URL . 'index.php?p=logs&status=e');
    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky s notifikací - úspěšné
      /*
      NOTIFIKACE:
      'status=s'   	- Záznam úspěšně uložen
      'status1=s2'  - Všechny záznamy úspěšně odstraněny
      */
      envo_redirect(BASE_URL . 'index.php?p=logs&status=s&status1=s2');
    }
    break;
  default:
    // LIST OF LOGS

    // Let's go on with the script
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (isset($defaults['delete'])) {

        $deleteuser = $defaults['envo_delete_log'];

        for ($i = 0; $i < count($deleteuser); $i++) {
          $deleted = $deleteuser[$i];
          $result  = $envodb -> query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($deleted) . '"');

        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky s notifikací - chybné
          envo_redirect(BASE_URL . 'index.php?p=logs&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky s notifikací - úspěšné
          /*
          NOTIFIKACE:
          'status=s'    - Záznam úspěšně uložen
          'status1=s1'  - Záznam úspěšně odstraněn
          */
          envo_redirect(BASE_URL . 'index.php?p=logs&status=s&status1=s1');
        }

      }

    }

    // Important template Stuff
    $getTotal = envo_get_total($envotable, '', '', '');
    if ($getTotal != 0) {

      $ENVO_LOGINLOG_ALL = envo_get_page_info($envotable, '');

    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["logs_sec_title"]["logst"];
    $SECTION_DESC  = $tl["logs_sec_desc"]["logsd"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'logs.php';
}
?>