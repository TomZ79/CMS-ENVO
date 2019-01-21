<?php

// EN: Include the config file of template ...
// CZ: Vložení konfiguračního souboru šablony ...
if (!file_exists(APP_PATH . 'template/' . ENVO_TEMPLATE . '/config.php')) die('[' . __DIR__ . '/index.php] Template Porto - config.php not found');
require_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/config.php';

?>

<!DOCTYPE html><!--[if lt IE 7 ]>
<?= '<html class="ie ie6" lang="<?=$site_language?>"> <![endif]-->' ?>
<!--[if IE 7 ]>
<?= '<html class="ie ie7" lang="<?=$site_language?>"> <![endif]-->' ?>
<!--[if IE 8 ]>
<?= '<html class="ie ie8" lang="<?=$site_language?>"> <![endif]-->' ?>
<!--[if (gte IE 9)|!(IE)]><!-->
<?= '<html lang="' . $site_language . '">' ?>
<!--<![endif]-->
<head>

	<meta charset="utf-8">
	<!-- Document Title
	============================================= -->
	<title>
		<?php
		echo $setting["title"];
		if ($setting["title"]) {
			echo " &raquo; ";
		}
		echo $PAGE_TITLE;
		?>
	</title>

	<meta name="keywords" content="<?= trim($PAGE_KEYWORDS) ?>">
	<meta name="description" content="<?= trim($PAGE_DESCRIPTION) ?>">
	<meta name="author" content="<?= $setting["metaauthor"] ?>">

	<!-- Share Social Network
	============================================= -->
	<!-- Facebook - Open Graph data -->
	<meta property="og:title" content="<?= $PAGE_TITLE ?>"/>
	<meta property="og:type" content="article"/>
	<meta property="og:url" content="<?= (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>"/>
	<meta property="og:image" content="<?= ($FB_IMAGE ? $FB_IMAGE : ($SHOWIMG ? BASE_URL . ltrim($SHOWIMG, '/') : '')) ?>"/>
	<meta property="og:image:width" content="<?= $FB_IMAGE_W ?>"/>
	<meta property="og:image:height" content="<?= $FB_IMAGE_H ?>"/>
	<meta property="og:description" content="<?= trim($PAGE_DESCRIPTION) ?>"/>

	<!-- Twitter Card data -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@publisher_handle">
	<meta name="twitter:title" content="<?= $PAGE_TITLE ?>">
	<meta name="twitter:description" content="<?= trim($PAGE_DESCRIPTION) ?>">
	<meta name="twitter:creator" content="@author_handle">
	<!-- Twitter Summary card images must be at least 120x120px -->
	<meta name="twitter:image" content="https://www.example.com/image.jpg">

	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="">
	<meta itemprop="description" content="<?= trim($PAGE_DESCRIPTION) ?>">
	<meta itemprop="image" content="">

	<?php if ($page == '404') { ?>
		<meta name="robots" content="noindex, follow">
	<?php } else { ?>
		<meta name="robots" content="<?= $jk_robots ?>">
	<?php }
	if ($page == "success" or $page == "logout") { ?>
		<meta http-equiv="refresh" content="1;URL=<?= $_SERVER['HTTP_REFERER'] ?>">
	<?php } ?>
	<link rel="canonical" href="<?= (ENVO_USE_APACHE ? substr(BASE_URL, 0, -1) : BASE_URL) . ENVO_rewrite ::envoParseurl($page, $page1, $page2, $page3, $page4, $page5, $page6) ?>">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

	<!-- CSS and FONTS
	================================================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400" rel="stylesheet" type="text/css">
	<!-- Fontawesome icon -->
	<!-- <link rel="stylesheet" href="/assets/plugins/font-awesome/5.5.0/css/all.min.css" media="none"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<!-- Bluesat icon -->
	<link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/plugins/bluesat-icons/css/bluesat-icons.min.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="/assets/plugins/bootstrap/bootstrapv4/4.1.3/css/bootstrap.min.css">
	<!-- Bootstrap Table -->
	<link rel="stylesheet" href="/assets/plugins/bootstrap-table-master/dist/bootstrap-table.min.css">
	<!-- Animate -->
	<link rel="stylesheet" href="/assets/plugins/animate/3.7.0/animate.min.css">
	<!-- OWL Carousel -->
	<link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/plugins/owl.carousel/assets/owl.carousel.min.css?=v2.3.4">
	<link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/plugins/owl.carousel/assets/owl.theme.default.min.css?=v2.3.4">
	<!-- Magnific-popup -->
	<link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/plugins/magnific-popup/magnific-popup.min.css?=v1.1.0">
	<!-- RS5.0 Main Stylesheetm, Layers and Navigation Styles -->
	<link rel="stylesheet" type="text/css" href="/assets/plugins/revolution-slider/css/settings.min.css?=v5.4.8">
	<link rel="stylesheet" type="text/css" href="/assets/plugins/revolution-slider/css/layers.min.css?=v5.4.8">
	<link rel="stylesheet" type="text/css" href="/assets/plugins/revolution-slider/css/navigation.min.css?=v5.4.8">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/css/theme.css">
	<link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/css/theme-elements.css">
	<link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/css/theme-blog.css">
	<link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/css/theme-shop.css">
	<!-- Skin CSS -->
	<link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE . '/css/skins/' . $setting["skin_porto_tpl"] . '.min.css' ?>">
	<!-- Print CSS -->

	<?php if ($SHOWSOCIALBUTTON) { ?>
		<!-- Sollist -->
		<link href="/assets/plugins/jquery-sollist/jquery.sollist.min.css" rel="stylesheet" type="text/css" media="screen"/>
	<?php } ?>

	<!-- Custom Porto Style -->
	<link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/css/theme-custom.css" type="text/css"/>

	<!-- CUSTOM CSS
	================================================== -->
	<?php if (!$ENVO_SHOW_NAVBAR) { ?>
		<style type="text/css">
			/* Fix 'body padding' if navbar is hidden */
			body {
				padding-top: 0;
			}
		</style>
	<?php } ?>

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?= (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/" ?>favicon.ico" type="image/x-icon">

	<!-- Import templates for in between head
	============================================= -->
	<?php if (isset($ENVO_HOOK_HEAD_TOP) && is_array($ENVO_HOOK_HEAD_TOP)) foreach ($ENVO_HOOK_HEAD_TOP as $headt) {
		include_once APP_PATH . $headt['phpcode'];
	} ?>

	<!-- Import CSS for Current page in between head
	============================================= -->
	<?php if (isset($ENVO_HEADER_CSS)) echo $ENVO_HEADER_CSS; ?>

	<!-- Head Libs -->
	<script src="/template/<?= ENVO_TEMPLATE ?>/plugins/modernizr/modernizr.min.js"></script>

	<?php
	// Analytics code
	if (isset($setting["analytics"])) echo $setting["analytics"];
	?>

</head>
<?= '<body>' ?>

<?= '<div class="body"><!-- START BODY -->' ?>

<?php if ($ENVO_SHOW_NAVBAR) { ?>

	<!-- =========================
		START HEADER SECTION
	============================== -->
	<header id="header" class="<?= $PORTONAVTYPE ?>" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 120, 'stickyChangeLogo': true, 'stickyHeaderContainerHeight': 70}">
		<div class="header-body border-color-primary header-body-bottom-border">
			<div class="header-top header-top-default border-bottom-0">
				<div class="container">
					<div class="header-row py-2">
						<div class="header-column justify-content-start">
							<div class="header-row">
								<div class="usernav">
									<label for="drop" class="toggle">Uživatelské MENU</label>
									<input type="checkbox" id="drop"/>
									<ul class="header-links text-color-light">

										<?php
										// Show links for Register Form Plugin
										// Check if plugin exist throught PluginID
										if (defined(ENVO_TEMPLATE) && is_numeric(ENVO_PLUGIN_ID_REGISTER_FORM) && ENVO_PLUGIN_ID_REGISTER_FORM > 0) {
											echo '<li><a href="/' . $PLUGIN_RF_CAT["varname"] . '">' . $PLUGIN_RF_CAT["name"] . '</a></li>';
										}
										?>


										<?php if ($setting["sitemapShow_porto_tpl"] == 1) { ?>
											<li>
												<a href="/<?= $setting["sitemapLinks_porto_tpl"] ?>"><?= $tlporto["header_text"]["ht"] ?></a>
											</li>
										<?php }
										if ($setting["loginShow_porto_tpl"] == 1) {
											if (!ENVO_USERID) { ?>
												<li>
													<a href="/login" id="login">
														<?php
														// If Register Form is Active (installed) or Not Active (not installed)
														if ($setting["rf_active"]) {
															echo $tlporto["header_text"]["ht1"] . ' / ' . $tlporto["header_text"]["ht4"];
														} else {
															echo $tlporto["header_text"]["ht1"];
														}
														?>
													</a>
												</li>
											<?php } else { ?>
												<li>
													<a href="<?= $P_USR_LOGOUT ?>" id="logout">
														<?php
														echo sprintf($tlporto["header_text"]["ht2"], $envouser -> getVar("username"));
														?>
													</a>
												</li>
												<?php if (ENVO_ASACCESS) { ?>
													<li><a href="<?= BASE_URL ?>admin/"><?= $tlporto["header_text"]["ht3"] ?></a></li>
												<?php }
											}
										} ?>

									</ul>
								</div>
							</div>
						</div>
						<div class="header-column justify-content-end">
							<div class="header-row">
								<nav class="header-nav-top">
									<div class="d-none d-sm-block">

										<?php if ($setting["phoneheaderShow_porto_tpl"] == 1) { ?>
											<i class="fas fa-phone mr-1"></i>
											<a class="phone" href="tel:<?= $setting["phoneheaderLinks_porto_tpl"] ?>" target="_blank"><?= $setting["phoneheaderLinks_porto_tpl"] ?></a>
										<?php } ?>

									</div>
									<ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean">

										<?php if ($setting["facebookheaderShow_porto_tpl"] == 1) { ?>
											<li class="social-icons-facebook">
												<a href="<?= $setting["facebookheaderLinks_porto_tpl"] ?>" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
											</li>
										<?php }
										if ($setting["twitterheaderShow_porto_tpl"] == 1) { ?>
											<li class="social-icons-twitter">
												<a href="<?= $setting["twitterheaderLinks_porto_tpl"] ?>" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
											</li>
										<?php }
										if ($setting["googleheaderShow_porto_tpl"] == 1) { ?>
											<li class="social-icons-googleplus">
												<a href="<?= $setting["googleheaderLinks_porto_tpl"] ?>" target="_blank" title="Google Plus"><i class="fab fa-google-plus-g"></i></a>
											</li>
										<?php }
										if ($setting["instagramheaderShow_porto_tpl"] == 1) { ?>
											<li class="social-icons-instagram">
												<a href="<?= $setting["instagramheaderLinks_porto_tpl"] ?>" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
											</li>
										<?php }
										if ($setting["emailheaderShow_porto_tpl"] == 1) { ?>
											<li class="social-icons-email">
												<a href="mailto:<?= envo_encode_email($setting["emailheaderLinks_porto_tpl"]) ?>" target="_blank" title="Email"><i class="fas fa-envelope-square"></i></a>
											</li>
										<?php } ?>

									</ul>
									<div class="text-color-light ml-2 searchIco">

										<a href="#"><i class="fas fa-search"></i></a>

									</div>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-container container">
				<div class="header-row">
					<div class="header-column">
						<div class="header-row">
							<div class="header-logo">
								<a href="<?= BASE_URL ?>">
									<img alt="<?= $tlporto["image_desc"]["imdesc"] . $setting["title"] ?>" width="100" height="48" data-sticky-width="82" data-sticky-height="40" src="<?= $setting["logo1_porto_tpl"] ?>">
								</a>
							</div>
						</div>
					</div>
					<div class="header-column justify-content-end">
						<div class="header-row">
							<div class="header-nav header-nav-links order-2 order-lg-1 <?= $PORTONAVTYPE1 ?>">
								<div class="header-nav-main header-nav-main-square header-nav-main-effect-2 <?= $PORTONAVTYPE2 ?> header-nav-main-sub-effect-1">
									<nav class="collapse">

										<!-- Main navigation -->
										<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/navbar.php'; ?>
										<!-- Hook -->
										<?php if (isset($ENVO_HOOK_HEADER) && is_array($ENVO_HOOK_HEADER)) foreach ($ENVO_HOOK_HEADER as $hheader) {
											include_once APP_PATH . $hheader['phpcode'];
										} ?>

									</nav>
								</div>
								<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
									<i class="fas fa-bars"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- =========================
      END HEADER SECTION
    ============================== -->

<?php } ?>

