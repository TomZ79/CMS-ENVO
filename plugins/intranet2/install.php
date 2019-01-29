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

// PLUGIN CONFIG
// New plugin version and name
$pluginversion = '2.0';
$plugins  = 'Intranet2';
$pluginname  = 'intranet2';

// EN: Load the language file for plugin
// CZ: Načtení jazykového souboru pro plugin
if (file_exists(APP_PATH . 'plugins/' . $pluginname . '/admin/lang/' . $site_language . '.ini')) {
	$tlint2 = parse_ini_file(APP_PATH . 'plugins/' . $pluginname . '/admin/lang/' . $site_language . '.ini', TRUE);
} else {
  $tlint2 = parse_ini_file(APP_PATH . 'plugins/' . $pluginname . '/admin/lang/en.ini', TRUE);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title><?= $tlint2["int2_install"]["int2inst"] ?></title>
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
  echo $Html -> addStylesheet('/admin/pages/css/pages.min.css?=v3.0.2', '', array ( 'class' => 'main-stylesheet' ));
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

    /* Portlet */
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
  echo $Html -> addScript('/assets/plugins/popover/1.14.1/popper.min.js');
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
          <h3 class="semi-bold text-white"><?= $tlint2["int2_install"]["int2inst"] ?></h3>
        </div>
        <hr>
        <div id="notificationcontainer"></div>
        <div class="m-b-30">

          <h4 class="semi-bold"><?= $tlint2["int2_install"]["int2inst1"] ?></h4>

          <div data-pages="card" class="card card-transparent" id="card-basic">
            <div class="card-header separator">
              <div class="card-title"><?= $tlint2["int2_install"]["int2inst2"] ?></div>
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
              <p>Seznam komponent které budou instalovány v průběhu instalačního procesu tohoto pluginu</p>
              <br>
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
        $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "' . $plugins . '"');
        if ($envodb -> affected_rows > 0) { ?>

          <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít
          </button>
          <script>
            $(document).ready(function () {
              'use strict';
              // Apply the plugin to the body
              $('#notificationcontainer').pgNotification({
                style: 'bar',
                message: '<?=$tlint2["int2_install"]["int2inst3"]?>',
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
        $envodb -> query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `sidenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "' . $plugins . '", "' . $plugins . '.", 1, ' . ENVO_USERID . ', 1, "' . $pluginname . '", "require_once APP_PATH.\'plugins/' . $pluginname . '/' . $pluginname . '.php\';", "if ($page == \'' . $pluginname . '\') {
        require_once APP_PATH.\'plugins/' . $pluginname . '/admin/' . $pluginname . '.php\';
           $ENVO_PROVED = 1;
           $checkp = 1;
        }", "../plugins/' . $pluginname . '/admin/template/int2_nav.php", "' . $pluginname . '", "uninstall.php", ' . $pluginversion . ', NOW())');

        // EN: Now get the plugin 'id' from table 'plugins' for futher use
        // CZ: Nyní zpět získáme 'id' pluginu z tabulky 'plugins' pro další použití
        $results = $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "' . $plugins . '"');
        $rows    = $results -> fetch_assoc();

        if ($rows['id']) {
        // EN: If plugin have 'id' (plugin is installed), install other data for plugin (create tables and write data to tables)
        // CZ: Pokud má plugin 'id' (tzn. plugin je instalován), instalujeme další data pro plugin (vytvoření tabulek a zápis dat do tabulek)

        // EN: Set admin lang of plugin
        // CZ: Nastavení jazyka pro administrační rozhraní pluginu
        $adminlang = 'if (file_exists(APP_PATH.\'plugins/' . $pluginname . '/admin/lang/\'.$site_language.\'.ini\')) {
  $tlint2 = parse_ini_file(APP_PATH.\'plugins/' . $pluginname . '/admin/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlint2 = parse_ini_file(APP_PATH.\'plugins/' . $pluginname . '/admin/lang/en.ini\', true);
}';

        // EN: Set site lang of plugin
        // CZ: Nastavení jazyka pro webové rozhraní pluginu
        $sitelang = 'if (file_exists(APP_PATH.\'plugins/' . $pluginname . '/lang/\'.$site_language.\'.ini\')) {
  $tlint2 = parse_ini_file(APP_PATH.\'plugins/' . $pluginname . '/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlint2 = parse_ini_file(APP_PATH.\'plugins/' . $pluginname . '/lang/en.ini\', true);
}';
        // EN: Usergroup - Insert php code (get data from plugin setting in usergroup)
        // CZ: Usergroup - Vložení php kódu (získání dat z nastavení pluginu v uživatelské skupině)
        $insertphpcode = 'if (isset($defaults[\'envo_int2\'])) {
	$insert .= \'intranet2 = \"\'.$defaults[\'envo_int2\'].\'\",\'; }';

        // EN: Insert data to table 'pluginhooks'
        // CZ: Vložení potřebných dat to tabulky 'pluginhooks'
        $envodb -> query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_admin_lang", "Intranet2 Plugin Admin Language", "' . $adminlang . '", "' . $pluginname . '", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_lang", "Intranet2 Plugin Site Language", "' . $sitelang . '", "' . $pluginname . '", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_head", "Intranet2 Plugin Admin CSS", "plugins/' . $pluginname . '/admin/template/css.intranet2.php", "' . $pluginname . '", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup", "Intranet2 Plugin Usergroup New", "plugins/' . $pluginname . '/admin/template/usergroup_new.php", "' . $pluginname . '", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup_edit", "Intranet2 Plugin Usergroup Edit", "plugins/' . $pluginname . '/admin/template/usergroup_edit.php", "' . $pluginname . '", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_usergroup", "Intranet2 Plugin Usergroup SQL", "' . $insertphpcode . '", "' . $pluginname . '", 1, 1, "' . $rows['id'] . '", NOW())');

        // EN: Insert data to table 'setting'
        // CZ: Vložení potřebných dat to tabulky 'setting'
        $envodb -> query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("int2title", "' . $pluginname . '", "Intranet2", "Intranet2", "input", "free", "' . $pluginname . '"),
("int2dateformat", "' . $pluginname . '", "d.m.Y", "d.m.Y", "input", "free", "' . $pluginname . '"),
("int2timeformat", "' . $pluginname . '", NULL, NULL, "input", "free", "' . $pluginname . '")');

        // EN: Insert data to table 'usergroup'
        // CZ: Vložení potřebných dat to tabulky 'usergroup'
        $envodb -> query('ALTER TABLE ' . DB_PREFIX . 'usergroup ADD `' . $pluginname . '` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `advsearch`');

        // EN: Insert data to table 'categories' (create category)
        // CZ: Vložení potřebných dat to tabulky 'categories' (vytvoření kategorie)
        $envodb -> query('INSERT INTO ' . DB_PREFIX . 'categories (`id`, `name`, `varname`, `catimg`, `showmenu`, `showfooter`, `catorder`, `catparent`, `pageid`, `activeplugin`, `pluginid`) VALUES
(NULL, "Intranet2", "' . $pluginname . '", NULL, 1, 0, 5, 0, 0, 1, "' . $rows['id'] . '")');

				/**
				 * EN: Create table for plugin (Settings - Region)
				 * CZ: Vytvoření tabulky pro plugin (Nastavení - Kraj)
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_settings_region (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(255) NULL DEFAULT NULL,
  `region_ku_code` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for plugin (Settings - District)
				 * CZ: Vytvoření tabulky pro plugin (Nastavení - Okres)
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_settings_district (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NULL DEFAULT NULL,
  `district` varchar(255) NULL DEFAULT NULL,
  `district_ku_code` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for plugin (Settings - City)
				 * CZ: Vytvoření tabulky pro plugin (Nastavení - Město)
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_settings_city (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NULL DEFAULT NULL,
  `district_id` int(11) NULL DEFAULT NULL,
  `city` varchar(255) NULL DEFAULT NULL,
  `city_ku_code` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for plugin (Settings - Katastrální území)
				 * CZ: Vytvoření tabulky pro plugin (Nastavení - Katastrální území)
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_settings_ku (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NULL DEFAULT NULL,
  `district_id` int(11) NULL DEFAULT NULL,
  `city_id` int(11) NULL DEFAULT NULL,
  `ku` varchar(255) NULL DEFAULT NULL,
  `ku_code` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for plugin (Settings - Real estate management)
				 * CZ: Vytvoření tabulky pro plugin (Nastavení - Správa nemovitosti)
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_settings_estatemanagement (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NULL DEFAULT NULL,
  `www` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for House
				 * CZ: Vytvoření tabulky pro Bytové domy
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_house (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NULL DEFAULT NULL,
  `varname` varchar(255) NULL DEFAULT NULL,
  `headquarters` varchar(255) NULL DEFAULT NULL,
  `street` varchar(255) NULL DEFAULT NULL,
  `city` int(11) NULL DEFAULT NULL,
  `ku` int(11) NULL DEFAULT NULL,
  `psc` varchar(100) NULL DEFAULT NULL,
  `ic` varchar(100) NULL DEFAULT NULL,
  `state` varchar(255) NULL DEFAULT NULL,
  `administration` int(1) UNSIGNED NOT NULL DEFAULT 0,
  `administrationdate` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `ares` int(1) NOT NULL DEFAULT 0,
  `justice` int(1) NOT NULL DEFAULT 0,
  `housejusticelaw` text NULL DEFAULT NULL,
  `housedescription` varchar(255) NULL DEFAULT NULL,
  `mainemail` varchar(255) NULL DEFAULT NULL,
  `contactcontrol` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `housefname` varchar(255) NULL DEFAULT NULL,
  `housefstreet` varchar(255) NULL DEFAULT NULL,
  `housefcity` varchar(255) NULL DEFAULT NULL,
  `housefpsc` varchar(255) NULL DEFAULT NULL,
  `housefic` varchar(100) NULL DEFAULT NULL,
  `housefdic` varchar(100) NULL DEFAULT NULL,
  `permission` varchar(100) NOT NULL DEFAULT 0,
  `estatemanagement` int(5) NOT NULL DEFAULT 0,
  `folder` varchar(100) NULL DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for House - Entrance
				 * CZ: Vytvoření tabulky pro Bytový dům - Vchody
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_houseent (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `houseid` int(10) DEFAULT NULL,
  `street` varchar(255) NULL DEFAULT NULL,
  `elevator` int(1) NOT NULL DEFAULT 0,
  `apartment` int(10) NOT NULL DEFAULT 0,
  `gpslat` varchar(255) NULL DEFAULT NULL,
  `gpslng` varchar(255) NULL DEFAULT NULL,
  `katastr` varchar(255) NULL DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for House - Tasks list
				 * CZ: Vytvoření tabulky pro Bytový dům - Úkoly
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_housetasks (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `houseid` int(10) DEFAULT NULL,
  `priority` varchar(255) NULL DEFAULT NULL,
  `status` varchar(255) NULL DEFAULT NULL,
  `title` varchar(255) NULL DEFAULT NULL,
  `description` text NULL DEFAULT NULL,
  `reminder` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `time` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for House - Services
				 * CZ: Vytvoření tabulky pro Bytový dům - Servis
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_houseserv (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `houseid` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `description` varchar(255) NULL DEFAULT NULL,
  `timestart` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `timeend` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `created` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `deleted` int(10) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for House - Documents
				 * CZ: Vytvoření tabulky pro Bytový dům - Dokumentace
				 *
				 * @id			integer			| Primary key
				 * @ftime		integer			| Unixtime value from stat() function (Unixtima in seconds)
				 * @fsize		integer			| Value from stat() function (size of file in bytes)
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_housedocu (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `houseid` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `description` varchar(255) NULL DEFAULT NULL,
  `fname` varchar(255) NULL DEFAULT NULL,
  `fullpath` varchar(255) NULL DEFAULT NULL,
  `ftime` int NOT NULL,
  `fsize` int NOT NULL,
  `created` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for House - Photo Gallery
				 * CZ: Vytvoření tabulky pro Bytový dům - Foto Galerie
				 *
				 * @id			integer			| Primary key
				 * @ftime		integer			| Unixtime value from stat() function (Unixtima in seconds)
				 * @fsize		integer			| Value from stat() function (size of file in bytes)
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_houseimg (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `houseid` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `shortdescription` varchar(255) NULL DEFAULT NULL,
  `description` varchar(255) NULL DEFAULT NULL,
  `filenameoriginal` varchar(255) NULL DEFAULT NULL,
  `filenamethumb` varchar(255) NULL DEFAULT NULL,
  `widthoriginal` varchar(255) NULL DEFAULT NULL,
  `heightoriginal` varchar(255) NULL DEFAULT NULL,
  `widththumb` varchar(255) NULL DEFAULT NULL,
  `heightthumb` varchar(255) NULL DEFAULT NULL,
  `mainfolder` varchar(255) NULL DEFAULT NULL,
  `category` varchar(255) NULL DEFAULT NULL,
  `subcategory` varchar(255) NULL DEFAULT NULL,
  `ftime` int NOT NULL,
  `fsize` int NOT NULL,
  `exifmake` varchar(255) NULL DEFAULT NULL,
  `exifmodel` varchar(255) NULL DEFAULT NULL,
  `exifsoftware` varchar(255) NULL DEFAULT NULL,
  `exifimagewidth` varchar(255) NULL DEFAULT NULL,
  `exifimageheight` varchar(255) NULL DEFAULT NULL,
  `exiforientation` varchar(255) NULL DEFAULT NULL,
  `exifcreatedate` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `created` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for House - Video Gallery
				 * CZ: Vytvoření tabulky pro Bytový dům - Video Galerie
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_housevideo (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `houseid` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `shortdescription` varchar(255) NULL DEFAULT NULL,
  `description` varchar(255) NULL DEFAULT NULL,
  `filename` varchar(255) NULL DEFAULT NULL,
  `filenamethumb` varchar(255) NULL DEFAULT NULL,
  `mainfolder` varchar(255) NULL DEFAULT NULL,
  `category` varchar(255) NULL DEFAULT NULL,
  `subcategory` varchar(255) NULL DEFAULT NULL,
  `ftime` int NOT NULL,
  `fsize` int NOT NULL,
  `created` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				// EN: Create table for plugin (House - Notification)
				// CZ: Vytvoření tabulky pro plugin (Bytový dům - Notifikace)
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_housenotifications (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NULL DEFAULT NULL,
  `varname` varchar(255) NULL DEFAULT NULL,
  `type` varchar(255) NULL DEFAULT NULL,
  `shortdescription` varchar(255) NULL DEFAULT NULL,
  `content` text NULL,
  `permission` varchar(100) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				// EN: Create table for plugin (House - Notification)
				// CZ: Vytvoření tabulky pro plugin (Bytový dům - Notifikace)
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_housenotificationug (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `notification_id` varchar(100) NOT NULL DEFAULT 0,
  `usergroup_id` varchar(100) NOT NULL DEFAULT 0,
  `unread`  varchar(255) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        $succesfully = 1;

				// EN: If the correct installation process, write data to tables
				// CZ: Pokud proběhla instalace úspěšně, zápis dat do tabulek
				if ($succesfully) {
					include_once('install/mysql.php');
				}

        ?>

          <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít
          </button>
          <script>
            $(document).ready(function () {
              'use strict';
              // Apply the plugin to the body
              $('#notificationcontainer').pgNotification({
                style: 'bar',
                message: '<?=$tlint2["int2_install"]["int2inst4"]?>',
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

        $result = $envodb -> query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "' . $plugins . '"');

        ?>

          <div class="alert bg-danger"><?= $tlint2["int2_install"]["int2inst5"] ?></div>
          <form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
            <button type="submit" name="redirect" class="btn btn-danger btn-block">
              <?= $tlint2["int2_install"]["int2inst6"] ?>
            </button>
          </form>

        <?php }
        }
        if (!$succesfully) { ?>
          <form name="company" method="post" action="install.php">
            <button type="submit" name="install" class="btn btn-complete btn-block">
              <?= $tlint2["int2_install"]["int2inst7"] ?>
            </button>
          </form>
        <?php }
        } ?>

      </div>
    </div>
  </div>

</body>
</html>