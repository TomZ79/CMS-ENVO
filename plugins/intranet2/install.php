<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/install.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

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
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `region` VARCHAR(255) NULL DEFAULT NULL,
  `region_ku_code` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				$envodb -> query("INSERT INTO " . DB_PREFIX . "int2_settings_region VALUES
(1, 'Karlovarská kraj','51')");

				/**
				 * EN: Create table for plugin (Settings - District)
				 * CZ: Vytvoření tabulky pro plugin (Nastavení - Okres)
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_settings_district (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `region_id` INT(11) NULL DEFAULT NULL,
  `district` VARCHAR(255) NULL DEFAULT NULL,
  `district_ku_code` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				$envodb -> query("INSERT INTO " . DB_PREFIX . "int2_settings_district VALUES
(1, 1, 'Karlovy Vary','3403'),
(2, 1, 'Sokolov',''),
(3, 1, 'Cheb','')");

				/**
				 * EN: Create table for plugin (Settings - City)
				 * CZ: Vytvoření tabulky pro plugin (Nastavení - Město)
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_settings_city (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `region_id` INT(11) NULL DEFAULT NULL,
  `district_id` INT(11) NULL DEFAULT NULL,
  `city` VARCHAR(255) NULL DEFAULT NULL,
  `city_ku_code` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				$envodb -> query("INSERT INTO " . DB_PREFIX . "int2_settings_city VALUES
(1, 1, 1, 'Abertamy','554979'),
(2, 1, 1, 'Andělská Hora','538001'),
(3, 1, 1, 'Bečov nad Teplou','554995'),
(4, 1, 1, 'Bochov','555029'),
(5, 1, 1, 'Boží Dar','506486'),
(6, 1, 1, 'Božičany','555045'),
(7, 1, 1, 'Bražec','500101'),
(8, 1, 1, 'Březová','537870'),
(9, 1, 1, 'Chodov','578011'),
(10, 1, 1, 'Chyše','555207'),
(12, 1, 1, 'Černava','538019'),
(11, 1, 1, 'Čichalov','506621'),
(13, 1, 1, 'Dalovice','537918'),
(14, 1, 1, 'Děpoltovice','538116'),
(15, 1, 1, 'Doupovské Hradiště','500127'),
(16, 1, 1, 'Hájek','538159'),
(17, 1, 1, 'Horní Blatná','555169'),
(18, 1, 1, 'Hory','551651'),
(19, 1, 1, 'Hradiště','555177'),
(20, 1, 1, 'Hroznětín','555185'),
(21, 1, 1, 'Jáchymov','555215'),
(22, 1, 1, 'Jenišov','537926'),
(23, 1, 1, 'Karlovy Vary','554961'),
(24, 1, 1, 'Kolová','555258'),
(25, 1, 1, 'Krásné Údolí','555304'),
(26, 1, 1, 'Krásný Les','578045'),
(27, 1, 1, 'Kyselka','555347'),
(28, 1, 1, 'Merklín','555363'),
(29, 1, 1, 'Mírová','537934'),
(30, 1, 1, 'Nejdek','555380'),
(31, 1, 1, 'Nová Role','555398'),
(32, 1, 1, 'Nové Hamry','506494'),
(33, 1, 1, 'Ostrov','555428'),
(34, 1, 1, 'Otovice','537969'),
(35, 1, 1, 'Otročín','555444'),
(36, 1, 1, 'Pernink','555452'),
(37, 1, 1, 'Pila','556947'),
(38, 1, 1, 'Pšov','555525'),
(39, 1, 1, 'Potůčky','555479'),
(40, 1, 1, 'Sadov','555533'),
(41, 1, 1, 'Smolné Pece','538027'),
(42, 1, 1, 'Stanovice','555550'),
(43, 1, 1, 'Stráž nad Ohří','555584'),
(44, 1, 1, 'Stružná','555592'),
(45, 1, 1, 'Šemnice','555614'),
(46, 1, 1, 'Štědrá','555622'),
(47, 1, 1, 'Teplička','537845'),
(48, 1, 1, 'Toužim','555657'),
(49, 1, 1, 'Útvina','555681'),
(50, 1, 1, 'Valeč','555690'),
(51, 1, 1, 'Velichov','555703'),
(52, 1, 1, 'Verušičky','555711'),
(53, 1, 1, 'Vojkovice','555738'),
(54, 1, 1, 'Vrbice','566675'),
(55, 1, 1, 'Vysoká Pec','556947'),
(56, 1, 1, 'Žlutice','555762')");

				/**
				 * EN: Create table for plugin (Settings - Katastrální území)
				 * CZ: Vytvoření tabulky pro plugin (Nastavení - Katastrální území)
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_settings_ku (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `region_id` INT(11) NULL DEFAULT NULL,
  `district_id` INT(11) NULL DEFAULT NULL,
  `city_id` INT(11) NULL DEFAULT NULL,
  `ku` VARCHAR(255) NULL DEFAULT NULL,
  `ku_code` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				$envodb -> query("INSERT INTO " . DB_PREFIX . "int2_settings_ku VALUES
(1, 1, 1, 1, 'Abertamy','600016'),
(2, 1, 1, 52, 'Albeřice u Hradiště','917923'),
(3, 1, 1, 2, 'Andělská Hora','600369'),
(4, 1, 1, 33, 'Arnoldov','715816'),
(5, 1, 1, 3, 'Bečov nad Teplou','601268'),
(6, 1, 1, 30, 'Bernov','702609'),
(7, 1, 1, 48, 'Bezděkov u Prachomet','732788'),
(8, 1, 1, 4, 'Bochov','606758'),
(9, 1, 1, 43, 'Boč','605891'),
(10, 1, 1, 23, 'Bohatice','663581'),
(11, 1, 1, 40, 'Bor u Karlových Var','607274'),
(12, 1, 1, 38, 'Borek u Štědré','736481'),
(13, 1, 1, 5, 'Boží Dar','608866'),
(14, 1, 1, 6, 'Božičany','608939'),
(15, 1, 1, 48, 'Branišov','627020'),
(16, 1, 1, 4, 'Bražec u Bochova','798720'),
(17, 1, 1, 7, 'Bražec u Doupova','917931'),
(18, 1, 1, 19, 'Bražec u Hradiště','990779'),
(19, 1, 1, 7, 'Bražec u Těšetic','930041'),
(20, 1, 1, 46, 'Brložec u Štědré','763179'),
(21, 1, 1, 35, 'Brť','716642'),
(22, 1, 1, 8, 'Březová','663697'),
(23, 1, 1, 52, 'Budov','780278'),
(24, 1, 1, 20, 'Bystřice u Hroznětína','648507'),
(25, 1, 1, 38, 'Chlum u Novosedel','706922'),
(26, 1, 1, 9, 'Chodov u Bečova nad Teplou','652148'),
(27, 1, 1, 49, 'Chylice u Útviny','775673'),
(28, 1, 1, 10, 'Chyše','655538'),
(29, 1, 1, 23, 'Cihelny','631043'),
(30, 1, 1, 23, 'Čankov','746746'),
(31, 1, 1, 12, 'Černava','620017'),
(32, 1, 1, 49, 'Český Chloumek','673731'),
(33, 1, 1, 11, 'Čichalov','623725'),
(34, 1, 1, 10, 'Čichořice','655511'),
(35, 1, 1, 4, 'Číhaná u Javorné','657727'),
(36, 1, 1, 13, 'Dalovice','624586'),
(37, 1, 1, 26, 'Damice','673901'),
(38, 1, 1, 14, 'Děpoltovice','625515'),
(39, 1, 1, 4, 'Dlouhá Lomnice','626422'),
(40, 1, 1, 48, 'Dobrá Voda u Toužimi','627038'),
(41, 1, 1, 33, 'Dolní Žďár u Ostrova','715859'),
(42, 1, 1, 46, 'Domašín u Zbraslavi','791776'),
(43, 1, 1, 23, 'Doubí u Karlových Var','631051'),
(44, 1, 1, 19, 'Doupov u Hradiště','990833'),
(45, 1, 1, 15, 'Doupovské Hradiště','917940'),
(46, 1, 1, 23, 'Drahovice','663701'),
(47, 1, 1, 42, 'Dražov','632325'),
(48, 1, 1, 48, 'Dřevohryzy','627046'),
(49, 1, 1, 23, 'Dvory','663549'),
(50, 1, 1, 30, 'Fojtov','634492'),
(51, 1, 1, 24, 'Háje u Karlových Var','668559'),
(52, 1, 1, 16, 'Hájek u Ostrova','636681'),
(53, 1, 1, 33, 'Hanušov','678287'),
(54, 1, 1, 4, 'Herstošice','772623'),
(55, 1, 1, 42, 'Hlinky','632317'),
(56, 1, 1, 33, 'Hluboký','664863'),
(57, 1, 1, 17, 'Horní Blatná','642380'),
(58, 1, 1, 44, 'Horní Tašovice','757250'),
(59, 1, 1, 33, 'Horní Žďár u Ostrova','715824'),
(60, 1, 1, 18, 'Hory u Jenišova','658383'),
(61, 1, 1, 20, 'Hroznětín','648515'),
(62, 1, 1, 1, 'Hřebečná','600024'),
(63, 1, 1, 52, 'Hřivínov','780286'),
(64, 1, 1, 10, 'Jablonná u Chyší','655619'),
(65, 1, 1, 21, 'Jáchymov','656437'),
(66, 1, 1, 53, 'Jakubov','784532'),
(67, 1, 1, 4, 'Javorná u Toužimi','657735'),
(68, 1, 1, 32, 'Jelení u Nových Hamrů','706159'),
(69, 1, 1, 22, 'Jenišov','658391'),
(70, 1, 1, 50, 'Jeřeň','776572'),
(71, 1, 1, 4, 'Jesínky','606804'),
(72, 1, 1, 31, 'Jimlíkov','608947'),
(73, 1, 1, 23, 'Karlovy Vary','663433'),
(74, 1, 1, 33, 'Kfely u Ostrova','664871'),
(75, 1, 1, 56, 'Knínice u Žlutic','780936'),
(76, 1, 1, 38, 'Kobylé','736490'),
(77, 1, 1, 48, 'Kojšovice','767921'),
(78, 1, 1, 38, 'Kolešov u Žlutic','736503'),
(79, 1, 1, 24, 'Kolová','668567'),
(80, 1, 1, 48, 'Komárov u Štědré','668672'),
(81, 1, 1, 43, 'Korunní','756423'),
(82, 1, 1, 53, 'Kosmová','669946'),
(83, 1, 1, 50, 'Kostrčany','670685'),
(84, 1, 1, 11, 'Kovářov u Žlutic','623733'),
(85, 1, 1, 4, 'Kozlov','671622'),
(86, 1, 1, 25, 'Krásné Údolí','673749'),
(87, 1, 1, 3, 'Krásný Jez','601276'),
(88, 1, 1, 26, 'Krásný Les','673927'),
(89, 1, 1, 33, 'Květnová','678295'),
(90, 1, 1, 27, 'Kyselka','678678'),
(91, 1, 1, 48, 'Lachovice','767930'),
(92, 1, 1, 46, 'Lažany u Štědré','763187'),
(93, 1, 1, 26, 'Léno','673935'),
(94, 1, 1, 30, 'Lesík','702617'),
(95, 1, 1, 40, 'Lesov','745880'),
(96, 1, 1, 28, 'Lípa','693120'),
(97, 1, 1, 48, 'Luhov u Toužimi','770400'),
(98, 1, 1, 52, 'Luka u Verušiček','688622'),
(99, 1, 1, 30, 'Lužec u Nejdku','634506'),
(100, 1, 1, 43, 'Malý Hrzín','605921'),
(101, 1, 1, 33, 'Maroltov','678309'),
(102, 1, 1, 35, 'Měchov','716651'),
(103, 1, 1, 28, 'Merklín u Karlových Var','693138'),
(104, 1, 1, 31, 'Mezirolí','705241'),
(105, 1, 1, 4, 'Mirotice u Kozlova','671631'),
(106, 1, 1, 29, 'Mírová','695556'),
(107, 1, 1, 56, 'Mlyňany','797774'),
(108, 1, 1, 38, 'Močidlec','706931'),
(109, 1, 1, 11, 'Mokrá u Chyší','655554'),
(110, 1, 1, 33, 'Mořičov','715956'),
(111, 1, 1, 46, 'Mostec','763195'),
(112, 1, 1, 50, 'Nahořečice','670693'),
(113, 1, 1, 30, 'Nejdek','702625'),
(114, 1, 1, 4, 'Německý Chloumek','657743'),
(115, 1, 1, 48, 'Nežichov','770418'),
(116, 1, 1, 14, 'Nivy','625523'),
(117, 1, 1, 27, 'Nová Kyselka','678686'),
(118, 1, 1, 31, 'Nová Role','705250'),
(119, 1, 1, 16, 'Nová Víska u Ostrova','636690'),
(120, 1, 1, 32, 'Nové Hamry','706167'),
(121, 1, 1, 4, 'Nové Kounice','657751'),
(122, 1, 1, 38, 'Novosedly u Žlutic','706949'),
(123, 1, 1, 20, 'Odeř','625531'),
(124, 1, 1, 25, 'Odolenovice','673757'),
(125, 1, 1, 30, 'Oldřichov u Nejdku','702633'),
(126, 1, 1, 28, 'Oldřiš u Merklína','693146'),
(127, 1, 1, 23, 'Olšová Vrata','663654'),
(128, 1, 1, 33, 'Ostrov nad Ohří','715883'),
(129, 1, 1, 43, 'Osvinov','756431'),
(130, 1, 1, 34, 'Otovice u Karlových Var','716596'),
(131, 1, 1, 35, 'Otročín','716669'),
(132, 1, 1, 4, 'Pávice','671649'),
(133, 1, 1, 4, 'Pěčkovice','671657'),
(134, 1, 1, 43, 'Peklo','756458'),
(135, 1, 1, 36, 'Pernink','719315'),
(136, 1, 1, 37, 'Pila','720593'),
(137, 1, 1, 26, 'Plavno','673943'),
(138, 1, 1, 23, 'Počerny','753831'),
(139, 1, 1, 40, 'Podlesí u Sadova','745898'),
(140, 1, 1, 10, 'Podštěly','655571'),
(141, 1, 1, 48, 'Políkno u Toužimi','770426'),
(142, 1, 1, 4, 'Polom u Údrče','772631'),
(143, 1, 1, 21, 'Popov u Jáchymova','656470'),
(144, 1, 1, 35, 'Poseč','716677'),
(145, 1, 1, 39, 'Potůčky','726516'),
(146, 1, 1, 30, 'Pozorka u Nejdku','634522'),
(147, 1, 1, 48, 'Prachomety','732796'),
(148, 1, 1, 46, 'Prohoř','733130'),
(149, 1, 1, 56, 'Protivec u Žlutic','733831'),
(150, 1, 1, 46, 'Přestání','763209')");

				/**
				 * EN: Create table for plugin (Settings - Real estate management)
				 * CZ: Vytvoření tabulky pro plugin (Nastavení - Správa nemovitosti)
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_settings_estatemanagement (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `www` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				$envodb -> query("INSERT INTO " . DB_PREFIX . "int2_settings_estatemanagement VALUES
(1, 'FIMA KV s.r.o.', 'www.fimakv.cz'),
(2, 'MACHEX KV s.r.o.', 'www.machexkv.cz'),
(3, 'IKON spol. s r.o.', 'www.ikon.cz'),
(4, 'Aval Rent s.r.o.', 'www.sprava85.cz'),
(5, 'ORBYT KV s.r.o.', 'www.orbyt.cz'),
(6, 'DOSPRA spol. s r.o.', 'www.dospra.cz'),
(7, 'Norobyt s.r.o.', ''),
(8, 'REBA s.r.o.', 'www.reba.cz'),
(9, 'ALFABYT s.r.o.', 'www.alfabyt.cz'),
(10, 'Bronislava Hánělová', 'www.snkv.cz')");

				/**
				 * EN: Create table for House
				 * CZ: Vytvoření tabulky pro Bytové domy
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_house (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `varname` VARCHAR(255) NULL DEFAULT NULL,
  `headquarters` VARCHAR(255) NULL DEFAULT NULL,
  `street` VARCHAR(255) NULL DEFAULT NULL,
  `city` INT(11) NULL DEFAULT NULL,
  `ku` INT(11) NULL DEFAULT NULL,
  `psc` VARCHAR(100) NULL DEFAULT NULL,
  `ic` VARCHAR(100) NULL DEFAULT NULL,
  `state` VARCHAR(255) NULL DEFAULT NULL,
  `administration` INT(1) UNSIGNED NOT NULL DEFAULT 0,
  `administrationdate` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `ares` INT(1) NOT NULL DEFAULT 0,
  `justice` INT(1) NOT NULL DEFAULT 0,
  `housejusticelaw` TEXT NULL DEFAULT NULL,
  `housedescription` VARCHAR(255) NULL DEFAULT NULL,
  `mainemail` VARCHAR(255) NULL DEFAULT NULL,
  `contactcontrol` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `housefname` VARCHAR(255) NULL DEFAULT NULL,
  `housefstreet` VARCHAR(255) NULL DEFAULT NULL,
  `housefcity` VARCHAR(255) NULL DEFAULT NULL,
  `housefpsc` VARCHAR(255) NULL DEFAULT NULL,
  `housefic` VARCHAR(100) NULL DEFAULT NULL,
  `housefdic` VARCHAR(100) NULL DEFAULT NULL,
  `permission` VARCHAR(100) NOT NULL DEFAULT 0,
  `estatemanagement` INT(5) NOT NULL DEFAULT 0,
  `folder` VARCHAR(100) NULL DEFAULT NULL,
  `created` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for House - Entrance
				 * CZ: Vytvoření tabulky pro Bytový dům - Vchody
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_houseent (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `houseid` INT(10) DEFAULT NULL,
  `street` VARCHAR(255) NULL DEFAULT NULL,
  `elevator` INT(1) NOT NULL DEFAULT 0,
  `apartment` INT(10) NOT NULL DEFAULT 0,
  `gpslat` VARCHAR(255) NULL DEFAULT NULL,
  `gpslng` VARCHAR(255) NULL DEFAULT NULL,
  `katastr` VARCHAR(255) NULL DEFAULT NULL,
  `created` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for House - Tasks list
				 * CZ: Vytvoření tabulky pro Bytový dům - Úkoly
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_housetasks (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `houseid` INT(10) DEFAULT NULL,
  `priority` VARCHAR(255) NULL DEFAULT NULL,
  `status` VARCHAR(255) NULL DEFAULT NULL,
  `title` VARCHAR(255) NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `reminder` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `time` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `created` TIMESTAMP NULL DEFAULT NULL,
  `updated` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for House - Services
				 * CZ: Vytvoření tabulky pro Bytový dům - Servis
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_houseserv (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `houseid` INT(10) UNSIGNED NOT NULL DEFAULT 0,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `timestart` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `timeend` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `created` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `deleted` INT(10) UNSIGNED NOT NULL DEFAULT 0,
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
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `houseid` INT(10) UNSIGNED NOT NULL DEFAULT 0,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `fname` VARCHAR(255) NULL DEFAULT NULL,
  `fullpath` VARCHAR(255) NULL DEFAULT NULL,
  `ftime` INT NOT NULL,
  `fsize` INT NOT NULL,
  `created` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
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
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `houseid` INT(10) UNSIGNED NOT NULL DEFAULT 0,
  `shortdescription` VARCHAR(255) NULL DEFAULT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `filenameoriginal` VARCHAR(255) NULL DEFAULT NULL,
  `filenamethumb` VARCHAR(255) NULL DEFAULT NULL,
  `widthoriginal` VARCHAR(255) NULL DEFAULT NULL,
  `heightoriginal` VARCHAR(255) NULL DEFAULT NULL,
  `widththumb` VARCHAR(255) NULL DEFAULT NULL,
  `heightthumb` VARCHAR(255) NULL DEFAULT NULL,
  `mainfolder` VARCHAR(255) NULL DEFAULT NULL,
  `category` VARCHAR(255) NULL DEFAULT NULL,
  `subcategory` VARCHAR(255) NULL DEFAULT NULL,
  `ftime` INT NOT NULL,
  `fsize` INT NOT NULL,
  `exifmake` VARCHAR(255) NULL DEFAULT NULL,
  `exifmodel` VARCHAR(255) NULL DEFAULT NULL,
  `exifsoftware` VARCHAR(255) NULL DEFAULT NULL,
  `exifimagewidth` VARCHAR(255) NULL DEFAULT NULL,
  `exifimageheight` VARCHAR(255) NULL DEFAULT NULL,
  `exiforientation` VARCHAR(255) NULL DEFAULT NULL,
  `exifcreatedate` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `created` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				/**
				 * EN: Create table for House - Video Gallery
				 * CZ: Vytvoření tabulky pro Bytový dům - Video Galerie
				 */
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int_housevideo (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `houseid` INT(10) UNSIGNED NOT NULL DEFAULT 0,
  `shortdescription` VARCHAR(255) NULL DEFAULT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `filename` VARCHAR(255) NULL DEFAULT NULL,
  `filenamethumb` VARCHAR(255) NULL DEFAULT NULL,
  `mainfolder` VARCHAR(255) NULL DEFAULT NULL,
  `category` VARCHAR(255) NULL DEFAULT NULL,
  `subcategory` VARCHAR(255) NULL DEFAULT NULL,
  `ftime` INT NOT NULL,
  `fsize` INT NOT NULL,
  `created` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
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
  `created` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

				// EN: Create table for plugin (House - Notification)
				// CZ: Vytvoření tabulky pro plugin (Bytový dům - Notifikace)
				$envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'int2_housenotificationug (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `notification_id` varchar(100) NOT NULL DEFAULT 0,
  `usergroup_id` varchar(100) NOT NULL DEFAULT 0,
  `unread`  varchar(255) NOT NULL DEFAULT 0,
  `created` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\',
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