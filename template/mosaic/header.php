<!DOCTYPE html>
<html lang="<?php echo $site_language; ?>">
<head>
	<meta charset="utf-8">
	<title><?php echo $PAGE_TITLE;
		if ($PAGE_TITLE) { ?> - <?php }
		echo $jkv["title"]; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="keywords" content="<?php echo trim ($PAGE_KEYWORDS); ?>">
	<meta name="description" content="<?php echo trim ($PAGE_DESCRIPTION); ?>">
	<meta name="author" content="<?php echo $jkv["metaauthor"]; ?>">
	<?php if ($page == '404') { ?>
		<meta name="robots" content="noindex, follow">
	<?php } else { ?>
		<meta name="robots" content="<?php echo $jk_robots; ?>">
	<?php }
	if ($page == "success" or $page == "logout") { ?>
		<meta http-equiv="refresh" content="1;URL=<?php echo $_SERVER['HTTP_REFERER']; ?>">
	<?php } ?>

	<link rel="canonical" href="<?php echo (JAK_USE_APACHE ? substr (BASE_URL, 0, - 1) : BASE_URL) . JAK_rewrite::jakParseurl ($page, $page1, $page2, $page3, $page4, $page5, $page6); ?>">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/stylesheet.css?=<?php echo $jkv["updatetime"]; ?>"
		type="text/css">

	<link rel="stylesheet"
		href="<?php echo BASE_URL; ?>assets/plugins/bootstrapv3/css/bootstrap.min.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css"
		media="screen"/>
	<?php if ($JAK_SHOW_NAVBAR) include_once APP_PATH . 'template/mosaic/customstyle.php'; ?>

	<?php if (isset($JAK_RSS_DISPLAY) && isset($JAK_RSS_TITLE)) { ?>
		<link rel="alternate" type="application/rss+xml" title="<?php echo $JAK_RSS_TITLE; ?> RSS 2.0"
			href="<?php echo $P_RSS_LINK; ?>">
	<?php } ?>

	<?php if (!$jkv["langdirection"]) { ?>
		<!-- RTL Support -->
		<link rel="stylesheet"
			href="<?php echo BASE_URL; ?>template/mosaic/css/rtlscreen.css?=<?php echo $jkv["updatetime"]; ?>"
			type="text/css" media="screen">
		<!-- End RTL Support -->
	<?php } ?>

	<?php if (JAK_ASACCESS && $jkv["styleswitcher_tpl"]) { ?>
		<link rel="stylesheet"
			href="<?php echo BASE_URL; ?>template/mosaic/css/stylechanger.css?=<?php echo $jkv["updatetime"]; ?>"
			type="text/css">
	<?php } ?>

	<script src="<?php echo BASE_URL; ?>assets/plugins/jquery/jquery.js?=<?php echo $jkv["updatetime"]; ?>"></script>
	<script src="<?php echo BASE_URL; ?>assets/plugins/bootstrapv3/js/bootstrap.min.js?=<?php echo $jkv["updatetime"]; ?>"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/functions.js?=<?php echo $jkv["updatetime"]; ?>"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Import templates for in between head -->
	<?php if (isset($JAK_HOOK_HEAD_TOP) && is_array ($JAK_HOOK_HEAD_TOP)) foreach ($JAK_HOOK_HEAD_TOP as $headt) {
		include_once APP_PATH . $headt['phpcode'];
	}
	echo $JAK_HEADER_CSS; ?>
</head>
<body class="<?php echo $jkv["theme_mosaic_tpl"];
if ($JAK_SHOW_NAVBAR && $jkv["style_mosaic_tpl"] == "boxed") echo " boxed-layout container"; ?>">

<?php if ($jkv["offline"] == 1 && JAK_ASACCESS) { ?>
	<div class="alert-offline"><?php echo $tl["title"]["t10"]; ?></div>
<?php } ?>

<!-- Import templates before everything -->
<?php if (isset($JAK_HOOK_BODY_TOP) && is_array ($JAK_HOOK_BODY_TOP)) foreach ($JAK_HOOK_BODY_TOP as $bodyt) {
	include_once APP_PATH . $bodyt['phpcode'];
} ?>



