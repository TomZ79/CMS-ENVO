<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/install.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Check if the file is accessed only from a admin if not stop the script from running
$php_errormsg  = 'To edit the file, you must be logged in as an ADMINISTRATOR !!! You cannot access this file directly.';
$php_errormsg1 = 'Only ADMINISTRATOR privileges allow you to edit the file !!! You cannot access this file directly.';
if (!ENVO_USERID) die($php_errormsg);

if (!$envouser -> envoAdminAccess($envouser -> getVar("usergroupid"))) die($php_errormsg1);

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
	<title><?= $tl["installtemplate"]["itpl"] . ' - AUTOREX Template' ?></title>
	<meta charset="utf-8">
	<!-- BEGIN Vendor CSS-->
	<link href="/assets/plugins/bootstrap/bootstrapv4/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
	<!-- BEGIN Pages CSS-->
	<link href="/admin/pages/css/pages-icons.css?=v3.0.0" rel="stylesheet" type="text/css">
	<link class="main-stylesheet" href="/admin/pages/css/pages.min.css?=v3.0.2" rel="stylesheet" type="text/css"/>
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
	echo $Html -> addScript('/assets/plugins/jquery/jquery-1.11.1.min.js');
	echo $Html -> addScript('/admin/assets/plugins/modernizr.custom.js?=v2.8.3');
	echo $Html -> addScript('/assets/plugins/popper/1.14.1/popper.min.js');
	echo $Html -> addScript('/assets/plugins/bootstrap/bootstrapv4/4.0.0/js/bootstrap.min.js');
	?>
	<!-- BEGIN CORE TEMPLATE JS -->
	<?php
	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	echo $Html -> addScript('/admin/pages/js/pages.min.js');
	?>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-sm-12 m-t-20">
			<div class="jumbotron bg-master pt-1 pl-3 pb-1 pr-3">
				<h3 class="semi-bold text-white"><?= $tl["installtemplate"]["itpl"] . ' - AUTOREX Template' ?></h3>
			</div>
			<hr>

			<!-- Check if the plugin is already installed -->
			<?php

			$envodb -> query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "sitestyle_widget_autorex"');
			if ($envodb -> affected_rows > 0) { ?>

				<!-- Info - check if template is installed -->
				<div class="alert alert-info fade show">
					<?= $tl["installtemplate"]["itpl1"] ?>
				</div>

				<!-- Plugin is not installed let's display the installation script -->
			<?php } else {
				if (isset($_POST['install'])) {

					// Delete old entries
					$envodb -> query('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "autorex"');

					// EN: Set admin lang of plugin
					// CZ: Nastavení jazyka pro administrační rozhraní pluginu
					$adminlang = 'if (file_exists(APP_PATH.\'template/autorex/lang/\'.$site_language.\'.ini\')) {
    $tlautorex = parse_ini_file(APP_PATH.\'template/autorex/lang/\'.$site_language.\'.ini\', true);
} else {
    $tlautorex = parse_ini_file(APP_PATH.\'template/autorex/lang/en.ini\', true);
}';

					// EN: Set site lang of plugin
					// CZ: Nastavení jazyka pro webové rozhraní pluginu
					$sitelang = 'if (file_exists(APP_PATH.\'template/autorex/lang/\'.$site_language.\'.ini\')) {
    $tlautorex = parse_ini_file(APP_PATH.\'template/autorex/lang/\'.$site_language.\'.ini\', true);
} else {
    $tlautorex = parse_ini_file(APP_PATH.\'template/autorex/lang/en.ini\', true);
}';
					// EN: Set html data to insert
					// CZ: Nastavení HTML dat pro vložení
					$footerblocktextupper = '
<!--Footer Info Box-->
<div class="footer-info-box col-md-4 col-sm-6 col-xs-12">
    <div class="info-inner">
        <div class="content">
            <div class="icon">
                <span class="flaticon-pin"></span>
            </div>
            <div class="text">54B, Tailstoi Town 5238 MT, <br> La city, IA 522364</div>
        </div>
    </div>
</div>

<!--Footer Info Box-->
<div class="footer-info-box col-md-4 col-sm-6 col-xs-12">
    <div class="info-inner">
        <div class="content">
            <div class="icon">
                <span class="flaticon-email"></span>
            </div>
            <div class="text">Email us : <br> <a href="mailto:contact.contact@autorex.com">contact@autorex.com</a></div>
        </div>
    </div>
</div>

<!--Footer Info Box-->
<div class="footer-info-box col-md-4 col-sm-6 col-xs-12">
    <div class="info-inner">
        <div class="content">
            <div class="icon">
                <span class="flaticon-phone"></span>
            </div>
            <div class="text">Call us on : <br><strong>+ 1800 456 7890</strong></div>
        </div>
    </div>
</div>
';
					$footerblocktextbox1 = '
<!--Footer Column 1-->
<div class="footer-column col-lg-4">
	<div class="widget widget_about">
		<div class="logo">
			<a href="index.html"><img src="/template/autorex/assets/images/logo-two.png" alt="" /></a>
		</div>
		<div class="text">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide additional clickthroughs.</div>
	</div>
</div>
';
					$footerblocktextbox2 = '
<!--Footer Column-->
<div class="footer-column col-lg-4">
	<div class="row">
		<div class="col-md-6">
			<div class="widget widget_links">
				<h4 class="widget_title">Usefull Links</h4>
				<div class="widget-content">
					<ul class="list">
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About Us</a></li>
							<li><a href="#">Appointment</a></li>
							<li><a href="testimonial.html">Testimonials</a></li>
							<li><a href="contact.html">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div>
			<div class="col-md-6">
				<div class="widget widget_links">
					<h4 class="widget_title">Our Services</h4>
					<div class="widget-content">
						<ul class="list">
							<li><a href="#">Performance Upgrade</a></li>
							<li><a href="#">Transmission Service</a></li>
							<li><a href="#">Break Repair & Service</a></li>
							<li><a href="#">Engine Service & Repair</a></li>
							<li><a href="#">Trye & Wheels</a></li>
						</ul>
					</div>
				</div>
			</div>
	</div>                                    
</div>
';
					$footerblocktextbox3 = '
<!--Footer Column-->
<div class="footer-column col-lg-4">
	<div class="widget widget_newsletter">
		<h4 class="widget_title">Newsletter</h4>
		<div class="text">Get latest updates and offers.</div>
		<div class="newsletter-form">
			<form class="ajax-sub-form" method="post">
				<div class="form-group">
						<input type="email" placeholder="Enter your email" id="subscription-email">
						<button class="theme-btn" type="submit"><span class="fas fa-paper-plane"></span></button>
						<label class="subscription-label" for="subscription-email"></label>
				</div>
			</form>
		</div>
		<ul class="social-links">
			<li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
			<li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
			<li><a href="#"><span class="fab fa-twitter"></span></a></li>
			<li><a href="#"><span class="fab fa-google-plus-g"></span></a></li>
		</ul>
	</div>
</div>
';

					// Insert data into pluginhooks
					$envodb -> query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_lang", "AUTOREX Template Site Language", "' . $sitelang . '", "tpl_autorex", 1, 4, "0", NOW()),
(NULL, "php_admin_lang", "AUTOREX Template Admin Language", "' . $adminlang . '", "tpl_autorex", 1, 4, "0", NOW())');

					// Insert tables into settings
					/* Table of BASIC varname - NOT REMOVE
					 * ------------------
					 * sidebar_location_tpl => info about sidebar location
					 * cms_tpl => basic info about installed template
					 * styleswitcher_tpl => show or hide styleswitcher in site
					 */
					$envodb -> query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("sidebar_location_tpl", "autorex", "left", "left", "input", "free", "tpl_autorex"),
("styleswitcher_tpl", "autorex", "1", "1", "yesno", "boolean", "tpl_autorex"),
("cms_tpl", "autorex", "1", "1", "yesno", "boolean", "tpl_autorex"),

("LogoDark_autorex_tpl", "autorex", "/template/autorex/assets/images/logo.png", "/template/autorex/assets/images/logo.png", "input", "free", "tpl_autorex"),
("LogoLight_autorex_tpl", "autorex", "/template/autorex/assets/images/logo-two.png", "/template/autorex/assets/images/logo-two.png", "input", "free", "tpl_autorex"),
("ShowTextLeft_autorex_tpl", "autorex", "1", "1", "yesno", "boolean", "tpl_autorex"),
("headerblocktextleft_autorex_tpl", "autorex", "# 1 Multibrand Car Workshop of Losangle City", "# 1 Multibrand Car Workshop of Losangle City", "textarea", "free", "tpl_autorex"),
("ShowTextCenter_autorex_tpl", "autorex", "1", "1", "yesno", "boolean", "tpl_autorex"),
("headerblocktextcenter_autorex_tpl", "autorex", "Monday - Saturday 7:00AM - 6:00PM", "Monday - Saturday 7:00AM - 6:00PM", "textarea", "free", "tpl_autorex"),
("ShowTextRight_autorex_tpl", "autorex", "1", "1", "yesno", "boolean", "tpl_autorex"),
("headerblocktextright_autorex_tpl", "autorex", "Schedule Your Appontment Today : <strong>1800 456 7890</strong>", "Schedule Your Appontment Today : <strong>1800 456 7890</strong>", "textarea", "free", "tpl_autorex"),
("ShowTextBtn_autorex_tpl", "autorex", "1", "1", "yesno", "boolean", "tpl_autorex"),
("TextBtn_autorex_tpl", "autorex", "Book a Schedule", NULL, "textarea", "free", "tpl_autorex"),
("LinksBtn_autorex_tpl", "autorex", "#", NULL, "textarea", "free", "tpl_autorex"),

("ShowFooterUpper_autorex_tpl", "autorex", "1", "1", "yesno", "boolean", "tpl_autorex"),
("FooterUpper_autorex_tpl", "autorex", "' . addslashes($footerblocktextupper) . '", "' . addslashes($footerblocktextupper) . '", "textarea", "free", "tpl_autorex"),
("ShowFooterBox1_autorex_tpl", "autorex", "1", "1", "yesno", "boolean", "tpl_autorex"),
("FooterBox1_autorex_tpl", "autorex", "' . addslashes($footerblocktextbox1) . '", "' . addslashes($footerblocktextbox1) . '", "textarea", "free", "tpl_autorex"),
("ShowFooterBox2_autorex_tpl", "autorex", "1", "1", "yesno", "boolean", "tpl_autorex"),
("FooterBox2_autorex_tpl", "autorex", "' . addslashes($footerblocktextbox2) . '", "' . addslashes($footerblocktextbox2) . '", "textarea", "free", "tpl_autorex"),
("ShowFooterBox3_autorex_tpl", "autorex", "1", "1", "yesno", "boolean", "tpl_autorex"),
("FooterBox3_autorex_tpl", "autorex", "' . addslashes($footerblocktextbox3) . '", "' . addslashes($footerblocktextbox3) . '", "textarea", "free", "tpl_autorex")


');

					$succesfully = 1;

					?>
					<!-- Alert Template installed - succes -->
					<div class="alert alert-success fade show">
						<?= $tl["installtemplate"]["itpl2"] ?>
					</div>
					<!-- Button Close Modal -->
					<button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">
						<?= $tl["installtemplate"]["itpl4"] ?>
					</button>
				<?php }
				if (!$succesfully) { ?>
					<form name="company" method="post" action="install.php" enctype="multipart/form-data">
						<!-- Install button -->
						<button type="submit" name="install" class="btn btn-primary btn-block">
							<?= $tl["installtemplate"]["itpl3"] ?>
						</button>
					</form>
				<?php }
			} ?>

		</div>
	</div>

</div>
</body>
</html>