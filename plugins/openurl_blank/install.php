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
  <title><?php echo $tl["plugin"]["t16"];?></title>
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
        <h3><?php echo $tl["plugin"]["t16"];?></h3>
      </div>
      <hr>

      <!-- Check if the plugin is already installed -->
      <?php $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "openurl_blank"');
      if ($jakdb->affected_rows > 0) { ?>

        <div class="alert bg-info"><?php echo $tl["plugin"]["p12"];?></div>

        <!-- Plugin is not installed let's display the installation script -->
      <?php } else { ?>

        <!-- The installation button is hit -->
        <?php if (isset($_POST['install'])) {

          $jakdb->query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `sidenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "openurl_blank", "Open all external links in a new window/tab.", 1, ' . JAK_USERID . ', 1, "openurl_blank", NULL, NULL, NULL, NULL, "uninstall.php", "1.0", NOW())');

// now get the plugin id for futher use
          $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "openurl_blank"');
          $rows = $results->fetch_assoc();

          if ($rows['id']) {

            $jakdb->query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
            (NULL, "tpl_between_head", "Open URL jQuery", "plugins/openurl_blank/openurlhead.php", "openurlb", 1, 1, "' . $rows['id'] . '", NOW())');

            $succesfully = 1;

            ?>

            <div class="alert bg-success"><?php echo $tl["plugin"]["p13"];?></div>

          <?php } else {

            $result = $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "openurl_blank"');

            ?>

            <div class="alert bg-danger"><?php echo $tl["plugin"]["p14"];?></div>

          <?php }
        }
        if (!$succesfully) { ?>
          <form name="company" method="post" action="install.php">
            <button type="submit" name="install" class="btn btn-primary btn-block"><?php echo $tl["plugin"]["p10"];?></button>
          </form>
        <?php }
      } ?>

    </div>
  </div>

</div>

</body>
</html>