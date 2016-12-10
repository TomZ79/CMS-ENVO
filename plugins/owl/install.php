<?php

// Include the config file...
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
  <title>Installation - Pull Feedback Messages</title>
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
        <h3>Installation - Pull Feedback Messages</h3>
      </div>
      <hr>

      <!-- Check if the plugin is already installed -->
      <?php $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Owl"');
      if ($jakdb->affected_rows > 0) { ?>

        <div class="alert bg-info"><?php echo $tl["plugin"]["p12"];?></div>

        <!-- Plugin is not installed let's display the installation script -->
      <?php } else { ?>

      <!-- The installation button is hit -->
      <?php if (isset($_POST['install'])) {

        $jakdb->query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `managenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "Owl", "Pull messages from the Feedback - Owl software.", 1, ' . JAK_USERID . ', 4, "owl", "", "if ($page == \'owl\') {
        require_once APP_PATH.\'plugins/owl/admin/owl.php\';
        $JAK_PROVED = 1;
        $checkp = 1;
     }", "../plugins/owl/admin/template/nav.php", "1", "uninstall.php", "1.0", NOW())');

// now get the plugin id for futher use
        $rows = $jakdb->queryRow('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Owl"');

        if ($rows['id']) {

          $adminlang = 'if (file_exists(APP_PATH.\'plugins/owl/admin/lang/\'.$site_language.\'.ini\')) {
    $tlowl = parse_ini_file(APP_PATH.\'plugins/owl/admin/lang/\'.$site_language.\'.ini\', true);
} else {
    $tlowl = parse_ini_file(APP_PATH.\'plugins/owl/admin/lang/en.ini\', true);
}';

// Connect to pages/news
          $pages = 'if ($pg[\'pluginid\'] == JAK_PLUGIN_OWL) {
include_once APP_PATH.\'plugins/owl/admin/template/connect.php\';
}';

          $sqlinsert = '$insert .= \'showowl = \"\'.smartsql($defaults[\'jak_showowl\']).\'\",\';';

// The file who does display the reviews
          $get_owlreviews = 'if ($row[\'showowl\'] == 1) {
include_once APP_PATH.\'plugins/owl/template/\'.$jkv[\"sitestyle\"].\'/pages_news.php\';}';

          $jakdb->query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES (NULL, "php_admin_lang", "Owl Admin Language", "' . $adminlang . '", "owl", 1, 4, "' . $rows['id'] . '", NOW()), (NULL, "tpl_admin_page_news", "Owl Admin - Page/News", "' . $pages . '", "owl", 1, 1, "' . $rows['id'] . '", NOW()), (NULL, "tpl_admin_page_news_new", "Owl Admin - Page/News - New", "plugins/owl/admin/template/connect_new.php", "owl", 1, 1, "' . $rows['id'] . '", NOW()), (NULL, "php_admin_pages_sql", "Owl SQL Pages", "' . $sqlinsert . '", "owl", 1, 1, "' . $rows['id'] . '", NOW()), (NULL, "php_admin_news_sql", "Owl SQL News", "' . $sqlinsert . '", "owl", 1, 1, "' . $rows['id'] . '", NOW()), (NULL, "tpl_sidebar", "Feedback - Owl Sidebar Reviews", "plugins/owl/template/sidebar.php", "owl", 1, 4, "' . $rows['id'] . '", NOW()), (NULL, "tpl_page_news_grid", "Owl Pages/News Display", "' . $get_owlreviews . '", "owl", 1, 1, "' . $rows['id'] . '", NOW())');

// Insert tables into settings
          $jakdb->query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES ("owltitle", "owl", NULL, NULL, "input", "free", "owl"), ("owldbhost", "owl", NULL, NULL, "input", "free", "owl"), ("owldbname", "owl", NULL, NULL, "input", "free", "owl"), ("owldbport", "owl", "3306", "3306", "input", "free", "owl"), ("owldbuser", "owl", NULL, NULL, "input", "free", "owl"), ("owldbpass", "owl", NULL, NULL, "input", "free", "owl"), ("owldbprefix", "owl", NULL, NULL, "input", "free", "owl"), ("owldblimit", "owl", "10", "10", "bolean", "number", "owl")');

          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'pages ADD showowl SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER showcontact');
          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'news ADD showowl SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER showcontact');

          $succesfully = 1;

          ?>

          <div class="alert bg-success"><?php echo $tl["plugin"]["p13"];?></div>

        <?php } else {

          $result = $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "Owl"');

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