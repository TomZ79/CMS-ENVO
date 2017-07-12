<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$jakuser->jakModuleaccess(JAK_USERID, JAK_ACCESSBLOG)) envo_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'programoffertvchannel';
$envotable1 = DB_PREFIX . 'programoffertvtower';
$envotable2 = DB_PREFIX . 'programoffertvprogram';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../plugins/program_offer/admin/include/functions.php");

// Now start with the plugin use a switch to access all pages
switch ($page1) {
  case 'tvprogram':

    switch ($page2) {
      case 'newprogram':
        // ADD NEW TV PROGRAM TO DB

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (isset($_POST['btnSave'])) {

            // EN: Check if name isn't empty
            // CZ: Kontrola jestli existuje jméno
            if (empty($defaults['envo_programname'])) {
              $errors['e1'] = $tl['general_error']['generror60'] . '<br>';
            }

            // EN: Get Tower, Channel ID from selection
            // CZ: Získání ID Vysílače, Kanálu z výběru
            $tcarray = explode(",", $defaults["envo_tvchannel"]);

            if (is_array($tcarray)) {

              $towerid   = $tcarray[0];
              $channelid = $tcarray[1];

            }

            // EN: All checks are OK without Errors - Start the form processing
            // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
            if (count($errors) == 0) {

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
              */
              $result = $jakdb->query('INSERT INTO ' . $envotable2 . ' SET 
                        towerid = "' . smartsql($towerid) . '",
                        channelid = "' . smartsql($channelid) . '",
                        name = "' . smartsql($defaults['envo_programname']) . '",
                        icon = "' . smartsql($defaults['envo_programicons']) . '",
                        online = "' . smartsql($defaults['envo_programonline']) . '",
                        videoencoding = "' . smartsql($defaults['envo_videoencoding']) . '",
                        audioencoding = "' . smartsql($defaults['envo_audioencoding']) . '",
                        videoformat = "' . smartsql($defaults['envo_videoformat']) . '",
                        videosize = "' . smartsql($defaults['envo_videosize']) . '",
                        bitrate = "' . smartsql($defaults['envo_bitrate']) . '",
                        time = NOW()');

              $rowid = $jakdb->jak_last_id();

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvprogram&ssp=newprogram&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvprogram&ssp=editprogram&id=' . $rowid . '&status=s');
              }

            } else {
              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }

          }

        }

        // EN: Getting the data about the TV Tower
        // CZ: Získání dat o televizním vysílači
        $JAK_TVTOWER_ALL = envo_get_tvtower_info($envotable1);

        // EN: Getting the data about the channel of TV Tower
        // CZ: Získání dat o kanálu televizního vysílače
        $JAK_TVCHANNEL_ALL = envo_get_tvchannel_info($envotable);

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlpo["po_sec_title"]["pot8"];
        $SECTION_DESC  = $tlpo["po_sec_desc"]["pod8"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $plugin_template = 'plugins/program_offer/admin/template/po_newprogram.php';

        break;
      case 'editprogram':
        // EDIT TV PROGRAM IN DB

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $pageID = $page3;

        if (is_numeric($pageID) && envo_row_exist($pageID, $envotable2)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            if (isset($_POST['btnSave'])) {

              // EN: Check if name isn't empty
              // CZ: Kontrola jestli existuje jméno
              if (empty($defaults['envo_programname'])) {
                $errors['e1'] = $tl['general_error']['generror60'] . '<br>';
              }

              // EN: Get Tower, Channel ID from selection
              // CZ: Získání ID Vysílače, Kanálu z výběru
              $tcarray = explode(",", $defaults["envo_tvchannel"]);

              if (is_array($tcarray)) {

                $towerid   = $tcarray[0];
                $channelid = $tcarray[1];

              }

              // EN: All checks are OK without Errors - Start the form processing
              // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
              if (count($errors) == 0) {

                /* EN: Convert value
                 * smartsql - secure method to insert form data into a MySQL DB
                 * ------------------
                 * CZ: Převod hodnot
                 * smartsql - secure method to insert form data into a MySQL DB
                */
                $result = $jakdb->query('UPDATE ' . $envotable2 . ' SET
                          towerid = "' . smartsql($towerid) . '",
                          channelid = "' . smartsql($channelid) . '",
                          name = "' . smartsql($defaults['envo_programname']) . '",
                          icon = "' . smartsql($defaults['envo_programicons']) . '",
                          online = "' . smartsql($defaults['envo_programonline']) . '",
                          videoencoding = "' . smartsql($defaults['envo_videoencoding']) . '",
                          audioencoding = "' . smartsql($defaults['envo_audioencoding']) . '",
                          videoformat = "' . smartsql($defaults['envo_videoformat']) . '",
                          videosize = "' . smartsql($defaults['envo_videosize']) . '",
                          bitrate = "' . smartsql($defaults['envo_bitrate']) . '",
                          time = NOW()
                          WHERE id = "' . smartsql($pageID) . '"');

                if (!$result) {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvprogram&ssp=editprogram&id=' . $pageID . '&status=e');
                } else {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvprogram&ssp=editprogram&id=' . $pageID . '&status=s');
                }

              } else {
                $errors['e'] = $tl['general_error']['generror'] . '<br>';
                $errors      = $errors;
              }

            }

          }

          // EN: Get all the data for the form
          // CZ: Získání všech dat pro formulář
          $JAK_FORM_DATA = envo_get_data($pageID, $envotable2);

          // EN: Getting the data about the TV Tower
          // CZ: Získání dat o televizním vysílači
          $JAK_TVTOWER_ALL = envo_get_tvtower_info($envotable1);

          // EN: Getting the data about the channel of TV Tower
          // CZ: Získání dat o kanálu televizního vysílače
          $JAK_TVCHANNEL_ALL = envo_get_tvchannel_info($envotable);

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tlpo["po_sec_title"]["pot9"];
          $SECTION_DESC  = $tlpo["po_sec_desc"]["pod9"];

          // EN: Load the template
          // CZ: Načti template (šablonu)
          $plugin_template = 'plugins/program_offer/admin/template/po_editprogram.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=channel&status=ene');
        }

        break;
      default:
        // LIST OF TV PROGRAM

        switch ($page2) {
          case 'delete':
            // DELETE TV PROGRAM by click button in some records without checkbox

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $pageID = $page3;

            if (is_numeric($pageID) && envo_row_exist($pageID, $envotable2)) {

              // CZ: Odstranění programu z databáze
              $result = $jakdb->query('DELETE FROM ' . $envotable2 . ' WHERE id = "' . smartsql($pageID) . '"');

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - chybné
                envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvprogram&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - úspěšné
                envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvprogram&status=s&status1=s1');
              }

            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvchannel&status=ene');
            }

            // EN: Getting all the data about programs of the TV Channel
            // CZ: Získání všech dat o programech televizního kanálu vysílače
            $JAK_TVPROGRAM_ALL = envo_get_tvprogram('', $envotable2);

            // EN: Getting the data about the TV Tower
            // CZ: Získání dat o televizním vysílači
            $JAK_TVTOWER_ALL = envo_get_tvtower_info($envotable1);

            // EN: Getting the data about the channels of TV Tower
            // CZ: Získání dat o kanálech televizního vysílače
            $JAK_TVCHANNEL_ALL = envo_get_tvchannel_info($envotable);

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tlpo["po_sec_title"]["pot7"];
            $SECTION_DESC  = $tlpo["po_sec_desc"]["pod7"];

            // EN: Load the template
            // CZ: Načti template (šablonu)
            $plugin_template = 'plugins/program_offer/admin/template/po_program.php';

            break;
          default:

            // EN: Getting all the data about programs of the TV Channel
            // CZ: Získání všech dat o programech televizního kanálu vysílače
            $JAK_TVPROGRAM_ALL = envo_get_tvprogram('', $envotable2);

            // EN: Getting the data about the TV Tower
            // CZ: Získání dat o televizním vysílači
            $JAK_TVTOWER_ALL = envo_get_tvtower_info($envotable1);

            // EN: Getting the data about the channels of TV Tower
            // CZ: Získání dat o kanálech televizního vysílače
            $JAK_TVCHANNEL_ALL = envo_get_tvchannel_info($envotable);

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tlpo["po_sec_title"]["pot7"];
            $SECTION_DESC  = $tlpo["po_sec_desc"]["pod7"];

            // EN: Load the template
            // CZ: Načti template (šablonu)
            $plugin_template = 'plugins/program_offer/admin/template/po_program.php';
        }
    }

    break;
  case 'tvchannel':

    switch ($page2) {
      case 'newchannel':
        // ADD NEW TV CHANNEL TO DB

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (isset($_POST['btnSave'])) {

            // EN: Check if channel isn't empty
            // CZ: Kontrola jestli je zadaný kanál
            if (empty($defaults['envo_channelnumber'])) {
              $errors['e1'] = $tlpo['po_error']['poerror'] . '<br>';
            }

            // EN: Check if the name not exists
            // CZ: Kontrola jestli název neexistuje
            if (envo_channel_not_exist($defaults['envo_tvtower'], $defaults['envo_channelnumber'], $envotable)) {
              $errors['e2'] = $tlpo['po_error']['poerror1'] . '<br>';
            }

            // EN: All checks are OK without Errors - Start the form processing
            // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
            if (count($errors) == 0) {

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
              */
              $result = $jakdb->query('INSERT INTO ' . $envotable . ' SET 
                        towerid = "' . smartsql($defaults['envo_tvtower']) . '",
                        number = "' . smartsql($defaults['envo_channelnumber']) . '",
                        frequency = "' . smartsql($defaults['envo_channelfrequency']) . '",
                        freqrange = "' . smartsql($defaults['envo_channelfreqrange']) . '",
                        polarization = "' . smartsql($defaults['envo_polarization']) . '",
                        sitename = "' . smartsql($defaults['envo_sitename']) . '",
                        erpkw = "' . smartsql($defaults['envo_erpkw']) . '",
                        erpdbw = "' . smartsql($defaults['envo_erpdbw']) . '",
                        type = "' . smartsql($defaults['envo_type']) . '"');

              $rowid = $jakdb->jak_last_id();

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvchannel&ssp=newchannel&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvchannel&ssp=editchannel&id=' . $rowid . '&status=s');
              }

            } else {
              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }

          }

        }

        // EN: Getting the data about the TV Tower
        // CZ: Získání dat o televizním vysílači
        $JAK_TVTOWER_ALL = envo_get_tvtower_info($envotable1);

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlpo["po_sec_title"]["pot2"];
        $SECTION_DESC  = $tlpo["po_sec_desc"]["pod2"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $plugin_template = 'plugins/program_offer/admin/template/po_newchannel.php';

        break;
      case 'editchannel':
        // EDIT TV CHANNEL IN DB

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $pageID = $page3;

        if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            if (isset($_POST['btnSave'])) {

              // EN: Check if channel isn't empty
              // CZ: Kontrola jestli je zadaný kanál
              if (empty($defaults['envo_channelnumber'])) {
                $errors['e1'] = $tlpo['po_error']['poerror'] . '<br>';
              }

              // EN: All checks are OK without Errors - Start the form processing
              // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
              if (count($errors) == 0) {

                /* EN: Convert value
                 * smartsql - secure method to insert form data into a MySQL DB
                 * ------------------
                 * CZ: Převod hodnot
                 * smartsql - secure method to insert form data into a MySQL DB
                */
                $result = $jakdb->query('UPDATE ' . $envotable . ' SET
                          towerid = "' . smartsql($defaults['envo_tvtower']) . '",
                          number = "' . smartsql($defaults['envo_channelnumber']) . '",
                          frequency = "' . smartsql($defaults['envo_channelfrequency']) . '",
                          freqrange = "' . smartsql($defaults['envo_channelfreqrange']) . '",
                          polarization = "' . smartsql($defaults['envo_polarization']) . '",
                          sitename = "' . smartsql($defaults['envo_sitename']) . '",
                          erpkw = "' . smartsql($defaults['envo_erpkw']) . '",
                          erpdbw = "' . smartsql($defaults['envo_erpdbw']) . '",
                          type = "' . smartsql($defaults['envo_type']) . '"
                          WHERE id = "' . smartsql($pageID) . '"');


                if (!$result) {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvchannel&ssp=editchannel&id=' . $pageID . '&status=e');
                } else {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvchannel&ssp=editchannel&id=' . $pageID . '&status=s');
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

          // EN: Getting the data about the TV Tower
          // CZ: Získání dat o televizním vysílači
          $JAK_TVTOWER_ALL = envo_get_tvtower_info($envotable1);

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tlpo["po_sec_title"]["pot3"];
          $SECTION_DESC  = $tlpo["po_sec_desc"]["pod3"];

          // EN: Load the template
          // CZ: Načti template (šablonu)
          $plugin_template = 'plugins/program_offer/admin/template/po_editchannel.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=channel&status=ene');
        }

        break;
      default:
        // LIST OF TV CHANNEL

        switch ($page2) {
          case 'delete':
            // DELETE TV CHANNEL by click button in some records without checkbox

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $pageID = $page3;

            if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

              // CZ: Kontrola před odstraněním kanálu - ke kanálu je přiřazen program
              $result1 = $jakdb->query('SELECT COUNT(id) AS total FROM ' . $envotable2 . ' WHERE channelid = "' . smartsql($pageID) . '"');
              $row1    = $result1->fetch_assoc();
              $envodata = $row1['total'];

              if ($envodata == 0 ) {
                // CZ: Kanál NEOBSAHUJE žádný program - odstranění kanálu z databáze
                $result = $jakdb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '"');
              } else {
                // CZ: Kanál OBSAHUJE  program - NELZE odstranit kanál z databáze

                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - chybné
                envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvchannel&status=n');
              }

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - chybné
                envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvchannel&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - úspěšné
                envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvchannel&status=s&status1=s1');
              }

            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvchannel&status=ene');
            }

            // EN: Getting all the data about channels of the TV Tower
            // CZ: Získání všech dat o kanálech televizního vysílače
            $JAK_TVCHANNEL_ALL = envo_get_tvchannel('', $envotable);

            // EN: Getting the data about the TV Tower
            // CZ: Získání dat o televizním vysílači
            $JAK_TVTOWER_ALL = envo_get_tvtower_info($envotable1);

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tlpo["po_sec_title"]["pot1"];
            $SECTION_DESC  = $tlpo["po_sec_desc"]["pod1"];

            // EN: Load the template
            // CZ: Načti template (šablonu)
            $plugin_template = 'plugins/program_offer/admin/template/po_channel.php';

            break;
          default:

            // EN: Getting all the data about channels of the TV Tower
            // CZ: Získání všech dat o kanálech televizního vysílače
            $JAK_TVCHANNEL_ALL = envo_get_tvchannel('', $envotable);

            // EN: Getting the data about the TV Tower
            // CZ: Získání dat o televizním vysílači
            $JAK_TVTOWER_ALL = envo_get_tvtower_info($envotable1);

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tlpo["po_sec_title"]["pot1"];
            $SECTION_DESC  = $tlpo["po_sec_desc"]["pod1"];

            // EN: Load the template
            // CZ: Načti template (šablonu)
            $plugin_template = 'plugins/program_offer/admin/template/po_channel.php';
        }
    }

    break;
  case 'tvtower':

    switch ($page2) {
      case 'newtvtower':
        // ADD NEW TV TOWER TO DB

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
            if (empty($defaults['envo_tvtowername'])) {
              $errors['e1'] = $tl['general_error']['generror60'] . '<br>';
            }

            // EN: Check if the name not exists
            // CZ: Kontrola jestli název neexistuje
            if (envo_field_not_exist($defaults['envo_tvtowername'], $envotable1, $jakfield)) {
              $errors['e2'] = $tl['general_error']['generror61'] . '<br>';
            }

            // EN: All checks are OK without Errors - Start the form processing
            // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
            if (count($errors) == 0) {

              /* EN: INSERT DATA INTO DB
               * CZ: VLOŽENÍ DAT DO DB
               * ========================
               * EN: Info about embedded columns
               * id - primary key (autofill)
               * active - default value 1 (autofill) - use for lock item
               * ... other columns are inserted from the form
               * ------------------------
               * CZ: Info o vkládaných sloupcích
               * id - primary key (automatické vyplnění)
               * active - výchozí hodnota 1 (autofill) - použití pro uzamčení položky
               * ... ostatní sloupce jsou vkládány z formuláře
               * ========================
               * EN: Conversion of values
               * smartsql - secure method to insert form data into a MySQL DB
               * url_slug  - friendly URL slug from a string
               * htmlspecialchars - converts some predefined characters to HTML entities
               * ------------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
               * url_slug  - friendly URL slug from a string
               * htmlspecialchars - converts some predefined characters to HTML entities
              */
              $result = $jakdb->query('INSERT INTO ' . $envotable1 . ' SET 
                        name = "' . smartsql($defaults['envo_tvtowername']) . '",
                        varname = "' . url_slug($defaults['envo_tvtowername'], array('lowercase' => true, 'transliterate' => true)) . '",
                        station = "' . smartsql($defaults['envo_tvtowerstation']) . '",
                        district = "' . smartsql($defaults['envo_tvtowerdistrict']) . '",
                        heightsea = "' . smartsql($defaults['envo_tvtowerhsea']) . '",
                        eastlongitude = "' . htmlspecialchars($defaults['envo_tvtowerlongitude']) . '",
                        northlatitude = "' . htmlspecialchars($defaults['envo_tvtowerlatitude']) . '"');

              $rowid = $jakdb->jak_last_id();

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvtower&ssp=newtvtower&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvtower&ssp=edittvtower&id=' . $rowid . '&status=s');
              }

            } else {
              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }

          }

        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlpo["po_sec_title"]["pot5"];
        $SECTION_DESC  = $tlpo["po_sec_desc"]["pod5"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $plugin_template = 'plugins/program_offer/admin/template/po_newtvtower.php';

        break;
      case 'edittvtower':
        // EDIT TV TOWER IN DB

        // EN: Default Variable
        // CZ: Hlavní proměnné
        $pageID = $page3;

        if (is_numeric($pageID) && envo_row_exist($pageID, $envotable1)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            if (isset($_POST['btnSave'])) {

              // EN: Check if name isn't empty
              // CZ: Kontrola jestli je zadaný název
              if (empty($defaults['envo_tvtowername'])) {
                $errors['e1'] = $tl['general_error']['generror60'] . '<br>';
              }

              // EN: All checks are OK without Errors - Start the form processing
              // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
              if (count($errors) == 0) {

                /* EN: UPDATE DATA INTO DB
                 * CZ: AKTUALIZACE DAT DO DB
                 * ========================
                 * EN: Info about embedded columns
                 * id - primary key (autofill)
                 * active - default value 1 (autofill) - use for lock item
                 * ... other columns are inserted from the form
                 * ------------------------
                 * CZ: Info o vkládaných sloupcích
                 * id - primary key (automatické vyplnění)
                 * active - výchozí hodnota 1 (autofill) - použití pro uzamčení položky
                 * ... ostatní sloupce jsou vkládány z formuláře
                 * ========================
                 * EN: Conversion of values
                 * smartsql - secure method to insert form data into a MySQL DB
                 * url_slug  - friendly URL slug from a string
                 * htmlspecialchars - converts some predefined characters to HTML entities
                 * ------------------
                 * CZ: Převod hodnot
                 * smartsql - secure method to insert form data into a MySQL DB
                 * url_slug  - friendly URL slug from a string
                 * htmlspecialchars - converts some predefined characters to HTML entities
                */
                $result = $jakdb->query('UPDATE ' . $envotable1 . ' SET
                          name = "' . smartsql($defaults['envo_tvtowername']) . '",
                          varname = "' . url_slug($defaults['envo_tvtowername'], array('lowercase' => true, 'transliterate' => true)) . '",
                          station = "' . smartsql($defaults['envo_tvtowerstation']) . '",
                          district = "' . smartsql($defaults['envo_tvtowerdistrict']) . '",
                          heightsea = "' . smartsql($defaults['envo_tvtowerhsea']) . '",
                          eastlongitude = "' . htmlspecialchars($defaults['envo_tvtowerlongitude']) . '",
                          northlatitude = "' . htmlspecialchars($defaults['envo_tvtowerlatitude']) . '"
                          WHERE id = "' . smartsql($pageID) . '"');


                if (!$result) {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvtower&ssp=edittvtower&id=' . $pageID . '&status=e');
                } else {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvtower&ssp=edittvtower&id=' . $pageID . '&status=s');
                }

              } else {
                $errors['e'] = $tl['general_error']['generror'] . '<br>';
                $errors      = $errors;
              }

            }

          }

          // EN: Get all the data for the form
          // CZ: Získání všech dat pro formulář
          $JAK_FORM_DATA = envo_get_data($pageID, $envotable1);

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tlpo["po_sec_title"]["pot6"];
          $SECTION_DESC  = $tlpo["po_sec_desc"]["pod6"];

          // EN: Load the template
          // CZ: Načti template (šablonu)
          $plugin_template = 'plugins/program_offer/admin/template/po_edittvtower.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvtower&status=ene');
        }

        break;
      default:
        // LIST OF TV TOWER

        switch ($page2) {
          case 'lock':
            // LOCK TV TOWER by click button in some records without checkbox

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $pageID = $page3;

            if (is_numeric($pageID) && envo_row_exist($pageID, $envotable1)) {

              $result = $jakdb->query('UPDATE ' . $envotable1 . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($pageID) . '"');

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - chybné
                envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvtower&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - úspěšné
                envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvtower&status=s&status1=s2');
              }

            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvtower&status=ene');
            }

            // EN: Getting all the data about the TV Tower
            // CZ: Získání všech dat o televizním vysílači
            $JAK_TVTOWER_ALL = envo_get_tvtower('', $envotable1);

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tlpo["po_sec_title"]["pot4"];
            $SECTION_DESC  = $tlpo["po_sec_desc"]["pod4"];

            // EN: Load the template
            // CZ: Načti template (šablonu)
            $plugin_template = 'plugins/program_offer/admin/template/po_tvtower.php';

            break;
          case 'delete':
            // DELETE TV TOWER by click button in some records without checkbox

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $pageID = $page3;

            if (is_numeric($pageID) && envo_row_exist($pageID, $envotable1)) {

              // CZ: Kontrola před odstraněním vysílače - k vysílači je přiřazen kanál
              $result1 = $jakdb->query('SELECT COUNT(id) AS total FROM ' . $envotable . ' WHERE towerid = "' . smartsql($pageID) . '"');
              $row1    = $result1->fetch_assoc();
              $envodata = $row1['total'];

              if ($envodata == 0 ) {
                // CZ: Vysílač NEOBSAHUJE žádný kanál - odstranění vysílače z databáze
                $result = $jakdb->query('DELETE FROM ' . $envotable1 . ' WHERE id = "' . smartsql($pageID) . '"');
              } else {
                // CZ: Vysílač OBSAHUJE  kanál - NELZE odstranit vysílač z databáze

                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - chybné
                envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvtower&status=n');
              }

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - chybné
                envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvtower&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - úspěšné
                envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvtower&status=s&status1=s1');
              }

            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=tvtower&status=ene');
            }

            // EN: Getting all the data about the TV Tower
            // CZ: Získání všech dat o televizním vysílači
            $JAK_TVTOWER_ALL = envo_get_tvtower('', $envotable1);

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tlpo["po_sec_title"]["pot4"];
            $SECTION_DESC  = $tlpo["po_sec_desc"]["pod4"];

            // EN: Load the template
            // CZ: Načti template (šablonu)
            $plugin_template = 'plugins/program_offer/admin/template/po_tvtower.php';

            break;
          default:

            // EN: Getting all the data about the TV Tower
            // CZ: Získání všech dat o televizním vysílači
            $JAK_TVTOWER_ALL = envo_get_tvtower('', $envotable1);

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tlpo["po_sec_title"]["pot4"];
            $SECTION_DESC  = $tlpo["po_sec_desc"]["pod4"];

            // EN: Load the template
            // CZ: Načti template (šablonu)
            $plugin_template = 'plugins/program_offer/admin/template/po_tvtower.php';
        }
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
		    	WHEN "programoffertitle" THEN "' . smartsql($defaults['envo_title']) . '"
		    END
				WHERE varname IN ("programoffertitle")');

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=setting&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=program-offer&sp=setting&status=s');
        }
      } else {
        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // EN: Import important settings for the template from the DB
    // CZ: Importuj důležité nastavení pro šablonu z DB
    $JAK_SETTING = envo_get_setting('programoffer');

    // EN: Import important settings for the template from the DB (only VALUE)
    // CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
    $JAK_SETTING_VAL = envo_get_setting_val('programoffer');

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlpo["po_sec_title"]["pot"];
    $SECTION_DESC  = $tlpo["po_sec_desc"]["pod"];

    // EN: Load the template
    // CZ: Načti template (šablonu)
    $plugin_template = 'plugins/program_offer/admin/template/po_setting.php';

    break;
  default:

}
?>