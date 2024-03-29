<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/install.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// Check if the file is accessed only from a admin if not stop the script from running
$php_errormsg  = 'To edit the file, you must be logged in as an ADMINISTRATOR !!! You cannot access this file directly.';
$php_errormsg1 = 'Only ADMINISTRATOR privileges allow you to edit the file !!! You cannot access this file directly.';
if (!ENVO_USERID) die($php_errormsg);

if (!$envouser -> envoAdminAccess($envouser -> getVar("usergroupid"))) die($php_errormsg1);

// Set successfully to zero
$succesfully = 0;

// EN: Load the language file for plugin
// CZ: Načtení jazykového souboru pro plugin
if (file_exists(APP_PATH . 'plugins/tv_tower/admin/lang/' . $site_language . '.ini')) {
	$tltt = parse_ini_file(APP_PATH . 'plugins/tv_tower/admin/lang/' . $site_language . '.ini', TRUE);
} else {
	$tltt = parse_ini_file(APP_PATH . 'plugins/tv_tower/admin/lang/en.ini', TRUE);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $tltt["tt_install"]["ttinst"] ?></title>
	<meta charset="utf-8">
	<!-- BEGIN Vendor CSS-->
	<?php
	// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
	echo $Html -> addStylesheet('/assets/plugins/bootstrap/bootstrapv4/4.0.0/css/bootstrap.min.css');
	echo $Html -> addStylesheet('/assets/plugins/font-awesome/4.7.0/css/font-awesome.css');
	?>
	<!-- BEGIN Pages CSS-->
	<?php
	// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
	echo $Html -> addStylesheet('/admin/pages/css/pages-icons.css?=v3.0.0');
	echo $Html -> addStylesheet('/admin/pages/css/pages.min.css?=v3.0.2', '', array ('class' => 'main-stylesheet'));
	?>
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

		/* Card */
		.card-collapse i {
			font-size: 17px;
			font-weight: bold;
		}

		/* Table */
		.table-transparent tbody tr td {
			background: transparent;
		}
	</style>
	<!-- BEGIN VENDOR JS -->
	<?php
	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	echo $Html -> addScript('/assets/plugins/jquery/jquery-1.11.1.min.js');
	echo $Html -> addScript('/admin/assets/plugins/modernizr.custom.js?=v2.8.3');
	echo $Html -> addScript('/assets/plugins/popper/1.14.1/popper.min.js');
	echo $Html -> addScript('/assets/plugins/bootstrap/bootstrapv4/4.0.0/js/bootstrap.min.js');
	?>
	<!-- BEGIN CORE TEMPLATE JS -->
	<?php
	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	echo $Html -> addScript('/admin/pages/js/pages.min.js');
	?>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="col-sm-12 m-t-20">
				<div class="jumbotron bg-master pt-1 pl-3 pb-1 pr-3">
					<h3 class="semi-bold text-white"><?= $tltt["tt_install"]["ttinst"] ?></h3>
				</div>
				<hr>
				<div id="notificationcontainer"></div>
				<div class="m-b-30">
					<h4 class="semi-bold"><?= $tltt["tt_install"]["ttinst1"] ?></h4>

					<div data-pages="card" class="card card-transparent" id="card-basic">
						<div class="card-header separator">
							<div class="card-title"><?= $tltt["tt_install"]["ttinst2"] ?></div>
							<div class="card-controls">
								<ul>
									<li>
										<a data-toggle="collapse" class="card-collapse" href="#">
											<i class="card-icon card-icon-collapse"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="card-block">
							<h3><span class="semi-bold">Výpis</span> Komponentů</h3>
							<p>Seznam komponent které budou instalovány v průběhu instalačního procesu tohoto pluginu</p><br>
							<h5 class="text-uppercase">Prostudovat postup instalace</h5>
						</div>
					</div>

				</div>
				<hr>

				<?php
				/* English
				 * -------
				 * Check if the plugin is already installed
				 * If plugin is installed - show Notification
				 *
				 * Czech
				 * -------
				 * Kontrola zda je plugin instalován
				 * Pokud není plugin instalován, zobrazit Notifikaci s chybovou hláškou
				*/
				$envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Tv_tower"');
				if ($envodb -> affected_rows > 0) { ?>

					<button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít
					</button>
					<script>
            $(document).ready(function () {
              'use strict';
              // Apply the plugin to the body
              $('#notificationcontainer').pgNotification({
                style: 'bar',
                message: '<?=$tltt["tt_install"]["ttinst3"]?>',
                position: 'top',
                timeout: 0,
                type: 'warning'
              }).show();

              e.preventDefault();
            });
					</script>

				<?php
				} else {
				// EN: If plugin is not installed - install plugin
				// CZ: Pokud není plugin instalován, spustit instalaci pluginu

				// MAIN PLUGIN INSTALLATION
				if (isset($_POST['install'])) {

				// EN: Insert data to table 'plugins' about this plugin
				// CZ: Zápis dat do tabulky 'plugins' o tomto pluginu
				$envodb -> query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `sidenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "Tv_tower", "TV Tower", 1, ' . ENVO_USERID . ', 1, "tv_tower", "require_once APP_PATH.\'plugins/tv_tower/tvtower.php\';", "if ($page == \'tv-tower\') {
        require_once APP_PATH.\'plugins/tv_tower/admin/tvtower.php\';
           $ENVO_PROVED = 1;
           $checkp = 1;
        }", "../plugins/tv_tower/admin/template/tt_nav.php", "tvtower", "uninstall.php", "1.0", NOW())');

				// EN: Now get the plugin 'id' from table 'plugins' for futher use
				// CZ: Nyní zpět získáme 'id' pluginu z tabulky 'plugins' pro další použití
				$results = $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Tv_tower"');
				$rows    = $results -> fetch_assoc();

				if ($rows['id']) {
				// EN: If plugin have 'id' (plugin is installed), install other data for plugin (create tables and write data to tables)
				// CZ: Pokud má plugin 'id' (tzn. plugin je instalován), instalujeme další data pro plugin (vytvoření tabulek a zápis dat do tabulek)

				// EN: Set admin lang of plugin
				// CZ: Nastavení jazyka pro administrační rozhraní pluginu
				$adminlang = 'if (file_exists(APP_PATH.\'plugins/tv_tower/admin/lang/\'.$site_language.\'.ini\')) {
  $tltt = parse_ini_file(APP_PATH.\'plugins/tv_tower/admin/lang/\'.$site_language.\'.ini\', true);
} else {
  $tltt = parse_ini_file(APP_PATH.\'plugins/tv_tower/admin/lang/en.ini\', true);
}';

				// EN: Set site lang of plugin
				// CZ: Nastavení jazyka pro webové rozhraní pluginu
				$sitelang = 'if (file_exists(APP_PATH.\'plugins/tv_tower/lang/\'.$site_language.\'.ini\')) {
  $tltt = parse_ini_file(APP_PATH.\'plugins/tv_tower/lang/\'.$site_language.\'.ini\', true);
} else {
  $tltt = parse_ini_file(APP_PATH.\'plugins/tv_tower/lang/en.ini\', true);
}';

				// EN: Insert code into admin/index.php
				// CZ: Vložení kódu do admin/index.php
				$insertadminindex = 'plugins/tv_tower/admin/template/tt_stat.php';

				// EN: Usergroup - Insert php code (get data from plugin setting in usergroup)
				// CZ: Usergroup - Vložení php kódu (získání dat z nastavení pluginu v uživatelské skupině)
				$insertphpcode = 'if (isset($defaults[\'envo_tvtower\'])) {
	$insert .= \'tvtower = \"\'.$defaults[\'envo_tvtower\'].\'\",\'; }';

				// EN: Insert data to table 'pluginhooks'
				// CZ: Vložení potřebných dat to tabulky 'pluginhooks'
				$envodb -> query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_admin_lang", "TV Tower Admin Language", "' . $adminlang . '", "tvtower", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_lang", "TV Tower Site Language", "' . $sitelang . '", "tvtower", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_head", "TV Tower Admin CSS", "plugins/tv_tower/admin/template/tt_css_admin.php", "tvtower", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_index", "TV Tower Statistics Admin", "' . $insertadminindex . '", "tvtower", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup", "TV Tower Usergroup New", "plugins/tv_tower/admin/template/usergroup_new.php", "tvtower", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup_edit", "TV Tower Usergroup Edit", "plugins/tv_tower/admin/template/usergroup_edit.php", "tvtower", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_usergroup", "TV Tower Usergroup SQL", "' . $insertphpcode . '", "tvtower", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_between_head", "TV Tower CSS", "plugins/tv_tower/template/cssheader.php", "tvtower", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_footer_end", "TV Tower Script ", "plugins/tv_tower/template/jsfooter.php", "tvtower", 1, 1, "' . $rows['id'] . '", NOW())');

				// EN: Insert data to table 'setting'
				// CZ: Vložení potřebných dat to tabulky 'setting'
				$envodb -> query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("tvtowertitle", "tvtower", "TV Tower", "TV Tower", "input", "free", "tvtower"),
("tvtowerwizardtitle", "tvtower", "TV Tower - Wizard", "TV Tower - Wizard", "input", "free", "tvtower"),
("tvtowerlisttitle", "tvtower", "TV Tower - List", "TV Tower - List", "input", "free", "tvtower"),
("tvtowerexporttitle", "tvtower", "TV Tower - Export", "TV Tower - Export", "input", "free", "tvtower")');

				// EN: Insert data to table 'usergroup'
				// CZ: Vložení potřebných dat to tabulky 'usergroup'
				$envodb -> query('ALTER TABLE ' . DB_PREFIX . 'usergroup ADD `tvtower` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `advsearch`');

				// EN: Insert data to table 'categories' (create category)
				// CZ: Vložení potřebných dat to tabulky 'categories' (vytvoření kategorie)
				$envodb -> query('INSERT INTO ' . DB_PREFIX . 'categories (`id`, `name`, `varname`, `catimg`, `showmenu`, `showfooter`, `catorder`, `catparent`, `pageid`, `activeplugin`, `pluginid`) VALUES
(NULL, "TV Tower", "tv-tower", NULL, 1, 0, 5, 0, 0, 1, "' . $rows['id'] . '")');

				// EN: Create table for plugin (TV Tower)
				// CZ: Vytvoření tabulky pro plugin (TV Vysílače)
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'tvtowertvtower (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) NULL DEFAULT NULL,
  `varname` varchar(255) NULL DEFAULT NULL,
  `station` varchar(255) NULL DEFAULT NULL,
  `district` varchar(255) NULL DEFAULT NULL,
  `heightsea` int(10) unsigned NOT NULL DEFAULT 0,
  `eastlongitude` varchar(255) NULL DEFAULT NULL,
  `northlatitude` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				// EN: Create table for plugin (TV Channel)
				// CZ: Vytvoření tabulky pro plugin (TV Kanál)
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'tvtowertvchannel (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `towerid` int(11) unsigned NOT NULL DEFAULT 0,
  `number` varchar(255) NULL DEFAULT NULL,
  `frequency` varchar(100) NULL DEFAULT NULL,
  `freqrange` varchar(100) NULL DEFAULT NULL,
  `polarization` varchar(100) NULL DEFAULT NULL,
  `sitename` varchar(100) NULL DEFAULT NULL,
  `erpkw` varchar(100) NULL DEFAULT NULL,
  `erpdbw` varchar(100) NULL DEFAULT NULL,
  `type` varchar(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `towerid` (`towerid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				// EN: Create table for plugin (TV Program)
				// CZ: Vytvoření tabulky pro plugin (TV Program)
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'tvtowertvprogram (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` smallint(1) unsigned NOT NULL DEFAULT 1,
  `towerid` int(10) unsigned NOT NULL DEFAULT 0,
  `channelid` int(10) unsigned NOT NULL DEFAULT 0,
  `channelnumber` int(10) NULL DEFAULT NULL,
  `tvr` smallint(1) unsigned NOT NULL DEFAULT 1,
  `name` varchar(100) NULL DEFAULT NULL,
  `icon` varchar(100) NULL DEFAULT NULL,
  `online` smallint(1) unsigned NOT NULL DEFAULT 1,
  `service_id` varchar(100) NULL DEFAULT NULL,
  `videoencoding` varchar(100) NULL DEFAULT NULL,
  `audioencoding` varchar(100) NULL DEFAULT NULL,
  `videoformat` varchar(100) NULL DEFAULT NULL,
  `videosize` varchar(100) NULL DEFAULT NULL,
  `bitrate` varchar(100) NULL DEFAULT NULL,
  `services` varchar(255) NULL DEFAULT NULL,
  `time` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				// EN: Create table for plugin (S_ID TV)
				// CZ: Vytvoření tabulky pro plugin (S_ID TV)
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'tvtowersidtv (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(100) NULL DEFAULT NULL,
  `name` varchar(255) NULL DEFAULT NULL,
  `time` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				// EN: Create table for plugin (S_ID R)
				// CZ: Vytvoření tabulky pro plugin (S_ID R)
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'tvtowersidr (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(100) NULL DEFAULT NULL,
  `name` varchar(255) NULL DEFAULT NULL,
  `time` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				// EN: Create table for plugin (S_ID R)
				// CZ: Vytvoření tabulky pro plugin (S_ID R)
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'tvtowersids (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(100) NULL DEFAULT NULL,
  `name` varchar(255) NULL DEFAULT NULL,
  `time` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				// EN: Create table for plugin (S_ID R)
				// CZ: Vytvoření tabulky pro plugin (S_ID R)
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'tvtoweronid (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `onid` varchar(100) NULL DEFAULT NULL,
  `country` varchar(255) NULL DEFAULT NULL,
  `time` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				// EN: Create table for plugin (S_ID R)
				// CZ: Vytvoření tabulky pro plugin (S_ID R)
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'tvtowernid (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nid` varchar(100) NULL DEFAULT NULL,
  `site` varchar(255) NULL DEFAULT NULL,
  `operator` varchar(255) NULL DEFAULT NULL,
  `time` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				// EN: Create table for plugin (export history)
				// CZ: Vytvoření tabulky pro plugin (historie exportu)
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'tvtowerexporthistory (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`userid` INT(11) UNSIGNED NOT NULL DEFAULT 0,
	`email` VARCHAR(255) NOT NULL,
	`exportname` VARCHAR(255) NOT NULL,
	`ip` CHAR(15) NOT NULL,
	`time` DATETIME DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE = MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1');

				$succesfully = 1;

				?>

					<button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít
					</button>
					<script>
            $(document).ready(function () {
              'use strict';
              // Apply the plugin to the body
              $('#notificationcontainer').pgNotification({
                style: 'bar',
                message: '<?=$tltt["tt_install"]["ttinst4"]?>',
                position: 'top',
                timeout: 0,
                type: 'success'
              }).show();

              e.preventDefault();
            });
					</script>

				<?php } else {
				// EN: If plugin have 'id' (plugin is not installed), uninstall
				// CZ: Pokud nemá plugin 'id' (tzn. plugin není instalován - došlo k chybě při zápisu do tabulky 'plugins'), odinstalujeme plugin

				$result = $envodb -> query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "Digital_house"');

				?>

					<div class="alert bg-danger"><?= $tltt["tt_install"]["ttinst5"] ?></div>
					<form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
						<button type="submit" name="redirect" class="btn btn-danger btn-block">
							<?= $tltt["tt_install"]["ttinst6"] ?>
						</button>
					</form>

				<?php }
				}
				if (!$succesfully) { ?>
					<form name="company" method="post" action="install.php">
						<button type="submit" name="install" class="btn btn-complete btn-block">
							<?= $tltt["tt_install"]["ttinst7"] ?>
						</button>
					</form>
				<?php }
				} ?>

			</div>
		</div>
	</div>

</body>
</html>