<?php

// prevent direct php access
define('ENVO_PREVENT_ACCESS', 1);

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
if (ENVO_USERID && $envouser->envoSuperAdminAccess(ENVO_USERID)) {
  define('ENVO_SUPERADMINACCESS', TRUE);
} else {
  define('ENVO_SUPERADMINACCESS', FALSE);
}

// EN: Import the language file
// CZ: Import jazykových souborů
if ($setting["lang"] != $site_language && file_exists(APP_PATH . 'lang/' . $site_language . '.ini')) {
  $tl = parse_ini_file(APP_PATH . 'lang/' . $site_language . '.ini', TRUE);
} else {
  $tl = parse_ini_file(APP_PATH . 'lang/' . $setting["lang"] . '.ini', TRUE);
}

// If Referer Zero go to the session url
if (!isset($_SERVER['HTTP_REFERER'])) {
  if (isset($_SESSION['envo_lastURL'])) {
    $_SERVER['HTTP_REFERER'] = $_SESSION['envo_lastURL'];
  } else {
    $_SERVER['HTTP_REFERER'] = BASE_URL;
  }
}

// Assign Pages to template
define('ENVO_PAGINATE_ADMIN', 0);

// Parse stuff we use more then once
define('ENVO_PARSE_ERROR', html_entity_decode(ENVO_rewrite::envoParseurl('error', 'mysql')));
define('ENVO_PARSE_SUCCESS', html_entity_decode(ENVO_rewrite::envoParseurl('success')));

// EN: Get the language file from the Hook by  name of Hook
// CZ: Načtení jazykového souboru z Hook podle jména Hook
$hooklang = $envohooks->EnvoGethook("php_lang");
if ($hooklang) foreach ($hooklang as $hlang) {
  eval($hlang['phpcode']);
}

// EN: Get all the php Hook by name of Hook for 'index top'
// CZ: Načtení všech php dat z Hook podle jména Hook pro 'index top'
$indexhook = $envohooks->EnvoGethook("php_index_top");
if ($indexhook) {
  foreach ($indexhook as $it) {
    eval($it['phpcode']);
  }
}

// EN: Get all data from the Hook by name of Hook
// CZ: Načtení všech dat z Hook podle jména Hook
$ENVO_HOOK_HEAD_TOP      = $envohooks->EnvoGethook("tpl_between_head");
$ENVO_HOOK_BODY_TOP      = $envohooks->EnvoGethook("tpl_body_top");
$ENVO_HOOK_HEADER        = $envohooks->EnvoGethook("tpl_header");
$ENVO_HOOK_BELOW_HEADER  = $envohooks->EnvoGethook("tpl_below_header");
$ENVO_HOOK_PAGE          = $envohooks->EnvoGethook("tpl_page");
$ENVO_HOOK_SIDEBAR       = $envohooks->EnvoGethook("tpl_sidebar");
$ENVO_HOOK_BELOW_FOOTER = $envohooks->EnvoGethook("tpl_below_footer");
$ENVO_HOOK_FOOTER        = $envohooks->EnvoGethook("tpl_footer");
$ENVO_HOOK_FOOTER_WIDGET = $envohooks->EnvoGethook("tpl_footer_widgets");
$ENVO_HOOK_FOOTER_END    = $envohooks->EnvoGethook("tpl_footer_end");

// Define the avatarpath in the settings
define('ENVO_USERRPATH_BASE', BASE_URL . ENVO_FILES_DIRECTORY . '/userfiles');

// User is logged in #else not
if (ENVO_USERID) {
  define('ENVO_USERGROUPID', $envouser->getVar("usergroupid"));
  $ENVO_USERNAME_LINK = strtolower($envouser->getVar("username"));
  $ENVO_USERNAME      = $envouser->getVar("username");
  $P_USR_LOGOUT       = ENVO_rewrite::envoParseurl('logout', '', '', '', '');

  // does the user have admin access
  if ($envouser->envoAdminAccess($envouser->getVar("usergroupid"))) {
    define('ENVO_ASACCESS', TRUE);
  } else {
    define('ENVO_ASACCESS', FALSE);
  }

} else {
  define('ENVO_USERGROUPID', 1);
  $ENVO_USERNAME = FALSE;
  define('ENVO_ASACCESS', FALSE);
}

// Pagination/Date/template/plugin reset
$ENVO_PAGINATE = $SHOWDATE = $apedit = $qapedit = $printme = $keylist = $seop = $seo = $seoc = $ENVO_HEADER_CSS = $ENVO_SEARCH_LINK = $ENVO_ADD_MENU_SB = $ENVO_HOOK_SIDE_GRID = $ENVO_UFORM_EXTRA = $PAGE_TITLE = $PAGE_CONTENT = $PAGE_KEYWORDS = $PAGE_DESCRIPTION = $P_RSS_LINK = $ENVO_TPL_PLUG_T = $ENVO_TPL_PLUG_URL = FALSE;

