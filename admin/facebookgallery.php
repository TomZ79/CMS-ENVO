<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$JAK_MODULES) envo_redirect(BASE_URL);

// EN: Reset Array (output the error in a array)
// CZ: Reset Pole (výstupní chyby se ukládají do pole)
$success = array();

// EN: Import important settings for the template from the DB
// CZ: Importuj důležité nastavení pro šablonu z DB
$JAK_SETTING = envo_get_setting('setting');

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$JAK_SETTING_VAL = envo_get_setting_val('setting');

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable = DB_PREFIX . 'galleryfacebook';

// Get the all data
$JAK_GALLERY_ALL = envo_get_galleryfacebook('', $envotable, 'DESC');

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'newfacebook':

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["fb_sec_title"]["fbt1"];
    $SECTION_DESC  = $tl["fb_sec_desc"]["fbd1"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'newfacebook.php';

    break;
  default:
    switch ($page1) {
      case 'delete':

        if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

          $result = $jakdb->query('SELECT title,pathoriginal,paththumb FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');
          $row    = $result->fetch_assoc();

          $result1 = $jakdb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');

          if (!$result1) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            envo_redirect(BASE_URL . 'index.php?p=facebookgallery&status=e');
          } else {
            $file      = APP_PATH . ltrim($row["pathoriginal"], '/') . $row["title"];
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
            'status=s'    - Záznam úspěšně uložen
            'status1=s1'  - Záznam úspěšně odstraněn
            */
            envo_redirect(BASE_URL . 'index.php?p=facebookgallery&status=s&status1=s1');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky s notifikací - chybné
          envo_redirect(BASE_URL . 'index.php?p=facebookgallery&status=ene');
        }
        break;
      case 'edit':

        $JAK_FORM_DATA = envo_get_data($page2, $envotable);

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["fb_sec_title"]["fbt2"];
        $SECTION_DESC  = $tl["fb_sec_desc"]["fbd2"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $template = 'editfacebook.php';

        break;
      default:

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["fb_sec_title"]["fbt3"];
        $SECTION_DESC  = $tl["fb_sec_desc"]["fbd3"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $template = 'facebookgallery.php';

    }
}


?>