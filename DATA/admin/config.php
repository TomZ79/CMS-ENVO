<?php

// EN: Error reporting
// CZ: Chybové hlášení
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);     // Web development (Vývoj webu)
//error_reporting(~E_ALL & ~E_NOTICE & ~E_USER_NOTICE);       // Sharp web traffic (Ostrý  webový provoz)

// EN: The DB connections data
// CZ: Data pro připojení do DB
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/db.php';

// Get the real stuff
// require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// EN: Error reporting, if files directory does not exists
// CZ: Zobrazení chybového hlášení, pokud neexistuje složka souborů
if (!ENVO_FILES_DIRECTORY) die('Please define a files directory in the db.php.');

// EN: Start a PHP Session
// CZ: Start PHP Session
session_start();

// Initiate the output buffer - Alternative for setcookie
ob_start();

// -----------------------------------------------------------------------
// DEFINE SEPERATOR ALIASES AND DIRECTORY
// -----------------------------------------------------------------------
define('URL_SEPARATOR', '/');         // Value '/'
define('US', URL_SEPARATOR);          // Value '/'
// Use the DS to separate the directories in other defines
define('DS', DIRECTORY_SEPARATOR);    // Value '/'
define('PS', PATH_SEPARATOR);         // Value ':'
// The full path to the ROOT directory WITH a trailing DS
define('ROOT', realpath(__DIR__ . '/..') . DS);
// The full path to the ADMIN directory WITH a trailing DS
define('ROOT_ADMIN', __DIR__ . '/');

// EN: Setting of absolute path
// CZ: Nastavení absolutní cesty
define('APP_PATH', realpath(__DIR__ . '/..') . DS);
if (isset($_SERVER['SCRIPT_NAME'])) {
  # on Windows _APP_MAIN_DIR becomes \ and abs url would look something like HTTP_HOST\/restOfUrl, so \ should be trimed too
  $app_main_dir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
  define('_APP_MAIN_DIR', $app_main_dir);
} else {
  die('[' . __DIR__ . '/config.php]  => Cannot determine APP_MAIN_DIR, please set manual and comment this line');
}

// -----------------------------------------------------------------------
// DEFINE CLASS, FUNCTION AND MYSQLI CONNECTION
// -----------------------------------------------------------------------
// EN: Get the DB class
// CZ:
require_once ROOT . 'class/class.db.php';

// EN: MySQLi connection
// CZ:
$envodb = new ENVO_mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
$envodb->set_charset("utf8");

// EN: Important all Class and functions
// CZ: Import všech tříd a funkcí
include_once ROOT_ADMIN . 'include/admin.function.php';
include_once ROOT . 'include/functions.php';
include_once ROOT . 'class/class.envobase.php';
include_once ROOT . 'class/PHPMailerAutoload.php';
include_once ROOT . 'class/class.userlogin.php';
include_once ROOT . 'class/class.users.php';
include_once ROOT . 'class/class.usergroup.php';
include_once ROOT . 'class/class.plugins.php';
include_once ROOT . 'class/class.hooks.php';
include_once ROOT . 'class/class.paginator.php';
include_once ROOT . 'class/class.tags.php';
include_once ROOT . 'class/class.resizeimage.php';
include_once ROOT . 'class/class.debug.php';
include_once ROOT . 'class/class.htmlelement.php';
// Include the main mPDF library
require ROOT . 'class/mpdf/vendor/autoload.php';
// Include PHP debug to web console
require_once ROOT . 'class/class.debug.php';

// Create instance of HTML_Form from htmlelement.php Class
$Html = new HTML_Element();

// Now launch the rewrite class, depending on the settings in db.
$getURL = new ENVO_rewrite($_SERVER['REQUEST_URI']);

// Overwrite url for admin
// We are not using apache so take the ugly urls
$temppa  = $getURL->envoGetsegAdmin(0);
$temppa1 = $getURL->envoGetsegAdmin(1);
$temppa2 = $getURL->envoGetsegAdmin(2);
$temppa3 = $getURL->envoGetsegAdmin(3);
$temppa4 = $getURL->envoGetsegAdmin(4);
$temppa5 = $getURL->envoGetsegAdmin(5);
$temppa6 = $getURL->envoGetsegAdmin(6);

// -----------------------------------------------------------------------
// GETTING GENERAL SETTINGS
// -----------------------------------------------------------------------
// Get the general settings out the database
$result = $envodb->query('SELECT varname, value FROM ' . DB_PREFIX . 'setting');
while ($row = $result->fetch_assoc()) {
  // Now check if sting contains html and do something about it!
  if (strlen($row['value']) != strlen(filter_var($row['value'], FILTER_SANITIZE_STRING))) {
    $defvar = htmlspecialchars_decode(htmlspecialchars($row['value']));
  } else {
    $defvar = $row["value"];
  }

  $setting[$row['varname']] = $defvar;
}

