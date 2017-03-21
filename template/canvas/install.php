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
	<title>Installation - CANVAS / Template</title>
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
				<h3 class="semi-bold text-white">Installation - CANVAS / Template</h3>
			</div>
			<hr>

			<!-- Check if the plugin is already installed -->
			<?php

			$jakdb->query ('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "sitestyle_widget_canvas"');
			if ($jakdb->affected_rows > 0) { ?>

				<div class="alert alert-info fade in">
					Template is already installed.
				</div>

				<!-- Plugin is not installed let's display the installation script -->
			<?php } else {
				if (isset($_POST['install'])) {

					// Delete old entries
					$jakdb->query ('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "canvas"');

					// Insert php code for lang site to hooks
					$sitelang = 'if (file_exists(APP_PATH.\'template/canvas/lang/\'.$site_language.\'.ini\')) {
    $tlcanvas = parse_ini_file(APP_PATH.\'template/canvas/lang/\'.$site_language.\'.ini\', true);
} else {
    $tlcanvas = parse_ini_file(APP_PATH.\'template/canvas/lang/en.ini\', true);
}';
					$jakdb->query ('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_lang", "Canvas Template Site Language", "' . $sitelang . '", "tpl_canvas", 1, 4, "0", NOW())');

					// Insert tables into settings
					/* Table of varname
					 * ------------------
					 * sidebar_location_tpl => info about sidebar location
					 * cms_tpl => basic info about installed template
					 * styleswitcher_tpl => show or hide styleswitcher in site
					 */
					$jakdb->query ('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("homeLinks_canvas_tpl", "canvas", "#", "#", "input", "free", "tpl_canvas"),
("contactLinks_canvas_tpl", "canvas", "#", "#", "input", "free", "tpl_canvas"),
("loginLinks_canvas_tpl", "canvas", "#", "#", "input", "free", "tpl_canvas"),
("registerLinks_canvas_tpl", "canvas", "#", "#", "input", "free", "tpl_canvas"),

("facebookShow_canvas_tpl", "canvas", "1", "1", "yesno", "boolean", "tpl_canvas"),
("facebookLinks_canvas_tpl", "canvas", "https://www.facebook.com/", "https://www.facebook.com/", "input", "free", "tpl_canvas"),

("twitterShow_canvas_tpl", "canvas", "1", "1", "yesno", "boolean", "tpl_canvas"),
("twitterLinks_canvas_tpl", "canvas", "https://twitter.com/", "https://twitter.com/", "input", "free", "tpl_canvas"),

("googleShow_canvas_tpl", "canvas", "1", "1", "yesno", "boolean", "tpl_canvas"),
("googleLinks_canvas_tpl", "canvas", "https://plus.google.com/", "https://plus.google.com/", "input", "free", "tpl_canvas"),

("instagramShow_canvas_tpl", "canvas", "1", "1", "yesno", "boolean", "tpl_canvas"),
("instagramLinks_canvas_tpl", "canvas", "https://www.instagram.com/", "https://www.instagram.com/", "input", "free", "tpl_canvas"),

("phoneShow_canvas_tpl", "canvas", "1", "1", "yesno", "boolean", "tpl_canvas"),
("phoneLinks_canvas_tpl", "canvas", "+420 000 000 000", "+420 000 000 000", "input", "free", "tpl_canvas"),

("emailShow_canvas_tpl", "canvas", "1", "1", "yesno", "boolean", "tpl_canvas"),
("emailLinks_canvas_tpl", "canvas", "info@canvas.com", "info@canvas.com", "input", "free", "tpl_canvas"),

("logo1_canvas_tpl", "canvas", "/template/canvas/img/logo.png", "/template/canvas/img/logo.png", "input", "free", "tpl_canvas"),
("logo2_canvas_tpl", "canvas", "/template/canvas/img/logo@2x.png", "/template/canvas/img/logo@2x.png", "input", "free", "tpl_canvas"),
("phoneLinks1_canvas_tpl", "canvas", "+420 000 000 000", "+420 000 000 000", "input", "free", "tpl_canvas"),
("emailLinks1_canvas_tpl", "canvas", "info@canvas.com", "info@canvas.com", "input", "free", "tpl_canvas"),

("section_canvas_tpl", "canvas", NULL, NULL, "textarea", "free", "tpl_canvas"),


("sidebar_location_tpl", "jakweb", "left", "left", "input", "free", "tpl_canvas"),
("styleswitcher_tpl", "canvas", "1", "1", "yesno", "boolean", "tpl_canvas"),
("cms_tpl", "canvas", "1", "1", "yesno", "boolean", "tpl_canvas")');

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