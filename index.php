<?php

// prevent direct php access
define('JAK_PREVENT_ACCESS', 1);

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/index.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Now check if there is more then one page
$page  = ($tempp ? envo_url_input_filter($tempp) : '');
$page1 = ($tempp1 ? envo_url_input_filter($tempp1) : '');
$page2 = ($tempp2 ? envo_url_input_filter($tempp2) : '');
$page3 = ($tempp3 ? envo_url_input_filter($tempp3) : '');
$page4 = ($tempp4 ? envo_url_input_filter($tempp4) : '');
$page5 = ($tempp5 ? envo_url_input_filter($tempp5) : '');
$page6 = ($tempp6 ? envo_url_input_filter($tempp6) : '');

// Only the SuperAdmin in the config file see everything
if (JAK_USERID && $jakuser->envoSuperAdminAccess(JAK_USERID)) {
  define('JAK_SUPERADMINACCESS', TRUE);
} else {
  define('JAK_SUPERADMINACCESS', FALSE);
}

// EN: Import the language file
// CZ: Import jazykových souborů
if ($jkv["lang"] != $site_language && file_exists(APP_PATH . 'lang/' . $site_language . '.ini')) {
  $tl = parse_ini_file(APP_PATH . 'lang/' . $site_language . '.ini', TRUE);
} else {
  $tl = parse_ini_file(APP_PATH . 'lang/' . $jkv["lang"] . '.ini', TRUE);
}

// If Referer Zero go to the session url
if (!isset($_SERVER['HTTP_REFERER'])) {
  if (isset($_SESSION['jak_lastURL'])) {
    $_SERVER['HTTP_REFERER'] = $_SESSION['jak_lastURL'];
  } else {
    $_SERVER['HTTP_REFERER'] = BASE_URL;
  }
}

// Assign Pages to template
define('JAK_PAGINATE_ADMIN', 0);

// Parse stuff we use more then once
define('JAK_PARSE_ERROR', html_entity_decode(ENVO_rewrite::envoParseurl('error', 'mysql')));
define('JAK_PARSE_SUCCESS', html_entity_decode(ENVO_rewrite::envoParseurl('success')));

// EN: Get the language file from the Hook by  name of Hook
// CZ: Načtení jazykového souboru z Hook podle jména Hook
$hooklang = $envohooks->EnvoGethook("php_lang");
if ($hooklang) foreach ($hooklang as $hlang) {
  eval($hlang['phpcode']);
}

// EN: Get all data from the Hook by name of Hook
// CZ: Načtení všech dat z Hook podle jména Hook
$JAK_HOOK_HEAD_TOP      = $envohooks->EnvoGethook("tpl_between_head");
$JAK_HOOK_BODY_TOP      = $envohooks->EnvoGethook("tpl_body_top");
$JAK_HOOK_HEADER        = $envohooks->EnvoGethook("tpl_header");
$JAK_HOOK_BELOW_HEADER  = $envohooks->EnvoGethook("tpl_below_header");
$JAK_HOOK_PAGE          = $envohooks->EnvoGethook("tpl_page");
$JAK_HOOK_SIDEBAR       = $envohooks->EnvoGethook("tpl_sidebar");
$JAK_HOOK_BELOW_CONTENT = $envohooks->EnvoGethook("tpl_below_content");
$JAK_HOOK_FOOTER        = $envohooks->EnvoGethook("tpl_footer");
$JAK_HOOK_FOOTER_WIDGET = $envohooks->EnvoGethook("tpl_footer_widgets");
$JAK_HOOK_FOOTER_END    = $envohooks->EnvoGethook("tpl_footer_end");

// EN: Get all the php Hook by name of Hook for 'index top'
// CZ: Načtení všech php dat z Hook podle jména Hook pro 'index top'
$indexhook = $envohooks->EnvoGethook("php_index_top");
if ($indexhook) {
  foreach ($indexhook as $it) {
    eval($it['phpcode']);
  }
}

// Define the avatarpath in the settings
define('JAK_USERRPATH_BASE', BASE_URL . JAK_FILES_DIRECTORY . '/userfiles');

