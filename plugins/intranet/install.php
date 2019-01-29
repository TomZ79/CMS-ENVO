  <?php

	// EN: Include the config file ...
	// CZ: Vložení konfiguračního souboru ...
	if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/install.php] => "config.php" not found');
	require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// Check if the file is accessed only from a admin if not stop the script from running
$php_errormsg = 'To edit the file, you must be logged in as an ADMINISTRATOR !!! You cannot access this file directly.';
$php_errormsg1 = 'Only ADMINISTRATOR privileges allow you to edit the file !!! You cannot access this file directly.';
if (!ENVO_USERID) die($php_errormsg);

if (!$envouser -> envoAdminAccess($envouser -> getVar("usergroupid"))) die($php_errormsg1);

// Set successfully to zero
$succesfully = 0;

// EN: Load the language file for plugin
// CZ: Načtení jazykového souboru pro plugin
if (file_exists(APP_PATH . 'plugins/intranet/admin/lang/' . $site_language . '.ini')) {
  $tlint = parse_ini_file(APP_PATH . 'plugins/intranet/admin/lang/' . $site_language . '.ini', TRUE);
} else {
  $tlint = parse_ini_file(APP_PATH . 'plugins/intranet/admin/lang/en.ini', TRUE);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title><?= $tlint["int_install"]["intinst"] ?></title>
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
          <h3 class="semi-bold text-white"><?= $tlint["int_install"]["intinst"] ?></h3>
        </div>
        <hr>
        <div id="notificationcontainer"></div>
        <div class="m-b-30">

          <h4 class="semi-bold"><?= $tlint["int_install"]["intinst1"] ?></h4>

          <div data-pages="card" class="card card-transparent" id="card-basic">
            <div class="card-header separator">
              <div class="card-title"><?= $tlint["int_install"]["intinst2"] ?></div>
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
        $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "intranet"');
        if ($envodb -> affected_rows > 0) { ?>

          <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít
          </button>
          <script>
            $(document).ready(function () {
              'use strict';
              // Apply the plugin to the body
              $('#notificationcontainer').pgNotification({
                style: 'bar',
                message: '<?=$tlint["int_install"]["intinst3"]?>',
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
        $envodb -> query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `sidenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "Intranet", "Intranet.", 1, ' . ENVO_USERID . ', 1, "intranet", "require_once APP_PATH.\'plugins/intranet/intranet.php\';", "if ($page == \'intranet\') {
        require_once APP_PATH.\'plugins/intranet/admin/intranet.php\';
           $ENVO_PROVED = 1;
           $checkp = 1;
        }", "../plugins/intranet/admin/template/int_nav.php", "intranet", "uninstall.php", "1.2", NOW())');

        // EN: Now get the plugin 'id' from table 'plugins' for futher use
        // CZ: Nyní zpět získáme 'id' pluginu z tabulky 'plugins' pro další použití
        $results = $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Intranet"');
        $rows = $results -> fetch_assoc();

        if ($rows['id']) {
        // EN: If plugin have 'id' (plugin is installed), install other data for plugin (create tables and write data to tables)
        // CZ: Pokud má plugin 'id' (tzn. plugin je instalován), instalujeme další data pro plugin (vytvoření tabulek a zápis dat do tabulek)

        // EN: Set admin lang of plugin
        // CZ: Nastavení jazyka pro administrační rozhraní pluginu
        $adminlang = 'if (file_exists(APP_PATH.\'plugins/intranet/admin/lang/\'.$site_language.\'.ini\')) {
  $tlint = parse_ini_file(APP_PATH.\'plugins/intranet/admin/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlint = parse_ini_file(APP_PATH.\'plugins/intranet/admin/lang/en.ini\', true);
}';

        // EN: Set site lang of plugin
        // CZ: Nastavení jazyka pro webové rozhraní pluginu
        $sitelang = 'if (file_exists(APP_PATH.\'plugins/intranet/lang/\'.$site_language.\'.ini\')) {
  $tlint = parse_ini_file(APP_PATH.\'plugins/intranet/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlint = parse_ini_file(APP_PATH.\'plugins/intranet/lang/en.ini\', true);
}';

        // EN: Hook System - Index: set files for other uses
        // CZ: Hook System - Index: nastavení používaných souborů
        $index_top = 'include_once APP_PATH.\'plugins/intranet/hooks/hook_index_top.php\';';

        // EN: Usergroup - Insert php code (get data from plugin setting in usergroup)
        // CZ: Usergroup - Vložení php kódu (získání dat z nastavení pluginu v uživatelské skupině)
        $insertphpcode = 'if (isset($defaults[\'envo_intranet\'])) {
	$insert .= \'intranet = \"\'.$defaults[\'envo_intranet\'].\'\",\'; }';

        // EN: Insert data to table 'pluginhooks'
        // CZ: Vložení potřebných dat to tabulky 'pluginhooks'
        $envodb -> query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_admin_lang", "Intranet Admin Language", "' . $adminlang . '", "intranet", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_lang", "Intranet Site Language", "' . $sitelang . '", "intranet", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_head", "Intranet Admin CSS", "plugins/intranet/admin/template/css.intranet.php", "intranet", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "php_index_top", "Intranet Index", "' . $index_top . '", "intranet", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup", "Intranet Usergroup New", "plugins/intranet/admin/template/usergroup_new.php", "intranet", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup_edit", "Intranet Usergroup Edit", "plugins/intranet/admin/template/usergroup_edit.php", "intranet", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_usergroup", "Intranet Usergroup SQL", "' . $insertphpcode . '", "intranet", 1, 1, "' . $rows['id'] . '", NOW())');

        // EN: Insert data to table 'setting'
        // CZ: Vložení potřebných dat to tabulky 'setting'
        $envodb -> query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("intranettitle", "intranet", "Intranet", "Intranet", "input", "free", "intranet"),
("intranetskin", "intranet", "", "", "select", "free", "intranet"),
("intranetdateformat", "intranet", "d.m.Y", "d.m.Y", "input", "free", "intranet"),
("intranettimeformat", "intranet", NULL, NULL, "input", "free", "intranet")');

        // EN: Insert data to table 'usergroup'
        // CZ: Vložení potřebných dat to tabulky 'usergroup'
        $envodb -> query('ALTER TABLE ' . DB_PREFIX . 'usergroup ADD `intranet` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `advsearch`, ADD `intranetanalytics` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `intranet`');

        // EN: Insert data to table 'categories' (Create category)
        // CZ: Vložení potřebných dat to tabulky 'categories' (Vytvoření kategorie)
        $envodb -> query('INSERT INTO ' . DB_PREFIX . 'categories (`id`, `name`, `varname`, `catimg`, `showmenu`, `showfooter`, `catorder`, `catparent`, `pageid`, `activeplugin`, `pluginid`) VALUES
(NULL, "Intranet", "intranet", NULL, 1, 0, 5, 0, 0, 1, "' . $rows['id'] . '")');

        // EN: Create table for plugin (Settings - TV Tower)
        // CZ: Vytvoření tabulky pro plugin (Nastavení - TV Vysílače)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_housetower (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NULL DEFAULT NULL,
  `varname` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (Settings - TV Channel)
        // CZ: Vytvoření tabulky pro plugin (Nastavení - TV Kanály)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_housechannel (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `towerid` varchar(255) NULL DEFAULT NULL,
  `number` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (Settings - TV Channel on TV Tower)
        // CZ: Vytvoření tabulky pro plugin (Nastavení - TV Kanály na TV Vysílači)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_housechanneltower (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `towerids` varchar(255) NULL DEFAULT NULL,
  `numbers` varchar(255) NULL DEFAULT NULL,
  `varname` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (Settings - Region)
        // CZ: Vytvoření tabulky pro plugin (Nastavení - Kraj)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_settings_region (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (Settings - District)
        // CZ: Vytvoření tabulky pro plugin (Nastavení - Okres)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_settings_district (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NULL DEFAULT NULL,
  `district` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (Settings - City)
        // CZ: Vytvoření tabulky pro plugin (Nastavení - Město)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_settings_city (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NULL DEFAULT NULL,
  `district_id` int(11) NULL DEFAULT NULL,
  `city` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (Settings - City Area)
        // CZ: Vytvoření tabulky pro plugin (Nastavení - Oblast města)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_settings_cityarea (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NULL DEFAULT NULL,
  `district_id` int(11) NULL DEFAULT NULL,
  `city_id` int(11) NULL DEFAULT NULL,
  `city_area` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (House in administration)
        // CZ: Vytvoření tabulky pro plugin (Bytový dům ve správě)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_house (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NULL DEFAULT NULL,
  `varname` varchar(255) NULL DEFAULT NULL,
  `headquarters` varchar(255) NULL DEFAULT NULL,
  `street` varchar(255) NULL DEFAULT NULL,
  `city` varchar(255) NULL DEFAULT NULL,
  `cityarea` varchar(255) NULL DEFAULT NULL,
  `psc` varchar(100) NULL DEFAULT NULL,
  `ic` varchar(100) NULL DEFAULT NULL,
  `state` varchar(255) NULL DEFAULT NULL,
  `latitude` varchar(255) NULL DEFAULT NULL,
  `longitude` varchar(255) NULL DEFAULT NULL,
  `ikatastr` varchar(255) NULL DEFAULT NULL,
  `justice` int(1) unsigned NOT NULL DEFAULT 0,
  `ares` int(1) unsigned NOT NULL DEFAULT 0,
  `housedescription` varchar(255) NULL DEFAULT NULL,
  `antennadescription` text NULL DEFAULT NULL,
  `mainemail` varchar(255) NULL DEFAULT NULL,
  `housefname` varchar(255) NULL DEFAULT NULL,
  `housefstreet` varchar(255) NULL DEFAULT NULL,
  `housefcity` varchar(255) NULL DEFAULT NULL,
  `housefpsc` varchar(255) NULL DEFAULT NULL,
  `housefic` varchar(100) NULL DEFAULT NULL,
  `housefdic` varchar(100) NULL DEFAULT NULL,
  `preparationdvb` TINYINT(1) NOT NULL DEFAULT 0,
  `permission` varchar(100) NOT NULL DEFAULT 0,
  `countentrance` int(5) unsigned NOT NULL DEFAULT 0,
  `countapartment` int(10) unsigned NOT NULL DEFAULT 0,
  `elevator` int(5) unsigned NOT NULL DEFAULT 0,
  `folder` varchar(100) NULL DEFAULT NULL,
  `created` TIMESTAMP NULL DEFAULT NULL,
  `updated` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (House without administration)
        // CZ: Vytvoření tabulky pro plugin (Bytový dům není správě)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_houseanalytics (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NULL DEFAULT NULL,
  `varname` varchar(255) NULL DEFAULT NULL,
  `headquarters` varchar(255) NULL DEFAULT NULL,
  `street` varchar(255) NULL DEFAULT NULL,
  `city` varchar(255) NULL DEFAULT NULL,
  `cityarea` varchar(255) NULL DEFAULT NULL,
  `psc` varchar(100) NULL DEFAULT NULL,
  `ic` varchar(100) NULL DEFAULT NULL,
  `state` varchar(255) NULL DEFAULT NULL,
  `latitude` varchar(255) NULL DEFAULT NULL,
  `longitude` varchar(255) NULL DEFAULT NULL,
  `ikatastr` varchar(255) NULL DEFAULT NULL,
  `justice` int(1) unsigned NOT NULL DEFAULT 0,
  `ares` int(1) unsigned NOT NULL DEFAULT 0,
  `housejusticelaw` text NULL DEFAULT NULL,
  `housedescription` text NULL DEFAULT NULL,
  `antennadescription` text NULL DEFAULT NULL,
  `mainemail` varchar(255) NULL DEFAULT NULL,
  `contact1` varchar(255) NULL DEFAULT NULL,
  `contactphone1` varchar(255) NULL DEFAULT NULL,
  `contactmail1` varchar(255) NULL DEFAULT NULL,
  `contactdate1` varchar(255) NULL DEFAULT NULL,
  `contactaddress1` varchar(255) NULL DEFAULT NULL,
  `contactfacebook1` varchar(255) NULL DEFAULT NULL,
  `contact2` varchar(255) NULL DEFAULT NULL,
  `contactphone2` varchar(255) NULL DEFAULT NULL,
  `contactmail2` varchar(255) NULL DEFAULT NULL,
  `contactdate2` varchar(255) NULL DEFAULT NULL,
  `contactaddress2` varchar(255) NULL DEFAULT NULL,
  `contactfacebook2` varchar(255) NULL DEFAULT NULL,
  `contact3` varchar(255) NULL DEFAULT NULL,
  `contactphone3` varchar(255) NULL DEFAULT NULL,
  `contactmail3` varchar(255) NULL DEFAULT NULL,
  `contactdate3` varchar(255) NULL DEFAULT NULL,
  `contactaddress3` varchar(255) NULL DEFAULT NULL,
  `contactfacebook3` varchar(255) NULL DEFAULT NULL,
  `contact4` varchar(255) NULL DEFAULT NULL,
  `contactphone4` varchar(255) NULL DEFAULT NULL,
  `contactmail4` varchar(255) NULL DEFAULT NULL,
  `contactdate4` varchar(255) NULL DEFAULT NULL,
  `contactaddress4` varchar(255) NULL DEFAULT NULL,
  `contactfacebook4` varchar(255) NULL DEFAULT NULL,
  `contact5` varchar(255) NULL DEFAULT NULL,
  `contactphone5` varchar(255) NULL DEFAULT NULL,
  `contactmail5` varchar(255) NULL DEFAULT NULL,
  `contactdate5` varchar(255) NULL DEFAULT NULL,
  `contactaddress5` varchar(255) NULL DEFAULT NULL,
  `contactfacebook5` varchar(255) NULL DEFAULT NULL,
  `contact6` varchar(255) NULL DEFAULT NULL,
  `contactphone6` varchar(255) NULL DEFAULT NULL,
  `contactmail6` varchar(255) NULL DEFAULT NULL,
  `contactdate6` varchar(255) NULL DEFAULT NULL,
  `contactaddress6` varchar(255) NULL DEFAULT NULL,
  `contactfacebook6` varchar(255) NULL DEFAULT NULL,
  `contact7` varchar(255) NULL DEFAULT NULL,
  `contact8` varchar(255) NULL DEFAULT NULL,
  `contact9` varchar(255) NULL DEFAULT NULL,
  `contact10` varchar(255) NULL DEFAULT NULL,
  `contact11` varchar(255) NULL DEFAULT NULL,
  `contact12` varchar(255) NULL DEFAULT NULL,
  `contactcontrol` DATETIME DEFAULT NULL,
  `folder` varchar(100) NULL DEFAULT NULL,
  `created` TIMESTAMP NULL DEFAULT NULL,
  `updated` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (House - Tasks list)
        // CZ: Vytvoření tabulky pro plugin (Bytový dům - Úkoly)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_housetasks (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `houseid` int(10) DEFAULT NULL,
  `priority` varchar(255) NULL DEFAULT NULL,
  `status` varchar(255) NULL DEFAULT NULL,
  `title` varchar(255) NULL DEFAULT NULL,
  `description` text NULL DEFAULT NULL,
  `reminder` DATETIME DEFAULT NULL,
  `time` DATETIME DEFAULT NULL,
  `created` TIMESTAMP NULL DEFAULT NULL,
  `updated` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (House - Main Contacts)
        // CZ: Vytvoření tabulky pro plugin (Bytový dům - Hlavní kontakty)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_housecontact (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `houseid` int(10) unsigned NOT NULL DEFAULT 0,
  `name` varchar(100) NULL DEFAULT NULL,
  `address` varchar(100) NULL DEFAULT NULL,
  `phone` varchar(100) NULL DEFAULT NULL,
  `email` varchar(100) NULL DEFAULT NULL,
  `commission` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (House - Entrance)
        // CZ: Vytvoření tabulky pro plugin (Bytový dům - Vchody)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_houseent (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `houseid` int(10) unsigned NOT NULL DEFAULT 0,
  `entrance` varchar(100) NULL DEFAULT NULL,
  `countapartment` varchar(100) NULL DEFAULT NULL,
  `countetage` varchar(100) NULL DEFAULT NULL,
  `elevator` varchar(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (House - Appartements)
        // CZ: Vytvoření tabulky pro plugin (Bytový dům - Byty)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_houseapt (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `houseid` int(10) unsigned NOT NULL DEFAULT 0,
  `entrance` varchar(255) NULL DEFAULT NULL,
  `number` varchar(255) NULL DEFAULT NULL,
  `etage` varchar(255) NULL DEFAULT NULL,
  `name` varchar(255) NULL DEFAULT NULL,
  `phone` varchar(255) NULL DEFAULT NULL,
  `commission` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (House - Services)
        // CZ: Vytvoření tabulky pro plugin (Bytový dům - Servis)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_houseserv (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `houseid` int(10) unsigned NOT NULL DEFAULT 0,
  `description` varchar(255) NULL DEFAULT NULL,
  `timedefault` DATETIME DEFAULT NULL,
  `timestart` DATETIME DEFAULT NULL,
  `timeend` DATETIME DEFAULT NULL,
  `timeedit` DATETIME DEFAULT NULL,
  `deleted` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (House - Documents)
        // CZ: Vytvoření tabulky pro plugin (Bytový dům - Dokumentace)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_housedocu (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `houseid` int(10) unsigned NOT NULL DEFAULT 0,
  `description` varchar(255) NULL DEFAULT NULL,
  `filename` varchar(255) NULL DEFAULT NULL,
  `fullpath` varchar(255) NULL DEFAULT NULL,
  `timedefault` DATETIME DEFAULT NULL,
  `timeedit` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (House - Documents)
        // CZ: Vytvoření tabulky pro plugin (Bytový dům - Dokumentace)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_houseanalyticsdocu (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `houseid` int(10) unsigned NOT NULL DEFAULT 0,
  `description` varchar(255) NULL DEFAULT NULL,
  `filename` varchar(255) NULL DEFAULT NULL,
  `fullpath` varchar(255) NULL DEFAULT NULL,
  `timedefault` DATETIME DEFAULT NULL,
  `timeedit` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (House - Photo Gallery)
        // CZ: Vytvoření tabulky pro plugin (Bytový dům - Foto Galerie)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_houseimg (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `houseid` int(10) unsigned NOT NULL DEFAULT 0,
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
  `timedefault` DATETIME DEFAULT NULL,
  `timeedit` DATETIME DEFAULT NULL,
  `exifmake` varchar(255) NULL DEFAULT NULL,
  `exifmodel` varchar(255) NULL DEFAULT NULL,
  `exifsoftware` varchar(255) NULL DEFAULT NULL,
  `exifimagewidth` varchar(255) NULL DEFAULT NULL,
  `exifimageheight` varchar(255) NULL DEFAULT NULL,
  `exiforientation` varchar(255) NULL DEFAULT NULL,
  `exifcreatedate` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (House - Photo Gallery)
        // CZ: Vytvoření tabulky pro plugin (Bytový dům - Foto Galerie)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_houseanalyticsimg (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `houseid` int(10) unsigned NOT NULL DEFAULT 0,
  `shortdescription` varchar(255) NULL DEFAULT NULL,
  `description` varchar(255) NULL DEFAULT NULL,
  `filenameoriginal` varchar(255) NULL DEFAULT NULL,
  `filenamethumb` varchar(255) NULL DEFAULT NULL,
  `sizeoriginal` varchar(255) NULL DEFAULT NULL,
  `sizethumb` varchar(255) NULL DEFAULT NULL,
  `widthoriginal` varchar(255) NULL DEFAULT NULL,
  `heightoriginal` varchar(255) NULL DEFAULT NULL,
  `widththumb` varchar(255) NULL DEFAULT NULL,
  `heightthumb` varchar(255) NULL DEFAULT NULL,
  `mainfolder` varchar(255) NULL DEFAULT NULL,
  `category` varchar(255) NULL DEFAULT NULL,
  `subcategory` varchar(255) NULL DEFAULT NULL,
  `timedefault` DATETIME DEFAULT NULL,
  `timeupload` DATETIME DEFAULT NULL,
  `timeedit` DATETIME DEFAULT NULL,
  `exifmake` varchar(255) NULL DEFAULT NULL,
  `exifmodel` varchar(255) NULL DEFAULT NULL,
  `exifsoftware` varchar(255) NULL DEFAULT NULL,
  `exifimagewidth` varchar(255) NULL DEFAULT NULL,
  `exifimageheight` varchar(255) NULL DEFAULT NULL,
  `exiforientation` varchar(255) NULL DEFAULT NULL,
  `exifcreatedate` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (House - Video Gallery)
        // CZ: Vytvoření tabulky pro plugin (Bytový dům - Video Galerie)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_housevideo (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `houseid` int(10) unsigned NOT NULL DEFAULT 0,
  `shortdescription` varchar(255) NULL DEFAULT NULL,
  `description` varchar(255) NULL DEFAULT NULL,
  `filename` varchar(255) NULL DEFAULT NULL,
  `filenamethumb` varchar(255) NULL DEFAULT NULL,
  `mainfolder` varchar(255) NULL DEFAULT NULL,
  `category` varchar(255) NULL DEFAULT NULL,
  `subcategory` varchar(255) NULL DEFAULT NULL,
  `timedefault` DATETIME DEFAULT NULL,
  `timeedit` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (House - Notification)
        // CZ: Vytvoření tabulky pro plugin (Bytový dům - Notifikace)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_housenotifications (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NULL DEFAULT NULL,
  `varname` varchar(255) NULL DEFAULT NULL,
  `type` varchar(255) NULL DEFAULT NULL,
  `shortdescription` varchar(255) NULL DEFAULT NULL,
  `content` text NULL,
  `permission` varchar(100) NOT NULL DEFAULT 0,
  `created` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (House - Notification)
        // CZ: Vytvoření tabulky pro plugin (Bytový dům - Notifikace)
        $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_housenotificationug (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `notification_id` varchar(100) NOT NULL DEFAULT 0,
  `usergroup_id` varchar(100) NOT NULL DEFAULT 0,
  `unread`  varchar(255) NOT NULL DEFAULT 0,
  `created` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

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
                message: '<?=$tlint["int_install"]["intinst4"]?>',
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

        $result = $envodb -> query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "Intranet"');

        ?>

          <div class="alert bg-danger"><?= $tlint["int_install"]["intinst5"] ?></div>
          <form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
            <button type="submit" name="redirect" class="btn btn-danger btn-block">
              <?= $tlint["int_install"]["intinst6"] ?>
            </button>
          </form>

        <?php }
        }
        if (!$succesfully) { ?>
          <form name="company" method="post" action="install.php">
            <button type="submit" name="install" class="btn btn-complete btn-block">
              <?= $tlint["int_install"]["intinst7"] ?>
            </button>
          </form>
        <?php }
        } ?>

      </div>
    </div>
  </div>

</body>
</html>