<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/update.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

/* NO CHANGES FROM HERE */

// Set successfully to zero
$succesfully = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Update CMS to 2.1</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
  <link rel="stylesheet" href="../assets/css/stylesheet.css" type="text/css" media="screen"/>
  <link rel="stylesheet" href="../assets/plugins/bootstrapv3/css/bootstrap.min.css" type="text/css" media="screen"/>
</head>
<style>
  body {
    padding-top: 60px;
  }

</style>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="navbar-brand" href="http://www.jakweb.ch">CMS 2.1</a>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h2>Update to CMS 2.1</h2>
      </div>

      <?php

      $result = $envodb->query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "version"');
      $row = $result->fetch_assoc();
      if ($row["value"] == "2.1") {
        $succesfully = 1; ?>

        <div class="alert bg-info">Your CMS is already up to date!</div>

        <!-- Plugin is not installed let's display the installation script -->
      <?php } else {
        if (isset($_POST['update']) && $_GET['step'] == 2) {

          if ($row["value"] == "1.0") {

            $envodb->query('ALTER TABLE ' . DB_PREFIX . 'user CHANGE `hits` `logins` INT(11) UNSIGNED NOT NULL DEFAULT 0');

          }

          if ($row["value"] <= "1.2.1") {

            $envodb->query('ALTER TABLE ' . DB_PREFIX . 'pages DROP `voteup`, DROP `votedown`');
            $envodb->query('ALTER TABLE ' . DB_PREFIX . 'news DROP `voteup`, DROP `votedown`');
            $envodb->query('ALTER TABLE ' . DB_PREFIX . 'categories CHANGE `permission` `permission` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 0');

          }

          if ($row["value"] <= "1.3") {

            $envodb->query("INSERT INTO " . DB_PREFIX . "setting VALUES ('o_number', 'setting', '0', '0', 'input', 'free', 'cms')");

            $envodb->query("ALTER TABLE " . DB_PREFIX . "categories DROP `catparent2`, DROP `subexist`, DROP `subsubexist`");

            $envodb->query("ALTER TABLE " . DB_PREFIX . "categories DROP INDEX catorder");

            $envodb->query("ALTER TABLE " . DB_PREFIX . "categories ADD INDEX(`showmenu`, `showfooter`, `catorder`, `catparent`)");

          }

          if ($row["value"] <= "1.4") {

// now let's update the download plugin
            $envodb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Download"');
            if ($envodb->affected_rows == 1) {
              $dla = 'if (file_exists(APP_PATH.\'plugins/download/admin/lang/\'.$site_language.\'.ini\')) {
	    $tld = parse_ini_file(APP_PATH.\'plugins/download/admin/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tld = parse_ini_file(APP_PATH.\'plugins/download/admin/lang/en.ini\', true);
	}';

              $dl = 'if (file_exists(APP_PATH.\'plugins/download/lang/\'.$site_language.\'.ini\')) {
	    $tld = parse_ini_file(APP_PATH.\'plugins/download/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tld = parse_ini_file(APP_PATH.\'plugins/download/lang/en.ini\', true);
	}';

              // Eval code for display connect
              $get_dlconnect = 'if (ENVO_PLUGIN_ACCESS_DOWNLOAD && $pg[\'pluginid\'] == ENVO_PLUGIN_ID_DOWNLOAD && !empty($row[\'showdownload\'])) {
	include_once APP_PATH.\'plugins/download/template/\'.$setting[\"sitestyle\"].\'/page_news.php\';}';

              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $dla . '" WHERE hook_name = "php_admin_lang" AND product = "download"');
              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $dl . '" WHERE hook_name = "php_lang" AND product = "download"');
              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $get_dlconnect . '" WHERE hook_name = "tpl_page_news_grid" AND product = "download"');
            }

