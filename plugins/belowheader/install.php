<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/install.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Check if the file is accessed only from a admin if not stop the script from running
$php_errormsg = 'To edit the file, you must be logged in as an ADMINISTRATOR !!! You cannot access this file directly.';
$php_errormsg1 = 'Only ADMINISTRATOR privileges allow you to edit the file !!! You cannot access this file directly.';
if (!ENVO_USERID) die($php_errormsg);

if (!$envouser->envoAdminAccess($envouser->getVar("usergroupid"))) die($php_errormsg1);

// Set successfully to zero
$succesfully = 0;

// EN: Load the language file for plugin
// CZ: Načtení jazykového souboru pro plugin
if (file_exists(APP_PATH . 'plugins/belowheader/admin/lang/' . $site_language . '.ini')) {
  $tlbh = parse_ini_file(APP_PATH . 'plugins/belowheader/admin/lang/' . $site_language . '.ini', TRUE);
} else {
  $tlbh = parse_ini_file(APP_PATH . 'plugins/belowheader/admin/lang/en.ini', TRUE);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $tlbh["bh_install"]["bhinst"]; ?></title>
  <meta charset="utf-8">
  <!-- BEGIN Vendor CSS-->
  <?php
  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  echo $Html->addStylesheet('/assets/plugins/bootstrapv4/css/bootstrap.min.css?=v4.0.0alpha6');
  echo $Html->addStylesheet('/assets/plugins/font-awesome/4.7.0/css/font-awesome.css');
  ?>
  <!-- BEGIN Pages CSS-->
  <?php
  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  echo $Html->addStylesheet('/admin/pages/css/pages-icons.css?=v3.0.0');
  echo $Html->addStylesheet('/admin/pages/css/pages.min.css?=v3.0.0', '', array('class' => 'main-stylesheet'));
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
  echo $Html->addScript('/assets/plugins/jquery/jquery-1.11.1.min.js');
  echo $Html->addScript('/admin/assets/plugins/modernizr.custom.js?=v2.8.3');
  echo $Html->addScript('/assets/plugins/tether/js/tether.min.js');
  echo $Html->addScript('/assets/plugins/bootstrapv4/js/bootstrap.min.js?=v4.0.0alpha6');
  ?>
  <!-- BEGIN CORE TEMPLATE JS -->
  <?php
  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  echo $Html->addScript('/admin/pages/js/pages.min.js');
  ?>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-sm-12 m-t-20">
      <div class="jumbotron bg-master pt-1 pl-3 pb-1 pr-3">
        <h3 class="semi-bold text-white"><?php echo $tlbh["bh_install"]["bhinst"]; ?></h3>
      </div>
      <hr>
      <div id="notificationcontainer"></div>
      <div class="m-b-30">

        <h4 class="semi-bold"><?php echo $tlbh["bh_install"]["bhinst1"]; ?></h4>

        <div data-pages="card" class="card card-transparent" id="card-basic">
          <div class="card-header separator">
            <div class="card-title"><?php echo $tlbh["bh_install"]["bhinst2"]; ?></div>
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
            <p>Seznam komponent které budou odinstalovány v průběhu instalačního procesu tohoto pluginu</p>
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
      $envodb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "BelowHeader"');
      if ($envodb->affected_rows > 0) { ?>

        <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>
        <script>
          $(document).ready(function () {
            'use strict';
            // Apply the plugin to the body
            $('#notificationcontainer').pgNotification({
              style: 'bar',
              message: '<?php echo $tlbh["bh_install"]["bhinst2"]; ?>',
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
      $envodb->query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `managenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "BelowHeader", "Run your own Layer Slider.", 1, ' . ENVO_USERID . ', 4, "belowheader", "", "if ($page == \'belowheader\') {
        require_once APP_PATH.\'plugins/belowheader/admin/belowheader.php\';
        $ENVO_PROVED = 1;
        $checkp = 1;
      }", "../plugins/belowheader/admin/template/bhnav.php", "1", "uninstall.php", "1.2", NOW())');

      // EN: Now get the plugin 'id' from table 'plugins' for futher use
      // CZ: Nyní zpět získáme 'id' pluginu z tabulky 'plugins' pro další použití
      $sqls    = 'SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "BelowHeader"';
      $results = $envodb->query($sqls);
      $rows    = $results->fetch_assoc();

      if ($rows['id']) {
      // EN: If plugin have 'id' (plugin is installed), install other data for plugin (create tables and write data to tables)
      // CZ: Pokud má plugin 'id' (tzn. plugin je instalován), instalujeme další data pro plugin (vytvoření tabulek a zápis dat do tabulek)

      // EN: Set admin lang of plugin
      // CZ: Nastavení jazyka pro administrační rozhraní pluginu
      $adminlang = 'if (file_exists(APP_PATH.\'plugins/belowheader/admin/lang/\'.$site_language.\'.ini\')) {
  $tlbh = parse_ini_file(APP_PATH.\'plugins/belowheader/admin/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlbh = parse_ini_file(APP_PATH.\'plugins/belowheader/admin/lang/en.ini\', true);
}';

      // EN: Hook System - Index: set files for other uses
      // CZ: Hook System - Index: nastavení používaných souborů
      $index_top = 'include_once APP_PATH.\'plugins/belowheader/belowheader.php\';';

      // EN: Frontend - set files for other uses
      // CZ: Frontend - nastavení používaných souborů
      $belowheader  = 'plugins/belowheader/bh_header.php';
      $belowfooter = 'plugins/belowheader/bh_footer.php';

      // EN: Insert data to table 'pluginhooks'
      // CZ: Vložení potřebných dat to tabulky 'pluginhooks'
      $envodb->query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_admin_lang", "BelowHeader Admin Language", "' . $adminlang . '", "belowheader", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_head", "BelowHeader Admin CSS", "plugins/belowheader/admin/template/css.belowheader.php", "belowheader", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_index_top", "BelowHeader Index", "' . $index_top . '", "intranet", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_below_header", "BelowHeader Input", "' . $belowheader . '", "belowheader", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_below_footer", "BelowHeader Footer", "' . $belowfooter . '", "belowheader", 1, 1, "' . $rows['id'] . '", NOW())');

      // EN: Create table for plugin
      // CZ: Vytvoření tabulky pro plugin
      $envodb->query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'belowheader (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `allpage` smallint(1) unsigned NOT NULL DEFAULT 0,
  `pageid` varchar(100) DEFAULT NULL,
  `newsid` varchar(100) DEFAULT NULL,
  `newsmain` smallint(1) unsigned NOT NULL DEFAULT 0,
  `tags` smallint(1) unsigned NOT NULL DEFAULT 0,
  `search` smallint(1) unsigned NOT NULL DEFAULT 0,
  `sitemap` smallint(1) unsigned NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `content_before` mediumtext,
  `content_after` mediumtext,
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
          $(document).ready(function () {
            'use strict';
            // Apply the plugin to the body
            $('#notificationcontainer').pgNotification({
              style: 'bar',
              message: '<?php echo $tlbh["bh_install"]["bhinst4"]; ?>',
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

      $result = $envodb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "BelowHeader"');

      ?>
        <div class="alert bg-danger"><?php echo $tlbh["bh_install"]["bhinst5"]; ?></div>
        <form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
          <button type="submit" name="redirect" class="btn btn-danger btn-block"><?php echo $tlbh["bh_install"]["bhinst6"]; ?></button>
        </form>
      <?php }
      } ?>

      <?php if (!$succesfully) { ?>
        <form name="company" method="post" action="install.php" enctype="multipart/form-data">
          <button type="submit" name="install" class="btn btn-primary btn-block"><?php echo $tlbh["bh_install"]["bhinst7"]; ?></button>
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