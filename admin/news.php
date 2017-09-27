<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$envouser->envoModuleAccess(ENVO_USERID, ENVO_ACCESSNEWS)) envo_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'news';
$envotable1 = DB_PREFIX . 'contactform';
$envotable2 = DB_PREFIX . 'pagesgrid';
$envotable3 = DB_PREFIX . 'pluginhooks';

$insert = FALSE;

// EN: Get all the php Hook by name of Hook for the template
// CZ: Načtení všech php dat z Hook podle jména Hook pro šablonu
$ENVO_HOOK_ADMIN_PAGE     = $envohooks->EnvoGethook("tpl_admin_page_news");
$ENVO_HOOK_ADMIN_PAGE_NEW = $envohooks->EnvoGethook("tpl_admin_page_news_new");

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'new':

    // Important template Stuff
    $ENVO_CONTACT_FORMS = envo_get_page_info($envotable1, '');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (empty($defaults['envo_title'])) {
        $errors['e1'] = $tl['general_error']['generror18'] . '<br>';
      }

      if (!empty($defaults['envo_datetime'])) {
        $finaltime = $defaults['envo_datetime'];
      }

      if (!empty($defaults['envo_datefrom'])) {
        $finalfrom = strtotime($defaults['envo_datefrom']);
      }

      if (!empty($defaults['envo_dateto'])) {
        $finalto = strtotime($defaults['envo_dateto']);
      }

      if (isset($finalto) && isset($finalfrom) && $finalto < $finalfrom) {
        $errors['e2'] = $tl['general_error']['generror25'] . '<br>';
      }

      // Now do the dirty stuff in mysql
      if (count($errors) == 0) {

        // Save the time if available of download
        if (!empty($finaltime)) {
          $insert .= 'time = "' . smartsql($finaltime) . '",';
        } else {
          $insert .= 'time = NOW(),';
        }

        // Save image
        if (empty($defaults['envo_img'])) $defaults['envo_img'] = '';

        // Write some standard vars if empty
        if (!isset($defaults['envo_showcontact'])) $defaults['envo_showcontact'] = 0;

        if (!isset($defaults['envo_showtitle'])) $defaults['envo_showtitle'] = 0;

        if (!isset($defaults['envo_showdate'])) $defaults['envo_showdate'] = 0;

        if (!isset($defaults['envo_social'])) $defaults['envo_social'] = 0;

        // Save the time range if available of article
        if (isset($finalfrom)) {
          $insert .= 'startdate = "' . smartsql($finalfrom) . '",';
        }

        if (isset($finalto)) {
          $insert .= 'enddate = "' . smartsql($finalto) . '",';
        }

        if (!isset($defaults['envo_permission'])) {
          $permission = 0;
        } elseif (in_array(0, $defaults['envo_permission'])) {
          $permission = 0;
        } else {
          $permission = join(',', $defaults['envo_permission']);
        }

        // EN: Get all the php Hook by name of Hook
        // CZ: Načtení všech php dat z Hook podle jména Hook
        $hooknews = $envohooks->EnvoGethook("php_admin_news_sql");
        if ($hooknews) {
          foreach ($hooknews as $hne) {
            eval($hne['phpcode']);
          }
        }

        /* EN: Convert value
         * smartsql - secure method to insert form data into a MySQL DB
         * ------------------
         * CZ: Převod hodnot
         * smartsql - secure method to insert form data into a MySQL DB
        */
        $result = $envodb->query('INSERT INTO ' . $envotable . ' SET
                  title = "' . smartsql($defaults['envo_title']) . '",
                  content = "' . smartsql($defaults['envo_content']) . '",
                  news_css = "' . smartsql($defaults['envo_css']) . '",
                  news_javascript = "' . smartsql($defaults['envo_javascript']) . '",
                  sidebar = "' . smartsql($defaults['envo_sidebar']) . '",
                  previmg = "' . $defaults['envo_img'] . '",
                  showtitle = "' . smartsql($defaults['envo_showtitle']) . '",
                  showcontact = "' . smartsql($defaults['envo_showcontact']) . '",
                  showdate = "' . $defaults['envo_showdate'] . '",
                  showhits = "' . $defaults['envo_showhits'] . '",
                  socialbutton = "' . $defaults['envo_social'] . '",
                  newsorder = 1,
                  permission = "' . smartsql($permission) . '",
                  ' . $insert . '
                  active = 1');

        $rowid = $envodb->envo_last_id();

        // Save order for extra stuff
        $exorder  = $defaults['corder_new'];
        $pluginid = $defaults['real_plugin_id'];
        $realid   = implode(',', $defaults['real_plugin_id']);
        $doit     = array_combine($pluginid, $exorder);

        foreach ($doit as $key => $exorder) {

          $envodb->query('INSERT INTO ' . $envotable2 . ' SET newsid = "' . $rowid . '", pluginid = "' . $key . '", orderid = "' . smartsql($exorder) . '"');

        }

        // Save order for sidebar widget
        if (isset($defaults['envo_hookshow']) && is_array($defaults['envo_hookshow'])) {
          $exorder = $defaults['horder'];
          $hookid  = $defaults['real_hook_id'];
          $plugind = $defaults['sreal_plugin_id'];
          $doith   = array_combine($hookid, $exorder);
          $pdoith  = array_combine($hookid, $plugind);

          foreach ($doith as $key => $exorder) {

            if (in_array($key, $defaults['envo_hookshow'])) {

              // Get the real what id
              $whatid = 0;
              if (isset($defaults['whatid_' . $pdoith[$key]])) $whatid = $defaults['whatid_' . $pdoith[$key]];

              $envodb->query('INSERT INTO ' . $envotable2 . ' SET newsid = "' . $rowid . '", hookid = "' . smartsql($key) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", orderid = "' . smartsql($exorder) . '", plugin = 1');

            }

          }

        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=news&sp=new&status=e');
        } else {

          // Create Tags if the module is active
          if (!empty($defaults['envo_tags'])) {
            // check if tag does not exist and insert in cloud
            ENVO_tags::envoBuildCloud($defaults['envo_tags'], $rowid, 1);
            // insert tag for normal use
            ENVO_tags::envoInserTags($defaults['envo_tags'], $rowid, 1, 1);


          }
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=news&sp=edit&ssp=' . $rowid . '&status=s');
        }
      } else {

        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // Get the sidebar templates
    $result = $envodb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable3 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
    while ($row = $result->fetch_assoc()) {
      $ENVO_HOOKS[] = $row;
    }

    // Get active sidebar widgets
    $grid = $envodb->query('SELECT hookid FROM ' . $envotable2 . ' WHERE plugin = 1 ORDER BY orderid ASC');
    while ($grow = $grid->fetch_assoc()) {
      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $ENVO_ACTIVE_GRID[] = $grow;
    }

    // EN: Get all the php Hook by name of Hook
    // CZ: Načtení všech php dat z Hook podle jména Hook
    $ENVO_FORM_DATA = array();
    $hookpagei     = $envohooks->EnvoGethook("php_admin_pages_news_info");
    if ($hookpagei) {
      foreach ($hookpagei as $hpagi) {
        eval($hpagi['phpcode']);
      }
    }

    // Get all usergroup's
    $ENVO_USERGROUP = envo_get_usergroup_all('usergroup');

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["news_sec_title"]["newst1"];
    $SECTION_DESC  = $tl["news_sec_desc"]["newsd1"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'newnews.php';

    break;
  case 'setting':

    // EN: Import important settings for the template from the DB
    // CZ: Importuj důležité nastavení pro šablonu z DB
    $ENVO_SETTING = envo_get_setting('news');

    // EN: Import important settings for the template from the DB (only VALUE)
    // CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
    $ENVO_SETTING_VAL = envo_get_setting_val('news');

    // Let's go on with the script
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (empty($defaults['envo_date'])) {
        $errors['e1'] = $tl['general_error']['generror26'] . '<br>';
      }

      if (!is_numeric($defaults['envo_item'])) {
        $errors['e2'] = $tl['general_error']['generror27'] . '<br>';
      }

      if (count($errors) == 0) {

        // Get the order into the right format
        $newsorder = $defaults['envo_shownewsordern'] . ' ' . $defaults['envo_shownewsorder'];

        /* EN: Convert value
         * smartsql - secure method to insert form data into a MySQL DB
         * ------------------
         * CZ: Převod hodnot
         * smartsql - secure method to insert form data into a MySQL DB
        */
        $result = $envodb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
                    WHEN "newstitle" THEN "' . smartsql($defaults['envo_title']) . '"
                    WHEN "newsdesc" THEN "' . smartsql($defaults['envo_lcontent']) . '"
                    WHEN "newsorder" THEN "' . $newsorder . '"
                    WHEN "newsdateformat" THEN "' . smartsql($defaults['envo_date']) . '"
                    WHEN "newstimeformat" THEN "' . smartsql($defaults['envo_time']) . '"
                    WHEN "newspagemid" THEN "' . smartsql($defaults['envo_mid']) . '"
                    WHEN "newspageitem" THEN "' . smartsql($defaults['envo_item']) . '"
                    WHEN "news_css" THEN "' . smartsql($defaults['envo_css']) . '"
                    WHEN "news_javascript" THEN "' . smartsql($defaults['envo_javascript']) . '"
                  END
                  WHERE varname IN ("newstitle", "newsdesc", "newsorder", "newsdateformat", "newstimeformat", "newspagemid", "newspageitem","news_css","news_javascript")');

        // Save order for sidebar widget
        if (isset($defaults['envo_hookshow_new']) && is_array($defaults['envo_hookshow_new'])) {

          $exorder = $defaults['horder_new'];
          $hookid  = $defaults['real_hook_id_new'];
          $plugind = $defaults['sreal_plugin_id_new'];
          $doith   = array_combine($hookid, $exorder);
          $pdoith  = array_combine($hookid, $plugind);

          foreach ($doith as $key => $exorder) {

            if (in_array($key, $defaults['envo_hookshow_new'])) {

              // Get the real what id
              $whatid = 0;
              if (isset($defaults['whatid_' . $pdoith[$key]])) $whatid = $defaults['whatid_' . $pdoith[$key]];

              $envodb->query('INSERT INTO ' . $envotable2 . ' SET plugin = 1, hookid = "' . smartsql($key) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", orderid = "' . smartsql($exorder) . '"');

            }

          }

        }

        // Now check if all the sidebar a deselect and hooks exist, if so delete all associated to this page
        if (!isset($defaults['envo_hookshow_new']) && !isset($defaults['envo_hookshow'])) {

          // Now check if all the sidebar a deselected and hooks exist, if so delete all associated to this page
          $row = $envodb->queryRow('SELECT id FROM ' . $envotable2 . ' WHERE plugin = 1 AND hookid != 0');

          // We have something to delete
          if ($row["id"]) {
            $envodb->query('DELETE FROM ' . $envotable2 . ' WHERE plugin = 1 AND hookid != 0');
          }

        }

        // Save order or delete for extra sidebar widget
        if (isset($defaults['envo_hookshow']) && is_array($defaults['envo_hookshow'])) {

          $exorder    = $defaults['horder'];
          $hookid     = $defaults['real_hook_id'];
          $hookrealid = implode(',', $defaults['real_hook_id']);
          $doith      = array_combine($hookid, $exorder);

          // Reset update
          $updatesql = $updatesql1 = "";

          // Run the foreach for the hooks
          foreach ($doith as $key => $exorder) {

            // Get the real what id
            $row = $envodb->queryRow('SELECT pluginid FROM ' . $envotable2 . ' WHERE id = "' . smartsql($key) . '" AND hookid != 0');

            // Get the whatid
            $whatid = 0;
            if (isset($defaults['whatid_' . $row["pluginid"]])) $whatid = $defaults['whatid_' . $row["pluginid"]];

            if (in_array($key, $defaults['envo_hookshow'])) {
              $updatesql .= sprintf("WHEN %d THEN %d ", $key, $exorder);
              $updatesql1 .= sprintf("WHEN %d THEN %d ", $key, $whatid);

            } else {
              $envodb->query('DELETE FROM ' . $envotable2 . ' WHERE id = "' . smartsql($key) . '"');
            }
          }

          $envodb->query('UPDATE ' . $envotable2 . ' SET orderid = CASE id
					' . $updatesql . '
					END
					WHERE id IN (' . $hookrealid . ')');

          $envodb->query('UPDATE ' . $envotable2 . ' SET whatid = CASE id
					' . $updatesql1 . '
					END
					WHERE id IN (' . $hookrealid . ')');

        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=news&sp=setting&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=news&sp=setting&status=s');
        }
      } else {

        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // Get the sort orders for the grid
    $grid = $envodb->query('SELECT id, hookid, whatid, orderid FROM ' . $envotable2 . ' WHERE plugin = 1 ORDER BY orderid ASC');
    while ($grow = $grid->fetch_assoc()) {
      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $ENVO_PAGE_GRID[] = $grow;
    }

    // Get the sidebar templates
    $result = $envodb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable3 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
    while ($row = $result->fetch_assoc()) {
      $ENVO_HOOKS[] = $row;
    }

    // EN: Get all the php Hook by name of Hook
    // CZ: Načtení všech php dat z Hook podle jména Hook
    $ENVO_FORM_DATA = array();
    $hookpagei     = $envohooks->EnvoGethook("php_admin_pages_news_info");
    if ($hookpagei) {
      foreach ($hookpagei as $hpagi) {
        eval($hpagi['phpcode']);
      }
    }

    // Now let's check how to display the order
    $shownewsarray = explode(" ", $jkv["newsorder"]);

    if (is_array($shownewsarray) && in_array("ASC", $shownewsarray) || in_array("DESC", $shownewsarray)) {

      $ENVO_SETTING['shownewswhat']  = $shownewsarray[0];
      $ENVO_SETTING['shownewsorder'] = $shownewsarray[1];

    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["news_sec_title"]["newst2"];
    $SECTION_DESC  = $tl["news_sec_desc"]["newsd2"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'newssetting.php';

    break;
  default:

    // Important template Stuff
    $ENVO_CONTACT_FORMS = envo_get_page_info($envotable1, '');

    switch ($page1) {
      case 'lock':
        if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

          $result = $envodb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($page2) . '"');

          ENVO_tags::envoLockTags($page2, 1);

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=news&status=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=news&status=s');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=news&status=ene');
        }
        break;
      case 'delete':
        if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

          $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            envo_redirect(BASE_URL . 'index.php?p=news&status=e');
          } else {
            ENVO_tags::envoDeleteTags($page2, 1);

            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - úspěšné
            /*
            NOTIFIKACE:
            'status=s'    - Záznam úspěšně uložen
            'status1=s1'  - Záznam úspěšně odstraněn
            */
            envo_redirect(BASE_URL . 'index.php?p=news&status=s&status1=s1');
          }
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=news&status=ene');
        }
        break;
      case 'edit':
        if (envo_row_exist($page2, $envotable)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            // Delete the tags
            if (!empty($defaults['envo_tagdelete'])) {
              $tags = $defaults['envo_tagdelete'];

              for ($i = 0; $i < count($tags); $i++) {
                $tag = $tags[$i];

                ENVO_tags::envoDeleteOneTag($tag);

              }

            }

            // Delete the hits
            if (!empty($defaults['envo_delete_hits'])) {
              $envodb->query('UPDATE ' . $envotable . ' SET hits = 1 WHERE id = "' . smartsql($page2) . '"');
            }

            if (empty($defaults['envo_title'])) {
              $errors['e1'] = $tl['general_error']['generror18'] . '<br>';
            }

            if (!empty($defaults['envo_datetime'])) {
              $finaltime = $defaults['envo_datetime'];
            }

            if (!empty($defaults['envo_datefrom'])) {
              $finalfrom = strtotime($defaults['envo_datefrom']);
            }

            if (!empty($defaults['envo_dateto'])) {
              $finalto = strtotime($defaults['envo_dateto']);
            }

            if (isset($finalto) && isset($finalfrom) && $finalto < $finalfrom) {
              $errors['e2'] = $tl['general_error']['generror25'] . '<br>';
            }

            // Now do the dirty stuff in mysql
            if (count($errors) == 0) {

              // Save or update time of article
              if (empty($defaults['envo_update_time'])) {
                $insert .= 'time = "' . smartsql($finaltime) . '",';
              } else {
                $insert .= 'time = NOW(),';
              }

              // Save image
              if (empty($defaults['envo_img'])) $defaults['envo_img'] = '';

              // Update time
              if (!empty($defaults['envo_update_time'])) {
                $insert .= 'time = NOW(),';
              }

              // Save the time range if available of article
              if (isset($finalfrom)) {
                $insert .= 'startdate = "' . smartsql($finalfrom) . '",';
              }

              if (isset($finalto)) {
                $insert .= 'enddate = "' . smartsql($finalto) . '",';
              }

              if (!isset($defaults['envo_permission'])) {
                $permission = 0;
              } elseif (in_array(0, $defaults['envo_permission'])) {
                $permission = 0;
              } else {
                $permission = join(',', $defaults['envo_permission']);
              }

              // EN: Get all the php Hook by name of Hook
              // CZ: Načtení všech php dat z Hook podle jména Hook
              $hooknews = $envohooks->EnvoGethook("php_admin_news_sql");
              if ($hooknews) {
                foreach ($hooknews as $hne) {
                  eval($hne['phpcode']);
                }
              }

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
              */
              $result = $envodb->query('UPDATE ' . $envotable . ' SET
                        title = "' . smartsql($defaults['envo_title']) . '",
                        content = "' . smartsql($defaults['envo_content']) . '",
                        news_css = "' . smartsql($defaults['envo_css']) . '",
                        news_javascript = "' . smartsql($defaults['envo_javascript']) . '",
                        sidebar = "' . smartsql($defaults['envo_sidebar']) . '",
                        previmg = "' . smartsql($defaults['envo_img']) . '",
                        showtitle = "' . smartsql($defaults['envo_showtitle']) . '",
                        showcontact = "' . smartsql($defaults['envo_showcontact']) . '",
                        showdate = "' . smartsql($defaults['envo_showdate']) . '",
                        showhits = "' . smartsql($defaults['envo_showhits']) . '",
                        socialbutton = "' . smartsql($defaults['envo_social']) . '",
                        ' . $insert . '
                        permission = "' . smartsql($permission) . '"
                        WHERE id = "' . smartsql($page2) . '"');

              // Insert new stuff first if exist order for extra stuff
              if (isset($defaults['real_plugin_id'])) {
                $exorder  = $defaults['corder_new'];
                $pluginid = $defaults['real_plugin_id'];
                $doit     = array_combine($pluginid, $exorder);

                foreach ($doit as $key => $exorder) {

                  $envodb->query('INSERT INTO ' . $envotable2 . ' SET newsid = "' . $page2 . '", pluginid = "' . $key . '", orderid = "' . smartsql($exorder) . '"');

                }

              }

              // Save order for sidebar widget
              if (isset($defaults['envo_hookshow_new']) && is_array($defaults['envo_hookshow_new'])) {

                $exorder = $defaults['horder_new'];
                $hookid  = $defaults['real_hook_id_new'];
                $plugind = $defaults['sreal_plugin_id_new'];
                $doith   = array_combine($hookid, $exorder);
                $pdoith  = array_combine($hookid, $plugind);

                foreach ($doith as $key => $exorder) {

                  if (in_array($key, $defaults['envo_hookshow_new'])) {

                    // Get the real what id
                    $whatid = 0;
                    if (isset($defaults['whatid_' . $pdoith[$key]])) $whatid = $defaults['whatid_' . $pdoith[$key]];

                    $envodb->query('INSERT INTO ' . $envotable2 . ' SET newsid = "' . $page2 . '", hookid = "' . smartsql($key) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", orderid = "' . smartsql($exorder) . '", plugin = 1');

                  }

                }

              }

              // Save order for extra stuff
              $exorder  = $defaults['corder'];
              $pluginid = $defaults['real_id'];
              $realid   = implode(',', $defaults['real_id']);
              $doit     = array_combine($pluginid, $exorder);

              foreach ($doit as $key => $exorder) {
                $updatesql .= sprintf("WHEN %d THEN %d ", $key, $exorder);
              }

              $envodb->query('UPDATE ' . $envotable2 . ' SET orderid = CASE id
			' . $updatesql . '
			END
			WHERE id IN (' . $realid . ')');

              if (!isset($defaults['envo_hookshow_new']) && !isset($defaults['envo_hookshow'])) {

                // Now check if all the sidebar a deselected and hooks exist, if so delete all associated to this page
                $row = $envodb->queryRow('SELECT id FROM ' . $envotable2 . ' WHERE newsid = "' . smartsql($page2) . '" AND hookid != 0');

                // We have something to delete
                if ($row["id"]) {
                  $envodb->query('DELETE FROM ' . $envotable2 . ' WHERE newsid = "' . smartsql($page2) . '" AND hookid != 0');
                }

              }

              // Save order or delete for extra sidebar widget
              if (isset($defaults['envo_hookshow']) && is_array($defaults['envo_hookshow'])) {

                $exorder    = $defaults['horder'];
                $hookid     = $defaults['real_hook_id'];
                $hookrealid = implode(',', $defaults['real_hook_id']);
                $doith      = array_combine($hookid, $exorder);

                // Reset update
                $updatesql = $updatesql1 = "";

                // Run the foreach for the hooks
                foreach ($doith as $key => $exorder) {

                  // Get the real what id
                  $result = $envodb->query('SELECT pluginid FROM ' . $envotable2 . ' WHERE id = "' . smartsql($key) . '" AND hookid != 0');
                  $row    = $result->fetch_assoc();

                  // Get the whatid
                  $whatid = 0;
                  if (isset($defaults['whatid_' . $row["pluginid"]])) $whatid = $defaults['whatid_' . $row["pluginid"]];

                  if (in_array($key, $defaults['envo_hookshow'])) {
                    $updatesql .= sprintf("WHEN %d THEN %d ", $key, $exorder);
                    $updatesql1 .= sprintf("WHEN %d THEN %d ", $key, $whatid);

                  } else {
                    $envodb->query('DELETE FROM ' . $envotable2 . ' WHERE id = "' . smartsql($key) . '"');
                  }
                }

                $envodb->query('UPDATE ' . $envotable2 . ' SET orderid = CASE id
					' . $updatesql . '
					END
					WHERE id IN (' . $hookrealid . ')');

                $envodb->query('UPDATE ' . $envotable2 . ' SET whatid = CASE id
					' . $updatesql1 . '
					END
					WHERE id IN (' . $hookrealid . ')');

              }

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=news&sp=edit&ssp=' . $page2 . '&status=e');
              } else {

                // Set tag active to zero
                $tagactive = 0;

                if ($defaults['envo_active'] != 0) {

                  // Set tag active, well to active
                  $tagactive = 1;

                }

                // Create Tags if the module is active
                if (!empty($defaults['envo_tags'])) {
                  // check if tag does not exist and insert in cloud
                  ENVO_tags::envoBuildCloud($defaults['envo_tags'], smartsql($page2), 1);
                  // insert tag for normal use
                  ENVO_tags::envoInserTags($defaults['envo_tags'], smartsql($page2), 1, $tagactive);

                }

                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=news&sp=edit&ssp=' . $page2 . '&status=s');
              }
            } else {

              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }

          $ENVO_FORM_DATA = envo_get_data($page2, $envotable);
          if (ENVO_TAGS) $ENVO_TAGLIST = envo_get_tags($page2, 1);

          // Get the sort orders for the grid
          $grid = $envodb->query('SELECT id, pluginid, hookid, whatid, orderid FROM ' . $envotable2 . ' WHERE newsid = "' . smartsql($page2) . '" ORDER BY orderid ASC');
          while ($grow = $grid->fetch_assoc()) {
            // EN: Insert each record into array
            // CZ: Vložení získaných dat do pole
            $ENVO_PAGE_GRID[] = $grow;
          }

          // Get the sidebar templates
          $result = $envodb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable3 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
          while ($row = $result->fetch_assoc()) {
            $ENVO_HOOKS[] = $row;
          }

          // EN: Get all the php Hook by name of Hook
          // CZ: Načtení všech php dat z Hook podle jména Hook
          $hookpagei = $envohooks->EnvoGethook("php_admin_pages_news_info");
          if ($hookpagei) {
            foreach ($hookpagei as $hpagi) {
              eval($hpagi['phpcode']);
            }
          }

          // Get all usergroup's
          $ENVO_USERGROUP = envo_get_usergroup_all('usergroup');

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tl["news_sec_title"]["newst3"];
          $SECTION_DESC  = $tl["news_sec_desc"]["newsd3"];

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $template = 'editnews.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=news&status=ene');
        }
        break;
      case 'quickedit':
        if (envo_row_exist($page2, $envotable)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            if (empty($defaults['envo_title'])) {
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
              $result = $envodb->query('UPDATE ' . $envotable . ' SET
                        title = "' . smartsql($defaults['envo_title']) . '",
                        content = "' . smartsql($defaults['envo_lcontent']) . '"
                        WHERE id = "' . smartsql($page2) . '"');

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=news&sp=quickedit&ssp=' . $page2 . '&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=news&sp=quickedit&ssp=' . $page2 . '&status=s');
              }
            } else {

              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }

          // Get the data
          $ENVO_FORM_DATA = envo_get_data($page2, $envotable);

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $template = 'quickedit.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=news&status=ene');
        }
        break;
      default:

        // Get total news
        $getTotal = envo_get_total($envotable, '', '', '');
        if ($getTotal != 0) {

          // Paginator
          $pages                 = new ENVO_paginator;
          $pages->items_total    = $getTotal;
          $pages->mid_range      = $jkv["adminpagemid"];
          $pages->items_per_page = $jkv["adminpageitem"];
          $pages->envo_get_page   = $page1;
          $pages->envo_where      = 'index.php?p=news';
          $pages->paginate();
          $ENVO_PAGINATE = $pages->display_pages();

          // Call the news with paginate
          $ENVO_NEWS = envo_get_news_info($pages->limit);
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["news_sec_title"]["newst"];
        $SECTION_DESC  = $tl["news_sec_desc"]["newsd"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $template = 'news.php';
    }
}
?>