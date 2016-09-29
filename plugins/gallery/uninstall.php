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
  <title><?php echo $tl["plugin"]["t11"];?></title>
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
        <h3><?php echo $tl["plugin"]["t11"];?></h3>
      </div>
      <hr>

      <!-- Let's do the uninstall -->
      <?php if (isset($_POST['uninstall'])) {

// now get the plugin id for futher use
        $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Gallery"');
        $rows = $results->fetch_assoc();

        if ($rows) {

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "Gallery"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = "' . smartsql($rows['id']) . '"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pagesgrid WHERE pluginid = "' . smartsql($rows['id']) . '"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pluginhooks WHERE product = "gallery"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "gallery"');

          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'usergroup DROP `gallery`, DROP `gallerypost`, DROP `gallerypostdelete`, DROP `gallerypostapprove`, DROP `galleryrate`, DROP `gallerymoderate`, DROP `galleryupload`');

          $jakdb->query('DROP TABLE ' . DB_PREFIX . 'gallery, ' . DB_PREFIX . 'gallerycategories, ' . DB_PREFIX . 'gallerycomments');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'categories WHERE pluginid = "' . smartsql($rows['id']) . '"');

          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'pages DROP showgallery');
          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'news DROP showgallery');
          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'pagesgrid DROP galleryid');

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

        <div class="alert bg-success"><?php echo $tl["plugin"]["p15"];?></div>

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