<?php

// EN: Include the config file of template ...
// CZ: Vložení konfiguračního souboru šablony ...
if (!file_exists(APP_PATH . 'template/' . ENVO_TEMPLATE . '/config.php')) die('[' . __DIR__ . '/index.php] Template Autorex - config.php not found');
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
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!--[if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
	<!--[if lt IE 9]>
	<script src="js/respond.js"></script><![endif]-->

	<!-- CSS and FONTS
	================================================== -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Yantramanav:wght@300;400;500;700;900&display=swap" rel="stylesheet" type="text/css">
	<!-- Fontawesome icon -->
	<link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/fontawesome-all.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/bootstrap.css?=v4.3.1">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/style.css">
	<link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/responsive.css">
	<link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/color.css">

	<!-- Print CSS -->

	<?php if ($SHOWSOCIALBUTTON) { ?>
		<!-- Sollist -->
		<link href="/assets/plugins/jquery-sollist/jquery.sollist.min.css" rel="stylesheet" type="text/css" media="screen"/>
	<?php } ?>

	<!-- Custom Autorex Style -->
	<link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/theme-custom.css" type="text/css"/>

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


	<?php
	// Analytics code
	if (isset($setting["analytics"])) echo $setting["analytics"];
	?>

</head>

<body>

<div class="page-wrapper"><!-- START BODY -->

	<!-- Preloader -->
	<div class="loader-wrap">
		<div class="preloader"><div class="preloader-close">Preloader Close</div></div>
		<div class="layer layer-one"><span class="overlay"></span></div>
		<div class="layer layer-two"><span class="overlay"></span></div>
		<div class="layer layer-three"><span class="overlay"></span></div>
	</div>

	<?php if ($ENVO_SHOW_NAVBAR) { ?>

		<!-- START HEADER SECTION -->
		<header class="main-header header-style-one">

			<!-- Header Top -->
			<div class="header-top">
				<div class="auto-container">
					<div class="inner-container">
						<div class="left-column">
							<div class="text"># 1 Multibrand Car Workshop of Losangle City</div>
							<div class="office-hour">Monday - Saturday 7:00AM - 6:00PM</div>
						</div>
						<div class="right-column">
							<div class="phone-number mr-5">Schedule Your Appontment Today : <strong>1800 456 7890</strong></div>
						</div>
					</div>
				</div>
			</div>

			<!-- Header Upper -->
			<div class="header-upper">
				<div class="auto-container">
					<div class="inner-container">
						<!--Logo-->
						<div class="logo-box">
							<div class="logo"><a href="index.html"><img src="/template/<?= ENVO_TEMPLATE ?>/assets/images/logo.png" alt=""></a></div>
						</div>
						<div class="right-column">
							<!--Nav Box-->
							<div class="nav-outer">
								<!--Mobile Navigation Toggler-->
								<div class="mobile-nav-toggler"><img src="/template/<?= ENVO_TEMPLATE ?>/assets/images/icons/icon-bar.png" alt=""></div>

								<!-- Main Menu -->
								<nav class="main-menu navbar-expand-md navbar-light">
									<div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
										<ul class="navigation">
											<li class="dropdown"><a href="index.html">Home</a>
												<ul>
													<li><a href="index.html">Home Page 1</a></li>
													<li><a href="index-2.html">Home Page 2</a></li>
													<li><a href="index-3.html">Home Page 3</a></li>
												</ul>
											</li>
											<li class="dropdown"><a href="about.html">About Us</a>
												<ul>
													<li><a href="about.html">About Us</a></li>
													<li><a href="history.html">Company History</a></li>
													<li><a href="team.html">Our Team</a></li>
												</ul>
											</li>
											<li class="dropdown"><a href="service-1.html">Services</a>
												<ul>
													<li><a href="service-1.html">Services 1</a></li>
													<li><a href="service-2.html">Services 2</a></li>
													<li><a href="service-details.html">Single Service</a></li>
												</ul>
											</li>
											<li class="dropdown"><a href="gallery-1.html">Gallery</a>
												<ul>
													<li><a href="gallery-1.html">Gallery 1</a></li>
													<li><a href="gallery-2.html">Gallery 2</a></li>
												</ul>
											</li>
											<li class="dropdown"><a href="blog.html">Pages</a>
												<ul>
													<li><a href="projects.html">Projects</a></li>
													<li><a href="project-details.html">Project Details</a></li>
													<li><a href="testimonials.html">Testimonials</a></li>
													<li><a href="faq.html">Faq</a></li>
													<li><a href="error.html">404 Error Page</a></li>
													<li><a href="comming-soon.html">Coming Soon Page</a></li>
												</ul>
											</li>
											<li class="dropdown"><a href="#">News</a>
												<ul>
													<li><a href="blog.html">Blog With Side bar</a></li>
													<li><a href="blog-2.html">Blog 2 Column</a></li>
													<li><a href="blog-details.html">Blog Details</a></li>
												</ul>
											</li>
											<li><a href="contact.html">Contact Us</a></li>
										</ul>
									</div>
								</nav>
							</div>
							<div class="search-btn">
								<button type="button" class="theme-btn search-toggler"><span class="stroke-gap-icon icon-Search"></span>
								</button>
							</div>
							<div class="link-btn"><a href="#" class="theme-btn btn-style-one">Book a Schedule </a></div>
						</div>
					</div>
				</div>
			</div>
			<!--End Header Upper-->

			<!-- Sticky Header  -->
			<div class="sticky-header">
				<!-- Header Upper -->
				<div class="header-upper">
					<div class="auto-container">
						<div class="inner-container">
							<!--Logo-->
							<div class="logo-box">
								<div class="logo"><a href="index.html"><img src="/template/<?= ENVO_TEMPLATE ?>/assets/images/logo.png" alt=""></a></div>
							</div>
							<div class="right-column">
								<!--Nav Box-->
								<div class="nav-outer">
									<!--Mobile Navigation Toggler-->
									<div class="mobile-nav-toggler"><img src="/template/<?= ENVO_TEMPLATE ?>/assets/images/icons/icon-bar.png" alt=""></div>

									<!-- Main Menu -->
									<nav class="main-menu navbar-expand-md navbar-light">
									</nav>
								</div>
								<div class="search-btn">
									<button type="button" class="theme-btn search-toggler">
										<span class="stroke-gap-icon icon-Search"></span></button>
								</div>
								<div class="link-btn"><a href="#" class="theme-btn btn-style-one">Book a Schedule </a></div>
							</div>
						</div>
					</div>
				</div>
				<!--End Header Upper-->
			</div><!-- End Sticky Menu -->

			<!-- Mobile Menu  -->
			<div class="mobile-menu">
				<div class="menu-backdrop"></div>
				<div class="close-btn"><span class="icon flaticon-remove"></span></div>

				<nav class="menu-box">
					<div class="nav-logo">
						<a href="index.html">
							<img src="/template/<?= ENVO_TEMPLATE ?>/assets/images/logo-two.png" alt="" title="">
						</a>
					</div>
					<div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
					<!--Social Links-->
					<div class="social-links">
						<ul class="clearfix">
							<li><a href="#"><span class="fab fa-twitter"></span></a></li>
							<li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
							<li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
							<li><a href="#"><span class="fab fa-instagram"></span></a></li>
							<li><a href="#"><span class="fab fa-youtube"></span></a></li>
						</ul>
					</div>
				</nav>
			</div><!-- End Mobile Menu -->

			<div class="nav-overlay">
				<div class="cursor"></div>
				<div class="cursor-follower"></div>
			</div>
		</header>
		<!-- END HEADER SECTION -->

	<?php } ?>

	<!-- START MAIN CONTENT -->
	<div class="maincontent">

		<!-- START PAGE TITLE SECTION -->
		<?php if ($ENVO_SHOW_NAVBAR) {

			/* GRID SYSTEM FOR DIFFERENT PAGE - hide page title */
			if (!$page || empty($page) || ($page == 'offline') || ($page == 'login') || (!$setting["searchform"] || !ENVO_USER_SEARCH)) {
				// Code for homepage and other blank page

			}

			if (($page && $PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID] && ($page != 'login')) || ($page && ENVO_ASACCESS && ($page != 'login'))) {
				// Code for all page without home page

				if ($PORTOPHEADER == 'page-header-classic') { ?>

					<section class="page-header mb-0 <?= $PORTOPHEADER . ' ' . $PORTOPHEADER1 ?>">
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

					<section class="page-header mb-0 <?= $PORTOPHEADER . ' bg-color-light-scale-1 ' . $PORTOPHEADER1 ?>">
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

						<section class="page-header mb-0 <?= $PORTOPHEADER . ' ' . $PORTOPHEADER1 . ' ' . $PORTOPHEADER2 ?>" style="background-image: url(<?= $tpl_img ?>);">
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

						<section class="page-header mb-0 <?= $PORTOPHEADER . ' ' . $PORTOPHEADER1 . ' ' . $PORTOPHEADER2 ?>" style="background-image: url(<?= $tpl_img ?>);background-size: 130%;">
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

						<section class="page-header mb-0 <?= $PORTOPHEADER . ' ' . $PORTOPHEADER1 . ' ' . $PORTOPHEADER2 ?>" data-plugin-parallax data-plugin-options="{'speed': 1.5, 'parallaxHeight': '140%'}" data-image-src="<?= $tpl_img ?>">
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

					<section class="page-header mb-0 <?= $PORTOPHEADER . ' ' . $PORTOPHEADER1 ?>">
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

					<section class="page-header mb-0 <?= $PORTOPHEADER . ' ' . $PORTOPHEADER1 ?> ">
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

				echo '<section class="pt-5 mb-5">';
				echo '<div class="container">';
				echo '<div class="row">';
				echo '<div class="col">';

				break;
			case 'B':

				echo '<section>';
				echo '<div class="container">';
				echo '<div class="row">';

				// Sidebar if left
				if (!empty($ENVO_HOOK_SIDE_GRID) && $setting["sidebar_location_tpl"] == "left") {
					include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/sidebar.php';
				}

				echo '<div class="' . ($ENVO_HOOK_SIDE_GRID ? 'col-sm-9' : 'col-sm-12') . '" style="padding-top: 30px;">';

				break;
			default:

		}

		?>