// Errors, Seo
$errors = $seokeywords = $usraccesspl = array();

// RSS
$ENVO_RSS_DISPLAY = 0;

// Reset Prev/Next
$ENVO_NAV_NEXT = $ENVO_NAV_NEXT_TITLE = $ENVO_NAV_PREV = $ENVO_NAV_PREV_TITLE = $ENVO_PAGE_OFFLINE = FALSE;

// Something that needs to be true by standard
$ENVO_SHOW_NAVBAR = $ENVO_SHOW_FOOTER = $newsloadonce = TRUE;

// Include post functionality
include_once 'include/loginpass.php';

// Current session for template
define('CUR_SESSION', session_id());

// Include contact post file if needed.
if ($setting["contactform"]) include_once 'include/contact.php';

if ($setting["robots"] == 0) {
  $jk_robots = 'index, nofollow';
} else {
  $jk_robots = 'index, follow';
}

// Define other constant
define('ENVO_TEMPLATE', $setting["sitestyle"]);
define('ENVO_SEARCH', $setting["searchform"]);
define('ENVO_CONTACT_FORM', $setting["contactform"]);

// Get all the active categories available in the db
$envocategories = ENVO_base::envoGetallcategories();

// Let's check if News are active
define('ENVO_NEWS_ACTIVE', $envoplugins->getPHPcodeid(1, "active"));

// Now check if tags/ads are active, this is global, if you don't use tags, you will safe a lot of queries
define('ENVO_TAGS', $envoplugins->getPHPcodeid(3, "active"));
// if Tags are active
if (ENVO_TAGS) {
  // Get the tag before all others, because of the url
  define('ENVO_USER_TAGS', $envousergroup->getVar("tags"));
} else {
  // Get the tag before all others, because of the url
  define('ENVO_USER_TAGS', 0);
}

// User can use search and use tags
define('ENVO_USER_SEARCH', $envousergroup->getVar("advsearch"));


/* =====================================================
 *  IP BLOCKED or RANGE - BLOKACE IP nebo ROZSAHU
 * ===================================================== */
// Get the users ip address
$ipa = get_ip_address();

