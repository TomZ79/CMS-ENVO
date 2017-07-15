<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$JAK_MODULES) envo_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable = DB_PREFIX . 'loginlog';

$JAK_LOGINLOG_ALL = "";

// Important template Stuff
$getTotal = envo_get_total($envotable, '', '', '');
if ($getTotal != 0) {
  // Paginator
  $pages                 = new JAK_Paginator;
  $pages->items_total    = $getTotal;
  $pages->mid_range      = $jkv["adminpagemid"];
  $pages->items_per_page = $jkv["adminpageitem"];
  $pages->jak_get_page   = $page1;
  $pages->jak_where      = 'index.php?p=logs';
  $pages->paginate();
  $JAK_PAGINATE = $pages->display_pages();

  $JAK_LOGINLOG_ALL = envo_get_page_info($envotable, $pages->limit, '');
}

// Let's go on with the script
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // EN: Default Variable
  // CZ: Hlavní proměnné
  $defaults = $_POST;

  if (isset($defaults['delete'])) {

    $lockuser = $defaults['jak_delete_log'];

    for ($i = 0; $i < count($lockuser); $i++) {
      $locked = $lockuser[$i];
      $result = $jakdb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($locked) . '"');

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

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'delete':
    $result = $jakdb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');

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
    $result = $jakdb->query('TRUNCATE ' . $envotable);

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

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["logs_sec_title"]["logst"];
    $SECTION_DESC  = $tl["logs_sec_desc"]["logsd"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'logs.php';
}
?>