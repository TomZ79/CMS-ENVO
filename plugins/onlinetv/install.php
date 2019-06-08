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
$pluginversion = '1.0';
$plugins  = 'Online_TV';
$pluginname  = 'onlinetv';

// EN: Load the language file for plugin
// CZ: Načtení jazykového souboru pro plugin
if (file_exists(APP_PATH . 'plugins/' . $pluginname . '/admin/lang/' . $site_language . '.ini')) {
  $tlotv = parse_ini_file(APP_PATH . 'plugins/' . $pluginname . '/admin/lang/' . $site_language . '.ini', TRUE);
} else {
  $tlotv = parse_ini_file(APP_PATH . 'plugins/' . $pluginname . '/admin/lang/en.ini', TRUE);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title><?= $tlotv["otv_install"]["otvinst"] ?></title>
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
          <h3 class="semi-bold text-white"><?= $tlotv["otv_install"]["otvinst"] ?></h3>
        </div>
        <hr>
        <div id="notificationcontainer"></div>
        <div class="m-b-30">

          <h4 class="semi-bold"><?= $tlotv["otv_install"]["otvinst1"] ?></h4>

          <div data-pages="card" class="card card-transparent" id="card-basic">
            <div class="card-header separator">
              <div class="card-title"><?= $tlotv["otv_install"]["otvinst2"] ?></div>
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
                message: '<?=$tlotv["otv_install"]["otvinst3"]?>',
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
        $envodb -> query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `sidenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "' . $plugins . '", "' . $plugins . '", 1, ' . ENVO_USERID . ', 1, "' . $pluginname . '", "require_once APP_PATH.\'plugins/' . $pluginname . '/' . $pluginname . '.php\';", "if ($page == \'' . $pluginname . '\') {
        require_once APP_PATH.\'plugins/' . $pluginname . '/admin/' . $pluginname . '.php\';
           $ENVO_PROVED = 1;
           $checkp = 1;
        }", "../plugins/' . $pluginname . '/admin/template/onlinetv_nav.php", "' . $pluginname . '", "uninstall.php", "1.0", NOW())');

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
  $tlotv = parse_ini_file(APP_PATH.\'plugins/' . $pluginname . '/admin/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlotv = parse_ini_file(APP_PATH.\'plugins/' . $pluginname . '/admin/lang/en.ini\', true);
}';

        // EN: Set site lang of plugin
        // CZ: Nastavení jazyka pro webové rozhraní pluginu
        $sitelang = 'if (file_exists(APP_PATH.\'plugins/' . $pluginname . '/lang/\'.$site_language.\'.ini\')) {
  $tlotv = parse_ini_file(APP_PATH.\'plugins/' . $pluginname . '/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlotv = parse_ini_file(APP_PATH.\'plugins/' . $pluginname . '/lang/en.ini\', true);
}';
        // EN: Usergroup - Insert php code (get data from plugin setting in usergroup)
        // CZ: Usergroup - Vložení php kódu (získání dat z nastavení pluginu v uživatelské skupině)
        $insertphpcode = 'if (isset($defaults[\'envo_onlinetvplugin\'])) {
	$insert .= \'onlinetv = \"\'.$defaults[\'envo_onlinetvplugin\'].\'\",\'; }';

        // EN: Insert data to table 'pluginhooks'
        // CZ: Vložení potřebných dat to tabulky 'pluginhooks'
        $envodb -> query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_admin_lang", "Online TV Admin Language", "' . $adminlang . '", "' . $pluginname . '", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_lang", "Online TV Site Language", "' . $sitelang . '", "' . $pluginname . '", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_head", "Online TV Admin CSS", "plugins/' . $pluginname . '/admin/template/css.onlinetv.php", "' . $pluginname . '", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup", "Online TV Usergroup New", "plugins/' . $pluginname . '/admin/template/usergroup_new.php", "' . $pluginname . '", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup_edit", "Online TV Usergroup Edit", "plugins/' . $pluginname . '/admin/template/usergroup_edit.php", "' . $pluginname . '", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_usergroup", "Online TV Usergroup SQL", "' . $insertphpcode . '", "' . $pluginname . '", 1, 1, "' . $rows['id'] . '", NOW())');

        // EN: Insert data to table 'setting'
        // CZ: Vložení potřebných dat to tabulky 'setting'
        $envodb -> query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("onlinetvplugintitle", "' . $pluginname . '", "Online TV Plugin", "Online TV Plugin", "input", "free", "' . $pluginname . '")');

        // EN: Insert data to table 'usergroup'
        // CZ: Vložení potřebných dat to tabulky 'usergroup'
        $envodb -> query('ALTER TABLE ' . DB_PREFIX . 'usergroup ADD `' . $pluginname . '` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `advsearch`');

        // EN: Insert data to table 'categories' (create category)
        // CZ: Vložení potřebných dat to tabulky 'categories' (vytvoření kategorie)
        $envodb -> query('INSERT INTO ' . DB_PREFIX . 'categories (`id`, `name`, `varname`, `catimg`, `showmenu`, `showfooter`, `catorder`, `catparent`, `pageid`, `activeplugin`, `pluginid`) VALUES
(NULL, "Online TV", "online-tv", NULL, 1, 0, 5, 0, 0, 1, "' . $rows['id'] . '")');

				/**
				 * EN: Create table for plugin (Settings - Language)
				 * CZ: Vytvoření tabulky pro plugin (Nastavení - Jazyková mutace)
				 *
				 * @description
				 * Jazyková mutace
				 * @link
				 * https://cs.wikipedia.org/wiki/Wikipedie:Seznam_jazyk%C5%AF_Wikipedie
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'otv_settings_lang (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(255) NULL DEFAULT NULL,
  `lang_name_cz` varchar(255) NULL DEFAULT NULL,
  `lang_code` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for plugin (Settings - Genre)
				 * CZ: Vytvoření tabulky pro plugin (Nastavení - Žánr)
				 *
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'otv_settings_genre (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(255) NULL DEFAULT NULL,
  `genre_name_cz` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for plugin (Settings - Country)
				 * CZ: Vytvoření tabulky pro plugin (Nastavení - Země původu)
				 *
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'otv_settings_country (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) NULL DEFAULT NULL,
  `country_name_cz` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for film
				 * CZ: Vytvoření tabulky pro filmy
				 *
				 * @description
				 * Tabulka se základními údaji o filmu
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'otv_film (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `original_name` varchar(255) NULL DEFAULT NULL,
  `en_name` varchar(255) NULL DEFAULT NULL,
  `cs_name` varchar(255) NULL DEFAULT NULL,
  `sk_name` varchar(255) NULL DEFAULT NULL,
  `cs_varname` varchar(255) NULL DEFAULT NULL,
  `film_year` year NOT NULL,
  `filmcsfd` varchar(255) NULL DEFAULT NULL,
  `filmimdb` varchar(255) NULL DEFAULT NULL,
  `folder` varchar(100) NULL DEFAULT NULL,
  `filmdescription` text NULL DEFAULT NULL,
  `genre` varchar(255) NULL DEFAULT NULL,
  `country` varchar(255) NULL DEFAULT NULL,
  `direction` text NULL DEFAULT NULL,
  `template` text NULL DEFAULT NULL,
  `screenplay` text NULL DEFAULT NULL,
  `actors` text NULL DEFAULT NULL,
  `video_o_2160` varchar(255) NULL DEFAULT NULL,
  `video_o_1440` varchar(255) NULL DEFAULT NULL,
  `video_o_1080` varchar(255) NULL DEFAULT NULL,
  `video_o_720` varchar(255) NULL DEFAULT NULL,
  `video_o_576` varchar(255) NULL DEFAULT NULL,
  `video_o_360` varchar(255) NULL DEFAULT NULL,
  `video_cs_2160` varchar(255) NULL DEFAULT NULL,
  `video_cs_1440` varchar(255) NULL DEFAULT NULL,
  `video_cs_1080` varchar(255) NULL DEFAULT NULL,
  `video_cs_720` varchar(255) NULL DEFAULT NULL,
  `video_cs_576` varchar(255) NULL DEFAULT NULL,
  `video_cs_360` varchar(255) NULL DEFAULT NULL,
  `subtitle_en` varchar(255) NULL DEFAULT NULL,
  `subtitle_cs` varchar(255) NULL DEFAULT NULL,
  `subtitle_sk` varchar(255) NULL DEFAULT NULL,
  `poster_1` varchar(255) NULL DEFAULT NULL,
  `poster_2` varchar(255) NULL DEFAULT NULL,
  `poster_3` varchar(255) NULL DEFAULT NULL,
  `poster_4` varchar(255) NULL DEFAULT NULL,
  `poster_5` varchar(255) NULL DEFAULT NULL,
  `trailer_1_link` varchar(255) NULL DEFAULT NULL,
  `trailer_1_text` varchar(255) NULL DEFAULT NULL,
  `trailer_2_link` varchar(255) NULL DEFAULT NULL,
  `trailer_2_text` varchar(255) NULL DEFAULT NULL,
  `preparation` int(1) NOT NULL DEFAULT 0,
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
                message: '<?=$tlotv["otv_install"]["otvinst4"]?>',
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

          <div class="alert bg-danger"><?= $tlotv["otv_install"]["otvinst5"] ?></div>
          <form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
            <button type="submit" name="redirect" class="btn btn-danger btn-block">
              <?= $tlotv["otv_install"]["otvinst6"] ?>
            </button>
          </form>

        <?php }
        }
        if (!$succesfully) { ?>
          <form name="company" method="post" action="install.php">
            <button type="submit" name="install" class="btn btn-complete btn-block">
              <?= $tlotv["otv_install"]["otvinst7"] ?>
            </button>
          </form>
        <?php }
        } ?>

      </div>
    </div>
  </div>

</body>
</html>