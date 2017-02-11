<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists ('config.php')) die('[index.php] config.php not found');
require_once 'config.php';

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="<?php echo $site_language; ?>"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="<?php echo $site_language; ?>"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="<?php echo $site_language; ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="<?php echo $site_language; ?>">
<!--<![endif]-->
<head>

	<meta charset="utf-8">
	<!-- Document Title
	============================================= -->
	<title><?php echo $jkv["title"];
		if ($jkv["title"]) { ?> &raquo; <?php }
		echo $PAGE_TITLE; ?></title>

	<!-- Share Social Network
	============================================= -->
	<!-- for Google -->
	<meta name="keywords" content="<?php echo trim ($PAGE_KEYWORDS); ?>">
	<meta name="description" content="<?php echo trim ($PAGE_DESCRIPTION); ?>">
	<meta name="author" content="<?php echo $jkv["metaauthor"]; ?>">

	<!-- for Facebook -->
	<meta property="og:title" content="<?php echo $PAGE_TITLE; ?>"/>
	<meta property="og:type" content="article"/>
	<meta property="og:image" content="<?php echo (($PAGE_IMAGE) ? $PAGE_IMAGE : $SHOWIMG); ?>"/>
	<meta property="og:description" content="<?php echo trim ($PAGE_DESCRIPTION); ?>"/>

	<!-- for Twitter -->
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:title" content=""/>
	<meta name="twitter:description" content=""/>
	<meta name="twitter:image" content=""/>

<?php if ($page == '404') { ?>
	<meta name="robots" content="noindex, follow">
<?php } else { ?>
	<meta name="robots" content="<?php echo $jk_robots; ?>">
<?php }
if ($page == "success" or $page == "logout") { ?>
	<meta http-equiv="refresh" content="1;URL=<?php echo $_SERVER['HTTP_REFERER']; ?>">
<?php } ?>
	<link rel="canonical" href="<?php echo (JAK_USE_APACHE ? substr (BASE_URL, 0, - 1) : BASE_URL) . JAK_rewrite::jakParseurl ($page, $page1, $page2, $page3, $page4, $page5, $page6); ?>">

<?php if (isset($JAK_RSS_DISPLAY) && isset($JAK_RSS_TITLE)) { ?>
	<link rel="alternate" type="application/rss+xml" title="<?php echo $JAK_RSS_TITLE; ?> RSS 2.0" href="<?php echo $P_RSS_LINK; ?>">
<?php } ?>

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS and FONTS
	================================================== -->
	<link href='http://fonts.googleapis.com/css?family=Hammersmith+One' rel='stylesheet' type='text/css'>
	<?php if ($jkv["activeroyalslider_qed_tpl"] == 1) { ?>
	<link rel="stylesheet" type="text/css" href="/template/<?php echo $jkv["sitestyle"];?>/js-plugins/royalslider/royalslider.css" />
	<link rel="stylesheet" type="text/css" href="/template/<?php echo $jkv["sitestyle"];?>/js-plugins/royalslider/skins/minimal-white/rs-minimal-white.css">
	<?php } ?>
	<link type="text/css" rel="stylesheet" href="/template/<?php echo $jkv["sitestyle"];?>/icons/custom-icons/css/custom-icons.css">
	<link type="text/css" rel="stylesheet" href="/template/<?php echo $jkv["sitestyle"];?>/js-plugins/external-plugins.min.css">
	<link type="text/css" rel="stylesheet" href="/template/<?php echo $jkv["sitestyle"];?>/css/layout/neko-framework-layout.css">
	<link type="text/css" rel="stylesheet" id="color" href="/template/<?php echo $jkv["sitestyle"];?>/css/color/neko-framework-green.css">
	<link type="text/css" rel="stylesheet" id="color" href="/assets/plugins/owl.carousel/assets/owl.carousel.css">
	<link type="text/css" rel="stylesheet" id="color" href="/assets/plugins/owl.carousel/assets/owl.theme.green.css">

	<?php if ($SHOWSOCIALBUTTON) { ?>
	<link href="/assets/plugins/jquery-sollist/jquery.sollist.min.css" rel="stylesheet" type="text/css" media="screen"/>
	<?php } ?>

	<link rel="stylesheet" href="/template/<?php echo $jkv["sitestyle"];?>/css/screen.css" type="text/css"/>

	<!-- CUSTOM CSS
	================================================== -->
<?php if (!$JAK_SHOW_NAVBAR) { ?>
	<style type="text/css">
		/* Fix 'body padding' if navbar is hidden */
		body {
			padding-top: 0;
		}
	</style>
<?php } ?>

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png">

	<!-- Basic Jquery
	============================================= -->
	<script src="/template/<?php echo $jkv["sitestyle"];?>/js-plugins/modernizr/modernizr.custom.js"></script>

	<!-- Import templates for in between head
	============================================= -->
	<?php if (isset($JAK_HOOK_HEAD_TOP) && is_array ($JAK_HOOK_HEAD_TOP)) foreach ($JAK_HOOK_HEAD_TOP as $headt) {
		include_once APP_PATH . $headt['phpcode'];
	}
	echo $JAK_HEADER_CSS; ?>

</head>
<body class="activate-appear-animation header-2">

<!-- global-wrapper -->
<div id="global-wrapper">

