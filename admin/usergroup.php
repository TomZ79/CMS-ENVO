<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$ENVO_MODULES) envo_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'usergroup';
$envotable1 = DB_PREFIX . 'user';
$envofield  = 'username';

// Reset vars
$insert = "";

// Important template stuff
$ENVO_USERGROUP_ALL = envo_get_usergroup_all('usergroup');

// EN: Get all the php Hook by name of Hook for the template
// CZ: Načtení všech php dat z Hook podle jména Hook pro šablonu
$ENVO_HOOK_ADMIN_USERGROUP_EDIT = $envohooks->EnvoGethook("tpl_admin_usergroup_edit");

// EN: Get all the php Hook by name of Hook for the new template
// CZ: Načtení všech php dat z Hook podle jména Hook pro novou šablonu
$ENVO_HOOK_ADMIN_USERGROUP = $envohooks->EnvoGethook("tpl_admin_usergroup");

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'newgroup':

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (isset($defaults['create'])) {

        $ENVO_FORM_DATA = envo_get_data($defaults['envo_groupbase'], $envotable);

        // Get the data for the editor light
        $_REQUEST["envo_lcontent"] = $ENVO_FORM_DATA["description"];

      }

      if (isset($_POST['btnSave'])) {
        // EN: If button "Save Changes" clicked
        // CZ: Pokud bylo stisknuto tlačítko "Uložit"

        if (empty($defaults['envo_name'])) {
          $errors['e1'] = $tl['general_error']['generror4'] . '<br>';
        }

        if (envo_field_not_exist($defaults['envo_name'], $envotable, "name")) {
          $errors['e2'] = str_replace("%s", $defaults['envo_name'], $tl['general_error']['generror5']) . '<br>';
        }

        if (count($errors) == 0) {

          // EN: Get all the php Hook by name of Hook for 'index top'
          // CZ: Načtení všech php dat z Hook podle jména Hook pro 'index top'
          $getinserthook = $envohooks->EnvoGethook("php_admin_usergroup");
          if ($getinserthook)
            foreach ($getinserthook as $it) {
              eval($it['phpcode']);
            }

          // Tag Settings
          if (isset($defaults['envo_tags'])) $insert .= 'tags = "' . smartsql($defaults['envo_tags']) . '"';

          /* EN: Convert value
           * smartsql - secure method to insert form data into a MySQL DB
           * ------------------
           * CZ: Převod hodnot
           * smartsql - secure method to insert form data into a MySQL DB
          */
          $result = $envodb->query('INSERT INTO ' . $envotable . ' SET
                    name = "' . smartsql($defaults['envo_name']) . '",
                    description = "' . smartsql($defaults['envo_lcontent']) . '",
                    advsearch = "' . smartsql($defaults['envo_advs']) . '",
                    ' . $insert );

          $rowid = $envodb->envo_last_id();

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=usergroup&sp=newgroup&status=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=usergroup&sp=edit&ssp=' . $rowid . '&status=s');
          }
        } else {

          $errors['e'] = $tl['general_error']['generror'] . '<br>';
          $errors      = $errors;
        }

      }
    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["userg_sec_title"]["usergt3"];
    $SECTION_DESC  = $tl["userg_sec_desc"]["usergd3"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'newusergroup.php';

    break;
  default:

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envo_delete_usergroup'])) {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (isset($defaults['delete'])) {

        $lockuser   = $defaults['envo_delete_usergroup'];
        $grouparray = explode(',', '1,2,3,4');

        for ($i = 0; $i < count($lockuser); $i++) {
          $locked = $lockuser[$i];

          if (!in_array($locked, $grouparray)) {
            $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($locked) . '"');
          }
        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky s notifikací - chybné
          envo_redirect(BASE_URL . 'index.php?p=usergroup&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky s notifikací - úspěšné
          /*
          NOTIFIKACE:
          'status=s'    - Záznam úspěšně uložen
          'status1=s1'  - Záznam úspěšně odstraněn
          */
          envo_redirect(BASE_URL . 'index.php?p=usergroup&status=s&status1=s1');
        }

      }
    }

    switch ($page1) {
      case 'user':

        if (envo_row_exist($page2, $envotable)) {
          $getTotal = envo_get_total($envotable1, $page2, 'usergroupid', '');
          if ($getTotal != 0) {
            // Paginator
            $pages                 = new ENVO_paginator;
            $pages->items_total    = $getTotal;
            $pages->mid_range      = $setting["adminpagemid"];
            $pages->items_per_page = $setting["adminpageitem"];
            $pages->envo_get_page   = $page3;
            $pages->envo_where      = 'index.php?p=usergroup&sp=user&ssp=' . $page2;
            $pages->paginate();
            $ENVO_PAGINATE = $pages->display_pages();
          }
          $ENVO_USER_ALL = envo_get_user_all('user', $pages->limit, $page2);

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tl["userg_sec_title"]["usergt2"];
          $SECTION_DESC  = $tl["userg_sec_desc"]["usergd2"];

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $template = 'user.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=usergroup&status=ene');
        }
        break;
      case 'delete':
        if ($page2 > 4) {

          $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            envo_redirect(BASE_URL . 'index.php?p=usergroup&status=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - úspěšné
            /*
            NOTIFIKACE:
            'status=s'    - Záznam úspěšně uložen
            'status1=s1'  - Záznam úspěšně odstraněn
            */
            envo_redirect(BASE_URL . 'index.php?p=usergroup&status=s&status1=s1');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=usergroup&status=edn');
        }

        break;
      case 'edit':

        if (envo_row_exist($page2, $envotable)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            if (empty($defaults['envo_name'])) {
              $errors['e1'] = $tl['general_error']['generror4'] . '<br>';
            }

            if (count($errors) == 0) {

              // EN: Get all the php Hook by name of Hook for 'index top'
              // CZ: Načtení všech php dat z Hook podle jména Hook pro 'index top'
              $getinserthook = $envohooks->EnvoGethook("php_admin_usergroup");
              if ($getinserthook)
                foreach ($getinserthook as $it) {
                  eval($it['phpcode']);
                }

              // Tag Settings
              if (isset($defaults['envo_tags'])) $insert .= 'tags = "' . $defaults['envo_tags'] . '"';

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
              */
              $result = $envodb->query('UPDATE ' . $envotable . ' SET
                          name = "' . smartsql($defaults['envo_name']) . '",
                          description = "' . smartsql($defaults['envo_lcontent']) . '",
                          advsearch = "' . smartsql($defaults['envo_advs']) . '",
                          ' . $insert . '
                        WHERE id = "' . smartsql($page2) . '"');

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=usergroup&sp=edit&ssp=' . $page2 . '&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=usergroup&sp=edit&ssp=' . $page2 . '&status=s');
              }
            } else {

              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }

          $ENVO_FORM_DATA            = envo_get_data($page2, $envotable);
          $ENVO_FORM_DATA["content"] = $ENVO_FORM_DATA["description"];

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tl["userg_sec_title"]["usergt1"];
          $SECTION_DESC  = $tl["userg_sec_desc"]["usergd1"];

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $template = 'editusergroup.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=usergroup&status=ene');
        }

        break;
      default:

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["userg_sec_title"]["usergt"];
        $SECTION_DESC  = $tl["userg_sec_desc"]["usergd"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $template = 'usergroup.php';

    }
}
?>