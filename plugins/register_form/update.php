<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/update.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Check if the file is accessed only from a admin if not stop the script from running
$php_errormsg  = 'To edit the file, you must be logged in as an ADMINISTRATOR !!! You cannot access this file directly.';
$php_errormsg1 = 'Only ADMINISTRATOR privileges allow you to edit the file !!! You cannot access this file directly.';
if (!ENVO_USERID) die($php_errormsg);

if (!$envouser -> envoAdminAccess($envouser -> getVar("usergroupid"))) die($php_errormsg1);

// Set successfully to zero
$succesfully = 0;

// PLUGIN CONFIG
// New plugin version after update
$pluginversion = '1.2';
$nameofplugin  = 'Register_form';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update - Register Form Plugin</title>
	<meta charset="utf-8">
	<!-- BEGIN Vendor CSS-->
	<?php
	// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
	echo $Html -> addStylesheet('/assets/plugins/bootstrap/bootstrapv4/4.0.0/css/bootstrap.min.css');
	echo $Html -> addStylesheet('/assets/plugins/font-awesome/4.7.0/css/font-awesome.css');
	?>
	<!-- BEGIN Pages CSS-->
	<?php
	// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
	echo $Html -> addStylesheet('/admin/pages/css/pages-icons.css?=v3.0.0');
	echo $Html -> addStylesheet('/admin/pages/css/pages.min.css?=v3.0.2', '', array ('class' => 'main-stylesheet'));
	?>
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
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12 m-t-20">
			<div class="jumbotron bg-master pt-1 pl-3 pb-1 pr-3">
				<h3 class="semi-bold text-white">Update - Register Form Plugin</h3>
			</div>
			<hr>
			<div class="m-b-30">
				<h4 class="semi-bold">Register Form Plugin - info about update to version <?= $pluginversion ?></h4>
				<p>Nunc pharetra aliquet felis, sit amet consequat sapien maximus id. Suspendisse eu dolor interdum ex fringilla maximus vitae at lorem. Nam sodales sed metus et iaculis. Aliquam in dolor in sapien facilisis tempus vitae et ante. Aliquam sem velit, pharetra id erat vel, efficitur rutrum dolor. Sed ut lectus dignissim, malesuada nulla ut, accumsan mauris. Vivamus maximus tristique dui. </p>
			</div>
			<hr>

			<!-- Check if the plugin is already installed -->
			<?php $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "' . $nameofplugin . '"');
			if ($envodb -> affected_rows == 0) {
				$succesfully = 1; ?>

				<div class="alert bg-danger text-white">Plugin is not installed!!!</div>

				<!-- Plugin is not installed let's display the installation script -->
			<?php } else { ?>

				<?php $result = $envodb -> query('SELECT id, pluginversion FROM ' . DB_PREFIX . 'plugins WHERE name = "' . $nameofplugin . '"');
				$row          = $result -> fetch_assoc();
				if ($row['pluginversion'] == $pluginversion) {
					$succesfully = 1;
					$envodb -> query('UPDATE ' . DB_PREFIX . 'plugins SET time = NOW() WHERE name = "' . $nameofplugin . '"'); ?>

					<div class="alert bg-info text-white">Plugin is already up to date!</div>

					<!-- Plugin is not installed let's display the installation script -->
				<?php } else { ?>

					<!-- The installation button is hit -->
					<?php if (isset($_POST['install'])) {

						// --------------------------------------------
						//  START PLUGIN UPDATE PROCESS
						// --------------------------------------------


						// --------------------------------------------
						//  END PLUGIN UPDATE PROCESS
						// --------------------------------------------

						$envodb -> query('UPDATE ' . DB_PREFIX . 'plugins SET pluginversion = "' . $pluginversion . '", time = NOW() WHERE name = "' . $nameofplugin . '"');

						$succesfully = 1;

						?>

						<div class="alert bg-success text-white">Plugin updated successfully</div>
						<button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>

					<?php }
				} ?>

				<?php if (!$succesfully) { ?>
					<form name="company" method="post" action="update.php" enctype="multipart/form-data">
						<button type="submit" name="install" class="btn btn-complete btn-block">Update Plugin</button>
					</form>
				<?php }
			} ?>

		</div>
	</div>

</div><!-- #container -->
</body>
</html>