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
	<title>Installation - JAKWEB / Template</title>
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
				<h3 class="semi-bold text-white">Installation - JAKWEB / Template</h3>
			</div>
			<hr>

			<!-- Check if the plugin is already installed -->
			<?php

			$jakdb->query ('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "sitestyle_widget_jakweb"');
			if ($jakdb->affected_rows > 0) { ?>

				<div class="alert alert-info fade in">
					Template is already installed.
				</div>

				<!-- Plugin is not installed let's display the installation script -->
			<?php } else {
				if (isset($_POST['install'])) {

					// Delete old entries
					$jakdb->query ('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "jakweb"');

					// Insert tables into settings
					$jakdb->query ('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("navbarstyle_jakweb_tpl", "jakweb", 1, 0, "yesno", "boolean", "tpl_jakweb"),
("navbarcolor_jakweb_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),
("navbarlinkcolor_jakweb_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),
("navbarcolorlinkbg_jakweb_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),
("navbarcolorsubmenu_jakweb_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),
("logo_jakweb_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),

("style_jakweb_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),
("boxpattern_jakweb_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),
("boxbg_jakweb_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),
("color_jakweb_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),
("sidebar_location_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),
("font_jakweb_tpl", "jakweb", "Arial, Helvetica, sans-serif", "Arial, Helvetica, sans-serif", "input", "free", "tpl_jakweb"),
("fontg_jakweb_tpl", "jakweb", "NonGoogle", "NonGoogle", "input", "free", "tpl_jakweb"),

("theme_jakweb_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),
("pattern_jakweb_tpl", "jakweb", "pattern", "pattern", "input", "free", "tpl_jakweb"),
("mainbg_jakweb_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),

("bcontent1_jakweb_tpl", "jakweb", NULL, NULL, "textarea", "free", "tpl_jakweb"),
("bcontent2_jakweb_tpl", "jakweb", NULL, NULL, "textarea", "free", "tpl_jakweb"),
("bcontent3_jakweb_tpl", "jakweb", NULL, NULL, "textarea", "free", "tpl_jakweb"),
("sectionbg_jakweb_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),
("sectiontc_jakweb_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),
("sectionshow_jakweb_tpl", "jakweb", 0, 0, "yesno", "boolean", "tpl_jakweb"),

("footer_jakweb_tpl", "jakweb", "big", "big", "input", "free", "tpl_jakweb"),
("fcont_jakweb_tpl", "jakweb", "<h3>Contacts</h3>
<p class=\"contact-us-details\">
	<b>Address:</b> your Address<br/>
	<b>Phone:</b> your Phone<br/>
	<b>Email:</b> your Email
</p>", NULL, "input", "free", "tpl_jakweb"),
("fcont2_jakweb_tpl", "jakweb", "<h3>Stay Connected</h3><a class=\"btn btn-default\" href=\"http://www.spotillo.com\"><i class=\"fa fa-map-marker\"></i></a>
<a class=\"btn btn-default\" href=\"https://twitter.com/jakweb\"><i class=\"fa fa-twitter\"></i></a>
<a class=\"btn btn-default\" href=\"https://www.facebook.com/Jakweb\"><i class=\"fa fa-facebook\"></i></a>", NULL, "input", "free", "tpl_jakweb"),
("fcont3_jakweb_tpl", "jakweb", "<h3>Navigation</h3>", NULL, "input", "free", "tpl_jakweb"),
("footerc_jakweb_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),
("footerct_jakweb_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),
("footercte_jakweb_tpl", "jakweb", NULL, NULL, "input", "free", "tpl_jakweb"),

("styleswitcher_tpl", "jakweb", "1", "1", "yesno", "boolean", "tpl_jakweb"),
("cms_tpl", "jakweb", "1", "1", "yesno", "boolean", "tpl_jakweb"),
("sitestyle_widget_jakweb", "jakweb", 1, 1, "yesno", "boolean", "tpl_jakweb")');

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