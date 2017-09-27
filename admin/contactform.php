<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$ENVO_MODULEM) envo_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'contactform';
$envotable1 = DB_PREFIX . 'contactoptions';

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'newcontact':

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
          envo_redirect(BASE_URL . 'index.php?p=contactform&sp=edit&ssp=' . $rowid . '&status=s');
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
  default:

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

        $lockuser = $defaults['envo_delete_contact'];

        for ($i = 0; $i < count($lockuser); $i++) {
          $locked = $lockuser[$i];
          $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($locked) . '"');
          $envodb->query('DELETE FROM ' . $envotable1 . ' WHERE formid = "' . smartsql($locked) . '"');

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

    switch ($page1) {
      case 'lock':

        $result = $envodb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($page2) . '"');

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
        if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

          $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');

          $envodb->query('DELETE FROM ' . $envotable1 . ' WHERE formid = "' . smartsql($page2) . '"');

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
      case 'edit':

        if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

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
                        time = "' . time() . '" WHERE id = "' . smartsql($page2) . '"');

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
																WHERE formid = "' . smartsql($page2) . '" AND id = "' . $defaults['envo_optionid'][$i] . '"');
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
																	formid = ' . smartsql($page2) . ',
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
                envo_redirect(BASE_URL . 'index.php?p=contactform&sp=edit&ssp=' . $page2 . '&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=contactform&sp=edit&ssp=' . $page2 . '&status=s');
              }

            } else {
              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }

          $ENVO_FORM_DATA         = envo_get_data($page2, $envotable);
          $ENVO_CONTACTOPTION_ALL = envo_get_contact_options($envotable1, $page2);

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
      default:

        $getTotal = envo_get_total($envotable, '', '', '');
        if ($getTotal != 0) {
          // Paginator
          $pages                 = new ENVO_paginator;
          $pages->items_total    = $getTotal;
          $pages->mid_range      = $jkv["adminpagemid"];
          $pages->items_per_page = $jkv["adminpageitem"];
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
}
?>