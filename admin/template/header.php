<!DOCTYPE html>
<html lang="<?php echo $site_language; ?>">
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<meta charset="utf-8"/>
	<title>ENVO - Admin Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="apple-touch-icon" href="pages/ico/60.png">
	<link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
	<link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
	<link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<!-- BEGIN Vendor CSS-->
	<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="assets/plugins/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="assets/plugins/prism/prism.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css">
	<!-- BEGIN Pages CSS-->
	<link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
	<link class="main-stylesheet" href="pages/css/pages.css" rel="stylesheet" type="text/css"/>
	<!-- BEGIN General Stylesheet with custom modifications -->
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">
	<!--[if lte IE 9]>
	<link href="pages/css/ie9.css" rel="stylesheet" type="text/css"/>
	<![endif]-->
	<script type="text/javascript">
		window.onload = function () {
			// fix for windows 8
			if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
				document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
		}
	</script>
	<!-- BEGIN HOOKS - HEADER -->
	<?php if (isset($JAK_HOOK_HEAD_ADMIN) && is_array ($JAK_HOOK_HEAD_ADMIN)) foreach ($JAK_HOOK_HEAD_ADMIN as $headt) {
		include_once APP_PATH . $headt['phpcode'];
	} ?>

</head>
<body class="fixed-header has-detached-right" data-spy="scroll" data-target=".sidebar-detached" data-offset-top="70">
<?php if ($JAK_PROVED) { ?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar" data-pages="sidebar">
	<div id="appMenu" class="sidebar-overlay-slide from-top">
		<div class="row">
			<div class="col-xs-6 no-padding">
				<a href="#" class="p-l-40"><img src="assets/img/demo/social_app.svg" alt="socail">
				</a>
			</div>
			<div class="col-xs-6 no-padding">
				<a href="#" class="p-l-10"><img src="assets/img/demo/email_app.svg" alt="socail">
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 m-t-20 no-padding">
				<a href="#" class="p-l-40"><img src="assets/img/demo/calendar_app.svg" alt="socail">
				</a>
			</div>
			<div class="col-xs-6 m-t-20 no-padding">
				<a href="#" class="p-l-10"><img src="assets/img/demo/add_more.svg" alt="socail">
				</a>
			</div>
		</div>
	</div>
	<!-- BEGIN SIDEBAR HEADER -->
	<div class="sidebar-header">
		<img src="assets/img/logo_white.png" alt="logo" class="brand" data-src="assets/img/logo_white.png" data-src-retina="assets/img/logo_white_2x.png" width="78" height="22">
		<div class="sidebar-header-controls">
			<button data-pages-toggle="#appMenu" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" type="button">
				<i class="fa fa-angle-down fs-16"></i>
			</button>
			<button data-toggle-pin="sidebar" class="btn btn-link visible-lg-inline" type="button"><i class="fa fs-12"></i>
			</button>
		</div>
	</div>
	<!-- END SIDEBAR HEADER -->
	<!-- BEGIN SIDEBAR MENU -->
	<div class="sidebar-menu">
		<?php include_once APP_PATH . 'admin/template/navbar.php'; ?>
		<div class="clearfix"></div>
	</div>
	<!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
<!-- START PAGE-CONTAINER -->
<div class="page-container">
	<!-- START PAGE HEADER WRAPPER -->
	<!-- START HEADER -->
	<div class="header ">
		<!-- START MOBILE CONTROLS -->
		<div class="container-fluid relative">
			<!-- LEFT SIDE -->
			<div class="pull-left full-height visible-sm visible-xs">
				<!-- START ACTION BAR -->
				<div class="header-inner">
					<a href="#" class="btn-link toggle-sidebar visible-sm-inline-block visible-xs-inline-block padding-5" data-toggle="sidebar">
						<span class="icon-set menu-hambuger"></span>
					</a>
				</div>
				<!-- END ACTION BAR -->
			</div>
			<div class="pull-center hidden-md hidden-lg">
				<div class="header-inner">
					<div class="brand inline">
						<img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
					</div>
				</div>
			</div>
		</div>
		<!-- END MOBILE CONTROLS -->
		<div class=" pull-left sm-table hidden-xs hidden-sm">
			<div class="header-inner">
				<div class="brand inline">
					<img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
				</div>
				<div class="inline b-grey b-l p-l-30">
					<a href="#" class="search-link" data-toggle="search"><i class="pg-search"></i>Type anywhere to
						<span class="bold">search</span></a>
				</div>
			</div>
		</div>
		<div class=" pull-right">
			<!-- START User Info-->
			<div class="visible-lg visible-md m-t-10">
				<div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
					<span class="bold"><?php echo $JAK_WELCOME_NAME; ?></span>
				</div>
				<div class="dropdown pull-right">
					<button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="thumbnail-wrapper d32 circular inline m-t-5">
              <img src="<?php echo BASE_URL_ORIG . basename (JAK_FILES_DIRECTORY) . '/userfiles/' . $jakuser->getVar ("picture"); ?>" alt="" data-src="<?php echo BASE_URL_ORIG . basename (JAK_FILES_DIRECTORY) . '/userfiles/' . $jakuser->getVar ("picture"); ?>" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="32" height="32">
            </span>
					</button>
					<ul class="dropdown-menu profile-dropdown" role="menu">
						<li>
							<a href="index.php?p=user&amp;sp=edit&amp;ssp=<?php echo JAK_USERID; ?>">
								<i class="pg-settings_small"></i> <?php echo $tl["hf_text"]["hftxt4"]; ?>
							</a>
						</li>
						<li><a href="#"><i class="fa fa-info"></i> <?php echo $tl["hf_text"]["hftxt5"]; ?></a></li>
						<li class="bg-master-lighter">
							<a href="index.php?p=logout" data-confirm-logout="<?php echo $tl["log_out"]["logout1"]; ?>" class="clearfix">
								<span class="pull-left"><?php echo $tl["log_out"]["logout"]; ?></span>
								<span class="pull-right"><i class="pg-power"></i></span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- END User Info-->
		</div>
	</div>
	<!-- END HEADER -->
	<!-- END PAGE HEADER WRAPPER -->
	<!-- START PAGE CONTENT WRAPPER -->
	<div class="page-content-wrapper">
		<!-- START PAGE CONTENT -->
		<div class="content">
			<!-- START JUMBOTRON -->
			<div class="jumbotron" data-pages="parallax">
				<div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
					<?php if ($page != '404' && !empty($page))	{ ?>
						<div class="inner">
							<!-- START BREADCRUMB -->
							<ul class="breadcrumb">
								<li><h5 class="title bold"><?php echo $SECTION_TITLE; ?></h5></li>
								<li><span class="desc"><?php echo $SECTION_DESC; ?></span></li>
							</ul>
							<!-- END BREADCRUMB -->
						</div>
					<?php } ?>
				</div>
			</div>
			<!-- END JUMBOTRON -->
			<!-- START CONTAINER FLUID -->
			<div class="container-fluid container-fixed-lg">
				<!-- BEGIN PLACE PAGE CONTENT HERE -->

				<?php } else { ?>

<?php } ?>