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
$envotable = DB_PREFIX . 'searchlog';

$ENVO_SEARCHLOG_ALL = "";

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'delete':
    // LIST OF SEARCHLOGS - DELETE SEARCHLOGS FROM DB

    $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');

    if (!$result) {
      // EN: Redirect page
      // CZ: Přesměrování stránky s notifikací - chybné
      envo_redirect(BASE_URL . 'index.php?p=searchlog&status=e');
    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky s notifikací - úspěšné
      /*
      NOTIFIKACE:
      'status=s'    - Záznam úspěšně uložen
      'status1=s1'  - Záznam úspěšně odstraněn
      */
      envo_redirect(BASE_URL . 'index.php?p=searchlog&status=s&status1=s1');
    }
    break;
  case 'truncate':
    // LIST OF SEARCHLOGS - TRUNCATE ALL SEARCHLOGS

    $result = $envodb->query('TRUNCATE ' . $envotable);

    if (!$result) {
      // EN: Redirect page
      // CZ: Přesměrování stránky s notifikací - chybné
      envo_redirect(BASE_URL . 'index.php?p=searchlog&status=e');
    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky s notifikací - úspěšné
      /*
      NOTIFIKACE:
      'status=s'    - Záznam úspěšně uložen
      'status1=s2'  - Všechny záznamy úspěšně odstraněny
      */
      envo_redirect(BASE_URL . 'index.php?p=searchlog&status=s&status1=s2');
    }
    break;
  default:
    // LIST OF SEARCHLOGS

    // Let's go on with the script
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (isset($defaults['delete'])) {

        $deleteuser = $defaults['envo_delete_search'];

        for ($i = 0; $i < count($deleteuser); $i++) {
          $deleted = $deleteuser[$i];

          $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($deleted) . '"');

        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky s notifikací - chybné
          envo_redirect(BASE_URL . 'index.php?p=searchlog&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky s notifikací - úspěšné
          /*
          NOTIFIKACE:
          'status=s'    - Záznam úspěšně uložen
          'status1=s1'  - Záznam úspěšně odstraněn
          */
          envo_redirect(BASE_URL . 'index.php?p=searchlog&status=s&status1=s1');
        }

      }

    }

    // Important template Stuff
    $getTotal = envo_get_total($envotable, '', '', '');
    if ($getTotal != 0) {
      // Paginator
      $pages                 = new ENVO_paginator;
      $pages->items_total    = $getTotal;
      $pages->mid_range      = $setting["adminpagemid"];
      $pages->items_per_page = $setting["adminpageitem"];
      $pages->envo_get_page  = $page1;
      $pages->envo_where     = 'index.php?p=searchlog';
      $pages->paginate();
      $ENVO_PAGINATE = $pages->display_pages();

      $ENVO_SEARCHLOG_ALL = envo_get_page_info($envotable, $pages->limit, '');
    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["slogs_sec_title"]["slogst"];
    $SECTION_DESC  = $tl["slogs_sec_desc"]["slogsd"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'searchlog.php';
}
?>