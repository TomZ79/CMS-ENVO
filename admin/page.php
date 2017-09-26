<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$JAK_MODULEM) envo_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'pages';
$envotable1 = DB_PREFIX . 'categories';
$envotable2 = DB_PREFIX . 'contactform';
$envotable3 = DB_PREFIX . 'pagesgrid';
$envotable4 = DB_PREFIX . 'news';
$envotable5 = DB_PREFIX . 'pluginhooks';
$envotable6 = DB_PREFIX . 'backup_content';

// EN: Get all the php Hook by name of Hook
// CZ: Načtení všech php dat z Hook podle jména Hook
$JAK_HOOK_ADMIN_PAGE     = $jakhooks->jakGethook("tpl_admin_page_news");
$JAK_HOOK_ADMIN_PAGE_NEW = $jakhooks->jakGethook("tpl_admin_page_news_new");

$insert = $updatesql = "";

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'newpage':

    // Important template stuff
    $JAK_CONTACT_FORMS = envo_get_page_info($envotable2, '');
    $JAK_GET_NEWS      = envo_get_page_info($envotable4, '');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (isset($_POST['btnSave'])) {
        // EN: If button "Save Changes" clicked
        // CZ: Pokud bylo stisknuto tlačítko "Uložit"

        if (empty($defaults['jak_title'])) {
          $errors['e1'] = $tl['page_error']['pageerror'] . '<br>';
        }

        // Now do the dirty stuff in mysql
        if (count($errors) == 0) {

          if (empty($defaults['jak_shownews'])) {
            $news = 0;
          } elseif (is_array($defaults['jak_shownews']) && in_array(0, $defaults['jak_shownews'])) {
            $news = 0;
          } else {
            $news = join(',', $defaults['jak_shownews']);
          }

          if (empty($news) && !empty($defaults['jak_shownewsordern']) && !empty($defaults['jak_shownewsmany'])) {
            $news = $defaults['jak_shownewsordern'] . ':' . $defaults['jak_shownewsorder'] . ':' . $defaults['jak_shownewsmany'];
          }

          // The new password encrypt with hash_hmac
          if ($defaults['jak_password']) {
            $passcrypt = hash_hmac('sha256', $defaults['jak_password'], DB_PASS_HASH);
            $insert .= 'password = "' . $passcrypt . '",';
          }

          // EN: Get all the php Hook by name of Hook
          // CZ: Načtení všech php dat z Hook podle jména Hook
          $hookpage = $jakhooks->jakGethook("php_admin_pages_sql");
          if ($hookpage) {
            foreach ($hookpage as $hpag) {
              eval($hpag['phpcode']);
            }
          }

          /* EN: Convert value
           * smartsql - secure method to insert form data into a MySQL DB
           * ------------------
           * CZ: Převod hodnot
           * smartsql - secure method to insert form data into a MySQL DB
          */
          $result = $envodb->query('INSERT INTO ' . $envotable . ' SET
                    catid = ' . smartsql($defaults['jak_catid']) . ',
                    title = "' . smartsql($defaults['jak_title']) . '",
                    content = "' . smartsql($defaults['jak_content']) . '",
                    page_css = "' . smartsql($defaults['jak_css']) . '",
                    page_javascript = "' . smartsql($defaults['jak_javascript']) . '",
                    sidebar = "' . smartsql($defaults['jak_sidebar']) . '",
                    shownav = "' . smartsql($defaults['jak_shownav']) . '",
                    showfooter = "' . smartsql($defaults['jak_showfooter']) . '",
                    showtitle = "' . smartsql($defaults['jak_showtitle']) . '",
                    showcontact = "' . smartsql($defaults['jak_showcontact']) . '",
                    shownews = "' . smartsql($news) . '",
                    showdate = "' . smartsql($defaults['jak_showdate']) . '",
                    showtags = "' . smartsql($defaults['jak_showtags']) . '",
                    showlogin = "' . smartsql($defaults['jak_showlogin']) . '",
                    socialbutton = "' . smartsql($defaults['jak_social']) . '",
                    ' . $insert . '
                    time = NOW()');

          $rowid = $envodb->envo_last_id();

          // Save order for extra stuff
          $exorder  = $defaults['corder_new'];
          $pluginid = $defaults['real_plugin_id'];
          $doit     = array_combine($pluginid, $exorder);

          foreach ($doit as $key => $exorder) {

            $envodb->query('INSERT INTO ' . $envotable3 . ' SET pageid = "' . smartsql($rowid) . '", pluginid = "' . smartsql($key) . '", orderid = "' . smartsql($exorder) . '"');

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

                $envodb->query('INSERT INTO ' . $envotable3 . ' SET pageid = "' . smartsql($rowid) . '", hookid = "' . smartsql($key) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", orderid = "' . smartsql($exorder) . '"');

              }

            }

          }

          // Set tag active to zero
          $tagactive = 0;

          if ($defaults['jak_catid'] != '0') {
            $envodb->query('UPDATE ' . $envotable1 . ' SET pageid = "' . smartsql($rowid) . '" WHERE id = "' . smartsql($defaults['jak_catid']) . '"');

            // Set tag active, well to active
            $tagactive = 1;
          }

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=page&sp=newpage&status=e');
          } else {

            // Create Tags if the module is active
            if (!empty($defaults['jak_tags'])) {
              // check if tag does not exist and insert in cloud
              JAK_tags::jakBuildcloud($defaults['jak_tags'], $rowid, 0);
              // insert tag for normal use
              JAK_tags::jakInsertags($defaults['jak_tags'], $rowid, 0, $tagactive);
            }
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=page&sp=edit&ssp=' . $rowid . '&status=s');
          }
        } else {
          $errors['e'] = $tl['general_error']['generror'] . '<br>';
          $errors      = $errors;
        }
      }  else {
        // EN: If no button pressed
        // CZ: Pokud nebylo stisknuto žádné tlačítko

      }
    }

    $JAK_CAT_NOTUSED = envo_get_cat_notused();

    // Get the sidebar templates
    $result = $envodb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable5 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
    while ($row = $result->fetch_assoc()) {
      $JAK_HOOKS[] = $row;
    }

    // EN: Get all the php Hook by name of Hook
    // CZ: Načtení všech php dat z Hook podle jména Hook
    $ENVO_FORM_DATA = array();
    $hookpagei     = $jakhooks->jakGethook("php_admin_pages_news_info");
    if ($hookpagei) {
      foreach ($hookpagei as $hpagi) {
        eval($hpagi['phpcode']);
      }
    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["page_sec_title"]["paget1"];
    $SECTION_DESC  = $tl["page_sec_desc"]["paged1"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'newpage.php';

    break;
  default:

    // Important template stuff
    $JAK_CAT           = envo_get_cat_info($envotable1, 1);
    $JAK_CONTACT_FORMS = envo_get_page_info($envotable2, '');

    switch ($page1) {
      case 'search':

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (isset($defaults['search'])) {

            if ($defaults['jakSH'] == '' or $defaults['jakSH'] == $tl['search']['s']) {
              $errors['e'] = $tl['search']['s1'] . '<br>';
            }

            if (strlen($defaults['jakSH']) < '1') {
              $errors['e1'] = $tl['search']['s2'] . '<br>';
            }

            if (count($errors) > 0) {

              $errors['e2'] = $tl['search']['s3'] . '<br>';
              $errors       = $errors;

            } else {
              $secureIn    = smartsql(strip_tags($defaults['jakSH']));
              $SEARCH_WORD = $secureIn;
              $JAK_SEARCH  = envo_admin_search($secureIn, $envotable, 'pages');
            }
          }

        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["page_sec_title"]["paget2"];
        $SECTION_DESC  = $tl["page_sec_desc"]["paged2"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $template = 'searchpages.php';

        break;
      case 'lock':

        $result = $envodb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($page2) . '"');

        JAK_tags::jakLocktags($page2, 0);

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=page&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=page&status=s');
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
          $pages->jak_where      = 'index.php?p=page&sp=sort&ssp=' . $page2 . '&sssp=' . $page3;
          $pages->paginate();
          $JAK_PAGINATE = $pages->display_pages();
        }

        $result = $envodb->query('SELECT * FROM ' . $envotable . ' ORDER BY ' . $page2 . ' ' . $page3 . ' ' . $pages->limit);
        while ($row = $result->fetch_assoc()) {
          $pagearray[] = $row;
        }

        $JAK_PAGE_ALL = $pagearray;

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["page_sec_title"]["paget3"];
        $SECTION_DESC  = $tl["page_sec_desc"]["paged3"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $template = 'pages.php';

        break;
      case 'delete':
        if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

          $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');
          $envodb->query('UPDATE ' . $envotable1 . ' SET pageid = 0 WHERE pageid = "' . smartsql($page2) . '"');
          $envodb->query('DELETE FROM ' . $envotable3 . ' WHERE pageid = "' . smartsql($page2) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            envo_redirect(BASE_URL . 'index.php?p=page&status=e');
          } else {
            JAK_tags::jakDeletetags($page2, 0);

            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - úspěšné
            /*
            NOTIFIKACE:
            'status=s'    - Záznam úspěšně uložen
            'status1=s1'  - Záznam úspěšně odstraněn
            */
            envo_redirect(BASE_URL . 'index.php?p=page&status=s&status1=s1');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=page&status=ene');
        }
        break;
      case 'edit':

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

            // Delete the password
            if (!empty($defaults['jak_delete_password'])) {
              $defaults['jak_password'] = '';
              $envodb->query('UPDATE ' . $envotable . ' SET password = NULL WHERE id = "' . smartsql($page2) . '"');
            }

            // Delete the hits
            if (!empty($defaults['jak_delete_hits'])) {
              $envodb->query('UPDATE ' . $envotable . ' SET hits = 1 WHERE id = "' . smartsql($page2) . '"');
            }

            if (empty($defaults['jak_title'])) {
              $errors['e1'] = $tl['page_error']['pageerror'] . '<br>';
            }

            // Now do the dirty stuff
            if (count($errors) == 0) {

              // Update time
              if (!empty($defaults['jak_update_time'])) {
                $insert .= 'time = NOW(),';
              }

              if (empty($defaults['jak_shownews'])) {
                $news = 0;
              } elseif (is_array($defaults['jak_shownews']) && in_array(0, $defaults['jak_shownews'])) {
                $news = 0;
              } else {
                $news = join(',', $defaults['jak_shownews']);
              }

              if (empty($news) && !empty($defaults['jak_shownewsordern']) && !empty($defaults['jak_shownewsmany'])) {
                $news = $defaults['jak_shownewsordern'] . ':' . $defaults['jak_shownewsorder'] . ':' . $defaults['jak_shownewsmany'];
              }

              // The new password encrypt with hash_hmac
              if ($defaults['jak_password']) {
                $insert .= 'password = "' . hash_hmac('sha256', $defaults['jak_password'], DB_PASS_HASH) . '",';
              }

              // EN: Get all the php Hook by name of Hook
              // CZ: Načtení všech php dat z Hook podle jména Hook
              $hookpage = $jakhooks->jakGethook("php_admin_pages_sql");
              if ($hookpage) {
                foreach ($hookpage as $hpag) {
                  eval($hpag['phpcode']);
                }
              }

              // Get the old content first
              $rowsb = $envodb->queryRow('SELECT content FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');

              // Insert the content into the backup table
              $envodb->query('INSERT INTO ' . $envotable6 . ' SET
		    	pageid = "' . smartsql($page2) . '",
		    	content = "' . smartsql($rowsb['content']) . '",
		    	time = NOW()');

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
              */
              $result = $envodb->query('UPDATE ' . $envotable . ' SET
                        catid = "' . smartsql($defaults['jak_catid']) . '",
                        title = "' . smartsql($defaults['jak_title']) . '",
                        content = "' . smartsql($defaults['jak_content']) . '",
                        page_css = "' . smartsql($defaults['jak_css']) . '",
                        page_javascript = "' . smartsql($defaults['jak_javascript']) . '",
                        sidebar = "' . smartsql($defaults['jak_sidebar']) . '",
                        shownav = "' . smartsql($defaults['jak_shownav']) . '",
                        showfooter = "' . smartsql($defaults['jak_showfooter']) . '",
                        showtitle = "' . smartsql($defaults['jak_showtitle']) . '",
                        showcontact = "' . smartsql($defaults['jak_showcontact']) . '",
                        shownews = "' . smartsql($news) . '",
                        showdate = "' . smartsql($defaults['jak_showdate']) . '",
                        showtags = "' . smartsql($defaults['jak_showtags']) . '",
                        showlogin = "' . smartsql($defaults['jak_showlogin']) . '",
                        ' . $insert . '
                        socialbutton = "' . smartsql($defaults['jak_social']) . '"
                        WHERE id = "' . smartsql($page2) . '"');

              // Insert new stuff first if exist order for extra stuff
              if (isset($defaults['real_plugin_id'])) {
                $exorder  = $defaults['corder_new'];
                $pluginid = $defaults['real_plugin_id'];
                $doit     = array_combine($pluginid, $exorder);

                foreach ($doit as $key => $exorder) {

                  $envodb->query('INSERT INTO ' . $envotable3 . ' SET pageid = "' . smartsql($page2) . '", pluginid = "' . smartsql($key) . '", orderid = "' . smartsql($exorder) . '"');

                }

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

                    $envodb->query('INSERT INTO ' . $envotable3 . ' SET pageid = "' . smartsql($page2) . '", hookid = "' . smartsql($key) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", orderid = "' . smartsql($exorder) . '"');

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

              $envodb->query('UPDATE ' . $envotable3 . ' SET orderid = CASE id
              ' . $updatesql . '
              END
              WHERE id IN (' . $realid . ')');

              if (!isset($defaults['jak_hookshow_new']) && !isset($defaults['jak_hookshow'])) {

                // Now check if all the sidebar a deselected and hooks exist, if so delete all associated to this page
                $row = $envodb->queryRow('SELECT id FROM ' . $envotable3 . ' WHERE pageid = "' . smartsql($page2) . '" AND hookid != 0');

                // We have something to delete
                if ($row["id"]) {
                  $envodb->query('DELETE FROM ' . $envotable3 . ' WHERE pageid = "' . smartsql($page2) . '" AND hookid != 0');
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
                  $result = $envodb->query('SELECT pluginid FROM ' . $envotable3 . ' WHERE id = "' . smartsql($key) . '" AND hookid != 0');
                  $row    = $result->fetch_assoc();

                  $whatid = 0;
                  if (isset($defaults['whatid_' . $row["pluginid"]])) $whatid = $defaults['whatid_' . $row["pluginid"]];

                  if (in_array($key, $defaults['jak_hookshow'])) {
                    $updatesql .= sprintf("WHEN %d THEN %d ", $key, $exorder);
                    $updatesql1 .= sprintf("WHEN %d THEN %d ", $key, $whatid);

                  } else {
                    $envodb->query('DELETE FROM ' . $envotable3 . ' WHERE id = "' . smartsql($key) . '"');
                  }
                }

                $envodb->query('UPDATE ' . $envotable3 . ' SET orderid = CASE id
																' . $updatesql . '
																END
																WHERE id IN (' . $hookrealid . ')');

                $envodb->query('UPDATE ' . $envotable3 . ' SET whatid = CASE id
																' . $updatesql1 . '
																END
																WHERE id IN (' . $hookrealid . ')');

              }

              // Set tag active to zero
              $tagactive = 0;

              if ($defaults['jak_oldcatid'] != 0) $tagactive = 1;

              if ($defaults['jak_catid'] != $defaults['jak_oldcatid']) {

                if ($defaults['jak_catid'] == 0) {

                  $envodb->query('UPDATE ' . $envotable1 . ' SET pageid = 0 WHERE id = "' . smartsql($defaults['jak_oldcatid']) . '"');

                } else {

                  $envodb->query('UPDATE ' . $envotable1 . ' SET pageid = 0 WHERE id = "' . smartsql($defaults['jak_oldcatid']) . '"');
                  $envodb->query('UPDATE ' . $envotable1 . ' SET pageid = "' . smartsql($page2) . '" WHERE id = "' . smartsql($defaults['jak_catid']) . '"');

                }

                // Set tag active, well to active
                $tagactive = 1;
              }

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=page&sp=edit&ssp=' . $page2 . '&status=e');
              } else {

                // Create Tags if the module is active
                if (!empty($defaults['jak_tags'])) {
                  // check if tag does not exist and insert in cloud
                  JAK_tags::jakBuildcloud($defaults['jak_tags'], smartsql($page2), 0);
                  // insert tag for normal use
                  JAK_tags::jakInsertags($defaults['jak_tags'], smartsql($page2), 0, $tagactive);
                }

                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=page&sp=edit&ssp=' . $page2 . '&status=s');
              }

            } else {

              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }

          // Get the data
          $ENVO_FORM_DATA   = envo_get_data($page2, $envotable);
          $JAK_GET_NEWS    = envo_get_page_info($envotable4, '');
          $JAK_CAT_NOTUSED = envo_get_cat_notused();

          // Now let's check if we display news with second option
          $shownewsarray = explode(":", $ENVO_FORM_DATA['shownews']);

          if (is_array($shownewsarray) && in_array("ASC", $shownewsarray) || in_array("DESC", $shownewsarray)) {

            $ENVO_FORM_DATA['shownewswhat']  = $shownewsarray[0];
            $ENVO_FORM_DATA['shownewsorder'] = $shownewsarray[1];
            $ENVO_FORM_DATA['shownewsmany']  = $shownewsarray[2];

          }

          // Get the tags
          if (JAK_TAGS) $JAK_TAGLIST = envo_get_tags($page2, 0);

          // Get the sort orders for the grid
          $grid = $envodb->query('SELECT id, pluginid, hookid, whatid, orderid FROM ' . $envotable3 . ' WHERE pageid = "' . smartsql($page2) . '" ORDER BY orderid ASC');
          while ($grow = $grid->fetch_assoc()) {
            // EN: Insert each record into array
            // CZ: Vložení získaných dat do pole
            $JAK_PAGE_GRID[] = $grow;
          }

          // Get the sidebar templates
          $result = $envodb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable5 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
          while ($row = $result->fetch_assoc()) {
            $JAK_HOOKS[] = $row;
          }

          // EN: Get all the php Hook by name of Hook
          // CZ: Načtení všech php dat z Hook podle jména Hook
          $hookpagei = $jakhooks->jakGethook("php_admin_pages_news_info");
          if ($hookpagei) {
            foreach ($hookpagei as $hpagi) {
              eval($hpagi['phpcode']);
            }
          }

          // First we delete the old records, older then 30 days
          $envodb->query('DELETE FROM ' . $envotable6 . ' WHERE pageid = "' . smartsql($page2) . '" AND DATEDIFF(CURDATE(), time) > 30');

          // Get the backup content
          $resultbp = $envodb->query('SELECT id, time FROM ' . $envotable6 . ' WHERE pageid = "' . smartsql($page2) . '" ORDER BY id DESC LIMIT 10');
          while ($rowbp = $resultbp->fetch_assoc()) {
            // EN: Insert each record into array
            // CZ: Vložení získaných dat do pole
            $JAK_PAGE_BACKUP[] = $rowbp;
          }

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tl["page_sec_title"]["paget4"];
          $SECTION_DESC  = $tl["page_sec_desc"]["paged4"];

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $template = 'editpage.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=page&status=ene');
        }
        break;
      case 'quickedit':
        if (envo_row_exist($page2, $envotable)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            if (empty($defaults['jak_title'])) {
              $errors['e1'] = $tl['page_error']['pageerror'] . '<br>';
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
                        title = "' . smartsql($defaults['jak_title']) . '",
                        content = "' . smartsql($defaults['jak_lcontent']) . '"
                        WHERE id = "' . smartsql($page2) . '"');

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=page&sp=quickedit&ssp=' . $page2 . '&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=page&sp=quickedit&ssp=' . $page2 . '&status=s');
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
          envo_redirect(BASE_URL . 'index.php?p=page&status=ene');
        }
        break;
      default:

        // Do we have a post access
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['jak_delete_page'])) {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (isset($defaults['lock'])) {

            $lockuser = $defaults['jak_delete_page'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];
              $result = $envodb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($locked) . '"');
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=page&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=page&status=s');
            }

          }

          if (isset($defaults['delete'])) {

            $lockuser = $defaults['jak_delete_page'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked  = $lockuser[$i];
              $result  = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($locked) . '"');
              $result1 = $envodb->query('UPDATE ' . $envotable1 . ' SET pageid = 0 WHERE pageid = "' . smartsql($locked) . '"');
              JAK_tags::jakDeletetags($locked, 0);
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky s notifikací - chybné
              envo_redirect(BASE_URL . 'index.php?p=page&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky s notifikací - úspěšné
              /*
              NOTIFIKACE:
              'status=s'    - Záznam úspěšně uložen
              'status1=s1'  - Záznam úspěšně odstraněn
              */
              envo_redirect(BASE_URL . 'index.php?p=page&status=s&status1=s1');
            }

          }

        }

        $getTotal = envo_get_total($envotable, '', '', '');
        if ($getTotal != 0) {

          // Paginator
          $pages                 = new JAK_Paginator;
          $pages->items_total    = $getTotal;
          $pages->mid_range      = $jkv["adminpagemid"];
          $pages->items_per_page = $jkv["adminpageitem"];
          $pages->jak_get_page   = $page1;
          $pages->jak_where      = 'index.php?p=page';
          $pages->paginate();
          $JAK_PAGINATE = $pages->display_pages();

          // Ouput all pages, well with paginate of course
          $JAK_PAGE_ALL = envo_get_page_info($envotable, $pages->limit);

        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["page_sec_title"]["paget"];
        $SECTION_DESC  = $tl["page_sec_desc"]["paged"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $template = 'pages.php';
    }
}
?>