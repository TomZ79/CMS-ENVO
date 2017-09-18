<?php

// EN: /Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$JAK_MODULEM) envo_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'categories';
$envotable1 = DB_PREFIX . 'pages';

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'newcat':

    // Additional DB Information
    $jakfield = 'varname';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (empty($defaults['jak_name'])) {
        $errors['e1'] = $tl['general_error']['generror4'] . '<br>';
      }

      if (envo_field_not_exist($defaults['jak_varname'], $envotable, $jakfield) || envo_varname_blocked($defaults['jak_varname'])) {
        $errors['e2'] = $tl['general_error']['generror21'] . '<br>';
      }

      if (empty($defaults['jak_varname'])) {
        $errors['e3'] = $tl['general_error']['generror22'] . '<br>';
      }

      if (!empty($defaults['jak_varname']) && !preg_match('/^([a-z-_0-9]||[-_])+$/', $defaults['jak_varname'])) {
        $errors['e4'] = $tl['general_error']['generror23'] . '<br>';
      }

      if (count($errors) == 0) {

        if (!isset($defaults['jak_menu'])) {
          $menu = 0;
        } else {
          $menu = $defaults['jak_menu'];
        }
        if (!isset($defaults['jak_footer'])) {
          $footer = 0;
        } else {
          $footer = $defaults['jak_footer'];
        }

        if (!isset($defaults['jak_permission'])) {
          $permission = 0;
        } elseif (in_array(0, $defaults['jak_permission'])) {
          $permission = 0;
        } else {
          $permission = join(',', $defaults['jak_permission']);
        }

        $catimg = '';
        if (!empty($defaults['jak_img'])) {
          $catimg = 'catimg = "' . smartsql($defaults['jak_img']) . '",';
        }

        /* EN: Convert value
         * smartsql - secure method to insert form data into a MySQL DB
         * ------------------
         * CZ: Převod hodnot
         * smartsql - secure method to insert form data into a MySQL DB
        */
        $result = $jakdb->query('INSERT INTO ' . $envotable . ' SET
                  name = "' . smartsql($defaults['jak_name']) . '",
                  varname = "' . smartsql($defaults['jak_varname']) . '",
                  exturl = "' . smartsql($defaults['jak_url']) . '",
                  content = "' . smartsql($defaults['jak_lcontent']) . '",
                  metadesc = "' . smartsql($defaults['jak_lcontent_meta_desc']) . '",
                  metakey = "' . smartsql($defaults['jak_lcontent_meta_key']) . '",
                  showmenu = "' . smartsql($menu) . '",
                  showfooter = "' . smartsql($footer) . '",
                  ' . $catimg . '
                  permission = "' . smartsql($permission) . '",
                  catorder = 2');

        $rowid = $jakdb->jak_last_id();

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=categories&sp=newcat&status=e');;
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=categories&sp=edit&ssp=' . $rowid . '&status=s');
        }
      } else {

        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // Get all usergroup's
    $JAK_USERGROUP = envo_get_usergroup_all('usergroup');

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["cat_sec_title"]["catt1"];
    $SECTION_DESC  = $tl["cat_sec_desc"]["catd1"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'newcat.php';

    break;
  default:

    // Additional DB Information
    $jakfield  = 'catparent';
    $jakfield1 = 'varname';
    $jakfield2 = 'catparent2';

    switch ($page1) {
      case 'delete':

        if (envo_row_exist($page2, $envotable) && $page2 != 1) {

          // EN: If exist page for category, move page to Archiv
          // CZ: Pokud existuje stránka ke kategorii, přesuneme stránku do Archivu
          $resultpages = $jakdb->query('SELECT id FROM ' . $envotable1 . ' WHERE catid = "' . smartsql($page2) . '" LIMIT 1');
          $rowpages    = $resultpages->fetch_assoc();
          if ($rowpages) {
            $resultpages = $jakdb->query('UPDATE ' . $envotable1 . ' SET catid="0" WHERE id = "' . $rowpages['id'] . '"');
          }

          //
          $result = $jakdb->query('SELECT catparent, pluginid FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '" LIMIT 1');
          $row    = $result->fetch_assoc();

          if ($row['pluginid'] == 0) {

            // EN: Delete category from DB
            // CZ: Smažeme kategorii v DB
            $result = $jakdb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky s notifikací - chybné
              envo_redirect(BASE_URL . 'index.php?p=categories&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky s notifikací - úspěšné
              /*
              NOTIFIKACE:
              'status=s'    - Záznam úspěšně uložen
              'status1=s1'  - Záznam úspěšně odstraněn
              */
              envo_redirect(BASE_URL . 'index.php?p=categories&status=s&status1=s1');
            }

          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=categories&status=epc');
          }

        } elseif ($page1 == 'delete' && $page2 == 1) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=categories&status=ech');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=error&status=ene');
        }

        break;
      case 'edit':

        if (envo_row_exist($page2, $envotable)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            if (empty($defaults['jak_name'])) {
              $errors['e1'] = $tl['general_error']['generror4'] . '<br>';
            }

            if (envo_field_not_exist_id($defaults['jak_varname'], $page2, $envotable, $jakfield1) || envo_varname_blocked($defaults['jak_varname'])) {
              $errors['e2'] = $tl['general_error']['generror21'] . '<br>';
            }

            if (empty($defaults['jak_varname'])) {
              $errors['e3'] = $tl['general_error']['generror22'] . '<br>';
            }

            if (!empty($defaults['jak_varname']) && !preg_match('/^([a-z-_0-9]||[-_])+$/', $defaults['jak_varname'])) {
              $errors['e4'] = $tl['general_error']['generror23'] . '<br>';
            }

            if (count($errors) == 0) {

              if (!isset($defaults['jak_permission'])) {
                $permission = 0;
              } elseif (in_array(0, $defaults['jak_permission'])) {
                $permission = 0;
              } else {
                $permission = join(',', $defaults['jak_permission']);
              }

              if (!empty($defaults['jak_img'])) {
                $insert .= 'catimg = "' . smartsql($defaults['jak_img']) . '",';
              } else {
                $insert .= 'catimg = NULL,';
              }

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
              */
              $result = $jakdb->query('UPDATE ' . $envotable . ' SET
                        name = "' . smartsql($defaults['jak_name']) . '",
                        varname = "' . smartsql($defaults['jak_varname']) . '",
                        exturl = "' . smartsql($defaults['jak_url']) . '",
                        content = "' . smartsql($defaults['jak_lcontent']) . '",
                        metadesc = "' . smartsql($defaults['jak_lcontent_meta_desc']) . '",
                        metakey = "' . smartsql($defaults['jak_lcontent_meta_key']) . '",
                        showmenu = "' . smartsql($defaults['jak_menu']) . '",
                        showfooter = "' . smartsql($defaults['jak_footer']) . '",
                        ' . $insert . '
                        permission = "' . smartsql($permission) . '"
                        WHERE id = "' . smartsql($page2) . '"');

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=categories&sp=edit&ssp=' . $page2 . '&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=categories&sp=edit&ssp=' . $page2 . '&status=s');
              }
            } else {
              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }

          // Get the data
          $ENVO_FORM_DATA = envo_get_data($page2, $envotable);

          // Get all usergroup's
          $JAK_USERGROUP = envo_get_usergroup_all('usergroup');

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tl["cat_sec_title"]["catt2"];
          $SECTION_DESC  = $tl["cat_sec_desc"]["catd2"];

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $template = 'editcat.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=error&sp=cat-not-exist');
        }

        break;
      default:

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $count = 1;

          if (isset($_POST['menuItem'])) foreach ($_POST['menuItem'] as $k => $v) {

            if (!is_numeric($v)) $v = 0;

            $result = $jakdb->query('UPDATE ' . DB_PREFIX . 'categories SET catparent = "' . smartsql($v) . '", catorder = "' . smartsql($count) . '" WHERE id = "' . smartsql($k) . '"');

            $count++;

          }

          if ($result) {
            /* Outputtng the success messages */
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
              header('Cache-Control: no-cache');
              die(json_encode(array('status' => 'success', 'html' => $tl["notification"]["n7"])));
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              $_SESSION["successmsg"] = $tl["notification"]["n7"];
              envo_redirect(BASE_URL . 'index.php?p=categories');
            }
          } else {
            /* Outputtng the success messages */
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
              header('Cache-Control: no-cache');
              die(json_encode(array('status' => 'error', 'html'=> $tl["general_error"]["generror1"])));
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              $_SESSION["errormsg"] = $tl["general_error"]["generror1"];
              envo_redirect(BASE_URL . 'index.php?p=categories');
            }
          }
        }

        // Get the menu
        $result = $jakdb->query('SELECT * FROM ' . $envotable . ' WHERE showmenu = 1 OR (showmenu = 1 && showfooter = 1) ORDER BY catparent, catorder, name');
        // Create a multidimensional array to conatin a list of items and parents
        $mheader = array(
          'items'   => array(),
          'parents' => array()
        );
        // Builds the array lists with data from the menu table
        while ($items = $result->fetch_assoc()) {
          // Creates entry into items array with current menu item id ie. $menu['items'][1]
          $mheader['items'][$items['id']] = $items;
          // Creates entry into parents array. Parents array contains a list of all items with children
          $mheader['parents'][$items['catparent']][] = $items['id'];
        }

        // EN: Check if some categories exist
        // CZ: Kontrola jestli existuje nějaká kategorie
        if (!empty($mheader['items'])) {
          $JAK_CAT1_EXIST = '1';
        }

        // Get the menu
        $result = $jakdb->query('SELECT * FROM ' . $envotable . ' WHERE showfooter = 1 ORDER BY catparent, catorder, name');
        // Create a multidimensional array to conatin a list of items and parents
        $mfooter = array(
          'items'   => array(),
          'parents' => array()
        );
        // Builds the array lists with data from the menu table
        while ($items = $result->fetch_assoc()) {
          // Creates entry into items array with current menu item id ie. $menu['items'][1]
          $mfooter['items'][$items['id']] = $items;
          // Creates entry into parents array. Parents array contains a list of all items with children
          $mfooter['parents'][$items['catparent']][] = $items['id'];
        }

        // EN: Check if some categories exist
        // CZ: Kontrola jestli existuje nějaká kategorie
        if (!empty($mfooter['items'])) {
          $JAK_CAT2_EXIST = '1';
        }

        // Get the menu
        $ucatblank = "";
        $result    = $jakdb->query('SELECT * FROM ' . $envotable . ' WHERE showmenu = 0 && showfooter = 0 ORDER BY catparent, catorder, name');
        while ($catblank = $result->fetch_assoc()) {

          // Creates entry into items array with current menu item id ie. $menu['items'][1]
          $catnotvisible['items'][$catblank['id']] = $catblank;
          // Creates entry into parents array. Parents array contains a list of all items with children
          $catnotvisible['parents'][$catblank['catparent']][] = $catblank['id'];

          $ucatblank .= '<li class="list-group-item jakcat">
					<div>
					<div class="text"><span class="textid">#' . $catblank["id"] . '</span><a href="index.php?p=categories&amp;sp=edit&amp;ssp=' . $catblank["id"] . '">' . $catblank["name"] . '</a></div>
					<div class="actions">
						' . ($catblank["pluginid"] == 0 && $catblank["pageid"] == 0 && $catblank["exturl"] == '' ? '<a class="btn btn-default btn-xs" href="index.php?p=page&amp;sp=newpage&amp;ssp=' . $catblank["id"] . '" data-toggle="tooltip" data-placement="bottom" title="' . $tl["icons"]["i11"] . '"><i class="fa fa-sticky-note-o"></i></a>' : '') . '
						' . ($catblank["pluginid"] == 0 && $catblank["pageid"] >= 1 && $catblank["exturl"] == '' ? '<a class="btn btn-default btn-xs" href="index.php?p=page&amp;sp=edit&amp;ssp=' . $catblank["pageid"] . '" data-toggle="tooltip" data-placement="bottom" title="' . $tl["icons"]["i10"] . '"><i class="fa fa-pencil"></i></a>' : '') . '
						' . ($catblank["pluginid"] > 0 && $catblank["exturl"] == '' ? '<a class="btn btn-info btn-xs" href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="' . $tl["icons"]["i8"] . '"><i class="fa fa-eyedropper"></i></a>' : '') . '
						' . ($catblank["exturl"] != '' ? '<i class="fa fa-link"></i>' : '') . '
						
						<a class="btn btn-default btn-xs" href="index.php?p=categories&amp;sp=edit&amp;ssp=' . $catblank["id"] . '" data-toggle="tooltip" data-placement="bottom" title="' . $tl["icons"]["i2"] . '"><i class="fa fa-edit"></i></a>
						' . ($catblank["pluginid"] == 0 && $catblank["id"] != 1 ? '<a class="btn btn-danger btn-xs" href="index.php?p=categories&amp;sp=delete&amp;ssp=' . $catblank["id"] . '" data-confirm="' . $tl["cat_notification"]["del"] . '" data-toggle="tooltip" data-placement="bottom" title="' . $tl["icons"]["i1"] . '"><i class="fa fa-trash-o"></i></a>' : '') . '
					</div></div></li>';

        }

        // EN: Check if some categories exist
        // CZ: Kontrola jestli existuje nějaká kategorie
        if (!empty($catnotvisible['items'])) {
          $JAK_CAT3_EXIST = '1';
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["cat_sec_title"]["catt"];
        $SECTION_DESC  = $tl["cat_sec_desc"]["catd"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $template = 'categories.php';
    }
}
?>