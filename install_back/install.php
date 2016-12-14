<?php
if (isset($_POST['act'])) {
  if ($_POST['act'] == 'installdb') {
    // Form 1 - Set config to DB
    $config[ 'dbhost' ] = $_POST['dbhost'];
    $config[ 'dbuser' ] = $_POST['dbuser'];
    $config[ 'dbpass' ] = $_POST['dbpass'];
    $config[ 'dbname' ] = $_POST['dbname'];
    $config[ 'dbprefix' ] = $_POST['dbprefix'];
    $config[ 'fullsitedomain' ] = $_POST['fullsitedomain'];
    $config[ 'filefolder' ] = $_POST['filefolder'];

    $root = $_SERVER['DOCUMENT_ROOT'];
    $f = fopen($root . "/include/db.ini", "w" );
    foreach ( $config as $name => $value )
    {
      fwrite( $f, "$name = \"$value\"\n" );
    }

    fclose( $f );

  }

  if($_POST['act'] == 'connectiondb') {
    // Form 2 - Control connection to DB

  }
}




if (!file_exists('../include/db.ini')) die('[install.php] include/db.ini not exist');

if (!file_exists('../include/db.php')) die('[install.php] include/db.php not exist');
require_once '../include/db.php';

/* NO CHANGES FROM HERE */

// Get the jak DB class
require_once '../class/class.db.php';

// Absolute Path
define('DIR_APPLICATION', str_replace('\'', '/', realpath(dirname(__FILE__))) . '/');
define('DIR_CMS', str_replace('\'', '/', realpath(DIR_APPLICATION . '../')) . '/');

function smartsql($value)
{
  global $jakdb;
  if (!is_int($value)) {
    $value = $jakdb->real_escape_string($value);
  }
  return $value;
}

// Now check if the database is empty
$check_db_content = false;
$show_form = true;

