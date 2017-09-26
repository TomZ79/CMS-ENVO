<?php

// Prevent direct php access
define('JAK_ADMIN_PREVENT_ACCESS', 1);

// Access not allowed
$JAK_PROVED = FALSE;

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/index.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// Now check if there is more then one page
$page  = ($temppa ? envo_url_input_filter($temppa) : '');
$page1 = ($temppa1 ? envo_url_input_filter($temppa1) : '');
$page2 = ($temppa2 ? envo_url_input_filter($temppa2) : '');
$page3 = ($temppa3 ? envo_url_input_filter($temppa3) : '');
$page4 = ($temppa4 ? envo_url_input_filter($temppa4) : '');
$page5 = ($temppa5 ? envo_url_input_filter($temppa5) : '');
$page6 = ($temppa6 ? envo_url_input_filter($temppa6) : '');

// Only the SuperAdmin in the config file see everything
if (JAK_USERID && $jakuser->jakSuperadminaccess(JAK_USERID)) {
  define('JAK_SUPERADMINACCESS', TRUE);
} else {
  define('JAK_SUPERADMINACCESS', FALSE);
}

// Get the redirect into a sessions for better login handler
if ($page && $page != '404') $_SESSION['JAKRedirect'] = $_SERVER['REQUEST_URI'];

// All other user will be redirect to the homepage, nothing else to do for this people
if (JAK_USERID && !JAK_ADMINACCESS) envo_redirect(BASE_URL_ORIG);

// EN: Import the language file
// CZ: Import jazykových souborů
if ($jkv["lang"] != $site_language && file_exists(APP_PATH . 'admin/lang/' . $site_language . '.ini')) {
  $tl = parse_ini_file(APP_PATH . 'admin/lang/' . $site_language . '.ini', TRUE);
} else {
  $tl            = parse_ini_file(APP_PATH . 'admin/lang/' . $jkv["lang"] . '.ini', TRUE);
  $site_language = $jkv["lang"];
}

// We need the template folder, title, author and lang as template variable
$JAK_CONTACT_FORM = $jkv["contactform"];
define('JAK_PAGINATE_ADMIN', 1);

// Define other constant
define('ENVO_TEMPLATE', $jkv["sitestyle"]);

// First check if the user is logged in
if (JAK_USERID) {

  // Get all the Plugins
  $jakplugins = new JAK_plugins(2, '');

  // Get all the Hooks
  $jakhooks = new JAK_hooks(1, '');

  // EN: Get all the php Hook by name of Hook
  // CZ: Načtení všech php dat z Hook podle jména Hook
  $hookadminlang = $jakhooks->jakGethook("php_admin_lang");
  if ($hookadminlang) foreach ($hookadminlang as $halang) {
    eval($halang['phpcode']);
  }

  // EN: Get all the php Hook by name of Hook for implementing css or javascript into the head and footer section
  // CZ: Načtení všech php dat z Hook podle jména Hook pro implentaci css a javascript do záhlaví a zápatí
  $JAK_HOOK_HEAD_ADMIN   = $jakhooks->jakGethook("tpl_admin_head");
  $JAK_HOOK_FOOTER_ADMIN = $jakhooks->jakGethook("tpl_admin_footer");

  // Get all plugins out the databse
  $JAK_PLUGINS           = $jakplugins->jakGetarray();
  $JAK_PLUGINS_TOPNAV    = $jakplugins->jakAdmintopnav();
  $JAK_PLUGINS_MANAGENAV = $jakplugins->jakAdminmanagenav();
  // We need the tags if active right in the beginning
  define('JAK_TAGS', $jakplugins->getPHPcodeid(3, "active"));

  // Show links in template only the user have access
  $JAK_MODULES = $jakuser->jakModuleaccess(JAK_USERID, $jkv["accessgeneral"]);
  $JAK_MODULEM = $jakuser->jakModuleaccess(JAK_USERID, $jkv["accessmanage"]);

  // Get the name from the user for the welcome message
  $JAK_WELCOME_NAME = $jakuser->getVar("name");
}

// We do not need code highlighting
$CODE_HIGHLIGHT = $JAK_PAGINATE = FALSE;

// Errors
$errors = $exorder = $pluginid = array();

// DB insert
$insert = $updatesql = $updatesql1 = '';

// Set page to zero, first.
$checkp = 0;

// Define http referrer
if (!isset($_SERVER['HTTP_REFERER'])) $_SERVER['HTTP_REFERER'] = '';

// Now run the php code from the plugin section only when we logged in
if (JAK_USERID) {

  // EN: Get all the php Hook by name of Hook for admin 'index top'
  // CZ: Načtení všech php dat z Hook podle jména Hook pro admin 'index top'
  $hookadminit = $jakhooks->jakGethook("php_admin_index_top");
  if ($hookadminit) foreach ($hookadminit as $hait) {
    eval($hait['phpcode']);
  }

  $pluginadminphp = $jakplugins->jakAdminindex();
  if ($pluginadminphp) foreach ($pluginadminphp as $pl) {
    // Page name upper case
    $plname = strtoupper($pl['name']);

    // define the plugin id first
    define('JAK_PLUGIN_' . $plname, $pl['id']);

    // Get the access out into define
    define('JAK_ACCESS' . $plname, $pl['access']);

    // then load the php code
    eval($pl['phpcode']);
  }
}

// Get statistics for Navbar
$envotable  = DB_PREFIX . 'pages';
$envotable1 = DB_PREFIX . 'user';
$envotable2 = DB_PREFIX . 'usergroup';