<!-- START MAIN CONTENT -->
<?= '<div role="main" class="main">' ?>

<!-- =========================
START PAGE TITLE SECTION
============================== -->
<?php if ($ENVO_SHOW_NAVBAR) {

	/* GRID SYSTEM FOR DIFFERENT PAGE - hide page title */
	if (!$page || empty($page) || ($page == 'offline') || ($page == 'login') || (!$setting["searchform"] || !ENVO_USER_SEARCH)) {
		// Code for homepage and other blank page

	}

	if (($page && $PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID] && ($page != 'login')) || ($page && ENVO_ASACCESS && ($page != 'login'))) {
		// Code for all page without home page

		if ($PORTOPHEADER == 'page-header-classic') { ?>

			<section class="page-header <?= $PORTOPHEADER . ' ' . $PORTOPHEADER1 ?>">
				<div class="container">
					<div class="row">
						<div class="col">
							<ul class="breadcrumb">

								<?php
								echo '<li>';
								echo '<a href=' . BASE_URL . '>';
								foreach ($envocategories as $ca) if ($ca['catorder'] == 1 && $ca['showmenu'] == 1 && $ca['showfooter'] == 0) {
									echo $ca["name"];
								}
								echo '</a>';
								echo '</li>';
								if ($ENVO_TPL_PLUG_T && !empty($page1) && !is_numeric($page1)) {
									echo '<li><a href="' . $ENVO_TPL_PLUG_URL . '">' . $ENVO_TPL_PLUG_T . '</a></li>';
								}
								echo '<li class="active">';
								echo envo_cut_text($PAGE_TITLE, 35, "...");
								echo '</li>';
								?>

							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col p-static">
							<h1 data-title-border>

								<?php
								envo_cut_text($PAGE_TITLE, 50, "...");
								$splittitle = explode(' ', $PAGE_TITLE);
								$last_word  = array_pop($splittitle);

								echo substr($PAGE_TITLE, 0, strrpos($PAGE_TITLE, ' ')) . ' <strong>' . $last_word . '</strong>';

								?>

							</h1>
						</div>
					</div>
				</div>
			</section>

		<?php }
		if ($PORTOPHEADER == 'page-header-modern') { ?>

			<section class="page-header <?= $PORTOPHEADER . ' bg-color-light-scale-1 ' . $PORTOPHEADER1 ?>">
				<div class="container">
					<div class="row">
						<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
							<h1 class="text-dark">

								<?php
								envo_cut_text($PAGE_TITLE, 50, "...");
								$splittitle = explode(' ', $PAGE_TITLE);
								$last_word  = array_pop($splittitle);

								echo substr($PAGE_TITLE, 0, strrpos($PAGE_TITLE, ' ')) . ' <strong>' . $last_word . '</strong>';

								?>

							</h1>
						</div>
						<div class="col-md-4 order-1 order-md-2 align-self-center">
							<ul class="breadcrumb d-block text-md-right">

								<?php
								echo '<li>';
								echo '<a href=' . BASE_URL . '>';
								foreach ($envocategories as $ca) if ($ca['catorder'] == 1 && $ca['showmenu'] == 1 && $ca['showfooter'] == 0) {
									echo $ca["name"];
								}
								echo '</a>';
								echo '</li>';
								if ($ENVO_TPL_PLUG_T && !empty($page1) && !is_numeric($page1)) {
									echo '<li><a href="' . $ENVO_TPL_PLUG_URL . '">' . $ENVO_TPL_PLUG_T . '</a></li>';
								}
								echo '<li class="active">';
								echo envo_cut_text($PAGE_TITLE, 35, "...");
								echo '</li>';
								?>

							</ul>
						</div>
					</div>
				</div>
			</section>

		<?php }
		if ($PORTOPHEADER == 'page-header-modern page-header-background') {

			if ($PORTOPHEADER1 == 'page-header-background-md') { ?>

				<section class="page-header <?= $PORTOPHEADER . ' ' . $PORTOPHEADER1 . ' ' . $PORTOPHEADER2 ?>" style="background-image: url(<?= $tpl_img ?>);">
					<div class="container">
						<div class="row">
							<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
								<h1 class="text-uppercase">

									<?php
									envo_cut_text($PAGE_TITLE, 50, "...");
									$splittitle = explode(' ', $PAGE_TITLE);
									$last_word  = array_pop($splittitle);

									echo substr($PAGE_TITLE, 0, strrpos($PAGE_TITLE, ' ')) . ' <strong>' . $last_word . '</strong>';

									?>

								</h1>
								<span class="sub-title">This is a subtitle example.</span>
							</div>
							<div class="col-md-4 order-1 order-md-2 align-self-center">
								<ul class="breadcrumb breadcrumb-light d-block text-md-right">

									<?php
									echo '<li>';
									echo '<a href=' . BASE_URL . '>';
									foreach ($envocategories as $ca) if ($ca['catorder'] == 1 && $ca['showmenu'] == 1 && $ca['showfooter'] == 0) {
										echo $ca["name"];
									}
									echo '</a>';
									echo '</li>';
									if ($ENVO_TPL_PLUG_T && !empty($page1) && !is_numeric($page1)) {
										echo '<li><a href="' . $ENVO_TPL_PLUG_URL . '">' . $ENVO_TPL_PLUG_T . '</a></li>';
									}
									echo '<li class="active">';
									echo envo_cut_text($PAGE_TITLE, 35, "...");
									echo '</li>';
									?>

								</ul>
							</div>
						</div>
					</div>
				</section>

			<?php }
			if ($PORTOPHEADER1 == 'page-header-background-pattern') { ?>

				<section class="page-header <?= $PORTOPHEADER . ' ' . $PORTOPHEADER1 . ' ' . $PORTOPHEADER2 ?>" style="background-image: url(<?= $tpl_img ?>);background-size: 130%;">
					<div class="container">
						<div class="row">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-uppercase">

									<?php
									envo_cut_text($PAGE_TITLE, 50, "...");
									$splittitle = explode(' ', $PAGE_TITLE);
									$last_word  = array_pop($splittitle);

									echo substr($PAGE_TITLE, 0, strrpos($PAGE_TITLE, ' ')) . ' <strong>' . $last_word . '</strong>';

									?>

								</h1>
							</div>
							<div class="col-md-12 align-self-center order-1 mb-3">
								<ul class="breadcrumb breadcrumb-light d-block text-center">

									<?php
									echo '<li>';
									echo '<a href=' . BASE_URL . '>';
									foreach ($envocategories as $ca) if ($ca['catorder'] == 1 && $ca['showmenu'] == 1 && $ca['showfooter'] == 0) {
										echo $ca["name"];
									}
									echo '</a>';
									echo '</li>';
									if ($ENVO_TPL_PLUG_T && !empty($page1) && !is_numeric($page1)) {
										echo '<li><a href="' . $ENVO_TPL_PLUG_URL . '">' . $ENVO_TPL_PLUG_T . '</a></li>';
									}
									echo '<li class="active">';
									echo envo_cut_text($PAGE_TITLE, 35, "...");
									echo '</li>';
									?>

								</ul>
							</div>
						</div>
					</div>
				</section>

			<?php }
			if ($PORTOPHEADER1 == 'page-header-background-md parallax') { ?>

				<section class="page-header <?= $PORTOPHEADER . ' ' . $PORTOPHEADER1 . ' ' . $PORTOPHEADER2 ?>" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '140%'}" data-image-src="<?= $tpl_img ?>">
					<div class="container">
						<div class="row">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-uppercase">

									<?php
									envo_cut_text($PAGE_TITLE, 50, "...");
									$splittitle = explode(' ', $PAGE_TITLE);
									$last_word  = array_pop($splittitle);

									echo substr($PAGE_TITLE, 0, strrpos($PAGE_TITLE, ' ')) . ' <strong>' . $last_word . '</strong>';

									?>

								</h1>
							</div>
							<div class="col-md-12 align-self-center order-1 mb-3">
								<ul class="breadcrumb breadcrumb-light d-block text-center">

									<?php
									echo '<li>';
									echo '<a href=' . BASE_URL . '>';
									foreach ($envocategories as $ca) if ($ca['catorder'] == 1 && $ca['showmenu'] == 1 && $ca['showfooter'] == 0) {
										echo $ca["name"];
									}
									echo '</a>';
									echo '</li>';
									if ($ENVO_TPL_PLUG_T && !empty($page1) && !is_numeric($page1)) {
										echo '<li><a href="' . $ENVO_TPL_PLUG_URL . '">' . $ENVO_TPL_PLUG_T . '</a></li>';
									}
									echo '<li class="active">';
									echo envo_cut_text($PAGE_TITLE, 35, "...");
									echo '</li>';
									?>

								</ul>
							</div>
						</div>
					</div>
				</section>

			<?php }

		}
		if ($PORTOPHEADER == 'page-header-modern page-header-md') { ?>

			<section class="page-header <?= $PORTOPHEADER . ' ' . $PORTOPHEADER1 ?>">
				<div class="container">
					<div class="row">
						<div class="col-md-12 align-self-center p-static order-2 text-center">
							<h1 class="text-dark text-uppercase">

								<?php
								envo_cut_text($PAGE_TITLE, 50, "...");
								$splittitle = explode(' ', $PAGE_TITLE);
								$last_word  = array_pop($splittitle);

								echo substr($PAGE_TITLE, 0, strrpos($PAGE_TITLE, ' ')) . ' <strong>' . $last_word . '</strong>';

								?>

							</h1>
						</div>
						<div class="col-md-12 align-self-center order-1 mb-3">
							<ul class="breadcrumb d-block text-center">

								<?php
								echo '<li>';
								echo '<a href=' . BASE_URL . '>';
								foreach ($envocategories as $ca) if ($ca['catorder'] == 1 && $ca['showmenu'] == 1 && $ca['showfooter'] == 0) {
									echo $ca["name"];
								}
								echo '</a>';
								echo '</li>';
								if ($ENVO_TPL_PLUG_T && !empty($page1) && !is_numeric($page1)) {
									echo '<li><a href="' . $ENVO_TPL_PLUG_URL . '">' . $ENVO_TPL_PLUG_T . '</a></li>';
								}
								echo '<li class="active">';
								echo envo_cut_text($PAGE_TITLE, 35, "...");
								echo '</li>';
								?>

							</ul>
						</div>
					</div>
				</div>
			</section>

		<?php }
		if ($PORTOPHEADER == 'page-header-modern page-header-title-position') { ?>

			<section class="page-header <?= $PORTOPHEADER . ' ' . $PORTOPHEADER1 ?> ">
				<div class="container">
					<div class="row">
						<div class="col-md-12 align-self-center p-static order-2 text-center">
							<h1 class="text-dark text-uppercase">

								<?php
								envo_cut_text($PAGE_TITLE, 50, "...");
								$splittitle = explode(' ', $PAGE_TITLE);
								$last_word  = array_pop($splittitle);

								echo substr($PAGE_TITLE, 0, strrpos($PAGE_TITLE, ' ')) . ' <strong>' . $last_word . '</strong>';

								?>

							</h1>
						</div>
						<div class="col-md-12 align-self-center order-1 mb-3">
							<ul class="breadcrumb d-block text-center">

								<?php
								echo '<li>';
								echo '<a href=' . BASE_URL . '>';
								foreach ($envocategories as $ca) if ($ca['catorder'] == 1 && $ca['showmenu'] == 1 && $ca['showfooter'] == 0) {
									echo $ca["name"];
								}
								echo '</a>';
								echo '</li>';
								if ($ENVO_TPL_PLUG_T && !empty($page1) && !is_numeric($page1)) {
									echo '<li><a href="' . $ENVO_TPL_PLUG_URL . '">' . $ENVO_TPL_PLUG_T . '</a></li>';
								}
								echo '<li class="active">';
								echo envo_cut_text($PAGE_TITLE, 35, "...");
								echo '</li>';
								?>

							</ul>
						</div>
					</div>
				</div>
			</section>

		<?php }
	}
} ?>
<!-- =========================
END PAGE TITLE SECTION
============================== -->

