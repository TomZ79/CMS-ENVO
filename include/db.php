<?php
// Database connection and setup
define('DB_HOST', 'localhost'); // Database host ## Datenbank Server
define('DB_PORT', 3306); // Enter the database port for your mysql server
define('DB_USER', 'admin'); // Database user ## Datenbank Benutzername
define('DB_PASS', 'admin'); // Database password ## Datenbank Passwort
define('DB_NAME', 'cmsbluesat'); // Database name ## Datenbank Name
define('DB_PREFIX', 'cms_'); // Database prefix use (a-z) and (_), for example: cms_

// Define a unique key for your site, don't change after, or people can't login anymore for example: 3l2kLOk2so
define('DB_PASS_HASH', 'your_key_goes_here');

// Define your site url, for example: www.bluesat.cz
define('FULL_SITE_DOMAIN', 'localhost');

// Define cookie path and lifetime
define('JAK_COOKIE_PATH', '/');  // Available in the whole domain
define('JAK_COOKIE_TIME', 60*60*24*30); // 30 days by default

// Apache or Not
define('JAK_USE_APACHE', 1); // Use 1 for Apache (SEO URL's) or 0 for all others

// Choose the files directory, rename it if you like different location but make sure the content is the same
define('JAK_FILES_DIRECTORY', '_files');

// Important Stuff
define('JAK_SUPERADMIN', '1'); // Not deletable and SuperADMIN User, more user separate with comma. e.g. '1,4,5,6' (userid's)
?>