<?php

/*
*
* BLUESAT.CZ
* PHP INSTALL for CMS Template
* Copyright © 2016 Bluesat.cz
*
* -----------------------------------------------------------------------
* author: Thomas
* written by: Bluesat.cz - (http://www.bluesat.cz)
* email: bluesatkv@gmail.com
* =======================================================================
*
*/

if (!file_exists('../../config.php')) die('[index.php] config.php not found');
require_once '../../config.php';

// Check if the file is accessed only from a admin if not stop the script from running
if (!JAK_USERID) die('You cannot access this file directly.');

if (!$jakuser->jakAdminaccess($jakuser->getVar("usergroupid"))) die('You cannot access this file directly.');

// Set successfully to zero
$succesfully = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Installation - Bluesat / Template</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../../css/stylesheet.css" type="text/css" media="screen"/>
  <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css" type="text/css" media="screen"/>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Installation - Bluesat / Template</h3>

      <!-- Check if the plugin is already installed -->
      <?php

      $jakdb->query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "sitestyle_widget_bluesat"');
      if ($jakdb->affected_rows > 0) { ?>

        <div class="alert bg-info fade in">
          Template is already installed.
        </div>

        <!-- Plugin is not installed let's display the installation script -->
        <?php } else { if (isset($_POST['install'])) {

          // Delete old entries
          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "bluesat"');

          // Insert tables into settings
          $jakdb->query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("navbarstyle_mosaic_tpl", "bluesat", 0, 0, "yesno", "boolean", "tpl_bluesat"),
("navbarbw_mosaic_tpl", "bluesat", "dark", "dark", "select", "free", "tpl_bluesat"),
("navbarcolor_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),
("navbarlinkcolor_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),
("navbarcolorlinkbg_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),
("navbarcolorsubmenu_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),
("logo_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),

("mininavbarshow_mosaic_tpl", "bluesat", 1, 0, "yesno", "boolean", "tpl_bluesat"),
("mininavbarcolour_mosaic_tpl", "bluesat", "dark", "dark", "select", "free", "tpl_bluesat"),
("mininavbartxt_mosaic_tpl", "bluesat", "<div class=\"col-sm-12\">
  <a href=\"#\" class=\"first-child\"><i class=\"fa fa-envelope\"></i> Email<span class=\"hidden-sm\">: contact@example.com</span></a>
  <span class=\"phone\">
    <i class=\"fa fa-phone-square\"></i> Tel.: +0 (000) 000-00-00
  </span>
  <a href=\"#\" class=\"pull-right\"><i class=\"fa fa-arrow-circle-down\"></i> Sign Up</a>
  <a href=\"#\" class=\"pull-right\"><i class=\"fa fa-sign-in\"></i> Sign In</a>
  <a href=\"#\" class=\"pull-right\"><i class=\"fa fa-search\"></i> Search</a>
</div>", NULL, "input", "free", "tpl_bluesat"),

("style_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),
("design_mosaic_tpl", "bluesat", "white", "white", "input", "free", "tpl_bluesat"),
("boxpattern_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),
("boxbg_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),
("sidebar_location_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),
("font_mosaic_tpl", "bluesat", "Robot, Helvetica, sans-serif", "Arial, Helvetica, sans-serif", "input", "free", "tpl_bluesat"),
("fontg_mosaic_tpl", "bluesat", "Oswald", "NonGoogle", "input", "free", "tpl_bluesat"),
("hcolour_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),
("txtcolour_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),

("theme_mosaic_tpl", "bluesat", "body-green", "body-green", "input", "free", "tpl_bluesat"),
("pattern_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),
("mainbg_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),

("bcontent1_mosaic_tpl", "bluesat", NULL, NULL, "textarea", "free", "tpl_bluesat"),
("bcontent2_mosaic_tpl", "bluesat", NULL, NULL, "textarea", "free", "tpl_bluesat"),
("bcontent3_mosaic_tpl", "bluesat", NULL, NULL, "textarea", "free", "tpl_bluesat"),
("sectionbg_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),
("sectiontc_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),
("sectionshow_mosaic_tpl", "bluesat", 0, 0, "yesno", "boolean", "tpl_bluesat"),

("footer_mosaic_tpl", "bluesat", "dark", "dark", "select", "free", "tpl_bluesat"),
("fcont_mosaic_tpl", "bluesat", "<h3 class=\"text-color\"><span>Go Social</span></h3><div class=\"content social\">
  <p>Stay in touch with us:</p>
  <ul class=\"list-inline\">
      <li><a href=\"#\" class=\"twitter\"><i class=\"fa fa-twitter\"></i></a></li>
    <li><a href=\"#\" class=\"facebook\"><i class=\"fa fa-facebook\"></i></a></li>
    <li><a href=\"#\" class=\"pinterest\"><i class=\"fa fa-pinterest\"></i></a></li>
    <li><a href=\"#\" class=\"github\"><i class=\"fa fa-github\"></i></a></li>
    <li><a href=\"#\" class=\"linkedin\"><i class=\"fa fa-linkedin\"></i></a></li>
    <li><a href=\"#\" class=\"vk\"><i class=\"fa fa-vk\"></i></a></li>
    <li><a href=\"#\" class=\"plus\"><i class=\"fa fa-google-plus\"></i></a></li>
  </ul>
  <div class=\"clearfix\"></div>
</div>", NULL, "input", "free", "tpl_bluesat"),
("fcont2_mosaic_tpl", "mosaic", "<h3 class=\"text-color\"><span>Contacts</span></h3>
<p class=\"contact-us-details\">
	<b>Address:</b> your Address<br/>
	<b>Phone:</b> your Phone<br/>
	<b>Email:</b> your Email
</p>", NULL, "input", "free", "tpl_bluesat"),
("fcont3_mosaic_tpl", "bluesat", "<h3 class=\"text-color\"><span>Navigation</span></h3>", NULL, "input", "free", "tpl_bluesat"),
("footerc_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),
("footerct_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),
("footercte_mosaic_tpl", "bluesat", NULL, NULL, "input", "free", "tpl_bluesat"),

("styleswitcher_tpl", "bluesat", "1", "1", "yesno", "boolean", "tpl_bluesat"),
("cms_tpl", "bluesat", "1", "1", "yesno", "boolean", "tpl_bluesat"),
("sitestyle_widget_mosaic", "bluesat", 1, 1, "yesno", "boolean", "tpl_bluesat")');

          $succesfully = 1;

          ?>
          <div class="alert bg-success fade in">
            Template successfully installed!
          </div>
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