// now let's update the below header plugin
            $envodb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "BelowHeader"');
            if ($envodb->affected_rows == 1) {
              $bha = 'if (file_exists(APP_PATH.\'plugins/belowheader/admin/lang/\'.$site_language.\'.ini\')) {
	    $tlbh = parse_ini_file(APP_PATH.\'plugins/belowheader/admin/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlbh = parse_ini_file(APP_PATH.\'plugins/belowheader/admin/lang/en.ini\', true);
	}';

              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $bha . '" WHERE hook_name = "php_admin_lang" AND product = "belowheader"');
            }

// now let's update the blog plugin
            $envodb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Blog"');
            if ($envodb->affected_rows == 1) {
              $bla = 'if (file_exists(APP_PATH.\'plugins/blog/admin/lang/\'.$site_language.\'.ini\')) {
	    $tlblog = parse_ini_file(APP_PATH.\'plugins/blog/admin/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlblog = parse_ini_file(APP_PATH.\'plugins/blog/admin/lang/en.ini\', true);
	}';

              $bl = 'if (file_exists(APP_PATH.\'plugins/blog/lang/\'.$site_language.\'.ini\')) {
	    $tlblog = parse_ini_file(APP_PATH.\'plugins/blog/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlblog = parse_ini_file(APP_PATH.\'plugins/blog/lang/en.ini\', true);
	}';

              $get_blconnect = 'if (ENVO_PLUGIN_ACCESS_BLOG && $pg[\'pluginid\'] == ENVO_PLUGIN_ID_BLOG && !empty($row[\'showblog\'])) {
	include_once APP_PATH.\'plugins/blog/template/\'.$setting[\"sitestyle\"].\'/pages_news.php\';}';

              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $bla . '" WHERE hook_name = "php_admin_lang" AND product = "blog"');
              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $bl . '" WHERE hook_name = "php_lang" AND product = "blog"');
              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $get_blconnect . '" WHERE hook_name = "tpl_page_news_grid" AND product = "blog"');

            }

// now let's update the ecommerce plugin
            $envodb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Ecommerce"');
            if ($envodb->affected_rows == 1) {
              $eca = 'if (file_exists(APP_PATH.\'plugins/ecommerce/admin/lang/\'.$site_language.\'.ini\')) {
	    $tlec = parse_ini_file(APP_PATH.\'plugins/ecommerce/admin/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlec = parse_ini_file(APP_PATH.\'plugins/ecommerce/admin/lang/en.ini\', true);
	}';

              $ec = 'if (file_exists(APP_PATH.\'plugins/ecommerce/lang/\'.$site_language.\'.ini\')) {
	    $tlec = parse_ini_file(APP_PATH.\'plugins/ecommerce/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlec = parse_ini_file(APP_PATH.\'plugins/ecommerce/lang/en.ini\', true);
	}';

              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $eca . '" WHERE hook_name = "php_admin_lang" AND product = "shop"');
              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $ec . '" WHERE hook_name = "php_lang" AND product = "shop"');
            }

// now let's update the faq plugin
            $envodb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "FAQ"');
            if ($envodb->affected_rows == 1) {
              $faqa = 'if (file_exists(APP_PATH.\'plugins/faq/admin/lang/\'.$site_language.\'.ini\')) {
	    $tlf = parse_ini_file(APP_PATH.\'plugins/faq/admin/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlf = parse_ini_file(APP_PATH.\'plugins/faq/admin/lang/en.ini\', true);
	}';

              $faq = 'if (file_exists(APP_PATH.\'plugins/faq/lang/\'.$site_language.\'.ini\')) {
	    $tlf = parse_ini_file(APP_PATH.\'plugins/faq/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlf = parse_ini_file(APP_PATH.\'plugins/faq/lang/en.ini\', true);
	}';

              // Eval code for display connect
              $get_fqconnect = 'if ($pg[\'pluginid\'] == ENVO_PLUGIN_ID_FAQ && ENVO_PLUGIN_ID_FAQ && !empty($row[\'showfaq\'])) {
	include_once APP_PATH.\'plugins/faq/template/\'.$setting[\"sitestyle\"].\'/page_news.php\';}';

              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $faqa . '" WHERE hook_name = "php_admin_lang" AND product = "faq"');
              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $faq . '" WHERE hook_name = "php_lang" AND product = "faq"');
              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $get_fqconnect . '" WHERE hook_name = "tpl_page_news_grid" AND product = "faq"');
            }

