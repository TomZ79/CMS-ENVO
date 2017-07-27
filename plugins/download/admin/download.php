<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$jakuser->jakModuleaccess(JAK_USERID, JAK_ACCESSDOWNLOAD)) envo_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'download';
$envotable1 = DB_PREFIX . 'downloadcategories';
$envotable3 = DB_PREFIX . 'contactform';
$envotable4 = DB_PREFIX . 'pagesgrid';
$envotable5 = DB_PREFIX . 'pluginhooks';

// EN: Include the functions
// CZ: Vložené funkce
include_once("../plugins/download/admin/include/functions.php");

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'new':

    // Get the important template stuff
    $JAK_CAT           = envo_get_cat_info($envotable1, 0);
    $JAK_CONTACT_FORMS = envo_get_page_info($envotable3, '');
    $site_dload_files  = envo_get_download_files($jkv["downloadpath"]);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (isset($_POST['btnSave'])) {
        // EN: If button "Save Changes" clicked
        // CZ: Pokud bylo stisknuto tlačítko "Uložit"

        if (empty($defaults['jak_title'])) {
          $errors['e1'] = $tl['general_error']['generror18'] . '<br>';
        }

        if (isset($defaults['jak_showtitle'])) {
          $showtitle = $defaults['jak_showtitle'];
        } else {
          $showtitle = '0';
        }

        if (isset($defaults['jak_showdate'])) {
          $showdate = $defaults['jak_showdate'];
        } else {
          $showdate = '0';
        }

        if (isset($defaults['jak_showcontact'])) {
          $jakcon = $defaults['jak_showcontact'];
        } else {
          $jakcon = '0';
        }

        if (!empty($defaults['jak_datetime'])) {
          $finaltime = $defaults['jak_datetime'];
        }

        if (count($errors) == 0) {

          // EN: Preview Image of file
          // CZ: Náhledový obrázek souboru
          if (!empty($defaults['jak_img'])) {
            $insert .= 'previmg = "' . smartsql($defaults['jak_img']) . '",';
          }

          if (isset($defaults['jak_ftshare'])) {
            $ftshare = $defaults['jak_ftshare'];
          } else {
            $ftshare = '0';
          }

          if (!isset($defaults['jak_social'])) $defaults['jak_social'] = 0;

          if (!empty($defaults['jak_extfile'])) {
            $insert .= 'extfile = "' . smartsql($defaults['jak_extfile']) . '",';
          } else {
            $insert .= 'file = "' . smartsql($defaults['jak_file']) . '",';
          }

          if (!isset($defaults['jak_permission'])) {
            $permission = 0;
          } elseif (in_array(0, $defaults['jak_permission'])) {
            $permission = 0;
          } else {
            $permission = join(',', $defaults['jak_permission']);
          }

          // The new password encrypt with hash_hmac
          if ($defaults['jak_password']) {
            $insert .= 'password = "' . hash_hmac('sha256', $defaults['jak_password'], DB_PASS_HASH) . '",';
          }

          // Save the time if available of download
          if (!empty($finaltime)) {
            $insert .= 'time = "' . smartsql($finaltime) . '",';
          } else {
            $insert .= 'time = NOW(),';
          }

          // EN: Facebook image of file
          // CZ: Obrázek souboru pro Facebook
          if (!empty($defaults['jak_img_facebooksm'])) {
            $insert .= 'previmgfbsm = "' . smartsql($defaults['jak_img_facebooksm']) . '",';
          } else {
            $insert .= 'previmgfbsm = NULL,';
          }

          if (!empty($defaults['jak_img_facebooklg'])) {
            $insert .= 'previmgfblg = "' . smartsql($defaults['jak_img_facebooklg']) . '"';
          } else {
            $insert .= 'previmgfblg = NULL';
          }

          /* EN: Convert value
           * smartsql - secure method to insert form data into a MySQL DB
           * ------------------
           * CZ: Převod hodnot
           * smartsql - secure method to insert form data into a MySQL DB
          */
          $result = $jakdb->query('INSERT INTO ' . $envotable . ' SET
                    catid = "' . smartsql($defaults['jak_catid']) . '",
                    candownload = "' . smartsql($permission) . '",
                    title = "' . smartsql($defaults['jak_title']) . '",
                    content = "' . smartsql($defaults['jak_content']) . '",
                    dl_css = "' . smartsql($defaults['jak_css']) . '",
                    dl_javascript = "' . smartsql($defaults['jak_javascript']) . '",
                    sidebar = "' . smartsql($defaults['jak_sidebar']) . '",
                    showtitle = "' . smartsql($showtitle) . '",
                    showdate = "' . smartsql($showdate) . '",
                    showcontact = "' . smartsql($jakcon) . '",
                    ftshare = "' . smartsql($ftshare) . '",
                    socialbutton = "' . smartsql($defaults['jak_social']) . '",
                    ' . $insert);

          $rowid = $jakdb->jak_last_id();

          // Set tag active to zero
          $tagactive = 0;

          if ($defaults['jak_catid'] != 0) {

            $result1 = $jakdb->query('UPDATE ' . $envotable1 . ' SET count = count + 1 WHERE id = "' . smartsql($defaults['jak_catid']) . '"');
            // Set tag active, well to active
            $tagactive = 1;

          }

          // Save order for sidebar widget
          if (isset($defaults['jak_hookshow']) && is_array($defaults['jak_hookshow'])) {
            $exorder = $defaults['horder'];
            $hookid  = $defaults['real_hook_id'];
            $plugind = $defaults['sreal_plugin_id'];
            $doith   = array_combine($hookid, $exorder);
            $pdoith  = array_combine($hookid, $plugind);

            foreach ($doith as $key => $exorder) {

              if (in_array($key, $defaults['jak_hookshow'])) {

                // Get the real what id
                $whatid = 0;
                if (isset($defaults['whatid_' . $pdoith[$key]])) $whatid = $defaults['whatid_' . $pdoith[$key]];

                $jakdb->query('INSERT INTO ' . $envotable4 . ' SET fileid = "' . smartsql($rowid) . '", hookid = "' . smartsql($key) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", orderid = "' . smartsql($exorder) . '", plugin = "' . smartsql(JAK_PLUGIN_DOWNLOAD) . '"');

              }

            }

          }

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=download&sp=new&status=e');
          } else {

            // Create Tags if the module is active
            if (!empty($defaults['jak_tags'])) {
              // check if tag does not exist and insert in cloud
              JAK_tags::jakBuildcloud($defaults['jak_tags'], $rowid, JAK_PLUGIN_DOWNLOAD);
              // insert tag for normal use
              JAK_tags::jakInsertags($defaults['jak_tags'], $rowid, JAK_PLUGIN_DOWNLOAD, $tagactive);

            }

            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=download&sp=edit&ssp=' . $rowid . '&status=s');
          }
        } else {

          $errors['e'] = $tl['general_error']['generror'] . '<br>';
          $errors      = $errors;
        }
      } else {
        // EN: If no button pressed
        // CZ: Pokud nebylo stisknuto žádné tlačítko

      }
    }

    // Get the sidebar templates
    $result = $jakdb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable5 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
    while ($row = $result->fetch_assoc()) {
      $JAK_HOOKS[] = $row;
    }

    // Get active sidebar widgets
    $grid = $jakdb->query('SELECT hookid FROM ' . $envotable4 . ' WHERE plugin = "' . smartsql(JAK_PLUGIN_DOWNLOAD) . '" ORDER BY orderid ASC');
    while ($grow = $grid->fetch_assoc()) {
      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $JAK_ACTIVE_GRID[] = $grow;
    }

    // Get all usergroups
    $JAK_USERGROUP = envo_get_usergroup_all('usergroup');

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tld["downl_sec_title"]["downlt1"];
    $SECTION_DESC  = $tld["downl_sec_title"]["downld1"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = 'plugins/download/admin/template/newdownload.php';

    break;
  case 'categories':

    // Additional DB field information
    $jakfield  = 'catparent';
    $jakfield1 = 'varname';

    switch ($page2) {
      case 'lock':

        $result = $jakdb->query('UPDATE ' . $envotable1 . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($page3) . '"');

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=download&sp=categories&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=download&sp=categories&status=s');
        }

        break;
      case 'delete':

        if (envo_row_exist($page3, $envotable1) && !envo_field_not_exist($page3, $envotable1, $jakfield)) {

          $result = $jakdb->query('DELETE FROM ' . $envotable1 . ' WHERE id = "' . smartsql($page3) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            envo_redirect(BASE_URL . 'index.php?p=download&sp=categories&status=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - úspěšné
            /*
            NOTIFIKACE:
            'status=s'    - Záznam úspěšně uložen
            'status1=s1'  - Záznam úspěšně odstraněn
            */
            envo_redirect(BASE_URL . 'index.php?p=download&sp=categories&status=s&status1=s1');
          }

        } elseif (envo_row_exist($page3, $envotable1) && envo_field_not_exist($page3, $envotable1, $jakfield)) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=download&sp=categories&status=eca');
        }

        break;
      case 'edit':

        if (envo_row_exist($page3, $envotable1)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            if (empty($defaults['jak_name'])) {
              $errors['e1'] = $tl['general_error']['generror4'] . '<br>';
            }

            if (envo_field_not_exist_id($defaults['jak_varname'], $page3, $envotable1, $jakfield1)) {
              $errors['e2'] = $tl['general_error']['generror21'] . '<br>';
            }

            if (empty($defaults['jak_varname'])) {
              $errors['e3'] = $tl['general_error']['generror22'] . '<br>';
            }

            if (!empty($defaults['jak_varname']) && !preg_match('/^([a-z-_0-9]||[-_])+$/', $defaults['jak_varname'])) {
              $errors['e4'] = $tl['general_error']['generror23'] . '<br>';
            }

            if (!isset($defaults['jak_permission'])) {
              $permission = 0;
            } elseif (in_array(0, $defaults['jak_permission'])) {
              $permission = 0;
            } else {
              $permission = join(',', $defaults['jak_permission']);
            }

            if (count($errors) == 0) {

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
              $result = $jakdb->query('UPDATE ' . $envotable1 . ' SET
                        name = "' . smartsql($defaults['jak_name']) . '",
                        varname = "' . smartsql($defaults['jak_varname']) . '",
                        content = "' . smartsql($defaults['jak_lcontent']) . '",
                        permission = "' . smartsql($permission) . '",
                        ' . $insert . '
                        active = "' . smartsql($defaults['jak_active']) . '"
                        WHERE id = "' . smartsql($page3) . '"');

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=download&sp=categories&ssp=edit&sssp=' . $page3 . '&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=download&sp=categories&ssp=edit&sssp=' . $page3 . '&status=s');
              }
            } else {

              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }

          $JAK_FORM_DATA = envo_get_data($page3, $envotable1);
          $JAK_USERGROUP = envo_get_usergroup_all('usergroup');

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tld["downl_sec_title"]["downlt5"];
          $SECTION_DESC  = $tld["downl_sec_desc"]["downld5"];

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $plugin_template = 'plugins/download/admin/template/editcat.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=download&sp=categories&status=ene');
        }
        break;
      default:

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $count = 1;

          foreach ($_POST['menuItem'] as $k => $v) {

            if (!is_numeric($v)) $v = 0;

            $result = $jakdb->query('UPDATE ' . $envotable1 . ' SET catparent = "' . smartsql($v) . '", catorder = "' . smartsql($count) . '" WHERE id = "' . smartsql($k) . '"');

            $count++;

          }

          if ($result) {
            /* Outputtng the success messages */
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
              header('Cache-Control: no-cache');
              die(json_encode(array("status" => 1, "html" => $tl["notification"]["n7"])));
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              $_SESSION["successmsg"] = $tl["notification"]["n7"];
              envo_redirect(BASE_URL . 'index.php?p=b2b&sp=categories');
            }
          } else {
            /* Outputtng the success messages */
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
              header('Cache-Control: no-cache');
              die(json_encode(array("status" => 0, "html" => $tl["general_error"]["generror1"])));
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              $_SESSION["errormsg"] = $tl["general_error"]["generror1"];
              envo_redirect(BASE_URL . 'index.php?p=b2b&sp=categories');
            }
          }

        }

        // get the menu
        $result = $jakdb->query('SELECT * FROM ' . $envotable1 . ' ORDER BY catparent, catorder, name');
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
          $JAK_DL_CAT_EXIST = '1';
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tld["downl_sec_title"]["downlt4"];
        $SECTION_DESC  = $tld["downl_sec_desc"]["downld4"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = 'plugins/download/admin/template/cat.php';
    }
    break;
  case 'newcategory':

    // Additional DB Stuff
    $jakfield = 'varname';

    // Load all cats and get the usergroup information
    $JAK_USERGROUP = envo_get_usergroup_all('usergroup');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (empty($defaults['jak_name'])) {
        $errors['e1'] = $tl['general_error']['generror4'] . '<br>';
      }

      if (envo_field_not_exist($defaults['jak_varname'], $envotable1, $jakfield)) {
        $errors['e2'] = $tl['general_error']['generror21'] . '<br>';
      }

      if (empty($defaults['jak_varname'])) {
        $errors['e3'] = $tl['general_error']['generror22'] . '<br>';
      }

      if (!empty($defaults['jak_varname']) && !preg_match('/^([a-z-_0-9]||[-_])+$/', $defaults['jak_varname'])) {
        $errors['e4'] = $tl['general_error']['generror23'] . '<br>';
      }

      if (count($errors) == 0) {

        if (!isset($defaults['jak_active'])) {
          $catactive = 1;
        } else {
          $catactive = $defaults['jak_active'];
        }

        if (!isset($defaults['jak_permission'])) {
          $permission = 0;
        } elseif (in_array(0, $defaults['jak_permission'])) {
          $permission = 0;
        } else {
          $permission = join(',', $defaults['jak_permission']);
        }

        if (!empty($defaults['jak_img'])) {
          $insert = 'catimg = "' . smartsql($defaults['jak_img']) . '",';
        }

        /* EN: Convert value
         * smartsql - secure method to insert form data into a MySQL DB
         * ------------------
         * CZ: Převod hodnot
         * smartsql - secure method to insert form data into a MySQL DB
        */
        $result = $jakdb->query('INSERT INTO ' . $envotable1 . ' SET
                  name = "' . smartsql($defaults['jak_name']) . '",
                  varname = "' . smartsql($defaults['jak_varname']) . '",
                  content = "' . smartsql($defaults['jak_lcontent']) . '",
                  permission = "' . smartsql($permission) . '",
                  active = "' . smartsql($catactive) . '",
                  ' . $insert . '
                  catparent = 0');

        $rowid = $jakdb->jak_last_id();

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=download&sp=newcategory&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=download&sp=categories&ssp=edit&sssp=' . $rowid . '&status=s');
        }
      } else {

        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tld["downl_sec_title"]["downlt6"];
    $SECTION_DESC  = $tld["downl_sec_desc"]["downld6"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = 'plugins/download/admin/template/newcat.php';

    break;
  case 'setting':

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (empty($defaults['jak_date'])) {
        $errors['e3'] = $tl['general_error']['generror26'] . '<br>';
      }

      if (!is_numeric($defaults['jak_item'])) {
        $errors['e5'] = $tl['general_error']['generror27'] . '<br>';
      }

      if (!is_numeric($defaults['jak_mid'])) {
        $errors['e5'] = $tl['general_error']['generror27'] . '<br>';
      }

      if (!empty($defaults['jak_path'])) {
        if (!is_dir(APP_PATH . $defaults['jak_path'])) {
          $errors['e6'] = $tl['general_error']['generror28'] . '<br>';
        }
      }

      if (count($errors) == 0) {

        // Get th order into the right format
        $dlorder = $defaults['jak_showdlordern'] . ' ' . $defaults['jak_showdlorder'];

        /* EN: Convert value
         * smartsql - secure method to insert form data into a MySQL DB
         * ------------------
         * CZ: Převod hodnot
         * smartsql - secure method to insert form data into a MySQL DB
        */
        $result = $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
                    WHEN "downloadtitle" THEN "' . smartsql($defaults['jak_title']) . '"
                    WHEN "downloaddesc" THEN "' . smartsql($defaults['jak_lcontent']) . '"
                    WHEN "downloadorder" THEN "' . smartsql($dlorder) . '"
                    WHEN "downloaddateformat" THEN "' . smartsql($defaults['jak_date']) . '"
                    WHEN "downloadtimeformat" THEN "' . smartsql($defaults['jak_time']) . '"
                    WHEN "downloadurl" THEN "' . smartsql($defaults['jak_downloadurl']) . '"
                    WHEN "downloadpath" THEN "' . smartsql($defaults['jak_path']) . '"
                    WHEN "downloadpathext" THEN "' . smartsql($defaults['jak_extension']) . '"
                    WHEN "downloadtwitter" THEN "' . smartsql($defaults['jak_twitter']) . '"
                    WHEN "downloadpagemid" THEN "' . smartsql($defaults['jak_mid']) . '"
                    WHEN "downloadpageitem" THEN "' . smartsql($defaults['jak_item']) . '"
                    WHEN "downloadrss" THEN "' . smartsql($defaults['jak_rssitem']) . '"
                    WHEN "download_css" THEN "' . smartsql($defaults['jak_css']) . '"
                    WHEN "download_javascript" THEN "' . smartsql($defaults['jak_javascript']) . '"
                  END
                  WHERE varname IN ("downloadtitle","downloaddesc","downloadorder","downloaddateformat","downloadtimeformat","downloadurl","downloadpath", "downloadpathext", "downloadtwitter","downloadpagemid","downloadpageitem","downloadrss","download_css","download_javascript")');

        // Save order for sidebar widget
        if (isset($defaults['jak_hookshow_new']) && is_array($defaults['jak_hookshow_new'])) {

          $exorder = $defaults['horder_new'];
          $hookid  = $defaults['real_hook_id_new'];
          $plugind = $defaults['sreal_plugin_id_new'];
          $doith   = array_combine($hookid, $exorder);
          $pdoith  = array_combine($hookid, $plugind);

          foreach ($doith as $key => $exorder) {

            if (in_array($key, $defaults['jak_hookshow_new'])) {

              // Get the real what id
              $whatid = 0;
              if (isset($defaults['whatid_' . $pdoith[$key]])) $whatid = $defaults['whatid_' . $pdoith[$key]];

              $jakdb->query('INSERT INTO ' . $envotable4 . ' SET plugin = "' . smartsql(JAK_PLUGIN_DOWNLOAD) . '", hookid = "' . smartsql($key) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", orderid = "' . smartsql($exorder) . '"');

            }

          }

        }

        // Now check if all the sidebar a deselct and hooks exist, if so delete all associated to this page
        if (!isset($defaults['jak_hookshow_new']) && !isset($defaults['jak_hookshow'])) {

          // Now check if all the sidebar a deselected and hooks exist, if so delete all associated to this page
          $row = $jakdb->queryRow('SELECT id FROM ' . $envotable4 . ' WHERE plugin = "' . smartsql(JAK_PLUGIN_DOWNLOAD) . '" AND fileid = 0 AND hookid != 0');

          // We have something to delete
          if ($row["id"]) {
            $jakdb->query('DELETE FROM ' . $envotable4 . ' WHERE plugin = "' . smartsql(JAK_PLUGIN_DOWNLOAD) . '" AND fileid = 0 AND hookid != 0');
          }

        }

        // Save order or delete for extra sidebar widget
        if (isset($defaults['jak_hookshow']) && is_array($defaults['jak_hookshow'])) {

          $exorder    = $defaults['horder'];
          $hookid     = $defaults['real_hook_id'];
          $hookrealid = implode(',', $defaults['real_hook_id']);
          $doith      = array_combine($hookid, $exorder);

          // Reset update
          $updatesql = $updatesql1 = "";

          // Run the foreach for the hooks
          foreach ($doith as $key => $exorder) {

            // Get the real what id
            $row = $jakdb->queryRow('SELECT pluginid FROM ' . $envotable4 . ' WHERE id = "' . smartsql($key) . '" AND hookid != 0');

            // Get the whatid
            $whatid = 0;
            if (isset($defaults['whatid_' . $row["pluginid"]])) $whatid = $defaults['whatid_' . $row["pluginid"]];

            if (in_array($key, $defaults['jak_hookshow'])) {
              $updatesql .= sprintf("WHEN %d THEN %d ", $key, $exorder);
              $updatesql1 .= sprintf("WHEN %d THEN %d ", $key, $whatid);

            } else {
              $jakdb->query('DELETE FROM ' . $envotable4 . ' WHERE id = "' . smartsql($key) . '"');
            }
          }

          $jakdb->query('UPDATE ' . $envotable4 . ' SET orderid = CASE id
					' . $updatesql . '
					END
					WHERE id IN (' . $hookrealid . ')');

          $jakdb->query('UPDATE ' . $envotable4 . ' SET whatid = CASE id
					' . $updatesql1 . '
					END
					WHERE id IN (' . $hookrealid . ')');

        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=download&sp=setting&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=download&sp=setting&status=s');
        }
      } else {

        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // EN: Import important settings for the template from the DB
    // CZ: Importuj důležité nastavení pro šablonu z DB
    $JAK_SETTING = envo_get_setting('download');

    // EN: Import important settings for the template from the DB (only VALUE)
    // CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
    $JAK_SETTING_VAL = envo_get_setting_val('download');

    // Get the sort orders for the grid
    $grid = $jakdb->query('SELECT id, hookid, whatid, orderid FROM ' . $envotable4 . ' WHERE plugin = "' . smartsql(JAK_PLUGIN_DOWNLOAD) . '" AND fileid = 0 ORDER BY orderid ASC');
    while ($grow = $grid->fetch_assoc()) {
      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $JAK_PAGE_GRID[] = $grow;
    }

    // Get the sidebar templates
    $result = $jakdb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable5 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
    while ($row = $result->fetch_assoc()) {
      $JAK_HOOKS[] = $row;
    }

    // Now let's check how to display the order
    $showdlarray = explode(" ", $jkv["downloadorder"]);

    if (is_array($showdlarray) && in_array("ASC", $showdlarray) || in_array("DESC", $showdlarray)) {

      $JAK_SETTING['showdlwhat']  = $showdlarray[0];
      $JAK_SETTING['showdlorder'] = $showdlarray[1];

    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tld["downl_sec_title"]["downlt9"];
    $SECTION_DESC  = $tld["downl_sec_desc"]["downld9"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = 'plugins/download/admin/template/setting.php';

    break;
  default:

    // Important Smarty stuff
    $JAK_CAT           = envo_get_cat_info($envotable1, 0);
    $JAK_CONTACT_FORMS = envo_get_page_info($envotable3, '');

    switch ($page1) {
      case 'showcat':
        $getTotal = envo_get_total($envotable, $page2, 'catid', '');
        if ($getTotal != 0) {
          // Paginator
          $pages                 = new JAK_Paginator;
          $pages->items_total    = $getTotal;
          $pages->mid_range      = $jkv["adminpagemid"];
          $pages->items_per_page = $jkv["adminpageitem"];
          $pages->jak_get_page   = $page3;
          $pages->jak_where      = 'index.php?p=download&sp=showcat&ssp=' . $page2;
          $pages->paginate();
          $JAK_PAGINATE_SORT = $pages->display_pages();
          $JAK_DOWNLOAD_SORT = envo_get_downloads($pages->limit, $page2, $envotable);

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tld["downl_sec_title"]["downlt2"];
          $SECTION_DESC  = $tld["downl_sec_desc"]["downld2"];

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $plugin_template = 'plugins/download/admin/template/catsort.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=download&status=ene');
        }
        break;
      case 'lock':

        $result2 = $jakdb->query('SELECT catid, active FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');
        $row2    = $result2->fetch_assoc();

        if ($row2['active'] == 1) {
          $jakdb->query('UPDATE ' . $envotable1 . ' SET count = count - 1 WHERE id = "' . smartsql($row2['catid']) . '"');
        } else {
          $jakdb->query('UPDATE ' . $envotable1 . ' SET count = count + 1 WHERE id = "' . smartsql($row2['catid']) . '"');
        }

        $result = $jakdb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($page2) . '"');

        JAK_tags::jaklocktags($page2, JAK_PLUGIN_DOWNLOAD);

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=download&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=download&status=s');
        }

        break;
      case 'delete':
        if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

          $result2 = $jakdb->query('SELECT catid FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');
          $row2    = $result2->fetch_assoc();

          $jakdb->query('UPDATE ' . $envotable1 . ' SET count = count - 1 WHERE id = "' . smartsql($row2['catid']) . '"');

          $result = $jakdb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            envo_redirect(BASE_URL . 'index.php?p=download&status=e');
          } else {
            JAK_tags::jakDeletetags($page2, JAK_PLUGIN_DOWNLOAD);

            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - úspěšné
            /*
            NOTIFIKACE:
            'status=s'    - Záznam úspěšně uložen
            'status1=s1'  - Záznam úspěšně odstraněn
            */
            envo_redirect(BASE_URL . 'index.php?p=download&status=s&status1=s1');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=download&status=ene');
        }
        break;
      case 'edit':

        $site_dload_files = envo_get_download_files($jkv["downloadpath"]);

        if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            // Delete the tags
            if (!empty($defaults['jak_tagdelete'])) {
              $tags = $defaults['jak_tagdelete'];

              for ($i = 0; $i < count($tags); $i++) {
                $tag = $tags[$i];

                JAK_tags::jakDeleteonetag($tag);

              }
            }

            // Delete the hits
            if (!empty($defaults['jak_delete_hits'])) {
              $jakdb->query('UPDATE ' . $envotable . ' SET hits = 1 WHERE id = "' . smartsql($page2) . '"');
            }

            // Delete the password
            if (!empty($defaults['jak_delete_password'])) {
              $defaults['jak_password'] = '';
              $jakdb->query('UPDATE ' . $envotable . ' SET password = NULL WHERE id = "' . smartsql($page2) . '"');
            }

            if (empty($defaults['jak_title'])) {
              $errors['e1'] = $tl['general_error']['generror18'] . '<br>';
            }

            if (!empty($defaults['jak_datetime'])) {
              $finaltime = $defaults['jak_datetime'];
            }

            if (count($errors) == 0) {

              if (!empty($defaults['jak_update_time'])) {
                $insert .= 'time = NOW(),';
              }

              // EN: Preview Image of file
              // CZ: Náhledový obrázek souboru
              if (!empty($defaults['jak_img'])) {
                $insert .= 'previmg = "' . smartsql($defaults['jak_img']) . '",';
              } else {
                $insert .= 'previmg = NULL,';
              }

              if (!empty($defaults['jak_extfile'])) {
                $insert .= 'extfile = "' . smartsql($defaults['jak_extfile']) . '",';
                $insert .= 'file = NULL,';
              } else {
                $insert .= 'extfile = NULL,';
                $insert .= 'file = "' . smartsql($defaults['jak_file']) . '",';
              }

              if (!isset($defaults['jak_permission'])) {
                $permission = 0;
              } elseif (in_array(0, $defaults['jak_permission'])) {
                $permission = 0;
              } else {
                $permission = join(',', $defaults['jak_permission']);
              }

              // The new password encrypt with hash_hmac
              if ($defaults['jak_password']) {
                $insert .= 'password = "' . hash_hmac('sha256', $defaults['jak_password'], DB_PASS_HASH) . '",';
              }

              // Save the time if available of download
              if (!empty($finaltime)) {
                $insert .= 'time = "' . smartsql($finaltime) . '",';
              } else {
                $insert .= 'time = NOW(),';
              }

              // EN: Facebook image of file
              // CZ: Obrázek souboru pro Facebook
              if (!empty($defaults['jak_img_facebooksm'])) {
                $insert .= 'previmgfbsm = "' . smartsql($defaults['jak_img_facebooksm']) . '",';
              } else {
                $insert .= 'previmgfbsm = NULL,';
              }

              if (!empty($defaults['jak_img_facebooklg'])) {
                $insert .= 'previmgfblg = "' . smartsql($defaults['jak_img_facebooklg']) . '",';
              } else {
                $insert .= 'previmgfblg = NULL,';
              }

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
              */
              $result = $jakdb->query('UPDATE ' . $envotable . ' SET
                        catid = "' . smartsql($defaults['jak_catid']) . '",
                        candownload = "' . smartsql($permission) . '",
                        title = "' . smartsql($defaults['jak_title']) . '",
                        content = "' . smartsql($defaults['jak_content']) . '",
                        dl_css = "' . smartsql($defaults['jak_css']) . '",
                        dl_javascript = "' . smartsql($defaults['jak_javascript']) . '",
                        sidebar = "' . smartsql($defaults['jak_sidebar']) . '",
                        showtitle = "' . smartsql($defaults['jak_showtitle']) . '",
                        showcontact = "' . smartsql($defaults['jak_showcontact']) . '",
                        showdate = "' . smartsql($defaults['jak_showdate']) . '",
                        countdl = "' . smartsql($defaults['jak_dltotal']) . '",
                        hits = "' . smartsql($defaults['jak_hitstotal']) . '",
                        ' . $insert . '
                        ftshare = "' . smartsql($defaults['jak_ftshare']) . '",
                        socialbutton = "' . smartsql($defaults['jak_social']) . '"
                        WHERE id = "' . smartsql($page2) . '"');

              // Set tag active to zero
              $tagactive = 0;

              if ($defaults['jak_oldcatid'] != 0) {
                // Set tag active, well to active
                $tagactive = 1;
              }

              if ($defaults['jak_catid'] != 0 || $defaults['jak_catid'] != $defaults['jak_oldcatid']) {
                $jakdb->query('UPDATE ' . $envotable1 . ' SET count = count - 1 WHERE id = "' . smartsql($defaults['jak_oldcatid']) . '"');
                $jakdb->query('UPDATE ' . $envotable1 . ' SET count = count + 1 WHERE id = "' . smartsql($defaults['jak_catid']) . '"');

                // Set tag active, well to active
                $tagactive = 1;
              }

              // Save order for sidebar widget
              if (isset($defaults['jak_hookshow_new']) && is_array($defaults['jak_hookshow_new'])) {

                $exorder = $defaults['horder_new'];
                $hookid  = $defaults['real_hook_id_new'];
                $plugind = $defaults['sreal_plugin_id_new'];
                $doith   = array_combine($hookid, $exorder);
                $pdoith  = array_combine($hookid, $plugind);

                foreach ($doith as $key => $exorder) {

                  if (in_array($key, $defaults['jak_hookshow_new'])) {

                    // Get the real what id
                    $whatid = 0;
                    if (isset($defaults['whatid_' . $pdoith[$key]])) $whatid = $defaults['whatid_' . $pdoith[$key]];

                    $jakdb->query('INSERT INTO ' . $envotable4 . ' SET fileid = "' . smartsql($page2) . '", hookid = "' . smartsql($key) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", orderid = "' . smartsql($exorder) . '", plugin = "' . smartsql(JAK_PLUGIN_DOWNLOAD) . '"');

                  }

                }

              }

              // Now check if all the sidebar a deselct and hooks exist, if so delete all associated to this page
              if (!isset($defaults['jak_hookshow_new']) && !isset($defaults['jak_hookshow'])) {

                // Now check if all the sidebar a deselected and hooks exist, if so delete all associated to this page
                $row = $jakdb->queryRow('SELECT id FROM ' . $envotable4 . ' WHERE fileid = "' . smartsql($page2) . '" AND hookid != 0');

                // We have something to delete
                if ($row["id"]) {
                  $jakdb->query('DELETE FROM ' . $envotable4 . ' WHERE fileid = "' . smartsql($page2) . '" AND hookid != 0');
                }

              }

              // Save order or delete for extra sidebar widget
              if (isset($defaults['jak_hookshow']) && is_array($defaults['jak_hookshow'])) {

                $exorder    = $defaults['horder'];
                $hookid     = $defaults['real_hook_id'];
                $hookrealid = implode(',', $defaults['real_hook_id']);
                $doith      = array_combine($hookid, $exorder);

                foreach ($doith as $key => $exorder) {

                  // Get the real what id
                  $result = $jakdb->query('SELECT pluginid FROM ' . $envotable4 . ' WHERE id = "' . smartsql($key) . '" AND hookid != 0');
                  $row    = $result->fetch_assoc();

                  $whatid = 0;
                  if (isset($defaults['whatid_' . $row["pluginid"]])) $whatid = $defaults['whatid_' . $row["pluginid"]];

                  if (in_array($key, $defaults['jak_hookshow'])) {
                    $updatesql .= sprintf("WHEN %d THEN %d ", $key, $exorder);
                    $updatesql1 .= sprintf("WHEN %d THEN %d ", $key, $whatid);

                  } else {
                    $jakdb->query('DELETE FROM ' . $envotable4 . ' WHERE id = "' . smartsql($key) . '"');
                  }
                }

                $jakdb->query('UPDATE ' . $envotable4 . ' SET orderid = CASE id
				' . $updatesql . '
				END
				WHERE id IN (' . $hookrealid . ')');

                $jakdb->query('UPDATE ' . $envotable4 . ' SET whatid = CASE id
				' . $updatesql1 . '
				END
				WHERE id IN (' . $hookrealid . ')');

              }

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=download&sp=edit&ssp=' . $page2 . '&status=e');
              } else {

                // Create Tags if the module is active
                if (!empty($defaults['jak_tags'])) {
                  // check if tag does not exist and insert in cloud
                  JAK_tags::jakBuildcloud($defaults['jak_tags'], smartsql($page2), JAK_PLUGIN_DOWNLOAD);
                  // insert tag for normal use
                  JAK_tags::jakInsertags($defaults['jak_tags'], smartsql($page2), JAK_PLUGIN_DOWNLOAD, $tagactive);

                }

                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=download&sp=edit&ssp=' . $page2 . '&status=s');
              }

            } else {

              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }

          $JAK_FORM_DATA = envo_get_data($page2, $envotable);
          if (JAK_TAGS) {
            $JAK_TAGLIST = envo_get_tags($page2, JAK_PLUGIN_DOWNLOAD);
          }

          // Get the sort orders for the grid
          $grid = $jakdb->query('SELECT id, pluginid, hookid, whatid, orderid FROM ' . $envotable4 . ' WHERE fileid = "' . smartsql($page2) . '" ORDER BY orderid ASC');
          while ($grow = $grid->fetch_assoc()) {
            // EN: Insert each record into array
            // CZ: Vložení získaných dat do pole
            $JAK_PAGE_GRID[] = $grow;
          }

          // Get the sidebar templates
          $result = $jakdb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable5 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
          while ($row = $result->fetch_assoc()) {
            $JAK_HOOKS[] = $row;
          }

          // Get all usergroups
          $JAK_USERGROUP = envo_get_usergroup_all('usergroup');

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tld["downl_sec_title"]["downlt3"];
          $SECTION_DESC  = $tld["downl_sec_desc"]["downld3"];

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $plugin_template = 'plugins/download/admin/template/editdownload.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=download&status=ene');
        }
        break;
      case 'quickedit':
        if (envo_row_exist($page2, $envotable)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            if (empty($defaults['jak_title'])) {
              $errors['e1'] = $tl['general_error']['generror18'] . '<br>';
            }

            // Now do the dirty stuff in mysql
            if (count($errors) == 0) {

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
              */
              $result = $jakdb->query('UPDATE ' . $envotable . ' SET
                        title = "' . smartsql($defaults['jak_title']) . '",
                        content = "' . smartsql($defaults['jak_lcontent']) . '"
                        WHERE id = "' . smartsql($page2) . '"');

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=download&sp=quickedit&ssp=' . $page2 . '&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=download&sp=quickedit&ssp=' . $page2 . '&status=s');
              }
            } else {

              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }

          // Get the data
          $JAK_FORM_DATA = envo_get_data($page2, $envotable);

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $template = 'quickedit.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=download&status=ene');
        }
        break;
      case 'sort':

        // getNumber
        $getTotal = envo_get_total($envotable, '', '', '');

        // Now if total run paginator
        if ($getTotal != 0) {
          // Paginator
          $pages                 = new JAK_Paginator;
          $pages->items_total    = $getTotal;
          $pages->mid_range      = $jkv["adminpagemid"];
          $pages->items_per_page = $jkv["adminpageitem"];
          $pages->jak_get_page   = $page4;
          $pages->jak_where      = 'index.php?p=download&sp=sort&ssp=' . $page2 . '&sssp=' . $page3;
          $pages->paginate();
          $JAK_PAGINATE = $pages->display_pages();
        }

        $result = $jakdb->query('SELECT * FROM ' . $envotable . ' ORDER BY ' . $page2 . ' ' . $page3 . ' ' . $pages->limit);
        while ($row = $result->fetch_assoc()) {
          $dlarray[] = $row;
        }

        $JAK_DOWNLOAD_ALL = $dlarray;

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tld["downl_sec_title"]["downlt11"];
        $SECTION_DESC  = $tld["downl_sec_desc"]["downld11"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = 'plugins/download/admin/template/download.php';

        break;
      default:

        // Hello we have a post request
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['jak_delete_download'])) {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (isset($defaults['lock'])) {

            $lockuser = $defaults['jak_delete_download'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              $result2 = $jakdb->query('SELECT catid, active FROM ' . $envotable . ' WHERE id = "' . smartsql($locked) . '"');
              $row2    = $result2->fetch_assoc();

              if ($row2['active'] == 1) {
                $jakdb->query('UPDATE ' . $envotable1 . ' SET count = count - 1 WHERE id = "' . smartsql($row2['catid']) . '"');
              } else {
                $jakdb->query('UPDATE ' . $envotable1 . ' SET count = count + 1 WHERE id = "' . smartsql($row2['catid']) . '"');
              }

              $result = $jakdb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($locked) . '"');

              JAK_tags::jaklocktags($locked, JAK_PLUGIN_DOWNLOAD);
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=download&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=download&status=s');
            }

          }

          if (isset($defaults['delete'])) {

            $lockuser = $defaults['jak_delete_download'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              $result2 = $jakdb->query('SELECT catid FROM ' . $envotable . ' WHERE id = "' . smartsql($locked) . '"');
              $row2    = $result2->fetch_assoc();

              $jakdb->query('UPDATE ' . $envotable1 . ' SET count = count - 1 WHERE id = "' . smartsql($row2['catid']) . '"');
              $result = $jakdb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($locked) . '"');

              JAK_tags::jakDeletetags($locked, JAK_PLUGIN_DOWNLOAD);
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky s notifikací - chybné
              envo_redirect(BASE_URL . 'index.php?p=download&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky s notifikací - úspěšné
              /*
              NOTIFIKACE:
              'status=s'    - Záznam úspěšně uložen
              'status1=s1'  - Záznam úspěšně odstraněn
              */
              envo_redirect(BASE_URL . 'index.php?p=download&status=s&status1=s1');
            }

          }

        }

        // Get all downloads out
        $getTotal = envo_get_total($envotable, '', '', '');

        if ($getTotal != 0) {
          // Paginator
          $pages                 = new JAK_Paginator;
          $pages->items_total    = $getTotal;
          $pages->mid_range      = $jkv["adminpagemid"];
          $pages->items_per_page = $jkv["adminpageitem"];
          $pages->jak_get_page   = $page1;
          $pages->jak_where      = 'index.php?p=download';
          $pages->paginate();
          $JAK_PAGINATE = $pages->display_pages();

          $JAK_DOWNLOAD_ALL = envo_get_downloads($pages->limit, '', $envotable);
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tld["downl_sec_title"]["downlt"];
        $SECTION_DESC  = $tld["downl_sec_desc"]["downld"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = 'plugins/download/admin/template/download.php';
    }
}
?>