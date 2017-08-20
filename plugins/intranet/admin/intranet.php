<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$jakuser->jakModuleaccess(JAK_USERID, JAK_ACCESSBLOG)) envo_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'intranethouse';
$envotable1 = DB_PREFIX . 'intranethousedetail';
$envotable2 = DB_PREFIX . 'intranetappartement';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../plugins/intranet/admin/include/functions.php");

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'house':

    switch ($page2) {
      case 'newhouse':
        // ADD NEW HOUSE TO DB

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (isset($_POST['btnSave'])) {

            // EN: Check if name of house isn't empty
            // CZ: Kontrola jestli je zadáný název domu
            if (empty($defaults['envo_housename'])) {
              $errors['e1'] = $tlint['int_error']['interror'] . '<br>';
            }

            // EN: Check if count of entrance isn't empty
            // CZ: Kontrola jestli je zadáný počet vchodů
            if (empty($defaults['envo_countentranceall'])) {
              $errors['e2'] = $tlint['int_error']['interror1'] . '<br>';
            }

            // EN: Check if count of entrance is numeric
            // CZ: Kontrola jestli počet vchodů je číslo
            if (!empty($defaults['envo_countentranceall']) && !is_numeric($defaults['envo_countentranceall'])) {
              $errors['e3'] = $tlint['int_error']['interror2'] . '<br>';
            }

            // EN: Check if count of apartment isn't empty
            // CZ: Kontrola jestli je zadáný počet bytů
            if (empty($defaults['envo_countapartmentall'])) {
              $errors['e4'] = $tlint['int_error']['interror3'] . '<br>';
            }

            // EN: Check if count of apartment is numeric
            // CZ: Kontrola jestli počet bytů je číslo
            if (!empty($defaults['envo_countapartmentall']) && !is_numeric($defaults['envo_countapartmentall'])) {
              $errors['e5'] = $tlint['int_error']['interror4'] . '<br>';
            }

            // EN: Check if the ic not exists
            // CZ: Kontrola jestli ič neexistuje
            if (!empty($defaults['envo_houseic']) && is_numeric($defaults['envo_houseic']) && envo_house_not_exist($defaults['envo_houseic'], $envotable)) {
              $errors['e6'] = $tlint['int_error']['interror5'] . '<br>';
            }

            // EN: Check if ic is numeric
            // CZ: Kontrola jestli ič je číslo
            if (!empty($defaults['envo_houseic']) && !is_numeric($defaults['envo_houseic'])) {
              $errors['e7'] = $tlint['int_error']['interror6'] . '<br>';
            }


            // EN: All checks are OK without Errors - Start the form processing
            // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
            if (count($errors) == 0) {

              if (!isset($defaults['jak_permission'])) {
                $permission = 0;
              } elseif (in_array(0, $defaults['jak_permission'])) {
                $permission = 0;
              } else {
                $permission = join(',', $defaults['jak_permission']);
              }

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * url_slug  - friendly URL slug from a string
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
               * url_slug  - friendly URL slug from a string
              */
              $result = $jakdb->query('INSERT INTO ' . $envotable . ' SET 
                        name = "' . smartsql($defaults['envo_housename']) . '",
                        varname = "' . url_slug($defaults['envo_housename'], array('transliterate' => TRUE)) . '",
                        street = "' . smartsql($defaults['envo_housestreet']) . '",
                        city = "' . smartsql($defaults['envo_housecity']) . '",
                        psc = "' . smartsql($defaults['envo_housepsc']) . '",
                        state = "' . smartsql($defaults['envo_housestate']) . '",
                        ic = "' . smartsql($defaults['envo_houseic']) . '",
                        dic = "' . smartsql($defaults['envo_housedic']) . '",
                        countentrance = "' . smartsql($defaults['envo_countentranceall']) . '",
                        countapartment = "' . smartsql($defaults['envo_countapartmentall']) . '",
                        permission = "' . smartsql($permission) . '"');

              $rowid = $jakdb->jak_last_id();

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=intranet&sp=house&ssp=newhouse&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=intranet&sp=house&ssp=edithouse&id=' . $rowid . '&status=s');
              }

            } else {
              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }
        }

        // Get all usergroup's
        $JAK_USERGROUP = envo_get_usergroup_all('usergroup');

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlint["int_sec_title"]["intt2"];
        $SECTION_DESC  = $tlint["int_sec_desc"]["intd2"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = 'plugins/intranet/admin/template/int_newhouse.php';

        break;
      case 'edithouse':
        // EDIT HOUSE

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $pageID = $page3;

        if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            if (isset($_POST['btnSave'])) {

              // EN: Check if name of house isn't empty
              // CZ: Kontrola jestli je zadáný název domu
              if (empty($defaults['envo_housename'])) {
                $errors['e1'] = $tlint['int_error']['interror'] . '<br>';
              }

              // EN: Check if count of entrance isn't empty
              // CZ: Kontrola jestli je zadáný počet vchodů
              if (empty($defaults['envo_countentranceall'])) {
                $errors['e2'] = $tlint['int_error']['interror1'] . '<br>';
              }

              // EN: Check if count of entrance is numeric
              // CZ: Kontrola jestli počet vchodů je číslo
              if (!empty($defaults['envo_countentranceall']) && !is_numeric($defaults['envo_countentranceall'])) {
                $errors['e3'] = $tlint['int_error']['interror2'] . '<br>';
              }

              // EN: Check if count of apartment isn't empty
              // CZ: Kontrola jestli je zadáný počet bytů
              if (empty($defaults['envo_countapartmentall'])) {
                $errors['e4'] = $tlint['int_error']['interror3'] . '<br>';
              }

              // EN: Check if count of apartment is numeric
              // CZ: Kontrola jestli počet bytů je číslo
              if (!empty($defaults['envo_countapartmentall']) && !is_numeric($defaults['envo_countapartmentall'])) {
                $errors['e5'] = $tlint['int_error']['interror4'] . '<br>';
              }

              // EN: Check if ic is numeric
              // CZ: Kontrola jestli ič je číslo
              if (!empty($defaults['envo_houseic']) && !is_numeric($defaults['envo_houseic'])) {
                $errors['e7'] = $tlint['int_error']['interror6'] . '<br>';
              }

              // EN: All checks are OK without Errors - Start the form processing
              // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
              if (count($errors) == 0) {

                if (!isset($defaults['jak_permission'])) {
                  $permission = 0;
                } elseif (in_array(0, $defaults['jak_permission'])) {
                  $permission = 0;
                } else {
                  $permission = join(',', $defaults['jak_permission']);
                }

                /* EN: Convert value
                 * smartsql - secure method to insert form data into a MySQL DB
                 * url_slug  - friendly URL slug from a string
                 * ------------------
                 * CZ: Převod hodnot
                 * smartsql - secure method to insert form data into a MySQL DB
                 * url_slug  - friendly URL slug from a string
                */
                $result = $jakdb->query('UPDATE ' . $envotable . ' SET
                        name = "' . smartsql($defaults['envo_housename']) . '",
                        varname = "' . url_slug($defaults['envo_housename'], array('transliterate' => TRUE)) . '",
                        street = "' . smartsql($defaults['envo_housestreet']) . '",
                        city = "' . smartsql($defaults['envo_housecity']) . '",
                        psc = "' . smartsql($defaults['envo_housepsc']) . '",
                        state = "' . smartsql($defaults['envo_housestate']) . '",
                        ic = "' . smartsql($defaults['envo_houseic']) . '",
                        dic = "' . smartsql($defaults['envo_housedic']) . '",
                        countentrance = "' . smartsql($defaults['envo_countentranceall']) . '",
                        countapartment = "' . smartsql($defaults['envo_countapartmentall']) . '",
                        permission = "' . smartsql($permission) . '"
                        WHERE id = "' . smartsql($pageID) . '"');

                if (!$result) {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=intranet&sp=house&ssp=edithouse&id=' . $pageID . '&status=e');
                } else {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=intranet&sp=house&ssp=edithouse&id=' . $pageID . '&status=s');
                }

              } else {
                $errors['e'] = $tl['general_error']['generror'] . '<br>';
                $errors      = $errors;
              }

            }
          }

          // Get all usergroup's
          $JAK_USERGROUP = envo_get_usergroup_all('usergroup');

          // EN: Get all the data for the form - house
          // CZ: Získání všech dat pro formulář - bytový dům
          $JAK_FORM_DATA = envo_get_data($pageID, $envotable);

          // EN: Get all the data for the form - entrance
          // CZ: Získání všech dat pro formulář - vchody
          $JAK_FORM_DATA_ENT = envo_get_house_entrance($pageID, $envotable1);

          // EN: Get all the data for the form - apartment
          // CZ: Získání všech dat pro formulář - byty
          $JAK_FORM_DATA_APT = envo_get_house_apartment($pageID, $envotable2);

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tlint["int_sec_title"]["intt3"];
          $SECTION_DESC  = $tlint["int_sec_desc"]["intd3"];

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $plugin_template = 'plugins/intranet/admin/template/int_edithouse.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=intranet&sp=house&status=ene');
        }

        break;
      default:
        // LIST OF HOUSE

        // EN: Getting the data about the Houses
        // CZ: Získání dat o bytových domech
        $JAK_HOUSE_ALL = envo_get_house_info($envotable);

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlint["int_sec_title"]["intt1"];
        $SECTION_DESC  = $tlint["int_sec_desc"]["intd1"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = 'plugins/intranet/admin/template/int_house.php';

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
                    WHEN "intranettitle" THEN "' . smartsql($defaults['envo_title']) . '"
                    WHEN "intranetskin" THEN "' . smartsql($defaults['envo_skin']) . '"
                  END
                  WHERE varname IN ("intranettitle", "intranetskin")');

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=intranet&sp=setting&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=intranet&sp=setting&status=s');
        }
      } else {
        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // EN: Import important settings for the template from the DB
    // CZ: Importuj důležité nastavení pro šablonu z DB
    $JAK_SETTING = envo_get_setting('intranet');

    // EN: Import important settings for the template from the DB (only VALUE)
    // CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
    $JAK_SETTING_VAL = envo_get_setting_val('intranet');

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlint["int_sec_title"]["intt"];
    $SECTION_DESC  = $tlint["int_sec_desc"]["intd"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = 'plugins/intranet/admin/template/int_setting.php';

    break;
  default:


}

?>