<?php
// EN: Number of notifications
// CZ: Počet oznámení
if (isset($ENVO_NOTIFICATION) && is_array($ENVO_NOTIFICATION)) {
	$notifCount = $ENVO_NOTIFICATION[0]["count"];
}
?>
<!DOCTYPE html>
<html lang="<?= $site_language ?>">
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<meta charset="utf-8"/>
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
	//
	echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'fonts/icomoon/styles.css');
	// Bootstrap
	echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'css/bootstrap.min.css');
	echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'css/bootstrap_limitless.min.css');
	// Layout, components, colors
	echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'css/layout.css');
	echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'css/components.css');
	echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'css/colors.css');
	// Plugins
	if ($page1 == 'house' && $page2 == 'houselist') {
		// Plugin DialogFX
		echo $Html -> addStylesheet('/admin/assets/plugins/codrops-dialogFx/dialog.css');
		echo $Html -> addStylesheet('/admin/assets/plugins/codrops-dialogFx/dialog-sandra.css');
		// DataTables (Stylesheet only for pages which contains 'table')
		echo $Html -> addStylesheet('https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css');
	}

	if ($page1 == 'house' && $page2 == 'h' && !empty($page3)) {
		// Plugin Fancybox
		echo $Html -> addStylesheet('/assets/plugins/fancybox/3.4.1/css/jquery.fancybox.min.css');
		// Plugin Fileuploader
		echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/fileuploader/2.0/dist/font/font-fileuploader.min.css');
		echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/fileuploader/2.0/dist/jquery.fileuploader.min.css');
	}

	?>

	<!-- END PLUGIN CSS -->
	<!-- BEGIN CORE CSS FRAMEWORK -->
	<?php
	// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
	// Main Custom StyleSheet
	echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'css/custom.css');
	?>

	<!-- END CORE CSS FRAMEWORK -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="navbar-top">

<!-- MAIN NAVBAR -->
<div class="navbar navbar-expand-md navbar-light fixed-top">

	<!-- HEADER -->
	<div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
		<div class="navbar-brand navbar-brand-md">
			<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2) ?>" class="d-inline-block">
				<img src="<?= $SHORT_PLUGIN_URL_TEMPLATE ?>img/logo_light.png" alt="">
			</a>
		</div>

		<div class="navbar-brand navbar-brand-xs">
			<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2) ?>" class="d-inline-block">
				<img src="<?= $SHORT_PLUGIN_URL_TEMPLATE ?>img/logo_icon_light.png" alt="">
			</a>
		</div>
	</div>
	<!-- /HEADER -->


	<!-- MOBILE CONTROLS -->
	<div class="d-flex flex-1 d-md-none">
		<div class="navbar-brand mr-auto">
			<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2) ?>" class="d-inline-block">
				<img src="<?= $SHORT_PLUGIN_URL_TEMPLATE ?>img/logo_dark.png" alt="">
			</a>
		</div>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
			<i class="icon-tree5"></i>
		</button>

		<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
			<i class="icon-paragraph-justify3"></i>
		</button>
	</div>
	<!-- /MOBILE CONTROLS -->


	<!-- NAVBAR -->
	<div class="collapse navbar-collapse" id="navbar-mobile">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
					<i class="icon-paragraph-justify3"></i>
				</a>
			</li>
		</ul>

		<ul class="navbar-nav ml-auto">

			<li class="nav-item dropdown">
				<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
					<i class="icon-bubbles8"></i>
					<span class="d-md-none ml-2">Notifikace</span>
					<?php
					if ($notifCount > 0) {
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('span', $notifCount, 'badge badge-pill bg-blue ml-auto');
					}
					?>
				</a>

				<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
					<div class="dropdown-content-header">
						<span class="font-weight-semibold">Notifikace</span>
					</div>

					<div class="dropdown-content-body dropdown-scrollable">
						<ul class="media-list">

							<?php

							if (isset($ENVO_NOTIFICATION) && is_array($ENVO_NOTIFICATION)) {

								if ($notifCount > 0) {

									// EN: Start foreach loop on array at the second item - First item is info obout count of notifications
									// CZ: Spuštění foreach smyčky na pole u druhé položky - První položka je informace o počtu oznámení
									foreach (array_slice($ENVO_NOTIFICATION, 1) as $en) {

										// Notification
										echo '<li class="media ' . $en["type"] . '">';
										echo '<div class="media-body">';
										// Start - Title
										echo '<div class="media-title">';
										echo '<a href="' . $en["parseurl"] . '">';
										echo '<span class="font-weight-semibold">' . $en["name"] . '</span>';
										echo '<span class="text-muted float-right font-size-sm">' . $en["created"] . '</span>';
										echo '</a>';
										echo '</div>';
										// Description
										echo '<div class="text-muted">';
										echo $en["shortdescription"];
										echo '</div>';
										// End - Description
										echo '</div>';
										echo '</li>';
										// End - Notification

									}

								} else {
									// Start - Notification not exists
									echo '<li class="media">';
									echo '<span class="alert border-0 p-2 w-100 mb-0 font-weight-semibold text-orange-800 alpha-orange">Žádná notifikace k zobrazení</span>';
									echo '</li>';
									// End - Notification not exists
								}

							}

							?>

						</ul>
					</div>

				</div>
			</li>

			<li class="nav-item dropdown dropdown-user">
				<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
					<img src="<?= '/' . basename(ENVO_FILES_DIRECTORY) . '/userfiles/' . $ENVO_USER_AVATAR ?>" class="rounded-circle mr-2" height="34" alt="">
					<span><?= $ENVO_USER_NAME ?></span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET2, 'notification') ?>" class="dropdown-item"><i class="icon-bubbles8"></i> Notifikace

						<?php
						if ($notifCount > 0) {
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('span', $notifCount, 'badge badge-pill bg-blue ml-auto');
						}
						?>

					</a>
					<div class="dropdown-divider"></div>
					<a href="<?= BASE_URL ?>" class="dropdown-item"><i class="icon-undo"></i> Zpět na web</a>
					<a href="<?= $P_USR_LOGOUT ?>" class="dropdown-item"><i class="icon-switch2"></i> Odhlásit</a>
				</div>
			</li>
		</ul>
	</div>
	<!-- /NAVBAR -->