// EN: Check if the ip or range is blocked, if so redirect to offline page with a message
// CZ: Kontrola jestli je IP adresa uživatele blokována. Pokud ano, přesměruj stránku na offline stránku a zobraz zprávu
$USR_IP_BLOCKED = FALSE;
if ($setting["ip_block"]) {
  $blockedips = explode(',', $setting["ip_block"]);
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
if ($setting["hvm"]) {

  if (isset($_SESSION['envo_captcha'])) {

    $human_captcha = explode(':#:', $_SESSION['envo_captcha']);

    $random_name  = $human_captcha[0];
    $random_value = $human_captcha[1];

  } else {

    $random_name  = rand();
    $random_value = rand();

    $_SESSION['envo_captcha'] = $random_name . ':#:' . $random_value;

  }

}

/* =====================================================
 *  OFFLINE PAGE - OFFLINE REŽIM
 * ===================================================== */
// EN: If the site is set to offline (offline or user's IP is blocked)
// CZ: Pokud je webová síť offline (síť je nastavena do offline režimu nebo IP uživatele je blokováno)
if ($setting["offline"] == 1 && !ENVO_ASACCESS || $USR_IP_BLOCKED) {
  $ENVO_PAGE_OFFLINE = TRUE;
  if ($setting["offline_page"]) {
    foreach ($envocategories as $ca) {
      if ($ca['id'] == $setting["offline_page"] && !empty($ca['pageid'])) {
        $offlinepage = $ca['pageid'];
        break;
      }
    }
  } else {
    $page = 'offline';
  }
}

// Now get all defines out from the plugins before we start with pages
foreach ($envocategories as $ca) {

  if (!empty($ca['pluginid'])) {

    // Get the array first so we can use it in the plugins
    if ($envousergroup->getVar($envoplugins->getPHPcodeid($ca['pluginid'], "usergroup")) == 1 || $envoplugins->getPHPcodeid($ca['pluginid'], "usergroup") == 1) {
      $usraccesspl[] = $envoplugins->getPHPcodeid($ca['pluginid'], "id");
    }

    $plugName = strtoupper($envoplugins->getPHPcodeid($ca['pluginid'], "name"));

    // Define the varname for further use
    define('ENVO_PLUGIN_VAR_' . $plugName, $ca['pagename']);

    // Define the id for further use
    define('ENVO_PLUGIN_ID_' . $plugName, $envoplugins->getPHPcodeid($ca['pluginid'], "id"));

    // Define the name for further use
    define('ENVO_PLUGIN_NAME_' . $plugName, $ca['name']);

    // Define the access for further use
    if ($envoplugins->getPHPcodeid($ca['pluginid'], "usergroup") == 1) {
      define('ENVO_PLUGIN_ACCESS_' . $plugName, $envoplugins->getPHPcodeid($ca['pluginid'], "usergroup"));
    } else {
      define('ENVO_PLUGIN_ACCESS_' . $plugName, $envousergroup->getVar($envoplugins->getPHPcodeid($ca['pluginid'], "usergroup")));
    }

  }
}

// Get the PLUGIN categories available in the db
// Plugin Register Form
if (is_numeric(ENVO_PLUGIN_ID_REGISTER_FORM) && ENVO_PLUGIN_ID_REGISTER_FORM > 0) {
  $result        = $envodb->query('SELECT name, varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = "' . ENVO_PLUGIN_ID_REGISTER_FORM . '" LIMIT 1');
  $PLUGIN_RF_CAT = $result->fetch_assoc();
}

// Set the check page to 0
$ENVO_CHECK_PAGE = 0;

// Include all the pages
foreach ($envocategories as $ca) {

  if ($ca['pluginid'] == 0 || $ENVO_PAGE_OFFLINE && isset($offlinepage)) {

    if ((empty($page) && $ca['catorder'] == 1 && $ca['catparent'] == 0 && $ca['showmenu'] == 1) || ($page == $ca['pagename'])) {

      // What information should we load
      if ($ENVO_PAGE_OFFLINE && isset($offlinepage)) {
        $pageid = $offlinepage;
      } elseif ($ca['pageid'] > 0) {
        $pageid = $ca['pageid'];
      } else {
        envo_redirect(ENVO_rewrite::envoParseurl('404', '', '', '', ''));
      }

      // Include the page php file
      require_once 'page.php';
      $ENVO_CHECK_PAGE = 1;

      // Get the rss if active
      if ($setting["rss"]) {
        $ENVO_RSS_DISPLAY = 1;
        $P_RSS_LINK       = ENVO_rewrite::envoParseurl('rss.xml', '', '', '', '');
      }
      break;
    }
  }

  // Call the plugins if page is not the one
  if ($ca['pluginid'] > 0 && ($envousergroup->getVar($envoplugins->getPHPcodeid($ca['pluginid'], "usergroup")) == 1 || $envoplugins->getPHPcodeid($ca['pluginid'], "usergroup") == 1)) {

    if ((!$page && $ca['catorder'] == 1 && $ca['showmenu'] == 1) || ($page == $ca['pagename'])) {

      // include the php site
      eval($envoplugins->getPHPcodeid($ca['pluginid'], "phpcode"));

      // Page exist please go on
      $ENVO_CHECK_PAGE = 1;

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
  $PAGE_TITLE      = $tl['global_text']['gtxt9'];
  $template        = 'login.php';
  $ENVO_CHECK_PAGE = 1;
  $PAGE_SHOWTITLE  = 1;
}

// EN: Logout from site
// CZ: Odhlášení z webové sítě
if ($page == 'logout') {
  if (!ENVO_USERID) {
    // EN: Add error message to session
    // CZ: Přidání chybové zprávy do session
    $_SESSION["errormsg"] = $tl["general_error"]["generror1"];
    // EN: Redirect page
    // CZ: Přesměrování stránky
    envo_redirect(BASE_URL);
  }
  if (ENVO_USERID) {
    $envouserlogin->envoLogout(ENVO_USERID);
    $usergroupid = $envouser->getVar("usergroupid");
    // EN: Add info message to session
    // CZ: Přidání info zprávy do session
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
   * if (!$setting["searchform"] || !ENVO_USER_SEARCH) { envo_redirect (BASE_URL); }
  */

  // Get the url session
  $_SESSION['envo_lastURL'] = ENVO_rewrite::envoParseurl('search');
  require_once 'search.php';
  $PAGE_SHOWTITLE  = 1;
  $ENVO_CHECK_PAGE = 1;
}

// EN: 'Success' page
// CZ: 'Success' stránka
if ($page == 'success') {
  $PAGE_TITLE      = $tl['global_text']['gtxt3'];
  $template        = 'success.php';
  $ENVO_CHECK_PAGE = 1;
  $PAGE_SHOWTITLE  = 1;
}

// EN: 'Error' page
// CZ: 'Error' stránka
if ($page == 'error') {
  $PAGE_TITLE      = $tl['title_page']['tpl'];
  $PAGE_CONTENT    = $tl['general_error']['generror10'];
  $template        = 'error.php';
  $ENVO_CHECK_PAGE = 1;
  $PAGE_SHOWTITLE  = 1;
}

// EN: 'Rss' feautures
// CZ: 'Rss' funkce
if ($page == 'rss.xml') {
  require_once 'rss.php';
  $ENVO_CHECK_PAGE = 1;
}

// EN: '404' page
// CZ: '404' stránka
if ($page == '404') {
  if ($setting["notfound_page"] != 0) {
    foreach ($envocategories as $ca) {
      if ($ca['id'] == $setting["notfound_page"] && !empty($ca['pageid'])) {
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
  $ENVO_CHECK_PAGE = 1;
  $PAGE_SHOWTITLE  = 1;
}

// EN: 'Offline' page
// CZ: 'Offline' stránka
if ($page == 'offline') {
  $PAGE_TITLE      = $tl['title_page']['tpl2'] . ' ';
  $template        = 'offline.php';
  $ENVO_CHECK_PAGE = 1;
  $PAGE_SHOWTITLE  = 1;
}

// EN: 'Forgot-password' page
// CZ: 'Forgot-password' stránka
if ($page == 'forgot-password') {

  if (ENVO_USERID || !is_numeric($page1) || !$envouserlogin->envoForgotActive($page1)) envo_redirect(BASE_URL);

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

    $body = sprintf($tl['email_text']['emailm'], $row["name"], $password, $setting["title"]);

    $mail = new PHPMailer(); // defaults to using php "mail()"
    $mail->SetFrom($setting["email"], $setting["title"]);
    $mail->AddAddress($row["email"], $row["name"]);
    $mail->Subject = $setting["title"] . ' - ' . $tl['email_text']['emailm1'];
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

// EN: Page is not found - Error page 404
// CZ: Stránka není nalezena - Chybová stránka 404
if ($ENVO_CHECK_PAGE == 0) {
  http_response_code(404);
  /* Redirect browser to page 404 */
  echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ' . ENVO_rewrite::envoParseurl('404', '', '', '', '') . '">';
  exit();
}

// Get the categories with usergroup rights
$ENVO_CAT_SITE = ENVO_base::envoCatdisplay(ENVO_USERGROUPID, $usraccesspl, $envocategories);

// Get the header navigation
$mheader = array(
  'items'   => array(),
  'parents' => array()
);
// Builds the array lists with data from the menu table
foreach ($ENVO_CAT_SITE as $items) {

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
foreach ($ENVO_CAT_SITE as $itemf) {

  if ($itemf["showfooter"] == 1) {
    // Creates entry into items array with current menu item id ie. $menu['items'][1]
    $mfooter['items'][$itemf['id']] = $itemf;
    // Creates entry into parents array. Parents array contains a list of all items with children
    $mfooter['parents'][$itemf['catparent']][] = $itemf['id'];
  }
}

// Get News out the database, if not already in the page
if (ENVO_NEWS_ACTIVE && $newsloadonce && $setting["shownews"]) {
  $ENVO_GET_NEWS_SORTED = envo_get_news('LIMIT ' . $setting["shownews"], '', ENVO_PLUGIN_VAR_NEWS, $setting["newsorder"], $setting["newsdateformat"], $setting["newstimeformat"], $tl['global_text']['gtxt4']);
}

// We have tags
if (ENVO_TAGS) $ENVO_GET_TAG_CLOUD = ENVO_tags::envoGettagcloud(ENVO_PLUGIN_VAR_TAGS, 'tagcloud', $setting["taglimit"], $setting["tagmaxfont"], $setting["tagminfont"], $tl["title_element"]["tel"]);

// SEARCH, NEWS and Mobile/Web LINK
$P_SEAERCH_LINK = ENVO_rewrite::envoParseurl('search', '', '', '', '');
if (ENVO_NEWS_ACTIVE) $P_NEWS_LINK = ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_NEWS, '', '', '', '');

// Get the php hook for index bottom
$hookib = $envohooks->EnvoGethook("php_index_bottom");
if ($hookib) foreach ($hookib as $hib) {
  eval($hib['phpcode']);
}

// Should we show the date
if ($SHOWDATE == '1') define('SHOWDATE', 1);

// Check if there is tag and the user can see it
if (!ENVO_TAGS && !ENVO_USER_TAGS) $ENVO_TAGLIST = FALSE;

// Get the normal or plugin template
if (isset($setting["sitestyle"]) && !empty(ENVO_TEMPLATE) && isset($setting["cms_tpl"]) && isset($template) && $template != '') {
  include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/' . $template;
  // Get the plugin template
} elseif (isset($setting["cms_tpl"]) && isset($plugin_template)) {
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