$JAK_COUNTS_NAVBAR = $envodb->queryRow('SELECT
																			(SELECT COUNT(*) FROM ' . $envotable . ') AS COUNT_PAGES,
																			(SELECT COUNT(*) FROM ' . $envotable1 . ') AS COUNT_USER,
																			(SELECT COUNT(*) FROM ' . $envotable2 . ') AS COUNT_USERGROUP');

// EN: Home page
// CZ: Úvodní strana
if ($page == '') {
  // EN: Show login page only if the admin is not logged in else show homepage
  // CZ: Zobrazit stránku 'přihlášení' ...
  if (!JAK_USERID) {
    require_once 'login.php';
  } else {
    require_once 'include/serverconfig.php';
    $JAK_SETTING     = envo_get_setting('version');
    $JAK_PROVED      = 1;
    $JAK_PAGE_ACTIVE = 1;

    // EN: Get all the php Hook by name of Hook
    // CZ: Načtení všech php dat z Hook podle jména Hook
    $hookadmini = $jakhooks->jakGethook("php_admin_index");
    if ($hookadmini)
      foreach ($hookadmini as $hai) {
        eval($hai['phpcode']);
      }

    // EN: Get all the php Hook by name of Hook
    // CZ: Načtení všech php dat z Hook podle jména Hook
    $JAK_HOOK_ADMIN_INDEX = $jakhooks->jakGethook("tpl_admin_index");

    // Get the to-do list
    require "../class/class.todo.php";
    // Select all the todos, ordered by position:
    $todo = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'todo_list ORDER BY `position` ASC');

    // to-do is an array and get the while
    $todos = array();
    while ($rowtd = $todo->fetch_assoc()) {
      $todos[] = new JAK_ToDo($rowtd);
    }

    // Get the stats
    $JAK_COUNTS = $envodb->queryRow('SELECT
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
if ($page == 'logout') {
  $checkp = 1;
  if (!JAK_USERID) {
    envo_redirect(BASE_URL);
  }
  if (JAK_USERID) {
    $jakuserlogin->jakLogout(JAK_USERID);
    envo_redirect(BASE_URL);
  }
}
if ($page == '404') {
  if (!JAK_USERID) {
    envo_redirect(BASE_URL);
  }
  // Go to the 404 Page
  $JAK_PROVED = 1;

  // EN: Title and Description
  // CZ: Titulek a Popis
  $SECTION_TITLE = "404";
  $SECTION_DESC  = $jkv["title"];

  // EN: Load the php template
  // CZ: Načtení php template (šablony)
  $template = '404.php';
  $checkp   = 1;
}
if ($page == 'site') {
  require_once 'site.php';
  $JAK_PROVED      = 1;
  $JAK_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'logs') {
  require_once 'logs.php';
  $JAK_PROVED      = 1;
  $JAK_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'searchlog') {
  require_once 'searchlog.php';
  $JAK_PROVED      = 1;
  $JAK_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'changelog') {
  require_once 'changelog.php';
  $JAK_PROVED      = 1;
  $JAK_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'setting') {
  require_once 'setting.php';
  $JAK_PROVED      = 1;
  $JAK_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'settingfacebook') {
  require_once 'settingfacebook.php';
  $JAK_PROVED      = 1;
  $JAK_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'facebookgallery') {
  require_once 'facebookgallery.php';
  $JAK_PROVED      = 1;
  $JAK_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'mediasharing') {
  require_once 'mediasharing.php';
  $JAK_PROVED      = 1;
  $JAK_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'users') {
  require_once 'users.php';
  $JAK_PROVED      = 1;
  $JAK_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'categories') {
  require_once 'categories.php';
  $JAK_PROVED       = 1;
  $JAK_PAGE_ACTIVE1 = 1;
  $checkp           = 1;
}
if ($page == 'page') {
  require_once 'page.php';
  $JAK_PROVED       = 1;
  $JAK_PAGE_ACTIVE1 = 1;
  $checkp           = 1;
}
if ($page == 'contactform') {
  require_once 'contactform.php';
  $JAK_PROVED       = 1;
  $JAK_PAGE_ACTIVE1 = 1;
  $checkp           = 1;
}
if ($page == 'sitemap') {
  require_once 'sitemap.php';
  $JAK_PROVED       = 1;
  $JAK_PAGE_ACTIVE1 = 1;
  $checkp           = 1;
}
if ($page == 'searchsetting') {
  require_once 'searchsetting.php';
  $JAK_PROVED       = 1;
  $JAK_PAGE_ACTIVE1 = 1;
  $checkp           = 1;
}
if ($page == 'plugins') {
  require_once 'plugins.php';
  $JAK_PROVED      = 1;
  $JAK_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'template') {
  require_once 'template.php';
  $JAK_PROVED      = 1;
  $JAK_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'usergroup') {
  require_once 'usergroup.php';
  $JAK_PROVED      = 1;
  $JAK_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'maintenance') {
  require_once 'maintenance.php';
  $JAK_PROVED      = 1;
  $JAK_PAGE_ACTIVE = 1;
  $checkp          = 1;
}
if ($page == 'cmshelp') {
  require_once 'cmshelp.php';
  $JAK_PROVED      = 1;
  $JAK_PAGE_ACTIVE = 1;
  $checkp          = 1;
}

// EN: If page not found
// CZ: Pokud stránka není nalezena
if ($checkp == 0) envo_redirect(BASE_URL . 'index.php?p=404');

if (isset($template) && $template != '') {
  include_once APP_PATH . 'admin/template/' . $template;
}

// Get the plugin template
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