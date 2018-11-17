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

// EN: Load the language file for plugin
// CZ: Načtení jazykového souboru pro plugin
if (file_exists(APP_PATH . 'plugins/wiki/admin/lang/' . $site_language . '.ini')) {
  $tlw = parse_ini_file(APP_PATH . 'plugins/wiki/admin/lang/' . $site_language . '.ini', TRUE);
} else {
  $tlw = parse_ini_file(APP_PATH . 'plugins/wiki/admin/lang/en.ini', TRUE);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title><?= $tlw["wiki_install"]["wikiinst"] ?></title>
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
    <div class="col-sm-12 m-t-20">
      <div class="jumbotron bg-master pt-1 pl-3 pb-1 pr-3">
        <h3 class="semi-bold text-white"><?= $tlw["wiki_install"]["wikiinst"] ?></h3>
      </div>
      <hr>
      <div id="notificationcontainer"></div>
      <div class="m-b-30">

        <h4 class="semi-bold"><?= $tlw["wiki_install"]["wikiinst1"] ?></h4>

        <div data-pages="card" class="card card-transparent" id="card-basic">
          <div class="card-header separator">
            <div class="card-title"><?= $tlw["wiki_install"]["wikiinst2"] ?></div>
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
      $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "WIKI"');
      if ($envodb -> affected_rows > 0) { ?>

        <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>
        <script>
          $(document).ready(function () {
            'use strict';
            // Apply the plugin to the body
            $('#notificationcontainer').pgNotification({
              style: 'bar',
              message: '<?=$tlw["wiki_install"]["wikiinst3"]?>',
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
      $envodb -> query('INSERT INTO ' . DB_PREFIX . 'plugins (`id`, `name`, `description`, `active`, `access`, `pluginorder`, `pluginpath`, `phpcode`, `phpcodeadmin`, `sidenavhtml`, `usergroup`, `uninstallfile`, `pluginversion`, `time`) VALUES (NULL, "WIKI", "Run your own wiki database.", 1, ' . ENVO_USERID . ', 4, "wiki", "require_once APP_PATH.\'plugins/wiki/wiki.php\';", "if ($page == \'wiki\') {
        require_once APP_PATH.\'plugins/wiki/admin/wiki.php\';
           $ENVO_PROVED = 1;
           $checkp = 1;
        }", "../plugins/wiki/admin/template/wikinav.php", "wiki", "uninstall.php", "1.0", NOW())');

      // EN: Now get the plugin 'id' from table 'plugins' for futher use
      // CZ: Nyní zpět získáme 'id' pluginu z tabulky 'plugins' pro další použití
      $results = $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "WIKI"');
      $rows    = $results -> fetch_assoc();

      if ($rows['id']) {
      // EN: If plugin have 'id' (plugin is installed), install other data for plugin (create tables and write data to tables)
      // CZ: Pokud má plugin 'id' (tzn. plugin je instalován), instalujeme další data pro plugin (vytvoření tabulek a zápis dat do tabulek)

      // EN: Usergroup - Insert php code (get data from plugin setting in usergroup)
      // CZ: Usergroup - Vložení php kódu (získání dat z nastavení pluginu v uživatelské skupině)
      $insertphpcode = 'if (isset($defaults[\'envo_wiki\'])) {
	$insert .= \'wiki = \"\'.$defaults[\'envo_wiki\'].\'\",\'; }';

      // EN: Set admin lang of plugin
      // CZ: Nastavení jazyka pro administrační rozhraní pluginu
      $adminlang = 'if (file_exists(APP_PATH.\'plugins/wiki/admin/lang/\'.$site_language.\'.ini\')) {
  $tlw = parse_ini_file(APP_PATH.\'plugins/wiki/admin/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlw = parse_ini_file(APP_PATH.\'plugins/wiki/admin/lang/en.ini\', true);
}';

      // EN: Set site lang of plugin
      // CZ: Nastavení jazyka pro webové rozhraní pluginu
      $sitelang = 'if (file_exists(APP_PATH.\'plugins/wiki/lang/\'.$site_language.\'.ini\')) {
  $tlw = parse_ini_file(APP_PATH.\'plugins/wiki/lang/\'.$site_language.\'.ini\', true);
} else {
  $tlw = parse_ini_file(APP_PATH.\'plugins/wiki/lang/en.ini\', true);
}';

      // EN: Php code for search
      // CZ: Php kód pro vyhledávání
      $sitephpsearch = '$wiki = new ENVO_search($SearchInput);
        	$wiki->envoSetTable(\'wiki\',\"\");
        	$wiki->envoAndor(\"OR\");
        	$wiki->envoFieldActive(\"active\");
        	$wiki->envoFieldTitle(\"title\");
        	$wiki->envoFieldCut(\"content\");
        	$wiki->envoFieldstoSearch(array(\'title\',\'content\'));
        	$wiki->envoFieldstoSelect(\"id, title, content\");
        	
        	// Load the array into template
        	$ENVO_SEARCH_RESULT_WIKI = $wiki->set_result(ENVO_PLUGIN_VAR_WIKI, \'wiki-article\', $setting[\"wikiurl\"]);';

      // EN: Php code for rss
      // CZ: Php kód pro rss
      $sitephprss = 'if ($page1 == ENVO_PLUGIN_VAR_WIKI) {
	
	if ($setting[\"wikirss\"]) {
		$sql = \'SELECT id, title, content, time FROM \'.DB_PREFIX.\'wiki WHERE active = 1 ORDER BY time DESC LIMIT \'.$setting[\"wikirss\"];
		$sURL = ENVO_PLUGIN_VAR_WIKI;
		$sURL1 = \'wiki-article\';
		$what = 1;
		$seowhat = $setting[\"wikiurl\"];
		
		$ENVO_RSS_DESCRIPTION = envo_cut_text($setting[\"wikidesc\"], $setting[\"shortmsg\"], \'…\');
		
	} else {
		envo_redirect(BASE_URL);
	}
	
}';

      // EN: Php code for tags
      // CZ: Php kód pro tagy
      $sitephptag = 'if ($row[\'pluginid\'] == ENVO_PLUGIN_ID_WIKI) {
$wikitagData[] = ENVO_tags::envoTagSql(\"wiki\", $row[\'itemid\'], \"id, title, content\", \"content\", ENVO_PLUGIN_VAR_WIKI, \"a\", $setting[\"wikiurl\"]);
$ENVO_TAG_WIKI_DATA = $wikitagData;
}';

      // EN: Php code for sitemap
      // CZ: Php kód pro mapu sítě
      $sitephpsitemap = 'include_once APP_PATH.\'plugins/wiki/functions.php\';

$ENVO_WIKI_ALL = envo_get_wiki(\'\', $setting[\"wikiorder\"], \'\', \'\', $setting[\"wikiurl\"], $tl[\'general\'][\'g56\']);
$PAGE_TITLE = ENVO_PLUGIN_NAME_WIKI;';

      // Fulltext search query
      $sqlfull       = '$envodb->query(\'ALTER TABLE \'.DB_PREFIX.\'wiki ADD FULLTEXT(`title`, `content`)\');';
      $sqlfullremove = '$envodb->query(\'ALTER TABLE \'.DB_PREFIX.\'wiki DROP INDEX `title`\');';

      // Connect to pages/news
      $pages = 'if ($pg[\'pluginid\'] == ENVO_PLUGIN_WIKI) {

include_once APP_PATH.\'plugins/wiki/admin/template/wiki_connect.php\';

}';

      // EN: Php code for insert data to DB
      // CZ: Php kód pro vložení dat do DB
      $sqlinsert = 'if (!isset($defaults[\'envo_showwiki\'])) {
	$wq = 0;
} else if (in_array(0, $defaults[\'envo_showwiki\'])) {
	$wq = 0;
} else {
	$wq = join(\',\', $defaults[\'envo_showwiki\']);
}

if (empty($wq) && !empty($defaults[\'envo_showwikimany\'])) {
	$insert .= \'showwiki = \"\'.$defaults[\'envo_showwikiorder\'].\':\'.$defaults[\'envo_showwikimany\'].\'\",\';
} else if (!empty($wq)) {
	$insert .= \'showwiki = \"\'.$wq.\'\",\';
} else {
  	$insert .= \'showwiki = NULL,\';
}';

      //
      $getwiki = '$ENVO_GET_WIKI = envo_get_page_info(DB_PREFIX.\'wiki\', \'\');

if ($ENVO_FORM_DATA) {

$showwikiarray = explode(\":\", $ENVO_FORM_DATA[\'showwiki\']);

if (is_array($showwikiarray) && in_array(\"ASC\", $showwikiarray) || in_array(\"DESC\", $showwikiarray)) {

		$ENVO_FORM_DATA[\'showwikiorder\'] = $showwikiarray[0];
		$ENVO_FORM_DATA[\'showwikimany\'] = $showwikiarray[1];
	
} }';

      // EN: Frontend - template for display connect
      // CZ: Frontend - šablona
      $get_wikiconnect = '
	$pluginbasic_connect = \'plugins/wiki/template/pages_news.php\';
	$pluginsite_connect = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/wiki/pages_news.php\';
	
	if (ENVO_PLUGIN_ID_WIKI && $pg[\'pluginid\'] == ENVO_PLUGIN_ID_WIKI && !empty($row[\'showwiki\'])) {
		if (file_exists($pluginsite_connect)) {
			include_once APP_PATH.$pluginsite_connect;
		} else {
			include_once APP_PATH.$pluginbasic_connect;
		}
	}
    ';

      // EN: Frontend - template for display plugin sidebar
      // CZ: Frontend - šablona pro zobrazení postranního panelu pluginu
      $get_wikisidebar = '
	$pluginbasic_sidebar = \'plugins/wiki/template/wikisidebar.php\';
	$pluginsite_sidebar = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/wiki/wikisidebar.php\';
	
	if (file_exists($pluginsite_sidebar)) {
		include_once APP_PATH.$pluginsite_sidebar;
	} else {
		include_once APP_PATH.$pluginbasic_sidebar;
	}
    ';

      // EN: Frontend - template for sitemap
      // CZ: Frontend - šablona pro mapu sítě
      $get_wikisitemap = '
	$pluginbasic_sitemap = \'plugins/wiki/template/sitemap.php\';
	$pluginsite_sitemap = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/wiki/sitemap.php\';
	
	if (file_exists($pluginsite_sitemap)) {
		include_once APP_PATH.$pluginsite_sitemap;
	} else {
		include_once APP_PATH.$pluginbasic_sitemap;
	}
    ';

      // EN: Frontend - template for search
      // CZ: Frontend - šablona pro vyhledávání
      $get_wikisearch = '
	$pluginbasic_search = \'plugins/wiki/template/search.php\';
	$pluginsite_search = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/wiki/search.php\';
	
	if (file_exists($pluginsite_search)) {
		include_once APP_PATH.$pluginsite_search;
	} else {
		include_once APP_PATH.$pluginbasic_search;
	}
    ';

      // EN: Frontend - template for tags
      // CZ: Frontend - šablona pro tagy
      $get_wikitag = '
	$pluginbasic_tag = \'plugins/wiki/template/tag.php\';
	$pluginsite_tag = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/wiki/tag.php\';
	
	if (file_exists($pluginsite_tag)) {
		include_once APP_PATH.$pluginsite_tag;
	} else {
		include_once APP_PATH.$pluginbasic_tag;
	}
    ';

      // EN: Frontend - template for display plugin footer widget
      // CZ: Frontend - šablona pro zobrazení widgetu
      $get_wikifooter_widgets = '
	$pluginbasic_fwidgets = \'plugins/wiki/template/footer_widget.php\';
	$pluginsite_fwidgets = \'template/\'.$setting[\"sitestyle\"].\'/plugintemplate/wiki/footer_widget.php\';
	
	if (file_exists($pluginsite_fwidgets)) {
		include_once APP_PATH.$pluginsite_fwidgets;
	} else {
		include_once APP_PATH.$pluginbasic_fwidgets;
	}
    ';

      // EN: Insert data to table 'pluginhooks'
      // CZ: Vložení potřebných dat to tabulky 'pluginhooks'
      $envodb -> query('INSERT INTO ' . DB_PREFIX . 'pluginhooks (`id`, `hook_name`, `name`, `phpcode`, `product`, `active`, `exorder`, `pluginid`, `time`) VALUES
(NULL, "php_admin_lang", "Wiki Admin Language", "' . $adminlang . '", "wiki", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "php_lang", "Wiki Site Language", "' . $sitelang . '", "wiki", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_head", "Wiki Admin CSS", "plugins/wiki/admin/template/css.wiki.php", "wiki", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_usergroup", "Wiki Usergroup SQL", "' . $insertphpcode . '", "wiki", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "php_search", "Wiki Search PHP", "' . $sitephpsearch . '", "wiki", 1, 8, "' . $rows['id'] . '", NOW()),
(NULL, "php_rss", "Wiki RSS PHP", "' . $sitephprss . '", "wiki", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_tags", "Wiki Tags PHP", "' . $sitephptag . '", "wiki", 1, 8, "' . $rows['id'] . '", NOW()),
(NULL, "php_sitemap", "Wiki Sitemap PHP", "' . $sitephpsitemap . '", "wiki", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_between_head", "Wiki CSS", "plugins/wiki/template/cssheader.php", "wiki", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup", "Wiki Usergroup New", "plugins/wiki/admin/template/usergroup_new.php", "wiki", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_usergroup_edit", "Wiki Usergroup Edit", "plugins/wiki/admin/template/usergroup_edit.php", "wiki", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_tags", "Wiki Tags", "' . $get_wikitag . '", "wiki", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_sitemap", "Wiki Sitemap", "' . $get_wikisitemap . '", "wiki", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_sidebar", "Wiki Sidebar Categories", "' . $get_wikisidebar . '", "wiki", 1, 4, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_fulltext_add", "Wiki Full Text Search", "' . $sqlfull . '", "wiki", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_fulltext_remove", "Wiki Remove Full Text Search", "' . $sqlfullremove . '", "wiki", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_page_news", "Wiki Admin - Page/News", "' . $pages . '", "wiki", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_admin_page_news_new", "Wiki Admin - Page/News - New", "plugins/wiki/admin/template/wiki_connect_new.php", "wiki", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_pages_sql", "Wiki Pages SQL", "' . $sqlinsert . '", "wiki", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_news_sql", "Wiki News SQL", "' . $sqlinsert . '", "wiki", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "php_admin_pages_news_info", "Wiki Pages/News Info", "' . $getwiki . '", "wiki", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_page_news_grid", "Wiki Pages/News Display", "' . $get_wikiconnect . '", "wiki", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_search", "Wiki Search", "' . $get_wikisearch . '", "wiki", 1, 1, "' . $rows['id'] . '", NOW()),
(NULL, "tpl_footer_widgets", "Wiki - 3 Latest Entries", "' . $get_wikifooter_widgets . '", "wiki", 1, 3, "' . $rows['id'] . '", NOW())');

      // EN: Insert data to table 'setting'
      // CZ: Vložení potřebných dat to tabulky 'setting'
      $envodb -> query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("wikititle", "wiki", "WIKI", "WIKI", "input", "free", "wiki"),
("wikidesc", "wiki", "Write something about your WIKI", "Write something about your WIKI", "textarea", "free", "wiki"),
("wikiemail", "wiki", NULL, NULL, "input", "free", "wiki"),
("wikidateformat", "wiki", "d.m.Y", "d.m.Y", "input", "free", "wiki"),
("wikitimeformat", "wiki", NULL, NULL, "input", "free", "wiki"),
("wikiurl", "wiki", 0, 0, "yesno", "boolean", "wiki"),
("wikimaxpost", "wiki", 2000, 2000, "input", "boolean", "wiki"),
("wikipagemid", "wiki", 3, 3, "yesno", "number", "wiki"),
("wikipageitem", "wiki", 4, 4, "yesno", "number", "wiki"),
("wikishortmsg", "wiki", 300, 300, "input", "boolean", "wiki"),
("wikiorder", "wiki", "id ASC", "", "input", "free", "wiki"),
("wikirss", "wiki", 5, 5, "select", "number", "wiki"),
("wikihlimit", "wiki", 5, 5, "select", "number", "wiki"),
("wiki_css", "wiki", "", "", "textarea", "free", "wiki"),
("wiki_javascript", "wiki", "", "", "textarea", "free", "wiki")');

      // EN: Insert data to table 'usergroup'
      // CZ: Vložení potřebných dat to tabulky 'usergroup'
      $envodb -> query('ALTER TABLE ' . DB_PREFIX . 'usergroup ADD `wiki` SMALLINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER `advsearch`');

      // Pages/News alter Table
      $envodb -> query('ALTER TABLE ' . DB_PREFIX . 'pages ADD showwiki varchar(100) DEFAULT NULL AFTER shownews');
      $envodb -> query('ALTER TABLE ' . DB_PREFIX . 'news ADD showwiki varchar(100) DEFAULT NULL AFTER shownews');
      $envodb -> query('ALTER TABLE ' . DB_PREFIX . 'pagesgrid ADD wikiid INT(11) UNSIGNED NOT NULL DEFAULT 0 AFTER newsid');

      // EN: Insert data to table 'categories' (create category)
      // CZ: Vložení potřebných dat to tabulky 'categories' (vytvoření kategorie)
      $envodb -> query('INSERT INTO ' . DB_PREFIX . 'categories (`id`, `name`, `varname`, `catimg`, `showmenu`, `showfooter`, `catorder`, `catparent`, `pageid`, `activeplugin`, `pluginid`) VALUES (NULL, "WIKI", "wiki", NULL, 1, 0, 5, 0, 0, 1, "' . $rows['id'] . '")');

      // EN: Create table for plugin (article)
      // CZ: Vytvoření tabulky pro plugin (články)
      $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'wiki (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `wiki_css` text,
  `wiki_javascript` text,
  `previmg` varchar(255) DEFAULT NULL,
  `previmgdesc` mediumtext,
  `showtitle` smallint(1) unsigned NOT NULL DEFAULT 1,
  `active` smallint(1) unsigned NOT NULL DEFAULT 1,
  `showdate` smallint(1) unsigned NOT NULL DEFAULT 0,
  `showupdate` smallint(1) unsigned NOT NULL DEFAULT 0,
  `showcat` smallint(1) unsigned NOT NULL DEFAULT 0,
  `showhits` smallint(1) unsigned NOT NULL DEFAULT 0,
  `socialbutton` smallint(1) unsigned NOT NULL DEFAULT 0,
  `hits` int(10) unsigned NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  `updated` datetime NOT NULL DEFAULT \'0000-00-00 00:00:00\',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

      // EN: Create table for plugin (categories)
      // CZ: Vytvoření tabulky pro plugin (kategorie)
      $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'wikicategories (
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

      // EN: Create table for plugin (categories)
      // CZ: Vytvoření tabulky pro plugin (kategorie)
      $envodb -> query('CREATE TABLE IF NOT EXISTS ' . DB_PREFIX . 'wikiliterature (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) DEFAULT NULL,
  `text` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');

      // Full text search is activated we do so for the wiki table as well
      if ($setting["fulltextsearch"]) {
        $envodb -> query('ALTER TABLE ' . DB_PREFIX . 'wiki ADD FULLTEXT(`title`, `content`)');
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
              message: '<?=$tlw["wiki_install"]["wikiinst4"]?>',
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

      $result = $envodb -> query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "WIKI"');

      ?>

        <div class="alert bg-danger"><?= $tlw["wiki_install"]["wikiinst5"] ?></div>
        <form name="company" method="post" action="uninstall.php" enctype="multipart/form-data">
          <button type="submit" name="redirect" class="btn btn-danger btn-block">
            <?= $tlw["wiki_install"]["wikiinst6"] ?>
          </button>
        </form>

      <?php }
      } ?>

      <?php if (!$succesfully) { ?>
        <form name="company" method="post" action="install.php" enctype="multipart/form-data">
          <button type="submit" name="install" class="btn btn-complete btn-block">
            <?= $tlw["wiki_install"]["wikiinst7"] ?>
          </button>
        </form>
      <?php }
      } ?>

    </div>
  </div>
</div>

</body>
</html>