<?php
if (isset($ENVO_HOOK_BELOW_HEADER) && is_array($ENVO_HOOK_BELOW_HEADER)) foreach ($ENVO_HOOK_BELOW_HEADER as $bheader) {
	// Import templates below header
	include_once APP_PATH . $bheader['phpcode'];
}
?>


<?php

if (!$page) {
	// Jedná se o titulní stránku - $page neobsahuje žádnou hodnotu

	// Titulní stránka má Grid systém nebo heslo
	if ($ENVO_HOOK_SIDE_GRID || $PAGE_PASSWORD) {

	} else {

	}

	$section = 'DEFAULT';

} else {
	// Jedná se o speciální stránku - $page obsahuje hodnotu 'offline' nebo '404'
	// Nejedná se o titulní stránku - $page obsahuje hodnotu

	// Stránka - $page obsahuje hodnotu 'offline' => Web je v offline režimu
	if ($page == 'offline') {
		// SÍŤ JE OFFLINE
		// Pokud není přihlášen administrátor '$page má hodnotu offline', pokud je administrátor přihlášen '$page nemá hodnotu offline' ale má hodnotu názvu stránky dle parsování URL adresy

		$section = 'DEFAULT';

	}

	// Stránka - $page obsahuje hodnotu '404' => Chybová stránka
	if ($page == '404') {

		$section = 'DEFAULT';

	}

	// Stránka - $page neobsahuje hodnotu 'offline' nebo '404' - jedná se o různé stránky
	if ($page != 'offline' && $page != '404') {

		// Stránka má heslo, heslo ve stránce bylo správně zadané, stránka nemá heslo
		if ($PAGE_PASSWORD && ($PAGE_PASSWORD != $_SESSION['pagesecurehash' . $PAGE_ID])) {
			// STRÁNKA MÁ HESLO

			// Přihlášení administrátora
			if (ENVO_ASACCESS) {
				// ADMINISTRÁTOR JE PŘIHLÁŠEN

				// Stránka má Grid systém
				if ($ENVO_HOOK_SIDE_GRID) {

					$section = 'B';

				} else {

					$section = 'A';

				}

			} else {
				// ADMINISTRÁTOR NENÍ PŘIHLÁŠEN

				// Stránka má Grid systém
				if ($ENVO_HOOK_SIDE_GRID) {

					$section = 'DEFAULT';

				} else {

					$section = 'DEFAULT';

				}

			}

		} elseif ($PAGE_PASSWORD && ($PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID])) {
			// STRÁNKA MÁ HESLO A HESLO BYLO SPRÁVNĚ ZADANÉ VE STRÁNCE

			// Přihlášení administrátora
			if (ENVO_ASACCESS) {
				// ADMINISTRÁTOR JE PŘIHLÁŠEN

				// Stránka má Grid systém
				if ($ENVO_HOOK_SIDE_GRID) {

					$section = 'B';

				} else {

					$section = 'A';

				}

			} else {
				// ADMINISTRÁTOR NENÍ PŘIHLÁŠEN

				// Stránka má Grid systém
				if ($ENVO_HOOK_SIDE_GRID) {

					$section = 'B';

				} else {

					$section = 'A';

				}

			}

		} else {
			// STRÁNKA NEMÁ HESLO

			// Přihlášení administrátora
			if (ENVO_ASACCESS) {
				// ADMINISTRÁTOR JE PŘIHLÁŠEN

				// Stránka má Grid systém
				if ($ENVO_HOOK_SIDE_GRID) {

					$section = 'B';

				} else {

					$section = 'A';

				}

			} else {
				// ADMINISTRÁTOR NENÍ PŘIHLÁŠEN

				// Stránka má Grid systém
				if ($ENVO_HOOK_SIDE_GRID) {

					$section = 'B';

				} else {

					$section = 'A';

				}

			}

		}

	}

}

switch ($section) {
	case 'A':

		echo '<section class="pt-3 mb-3">';
		echo '<div class="container py-2">';
		echo '<div class="row">';
		echo '<div class="col">';

		break;
	case 'B':

		echo '<section class="pt-small mb-small">';
		echo '<div class="container py-2">';
		echo '<div class="row">';

		// Sidebar if left
		if (!empty($ENVO_HOOK_SIDE_GRID) && $setting["sidebar_location_tpl"] == "left") {
			include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/sidebar.php';
		}

		echo '<div class="' . ($ENVO_HOOK_SIDE_GRID ? 'col-sm-9' : 'col-sm-12') . '">';

		break;
	default:

}

?>

