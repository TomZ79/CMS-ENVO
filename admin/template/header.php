<?php
echo $Html -> addDoctype('html5');
?>

<html lang="<?= $site_language ?>">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
		<meta charset="utf-8"/>
		<title>ENVO - Admin Dashboard</title>
		<link rel="apple-touch-icon" href="pages/ico/60.png">
		<link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
		<link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
		<link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
		<?php
		// Add Html Element -> endTag (Arguments: name, content)
		$meta = array (
			array ('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'),
			array ('name' => 'apple-mobile-web-app-capable', 'content' => 'yes'),
			array ('name' => 'apple-touch-fullscreen', 'content' => 'yes'),
			array ('name' => 'apple-mobile-web-app-status-bar-style', 'content' => 'default'),
			array ('name' => 'description', 'content' => ''),
			array ('name' => 'author', 'content' => ''),
		);
		echo $Html -> addMeta($meta);
		?>

		<!-- BEGIN Vendor CSS-->
		<?php
		// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
		// Pace preloader
		echo $Html -> addStylesheet('assets/plugins/pace/templates/pace-theme-loading-bar.min.css');
		// Bootstrap
		echo $Html -> addStylesheet('../assets/plugins/bootstrap/bootstrapv4/4.0.0/css/bootstrap.min.css');
		// Font Awesomemin
		echo $Html -> addStylesheet('../assets/plugins/font-awesome/4.7.0/css/font-awesome.min.css');
		// Scrollbar
		echo $Html -> addStylesheet('assets/plugins/jquery-scrollbar/0.2.11/jquery.scrollbar.css?=v0.2.11', 'screen');
		//FileInput
		echo $Html -> addStylesheet('assets/plugins/bootstrap-fileinput/css/fileinput.min.css?=v4.3.7', 'screen');
		// Bootstrap Select
		echo $Html -> addStylesheet('/assets/plugins/bootstrap-select2/4.0.3/css/select2.min.css', 'screen');
		// Bootstrap TagsInput
		echo $Html -> addStylesheet('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.css?=v0.8.0', 'screen');
		// Bootstrap DateTimePicker
		echo $Html -> addStylesheet('assets/plugins/bootstrap-datetimepicker-4/css/bootstrap-datetimepicker.min.css?=v4.17.47');
		// Bootstrap IconPicker
		echo $Html -> addStylesheet('assets/plugins/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css?=v1.7.0');
		// Bootstrap GlyphIcons
		echo $Html -> addStylesheet('../assets/plugins/bootstrap-glyphicons/glyphicons-pro/css/glyphicons-pro.min.css');
		// Animate
		echo $Html -> addStylesheet('assets/css/animate.min.css');
		// Plugin DataTable
		if ($page == 'plugins' || $page == 'page' || $page == 'news' || $page == 'users' || $page == 'usergroup' || $page == 'tags') {
			echo $Html -> addStylesheet('https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css');
		}
		?>

		<!-- BEGIN Pages CSS-->
		<?php
		// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
		echo $Html -> addStylesheet('pages/css/pages-icons.css');
		echo $Html -> addStylesheet('pages/css/pages.min.css?=v3.0.2', '', array ('class' => 'main-stylesheet'));
		?>

		<!-- BEGIN General Stylesheet with custom modifications -->
		<?php
		// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
		echo $Html -> addStylesheet('assets/css/style.min.css');
		?>
		<style>
			button:disabled,
			button[disabled]{
				background-color: #CCC !important;
				border-color: #CCC !important;
				color: #000 !important;
				cursor: no-drop;
			}
			code {
				font-size: 1em;
			}
		</style>

		<!--[if lte IE 9]>
		<link href="pages/css/ie9.css" rel="stylesheet" type="text/css"/>
		<![endif]-->
		<script>
			window.onload = function () {
				// fix for windows 8
				if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
					document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
			}
		</script>

		<!-- BEGIN HOOKS - HEADER -->
		<?php if (isset($ENVO_HOOK_HEAD_ADMIN) && is_array($ENVO_HOOK_HEAD_ADMIN)) foreach ($ENVO_HOOK_HEAD_ADMIN as $headt) {
			include_once APP_PATH . $headt['phpcode'];
		} ?>

		<!-- HEADER JS -->
		<?php
		// Add Html Element -> addScript (Arguments: src, optional assoc. array)
		echo $Html -> addScript('/assets/plugins/jquery/jquery-1.11.1.min.js');
		echo $Html -> addScript('assets/plugins/bootstrap-notify/bootstrap-notify.min.js?=v3.1.5');
		?>

	</head>
