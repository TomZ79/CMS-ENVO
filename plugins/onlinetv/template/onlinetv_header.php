<!DOCTYPE html>
<html lang="<?= $site_language ?>">
<!-- BEGIN HEAD -->
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<meta charset="utf-8"/>
	<!-- Document Title
	============================================= -->
	<title>
		<?php

		if ($page2 == 'f') {
			echo $PAGE_TITLE;
		} else {
			echo $setting["title"];
			if ($setting["title"]) {
				echo " &raquo; ";
			}
			echo $PAGE_TITLE;
		}

		?>
	</title>

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
	<meta name="mobile-web-app-capable" content="yes">

	<!-- CSS and FONTS
	================================================== -->
	<!-- BEGIN PLUGIN CSS -->

	<?php
	// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
	// Google Fonts
	echo $Html -> addStylesheet('https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900');
	// Fontawesome icon
	echo $Html -> addStylesheet('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
	echo $Html -> addStylesheet('https://use.fontawesome.com/releases/v5.8.1/css/all.css');
	// Animate
	echo $Html -> addStylesheet('/assets/plugins/animate/3.7.0/animate.css');
	// Bootstrap
	echo $Html -> addStylesheet('/assets/plugins/bootstrap/bootstrapv4/4.1.3/css/bootstrap.min.css');
	// Navigation
	echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'css/navigation.css');
	// OWL Carousel
	echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/owl.carousel/assets/owl.carousel.min.css?=v2.3.4');
	echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/owl.carousel/assets/owl.theme.default.min.css?=v2.3.4');
	// Plugin Fancybox
	echo $Html -> addStylesheet('/assets/plugins/fancybox/3.5.7/css/jquery.fancybox.min.css');
	// Slick
	echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'css/slick.css');
	// Plyr
	echo $Html -> addStylesheet('https://cdn.plyr.io/3.5.3/plyr.css');
	// Layout, components, colors
	echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'css/style.css');
	echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'css/color/color-10.css');
	echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'css/responsive.css');

	?>

	<!-- END PLUGIN CSS -->
	<!-- BEGIN CORE CSS FRAMEWORK -->

	<?php
	// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
	// Main Custom StyleSheet
	echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'css/custom.css');

	if ($page1 == '404') {

		echo PHP_EOL;

		$str = <<<EOT
<style>
body {
	background: #F0F1F4;
}
</style>
EOT;

		echo $str;

		echo PHP_EOL;

	}
	?>

	<!-- END CORE CSS FRAMEWORK -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>

