<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$ENVO_MODULEM) envo_redirect(BASE_URL);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'contactform';
$envotable1 = DB_PREFIX . 'contactoptions';

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'newcontact':
    // ADD NEW CONTACT FORM TO DB

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (empty($defaults['envo_title'])) {
        $errors['e1'] = $tl['cf_error']['cferror'] . '<br>';
      }

      if (empty($defaults['envo_lcontent'])) {
        $errors['e2'] = $tl['cf_error']['cferror1'] . '<br>';
      }

      if (count($errors) == 0) {

        /* EN: Convert value
         * smartsql - secure method to insert form data into a MySQL DB
         * ------------------
         * CZ: Převod hodnot
         * smartsql - secure method to insert form data into a MySQL DB
        */
        $result = $envodb->query('INSERT INTO ' . $envotable . ' SET
                  title = "' . smartsql($defaults['envo_title']) . '",
                  content = "' . smartsql($defaults['envo_lcontent']) . '",
                  email = "' . smartsql($defaults['envo_email']) . '",
                  showtitle = "' . smartsql($defaults['envo_showtitle']) . '",
                  time = NOW()');

        $rowid = $envodb->envo_last_id();

        $countoption = $defaults['envo_option'];

        for ($i = 0; $i < count($countoption); $i++) {
          $name = $countoption[$i];

          if (!empty($name)) {

            if ($defaults['envo_optiontype'][$i] >= 3 && $defaults['envo_optionmandatory'][$i] > 0) {
              $sqlmand = 1;
            } else {
              $sqlmand = $defaults['envo_optionmandatory'][$i];
            }

            $envodb->query('INSERT INTO ' . $envotable1 . ' SET
														formid = "' . smartsql($rowid) . '",
														name = "' . smartsql($name) . '",
														typeid = "' . smartsql($defaults['envo_optiontype'][$i]) . '",
														options = "' . smartsql(trim($defaults['envo_options'][$i])) . '",
														mandatory = "' . smartsql($sqlmand) . '",
														forder = "' . smartsql($defaults['envo_optionsort'][$i]) . '"');

          }
        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=contactform&sp=newcontact&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=contactform&sp=editcontact&id=' . $rowid . '&status=s');
        }
      } else {

        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["cf_sec_title"]["cft1"];
    $SECTION_DESC  = $tl["cf_sec_desc"]["cfd1"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'newcontactform.php';

    break;
  case 'editcontact':
    // EDIT CONTACT FORM

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $pageID = $page2;

    if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // EN: Default Variable
        // CZ: Hlavní proměnné
        $defaults = $_POST;

        // Delete the options
        if (!empty($defaults['envo_sod'])) {
          $odel = $defaults['envo_sod'];

          for ($i = 0; $i < count($odel); $i++) {
            $optiondel = $odel[$i];

            $envodb->query('DELETE FROM ' . $envotable1 . ' WHERE id = "' . $optiondel . '"');
          }
        }

        // Check the form
        if (empty($defaults['envo_title'])) {
          $errors['e1'] = $tl['cf_error']['cferror'] . '<br>';
        }

        if (empty($defaults['envo_lcontent'])) {
          $errors['e2'] = $tl['cf_error']['cferror1'] . '<br>';
        }

        // No errors keep going with the sql queries
        if (count($errors) == 0) {

          /* EN: Convert value
           * smartsql - secure method to insert form data into a MySQL DB
           * ------------------
           * CZ: Převod hodnot
           * smartsql - secure method to insert form data into a MySQL DB
          */
          $result = $envodb->query('UPDATE ' . $envotable . ' SET
                        title = "' . smartsql($defaults['envo_title']) . '",
                        content = "' . smartsql($defaults['envo_lcontent']) . '",
                        email = "' . smartsql($defaults['envo_email']) . '",
                        showtitle = "' . smartsql($defaults['envo_showtitle']) . '",
                        time = "' . time() . '" WHERE id = "' . smartsql($pageID) . '"');

          // Edit options
          $countoption_old = $defaults['envo_option_old'];

          for ($i = 0; $i < count($countoption_old); $i++) {
            $name_old = $countoption_old[$i];

            if ($defaults['envo_optiontype_old'][$i] >= 3 && $defaults['envo_optionmandatory_old'][$i] > 0) {
              $sqlmand = 1;
            } else {
              $sqlmand = $defaults['envo_optionmandatory_old'][$i];
            }

            $envodb->query('UPDATE ' . $envotable1 . ' SET
																name = "' . smartsql($name_old) . '",
																typeid = "' . smartsql($defaults['envo_optiontype_old'][$i]) . '",
																options = "' . smartsql(trim($defaults['envo_options_old'][$i])) . '",
																mandatory = "' . smartsql($sqlmand) . '",
																forder = "' . smartsql($defaults['envo_optionsort_old'][$i]) . '"
																WHERE formid = "' . smartsql($pageID) . '" AND id = "' . $defaults['envo_optionid'][$i] . '"');
          }

          /* Write new options */
          $countoption = $defaults['envo_option'];

          for ($i = 0; $i < count($countoption); $i++) {
            $name = $countoption[$i];

            if (!empty($name)) {

              if (!empty($defaults['envo_options'][$i]) && $defaults['envo_optiontype'][$i] >= 3) {
                $sqloptions = smartsql(trim($defaults['envo_options'][$i]));
              } else {
                $sqloptions = '';
              }

              if ($defaults['envo_optiontype'][$i] >= 3 && $defaults['envo_optionmandatory'][$i] > 0) {
                $sqlmand = 1;
              } else {
                $sqlmand = $defaults['envo_optionmandatory'][$i];
              }

              $envodb->query('INSERT INTO ' . $envotable1 . ' SET
																	formid = ' . smartsql($pageID) . ',
																	name = "' . smartsql($name) . '",
																	typeid = "' . smartsql($defaults['envo_optiontype'][$i]) . '",
																	options = "' . smartsql($sqloptions) . '",
																	mandatory = "' . smartsql($sqlmand) . '",
																	forder = "' . smartsql($defaults['envo_optionsort'][$i]) . '"');
            }
          }

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=contactform&sp=editcontact&id=' . $pageID . '&status=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=contactform&sp=editcontact&id=' . $pageID . '&status=s');
          }

        } else {
          $errors['e'] = $tl['general_error']['generror'] . '<br>';
          $errors      = $errors;
        }
      }

      $ENVO_FORM_DATA         = envo_get_data($pageID, $envotable);
      $ENVO_CONTACTOPTION_ALL = envo_get_contact_options($envotable1, $pageID);

      // EN: Title and Description
      // CZ: Titulek a Popis
      $SECTION_TITLE = $tl["cf_sec_title"]["cft2"];
      $SECTION_DESC  = $tl["cf_sec_desc"]["cfd2"];

      // EN: Load the php template
      // CZ: Načtení php template (šablony)
      $template = 'editcontactform.php';

    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=contactform&status=ene');
    }
    break;
  case 'lock':
    // LIST OF CONTACT FORM - LOCK CONTACT FORM IN DB

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $pageID = $page2;

    $result = $envodb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($pageID) . '"');

    if (!$result) {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=contactform&status=e');
    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=contactform&status=s');
    }

    break;
  case 'delete':
    // LIST OF CONTACT FORM - DELETE CONTACT FORM FROM DB

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $pageID = $page2;

    if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

      $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '"');

      $envodb->query('DELETE FROM ' . $envotable1 . ' WHERE formid = "' . smartsql($pageID) . '"');

      if (!$result) {
        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL . 'index.php?p=contactform&status=w');
      } else {
        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL . 'index.php?p=contactform&status=s');
      }

    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=contactform&status=ene');
    }
    break;
  default:
    // LIST OF CONTACT FORM

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($page1)) {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (isset($defaults['lock'])) {

        $lockuser = $defaults['envo_delete_contact'];

        for ($i = 0; $i < count($lockuser); $i++) {
          $locked = $lockuser[$i];
          $result = $envodb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($locked) . '"');
        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=contactform&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=contactform&status=s');
        }

      }

      if (isset($defaults['delete'])) {

        $deleteuser = $defaults['envo_delete_contact'];

        for ($i = 0; $i < count($deleteuser); $i++) {
          $deleted = $deleteuser[$i];
          $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($deleted) . '"');
          $envodb->query('DELETE FROM ' . $envotable1 . ' WHERE formid = "' . smartsql($deleted) . '"');

        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=contactform&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=contactform&status=s');
        }

      }

    }

    $getTotal = envo_get_total($envotable, '', '', '');
    if ($getTotal != 0) {
      // Paginator
      $pages                 = new ENVO_paginator;
      $pages->items_total    = $getTotal;
      $pages->mid_range      = $setting["adminpagemid"];
      $pages->items_per_page = $setting["adminpageitem"];
      $pages->envo_get_page   = $pajs - live - chat - boardge1;
      $pages->envo_where      = 'index.php?p=page';
      $pages->paginate();
      $ENVO_PAGINATE = $pages->display_pages();
    }

    // Get all contact forms
    $ENVO_CONTACT_ALL = envo_get_page_info($envotable, $pages->limit);

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["cf_sec_title"]["cft"];
    $SECTION_DESC  = $tl["cf_sec_desc"]["cfd"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'contactform.php';
}
?>