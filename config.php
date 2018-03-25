<?php

// EN: Error reporting
// CZ: Chybové hlášení
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);     // Web development (Vývoj webu)
//error_reporting(~E_ALL & ~E_NOTICE & ~E_USER_NOTICE);       // Sharp web traffic (Ostrý  webový provoz)

// EN: The DB connections data
// CZ: Data pro připojení do DB
require_once 'include/db.php';

// EN: Error reporting, if install folder exists
// CZ: Zobrazení chybového hlášení, pokud existuje instalační složka
if (is_dir('install')) die('Please delete or rename install folder.');

// EN: Error reporting, if files directory does not exists
// CZ: Zobrazení chybového hlášení, pokud neexistuje složka souborů
if (!ENVO_FILES_DIRECTORY) die('Please define a files directory in the db.php.');

// EN: Start a PHP Session
// CZ: Start PHP Session
session_start();

// Initiate the output buffer - Alternative for setcookie
ob_start();

// -----------------------------------------------------------------------
// DEFINE SEPERATOR ALIASES
// -----------------------------------------------------------------------
define("URL_SEPARATOR", '/');
define("DS", DIRECTORY_SEPARATOR);
define("PS", PATH_SEPARATOR);
define("US", URL_SEPARATOR);

// EN: Setting of absolute path
// CZ: Nastavení absolutní cesty
define('APP_PATH', dirname(__file__) . DIRECTORY_SEPARATOR);
if (isset($_SERVER['SCRIPT_NAME'])) {
  # on Windows _APP_MAIN_DIR becomes \ and abs url would look something like HTTP_HOST\/restOfUrl, so \ should be trimed too
  $app_main_dir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
  define('_APP_MAIN_DIR', $app_main_dir);
} else {
  die('[config.php] Cannot determine APP_MAIN_DIR, please set manual and comment this line');
}

// -----------------------------------------------------------------------
// DEFINE CLASS, FUNCTION AND MYSQLI CONNECTION
// -----------------------------------------------------------------------
// EN: Get the DB class
// CZ:
require_once 'class/class.db.php';

// EN: MySQLi connection
// CZ:
$envodb = new ENVO_mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
$envodb->set_charset("utf8");

// EN: Important all Class and functions
// CZ: Import všech tříd a funkcí
include_once 'include/functions.php';
include_once 'class/class.envobase.php';
include_once 'class/PHPMailerAutoload.php';
include_once 'class/class.userlogin.php';
include_once 'class/class.users.php';
include_once 'class/class.usergroup.php';
include_once 'class/class.plugins.php';
include_once 'class/class.hooks.php';
include_once 'class/class.paginator.php';
include_once 'class/class.tags.php';
include_once 'class/class.resizeimage.php';
include_once 'class/class.debug.php';
include_once 'class/class.htmlelement.php';
// Include the main mPDF library
require 'class/mpdf/vendor/autoload.php';
include_once 'assets/plugins/captcha/simple-php-captcha/simple-php-captcha.php';

// Create instance of HTML_Form from htmlelement.php Class
$Html = new HTML_Element();

// Now launch the rewrite class, depending on the settings in db.
$getURL = New ENVO_rewrite($_SERVER['REQUEST_URI']);

// We are not using apache so take the ugly urls
$tempp  = $getURL->envoGetseg(0);
$tempp1 = $getURL->envoGetseg(1);
$tempp2 = $getURL->envoGetseg(2);
$tempp3 = $getURL->envoGetseg(3);
$tempp4 = $getURL->envoGetseg(4);
$tempp5 = $getURL->envoGetseg(5);
$tempp6 = $getURL->envoGetseg(6);

// Call the languages
$lang_files = envo_get_lang_files();

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

// EN: Get hooks and plugins
// CZ: Získání hooks a pluginů
$envohooks   = new ENVO_hooks(1);
$envoplugins = new ENVO_plugins(1);

// Get the template config file
if (defined(ENVO_TEMPLATE) && !empty(ENVO_TEMPLATE)) include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/config.php';

// Timezone from server
date_default_timezone_set($setting["timezoneserver"]);
$envodb->query('SET time_zone = "' . date("P") . '"');

// Set the last activity and session into cookies
setcookie('lastactivity', time(), time() + 60 * 60 * 24 * 10, ENVO_COOKIE_PATH);
setcookie('usrsession', session_id(), time() + 60 * 60 * 24 * 10, ENVO_COOKIE_PATH);

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
    $_SESSION['JAKLoggedInAdmin'] = TRUE;
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

// Check if https is activated
if ($setting["sitehttps"]) {
  define('BASE_URL', 'https://' . FULL_SITE_DOMAIN . _APP_MAIN_DIR . '/');
} else {
  define('BASE_URL', 'http://' . FULL_SITE_DOMAIN . _APP_MAIN_DIR . '/');
}

// Define for template the real request
$realrequest = substr($getURL->envoRealrequest(), 1);
define('ENVO_PARSE_REQUEST', $realrequest);
?>