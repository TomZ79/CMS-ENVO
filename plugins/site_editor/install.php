<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists('../../config.php')) die('[install.php] config.php not found');
require_once '../../config.php';

// Check if the file is accessed only from a admin if not stop the script from running
if (!JAK_USERID) die('You cannot access this file directly.');

if (!$jakuser->jakAdminaccess($jakuser->getVar("usergroupid"))) die('You cannot access this file directly.');

// Set successfully to zero
$succesfully = 0;

// Set language for plugin
if ($jkv["lang"] != $site_language && file_exists(APP_PATH . 'admin/lang/' . $site_language . '.ini')) {
  $tl = parse_ini_file(APP_PATH . 'admin/lang/' . $site_language . '.ini', true);
} else {
  $tl = parse_ini_file(APP_PATH . 'admin/lang/' . $jkv["lang"] . '.ini', true);
  $site_language = $jkv["lang"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Installation - Editor of basic files site</title>
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
        <h3>Installation - Editor of basic files site</h3>
      </div>
      <hr>

      <!-- Check if the plugin is already installed -->
      <?php $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Site_editor"');
      if ($jakdb->affected_rows > 0) { ?>

        <div class="alert bg-info">Plugin is already installed!!!</div>

        <!-- Plugin is not installed let's display the installation script -->
      <?php } else { ?>

        <!-- The installation button is hit -->
        <?php if (isset($_POST['install'])) {

          $jakdb->query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `managenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "Site_editor", "SITE Editor for edit basic site files.", 1, ' . JAK_USERID . ', 4, "site_editor", "NULL", "if ($page == \'site_editor\') {
        require_once APP_PATH.\'plugins/site_editor/admin/site_editor.php\';
           $JAK_PROVED = 1;
           $checkp = 1;
        }", "../plugins/site_editor/admin/template/site_editornav.php", "NULL", "uninstall.php", "1.0", NOW())');

// Now get the plugin id for futher use
          $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Site_editor"');
          $rows = $results->fetch_assoc();

          if ($rows['id']) {

            $adminlang = 'if (file_exists(APP_PATH.\'plugins/site_editor/admin/lang/\'.$site_language.\'.ini\')) {
              $tlsedi = parse_ini_file(APP_PATH.\'plugins/site_editor/admin/lang/\'.$site_language.\'.ini\', true);
          } else {
              $tlsedi = parse_ini_file(APP_PATH.\'plugins/site_editor/admin/lang/en.ini\', true);
          }';

            $jakdb->query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_admin_lang", "SITE Editor Admin Language", "' . $adminlang . '", "site_editor", 1, 4, "' . $rows['id'] . '", NOW())');

            $succesfully = 1;

            ?>

            <div class="alert bg-success"><?php echo $tl["plugin"]["p13"]; ?></div>

          <?php } else {

            $result = $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "Site_editor"');

            ?>
            <div class="alert bg-danger"><?php echo $tl["plugin"]["p14"]; ?></div>
            <form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
              <button type="submit" name="redirect"
                      class="btn btn-danger btn-block"><?php echo $tl["plugin"]["p11"]; ?></button>
            </form>
          <?php }
        } ?>

        <?php if (!$succesfully) { ?>
          <form name="company" method="post" action="install.php" enctype="multipart/form-data">
            <button type="submit" name="install"
                    class="btn btn-primary btn-block"><?php echo $tl["plugin"]["p10"]; ?></button>
          </form>
        <?php }
      } ?>

    </div>
  </div>

</div><!-- #container -->
</body>
</html>