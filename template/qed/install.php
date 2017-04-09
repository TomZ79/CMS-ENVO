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
	<link href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
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
					$adminlang = 'if (file_exists(APP_PATH.\'template/qed/lang/\'.$site_language.\'.ini\')) {
    $tlqed = parse_ini_file(APP_PATH.\'template/qed/lang/\'.$site_language.\'.ini\', true);
} else {
    $tlqed = parse_ini_file(APP_PATH.\'template/qed/lang/en.ini\', true);
}';

					$jakdb->query ('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_lang", "QED Template Site Language", "' . $sitelang . '", "tpl_qed", 1, 4, "0", NOW()),
(NULL, "php_admin_lang", "QED Template Admin Language", "' . $adminlang . '", "tpl_qed", 1, 4, "0", NOW())');

					// Insert tables into settings
					/* Table of varname
					 * ------------------
					 * sidebar_location_tpl => info about sidebar location
					 * cms_tpl => basic info about installed template
					 * styleswitcher_tpl => show or hide styleswitcher in site
					 */
					$jakdb->query ('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("sidebar_location_tpl", "qed", "left", "left", "input", "free", "tpl_qed"),
("styleswitcher_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed"),
("cms_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed"),


("color_qed_tpl", "qed", "blue", "blue", "select", "free", "tpl_qed"),
("header_qed_tpl", "qed", "", "", "select", "free", "tpl_qed"),
("boxed_qed_tpl", "qed", "0", "0", "yesno", "boolean", "tpl_qed"),
("fsocialstyle_qed_tpl", "qed", "circle", "circle", "select", "free", "tpl_qed"),
("fsocialsize_qed_tpl", "qed", "medium", "medium", "select", "free", "tpl_qed"),

("sitemapShow_qed_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed"),
("loginShow_qed_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed"),
("facebookShow_qed_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed"),
("facebookLinks_qed_tpl", "qed", "https://www.facebook.com/", "https://www.facebook.com/", "input", "free", "tpl_qed"),
("twitterShow_qed_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed"),
("twitterLinks_qed_tpl", "qed", "https://twitter.com/", "https://twitter.com/", "input", "free", "tpl_qed"),
("googleShow_qed_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed"),
("googleLinks_qed_tpl", "qed", "https://plus.google.com/", "https://plus.google.com/", "input", "free", "tpl_qed"),
("instagramShow_qed_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed"),
("instagramLinks_qed_tpl", "qed", "https://www.instagram.com/", "https://www.instagram.com/", "input", "free", "tpl_qed"),
("phoneShow_qed_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed"),
("phoneLinks_qed_tpl", "qed", "+420 000 000 000", "+420 000 000 000", "input", "free", "tpl_qed"),
("emailShow_qed_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed"),
("emailLinks_qed_tpl", "qed", "info@qed.com", "info@qed.com", "input", "free", "tpl_qed"),
("logo1_qed_tpl", "qed", "/template/qed/img/main-logo.png", "/template/qed/img/main-logo.png", "input", "free", "tpl_qed"),

("activeroyalslider_qed_tpl", "qed", "0", "0", "yesno", "boolean", "tpl_qed"),
("arrowsNav_qed_tpl", "qed", "true", "true", "yesno", "boolean", "tpl_qed"),
("arrowsNavAutoHide_qed_tpl", "qed", "false", "false", "yesno", "boolean", "tpl_qed"),
("arrowsNavHideOnTouch_qed_tpl", "qed", "false", "false", "yesno", "boolean", "tpl_qed"),
("controlNavigation_qed_tpl", "qed", "bullets", "bullets", "select", "free", "tpl_qed"),

("enabledAU_qed_tpl", "qed", "true", "true", "yesno", "boolean", "tpl_qed"),
("pauseOnHoverAU_qed_tpl", "qed", "true", "true", "yesno", "boolean", "tpl_qed"),
("delayAU_qed_tpl", "qed", "6000", "6000", "input", "free", "tpl_qed"),

("autoScaleSlider_qed_tpl", "qed", "true", "true", "yesno", "boolean", "tpl_qed"),
("autoScaleSliderWidth_qed_tpl", "qed", "960", "960", "input", "free", "tpl_qed"),
("autoScaleSliderHeight_qed_tpl", "qed", "350", "350", "input", "free", "tpl_qed"),
("imageAlignCenter_qed_tpl", "qed", "true", "true", "yesno", "boolean", "tpl_qed"),
("imgWidth_qed_tpl", "qed", "null", "null", "input", "free", "tpl_qed"),
("imgHeight_qed_tpl", "qed", "null", "null", "input", "free", "tpl_qed"),
("numImagesToPreload_qed_tpl", "qed", "4", "4", "input", "free", "tpl_qed"),

("fadeinLoadedSlide_qed_tpl", "qed", "true", "true", "yesno", "boolean", "tpl_qed"),
("transitionType_qed_tpl", "qed", "fade", "fade", "select", "free", "tpl_qed"),
("transitionSpeed_qed_tpl", "qed", "3000", "3000", "input", "free", "tpl_qed"),

("onefooterblock_qed_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed"),
("onefooterblocktext_qed_tpl", "qed", NULL, NULL, "textarea", "free", "tpl_qed"),
("footer1text_qed_tpl", "qed", NULL, NULL, "textarea", "free", "tpl_qed"),
("footer2text_qed_tpl", "qed", NULL, NULL, "textarea", "free", "tpl_qed"),

("companyName_qed_tpl", "qed", "BLUESAT.cz", "BLUESAT.cz", "input", "free", "tpl_qed"),
("companyPhone_qed_tpl", "qed", "+420 000 000 000", "+420 000 000 000", "input", "free", "tpl_qed"),
("companySite_qed_tpl", "qed", "http://www.qed.com", "http://www.qed.com", "input", "free", "tpl_qed"),
("companyEmail_qed_tpl", "qed", "info@qed.com", "info@qed.com", "input", "free", "tpl_qed"),

("socialfooterText_qed_tpl", "qed", "Follow us, we are social", "Follow us, we are social", "input", "free", "tpl_qed"),
("facebookfooterShow_qed_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed"),
("facebookfooterLinks_qed_tpl", "qed", "https://www.facebook.com/", "https://www.facebook.com/", "input", "free", "tpl_qed"),
("twitterfooterShow_qed_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed"),
("twitterfooterLinks_qed_tpl", "qed", "https://twitter.com/", "https://twitter.com/", "input", "free", "tpl_qed"),
("googlefooterShow_qed_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed"),
("googlefooterLinks_qed_tpl", "qed", "https://plus.google.com/", "https://plus.google.com/", "input", "free", "tpl_qed"),
("instagramfooterShow_qed_tpl", "qed", "1", "1", "yesno", "boolean", "tpl_qed"),
("instagramfooterLinks_qed_tpl", "qed", "https://www.instagram.com/", "https://www.instagram.com/", "input", "free", "tpl_qed")

');

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