// MySQL/i connection
if (DB_USER && DB_PASS) {

  @$linkdb = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
  @mysqli_select_db(DB_NAME);

  @$result = mysqli_query('SELECT name FROM ' . DB_PREFIX . 'usergroup WHERE id = 1 LIMIT 1');

  if ($result) {
    $check_db_content = true;
  }

  // Finally close all db connections
  @mysqli_close($linkdb);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Installation CMS</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
  <link rel="stylesheet" href="../css/stylesheet.css" type="text/css" media="screen"/>

  <!-- Basic CSS and Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css" type="text/css" media="screen"/>
  <link rel="stylesheet" href="include/style.css" type="text/css" media="screen"/>

  <!-- Web Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

</head>
<body class="light-gray-bg">

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <div class="logo pull-left"><img src="include/logo_light_blue.png" alt=""></div>
      <?php include 'include/install-version.php'; ?>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-title">Installation <strong>Wizard</strong></h1>
      <div class="separator-2"></div>

      <p>Please read or watch the <a href="/install_back/installation-en.php">installation manual/video</a> very
        carefully</p>

      <?php
      if(!isset($_GET['step'])){

        ?>

        <form method="post" action="install.php?step=2" enctype="multipart/form-data">
          <input type="hidden" name="act" value="installdb"/>
          <!-- Form 1. -->

          <table class="table table-striped">
            <tr>
              <td class="col-lg-4">Database Host</td>
              <td class="col-lg-3"><input type="text" name="dbhost" id="dbhost" value="<?php echo $config[ 'dbhost' ] ?>"></td>
              <td></td>
            </tr>
            <tr>
              <td>Database User</td>
              <td><input type="text" name="dbuser" id="dbuser" value="<?php echo $config[ 'dbuser' ] ?>"></td>
              <td></td>
            </tr>
            <tr>
              <td>Database Pass</td>
              <td><input type="text" name="dbpass" id="dbpass" value="<?php echo $config[ 'dbpass' ] ?>"></td>
              <td></td>
            </tr>
            <tr>
              <td>Database Name</td>
              <td><input type="text" name="dbname" id="dbname" value="<?php echo $config[ 'dbname' ] ?>"></td>
              <td></td>
            </tr>
            <tr>
              <td>Database Prefix</td>
              <td><input type="text" name="dbprefix" id="dbprefix" value="<?php echo $config[ 'dbprefix' ] ?>"></td>
              <td><i>Database prefix use (a-z) and (_), for example: cms_</i></td>
            </tr>
            <tr>
              <td>Your site URL</td>
              <td><input type="text" name="fullsitedomain" id="fullsitedomain" value="<?php echo $config[ 'fullsitedomain' ] ?>"></td>
              <td><i>Define your site url, for example: www.bluesat.cz</i></td>
            </tr>
            <tr>
              <td>Files directory</td>
              <td><input type="text" name="filefolder" id="filefolder" value="<?php echo $config[ 'filefolder' ] ?>"></td>
              <td><i>Choose the files directory, rename it if you like different location but make sure the content is the same</i></td>
            </tr>
          </table>

          <button type="submit" class="btn square btn-default pull-right">NEXT</button>
        </form>

        <?php
      }
      else if(isset($_GET['step']) && $_GET['step'] == 2){
        ?>

        <form method="post" action="install.php?step=3">
          <input type="hidden" name="act" value="connectiondb"/>
          <!-- Form 2. -->

          <?php
          // Test for the config.php File
          if (@file_exists('../config.php')) {
            $data_file = '<strong style="color:green">config.php available</strong>';
          } else {
            $data_file = '<strong style="color:red">config.php not available!</strong>';
          }

          // Connect to the database
          @$linkdb = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

          $result_mysqli = '';
          $result_mysqlv = '';

          if ($linkdb && DB_USER && DB_PASS) {

            if (function_exists('mysqli_connect')) {
              $result_mysqli = '<strong style="color:green">MySQLi extension available, perfect!</strong>';
            } else {
              $result_mysqli = '<strong style="color:green">No support for MySQLi, please update your server.</strong>';
            }

            $mysqlv = mysqli_get_server_info($linkdb);

            if (version_compare($mysqlv, '5.2') < 0) {
              $result_mysqlv = '<strong style="color:red">You need a higher version of MySQL (min. MySQL 5.2)!</strong>';
            } else {
              $result_mysqlv = '<strong style="color:green">MySQL Version: ' . $mysqlv . '</strong>';
            }

            $conn_data = '<strong style="color:green">Database connection available</strong>';
          } else {

            $conn_data = '<strong style="color:red">Could not connect to the database!</strong>';
            @mysqli_close($linkdb);
          }

          // Database exist
          @$dlink = mysqli_select_db($linkdb, DB_NAME);

          if ($dlink) {
            $data_exist = '<strong style="color:green">Database "' . DB_NAME . '" available (' . DB_NAME . ')</strong>';
          } else {
            $data_exist = '<strong style="color:red">Could not find the database "' . DB_NAME . '"!</strong>';
            @mysqli_close($dlink);
          }

          // Test the minimum PHP version
          $php_version = PHP_VERSION;
          $php_big = '';

          if (version_compare($php_version, '5.3.0') < 0) {
            $result_php = '<strong style="color:red">You need a higher version of PHP (min. PHP 5.3)!</strong>';
          } else {

            if (version_compare($php_version, '7.0.0') > 0) $php_big = '<br /><strong style="color:red">The software has not been tested on your php version yet, but it should work.</strong>';

            // We also give feedback on whether we're running in safe mode
            $result_safe = '<strong style="color:green">PHP Version: ' . $php_version . '</strong>';
            if (@ini_get('safe_mode') || strtolower(@ini_get('safe_mode')) == 'on') {
              $result_safe .= ', <strong style="color:red">Safe Mode activated</strong>.';
            } else {
              $result_safe .= '<strong style="color:green">, Safe Mode deactivated.</strong>';
            }

            $result_safe .= $php_big;
          }

          $dirc = DIR_CMS . "/" . JAK_FILES_DIRECTORY;
          $writec = false;

          // Now really check
          if (file_exists($dirc) && is_dir($dirc)) {
            if (@is_writable($dirc)) {
              $writec = true;
            }
            $existsc = true;
          }

          @$passedc['files'] = ($existsc && $passedc['files']) ? true : false;

          @$existsc = ($existsc) ? '<strong style="color:green">Found folder</strong> (' . JAK_FILES_DIRECTORY . ')' : '<strong style="color:red">Folder not found!, </strong> (' . JAK_FILES_DIRECTORY . ')';
          @$writec = ($writec) ? '<strong style="color:green">permission set</strong> (' . JAK_FILES_DIRECTORY . '), ' : (($existsc) ? '<strong style="color:red">permission not set (check guide)!</strong> (' . JAK_FILES_DIRECTORY . '), ' : '');

          // GD Graphics Support
          if (!extension_loaded("gd")) {

            $gd_data = '<strong style="color:orange">GD-Libary not available</strong>';
          } else {
            $gd_data = '<strong style="color:green">GD-Libary available</strong>';
          }
          ?>

          <div class="well well-sm">
            Before we start with the installation, the script will check your server settings, everything
            <strong style="color:green">green</strong> means ready to go!
          </div>

          <table class="table table-striped">
            <tr>
              <td><strong>What has to be right</strong></td>
              <td><strong>Result</strong></td>
            </tr>
            <tr>
              <td>config.php:</td>
              <td><?php echo $data_file ?></td>
            </tr>
            <tr>
              <td>Database connection</td>
              <td><?php echo $conn_data ?></td>
            </tr>
            <tr>
              <td>Database Version and MySQLi Support</td>
              <td><?php echo $result_mysqlv; ?> / <?php echo $result_mysqli ?></td>
            </tr>
            <tr>
              <td>Database</td>
              <td><?php echo $data_exist ?></td>
            </tr>
            <tr>
              <td>PHP Version and Safe Mode:</td>
              <td><?php echo @$result_php ?><?php echo $result_safe ?></td>
            </tr>
            <tr>
              <td valign="top">Folders:</td>
              <td><?php echo $writec; ?></td>
            </tr>
            <tr>
              <td>GD Library Support:</td>
              <td><?php echo $gd_data; ?></td>
            </tr>
          </table>

          <p><a href="install.php" class="btn square btn-default pull-left" role="button">PREVIOUS</a></p>
          <?php if (file_exists('../config.php') AND ($linkdb) AND ($dlink) && !$check_db_content) { ?>
            <form name="company" method="post" action="install.php?step=3" enctype="multipart/form-data">
              <div class="form-actions">
                <button type="submit" name="install" class="btn square btn-default pull-right">NEXT</button>
              </div>
            </form>
          <?php } elseif ((file_exists('../config.php') AND ($linkdb) AND ($dlink) && $check_db_content)) { ?>
            <form name="company" method="post" action="install.php?step=5" enctype="multipart/form-data">
              <div class="form-actions">
                <button type="submit" name="userf" class="btn square btn-default pull-right">(Database exist already) Create
                  User
                </button>
              </div>
            </form>
          <?php } else { ?>
            <input type="button" class="btn square btn-warning pull-right" value="REFRESH PAGE" onclick="window.location.reload()"/>
          <?php } ?>

        </form>

        <?php
      }
      else if(isset($_GET['step']) && $_GET['step'] == 3){
        ?>

        <form method="post" action="install.php?step=4">
          <input type="hidden" name="act" value="connectiondb"/>
          <!-- Form 3. -->

          <h3>You have one options to install CMS!</h3>
          <p>This will install a plain CMS to start fresh, for experienced administrators. Seriously you start
            pretty much blank like writing a book from scratch, no categories, no slider and no pages.</p>
          <p><a href="install.php?step=2" class="btn square btn-default pull-left" role="button">Back</a></p>
          <p><a href="install.php?step=4&amp;type=blank" class="btn square btn-default pull-right" role="button">Install</a></p>
        </form>

        <?php
      }
      else if(isset($_GET['step']) && $_GET['step'] == 4){
        ?>

        <form method="post" action="install.php?step=5">

          <?php
          // MySQL/i connection
          if (DB_USER && DB_PASS) {
          $jakdb = new jak_mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
          $jakdb->set_charset("utf8");
          }

          // Now we choose the correct installation process, are we going mad
          if (isset($_GET["type"]) && $_GET["type"] == "blank") {
          include_once('plainsql.php');
          }

          // Finally close all db connections
          $jakdb->jak_close();

          ?>
          <div class="alert bg-success">Database installed successfully.</div>

          <form id="company" method="post" action="install.php?step=4" enctype="multipart/form-data">

            <div class="form-actions">
              <button type="submit" name="userf" class="btn square btn-default pull-right">Setup Super Administrator</button>
            </div>

          </form>

        </form>

        <?php
      }
      else if(isset($_GET['step']) && $_GET['step'] == 5){ ?>
        <div class="well well-sm"><strong>Last Step - Create Admin</strong></div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['userf'])) {

          $errors = array();

          if (!preg_match('/^([a-zA-Z0-9\-_])+$/', $_POST['username'])) {
            $errors['e1'] = 'Please enter a valid username (A-Z,a-z,0-9,-_)!<br />';
          }

          if ($_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['e2'] = 'Please enter a valid email address!<br />';
          }

          if (empty($_POST['pass'])) {
            $errors['e3'] = 'Please enter a valid password!<br />';
          }

          if ($_POST['onumber'] == '') $errors["e4"] = 'Please enter your order number.';

          if (count($errors) == 0) {

// MySQL/i connection
            if (DB_USER && DB_PASS) {
              $jakdb = new jak_mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
              $jakdb->set_charset("utf8");
            }

// The new password encrypt with hash_hmac
            $passcrypt = hash_hmac('sha256', $_POST['pass'], DB_PASS_HASH);

            $jakdb->query('INSERT INTO ' . DB_PREFIX . 'user SET
	username = "' . smartsql($_POST['username']) . '",
	usergroupid = 3,
	password = "' . $passcrypt . '",
	email = "' . smartsql($_POST['email']) . '",
	name = "' . smartsql($_POST['name']) . '",
	time = NOW(),
	access = 1');

            $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = "' . smartsql($_POST['email']) . '" WHERE varname = "email"');

            $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = "' . smartsql($_POST['onumber']) . '" WHERE varname = "o_number"');

            @$jakdb->query('ALTER DATABASE ' . DB_NAME . ' DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci');

// Finally close all db connections
            $jakdb->jak_close();

// confirm
            include_once '../class/class.postmail.php';

            $email_body = 'URL: ' . FULL_SITE_DOMAIN . '<br />Email: ' . $_POST['email'] . '<br />License: ' . $_POST['onumber'];

// Send the email to the customer
            $mail = new PHPMailer(); // defaults to using php "mail()"
            $body = str_ireplace("[\]", "", $email_body);
            $mail->SetFrom($_POST['email']);
            $mail->AddReplyTo($_POST['email']);
            $mail->AddAddress('lic@jakweb.ch');
            $mail->Subject = 'Install - CMS 2.1';
            $mail->AltBody = 'HTML Format - ' . strip_tags($email_body);
            $mail->MsgHTML($body);
            $mail->Send();

            echo '<div class="alert bg-success">Installation successful, please delete or rename the <strong>install</strong> directory. You can now log in, in your <a href="../admin/">administration</a> panel.</div>';

            $show_form = false;

          } else {

            $errors = $errors;
          }

          if ($errors) {

            echo '<div class="alert bg-danger">' . $errors["e1"] . $errors["e2"] . $errors["e3"] . $errors["e4"] . '</div>';

          }
        }

        if ($show_form) { ?>


          <form role="form" name="user" method="post" action="install.php?step=5" enctype="multipart/form-data">
            <table class="table table-striped">
              <tr>
                <td>Order/License Number <span class="complete">*</span></td>
                <td><input type="text" value="" class="form-control" name="onumber" placeholder="Order Number"/></td>
              </tr>
              <tr>
                <td>Name <span class="complete">*</span></td>
                <td><input type="text" value="" class="form-control" name="name" title="Name"/></td>
              </tr>
              <tr>
                <td>Username <span class="complete">*</span></td>
                <td><input type="text" value="" class="form-control" name="username" title="Username"/></td>
              </tr>
              <tr>
                <td>Password <span class="complete">*</span></td>
                <td><input type="text" value="" class="form-control" name="pass" title="Password"/></td>
              </tr>
              <tr>
                <td>Email <span class="complete">*</span></td>
                <td><input type="text" value="" class="form-control" name="email" title="Email"/></td>
              </tr>
            </table>

            <button type="submit" name="user" class="btn square btn-default pull-right">Finish</button>

          </form>
        <?php }
        ?>
      <?php } ?>

    </div>
  </div>

  <hr>

  <footer>
    <p>Copyright 2008 - <?php echo date('Y'); ?> by <a href="http://www.bluesat.cz" target="_blank">CMS / BLUESAT</a>
    </p>
  </footer>

</div>
</body>
</html>