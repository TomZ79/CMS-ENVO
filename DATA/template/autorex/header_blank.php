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

	<!-- START MAIN CONTENT -->
	<div class="maincontent">

		<!-- START PAGE TITLE SECTION -->
		<?php if ($ENVO_SHOW_NAVBAR) {

			// Random image
			// Show random image: echo $randomImage;
			$photoAreas = array (
				"http://html.tonatheme.com/2020/Autorex/assets/images/background/bg-3.jpg",
				"http://html.tonatheme.com/2020/Autorex/assets/images/background/bg-1.jpg"
			);

			$randomNumber = array_rand($photoAreas);
			$randomImage  = $photoAreas[$randomNumber];


			/* GRID SYSTEM FOR DIFFERENT PAGE - hide page title */
			if ($page == '404') {
				// Code for only 404 page

			} elseif ($page == 'error') {
				// Code for only Error page

			} elseif ($page == 'offline') {
				// Code for only Offline page

			} elseif ($page == 'login') {
				// Code for only login page
				?>

				<!-- Page Title -->
				<section class="page-title" style="background-image:url(<?= $randomImage ?>)">
					<div class="auto-container">
						<h2><?= envo_cut_text($PAGE_TITLE, 35, "...") ?></h2>
						<ul class="page-breadcrumb">

							<?php
							echo '<li>';
							echo '<a href=' . BASE_URL . '>';
							foreach ($envocategories as $ca) if ($ca['catorder'] == 1 && $ca['showmenu'] == 1 && $ca['showfooter'] == 0) {
								echo $ca["name"];
							}
							echo '</a>';
							echo '</li>';
							if ($ENVO_TPL_PLUG_T && !empty($page1) && !is_numeric($page1)) {
								echo '<li>' . $ENVO_TPL_PLUG_T . '</li>';
							}
							echo '<li class="active">';
							echo envo_cut_text($PAGE_TITLE, 35, "...");
							echo '</li>';
							?>

						</ul>
					</div>
					<h1 data-parallax='{"x": 200}'><?= envo_cut_text($PAGE_TITLE, 35, "...") ?></h1>
				</section>

				<?php
			} else {

				if (!$page || empty($page) || ($page == 'offline') || (!$setting["searchform"] || !ENVO_USER_SEARCH)) {
					// Code for homepage and other blank page

				}

				if (($page && $PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID] && ($page != 'login')) || ($page && ENVO_ACCESS && ($page != 'login')) && ($page != 404)) {
					// Code for all page without home page
					?>

					<!-- Page Title -->
					<section class="page-title" style="background-image:url(<?= $randomImage ?>)">
						<div class="auto-container">
							<h2><?= envo_cut_text($PAGE_TITLE, 35, "...") ?></h2>
							<ul class="page-breadcrumb">

								<?php
								echo '<li>';
								echo '<a href=' . BASE_URL . '>';
								foreach ($envocategories as $ca) if ($ca['catorder'] == 1 && $ca['showmenu'] == 1 && $ca['showfooter'] == 0) {
									echo $ca["name"];
								}
								echo '</a>';
								echo '</li>';
								if ($ENVO_TPL_PLUG_T && !empty($page1) && !is_numeric($page1)) {
									echo '<li>' . $ENVO_TPL_PLUG_T . '</li>';
								}
								echo '<li class="active">';
								echo envo_cut_text($PAGE_TITLE, 35, "...");
								echo '</li>';
								?>

							</ul>
						</div>
						<h1 data-parallax='{"x": 200}'><?= envo_cut_text($PAGE_TITLE, 35, "...") ?></h1>
					</section>

					<?php

				}
			}

		} ?>
		<!-- END PAGE TITLE SECTION -->

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

				if ($PAGE_PASSWORD && ($PAGE_PASSWORD != $_SESSION['pagesecurehash' . $PAGE_ID])) {
					// STRÁNKA MÁ HESLO A HESLO NEBYLO SPRÁVNĚ ZADANÉ VE STRÁNCE

					// Přihlášení administrátora
					if (ENVO_ACCESS) {
						// ADMINISTRÁTOR JE PŘIHLÁŠEN

						if ($ENVO_SHOW_GRID) {
							// Stránka má povoleno zobrazení Grid systému

							if ($ENVO_HOOK_SIDE_GRID) {
								// Stránka má Grid systém

								$section = 'B';

							} else {
								// Stránka nema Grid systém

								$section = 'A';

							}

						} else {
							// Stránka nemá povoleno zobrazení Grid systému

							$section = 'DEFAULT';

						}

					} else {
						// ADMINISTRÁTOR NENÍ PŘIHLÁŠEN

						if ($ENVO_SHOW_GRID) {
							// Stránka má povoleno zobrazení Grid systému

							if ($ENVO_HOOK_SIDE_GRID) {
								// Stránka má Grid systém

								$section = 'B';

							} else {
								// Stránka nema Grid systém

								$section = 'A';

							}

						} else {
							// Stránka nemá povoleno zobrazení Grid systému

							$section = 'DEFAULT';

						}

					}

				} elseif ($PAGE_PASSWORD && ($PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID])) {
					// STRÁNKA MÁ HESLO A HESLO BYLO SPRÁVNĚ ZADANÉ VE STRÁNCE

					// Přihlášení administrátora
					if (ENVO_ACCESS) {
						// ADMINISTRÁTOR JE PŘIHLÁŠEN

						if ($ENVO_SHOW_GRID) {
							// Stránka má povoleno zobrazení Grid systému

							if ($ENVO_HOOK_SIDE_GRID) {
								// Stránka má Grid systém

								$section = 'B';

							} else {
								// Stránka nema Grid systém

								$section = 'A';

							}

						} else {
							// Stránka nemá povoleno zobrazení Grid systému

							$section = 'DEFAULT';

						}

					} else {
						// ADMINISTRÁTOR NENÍ PŘIHLÁŠEN

						if ($ENVO_SHOW_GRID) {
							// Stránka má povoleno zobrazení Grid systému

							if ($ENVO_HOOK_SIDE_GRID) {
								// Stránka má Grid systém

								$section = 'B';

							} else {
								// Stránka nema Grid systém

								$section = 'A';

							}

						} else {
							// Stránka nemá povoleno zobrazení Grid systému

							$section = 'DEFAULT';

						}

					}

				} else {
					// STRÁNKA NEMÁ HESLO

					// Přihlášení administrátora
					if (ENVO_ACCESS) {
						// ADMINISTRÁTOR JE PŘIHLÁŠEN

						if ($ENVO_SHOW_GRID) {
							// Stránka má povoleno zobrazení Grid systému

							if ($ENVO_HOOK_SIDE_GRID) {
								// Stránka má Grid systém

								$section = 'B';

							} else {
								// Stránka nema Grid systém

								$section = 'A';

							}

						} else {
							// Stránka nemá povoleno zobrazení Grid systému

							$section = 'DEFAULT';

						}

					} else {
						// ADMINISTRÁTOR NENÍ PŘIHLÁŠEN

						if ($ENVO_SHOW_GRID) {
							// Stránka má povoleno zobrazení Grid systému

							if ($ENVO_HOOK_SIDE_GRID) {
								// Stránka má Grid systém

								$section = 'B';

							} else {
								// Stránka nema Grid systém

								$section = 'A';

							}

						} else {
							// Stránka nemá povoleno zobrazení Grid systému

							$section = 'DEFAULT';

						}

					}

				}

			}

		}

		switch ($section) {
			case 'DEFAULT':

				break;
			case 'A':

				echo '<section class="pt-5 mb-5">';
				echo '<div class="auto-container">';
				echo '<div class="row">';
				echo '<div class="col">';

				break;
			case 'B':

				echo '<section>';
				echo '<div class="sidebar-page-container">';
				echo '<div class="auto-container">';
				echo '<div class="row">';

				// Sidebar if left
				if (!empty($ENVO_HOOK_SIDE_GRID) && $setting["sidebar_location_tpl"] == "left") {
					echo '<div class="col-sm-3 sidebar-side' . ($ENVO_HOOK_SIDE_GRID && $setting["sidebar_location_tpl"] == "left" ? 'sidebar-left' : 'sidebar-right') . '">';
					include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/sidebar.php';
					echo '</div>';
				}

				echo '<div class="' . ($ENVO_HOOK_SIDE_GRID ? 'col-sm-9' : 'col-sm-12') . '">';

				break;
			default:

		}

		?>