<div class="block-inner">

	<div class="header-area">

		<!-- top bar start -->
		<section class="top-bar transparent d-none d-sm-block">
			<div class="container">
				<div class="row">
					<div class="col-md-12 align-self-center">
						<div class="ts-breaking-news clearfix">
							<h2 class="breaking-title float-left">
								<i class="fa fa-bolt"></i> Filmové novinky :</h2>
							<div class="breaking-news-content owl-carousel float-left" id="breaking_slider">
								<div class="breaking-post-content">
									<p>
										<a href="#">John Wick 3 => Keanu Reeves se vrací do role zabijáka, kterému se říká Baba Jaga.</a>
									</p>
								</div>
								<div class="breaking-post-content">
									<p>
										<a href="#">Avengers: Endgame u nás za víkend vidělo neuvěřitelných 344 411 diváků. </a>
									</p>
								</div>
								<div class="breaking-post-content">
									<p>
										<a href="#">Captain Marvel – první marvelovská superhrdinka překvapuje - 85%</a>
									</p>
								</div>
							</div>
						</div>
					</div>
					<!-- end col-->

				</div>
				<!-- end row -->
			</div>
		</section>
		<!-- end top bar-->
		<!-- header nav start-->
		<header class="header-box-transprent">
			<div class="container">
				<div class="row">
					<!-- logo end-->
					<div class="col-lg-12">
						<!--nav top end-->
						<nav class="navigation ts-main-menu navigation-landscape">
							<div class="nav-header">
								<a class="nav-brand" href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_ONLINE_TV) ?>">
									<img src="/plugins/onlinetv/template/img/logo-dark.png" alt="">
								</a>
								<div class="nav-toggle"></div>
							</div>
							<!--nav brand end-->

							<div class="nav-menus-wrapper clearfix">
								<!--nav right menu start-->
								<ul class="right-menu align-to-right">
									<li class="header-search">
										<div class="nav-search">
											<div class="nav-search-button">
												<i class="fas fa-search"></i>
											</div>
											<form>
												<div class="nav-search-inner">
													<input type="search" name="search" placeholder="Zadejte název filmu, režiséra, herce">
												</div>
											</form>
										</div>
									</li>
								</ul>
								<!--nav right menu end-->

								<!-- nav menu start-->
								<ul class="nav-menu">
									<li>
										<a href="#">Žánr</a>
										<div class="megamenu-panel ts-mega-menu">
											<div class="megamenu-lists">
												<ul class="megamenu-list list-col-3">
													<li>
														<a href="#">Animovaný</a>
													</li>
													<li>
														<a href="#">Akční</a>
													</li>
													<li>
														<a href="#">Dětský</a>
													</li>
													<li>
														<a href="#">Dobrodružný</a>
													</li>
													<li>
														<a href="#">Dokumentární</a>
													</li>
													<li>
														<a href="#">Drama</a>
													</li>
													<li>
														<a href="#">Fantasy</a>
													</li>
													<li>
														<a href="#">Historický</a>
													</li>
													<li>
														<a href="#">Horor</a>
													</li>
												</ul>
												<ul class="megamenu-list list-col-3">
													<li>
														<a href="#">Hudební</a>
													</li>
													<li>
														<a href="#">Katastrofický</a>
													</li>
													<li>
														<a href="#">Komedie</a>
													</li>
													<li>
														<a href="#">Krimi</a>
													</li>
													<li>
														<a href="#">Kung-fu</a>
													</li>
													<li>
														<a href="#">Muzikály</a>
													</li>
													<li>
														<a href="#">Mysteriózny</a>
													</li>
													<li>
														<a href="#">Psychologický</a>
													</li>
													<li>
														<a href="#">Rodinný</a>
													</li>
												</ul>
												<ul class="megamenu-list list-col-3">
													<li>
														<a href="#">Romantický</a>
													</li>
													<li>
														<a href="#">Sci-Fi</a>
													</li>
													<li>
														<a href="#">Sportovní</a>
													</li>
													<li>
														<a href="#">Taneční</a>
													</li>
													<li>
														<a href="#">Thriller</a>
													</li>
													<li>
														<a href="#">Vojenský</a>
													</li>
													<li>
														<a href="#">Western</a>
													</li>
													<li>
														<a href="#">Životopisný</a>
													</li>
												</ul>
											</div>
										</div>
									</li>
									<li>
										<a href="#">Země</a>
										<div class="megamenu-panel ts-mega-menu">
											<div class="megamenu-lists">
												<ul class="megamenu-list list-col-2">
													<li>
														<a href="#">Česko</a>
													</li>
													<li>
														<a href="#">Francie</a>
													</li>
													<li>
														<a href="#">Hong Kong</a>
													</li>
													<li>
														<a href="#">Itálie</a>
													</li>
												</ul>
												<ul class="megamenu-list list-col-2">
													<li>
														<a href="#">Kanada</a>
													</li>
													<li>
														<a href="#">Německo</a>
													</li>
													<li>
														<a href="#">Velká Británie</a>
													</li>
													<li>
														<a href="#">USA</a>
													</li>
												</ul>
											</div>
										</div>
									</li>
									<li>
										<a href="#">A - Z Seznam</a>
									</li>
									<li>
										<a href="#">DC Comics</a>
									</li>
									<li>
										<a href="#">Marvel</a>
									</li>
									<li>
										<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_ONLINE_TV, 'documentation') ?>">Dokumentace</a>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</header>
	</div>

	<?php
	/* GRID SYSTEM FOR DIFFERENT PAGE - hide page title */
	if ($page1 || !empty($page1) || ($page1 == '404')) { ?>

		<section class="block-wrapper section-layout-0">
			<div class="featured-slider-item" style="background-image: url(/plugins/onlinetv/template/img/page-title-01.jpg); height: 300px;">
				<div class="featured-table">
					<div class="table-cell">
						<div class="container">
							<div class="row">
								<div class="col-lg-7">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	<?php } ?>

