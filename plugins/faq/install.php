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
if (file_exists(APP_PATH . 'plugins/faq/admin/lang/' . $site_language . '.ini')) {
  $tlf = parse_ini_file(APP_PATH . 'plugins/faq/admin/lang/' . $site_language . '.ini', TRUE);
} else {
  $tlf = parse_ini_file(APP_PATH . 'plugins/faq/admin/lang/en.ini', TRUE);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $tlf["faq_install"]["faqinst"]; ?></title>
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
        <h3 class="semi-bold text-white"><?php echo $tlf["faq_install"]["faqinst"]; ?></h3>
      </div>
      <hr>
      <div id="notificationcontainer"></div>
      <div class="m-b-30">
        <h4 class="semi-bold"><?php echo $tlf["faq_install"]["faqinst1"]; ?></h4>

        <div id="portlet-advance" class="panel panel-transparent">
          <div class="panel-heading separator">
            <div class="panel-title"><?php echo $tlf["faq_install"]["faqinst2"]; ?></div>
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
      $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "FAQ"');
      if ($jakdb->affected_rows > 0) { ?>

        <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>
        <script>
          $(document).ready(function () {
            'use strict';
            // Apply the plugin to the body
            $('#notificationcontainer').pgNotification({
              style: 'bar',
              message: '<?php echo $tlf["faq_install"]["faqinst3"]; ?>',
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
      $jakdb->query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `sidenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "FAQ", "Run your own faq database.", 1, ' . JAK_USERID . ', 4, "faq", "require_once APP_PATH.\'plugins/faq/faq.php\';", "if ($page == \'faq\') {
        require_once APP_PATH.\'plugins/faq/admin/faq.php\';
           $JAK_PROVED = 1;
           $checkp = 1;
        }", "../plugins/faq/admin/template/faqnav.php", "faq", "uninstall.php", "1.1", NOW())');

      // EN: Now get the plugin 'id' from table 'plugins' for futher use
      // CZ: Nyní zpět získáme 'id' pluginu z tabulky 'plugins' pro další použití
      $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "FAQ"');
      $rows    = $results->fetch_assoc();

      if ($rows['id']) {
      // EN: If plugin have 'id' (plugin is installed), install other data for plugin (create tables and write data to tables)
      // CZ: Pokud má plugin 'id' (tzn. plugin je instalován), instalujeme další data pro plugin (vytvoření tabulek a zápis dat do tabulek)

      // EN: Usergroup - Insert php code (get data from plugin setting in usergroup)
      // CZ: Usergroup - Vložení php kódu (získání dat z nastavení pluginu v uživatelské skupině)
      $insertphpcode = 'if (isset($defaults[\'jak_faq\'])) {
	$insert .= \'faq = \"\'.$defaults[\'jak_faq\'].\'\", faqpost = \"\'.$defaults[\'jak_faqpost\'].\'\", faqpostapprove = \"\'.$defaults[\'jak_faqpostapprove\'].\'\", faqpostdelete = \"\'.$defaults[\'jak_faqpostdelete\'].\'\", faqrate = \"\'.$defaults[\'jak_faqrate\'].\'\", faqmoderate = \"\'.$defaults[\'jak_faqmoderate\'].\'\",\'; }';

      // EN: Set admin lang of plugin
      // CZ: Nastavení jazyka pro administrační rozhraní pluginu
      $adminlang = 'if (file_exists(APP_PATH.\'plugins/faq/admin/lang/\'.$site_language.\'.ini\')) {
  $tlf = parse_ini_file(APP_PATH.\'plugins/faq/admin/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlf = parse_ini_file(APP_PATH.\'plugins/faq/admin/lang/en.ini\', true);
}';

      // EN: Set site lang of plugin
      // CZ: Nastavení jazyka pro webové rozhraní pluginu
      $sitelang = 'if (file_exists(APP_PATH.\'plugins/faq/lang/\'.$site_language.\'.ini\')) {
  $tlf = parse_ini_file(APP_PATH.\'plugins/faq/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlf = parse_ini_file(APP_PATH.\'plugins/faq/lang/en.ini\', true);
}';

      // EN: Php code for search
      // CZ: Php kód pro vyhledávání
      $sitephpsearch = '$faq = new JAK_search($SearchInput);
        	$faq->jakSettable(\'faq\',\"\");
        	$faq->jakAndor(\"OR\");
        	$faq->jakFieldactive(\"active\");
        	$faq->jakFieldtitle(\"title\");
        	$faq->jakFieldcut(\"content\");
        	$faq->jakFieldstosearch(array(\'title\',\'content\'));
        	$faq->jakFieldstoselect(\"id, title, content\");
        	
        	// Load the array into template
        	$JAK_SEARCH_RESULT_FAQ = $faq->set_result(JAK_PLUGIN_VAR_FAQ, \'a\', $jkv[\"faqurl\"]);';

      // EN: Php code for rss
      // CZ: Php kód pro rss
      $sitephprss = 'if ($page1 == JAK_PLUGIN_VAR_FAQ) {
	
	if ($jkv[\"faqrss\"]) {
		$sql = \'SELECT id, title, content, time FROM \'.DB_PREFIX.\'faq WHERE active = 1 ORDER BY time DESC LIMIT \'.$jkv[\"faqrss\"];
		$sURL = JAK_PLUGIN_VAR_FAQ;
		$sURL1 = \'a\';
		$what = 1;
		$seowhat = $jkv[\"faqurl\"];
		
		$JAK_RSS_DESCRIPTION = envo_cut_text($jkv[\"faqdesc\"], $jkv[\"shortmsg\"], \'…\');
		
	} else {
		envo_redirect(BASE_URL);
	}
	
}';

      // EN: Php code for tags
      // CZ: Php kód pro tagy
      $sitephptag = 'if ($row[\'pluginid\'] == JAK_PLUGIN_ID_FAQ) {
$faqtagData[] = JAK_tags::jakTagsql(\"faq\", $row[\'itemid\'], \"id, title, content\", \"content\", JAK_PLUGIN_VAR_FAQ, \"a\", $jkv[\"faqurl\"]);
$JAK_TAG_FAQ_DATA = $faqtagData;
}';

      // EN: Php code for sitemap
      // CZ: Php kód pro mapu sítě
      $sitephpsitemap = 'include_once APP_PATH.\'plugins/faq/functions.php\';

$JAK_FAQ_ALL = envo_get_faq(\'\', $jkv[\"faqorder\"], \'\', \'\', $jkv[\"faqurl\"], $tl[\'general\'][\'g56\']);
$PAGE_TITLE = JAK_PLUGIN_NAME_FAQ;';

      // Fulltext search query
      $sqlfull       = '$jakdb->query(\'ALTER TABLE \'.DB_PREFIX.\'faq ADD FULLTEXT(`title`, `content`)\');';
      $sqlfullremove = '$jakdb->query(\'ALTER TABLE \'.DB_PREFIX.\'faq DROP INDEX `title`\');';

      // Connect to pages/news
      $pages = 'if ($pg[\'pluginid\'] == JAK_PLUGIN_FAQ) {

include_once APP_PATH.\'plugins/faq/admin/template/faq_connect.php\';

}';

      // EN: Php code for insert data to DB
      // CZ: Php kód pro vložení dat do DB
      $sqlinsert = 'if (!isset($defaults[\'jak_showfaq\'])) {
	$fq = 0;
} else if (in_array(0, $defaults[\'jak_showfaq\'])) {
	$fq = 0;
} else {
	$fq = join(\',\', $defaults[\'jak_showfaq\']);
}

if (empty($fq) && !empty($defaults[\'jak_showfaqmany\'])) {
	$insert .= \'showfaq = \"\'.$defaults[\'jak_showfaqorder\'].\':\'.$defaults[\'jak_showfaqmany\'].\'\",\';
} else if (!empty($fq)) {
	$insert .= \'showfaq = \"\'.$fq.\'\",\';
} else {
  	$insert .= \'showfaq = NULL,\';
}';

      //
      $getfaq = '$JAK_GET_FAQ = envo_get_page_info(DB_PREFIX.\'faq\', \'\');

if ($ENVO_FORM_DATA) {

$showfaqarray = explode(\":\", $ENVO_FORM_DATA[\'showfaq\']);

if (is_array($showfaqarray) && in_array(\"ASC\", $showfaqarray) || in_array(\"DESC\", $showfaqarray)) {

		$ENVO_FORM_DATA[\'showfaqorder\'] = $showfaqarray[0];
		$ENVO_FORM_DATA[\'showfaqmany\'] = $showfaqarray[1];
	
} }';

      // EN: Frontend - template for display connect
      // CZ: Frontend - šablona
      $get_faqconnect = '
	$pluginbasic_connect = \'plugins/faq/template/pages_news.php\';
	$pluginsite_connect = \'template/\'.$jkv[\"sitestyle\"].\'/plugintemplate/faq/pages_news.php\';
	
	if (JAK_PLUGIN_ID_FAQ && $pg[\'pluginid\'] == JAK_PLUGIN_ID_FAQ && !empty($row[\'showfaq\'])) {
		if (file_exists($pluginsite_connect)) {
			include_once APP_PATH.$pluginsite_connect;
		} else {
			include_once APP_PATH.$pluginbasic_connect;
		}
	}
    ';

      // EN: Frontend - template for display plugin sidebar
      // CZ: Frontend - šablona pro zobrazení postranního panelu pluginu
      $get_faqsidebar = '
	$pluginbasic_sidebar = \'plugins/faq/template/faqsidebar.php\';
	$pluginsite_sidebar = \'template/\'.$jkv[\"sitestyle\"].\'/plugintemplate/faq/faqsidebar.php\';
	
	if (file_exists($pluginsite_sidebar)) {
		include_once APP_PATH.$pluginsite_sidebar;
	} else {
		include_once APP_PATH.$pluginbasic_sidebar;
	}
    ';

      // EN: Frontend - template for sitemap
      // CZ: Frontend - šablona pro mapu sítě
      $get_faqsitemap = '
	$pluginbasic_sitemap = \'plugins/faq/template/sitemap.php\';
	$pluginsite_sitemap = \'template/\'.$jkv[\"sitestyle\"].\'/plugintemplate/faq/sitemap.php\';
	
	if (file_exists($pluginsite_sitemap)) {
		include_once APP_PATH.$pluginsite_sitemap;
	} else {
		include_once APP_PATH.$pluginbasic_sitemap;
	}
    ';

      // EN: Frontend - template for search
      // CZ: Frontend - šablona pro vyhledávání
      $get_faqsearch = '
	$pluginbasic_search = \'plugins/faq/template/search.php\';
	$pluginsite_search = \'template/\'.$jkv[\"sitestyle\"].\'/plugintemplate/faq/search.php\';
	
	if (file_exists($pluginsite_search)) {
		include_once APP_PATH.$pluginsite_search;
	} else {
		include_once APP_PATH.$pluginbasic_search;
	}
    ';

      // EN: Frontend - template for tags
      // CZ: Frontend - šablona pro tagy
      $get_faqtag = '
	$pluginbasic_tag = \'plugins/faq/template/tag.php\';
	$pluginsite_tag = \'template/\'.$jkv[\"sitestyle\"].\'/plugintemplate/faq/tag.php\';
	
	if (file_exists($pluginsite_tag)) {
		include_once APP_PATH.$pluginsite_tag;
	} else {
		include_once APP_PATH.$pluginbasic_tag;
	}
    ';

      // EN: Frontend - template for display plugin footer widget
      // CZ: Frontend - šablona pro zobrazení widgetu
      $get_faqfooter_widgets = '
	$pluginbasic_fwidgets = \'plugins/faq/template/footer_widget.php\';
	$pluginsite_fwidgets = \'template/\'.$jkv[\"sitestyle\"].\'/plugintemplate/faq/footer_widget.php\';
	
	if (file_exists($pluginsite_fwidgets)) {
		include_once APP_PATH.$pluginsite_fwidgets;
	} else {
		include_once APP_PATH.$pluginbasic_fwidgets;
	}
    ';

      // EN: Insert data to table 'pluginhooks'
      // CZ: Vložení potřebných dat to tabulky 'pluginhooks'
      $jakdb->query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_admin_usergroup", "Faq Usergroup SQL", "' . $insertphpcode . '", "faq", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_lang", "Faq Admin Language", "' . $adminlang . '", "faq", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "php_lang", "Faq Site Language", "' . $sitelang . '", "faq", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "php_search", "Faq Search PHP", "' . $sitephpsearch . '", "faq", 1, 8, "' . $rows['id'] . '", NOW()),
(NULL, "php_rss", "FAQ RSS PHP", "' . $sitephprss . '", "faq", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_tags", "Faq Tags PHP", "' . $sitephptag . '", "faq", 1, 8, "' . $rows['id'] . '", NOW()),
(NULL, "php_sitemap", "Faq Sitemap PHP", "' . $sitephpsitemap . '", "faq", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_between_head", "Faq CSS", "plugins/faq/template/cssheader.php", "faq", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup", "Faq Usergroup New", "plugins/faq/admin/template/usergroup_new.php", "faq", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup_edit", "Faq Usergroup Edit", "plugins/faq/admin/template/usergroup_edit.php", "faq", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_tags", "Faq Tags", "' . $get_faqtag . '", "faq", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_sitemap", "Faq Sitemap", "' . $get_faqsitemap . '", "faq", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_sidebar", "Faq Sidebar Categories", "' . $get_faqsidebar . '", "faq", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_fulltext_add", "Faq Full Text Search", "' . $sqlfull . '", "faq", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_fulltext_remove", "Faq Remove Full Text Search", "' . $sqlfullremove . '", "faq", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_page_news", "Faq Admin - Page/News", "' . $pages . '", "faq", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_page_news_new", "Faq Admin - Page/News - New", "plugins/faq/admin/template/faq_connect_new.php", "faq", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_pages_sql", "Faq Pages SQL", "' . $sqlinsert . '", "faq", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_news_sql", "Faq News SQL", "' . $sqlinsert . '", "faq", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_pages_news_info", "Faq Pages/News Info", "' . $getfaq . '", "faq", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_page_news_grid", "Faq Pages/News Display", "' . $get_faqconnect . '", "faq", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_search", "Faq Search", "' . $get_faqsearch . '", "faq", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_footer_widgets", "FAQ - 3 Latest Entries", "' . $get_faqfooter_widgets . '", "faq", 1, 3, "' . $rows['id'] . '", NOW())');

      // EN: Insert data to table 'setting'
      // CZ: Vložení potřebných dat to tabulky 'setting'
      $jakdb->query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("faqtitle", "faq", "FAQ", "FAQ", "input", "free", "faq"),
("faqdesc", "faq", "Write something about your FAQ", "Write something about your FAQ", "textarea", "free", "faq"),
("faqemail", "faq", NULL, NULL, "input", "free", "faq"),
("faqdateformat", "faq", "d.m.Y", "d.m.Y", "input", "free", "faq"),
("faqtimeformat", "faq", NULL, NULL, "input", "free", "faq"),
("faqurl", "faq", 0, 0, "yesno", "boolean", "faq"),
("faqmaxpost", "faq", 2000, 2000, "input", "boolean", "faq"),
("faqpagemid", "faq", 3, 3, "yesno", "number", "faq"),
("faqpageitem", "faq", 4, 4, "yesno", "number", "faq"),
("faqshortmsg", "faq", 300, 300, "input", "boolean", "faq"),
("faqorder", "faq", "id ASC", "", "input", "free", "faq"),
("faqrss", "faq", 5, 5, "select", "number", "faq"),
("faqhlimit", "faq", 5, 5, "select", "number", "faq"),
("faq_css", "faq", "", "", "textarea", "free", "faq"),
("faq_javascript", "faq", "", "", "textarea", "free", "faq")');

      // EN: Insert data to table 'usergroup'
      // CZ: Vložení potřebných dat to tabulky 'usergroup'
      $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'usergroup ADD `faq` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `advsearch`, ADD `faqpost` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `faq`, ADD `faqpostdelete` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `faqpost`, ADD `faqpostapprove` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `faqpostdelete`, ADD `faqrate` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `faqpostdelete`, ADD `faqmoderate` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `faqrate`');

      // Pages/News alter Table
      $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'pages ADD showfaq varchar(100) DEFAULT NULL AFTER showcontact');
      $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'news ADD showfaq varchar(100) DEFAULT NULL AFTER showcontact');
      $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'pagesgrid ADD faqid INT(11) UNSIGNED NOT NULL DEFAULT 0 AFTER newsid');

      // EN: Insert data to table 'categories' (create category)
      // CZ: Vložení potřebných dat to tabulky 'categories' (vytvoření kategorie)
      $jakdb->query('INSERT INTO ' . DB_PREFIX . 'categories (`id`, `name`, `varname`, `catimg`, `showmenu`, `showfooter`, `catorder`, `catparent`, `pageid`, `activeplugin`, `pluginid`) VALUES (NULL, "FAQ", "faq", NULL, 1, 0, 5, 0, 0, 1, "' . $rows['id'] . '")');

      // EN: Create table for plugin (article)
      // CZ: Vytvoření tabulky pro plugin (články)
      $jakdb->query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'faq (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) unsigned NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `previmg` varchar(255) DEFAULT NULL,
  `showtitle` smallint(1) unsigned NOT NULL DEFAULT 1,
  `active` smallint(1) unsigned NOT NULL DEFAULT 1,
  `showcontact` int(11) unsigned NOT NULL DEFAULT 0,
  `showdate` smallint(1) unsigned NOT NULL DEFAULT 0,
  `socialbutton` smallint(1) unsigned NOT NULL DEFAULT 0,
  `hits` int(10) unsigned NOT NULL DEFAULT 0,
  `time` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

      // EN: Create table for plugin (categories)
      // CZ: Vytvoření tabulky pro plugin (kategorie)
      $jakdb->query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'faqcategories (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `varname` varchar(255) DEFAULT NULL,
  `catimg` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `permission` mediumtext,
  `catorder` int(11) unsigned NOT NULL DEFAULT 1,
  `catparent` int(11) unsigned NOT NULL DEFAULT 0,
  `active` smallint(1) unsigned NOT NULL DEFAULT 1,
  `count` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `catorder` (`catorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

      // Full text search is activated we do so for the faq table as well
      if ($jkv["fulltextsearch"]) {
        $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'faq ADD FULLTEXT(`title`, `content`)');
      }

      $succesfully = 1;

      ?>

        <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>
        <script>
          $(document).ready(function () {
            'use strict';
            // Apply the plugin to the body
            $('#notificationcontainer').pgNotification({
              style: 'bar',
              message: '<?php echo $tlf["faq_install"]["faqinst4"]; ?>',
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

      $result = $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "Faq"');

      ?>

        <div class="alert bg-danger"><?php echo $tlf["faq_install"]["faqinst5"]; ?></div>
        <form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
          <button type="submit" name="redirect" class="btn btn-danger btn-block"><?php echo $tlf["faq_install"]["faqinst6"]; ?></button>
        </form>

      <?php }
      } ?>

      <?php if (!$succesfully) { ?>
        <form name="company" method="post" action="install.php" enctype="multipart/form-data">
          <button type="submit" name="install" class="btn btn-complete btn-block"><?php echo $tlf["faq_install"]["faqinst7"]; ?></button>
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