<?php if ($JAK_SHOW_NAVBAR) { ?>
<!-- Navbar -->
<nav
	class="navbar navbar-<?php echo $jkv["navbarbw_mosaic_tpl"]; ?><?php if ($jkv["navbarstyle_mosaic_tpl"]) echo ' navbar-fixed-top'; ?> sb-slide">
	<?php if ($jkv["mininavbarshow_mosaic_tpl"]) { ?>
		<!-- Extra Bar -->
		<div class="mini-navbar mini-navbar-<?php echo $jkv["mininavbarcolour_mosaic_tpl"]; ?> hidden-xs">
			<div class="container" id="mosaic-mini-txt">
				<?php echo $jkv["mininavbartxt_mosaic_tpl"]; ?>
			</div>
		</div>
	<?php } ?>
	<!-- Left Control -->
	<div class="sb-toggle-left navbar-left">
		<i class="fa fa-bars"></i>
	</div><!-- /.sb-control-left -->

	<div class="container">
		<!-- Logo -->
		<div id="logo">
			<a href="<?php echo BASE_URL; ?>"><img src="<?php echo $jkv["logo_mosaic_tpl"]; ?>" alt="logo"
					id="main-logo"><span
					class="sr-only"><?php echo $jkv["title"]; ?></span></a>
		</div><!-- /#logo -->

		<!-- Menu -->
		<?php include_once APP_PATH . 'template/mosaic/navbar.php'; ?>
		<!-- Hook -->
		<?php if (isset($JAK_HOOK_HEADER) && is_array ($JAK_HOOK_HEADER)) foreach ($JAK_HOOK_HEADER as $hheader) {
			include_once APP_PATH . $hheader['phpcode'];
		} ?>
	</div>
</nav>

<div id="sb-site">

	<!-- Import templates below header -->
	<?php if (isset($JAK_HOOK_BELOW_HEADER) && is_array ($JAK_HOOK_BELOW_HEADER)) foreach ($JAK_HOOK_BELOW_HEADER as $bheader) {
		include_once APP_PATH . $bheader['phpcode'];
	} ?>

	<?php if ($page == "success" || $page == "error" || $JAK_TPL_PLUG_URL) { ?>

		<!-- Topic Header -->
		<div class="wrapper">
			<div class="topic">
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<h3 class="primary-font"><?php if ($page == "edit-profile") {
									echo sprintf ($tl["login"]["l15"], $jakuser->getVar ("username"));
								} else {
									echo $PAGE_TITLE;
								} ?></h3>
						</div>
						<div class="col-sm-8">
							<ol class="breadcrumb pull-right hidden-xs">
								<li><a
										href="<?php echo BASE_URL; ?>"><?php foreach ($jakcategories as $ca) if ($ca['catorder'] == 1 && $ca['showmenu'] == 1 && $ca['showfooter'] == 0) {
											echo $ca["name"];
										} ?></a></li>
								<?php if ($JAK_TPL_PLUG_T && !empty($page1) && !is_numeric ($page1)) { ?>
									<li><a href="<?php echo $JAK_TPL_PLUG_URL; ?>"><?php echo $JAK_TPL_PLUG_T; ?></a></li>
								<?php } ?>
								<li class="active"><?php if ($page == "edit-profile") {
										echo sprintf ($tl["login"]["l15"], $jakuser->getVar ("username"));
									} else {
										echo $PAGE_TITLE;
									} ?></li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php } ?>

	<!-- Main Container -->
	<div class="container main-site">

		<!-- Main Row -->
		<div class="row">

			<!-- Sidebar if right -->
			<?php if (!empty($JAK_HOOK_SIDE_GRID) && $jkv["sidebar_location_tpl"] == "left") include_once APP_PATH . 'template/mosaic/sidebar.php'; ?>

			<div class="<?php echo ($JAK_HOOK_SIDE_GRID ? "col-md-9" : "col-md-12"); ?>">
<?php } ?>