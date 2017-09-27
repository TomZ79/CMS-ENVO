<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$config = parse_ini_file($root . '/include/db.ini');

// Database connection and setup
define('DB_HOST', $config[ 'dbhost' ]); // Database host ## Datenbank Server
define('DB_PORT', 3306); // Enter the database port for your mysql server
define('DB_USER', $config[ 'dbuser' ]); // Database user ## Datenbank Benutzername
define('DB_PASS', $config[ 'dbpass' ]); // Database password ## Datenbank Passwort
define('DB_NAME', $config[ 'dbname' ]); // Database name ## Datenbank Name
define('DB_PREFIX', $config[ 'dbprefix' ]); // Database prefix use (a-z) and (_), for example: cms_

// Define a unique key for your site, don't change after, or people can't login anymore for example: 3l2kLOk2so
// https://www.jakweb.ch/faq/a/99/database-and-password-hash
define('DB_PASS_HASH', 'your_key_goes_here');

// Define your site url, for example: www.bluesat.cz
// https://www.jakweb.ch/faq/a/98/full-site-domain
define('FULL_SITE_DOMAIN', $config[ 'fullsitedomain' ]);

// Define cookie path and lifetime
define('ENVO_COOKIE_PATH', '/');  // Available in the whole domain
define('ENVO_COOKIE_TIME', 60*60*24*30); // 30 days by default

// Apache or Not
define('ENVO_USE_APACHE', 1); // Use 1 for Apache (SEO URL's) or 0 for all others

// Choose the files directory, rename it if you like different location but make sure the content is the same
define('ENVO_FILES_DIRECTORY', $config[ 'filefolder' ]);

// Important Stuff
define('ENVO_SUPERADMIN', '1'); // Not deletable and SuperADMIN User, more user separate with comma. e.g. '1,4,5,6' (userid's)

?>