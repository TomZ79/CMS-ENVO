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
<body class="login-cover">

<!-- PAGE CONTENT -->
<div class="page-content">

	<!-- MAIN CONTENT -->
	<div class="content-wrapper">

		<!-- CONTENT AREA -->
		<div class="content d-flex justify-content-center align-items-center">

			<form class="login-form" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
				<input type="hidden" name="frmSignIn" value="0"/>
				<div class="card mb-0">
					<div class="card-body">
						<div class="text-center mb-3">
							<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
							<h5 class="mb-0">Přihlášení do Intranetu</h5>
						</div>

						<?php

						if (isset($_SESSION["infomsg"]) || isset($_SESSION["warningmsg"])) {
							echo '<div class="text-center">';
							if ($_SESSION["infomsg"]) echo '<p><strong class="text-info">' . $_SESSION["infomsg"] . '</strong></p>';
							if ($_SESSION["warningmsg"]) echo '<p><strong class="text-warning">' . $_SESSION["warningmsg"] . '</strong></p>';
							echo '</div>';
						}

						?>

						<div class="form-group form-group-feedback form-group-feedback-left">
							<input type="text" id="signInUsername" name="signInUsername" class="form-control" placeholder="Uživatelské jméno">
							<div class="form-control-feedback" style="margin-left: .5rem;">
								<i class="icon-user text-muted"></i>
							</div>
						</div>

						<div class="form-group form-group-feedback form-group-feedback-left">
							<input type="password" class="form-control"  id="signInPassword" name="signInPassword" placeholder="Heslo">
							<div class="form-control-feedback" style="margin-left: .5rem;">
								<i class="icon-lock2 text-muted"></i>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Přihlásit <i class="icon-circle-right2 ml-2"></i></button>
						</div>

					</div>
				</div>
			</form>

		</div>
		<!-- /CONTENT AREA -->

	</div>
	<!-- /MAIN CONTENT -->

</div>
<!-- /PAGE CONTENT -->

<!-- JS and PLUGIN
  ================================================== -->
<!-- BEGIN JS DEPENDECENCIES-->

<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html -> addScript('/assets/plugins/jquery/jquery-2.2.4.min.js?=v2.2.4');
echo $Html -> addScript('/admin/assets/plugins/modernizr.custom.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/bootstrap.bundle.min.js');
?>

<!-- END CORE JS DEPENDECENCIES-->
<!-- BEGIN CORE TEMPLATE JS -->
<script>
  // Global options
  var envoWebIntranet = {
    envo_lang: '<?=$site_language?>'
  };
</script>

<!-- END CORE TEMPLATE JS -->
</body>
</html>