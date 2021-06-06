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
  <title><?=$tl["installtemplate"]["itpl"] . ' - CARZONE Template'?></title>
  <meta charset="utf-8">
  <!-- BEGIN Vendor CSS-->
  <link href="/assets/plugins/bootstrap/bootstrapv4/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
  <!-- BEGIN Pages CSS-->
  <link href="/admin/pages/css/pages-icons.css?=v3.0.0" rel="stylesheet" type="text/css">
  <link class="main-stylesheet" href="/admin/pages/css/pages.min.css?=v3.0.2" rel="stylesheet" type="text/css"/>
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
  echo $Html->addScript('/admin/assets/plugins/modernizr.custom.js?=v2.8.3');
  echo $Html->addScript('/assets/plugins/popper/1.14.1/popper.min.js');
  echo $Html->addScript('/assets/plugins/bootstrap/bootstrapv4/4.0.0/js/bootstrap.min.js');
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
        <h3 class="semi-bold text-white"><?=$tl["installtemplate"]["itpl"] . ' - CARZONE Template'?></h3>
      </div>
      <hr>

      <!-- Check if the plugin is already installed -->
      <?php

      $envodb->query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "sitestyle_widget_carzone"');
      if ($envodb->affected_rows > 0) { ?>

        <!-- Info - check if template is installed -->
        <div class="alert alert-info fade show">
          <?=$tl["installtemplate"]["itpl1"]?>
        </div>

        <!-- Plugin is not installed let's display the installation script -->
      <?php } else {
        if (isset($_POST['install'])) {

          // Delete old entries
          $envodb->query('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "carzone"');

          // EN: Set admin lang of plugin
          // CZ: Nastavení jazyka pro administrační rozhraní pluginu
          $adminlang = 'if (file_exists(APP_PATH.\'template/carzone/lang/\'.$site_language.\'.ini\')) {
    $tlcarzone = parse_ini_file(APP_PATH.\'template/carzone/lang/\'.$site_language.\'.ini\', true);
} else {
    $tlcarzone = parse_ini_file(APP_PATH.\'template/carzone/lang/en.ini\', true);
}';

          // EN: Set site lang of plugin
          // CZ: Nastavení jazyka pro webové rozhraní pluginu
          $sitelang = 'if (file_exists(APP_PATH.\'template/carzone/lang/\'.$site_language.\'.ini\')) {
    $tlcarzone = parse_ini_file(APP_PATH.\'template/carzone/lang/\'.$site_language.\'.ini\', true);
} else {
    $tlcarzone = parse_ini_file(APP_PATH.\'template/carzone/lang/en.ini\', true);
}';

          // EN: Set html data to insert
          // CZ: Nastavení HTML dat pro vložení
          $footerblocktext1 = '
<div class="col-sm-8">
  <div class="row">
    <div class="col-sm-4">
      <h5>Blog</h5>
      <ul class="list list-icons list-icons-sm">
        <li><i class="fa fa-caret-right"></i> <a href="#">Blog Full Width</a></li>
        <li><i class="fa fa-caret-right"></i> <a href="#">Blog Large Image</a></li>
        <li><i class="fa fa-caret-right"></i> <a href="#">Blog Medium Image</a></li>
        <li><i class="fa fa-caret-right"></i> <a href="#">Single Post</a></li>
      </ul>
    </div>
    <div class="col-sm-4">
      <h5>Pages</h5>
      <ul class="list list-icons list-icons-sm">
        <li><i class="fa fa-caret-right"></i> <a href="#">Full width</a></li>
        <li><i class="fa fa-caret-right"></i> <a href="#">Left sidebar</a></li>
        <li><i class="fa fa-caret-right"></i> <a href="#">Right sidebar</a></li>
        <li><i class="fa fa-caret-right"></i> <a href="#">Custom Header</a></li>
      </ul>
    </div>
    <div class="col-sm-4">
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
<div class="col-sm-4">
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
          $envodb->query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_lang", "CARZONE Template Site Language", "' . $sitelang . '", "tpl_carzone", 1, 4, "0", NOW()),
(NULL, "php_admin_lang", "CARZONE Template Admin Language", "' . $adminlang . '", "tpl_carzone", 1, 4, "0", NOW())');

          // Insert tables into settings
          /* Table of BASIC varname - NOT REMOVE
           * ------------------
           * sidebar_location_tpl => info about sidebar location
           * cms_tpl => basic info about installed template
           * styleswitcher_tpl => show or hide styleswitcher in site
           */
          $envodb->query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("sidebar_location_tpl", "carzone", "left", "left", "input", "free", "tpl_carzone"),
("styleswitcher_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("cms_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),

("HeLogo1Carzone_tpl", "carzone", "/template/carzone/img/logo-light.png", "/template/carzone/img/logo-light.png", "input", "free", "tpl_carzone"),
("HeLogo2Carzone_tpl", "carzone", "/template/carzone/img/logo-light1.png", "/template/carzone/img/logo-light1.png", "input", "free", "tpl_carzone"),
("PageTitleImg_tpl", "carzone", "/template/carzone/img/banner/bnr3.jpg", "/template/carzone/img/banner/bnr3.jpg", "input", "free", "tpl_carzone"),
("FoLogo1Carzone_tpl", "carzone", "/template/carzone/img/logo-light1.png", "/template/carzone/img/logo-light1.png", "input", "free", "tpl_carzone"),

("skin_Carzone_tpl", "carzone", "header-transparent fullwidth, noclass, noclass", "header-transparent fullwidth, noclass, noclass", "input", "free", "tpl_carzone"),
("HeActiveSticky_carzone_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("HeShowTopbar_carzone_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("skinCarzoneTopbar_tpl", "carzone", "top-bar", "top-bar", "input", "free", "tpl_carzone"),
("HeShowLinks1_carzone_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("HeLinks1_carzone_tpl", "carzone", "#", "#", "input", "free", "tpl_carzone"),
("HeText1_carzone_tpl", "carzone", "Get On Road Price", "Get On Road Price", "input", "free", "tpl_carzone"),
("HeShowLinks2_carzone_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("HeLinks2_carzone_tpl", "carzone", "#", "#", "input", "free", "tpl_carzone"),
("HeText2_carzone_tpl", "carzone", "Ask a Question", "Ask a Question", "input", "free", "tpl_carzone"),
("HeShowLogin_carzone_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("HeShowEmail_carzone_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("HeEmailLinks_carzone_tpl", "carzone", "support@website.com", "support@website.com", "input", "free", "tpl_carzone"),
("HeEmailText_carzone_tpl", "carzone", "support@website.com", "support@website.com", "input", "free", "tpl_carzone"),

("facebookHeShow_carzone_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("facebookHeLinks_carzone_tpl", "carzone", "https://www.facebook.com/", "https://www.facebook.com/", "input", "free", "tpl_carzone"),
("youtubeHeShow_carzone_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("youtubeHeLinks_carzone_tpl", "carzone", "https://www.youtube.com/", "https://www.youtube.com/", "input", "free", "tpl_carzone"),
("twitterHeShow_carzone_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("twitterHeLinks_carzone_tpl", "carzone", "https://twitter.com/", "twitter/", "input", "free", "tpl_carzone"),
("googleHeShow_carzone_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("googleHeLinks_carzone_tpl", "carzone", "https://plus.google.com/", "https://plus.google.com/", "input", "free", "tpl_carzone"),
("linkedinHeShow_carzone_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("linkedinHeLinks_carzone_tpl", "carzone", "https://www.linkedin.com/", "https://www.linkedin.com/", "input", "free", "tpl_carzone"),

("facebookFoShow_carzone_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("facebookFoLinks_carzone_tpl", "carzone", "https://www.facebook.com/", "https://www.facebook.com/", "input", "free", "tpl_carzone"),
("youtubeFoShow_carzone_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("youtubeFoLinks_carzone_tpl", "carzone", "https://www.youtube.com/", "https://www.youtube.com/", "input", "free", "tpl_carzone"),
("twitterFoShow_carzone_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("twitterFoLinks_carzone_tpl", "carzone", "https://twitter.com/", "twitter/", "input", "free", "tpl_carzone"),
("googleFoShow_carzone_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("googleFoLinks_carzone_tpl", "carzone", "https://plus.google.com/", "https://plus.google.com/", "input", "free", "tpl_carzone"),
("linkedinFoShow_carzone_tpl", "carzone", "1", "1", "yesno", "boolean", "tpl_carzone"),
("linkedinFoLinks_carzone_tpl", "carzone", "https://www.linkedin.com/", "https://www.linkedin.com/", "input", "free", "tpl_carzone")

');

          $succesfully = 1;

          ?>
          <!-- Alert Template installed - succes -->
          <div class="alert alert-success fade show">
            <?=$tl["installtemplate"]["itpl2"]?>
          </div>
          <!-- Button Close Modal -->
          <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">
            <?=$tl["installtemplate"]["itpl4"]?>
          </button>
        <?php }
        if (!$succesfully) { ?>
          <form name="company" method="post" action="install.php" enctype="multipart/form-data">
            <!-- Install button -->
            <button type="submit" name="install" class="btn btn-primary btn-block">
              <?=$tl["installtemplate"]["itpl3"]?>
            </button>
          </form>
        <?php }
      } ?>

    </div>
  </div>

</div>
</body>
</html>