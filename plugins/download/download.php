<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// Include the comment class file
require_once APP_PATH . 'class/class.comment.php';

// Functions we need for this plugin
include_once 'functions.php';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$jaktable  = DB_PREFIX . 'download';
$jaktable1 = DB_PREFIX . 'downloadcategories';
$jaktable2 = DB_PREFIX . 'downloadcomments';
$jaktable3 = DB_PREFIX . 'downloadhistory';

$CHECK_USR_SESSION = session_id();

// Get the important template stuff
$JAK_SEARCH_WHERE = JAK_PLUGIN_VAR_DOWNLOAD;
$JAK_SEARCH_LINK  = JAK_PLUGIN_VAR_DOWNLOAD;

// Heatmap
$JAK_HEATMAPLOC = JAK_PLUGIN_VAR_DOWNLOAD;

// Wright the Usergroup permission into define and for template
define('JAK_DOWNLOADPOST', $jakusergroup->getVar("downloadpost"));
define('JAK_DOWNLOADCAN', $jakusergroup->getVar("downloadcan"));
define('JAK_DOWNLOADPOSTDELETE', $jakusergroup->getVar("downloadpostdelete"));
define('JAK_DOWNLOADPOSTAPPROVE', $jakusergroup->getVar("downloadpostapprove"));
define('JAK_DOWNLOADRATE', $jakusergroup->getVar("downloadrate"));
define('JAK_DOWNLOADMODERATE', $jakusergroup->getVar("downloadmoderate"));

// AJAX Search
$AJAX_SEARCH_PLUGIN_WHERE = $jaktable;
$AJAX_SEARCH_PLUGIN_URL   = 'plugins/download/ajaxsearch.php';
$AJAX_SEARCH_PLUGIN_SEO   = $jkv["downloadurl"];

// Get the rss if active
if ($jkv["downloadrss"]) {
  $JAK_RSS_DISPLAY = 1;
  $P_RSS_LINK      = JAK_rewrite::jakParseurl('rss.xml', JAK_PLUGIN_VAR_DOWNLOAD, '', '', '');
}

// Parse links once if needed a lot of time
$backtodl = JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_DOWNLOAD, '', '', '', '');

// Template Call
$JAK_TPL_PLUG_T   = JAK_PLUGIN_NAME_DOWNLOAD;
$JAK_TPL_PLUG_URL = $backtodl;

