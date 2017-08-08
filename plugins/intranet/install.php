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
  <title><?php echo $tlint["int_install"]["intinst"]; ?></title>
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
          <h3 class="semi-bold text-white"><?php echo $tlint["int_install"]["intinst"]; ?></h3>
        </div>
        <hr>
        <div id="notificationcontainer"></div>
        <div class="m-b-30">
          <h4 class="semi-bold"><?php echo $tlint["int_install"]["intinst1"]; ?></h4>

          <div id="portlet-advance" class="panel panel-transparent">
            <div class="panel-heading separator">
              <div class="panel-title"><?php echo $tlint["int_install"]["intinst2"]; ?></div>
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
        $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "intranet"');
        if ($jakdb->affected_rows > 0) { ?>

          <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít
          </button>
          <script>
            $(document).ready(function () {
              'use strict';
              // Apply the plugin to the body
              $('#notificationcontainer').pgNotification({
                style: 'bar',
                message: '<?php echo $tlint["int_install"]["intinst3"]; ?>',
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
        $jakdb->query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `sidenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "Intranet", "Intranet.", 1, ' . JAK_USERID . ', 1, "intranet", "require_once APP_PATH.\'plugins/intranet/intranet.php\';", "if ($page == \'intranet\') {
        require_once APP_PATH.\'plugins/intranet/admin/intranet.php\';
           $JAK_PROVED = 1;
           $checkp = 1;
        }", "../plugins/intranet/admin/template/int_nav.php", "intranet", "uninstall.php", "1.0", NOW())');

        // EN: Now get the plugin 'id' from table 'plugins' for futher use
        // CZ: Nyní zpět získáme 'id' pluginu z tabulky 'plugins' pro další použití
        $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Intranet"');
        $rows    = $results->fetch_assoc();

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
        // EN: Usergroup - Insert php code (get data from plugin setting in usergroup)
        // CZ: Usergroup - Vložení php kódu (získání dat z nastavení pluginu v uživatelské skupině)
        $insertphpcode = 'if (isset($defaults[\'jak_intranet\'])) {
	$insert .= \'intranet = \"\'.$defaults[\'jak_intranet\'].\'\",\'; }';

        // EN: Insert data to table 'pluginhooks'
        // CZ: Vložení potřebných dat to tabulky 'pluginhooks'
        $jakdb->query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_admin_lang", "Intranet Admin Language", "' . $adminlang . '", "intranet", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_lang", "Intranet Site Language", "' . $sitelang . '", "intranet", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup", "Intranet Usergroup New", "plugins/intranet/admin/template/usergroup_new.php", "intranet", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup_edit", "Intranet Usergroup Edit", "plugins/intranet/admin/template/usergroup_edit.php", "intranet", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_usergroup", "Intranet Usergroup SQL", "' . $insertphpcode . '", "intranet", 1, 1, "' . $rows['id'] . '", NOW())');

        // EN: Insert data to table 'setting'
        // CZ: Vložení potřebných dat to tabulky 'setting'
        $jakdb->query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("intranettitle", "intranet", "Intranet", "Intranet", "input", "free", "intranet"),
("intranetskin", "intranet", "", "", "select", "free", "intranet")');

        // EN: Insert data to table 'usergroup'
        // CZ: Vložení potřebných dat to tabulky 'usergroup'
        $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'usergroup ADD `intranet` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `advsearch`');

        // EN: Insert data to table 'categories' (create category)
        // CZ: Vložení potřebných dat to tabulky 'categories' (vytvoření kategorie)
        $jakdb->query('INSERT INTO ' . DB_PREFIX . 'categories (`id`, `name`, `varname`, `catimg`, `showmenu`, `showfooter`, `catorder`, `catparent`, `pageid`, `activeplugin`, `pluginid`) VALUES
(NULL, "Intranet", "intranet", NULL, 1, 0, 5, 0, 0, 1, "' . $rows['id'] . '")');



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
                message: '<?php echo $tlint["int_install"]["intinst4"]; ?>',
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

        $result = $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "Intranet"');

        ?>

          <div class="alert bg-danger"><?php echo $tlint["int_install"]["intinst5"]; ?></div>
          <form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
            <button type="submit" name="redirect" class="btn btn-danger btn-block"><?php echo $tlint["int_install"]["intinst6"]; ?></button>
          </form>

        <?php }
        }
        if (!$succesfully) { ?>
          <form name="company" method="post" action="install.php">
            <button type="submit" name="install" class="btn btn-complete btn-block"><?php echo $tlint["int_install"]["intinst7"]; ?></button>
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