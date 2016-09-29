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
  <title>Uninstallation - Mosaic / Template</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../../css/stylesheet.css" type="text/css" media="screen"/>
  <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css" type="text/css" media="screen"/>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Uninstallation - Mosaic / Template</h3>

      <!-- Let's do the uninstall -->
      <?php if (isset($_POST['uninstall'])) {

        $jakdb->query('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "tpl_mosaic"');

        $succesfully = 1;

        ?>

        <div class="alert bg-success fade in">
          <h4>Template successfully uninstalled!</h4>
        </div>

      <?php }
      if (!$succesfully) { ?>
        <form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
          <button type="submit" name="uninstall" class="btn btn-danger btn-block">UnInstall Template</button>
        </form>
      <?php } ?>

    </div>
  </div>

</div>
</body>
</html>