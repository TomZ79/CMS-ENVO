<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists ('../../config.php')) die('[index.php] config.php not found');
require_once '../../config.php';

// Check if the file is accessed only from a admin if not stop the script from running
if (!JAK_USERID) die('You cannot access this file directly.');

if (!$jakuser->jakAdminaccess ($jakuser->getVar ("usergroupid"))) die('You cannot access this file directly.');

// Set successfully to zero
$succesfully = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Uninstallation - CANVAS / Template</title>
	<meta charset="utf-8">
	<!-- BEGIN Vendor CSS-->
	<link href="/admin/assets/plugins/bootstrapv3/css/bootstrap.min.css?=v3.3.4" rel="stylesheet" type="text/css"/>
	<link href="/admin/assets/plugins/font-awesome/css/font-awesome.css?=4.5.0" rel="stylesheet" type="text/css"/>
	<!-- BEGIN Pages CSS-->
	<link href="/admin/pages/css/pages-icons.css?=v2.2.0" rel="stylesheet" type="text/css">
	<link class="main-stylesheet" href="/admin/pages/css/pages.css?=v2.2.0" rel="stylesheet" type="text/css"/>
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
	<script src="/assets/plugins/jquery/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/bootstrapv3/js/bootstrap.min.js?=v3.3.4" type="text/javascript"></script>
	<!-- BEGIN CORE TEMPLATE JS -->
	<script src="/admin/pages/js/pages.js?=v2.2.0"></script>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12 m-t-20">
			<div class="jumbotron bg-master">
				<h3 class="semi-bold text-white">Uninstallation - CANVAS / Template</h3>
			</div>
			<hr>

			<!-- UNINSTALLATION -->
			<?php if (isset($_POST['uninstall'])) {
				// Validate
				session_start ();
				if (isset($_POST["captcha"]) && $_POST["captcha"] != "" && $_SESSION["code"] == $_POST["captcha"]) {

				// Delete all settings
				$jakdb->query ('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "tpl_canvas"');

				// Delete php code for lang site from hooks
				$jakdb->query ('DELETE FROM ' . DB_PREFIX . 'pluginhooks WHERE product = "tpl_canvas"');

				$succesfully = 1;

				?>

				<div class="alert alert-success fade in">
					Template successfully uninstalled!
				</div>
				<button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>

				<?php } else { ?>
					<div>
						<h5 class="text-danger bold">Wrong Code Entered - Please, enter right number !</h5>
					</div>
				<?php } }
			if (!$succesfully) { ?>
				<form name="company" action="uninstall.php" method="post" enctype="multipart/form-data">
					<div class="form-group form-inline">
						<label for="text">Please read info about uninstallation and enter text: </label>
						<input type="text" name="captcha" class="form-control" id="text">
						<img src="../../assets/plugins/captcha/simple/captcha.php" class="m-l-10"/>
					</div>
					<button type="submit" name="uninstall" class="btn btn-complete btn-block">Uninstall Template</button>
				</form>
			<?php } ?>

		</div>
	</div>

</div>
</body>
</html>