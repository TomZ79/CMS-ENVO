<?php

if (!file_exists('../../config.php')) die('[install.php] config.php not found');
require_once '../../config.php';

// Check if the file is accessed only from a admin if not stop the script from running
if (!JAK_USERID) die('You cannot access this file directly.');

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
  <title><?php echo $tl["plugin"]["t19"];?></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/stylesheet.css" type="text/css" media="screen"/>
  <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css" type="text/css" media="screen"/>
  <link rel="stylesheet" href="/admin/css/admin-color.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css" media="screen"/>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="well">
        <h3><?php echo $tl["plugin"]["t19"];?></h3>
      </div>
      <hr>

      <!-- Let's do the uninstall -->
      <?php if (isset($_POST['uninstall'])) {

// now get the plugin id for futher use
        $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "register_form"');
        $rows = $results->fetch_assoc();

        if ($rows) {

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "register_form"');

          $resultsp = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'pluginhooks WHERE product = "registerf"');
          while ($rowsp = $resultsp->fetch_assoc()) {

            $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pagesgrid WHERE hookid = ' . $rowsp['id']);
          }

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pluginhooks WHERE product = "registerf"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "registerf"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pagesgrid WHERE pluginid = ' . $rows['id']);
          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = ' . $rows['id']);

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'categories WHERE pluginid = ' . $rows['id']);

// Clean up database
          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'pages DROP showregister');
          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'news DROP showregister');
          $jakdb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET active = 1 WHERE id = 3');
          $jakdb->query('DROP TABLE ' . DB_PREFIX . 'registeroptions');

          $succesfully = 1;

        }

        ?>

        <div class="alert bg-success"><?php echo $tl["plugin"]["p15"];?></div>

      <?php } ?>

      <?php if (!$succesfully) { ?>
        <form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
          <div class="form-actions">
            <button type="submit" name="uninstall" class="btn btn-danger btn-block"><?php echo $tl["plugin"]["p11"];?></button>
          </div>
        </form>
      <?php } ?>


    </div>
  </div>


</div>
</body>
</html>