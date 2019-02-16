<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);


// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$envouser -> envoModuleAccess(ENVO_USERID, ENVO_ACCESS_INTRANET)) envo_redirect(BASE_URL);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/intranet/admin/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/intranet/admin/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable   = DB_PREFIX . 'int_house';
$envotable1  = DB_PREFIX . 'int_houseent';
$envotable2  = DB_PREFIX . 'int_houseapt';
$envotable3  = DB_PREFIX . 'int_housecontact';
$envotable4  = DB_PREFIX . 'int_housedocu';
$envotable5  = DB_PREFIX . 'int_houseimg';
$envotable6  = DB_PREFIX . 'int_houseserv';
$envotable7  = DB_PREFIX . 'int_housenotifications';
$envotable8  = DB_PREFIX . 'int_housenotificationug';
$envotable9  = DB_PREFIX . 'int_housetower';
$envotable10 = DB_PREFIX . 'int_housechannel';
$envotable11 = DB_PREFIX . 'int_housetasks';
$envotable12 = DB_PREFIX . 'int_housevideo';
$envotable13 = DB_PREFIX . 'int_houseanalytics';
$envotable14 = DB_PREFIX . 'int_houseanalyticsdocu';
$envotable15 = DB_PREFIX . 'int_houseanalyticsimg';
$envotable16 = DB_PREFIX . 'int_settings_region';
$envotable17 = DB_PREFIX . 'int_settings_district';
$envotable18 = DB_PREFIX . 'int_settings_city';
$envotable19 = DB_PREFIX . 'int_settings_cityarea';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../plugins/intranet/admin/include/functions.php");

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$ENVO_SETTING_VAL = envo_get_setting_val('intranet');

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'house':
    // HOUSE IN ADMINISTRATION

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

            // EN: Check if the ic exists
            // CZ: Kontrola jestli ič existuje
            if (!empty($defaults['envo_housefic']) && is_numeric($defaults['envo_housefic']) && envo_house_exist($defaults['envo_housefic'], $envotable)) {
              $errors['e6'] = $tlint['int_error']['interror5'] . '<br>';
            }

            // EN: Check if ic is numeric
            // CZ: Kontrola jestli ič je číslo
            if (!empty($defaults['envo_housefic']) && !is_numeric($defaults['envo_housefic'])) {
              $errors['e7'] = $tlint['int_error']['interror6'] . '<br>';
            }

            // EN: Check if ic of house isn't empty
            // CZ: Kontrola jestli je zadáné ič
            if (empty($defaults['envo_houseic']) || !is_numeric($defaults['envo_houseic'])) {
              $errors['e8'] = $tlint['int_error']['interror8'] . '<br>';
            }


            // EN: All checks are OK without Errors - Start the form processing
            // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
            if (count($errors) == 0) {

              // Permissions
              if (!isset($defaults['envo_permission'])) {
                $permission = 0;
              } elseif (in_array(0, $defaults['envo_permission'])) {
                $permission = 0;
              } else {
                $permission = join(',', $defaults['envo_permission']);
              }

              // EN: New folder of house for documents, images and other ...
              // CZ: Nová složka domu pro dokumenty, obrázky a další ...
              // -----------------
              //The name of the directory that we need to create
              $uniqfolder = uniqid('house_');
              $pathfolder = '/intranet/houses/' . $uniqfolder;
              //Check if the directory already exists.
              if (!is_dir(APP_PATH . $pathfolder)) {
                //Directory does not exist, so lets create it.

                // Main folder
                mkdir(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder, 0755, TRUE);
                // Document folder
                mkdir(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder . '/documents/', 0755, TRUE);
                // Fotogallery folder
                mkdir(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder . '/images/', 0755, TRUE);
                // Videogallery folder
                mkdir(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder . '/videos/', 0755, TRUE);
                // Create '*.txt' info file
                $data = '
HOUSE NAME - ' . $defaults['envo_housename'] . '
-----------------------------------------------
House created: ' . date('Y-m-d H:i:s') . '
Format date: Y-m-d H:i:s

INFO ABOUT HOUSE
-----------------------------------------------
Name:     ' . $defaults['envo_housename'] . '
Street:   ' . $defaults['envo_housestreet'] . '
City:     ' . $defaults['envo_housecity'] . '
Area:     ' . $defaults['envo_housecityarea'] . '
IČ:       ' . $defaults['envo_housefic'] . '
                        ';
                $data = iconv(mb_detect_encoding($data, mb_detect_order(), true), 'UTF-8', $data);
                file_put_contents(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder . '/house_info.txt', $data);

              }

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * url_slug  - friendly URL slug from a string
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
               * url_slug  - friendly URL slug from a string
              */
              $result = $envodb -> query('INSERT INTO ' . $envotable . ' SET 
                        name = "' . smartsql($defaults['envo_housename']) . '",
                        varname = "' . url_slug($defaults['envo_housename'], array ( 'transliterate' => TRUE )) . '",
                        headquarters = "' . smartsql($defaults['envo_househeadquarters']) . '",
                        street = "' . smartsql($defaults['envo_housestreet']) . '",
                        city = "' . smartsql($defaults['envo_housecity']) . '",
                        cityarea = "' . smartsql($defaults['envo_housecityarea']) . '",
                        psc = "' . smartsql($defaults['envo_housepsc']) . '",
                        ic = "' . smartsql($defaults['envo_houseic']) . '",
                        state = "' . smartsql($defaults['envo_housestate']) . '",
                        latitude = "' . smartsql($defaults['envo_housegpslat']) . '",
                        longitude = "' . smartsql($defaults['envo_housegpslng']) . '",
                        justice = "' . smartsql($defaults['envo_housejustice']) . '",
                        housedescription = "' . smartsql($defaults['envo_housedescription']) . '",
                        antennadescription = "' . smartsql($defaults['envo_antennadescription']) . '",
                        mainemail = "' . smartsql($defaults['envo_houseemail']) . '",
                        housefname = "' . smartsql($defaults['envo_housefname']) . '",
                        housefstreet = "' . smartsql($defaults['envo_housefstreet']) . '",
                        housefcity = "' . smartsql($defaults['envo_housefcity']) . '",
                        housefpsc = "' . smartsql($defaults['envo_housefpsc']) . '",
                        housefic = "' . smartsql($defaults['envo_housefic']) . '",
                        housefdic = "' . smartsql($defaults['envo_housefdic']) . '",
                        countentrance = "' . smartsql($defaults['envo_countentranceall']) . '",
                        countapartment = "' . smartsql($defaults['envo_countapartmentall']) . '",
                        elevator = "' . smartsql($defaults['envo_elevator']) . '",
                        permission = "' . smartsql($permission) . '",
                        folder = "' . $pathfolder . '",
                        created = "' . smartsql($defaults['envo_created']) . '",
                        updated = "' . smartsql($defaults['envo_created']) . '"');

              $rowid = $envodb -> envo_last_id();

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

        // EN: Getting the data about the city in region - House
        // CZ: Získání dat o městech v regionu - Domy
        $envocity = envo_get_region('', 'id, city', $envotable18, 'city ASC', 1);

        // Convert multidimensional array into single array
        $ENVO_CITY = [];
        foreach ($envocity as $ec) {
          $ENVO_CITY[] = array (
            'id'   => $ec['id'],
            'city' => $ec['city'],
          );
        }

        // EN: Getting the data about the cityarea in region - House
        // CZ: Získání dat o městských částí v regionu - Domy
        $resultcityarea = $envodb -> query('SELECT 
                                        t1.id,
                                        t1.city,
                                        t2.id,
                                        t2.city_id,
                                        t2.city_area
                                      FROM
                                        cms_int_settings_city t1
                                      LEFT JOIN 
                                        cms_int_settings_cityarea t2
                                          ON t1.id = t2.city_id
                                        ORDER BY t2.city_area');
        while ($rowcityarea = $resultcityarea -> fetch_assoc()) {
          // EN: Insert each record into array
          // CZ: Vložení získaných dat do pole
          $ENVO_CITY_AREA[] = $rowcityarea;
        }

        // Get all usergroup's for active plugin
        $ENVO_USERGROUP = envo_plugin_usergroup_all('usergroup', 'intranet');

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlint["int_sec_title"]["intt2"];
        $SECTION_DESC  = $tlint["int_sec_desc"]["intd2"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_newhouse.php';

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

              // EN: Check if ic of house isn't empty
              // CZ: Kontrola jestli je zadáné ič
              if (empty($defaults['envo_houseic']) || !is_numeric($defaults['envo_houseic'])) {
                $errors['e6'] = $tlint['int_error']['interror8'] . '<br>';
              }

              // EN: Check if ic is numeric
              // CZ: Kontrola jestli ič je číslo
              if (!empty($defaults['envo_housefic']) && !is_numeric($defaults['envo_housefic'])) {
                $errors['e7'] = $tlint['int_error']['interror6'] . '<br>';
              }

              // EN: All checks are OK without Errors - Start the form processing
              // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
              if (count($errors) == 0) {

                // Permissions
                if (!isset($defaults['envo_permission'])) {
                  $permission = 0;
                } elseif (in_array(0, $defaults['envo_permission'])) {
                  $permission = 0;
                } else {
                  $permission = join(',', $defaults['envo_permission']);
                }

                /* EN: Convert value
                 * smartsql - secure method to insert form data into a MySQL DB
                 * url_slug  - friendly URL slug from a string
                 * ------------------
                 * CZ: Převod hodnot
                 * smartsql - secure method to insert form data into a MySQL DB
                 * url_slug  - friendly URL slug from a string
                */
                $result = $envodb -> query('UPDATE ' . $envotable . ' SET
                        name = "' . smartsql($defaults['envo_housename']) . '",
                        varname = "' . url_slug($defaults['envo_housename'], array ( 'transliterate' => TRUE )) . '",
                        headquarters = "' . smartsql($defaults['envo_househeadquarters']) . '",
                        street = "' . smartsql($defaults['envo_housestreet']) . '",
                        city = "' . smartsql($defaults['envo_housecity']) . '",
                        cityarea = "' . smartsql($defaults['envo_housecityarea']) . '",
                        psc = "' . smartsql($defaults['envo_housepsc']) . '",
                        ic = "' . smartsql($defaults['envo_houseic']) . '",
                        state = "' . smartsql($defaults['envo_housestate']) . '",
                        latitude = "' . smartsql($defaults['envo_housegpslat']) . '",
                        longitude = "' . smartsql($defaults['envo_housegpslng']) . '",
                        ikatastr = "' . smartsql($defaults['envo_houseikatastr']) . '",
                        justice = "' . smartsql($defaults['envo_housejustice']) . '",
                        ares = "' . smartsql($defaults['envo_houseares']) . '",
                        housedescription = "' . smartsql($defaults['envo_housedescription']) . '",
                        antennadescription = "' . smartsql($defaults['envo_antennadescription']) . '",
                        mainemail = "' . smartsql($defaults['envo_houseemail']) . '",
                        housefname = "' . smartsql($defaults['envo_housefname']) . '",
                        housefstreet = "' . smartsql($defaults['envo_housefstreet']) . '",
                        housefcity = "' . smartsql($defaults['envo_housefcity']) . '",
                        housefpsc = "' . smartsql($defaults['envo_housefpsc']) . '",
                        housefic = "' . smartsql($defaults['envo_housefic']) . '",
                        housefdic = "' . smartsql($defaults['envo_housefdic']) . '",
                        countentrance = "' . smartsql($defaults['envo_countentranceall']) . '",
                        countapartment = "' . smartsql($defaults['envo_countapartmentall']) . '",
                        elevator = "' . smartsql($defaults['envo_elevator']) . '",
                        permission = "' . smartsql($permission) . '",
                        preparationdvb = "' . smartsql($defaults['envo_housedvbt2']) . '",
                        created = "' . smartsql($defaults['envo_created']) . '",
                        updated = NOW()
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

          // Get all usergroup's for active plugin
          $ENVO_USERGROUP = envo_plugin_usergroup_all('usergroup', 'intranet');

          // EN: Get all the data for the form - House
          // CZ: Získání všech dat pro formulář - Bytový dům
          $ENVO_FORM_DATA = envo_get_data($pageID, $envotable);

          // EN: Get all the data for the form - Tasks
          // CZ: Získání všech dat pro formulář - Úkoly
          $ENVO_FORM_DATA_TASK = envo_get_house_task($pageID, $envotable11, $ENVO_SETTING_VAL['intranetdateformat']);

          // EN: Get all the data for the form - Contacts
          // CZ: Získání všech dat pro formulář - Hlavní kontakty
          $ENVO_FORM_DATA_CONT = envo_get_house_entrance($pageID, $envotable3);

          // EN: Get all the data for the form - Entrance
          // CZ: Získání všech dat pro formulář - Vchody
          $ENVO_FORM_DATA_ENT = envo_get_house_entrance($pageID, $envotable1);

          // EN: Get all the data for the form - Services
          // CZ: Získání všech dat pro formulář - Servisy
          $ENVO_FORM_DATA_SERV = envo_get_house_services($pageID, $envotable6);

          // EN: Get all the data for the form - Documents
          // CZ: Získání všech dat pro formulář - Dokumenty
          $ENVO_FORM_DATA_DOCU = envo_get_house_documents($pageID, $envotable4);

          // EN: Get all the data for the Photogallery - isotop photo
          // CZ: Získání všech dat pro Fotogalerii - isotop photo
          $ENVO_FORM_DATA_IMG = envo_get_house_image($pageID, $envotable5);

          // EN: Getting the data about the city in region - House
          // CZ: Získání dat o městech v regionu - Domy
          $envocity = envo_get_region('', 'id, city', $envotable18, 'city ASC', 1);

          // Convert multidimensional array into single array
          $ENVO_CITY = [];
          foreach ($envocity as $ec) {
            $ENVO_CITY[] = array (
              'id'   => $ec['id'],
              'city' => $ec['city'],
            );
          }

          // EN: Getting the data about the cityarea in region - House Analytics
          // CZ: Získání dat o městských částí v regionu - Analýza domů
          $resultcityarea = $envodb -> query('SELECT 
                                        t1.id,
                                        t1.city,
                                        t2.id,
                                        t2.city_id,
                                        t2.city_area
                                      FROM
                                        cms_int_settings_city t1
                                      LEFT JOIN 
                                        cms_int_settings_cityarea t2
                                          ON t1.id = t2.city_id
                                        ORDER BY t2.city_area');
          while ($rowcityarea = $resultcityarea -> fetch_assoc()) {
            // EN: Insert each record into array
            // CZ: Vložení získaných dat do pole
            $ENVO_CITY_AREA[] = $rowcityarea;
          }

          // EN: Get all the data for the Photogallery - list photo
          // CZ: Získání všech dat pro Fotogalerii - list photo

          // EN: Setlocale
          $envodb -> query('SET lc_time_names = "' . $setting["locale"] . '"');
          // EN: Get 'timedefault'
          $result = $envodb -> query('SELECT DISTINCT(DATE_FORMAT(timedefault, "%Y - %M")) as d FROM ' . $envotable5 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY timedefault DESC');
          // EN: Get all photo by date for house
          while ($row = $result -> fetch_assoc()) {

            $date       = $row['d'];
            $dateFormat = ucwords(strtolower($date), '\'- ');;

            $test0_array[$date]['timedefault'] = $dateFormat;

            //
            $result1 = $envodb -> query('SELECT * FROM ' . $envotable5 . ' WHERE houseid = "' . smartsql($pageID) . '" AND DATE_FORMAT(timedefault,"%Y - %M") = "' . $date . '"');

            while ($row1 = $result1 -> fetch_assoc()) {

              $test0_array[$date]['photos'][] = $row1;

            }
          }

          // EN: Get all the data for the form - Videos
          // CZ: Získání všech dat pro formulář - Videa
          $ENVO_FORM_DATA_VIDEO = envo_get_house_video($pageID, $envotable12);

          // EN: Get all the data for the form - Apartment
          // CZ: Získání všech dat pro formulář - Byty
          $ENVO_FORM_DATA_APT = envo_get_house_apartment($pageID, $envotable2);

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tlint["int_sec_title"]["intt3"];
          $SECTION_DESC  = $tlint["int_sec_desc"]["intd3"] . ' <strong>' . $ENVO_FORM_DATA['name'] . '</strong>';

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_edithouse.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=intranet&sp=house&status=ene');
        }

        break;
      case 'searchdvbt2':
        // SEARCH BY PREPARATION ON DVB-T2

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['searchdvbt2_yes'])) {

          // EN: Getting the data about the Houses
          // CZ: Získání dat o bytových domech
          $ENVO_HOUSE_ALL = envo_get_house_info($envotable, 'preparationdvb = 1');

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tlint["int_sec_title"]["intt1"];
          $SECTION_DESC  = $tlint["int_sec_desc"]["intd1"];

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_house.php';

        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['searchdvbt2_no'])) {

          // EN: Getting the data about the Houses
          // CZ: Získání dat o bytových domech
          $ENVO_HOUSE_ALL = envo_get_house_info($envotable, 'preparationdvb = 0');

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tlint["int_sec_title"]["intt1"];
          $SECTION_DESC  = $tlint["int_sec_desc"]["intd1"];

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_house.php';

        }

        break;
      case 'delete':
        // DELETE ROW FROM DB IN HOUSEANALYTICS

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $pageID = $page3;

        if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {
          /* EN: Delete all records
           * 1. Get data for deleting
           * 2. Delete records from DB 'int_house'
           * XX. Delete records from DB 'int_housedocu'
           * XX. Delete records from DB 'int_houseimg'
           * XX. Delete records from DB 'int_housevideo'
           * XX. Delete records from DB 'int_houseserv'
           * XX. Delete records from DB 'int_housetasks'
           * XX. Delete records from DB 'int_houseent'
           * XX. Delete records from DB 'int_houseapt'
           * XX. Delete records from DB 'int_housecontact'
           * XX. Delete all files and folder
          */

          // EN: 1. Get data for deleting - main folder
          // CZ: 1. Získání dat potřebná k odstranění - hlavní adresář
          $resultfolder = $envodb -> query('SELECT folder FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '" LIMIT 1 ');
          $folder       = $resultfolder -> fetch_assoc();

          // EN: 2. Delete row from DB 'int_house' - Main records about house
          // CZ: 2. Odstranění záznamu z DB 'int_house' - Hlavní záznam o domu
          $result = $envodb -> query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            envo_redirect(BASE_URL . 'index.php?p=intranet&sp=houseanalytics&status=e');
          } else {
            // EN: XX. Delete row from DB 'int_housedocu' - Documents
            // CZ: XX. Odstranění záznamu z DB 'int_housedocu' - Dokumenty
            $envodb -> query('DELETE FROM ' . $envotable4 . ' WHERE houseid = "' . smartsql($pageID) . '"');

            // EN: XX. Delete row from DB 'int_houseimg' - Photogallery
            // CZ: XX. Odstranění záznamu z DB 'int_houseimg' - Fotogalerie
            $envodb -> query('DELETE FROM ' . $envotable5 . ' WHERE houseid = "' . smartsql($pageID) . '"');

            // EN: XX. Delete row from DB 'int_housevideo' - Videos
            // CZ: XX. Odstranění záznamu z DB 'int_housevideo' - Videa
            $envodb -> query('DELETE FROM ' . $envotable12 . ' WHERE houseid = "' . smartsql($pageID) . '"');

            // EN: XX. Delete row from DB 'int_houseserv' - Services
            // CZ: XX. Odstranění záznamu z DB 'int_houseserv' - Servisy
            $envodb -> query('DELETE FROM ' . $envotable6 . ' WHERE houseid = "' . smartsql($pageID) . '"');

            // EN: XX. Delete row from DB 'int_housetasks' - Tasks
            // CZ: XX. Odstranění záznamu z DB 'int_housetasks' - Úkoly
            $envodb -> query('DELETE FROM ' . $envotable11 . ' WHERE houseid = "' . smartsql($pageID) . '"');

            // EN: XX. Delete row from DB 'int_houseent' - Entrance
            // CZ: XX. Odstranění záznamu z DB 'int_houseent' - Vchody
            $envodb -> query('DELETE FROM ' . $envotable1 . ' WHERE houseid = "' . smartsql($pageID) . '"');

            // EN: XX. Delete row from DB 'int_houseapt' - Apartment
            // CZ: XX. Odstranění záznamu z DB 'int_houseapt' - Byty
            $envodb -> query('DELETE FROM ' . $envotable2 . ' WHERE houseid = "' . smartsql($pageID) . '"');

            // EN: XX. Delete row from DB 'int_housecontact' - Contacts
            // CZ: XX. Odstranění záznamu z DB 'int_housecontact' - Hlavní kontakty
            $envodb -> query('DELETE FROM ' . $envotable3 . ' WHERE houseid = "' . smartsql($pageID) . '"');

            // EN: XX. Delete files, folder
            // CZ: XX. Odstranění souborů a složek
            $pathfolder = APP_PATH . ENVO_FILES_DIRECTORY . $folder['folder'];
            delete_files($pathfolder);

            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - úspěšné
            /*
            NOTIFIKACE:
            'status=s'    - Záznam úspěšně uložen
            'status1=s1'  - Záznam úspěšně odstraněn
            */
            envo_redirect(BASE_URL . 'index.php?p=intranet&sp=house&status=s&status1=s1');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=intranet&sp=house&status=ene');
        }

        break;
      default:
        // HOUSE ANALYTICS IN ADMINISTRATION

        // EN: Getting the data about the Houses
        // CZ: Získání dat o bytových domech
        $ENVO_HOUSE_ALL = envo_get_house_info($envotable);

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlint["int_sec_title"]["intt1"];
        $SECTION_DESC  = $tlint["int_sec_desc"]["intd1"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_house.php';

    }

    break;
  case 'houseanalytics':
    // HOUSE ANALYTICS

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

            // EN: Check if ic of house isn't empty
            // CZ: Kontrola jestli je zadáné ič
            if (empty($defaults['envo_houseic']) || !is_numeric($defaults['envo_houseic'])) {
              $errors['e2'] = $tlint['int_error']['interror8'] . '<br>';
            }

            // EN: All checks are OK without Errors - Start the form processing
            // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
            if (count($errors) == 0) {

              // EN: New folder of house for documents, images and other ...
              // CZ: Nová složka domu pro dokumenty, obrázky a další ...
              // -----------------
              //The name of the directory that we need to create
              $uniqfolder = uniqid('houseanalytics_');
              $pathfolder = '/intranet/housesanalytics/' . $uniqfolder;
              //Check if the directory already exists.
              if (!is_dir(APP_PATH . $pathfolder)) {
                //Directory does not exist, so lets create it.

                // Main folder
                mkdir(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder, 0755, TRUE);
                // Document folder
                mkdir(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder . '/documents/', 0755, TRUE);
                // Fotogallery folder
                mkdir(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder . '/images/', 0755, TRUE);
                // Videogallery folder
                mkdir(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder . '/videos/', 0755, TRUE);
                // Create '*.txt' info file
                $data = '
HOUSE NAME - ' . $defaults['envo_housename'] . '
-----------------------------------------------
House created: ' . date('Y-m-d H:i:s') . '
Format date: Y-m-d H:i:s

INFO ABOUT HOUSE
-----------------------------------------------
Name:     ' . $defaults['envo_housename'] . '
Street:   ' . $defaults['envo_housestreet'] . '
City:     ' . $defaults['envo_housecity'] . '
Area:     ' . $defaults['envo_housecityarea'] . '
IČ:       ' . $defaults['envo_houseic'] . '
Folder:   ' . $pathfolder . '
                        ';
                $data = iconv(mb_detect_encoding($data, mb_detect_order(), true), 'UTF-8', $data);
                file_put_contents(APP_PATH . ENVO_FILES_DIRECTORY . $pathfolder . '/house_info.txt', $data);

              }

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * url_slug  - friendly URL slug from a string
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
               * url_slug  - friendly URL slug from a string
              */
              $result = $envodb -> query('INSERT INTO ' . $envotable13 . ' SET 
                        name = "' . smartsql($defaults['envo_housename']) . '",
                        varname = "' . url_slug($defaults['envo_housename'], array ( 'transliterate' => TRUE )) . '",
                        headquarters = "' . smartsql($defaults['envo_househeadquarters']) . '",
                        street = "' . smartsql($defaults['envo_housestreet']) . '",
                        city = "' . smartsql($defaults['envo_housecity']) . '",
                        cityarea = "' . smartsql($defaults['envo_housecityarea']) . '",
                        psc = "' . smartsql($defaults['envo_housepsc']) . '",
                        state = "' . smartsql($defaults['envo_housestate']) . '",
                        ic = "' . smartsql($defaults['envo_houseic']) . '",
                        latitude = "' . smartsql($defaults['envo_housegpslat']) . '",
                        longitude = "' . smartsql($defaults['envo_housegpslng']) . '",
                        ikatastr = "' . smartsql($defaults['envo_houseikatastr']) . '",
                        justice = "' . smartsql($defaults['envo_housejustice']) . '",
                        ares = "' . smartsql($defaults['envo_houseares']) . '",
                        housejusticelaw = "' . smartsql($defaults['envo_housejusticelaw']) . '",
                        housedescription = "' . smartsql($defaults['envo_housedescription']) . '",
                        antennadescription = "' . smartsql($defaults['envo_antennadescription']) . '",
                        mainemail = "' . smartsql($defaults['envo_houseemail']) . '",
                        contact1 = "' . smartsql($defaults['envo_housecontact1']) . '",
                        contactphone1 = "' . smartsql($defaults['envo_housecontactphone1']) . '",
                        contactmail1 = "' . smartsql($defaults['envo_housecontactmail1']) . '",
                        contactdate1 = "' . smartsql($defaults['envo_housecontactdate1']) . '",
                        contactaddress1 = "' . smartsql($defaults['envo_housecontactaddress1']) . '",
                        contact2 = "' . smartsql($defaults['envo_housecontact2']) . '",
                        contactphone2 = "' . smartsql($defaults['envo_housecontactphone2']) . '",
                        contactmail2 = "' . smartsql($defaults['envo_housecontactmail2']) . '",
                        contactdate2 = "' . smartsql($defaults['envo_housecontactdate2']) . '",
                        contactaddress2 = "' . smartsql($defaults['envo_housecontactaddress2']) . '",
                        contact3 = "' . smartsql($defaults['envo_housecontact3']) . '",
                        contactphone3 = "' . smartsql($defaults['envo_housecontactphone3']) . '",
                        contactmail3 = "' . smartsql($defaults['envo_housecontactmail3']) . '",
                        contactdate3 = "' . smartsql($defaults['envo_housecontactdate3']) . '",
                        contactaddress3 = "' . smartsql($defaults['envo_housecontactaddress3']) . '",
                        contactfacebook3 = "' . smartsql($defaults['envo_housecontactfacebook3']) . '",
                        contact4 = "' . smartsql($defaults['envo_housecontact4']) . '",
                        contactphone4 = "' . smartsql($defaults['envo_housecontactphone4']) . '",
                        contactmail4 = "' . smartsql($defaults['envo_housecontactmail4']) . '",
                        contactdate4 = "' . smartsql($defaults['envo_housecontactdate4']) . '",
                        contactaddress4 = "' . smartsql($defaults['envo_housecontactaddress4']) . '",
                        contact5 = "' . smartsql($defaults['envo_housecontact5']) . '",
                        contactphone5 = "' . smartsql($defaults['envo_housecontactphone5']) . '",
                        contactmail5 = "' . smartsql($defaults['envo_housecontactmail5']) . '",
                        contactdate5 = "' . smartsql($defaults['envo_housecontactdate5']) . '",
                        contactaddress5 = "' . smartsql($defaults['envo_housecontactaddress5']) . '",
                        contact6 = "' . smartsql($defaults['envo_housecontact6']) . '",
                        contactphone6 = "' . smartsql($defaults['envo_housecontactphone6']) . '",
                        contactmail6 = "' . smartsql($defaults['envo_housecontactmail6']) . '",
                        contactdate6 = "' . smartsql($defaults['envo_housecontactdate6']) . '",
                        contactaddress6 = "' . smartsql($defaults['envo_housecontactaddress6']) . '",
                        contact7 = "' . smartsql($defaults['envo_housecontact7']) . '",
                        contact8 = "' . smartsql($defaults['envo_housecontact8']) . '",
                        contact9 = "' . smartsql($defaults['envo_housecontact9']) . '",
                        contact10 = "' . smartsql($defaults['envo_housecontact10']) . '",
                        contact11 = "' . smartsql($defaults['envo_housecontact11']) . '",
                        contact12 = "' . smartsql($defaults['envo_housecontact12']) . '",
                        contactcontrol = "' . smartsql($defaults['envo_contactcontrol']) . '",
                        folder = "' . $pathfolder . '",
                        created = "' . smartsql($defaults['envo_created']) . '",
                        updated = "' . smartsql($defaults['envo_created']) . '"');

              $rowid = $envodb -> envo_last_id();

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=intranet&sp=houseanalytics&ssp=newhouse&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=intranet&sp=houseanalytics&ssp=edithouse&id=' . $rowid . '&status=s');
              }

            } else {
              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }
        }

        // EN: Getting the data about the city in region - House Analyticsa
        // CZ: Získání dat o městech v regionu - Analýza domů
        $envocity = envo_get_region('', 'id, city', $envotable18, 'city ASC', 1);

        // Convert multidimensional array into single array
        $ENVO_CITY = [];
        foreach ($envocity as $ec) {
          $ENVO_CITY[] = array (
            'id'   => $ec['id'],
            'city' => $ec['city'],
          );
        }

        // EN: Getting the data about the cityarea in region - House Analytics
        // CZ: Získání dat o městských částí v regionu - Analýza domů
        $resultcityarea = $envodb -> query('SELECT 
                                        t1.id,
                                        t1.city,
                                        t2.id,
                                        t2.city_id,
                                        t2.city_area
                                      FROM
                                        cms_int_settings_city t1
                                      LEFT JOIN 
                                        cms_int_settings_cityarea t2
                                          ON t1.id = t2.city_id
                                        ORDER BY t2.city_area');
        while ($rowcityarea = $resultcityarea -> fetch_assoc()) {
          // EN: Insert each record into array
          // CZ: Vložení získaných dat do pole
          $ENVO_CITY_AREA[] = $rowcityarea;
        }






        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlint["int_sec_title"]["intt8"];
        $SECTION_DESC  = $tlint["int_sec_desc"]["intd8"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_newhouseanalytics.php';

        break;
      case 'edithouse':
        // EDIT HOUSE

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $pageID = $page3;

        if (is_numeric($pageID) && envo_row_exist($pageID, $envotable13)) {

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

              // EN: Check if ic of house isn't empty
              // CZ: Kontrola jestli je zadáné ič
              if (empty($defaults['envo_houseic']) || !is_numeric($defaults['envo_houseic'])) {
                $errors['e2'] = $tlint['int_error']['interror8'] . '<br>';
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
                $result = $envodb -> query('UPDATE ' . $envotable13 . ' SET
                        name = "' . smartsql($defaults['envo_housename']) . '",
                        varname = "' . url_slug($defaults['envo_housename'], array ( 'transliterate' => TRUE )) . '",
                        headquarters = "' . smartsql($defaults['envo_househeadquarters']) . '",
                        street = "' . smartsql($defaults['envo_housestreet']) . '",
                        city = "' . smartsql($defaults['envo_housecity']) . '",
                        cityarea = "' . smartsql($defaults['envo_housecityarea']) . '",
                        psc = "' . smartsql($defaults['envo_housepsc']) . '",
                        state = "' . smartsql($defaults['envo_housestate']) . '",
                        ic = "' . smartsql($defaults['envo_houseic']) . '",
                        latitude = "' . smartsql($defaults['envo_housegpslat']) . '",
                        longitude = "' . smartsql($defaults['envo_housegpslng']) . '",
                        ikatastr = "' . smartsql($defaults['envo_houseikatastr']) . '",
                        justice = "' . smartsql($defaults['envo_housejustice']) . '",
                        ares = "' . smartsql($defaults['envo_houseares']) . '",
                        housejusticelaw = "' . smartsql($defaults['envo_housejusticelaw']) . '",
                        housedescription = "' . smartsql($defaults['envo_housedescription']) . '",
                        antennadescription = "' . smartsql($defaults['envo_antennadescription']) . '",
                        mainemail = "' . smartsql($defaults['envo_houseemail']) . '",
                        contact1 = "' . smartsql($defaults['envo_housecontact1']) . '",
                        contactphone1 = "' . smartsql($defaults['envo_housecontactphone1']) . '",
                        contactmail1 = "' . smartsql($defaults['envo_housecontactmail1']) . '",
                        contactdate1 = "' . smartsql($defaults['envo_housecontactdate1']) . '",
                        contactaddress1 = "' . smartsql($defaults['envo_housecontactaddress1']) . '",
                        contact2 = "' . smartsql($defaults['envo_housecontact2']) . '",
                        contactphone2 = "' . smartsql($defaults['envo_housecontactphone2']) . '",
                        contactmail2 = "' . smartsql($defaults['envo_housecontactmail2']) . '",
                        contactdate2 = "' . smartsql($defaults['envo_housecontactdate2']) . '",
                        contactaddress2 = "' . smartsql($defaults['envo_housecontactaddress2']) . '",
                        contact3 = "' . smartsql($defaults['envo_housecontact3']) . '",
                        contactphone3 = "' . smartsql($defaults['envo_housecontactphone3']) . '",
                        contactmail3 = "' . smartsql($defaults['envo_housecontactmail3']) . '",
                        contactdate3 = "' . smartsql($defaults['envo_housecontactdate3']) . '",
                        contactaddress3 = "' . smartsql($defaults['envo_housecontactaddress3']) . '",
                        contactfacebook3 = "' . smartsql($defaults['envo_housecontactfacebook3']) . '",
                        contact4 = "' . smartsql($defaults['envo_housecontact4']) . '",
                        contactphone4 = "' . smartsql($defaults['envo_housecontactphone4']) . '",
                        contactmail4 = "' . smartsql($defaults['envo_housecontactmail4']) . '",
                        contactdate4 = "' . smartsql($defaults['envo_housecontactdate4']) . '",
                        contactaddress4 = "' . smartsql($defaults['envo_housecontactaddress4']) . '",
                        contact5 = "' . smartsql($defaults['envo_housecontact5']) . '",
                        contactphone5 = "' . smartsql($defaults['envo_housecontactphone5']) . '",
                        contactmail5 = "' . smartsql($defaults['envo_housecontactmail5']) . '",
                        contactdate5 = "' . smartsql($defaults['envo_housecontactdate5']) . '",
                        contactaddress5 = "' . smartsql($defaults['envo_housecontactaddress5']) . '",
                        contact6 = "' . smartsql($defaults['envo_housecontact6']) . '",
                        contactphone6 = "' . smartsql($defaults['envo_housecontactphone6']) . '",
                        contactmail6 = "' . smartsql($defaults['envo_housecontactmail6']) . '",
                        contactdate6 = "' . smartsql($defaults['envo_housecontactdate6']) . '",
                        contactaddress6 = "' . smartsql($defaults['envo_housecontactaddress6']) . '",
                        contact7 = "' . smartsql($defaults['envo_housecontact7']) . '",
                        contact8 = "' . smartsql($defaults['envo_housecontact8']) . '",
                        contact9 = "' . smartsql($defaults['envo_housecontact9']) . '",
                        contact10 = "' . smartsql($defaults['envo_housecontact10']) . '",
                        contact11 = "' . smartsql($defaults['envo_housecontact11']) . '",
                        contact12 = "' . smartsql($defaults['envo_housecontact12']) . '",
                        contactcontrol = "' . smartsql($defaults['envo_contactcontrol']) . '",
                        created = "' . smartsql($defaults['envo_created']) . '",
                        updated = NOW()
                        WHERE id = "' . smartsql($pageID) . '"');

                if (!$result) {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=intranet&sp=houseanalytics&ssp=edithouse&id=' . $pageID . '&status=e');
                } else {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=intranet&sp=houseanalytics&ssp=edithouse&id=' . $pageID . '&status=s');
                }

              } else {
                $errors['e'] = $tl['general_error']['generror'] . '<br>';
                $errors      = $errors;
              }

            }

          }

          // EN: Get all the data for the form - house
          // CZ: Získání všech dat pro formulář - bytový dům
          $ENVO_FORM_DATA = envo_get_data($pageID, $envotable13);

          // EN: Get all the data for the form - documents
          // CZ: Získání všech dat pro formulář - dokumenty
          $ENVO_FORM_DATA_DOCU = envo_get_house_documents($pageID, $envotable14);

          // EN: Getting the data about the city in region - House Analytics
          // CZ: Získání dat o městech v regionu - Analýza domů
          $envocity = envo_get_region('', 'id, city', $envotable18, 'city ASC', 1);

          // Convert multidimensional array into single array
          $ENVO_CITY = [];
          foreach ($envocity as $ec) {
            $ENVO_CITY[] = array (
              'id'   => $ec['id'],
              'city' => $ec['city'],
            );
          }

          // EN: Getting the data about the cityarea in region - House Analytics
          // CZ: Získání dat o městských částí v regionu - Analýza domů
          $resultcityarea = $envodb -> query('SELECT 
                                        t1.id,
                                        t1.city,
                                        t2.id,
                                        t2.city_id,
                                        t2.city_area
                                      FROM
                                        cms_int_settings_city t1
                                      LEFT JOIN 
                                        cms_int_settings_cityarea t2
                                          ON t1.id = t2.city_id
                                        ORDER BY t2.city_area');
          while ($rowcityarea = $resultcityarea -> fetch_assoc()) {
            // EN: Insert each record into array
            // CZ: Vložení získaných dat do pole
            $ENVO_CITY_AREA[] = $rowcityarea;
          }

          // EN: Get all the data for the Photogallery - list photo
          // CZ: Získání všech dat pro Fotogalerii - list photo

          // EN: Setlocale
          $envodb -> query('SET lc_time_names = "' . $setting["locale"] . '"');
          // EN: Get 'timedefault'
          $result = $envodb -> query('SELECT DISTINCT(DATE_FORMAT(timedefault, "%Y - %M")) as d FROM ' . $envotable15 . ' WHERE houseid = "' . smartsql($pageID) . '" ORDER BY timedefault DESC');
          // EN: Get all photo by date for house
          while ($row = $result -> fetch_assoc()) {

            $date       = $row['d'];
            $dateFormat = ucwords(strtolower($date), '\'- ');;

            $ENVO_FORM_DATA_IMG[$date]['timedefault'] = $dateFormat;

            //
            $result1 = $envodb -> query('SELECT * FROM ' . $envotable15 . ' WHERE houseid = "' . smartsql($pageID) . '" AND DATE_FORMAT(timedefault,"%Y - %M") = "' . $date . '"');

            while ($row1 = $result1 -> fetch_assoc()) {

              $ENVO_FORM_DATA_IMG[$date]['photos'][] = $row1;

            }
          }

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tlint["int_sec_title"]["intt9"];
          $SECTION_DESC  = $tlint["int_sec_desc"]["intd9"] . ' <strong>' . $ENVO_FORM_DATA['name'] . '</strong>';

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_edithouseanalytics.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=intranet&sp=houseanalytics&status=ene');
        }

        break;
      case 'delete':
        // DELETE ROW FROM DB IN HOUSEANALYTICS

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $pageID = $page3;

        if (is_numeric($pageID) && envo_row_exist($pageID, $envotable13)) {
          /* EN: Delete all records
           * 1. Get data for deleting
           * 2. Delete records from DB 'int_houseanalytics'
           * 3. Delete records from DB 'int_houseanalyticsdocu'
           * 4. Delete all files and folder
          */

          // EN: 1. Get data for deleting - main folder
          // CZ: 1. Získání dat potřebná k odstranění - hlavní adresář
          $resultfolder = $envodb -> query('SELECT folder FROM ' . $envotable13 . ' WHERE id = "' . smartsql($pageID) . '" LIMIT 1 ');
          $folder       = $resultfolder -> fetch_assoc();

          // EN: 2. Delete row from DB 'int_houseanalytics' - Main records about house
          // CZ: 2. Odstranění záznamu z DB 'int_houseanalytics' - Hlavní záznam o domu
          $result = $envodb -> query('DELETE FROM ' . $envotable13 . ' WHERE id = "' . smartsql($pageID) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            envo_redirect(BASE_URL . 'index.php?p=intranet&sp=houseanalytics&status=e');
          } else {
            // EN: 3. Delete row from DB 'int_houseanalyticsdocu' - Documents
            // CZ: 3. Odstranění záznamu z DB 'int_houseanalyticsdocu' - Dokumenty
            $envodb -> query('DELETE FROM ' . $envotable14 . ' WHERE houseid = "' . smartsql($pageID) . '"');

            // EN: 4. Delete files, folder
            // CZ: 4. Odstranění souborů a složek
            $pathfolder = APP_PATH . ENVO_FILES_DIRECTORY . $folder['folder'];
            delete_files($pathfolder);

            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - úspěšné
            /*
            NOTIFIKACE:
            'status=s'    - Záznam úspěšně uložen
            'status1=s1'  - Záznam úspěšně odstraněn
            */
            envo_redirect(BASE_URL . 'index.php?p=intranet&sp=houseanalytics&status=s&status1=s1');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=intranet&sp=houseanalytics&status=ene');
        }

        break;
      case 'maps':
        // MAPS ANALYTICS

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlint["int_sec_title"]["intt9"];
        $SECTION_DESC  = $tlint["int_sec_desc"]["intd9"] . ' <strong>' . $ENVO_FORM_DATA['name'] . '</strong>';

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_houseanalytics_maps.php';

        break;
      default:
        // HOUSE ANALYTICS

        // EN: Getting the data about the Houses
        // CZ: Získání dat o bytových domech
        $ENVO_HOUSE_ALL = envo_get_house_info($envotable13);

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlint["int_sec_title"]["intt7"];
        $SECTION_DESC  = $tlint["int_sec_desc"]["intd7"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_houseanalytics.php';

    }

    break;
  case 'notification':
    // INTRANET NOTIFICATION

    switch ($page2) {
      case 'newnotification':
        // ADD NEW NOTIFICATION TO DB

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (isset($_POST['btnSave'])) {

            // EN: Check if name of house isn't empty
            // CZ: Kontrola jestli je zadáný název domu
            if (empty($defaults['envo_title'])) {
              $errors['e1'] = $tlint['int_error']['interror7'] . '<br>';
            }

            // EN: All checks are OK without Errors - Start the form processing
            // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
            if (count($errors) == 0) {

              // Permissions
              if (!isset($defaults['envo_permission'])) {
                $permission = 0;
              } elseif (in_array(0, $defaults['envo_permission'])) {
                $permission = 0;
              } else {
                $permission = join(',', $defaults['envo_permission']);
              }

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * url_slug  - friendly URL slug from a string
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
               * url_slug  - friendly URL slug from a string
              */
              $result = $envodb -> query('INSERT INTO ' . $envotable7 . ' SET 
                        name = "' . smartsql($defaults['envo_title']) . '",
                        varname = "' . url_slug($defaults['envo_title'], array ( 'transliterate' => TRUE )) . '",
                        type = "' . smartsql($defaults['envo_type']) . '",
                        shortdescription = "' . smartsql($defaults['envo_shortdescription']) . '",
                        content = "' . smartsql($defaults['envo_content']) . '",
                        permission = "' . smartsql($permission) . '",
                        created = NOW()');

              $rowid = $envodb -> envo_last_id();

              // EN: User group access for notification
              // CZ: Přístup jednotlivých uživatelských skupin k notifikaci
              if (!isset($defaults['envo_permission'])) {
                // EN: Usergroup not exists
                // CZ: Uživatelská skupina neexistuje

                $envodb -> query('INSERT INTO ' . $envotable8 . ' SET 
                        notification_id = "' . $rowid . '",
                        usergroup_id = "0",
                        unread = "0",
                        created = NOW()');

              } elseif (in_array(0, $defaults['envo_permission'])) {
                // EN: Usergroup exists, selection contains '0' value
                // CZ: Uživatelská skupina existuje, výběr obsahuje hodnotu "0"

                $envodb -> query('INSERT INTO ' . $envotable8 . ' SET 
                        notification_id = "' . $rowid . '",
                        usergroup_id = "0",
                        unread = "0",
                        created = NOW()');

              } else {
                // EN: Usergoup exists, selection contains array
                // CZ: Uživatelská skupina existuje, výběr obsahuje pole

                foreach ($defaults['envo_permission'] as $permission) {
                  $envodb -> query('INSERT INTO ' . $envotable8 . ' SET 
                        notification_id = "' . $rowid . '",
                        usergroup_id = "' . $permission . '",
                        unread = "0",
                        created = NOW()');
                }

              }

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=intranet&sp=notification&ssp=newnotification&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=intranet&sp=notification&ssp=editnotification&id=' . $rowid . '&status=s');
              }

            } else {
              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }
        }

        // Get all usergroup's with active plugin
        $ENVO_USERGROUP = envo_plugin_usergroup_all('usergroup', 'intranet');

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlint["int_sec_title"]["intt5"];
        $SECTION_DESC  = $tlint["int_sec_desc"]["intd5"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_newnotification.php';

        break;
      case 'editnotification':
        // EDIT NOTIFICATION

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $pageID = $page3;

        if (is_numeric($pageID) && envo_row_exist($pageID, $envotable7)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            if (isset($_POST['btnSave'])) {

              // EN: Check if name of house isn't empty
              // CZ: Kontrola jestli je zadáný název domu
              if (empty($defaults['envo_title'])) {
                $errors['e1'] = $tlint['int_error']['interror7'] . '<br>';
              }

              // EN: All checks are OK without Errors - Start the form processing
              // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
              if (count($errors) == 0) {

                // Permissions
                if (!isset($defaults['envo_permission'])) {
                  $permission = 0;
                } elseif (in_array(0, $defaults['envo_permission'])) {
                  $permission = 0;
                } else {
                  $permission = join(',', $defaults['envo_permission']);
                }

                /* EN: Convert value
                 * smartsql - secure method to insert form data into a MySQL DB
                 * url_slug  - friendly URL slug from a string
                 * ------------------
                 * CZ: Převod hodnot
                 * smartsql - secure method to insert form data into a MySQL DB
                 * url_slug  - friendly URL slug from a string
                */
                $result = $envodb -> query('UPDATE ' . $envotable7 . ' SET
                        name = "' . smartsql($defaults['envo_title']) . '",
                        varname = "' . url_slug($defaults['envo_title'], array ( 'transliterate' => TRUE )) . '",
                        type = "' . smartsql($defaults['envo_type']) . '",
                        shortdescription = "' . smartsql($defaults['envo_shortdescription']) . '",
                        content = "' . smartsql($defaults['envo_content']) . '",
                        permission = "' . smartsql($permission) . '"
                        WHERE id = "' . smartsql($pageID) . '"');

                // EN: Delete user group acces for notification by 'id'
                // CZ: Odstranění přístupu uživatelské skupiny pro notifikaci podle 'id'
                $envodb -> query('DELETE FROM ' . $envotable8 . ' WHERE notification_id = "' . smartsql($pageID) . '"');

                // EN: User group access for notification
                // CZ: Přístup jednotlivých uživatelských skupin k notifikaci
                if (!isset($defaults['envo_permission'])) {
                  // EN: Usergroup not exists
                  // CZ: Uživatelská skupina neexistuje

                  $envodb -> query('INSERT INTO ' . $envotable8 . ' SET 
                        notification_id = "' . $pageID . '",
                        usergroup_id = "0",
                        unread = "0",
                        created = NOW()');

                } elseif (in_array(0, $defaults['envo_permission'])) {
                  // EN: Usergroup exists, selection contains '0' value
                  // CZ: Uživatelská skupina existuje, výběr obsahuje hodnotu "0"

                  $envodb -> query('INSERT INTO ' . $envotable8 . ' SET 
                        notification_id = "' . $pageID . '",
                        usergroup_id = "0",
                        unread = "0",
                        created = NOW()');

                } else {
                  // EN: Usergoup exists, selection contains array
                  // CZ: Uživatelská skupina existuje, výběr obsahuje pole

                  foreach ($defaults['envo_permission'] as $permission) {
                    $envodb -> query('INSERT INTO ' . $envotable8 . ' SET 
                        notification_id = "' . $pageID . '",
                        usergroup_id = "' . $permission . '",
                        unread = "0",
                        created = NOW()');
                  }

                }

                if (!$result) {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=intranet&sp=notification&ssp=editnotification&id=' . $pageID . '&status=e');
                } else {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=intranet&sp=notification&ssp=editnotification&id=' . $pageID . '&status=s');
                }

              } else {
                $errors['e'] = $tl['general_error']['generror'] . '<br>';
                $errors      = $errors;
              }

            }
          }

          // Get all usergroup's for active plugin
          $ENVO_USERGROUP = envo_plugin_usergroup_all('usergroup', 'intranet');

          // EN: Get all the data for the form - Notification
          // CZ: Získání všech dat pro formulář - Notifikace
          $ENVO_FORM_DATA = envo_get_data($pageID, $envotable7);

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tlint["int_sec_title"]["intt6"];
          $SECTION_DESC  = $tlint["int_sec_desc"]["intd6"];

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_editnotification.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=intranet&sp=notification&status=ene');
        }

        break;
      case 'delete':
        // DELETE NOTIFICATION FROM DB

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $pageID = $page3;

        if (is_numeric($pageID) && envo_row_exist($pageID, $envotable7)) {

          // Delete the Content
          $result = $envodb -> query('DELETE FROM ' . $envotable7 . ' WHERE id = "' . smartsql($pageID) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            envo_redirect(BASE_URL . 'index.php?p=intranet&sp=notification&status=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - úspěšné
            /*
            NOTIFIKACE:
            'status=s'    - Záznam úspěšně uložen
            'status1=s1'  - Záznam úspěšně odstraněn
            */
            envo_redirect(BASE_URL . 'index.php?p=intranet&sp=notification&status=s&status1=s1');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=intranet&sp=notification&status=ene');
        }
        break;
      default:
        // LIST OF NOTIFICATIONS

        // EN: Getting the data about the Houses
        // CZ: Získání dat o bytových domech
        $ENVO_NOTIFICATION_ALL = envo_get_notification_info($envotable7);

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlint["int_sec_title"]["intt4"];
        $SECTION_DESC  = $tlint["int_sec_desc"]["intd4"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_notification.php';

    }

    break;
  case 'setting':
    // SETTINGS OF INTRANET

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (empty($defaults['envo_title'])) {
        $errors['e1'] = $tl['general_error']['generror18'] . '<br>';
      }

      if (empty($defaults['envo_date'])) {
        $errors['e2'] = $tl['general_error']['generror26'] . '<br>';
      }

      if (count($errors) == 0) {

        /* EN: Convert value
         * smartsql - secure method to insert form data into a MySQL DB
         * ------------------
         * CZ: Převod hodnot
         * smartsql - secure method to insert form data into a MySQL DB
        */
        $result = $envodb -> query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
                                  WHEN "intranettitle" THEN "' . smartsql($defaults['envo_title']) . '"
                                  WHEN "intranetdateformat" THEN "' . smartsql($defaults['envo_date']) . '"
                                  WHEN "intranettimeformat" THEN "' . smartsql($defaults['envo_time']) . '"
                                  WHEN "intranetskin" THEN "' . smartsql($defaults['envo_skin']) . '"
                                END
                                WHERE varname IN ("intranettitle", "intranetdateformat", "intranettimeformat", "intranetskin")');

        // EN: Set permissions for House Analytics
        // CZ: Nastavení přístupových práv do analýzy bytových domů
        if (!isset($defaults['envo_permission'])) {

          $envodb -> query('UPDATE ' . DB_PREFIX . 'usergroup SET
                        intranetanalytics = "0"');

        } elseif (in_array(0, $defaults['envo_permission'])) {

          $envodb -> query('UPDATE ' . DB_PREFIX . 'usergroup SET
                        intranetanalytics = "0"');

        } else {

          $permission = join(',', $defaults['envo_permission']);
          $envodb -> query('UPDATE ' . DB_PREFIX . 'usergroup SET
                        intranetanalytics = "0"');
          $envodb -> query('UPDATE ' . DB_PREFIX . 'usergroup SET
                        intranetanalytics = "1"
                        WHERE id IN (' . $permission . ')');
        }

        // EN:
        // CZ: Zápis Regionu do DB

        // Odstranění dat
        $result1 = $envodb -> query('TRUNCATE TABLE ' . $envotable16);

        $countregion = $defaults['envo_region_1'];

        for ($i = 0, $j = count($countregion); $i < $j; $i++) {
          $region = $countregion[$i];
          if (!empty($region)) {
            // EN: Insert new row and update row if exists in DB
            // CZ: Vložení nového záznamu a update záznamu, který je již v DB
            $result1 = $envodb -> query('INSERT INTO ' . $envotable16 . ' SET
                        id = "' . smartsql($defaults['envo_region_0'][$i]) . '",
                        region = "' . trim(smartsql($defaults['envo_region_1'][$i])) . '"
                        ON DUPLICATE KEY UPDATE 
                        region = "' . trim(smartsql($defaults['envo_region_1'][$i])) . '"');
          }
        }

        // EN:
        // CZ: Zápis Okresů do DB
        $result2 = $envodb -> query('TRUNCATE TABLE ' . $envotable17);

        $countdistrict = $defaults['envo_district_0'];

        for ($i = 0, $j = count($countdistrict); $i < $j; $i++) {
          $district = $countdistrict[$i];
          if (!empty($district)) {
            // EN: Insert new row and update row if exists in DB
            // CZ: Vložení nového záznamu a update záznamu, který je již v DB
            $result2 = $envodb -> query('INSERT INTO ' . $envotable17 . ' SET
                        id = "' . smartsql($defaults['envo_district_0'][$i]) . '",
                        region_id = "' . trim(smartsql($defaults['envo_district_1'][$i])) . '",
                        district = "' . trim(smartsql($defaults['envo_district_2'][$i])) . '"
                        ON DUPLICATE KEY UPDATE 
                        region_id = "' . trim(smartsql($defaults['envo_district_1'][$i])) . '",
                        district = "' . trim(smartsql($defaults['envo_district_2'][$i])) . '"');
          }
        }

        // EN:
        // CZ: Zápis Měst do DB
        $result3 = $envodb -> query('TRUNCATE TABLE ' . $envotable18);

        $countcity = $defaults['envo_city_0'];

        for ($i = 0, $j = count($countcity); $i < $j; $i++) {
          $city = $countcity[$i];
          if (!empty($city)) {
            // EN: Insert new row and update row if exists in DB
            // CZ: Vložení nového záznamu a update záznamu, který je již v DB
            $result3 = $envodb -> query('INSERT INTO ' . $envotable18 . ' SET
                        id = "' . smartsql($defaults['envo_city_0'][$i]) . '",
                        region_id = "' . trim(smartsql($defaults['envo_city_1'][$i])) . '",
                        district_id = "' . trim(smartsql($defaults['envo_city_2'][$i])) . '",
                        city = "' . trim(smartsql($defaults['envo_city_3'][$i])) . '"
                        ON DUPLICATE KEY UPDATE 
                        region_id = "' . trim(smartsql($defaults['envo_city_1'][$i])) . '",
                        district_id = "' . trim(smartsql($defaults['envo_city_2'][$i])) . '",
                        city = "' . trim(smartsql($defaults['envo_city_3'][$i])) . '"');
          }
        }

        // EN:
        // CZ: Zápis Oblastí Měst do DB
        $result4 = $envodb -> query('TRUNCATE TABLE ' . $envotable19);

        $countcityarea = $defaults['envo_cityarea_0'];

        for ($i = 0, $j = count($countcityarea); $i < $j; $i++) {
          $cityarea = $countcityarea[$i];
          if (!empty($cityarea)) {
            // EN: Insert new row and update row if exists in DB
            // CZ: Vložení nového záznamu a update záznamu, který je již v DB
            $result4 = $envodb -> query('INSERT INTO ' . $envotable19 . ' SET
                        id = "' . smartsql($defaults['envo_cityarea_0'][$i]) . '",
                        region_id = "' . trim(smartsql($defaults['envo_cityarea_1'][$i])) . '",
                        district_id = "' . trim(smartsql($defaults['envo_cityarea_2'][$i])) . '",
                        city_id = "' . trim(smartsql($defaults['envo_cityarea_3'][$i])) . '",
                        city_area = "' . trim(smartsql($defaults['envo_cityarea_4'][$i])) . '"
                        ON DUPLICATE KEY UPDATE 
                        region_id = "' . trim(smartsql($defaults['envo_cityarea_1'][$i])) . '",
                        district_id = "' . trim(smartsql($defaults['envo_cityarea_2'][$i])) . '",
                        city_id = "' . trim(smartsql($defaults['envo_cityarea_3'][$i])) . '",
                        city_area = "' . trim(smartsql($defaults['envo_cityarea_4'][$i])) . '"');
          }
        }


        // CZ: Odstranění vysílačů z DB
        $result1 = $envodb -> query('TRUNCATE TABLE ' . $envotable9);

        // CZ: Zápis vysílačů do DB
        $countname = $defaults['envo_towername'];

        for ($i = 0, $j = count($countname); $i < $j; $i++) {
          $name = $countname[$i];

          if (!empty($name)) {

            $result = $envodb -> query('INSERT INTO ' . $envotable9 . ' SET 
                        name = "' . smartsql($name) . '",
                        varname = "' . url_slug($name, array ( 'transliterate' => TRUE )) . '"');
          }

        }

        // CZ: Odstranění vysílačů z DB
        $result2 = $envodb -> query('TRUNCATE TABLE ' . $envotable10);

        // CZ: Zápis vysílačů do DB
        $countnumber = $defaults['envo_channelname'];

        for ($i = 0, $j = count($countnumber); $i < $j; $i++) {
          $number = $countnumber[$i];

          if (!empty($number)) {

            $result = $envodb -> query('INSERT INTO ' . $envotable10 . ' SET 
                        towerid = "",
                        number = "' . smartsql($number) . '"');
          }

        }

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
        $errors['e'] = $tl['general_error']['generror'] . ' < br>';
        $errors      = $errors;
      }
    }

    // EN: Get all usergroup's for active plugin
    // CZ:
    $ENVO_USERGROUP = envo_plugin_usergroup_all('usergroup', 'intranet');

    // EN: Import important settings for the template from the DB
    // CZ: Importuj důležité nastavení pro šablonu z DB
    $ENVO_SETTING = envo_get_setting('intranet');

    // Get permission for House Analytics
    $result = $envodb -> query('SELECT id, name, intranetanalytics FROM ' . DB_PREFIX . 'usergroup');
    while ($row = $result -> fetch_assoc()) {
      $ENVO_SETTING_PERMISSION[] = $row;
    }

    // EN: Getting the data about the Region
    // CZ: Získání dat o Regionech
    $ENVO_REGION = envo_get_region('', '', $envotable16, 'id ASC');

    // EN: Getting the data about the District
    // CZ: Získání dat o Okresech
    $ENVO_DISTRICT = envo_get_region('', '', $envotable17, 'id ASC');

    // EN: Getting the data about the Cities
    // CZ: Získání dat o Městech
    $ENVO_CITY = envo_get_region('', '', $envotable18, 'id ASC');

    // EN: Getting the data about the City Areas
    // CZ: Získání dat o městských Čtvrtích
    $ENVO_CITYAREA = envo_get_region('', '', $envotable19, 'id ASC');

    // EN: Getting the data about the TV Tower
    // CZ: Získání dat o televizním vysílači
    $ENVO_TOWER_ALL = envo_get_tvtower('', $envotable9);

    // EN: Getting the data about the TV Channel
    // CZ: Získání dat o televizním kanálu
    $ENVO_CHANNEL_ALL = envo_get_tvchannel('', $envotable10);

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlint["int_sec_title"]["intt"];
    $SECTION_DESC  = $tlint["int_sec_desc"]["intd"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'int_setting.php';

    break;
  default:


}

?>