<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$jakuser->jakModuleaccess(JAK_USERID, JAK_ACCESSTV_TOWER)) envo_redirect(BASE_URL);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/tv_tower/admin/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/tv_tower/admin/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'tvtowertvchannel';
$envotable1 = DB_PREFIX . 'tvtowertvtower';
$envotable2 = DB_PREFIX . 'tvtowertvprogram';
$envotable3 = DB_PREFIX . 'tvtowersidtv';
$envotable4 = DB_PREFIX . 'tvtowersidr';
$envotable5 = DB_PREFIX . 'tvtowersids';
$envotable6 = DB_PREFIX . 'tvtoweronid';
$envotable7 = DB_PREFIX . 'tvtowernid';

// EN: Settings all the filse we need for our work
// CZ: Nastavení všech souborů, které potřebujeme pro práci
$langdir  = '../plugins/tv_tower/lang/';
$langfile = $langdir . $site_language . '.ini';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../plugins/tv_tower/admin/include/functions.php");

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
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

              $towerid       = $tcarray[0];
              $channelid     = $tcarray[1];
              $channelnumber = $tcarray[2];

            }

            // EN: Get services of program
            // CZ: Získání služeb programu
            $dataServices = array();
            if ($defaults['envo_teletext'] == '1') {
              $dataServices[] = 'Teletext';
            }

            if ($defaults['envo_vps'] == '1') {
              $dataServices[] = 'VPS';
            }

            if ($defaults['envo_epg'] == '1') {
              $dataServices[] = 'EPG';
            }

            if ($defaults['envo_hbbtv'] == '1') {
              $dataServices[] = 'HbbTV';
            }

            $services = implode(", ", $dataServices);

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
                        channelnumber = "' . smartsql($channelnumber) . '",
                        tvr = "' . smartsql($defaults['envo_programtvr']) . '",
                        name = "' . smartsql($defaults['envo_programname']) . '",
                        icon = "' . smartsql($defaults['envo_programicons']) . '",
                        online = "' . smartsql($defaults['envo_programonline']) . '",
                        service_id = "' . smartsql($defaults['envo_serviceid']) . '",
                        videoencoding = "' . smartsql($defaults['envo_videoencoding']) . '",
                        audioencoding = "' . smartsql($defaults['envo_audioencoding']) . '",
                        videoformat = "' . smartsql($defaults['envo_videoformat']) . '",
                        videosize = "' . smartsql($defaults['envo_videosize']) . '",
                        bitrate = "' . smartsql($defaults['envo_bitrate']) . '",
                        services = "' . $services . '",
                        time = NOW()');

              $rowid = $jakdb->jak_last_id();

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvprogram&ssp=newprogram&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvprogram&ssp=editprogram&id=' . $rowid . '&status=s');
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

        // EN: Getting all the data about S_ID TV
        // CZ: Získání všech dat o S_ID TV
        $JAK_SIDTV_ALL = envo_get_tvtower('', $envotable3);

        // EN: Getting all the data about S_ID R
        // CZ: Získání všech dat o S_ID R
        $JAK_SIDR_ALL = envo_get_tvtower('', $envotable4);

        // EN: Getting all the data about S_ID S
        // CZ: Získání všech dat o S_ID S
        $JAK_SIDS_ALL = envo_get_tvtower('', $envotable5);

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tltt["tt_sec_title"]["ttt8"];
        $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd8"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_newprogram.php';

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

                $towerid       = $tcarray[0];
                $channelid     = $tcarray[1];
                $channelnumber = $tcarray[2];

              }

              // EN: Get services of program
              // CZ: Získání služeb programu
              $dataServices = array();
              if ($defaults['envo_teletext'] == '1') {
                $dataServices[] = 'Teletext';
              }

              if ($defaults['envo_vps'] == '1') {
                $dataServices[] = 'VPS';
              }

              if ($defaults['envo_epg'] == '1') {
                $dataServices[] = 'EPG';
              }

              if ($defaults['envo_hbbtv'] == '1') {
                $dataServices[] = 'HbbTV';
              }

              $services = implode(", ", $dataServices);

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
                          channelnumber = "' . smartsql($channelnumber) . '",
                          tvr = "' . smartsql($defaults['envo_programtvr']) . '",
                          name = "' . smartsql($defaults['envo_programname']) . '",
                          icon = "' . smartsql($defaults['envo_programicons']) . '",
                          online = "' . smartsql($defaults['envo_programonline']) . '",
                          service_id = "' . smartsql($defaults['envo_serviceid']) . '",
                          videoencoding = "' . smartsql($defaults['envo_videoencoding']) . '",
                          audioencoding = "' . smartsql($defaults['envo_audioencoding']) . '",
                          videoformat = "' . smartsql($defaults['envo_videoformat']) . '",
                          videosize = "' . smartsql($defaults['envo_videosize']) . '",
                          bitrate = "' . smartsql($defaults['envo_bitrate']) . '",
                          services = "' . $services . '",
                          time = NOW()
                          WHERE id = "' . smartsql($pageID) . '"');

                if (!$result) {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvprogram&ssp=editprogram&id=' . $pageID . '&status=e');
                } else {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvprogram&ssp=editprogram&id=' . $pageID . '&status=s');
                }

              } else {
                $errors['e'] = $tl['general_error']['generror'] . '<br>';
                $errors      = $errors;
              }

            }

          }

          // EN: Get all the data for the form
          // CZ: Získání všech dat pro formulář
          $ENVO_FORM_DATA = envo_get_data($pageID, $envotable2);

          // EN: Getting the data about the TV Tower
          // CZ: Získání dat o televizním vysílači
          $JAK_TVTOWER_ALL = envo_get_tvtower_info($envotable1);

          // EN: Getting the data about the channel of TV Tower
          // CZ: Získání dat o kanálu televizního vysílače
          $JAK_TVCHANNEL_ALL = envo_get_tvchannel_info($envotable);

          // EN: Getting all the data about S_ID TV
          // CZ: Získání všech dat o S_ID TV
          $JAK_SIDTV_ALL = envo_get_tvtower('', $envotable3);

          // EN: Getting all the data about S_ID R
          // CZ: Získání všech dat o S_ID R
          $JAK_SIDR_ALL = envo_get_tvtower('', $envotable4);

          // EN: Getting all the data about S_ID S
          // CZ: Získání všech dat o S_ID S
          $JAK_SIDS_ALL = envo_get_tvtower('', $envotable5);

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tltt["tt_sec_title"]["ttt9"];
          $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd9"];

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_editprogram.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=channel&status=ene');
        }

        break;
      default:
        // LIST OF TV PROGRAM

        switch ($page2) {
          case 'delete':
            // DELETE TV PROGRAM by click button

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $pageID = $page3;

            if (is_numeric($pageID) && envo_row_exist($pageID, $envotable2)) {

              // CZ: Odstranění programu z databáze
              $result = $jakdb->query('DELETE FROM ' . $envotable2 . ' WHERE id = "' . smartsql($pageID) . '"');

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - chybné
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvprogram&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - úspěšné
                /*
                NOTIFIKACE:
                'status=s'    - Záznam úspěšně uložen
                'status1=s1'  - Záznam úspěšně odstraněn
                */
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvprogram&status=s&status1=s1');
              }

            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvchannel&status=ene');
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
            $SECTION_TITLE = $tltt["tt_sec_title"]["ttt7"];
            $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd7"];

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_program.php';

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
            $SECTION_TITLE = $tltt["tt_sec_title"]["ttt7"];
            $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd7"];

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_program.php';
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
              $errors['e1'] = $tltt['tt_error']['tterror'] . '<br>';
            }

            // EN: Check if the name not exists
            // CZ: Kontrola jestli název neexistuje
            if (envo_channel_not_exist($defaults['envo_tvtower'], $defaults['envo_channelnumber'], $envotable)) {
              $errors['e2'] = $tltt['tt_error']['tterror1'] . '<br>';
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
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvchannel&ssp=newchannel&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvchannel&ssp=editchannel&id=' . $rowid . '&status=s');
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
        $SECTION_TITLE = $tltt["tt_sec_title"]["ttt2"];
        $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd2"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_newchannel.php';

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
                $errors['e1'] = $tltt['tt_error']['tterror'] . '<br>';
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
                  envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvchannel&ssp=editchannel&id=' . $pageID . '&status=e');
                } else {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvchannel&ssp=editchannel&id=' . $pageID . '&status=s');
                }

              } else {
                $errors['e'] = $tl['general_error']['generror'] . '<br>';
                $errors      = $errors;
              }

            }

          }

          // EN: Get all the data for the form
          // CZ: Získání všech dat pro formulář
          $ENVO_FORM_DATA = envo_get_data($pageID, $envotable);

          // EN: Getting the data about the TV Tower
          // CZ: Získání dat o televizním vysílači
          $JAK_TVTOWER_ALL = envo_get_tvtower_info($envotable1);

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tltt["tt_sec_title"]["ttt3"];
          $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd3"];

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_editchannel.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=channel&status=ene');
        }

        break;
      default:
        // LIST OF TV CHANNEL

        switch ($page2) {
          case 'delete':
            // DELETE TV CHANNEL by click button

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $pageID = $page3;

            if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

              // CZ: Kontrola před odstraněním kanálu - ke kanálu je přiřazen program
              $result1  = $jakdb->query('SELECT COUNT(id) AS total FROM ' . $envotable2 . ' WHERE channelid = "' . smartsql($pageID) . '"');
              $row1     = $result1->fetch_assoc();
              $envodata = $row1['total'];

              if ($envodata == 0) {
                // CZ: Kanál NEOBSAHUJE žádný program - odstranění kanálu z databáze
                $result = $jakdb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '"');
              } else {
                // CZ: Kanál OBSAHUJE  program - NELZE odstranit kanál z databáze

                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - chybné
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvchannel&status=n');
              }

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - chybné
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvchannel&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - úspěšné
                /*
                NOTIFIKACE:
                'status=s'    - Záznam úspěšně uložen
                'status1=s1'  - Záznam úspěšně odstraněn
                */
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvchannel&status=s&status1=s1');
              }

            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvchannel&status=ene');
            }

            // EN: Getting all the data about channels of the TV Tower
            // CZ: Získání všech dat o kanálech televizního vysílače
            $JAK_TVCHANNEL_ALL = envo_get_tvchannel('', $envotable);

            // EN: Getting the data about the TV Tower
            // CZ: Získání dat o televizním vysílači
            $JAK_TVTOWER_ALL = envo_get_tvtower_info($envotable1);

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tltt["tt_sec_title"]["ttt1"];
            $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd1"];

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_channel.php';

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
            $SECTION_TITLE = $tltt["tt_sec_title"]["ttt1"];
            $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd1"];

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_channel.php';
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
                        varname = "' . url_slug($defaults['envo_tvtowername'], array('lowercase' => TRUE, 'transliterate' => TRUE)) . '",
                        station = "' . smartsql($defaults['envo_tvtowerstation']) . '",
                        district = "' . smartsql($defaults['envo_tvtowerdistrict']) . '",
                        heightsea = "' . smartsql($defaults['envo_tvtowerhsea']) . '",
                        eastlongitude = "' . htmlspecialchars($defaults['envo_tvtowerlongitude']) . '",
                        northlatitude = "' . htmlspecialchars($defaults['envo_tvtowerlatitude']) . '"');

              $rowid = $jakdb->jak_last_id();

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvtower&ssp=newtvtower&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvtower&ssp=edittvtower&id=' . $rowid . '&status=s');
              }

            } else {
              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }

          }

        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tltt["tt_sec_title"]["ttt5"];
        $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd5"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_newtvtower.php';

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
                          varname = "' . url_slug($defaults['envo_tvtowername'], array('lowercase' => TRUE, 'transliterate' => TRUE)) . '",
                          station = "' . smartsql($defaults['envo_tvtowerstation']) . '",
                          district = "' . smartsql($defaults['envo_tvtowerdistrict']) . '",
                          heightsea = "' . smartsql($defaults['envo_tvtowerhsea']) . '",
                          eastlongitude = "' . htmlspecialchars($defaults['envo_tvtowerlongitude']) . '",
                          northlatitude = "' . htmlspecialchars($defaults['envo_tvtowerlatitude']) . '"
                          WHERE id = "' . smartsql($pageID) . '"');


                if (!$result) {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvtower&ssp=edittvtower&id=' . $pageID . '&status=e');
                } else {
                  // EN: Redirect page
                  // CZ: Přesměrování stránky
                  envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvtower&ssp=edittvtower&id=' . $pageID . '&status=s');
                }

              } else {
                $errors['e'] = $tl['general_error']['generror'] . '<br>';
                $errors      = $errors;
              }

            }

          }

          // EN: Get all the data for the form
          // CZ: Získání všech dat pro formulář
          $ENVO_FORM_DATA = envo_get_data($pageID, $envotable1);

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tltt["tt_sec_title"]["ttt6"];
          $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd6"];

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_edittvtower.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvtower&status=ene');
        }

        break;
      default:
        // LIST OF TV TOWER

        switch ($page2) {
          case 'lock':
            // LOCK TV TOWER by click button

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $pageID = $page3;

            if (is_numeric($pageID) && envo_row_exist($pageID, $envotable1)) {

              $result = $jakdb->query('UPDATE ' . $envotable1 . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($pageID) . '"');

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - chybné
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvtower&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - úspěšné
                /*
                NOTIFIKACE:
                'status=s'    - Záznam úspěšně uložen
                'status1=s2'  - Všechny záznamy úspěšně odstraněny
                */
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvtower&status=s&status1=s2');
              }

            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvtower&status=ene');
            }

            // EN: Getting all the data about the TV Tower
            // CZ: Získání všech dat o televizním vysílači
            $JAK_TVTOWER_ALL = envo_get_tvtower('', $envotable1);

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tltt["tt_sec_title"]["ttt4"];
            $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd4"];

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_tvtower.php';

            break;
          case 'delete':
            // DELETE TV TOWER by click button

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $pageID = $page3;

            if (is_numeric($pageID) && envo_row_exist($pageID, $envotable1)) {

              // CZ: Kontrola před odstraněním vysílače - k vysílači je přiřazen kanál
              $result1  = $jakdb->query('SELECT COUNT(id) AS total FROM ' . $envotable . ' WHERE towerid = "' . smartsql($pageID) . '"');
              $row1     = $result1->fetch_assoc();
              $envodata = $row1['total'];

              if ($envodata == 0) {
                // CZ: Vysílač NEOBSAHUJE žádný kanál - odstranění vysílače z databáze
                $result = $jakdb->query('DELETE FROM ' . $envotable1 . ' WHERE id = "' . smartsql($pageID) . '"');
              } else {
                // CZ: Vysílač OBSAHUJE  kanál - NELZE odstranit vysílač z databáze

                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - chybné
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvtower&status=n');
              }

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - chybné
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvtower&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - úspěšné
                /*
                NOTIFIKACE:
                'status=s'    - Záznam úspěšně uložen
                'status1=s1'  - Záznam úspěšně odstraněn
                */
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvtower&status=s&status1=s1');
              }

            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=tvtower&status=ene');
            }

            // EN: Getting all the data about the TV Tower
            // CZ: Získání všech dat o televizním vysílači
            $JAK_TVTOWER_ALL = envo_get_tvtower('', $envotable1);

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tltt["tt_sec_title"]["ttt4"];
            $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd4"];

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_tvtower.php';

            break;
          default:

            // EN: Getting all the data about the TV Tower
            // CZ: Získání všech dat o televizním vysílači
            $JAK_TVTOWER_ALL = envo_get_tvtower('', $envotable1);

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tltt["tt_sec_title"]["ttt4"];
            $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd4"];

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_tvtower.php';
        }
    }

    break;
  case 'identifiers':

    switch ($page2) {
      case 'createident':

        switch ($page3) {
          case 's_idtv':
            // ADD NEW S_ID TV TO DB

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $envofield1 = 'sid';
            $envofield2 = 'name';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              // EN: Default Variable
              // CZ: Hlavní proměnné
              $defaults = $_POST;

              if (isset($_POST['btnSave'])) {

                // EN: Check if s_id isn't empty
                // CZ: Kontrola jestli existuje s_id
                if (empty($defaults['envo_sidtv'])) {
                  $errors['e1'] = $tl['general_error']['generror60'] . '<br>';
                }

                // EN: Check if s_id isn't empty
                // CZ: Kontrola jestli existuje s_id
                if (empty($defaults['envo_sidtvname'])) {
                  $errors['e2'] = $tl['general_error']['generror60'] . '<br>';
                }

                // EN: Check if the name not exists
                // CZ: Kontrola jestli název neexistuje
                if (envo_field_not_exist($defaults['envo_sidtv'], $envotable3, $envofield1, $defaults['envo_sidtvname'], $envofield2)) {
                  $errors['e3'] = $tl['general_error']['generror61'] . '<br>';
                }

                // EN: All checks are OK without Errors - Start the form processing
                // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
                if (count($errors) == 0) {

                  /* EN: UPDATE DATA INTO DB
                   * CZ: AKTUALIZACE DAT DO DB
                   * ========================
                   * EN: Info about embedded columns
                   * id - primary key (autofill)
                   * ... other columns are inserted from the form
                   * ------------------------
                   * CZ: Info o vkládaných sloupcích
                   * id - primary key (automatické vyplnění)
                   * ... ostatní sloupce jsou vkládány z formuláře
                   * ========================
                   * EN: Conversion of values
                   * smartsql - secure method to insert form data into a MySQL DB
                   * ------------------
                   * CZ: Převod hodnot
                   * smartsql - secure method to insert form data into a MySQL DB
                  */
                  $result = $jakdb->query('INSERT INTO ' . $envotable3 . ' SET 
                            sid = "' . smartsql($defaults['envo_sidtv']) . '",
                            name = "' . smartsql($defaults['envo_sidtvname']) . '",
                            time = NOW()');

                  $rowid = $jakdb->jak_last_id();

                  if (!$result) {
                    // EN: Redirect page
                    // CZ: Přesměrování stránky
                    envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=createident&sssp=s_idtv&status=e');
                  } else {
                    // EN: Redirect page
                    // CZ: Přesměrování stránky
                    envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=editident&sssp=s_idtv&id=' . $rowid . '&status=s');
                  }

                } else {
                  $errors['e'] = $tl['general_error']['generror'] . '<br>';
                  $errors      = $errors;
                }

              }

            }

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tltt["tt_sec_title"]["ttt12"];
            $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd12"];

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_createident_s_idtv.php';

            break;
          case 's_idr':
            // ADD NEW S_ID R TO DB

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $envofield1 = 'sid';
            $envofield2 = 'name';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              // EN: Default Variable
              // CZ: Hlavní proměnné
              $defaults = $_POST;

              if (isset($_POST['btnSave'])) {

                // EN: Check if s_id isn't empty
                // CZ: Kontrola jestli existuje s_id
                if (empty($defaults['envo_sidr'])) {
                  $errors['e1'] = $tl['general_error']['generror60'] . '<br>';
                }

                // EN: Check if s_id isn't empty
                // CZ: Kontrola jestli existuje s_id
                if (empty($defaults['envo_sidrname'])) {
                  $errors['e2'] = $tl['general_error']['generror60'] . '<br>';
                }

                // EN: Check if the name not exists
                // CZ: Kontrola jestli název neexistuje
                if (envo_field_not_exist($defaults['envo_sidr'], $envotable4, $envofield1, $defaults['envo_sidrname'], $envofield2)) {
                  $errors['e3'] = $tl['general_error']['generror61'] . '<br>';
                }

                // EN: All checks are OK without Errors - Start the form processing
                // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
                if (count($errors) == 0) {

                  /* EN: UPDATE DATA INTO DB
                   * CZ: AKTUALIZACE DAT DO DB
                   * ========================
                   * EN: Info about embedded columns
                   * id - primary key (autofill)
                   * ... other columns are inserted from the form
                   * ------------------------
                   * CZ: Info o vkládaných sloupcích
                   * id - primary key (automatické vyplnění)
                   * ... ostatní sloupce jsou vkládány z formuláře
                   * ========================
                   * EN: Conversion of values
                   * smartsql - secure method to insert form data into a MySQL DB
                   * ------------------
                   * CZ: Převod hodnot
                   * smartsql - secure method to insert form data into a MySQL DB
                  */
                  $result = $jakdb->query('INSERT INTO ' . $envotable4 . ' SET 
                            sid = "' . smartsql($defaults['envo_sidr']) . '",
                            name = "' . smartsql($defaults['envo_sidrname']) . '",
                            time = NOW()');

                  $rowid = $jakdb->jak_last_id();

                  if (!$result) {
                    // EN: Redirect page
                    // CZ: Přesměrování stránky
                    envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=createident&sssp=s_idr&status=e');
                  } else {
                    // EN: Redirect page
                    // CZ: Přesměrování stránky
                    envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=editident&sssp=s_idr&id=' . $rowid . '&status=s');
                  }

                } else {
                  $errors['e'] = $tl['general_error']['generror'] . '<br>';
                  $errors      = $errors;
                }

              }

            }
            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tltt["tt_sec_title"]["ttt13"];
            $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd13"];

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_createident_s_idr.php';

            break;
          case 's_ids':
            // ADD NEW S_ID S TO DB

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $envofield1 = 'sid';
            $envofield2 = 'name';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              // EN: Default Variable
              // CZ: Hlavní proměnné
              $defaults = $_POST;

              if (isset($_POST['btnSave'])) {

                // EN: Check if s_id isn't empty
                // CZ: Kontrola jestli existuje s_id
                if (empty($defaults['envo_sids'])) {
                  $errors['e1'] = $tl['general_error']['generror60'] . '<br>';
                }

                // EN: Check if s_id isn't empty
                // CZ: Kontrola jestli existuje s_id
                if (empty($defaults['envo_sidsname'])) {
                  $errors['e2'] = $tl['general_error']['generror60'] . '<br>';
                }

                // EN: Check if the name not exists
                // CZ: Kontrola jestli název neexistuje
                if (envo_field_not_exist($defaults['envo_sids'], $envotable5, $envofield1, $defaults['envo_sidsname'], $envofield2)) {
                  $errors['e3'] = $tl['general_error']['generror61'] . '<br>';
                }

                // EN: All checks are OK without Errors - Start the form processing
                // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
                if (count($errors) == 0) {

                  /* EN: UPDATE DATA INTO DB
                   * CZ: AKTUALIZACE DAT DO DB
                   * ========================
                   * EN: Info about embedded columns
                   * id - primary key (autofill)
                   * ... other columns are inserted from the form
                   * ------------------------
                   * CZ: Info o vkládaných sloupcích
                   * id - primary key (automatické vyplnění)
                   * ... ostatní sloupce jsou vkládány z formuláře
                   * ========================
                   * EN: Conversion of values
                   * smartsql - secure method to insert form data into a MySQL DB
                   * ------------------
                   * CZ: Převod hodnot
                   * smartsql - secure method to insert form data into a MySQL DB
                  */
                  $result = $jakdb->query('INSERT INTO ' . $envotable5 . ' SET 
                            sid = "' . smartsql($defaults['envo_sids']) . '",
                            name = "' . smartsql($defaults['envo_sidsname']) . '",
                            time = NOW()');

                  $rowid = $jakdb->jak_last_id();

                  if (!$result) {
                    // EN: Redirect page
                    // CZ: Přesměrování stránky
                    envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=createident&sssp=s_ids&status=e');
                  } else {
                    // EN: Redirect page
                    // CZ: Přesměrování stránky
                    envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=editident&sssp=s_ids&id=' . $rowid . '&status=s');
                  }

                } else {
                  $errors['e'] = $tl['general_error']['generror'] . '<br>';
                  $errors      = $errors;
                }

              }

            }

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tltt["tt_sec_title"]["ttt14"];
            $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd14"];

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_createident_s_ids.php';

            break;
          case 'on_id':
            // ADD NEW ON_ID TO DB

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $envofield1 = 'onid';
            $envofield2 = 'country';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              // EN: Default Variable
              // CZ: Hlavní proměnné
              $defaults = $_POST;

              if (isset($_POST['btnSave'])) {

                // EN: Check if s_id isn't empty
                // CZ: Kontrola jestli existuje s_id
                if (empty($defaults['envo_onid'])) {
                  $errors['e1'] = $tl['general_error']['generror60'] . '<br>';
                }

                // EN: Check if s_id isn't empty
                // CZ: Kontrola jestli existuje s_id
                if (empty($defaults['envo_onidcountry'])) {
                  $errors['e2'] = $tl['general_error']['generror60'] . '<br>';
                }

                // EN: Check if the name not exists
                // CZ: Kontrola jestli název neexistuje
                if (envo_field_not_exist($defaults['envo_onid'], $envotable6, $envofield1, $defaults['envo_onidcountry'], $envofield2)) {
                  $errors['e3'] = $tl['general_error']['generror61'] . '<br>';
                }

                // EN: All checks are OK without Errors - Start the form processing
                // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
                if (count($errors) == 0) {

                  /* EN: UPDATE DATA INTO DB
                   * CZ: AKTUALIZACE DAT DO DB
                   * ========================
                   * EN: Info about embedded columns
                   * id - primary key (autofill)
                   * ... other columns are inserted from the form
                   * ------------------------
                   * CZ: Info o vkládaných sloupcích
                   * id - primary key (automatické vyplnění)
                   * ... ostatní sloupce jsou vkládány z formuláře
                   * ========================
                   * EN: Conversion of values
                   * smartsql - secure method to insert form data into a MySQL DB
                   * ------------------
                   * CZ: Převod hodnot
                   * smartsql - secure method to insert form data into a MySQL DB
                  */
                  $result = $jakdb->query('INSERT INTO ' . $envotable6 . ' SET 
                            onid = "' . smartsql($defaults['envo_onid']) . '",
                            country = "' . smartsql($defaults['envo_onidcountry']) . '",
                            time = NOW()');

                  $rowid = $jakdb->jak_last_id();

                  if (!$result) {
                    // EN: Redirect page
                    // CZ: Přesměrování stránky
                    envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=createident&sssp=on_id&status=e');
                  } else {
                    // EN: Redirect page
                    // CZ: Přesměrování stránky
                    envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=editident&sssp=on_id&id=' . $rowid . '&status=s');
                  }

                } else {
                  $errors['e'] = $tl['general_error']['generror'] . '<br>';
                  $errors      = $errors;
                }

              }

            }

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tltt["tt_sec_title"]["ttt15"];
            $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd15"];

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_createident_onid.php';

            break;
          case 'n_id':

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tltt["tt_sec_title"]["ttt16"];
            $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd16"];

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_createident_nid.php';

            break;
          default:

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tltt["tt_sec_title"]["ttt10"];
            $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd10"];

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_createident.php';
        }

        break;
      case 'editident':

        switch ($page3) {
          case 's_idtv':
            // EDIT S_ID TV

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $pageID   = $page4;
            $envofield1 = 'name';

            if (is_numeric($pageID) && envo_row_exist($pageID, $envotable3)) {

              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // EN: Default Variable
                // CZ: Hlavní proměnné
                $defaults = $_POST;

                if (isset($_POST['btnSave'])) {

                  // EN: Check if s_id isn't empty
                  // CZ: Kontrola jestli existuje s_id
                  if (empty($defaults['envo_sidtv'])) {
                    $errors['e1'] = $tl['general_error']['generror60'] . '<br>';
                  }

                  // EN: Check if s_id isn't empty
                  // CZ: Kontrola jestli existuje s_id
                  if (empty($defaults['envo_sidtvname'])) {
                    $errors['e2'] = $tl['general_error']['generror60'] . '<br>';
                  }


                  // EN: All checks are OK without Errors - Start the form processing
                  // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
                  if (count($errors) == 0) {

                    /* EN: UPDATE DATA INTO DB
                     * CZ: AKTUALIZACE DAT DO DB
                     * ========================
                     * EN: Info about embedded columns
                     * id - primary key (autofill)
                     * ... other columns are inserted from the form
                     * ------------------------
                     * CZ: Info o vkládaných sloupcích
                     * id - primary key (automatické vyplnění)
                     * ... ostatní sloupce jsou vkládány z formuláře
                     * ========================
                     * EN: Conversion of values
                     * smartsql - secure method to insert form data into a MySQL DB
                     * ------------------
                     * CZ: Převod hodnot
                     * smartsql - secure method to insert form data into a MySQL DB
                    */
                    $result = $jakdb->query('UPDATE ' . $envotable3 . ' SET
                              sid = "' . smartsql($defaults['envo_sidtv']) . '",
                              name = "' . smartsql($defaults['envo_sidtvname']) . '",
                              time = NOW()
                              WHERE id = "' . smartsql($pageID) . '"');


                    if (!$result) {
                      // EN: Redirect page
                      // CZ: Přesměrování stránky
                      envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=editident&sssp=s_idtv&id=' . $pageID . '&status=e');
                    } else {
                      // EN: Redirect page
                      // CZ: Přesměrování stránky
                      envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=editident&sssp=s_idtv&id=' . $pageID . '&status=s');
                    }

                  } else {
                    $errors['e'] = $tl['general_error']['generror'] . '<br>';
                    $errors      = $errors;
                  }

                }

              }

              // EN: Get all the data for the form
              // CZ: Získání všech dat pro formulář
              $ENVO_FORM_DATA = envo_get_data($pageID, $envotable3);

              // EN: Title and Description
              // CZ: Titulek a Popis
              $SECTION_TITLE = $tltt["tt_sec_title"]["ttt17"];
              $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd17"];

              // EN: Load the php template
              // CZ: Načtení php template (šablony)
              $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_editident_s_idtv.php';

            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=createident&status=ene');
            }

            break;
          case 's_idr':
            // EDIT S_ID R

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $pageID   = $page4;
            $envofield1 = 'name';

            if (is_numeric($pageID) && envo_row_exist($pageID, $envotable4)) {

              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // EN: Default Variable
                // CZ: Hlavní proměnné
                $defaults = $_POST;

                if (isset($_POST['btnSave'])) {

                  // EN: Check if s_id isn't empty
                  // CZ: Kontrola jestli existuje s_id
                  if (empty($defaults['envo_sidr'])) {
                    $errors['e1'] = $tl['general_error']['generror60'] . '<br>';
                  }

                  // EN: Check if s_id isn't empty
                  // CZ: Kontrola jestli existuje s_id
                  if (empty($defaults['envo_sidrname'])) {
                    $errors['e2'] = $tl['general_error']['generror60'] . '<br>';
                  }


                  // EN: All checks are OK without Errors - Start the form processing
                  // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
                  if (count($errors) == 0) {

                    /* EN: UPDATE DATA INTO DB
                     * CZ: AKTUALIZACE DAT DO DB
                     * ========================
                     * EN: Info about embedded columns
                     * id - primary key (autofill)
                     * ... other columns are inserted from the form
                     * ------------------------
                     * CZ: Info o vkládaných sloupcích
                     * id - primary key (automatické vyplnění)
                     * ... ostatní sloupce jsou vkládány z formuláře
                     * ========================
                     * EN: Conversion of values
                     * smartsql - secure method to insert form data into a MySQL DB
                     * ------------------
                     * CZ: Převod hodnot
                     * smartsql - secure method to insert form data into a MySQL DB
                    */
                    $result = $jakdb->query('UPDATE ' . $envotable4 . ' SET
                              sid = "' . smartsql($defaults['envo_sidr']) . '",
                              name = "' . smartsql($defaults['envo_sidrname']) . '",
                              time = NOW()
                              WHERE id = "' . smartsql($pageID) . '"');


                    if (!$result) {
                      // EN: Redirect page
                      // CZ: Přesměrování stránky
                      envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=editident&sssp=s_idr&id=' . $pageID . '&status=e');
                    } else {
                      // EN: Redirect page
                      // CZ: Přesměrování stránky
                      envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=editident&sssp=s_idr&id=' . $pageID . '&status=s');
                    }

                  } else {
                    $errors['e'] = $tl['general_error']['generror'] . '<br>';
                    $errors      = $errors;
                  }

                }

              }

              // EN: Get all the data for the form
              // CZ: Získání všech dat pro formulář
              $ENVO_FORM_DATA = envo_get_data($pageID, $envotable4);

              // EN: Title and Description
              // CZ: Titulek a Popis
              $SECTION_TITLE = $tltt["tt_sec_title"]["ttt18"];
              $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd18"];

              // EN: Load the php template
              // CZ: Načtení php template (šablony)
              $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_editident_s_idr.php';

            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=createident&status=ene');
            }

            break;
          case 's_ids':
            // EDITW S_ID S

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $pageID   = $page4;

            if (is_numeric($pageID) && envo_row_exist($pageID, $envotable5)) {

              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // EN: Default Variable
                // CZ: Hlavní proměnné
                $defaults = $_POST;

                if (isset($_POST['btnSave'])) {

                  // EN: Check if s_id isn't empty
                  // CZ: Kontrola jestli existuje s_id
                  if (empty($defaults['envo_sids'])) {
                    $errors['e1'] = $tl['general_error']['generror60'] . '<br>';
                  }

                  // EN: Check if s_id isn't empty
                  // CZ: Kontrola jestli existuje s_id
                  if (empty($defaults['envo_sidsname'])) {
                    $errors['e2'] = $tl['general_error']['generror60'] . '<br>';
                  }


                  // EN: All checks are OK without Errors - Start the form processing
                  // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
                  if (count($errors) == 0) {

                    /* EN: UPDATE DATA INTO DB
                     * CZ: AKTUALIZACE DAT DO DB
                     * ========================
                     * EN: Info about embedded columns
                     * id - primary key (autofill)
                     * ... other columns are inserted from the form
                     * ------------------------
                     * CZ: Info o vkládaných sloupcích
                     * id - primary key (automatické vyplnění)
                     * ... ostatní sloupce jsou vkládány z formuláře
                     * ========================
                     * EN: Conversion of values
                     * smartsql - secure method to insert form data into a MySQL DB
                     * ------------------
                     * CZ: Převod hodnot
                     * smartsql - secure method to insert form data into a MySQL DB
                    */
                    $result = $jakdb->query('UPDATE ' . $envotable5 . ' SET
                              sid = "' . smartsql($defaults['envo_sids']) . '",
                              name = "' . smartsql($defaults['envo_sidsname']) . '",
                              time = NOW()
                              WHERE id = "' . smartsql($pageID) . '"');


                    if (!$result) {
                      // EN: Redirect page
                      // CZ: Přesměrování stránky
                      envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=editident&sssp=s_ids&id=' . $pageID . '&status=e');
                    } else {
                      // EN: Redirect page
                      // CZ: Přesměrování stránky
                      envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=editident&sssp=s_ids&id=' . $pageID . '&status=s');
                    }

                  } else {
                    $errors['e'] = $tl['general_error']['generror'] . '<br>';
                    $errors      = $errors;
                  }

                }

              }

              // EN: Get all the data for the form
              // CZ: Získání všech dat pro formulář
              $ENVO_FORM_DATA = envo_get_data($pageID, $envotable5);

              // EN: Title and Description
              // CZ: Titulek a Popis
              $SECTION_TITLE = $tltt["tt_sec_title"]["ttt19"];
              $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd19"];

              // EN: Load the php template
              // CZ: Načtení php template (šablony)
              $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_editident_s_ids.php';

            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=createident&status=ene');
            }

            break;
          case 'on_id':
            // EDITW S_ID S

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $pageID   = $page4;

            if (is_numeric($pageID) && envo_row_exist($pageID, $envotable6)) {

              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // EN: Default Variable
                // CZ: Hlavní proměnné
                $defaults = $_POST;

                if (isset($_POST['btnSave'])) {

                  // EN: Check if s_id isn't empty
                  // CZ: Kontrola jestli existuje s_id
                  if (empty($defaults['envo_onid'])) {
                    $errors['e1'] = $tl['general_error']['generror60'] . '<br>';
                  }

                  // EN: Check if s_id isn't empty
                  // CZ: Kontrola jestli existuje s_id
                  if (empty($defaults['envo_onidcountry'])) {
                    $errors['e2'] = $tl['general_error']['generror60'] . '<br>';
                  }


                  // EN: All checks are OK without Errors - Start the form processing
                  // CZ: Všechny kontroly jsou v pořádku bez chyb - Spustit zpracování formuláře
                  if (count($errors) == 0) {

                    /* EN: UPDATE DATA INTO DB
                     * CZ: AKTUALIZACE DAT DO DB
                     * ========================
                     * EN: Info about embedded columns
                     * id - primary key (autofill)
                     * ... other columns are inserted from the form
                     * ------------------------
                     * CZ: Info o vkládaných sloupcích
                     * id - primary key (automatické vyplnění)
                     * ... ostatní sloupce jsou vkládány z formuláře
                     * ========================
                     * EN: Conversion of values
                     * smartsql - secure method to insert form data into a MySQL DB
                     * ------------------
                     * CZ: Převod hodnot
                     * smartsql - secure method to insert form data into a MySQL DB
                    */
                    $result = $jakdb->query('UPDATE ' . $envotable6 . ' SET
                              onid = "' . smartsql($defaults['envo_onid']) . '",
                              country = "' . smartsql($defaults['envo_onidcountry']) . '",
                              time = NOW()
                              WHERE id = "' . smartsql($pageID) . '"');


                    if (!$result) {
                      // EN: Redirect page
                      // CZ: Přesměrování stránky
                      envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=editident&sssp=on_id&id=' . $pageID . '&status=e');
                    } else {
                      // EN: Redirect page
                      // CZ: Přesměrování stránky
                      envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=editident&sssp=on_id&id=' . $pageID . '&status=s');
                    }

                  } else {
                    $errors['e'] = $tl['general_error']['generror'] . '<br>';
                    $errors      = $errors;
                  }

                }

              }

              // EN: Get all the data for the form
              // CZ: Získání všech dat pro formulář
              $ENVO_FORM_DATA = envo_get_data($pageID, $envotable6);

              // EN: Title and Description
              // CZ: Titulek a Popis
              $SECTION_TITLE = $tltt["tt_sec_title"]["ttt15"];
              $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd15"];

              // EN: Load the php template
              // CZ: Načtení php template (šablony)
              $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_editident_onid.php';

            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&ssp=createident&status=ene');
            }

            break;
          case 'n_id':

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tltt["tt_sec_title"]["ttt16"];
            $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd16"];

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_createident_nid.php';

            break;
          default:

        }

        break;
      default:
        // LIST OF IDENTIFIERS

        switch ($page2) {
          case 'deletesidtv':
            // DELETE SID TV

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $pageID = $page3;

            if (is_numeric($pageID) && envo_row_exist($pageID, $envotable3)) {

              $result = $jakdb->query('DELETE FROM ' . $envotable3 . ' WHERE id = "' . smartsql($pageID) . '"');

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - chybné
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - úspěšné
                /*
                NOTIFIKACE:
                'status=s'    - Záznam úspěšně uložen
                'status1=s1'  - Záznam úspěšně odstraněn
                */
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&status=s&status1=s1');
              }

            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&status=ene');
            }

            break;
          case 'deletesidr':
            // DELETE SID R

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $pageID = $page3;

            if (is_numeric($pageID) && envo_row_exist($pageID, $envotable4)) {

              $result = $jakdb->query('DELETE FROM ' . $envotable4 . ' WHERE id = "' . smartsql($pageID) . '"');

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - chybné
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - úspěšné
                /*
                NOTIFIKACE:
                'status=s'    - Záznam úspěšně uložen
                'status1=s1'  - Záznam úspěšně odstraněn
                */
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&status=s&status1=s1');
              }

            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&status=ene');
            }

            break;
          case 'deletesids':
            // DELETE SID S

            // EN: Default Variable
            // CZ: Hlavní proměnné
            $pageID = $page3;

            if (is_numeric($pageID) && envo_row_exist($pageID, $envotable5)) {

              $result = $jakdb->query('DELETE FROM ' . $envotable5 . ' WHERE id = "' . smartsql($pageID) . '"');

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - chybné
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky s notifikací - úspěšné
                /*
                NOTIFIKACE:
                'status=s'    - Záznam úspěšně uložen
                'status1=s1'  - Záznam úspěšně odstraněn
                */
                envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&status=s&status1=s1');
              }

            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=identifiers&status=ene');
            }

            break;
          default:

            // EN: Getting count of identifiers
            // CZ: Získání počtu identifikátorů
            $result = $jakdb->query('SELECT COUNT(*) as totalSidTv FROM ' . $envotable3);
            $row    = $result->fetch_assoc();

            $result1 = $jakdb->query('SELECT COUNT(*) as totalSidR FROM ' . $envotable4);
            $row1    = $result1->fetch_assoc();

            $result2 = $jakdb->query('SELECT COUNT(*) as totalSidS FROM ' . $envotable5);
            $row2    = $result2->fetch_assoc();

            $result3 = $jakdb->query('SELECT COUNT(*) as totalOnid FROM ' . $envotable6);
            $row3    = $result3->fetch_assoc();

            $result4 = $jakdb->query('SELECT COUNT(*) as totalNid FROM ' . $envotable7);
            $row4    = $result4->fetch_assoc();

            $JAK_IDENT_ALL['sidtv'] = $row['totalSidTv'];
            $JAK_IDENT_ALL['sidr']  = $row1['totalSidR'];
            $JAK_IDENT_ALL['sids']  = $row2['totalSidS'];
            $JAK_IDENT_ALL['onid']  = $row3['totalOnid'];
            $JAK_IDENT_ALL['nid']   = $row4['totalNid'];

            // EN: Getting all the data about S_ID TV
            // CZ: Získání všech dat o S_ID TV
            $JAK_SIDTV_ALL = envo_get_tvtower('', $envotable3);

            // EN: Getting all the data about S_ID R
            // CZ: Získání všech dat o S_ID R
            $JAK_SIDR_ALL = envo_get_tvtower('', $envotable4);

            // EN: Getting all the data about S_ID S
            // CZ: Získání všech dat o S_ID S
            $JAK_SIDS_ALL = envo_get_tvtower('', $envotable5);

            // EN: Getting all the data about ON_ID
            // CZ: Získání všech dat o ON_ID
            $JAK_ONID_ALL = envo_get_tvtower('', $envotable6);

            // EN: Getting all the data about N_ID
            // CZ: Získání všech dat o N_ID
            $JAK_NID_ALL = envo_get_tvtower('', $envotable7);

            // EN: Title and Description
            // CZ: Titulek a Popis
            $SECTION_TITLE = $tltt["tt_sec_title"]["ttt11"];
            $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd11"];

            // EN: Load the php template
            // CZ: Načtení php template (šablony)
            $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_showident.php';
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
		    	WHEN "tvtowertitle" THEN "' . smartsql($defaults['envo_title']) . '"
		    	WHEN "tvtowerwizardtitle" THEN "' . smartsql($defaults['envo_title_wizard']) . '"
		    	WHEN "tvtowerlisttitle" THEN "' . smartsql($defaults['envo_title_list']) . '"
		    END
				WHERE varname IN ("tvtowertitle", "tvtowerwizardtitle", "tvtowerlisttitle")');

        // EN: Save language file
        // CZ: Uložení jazykového souboru
        $openfedit = fopen($defaults['jak_file'], "w+");
        $datasave  = $defaults['jak_filecontent'];
        $datasave  = preg_replace('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
        $datasave  = stripslashes($datasave);
        if (fwrite($openfedit, $datasave)) {
          $JAK_FILE_SUCCESS = 1;
        }

        fclose($openfedit);

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=setting&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=tv-tower&sp=setting&status=s');
        }
      } else {
        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // EN: Open language file for editing
    // CZ: Otevření jazykového souboru pro editaci
    if (file_exists($langfile)) {
      $openfile        = fopen($langfile, 'r');
      $filecontent     = @fread($openfile, filesize($langfile));
      $displaycontent  = preg_replace('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
      $JAK_FILECONTENT = $displaycontent;
      $JAK_FILEURL     = $langfile;

      fclose($openfile);
    }

    // EN: Import important settings for the template from the DB
    // CZ: Importuj důležité nastavení pro šablonu z DB
    $JAK_SETTING = envo_get_setting('tvtower');

    // EN: Import important settings for the template from the DB (only VALUE)
    // CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
    $JAK_SETTING_VAL = envo_get_setting_val('tvtower');

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tltt["tt_sec_title"]["ttt"];
    $SECTION_DESC  = $tltt["tt_sec_desc"]["ttd"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'tt_setting.php';

    break;
  default:

}

?>