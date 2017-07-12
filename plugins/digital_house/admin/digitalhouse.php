<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$jakuser->jakModuleaccess(JAK_USERID, JAK_ACCESSBLOG)) envo_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable = DB_PREFIX . 'digitalhousecities';

// Now start with the plugin use a switch to access all pages
switch ($page1) {

  case 'cities':

    switch ($page2) {

      case 'newcity':
        // ADD NEW CITY TO DB

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $jakfield = 'name';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (isset($_POST['btnSave'])) {

            // EN: Check if name isn't empty
            // CZ: Kontrola jestli je zadaný název
            if (empty($defaults['envo_cityname'])) {
              $errors['e1'] = $tl['general_error']['generror60'] . '<br>';
            }

            // EN: Check if the name not exists
            // CZ: Kontrola jestli název neexistuje
            if (envo_field_not_exist($defaults['envo_cityname'], $envotable, $jakfield)) {
              $errors['e2'] = $tl['general_error']['generror61'] . '<br>';
            }

            // EN: All checks are OK without Errors - Start the form processing
            // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
            if (count($errors) == 0) {

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * url_slug  - friendly URL slug from a string
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
               * url_slug  - friendly URL slug from a string
              */
              $result = $jakdb->query('INSERT INTO ' . $envotable . ' SET 
                        name = "' . smartsql($defaults['envo_cityname']) . '",
                        varname = "' . url_slug($defaults['envo_cityname']) . '"');

              $rowid = $jakdb->jak_last_id();

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=digital-house&sp=cities&ssp=newcity&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=digital-house&sp=cities&ssp=editcity&id=' . $rowid . '&status=s');
              }

            } else {
              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }

          }

        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tldh["dh_sec_title"]["dht2"];
        $SECTION_DESC  = $tldh["dh_sec_desc"]["dhd2"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $plugin_template = 'plugins/digital_house/admin/template/dh_newcity.php';

        break;
      case 'editcity':
        // EDIT CITY IN DB

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $pageID = $page3;
        $jakfield = 'name';

        if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            if (isset($_POST['btnSave'])) {

              // EN: Check if name isn't empty
              // CZ: Kontrola jestli je zadaný název
              if (empty($defaults['envo_cityname'])) {
                $errors['e1'] = $tl['general_error']['generror60'] . '<br>';
              }

              // EN: Check if the name not exists
              // CZ: Kontrola jestli název neexistuje
              if (envo_field_not_exist($defaults['envo_cityname'], $envotable, $jakfield)) {
                $errors['e2'] = $tl['general_error']['generror61'] . '<br>';
              }

              // EN: All checks are OK without Errors - Start the form processing
              // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
              if (count($errors) == 0) {

                /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * url_slug  - friendly URL slug from a string
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
               * url_slug  - friendly URL slug from a string
              */
                $result = $jakdb->query('UPDATE ' . $envotable . ' SET
                          name = "' . smartsql($defaults['envo_cityname']) . '",
                          varname = "' . url_slug($defaults['envo_cityname']) . '"
                          WHERE id = "' . smartsql($pageID) . '"');


                if (!$result) {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=digital-house&sp=cities&ssp=editcity&id=' . $pageID . '&status=e');
                } else {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=digital-house&sp=cities&ssp=editcity&id=' . $pageID . '&status=s');
                }

              } else {
                $errors['e'] = $tl['general_error']['generror'] . '<br>';
                $errors      = $errors;
              }

            }

          }

          // EN: Get all the data for the form
          // CZ: Získání všech dat pro formulář
          $JAK_FORM_DATA = envo_get_data($pageID, $envotable);

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tldh["dh_sec_title"]["dht3"];
          $SECTION_DESC  = $tldh["dh_sec_desc"]["dhd3"];

          // EN: Load the template
          // CZ: Načti template (šablonu)
          $plugin_template = 'plugins/digital_house/admin/template/dh_editcity.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=digital-house&sp=cities&status=ene');
        }

        break;
      default:
        // LIST OF CITIES


        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tldh["dh_sec_title"]["dht1"];
        $SECTION_DESC  = $tldh["dh_sec_desc"]["dhd1"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $plugin_template = 'plugins/digital_house/admin/template/dh_cities.php';

    }

    break;
  case 'setting':

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (count($errors) == 0) {

        /* EN: Convert value
         * smartsql - secure method to insert form data into a MySQL DB
         * ------------------
         * CZ: Převod hodnot
         * smartsql - secure method to insert form data into a MySQL DB
        */
        $result = $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
                    WHEN "digitalhousetitle" THEN "' . smartsql($defaults['jak_title']) . '"
                  END
                  WHERE varname IN ("digitalhousetitle")');

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=digital-house&sp=setting&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=digital-house&sp=setting&status=s');
        }
      } else {
        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // EN: Import important settings for the template from the DB
    // CZ: Importuj důležité nastavení pro šablonu z DB
    $JAK_SETTING = envo_get_setting('digitalhouse');

    // EN: Import important settings for the template from the DB (only VALUE)
    // CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
    $JAK_SETTING_VAL = envo_get_setting_val('digitalhouse');

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tldh["dh_sec_title"]["dht"];
    $SECTION_DESC  = $tldh["dh_sec_desc"]["dhd"];

    // EN: Load the template
    // CZ: Načti template (šablonu)
    $plugin_template = 'plugins/digital_house/admin/template/dh_setting.php';

    break;
  default:

}
?>