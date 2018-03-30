<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/uninstall.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Check if the file is accessed only from a admin if not stop the script from running
$php_errormsg  = 'To edit the file, you must be logged in as an ADMINISTRATOR !!! You cannot access this file directly.';
$php_errormsg1 = 'Only ADMINISTRATOR privileges allow you to edit the file !!! You cannot access this file directly.';
if (!ENVO_USERID) die($php_errormsg);

if (!$envouser->envoAdminAccess($envouser->getVar("usergroupid"))) die($php_errormsg1);

// Set successfully to zero
$succesfully = 0;

// EN: Import the language file
// CZ: Import jazykových souborů
if ($setting["lang"] != $site_language && file_exists(APP_PATH . 'admin/lang/' . $site_language . '.ini')) {
  $tl = parse_ini_file(APP_PATH . 'admin/lang/' . $site_language . '.ini', TRUE);
} else {
  $tl            = parse_ini_file(APP_PATH . 'admin/lang/' . $setting["lang"] . '.ini', TRUE);
  $site_language = $setting["lang"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?=$tl["uninstalltemplate"]["unitpl"] . ' - PORTO Template'?></title>
  <meta charset="utf-8">
  <!-- BEGIN Vendor CSS-->
  <link href="/assets/plugins/bootstrap/bootstrapv4/css/bootstrap.min.css?=v4.0.0" rel="stylesheet" type="text/css"/>
  <link href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
  <!-- BEGIN Pages CSS-->
  <link href="/admin/pages/css/pages-icons.css?=v3.0.0" rel="stylesheet" type="text/css">
  <link class="main-stylesheet" href="/admin/pages/css/pages.min.css?=v3.0.1" rel="stylesheet" type="text/css"/>
  <!-- BEGIN CUSTOM MODIFICATION -->
  <style type="text/css">
    /* Fix 'jumping scrollbar' issue */
    @media screen and (min-width: 960px) {
      html {
        margin-left: calc(100vw - 100%);
        margin-right: 0;
      }
    }

    /* Main body */
    body {
      background: transparent;
    }
  </style>
  <!-- BEGIN VENDOR JS -->
  <?php
  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  echo $Html->addScript('/assets/plugins/jquery/jquery-1.11.1.min.js');
  echo $Html->addScript('/admin/assets/plugins/modernizr.custom.js?=v2.8.3');
  echo $Html->addScript('/assets/plugins/popover/1.14.1/popper.min.js');
  echo $Html->addScript('/assets/plugins/bootstrap/bootstrapv4/js/bootstrap.min.js?=v4.0.0');
  ?>
  <!-- BEGIN CORE TEMPLATE JS -->
  <?php
  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  echo $Html->addScript('/admin/pages/js/pages.min.js');
  ?>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-sm-12 m-t-20">
      <div class="jumbotron bg-master pt-1 pl-3 pb-1 pr-3">
        <h3 class="semi-bold text-white"><?=$tl["uninstalltemplate"]["unitpl"] . ' - PORTO Template'?></h3>
      </div>
      <hr>

      <!-- UNINSTALLATION -->
      <?php if (isset($_POST['uninstall'])) {
        // Validate
        session_start();
        if (isset($_POST["captcha"]) && $_POST["captcha"] != "" && $_SESSION["code"] == $_POST["captcha"]) {
          // Delete all settings
          $envodb->query('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "tpl_porto"');

          // Delete php code for lang site from hooks
          $envodb->query('DELETE FROM ' . DB_PREFIX . 'pluginhooks WHERE product = "tpl_porto"');

          $succesfully = 1;

          ?>

          <!-- Alert Template uninstalled - succes -->
          <div class="alert alert-success fade show">
            <?=$tl["uninstalltemplate"]["unitpl1"]?>
          </div>
          <!-- Button Close Modal -->
          <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">
            <?=$tl["uninstalltemplate"]["unitpl5"]?>
          </button>

        <?php } else { ?>
          <!-- Wrong code for uninstall -->
          <div>
            <h5 class="text-danger bold">
              <?=$tl["uninstalltemplate"]["unitpl2"]?>
            </h5>
          </div>
        <?php }
      }
      if (!$succesfully) { ?>
        <form name="company" action="uninstall.php" method="post" enctype="multipart/form-data">
          <div class="form-group form-inline">
            <!--  Label for enter code -->
            <label for="text">
              <?=$tl["uninstalltemplate"]["unitpl3"]?>
            </label>
            <input type="text" name="captcha" class="form-control ml-2" id="text">
            <img src="../../assets/plugins/captcha/simple/captcha.php" class="m-l-10"/>
          </div>
          <!-- Uninstall button -->
          <button type="submit" name="uninstall" class="btn btn-complete btn-block">
            <?=$tl["uninstalltemplate"]["unitpl4"]?>
          </button>
        </form>
      <?php } ?>

    </div>
  </div>

</div>
</body>
</html>