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
if (file_exists(APP_PATH . 'plugins/register_form/admin/lang/' . $site_language . '.ini')) {
  $tlrf = parse_ini_file(APP_PATH . 'plugins/register_form/admin/lang/' . $site_language . '.ini', TRUE);
} else {
  $tlrf = parse_ini_file(APP_PATH . 'plugins/register_form/admin/lang/en.ini', TRUE);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $tlrf["reg_install"]["reginst"]; ?></title>
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
        <h3 class="semi-bold text-white"><?php echo $tlrf["reg_install"]["reginst"]; ?></h3>
      </div>
      <hr>
      <div id="notificationcontainer"></div>
      <div class="m-b-30">
        <h4 class="semi-bold"><?php echo $tlrf["reg_install"]["reginst1"]; ?></h4>

        <div id="portlet-advance" class="panel panel-transparent">
          <div class="panel-heading separator">
            <div class="panel-title"><?php echo $tlrf["reg_install"]["reginst2"]; ?></div>
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
      $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Register_form"');
      if ($jakdb->affected_rows > 0) { ?>

        <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>
        <script>
          $(document).ready(function () {
            'use strict';
            // Apply the plugin to the body
            $('#notificationcontainer').pgNotification({
              style: 'bar',
              message: '<?php echo $tlrf["reg_install"]["reginst3"]; ?>',
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
      $jakdb->query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `sidenavhtml`, `managenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "Register_form", "Create a register form and connect it to any page you like", 1, ' . JAK_USERID . ', 4, "register_form", "require_once APP_PATH.\'plugins/register_form/register.php\';", "if ($page == \'register-form\') {
        require_once APP_PATH.\'plugins/register_form/admin/register.php\';
        $JAK_PROVED = 1;
        $checkp = 1;
     }", "", "../plugins/register_form/admin/template/registerfnav.php", 1, "uninstall.php", "1.2", NOW())');

      // EN: Now get the plugin 'id' from table 'plugins' for futher use
      // CZ: Nyní zpět získáme 'id' pluginu z tabulky 'plugins' pro další použití
      $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Register_form"');
      $rows    = $results->fetch_assoc();

      if ($rows['id']) {
      // EN: If plugin have 'id' (plugin is installed), install other data for plugin (create tables and write data to tables)
      // CZ: Pokud má plugin 'id' (tzn. plugin je instalován), instalujeme další data pro plugin (vytvoření tabulek a zápis dat do tabulek)

      // EN: Set admin lang of plugin
      // CZ: Nastavení jazyka pro administrační rozhraní pluginu
      $adminlang = 'if (file_exists(APP_PATH.\'plugins/register_form/admin/lang/\'.$site_language.\'.ini\')) {
  $tlrf = parse_ini_file(APP_PATH.\'plugins/register_form/admin/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlrf = parse_ini_file(APP_PATH.\'plugins/register_form/admin/lang/en.ini\', true);
}';

      // EN: Set site lang of plugin
      // CZ: Nastavení jazyka pro webové rozhraní pluginu
      $sitelang = 'if (file_exists(APP_PATH.\'plugins/register_form/lang/\'.$site_language.\'.ini\')) {
  $tlrf = parse_ini_file(APP_PATH.\'plugins/register_form/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlrf = parse_ini_file(APP_PATH.\'plugins/register_form/lang/en.ini\', true);
}';
      //
      $pn_include = 'if ($row[\'showregister\'] == 1) {
	include_once APP_PATH.\'plugins/register_form/rf_createform.php\';
	$JAK_SHOW_R_FORM = jak_create_register_form($tl[\'form_text\'][\'formt\'], \'\', true);
}';

      //
      $pages = 'if ($pg[\'pluginid\'] == JAK_PLUGIN_REGISTER_FORM) {

include_once APP_PATH.\'plugins/register_form/admin/template/rf_connect.php\';

}';

      // EN: Php code for insert data to DB
      // CZ: Php kód pro vložení dat do DB
      $sqlinsert = '$insert .= \'showregister = \"\'.smartsql($defaults[\'jak_rfconnect\']).\'\",\';';

      //
      $index_page = 'include_once APP_PATH.\'plugins/register_form/rf_post.php\';if ($page == \'rf_ual\') {
if (is_numeric($page1) && is_numeric($page2) && envo_row_exist($page1, DB_PREFIX.\'user\') && envo_field_not_exist($page2, DB_PREFIX.\'user\', \'activatenr\')) {

		// Generate new idhash
		$nidhash = JAK_userlogin::generateRandID();
		
		$result = $jakdb->query(\'UPDATE \'.DB_PREFIX.\'user SET session = \"\'.smartsql(session_id()).\'\", idhash = \"\'.smartsql($nidhash).\'\", lastactivity = NOW(), access = access - 1, activatenr = 0 WHERE id = \"\'.smartsql($page1).\'\" AND activatenr = \"\'.smartsql($page2).\'\"\');
		
		$_SESSION[\'username\'] = $page3;
		$_SESSION[\'idhash\'] = $nidhash;
	
if (!$result) {
	envo_redirect(JAK_PARSE_ERROR);
} else {

	// Get the agreement page details!
	foreach ($jakcategories as $sap) {
			
			if ($jkv[\"rf_redirect\"] == $sap[\'id\']) {
				$register_redirect = JAK_rewrite::jakParseurl($sap[\'pagename\'], \'\', \'\', \'\', \'\');
			}
		
	}
	
	if (isset($register_redirect)) {
		$register_redirect = $register_redirect;
	} else {
		$register_redirect = BASE_URL;
	}

	$userlink = BASE_URL.\'admin/index.php?p=users&sp=edit&ssp=\'.$page1;

	$admail = new PHPMailer();
	$adlinkmessage = $tl[\'email_text\'][\'emailm3\'].$userlink;
	$adbody = str_ireplace(\"[\]\", \'\',$adlinkmessage);
	$admail->SetFrom($jkv[\"email\"], $jkv[\"title\"]);
	$admail->AddAddress($jkv[\"email\"], $jkv[\"title\"]);
	$admail->Subject = $jkv[\"title\"].\' - \'.$tl[\'email_text\'][\'emailm4\'];
	$admail->MsgHTML($adbody);
	$admail->Send(); // Send email without any warnings
	
	envo_redirect($register_redirect);
}
	
} else {
	$_SESSION[\"infomsg\"] = $tl[\"email_text\"][\"emailm5\"];
	envo_redirect(BASE_URL);
}
}';

      // EN: Insert code into admin/index.php
      // CZ: Vložení kódu do admin/index.php
      $insertadminindex = 'plugins/register_form/admin/template/stat.php';

      // EN: Frontend - template for display plugin sidebar
      // CZ: Frontend - šablona pro zobrazení postranního panelu pluginu
      $get_rfsidebar = '
	$pluginbasic_sidebar = \'plugins/register_form/template/rf_sidebar.php\';
	$pluginsite_sidebar = \'template/\'.$jkv[\"sitestyle\"].\'/plugintemplate/register_form/rf_sidebar.php\';
	
	if (file_exists($pluginsite_sidebar)) {
		include_once APP_PATH.$pluginsite_sidebar;
	} else {
		include_once APP_PATH.$pluginbasic_sidebar;
	}
    ';

      //
      $get_rfregform = '
	$pluginbasic_regform = \'plugins/register_form/template/rf_registerform.php\';
	$pluginsite_regform = \'template/\'.$jkv[\"sitestyle\"].\'/plugintemplate/register_form/rf_registerform.php\';
	
	if (file_exists($pluginsite_regform)) {
		include_once APP_PATH.$pluginsite_regform;
	} else {
		include_once APP_PATH.$pluginbasic_regform;
	}
    ';

      // EN: Frontend - template for display plugin footer widget
      // CZ: Frontend - šablona pro zobrazení widgetu
      $get_rffooter_widgets = '
	$pluginbasic_fwidgets = \'plugins/register_form/template/footer_widget.php\';
	$pluginsite_fwidgets = \'template/\'.$jkv[\"sitestyle\"].\'/plugintemplate/register_form/footer_widget.php\';
	
	if (file_exists($pluginsite_fwidgets)) {
		include_once APP_PATH.$pluginsite_fwidgets;
	} else {
		include_once APP_PATH.$pluginbasic_fwidgets;
	}
    ';

      // EN: Insert data to table 'pluginhooks'
      // CZ: Vložení potřebných dat to tabulky 'pluginhooks'
      $jakdb->query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_admin_lang", "Register Form Admin Language", "' . $adminlang . '", "registerf", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_lang", "Register Form Site Language", "' . $sitelang . '", "registerf", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_head", "Register Form Admin CSS", "plugins/register_form/admin/template/css.register_form.php", "registerf", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_page_news", "Register Form Admin - Page/News", "' . $pages . '", "registerf", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_page_news_new", "Register Form Admin - Page/News - New", "plugins/register_form/admin/template/rf_connect_new.php", "registerf", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_sidebar", "Profile/Login Form Sidebar", "' . $get_rfsidebar . '", "registerf", 1, 5, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_footer_widgets", "Profile/Login Form Footer Widget", "' . $get_rffooter_widgets . '", "registerf", 1, 2, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_pages_sql", "Profile/Login Form SQL", "' . $sqlinsert . '", "registerf", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_news_sql", "Profile/Login Form SQL", "' . $sqlinsert . '", "registerf", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_pages_news", "Register Form Pages/News", "' . $pn_include . '", "registerf", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_page_news_grid", "Register Form TPL - Pages/News", "' . $get_rfregform . '", "registerf", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_index_page", "Register User Validate", "' . $index_page . '", "registerf", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_index", "Register Statistics Admin", "' . $insertadminindex . '", "registerf", 1, 1, "' . $rows['id'] . '", NOW())');

      // EN: Insert data to table 'setting'
      // CZ: Vložení potřebných dat to tabulky 'setting'
      $jakdb->query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("rf_title", "register_form", NULL, NULL, "input", "free", "registerf"),
("rf_active", "register_form", 1, 1, "yesno", "boolean", "registerf"),
("rf_simple", "register_form", 1, 1, "yesno", "boolean", "registerf"),
("rf_message", "register_form", NULL, NULL, "textarea", "free", "registerf"),
("rf_confirm", "register_form", 1, 1, "select", "boolean", "registerf"),
("rf_welcome", "register_form", "Thank you for registering. Please check your email.", "Thank you for registering. Please check your email.", "textarea", "free", "registerf"),
("rf_welcome_email", "register_form", "The password you submitted was automatically generated. You can change your password after logging in.", "The password you submitted was automatically generated. You can change your password after logging in.", "textarea", "free", "registerf"),
("rf_usergroup", "register_form", 2, 2, "select", "number", "registerf"),
("rf_redirect", "register_form", NULL, NULL, "number", "select", "registerf"),
("rf_content", "register_form", NULL, NULL, "textarea", "free", "registerf")');

      // EN: Insert data to table 'categories' (create category)
      // CZ: Vložení potřebných dat to tabulky 'categories' (vytvoření kategorie)
      $jakdb->query('INSERT INTO ' . DB_PREFIX . 'categories (`id`, `name`, `varname`, `catimg`, `showmenu`, `showfooter`, `catorder`, `catparent`, `pageid`, `permission`, `activeplugin`, `pluginid`) VALUES (NULL, "Edit Profile", "edit-profile", NULL, 1, 0, 5, 0, 0, "2,3,4", 1, "' . $rows['id'] . '")');

      // Prepare the tables
      $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'pages ADD showregister SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER showcontact');
      $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'news ADD showregister SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER showcontact');
      $jakdb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET active = 0 WHERE id = 3');

      // EN: Create table for plugin
      // CZ: Vytvoření tabulky pro plugin
      $jakdb->query('CREATE TABLE ' . DB_PREFIX . 'registeroptions (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `typeid` smallint(2) unsigned NOT NULL DEFAULT 1,
  `options` text,
  `showregister` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `mandatory` tinyint(1) unsigned NOT NULL DEFAULT 1,
  `forder` int(11) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

      // EN: Insert data to table 'registeroptions'
      // CZ: Vložení potřebných dat to tabulky 'registeroptions'
      $jakdb->query('INSERT INTO ' . DB_PREFIX . 'registeroptions (`id`, `name`, `typeid`, `options`, `showregister`, `mandatory`, `forder`) VALUES (NULL, \'Username\', 1, NULL, 1, 1, 1), (NULL, \'Email\', 1, NULL, 1, 3, 2), (NULL, \'Password\', 1, NULL, 1, 1, 3)');

      $succesfully = 1;

      ?>

        <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>
        <script>
          $(document).ready(function () {
            'use strict';
            // Apply the plugin to the body
            $('#notificationcontainer').pgNotification({
              style: 'bar',
              message: '<?php echo $tlrf["reg_install"]["reginst4"]; ?>',
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

      $result = $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "Register_form"');

      ?>

        <div class="alert bg-danger"><?php echo $tlrf["reg_install"]["reginst5"]; ?></div>
        <form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
          <button type="submit" name="redirect" class="btn btn-danger btn-block"><?php echo $tlrf["reg_install"]["reginst6"]; ?></button>
        </form>

      <?php }
      } ?>

      <?php if (!$succesfully) { ?>
        <form name="company" method="post" action="install.php" enctype="multipart/form-data">
          <button type="submit" name="install" class="btn btn-complete btn-block"><?php echo $tlrf["reg_install"]["reginst7"]; ?></button>
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