// User is logged in #else not
if (JAK_USERID) {
  define('JAK_USERGROUPID', $jakuser->getVar("usergroupid"));
  $JAK_USERNAME_LINK = strtolower($jakuser->getVar("username"));
  $JAK_USERNAME      = $jakuser->getVar("username");
  $P_USR_LOGOUT      = ENVO_rewrite::envoParseurl('logout', '', '', '', '');

  // does the user have admin access
  if ($jakuser->jakAdminaccess($jakuser->getVar("usergroupid"))) {
    define('JAK_ASACCESS', TRUE);
  } else {
    define('JAK_ASACCESS', FALSE);
  }

} else {
  define('JAK_USERGROUPID', 1);
  $JAK_USERNAME = FALSE;
  define('JAK_ASACCESS', FALSE);

}

// Pagination/Date/template/plugin reset
$JAK_PAGINATE = $SHOWDATE = $apedit = $qapedit = $printme = $keylist = $seop = $seo = $seoc = $JAK_HEADER_CSS = $JAK_SEARCH_LINK = $JAK_ADD_MENU_SB = $JAK_HOOK_SIDE_GRID = $JAK_UFORM_EXTRA = $PAGE_TITLE = $PAGE_CONTENT = $PAGE_KEYWORDS = $PAGE_DESCRIPTION = $P_RSS_LINK = $JAK_TPL_PLUG_T = $JAK_TPL_PLUG_URL = FALSE;

// Errors, Seo
$errors = $seokeywords = $usraccesspl = array();

// RSS
$JAK_RSS_DISPLAY = 0;

// Reset Prev/Next
$JAK_NAV_NEXT = $JAK_NAV_NEXT_TITLE = $JAK_NAV_PREV = $JAK_NAV_PREV_TITLE = $JAK_PAGE_OFFLINE = FALSE;

// Something that needs to be true by standard
$JAK_SHOW_NAVBAR = $JAK_SHOW_FOOTER = $newsloadonce = TRUE;

// Include post functionality
include_once 'include/loginpass.php';

// Current session for template
define('CUR_SESSION', session_id());

// Include contact post file if needed.
if ($jkv["contactform"]) include_once 'include/contact.php';

if ($jkv["robots"] == 0) {
  $jk_robots = 'index, nofollow';
} else {
  $jk_robots = 'index, follow';
}

// Define other constant
define('ENVO_TEMPLATE', $jkv["sitestyle"]);
define('JAK_SEARCH', $jkv["searchform"]);
define('JAK_CONTACT_FORM', $jkv["contactform"]);

// Get all the active categories available in the db
$jakcategories = ENVO_base::envoGetallcategories();

// Let's check if News are active
define('JAK_NEWS_ACTIVE', $jakplugins->getPHPcodeid(1, "active"));

// Now check if tags/ads are active, this is global, if you don't use tags, you will safe a lot of queries
define('JAK_TAGS', $jakplugins->getPHPcodeid(3, "active"));
// if Tags are active
if (JAK_TAGS) {
  // Get the tag before all others, because of the url
  define('JAK_USER_TAGS', $jakusergroup->getVar("tags"));
} else {
  // Get the tag before all others, because of the url
  define('JAK_USER_TAGS', 0);
}

// User can use search and use tags
define('JAK_USER_SEARCH', $jakusergroup->getVar("advsearch"));


/* =====================================================
 *  IP BLOCKED or RANGE - BLOKACE IP nebo ROZSAHU
 * ===================================================== */
// Get the users ip address
$ipa = get_ip_address();