</div>
<!-- /MAIN NAVBAR -->

<!-- PAGE CONTENT -->
<div class="page-content">

	<!-- MAIN SIDEBAR -->
	<div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md">

		<!-- SIDEBAR MOBILE TOGGLER -->
		<div class="sidebar-mobile-toggler text-center">
			<a href="#" class="sidebar-mobile-main-toggle">
				<i class="icon-arrow-left8"></i>
			</a>
			NAVIGACE
			<a href="#" class="sidebar-mobile-expand">
				<i class="icon-screen-full"></i>
				<i class="icon-screen-normal"></i>
			</a>
		</div>
		<!-- /SIDEBAR MOBILE TOGGLER -->


		<!-- SIDEBAR CONTENT -->
		<div class="sidebar-content">

			<!-- USER MENU -->
			<div class="sidebar-user-material">
				<div class="sidebar-user-material-body">
					<div class="card-body text-center">
						<a href="#">
							<img src="<?= '/' . basename(ENVO_FILES_DIRECTORY) . '/userfiles/' . $ENVO_USER_AVATAR ?>" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
						</a>
						<h6 class="mb-0 text-white text-shadow-dark"><?= $ENVO_USER_NAME ?></h6>
						<span class="font-size-sm text-white text-shadow-dark"><?= $ENVO_USER_GROUP ?></span>
					</div>
				</div>

			</div>
			<!-- /USER MENU -->


			<!-- MAIN NAVIGATION -->
			<div class="card card-sidebar-mobile">
				<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_nav.php'; ?>
			</div>
			<!-- /MAIN NAVIGATION -->

		</div>
		<!-- /SIDEBAR CONTENT -->

	</div>
	<!-- /MAIN SIDEBAR -->


	<!-- MAIN CONTENT -->
	<div class="content-wrapper">


		<?php if ($BREADCRUMBS) { ?>
			<!-- BEGIN PAGE HEADER -->
			<div class="page-header">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4>

							<?php

							if (!empty($SECTION_TITLE)) {
								echo '<span class="font-weight-semibold">' . $SECTION_TITLE . '</span>';
							}

							if (!empty($SECTION_DESC)) {
								echo ' &raquo; ' . $SECTION_DESC;
							}

							?>

						</h4>
					</div>
				</div>
			</div>
			<!-- /PAGE HEADER -->
		<?php } ?>


		<!-- CONTENT AREA -->
		<div class="content pt-0">