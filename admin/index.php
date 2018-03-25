<?php

// Prevent direct php access
define('ENVO_ADMIN_PREVENT_ACCESS', 1);

// Access not allowed
$ENVO_PROVED = FALSE;

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/index.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Parsování webové adresy
// CZ: Parsování webové adresy
$page  = ($temppa ? envo_url_input_filter($temppa) : '');
$page1 = ($temppa1 ? envo_url_input_filter($temppa1) : '');
$page2 = ($temppa2 ? envo_url_input_filter($temppa2) : '');
$page3 = ($temppa3 ? envo_url_input_filter($temppa3) : '');
$page4 = ($temppa4 ? envo_url_input_filter($temppa4) : '');
$page5 = ($temppa5 ? envo_url_input_filter($temppa5) : '');
$page6 = ($temppa6 ? envo_url_input_filter($temppa6) : '');

/* =====================================================
 *  DEFINE CONSTANT - DEFINICE KONSTANT
 * ===================================================== */
// Only the SuperAdmin in the config file see everything
if (ENVO_USERID && $envouser->envoSuperAdminAccess(ENVO_USERID)) {
  define('ENVO_SUPERADMINACCESS', TRUE);
} else {
  define('ENVO_SUPERADMINACCESS', FALSE);
}
// We need the template folder, title, author and lang as template variable
define('ENVO_PAGINATE_ADMIN', 1);
// Define other constant
define('ENVO_TEMPLATE', $setting["sitestyle"]);

/* =====================================================
 *  XXX
 * ===================================================== */
// Get the redirect into a sessions for better login handler
if ($page && $page != '404') $_SESSION['ENVORedirect'] = $_SERVER['REQUEST_URI'];

// All other user will be redirect to the homepage, nothing else to do for this people
if (ENVO_USERID && !ENVO_ADMINACCESS) envo_redirect(BASE_URL_ORIG);

/* =====================================================
 *  XXX
 * ===================================================== */
// EN: Import the language file
// CZ: Import jazykových souborů
if ($setting["lang"] != $site_language && file_exists(ROOT_ADMIN . 'lang/' . $site_language . '.ini')) {
  $tl = parse_ini_file(ROOT_ADMIN . 'lang/' . $site_language . '.ini', TRUE);
} else {
  $tl            = parse_ini_file(ROOT_ADMIN . 'lang/' . $setting["lang"] . '.ini', TRUE);
  $site_language = $setting["lang"];
}

/* =====================================================
 *  XXX
 * ===================================================== */
// First check if the user is logged in
if (ENVO_USERID) {

  // Get all the Plugins
  $envoplugins = new ENVO_plugins(2, '');

  // Get all the Hooks
  $envohooks = new ENVO_hooks(1, '');

  // EN: Get all the php Hook by name of Hook
  // CZ: Načtení všech php dat z Hook podle jména Hook
  $hookadminlang = $envohooks->EnvoGethook("php_admin_lang");
  if ($hookadminlang) foreach ($hookadminlang as $halang) {
    eval($halang['phpcode']);
  }

  // EN: Get all the php Hook by name of Hook for implementing css or javascript into the head and footer section
  // CZ: Načtení všech php dat z Hook podle jména Hook pro implentaci css a javascript do záhlaví a zápatí
  $ENVO_HOOK_HEAD_ADMIN   = $envohooks->EnvoGethook("tpl_admin_head");
  $ENVO_HOOK_FOOTER_ADMIN = $envohooks->EnvoGethook("tpl_admin_footer");

  // Get all plugins out the databse
  $ENVO_PLUGINS           = $envoplugins->EnvoGetarray();
  $ENVO_PLUGINS_TOPNAV    = $envoplugins->envoAdminTopNav();
  $ENVO_PLUGINS_MANAGENAV = $envoplugins->envoAdminManageNav();
  // We need the tags if active right in the beginning
  define('ENVO_TAGS', $envoplugins->getPHPcodeid(3, "active"));

  // Show links in template only the user have access
  $ENVO_MODULES = $envouser->envoModuleAccess(ENVO_USERID, $setting["accessgeneral"]);
  $ENVO_MODULEM = $envouser->envoModuleAccess(ENVO_USERID, $setting["accessmanage"]);

  // Get the name from the user for the welcome message
  $ENVO_WELCOME_NAME = $envouser->getVar("name");
}

