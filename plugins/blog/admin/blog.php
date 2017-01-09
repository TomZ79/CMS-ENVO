<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die('You cannot access this file directly.');

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$jakuser->jakModuleaccess(JAK_USERID, JAK_ACCESSBLOG)) jak_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$jaktable = DB_PREFIX . 'blog';
$jaktable1 = DB_PREFIX . 'blogcategories';
$jaktable2 = DB_PREFIX . 'blogcomments';
$jaktable3 = DB_PREFIX . 'contactform';
$jaktable4 = DB_PREFIX . 'pagesgrid';
$jaktable5 = DB_PREFIX . 'pluginhooks';
$jaktable6 = DB_PREFIX . 'backup_content';

// Include the functions
include_once("../plugins/blog/admin/include/functions.php");

// Now start with the plugin use a switch to access all pages
switch ($page1) {

  // Create new blog
  case 'new':

    // Get the important template stuff
    $JAK_CAT = jak_get_cat_info($jaktable1, 0);
    $JAK_CONTACT_FORMS = jak_get_page_info($jaktable3, '');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $defaults = $_POST;

      if (isset($defaults['save'])) {

        if (empty($defaults['jak_title'])) {
          $errors['e1'] = $tl['error']['e2'];
        }

        if ($defaults['jak_showtitle'] == '') {
          $errors['e2'] = $tl['error']['e16'];
        }

        if (!empty($defaults['jak_datetime'])) {
          $finaltime = $defaults['jak_datetime'];
        }

        if (!empty($defaults['jak_datefrom'])) {
          $finalfrom = strtotime($defaults['jak_datefrom']);
        }

        if (!empty($defaults['jak_dateto'])) {
          $finalto = strtotime($defaults['jak_dateto']);
        }

        if (isset($finalto) && isset($finalfrom) && $finalto < $finalfrom) {
          $errors['e3'] = $tl['error']['e28'];
        }

        if (isset($defaults['jak_showdate'])) {
          $showdate = $defaults['jak_showdate'];
        } else {
          $showdate = 0;
        }

        if (isset($defaults['jak_comment'])) {
          $comment = $defaults['jak_comment'];
        } else {
          $comment = 1;
        }

        if (isset($defaults['jak_showcontact'])) {
          $jakcon = $defaults['jak_showcontact'];
        } else {
          $jakcon = 0;
        }

        if (count($errors) == 0) {

          // Save the time if available of article
          if (!empty($finaltime)) {
            $insert .= 'time = "'.smartsql($finaltime) . '"';
          } else {
            $insert .= 'time = NOW()';
          }

          // Save image
          if (!empty($defaults['jak_img'])) {
            $insert .= ',previmg = "' . smartsql($defaults['jak_img']) . '"';
          } else {
            $insert .= ',previmg = NULL';
          }

          // Save the time range if available of article
          if (isset($finalfrom)) {
            $insert .= ',startdate = "' . smartsql($finalfrom) . '",';
          }

          if (isset($finalto)) {
            $insert .= 'enddate = "' . smartsql($finalto) . '"';
          }

          // Save category
          if (!isset($defaults['jak_catid'])) {
            $catid = 0;
          } else {
            $catid = join(',', $defaults['jak_catid']);
          }

          if (!isset($defaults['jak_social'])) $defaults['jak_social'] = 0;

          $result = $jakdb->query('INSERT INTO ' . $jaktable . ' SET
			catid = "' . smartsql($catid) . '",
			title = "' . smartsql($defaults['jak_title']) . '",
			content = "' . smartsql($defaults['jak_content']) . '",
			blog_css = "' . smartsql($defaults['jak_css']) . '",
			blog_javascript = "' . smartsql($defaults['jak_javascript']) . '",
			sidebar = "' . smartsql($defaults['jak_sidebar']) . '",
			showtitle = "' . smartsql($defaults['jak_showtitle']) . '",
			showdate = "' . smartsql($showdate) . '",
			showcontact = "' . smartsql($jakcon) . '",
			comments = "' . smartsql($comment) . '",
			showvote = "' . smartsql($defaults['jak_vote']) . '",
			socialbutton = "' . smartsql($defaults['jak_social']) . '",
			' . $insert);

          $rowid = $jakdb->jak_last_id();

          // Set tag active to zero
          $tagactive = 0;

          $catarray = explode(',', $catid);

          if (is_array($catarray)) {
            foreach ($catarray as $c) {

              $jakdb->query('UPDATE ' . $jaktable1 . ' SET count = count + 1 WHERE id = "' . smartsql($c) . '"');
            }

            // Set tag active, well to active
            $tagactive = 1;

          }

          // Save order for sidebar widget
          if (isset($defaults['jak_hookshow']) && is_array($defaults['jak_hookshow'])) {

            $exorder = $defaults['horder'];
            $hookid = $defaults['real_hook_id'];
            $plugind = $defaults['sreal_plugin_id'];
            $doith = array_combine($hookid, $exorder);
            $pdoith = array_combine($hookid, $plugind);

            foreach ($doith as $key => $exorder) {

              if (in_array($key, $defaults['jak_hookshow'])) {

                // Get the real what id
                $whatid = 0;
                if (isset($defaults['whatid_' . $pdoith[$key]])) $whatid = $defaults['whatid_' . $pdoith[$key]];

                $jakdb->query('INSERT INTO ' . $jaktable4 . ' SET blogid = "' . smartsql($rowid) . '", hookid = "' . smartsql($key) . '", orderid = "' . smartsql($exorder) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", plugin = "' . smartsql(JAK_PLUGIN_BLOG) . '"');

              }

            }

          }

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            jak_redirect(BASE_URL . 'index.php?p=blog&sp=new&ssp=e');
          } else {

            // Create Tags if the module is active
            if (!empty($defaults['jak_tags'])) {
              // check if tag does not exist and insert in cloud
              JAK_tags::jakBuildcloud($defaults['jak_tags'], $rowid, JAK_PLUGIN_BLOG);
              // insert tag for normal use
              JAK_tags::jakInsertags($defaults['jak_tags'], $rowid, JAK_PLUGIN_BLOG, $tagactive);

            }

            // EN: Redirect page
            // CZ: Přesměrování stránky
            jak_redirect(BASE_URL . 'index.php?p=blog&sp=edit&ssp=' . $rowid . '&sssp=s');
          }

        } else {

          $errors['e'] = $tl['error']['e'];
          $errors = $errors;
        }
      }
    }

    // Get the sidebar templates
    $result = $jakdb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $jaktable5 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
    while ($row = $result->fetch_assoc()) {
      $JAK_HOOKS[] = $row;
    }

    // Get active sidebar widgets
    $grid = $jakdb->query('SELECT hookid FROM ' . $jaktable4 . ' WHERE plugin = ' . JAK_PLUGIN_BLOG . ' ORDER BY orderid ASC');
    while ($grow = $grid->fetch_assoc()) {
      // collect each record into $_data
      $JAK_ACTIVE_GRID[] = $grow;
    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlblog["blog_sec_title"]["blogt1"];
    $SECTION_DESC = $tlblog["blog_sec_desc"]["blogd1"];

    // EN: Load the template
    // CZ: Načti template (šablonu)
    $plugin_template = 'plugins/blog/admin/template/newblog.php';

    break;
  case 'categories':

    // Additional DB field information
    $jakfield = 'catparent';
    $jakfield1 = 'varname';

    switch ($page2) {
      case 'lock':

        $result = $jakdb->query('UPDATE ' . $jaktable1 . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($page3) . '"');

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=categories&ssp=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=categories&ssp=s');
        }

        break;
      case 'delete':

        if (jak_row_exist($page3, $jaktable1) && !jak_field_not_exist($page3, $jaktable1, $jakfield)) {

          $result = $jakdb->query('DELETE FROM ' . $jaktable1 . ' WHERE id = "' . smartsql($page3) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            jak_redirect(BASE_URL . 'index.php?p=blog&sp=categories&ssp=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - úspěšné
            /*
            NOTIFIKACE:
            'ssp=s'   - Záznam úspěšně uložen
            'sssp=s'  - Záznam úspěšně odstraněn
            */
            jak_redirect(BASE_URL . 'index.php?p=blog&sp=categories&ssp=s');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=categories&ssp=eca');
        }

        break;
      case 'edit':

        if (jak_row_exist($page3, $jaktable1)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $defaults = $_POST;

            if (empty($defaults['jak_name'])) {
              $errors['e1'] = $tl['error']['e12'];
            }

            if (jak_field_not_exist_id($defaults['jak_varname'], $page3, $jaktable1, $jakfield1)) {
              $errors['e2'] = $tl['error']['e13'];
            }

            if (empty($defaults['jak_varname']) || !preg_match('/^([a-z-_0-9]||[-_])+$/', $defaults['jak_varname'])) {
              $errors['e3'] = $tl['error']['e14'];
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

              $result = $jakdb->query('UPDATE ' . $jaktable1 . ' SET
				name = "' . smartsql($defaults['jak_name']) . '",
				varname = "' . smartsql($defaults['jak_varname']) . '",
				content = "' . smartsql($defaults['jak_lcontent']) . '",
				permission = "' . smartsql($permission) . '",
				' . $insert . '
				active = "' . smartsql($defaults['jak_active']) . '"
				WHERE id = ' . smartsql($page3));

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                jak_redirect(BASE_URL . 'index.php?p=blog&sp=categories&ssp=edit&sssp=' . $page3 . '&ssssp=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                jak_redirect(BASE_URL . 'index.php?p=blog&sp=categories&ssp=edit&sssp=' . $page3 . '&ssssp=s');
              }

            } else {

              $errors['e'] = $tl['error']['e'];
              $errors = $errors;
            }
          }

          $JAK_FORM_DATA = jak_get_data($page3, $jaktable1);
          $JAK_USERGROUP = jak_get_usergroup_all('usergroup');

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tlblog["blog_sec_title"]["blogt5"];
          $SECTION_DESC = $tlblog["blog_sec_desc"]["blogd5"];

          // EN: Load the template
          // CZ: Načti template (šablonu)
          $plugin_template = 'plugins/blog/admin/template/editblogcat.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=categories&ssp=ene');
        }
        break;
      default:

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $count = 1;

          foreach ($_POST['menuItem'] as $k => $v) {

            if (!is_numeric($v)) $v = 0;

            $result = $jakdb->query('UPDATE ' . $jaktable1 . ' SET catparent = "' . smartsql($v) . '", catorder = "' . smartsql($count) . '" WHERE id = "' . smartsql($k) . '"');

            $count++;

          }

          if ($result) {
            /* Outputtng the success messages */
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
              header('Cache-Control: no-cache');
              die(json_encode(array("status" => 1, "html" => $tl["general"]["g7"])));
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              $_SESSION["successmsg"] = $tl["general"]["g7"];
              jak_redirect(BASE_URL . 'index.php?p=b2b&sp=categories');
            }
          } else {
            /* Outputtng the success messages */
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
              header('Cache-Control: no-cache');
              die(json_encode(array("status" => 0, "html" => $tl["errorpage"]["sql"])));
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              $_SESSION["errormsg"] = $tl["errorpage"]["sql"];
              jak_redirect(BASE_URL . 'index.php?p=b2b&sp=categories');
            }
          }

        }

        // Get the menu
        $result = $jakdb->query('SELECT * FROM ' . $jaktable1 . ' ORDER BY catparent, catorder, name');

        // Create a multidimensional array to conatin a list of items and parents
        $mheader = array(
          'items' => array(),
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
        if(!empty($mheader['items'])){
          $JAK_BLOG_CAT_EXIST = '1';
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlblog["blog_sec_title"]["blogt4"];
        $SECTION_DESC = $tlblog["blog_sec_desc"]["blogd4"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $plugin_template = 'plugins/blog/admin/template/blogcat.php';
    }
    break;
  // Create new blog categories
  case 'newcategory':

    // Additional DB Stuff
    $jakfield = 'varname';

    // Load all cats and get the usergroup information
    $JAK_USERGROUP = jak_get_usergroup_all('usergroup');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $defaults = $_POST;

      if (empty($defaults['jak_name'])) {
        $errors['e1'] = $tl['error']['e12'];
      }

      if (jak_field_not_exist($defaults['jak_varname'], $jaktable1, $jakfield)) {
        $errors['e2'] = $tl['error']['e13'];
      }

      if (empty($defaults['jak_varname']) || !preg_match('/^([a-z-_0-9]||[-_])+$/', $defaults['jak_varname'])) {
        $errors['e3'] = $tl['error']['e14'];
      }

      if (count($errors) == 0) {

        if (!isset($defaults['jak_active'])) {
          $catactive = 1;
        } else {
          $catactive = $defaults['jak_active'];
        }

        if (!isset($defaults['jak_permission'])) {
          $permission = 0;
        } else {
          $permission = join(',', $defaults['jak_permission']);
        }

        if (!empty($defaults['jak_img'])) {
          $insert = 'catimg = "' . smartsql($defaults['jak_img']) . '",';
        }

        $result = $jakdb->query('INSERT INTO ' . $jaktable1 . ' SET
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
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=newcategory&ssp=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=categories&ssp=edit&sssp=' . $rowid . '&ssssp=s');
        }
      } else {

        $errors['e'] = $tl['error']['e'];
        $errors = $errors;
      }
    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlblog["blog_sec_title"]["blogt6"];
    $SECTION_DESC = $tlblog["blog_sec_desc"]["blogd6"];

    // EN: Load the template
    // CZ: Načti template (šablonu)
    $plugin_template = 'plugins/blog/admin/template/newblogcat.php';

    break;
  case 'comment':

    $getTotal = jak_get_total($jaktable2, '', '', '');
    if ($getTotal != 0) {
      // Paginator
      $pages = new JAK_Paginator;
      $pages->items_total = $getTotal;
      $pages->mid_range = $jkv["adminpagemid"];
      $pages->items_per_page = $jkv["adminpageitem"];
      $pages->jak_get_page = $page2;
      $pages->jak_where = 'index.php?p=blog&sp=blogcomment';
      $pages->paginate();
      $JAK_PAGINATE = $pages->display_pages();

      // Get the comments
      $JAK_BLOGCOM_ALL = jak_get_blog_comments($pages->limit, '', '');
    }

    // Get the blogs
    $JAK_BLOG_ALL = jak_get_blogs('', '', $jaktable);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $defaults = $_POST;

      if (isset($defaults['approve'])) {

        $lockuser = $defaults['jak_delete_comment'];

        for ($i = 0; $i < count($lockuser); $i++) {
          $locked = $lockuser[$i];

          $result = $jakdb->query('UPDATE ' . $jaktable2 . ' SET approve = IF (approve = 1, 0, 1), session = NULL WHERE id = "' . smartsql($locked) . '"');
        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=comment&ssp=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=comment&ssp=s');
        }

      }

      if (isset($defaults['delete'])) {

        $lockuser = $defaults['jak_delete_comment'];

        for ($i = 0; $i < count($lockuser); $i++) {
          $locked = $lockuser[$i];

          $result = $jakdb->query('DELETE FROM ' . $jaktable2 . ' WHERE id = "' . smartsql($locked) . '"');

        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=comment&ssp=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=comment&ssp=s');
        }

      }

    }

    switch ($page2) {
      case 'approval':
        $JAK_BLOGCOM_ALL = jak_get_blog_comments($pages->limit, 'approve', '');

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlblog["blog_sec_title"]["blogt7"];
        $SECTION_DESC = $tlblog["blog_sec_desc"]["blogd7"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $plugin_template = 'plugins/blog/admin/template/blogcomment.php';

        break;
      case 'sort':
        if ($page3 == 'blog') {
          $bu = 'blogid';
        } elseif ($page3 == 'user') {
          $bu = 'userid';
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL);
        }
        $getTotal = jak_get_total($jaktable2, $page4, $bu, '');
        if ($getTotal != 0) {
          // Paginator
          $pages = new JAK_Paginator;
          $pages->items_total = $getTotal;
          $pages->mid_range = $jkv["adminpagemid"];
          $pages->items_per_page = $jkv["adminpageitem"];
          $pages->jak_get_page = $page5;
          $pages->jak_where = 'index.php?p=blog&sp=blogcomment&ssp=sort&sssp=' . $page3 . '&ssssp=' . $page4;
          $pages->paginate();
          $JAK_PAGINATE_SORT = $pages->display_pages();
          $JAK_BLOGCOM_SORT = jak_get_blog_comments($pages->limit, $page4, $bu);

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tlblog["blog_sec_title"]["blogt7"];
          $SECTION_DESC = $tlblog["blog_sec_desc"]["blogd7"];

          // EN: Load the template
          // CZ: Načti template (šablonu)
          $plugin_template = 'plugins/blog/admin/template/blogcommentsort.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=comment&ssp=ene');
        }
        break;
      case 'approve':

        if (jak_row_exist($page3, $jaktable2)) {

          $result = $jakdb->query('UPDATE ' . $jaktable2 . ' SET approve = IF (approve = 1, 0, 1), session = NULL WHERE id = "' . smartsql($page3) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            jak_redirect(BASE_URL . 'index.php?p=blog&sp=comment&ssp=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            jak_redirect(BASE_URL . 'index.php?p=blog&sp=comment&ssp=s');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=comment&ssp=ene');
        }

        break;
      case 'delete':
        if (jak_row_exist($page3, $jaktable2)) {

          $result = $jakdb->query('DELETE FROM ' . $jaktable2 . ' WHERE id = "' . smartsql($page3) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            jak_redirect(BASE_URL . 'index.php?p=blog&sp=comment&ssp=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            jak_redirect(BASE_URL . 'index.php?p=blog&sp=comment&ssp=s');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=comment&ssp=ene');
        }
        break;
      default:

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlblog["blog_sec_title"]["blogt8"];
        $SECTION_DESC = $tlblog["blog_sec_desc"]["blogd8"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $plugin_template = 'plugins/blog/admin/template/blogcomment.php';
    }

    break;
  case 'setting':

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $defaults = $_POST;

      if (!is_numeric($defaults['jak_maxpost'])) {
        $errors['e1'] = $tl['error']['e15'];
      }

      if (!empty($defaults['jak_email'])) {
        if (!filter_var($defaults['jak_email'], FILTER_VALIDATE_EMAIL)) {
          $errors['e2'] = $tl['error']['e3'];
        }
      }

      if (empty($defaults['jak_date'])) {
        $errors['e3'] = $tl['error']['e4'];
      }

      if (!is_numeric($defaults['jak_item'])) {
        $errors['e5'] = $tl['error']['e15'];
      }

      if (!is_numeric($defaults['jak_mid'])) {
        $errors['e5'] = $tl['error']['e15'];
      }

      if (!is_numeric($defaults['jak_rssitem'])) {
        $errors['e7'] = $tl['error']['e15'];
      }

      if (count($errors) == 0) {

        // Get the order into the right format
        $blogorder = $defaults['jak_showblogordern'] . ' ' . $defaults['jak_showblogorder'];

        // Do the dirty work in mysql
        $result = $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
		    	WHEN "blogtitle" THEN "' . smartsql($defaults['jak_title']) . '"
		    	WHEN "blogdesc" THEN "' . smartsql($defaults['jak_lcontent']) . '"
		      WHEN "blogemail" THEN "' . smartsql($defaults['jak_email']) . '"
		      WHEN "blogorder" THEN "' . $blogorder . '"
		      WHEN "bloghlimit" THEN "' . smartsql($defaults['jak_bloglimit']) . '"
		      WHEN "blogdateformat" THEN "' . smartsql($defaults['jak_date']) . '"
		      WHEN "blogtimeformat" THEN "' . smartsql($defaults['jak_time']) . '"
		      WHEN "blogurl" THEN "' . smartsql($defaults['jak_blogurl']) . '"
		      WHEN "blogmaxpost" THEN "' . smartsql($defaults['jak_maxpost']) . '"
		      WHEN "blogrss" THEN "' . smartsql($defaults['jak_rssitem']) . '"
		      WHEN "blogpagemid" THEN "' . smartsql($defaults['jak_mid']) . '"
		      WHEN "blogpageitem" THEN "' . smartsql($defaults['jak_item']) . '"
		      WHEN "blog_css" THEN "' . smartsql($defaults['jak_css']) . '"
		      WHEN "blog_javascript" THEN "' . smartsql($defaults['jak_javascript']) . '"
		    END
				WHERE varname IN ("blogtitle","blogdesc","blogemail","blogorder","bloghlimit","blogdateformat","blogtimeformat","blogurl","blogmaxpost","blogpagemid","blogpageitem","blogrss", "blog_css", "blog_javascript")');

        // Save order for sidebar widget
        if (isset($defaults['jak_hookshow_new']) && !empty($defaults['jak_hookshow_new'])) {

          $exorder = $defaults['horder_new'];
          $hookid = $defaults['real_hook_id_new'];
          $plugind = $defaults['sreal_plugin_id_new'];
          $doith = array_combine($hookid, $exorder);
          $pdoith = array_combine($hookid, $plugind);

          foreach ($doith as $key => $exorder) {

            if (in_array($key, $defaults['jak_hookshow_new'])) {

              // Get the real what id
              $whatid = 0;
              if (isset($defaults['whatid_' . $pdoith[$key]])) $whatid = $defaults['whatid_' . $pdoith[$key]];

              $jakdb->query('INSERT INTO ' . $jaktable4 . ' SET plugin = "' . smartsql(JAK_PLUGIN_BLOG) . '", hookid = "' . smartsql($key) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", orderid = "' . smartsql($exorder) . '"');

            }

          }

        }

        // Now check if all the sidebar a deselct and hooks exist, if so delete all associated to this page
        if (!isset($defaults['jak_hookshow_new']) && !isset($defaults['jak_hookshow'])) {

          // Now check if all the sidebar a deselected and hooks exist, if so delete all associated to this page
          $row = $jakdb->queryRow('SELECT id FROM '.$jaktable4.' WHERE plugin = "'.smartsql(JAK_PLUGIN_BLOG).'" AND blogid = 0 AND hookid != 0');

          // We have something to delete
          if ($row["id"]) {
            $jakdb->query('DELETE FROM '.$jaktable4.' WHERE plugin = "'.smartsql(JAK_PLUGIN_BLOG).'" AND blogid = 0 AND hookid != 0');
          }

        }

        // Save order or delete for extra sidebar widget
        if (isset($defaults['jak_hookshow']) && is_array($defaults['jak_hookshow'])) {

          $exorder = $defaults['horder'];
          $hookid = $defaults['real_hook_id'];
          $hookrealid = implode(',', $defaults['real_hook_id']);
          $doith = array_combine($hookid, $exorder);

          // Reset update
          $updatesql = $updatesql1 = "";

          // Run the foreach for the hooks
          foreach ($doith as $key => $exorder) {

            // Get the real what id
            $row = $jakdb->queryRow('SELECT pluginid FROM ' . $jaktable4 . ' WHERE id = "' . smartsql($key) . '" AND hookid != 0');

            // Get the whatid
            $whatid = 0;
            if (isset($defaults['whatid_' . $row["pluginid"]])) $whatid = $defaults['whatid_' . $row["pluginid"]];

            if (in_array($key, $defaults['jak_hookshow'])) {
              $updatesql .= sprintf("WHEN %d THEN %d ", $key, $exorder);
              $updatesql1 .= sprintf("WHEN %d THEN %d ", $key, $whatid);

            } else {
              $jakdb->query('DELETE FROM ' . $jaktable4 . ' WHERE id = "' . smartsql($key) . '"');
            }
          }

          $jakdb->query('UPDATE ' . $jaktable4 . ' SET orderid = CASE id
					' . $updatesql . '
					END
					WHERE id IN (' . $hookrealid . ')');

          $jakdb->query('UPDATE ' . $jaktable4 . ' SET whatid = CASE id
					' . $updatesql1 . '
					END
					WHERE id IN (' . $hookrealid . ')');

        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=setting&ssp=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=setting&ssp=s');
        }
      } else {
        $errors['e'] = $tl['error']['e'];
        $errors = $errors;
      }
    }

    // EN: Import important settings for the template from the DB
    // CZ: Importuj důležité nastavení pro šablonu z DB
    $JAK_SETTING = jak_get_setting('blog');

    // Get the sort orders for the grid
    $JAK_PAGE_GRID = array();
    $grid = $jakdb->query('SELECT id, hookid, whatid, orderid FROM ' . $jaktable4 . ' WHERE plugin = "' . smartsql(JAK_PLUGIN_BLOG) . '" AND blogid = 0 ORDER BY orderid ASC');
    while ($grow = $grid->fetch_assoc()) {
      // collect each record into $_data
      $JAK_PAGE_GRID[] = $grow;
    }

    // Get the sidebar templates
    $JAK_HOOKS = array();
    $result = $jakdb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $jaktable5 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
    while ($row = $result->fetch_assoc()) {
      $JAK_HOOKS[] = $row;
    }

    // Now let's check how to display the order
    $showblogarray = explode(" ", $jkv["blogorder"]);

    if (is_array($showblogarray) && in_array("ASC", $showblogarray) || in_array("DESC", $showblogarray)) {

      $JAK_SETTING['showblogwhat'] = $showblogarray[0];
      $JAK_SETTING['showblogorder'] = $showblogarray[1];

    }

    // Get the special vars for multi language support
    $JAK_FORM_DATA["title"] = $jkv["blogtitle"];
    $JAK_FORM_DATA["content"] = $jkv["blogdesc"];

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlblog["blog_sec_title"]["blogt9"];
    $SECTION_DESC = $tlblog["blog_sec_desc"]["blogd9"];

    // EN: Load the template
    // CZ: Načti template (šablonu)
    $plugin_template = 'plugins/blog/admin/template/blogsetting.php';

    break;
  case 'trash':
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $defaults = $_POST;

      if (isset($defaults['untrash'])) {

        $deltrash = $defaults['jak_delete_trash'];

        for ($i = 0; $i < count($deltrash); $i++) {
          $trash = $deltrash[$i];
          $result = $jakdb->query('UPDATE ' . $jaktable2 . ' SET trash = IF (trash = 1, 0, 1) WHERE id = "' . smartsql($trash) . '"');
        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=trash&ssp=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=trash&ssp=s');
        }

      }

      if (isset($defaults['delete'])) {

        $deltrash = $defaults['jak_delete_trash'];

        for ($i = 0; $i < count($deltrash); $i++) {
          $trash = $deltrash[$i];
          $result = $jakdb->query('DELETE FROM ' . $jaktable2 . ' WHERE id = "' . smartsql($trash) . '"');
        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=trash&ssp=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=trash&ssp=s');
        }

      }

    }

    $result = $jakdb->query('SELECT * FROM ' . $jaktable2 . ' WHERE trash = 1 ORDER BY id DESC');
    while ($row = $result->fetch_assoc()) {
      // collect each record into $_data
      $JAK_TRASH_ALL[] = $row;
    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlblog["blog_sec_title"]["blogt10"];
    $SECTION_DESC = $tlblog["blog_sec_desc"]["blogd10"];

    // EN: Load the template
    // CZ: Načti template (šablonu)
    $plugin_template = 'plugins/blog/admin/template/trash.php';

    break;
  case 'quickedit':
    if (jak_row_exist($page2, $jaktable)) {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $defaults = $_POST;

        if (empty($defaults['jak_title'])) {
          $errors['e1'] = $tl['error']['e2'];
        }

        // Now do the dirty stuff in mysql
        if (count($errors) == 0) {

          $result = $jakdb->query('UPDATE ' . $jaktable . ' SET
			title = "' . smartsql($defaults['jak_title']) . '",
			content = "' . smartsql($defaults['jak_lcontent']) . '"
			WHERE id = "' . smartsql($page2) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            jak_redirect(BASE_URL . 'index.php?p=blog&sp=quickedit&ssp=' . $page2 . '&sssp=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            jak_redirect(BASE_URL . 'index.php?p=blog&sp=quickedit&ssp=' . $page2 . '&sssp=s');
          }
        } else {

          $errors['e'] = $tl['error']['e'];
          $errors = $errors;
        }
      }

      // Get the data
      $JAK_FORM_DATA = jak_get_data($page2, $jaktable);

      // EN: Load the template
      // CZ: Načti template (šablonu)
      $template = 'quickedit.php';

    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      jak_redirect(BASE_URL . 'index.php?p=blog&sp=ene');
    }
    break;
  default:

    // Important Smarty stuff
    $JAK_CAT = jak_get_cat_info($jaktable1, 0);
    $JAK_CONTACT_FORMS = jak_get_page_info($jaktable3, '');

    switch ($page1) {
      case 'showcat':

        $result = $jakdb->query('SELECT COUNT(*) as totalAll FROM ' . $jaktable . ' WHERE FIND_IN_SET(' . $page2 . ', catid)');
        $row = $result->fetch_assoc();

        $getTotal = $row['totalAll'];

        if ($getTotal != 0) {
          // Paginator
          $pages = new JAK_Paginator;
          $pages->items_total = $getTotal;
          $pages->mid_range = $jkv["adminpagemid"];
          $pages->items_per_page = $jkv["adminpageitem"];
          $pages->jak_get_page = $page3;
          $pages->jak_where = 'index.php?p=blog&sp=showcat&ssp=' . $page2;
          $pages->paginate();
          $JAK_PAGINATE_SORT = $pages->display_pages();

          $JAK_BLOG_SORT = jak_get_blogs($pages->limit, $page2, $jaktable);

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tlblog["blog_sec_title"]["blogt2"];
          $SECTION_DESC = $tlblog["blog_sec_desc"]["blogd2"];

          // EN: Load the template
          // CZ: Načti template (šablonu)
          $plugin_template = 'plugins/blog/admin/template/blogcatsort.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=ene');
        }
        break;
      case 'lock':

        $result2 = $jakdb->query('SELECT catid, active FROM ' . $jaktable . ' WHERE id = "' . smartsql($page2) . '"');
        $row2 = $result2->fetch_assoc();

        if (is_numeric($row2['catid'])) {

          if ($row2['active'] == 1) {
            $jakdb->query('UPDATE ' . $jaktable1 . ' SET count = count - 1 WHERE id = "' . smartsql($row2['catid']) . '"');
          } else {
            $jakdb->query('UPDATE ' . $jaktable1 . ' SET count = count + 1 WHERE id = "' . smartsql($row2['catid']) . '"');
          }

        } else {

          $catarray = explode(',', $row2['catid']);

          if (is_array($catarray)) foreach ($catarray as $c) {

            if ($row2['active'] == 1) {
              $jakdb->query('UPDATE ' . $jaktable1 . ' SET count = count - 1 WHERE id = "' . smartsql($c) . '"');
            } else {
              $jakdb->query('UPDATE ' . $jaktable1 . ' SET count = count + 1 WHERE id = "' . smartsql($c) . '"');
            }
          }

        }

        $result = $jakdb->query('UPDATE ' . $jaktable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($page2) . '"');

        JAK_tags::jaklocktags($page2, JAK_PLUGIN_BLOG);

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=s');
        }

        break;
      case 'delete':
        if (is_numeric($page2) && jak_row_exist($page2, $jaktable)) {

          $result2 = $jakdb->query('SELECT catid FROM ' . $jaktable . ' WHERE id = "' . smartsql($page2) . '"');
          $row2 = $result2->fetch_assoc();

          if (is_numeric($row2['catid'])) {

            $jakdb->query('UPDATE ' . $jaktable1 . ' SET count = count - 1 WHERE id = "' . smartsql($row2['catid']) . '"');


          } else {

            $catarray = explode(',', $row2['catid']);

            if (is_array($catarray)) foreach ($catarray as $c) {

              $jakdb->query('UPDATE ' . $jaktable1 . ' SET count = count - 1 WHERE id = "' . smartsql($c) . '"');

            }

          }

          $jakdb->query('DELETE FROM ' . $jaktable2 . ' WHERE blogid = "' . smartsql($page2) . '"');

          $result = $jakdb->query('DELETE FROM ' . $jaktable . ' WHERE id = "' . smartsql($page2) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            jak_redirect(BASE_URL . 'index.php?p=blog&sp=e');
          } else {

            JAK_tags::jakDeletetags($page2, JAK_PLUGIN_BLOG);

            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - úspěšné
            /*
            NOTIFIKACE:
            'sp=s'   - Záznam úspěšně uložen
            'ssp=s'  - Záznam úspěšně odstraněn
            */
            jak_redirect(BASE_URL . 'index.php?p=blog&sp=s&ssp=s');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=ene');
        }
        break;
      case 'edit':

        if (is_numeric($page2) && jak_row_exist($page2, $jaktable)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $defaults = $_POST;

            // Delete the tags
            if (!empty($defaults['jak_tagdelete'])) {
              $tags = $defaults['jak_tagdelete'];

              for ($i = 0; $i < count($tags); $i++) {
                $tag = $tags[$i];

                JAK_tags::jakDeleteonetag($tag);

              }
            }

            // Delete the comments
            if (!empty($defaults['jak_delete_comment'])) {
              $jakdb->query('DELETE FROM ' . $jaktable2 . ' WHERE blogid = "' . smartsql($page2) . '"');
            }

            // Delete the likes
            if (!empty($defaults['jak_delete_rate'])) {
              $jakdb->query('DELETE FROM ' . DB_PREFIX . 'like_counter WHERE btnid = "' . smartsql($page2) . '" AND locid = "' . smartsql(JAK_PLUGIN_BLOG) . '"');
              $jakdb->query('DELETE FROM ' . DB_PREFIX . 'like_client WHERE btnid = "' . smartsql($page2) . '" AND locid = "' . smartsql(JAK_PLUGIN_BLOG) . '"');
            }

            // Delete the hits
            if (!empty($defaults['jak_delete_hits'])) {
              $jakdb->query('UPDATE ' . $jaktable . ' SET hits = 1 WHERE id = "' . smartsql($page2) . '"');
            }

            if (empty($defaults['jak_title'])) {
              $errors['e1'] = $tl['error']['e2'];
            }

            if (!empty($defaults['jak_datetime'])) {
              $finaltime = $defaults['jak_datetime'];
            }

            if (!empty($defaults['jak_datefrom'])) {
              $finalfrom = strtotime($defaults['jak_datefrom']);
            } else {
              $finalfrom = '0';
            }

            if (!empty($defaults['jak_dateto'])) {
              $finalto = strtotime($defaults['jak_dateto']);
            }  else {
              $finalto = '0';
            }

            if (isset($finalto) && isset($finalfrom) && $finalto < $finalfrom) {
              $errors['e2'] = $tl['error']['e28'];
            }

            if (count($errors) == 0) {
              // Save or update time of article
              if (empty($defaults['jak_update_time'])) {
                $insert .= 'time = "'.smartsql($finaltime).'",';
              } else {
                $insert .= 'time = NOW(),';
              }

              // Save image
              if (!empty($defaults['jak_img'])) {
                $insert .= 'previmg = "' . smartsql($defaults['jak_img']) . '",';
              } else {
                $insert .= 'previmg = NULL,';
              }

              // Save the time range if available of article
              if (isset($finalfrom)) {
                $insert .= 'startdate = "' . smartsql($finalfrom) . '",';
              }

              if (isset($finalto)) {
                $insert .= 'enddate = "' . smartsql($finalto) . '",';
              }

              // Save category
              if (!isset($defaults['jak_catid'])) {
                $catid = 0;
              } else {
                $catid = join(',', $defaults['jak_catid']);
              }

              // Get the old content first
              $rowsb = $jakdb->queryRow('SELECT content FROM ' . $jaktable . ' WHERE id = "' . smartsql($page2) . '"');

              // Insert the content into the backup table
              $jakdb->query('INSERT INTO ' . $jaktable6 . ' SET
		    blogid = "' . smartsql($page2) . '",
		    content = "' . smartsql($rowsb['content']) . '",
		    time = NOW()');

              $result = $jakdb->query('UPDATE ' . $jaktable . ' SET
			catid = "' . smartsql($catid) . '",
			title = "' . smartsql($defaults['jak_title']) . '",
			content = "' . smartsql($defaults['jak_content']) . '",
			blog_css = "' . smartsql($defaults['jak_css']) . '",
			blog_javascript = "' . smartsql($defaults['jak_javascript']) . '",
			sidebar = "' . smartsql($defaults['jak_sidebar']) . '",
			showtitle = "' . smartsql($defaults['jak_showtitle']) . '",
			showcontact = "' . smartsql($defaults['jak_showcontact']) . '",
			showdate = "' . smartsql($defaults['jak_showdate']) . '",
			comments = "' . smartsql($defaults['jak_comment']) . '",
			' . $insert . '
			showvote = "' . smartsql($defaults['jak_vote']) . '",
			socialbutton = "' . smartsql($defaults['jak_social']) . '"
			WHERE id = "' . smartsql($page2) . '"');

              // Set tag active to zero
              $tagactive = 0;

              if ($defaults['jak_oldcatid'] != 0) {
                // Set tag active, well to active
                $tagactive = 1;
              }

              $catoarray = explode(',', $defaults['jak_oldcatid']);

              if (is_array($catoarray)) {

                foreach ($catoarray as $co) {
                  $jakdb->query('UPDATE ' . $jaktable1 . ' SET count = count - 1 WHERE id = "' . smartsql($co) . '"');
                }
              }

              $catarray = explode(',', $catid);

              if (is_array($catarray)) {
                foreach ($catarray as $c) {

                  $jakdb->query('UPDATE ' . $jaktable1 . ' SET count = count + 1 WHERE id = "' . smartsql($c) . '"');
                }

                // Set tag active, well to active
                $tagactive = 1;

              }

              // Save order for sidebar widget
              if (isset($defaults['jak_hookshow_new']) && is_array($defaults['jak_hookshow_new'])) {

                $exorder = $defaults['horder_new'];
                $hookid = $defaults['real_hook_id_new'];
                $plugind = $defaults['sreal_plugin_id_new'];
                $doith = array_combine($hookid, $exorder);
                $pdoith = array_combine($hookid, $plugind);

                foreach ($doith as $key => $exorder) {

                  if (in_array($key, $defaults['jak_hookshow_new'])) {

                    // Get the real what id
                    $whatid = 0;
                    if (isset($defaults['whatid_' . $pdoith[$key]])) $whatid = $defaults['whatid_' . $pdoith[$key]];

                    $jakdb->query('INSERT INTO ' . $jaktable4 . ' SET blogid = "' . smartsql($page2) . '", hookid = "' . smartsql($key) . '", orderid = "' . smartsql($exorder) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", plugin = "' . smartsql(JAK_PLUGIN_BLOG) . '"');

                  }

                }

              }

              // Now check if all the sidebar a deselct and hooks exist, if so delete all associated to this page
              if (!isset($defaults['jak_hookshow_new']) && !isset($defaults['jak_hookshow'])) {

                // Now check if all the sidebar a deselected and hooks exist, if so delete all associated to this page
                $row = $jakdb->queryRow('SELECT id FROM '.$jaktable4.' WHERE blogid = "'.smartsql($page2).'" AND hookid != 0');

                // We have something to delete
                if ($row["id"]) {
                  $jakdb->query('DELETE FROM '.$jaktable4.' WHERE blogid = "'.smartsql($page2).'" AND hookid != 0');
                }

              }

              // Save order or delete for extra sidebar widget
              if (isset($defaults['jak_hookshow']) && is_array($defaults['jak_hookshow'])) {

                $exorder = $defaults['horder'];
                $hookid = $defaults['real_hook_id'];
                $hookrealid = implode(',', $defaults['real_hook_id']);
                $doith = array_combine($hookid, $exorder);

                foreach ($doith as $key => $exorder) {

                  // Get the real what id
                  $row = $jakdb->queryRow('SELECT pluginid FROM ' . $jaktable4 . ' WHERE id = "' . smartsql($key) . '" AND hookid != 0');

                  $whatid = 0;
                  if (isset($defaults['whatid_' . $row["pluginid"]])) $whatid = $defaults['whatid_' . $row["pluginid"]];

                  if (in_array($key, $defaults['jak_hookshow'])) {
                    $updatesql .= sprintf("WHEN %d THEN %d ", $key, $exorder);
                    $updatesql1 .= sprintf("WHEN %d THEN %d ", $key, $whatid);

                  } else {
                    $jakdb->query('DELETE FROM ' . $jaktable4 . ' WHERE id = "' . smartsql($key) . '"');
                  }
                }

                $jakdb->query('UPDATE ' . $jaktable4 . ' SET orderid = CASE id
				' . $updatesql . '
				END
				WHERE id IN (' . $hookrealid . ')');

                $jakdb->query('UPDATE ' . $jaktable4 . ' SET whatid = CASE id
				' . $updatesql1 . '
				END
				WHERE id IN (' . $hookrealid . ')');

              }

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                jak_redirect(BASE_URL . 'index.php?p=blog&sp=edit&ssp=' . $page2 . '&sssp=e');
              } else {

                // Create Tags if the module is active
                if (!empty($defaults['jak_tags'])) {
                  // check if tag does not exist and insert in cloud
                  JAK_tags::jakBuildcloud($defaults['jak_tags'], smartsql($page2), JAK_PLUGIN_BLOG);
                  // insert tag for normal use
                  JAK_tags::jakInsertags($defaults['jak_tags'], smartsql($page2), JAK_PLUGIN_BLOG, $tagactive);

                }

                // EN: Redirect page
                // CZ: Přesměrování stránky
                jak_redirect(BASE_URL . 'index.php?p=blog&sp=edit&ssp=' . $page2 . '&sssp=s');
              }

            } else {
              $errors['e'] = $tl['error']['e'];
              $errors = $errors;
            }
          }

          $JAK_FORM_DATA = jak_get_data($page2, $jaktable);
          if (JAK_TAGS) {
            $JAK_TAGLIST = jak_get_tags($page2, JAK_PLUGIN_BLOG);
          }

          // Get the sort orders for the grid
          $grid = $jakdb->query('SELECT id, pluginid, hookid, whatid, orderid FROM ' . $jaktable4 . ' WHERE blogid = "' . smartsql($page2) . '" ORDER BY orderid ASC');
          while ($grow = $grid->fetch_assoc()) {
            // collect each record into $_data
            $JAK_PAGE_GRID[] = $grow;
          }

          // Get the sidebar templates
          $result = $jakdb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $jaktable5 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
          while ($row = $result->fetch_assoc()) {
            $JAK_HOOKS[] = $row;
          }

          // First we delete the old records, older then 30 days
          $jakdb->query('DELETE FROM ' . $jaktable6 . ' WHERE blogid = "' . smartsql($page2) . '" AND DATEDIFF(CURDATE(), time) > 30');

          // Get the backup content
          $resultbp = $jakdb->query('SELECT id, time FROM ' . $jaktable6 . ' WHERE blogid = "' . smartsql($page2) . '" ORDER BY id DESC LIMIT 10');
          while ($rowbp = $resultbp->fetch_assoc()) {
            // collect each record into $_data
            $JAK_PAGE_BACKUP[] = $rowbp;
          }

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tlblog["blog_sec_title"]["blogt3"];
          $SECTION_DESC = $tlblog["blog_sec_desc"]["blogd3"];

          // EN: Load the template
          // CZ: Načti template (šablonu)
          $plugin_template = 'plugins/blog/admin/template/editblog.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=blog&sp=ene');
        }
        break;
      case 'sort':

        // getNumber
        $getTotal = jak_get_total($jaktable, '', '', '');

        // Now if total run paginator
        if ($getTotal != 0) {
          // Paginator
          $pages = new JAK_Paginator;
          $pages->items_total = $getTotal;
          $pages->mid_range = $jkv["adminpagemid"];
          $pages->items_per_page = $jkv["adminpageitem"];
          $pages->jak_get_page = $page4;
          $pages->jak_where = 'index.php?p=blog&sp=sort&ssp=' . $page2 . '&sssp=' . $page3;
          $pages->paginate();
          $JAK_PAGINATE = $pages->display_pages();
        }

        $result = $jakdb->query('SELECT * FROM ' . $jaktable . ' ORDER BY ' . $page2 . ' ' . $page3 . ' ' . $pages->limit);
        while ($row = $result->fetch_assoc()) {
          $JAK_BLOG_ALL[] = $row;
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlblog["blog_sec_title"]["blogt11"];
        $SECTION_DESC = $tlblog["blog_sec_desc"]["blogd11"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $plugin_template = 'plugins/blog/admin/template/blog.php';

        break;
      default:

        // Hello we have a post request
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['jak_delete_blog'])) {
          $defaults = $_POST;

          if (isset($defaults['lock'])) {

            $lockuser = $defaults['jak_delete_blog'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              $result2 = $jakdb->query('SELECT catid, active FROM ' . $jaktable . ' WHERE id = "' . smartsql($locked) . '"');
              $row2 = $result2->fetch_assoc();

              if (is_numeric($row2['catid'])) {

                if ($row2['active'] == 1) {
                  $jakdb->query('UPDATE ' . $jaktable1 . ' SET count = count - 1 WHERE id = "' . smartsql($row2['catid']) . '"');
                } else {
                  $jakdb->query('UPDATE ' . $jaktable1 . ' SET count = count + 1 WHERE id = "' . smartsql($row2['catid']) . '"');
                }

              } else {

                $catarray = explode(',', $row2['catid']);

                if (is_array($catarray)) foreach ($catarray as $c) {

                  if ($row2['active'] == 1) {
                    $jakdb->query('UPDATE ' . $jaktable1 . ' SET count = count - 1 WHERE id = "' . smartsql($c) . '"');
                  } else {
                    $jakdb->query('UPDATE ' . $jaktable1 . ' SET count = count + 1 WHERE id = "' . smartsql($c) . '"');
                  }
                }

              }

              $result = $jakdb->query('UPDATE ' . $jaktable . ' SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($locked) . '"');

              JAK_tags::jaklocktags($locked, JAK_PLUGIN_BLOG);
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=blog&sp=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=blog&sp=s');
            }

          }

          if (isset($defaults['delete'])) {

            $lockuser = $defaults['jak_delete_blog'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              $result2 = $jakdb->query('SELECT catid FROM ' . $jaktable . ' WHERE id = "' . smartsql($locked) . '"');
              $row2 = $result2->fetch_assoc();

              if (is_numeric($row2['catid'])) {

                $jakdb->query('UPDATE ' . $jaktable1 . ' SET count = count - 1 WHERE id = "' . smartsql($row2['catid']) . '"');


              } else {

                $catarray = explode(',', $row2['catid']);

                if (is_array($catarray)) foreach ($catarray as $c) {

                  $jakdb->query('UPDATE ' . $jaktable1 . ' SET count = count - 1 WHERE id = "' . smartsql($c) . '"');

                }

              }

              $jakdb->query('DELETE FROM ' . $jaktable2 . ' WHERE blogid = "' . smartsql($locked) . '"');

              $result = $jakdb->query('DELETE FROM ' . $jaktable . ' WHERE id = "' . smartsql($locked) . '"');

              JAK_tags::jakDeletetags($locked, JAK_PLUGIN_BLOG);
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky s notifikací - chybné
              jak_redirect(BASE_URL . 'index.php?p=blog&sp=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky s notifikací - úspěšné
              /*
              NOTIFIKACE:
              'sp=s'   - Záznam úspěšně uložen
              'ssp=s'  - Záznam úspěšně odstraněn
              */
              jak_redirect(BASE_URL . 'index.php?p=blog&sp=s&ssp=s');
            }

          }

        }

        // Get all blogs out
        $getTotal = jak_get_total($jaktable, '', '', '');

        if ($getTotal != 0) {
          // Paginator
          $pages = new JAK_Paginator;
          $pages->items_total = $getTotal;
          $pages->mid_range = $jkv["adminpagemid"];
          $pages->items_per_page = $jkv["adminpageitem"];
          $pages->jak_get_page = $page1;
          $pages->jak_where = 'index.php?p=blog';
          $pages->paginate();
          $JAK_PAGINATE = $pages->display_pages();

          $JAK_BLOG_ALL = jak_get_blogs($pages->limit, '', $jaktable);
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlblog["blog_sec_title"]["blogt"];
        $SECTION_DESC = $tlblog["blog_sec_desc"]["blogd"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $plugin_template = 'plugins/blog/admin/template/blog.php';
    }
}
?>