<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die('You cannot access this file directly.');

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$JAK_MODULES) jak_redirect(BASE_URL);

// EN: Reset Array (output the error in a array)
// CZ: Reset Pole (výstupní chyby se ukládají do pole)
$success = array();

// EN: Import important settings for the template from the DB
// CZ: Importuj důležité nastavení pro šablonu z DB
$JAK_SETTING = jak_get_setting('setting');

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$jaktable = DB_PREFIX . 'galleryfacebook';

// Get the all data
$JAK_GALLERY_ALL = jak_get_galleryfacebook('', $jaktable);

// Now start with the plugin use a switch to access all pages
switch ($page1) {

  case 'newfacebook':

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["menu"]["m30"] . ' - ' . $tl["facebook"]["f1"];
    $SECTION_DESC = $tl["facebook"]["f2"];

    // EN: Load the template
    // CZ: Načti template (šablonu)
    $template = 'newfacebook.php';

    break;
  default:
    switch ($page1) {
      case 'delete':

        if (is_numeric($page2) && jak_row_exist($page2, $jaktable)) {

          $result = $jakdb->query('SELECT title,pathoriginal,paththumb FROM ' . $jaktable . ' WHERE id = "' . smartsql($page2) . '"');
          $row = $result->fetch_assoc();

          $result1 = $jakdb->query('DELETE FROM ' . $jaktable . ' WHERE id = "' . smartsql($page2) . '"');

          if (!$result1) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            jak_redirect(BASE_URL . 'index.php?p=facebookgallery&sp=e');
          } else {
            $file = APP_PATH . ltrim($row["pathoriginal"], '/') . $row["title"];
            $filethumb = APP_PATH . ltrim($row["paththumb"], '/') . 'thumb_' . $row["title"];

            if (file_exists($file)) {
              unlink($file);
            }
            if (file_exists($filethumb)) {
              unlink($filethumb);
            }

            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - úspěšné
            /*
            NOTIFIKACE:
            'sp=s'   - Záznam úspěšně uložen
            'ssp=s'  - Záznam úspěšně odstraněn
            */
            jak_redirect(BASE_URL . 'index.php?p=facebookgallery&sp=s&ssp=s');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky s notifikací - chybné
          jak_redirect(BASE_URL . 'index.php?p=facebookgallery&sp=ene');
        }
        break;
      case 'edit':

        $JAK_FORM_DATA = jak_get_data($page2, $jaktable);

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["menu"]["m30"] . ' - ' . $tl["facebook"]["f3"];
        $SECTION_DESC = $tl["facebook"]["f4"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $template = 'editfacebook.php';

        break;
      default:

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["menu"]["m30"] . ' - ' . $tl["facebook"]["f5"];
        $SECTION_DESC = $tl["facebook"]["f6"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $template = 'facebookgallery.php';

    }
}


?>