<?php if ($JAK_SHOW_NAVBAR) { ?>

	<!-- header -->
	<header class="menu-header navbar-fixed-top" role="banner">
		<section id="pre-header">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 hidden-xs">
						<ul class="quick-menu">
							<?php if ($jkv["sitemapShow_qed_tpl"] == 1) { ?>
								<li><a href="/" class="linkLeft">Site map</a></li>
							<?php }
							if ($jkv["loginShow_qed_tpl"] == 1) {
								if (!JAK_USERID) { ?>
								<li><a href="/" id="login">Login</a></li>
							<?php } else { ?>
								<li><a href="<?php echo $P_USR_LOGOUT; ?>" id="logout"><?php echo $tl["title"]["t6"]; ?></a></li>
								<li><a href="<?php echo BASE_URL; ?>admin/">Admin</a></li>
							<?php	} } ?>
						</ul>
					</div>
					<div class="col-sm-6 col-xs-12 quick-contact">
						<?php if ($jkv["phoneShow_qed_tpl"] == 1) { ?>
							<div class="contact-phone">
								<i class="icon-mobile"></i>
								<a href="tel:<?php echo $jkv["phoneLinks_qed_tpl"]; ?>"><?php echo $jkv["phoneLinks_qed_tpl"]; ?></span></a>
							</div>
						<?php } ?>

						<ul class="social-icons">
							<?php if ($jkv["facebookShow_qed_tpl"] == 1) { ?>
								<li>
									<a href="<?php echo $jkv["facebookLinks_qed_tpl"]; ?>" target="_blank"><i class="icon-facebook"></i></a>
								</li>
							<?php }
							if ($jkv["twitterShow_qed_tpl"] == 1) { ?>
								<li>
									<a href="<?php echo $jkv["twitterLinks_qed_tpl"]; ?>" target="_blank"><i class="icon-twitter"></i></a>
								</li>
							<?php }
							if ($jkv["googleShow_qed_tpl"] == 1) { ?>
								<li>
									<a href="<?php echo $jkv["googleLinks_qed_tpl"]; ?>" target="_blank"><i class="icon-gplus"></i></a>
								</li>
							<?php }
							if ($jkv["instagramShow_qed_tpl"] == 1) { ?>
								<li>
									<a href="<?php echo $jkv["instagramLinks_qed_tpl"]; ?>" target="_blank"><i class="icon-instagramm"></i></a>
								</li>
							<?php }
							if ($jkv["emailShow_qed_tpl"] == 1) { ?>
								<li>
									<a href="mailto:<?php echo $jkv["emailLinks_qed_tpl"]; ?>" target="_blank"><i class="icon-mail"></i></a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<!-- hamburger button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- / hamburger button -->

					<!-- Logo -->
					<a class="navbar-brand" href="<?php echo BASE_URL; ?>"><img src="<?php echo $jkv["logo1_qed_tpl"]; ?>" alt="Q.E.D. website template"/></a>
					<!-- /Logo -->
				</div>
				<div class="collapse navbar-collapse">
					<!-- Main navigation -->
					<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/navbar.php'; ?>
					<!-- Hook -->
					<?php if (isset($JAK_HOOK_HEADER) && is_array ($JAK_HOOK_HEADER)) foreach ($JAK_HOOK_HEADER as $hheader) {
						include_once APP_PATH . $hheader['phpcode'];
					} ?>

					<!-- / End main navigation -->
				</div>


			</nav>
		</div>

	</header>
	<!-- header -->

<?php } ?>

	<!-- content -->
	<main id="content">

		<!-- Page Title -->
		<?php if ($JAK_SHOW_NAVBAR) { if (!isset($page) || empty($page) || ($page == 'offline')) { // Code for homepage ?>

		<?php } elseif (isset($page)) { // Code for all page without home page ?>

			<header class="page-header light-color">

				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h1><?php echo jak_cut_text ($PAGE_TITLE, 30, "..."); ?></h1>
						</div>
						<div class="col-md-6">
							<ol class="breadcrumb">
								<li>
									<a href="<?php echo BASE_URL; ?>"><?php foreach ($jakcategories as $ca) if ($ca['catorder'] == 1 && $ca['showmenu'] == 1 && $ca['showfooter'] == 0) {
											echo $ca["name"];
										} ?></a>
								</li>
								<?php if ($JAK_TPL_PLUG_T && !empty($page1) && !is_numeric ($page1)) { ?>
									<li><a href="<?php echo $JAK_TPL_PLUG_URL; ?>"><?php echo $JAK_TPL_PLUG_T; ?></a></li>
								<?php } ?>
								<li class="active">
									<?php if ($page == "edit-profile") {
										echo sprintf ($tl["login"]["l15"], $jakuser->getVar ("username"));
									} else {
										echo jak_cut_text ($PAGE_TITLE, 30, "...");
									} ?>
								</li>
							</ol>
						</div>
					</div>
				</div>

			</header>

		<?php } } ?>

		<?php if (isset($JAK_HOOK_BELOW_HEADER) && is_array ($JAK_HOOK_BELOW_HEADER)) foreach ($JAK_HOOK_BELOW_HEADER as $bheader) {
			// Import templates below header
			include_once APP_PATH . $bheader['phpcode'];
		} ?>


		<?php if (empty($JAK_HOOK_SIDE_GRID) && (!empty($page))) { ?>

		<section class="pt-medium">

			<div class="container">
				<div class="row">

		<?php } ?>

		<?php if (empty($JAK_HOOK_SIDE_GRID) && (empty($page))) { ?>

		<?php } ?>


		<?php if (!empty($JAK_HOOK_SIDE_GRID)) { ?>

		<section class="pt-medium">

			<div class="container">
				<div class="row">

					<!-- Sidebar if left -->
					<?php if (!empty($JAK_HOOK_SIDE_GRID) && $jkv["sidebar_location_tpl"] == "left") include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/sidebar.php'; ?>
					<!-- / sidebar -->
					<div class="<?php echo ($JAK_HOOK_SIDE_GRID ? "col-md-9" : "col-md-12"); ?>">

		<?php } ?>