//
$ENVO_PAGINATE = FALSE;

// Errors
$errors = $exorder = $pluginid = array();

// DB insert
$insert = $updatesql = $updatesql1 = '';

// Set page to zero, first.
$checkp = 0;

// Define http referrer
if (!isset($_SERVER['HTTP_REFERER'])) $_SERVER['HTTP_REFERER'] = '';

// Now run the php code from the plugin section only when we logged in
if (ENVO_USERID) {

  // EN: Get all the php Hook by name of Hook for admin 'index top'
  // CZ: Načtení všech php dat z Hook podle jména Hook pro admin 'index top'
  $hookadminit = $envohooks->EnvoGethook("php_admin_index_top");
  if ($hookadminit) foreach ($hookadminit as $hait) {
    eval($hait['phpcode']);
  }

  $pluginadminphp = $envoplugins->envoAdminIndex();
  if ($pluginadminphp) foreach ($pluginadminphp as $pl) {
    // Page name upper case
    $plname = strtoupper($pl['name']);

    // define the plugin id first
    define('ENVO_PLUGIN_' . $plname, $pl['id']);

    // Get the access out into define
    define('ENVO_ACCESS' . $plname, $pl['access']);

    // then load the php code
    eval($pl['phpcode']);
  }
}

/* =====================================================
 *  PAGE DEFINITION - DEFINICE STRÁNEK
 * ===================================================== */
