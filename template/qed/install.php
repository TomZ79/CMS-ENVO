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
	<title>Installation - QED / Template</title>
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
	<script src="/admin/assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/bootstrapv3/js/bootstrap.min.js?=v3.3.4" type="text/javascript"></script>
	<!-- BEGIN CORE TEMPLATE JS -->
	<script src="/admin/pages/js/pages.js?=v2.2.0"></script>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12 m-t-20">
			<div class="jumbotron bg-master">
				<h3 class="semi-bold text-white">Installation - QED / Template</h3>
			</div>
			<hr>

			<!-- Check if the plugin is already installed -->
			<?php

			$jakdb->query ('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "sitestyle_widget_qed"');
			if ($jakdb->affected_rows > 0) { ?>

				<div class="alert alert-info fade in">
					Template is already installed.
				</div>

				<!-- Plugin is not installed let's display the installation script -->
			<?php } else {
				if (isset($_POST['install'])) {

					// Delete old entries
					$jakdb->query ('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "qed"');

					// Insert php code for lang site to hooks
					$sitelang = 'if (file_exists(APP_PATH.\'template/qed/lang/\'.$site_language.\'.ini\')) {
    $tlqed = parse_ini_file(APP_PATH.\'template/qed/lang/\'.$site_language.\'.ini\', true);
} else {
    $tlqed = parse_ini_file(APP_PATH.\'template/qed/lang/en.ini\', true);
}';
					$jakdb->query ('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_lang", "QED Template Site Language", "' . $sitelang . '", "tpl_qed", 1, 4, "0", NOW())');

					// Insert tables into settings
					/* Table of varname
					 * ------------------
					 * sidebar_location_tpl => info about sidebar location
					 * cms_tpl => basic info about installed template
					 * styleswitcher_tpl => show or hide styleswitcher in site
					 */
					$jakdb->query ('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("sidebar_location_tpl", "jakweb", "left", "left", "input", "free", "tpl_qed"),
("styleswitcher_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed"),
("cms_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed")');

					$succesfully = 1;

					?>
					<div class="alert alert-success fade in">
						Template successfully installed!
					</div>
					<button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>
				<?php }
				if (!$succesfully) { ?>
					<form name="company" method="post" action="install.php" enctype="multipart/form-data">
						<button type="submit" name="install" class="btn btn-primary btn-block">Install Template</button>
					</form>
				<?php }
			} ?>

		</div>
	</div>

</div>
</body>
</html>