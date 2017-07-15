<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists('../../config.php')) die('[install.php] config.php not found');
require_once '../../config.php';

// Check if the file is accessed only from a admin if not stop the script from running
$php_errormsg = 'To edit the file, you must be logged in as an ADMINISTRATOR !!! You cannot access this file directly.';
$php_errormsg1 = 'Only ADMINISTRATOR privileges allow you to edit the file !!! You cannot access this file directly.';
if (!JAK_USERID) die($php_errormsg);

if (!$jakuser->jakAdminaccess($jakuser->getVar("usergroupid"))) die($php_errormsg1);

// Set successfully to zero
$succesfully = 0;

// Set language for plugin
if (file_exists(APP_PATH . 'plugins/program_offer/admin/lang/' . $site_language . '.ini')) {
  $tlpo = parse_ini_file(APP_PATH . 'plugins/program_offer/admin/lang/' . $site_language . '.ini', TRUE);
} else {
  $tlpo = parse_ini_file(APP_PATH . 'plugins/program_offer/admin/lang/en.ini', TRUE);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $tlpo["po_install"]["poinst"]; ?></title>
  <meta charset="utf-8">
  <!-- BEGIN Vendor CSS-->
  <link href="/admin/assets/plugins/bootstrapv3/css/bootstrap.min.css?=v3.3.4" rel="stylesheet" type="text/css"/>
  <link href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
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
  <script src="/assets/plugins/jquery/jquery-2.2.4.min.js" type="text/javascript"></script>
  <script src="/admin/assets/plugins/bootstrapv3/js/bootstrap.min.js?=v3.3.4" type="text/javascript"></script>
  <!-- BEGIN CORE TEMPLATE JS -->
  <script src="/admin/pages/js/pages.js?=v2.2.0"></script>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-12 m-t-20">
        <div class="jumbotron bg-master">
          <h3 class="semi-bold text-white"><?php echo $tlpo["po_install"]["poinst"]; ?></h3>
        </div>
        <hr>
        <div id="notificationcontainer"></div>
        <div class="m-b-30">
          <h4 class="semi-bold"><?php echo $tlpo["po_install"]["poinst1"]; ?></h4>

          <div id="portlet-advance" class="panel panel-transparent">
            <div class="panel-heading separator">
              <div class="panel-title"><?php echo $tlpo["po_install"]["poinst2"]; ?></div>
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
        $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Program_offer"');
        if ($jakdb->affected_rows > 0) { ?>

          <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít
          </button>
          <script>
            $(document).ready(function () {
              'use strict';
              // Apply the plugin to the body
              $('#notificationcontainer').pgNotification({
                style: 'bar',
                message: '<?php echo $tlpo["po_install"]["poinst3"]; ?>',
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
        $jakdb->query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `sidenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "Program_offer", "Program Offer", 1, ' . JAK_USERID . ', 1, "program_offer", "require_once APP_PATH.\'plugins/program_offer/programoffer.php\';", "if ($page == \'program-offer\') {
        require_once APP_PATH.\'plugins/program_offer/admin/programoffer.php\';
           $JAK_PROVED = 1;
           $checkp = 1;
        }", "../plugins/program_offer/admin/template/po_nav.php", "programoffer", "uninstall.php", "1.0", NOW())');

        // EN: Now get the plugin 'id' from table 'plugins' for futher use
        // CZ: Nyní zpět získáme 'id' pluginu z tabulky 'plugins' pro další použití
        $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Program_offer"');
        $rows    = $results->fetch_assoc();

        if ($rows['id']) {
        // EN: If plugin have 'id' (plugin is installed), install other data for plugin (create tables and write data to tables)
        // CZ: Pokud má plugin 'id' (tzn. plugin je instalován), instalujeme další data pro plugin (vytvoření tabulek a zápis dat do tabulek)

        // EN: Set admin lang of plugin
        // CZ: Nastavení jazyka pro administrační rozhraní pluginu
        $adminlang = 'if (file_exists(APP_PATH.\'plugins/program_offer/admin/lang/\'.$site_language.\'.ini\')) {
  $tlpo = parse_ini_file(APP_PATH.\'plugins/program_offer/admin/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlpo = parse_ini_file(APP_PATH.\'plugins/program_offer/admin/lang/en.ini\', true);
}';

        // EN: Set site lang of plugin
        // CZ: Nastavení jazyka pro webové rozhraní pluginu
        $sitelang = 'if (file_exists(APP_PATH.\'plugins/program_offer/lang/\'.$site_language.\'.ini\')) {
  $tlpo = parse_ini_file(APP_PATH.\'plugins/program_offer/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlpo = parse_ini_file(APP_PATH.\'plugins/program_offer/lang/en.ini\', true);
}';
        // EN: Usergroup - Insert php code (get data from plugin setting in usergroup)
        // CZ: Usergroup - Vložení php kódu (získání dat z nastavení pluginu v uživatelské skupině)
        $insertphpcode = 'if (isset($defaults[\'envo_programoffer\'])) {
	$insert .= \'programoffer = \"\'.$defaults[\'envo_programoffer\'].\'\",\'; }';

        // EN: Insert data to table 'pluginhooks'
        // CZ: Vložení potřebných dat to tabulky 'pluginhooks'
        $jakdb->query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_admin_lang", "Program Offer Admin Language", "' . $adminlang . '", "programoffer", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_lang", "Program Offer Site Language", "' . $sitelang . '", "programoffer", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup", "Program Offer Usergroup New", "plugins/program_offer/admin/template/usergroup_new.php", "programoffer", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup_edit", "Program Offer Usergroup Edit", "plugins/program_offer/admin/template/usergroup_edit.php", "programoffer", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_usergroup", "Program Offer Usergroup SQL", "' . $insertphpcode . '", "programoffer", 1, 1, "' . $rows['id'] . '", NOW())');

        // EN: Insert data to table 'setting'
        // CZ: Vložení potřebných dat to tabulky 'setting'
        $jakdb->query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("programoffertitle", "programoffer", "Program Offer", "Program Offer", "input", "free", "programoffer")');

        // EN: Insert data to table 'usergroup'
        // CZ: Vložení potřebných dat to tabulky 'usergroup'
        $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'usergroup ADD `programoffer` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `advsearch`');

        // EN: Insert data to table 'categories' (create category)
        // CZ: Vložení potřebných dat to tabulky 'categories' (vytvoření kategorie)
        $jakdb->query('INSERT INTO ' . DB_PREFIX . 'categories (`id`, `name`, `varname`, `catimg`, `showmenu`, `showfooter`, `catorder`, `catparent`, `pageid`, `activeplugin`, `pluginid`) VALUES
(NULL, "Program Offer", "program-offer", NULL, 1, 0, 5, 0, 0, 1, "' . $rows['id'] . '")');

        // EN: Create table for plugin (TV Tower)
        // CZ: Vytvoření tabulky pro plugin (TV Vysílače)
        $jakdb->query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'programoffertvtower (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `varname` varchar(255) DEFAULT NULL,
  `station` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `heightsea` int(10) unsigned NOT NULL DEFAULT 0,
  `eastlongitude` varchar(255) DEFAULT NULL,
  `northlatitude` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (TV Channel)
        // CZ: Vytvoření tabulky pro plugin (TV Kanál)
        $jakdb->query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'programoffertvchannel (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `towerid` int(11) unsigned NOT NULL DEFAULT 0,
  `number` varchar(255) DEFAULT NULL,
  `frequency` varchar(100) DEFAULT NULL,
  `freqrange` varchar(100) DEFAULT NULL,
  `polarization` varchar(100) DEFAULT NULL,
  `sitename` varchar(100) DEFAULT NULL,
  `erpkw` varchar(100) DEFAULT NULL,
  `erpdbw` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `towerid` (`towerid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

        // EN: Create table for plugin (TV Program)
        // CZ: Vytvoření tabulky pro plugin (TV Program)
        $jakdb->query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'programoffertvprogram (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` smallint(1) unsigned NOT NULL DEFAULT 1,
  `towerid` int(10) unsigned NOT NULL DEFAULT 0,
  `channelid` int(10) unsigned NOT NULL DEFAULT 0,
  `channelnumber` int(10) DEFAULT NULL,
  `tvr` smallint(1) unsigned NOT NULL DEFAULT 1,
  `name` varchar(100) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `online` smallint(1) unsigned NOT NULL DEFAULT 1,
  `videoencoding` varchar(100) DEFAULT NULL,
  `audioencoding` varchar(100) DEFAULT NULL,
  `videoformat` varchar(100) DEFAULT NULL,
  `videosize` varchar(100) DEFAULT NULL,
  `bitrate` varchar(100) DEFAULT NULL,
  `bitrate` varchar(100) DEFAULT NULL,
  `services` varchar(255) DEFAULT NULL,
  `time` DATETIME DEFAULT NULL,
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
                message: '<?php echo $tlpo["po_install"]["poinst4"]; ?>',
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

        $result = $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "Digital_house"');

        ?>

          <div class="alert bg-danger"><?php echo $tlpo["po_install"]["poinst5"]; ?></div>
          <form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
            <button type="submit" name="redirect" class="btn btn-danger btn-block"><?php echo $tlpo["po_install"]["poinst6"]; ?></button>
          </form>

        <?php }
        }
        if (!$succesfully) { ?>
          <form name="company" method="post" action="install.php">
            <button type="submit" name="install" class="btn btn-complete btn-block"><?php echo $tlpo["po_install"]["poinst7"]; ?></button>
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