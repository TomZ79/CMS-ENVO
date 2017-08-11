<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/install.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Check if the file is accessed only from a admin if not stop the script from running
$php_errormsg = 'To edit the file, you must be logged in as an ADMINISTRATOR !!! You cannot access this file directly.';
$php_errormsg1 = 'Only ADMINISTRATOR privileges allow you to edit the file !!! You cannot access this file directly.';
if (!JAK_USERID) die($php_errormsg);

if (!$jakuser->jakAdminaccess($jakuser->getVar("usergroupid"))) die($php_errormsg1);

// Set successfully to zero
$succesfully = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Installation - PORTO / Template</title>
  <meta charset="utf-8">
  <!-- BEGIN Vendor CSS-->
  <link href="/admin/assets/plugins/bootstrapv3/css/bootstrap.min.css?=v3.3.4" rel="stylesheet" type="text/css"/>
  <link href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
  <!-- BEGIN Pages CSS-->
  <link href="/admin/pages/css/pages-icons.css?=v2.2.0" rel="stylesheet" type="text/css">
  <link class="main-stylesheet" href="/admin/pages/css/pages.css?=v2.2.0" rel="stylesheet" type="text/css"/>
  <!-- BEGIN CUSTOM MODIFICATION -->
  <style type="text/css">
    /* Fix 'jumping scrollbar' issue */
    @media screen and (min-width: 960px) {
      html {
        margin-left: calc(100vw - 100%);
        margin-right: 0;
      }
    }

    /* Main body */
    body {
      background: transparent;
    }
  </style>
  <!-- BEGIN VENDOR JS -->
  <script src="/assets/plugins/jquery/jquery-2.2.4.min.js" type="text/javascript"></script>
  <script src="/admin/assets/plugins/bootstrapv3/js/bootstrap.min.js?=v3.3.4" type="text/javascript"></script>
  <!-- BEGIN CORE TEMPLATE JS -->
  <script src="/admin/pages/js/pages.js?=v2.2.0"></script>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12 m-t-20">
      <div class="jumbotron bg-master">
        <h3 class="semi-bold text-white">Installation - PORTO / Template</h3>
      </div>
      <hr>

      <!-- Check if the plugin is already installed -->
      <?php

      $jakdb->query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "sitestyle_widget_porto"');
      if ($jakdb->affected_rows > 0) { ?>

        <div class="alert alert-info fade in">
          Template is already installed.
        </div>

        <!-- Plugin is not installed let's display the installation script -->
      <?php } else {
        if (isset($_POST['install'])) {

          // Delete old entries
          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "porto"');

          // EN: Set admin lang of plugin
          // CZ: Nastavení jazyka pro administrační rozhraní pluginu
          $adminlang = 'if (file_exists(APP_PATH.\'template/porto/lang/\'.$site_language.\'.ini\')) {
    $tlporto = parse_ini_file(APP_PATH.\'template/porto/lang/\'.$site_language.\'.ini\', true);
} else {
    $tlporto = parse_ini_file(APP_PATH.\'template/porto/lang/en.ini\', true);
}';

          // EN: Set site lang of plugin
          // CZ: Nastavení jazyka pro webové rozhraní pluginu
          $sitelang = 'if (file_exists(APP_PATH.\'template/porto/lang/\'.$site_language.\'.ini\')) {
    $tlporto = parse_ini_file(APP_PATH.\'template/porto/lang/\'.$site_language.\'.ini\', true);
} else {
    $tlporto = parse_ini_file(APP_PATH.\'template/porto/lang/en.ini\', true);
}';

          // EN: Set html data to insert
          // CZ: Nastavení HTML dat pro vložení
          $footerblocktext1 = '
<div class="col-md-8">
  <div class="row">
    <div class="col-md-4">
      <h5>Blog</h5>
      <ul class="list list-icons list-icons-sm">
        <li><i class="fa fa-caret-right"></i> <a href="#">Blog Full Width</a></li>
        <li><i class="fa fa-caret-right"></i> <a href="#">Blog Large Image</a></li>
        <li><i class="fa fa-caret-right"></i> <a href="#">Blog Medium Image</a></li>
        <li><i class="fa fa-caret-right"></i> <a href="#">Single Post</a></li>
      </ul>
    </div>
    <div class="col-md-4">
      <h5>Pages</h5>
      <ul class="list list-icons list-icons-sm">
        <li><i class="fa fa-caret-right"></i> <a href="#">Full width</a></li>
        <li><i class="fa fa-caret-right"></i> <a href="#">Left sidebar</a></li>
        <li><i class="fa fa-caret-right"></i> <a href="#">Right sidebar</a></li>
        <li><i class="fa fa-caret-right"></i> <a href="#">Custom Header</a></li>
      </ul>
    </div>
    <div class="col-md-4">
      <h5>Extra Pages</h5>
      <ul class="list list-icons list-icons-sm">
        <li><i class="fa fa-caret-right"></i> <a href="#">Team</a></li>
        <li><i class="fa fa-caret-right"></i> <a href="#">Services</a></li>
        <li><i class="fa fa-caret-right"></i> <a href="#">Careers</a></li>
        <li><i class="fa fa-caret-right"></i> <a href="#">FAQ</a></li>
        <li><i class="fa fa-caret-right"></i> <a href="#">Sitemap</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="contact-details">
    <h4>Contact Us</h4>
    <ul class="contact">
      <li><p><i class="fa fa-map-marker"></i>
          <strong>Address:</strong> 1234 Street Name, City Name, United States</p></li>
      <li><p><i class="fa fa-phone"></i> <strong>Phone:</strong> (123) 456-789</p></li>
      <li><p><i class="fa fa-envelope"></i> <strong>Email:</strong>
          <a href="mailto:mail@example.com">mail@example.com</a></p></li>
    </ul>
  </div>
</div>
';

          // Insert data into pluginhooks
          $jakdb->query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_lang", "METRICS Template Site Language", "' . $sitelang . '", "tpl_porto", 1, 4, "0", NOW()),
(NULL, "php_admin_lang", "METRICS Template Admin Language", "' . $adminlang . '", "tpl_porto", 1, 4, "0", NOW())');

          // Insert tables into settings
          /* Table of BASIC varname - NOT REMOVE
           * ------------------
           * sidebar_location_tpl => info about sidebar location
           * cms_tpl => basic info about installed template
           * styleswitcher_tpl => show or hide styleswitcher in site
           */
          $jakdb->query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("sidebar_location_tpl", "porto", "left", "left", "input", "free", "tpl_porto"),
("styleswitcher_tpl", "porto", "1", "1", "yesno", "boolean", "tpl_porto"),
("cms_tpl", "porto", "1", "1", "yesno", "boolean", "tpl_porto"),


("sitemapShow_porto_tpl", "porto", "1", "1", "yesno", "boolean", "tpl_porto"),
("sitemapLinks_porto_tpl", "porto", "sitemap", "sitemap", "input", "free", "tpl_porto"),
("loginShow_porto_tpl", "porto", "1", "1", "yesno", "boolean", "tpl_porto"),
("logo1_porto_tpl", "porto", "/template/porto/img/logo.png", "/template/porto/img/logo.png", "input", "free", "tpl_porto"),
("facebookheaderShow_porto_tpl", "porto", "1", "1", "yesno", "boolean", "tpl_porto"),
("facebookheaderLinks_porto_tpl", "porto", "https://www.facebook.com/", "https://www.facebook.com/", "input", "free", "tpl_porto"),
("twitterheaderShow_porto_tpl", "porto", "1", "1", "yesno", "boolean", "tpl_porto"),
("twitterheaderLinks_porto_tpl", "porto", "https://twitter.com/", "https://twitter.com/", "input", "free", "tpl_porto"),
("googleheaderShow_porto_tpl", "porto", "1", "1", "yesno", "boolean", "tpl_porto"),
("googleheaderLinks_porto_tpl", "porto", "https://plus.google.com/", "https://plus.google.com/", "input", "free", "tpl_porto"),
("instagramheaderShow_porto_tpl", "porto", "1", "1", "yesno", "boolean", "tpl_porto"),
("instagramheaderLinks_porto_tpl", "porto", "https://www.instagram.com/", "https://www.instagram.com/", "input", "free", "tpl_porto"),
("phoneheaderShow_porto_tpl", "porto", "1", "1", "yesno", "boolean", "tpl_porto"),
("phoneheaderLinks_porto_tpl", "porto", "+420 000 000 000", "+420 000 000 000", "input", "free", "tpl_porto"),
("emailheaderShow_porto_tpl", "porto", "1", "1", "yesno", "boolean", "tpl_porto"),
("emailheaderLinks_porto_tpl", "porto", "info@porto.com", "info@porto.com", "input", "free", "tpl_porto"),

("footerblocktext1_porto_tpl", "porto", "' . addslashes($footerblocktext1) . '", NULL, "textarea", "free", "tpl_porto"),
("logo2_porto_tpl", "porto", "/template/porto/img/logo-footer.png", "/template/porto/img/logo-footer.png", "input", "free", "tpl_porto"),
("socialfooterText_porto_tpl", "porto", "Follow Us", "Follow Us", "input", "free", "tpl_porto"),
("facebookfooterShow_porto_tpl", "porto", "1", "1", "yesno", "boolean", "tpl_porto"),
("facebookfooterLinks_porto_tpl", "porto", "https://www.facebook.com/", "https://www.facebook.com/", "input", "free", "tpl_porto"),
("twitterfooterShow_porto_tpl", "porto", "1", "1", "yesno", "boolean", "tpl_porto"),
("twitterfooterLinks_porto_tpl", "porto", "https://twitter.com/", "https://twitter.com/", "input", "free", "tpl_porto"),
("googlefooterShow_porto_tpl", "porto", "1", "1", "yesno", "boolean", "tpl_porto"),
("googlefooterLinks_porto_tpl", "porto", "https://plus.google.com/", "https://plus.google.com/", "input", "free", "tpl_porto"),
("instagramfooterShow_porto_tpl", "porto", "1", "1", "yesno", "boolean", "tpl_porto"),
("instagramfooterLinks_porto_tpl", "porto", "https://www.instagram.com/", "https://www.instagram.com/", "input", "free", "tpl_porto")

');

          $succesfully = 1;

          ?>
          <div class="alert alert-success fade in">
            Template successfully installed!
          </div>
          <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>
        <?php }
        if (!$succesfully) { ?>
          <form name="company" method="post" action="install.php" enctype="multipart/form-data">
            <button type="submit" name="install" class="btn btn-primary btn-block">Install Template</button>
          </form>
        <?php }
      } ?>

    </div>
  </div>

</div>
</body>
</html>