// now let's update the gallery plugin
            $envodb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Gallery"');
            if ($envodb->affected_rows == 1) {
              $gala = 'if (file_exists(APP_PATH.\'plugins/gallery/admin/lang/\'.$site_language.\'.ini\')) {
	    $tlgal = parse_ini_file(APP_PATH.\'plugins/gallery/admin/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlgal = parse_ini_file(APP_PATH.\'plugins/gallery/admin/lang/en.ini\', true);
	}';

              $gal = 'if (file_exists(APP_PATH.\'plugins/gallery/lang/\'.$site_language.\'.ini\')) {
	    $tlgal = parse_ini_file(APP_PATH.\'plugins/gallery/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlgal = parse_ini_file(APP_PATH.\'plugins/gallery/lang/en.ini\', true);
	}';

              // Eval code for display connect
              $get_gqconnect = 'if (ENVO_PLUGIN_ACCESS_GALLERY && $pg[\'pluginid\'] == ENVO_PLUGIN_ID_GALLERY && !empty($row[\'showgallery\'])) {
	include_once APP_PATH.\'plugins/gallery/template/\'.$setting[\"sitestyle\"].\'/pages_news.php\';}';

              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $gala . '" WHERE hook_name = "php_admin_lang" AND product = "gallery"');
              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $gal . '" WHERE hook_name = "php_lang" AND product = "gallery"');
              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $get_gqconnect . '" WHERE hook_name = "tpl_page_news_grid" AND product = "gallery"');
            }

// now let's update the growl plugin
            $envodb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Growl"');
            if ($envodb->affected_rows == 1) {
              $growl = 'if (file_exists(APP_PATH.\'plugins/growl/admin/lang/\'.$site_language.\'.ini\')) {
	    $tlgwl = parse_ini_file(APP_PATH.\'plugins/growl/admin/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlgwl = parse_ini_file(APP_PATH.\'plugins/growl/admin/lang/en.ini\', true);
	}';

              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $growl . '" WHERE hook_name = "php_admin_lang" AND product = "growl"');
            }

// now let's update the Newsletter plugin
            $envodb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Newsletter"');
            if ($envodb->affected_rows == 1) {
              $nla = 'if (file_exists(APP_PATH.\'plugins/newsletter/admin/lang/\'.$site_language.\'.ini\')) {
	    $tlnl = parse_ini_file(APP_PATH.\'plugins/newsletter/admin/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlnl = parse_ini_file(APP_PATH.\'plugins/newsletter/admin/lang/en.ini\', true);
	}';

              $nl = 'if (file_exists(APP_PATH.\'plugins/newsletter/lang/\'.$site_language.\'.ini\')) {
	    $tlnl = parse_ini_file(APP_PATH.\'plugins/newsletter/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlnl = parse_ini_file(APP_PATH.\'plugins/newsletter/lang/en.ini\', true);
	}';

              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $nla . '" WHERE hook_name = "php_admin_lang" AND product = "newsletter"');
              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $nl . '" WHERE hook_name = "php_lang" AND product = "newsletter"');
            }

// now let's update the register plugin
            $envodb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "register_form"');
            if ($envodb->affected_rows == 1) {
              $regf = 'if (file_exists(APP_PATH.\'plugins/register_form/admin/lang/\'.$site_language.\'.ini\')) {
	    $lrf = parse_ini_file(APP_PATH.\'plugins/register_form/admin/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $lrf = parse_ini_file(APP_PATH.\'plugins/register_form/admin/lang/en.ini\', true);
	}';

              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $regf . '" WHERE hook_name = "php_admin_lang" AND product = "registerf"');
            }

