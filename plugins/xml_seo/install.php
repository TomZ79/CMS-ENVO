<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/install.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Check if the file is accessed only from a admin if not stop the script from running
$php_errormsg = 'To edit the file, you must be logged in as an ADMINISTRATOR !!! You cannot access this file directly.';
$php_errormsg1 = 'Only ADMINISTRATOR privileges allow you to edit the file !!! You cannot access this file directly.';
if (!JAK_USERID) die($php_errormsg);

if (!$jakuser->jakAdminaccess($jakuser->getVar("usergroupid"))) die($php_errormsg1);

// Set successfully to zero
$succesfully = 0;

// EN: Load the language file for plugin
// CZ: Načtení jazykového souboru pro plugin
if (file_exists(APP_PATH . 'plugins/xml_seo/admin/lang/' . $site_language . '.ini')) {
  $tlxml = parse_ini_file(APP_PATH . 'plugins/xml_seo/admin/lang/' . $site_language . '.ini', TRUE);
} else {
  $tlxml = parse_ini_file(APP_PATH . 'plugins/xml_seo/admin/lang/en.ini', TRUE);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $tlxml["xml_install"]["xmlinst"]; ?></title>
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
    <div class="col-md-12 m-t-20">
      <div class="jumbotron bg-master">
        <h3 class="semi-bold text-white"><?php echo $tlxml["xml_install"]["xmlinst"]; ?></h3>
      </div>
      <hr>
      <div id="notificationcontainer"></div>
      <div class="m-b-30">
        <h4 class="semi-bold"><?php echo $tlxml["xml_install"]["xmlinst1"]; ?></h4>
        <p>Plugin pracuje se souborem <strong>' sitemap.xml '</strong>.</p>

        <div id="portlet-advance" class="panel panel-transparent">
          <div class="panel-heading separator">
            <div class="panel-title"><?php echo $tlxml["xml_install"]["xmlinst2"]; ?></div>
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
            <p>Seznam komponent které budou instalovány v průběhu instalačního procesu tohoto pluginu</p>
            <br>
            <div>
              <table class="table table-transparent">
                <thead>
                <tr class="bg-complete-lighter">
                  <th>Koponenta</th>
                  <th class="text-center">Ano</th>
                  <th class="text-center">Ne</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Tabulky DB pro práci s pluginem</td>
                  <td class="text-center"><i class="fa fa-check"></i></td>
                  <td></td>
                </tr>
                </tbody>
              </table>
            </div>
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
      $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "XML_SEO"');
      if ($jakdb->affected_rows > 0) { ?>

        <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>
        <script>
          $(document).ready(function () {
            'use strict';
            // Apply the plugin to the body
            $('#notificationcontainer').pgNotification({
              style: 'bar',
              message: '<?php echo $tlxml["xml_install"]["xmlinst3"]; ?>',
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
      $jakdb->query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `managenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "XML_SEO", "XML Sitemap for better SEO.", 1, ' . JAK_USERID . ', 4, "xml_seo", "NULL", "if ($page == \'xml_seo\') {
        require_once APP_PATH.\'plugins/xml_seo/admin/xml_seo.php\';
           $JAK_PROVED = 1;
           $checkp = 1;
        }", "../plugins/xml_seo/admin/template/xml_seonav.php", "NULL", "uninstall.php", "1.3", NOW())');

      // EN: Now get the plugin 'id' from table 'plugins' for futher use
      // CZ: Nyní zpět získáme 'id' pluginu z tabulky 'plugins' pro další použití
      $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "XML_SEO"');
      $rows    = $results->fetch_assoc();

      if ($rows['id']) {
      // EN: If plugin have 'id' (plugin is installed), install other data for plugin (create tables and write data to tables)
      // CZ: Pokud má plugin 'id' (tzn. plugin je instalován), instalujeme další data pro plugin (vytvoření tabulek a zápis dat do tabulek)

      // EN: Set admin lang of plugin
      // CZ: Nastavení jazyka pro administrační rozhraní pluginu
      $adminlang = 'if (file_exists(APP_PATH.\'plugins/xml_seo/admin/lang/\'.$site_language.\'.ini\')) {
  $tlxml = parse_ini_file(APP_PATH.\'plugins/xml_seo/admin/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlxml = parse_ini_file(APP_PATH.\'plugins/xml_seo/admin/lang/en.ini\', true);
}';

      // EN: Insert data to table 'pluginhooks'
      // CZ: Vložení potřebných dat to tabulky 'pluginhooks'
      $jakdb->query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES 
(NULL, "php_admin_lang", "XML SEO Admin Language", "' . $adminlang . '", "xmlseo", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_head", "XML SEO Admin CSS", "plugins/xml_seo/admin/template/css.xml_seo.php", "xmlseo", 1, 4, "' . $rows['id'] . '", NOW())');

      // EN: Insert data to table 'setting'
      // CZ: Vložení potřebných dat to tabulky 'setting'
      $jakdb->query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES 
("xmlseopath", "xmlseo", "plugins/xml_seo/files/", "plugins/xml_seo/files/", "input", "free", "xmlseo"),
("xmlseodate", "xmlseo", NULL, NULL, "timestamp", "free", "xmlseo"),
("frequency_pages", "xmlseo", "monthly" , "monthly", "select", "free", "xmlseo"),
("frequency_blog", "xmlseo", "weekly" , "weekly", "select", "free", "xmlseo"),
("frequency_download", "xmlseo", "weekly" , "weekly", "select", "free", "xmlseo")');

      $succesfully = 1;

      ?>

        <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>
        <script>
          $(document).ready(function () {
            'use strict';
            // Apply the plugin to the body
            $('#notificationcontainer').pgNotification({
              style: 'bar',
              message: '<?php echo $tlxml["xml_install"]["xmlinst4"]; ?>',
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

      $result = $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "xml_seo"');

      ?>

        <div class="alert bg-danger"><?php echo $tlxml["xml_install"]["xmlinst5"]; ?></div>
        <form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
          <button type="submit" name="redirect" class="btn btn-danger btn-block"><?php echo $tlxml["xml_install"]["xmlinst6"]; ?></button>
        </form>

      <?php }
      } ?>

      <?php if (!$succesfully) { ?>
        <form name="company" method="post" action="install.php" enctype="multipart/form-data">
          <button type="submit" name="install" class="btn btn-complete btn-block"><?php echo $tlxml["xml_install"]["xmlinst7"]; ?></button>
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