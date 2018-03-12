<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/install.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Check if the file is accessed only from a admin if not stop the script from running
$php_errormsg = 'To edit the file, you must be logged in as an ADMINISTRATOR !!! You cannot access this file directly.';
$php_errormsg1 = 'Only ADMINISTRATOR privileges allow you to edit the file !!! You cannot access this file directly.';
if (!ENVO_USERID) die($php_errormsg);

if (!$envouser->envoAdminAccess($envouser->getVar("usergroupid"))) die($php_errormsg1);

// Set successfully to zero
$succesfully = 0;

// EN: Import the language file
// CZ: Import jazykových souborů
if ($setting["lang"] != $site_language && file_exists(APP_PATH . 'admin/lang/' . $site_language . '.ini')) {
  $tl = parse_ini_file(APP_PATH . 'admin/lang/' . $site_language . '.ini', TRUE);
} else {
  $tl            = parse_ini_file(APP_PATH . 'admin/lang/' . $setting["lang"] . '.ini', TRUE);
  $site_language = $setting["lang"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $tl["installtemplate"]["itpl"] . ' - MOBILE REPAIR Template'; ?></title>
  <meta charset="utf-8">
  <!-- BEGIN Vendor CSS-->
  <link href="/assets/plugins/bootstrapv4/css/bootstrap.min.css?=v4.0.0alpha6" rel="stylesheet" type="text/css"/>
  <link href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
  <!-- BEGIN Pages CSS-->
  <link href="/admin/pages/css/pages-icons.css?=v3.0.0" rel="stylesheet" type="text/css">
  <link class="main-stylesheet" href="/admin/pages/css/pages.min.css?=v3.0.0" rel="stylesheet" type="text/css"/>
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
  <?php
  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  echo $Html->addScript('/assets/plugins/jquery/jquery-1.11.1.min.js');
  echo $Html->addScript('/assets/plugins/tether/js/tether.min.js');
  echo $Html->addScript('/assets/plugins/bootstrapv4/js/bootstrap.min.js?=v4.0.0alpha6');
  ?>
  <!-- BEGIN CORE TEMPLATE JS -->
  <?php
  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  echo $Html->addScript('/admin/pages/js/pages.min.js');
  ?>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-sm-12 m-t-20">
      <div class="jumbotron bg-master pt-1 pl-3 pb-1 pr-3">
        <h3 class="semi-bold text-white"><?php echo $tl["installtemplate"]["itpl"] . ' - MOBILE REPAIR Template'; ?></h3>
      </div>
      <hr>

      <!-- Check if the plugin is already installed -->
      <?php

      $envodb->query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "sitestyle_widget_mobilerepair"');
      if ($envodb->affected_rows > 0) { ?>

        <!-- Info - check if template is installed -->
        <div class="alert alert-info fade show">
          <?php echo $tl["installtemplate"]["itpl1"]; ?>
        </div>

        <!-- Plugin is not installed let's display the installation script -->
      <?php } else {
        if (isset($_POST['install'])) {

          // Delete old entries
          $envodb->query('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "mobilerepair"');

          // EN: Set admin lang of plugin
          // CZ: Nastavení jazyka pro administrační rozhraní pluginu
          $adminlang = 'if (file_exists(APP_PATH.\'template/mobilerepair/lang/\'.$site_language.\'.ini\')) {
    $tlmr = parse_ini_file(APP_PATH.\'template/mobilerepair/lang/\'.$site_language.\'.ini\', true);
} else {
    $tlmr = parse_ini_file(APP_PATH.\'template/mobilerepair/lang/en.ini\', true);
}';

          // EN: Set site lang of plugin
          // CZ: Nastavení jazyka pro webové rozhraní pluginu
          $sitelang = 'if (file_exists(APP_PATH.\'template/mobilerepair/lang/\'.$site_language.\'.ini\')) {
    $tlmr = parse_ini_file(APP_PATH.\'template/mobilerepair/lang/\'.$site_language.\'.ini\', true);
} else {
    $tlmr = parse_ini_file(APP_PATH.\'template/mobilerepair/lang/en.ini\', true);
}';

          // EN: Set html data to insert
          // CZ: Nastavení HTML dat pro vložení
          $headerblocktext1 = '<i class="fa fa-clock-o text-theme-colored"></i> Opening Hours:  Mon - Tues : 6.00 am - 10.00 pm, Sunday Closed';

          // EN: Set html data to insert
          // CZ: Nastavení HTML dat pro vložení
          $footerblocktext = '
<div class="col-sm-6 col-md-3">
  <div class="widget dark">
    <img class="mt-10 mb-20" alt="" src="/template/mobilerepair/img/logo-wide-white.png">
    <p>203, Envato Labs, Behind Alis Steet, Melbourne, Australia.</p>
    <ul class="mt-5">
      <li class="m-0 pl-0 pr-10">
        <i class="fa fa-phone text-theme-colored mr-5"></i><span class="text-gray">123-456-789</span>
      </li>
      <li class="m-0 pl-0 pr-10">
        <i class="fa fa-envelope-o text-theme-colored mr-5"></i><span class="text-gray">contact@yourdomain.com</span>
      </li>
      <li class="m-0 pl-0 pr-10">
        <i class="fa fa-globe text-theme-colored mr-5"></i><a class="text-gray" href="#">www.yourdomain.com</a>
      </li>
    </ul>
  </div>
</div>
<div class="col-sm-6 col-md-3">
  <div class="widget dark">
    <h4 class="widget-title">Useful Links</h4>
    <ul class="list-border">
      <li><a href="#">Home</a></li>
      <li><a href="#">About us</a></li>
      <li><a href="#">Sitemap</a></li>
      <li><a href="#">Faq\'s</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </div>
</div>
<div class="col-sm-6 col-md-3">
  <div class="widget dark">
    <!-- FB Like button - https://developers.facebook.com/docs/plugins/like-button/ -->
    <h4 class="widget-title">Facebook Feed</h4>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = \'https://connect.facebook.net/cs_CZ/sdk.js#xfbml=1&version=v2.11&appId=1724346521196663\';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, \'script\', \'facebook-jssdk\'));
    </script>
    <div class="fb-like" data-href="https://www.facebook.com/facebook/" data-layout="box_count" data-action="like" data-size="large" data-show-faces="false" data-share="true" style="text-align: center"></div>
  </div>
</div>
<div class="col-sm-6 col-md-3">
  <div class="widget dark">
    <h4 class="widget-title">Opening Hours</h4>
    <div class="opening-hours">
      <ul class="list-border">
        <li class="clearfix">
          <span> Mon - Tues :  </span>
          <div class="value pull-right flip"> 6.00 am - 10.00 pm </div>
        </li>
        <li class="clearfix text-white">
          <span> Wednes - Thurs :</span>
          <div class="value pull-right flip"> 8.00 am - 6.00 pm </div>
        </li>
        <li class="clearfix">
          <span> Fri : </span>
          <div class="value pull-right flip"> 3.00 pm - 8.00 pm </div>
        </li>
        <li class="clearfix">
          <span> Sun : </span>
          <div class="value pull-right flip"> Closed </div>
        </li>
        <li class="clearfix">
          <span> Sat : </span>
          <div class="value pull-right flip"> Closed </div>
        </li>
      </ul>
    </div>
  </div>
</div>
';

          // Insert data into pluginhooks
          $envodb->query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_lang", "MOBILE REPAIR Template Site Language", "' . $sitelang . '", "tpl_mobilerepair", 1, 4, "0", NOW()),
(NULL, "php_admin_lang", "MOBILE REPAIR Template Admin Language", "' . $adminlang . '", "tpl_mobilerepair", 1, 4, "0", NOW())');

          // Insert tables into settings
          /* Table of BASIC varname - NOT REMOVE
           * ------------------
           * sidebar_location_tpl => info about sidebar location
           * cms_tpl => basic info about installed template
           * styleswitcher_tpl => show or hide styleswitcher in site
           */
          $envodb->query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("sidebar_location_tpl", "mobilerepair", "left", "left", "input", "free", "tpl_mobilerepair"),
("styleswitcher_tpl", "mobilerepair", "1", "1", "yesno", "boolean", "tpl_mobilerepair"),
("cms_tpl", "mobilerepair", "1", "1", "yesno", "boolean", "tpl_mobilerepair"),

("mininav_text_mobilerepair_tpl", "mobilerepair", "' . addslashes($headerblocktext1) . '", NULL, "textarea", "free", "tpl_mobilerepair"),
("logo1_mobilerepair_tpl", "mobilerepair", "/template/mobilerepair/img/logo-wide.png", "/template/mobilerepair/img/logo-wide.png", "input", "free", "tpl_mobilerepair"),
("facebookheaderShow_mobilerepair_tpl", "mobilerepair", "1", "1", "yesno", "boolean", "tpl_mobilerepair"),
("facebookheaderLinks_mobilerepair_tpl", "mobilerepair", "https://www.facebook.com/", "https://www.facebook.com/", "input", "free", "tpl_mobilerepair"),
("twitterheaderShow_mobilerepair_tpl", "mobilerepair", "1", "1", "yesno", "boolean", "tpl_mobilerepair"),
("twitterheaderLinks_mobilerepair_tpl", "mobilerepair", "https://twitter.com/", "https://twitter.com/", "input", "free", "tpl_mobilerepair"),
("googleheaderShow_mobilerepair_tpl", "mobilerepair", "1", "1", "yesno", "boolean", "tpl_mobilerepair"),
("googleheaderLinks_mobilerepair_tpl", "mobilerepair", "https://plus.google.com/", "https://plus.google.com/", "input", "free", "tpl_mobilerepair"),
("instagramheaderShow_mobilerepair_tpl", "mobilerepair", "1", "1", "yesno", "boolean", "tpl_mobilerepair"),
("instagramheaderLinks_mobilerepair_tpl", "mobilerepair", "https://www.instagram.com/", "https://www.instagram.com/", "input", "free", "tpl_mobilerepair"),
("youtubeheaderShow_mobilerepair_tpl", "mobilerepair", "1", "1", "yesno", "boolean", "tpl_mobilerepair"),
("youtubeheaderLinks_mobilerepair_tpl", "mobilerepair", "https://www.youtube.com/", "https://www.youtube.com/", "input", "free", "tpl_mobilerepair"),
("pinterestheaderShow_mobilerepair_tpl", "mobilerepair", "1", "1", "yesno", "boolean", "tpl_mobilerepair"),
("pinterestheaderLinks_mobilerepair_tpl", "mobilerepair", "https://www.pinterest.com/", "https://www.pinterest.com/", "input", "free", "tpl_mobilerepair"),
("phoneheaderShow_mobilerepair_tpl", "mobilerepair", "1", "1", "yesno", "boolean", "tpl_mobilerepair"),
("phoneheaderLinks_mobilerepair_tpl", "mobilerepair", "+(012) 345 6789", "+(012) 345 6789", "input", "free", "tpl_mobilerepair"),
("emailheaderShow_mobilerepair_tpl", "mobilerepair", "1", "1", "yesno", "boolean", "tpl_mobilerepair"),
("emailheaderLinks_mobilerepair_tpl", "mobilerepair", "info@mobilerepair.com", "info@mobilerepair.com", "input", "free", "tpl_mobilerepair"),

("footerblocktext_mobilerepair_tpl", "mobilerepair", "' . addslashes($footerblocktext) . '", NULL, "textarea", "free", "tpl_mobilerepair"),
("facebookfooterShow_mobilerepair_tpl", "mobilerepair", "1", "1", "yesno", "boolean", "tpl_mobilerepair"),
("facebookfooterLinks_mobilerepair_tpl", "mobilerepair", "https://www.facebook.com/", "https://www.facebook.com/", "input", "free", "tpl_mobilerepair"),
("twitterfooterShow_mobilerepair_tpl", "mobilerepair", "1", "1", "yesno", "boolean", "tpl_mobilerepair"),
("twitterfooterLinks_mobilerepair_tpl", "mobilerepair", "https://twitter.com/", "https://twitter.com/", "input", "free", "tpl_mobilerepair"),
("googlefooterShow_mobilerepair_tpl", "mobilerepair", "1", "1", "yesno", "boolean", "tpl_mobilerepair"),
("googlefooterLinks_mobilerepair_tpl", "mobilerepair", "https://plus.google.com/", "https://plus.google.com/", "input", "free", "tpl_mobilerepair"),
("instagramfooterShow_mobilerepair_tpl", "mobilerepair", "1", "1", "yesno", "boolean", "tpl_mobilerepair"),
("instagramfooterLinks_mobilerepair_tpl", "mobilerepair", "https://www.instagram.com/", "https://www.instagram.com/", "input", "free", "tpl_mobilerepair"),
("youtubefooterShow_mobilerepair_tpl", "mobilerepair", "1", "1", "yesno", "boolean", "tpl_mobilerepair"),
("youtubefooterLinks_mobilerepair_tpl", "mobilerepair", "https://www.youtube.com/", "https://www.youtube.com/", "input", "free", "tpl_mobilerepair"),
("pinterestfooterShow_mobilerepair_tpl", "mobilerepair", "1", "1", "yesno", "boolean", "tpl_mobilerepair"),
("pinterestfooterLinks_mobilerepair_tpl", "mobilerepair", "https://www.pinterest.com/", "https://www.pinterest.com/", "input", "free", "tpl_mobilerepair")

');

          $succesfully = 1;

          ?>
          <!-- Alert Template installed - succes -->
          <div class="alert alert-success fade show">
            <?php echo $tl["installtemplate"]["itpl2"]; ?>
          </div>
          <!-- Button Close Modal -->
          <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">
            <?php echo $tl["installtemplate"]["itpl4"]; ?>
          </button>
        <?php }
        if (!$succesfully) { ?>
          <form name="company" method="post" action="install.php" enctype="multipart/form-data">
            <!-- Install button -->
            <button type="submit" name="install" class="btn btn-primary btn-block">
              <?php echo $tl["installtemplate"]["itpl3"]; ?>
            </button>
          </form>
        <?php }
      } ?>

    </div>
  </div>

</div>
</body>
</html>