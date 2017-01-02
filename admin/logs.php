<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die('You cannot access this file directly.');

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$JAK_MODULES) jak_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$jaktable = DB_PREFIX . 'loginlog';

$JAK_LOGINLOG_ALL = "";

// Important template Stuff
$getTotal = jak_get_total($jaktable, '', '', '');
if ($getTotal != 0) {
  // Paginator
  $pages = new JAK_Paginator;
  $pages->items_total = $getTotal;
  $pages->mid_range = $jkv["adminpagemid"];
  $pages->items_per_page = $jkv["adminpageitem"];
  $pages->jak_get_page = $page1;
  $pages->jak_where = 'index.php?p=logs';
  $pages->paginate();
  $JAK_PAGINATE = $pages->display_pages();

  $JAK_LOGINLOG_ALL = jak_get_page_info($jaktable, $pages->limit, '');
}

// Let's go on with the script
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $defaults = $_POST;

  if (isset($defaults['delete'])) {

    $lockuser = $defaults['jak_delete_log'];

    for ($i = 0; $i < count($lockuser); $i++) {
      $locked = $lockuser[$i];
      $result = $jakdb->query('DELETE FROM ' . $jaktable . ' WHERE id = "' . smartsql($locked) . '"');

    }

    if (!$result) {
      // EN: Redirect page
      // CZ: Přesměrování stránky s notifikací - chybné
      jak_redirect(BASE_URL . 'index.php?p=logs&sp=e');
    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky s notifikací - úspěšné
      /*
      NOTIFIKACE:
      'sp=s'   - Záznam úspěšně uložen
      'ssp=s'  - Záznam úspěšně odstraněn
      */
      jak_redirect(BASE_URL . 'index.php?p=logs&sp=s&ssp=s');
    }

  }

}

switch ($page1) {
  case 'delete':
    $result = $jakdb->query('DELETE FROM ' . $jaktable . ' WHERE id = "' . smartsql($page2) . '"');

    if (!$result) {
      // EN: Redirect page
      // CZ: Přesměrování stránky s notifikací - chybné
      jak_redirect(BASE_URL . 'index.php?p=logs&sp=e');
    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky s notifikací - úspěšné
      /*
      NOTIFIKACE:
      'sp=s'   - Záznam úspěšně uložen
      'ssp=s'  - Záznam úspěšně odstraněn
      */
      jak_redirect(BASE_URL . 'index.php?p=logs&sp=s&ssp=s');
    }
    break;
  case 'truncate':
    $result = $jakdb->query('TRUNCATE ' . $jaktable);

    if (!$result) {
      // EN: Redirect page
      // CZ: Přesměrování stránky s notifikací - chybné
      jak_redirect(BASE_URL . 'index.php?p=logs&sp=e');
    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky s notifikací - úspěšné
      /*
      NOTIFIKACE:
      'sp=s'   - Záznam úspěšně uložen
      'ssp=s1'  - Všechny záznamy úspěšně odstraněny
      */
      jak_redirect(BASE_URL . 'index.php?p=logs&sp=s&ssp=s1');
    }
    break;
  default:

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["sec_title"]["sect2"];
    $SECTION_DESC = $tl["sec_desc"]["secd2"];

    // EN: Load the template
    // CZ: Načti template (šablonu)
    $template = 'logs.php';
}
?>