switch ($page1) {
  case 'c':

    if (is_numeric($page2) && jak_row_permission($page2, $jaktable1, JAK_USERGROUPID)) {

      $getTotal = jak_get_total($jaktable, $page2, 'catid', 'active');

      if ($jkv["downloadurl"]) {
        $getWhere = JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_DOWNLOAD, $page1, $page2, $page3, '');
        $getPage  = $page4;
      } else {
        $getWhere = JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_DOWNLOAD, $page1, $page2, '', '');
        $getPage  = $page3;
      }

      if ($getTotal != 0) {

        // Paginator
        $dlc                 = new JAK_Paginator;
        $dlc->items_total    = $getTotal;
        $dlc->mid_range      = $jkv["downloadpagemid"];
        $dlc->items_per_page = $jkv["downloadpageitem"];
        $dlc->jak_get_page   = $getPage;
        $dlc->jak_where      = $getWhere;
        $dlc->jak_prevtext   = $tl["pagination"]["pagin"];
        $dlc->jak_nexttext   = $tl["pagination"]["pagin1"];
        $dlc->paginate();
        $JAK_PAGINATE = $dlc->display_pages();

        $JAK_DOWNLOAD_ALL = jak_get_download($dlc->limit, $jkv["downloadorder"], $page2, 't1.catid', $jkv["downloadurl"], $tl['global_text']['gtxt4']);
      }

      // Get the download categories
      $row = $jakdb->queryRow('SELECT name, content FROM ' . $jaktable1 . ' WHERE id = "' . smartsql($page2) . '" LIMIT 1');

      $PAGE_TITLE              = JAK_PLUGIN_NAME_DOWNLOAD . ' - ' . $row['name'];
      $PAGE_CONTENT            = $row['content'];
      $MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
      $MAIN_SITE_DESCRIPTION   = $jkv['metadesc'];

      // Get the sort orders for the grid
      $JAK_HOOK_SIDE_GRID = FALSE;
      $grid               = $jakdb->query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = "' . smartsql(JAK_PLUGIN_ID_DOWNLOAD) . '" AND fileid = 0 ORDER BY orderid ASC');
      while ($grow = $grid->fetch_assoc()) {
        // collect each record into $pagegrid
        $JAK_HOOK_SIDE_GRID[] = $grow;
      }

      // Get the url session
      $_SESSION['jak_lastURL'] = $getWhere;

      // Now get the new meta keywords and description maker
      if (isset($JAK_DOWNLOAD_ALL) && is_array($JAK_DOWNLOAD_ALL)) foreach ($JAK_DOWNLOAD_ALL as $kv) $seokeywords[] = JAK_Base::jakCleanurl($kv['title']);

      if (!empty($seokeywords)) $keylist = join(",", $seokeywords);

      $PAGE_KEYWORDS = str_replace(" ", " ", JAK_Base::jakCleanurl($PAGE_TITLE) . ($keylist ? "," . $keylist : "") . ($jkv["metakey"] ? "," . $jkv["metakey"] : ""));

      // SEO from the category content if available
      if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
        $PAGE_DESCRIPTION = jak_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
      } else {
        $PAGE_DESCRIPTION = jak_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
      }

      // Get the CSS and Javascript into the page
      $JAK_HEADER_CSS        = $jkv["download_css"];
      $JAK_FOOTER_JAVASCRIPT = $jkv["download_javascript"];

      // EN: Load the template
      // CZ: Načti template (šablonu)
      $pluginbasic_template = 'plugins/download/template/download.php';
      $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/download/download.php';

      if (file_exists($pluginsite_template)) {
        $plugin_template = $pluginsite_template;
      } else {
        $plugin_template = $pluginbasic_template;
      }

    } else {
      jak_redirect($backtodl);
    }

    break;
  case 'f':

    if (is_numeric($page2) && jak_row_exist($page2, $jaktable)) {

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['userPost'])) {

        $arr = array();

        $validates = JAK_comment::validate_form($arr, $jkv["downloadmaxpost"], $tl['error']['e'], $tl['error']['e1'], $tld['downl_frontend_error']['downler3'], $tl['error']['e2'], $tld['downl_frontend_error']['downler1'], $tld['downl_frontend_error']['downler2'], $tl['error']['e10']);

        if ($validates) {
          /* Everything is OK, insert to database: */

          define('BASE_URL_IMG', BASE_URL);

          $cleanusername  = smartsql($arr['co_name']);
          $cleanuserpostB = htmlspecialchars_decode(jak_clean_safe_userpost($arr['userpost']));

          // the new session check for displaying messages to user even if not approved
          $sqlset = 0;
          if (!JAK_DOWNLOADPOSTAPPROVE) {
            $sqlset = session_id();
          }

          if (JAK_USERID) {

            $sql = $jakdb->query('INSERT INTO ' . $jaktable2 . ' VALUES (NULL, "' . $page2 . '", "' . JAK_USERID . '", "' . $cleanusername . '", NULL, NULL, "' . smartsql($cleanuserpostB) . '", "' . JAK_DOWNLOADPOSTAPPROVE . '", 0, NOW(), "' . $sqlset . '")');

            $arr['id'] = $jakdb->jak_last_id();

          } else {

            // Additional Fields
            $cleanemail = filter_var($arr['co_email'], FILTER_SANITIZE_EMAIL);
            $cleanurl   = filter_var($arr['co_url'], FILTER_SANITIZE_URL);

            $jakdb->query('INSERT INTO ' . $jaktable2 . ' VALUES (NULL, "' . $page2 . '", 0, "' . $cleanusername . '", "' . $cleanemail . '", "' . $cleanurl . '", "' . smartsql($cleanuserpostB) . '", "' . JAK_DOWNLOADPOSTAPPROVE . '", 0, NOW(), "' . $sqlset . '")');

            $arr['id'] = $jakdb->jak_last_id();

          }

          // Send an email to the owner if wish so
          if ($jkv["downloademail"] && !JAK_DOWNLOADMODERATE) {

            $mail = new PHPMailer(); // defaults to using php "mail()"
            $body = str_ireplace("[\]", '', $tld['downl_frontend_email']['dlemail'] . ' ' . (JAK_USE_APACHE ? substr(BASE_URL, 0, -1) : BASE_URL) . JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_DOWNLOAD, 'f', $page2, '', '') . '<br>' . $tld['downl_frontend_email']['dlemail1'] . ' ' . BASE_URL . 'admin/index.php?p=download&sb=comment&ssb=approval&sssb=go".');
            $mail->SetFrom($jkv["email"], $jkv["title"]);
            $mail->AddAddress($jkv["downloademail"], $cleanusername);
            $mail->Subject = $jkv["title"] . ' - ' . $tld['downl_frontend_email']['dlemail2'];
            $mail->MsgHTML($body);
            $mail->Send(); // Send email without any warnings
          }

          $arr['created'] = JAK_Base::jakTimesince(time(), $jkv["downloaddateformat"], $jkv["downloadtimeformat"], $tl['global_text']['gtxt4']);

          /*
          / The data in $arr is escaped for the mysql query,
          / but we need the unescaped variables, so we apply,
          / stripslashes to all the elements in the array:
          /*/

          /* Outputting the markup of the just-inserted comment: */
          if (isset($arr['jakajax']) && $arr['jakajax'] == "yes") {
            $acajax = new JAK_comment($jaktable2, 'id', $arr['id'], JAK_PLUGIN_VAR_DOWNLOAD, $jkv["downloaddateformat"], $jkv["downloadtimeformat"], $tl['global_text']['gtxt4']);

            header('Cache-Control: no-cache');
            die(json_encode(array('status' => 1, 'html' => $acajax->get_commentajax($tl['general']['g102'], $tld['downl_frontend']['downl13'], $tld['dload']['g4']))));

          } else {
            jak_redirect(JAK_PARSE_SUCCESS);
          }

        } else {
          /* Outputting the error messages */
          if (isset($arr['jakajax']) && $arr['jakajax'] == "yes") {
            header('Cache-Control: no-cache');
            die('{"status":0, "errors":' . json_encode($arr) . '}');
          } else {

            $errors = $arr;
          }
        }

      }

      // Gain access to page
      if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['dlprotect'])) {
        $defaults = $_POST;

        $passcrypt = hash_hmac('sha256', $defaults['dlpass'], DB_PASS_HASH);

        if (!is_numeric($defaults['dlsec'])) {
          jak_redirect($backtodl);
        }

        // Get password crypted
        $passcrypt = hash_hmac('sha256', $defaults['dlpass'], DB_PASS_HASH);

        // Check if the password is correct
        $dl_check = JAK_base::jakCheckprotectedArea($passcrypt, 'download', $defaults['dlsec']);

        if (!$dl_check) {
          $errors['e'] = $tl['general_error']['generror8'];
        }

        if (count($errors) == 0) {

          $_SESSION['pagesecurehash' . $defaults['dlsec']] = $passcrypt;
          jak_redirect($_SERVER['HTTP_REFERER']);

        } else {
          $errorpp = $errors;
        }
      }

      $result = $jakdb->query('SELECT * FROM ' . $jaktable . ' WHERE id = "' . smartsql($page2) . '" LIMIT 1');
      $row    = $result->fetch_assoc();

      if ($row['active'] != 1) {
        jak_redirect(JAK_rewrite::jakParseurl('offline'));
      } else {

        if (!jak_row_permission($row['catid'], $jaktable1, JAK_USERGROUPID)) {
          jak_redirect($backtodl);
        } else {

          // Now let's check the vote and hits cookie
          if (!jak_cookie_voted_hits($jaktable, $row['id'], 'hits')) {

            jak_write_vote_hits_cookie($jaktable, $row['id'], 'hits');

            // Update hits each time
            JAK_base::jakUpdatehits($row['id'], $jaktable);
          }

          // Output the data
          $PAGE_ID          = $row['id'];
          $PAGE_TITLE       = $row['title'];
          $PAGE_CONTENT     = jak_secure_site($row['content']);
          $SHOWTITLE        = $row['showtitle'];
          $SHOWIMG          = $row['previmg'];
          $SHOWDATE         = $row['showdate'];
          $FT_SHARE         = $row['ftshare'];
          $SHOWSOCIALBUTTON = $row['socialbutton'];
          $DL_HITS          = $row['hits'];
          $DL_DOWNLOADS     = $row['countdl'];
          // EN: $DL_PASSWORD - variable if page have password
          // CZ: $DL_PASSWORD - proměná pro zaheslovanou stránku
          $DL_PASSWORD = $row['password'];
          // EN: $PAGE_PASSWORD - main variable if page have password, use in template
          // CZ: $PAGE_PASSWORD - hlavní proměnná pro zaheslovanou stránku, používá se pro template
          $PAGE_PASSWORD               = $DL_PASSWORD;
          $JAK_HEADER_CSS              = $row['dl_css'];
          $JAK_FOOTER_JAVASCRIPT       = $row['dl_javascript'];
          $jkv["sidebar_location_tpl"] = ($row['sidebar'] ? "left" : "right");
          $DL_LINK                     = html_entity_decode(JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_DOWNLOAD, 'dl', $row['id'], '', ''));

          $PAGE_TIME       = JAK_Base::jakTimesince($row['time'], $jkv["downloaddateformat"], $jkv["downloadtimeformat"], $tl['global_text']['gtxt4']);
          $PAGE_TIME_HTML5 = date("Y-m-d T H:i:s P", strtotime($row['time']));

          // Set download to false
          $DL_FILE_BUTTON = FALSE;

          // fix the download if allowed to
          if (JAK_DOWNLOADCAN && $row['candownload'] == 0 || jak_get_access(JAK_USERGROUPID, $row['candownload'])) {

            $DL_FILE_BUTTON = TRUE;
          }

          // Display contact form if whish so and do the caching
          $JAK_SHOW_C_FORM = FALSE;
          if ($row['showcontact'] != 0) {
            $JAK_SHOW_C_FORM      = jak_create_contact_form($row['showcontact'], $tl['form_text']['formt']);
            $JAK_SHOW_C_FORM_NAME = jak_contact_form_title($row['showcontact']);
          }

          // Get the url session
          $_SESSION['jak_lastURL']    = JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_DOWNLOAD, $page1, $page2, $page3, '');
          $_SESSION['jak_thisFileID'] = $row['id'];

        }

        // Get the comments if wish so
        if ($row['comments'] == 1) {
          $ac = new JAK_comment($jaktable2, 'fileid', $page2, JAK_PLUGIN_VAR_DOWNLOAD, $jkv["downloaddateformat"], $jkv["downloadtimeformat"], $tl['global_text']['gtxt4']);

          $JAK_COMMENTS       = $ac->get_comments();
          $JAK_COMMENTS_TOTAL = $ac->get_total();
          $JAK_COMMENT_FORM   = TRUE;

        } else {

          $JAK_COMMENTS_TOTAL = 0;
          $JAK_COMMENT_FORM   = FALSE;

        }

        // Get the sort orders for the grid
        $grid = $jakdb->query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE fileid = "' . smartsql($row['id']) . '" ORDER BY orderid ASC');
        while ($grow = $grid->fetch_assoc()) {

          // the sidebar grid
          $JAK_HOOK_SIDE_GRID[] = $grow;

        }

        // Show Tags
        $JAK_TAGLIST = JAK_tags::jakGettaglist($page2, JAK_PLUGIN_ID_DOWNLOAD, JAK_PLUGIN_VAR_TAGS);

        // Page Nav
        $nextp = jak_next_page($page2, 'title', $jaktable, 'id', ' AND catid = "' . smartsql($row["catid"]) . '"', '', 'active');
        if ($nextp) {

          if ($jkv["downloadurl"]) {
            $seo = JAK_base::jakCleanurl($nextp['title']);
          }

          $JAK_NAV_NEXT       = JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_DOWNLOAD, 'f', $nextp['id'], $seo, '');
          $JAK_NAV_NEXT_TITLE = addslashes($nextp['title']);
        }

        $prevp = jak_previous_page($page2, 'title', $jaktable, 'id', ' AND catid = "' . smartsql($row["catid"]) . '"', '', 'active');
        if ($prevp) {

          if ($jkv["downloadurl"]) {
            $seop = JAK_base::jakCleanurl($prevp['title']);
          }

          $JAK_NAV_PREV       = JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_DOWNLOAD, 'f', $prevp['id'], $seop, '');
          $JAK_NAV_PREV_TITLE = addslashes($prevp['title']);
        }

        // Get the categories into a list
        $resultc = $jakdb->query('SELECT id, name, varname FROM ' . $jaktable1 . ' WHERE id IN(' . $row['catid'] . ') ORDER BY id ASC');
        while ($rowc = $resultc->fetch_assoc()) {

          if ($jkv["downloadurl"]) {
            $seoc = JAK_base::jakCleanurl($rowc['varname']);
          }

          // EN: Create array with all categories ( Plugin Download have only one category for one download file, in array will be it only one category )
          // CZ: Vytvoření pole se všemi kategoriemi ( Plugin Download má pouze jednu kategorie pro jeden stahovaný soubor, v poli bude jen jedna kategorie )
          $catids[] = '<a class="category-label"  href="' . JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_DOWNLOAD, 'c', $rowc['id'], $seoc, '', '') . '" title="' . $tld["downl_frontend"]["downl11"] . '">' . $rowc['name'] . '</a>';

          // EN: Get 'varname' for category
          // CZ: Získaní 'varname' kategorie
          $DOWNLOAD_CAT = $rowc['varname'];
        }

        if (!empty($catids)) {
          // EN: Returns a string from the elements of an array
          // CZ: Získání elementů z pole
          $DOWNLOAD_CATLIST = join(" ", $catids);
        }

      }
    } else {
      jak_redirect($backtodl);
    }

    // Now get the new meta keywords and description maker
    $keytags = '';
    if ($JAK_TAGLIST) {
      $keytags = preg_split('/\s+/', strip_tags($JAK_TAGLIST));
      $keytags = ',' . implode(',', $keytags);
    }
    $PAGE_KEYWORDS    = str_replace(" ", " ", JAK_Base::jakCleanurl($PAGE_TITLE) . $keytags . ($jkv["metakey"] ? "," . $jkv["metakey"] : ""));
    $PAGE_DESCRIPTION = jak_cut_text($PAGE_CONTENT, 155, '');

    // Get Facebook SDK Connection
    $row = $jakdb->queryRow('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "facebookconnect"  LIMIT 1');

    // Get script for Facebook SDK
    $JAK_FACEBOOK_SDK_CONNECTION = $row['value'];

    // Get random image from folder
    $imgList          = jak_get_random_image(JAK_FILES_DIRECTORY . '/facebook/');
    $JAK_RANDOM_IMAGE = jak_get_random_from_array($imgList);

    // EN: Load the template
    // CZ: Načti template (šablonu)
    $pluginbasic_template = 'plugins/download/template/downloadfile.php';
    $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/download/downloadfile.php';

    if (file_exists($pluginsite_template)) {
      $plugin_template = $pluginsite_template;
    } else {
      $plugin_template = $pluginbasic_template;
    }

    break;
  case 'del':

    if (is_numeric($page2) && is_numeric($page3) && jak_row_exist($page2, $jaktable2)) {

      if (JAK_DOWNLOADMODERATE) {

        $result = $jakdb->query('DELETE FROM ' . $jaktable2 . ' WHERE id = "' . smartsql($page2) . '"');

        if (!$result) {
          jak_redirect(JAK_PARSE_ERROR);
        } else {
          jak_redirect(JAK_PARSE_SUCCESS);
        }

      } else {
        jak_redirect($backtodl);
      }

    } else {
      jak_redirect($backtodl);
    }

    break;
  case 'ep':

    if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['userpost']) && isset($_POST['name']) && isset($_POST['editpost'])) {
      $defaults = $_POST;

      if (empty($defaults['userpost'])) {
        $errors['e'] = $tl['error']['e2'] . '<br>';
      }

      if (strlen($defaults['userpost']) > $jkv["downloadmaxpost"]) {
        $countI      = strlen($defaults['userpost']);
        $errors['e'] = $tld['downl_frontend_error']['downler1'] . $jkv["downloadmaxpost"] . ' ' . $tld['downl_frontend_error']['downler2'] . $countI . '<br>';
      }

      if (is_numeric($page2) && count($errors) == 0 && jak_row_exist($page2, $jaktable2)) {

        define('BASE_URL_IMG', BASE_URL);

        $cleanpost = htmlspecialchars_decode(jak_clean_safe_userpost($defaults['userpost']));

        $result = $jakdb->query('UPDATE ' . $jaktable2 . ' SET username = "' . smartsql($defaults['username']) . '", web = "' . smartsql($defaults['web']) . '", message = "' . smartsql($cleanpost) . '" WHERE id = "' . smartsql($page2) . '"');

        if (!$result) {
          jak_redirect(html_entity_decode(JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_DOWNLOAD, 'ep', $page2, $page3, 'e')));
        } else {
          jak_redirect(html_entity_decode(JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_DOWNLOAD, 'ep', $page2, $page3, 's')));
        }

      } else {
        $errors = $errors;
      }

    }

    if (is_numeric($page2) && is_numeric($page3) && jak_row_exist($page2, $jaktable2)) {

      if (JAK_USERID && JAK_DOWNLOADDELETE && jak_give_right($page2, JAK_USERID, $jaktable2, 'userid') || JAK_DOWNLOADMODERATE) {

        $result = $jakdb->query('SELECT username, web, message FROM ' . $jaktable2 . ' WHERE id = "' . smartsql($page2) . '" LIMIT 1');
        $row    = $result->fetch_assoc();

        $RUNAME = $row['username'];
        $RWEB   = $row['web'];
        $RCONT  = jak_edit_safe_userpost($row['message']);

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $template = 'editpost.php';

      } else {
        jak_redirect($backtodl);
      }

    } else {
      jak_redirect($backtodl);
    }
    break;
  case 'trash':
    if (is_numeric($page2) && is_numeric($page3) && jak_row_exist($page2, $jaktable2)) {

      if (JAK_USERID && JAK_DOWNLOADPOSTDELETE && jak_give_right($page2, JAK_USERID, $jaktable2, 'userid') || JAK_DOWNLOADMODERATE) {

        $result = $jakdb->query('UPDATE ' . $jaktable2 . ' SET trash = 1 WHERE id = "' . smartsql($page2) . '"');

        if (!$result) {
          jak_redirect(JAK_PARSE_ERROR);
        } else {
          jak_redirect(JAK_PARSE_SUCCESS);
        }

      } else {
        jak_redirect($backtodl);
      }

    } else {
      jak_redirect($backtodl);
    }
    break;
  case 'dl':

    if ($_SESSION['jak_thisFileID'] == $page2 && is_numeric($page2) && jak_row_exist($page2, $jaktable)) {

      // EN: Get the file from DB
      // CZ: Získání souboru z DB
      $row = $jakdb->queryRow('SELECT candownload, catid, file, extfile, active FROM ' . $jaktable . ' WHERE id = "' . smartsql($page2) . '" LIMIT 1');

      // Not active back to download
      if ($row['active'] != 1) jak_redirect($backtodl);

      if (!JAK_DOWNLOADCAN) {
        /*
         * EN: CHECK ACCESS to DOWNLOADS
         * CZ: KONTROLA PŘÍSTUPU ke STAŽENÍ SOUBORU
        */

        // EN: Create error message
        // CZ: Vytvoření chybové zprávy
        $_SESSION["errormsg"] = $tld["downl_frontend"]["downl9"];
        // EN: Redirect page with download file
        // CZ: Přesměrování stránky
        jak_redirect(str_replace('/dl/', '/f/', $_SERVER['REQUEST_URI']));

      } else {

        // No access to the file
        if ($row['candownload'] != 0 && !jak_get_access(JAK_USERGROUPID, $row['candownload'])) jak_redirect($backtodl);

        $dluserid = 0;
        $dlemail  = "guest";
        if (JAK_USERID) {
          $dluserid = JAK_USERID;
          $dlemail  = $jakuser->getVar("email");
        }

        // EN: Write data to download history ( table 'DBPrefix_downloadhistory' in DB )
        // CZ: Zápis informací do historie stahování ( tabulka 'DBPrefix_downloadhistory' v DB )
        $jakdb->query('INSERT INTO ' . $jaktable3 . ' VALUES (NULL, "' . $page2 . '", "' . smartsql($dluserid) . '", "' . smartsql($dlemail) . '", "' . smartsql($row['file']) . '", "' . smartsql($ipa) . '", NOW())');

        if (!empty($row['extfile'])) {
          /*
           * EN: IF EXIST 'extfile' ( external file )
           * CZ: POKUD EXTISTUJE SOUBOR 'extfile' ( external file )
           */

          // EN: Update count download in DB
          // CZ: Update počet stažení v DB
          $jakdb->query('UPDATE ' . $jaktable . ' SET countdl = countdl + 1 WHERE id = "' . smartsql($page2) . '"');
          // EN: Redirect page with download file
          // CZ: Přesměrování stránky
          jak_redirect($row['extfile']);

        } else {
          /*
           * EN: IF NOT EXIST 'extfile' and EXIST 'file'
           * CZ: POKUD NEEXISTUJE 'extfile' a EXISTUJE SOUBOR 'file'
           */

          // Specify file path
          $dlfile = $jkv["downloadpath"] . '/' . $row['file'];
          $dlfile = str_replace("//", "/", $dlfile);

          if (file_exists($dlfile)) {

            /*
            * EN: IF FILE EXIST
            * CZ: POKUD STAHOVANÝ SOUBOR EXISTUJE
            */

            if (!is_file($dlfile)) {
              header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
              echo 'File not found';
            } else if (!is_readable($dlfile)) {
              header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
              echo 'File not readable';
            } else {

              /*
                Do any processing you'd like here:
                1.  Increment a counter
                2.  Do something with the DB
                3.  Check user permissions
                4.  Anything you want!
              */

              // required for IE
              //if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off'); }

              // get the file mime type using the file extension
              switch(strtolower(substr(strrchr($dlfile, '.'), 1))) {
                case 'pdf': $mime = 'application/pdf'; break;
                case 'zip': $mime = 'application/zip'; break;
                case 'jpeg':
                case 'jpg': $mime = 'image/jpg'; break;
                default: $mime = 'application/force-download';
              }
              header('Pragma: ');   // required
              header('Expires: 0');   // no cache
              header('Cache-Control: ');
              header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($dlfile)).' GMT');
              header('Cache-Control: private',false);
              header('Content-Type: application/force-download');
              header('Content-Disposition: attachment; filename="'.basename($dlfile).'"');
              header('Content-Transfer-Encoding: binary');
              header('Content-Length: '.filesize($dlfile));  // provide file size
              ob_clean();
              flush();
              readfile($dlfile);   // push it out
            }


          } else {
            /*
             * EN: IF FILE NOT EXIST or IS BLANK
             * CZ: POKUD STAHOVANÝ SOUBOR NEEXISTUJE nebo NENÍ ZADÁN
             */

            // EN: Create error message
            // CZ: Vytvoření chybové zprávy
            $_SESSION["errormsg"] = $tld["downl_frontend"]["downl10"];
            // EN: Redirect page with download file
            // CZ: Přesměrování stránky
            jak_redirect(str_replace('/dl/', '/f/', $_SERVER['REQUEST_URI']));

          }

          // EN: Update count download in DB
          // CZ: Update počet stažení v DB
          $jakdb->query('UPDATE ' . $jaktable . ' SET countdl = countdl + 1 WHERE id = "' . smartsql($page2) . '"');

        }

      }

    } else {
      jak_redirect($backtodl);
    }

    break;
  default:

    $getTotal = jak_get_total_permission_dl();

    if ($getTotal != 0) {
      // Paginator
      $dl                 = new JAK_Paginator;
      $dl->items_total    = $getTotal;
      $dl->mid_range      = $jkv["downloadpagemid"];
      $dl->items_per_page = $jkv["downloadpageitem"];
      $dl->jak_get_page   = $page1;
      $dl->jak_where      = $backtodl;
      $dl->jak_prevtext   = $tl["pagination"]["pagin"];
      $dl->jak_nexttext   = $tl["pagination"]["pagin1"];
      $dl->paginate();

      // Pagination
      $JAK_PAGINATE = $dl->display_pages();

      // Get all files
      $JAK_DOWNLOAD_ALL = jak_get_download($dl->limit, $jkv["downloadorder"], '', '', $jkv["downloadurl"], $tl['global_text']['gtxt4']);

    }

    // Check if we have a language and display the right stuff
    $PAGE_TITLE              = $jkv["downloadtitle"];
    $MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
    $MAIN_SITE_DESCRIPTION   = $jkv['metadesc'];

    // Get the url session
    $_SESSION['jak_lastURL'] = $backtodl;

    // Get the sort orders for the grid
    $JAK_HOOK_SIDE_GRID = FALSE;
    $grid               = $jakdb->query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = "' . smartsql(JAK_PLUGIN_ID_DOWNLOAD) . '" AND fileid = 0 ORDER BY orderid ASC');
    while ($grow = $grid->fetch_assoc()) {
      // collect each record into $pagegrid
      $JAK_HOOK_SIDE_GRID[] = $grow;
    }

    // Now get the new meta keywords and description maker
    if (isset($JAK_DOWNLOAD_ALL) && is_array($JAK_DOWNLOAD_ALL)) foreach ($JAK_DOWNLOAD_ALL as $kv) $seokeywords[] = JAK_Base::jakCleanurl($kv['title']);

    if (!empty($seokeywords)) $keylist = join(",", $seokeywords);

    $PAGE_KEYWORDS = str_replace(" ", " ", JAK_Base::jakCleanurl($PAGE_TITLE) . ($keylist ? "," . $keylist : "") . ($jkv["metakey"] ? "," . $jkv["metakey"] : ""));

    // SEO from the category content if available
    if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
      $PAGE_DESCRIPTION = jak_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
    } else {
      $PAGE_DESCRIPTION = jak_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
    }

    // Get the CSS and Javascript into the page
    $JAK_HEADER_CSS        = $jkv["download_css"];
    $JAK_FOOTER_JAVASCRIPT = $jkv["download_javascript"];

    // EN: Load the template
    // CZ: Načti template (šablonu)
    $pluginbasic_template = 'plugins/download/template/download.php';
    $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/download/download.php';

    if (file_exists($pluginsite_template)) {
      $plugin_template = $pluginsite_template;
    } else {
      $plugin_template = $pluginbasic_template;
    }
}
?>