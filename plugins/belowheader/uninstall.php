<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
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
  <title><?php echo $tl["plugin"]["t1"];?></title>
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
        <h3><?php echo $tl["plugin"]["t1"];?></h3>
      </div>
      <hr>
      <div class="margin-bottom-30">
        <h4>BelowHeader Plugin - Info about uninstallation</h4>
        <p>Po odinstalování pluginy budou odstraněny všechny záznamy spojené s tímto pluginem.</p>
        <p>POZOR: Při odinstalování pluginu BelowHeader, budou odstraněny všechny vytvořené obsahy a jejich nastavení.</p>
        <table class="table">
          <thead>
          <tr class="bg-teal-400">
            <th>Process</th>
            <th>Yes - will be uninstalled</th>
            <th>No - Data will remain in the database</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>BelowHeader Content above content</td>
            <td class="text-center"><i class="fa fa-check"></i></td>
            <td></td>
          </tr>
          <tr>
            <td>BelowHeader Content below content</td>
            <td class="text-center"><i class="fa fa-check"></i></td>
            <td></td>
          </tr>
          <tr>
            <td>BelowHeader content settings</td>
            <td class="text-center"><i class="fa fa-check"></i></td>
            <td></td>
          </tr>
          </tbody>
        </table>
      </div>

      <!-- Let's do the uninstall -->
      <?php if (isset($_POST['uninstall'])) {
// Validate
        session_start();
        if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"]) {

// Now get the plugin id for futher use
        $sqls = 'SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "BelowHeader"';
        $results = $jakdb->query($sqls);
        $rows = $results->fetch_assoc();

        if ($rows) {

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "BelowHeader"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pluginhooks WHERE product = "belowheader"');

          $jakdb->query('DROP TABLE ' . DB_PREFIX . 'belowheader');

        }

        $succesfully = 1;

        ?>

        <div class="alert bg-success"><?php echo $tl["plugin"]["p15"];?></div>

      <?php } else { ?>
        <div>
          <h4 class="text-danger-400">Wrong Code Entered - Please, enter right number !</h4>
        </div>
      <?php }}
      if (!$succesfully) { ?>
        <hr>
        <form name="company" action="uninstall.php" method="post" enctype="multipart/form-data">
          <div class="form-group form-inline">
            <label for="text">Please read info about uninstallation and enter text: </label>
            <input type="text" name="captcha" class="form-control" id="text">
            <img src="../captcha.php" />
          </div>
          <button type="submit" name="uninstall" class="btn btn-danger btn-block"><?php echo $tl["plugin"]["p11"];?></button>
        </form>
      <?php } ?>

    </div>
  </div>

</div><!-- #container -->
</body>
</html>