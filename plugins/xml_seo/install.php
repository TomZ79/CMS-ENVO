<?php

// Get the config file
if (!file_exists('../../config.php')) die('[install.php] config.php not found');
require_once '../../config.php';

// Check if the file is accessed only from a admin if not stop the script from running
if (!JAK_USERID) die('You cannot access this file directly.');

// Not logged in and not admin, sorry...
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
  <title><?php echo $tl["plugin"]["t28"]; ?></title>
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
        <h3><?php echo $tl["plugin"]["t28"]; ?></h3>
      </div>
      <hr>

      <!-- Check if the plugin is already installed -->
      <?php $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "XML_SEO"');
      if ($jakdb->affected_rows > 0) { ?>

        <div class="alert alert-info"><?php echo $tl["plugin"]["p12"]; ?></div>

        <!-- Plugin is not installed let's display the installation script -->
      <?php } else { ?>

        <!-- The installation button is hit -->
        <?php if (isset($_POST['install'])) {

        $jakdb->query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `managenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "XML_SEO", "XML Sitemap for better SEO.", 1, ' . JAK_USERID . ', 4, "xml_seo", "NULL", "if ($page == \'xml_seo\') {
        require_once APP_PATH.\'plugins/xml_seo/admin/xml_seo.php\';
           $JAK_PROVED = 1;
           $checkp = 1;
        }", "../plugins/xml_seo/admin/template/xml_seonav.php", "NULL", "uninstall.php", "1.3", NOW())');

        // Now get the plugin id for futher use
        $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "XML_SEO"');
        $rows = $results->fetch_assoc();

        if ($rows['id']) {

          $adminlang = 'if (file_exists(APP_PATH.\'plugins/xml_seo/admin/lang/\'.$site_language.\'.ini\')) {
              $tlxml = parse_ini_file(APP_PATH.\'plugins/xml_seo/admin/lang/\'.$site_language.\'.ini\', true);
          } else {
              $tlxml = parse_ini_file(APP_PATH.\'plugins/xml_seo/admin/lang/en.ini\', true);
          }';

          $jakdb->query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES (NULL, "php_admin_lang", "XML SEO Admin Language", "' . $adminlang . '", "xmlseo", 1, 4, "' . $rows['id'] . '", NOW())');

          // Insert tables into settings
          $jakdb->query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES ("xmlseopath", "xmlseo", "plugins/xml_seo/files/", "plugins/xml_seo/files/", "input", "free", "xmlseo"), ("xmlseodate", "xmlseo", NULL, NULL, "timestamp", "free", "xmlseo"), ("frequency_pages", "xmlseo", "monthly" , "monthly", "select", "free", "xmlseo"), ("frequency_blog", "xmlseo", "weekly" , "weekly", "select", "free", "xmlseo"), ("frequency_download", "xmlseo", "weekly" , "weekly", "select", "free", "xmlseo")');

          $succesfully = 1;

        ?>
          <div class="alert alert-success"><?php echo $tl["plugin"]["p13"]; ?></div>
        <?php } else {

          $result = $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "xml_seo"');

        ?>
          <div class="alert alert-danger"><?php echo $tl["plugin"]["p14"]; ?></div>
        <?php } } ?>

        <?php if (!$succesfully) { ?>
          <form name="company" method="post" action="install.php" enctype="multipart/form-data">
            <button type="submit" name="install" class="btn btn-primary btn-block"><?php echo $tl["plugin"]["p10"]; ?></button>
          </form>
        <?php }
      } ?>

    </div><!-- #col-md -->
  </div><!-- #row -->
</div><!-- #container -->
</body>
</html>