// EN: Check if the ip or range is blocked, if so redirect to offline page with a message
// CZ: Kontrola jestli je IP adresa uživatele blokována. Pokud ano, přesměruj stránku na offline stránku a zobraz zprávu
$USR_IP_BLOCKED = FALSE;
if ($jkv["ip_block"]) {
  $blockedips = explode(',', $jkv["ip_block"]);
  // Do we have a range
  if (is_array($blockedips)) foreach ($blockedips as $bip) {
    $blockedrange = explode(':', $bip);

    $remote = ip2long($ipa);

    if (!empty($blockedrange) && is_array($blockedrange) && isset($blockedrange[0]) && isset($blockedrange[1])) {

      $network = ip2long($blockedrange[0]);
      $mask    = ip2long($blockedrange[1]);

      if (($remote & $mask) == $network) {
        $USR_IP_BLOCKED = $tl['general_error']['generror9'];
        // EN: Add error message to session
        // CZ: Přidání chybové zprávy do session
        $_SESSION["errormsg"] = $USR_IP_BLOCKED;
      }
    }

    // Check if we have single IP's
    if ($remote == $bip) {
      $USR_IP_BLOCKED = $tl['general_error']['generror9'];
      // EN: Add error message to session
      // CZ: Přidání chybové zprávy do session
      $_SESSION["errormsg"] = $USR_IP_BLOCKED;
    }

  }
  // Now let's check if we have another match
  if (in_array($ipa, $blockedips)) {
    $USR_IP_BLOCKED = $tl['general_error']['generror9'];
    // EN: Add error message to session
    // CZ: Přidání chybové zprávy do session
    $_SESSION["errormsg"] = $USR_IP_BLOCKED;
  }
}

/* =====================================================
 *  CAPTCHA - CAPTCHA
 * ===================================================== */
// Finally get the captcha if wish so
if ($jkv["hvm"]) {

  if (isset($_SESSION['jak_captcha'])) {

    $human_captcha = explode(':#:', $_SESSION['jak_captcha']);

    $random_name  = $human_captcha[0];
    $random_value = $human_captcha[1];

  } else {

    $random_name  = rand();
    $random_value = rand();

    $_SESSION['jak_captcha'] = $random_name . ':#:' . $random_value;

  }

}

/* =====================================================
 *  OFFLINE PAGE - OFFLINE REŽIM
 * ===================================================== */
// EN: If the site is set to offline (offline or user's IP is blocked)
// CZ: Pokud je webová síť offline (síť je nastavena do offline režimu nebo IP uživatele je blokováno)
if ($jkv["offline"] == 1 && !JAK_ASACCESS || $USR_IP_BLOCKED) {
  $JAK_PAGE_OFFLINE = TRUE;
  if ($jkv["offline_page"]) {
    foreach ($jakcategories as $ca) {
      if ($ca['id'] == $jkv["offline_page"] && !empty($ca['pageid'])) {
        $offlinepage = $ca['pageid'];
        break;
      }
    }
  } else {
    $page = 'offline';
  }
}

// Now get all defines out from the plugins before we start with pages
foreach ($jakcategories as $ca) {

  if (!empty($ca['pluginid'])) {

    // Get the array first so we can use it in the plugins
    if ($jakusergroup->getVar($jakplugins->getPHPcodeid($ca['pluginid'], "usergroup")) == 1 || $jakplugins->getPHPcodeid($ca['pluginid'], "usergroup") == 1) {
      $usraccesspl[] = $jakplugins->getPHPcodeid($ca['pluginid'], "id");
    }

    $plugName = strtoupper($jakplugins->getPHPcodeid($ca['pluginid'], "name"));

    // Define the varname for further use
    define('JAK_PLUGIN_VAR_' . $plugName, $ca['pagename']);

    // Define the id for further use
    define('JAK_PLUGIN_ID_' . $plugName, $jakplugins->getPHPcodeid($ca['pluginid'], "id"));

    // Define the name for further use
    define('JAK_PLUGIN_NAME_' . $plugName, $ca['name']);

    // Define the access for further use
    if ($jakplugins->getPHPcodeid($ca['pluginid'], "usergroup") == 1) {
      define('JAK_PLUGIN_ACCESS_' . $plugName, $jakplugins->getPHPcodeid($ca['pluginid'], "usergroup"));
    } else {
      define('JAK_PLUGIN_ACCESS_' . $plugName, $jakusergroup->getVar($jakplugins->getPHPcodeid($ca['pluginid'], "usergroup")));
    }

  }
}

