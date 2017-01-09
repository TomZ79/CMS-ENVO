<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists('../../config.php')) die('[install.php] config.php not found');
require_once '../../config.php';

// Check if the file is accessed only from a admin if not stop the script from running
if (!JAK_USERID) die('You cannot access this file directly.');

// If not logged in and not admin, block access
if (!$jakuser->jakAdminaccess($jakuser->getVar("usergroupid"))) die('You cannot access this file directly.');

// Set successfully to zero
$succesfully = 0;

// Set language for plugin
if ($jkv["lang"] != $site_language && file_exists(APP_PATH . 'admin/lang/' . $site_language . '.ini')) {
	$tl = parse_ini_file(APP_PATH . 'admin/lang/' . $site_language . '.ini', true);
} else {
	$tl = parse_ini_file(APP_PATH . 'admin/lang/' . $jkv["lang"] . '.ini', true);
	$site_language = $jkv["lang"];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $tl["plugin"]["t"]; ?></title>
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
				<h3 class="semi-bold text-white"><?php echo $tl["plugin"]["t"]; ?></h3>
			</div>
			<hr>
			<div id="notificationcontainer"></div>
			<div class="m-b-30">
				<h4 class="semi-bold">BelowHeader Plugin - Info o instalačním procesu</h4>

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
						<p>Seznam komponent které budou odinstalovány v průběhu instalačního procesu tohoto pluginu</p>
						<br>
						<h5 class="text-uppercase">Prostudovat postup instalace</h5>
					</div>
				</div>
			</div>
			<hr>

			<!-- Check if the plugin is already installed -->
			<?php $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "BelowHeader"');
			if ($jakdb->affected_rows > 0) { ?>

				<button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>
				<script>
					$(document).ready(function () {
						'use strict';
						// Apply the plugin to the body
						$('#notificationcontainer').pgNotification({
							style: 'bar',
							message: 'Plugin je již nainstalován !!!',
							position: 'top',
							timeout: 0,
							type: 'warning',
						}).show();

						e.preventDefault();
					});
				</script>

			<!-- Plugin is not installed let's display the installation script -->
			<?php } else { ?>

				<!-- INSTALLATION -->
				<?php if (isset($_POST['install'])) {

				$jakdb->query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `managenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "BelowHeader", "Run your own Layer Slider.", 1, ' . JAK_USERID . ', 4, "belowheader", "", "if ($page == \'belowheader\') {
        require_once APP_PATH.\'plugins/belowheader/admin/belowheader.php\';
        $JAK_PROVED = 1;
        $checkp = 1;
      }", "../plugins/belowheader/admin/template/bhnav.php", "1", "uninstall.php", "1.1", NOW())');

				// Now get the plugin id for futher use
				$sqls = 'SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "BelowHeader"';
				$results = $jakdb->query($sqls);
				$rows = $results->fetch_assoc();

			if ($rows['id']) {

				$adminlang = 'if (file_exists(APP_PATH.\'plugins/belowheader/admin/lang/\'.$site_language.\'.ini\')) {
    $tlbh = parse_ini_file(APP_PATH.\'plugins/belowheader/admin/lang/\'.$site_language.\'.ini\', true);
} else {
    $tlbh = parse_ini_file(APP_PATH.\'plugins/belowheader/admin/lang/en.ini\', true);
}';

				// The file who does the job
				$belowheader = 'plugins/belowheader/bhinput.php';
				$belowcontent = 'plugins/belowheader/bhinputb.php';

				$jakdb->query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_admin_lang", "BelowHeader Admin Language", "' . $adminlang . '", "belowheader", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_below_header", "BelowHeader Input", "' . $belowheader . '", "belowheader", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_below_content", "BelowHeader / Content", "' . $belowcontent . '", "belowheader", 1, 1, "' . $rows['id'] . '", NOW())');

				$jakdb->query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'belowheader (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageid` varchar(100) DEFAULT NULL,
  `newsid` varchar(100) DEFAULT NULL,
  `newsmain` smallint(1) unsigned NOT NULL DEFAULT 0,
  `tags` smallint(1) unsigned NOT NULL DEFAULT 0,
  `search` smallint(1) unsigned NOT NULL DEFAULT 0,
  `sitemap` smallint(1) unsigned NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `content_below` mediumtext,
  `permission` varchar(100) DEFAULT NULL,
  `active` smallint(1) unsigned NOT NULL DEFAULT 1,
  `time` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  PRIMARY KEY (`id`),
  KEY `pageid` (`pageid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1');

				$succesfully = 1;

				?>

				<button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>
				<script>
					$(document).ready(function() {
						'use strict';
						// Apply the plugin to the body
						$('#notificationcontainer').pgNotification({
							style: 'bar',
							message: '<?php echo $tl["plugin"]["p13"]; ?>',
							position: 'top',
							timeout: 0,
							type: 'success',
						}).show();

						e.preventDefault();
					});
				</script>

			<?php } else {

				$result = $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "BelowHeader"');

				?>
				<div class="alert bg-danger"><?php echo $tl["plugin"]["p14"]; ?></div>
				<form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
					<button type="submit" name="redirect" class="btn btn-danger btn-block"><?php echo $tl["plugin"]["p11"]; ?></button>
				</form>
			<?php }
			} ?>

				<?php if (!$succesfully) { ?>
				<form name="company" method="post" action="install.php" enctype="multipart/form-data">
					<button type="submit" name="install"
									class="btn btn-primary btn-block"><?php echo $tl["plugin"]["p10"]; ?></button>
				</form>
			<?php }
			} ?>

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