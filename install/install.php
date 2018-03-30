<?php

$root = $_SERVER['DOCUMENT_ROOT'];

$langserver = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
switch ($langserver){
  case "cs":
    $tlinst = parse_ini_file($root . '/install/include/cs.ini', true);
    break;
  case "en":
    $tlinst = parse_ini_file($root . '/install/include/en.ini', true);
    break;
  default:
    $tlinst = parse_ini_file($root . '/install/include/en.ini', true);
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

  if($_POST['act'] == 'removefolder') {
    // Form 6 - Remove Folder
    // Define directory
    $newfolder = $_POST['newfolder'];
    $oldname = '../install';
    $newname = '../' . $newfolder;

    // Renames the directory
    rename($oldname, $newname);

    // Redirect to ACP (Admin control panel)
    header('Location:' . $config[ 'fullsitedomain' ] . '/admin'); /* Redirect browser */
    exit();

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

/**
 * EN:
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $value
 * @return string
 *
 */
function smartsql($value)
{
  global $envodb;
  if (!is_int($value)) {
    $value = $envodb->real_escape_string($value);
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
  <title><?=$tlinst["install"]["l"]?></title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
  <link rel="stylesheet" href="/assets/css/stylesheet.css" type="text/css" media="screen"/>

  <!-- Basic CSS and Bootstrap CSS -->
  <link type="text/css" rel="stylesheet" href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/plugins/bootstrap/bootstrapv4/css/bootstrap.min.css?=v4.0.0" type="text/css" media="screen"/>
  <link rel="stylesheet" href="include/style.css" type="text/css" media="screen"/>

  <!-- Web Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

</head>
<body class="light-gray-bg">

<!-- Wrap all page content here -->
<div id="wrap">

  <!-- Fixed navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <div class="row justify-content-between">
          <div class="logo float-left"><img src="include/logo_white.png" alt=""></div>
          <?php include 'include/install-version.php'; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Begin page content -->
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-sm-12">
        <h1 class="page-title"><?=$tlinst["install"]["l1"]?></h1>
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
                <?=(!isset($_GET['step']) ? '<span>' : '<a href="#">')?>
                <span class="number">1</span>
                <span class="desc">
                    <label><?=$tlinst["install"]["step1"]?></label>
                    <span><?=$tlinst["install"]["step1_1"]?></span>
                </span>
                <?=(!isset($_GET['step']) ? '</span>' : '</a>')?>
              </li>
              <li id="step2" <?php if(isset($_GET['step']) && $_GET['step'] == 2) { echo ' class="current"'; } ?>>
                <?=($_GET['step'] == 2 ? '<span>' : '<a href="#">')?>
                <span class="number">2</span>
                <span class="desc">
                    <label><?=$tlinst["install"]["step2"]?></label>
                    <span><?=$tlinst["install"]["step2_1"]?></span>
                </span>
                <?=($_GET['step'] == 2 ? '</span>' : '</a>')?>
              </li>
              <li id="step3" <?php if(isset($_GET['step']) && $_GET['step'] == 3) { echo ' class="current"'; } ?>>
                <?=($_GET['step'] == 3 ? '<span>' : '<a href="#">')?>
                <span class="number">3</span>
                <span class="desc">
                    <label><?=$tlinst["install"]["step3"]?></label>
                    <span><?=$tlinst["install"]["step3_1"]?></span>
                </span>
                <?=($_GET['step'] == 3 ? '</span>' : '</a>')?>
              </li>
              <li id="step4" <?php if(isset($_GET['step']) && $_GET['step'] == 4) { echo ' class="current"'; } ?>>
                <?=($_GET['step'] == 4 ? '<span>' : '<a href="#">')?>
                <span class="number">4</span>
                <span class="desc">
                    <label><?=$tlinst["install"]["step4"]?></label>
                    <span><?=$tlinst["install"]["step4_1"]?></span>
                </span>
                <?=($_GET['step'] == 4 ? '</span>' : '</a>')?>
              </li>
              <li id="step5" <?php if(isset($_GET['step']) && $_GET['step'] == 5) { echo ' class="current"'; } ?>>
                <?=($_GET['step'] == 5 ? '<span>' : '<a href="#">')?>
                <span class="number">5</span>
                <span class="desc">
                    <label><?=$tlinst["install"]["step5"]?></label>
                    <span><?=$tlinst["install"]["step5_1"]?></span>
                </span>
                <?=($_GET['step'] == 5 ? '</span>' : '</a>')?>
              </li>
              <li id="step5" <?php if(isset($_GET['step']) && $_GET['step'] == 6) { echo ' class="current"'; } ?>>
                <?=($_GET['step'] == 6 ? '<span>' : '<a href="#">')?>
                <span class="number">6</span>
                <span class="desc">
                    <label><?=$tlinst["install"]["step6"]?></label>
                    <span><?=$tlinst["install"]["step6_1"]?></span>
                </span>
                <?=($_GET['step'] == 6 ? '</span>' : '</a>')?>
              </li>
            </ul>
            <!-- END STEP INDICATOR -->
          </div>
          <!-- END NAV STEP-->
        </div>

        <?php if(!isset($_GET['step'])){ ?>

          <form method="post" action="install.php?step=2">
            <input type="hidden" name="act" value="installdb"/>
            <!-- Form 1. -->

            <table class="table">
              <tbody>
              <tr>
                <td class="w-25"><?=$tlinst["install"]["form1"]?></td>
                <td class="w-25"><input type="text" class="form-control" name="dbhost" id="dbhost" value="<?=$config['dbhost']?>"></td>
                <td class="w-50"></td>
              </tr>
              <tr>
                <td><?=$tlinst["install"]["form1_1"]?></td>
                <td><input type="text" class="form-control" name="dbuser" id="dbuser" value="<?=$config['dbuser']?>"></td>
                <td></td>
              </tr>
              <tr>
                <td><?=$tlinst["install"]["form1_2"]?></td>
                <td><input type="text" class="form-control" name="dbpass" id="dbpass" value="<?=$config['dbpass']?>"></td>
                <td></td>
              </tr>
              <tr>
                <td><?=$tlinst["install"]["form1_3"]?></td>
                <td><input type="text" class="form-control" name="dbname" id="dbname" value="<?=$config['dbname']?>"></td>
                <td></td>
              </tr>
              <tr>
                <td><?=$tlinst["install"]["form1_4"]?></td>
                <td><input type="text" class="form-control" name="dbprefix" id="dbprefix" value="<?=$config['dbprefix']?>"></td>
                <td><i><?=$tlinst["install"]["form1_41"]?></i></td>
              </tr>
              <tr>
                <td><?=$tlinst["install"]["form1_5"]?></td>
                <td><input type="text" class="form-control" name="fullsitedomain" id="fullsitedomain" value="<?=$config['fullsitedomain']?>"></td>
                <td><i><?=$tlinst["install"]["form1_51"]?></i></td>
              </tr>
              <tr>
                <td><?=$tlinst["install"]["form1_6"]?></td>
                <td><input type="text" class="form-control" name="filefolder" id="filefolder" value="<?=$config['filefolder']?>"></td>
                <td><i><?=$tlinst["install"]["form1_61"]?></i></td>
              </tr>
              </tbody>
            </table>

            <div class="controls">
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn square btn-default"><?=$tlinst["install"]["next"]?>
                  <i class="fa fa-chevron-right"></i>
                </button>
              </div>
            </div>
          </form>

        <?php } else if(isset($_GET['step']) && $_GET['step'] == 2){?>

          <form method="post" action="install.php?step=3">
            <input type="hidden" name="act" value="connectiondb"/>
            <!-- Form 2. -->

            <?php
            // Test for the config.php File
            if (@file_exists('../config.php')) {
              $data_file = $tlinst["install"]["form2_21"];
            } else {
              $data_file = $tlinst["install"]["form2_22"];
            }

            // Connect to the database
            @$linkdb = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

            $result_mysqli = '';
            $result_mysqlv = '';

            if ($linkdb && DB_USER && DB_PASS) {

              if (function_exists('mysqli_connect')) {
                $result_mysqli = $tlinst["install"]["form2_41"];
              } else {
                $result_mysqli = $tlinst["install"]["form2_42"];
              }

              $mysqlv = mysqli_get_server_info($linkdb);

              if (version_compare($mysqlv, '5.2') < 0) {
                $result_mysqlv = '<strong style="color:red">You need a higher version of MySQL (min. MySQL 5.2)!</strong>';
              } else {
                $result_mysqlv = '<strong style="color:green">MySQL Version: ' . $mysqlv . '</strong>';
              }

              $conn_data = $tlinst["install"]["form2_31"];
            } else {

              $conn_data = $tlinst["install"]["form2_32"];
              @mysqli_close($linkdb);
            }

            // Database exist
            @$dlink = mysqli_select_db($linkdb, DB_NAME);

            if ($dlink) {
              $number = 9;
              $str = "Beijing";
              $data_exist = sprintf($tlinst["install"]["form2_51"],DB_NAME , DB_NAME);
            } else {
              $data_exist = sprintf($tlinst["install"]["form2_52"],DB_NAME);
              @mysqli_close($dlink);
            }

            // Test the minimum PHP version
            $php_version = PHP_VERSION;
            $php_big = '';

            if (version_compare($php_version, '5.3.0') < 0) {
              $result_php = '<strong style="color:red">You need a higher version of PHP (min. PHP 5.3)!</strong>';
            } else {

              if (version_compare($php_version, '7.1.0') > 0) $php_big = '<br /><strong style="color:red">The software has not been tested on your php version yet, but it should work.</strong>';

              // We also give feedback on whether we're running in safe mode
              $result_safe = '<strong style="color:green">PHP Version: ' . $php_version . '</strong>';
              if (@ini_get('safe_mode') || strtolower(@ini_get('safe_mode')) == 'on') {
                $result_safe .= $tlinst["install"]["form2_61"];
              } else {
                $result_safe .= $tlinst["install"]["form2_62"];
              }

              $result_safe .= $php_big;
            }

            $dirc = DIR_CMS . "/" . ENVO_FILES_DIRECTORY;
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

            @$existsfolder = ($existsc) ? $tlinst["install"]["form2_71"] : $tlinst["install"]["form2_72"];
            @$writefolder = ($writec)  ? $existsfolder . ' - ' .$tlinst["install"]["form2_73"] . ' ( ' . ENVO_FILES_DIRECTORY . ' )' : (($existsc) ?  $existsfolder . ' - ' .$tlinst["install"]["form2_74"] . ' ( ' . ENVO_FILES_DIRECTORY . ' )' : $existsfolder);

            // GD Graphics Support
            if (!extension_loaded("gd")) {

              $gd_data = $tlinst["install"]["form2_81"];
            } else {
              $gd_data = $tlinst["install"]["form2_82"];
            }
            ?>

            <div class="card mb-3">
              <div class="card-block">
                <?=$tlinst["install"]["form2"]?>
              </div>
            </div>

            <table class="table">
              <tr>
                <td><?=$tlinst["install"]["form2_1"]?></td>
                <td><?=$tlinst["install"]["form2_11"]?></td>
              </tr>
              <tr>
                <td><?=$tlinst["install"]["form2_2"]?></td>
                <td><?=$data_file?></td>
              </tr>
              <tr>
                <td><?=$tlinst["install"]["form2_3"]?></td>
                <td><?=$conn_data?></td>
              </tr>
              <tr>
                <td><?=$tlinst["install"]["form2_4"]?></td>
                <td><?=$result_mysqlv?> / <?=$result_mysqli?></td>
              </tr>
              <tr>
                <td><?=$tlinst["install"]["form2_5"]?></td>
                <td><?=$data_exist?></td>
              </tr>
              <tr>
                <td><?=$tlinst["install"]["form2_6"]?></td>
                <td><?=@$result_php?><?=$result_safe?></td>
              </tr>
              <tr>
                <td valign="top"><?=$tlinst["install"]["form2_7"]?></td>
                <td><?=$writefolder?></td>
              </tr>
              <tr>
                <td><?=$tlinst["install"]["form2_8"]?></td>
                <td><?=$gd_data?></td>
              </tr>
            </table>

            <div class="controls">
              <div class="d-flex justify-content-between">
                <a href="install.php" class="btn square btn-default float-left" role="button">
                  <i class="fa fa-chevron-left"></i><?=$tlinst["install"]["prev"]?>
                </a>
                <?php if (file_exists('../config.php') && ($linkdb) && ($dlink) && !$check_db_content) { ?>
                  <button type="submit" class="btn square btn-default float-right"><?=$tlinst["install"]["next"]?>
                    <i class="fa fa-chevron-right"></i>
                  </button>
                <?php } elseif (file_exists('../config.php') && ($linkdb) && ($dlink) && $check_db_content) { ?>
                  <a href="install.php?step=5" class="btn square btn-default float-right" role="button" name="userf">
                    <?=$tlinst["install"]["dbexist"]?><i class="fa fa-chevron-right"></i>
                  </a>
                <?php } else { ?>
                  <input type="button" class="btn square btn-warning float-right" value="<?=$tlinst["install"]["refresh"]?>" onclick="window.location.reload()"/>
                <?php } ?>
              </div>
            </div>
          </form>

          <?php
        }
        else if(isset($_GET['step']) && $_GET['step'] == 3){
          ?>

          <form method="post" action="install.php?step=4">
            <input type="hidden" name="act" value=""/>
            <!-- Form 3. -->

            <h3><?=$tlinst["install"]["form3"]?></h3>
            <p><?=$tlinst["install"]["form3_1"]?></p>
            <div class="controls mt-3">
              <div class="d-flex justify-content-between">
                <a href="install.php?step=2" class="btn square btn-default float-left" role="button">
                  <i class="fa fa-chevron-left"></i><?=$tlinst["install"]["prev"]?>
                </a>
                <a href="install.php?step=4&amp;type=blank" class="btn square btn-default float-right" role="button">
                  <?=$tlinst["install"]["install"]?><i class="fa fa-chevron-right"></i>
                </a>
              </div>
            </div>
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
              $envodb = new ENVO_mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
              $envodb->set_charset("utf8");
            }

            // Now we choose the correct installation process, are we going mad
            if (isset($_GET["type"]) && $_GET["type"] == "blank") {
              include_once('plainsql.php');
            }

            // Finally close all db connections
            $envodb->envo_close();

            ?>
            <div class="alert bg-success text-white"><?=$tlinst["install"]["form4"]?></div>

            <form id="company" method="post" action="install.php?step=4" enctype="multipart/form-data">

              <div class="controls">
                <div class="d-flex justify-content-end">
                  <button type="submit" name="useru" class="btn square btn-default"><?=$tlinst["install"]["superadmin"]?><i class="fa fa-chevron-right"></i></button>
                </div>
              </div>

            </form>

          </form>

          <?php
        }
        else if(isset($_GET['step']) && $_GET['step'] == 5){ ?>
          <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['useru'])) {

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
                $envodb = new ENVO_mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
                $envodb->set_charset("utf8");
              }

// The new password encrypt with hash_hmac
              $passcrypt = hash_hmac('sha256', $_POST['pass'], DB_PASS_HASH);

              $envodb->query('INSERT INTO ' . DB_PREFIX . 'user SET
                              
                              usergroupid = 3,
                              username = "' . smartsql($_POST['username']) . '",
                              password = "' . $passcrypt . '",
                              email = "' . smartsql($_POST['email']) . '",
                              name = "' . smartsql($_POST['name']) . '",
                              time = NOW(),
                              access = 1');

              $envodb->query('UPDATE ' . DB_PREFIX . 'setting SET value = "' . smartsql($_POST['email']) . '" WHERE varname = "email"');

              $envodb->query('UPDATE ' . DB_PREFIX . 'setting SET value = "' . smartsql($_POST['onumber']) . '" WHERE varname = "o_number"');

              // @$envodb->query('ALTER DATABASE ' . DB_NAME . ' DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci');

              // Finally close all db connections
              $envodb->envo_close();

              // Confirm
              include_once '../class/PHPMailerAutoload.php';

              $email_body = 'URL: ' . FULL_SITE_DOMAIN . '<br />Email: ' . $_POST['email'] . '<br />License: ' . $_POST['onumber'];

              // Send the email to the customer
              $mail = new PHPMailer(); // defaults to using php "mail()"
              $body = str_ireplace("[\]", "", $email_body);
              $mail->SetFrom($_POST['email']);
              $mail->AddReplyTo($_POST['email']);
              $mail->AddAddress('bluesatkv@gmail.com');
              $mail->Subject = 'Info about installation - Bluesat ENVO';
              $mail->AltBody = 'HTML Format - ' . strip_tags($email_body);
              $mail->MsgHTML($body);
              $mail->Send();

              echo '<div class="alert bg-success text-white">' . $tlinst["install"]["form5_6"] . '</div><div class="d-flex justify-content-end"><a href="install.php?step=6" class="btn square btn-default" role="button" name="userf">' . $tlinst["install"]["folder"] . '<i class="fa fa-chevron-right"></i></a></div>';

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

              <h3><?=$tlinst["install"]["form5"]?></h3>
              <table class="table">
                <tr>
                  <td><?=$tlinst["install"]["form5_1"]?> <span class="complete">*</span></td>
                  <td><input type="text" value="" class="form-control" name="onumber" placeholder="<?=$tlinst["install"]["form5_11"]?>"/></td>
                </tr>
                <tr>
                  <td><?=$tlinst["install"]["form5_2"]?> <span class="complete">*</span></td>
                  <td><input type="text" value="" class="form-control" name="name" title="Name"/></td>
                </tr>
                <tr>
                  <td><?=$tlinst["install"]["form5_3"]?> <span class="complete">*</span></td>
                  <td><input type="text" value="" class="form-control" name="username" title="Username"/></td>
                </tr>
                <tr>
                  <td><?=$tlinst["install"]["form5_4"]?> <span class="complete">*</span></td>
                  <td><input type="text" value="" class="form-control" name="pass" title="Password"/></td>
                </tr>
                <tr>
                  <td><?=$tlinst["install"]["form5_5"]?> <span class="complete">*</span></td>
                  <td><input type="text" value="" class="form-control" name="email" title="Email"/></td>
                </tr>
              </table>

              <div class="controls">
                <div class="d-flex justify-content-end">
                  <button type="submit" name="user" class="btn square btn-default"><?=$tlinst["install"]["finish"]?></button>
                </div>
              </div>

            </form>
          <?php } ?>
        <?php } else if(isset($_GET['step']) && $_GET['step'] == 6){ ?>
          <form id="company" method="post" action="install.php?step=6" enctype="multipart/form-data">
            <input type="hidden" name="act" value="removefolder"/>
            <!-- Form 6. -->
            <div class="col-sm-12">
              <h3><?=$tlinst["install"]["form6"]?></h3>
            </div>
            <div class="col-sm-12 mt-4">
              <div class="row align-items-center">
                <div class="col-sm-4">
                  <?=$tlinst["install"]["form6_1"]?>
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="newfolder" id="newfolder" value="install_back">
                </div>
              </div>
            </div>
            <div class="controls mt-4">
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn square btn-default"><?=$tlinst["install"]["folder1"]?><i class="fa fa-chevron-right"></i></button>
              </div>
            </div>

          </form>
        <?php }?>

      </div>
    </div>
  </div>

  <div id="push"></div>
</div>

<div id="footer">
  <div class="container">
    <div class="row">
      <p class="muted credit">Copyright 2016 - <?=date('Y')?> by <a href="https://www.bluesat.cz" target="_blank">BLUESAT</a></p>
    </div>
  </div>
</div>

</body>
</html>