// Get the PLUGIN categories available in the db
// Plugin Register Form
if (is_numeric(JAK_PLUGIN_ID_REGISTER_FORM) && JAK_PLUGIN_ID_REGISTER_FORM > 0) {
  $result        = $envodb->query('SELECT name, varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = "' . JAK_PLUGIN_ID_REGISTER_FORM . '" LIMIT 1');
  $PLUGIN_RF_CAT = $result->fetch_assoc();
}

// Set the check page to 0
$JAK_CHECK_PAGE = 0;

// Include all the pages
foreach ($jakcategories as $ca) {

  if ($ca['pluginid'] == 0 || $JAK_PAGE_OFFLINE && isset($offlinepage)) {

    if ((empty($page) && $ca['catorder'] == 1 && $ca['catparent'] == 0 && $ca['showmenu'] == 1) || ($page == $ca['pagename'])) {

      // What information should we load
      if ($JAK_PAGE_OFFLINE && isset($offlinepage)) {
        $pageid = $offlinepage;
      } elseif ($ca['pageid'] > 0) {
        $pageid = $ca['pageid'];
      } else {
        envo_redirect(ENVO_rewrite::envoParseurl('404', '', '', '', ''));
      }

      // Include the page php file
      require_once 'page.php';
      $JAK_CHECK_PAGE = 1;

      // Get the rss if active
      if ($jkv["rss"]) {
        $JAK_RSS_DISPLAY = 1;
        $P_RSS_LINK      = ENVO_rewrite::envoParseurl('rss.xml', '', '', '', '');
      }
      break;
    }
  }

  // Call the plugins if page is not the one
  if ($ca['pluginid'] > 0 && ($jakusergroup->getVar($jakplugins->getPHPcodeid($ca['pluginid'], "usergroup")) == 1 || $jakplugins->getPHPcodeid($ca['pluginid'], "usergroup") == 1)) {

    if ((!$page && $ca['catorder'] == 1 && $ca['showmenu'] == 1) || ($page == $ca['pagename'])) {

      // include the php site
      eval($jakplugins->getPHPcodeid($ca['pluginid'], "phpcode"));

      // Page exist please go on
      $JAK_CHECK_PAGE = 1;

      // Load standard if nothing has been found
      if (!$page && $ca['catorder'] == 1) $page = $ca['pagename'];
      break;

    }
  }
}

/* =====================================================
 *  PAGE DEFINITION - DEFINICE STRÁNEK
 * ===================================================== */
// EN: Login to site
// CZ: Přihlášení do webové sítě
if ($page == 'login') {
  $PAGE_TITLE     = $tl['global_text']['gtxt9'];
  $template       = 'login.php';
  $JAK_CHECK_PAGE = 1;
  $PAGE_SHOWTITLE = 1;
}

// EN: Logout from site
// CZ: Odhlášení z webové sítě
if ($page == 'logout') {
  if (!JAK_USERID) {
    // EN: Add error message to session
    // CZ: Přidání chybové zprávy do session
    $_SESSION["errormsg"] = $tl["general_error"]["generror1"];
    // EN: Redirect page
    // CZ: Přesměrování stránky
    envo_redirect(BASE_URL);
  }
  if (JAK_USERID) {
    $jakuserlogin->envoLogout(JAK_USERID);
    $usergroupid = $jakuser->getVar("usergroupid");
    // EN: Add error message to session
    // CZ: Přidání chybové zprávy do session
    $_SESSION["infomsg"] = $tl["notification"]["n4"];
    // EN: Redirect page
    // CZ: Přesměrování stránky
    // envo_redirect($_SERVER['HTTP_REFERER']);
    envo_redirect(BASE_URL);
  }
}

// EN: Page - Search
// CZ: Vyhledávání
if ($page == 'search') {
  /* Redirect to base url if search isn't
   * if (!$jkv["searchform"] || !JAK_USER_SEARCH) { envo_redirect (BASE_URL); }
  */

  // Get the url session
  $_SESSION['jak_lastURL'] = ENVO_rewrite::envoParseurl('search');
  require_once 'search.php';
  $PAGE_SHOWTITLE = 1;
  $JAK_CHECK_PAGE = 1;
}