// -----------------------------------------------------------------------
// DEFINE BASE URL DEFINITION
// -----------------------------------------------------------------------
if ($setting["sitehttps"]) {
  define('BASE_URL', 'https://' . FULL_SITE_DOMAIN . _APP_MAIN_DIR . '/');
} else {
  define('BASE_URL', 'http://' . FULL_SITE_DOMAIN . _APP_MAIN_DIR . '/');
}

define('BASE_URL_ADMIN', BASE_URL);
define('BASE_URL_ORIG', str_replace('/admin/', '/', BASE_URL));
define('BASE_PATH_ORIG', str_replace('/admin', '/', _APP_MAIN_DIR));

// -----------------------------------------------------------------------
// DEFINE LANG, LOCALE and import language file
// -----------------------------------------------------------------------
// Standard Language
$site_language = $setting["lang"];

// Standard Locale
$site_locale = $setting["locale"] . '.utf8';

// Set lang for TimyMCE Filemanager
if ($site_language == 'en') {
  $managerlang = 'en_EN';
} else {
  $managerlang = 'cs_CZ';
}

// EN: Import the language file
// CZ: Import jazykových souborů
if ($setting["lang"] != $site_language && file_exists(ROOT_ADMIN . 'lang/' . $site_language . '.ini')) {
  $tl = parse_ini_file(ROOT_ADMIN . 'lang/' . $site_language . '.ini', TRUE);
} else {
  $tl            = parse_ini_file(ROOT_ADMIN . 'lang/' . $setting["lang"] . '.ini', TRUE);
  $site_language = $setting["lang"];
}

// Call the languages
$lang_files = envo_get_lang_files();

// -----------------------------------------------------------------------
// DEFINE OTHER
// -----------------------------------------------------------------------

// Define other constant
define('ENVO_TEMPLATE', $setting["sitestyle"]);
define('ENVO_SEARCH', $setting["searchform"]);

// EN: Get hooks and plugins
// CZ: Získání hooks a pluginů
$envohooks   = new ENVO_hooks(1);
$envoplugins = new ENVO_plugins(1);

// Check if user is logged in
$envouserlogin = new ENVO_userlogin();
$envouserrow   = $envouserlogin->envoCheckLogged();
if ($envouserrow) {
  $envouser = new ENVO_user($envouserrow);
  define('ENVO_USERID', $envouser->getVar("id"));
  // Get the usergroupid out from this user
  $usergroupid = $envouser->getVar("usergroupid");
  // Get user language
  if ($envouser->getVar("ulang")) $site_language = strtolower($envouser->getVar("ulang"));
  // Update last activity from this user
  $envouserlogin->envoUpdateLastActivity(ENVO_USERID);

  // Only the Admin's in the config can have access
  if (ENVO_USERID && $envouser->envoAdminAccess($envouser->getVar("usergroupid"))) {
    define('ENVO_ADMINACCESS', TRUE);
    $_SESSION['ENVOLoggedInAdmin'] = TRUE;
  } else {
    define('ENVO_ADMINACCESS', FALSE);
  }

} else {
  define('ENVO_USERID', FALSE);
  define('ENVO_ADMINACCESS', FALSE);
  // Standard usergroup id for guests
  $usergroupid = 1;
}

// Let's call the usergroup class
$resultusrg = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'usergroup WHERE id = "' . smartsql($usergroupid) . '" LIMIT 1');
$rowusrg    = $resultusrg->fetch_assoc();

// Get the usergroup class
$envousergroup = new ENVO_usergroup($rowusrg);

// Define for template the real request
$realrequest = substr($getURL->envoRealrequest(), 1);
define('ENVO_PARSE_REQUEST', $realrequest);

// EN: MENU - Default Variable (navbar.php, newsnav.php, tagnav.php)
// CZ: MENU - Hlavní proměnné (navbar.php, newsnav.php, tagnav.php)

// navbar.php
$classlogssection = $classlogiconbg = $classbasicsection = $classbasiciconbg = $classgeneralsection = $classgeneraliconbg = $classsocialsection = $classsocialiconbg = $classsection = $classiconbg = '';

// newsnav.php
$classnewssection = $classnewsiconbg = '';

// tagnav.php
$classtagsection = $classtagiconbg = '';
?>