// EN: Home page
// CZ: Úvodní strana
if ($page == '') {
  // EN: Show login page only if the admin is not logged in else show homepage
  // CZ: Zobrazit stránku 'přihlášení' ...
  if (!ENVO_USERID) {
    require_once 'login.php';
  } else {
    require_once 'include/serverconfig.php';
    $ENVO_SETTING     = envo_get_setting('version');
    $ENVO_PROVED      = 1;
    $ENVO_PAGE_ACTIVE = 1;

    // EN: Get all the php Hook by name of Hook
    // CZ: Načtení všech php dat z Hook podle jména Hook
    $hookadmini = $envohooks->EnvoGethook("php_admin_index");
    if ($hookadmini)
      foreach ($hookadmini as $hai) {
        eval($hai['phpcode']);
      }

    // EN: Get all the php Hook by name of Hook
    // CZ: Načtení všech php dat z Hook podle jména Hook
    $ENVO_HOOK_ADMIN_INDEX = $envohooks->EnvoGethook("tpl_admin_index");

    // Get the to-do list
    require "../class/class.todo.php";
    // Select all the todos, ordered by position:
    $todo = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'todo_list ORDER BY `position` ASC');

    // to-do is an array and get the while
    $todos = array();
    while ($rowtd = $todo->fetch_assoc()) {
      $todos[] = new ENVO_ToDo($rowtd);
    }

    // Get the stats
    $ENVO_COUNTS = $envodb->queryRow('SELECT
																	(SELECT COUNT(*) FROM ' . DB_PREFIX . 'pages WHERE active = 1) AS pageCtotal,
																	(SELECT COUNT(*) FROM ' . DB_PREFIX . 'user) AS userCtotal,
																	(SELECT COUNT(*) FROM ' . DB_PREFIX . 'tags) AS tagsCtotal,
																	(SELECT COUNT(*) FROM ' . DB_PREFIX . 'plugins) AS pluginCtotal,
																	(SELECT COUNT(*) FROM ' . DB_PREFIX . 'pluginhooks) AS hookCtotal,
																	(SELECT COUNT(*) FROM ' . DB_PREFIX . 'searchlog) AS searchClog');

    // Get the page hits
    $result = $envodb->query('SELECT title, hits FROM ' . DB_PREFIX . 'pages ORDER BY hits DESC LIMIT 15');

    // Iterate through the rows
    $totalhits = 0;
    while ($row = $result->fetch_assoc()) {

      $pageCdata[] = "['" . $row['title'] . "', " . $row['hits'] . "]";
      $totalhits += $row["hits"];
    }

    if ($pageCdata) {
      $pageCdata = join(", ", $pageCdata);

    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = '';
    $SECTION_DESC  = '';

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'index.php';
  }
  $checkp = 1;
}
// EN: Logout from site
// CZ: Odhlášení z webové sítě
if ($page == 'logout') {
  $checkp = 1;
  if (!ENVO_USERID) {
    envo_redirect(BASE_URL);
  }
  if (ENVO_USERID) {
    $envouserlogin->envoLogout(ENVO_USERID);
    envo_redirect(BASE_URL);
  }
}
// EN: '404' page
// CZ: '404' stránka
if ($page == '404') {
  if (!ENVO_USERID) {
    envo_redirect(BASE_URL);
  }
  // Go to the 404 Page
  $ENVO_PROVED = 1;

  // EN: Title and Description
  // CZ: Titulek a Popis
  $SECTION_TITLE = "404";
  $SECTION_DESC  = $setting["title"];

  // EN: Load the php template
  // CZ: Načtení php template (šablony)
  $template = '404.php';
  $checkp   = 1;
}
// EN: Other page
// CZ: Ostatní stránky
if ($page == 'site') {
  require_once 'site.php';
  $ENVO_PROVED      = 1;
  $ENVO_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'logs') {
  require_once 'logs.php';
  $ENVO_PROVED      = 1;
  $ENVO_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'searchlog') {
  require_once 'searchlog.php';
  $ENVO_PROVED      = 1;
  $ENVO_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'changelog') {
  require_once 'changelog.php';
  $ENVO_PROVED      = 1;
  $ENVO_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'setting') {
  require_once 'setting.php';
  $ENVO_PROVED      = 1;
  $ENVO_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'settingfacebook') {
  require_once 'settingfacebook.php';
  $ENVO_PROVED      = 1;
  $ENVO_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'facebookgallery') {
  require_once 'facebookgallery.php';
  $ENVO_PROVED      = 1;
  $ENVO_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'mediasharing') {
  require_once 'mediasharing.php';
  $ENVO_PROVED      = 1;
  $ENVO_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'users') {
  require_once 'users.php';
  $ENVO_PROVED      = 1;
  $ENVO_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'categories') {
  require_once 'categories.php';
  $ENVO_PROVED       = 1;
  $ENVO_PAGE_ACTIVE1 = 1;
  $checkp           = 1;
}
if ($page == 'page') {
  require_once 'page.php';
  $ENVO_PROVED       = 1;
  $ENVO_PAGE_ACTIVE1 = 1;
  $checkp           = 1;
}
if ($page == 'sitemap') {
  require_once 'sitemap.php';
  $ENVO_PROVED       = 1;
  $ENVO_PAGE_ACTIVE1 = 1;
  $checkp           = 1;
}
if ($page == 'searchsetting') {
  require_once 'searchsetting.php';
  $ENVO_PROVED       = 1;
  $ENVO_PAGE_ACTIVE1 = 1;
  $checkp           = 1;
}
if ($page == 'plugins') {
  require_once 'plugins.php';
  $ENVO_PROVED      = 1;
  $ENVO_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'template') {
  require_once 'template.php';
  $ENVO_PROVED      = 1;
  $ENVO_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'usergroup') {
  require_once 'usergroup.php';
  $ENVO_PROVED      = 1;
  $ENVO_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'maintenance') {
  require_once 'maintenance.php';
  $ENVO_PROVED      = 1;
  $ENVO_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'cmshelp') {
  require_once 'cmshelp.php';
  $ENVO_PROVED      = 1;
  $ENVO_PAGE_ACTIVE = 1;
  $checkp          = 1;
}

// EN: If page not found
// CZ: Pokud stránka není nalezena
if ($checkp == 0) envo_redirect(BASE_URL . 'index.php?p=404');

// EN: Get the admin template
// CZ: Získání administračních šablon
if (isset($template) && $template != '') {
  include_once ROOT_ADMIN . 'template/' . $template;
}

// EN: Get the admin template - plugins
// CZ: Získání administračních šablon - pluginy
if (isset($plugin_template) && $plugin_template != '') {
  include_once APP_PATH . $plugin_template;
}

// EN: Reset Session for next use
// CZ: Reset Session pro další použití
unset($_SESSION["infomsg"]);
unset($_SESSION["successmsg"]);
unset($_SESSION["errormsg"]);
unset($_SESSION["warningmsg"]);
unset($_SESSION["loginmsg"]);

// EN: Finally close all db connections
// CZ: Uzavření spojení do databáze
$envodb->envo_close();
?>