// now let's update the Retailer plugin
            $envodb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Retailer"');
            if ($envodb->affected_rows == 1) {
              $reta = 'if (file_exists(APP_PATH.\'plugins/retailer/admin/lang/\'.$site_language.\'.ini\')) {
	    $tlre = parse_ini_file(APP_PATH.\'plugins/retailer/admin/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlre = parse_ini_file(APP_PATH.\'plugins/retailer/admin/lang/en.ini\', true);
	}';

              $ret = 'if (file_exists(APP_PATH.\'plugins/retailer/lang/\'.$site_language.\'.ini\')) {
	    $tlre = parse_ini_file(APP_PATH.\'plugins/retailer/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlre = parse_ini_file(APP_PATH.\'plugins/retailer/lang/en.ini\', true);
	}';

              // Eval code for display connect
              $get_rqconnect = 'if (ENVO_PLUGIN_ACCESS_RETAILER && $pg[\'pluginid\'] == ENVO_PLUGIN_ID_RETAILER && !empty($row[\'showretailer\'])) {
	include_once APP_PATH.\'plugins/retailer/template/\'.$setting[\"sitestyle\"].\'/pages_news.php\';}';

              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $reta . '" WHERE hook_name = "php_admin_lang" AND product = "retailer"');
              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $ret . '" WHERE hook_name = "php_lang" AND product = "retailer"');
              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $get_rqconnect . '" WHERE hook_name = "tpl_page_news_grid" AND product = "retailer"');
            }

// now let's update the slider plugin
            $envodb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Slider"');
            if ($envodb->affected_rows == 1) {
              $slida = 'if (file_exists(APP_PATH.\'plugins/slider/admin/lang/\'.$site_language.\'.ini\')) {
	    $tlls = parse_ini_file(APP_PATH.\'plugins/slider/admin/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlls = parse_ini_file(APP_PATH.\'plugins/slider/admin/lang/en.ini\', true);
	}';

              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $slida . '" WHERE hook_name = "php_admin_lang" AND product = "slider"');
            }