// EN: 'Success' page
// CZ: 'Success' stránka
if ($page == 'success') {
  $PAGE_TITLE     = $tl['global_text']['gtxt3'];
  $template       = 'success.php';
  $JAK_CHECK_PAGE = 1;
  $PAGE_SHOWTITLE = 1;
}

// EN: 'Error' page
// CZ: 'Error' stránka
if ($page == 'error') {
  $PAGE_TITLE     = $tl['title_page']['tpl'];
  $PAGE_CONTENT   = $tl['general_error']['generror10'];
  $template       = 'standard.php';
  $JAK_CHECK_PAGE = 1;
  $PAGE_SHOWTITLE = 1;
}

// EN: 'Rss' feautures
// CZ: 'Rss' funkce
if ($page == 'rss.xml') {
  require_once 'rss.php';
  $JAK_CHECK_PAGE = 1;
}

// EN: '404' page
// CZ: '404' stránka
if ($page == '404') {
  if ($jkv["notfound_page"] != 0) {
    foreach ($jakcategories as $ca) {
      if ($ca['id'] == $jkv["notfound_page"] && !empty($ca['pageid'])) {
        $pageid = $ca['pageid'];
        break;
      }
    }
    // Include the page php file
    require_once 'page.php';
  } else {
    $PAGE_TITLE = '404 ' . $tl['title_page']['tpl1'];
    $template   = '404.php';
  }
  $JAK_CHECK_PAGE = 1;
  $PAGE_SHOWTITLE = 1;
}

// EN: 'Offline' page
// CZ: 'Offline' stránka
if ($page == 'offline') {
  $PAGE_TITLE     = $tl['title_page']['tpl2'] . ' ';
  $template       = 'offline.php';
  $JAK_CHECK_PAGE = 1;
  $PAGE_SHOWTITLE = 1;
}

