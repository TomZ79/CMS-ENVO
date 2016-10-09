<?php

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
  <title>Installation - Canvas / Template</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../../css/stylesheet.css" type="text/css" media="screen"/>
  <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css" type="text/css" media="screen"/>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Installation - Canvas / Template</h3>

      <!-- Check if the plugin is already installed -->
      <?php

      $jakdb->query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "sitestyle_widget_canvas"');
      if ($jakdb->affected_rows > 0) { ?>

        <div class="alert bg-info fade in">
          Template is already installed.
        </div>

        <!-- Plugin is not installed let's display the installation script -->
      <?php } else {
        if (isset($_POST['install'])) {

// Delete old entries
          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "canvas"');

// Insert php code for lang site to hooks
          $sitelang = 'if (file_exists(APP_PATH.\'template/canvas/lang/\'.$site_language.\'.ini\')) {
    $tlcanvas = parse_ini_file(APP_PATH.\'template/canvas/lang/\'.$site_language.\'.ini\', true);
} else {
    $tlcanvas = parse_ini_file(APP_PATH.\'template/canvas/lang/en.ini\', true);
}';
          $jakdb->query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_lang", "Canvas Template Site Language", "' . $sitelang . '", "tpl_canvas", 1, 4, "0", NOW())');

// Insert tables into settings
          /* Table of varname
           * ------------------
           * cms_tpl => basic info about installed template
           * styleswitcher_tpl => show or hide styleswitcher in site
           */
          $jakdb->query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("homeLinks_canvas_tpl", "canvas", "#", "#", "input", "free", "tpl_canvas"),
("contactLinks_canvas_tpl", "canvas", "#", "#", "input", "free", "tpl_canvas"),
("loginLinks_canvas_tpl", "canvas", "#", "#", "input", "free", "tpl_canvas"),
("registerLinks_canvas_tpl", "canvas", "#", "#", "input", "free", "tpl_canvas"),

("facebookShow_canvas_tpl", "canvas", "1", "1", "yesno", "boolean", "tpl_canvas"),
("facebookLinks_canvas_tpl", "canvas", "https://www.facebook.com/", "https://www.facebook.com/", "input", "free", "tpl_canvas"),

("twitterShow_canvas_tpl", "canvas", "1", "1", "yesno", "boolean", "tpl_canvas"),
("twitterLinks_canvas_tpl", "canvas", "https://twitter.com/", "https://twitter.com/", "input", "free", "tpl_canvas"),

("googleShow_canvas_tpl", "canvas", "1", "1", "yesno", "boolean", "tpl_canvas"),
("googleLinks_canvas_tpl", "canvas", "https://plus.google.com/", "https://plus.google.com/", "input", "free", "tpl_canvas"),

("phoneShow_canvas_tpl", "canvas", "1", "1", "yesno", "boolean", "tpl_canvas"),
("phoneLinks_canvas_tpl", "canvas", "+420 000 000 000", "+420 000 000 000", "input", "free", "tpl_canvas"),

("emailShow_canvas_tpl", "canvas", "1", "1", "yesno", "boolean", "tpl_canvas"),
("emailLinks_canvas_tpl", "canvas", "info@canvas.com", "info@canvas.com", "input", "free", "tpl_canvas"),

("logo1_canvas_tpl", "canvas", "/template/canvas/img/logo.png", "/template/canvas/img/logo.png", "input", "free", "tpl_canvas"),
("logo2_canvas_tpl", "canvas", "/template/canvas/img/logo@2x.png", "/template/canvas/img/logo@2x.png", "input", "free", "tpl_canvas"),
("phoneLinks1_canvas_tpl", "canvas", "+420 000 000 000", "+420 000 000 000", "input", "free", "tpl_canvas"),
("emailLinks1_canvas_tpl", "canvas", "info@canvas.com", "info@canvas.com", "input", "free", "tpl_canvas"),

("section_canvas_tpl", "canvas", NULL, NULL, "textarea", "free", "tpl_canvas"),

("sidebar_location_tpl", "jakweb", "left", "left", "input", "free", "tpl_jakweb"),
("styleswitcher_tpl", "canvas", "1", "1", "yesno", "boolean", "tpl_canvas"),
("cms_tpl", "canvas", "1", "1", "yesno", "boolean", "tpl_canvas")');

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