// now let's update the Ticket plugin
            $envodb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Ticketing"');
            if ($envodb->affected_rows == 1) {
              $tica = 'if (file_exists(APP_PATH.\'plugins/ticketing/admin/lang/\'.$site_language.\'.ini\')) {
	    $tlt = parse_ini_file(APP_PATH.\'plugins/ticketing/admin/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlt = parse_ini_file(APP_PATH.\'plugins/ticketing/admin/lang/en.ini\', true);
	}';

              $tic = 'if (file_exists(APP_PATH.\'plugins/ticketing/lang/\'.$site_language.\'.ini\')) {
	    $tlt = parse_ini_file(APP_PATH.\'plugins/ticketing/lang/\'.$site_language.\'.ini\', true);
	} else {
	    $tlt = parse_ini_file(APP_PATH.\'plugins/ticketing/lang/en.ini\', true);
	}';

              // Eval because of the foreach
              $tpl_connect = 'if (ENVO_PLUGIN_ACCESS_TICKETING && $pg[\'pluginid\'] == ENVO_PLUGIN_ID_TICKETING && !empty($row[\'showticketing\'])) {
	include_once APP_PATH.\'plugins/ticketing/template/\'.$setting[\"sitestyle\"].\'/page_news.php\';}';

              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $tica . '" WHERE hook_name = "php_admin_lang" AND product = "ticketing"');
              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $tic . '" WHERE hook_name = "php_lang" AND product = "ticketing"');
              $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $tpl_connect . '" WHERE hook_name = "tpl_page_news_grid" AND product = "ticketing"');
            }

          }

          if ($row["value"] <= "1.5") {

            $sitephprss = 'if ($page1 == ENVO_PLUGIN_VAR_ECOMMERCE) {
		
		if ($setting[\"shoprss\"]) {
			$sql = \'SELECT id, title, content, time FROM \'.DB_PREFIX.\'shop WHERE active = 1 ORDER BY time DESC LIMIT \'.$setting[\"shoprss\"];
			$sURL = ENVO_PLUGIN_VAR_ECOMMERCE;
			$sURL1 = \'\';
			$what = 1;
			$seowhat = $setting[\"shopurl\"];
			
			$ENVO_RSS_DESCRIPTION = envo_cut_text($setting[\"e_desc\"], $setting[\"shortmsg\"], \'…\');
			
		} else {
			envo_redirect(BASE_URL);
		}
		
	}';

            $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $sitephprss . '" WHERE hook_name = "php_rss" AND product = "shop"');

            $sitephprss1 = 'if ($page1 == ENVO_PLUGIN_VAR_DOWNLOAD) {
		
		if ($setting[\"downloadrss\"]) {
			$sql = \'SELECT id, title, content, time FROM \'.DB_PREFIX.\'download WHERE active = 1 ORDER BY time DESC LIMIT \'.$setting[\"downloadrss\"];
			$sURL = ENVO_PLUGIN_VAR_DOWNLOAD;
			$sURL1 = \'a\';
			$what = 1;
			$seowhat = $setting[\"downloadurl\"];
			
			$ENVO_RSS_DESCRIPTION = envo_cut_text($setting[\"downloaddesc\"], $setting[\"shortmsg\"], \'…\');
			
		} else {
			envo_redirect(BASE_URL);
		}
		
	}';

            $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $sitephprss . '" WHERE hook_name = "php_rss" AND product = "download"');

          }

          if ($row["value"] <= "1.6") {

            $sitephpsitemap = 'include_once APP_PATH.\'plugins/ticketing/functions.php\';
	
	define(\'ENVO_TICKETMODERATE\', $envousergroup->getVar(\"ticketmoderate\"));
	
	$ENVO_TICKET_ALL = envo_get_ticket(\'\', $setting[\"ticketorder\"], \'\', \'\', $setting[\"ticketurl\"], $tl[\'general\'][\'g56\']);
	$PAGE_TITLE = ENVO_PLUGIN_NAME_TICKETING;';

            $envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $sitephpsitemap . '" WHERE hook_name = "php_sitemap" AND product = "ticketing"');

            // Blog Comments if available
            @$envodb->query('ALTER TABLE ' . DB_PREFIX . 'blogcomments ADD `commentid` INT(11) UNSIGNED NOT NULL DEFAULT 0 AFTER `blogid`, ADD `votes` INT(10) NOT NULL DEFAULT 0 AFTER `trash`');
            // Ticket Comments if available
            @$envodb->query('ALTER TABLE ' . DB_PREFIX . 'ticketcomments ADD `commentid` INT(11) UNSIGNED NOT NULL DEFAULT 0 AFTER `ticketid`, ADD `votes` INT(10) NOT NULL DEFAULT 0 AFTER `trash`');

            $envodb->query("INSERT INTO " . DB_PREFIX . "setting VALUES ('username_block', 'setting', '', '', 'textarea', 'free', 'cms'), ('time_ago_show', 'setting', '1', '1', 'yesno', 'boolean', 'cms')");

            $envodb->query('ALTER TABLE ' . DB_PREFIX . 'pages ADD `shownav` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1 AFTER `active`, ADD `showfooter` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1 AFTER `shownav`');

            $envodb->query("UPDATE " . DB_PREFIX . "setting SET `varname` = 'offline_page', `value` = '0', `defaultvalue` = '0', `optioncode` = 'select', `datatype` = 'boolean' WHERE `varname` = 'offlinemessage'");
          }

          if ($row["value"] <= "2.0") {

            $envodb->query("UPDATE " . DB_PREFIX . "setting SET `varname` = 'sidebar_location_tpl' WHERE `varname` = 'sidebar_jakweb_tpl'");

            $envodb->query("INSERT INTO " . DB_PREFIX . "setting VALUES ('notfound_page', 'general', '0', '0', 'select', 'boolean', 'cms'), ('smtp_or_mail', 'setting', 0, 0, 'yesno', 'boolean', 'cms'), ('smtp_port', 'setting', 25, 25, 'input', 'number', 'cms'), ('smtp_host', 'setting', '', '', 'input', 'free', 'cms'), ('smtp_auth', 'setting', 0, 0, 'yesno', 'boolean', 'cms'), ('smtp_prefix', 'setting', '', '', 'input', 'free', 'cms'), ('smtp_alive', 'setting', 0, 0, 'yesno', 'boolean', 'cms'), ('smtp_user', 'setting', '', '', 'input', 'free', 'cms'), ('smtp_password', 'setting', '', '', 'input', 'free', 'cms')");

            @$envodb->query('ALTER TABLE ' . DB_PREFIX . 'registeroptions ADD `showregister` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1 AFTER `options`');

            $pn_include = 'if ($row[\'showregister\'] == 1) {
	include_once APP_PATH.\'plugins/register_form/rf_createform.php\';
	$ENVO_SHOW_R_FORM = envo_create_register_form($tl[\'cmsg\'][\'c12\'], \'\', true);
}';

            @$envodb->query('UPDATE ' . DB_PREFIX . 'pluginhooks SET phpcode = "' . $pn_include . '" WHERE hook_name = "php_pages_news" AND product = "registerf"');

          }

// Backup content from blog
          $blogexist = $envodb->queryRow('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Blog"');
          if ($blogexist['id']) {
            $envodb->query('ALTER TABLE ' . DB_PREFIX . 'backup_content ADD blogid INT(11) UNSIGNED NOT NULL DEFAULT 0 AFTER pageid');
          }

// Shop checkout
          $shopexist = $envodb->queryRow('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Ecommerce"');
          if ($shopexist['id']) {
            $envodb->query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES ("shopcheckout", "shop", 1, 1, "input", "number", "shop")');
          }

// Update version and updatetime
          $envodb->query('UPDATE ' . DB_PREFIX . 'setting SET value = "2.2" WHERE varname = "version"');
          $envodb->query('UPDATE ' . DB_PREFIX . 'setting SET value = "' . time() . '" WHERE varname = "updatetime"');

          $succesfully = 1;

// confirm
          $email_body = 'URL: ' . BASE_URL . '<br />Email: ' . $setting["email"] . '<br />License: ' . $setting["o_number"];

// Send the email to the customer
          $mail = new PHPMailer(); // defaults to using php "mail()"
          $body = str_ireplace("[\]", "", $email_body);
          $mail->SetFrom($setting["email"]);
          $mail->AddReplyTo($setting["email"]);
          $mail->AddAddress('lic@jakweb.ch');
          $mail->Subject = 'Update - CMS 2.2';
          $mail->AltBody = 'HTML Format';
          $mail->MsgHTML($body);
          $mail->Send();

          ?>
          <div class="alert bg-success">Database update successfully, please delete the <strong>install</strong>
            directory. You can now log in, in your <a href="../admin/">administration</a> panel.
          </div>
        <?php } ?>

        <?php if (!$succesfully) { ?>
          <div class="alert bg-info">Please follow this steps carefully before you update the database!</div>
          <ul>
            <li>Backup all your files and your database.</li>
            <li>Upload all folders and files from the new version.</li>
            <li>Be sure to have a backup from your database before you update!</li>
            <li>Do you have an up to date backup from your database? OK, hit "Update Database".</li>
          </ul>

          <form name="company" method="post" action="update.php?step=2" enctype="multipart/form-data">

            <div class="form-actions">
              <button type="submit" name="update" class="btn btn-primary pull-right">Update Database</button>
            </div>

          </form>
        <?php }
      } ?>

    </div>
  </div>
</div>

</div><!-- #container -->
</body>
</html>