// EN: 'Forgot-password' page
// CZ: 'Forgot-password' stránka
if ($page == 'forgot-password') {

  if (JAK_USERID || !is_numeric($page1) || !$jakuserlogin->envoForgotActive($page1)) envo_redirect(BASE_URL);

  // Check the forgot code
  $row = $envodb->queryRow('SELECT id, name, email FROM ' . DB_PREFIX . 'user WHERE forgot = "' . smartsql($page1) . '" LIMIT 1');

  $password  = envo_password_creator();
  $passcrypt = hash_hmac('sha256', $password, DB_PASS_HASH);

  /* EN: Convert value
   * smartsql - secure method to insert form data into a MySQL DB
   * ------------------
   * CZ: Převod hodnot
   * smartsql - secure method to insert form data into a MySQL DB
  */
  $result = $envodb->query('UPDATE ' . DB_PREFIX . 'user SET
   		password = "' . smartsql($passcrypt) . '"
   		WHERE id = "' . smartsql($row["id"]) . '"');

  if (!$result) {

    $_SESSION["errormsg"] = $tl["general_error"]["generror1"];
    // redirect back to home
    envo_redirect(BASE_URL);

  } else {

    $body = sprintf($tl['email_text']['emailm'], $row["name"], $password, $jkv["title"]);

    $mail = new PHPMailer(); // defaults to using php "mail()"
    $mail->SetFrom($jkv["email"], $jkv["title"]);
    $mail->AddAddress($row["email"], $row["name"]);
    $mail->Subject = $jkv["title"] . ' - ' . $tl['email_text']['emailm1'];
    $mail->MsgHTML($body);
    $mail->AltBody = strip_tags($body);

    if ($mail->Send()) {
      $_SESSION["infomsg"] = $tl["email_text"]["emailm2"];
      envo_redirect(BASE_URL);
    }

  }

  $_SESSION["errormsg"] = $tl["general_error"]["generror1"];
  envo_redirect(BASE_URL);
}

/* =====================================================
 *  PHP HOOKs for INDEX PAGE - PHP HOOK pro INDEX PAGE
 * ===================================================== */
// Get the php hook for index page
$hookip = $envohooks->EnvoGethook("php_index_page");
if ($hookip) foreach ($hookip as $hip) {
  eval($hip['phpcode']);
}

// EN: If page not found
// CZ: Pokud stránka není nalezena
if ($JAK_CHECK_PAGE == 0) {
  envo_redirect(ENVO_rewrite::envoParseurl('404', '', '', '', ''));
}

// Get the categories with usergroup rights
$JAK_CAT_SITE = ENVO_base::envoCatdisplay(JAK_USERGROUPID, $usraccesspl, $jakcategories);

// Get the header navigation
$mheader = array(
  'items'   => array(),
  'parents' => array()
);
// Builds the array lists with data from the menu table
foreach ($JAK_CAT_SITE as $items) {

  if ($items["showmenu"] == 1 OR ($items["showmenu"] == 1 && $items["showfooter"] == 1)) {
    // Creates entry into items array with current menu item id ie. $menu['items'][1]
    $mheader['items'][$items['id']] = $items;
    // Creates entry into parents array. Parents array contains a list of all items with children
    $mheader['parents'][$items['catparent']][] = $items['id'];
  }
}

// Get the footer navigation
$mfooter = array(
  'items'   => array(),
  'parents' => array()
);

// Builds the array lists with data from the menu table
foreach ($JAK_CAT_SITE as $itemf) {

  if ($itemf["showfooter"] == 1) {
    // Creates entry into items array with current menu item id ie. $menu['items'][1]
    $mfooter['items'][$itemf['id']] = $itemf;
    // Creates entry into parents array. Parents array contains a list of all items with children
    $mfooter['parents'][$itemf['catparent']][] = $itemf['id'];
  }
}

// Get News out the database, if not already in the page
if (JAK_NEWS_ACTIVE && $newsloadonce && $jkv["shownews"]) {
  $JAK_GET_NEWS_SORTED = envo_get_news('LIMIT ' . $jkv["shownews"], '', JAK_PLUGIN_VAR_NEWS, $jkv["newsorder"], $jkv["newsdateformat"], $jkv["newstimeformat"], $tl['global_text']['gtxt4']);
}

// We have tags
if (JAK_TAGS) $JAK_GET_TAG_CLOUD = ENVO_tags::envoGettagcloud(JAK_PLUGIN_VAR_TAGS, 'tagcloud', $jkv["taglimit"], $jkv["tagmaxfont"], $jkv["tagminfont"], $tl["title_element"]["tel"]);

// SEARCH, NEWS and Mobile/Web LINK
$P_SEAERCH_LINK = ENVO_rewrite::envoParseurl('search', '', '', '', '');
if (JAK_NEWS_ACTIVE) $P_NEWS_LINK = ENVO_rewrite::envoParseurl(JAK_PLUGIN_VAR_NEWS, '', '', '', '');

// Get the php hook for index bottom
$hookib = $envohooks->EnvoGethook("php_index_bottom");
if ($hookib) foreach ($hookib as $hib) {
  eval($hib['phpcode']);
}

// Should we show the date
if ($SHOWDATE == '1') define('SHOWDATE', 1);

// Check if there is tag and the user can see it
if (!JAK_TAGS && !JAK_USER_TAGS) $JAK_TAGLIST = FALSE;

// Get the normal or plugin template
if (isset($jkv["sitestyle"]) && !empty(ENVO_TEMPLATE) && isset($jkv["cms_tpl"]) && isset($template) && $template != '') {
  include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/' . $template;
  // Get the plugin template
} elseif (isset($jkv["cms_tpl"]) && isset($plugin_template)) {
  // Check if plugin template files exist or not
  if (!file_exists(APP_PATH . $plugin_template)) {
    include_once APP_PATH . 'noplugintemplate.php';
  } else {
    include_once APP_PATH . $plugin_template;
  }
  // No normal template available
} else {
  include_once APP_PATH . 'notemplate.php';
}

// EN: Reset Session for next use
// CZ: Reset Session pro další použití
unset($_SESSION["infomsg"]);
unset($_SESSION["successmsg"]);
unset($_SESSION["errormsg"]);
unset($_SESSION["warningmsg"]);

// Reset session from PLUGIN's for next use
unset($_SESSION["rf_msg_sent"]);

// EN: Finally close all db connections
// CZ: Uzavření spojení do databáze
$envodb->envo_close();

?>