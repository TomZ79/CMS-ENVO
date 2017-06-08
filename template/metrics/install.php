<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists('../../config.php')) die('[index.php] config.php not found');
require_once '../../config.php';

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
  <title>Installation - METRICS / Template</title>
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
        <h3 class="semi-bold text-white">Installation - METRICS / Template</h3>
      </div>
      <hr>

      <!-- Check if the plugin is already installed -->
      <?php

      $jakdb->query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "sitestyle_widget_metrics"');
      if ($jakdb->affected_rows > 0) { ?>

        <div class="alert alert-info fade in">
          Template is already installed.
        </div>

        <!-- Plugin is not installed let's display the installation script -->
      <?php } else {
        if (isset($_POST['install'])) {

          // Delete old entries
          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "metrics"');

          // EN: Set admin lang of plugin
          // CZ: Nastavení jazyka pro administrační rozhraní pluginu
          $adminlang = 'if (file_exists(APP_PATH.\'template/metrics/lang/\'.$site_language.\'.ini\')) {
    $tlmetrics = parse_ini_file(APP_PATH.\'template/metrics/lang/\'.$site_language.\'.ini\', true);
} else {
    $tlmetrics = parse_ini_file(APP_PATH.\'template/metrics/lang/en.ini\', true);
}';

          // EN: Set site lang of plugin
          // CZ: Nastavení jazyka pro webové rozhraní pluginu
          $sitelang = 'if (file_exists(APP_PATH.\'template/metrics/lang/\'.$site_language.\'.ini\')) {
    $tlmetrics = parse_ini_file(APP_PATH.\'template/metrics/lang/\'.$site_language.\'.ini\', true);
} else {
    $tlmetrics = parse_ini_file(APP_PATH.\'template/metrics/lang/en.ini\', true);
}';

          // EN: Set html data to insert
          // CZ: Nastavení HTML dat pro vložení
          $footerblocktext1 = '
<div class="join-team footer-subscribe clearfix">
  <div class="col-md-7">
    <p>Our social marketing solutions help more than 2500 companies around the world deliver great results. We can\'t stand average, and our clients can\'t either.</p>
  </div>
  <div class="col-md-5">
   <div class="all-link pricinig-head-btn footer-top-btn">
      <a href="#">Take The Tour</a>
      <a href="#">Get Started</a>
   </div>
  </div>
</div>
';
          $footerblocktext2 = '
<div class=" col-sm-6 col-md-3">
  <div class="footer-main-content-inner">
    <h2>Our Products</h2>
    <ul>
      <li><a href="#">Take The Tour</a></li>
      <li><a href="#">Plans & Pricing</a></li>
      <li><a href="#">Influencer Marketing</a></li>
      <li><a href="#">Social Media Monitoring</a></li>
      <li><a href="#">Free Tools</a></li>
      <li><a href="#">API</a></li>
    </ul>
  </div>
</div>
<div class="col-sm-4 col-md-3">
  <div class="footer-main-content-inner">
    <h2>Explore</h2>
    <ul>
      <li><a href="#">Free Tools</a></li>
      <li><a href="#">Find Influencers By Skill</a></li>
      <li><a href="#">PDF Social Analysis</a></li>
      <li><a href="#">Dashboard</a></li>
    </ul>
  </div>
</div>
<div class="col-sm-4 col-md-3">
  <div class="footer-main-content-inner">
    <h2>Need Help</h2>
    <ul>
      <li><a href="#">Contact Us</a></li>
      <li><a href="#">Our Blog</a></li>
      <li><a href="#">Metrics Help Desk</a></li>
      <li><a href="#">Metrics System Status</a></li>
      <li><a href="#">FAQs</a></li>
    </ul>
  </div>
</div>
<div class="col-sm-4 col-md-3">
  <div class="footer-main-content-inner footer-last-content">
    <h2>Newsletter</h2>
    <ul>
      <li><a href="#">Don’t miss to subscribe to our news feeds,</a></li>
      <li><a href="#">kindly fill the form below.</a></li>
    </ul>
    <form>
      <div class="form-group footer-subscription">
        <input type="email" class="form-control" id="Email1" placeholder="Subscribe In Our Newsletter">
        <button type="submit" class="btn btn-default"><i class="fa fa-long-arrow-right"></i></button>
      </div>
    </form>
  </div>
</div>
';


          // Insert data into pluginhooks
          $jakdb->query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_lang", "METRICS Template Site Language", "' . $sitelang . '", "tpl_metrics", 1, 4, "0", NOW()),
(NULL, "php_admin_lang", "METRICS Template Admin Language", "' . $adminlang . '", "tpl_metrics", 1, 4, "0", NOW())');

          // Insert tables into settings
          /* Table of BASIC varname - NOT REMOVE
           * ------------------
           * sidebar_location_tpl => info about sidebar location
           * cms_tpl => basic info about installed template
           * styleswitcher_tpl => show or hide styleswitcher in site
           */
          $jakdb->query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("sidebar_location_tpl", "metrics", "left", "left", "input", "free", "tpl_metrics"),
("styleswitcher_tpl", "metrics", "1", "1", "yesno", "boolean", "tpl_metrics"),
("cms_tpl", "metrics", "1", "1", "yesno", "boolean", "tpl_metrics"),

("header_metrics_tpl", "metrics", "header-area header-11 header-12 navbar-fixed-top", "header-area header-11 header-12 navbar-fixed-top", "select", "free", "tpl_metrics"),

("sitemapShow_metrics_tpl", "metrics", "1", "1", "yesno", "boolean", "tpl_metrics"),
("sitemapLinks_metrics_tpl", "metrics", "sitemap", "sitemap", "input", "free", "tpl_metrics"),
("loginShow_metrics_tpl", "metrics", "1", "1", "yesno", "boolean", "tpl_metrics"),
("logo1_metrics_tpl", "metrics", "/template/metrics/img/logo-footer.png", "/template/metrics/img/logo-footer.png", "input", "free", "tpl_metrics"),
("facebookheaderShow_metrics_tpl", "metrics", "1", "1", "yesno", "boolean", "tpl_metrics"),
("facebookheaderLinks_metrics_tpl", "metrics", "https://www.facebook.com/", "https://www.facebook.com/", "input", "free", "tpl_metrics"),
("twitterheaderShow_metrics_tpl", "metrics", "1", "1", "yesno", "boolean", "tpl_metrics"),
("twitterheaderLinks_metrics_tpl", "metrics", "https://twitter.com/", "https://twitter.com/", "input", "free", "tpl_metrics"),
("googleheaderShow_metrics_tpl", "metrics", "1", "1", "yesno", "boolean", "tpl_metrics"),
("googleheaderLinks_metrics_tpl", "metrics", "https://plus.google.com/", "https://plus.google.com/", "input", "free", "tpl_metrics"),
("instagramheaderShow_metrics_tpl", "metrics", "1", "1", "yesno", "boolean", "tpl_metrics"),
("instagramheaderLinks_metrics_tpl", "metrics", "https://www.instagram.com/", "https://www.instagram.com/", "input", "free", "tpl_metrics"),
("phoneheaderShow_metrics_tpl", "metrics", "1", "1", "yesno", "boolean", "tpl_metrics"),
("phoneheaderLinks_metrics_tpl", "metrics", "+420 000 000 000", "+420 000 000 000", "input", "free", "tpl_metrics"),
("emailheaderShow_metrics_tpl", "metrics", "1", "1", "yesno", "boolean", "tpl_metrics"),
("emailheaderLinks_metrics_tpl", "metrics", "info@metrics.com", "info@metrics.com", "input", "free", "tpl_metrics"),
("buttonheaderShow_metrics_tpl", "metrics", "1", "1", "yesno", "boolean", "tpl_metrics"),
("buttonheaderText_metrics_tpl", "metrics", "FREE SEO ANALYSIS", "FREE SEO ANALYSIS", "input", "free", "tpl_metrics"),
("buttonheaderLinks_metrics_tpl", "metrics", "#", "#", "input", "free", "tpl_metrics"),

("footerblocktext1_metrics_tpl", "metrics", "' . addslashes($footerblocktext1) . '", NULL, "textarea", "free", "tpl_metrics"),
("footerblocktext2_metrics_tpl", "metrics", "' . addslashes($footerblocktext2) . '", NULL, "textarea", "free", "tpl_metrics"),

("socialfooterText_metrics_tpl", "metrics", "Metrics Social was built on the idea that the world is better when businesses and customers communicate freely.", "Metrics Social was built on the idea that the world is better when businesses and customers communicate freely.", "input", "free", "tpl_metrics"),
("logo2_metrics_tpl", "metrics", "/template/metrics/img/logo-footer.png", "/template/metrics/img/logo-footer.png", "input", "free", "tpl_metrics"),
("facebookfooterShow_metrics_tpl", "metrics", "1", "1", "yesno", "boolean", "tpl_metrics"),
("facebookfooterLinks_metrics_tpl", "metrics", "https://www.facebook.com/", "https://www.facebook.com/", "input", "free", "tpl_metrics"),
("twitterfooterShow_metrics_tpl", "metrics", "1", "1", "yesno", "boolean", "tpl_metrics"),
("twitterfooterLinks_metrics_tpl", "metrics", "https://twitter.com/", "https://twitter.com/", "input", "free", "tpl_metrics"),
("googlefooterShow_metrics_tpl", "metrics", "1", "1", "yesno", "boolean", "tpl_metrics"),
("googlefooterLinks_metrics_tpl", "metrics", "https://plus.google.com/", "https://plus.google.com/", "input", "free", "tpl_metrics"),
("instagramfooterShow_metrics_tpl", "metrics", "1", "1", "yesno", "boolean", "tpl_metrics"),
("instagramfooterLinks_metrics_tpl", "metrics", "https://www.instagram.com/", "https://www.instagram.com/", "input", "free", "tpl_metrics")

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