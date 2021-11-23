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
$envotable  = DB_PREFIX . 'pages';
$envotable1 = DB_PREFIX . 'categories';
$envotable2 = DB_PREFIX . 'pagesgrid';
$envotable3 = DB_PREFIX . 'news';
$envotable4 = DB_PREFIX . 'pluginhooks';
$envotable5 = DB_PREFIX . 'backup_content';

$insert = $updatesql = "";

// EN: Get all the php Hook by name of Hook
// CZ: Načtení všech php dat z Hook podle jména Hook
$ENVO_HOOK_ADMIN_PAGE     = $envohooks->EnvoGethook("tpl_admin_page_news");
$ENVO_HOOK_ADMIN_PAGE_NEW = $envohooks->EnvoGethook("tpl_admin_page_news_new");

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'newpage':
    // ADD NEW PAGE TO DB

    // Important template stuff
    $ENVO_GET_NEWS = envo_get_page_info($envotable3, '');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (isset($_POST['btnSave'])) {
        // EN: If button "Save Changes" clicked
        // CZ: Pokud bylo stisknuto tlačítko "Uložit"

        if (empty($defaults['envo_title'])) {
          $errors['e1'] = $tl['page_error']['pageerror'] . '<br>';
        }

        // Now do the dirty stuff in mysql
        if (count($errors) == 0) {

          if (empty($defaults['envo_shownews'])) {
            $news = 0;
          } elseif (is_array($defaults['envo_shownews']) && in_array(0, $defaults['envo_shownews'])) {
            $news = 0;
          } else {
            $news = join(',', $defaults['envo_shownews']);
          }

          if (empty($news) && !empty($defaults['envo_shownewsordern']) && !empty($defaults['envo_shownewsmany'])) {
            $news = $defaults['envo_shownewsordern'] . ':' . $defaults['envo_shownewsorder'] . ':' . $defaults['envo_shownewsmany'];
          }

          // The new password encrypt with hash_hmac
          if ($defaults['envo_password']) {
            $passcrypt = hash_hmac('sha256', $defaults['envo_password'], DB_PASS_HASH);
            $insert    .= 'password = "' . $passcrypt . '",';
          }

          // EN: Get all the php Hook by name of Hook
          // CZ: Načtení všech php dat z Hook podle jména Hook
          $hookpage = $envohooks->EnvoGethook("php_admin_pages_sql");
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
                    catid = ' . smartsql($defaults['envo_catid']) . ',
                    title = "' . smartsql($defaults['envo_title']) . '",
                    content = "' . smartsql($defaults['envo_content']) . '",
                    page_css = "' . smartsql($defaults['envo_css']) . '",
                    page_javascript = "' . smartsql($defaults['envo_javascript']) . '",
                    sidebarshow = "' . smartsql($defaults['envo_sidebar_show']) . '",
                    sidebar = "' . smartsql($defaults['envo_sidebar']) . '",
                    shownav = "' . smartsql($defaults['envo_shownav']) . '",
                    showfooter = "' . smartsql($defaults['envo_showfooter']) . '",
                    showtitle = "' . smartsql($defaults['envo_showtitle']) . '",
                    shownews = "' . smartsql($news) . '",
                    showdate = "' . smartsql($defaults['envo_showdate']) . '",
                    showhits = "' . smartsql($defaults['envo_showhits']) . '",
                    showtags = "' . smartsql($defaults['envo_showtags']) . '",
                    socialbutton = "' . smartsql($defaults['envo_social']) . '",
                    ' . $insert . '
                    time = NOW()');

          $rowid = $envodb->envo_last_id();

          // Save order for extra stuff
          $exorder  = $defaults['corder_new'];
          $pluginid = $defaults['real_plugin_id'];
          $doit     = array_combine($pluginid, $exorder);

          foreach ($doit as $key => $exorder) {

            $envodb->query('INSERT INTO ' . $envotable2 . ' SET pageid = "' . smartsql($rowid) . '", pluginid = "' . smartsql($key) . '", orderid = "' . smartsql($exorder) . '"');

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

                $envodb->query('INSERT INTO ' . $envotable2 . ' SET pageid = "' . smartsql($rowid) . '", hookid = "' . smartsql($key) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", orderid = "' . smartsql($exorder) . '"');

              }

            }

          }

          // Set tag active to zero
          $tagactive = 0;

          if ($defaults['envo_catid'] != '0') {
            $envodb->query('UPDATE ' . $envotable1 . ' SET pageid = "' . smartsql($rowid) . '" WHERE id = "' . smartsql($defaults['envo_catid']) . '"');

            // Set tag active, well to active
            $tagactive = 1;
          }

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=page&sp=newpage&status=e');
          } else {

            // Create Tags if the module is active
            if (!empty($defaults['envo_tags'])) {
              // check if tag does not exist and insert in cloud
              ENVO_tags::envoBuildCloud($defaults['envo_tags'], $rowid, 0);
              // insert tag for normal use
              ENVO_tags::envoInserTags($defaults['envo_tags'], $rowid, 0, $tagactive);
            }
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=page&sp=edit&id=' . $rowid . '&status=s');
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

    $ENVO_CAT_NOTUSED = envo_get_cat_notused();

    // Get the sidebar templates
    $result = $envodb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable4 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
    while ($row = $result->fetch_assoc()) {
      $ENVO_HOOKS[] = $row;
    }

    // EN: Get all the php Hook by name of Hook
    // CZ: Načtení všech php dat z Hook podle jména Hook
    $ENVO_FORM_DATA = array();
    $hookpagei      = $envohooks->EnvoGethook("php_admin_pages_news_info");
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
  case 'edit':
    // EDIT PAGE

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $pageID = $page2;

    if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

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

        // Delete the password
        if (!empty($defaults['envo_delete_password'])) {
          $defaults['envo_password'] = '';
          $envodb->query('UPDATE ' . $envotable . ' SET password = NULL WHERE id = "' . smartsql($pageID) . '"');
        }

        // Delete the hits
        if (!empty($defaults['envo_delete_hits'])) {
          $envodb->query('UPDATE ' . $envotable . ' SET hits = 1 WHERE id = "' . smartsql($pageID) . '"');
        }

        if (empty($defaults['envo_title'])) {
          $errors['e1'] = $tl['page_error']['pageerror'] . '<br>';
        }

        // Now do the dirty stuff
        if (count($errors) == 0) {

          // Update time
          if (!empty($defaults['envo_update_time'])) {
            $insert .= 'time = NOW(),';
          }

          if (empty($defaults['envo_shownews'])) {
            $news = 0;
          } elseif (is_array($defaults['envo_shownews']) && in_array(0, $defaults['envo_shownews'])) {
            $news = 0;
          } else {
            $news = join(',', $defaults['envo_shownews']);
          }

          if (empty($news) && !empty($defaults['envo_shownewsordern']) && !empty($defaults['envo_shownewsmany'])) {
            $news = $defaults['envo_shownewsordern'] . ':' . $defaults['envo_shownewsorder'] . ':' . $defaults['envo_shownewsmany'];
          }

          // The new password encrypt with hash_hmac
          if ($defaults['envo_password']) {
            $insert .= 'password = "' . hash_hmac('sha256', $defaults['envo_password'], DB_PASS_HASH) . '",';
          }

          // EN: Get all the php Hook by name of Hook
          // CZ: Načtení všech php dat z Hook podle jména Hook
          $hookpage = $envohooks->EnvoGethook("php_admin_pages_sql");
          if ($hookpage) {
            foreach ($hookpage as $hpag) {
              eval($hpag['phpcode']);
            }
          }

          // Get the old content first
          $rowsb = $envodb->queryRow('SELECT content FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '"');

          // Insert the content into the backup table
          $envodb->query('INSERT INTO ' . $envotable5 . ' SET
		    	pageid = "' . smartsql($pageID) . '",
		    	content = "' . smartsql($rowsb['content']) . '",
		    	time = NOW()');

          /* EN: Convert value
           * smartsql - secure method to insert form data into a MySQL DB
           * ------------------
           * CZ: Převod hodnot
           * smartsql - secure method to insert form data into a MySQL DB
          */
          $result = $envodb->query('UPDATE ' . $envotable . ' SET
                        catid = "' . smartsql($defaults['envo_catid']) . '",
                        title = "' . smartsql($defaults['envo_title']) . '",
                        content = "' . smartsql($defaults['envo_content']) . '",
                        page_css = "' . smartsql($defaults['envo_css']) . '",
                        page_javascript = "' . smartsql($defaults['envo_javascript']) . '",
                        sidebarshow = "' . smartsql($defaults['envo_sidebar_show']) . '",
                        sidebar = "' . smartsql($defaults['envo_sidebar']) . '",
                        shownav = "' . smartsql($defaults['envo_shownav']) . '",
                        showfooter = "' . smartsql($defaults['envo_showfooter']) . '",
                        showtitle = "' . smartsql($defaults['envo_showtitle']) . '",
                        shownews = "' . smartsql($news) . '",
                        showdate = "' . smartsql($defaults['envo_showdate']) . '",
                        showhits = "' . smartsql($defaults['envo_showhits']) . '",
                        showtags = "' . smartsql($defaults['envo_showtags']) . '",
                        ' . $insert . '
                        socialbutton = "' . smartsql($defaults['envo_social']) . '"
                        WHERE id = "' . smartsql($pageID) . '"');

          // Insert new stuff first if exist order for extra stuff
          if (isset($defaults['real_plugin_id'])) {
            $exorder  = $defaults['corder_new'];
            $pluginid = $defaults['real_plugin_id'];
            $doit     = array_combine($pluginid, $exorder);

            foreach ($doit as $key => $exorder) {

              $envodb->query('INSERT INTO ' . $envotable2 . ' SET pageid = "' . smartsql($pageID) . '", pluginid = "' . smartsql($key) . '", orderid = "' . smartsql($exorder) . '"');

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

                $envodb->query('INSERT INTO ' . $envotable2 . ' SET pageid = "' . smartsql($pageID) . '", hookid = "' . smartsql($key) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", orderid = "' . smartsql($exorder) . '"');

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
            $row = $envodb->queryRow('SELECT id FROM ' . $envotable2 . ' WHERE pageid = "' . smartsql($pageID) . '" AND hookid != 0');

            // We have something to delete
            if ($row["id"]) {
              $envodb->query('DELETE FROM ' . $envotable2 . ' WHERE pageid = "' . smartsql($pageID) . '" AND hookid != 0');
            }

          }

          // Save order or delete for extra sidebar widget
          if (isset($defaults['envo_hookshow']) && is_array($defaults['envo_hookshow'])) {

            $exorder    = $defaults['horder'];
            $hookid     = $defaults['real_hook_id'];
            $hookrealid = implode(',', $defaults['real_hook_id']);
            $doith      = array_combine($hookid, $exorder);

            foreach ($doith as $key => $exorder) {

              // Get the real what id
              $result = $envodb->query('SELECT pluginid FROM ' . $envotable2 . ' WHERE id = "' . smartsql($key) . '" AND hookid != 0');
              $row    = $result->fetch_assoc();

              $whatid = 0;
              if (isset($defaults['whatid_' . $row["pluginid"]])) $whatid = $defaults['whatid_' . $row["pluginid"]];

              if (in_array($key, $defaults['envo_hookshow'])) {
                $updatesql  .= sprintf("WHEN %d THEN %d ", $key, $exorder);
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

          // Set tag active to zero
          $tagactive = 0;

          if ($defaults['envo_oldcatid'] != 0) $tagactive = 1;

          if ($defaults['envo_catid'] != $defaults['envo_oldcatid']) {

            if ($defaults['envo_catid'] == 0) {

              $envodb->query('UPDATE ' . $envotable1 . ' SET pageid = 0 WHERE id = "' . smartsql($defaults['envo_oldcatid']) . '"');

            } else {

              $envodb->query('UPDATE ' . $envotable1 . ' SET pageid = 0 WHERE id = "' . smartsql($defaults['envo_oldcatid']) . '"');
              $envodb->query('UPDATE ' . $envotable1 . ' SET pageid = "' . smartsql($pageID) . '" WHERE id = "' . smartsql($defaults['envo_catid']) . '"');

            }

            // Set tag active, well to active
            $tagactive = 1;
          }

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=page&sp=edit&id=' . $pageID . '&status=e');
          } else {

            // Create Tags if the module is active
            if (!empty($defaults['envo_tags'])) {
              // check if tag does not exist and insert in cloud
              ENVO_tags::envoBuildCloud($defaults['envo_tags'], smartsql($pageID), 0);
              // insert tag for normal use
              ENVO_tags::envoInserTags($defaults['envo_tags'], smartsql($pageID), 0, $tagactive);
            }

            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=page&sp=edit&id=' . $pageID . '&status=s');
          }

        } else {

          $errors['e'] = $tl['general_error']['generror'] . '<br>';
          $errors      = $errors;
        }
      }

      // Get the data
      $ENVO_FORM_DATA   = envo_get_data($pageID, $envotable);
      $ENVO_GET_NEWS    = envo_get_page_info($envotable3, '');
      $ENVO_CAT_NOTUSED = envo_get_cat_notused();
      $ENVO_CAT         = envo_get_cat_info($envotable1, 1);

      // Now let's check if we display news with second option
      $shownewsarray = explode(":", $ENVO_FORM_DATA['shownews']);

      if (is_array($shownewsarray) && in_array("ASC", $shownewsarray) || in_array("DESC", $shownewsarray)) {

        $ENVO_FORM_DATA['shownewswhat']  = $shownewsarray[0];
        $ENVO_FORM_DATA['shownewsorder'] = $shownewsarray[1];
        $ENVO_FORM_DATA['shownewsmany']  = $shownewsarray[2];

      }

      // Get the tags
      if (ENVO_TAGS) $ENVO_TAGLIST = envo_get_tags($pageID, 0);

      // EN: Getting data from DB for the grid of page
      // CZ: Získání dat z DB pro mřížku stránky
      $grid = $envodb->query('SELECT id, pluginid, hookid, whatid, orderid FROM ' . $envotable2 . ' WHERE pageid = "' . smartsql($pageID) . '" ORDER BY orderid ASC');
      while ($grow = $grid->fetch_assoc()) {
        // EN: Insert each record into array
        // CZ: Vložení získaných dat do pole
        $ENVO_PAGE_GRID[] = $grow;
      }

      // Get the sidebar templates
      $result = $envodb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable4 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
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

      // First we delete the old records, older then 30 days
      $envodb->query('DELETE FROM ' . $envotable5 . ' WHERE pageid = "' . smartsql($pageID) . '" AND DATEDIFF(CURDATE(), time) > 30');

      // Get the backup content
      $resultbp = $envodb->query('SELECT id, time FROM ' . $envotable5 . ' WHERE pageid = "' . smartsql($pageID) . '" ORDER BY id DESC LIMIT 10');
      while ($rowbp = $resultbp->fetch_assoc()) {
        // EN: Insert each record into array
        // CZ: Vložení získaných dat do pole
        $ENVO_PAGE_BACKUP[] = $rowbp;
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
  case 'lock':
    // LIST OF PAGES - LOCK PAGE IN DB

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $pageID = $page2;

    $result = $envodb->query('UPDATE ' . $envotable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($pageID) . '"');

    ENVO_tags::envoLockTags($pageID, 0);

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
  case 'delete':
    // LIST OF PAGES - DELETE PAGE FROM DB

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $pageID = $page2;

    if (is_numeric($pageID) && envo_row_exist($pageID, $envotable)) {

      $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($pageID) . '"');
      $envodb->query('UPDATE ' . $envotable1 . ' SET pageid = 0 WHERE pageid = "' . smartsql($pageID) . '"');
      $envodb->query('DELETE FROM ' . $envotable2 . ' WHERE pageid = "' . smartsql($pageID) . '"');

      if (!$result) {
        // EN: Redirect page
        // CZ: Přesměrování stránky s notifikací - chybné
        envo_redirect(BASE_URL . 'index.php?p=page&status=e');
      } else {
        ENVO_tags::envoDeleteTags($pageID, 0);

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
  case 'quickedit':
    // FRONTED - QUICK EDIT PAGE

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $pageID = $page2;

    if (envo_row_exist($pageID, $envotable)) {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // EN: Default Variable
        // CZ: Hlavní proměnné
        $defaults = $_POST;

        if (empty($defaults['envo_title'])) {
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
                        title = "' . smartsql($defaults['envo_title']) . '",
                        content = "' . smartsql($defaults['envo_lcontent']) . '"
                        WHERE id = "' . smartsql($pageID) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=page&sp=quickedit&id=' . $pageID . '&status=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=page&sp=quickedit&id=' . $pageID . '&status=s');
          }
        } else {

          $errors['e'] = $tl['general_error']['generror'] . '<br>';
          $errors      = $errors;
        }
      }

      // Get the data
      $ENVO_FORM_DATA = envo_get_data($pageID, $envotable);

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
    // LIST OF PAGES

    // EN: POST REQUEST
    // CZ: POST REQUEST
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envo_delete_page'])) {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (isset($defaults['lock'])) {

        $lockuser = $defaults['envo_delete_page'];

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

        $deleteuser = $defaults['envo_delete_page'];

        for ($i = 0; $i < count($deleteuser); $i++) {
          $deleted = $deleteuser[$i];
          $result  = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($deleted) . '"');
          $result1 = $envodb->query('UPDATE ' . $envotable1 . ' SET pageid = 0 WHERE pageid = "' . smartsql($deleted) . '"');
          ENVO_tags::envoDeleteTags($deleted, 0);
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

    // Important template stuff
    $ENVO_CAT = envo_get_cat_info($envotable1, 1);

    // EN: Get all data from DB
    // CZ: Získání všech dat z DB
    $getTotal = envo_get_total($envotable, '', '', '');

    if ($getTotal != 0) {
      $ENVO_PAGE_ALL = envo_get_page_info($envotable, '');
    }

    // EN: Statistics
    // CZ: Statistika
    // Stats - Count of all
    $result              = $envodb->query('SELECT COUNT(id) AS total FROM ' . $envotable);
    $data                = $result->fetch_assoc();
    $ENVO_STATS_COUNTALL = $data['total'];

    // Stats - Count of active
    $result                 = $envodb->query('SELECT COUNT(id) AS totalactive FROM ' . $envotable . ' WHERE catid > 0 AND active = 1');
    $data                   = $result->fetch_assoc();
    $ENVO_STATS_COUNTACTIVE = $data['totalactive'];

    // Stats - Count of not active
    $result                    = $envodb->query('SELECT COUNT(id) AS totalnotactive FROM ' . $envotable . ' WHERE (catid = 0 AND active = 0) OR (catid = 0 AND active = 1) OR (catid > 0 AND active = 0)');
    $data                      = $result->fetch_assoc();
    $ENVO_STATS_COUNTNOTACTIVE = $data['totalnotactive'];


    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["page_sec_title"]["paget"];
    $SECTION_DESC  = $tl["page_sec_desc"]["paged"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'pages.php';
}
?>