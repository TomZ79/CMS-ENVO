<?php

// Include the config file...
if (!file_exists('../../config.php')) die('[uninstall.php] config.php not found');
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
  <title><?php echo $tl["plugin"]["t3"];?></title>
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
        <h3><?php echo $tl["plugin"]["t3"];?></h3>
      </div>
      <hr>
      <div class="margin-bottom-30">
        <h4>Blog Plugin - Info about uninstallation</h4>
        <p>Info o procesu odinstalace. Výpis komponentů, které budou odinstalovány a které ne. Po odinstalaci zadané články, kategorie a komentáře budou uchovány v databázi a nebudou odstraněny. Při opětovné instalaci Pluginu Blog budou znovu načteny z databáze. </p>
        <table class="table">
          <thead>
            <tr class="bg-teal">
              <th>Process</th>
              <th>Yes - will be uninstalled</th>
              <th>No - Data will remain in the database</th>
            </tr>
          </thead>
          <tbody>
          <tr>
            <td>Blog Setting</td>
            <td class="text-center"><i class="fa fa-check"></i></td>
            <td></td>
          </tr>
          <tr>
            <td>Blog Article</td>
            <td></td>
            <td class="text-center"><i class="fa fa-check"></i></td>
          </tr>
          <tr>
            <td>Blog Categories</td>
            <td></td>
            <td class="text-center"><i class="fa fa-check"></i></td>
          </tr>
          <tr>
            <td>Blog Comments</td>
            <td></td>
            <td class="text-center"><i class="fa fa-check"></i></td>
          </tr>
          </tbody>
        </table>
      </div>

      <!-- Let's do the uninstall -->
      <?php if (isset($_POST['uninstall'])) {

// Now get the plugin id for futher use
        $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Blog"');
        $rows = $results->fetch_assoc();

        if ($rows) {

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "Blog"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = "' . smartsql($rows['id']) . '"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pagesgrid WHERE pluginid = "' . smartsql($rows['id']) . '"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pluginhooks WHERE product = "blog"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "blog"');

          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'usergroup DROP `blog`, DROP `blogpost`, DROP `blogpostdelete`, DROP `blogpostapprove`, DROP `blograte`, DROP `blogmoderate`');

          //$jakdb->query('DROP TABLE ' . DB_PREFIX . 'blog, ' . DB_PREFIX . 'blogcategories, ' . DB_PREFIX . 'blogcomments');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'categories WHERE pluginid = "' . smartsql($rows['id']) . '"');

          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'pages DROP showblog');
          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'news DROP showblog');
          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'pagesgrid DROP blogid');

// Backup content from blog
          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'backup_content DROP blogid');
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