<?php
$root = $_SERVER['DOCUMENT_ROOT'];

$langserver = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
switch ($langserver){
  case "cs":
    $lang = parse_ini_file($root . '/install/include/cs.ini', true);
    break;
  case "en":
    $lang = parse_ini_file($root . '/install/include/en.ini', true);
    break;
  default:
    $lang = parse_ini_file($root . '/install/include/en.ini', true);
    break;
}


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

  // Create connection
  @$linkdb = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

  @$result = mysqli_query($linkdb, 'SELECT name FROM ' . DB_PREFIX . 'usergroup WHERE id = 1 LIMIT 1');

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
  <title><?php echo $lang["lang"]["l"];?></title>
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
      <h1 class="page-title"><?php echo $lang["lang"]["l1"];?></h1>
      <div class="separator-2"></div>

      <!--
      <p>Please read or watch the <a href="/install/installation-en.php">installation manual/video</a> very
        carefully</p>
      -->

      <div class="tsf-wizard tsf-wizard-1">
        <!-- BEGIN NAV STEP-->
        <div class="tsf-nav-step">
          <!-- BEGIN STEP INDICATOR-->
          <ul class="gsi-step-indicator triangle gsi-style-2 gsi-step-no-available">
            <li <?php if(!isset($_GET['step'])){ echo ' class="current"'; } ?>>
              <?php echo (!isset($_GET['step']) ? '<span>' : '<a href="#">'); ?>
                <span class="number">1</span>
                <span class="desc">
                    <label><?php echo $lang["lang"]["step1"];?></label>
                    <span><?php echo $lang["lang"]["step1_1"];?></span>
                </span>
              <?php echo (!isset($_GET['step']) ? '</span>' : '</a>'); ?>
            </li>
            <li id="step2" <?php if(isset($_GET['step']) && $_GET['step'] == 2) { echo ' class="current"'; } ?>>
              <?php echo ($_GET['step'] == 2 ? '<span>' : '<a href="#">'); ?>
                <span class="number">2</span>
                <span class="desc">
                    <label><?php echo $lang["lang"]["step2"];?></label>
                    <span><?php echo $lang["lang"]["step2_1"];?></span>
                </span>
                <?php echo ($_GET['step'] == 2 ? '</span>' : '</a>'); ?>
            </li>
            <li id="step3" <?php if(isset($_GET['step']) && $_GET['step'] == 3) { echo ' class="current"'; } ?>>
              <?php echo ($_GET['step'] == 3 ? '<span>' : '<a href="#">'); ?>
                <span class="number">3</span>
                <span class="desc">
                    <label><?php echo $lang["lang"]["step3"];?></label>
                    <span><?php echo $lang["lang"]["step3_1"];?></span>
                </span>
              <?php echo ($_GET['step'] == 3 ? '</span>' : '</a>'); ?>
            </li>
            <li id="step4" <?php if(isset($_GET['step']) && $_GET['step'] == 4) { echo ' class="current"'; } ?>>
              <?php echo ($_GET['step'] == 4 ? '<span>' : '<a href="#">'); ?>
                <span class="number">4</span>
                <span class="desc">
                    <label><?php echo $lang["lang"]["step4"];?></label>
                    <span><?php echo $lang["lang"]["step4_1"];?></span>
                </span>
                <?php echo ($_GET['step'] == 4 ? '</span>' : '</a>'); ?>
            </li>
            <li id="step5" <?php if(isset($_GET['step']) && $_GET['step'] == 5) { echo ' class="current"'; } ?>>
              <?php echo ($_GET['step'] == 5 ? '<span>' : '<a href="#">'); ?>
                <span class="number">5</span>
                <span class="desc">
                    <label><?php echo $lang["lang"]["step5"];?></label>
                    <span><?php echo $lang["lang"]["step5_1"];?></span>
                </span>
              <?php echo ($_GET['step'] == 5 ? '</span>' : '</a>'); ?>
            </li>
          </ul>
          <!-- END STEP INDICATOR -->
        </div>
        <!-- END NAV STEP-->
      </div>

      <?php if(!isset($_GET['step'])){ ?>

        <form method="post" action="install.php?step=2" enctype="multipart/form-data">
          <input type="hidden" name="act" value="installdb"/>
          <!-- Form 1. -->

          <table class="table">
            <tr>
              <td class="col-lg-4"><?php echo $lang["lang"]["form1"];?></td>
              <td class="col-lg-3"><input type="text" class="form-control" name="dbhost" id="dbhost" value="<?php echo $config[ 'dbhost' ] ?>"></td>
              <td></td>
            </tr>
            <tr>
              <td><?php echo $lang["lang"]["form1_1"];?></td>
              <td><input type="text" class="form-control" name="dbuser" id="dbuser" value="<?php echo $config[ 'dbuser' ] ?>"></td>
              <td></td>
            </tr>
            <tr>
              <td><?php echo $lang["lang"]["form1_2"];?></td>
              <td><input type="text" class="form-control" name="dbpass" id="dbpass" value="<?php echo $config[ 'dbpass' ] ?>"></td>
              <td></td>
            </tr>
            <tr>
              <td><?php echo $lang["lang"]["form1_3"];?></td>
              <td><input type="text" class="form-control" name="dbname" id="dbname" value="<?php echo $config[ 'dbname' ] ?>"></td>
              <td></td>
            </tr>
            <tr>
              <td><?php echo $lang["lang"]["form1_4"];?></td>
              <td><input type="text" class="form-control" name="dbprefix" id="dbprefix" value="<?php echo $config[ 'dbprefix' ] ?>"></td>
              <td><i><?php echo $lang["lang"]["form1_41"];?></i></td>
            </tr>
            <tr>
              <td><?php echo $lang["lang"]["form1_5"];?></td>
              <td><input type="text" class="form-control" name="fullsitedomain" id="fullsitedomain" value="<?php echo $config[ 'fullsitedomain' ] ?>"></td>
              <td><i><?php echo $lang["lang"]["form1_51"];?></i></td>
            </tr>
            <tr>
              <td><?php echo $lang["lang"]["form1_6"];?></td>
              <td><input type="text" class="form-control" name="filefolder" id="filefolder" value="<?php echo $config[ 'filefolder' ] ?>"></td>
              <td><i><?php echo $lang["lang"]["form1_61"];?></i></td>
            </tr>
          </table>

          <button type="submit" class="btn square btn-default pull-right"><?php echo $lang["lang"]["next"];?><i class="fa fa-chevron-right"></i></button>
        </form>

        <?php } else if(isset($_GET['step']) && $_GET['step'] == 2){?>

        <form method="post" action="install.php?step=3">
          <input type="hidden" name="act" value="connectiondb"/>
          <!-- Form 2. -->

          <?php
          // Test for the config.php File
          if (@file_exists('../config.php')) {
            $data_file = $lang["lang"]["form2_21"];
          } else {
            $data_file = $lang["lang"]["form2_22"];
          }

          // Connect to the database
          @$linkdb = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

          $result_mysqli = '';
          $result_mysqlv = '';

          if ($linkdb && DB_USER && DB_PASS) {

            if (function_exists('mysqli_connect')) {
              $result_mysqli = $lang["lang"]["form2_41"];
            } else {
              $result_mysqli = $lang["lang"]["form2_42"];
            }

            $mysqlv = mysqli_get_server_info($linkdb);

            if (version_compare($mysqlv, '5.2') < 0) {
              $result_mysqlv = '<strong style="color:red">You need a higher version of MySQL (min. MySQL 5.2)!</strong>';
            } else {
              $result_mysqlv = '<strong style="color:green">MySQL Version: ' . $mysqlv . '</strong>';
            }

            $conn_data = $lang["lang"]["form2_31"];
          } else {

            $conn_data = $lang["lang"]["form2_32"];
            @mysqli_close($linkdb);
          }

          // Database exist
          @$dlink = mysqli_select_db($linkdb, DB_NAME);

          if ($dlink) {
            $number = 9;
            $str = "Beijing";
            $data_exist = sprintf($lang["lang"]["form2_51"],DB_NAME , DB_NAME);
          } else {
            $data_exist = sprintf($lang["lang"]["form2_52"],DB_NAME);
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
              $result_safe .= $lang["lang"]["form2_61"];
            } else {
              $result_safe .= $lang["lang"]["form2_62"];
            }

            $result_safe .= $php_big;
          }

          $dirc = DIR_CMS . "/" . JAK_FILES_DIRECTORY;
          $writec = false;

          // Now really check
          if (file_exists($dirc) && is_dir($dirc)) {
            if (is_writable($dirc)) {
              $writec = true;
            }
            $existsc = true;
          } else {
            $existsc = false;
            $writec = false;
          }

          @$existsfolder = ($existsc) ? $lang["lang"]["form2_71"] : $lang["lang"]["form2_72"];
          @$writefolder = ($writec)  ? $existsfolder . ' - ' .$lang["lang"]["form2_73"] . ' ( ' . JAK_FILES_DIRECTORY . ' )' : (($existsc) ?  $existsfolder . ' - ' .$lang["lang"]["form2_74"] . ' ( ' . JAK_FILES_DIRECTORY . ' )' : $existsfolder);

          // GD Graphics Support
          if (!extension_loaded("gd")) {

            $gd_data = $lang["lang"]["form2_81"];
          } else {
            $gd_data = $lang["lang"]["form2_82"];
          }
          ?>

          <div class="well well-sm">
            <?php echo $lang["lang"]["form2"];?>
          </div>

          <table class="table">
            <tr>
              <td><?php echo $lang["lang"]["form2_1"];?></td>
              <td><?php echo $lang["lang"]["form2_11"];?></td>
            </tr>
            <tr>
              <td><?php echo $lang["lang"]["form2_2"];?></td>
              <td><?php echo $data_file ?></td>
            </tr>
            <tr>
              <td><?php echo $lang["lang"]["form2_3"];?></td>
              <td><?php echo $conn_data ?></td>
            </tr>
            <tr>
              <td><?php echo $lang["lang"]["form2_4"];?></td>
              <td><?php echo $result_mysqlv; ?> / <?php echo $result_mysqli ?></td>
            </tr>
            <tr>
              <td><?php echo $lang["lang"]["form2_5"];?></td>
              <td><?php echo $data_exist ?></td>
            </tr>
            <tr>
              <td><?php echo $lang["lang"]["form2_6"];?></td>
              <td><?php echo @$result_php ?><?php echo $result_safe ?></td>
            </tr>
            <tr>
              <td valign="top"><?php echo $lang["lang"]["form2_7"];?></td>
              <td><?php echo $writefolder; ?></td>
            </tr>
            <tr>
              <td><?php echo $lang["lang"]["form2_8"];?></td>
              <td><?php echo $gd_data; ?></td>
            </tr>
          </table>

          <p><a href="install.php" class="btn square btn-default pull-left" role="button"><i class="fa fa-chevron-left"></i><?php echo $lang["lang"]["prev"];?></a></p>
          <?php if (file_exists('../config.php') && ($linkdb) && ($dlink) && !$check_db_content) { ?>
            <button type="submit" class="btn square btn-default pull-right"><?php echo $lang["lang"]["next"];?><i class="fa fa-chevron-right"></i></button>
          <?php } elseif (file_exists('../config.php') && ($linkdb) && ($dlink) && $check_db_content) { ?>
            <p>
              <a href="install.php?step=5" class="btn square btn-default pull-right" role="button" name="userf">
                <?php echo $lang["lang"]["dbexist"];?><i class="fa fa-chevron-right"></i>
              </a>
            </p>
          <?php } else { ?>
            <input type="button" class="btn square btn-warning pull-right" value="<?php echo $lang["lang"]["refresh"];?>" onclick="window.location.reload()"/>
          <?php } ?>

        </form>

        <?php
      }
      else if(isset($_GET['step']) && $_GET['step'] == 3){
        ?>

        <form method="post" action="install.php?step=4">
          <input type="hidden" name="act" value=""/>
          <!-- Form 3. -->

          <h3><?php echo $lang["lang"]["form3"];?></h3>
          <p><?php echo $lang["lang"]["form3_1"];?></p>
          <p><a href="install.php?step=2" class="btn square btn-default pull-left" role="button"><i class="fa fa-chevron-left"></i><?php echo $lang["lang"]["prev"];?></a></p>
          <p><a href="install.php?step=4&amp;type=blank" class="btn square btn-default pull-right" role="button"><?php echo $lang["lang"]["install"];?><i class="fa fa-chevron-right"></i></a></p>
        </form>

        <?php
      }
      else if(isset($_GET['step']) && $_GET['step'] == 4){
        ?>

        <form method="post" action="install.php?step=5">
          <input type="hidden" name="act" value=""/>
          <!-- Form 4. -->

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
          <div class="alert bg-success"><?php echo $lang["lang"]["form4"];?></div>

          <form id="company" method="post" action="install.php?step=4" enctype="multipart/form-data">

            <div class="form-actions">
              <button type="submit" name="userf" class="btn square btn-default pull-right"><?php echo $lang["lang"]["superadmin"];?><i class="fa fa-chevron-right"></i></button>
            </div>

          </form>

        </form>

        <?php
      }
      else if(isset($_GET['step']) && $_GET['step'] == 5){ ?>
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

// Confirm
            include_once '../class/class.postmail.php';

            $email_body = 'URL: ' . FULL_SITE_DOMAIN . '<br />Email: ' . $_POST['email'] . '<br />License: ' . $_POST['onumber'];

// Send the email to the customer
            $mail = new PHPMailer(); // defaults to using php "mail()"
            $body = str_ireplace("[\]", "", $email_body);
            $mail->SetFrom($_POST['email']);
            $mail->AddReplyTo($_POST['email']);
            $mail->AddAddress('bluesatkv@gmail.com');
            $mail->Subject = 'Install - Bluesat CMS';
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
            <input type="hidden" name="act" value=""/>
            <!-- Form 5. -->

            <h3><?php echo $lang["lang"]["form5"];?></h3>
            <table class="table">
              <tr>
                <td><?php echo $lang["lang"]["form5_1"];?> <span class="complete">*</span></td>
                <td><input type="text" value="" class="form-control" name="onumber" placeholder="<?php echo $lang["lang"]["form5_11"];?>"/></td>
              </tr>
              <tr>
                <td><?php echo $lang["lang"]["form5_2"];?> <span class="complete">*</span></td>
                <td><input type="text" value="" class="form-control" name="name" title="Name"/></td>
              </tr>
              <tr>
                <td><?php echo $lang["lang"]["form5_3"];?> <span class="complete">*</span></td>
                <td><input type="text" value="" class="form-control" name="username" title="Username"/></td>
              </tr>
              <tr>
                <td><?php echo $lang["lang"]["form5_4"];?> <span class="complete">*</span></td>
                <td><input type="text" value="" class="form-control" name="pass" title="Password"/></td>
              </tr>
              <tr>
                <td><?php echo $lang["lang"]["form5_5"];?> <span class="complete">*</span></td>
                <td><input type="text" value="" class="form-control" name="email" title="Email"/></td>
              </tr>
            </table>

            <button type="submit" name="user" class="btn square btn-default pull-right"><?php echo $lang["lang"]["finish"];?></button>

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