<body class="fixed-header overlay-disabled">
	<!-- PACE PRELOADER -->
	<div id="pace"></div>
<?php if ($ENVO_PROVED) { ?>

	<!-- BEGIN SIDEBAR -->
	<nav class="page-sidebar" data-pages="sidebar">

		<!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
		<div id="appMenu" class="sidebar-overlay-slide from-top">
			<div class="row">
				<div class="col-6 no-padding">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('#', '<img src="assets/img/demo/social_app.svg" alt="socail">', '', 'p-l-40');
					?>

				</div>
				<div class="col-6 no-padding">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('#', '<img src="assets/img/demo/email_app.svg" alt="socail">', '', 'p-l-10');
					?>

				</div>
			</div>
			<div class="row">
				<div class="col-6 m-t-20 no-padding">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('#', '<img src="assets/img/demo/calendar_app.svg" alt="socail">', '', 'p-l-40');
					?>

				</div>
				<div class="col-6 m-t-20 no-padding">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('#', '<img src="assets/img/demo/add_more.svg" alt="socail">', '', 'p-l-10');
					?>

				</div>
			</div>
			<div class="sidebar-footer text-center hidden-xs">

				<?php
				// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
				echo $Html -> addAnchor('index.php?p=changelog', $tl["submenu"]["sm4"]);
				echo(' | ');
				echo $Html -> addAnchor('index.php?p=cmshelp', 'CMS Help');
				?>

			</div>
		</div>
		<!-- END SIDEBAR MENU TOP TRAY CONTENT-->

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

			<?php
			include_once APP_PATH . 'admin/template/navbar.php';
			// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
			echo $Html -> addDiv('', '', array ('class' => 'clearfix'));
			?>

		</div>
		<!-- END SIDEBAR MENU -->
	</nav>
	<!-- END SIDEBAR -->

	<!-- START PAGE-CONTAINER -->
	<div class="page-container">
	<!-- START PAGE HEADER WRAPPER -->
	<!-- START HEADER -->
	<div class="header ">
		<!-- START MOBILE SIDEBAR TOGGLE -->
		<a href="#" class="btn-link toggle-sidebar d-lg-none pg pg-menu" data-toggle="sidebar"></a>
		<!-- END MOBILE SIDEBAR TOGGLE -->

		<div class="float-left sm-table hidden-xs hidden-sm">
			<div class="header-inner">
				<div class="brand inline">
					<a href="<?= BASE_URL_ORIG ?>" target="_blank">
						<img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
					</a>
				</div>
				<div class="inline p-l-30">
					<!-- START QUICK LIST -->
					<ul class="quick-list m-0 hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
						<li class="p-r-15 inline">
							<div class="dropdown">
								<a href="javascript:;" id="notification-center" class="header-icon pg pg-thumbs" data-toggle="dropdown"></a>
								<!-- START Quick Dropdown -->
								<div class="dropdown-menu quick-toggle" role="menu" aria-labelledby="notification-center">
									<!-- START Quick -->
									<div class="quick-panel grid-dropdown">
										<!-- START Quick Body-->
										<div class="quick-body scrollable">
											<div class="row stacked">
												<div class="col-4">

													<?php
													// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
													echo $Html -> addAnchor('index.php?p=categories', '<i class="pg-unordered_list"></i>' . $tl["submenu"]["sm110"]);
													?>

												</div>
												<div class="col-4">

													<?php
													// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
													echo $Html -> addAnchor('index.php?p=page', '<i class="fa fa-file"></i>' . $tl["submenu"]["sm120"]);
													?>

												</div>
												<div class="col-4">

													<?php
													// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
													echo $Html -> addAnchor('index.php?p=news', '<i class="fa fa-newspaper-o"></i>' . $tl["submenu"]["sm160"]);
													?>

												</div>
											</div>

											<?php $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Blog"');
											if ($envodb -> affected_rows > 0) { ?>
												<div class="row stacked">
													<div class="col-sm-12 pluginname">
														Plugin Blog
													</div>
													<div class="col-4">

														<?php
														// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
														echo $Html -> addAnchor('index.php?p=blog&amp;sp=categories', '<i class="pg-unordered_list"></i>' . $tlblog["blog_menu"]["blogm4"]);
														?>

													</div>
													<div class="col-4">

														<?php
														// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
														echo $Html -> addAnchor('index.php?p=blog', '<i class="fa fa-file"></i>' . $tlblog["blog_menu"]["blogm1"]);
														?>

													</div>
													<div class="col-4">

														<?php
														// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
														echo $Html -> addAnchor('index.php?p=blog&amp;sp=setting', '<i class="pg-settings_small"></i>' . $tlblog["blog_menu"]["blogm9"]);
														?>

													</div>
												</div>
											<?php } ?>

											<?php $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Download"');
											if ($envodb -> affected_rows > 0) { ?>
												<div class="row stacked">
													<div class="col-sm-12 pluginname">
														Plugin Download
													</div>
													<div class="col-4">

														<?php
														// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
														echo $Html -> addAnchor('index.php?p=download&amp;sp=categories', '<i class="pg-unordered_list"></i>' . $tld["downl_menu"]["downlm4"]);
														?>

													</div>
													<div class="col-4">

														<?php
														// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
														echo $Html -> addAnchor('index.php?p=download', '<i class="fa fa-file"></i>' . $tld["downl_menu"]["downlm1"]);
														?>

													</div>
													<div class="col-4">

														<?php
														// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
														echo $Html -> addAnchor('index.php?p=download&amp;sp=setting', '<i class="pg-settings_small"></i>' . $tld["downl_menu"]["downlm9"]);
														?>

													</div>
												</div>
											<?php } ?>

										</div>
										<!-- END Quick Body-->
									</div>
									<!-- END Quick -->
								</div>
								<!-- END Quick Dropdown -->
							</div>
						</li>
					</ul>
					<!-- END QUICK LIST -->
					<a href="#" class="search-link" data-toggle="search">
						<i class="pg-search"></i>
						<?= $tl["hf_text"]["hftxt7"] ?>
					</a>
				</div>
			</div>
		</div>
		<div class=" float-right">
			<!-- START USER INFO -->
			<div class="visible-lg visible-md">
				<div class="float-left p-r-10 p-t-10 fs-16 font-heading">

					<?php
					// Add Html Element -> addAnchor (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', $ENVO_WELCOME_NAME, 'bold');
					?>

				</div>
				<div class="dropdown float-right">
					<button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="thumbnail-wrapper d32 circular inline m-t-5">
              <img src="<?= '../' . basename(ENVO_FILES_DIRECTORY) . '/userfiles' . $envouser -> getVar("picture") ?>" alt="" data-src="<?= '../' . basename(ENVO_FILES_DIRECTORY) . '/userfiles' . $envouser -> getVar("picture") ?>" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="32" height="32">
            </span>
					</button>
					<div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">

						<?php
						// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
						echo $Html -> addAnchor('index.php?p=users&amp;sp=edituser&amp;id=' . ENVO_USERID, '<i class="pg-settings_small"></i>' . $tl["hf_text"]["hftxt4"], '', 'dropdown-item');
						?>

						<a href="index.php?p=logout" data-confirm-logout="<?= $tl["log_out"]["logout1"] ?>" class="clearfix bg-master-lighter dropdown-item">
							<span class="float-left"><?= $tl["log_out"]["logout"] ?></span>
							<span class="float-right"><i class="pg-power"></i></span>
						</a>
					</div>
				</div>
			</div>
			<!-- END USER INFO -->
		</div>
	</div>
	<!-- END HEADER -->
	<!-- END PAGE HEADER WRAPPER -->
	<!-- START PAGE CONTENT WRAPPER -->
	<div class="page-content-wrapper <?php if ($page == 'cmshelp') echo 'full-height'; ?>">
	<!-- START PAGE CONTENT -->
	<div class="content <?php if ($page == 'cmshelp') echo 'full-height'; ?>">
	<!-- START JUMBOTRON -->
	<?php if ($page != 'cmshelp' && $page != '404' && !empty($page)) { ?>
		<div class="jumbotron" data-pages="parallax">
			<div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20 p-t-10 p-b-10">
				<div class="inner">
					<!-- START BREADCRUMB -->
					<ol class="breadcrumb d-flex">
						<li class="breadcrumb-item align-items-center">
							<h5 class="title bold" style="margin: 0;line-height: 24px;"><?= $SECTION_TITLE ?></h5>
						</li>
						<li class="breadcrumb-item" style="position: relative;top: 1px;">
							<span class="desc"><?= $SECTION_DESC ?></span>
						</li>
					</ol>
					<!-- END BREADCRUMB -->
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- END JUMBOTRON -->
	<!-- START CONTAINER FLUID -->
	<?php if ($page != 'cmshelp') { ?>
		<div class="container-fluid container-fixed-lg">
	<?php } ?>
	<!-- BEGIN PLACE PAGE CONTENT HERE -->

<?php } else { ?>

<?php } ?>