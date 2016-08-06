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
  <title><?php echo $tl["plugin"]["t21"];?></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../../css/stylesheet.css" type="text/css" media="screen"/>
  <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css" type="text/css" media="screen"/>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="well">
        <h3><?php echo $tl["plugin"]["t21"];?></h3>
      </div>
      <hr>

      <!-- Let's do the uninstall -->
      <?php if (isset($_POST['uninstall'])) {

// now get the plugin id for futher use
        $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Retailer"');
        $rows = $results->fetch_assoc();

        if ($rows) {

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "retailer"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = "' . smartsql($rows['id']) . '"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pagesgrid WHERE pluginid = "' . smartsql($rows['id']) . '"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pluginhooks WHERE product = "retailer"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "retailer"');

          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'usergroup DROP `retailer`, DROP `retailerpost`, DROP `retailerpostdelete`, DROP `retailerpostapprove`, DROP `retailerrate`, DROP `retailermoderate`');

          $jakdb->query('DROP TABLE ' . DB_PREFIX . 'retailer, ' . DB_PREFIX . 'retailercategories, ' . DB_PREFIX . 'retailercomments');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'categories WHERE pluginid = "' . smartsql($rows['id']) . '"');

          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'pages DROP showretailer');
          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'news DROP showretailer');
          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'pagesgrid DROP retailerid');

// Now delete all tags
          $result = $jakdb->query('SELECT tag FROM ' . DB_PREFIX . 'tags WHERE pluginid = "' . smartsql($rows['id']) . '"');
          while ($row = $result->fetch_assoc()) {
            $result1 = $jakdb->query('SELECT count FROM ' . DB_PREFIX . 'tagcloud WHERE tag = "' . smartsql($row['tag']) . '" LIMIT 1');
            $count = $result1->fetch_assoc();

            if ($count['count'] <= '1') {
              $jakdb->query('DELETE FROM tagcloud WHERE tag = "' . smartsql($row['tag']) . '"');
            } else {
              $jakdb->query('UPDATE tagcloud SET count = count - 1 WHERE tag = "' . smartsql($row['tag']) . '"');

            }
          }

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'tags WHERE pluginid = "' . smartsql($rows['id']) . '"');

        }

        $succesfully = 1;

        ?>

        <div class="alert alert-success"><?php echo $tl["plugin"]["p15"];?></div>

      <?php }
      if (!$succesfully) { ?>
        <form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
          <button type="submit" name="uninstall" class="btn btn-danger btn-block"><?php echo $tl["plugin"]["p11"];?></button>
        </form>
      <?php } ?>

    </div>
  </div>

</div><!-- #container -->
</body>
</html>