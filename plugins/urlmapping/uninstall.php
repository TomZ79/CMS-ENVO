<?php

// Include the config file...
if (!file_exists('../../config.php')) die('[install.php] config.php not found');
require_once '../../config.php';

// Check if the file is accessed only from a admin if not stop the script from running
if (!JAK_USERID) die('You cannot access this file directly.');

// If not logged in and not admin, block access
if (!$jakuser->jakAdminaccess($jakuser->getVar("usergroupid"))) die('You cannot access this file directly.');


// Set successfully to zero
$succesfully = 0;

// Set language for plugin
if ($jkv["lang"] != $site_language && file_exists(APP_PATH.'admin/lang/'.$site_language.'.ini')) {
  $tl = parse_ini_file(APP_PATH.'admin/lang/'.$site_language.'.ini', true);
} else {
  $tl = parse_ini_file(APP_PATH.'admin/lang/'.$jkv["lang"].'.ini', true);
  $site_language = $jkv["lang"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $tl["plugin"]["t31"];?></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../../css/stylesheet.css" type="text/css" media="screen"/>
  <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css" type="text/css" media="screen"/>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="well">
        <h3><?php echo $tl["plugin"]["t31"];?></h3>
      </div>
      <hr>

      <!-- Let's do the uninstall -->
      <?php if (isset($_POST['uninstall'])) {

// now get the plugin id for futher use
        $rows = $jakdb->queryRow('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "UrlMapping"');

        if ($rows) {

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "UrlMapping"');
          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pluginhooks WHERE product = "urlmapping"');
          $jakdb->query('DROP TABLE ' . DB_PREFIX . 'urlmapping');

        }

        $succesfully = 1;

        ?>

        <div class="alert alert-success"><?php echo $tl["plugin"]["p15"];?></div>

      <?php } ?>

      <?php if (!$succesfully) { ?>
        <form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
          <button type="submit" name="uninstall" class="btn btn-danger btn-block"><?php echo $tl["plugin"]["p11"];?></button>
        </form>
      <?php } ?>

    </div>
  </div>


</div><!-- #container -->
</body>
</html>