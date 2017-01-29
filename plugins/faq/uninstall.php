<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists ('../../config.php')) die('[install.php] config.php not found');
require_once '../../config.php';

// Check if the file is accessed only from a admin if not stop the script from running
if (!JAK_USERID) die('You cannot access this file directly.');

// Not logged in, sorry...
if (!$jakuser->jakAdminaccess ($jakuser->getVar ("usergroupid"))) die('You cannot access this file directly.');

// Set successfully to zero
$succesfully = 0;

// Set language for plugin
if ($jkv["lang"] != $site_language && file_exists (APP_PATH . 'admin/lang/' . $site_language . '.ini')) {
	$tl = parse_ini_file (APP_PATH . 'admin/lang/' . $site_language . '.ini', true);
} else {
	$tl            = parse_ini_file (APP_PATH . 'admin/lang/' . $jkv["lang"] . '.ini', true);
	$site_language = $jkv["lang"];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $tl["plugin"]["t27"]; ?></title>
	<meta charset="utf-8">
	<!-- BEGIN Vendor CSS-->
	<link href="/admin/assets/plugins/bootstrapv3/css/bootstrap.min.css?=v3.3.4" rel="stylesheet" type="text/css"/>
	<link href="/admin/assets/plugins/font-awesome/css/font-awesome.css?=4.5.0" rel="stylesheet" type="text/css"/>
	<!-- BEGIN Pages CSS-->
	<link href="/admin/pages/css/pages-icons.css?=v2.2.0" rel="stylesheet" type="text/css">
	<link class="main-stylesheet" href="/admin/pages/css/pages.css?=v2.2.0" rel="stylesheet" type="text/css"/>
	<!-- BEGIN CUSTOM MODIFICATION -->
	<style type="text/css">
		/* Fix 'jumping scrollbar' issue */
		@media screen and (min-width: 960px) {
			html {
				margin-left: calc(100vw - 100%);
				margin-right: 0;
			}
		}

		/* Main body */
		body {
			background: transparent;
		}

		/* Notification */
		#notificationcontainer {
			position: relative;
			z-index: 1000;
			top: -21px;
		}

		.pgn-wrapper {
			position: absolute;
			z-index: 1000;
		}

		/* Button, input, checkbox ... */
		input[type="text"]:hover {
			background: #fafafa;
			border-color: #c6c6c6;
			color: #384343;
		}

		/* Portlet */
		.portlet-collapse i {
			font-size: 17px;
			font-weight: bold;
		}

		/* Table */
		.table-transparent tbody tr td {
			background: transparent;
		}
	</style>
	<!-- BEGIN VENDOR JS -->
	<script src="/admin/assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="/admin/assets/plugins/bootstrapv3/js/bootstrap.min.js?=v3.3.4" type="text/javascript"></script>
	<!-- BEGIN CORE TEMPLATE JS -->
	<script src="/admin/pages/js/pages.js?=v2.2.0"></script>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12 m-t-20">
			<div class="jumbotron bg-master">
				<h3 class="semi-bold text-white"><?php echo $tl["plugin"]["t27"]; ?></h3>
			</div>
			<hr>
			<div id="notificationcontainer"></div>
			<div class="m-b-30">
				<h4 class="semi-bold">FAQ Plugin - Info o odinstalačním procesu</h4>

				<div id="portlet-advance" class="panel panel-transparent">
					<div class="panel-heading separator">
						<div class="panel-title">Rozšířené informace
						</div>
						<div class="panel-controls">
							<ul>
								<li>
									<a href="#" class="portlet-collapse" data-toggle="collapse">
										<i class="portlet-icon portlet-icon-collapse"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="panel-body">
						<h3><span class="semi-bold">Výpis</span> Komponentů</h3>
						<p>Seznam komponent které budou odinstalovány v průběhu odinstalačního procesu tohoto pluginu</p>
						<br>
						<h5 class="text-uppercase">Prostudovat postup odinstalace</h5>
					</div>
				</div>
			</div>
			<hr>

			<!-- UNINSTALLATION -->
			<?php if (isset($_POST['uninstall'])) {
				// Validate
				session_start ();
				if (isset($_POST["captcha"]) && $_POST["captcha"] != "" && $_SESSION["code"] == $_POST["captcha"]) {

					// Now get the plugin id for futher use
					$results = $jakdb->query ('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "FAQ"');
					$rows    = $results->fetch_assoc ();

					if ($rows) {

						$jakdb->query ('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "FAQ"');
						$jakdb->query ('DELETE FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = "' . smartsql ($rows['id']) . '"');
						$jakdb->query ('DELETE FROM ' . DB_PREFIX . 'pagesgrid WHERE pluginid = "' . smartsql ($rows['id']) . '"');
						$jakdb->query ('DELETE FROM ' . DB_PREFIX . 'pluginhooks WHERE product = "faq"');
						$jakdb->query ('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "faq"');
						$jakdb->query ('ALTER TABLE ' . DB_PREFIX . 'usergroup DROP `faq`, DROP `faqpost`, DROP `faqpostdelete`, DROP `faqpostapprove`, DROP `faqrate`, DROP `faqmoderate`');

						$jakdb->query ('DROP TABLE ' . DB_PREFIX . 'faq, ' . DB_PREFIX . 'faqcategories, ' . DB_PREFIX . 'faqcomments');
						$jakdb->query ('DELETE FROM ' . DB_PREFIX . 'categories WHERE pluginid = "' . smartsql ($rows['id']) . '"');
						$jakdb->query ('ALTER TABLE ' . DB_PREFIX . 'pages DROP showfaq');
						$jakdb->query ('ALTER TABLE ' . DB_PREFIX . 'news DROP showfaq');
						$jakdb->query ('ALTER TABLE ' . DB_PREFIX . 'pagesgrid DROP faqid');

						// Now delete all tags
						$result = $jakdb->query ('SELECT tag FROM ' . DB_PREFIX . 'tags WHERE pluginid = "' . smartsql ($rows['id']) . '"');
						while ($row = $result->fetch_assoc ()) {
							$result1 = $jakdb->query ('SELECT count FROM ' . DB_PREFIX . 'tagcloud WHERE tag = "' . smartsql ($row['tag']) . '" LIMIT 1');
							$count   = $result1->fetch_assoc ();

							if ($count['count'] <= '1') {
								$jakdb->query ('DELETE FROM ' . DB_PREFIX . 'tagcloud WHERE tag = "' . smartsql ($row['tag']) . '"');
							} else {
								$jakdb->query ('UPDATE ' . DB_PREFIX . 'tagcloud SET count = count - 1 WHERE tag = "' . smartsql ($row['tag']) . '"');

							}
						}

						$jakdb->query ('DELETE FROM ' . DB_PREFIX . 'tags WHERE pluginid = "' . smartsql ($rows['id']) . '"');

					}

					$succesfully = 1;

					?>
					<button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>
					<script>
						$(document).ready(function () {
							'use strict';
							// Apply the plugin to the body
							$('#notificationcontainer').pgNotification({
								style: 'bar',
								message: '<?php echo $tl["plugin"]["p15"];?>',
								position: 'top',
								timeout: 0,
								type: 'success',
							}).show();

							e.preventDefault();
						});
					</script>
				<?php } else { ?>
					<div>
						<h5 class="text-danger bold">Wrong Code Entered - Please, enter right number !</h5>
					</div>
					<script>
						$(document).ready(function () {
							'use strict';
							// Apply the plugin to the body
							$('#notificationcontainer').pgNotification({
								style: 'bar',
								message: 'Wrong Code Entered - Please, enter right number !',
								position: 'top',
								timeout: 0,
								type: 'danger',
							}).show();

							e.preventDefault();
						});
					</script>
				<?php }
			}
			if (!$succesfully) { ?>
				<form name="company" action="uninstall.php" method="post" enctype="multipart/form-data">
					<div class="form-group form-inline">
						<label for="text">Please read info about uninstallation and enter text: </label>
						<input type="text" name="captcha" class="form-control" id="text">
						<img src="../../assets/plugins/captcha/simple/captcha.php" class="m-l-10"/>
					</div>
					<button type="submit" name="uninstall" class="btn btn-complete btn-block"><?php echo $tl["plugin"]["p11"]; ?></button>
				</form>
			<?php } ?>

		</div>
	</div>
</div>

<script type="text/javascript">
	(function ($) {
		'use strict';
		$('#portlet-advance').portlet({
			onRefresh: function () {
				setTimeout(function () {
					// Throw any error you encounter while refreshing
					$('#portlet-advance').portlet({
						error: "Something went terribly wrong. Just keep calm and carry on!"
					});
				}, 2000);
			}
		});
	})(window.jQuery);
</script>

</body>
</html>