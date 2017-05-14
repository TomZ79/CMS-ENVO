<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$jakuser->jakModuleaccess(JAK_USERID, $jkv["accessmanage"])) jak_redirect(BASE_URL);

require_once('class/xml.sitemap.generator.php');

// Get the xmlseo path and time from db
$result = $jakdb->query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "xmlseopath"');
$row    = $result->fetch_assoc();

$XMLSEOPATH = $row['value'];

$result = $jakdb->query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "xmlseodate"');
$row    = $result->fetch_assoc();

// Check if sitemap was creating by including time in db
if (!empty($row['value'])) {
  $XMLSEODATE = $row['value'];
  $XMLSEODATE = date("d-m-Y H:i:s", strtotime($XMLSEODATE));
} else {
  $XMLSEODATE = $tlxml["xml_error"]["xmler"];
}

// Now start with the plugin use a switch to access all pages
switch ($page1) {

  // Create new Sitemap XML
  case 'create':

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Create sitemap
      $defaults = $_POST;

      // Create sitemap for pages
      //  - pageid !=0 means that page wasn't created
      //  - pluginid > 0 means that page is for plugins
      //  - permission < 2 means that pages hasn't member or administrator access
      //  - id != 1 means that pages isn't 'Home'
      //  - pluginid != 1 means that page isn't 'News'
      $result = $jakdb->query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE (pageid != 0 OR pluginid > 0) AND (permission < 2) AND (id != 1) AND (pluginid != 1)');
      $row    = $result->fetch_assoc();

      // Basic URL
      $entries[] = new xml_sitemap_entry('/', '1.0', $FREQUENCYPAGES);
      // Other pages
      while ($row = $result->fetch_assoc()) {

        $parseurl = JAK_rewrite::jakParseurl($row['varname'], '', '', '', '');

        // collect each record into $jakdata
        $entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', $FREQUENCYPAGES);
      }
      // Basic URL for News
      $result1      = $jakdb->query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = 1');
      $row1         = $result1->fetch_assoc();
      $result2      = $jakdb->query('SELECT id, title FROM ' . DB_PREFIX . 'news WHERE active = 1');
      $row2         = $result2->fetch_assoc();
      $num_results1 = $result1->num_rows;
      $num_results2 = $result2->num_rows;

      if ($num_results1 !== 0 && $num_results2 !== 0) {
        $parseurl = JAK_rewrite::jakParseurl($row1['varname'], '', '', '', '');
        // collect each record into $jakdata
        $entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', 'weekly');
      }

      // Create sitemap for News
      $result = $jakdb->query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = 1');
      $row    = $result->fetch_assoc();

      $result1 = $jakdb->query('SELECT id, title FROM ' . DB_PREFIX . 'news WHERE active = 1');

      while ($row1 = $result1->fetch_assoc()) {
        $parseurl = JAK_rewrite::jakParseurl($row['varname'], $row1['id'], JAK_base::jakCleanurl($row1['title']), '', '');
        // collect each record into $jakdata
        $entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', 'weekly');
      }

      // Create sitemap for tags
      $result = $jakdb->query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = 3');
      $row    = $result->fetch_assoc();

      $result1 = $jakdb->query('SELECT tag FROM ' . DB_PREFIX . 'tags WHERE active = 1 GROUP BY tag');

      while ($row1 = $result1->fetch_assoc()) {
        $parseurl = JAK_rewrite::jakParseurl($row['varname'], $row1['tag'], '', '', '');
        // collect each record into $jakdata
        $entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', 'weekly');
      }

      // Create sitemap for download
      // now get the plugin id for further use
      $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Download"');
      $rows    = $results->fetch_assoc();

      if ($rows) {

        $result = $jakdb->query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = ' . $rows['id']);
        $row    = $result->fetch_assoc();

        $result1 = $jakdb->query('SELECT id, title FROM ' . DB_PREFIX . 'download WHERE active = 1 && catid != 0');

        while ($row1 = $result1->fetch_assoc()) {
          if ($jkv["downloadurl"]) {
            $seo = JAK_base::jakCleanurl($row1['title']);
          }
          $parseurl = JAK_rewrite::jakParseurl($row['varname'], 'f', $row1['id'], $seo, '', '');
          // collect each record into $jakdata
          $entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', $FREQUENCYDOWNLOAD);
        }

        $JAK_DOWNLOAD_CAT = JAK_Base::jakGetcatmix($row['varname'], '', DB_PREFIX . 'downloadcategories', 0, $jkv["downloadurl"]);

        if (isset($JAK_DOWNLOAD_CAT) && is_array($JAK_DOWNLOAD_CAT)) foreach ($JAK_DOWNLOAD_CAT as $c) {
          $entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($c["parseurl"])), '1.0', 'monthly');
        }
      }

      // Create sitemap for shop
      // now get the plugin id for further use
      $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Ecommerce"');
      $rows    = $results->fetch_assoc();

      if ($rows) {

        $result = $jakdb->query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = ' . $rows['id']);
        $row    = $result->fetch_assoc();

        $result1 = $jakdb->query('SELECT id, title FROM ' . DB_PREFIX . 'shop WHERE active = 1 && catid != 0');

        while ($row1 = $result1->fetch_assoc()) {
          if ($jkv["shopurl"]) {
            $seo = JAK_base::jakCleanurl($row1['title']);
          }
          $parseurl = JAK_rewrite::jakParseurl($row['varname'], 'i', $row1['id'], $seo, '', '');
          // collect each record into $jakdata
          $entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', 'weekly');
        }

        $JAK_DOWNLOAD_CAT = JAK_Base::jakGetcatmix($row['varname'], '', DB_PREFIX . 'shopcategories', 0, $jkv["shopurl"]);

        if (isset($JAK_DOWNLOAD_CAT) && is_array($JAK_DOWNLOAD_CAT)) foreach ($JAK_DOWNLOAD_CAT as $c) {
          $entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($c["parseurl"])), '1.0', 'monthly');
        }
      }

      // Create sitemap for Ticketing
      // now get the plugin id for further use
      $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Ticketing"');
      $rows    = $results->fetch_assoc();

      if ($rows) {

        $result = $jakdb->query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = ' . $rows['id']);
        $row    = $result->fetch_assoc();

        $result1 = $jakdb->query('SELECT id, title FROM ' . DB_PREFIX . 'tickets WHERE active = 1 && catid != 0');

        while ($row1 = $result1->fetch_assoc()) {
          if ($jkv["ticketurl"]) {
            $seo = JAK_base::jakCleanurl($row1['title']);
          }
          $parseurl = JAK_rewrite::jakParseurl($row['varname'], 't', $row1['id'], $seo, '', '');
          // collect each record into $jakdata
          $entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', 'weekly');
        }

        $JAK_TICKET_CAT = JAK_Base::jakGetcatmix($row['varname'], '', DB_PREFIX . 'ticketcategories', 0, $jkv["ticketurl"]);

        if (isset($JAK_TICKET_CAT) && is_array($JAK_TICKET_CAT)) foreach ($JAK_TICKET_CAT as $c) {
          $entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($c["parseurl"])), '1.0', 'monthly');
        }
      }

      // Create sitemap for FAQ
      // now get the plugin id for further use
      $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "FAQ"');
      $rows    = $results->fetch_assoc();

      if ($rows) {

        $result = $jakdb->query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = ' . $rows['id']);
        $row    = $result->fetch_assoc();

        $result1 = $jakdb->query('SELECT id, title FROM ' . DB_PREFIX . 'faq WHERE active = 1 && catid != 0');

        while ($row1 = $result1->fetch_assoc()) {
          if ($jkv["faqurl"]) {
            $seo = JAK_base::jakCleanurl($row1['title']);
          }
          $parseurl = JAK_rewrite::jakParseurl($row['varname'], 'a', $row1['id'], $seo, '', '');
          // collect each record into $jakdata
          $entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', 'weekly');
        }
        $JAK_FAQ_CAT = JAK_Base::jakGetcatmix($row['varname'], '', DB_PREFIX . 'faqcategories', 0, $jkv["faqurl"]);

        if (isset($JAK_FAQ_CAT) && is_array($JAK_FAQ_CAT)) foreach ($JAK_FAQ_CAT as $c) {
          $entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($c["parseurl"])), '1.0', 'monthly');
        }
      }

      // Create sitemap for Blog
      // now get the plugin id for further use
      $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Blog"');
      $rows    = $results->fetch_assoc();

      if ($rows) {

        $result = $jakdb->query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = ' . $rows['id']);
        $row    = $result->fetch_assoc();

        $result1 = $jakdb->query('SELECT id, title FROM ' . DB_PREFIX . 'blog WHERE active = 1 && catid != 0');

        while ($row1 = $result1->fetch_assoc()) {
          if ($jkv["blogurl"]) {
            $seo = JAK_base::jakCleanurl($row1['title']);
          }
          $parseurl = JAK_rewrite::jakParseurl($row['varname'], 'a', $row1['id'], $seo, '', '');

          // collect each record into $jakdata
          $entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', $FREQUENCYBLOG);
        }

        $JAK_BLOG_CAT = JAK_Base::jakGetcatmix($row['varname'], '', DB_PREFIX . 'blogcategories', 0, $jkv["blogurl"]);
        if (isset($JAK_BLOG_CAT) && is_array($JAK_BLOG_CAT)) foreach ($JAK_BLOG_CAT as $c) {
          $entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($c["parseurl"])), '1.0', 'monthly');
        }
      }

      // Create sitemap for B2B Marketplace
      // now get the plugin id for further use
      $results = $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "MarketPlace"');
      $rows    = $results->fetch_assoc();

      if ($rows) {

        $result = $jakdb->query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = ' . $rows['id']);
        $row    = $result->fetch_assoc();

        $result1 = $jakdb->query('SELECT id, title FROM ' . DB_PREFIX . 'b2b_item WHERE active = 1 && catid != 0');

        while ($row1 = $result1->fetch_assoc()) {
          if ($jkv["b2b_url"]) {
            $seo = JAK_base::jakCleanurl($row1['title']);
          }
          $parseurl = JAK_rewrite::jakParseurl($row['varname'], 'i', $row1['id'], $seo, '', '');
          // collect each record into $jakdata
          $entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($parseurl)), '1.0', 'weekly');
        }

        $JAK_B2B_CAT = JAK_Base::jakGetcatmix($row['varname'], '', DB_PREFIX . 'b2b_categories', 0, $jkv["b2b_url"]);

        if (isset($JAK_B2B_CAT) && is_array($JAK_B2B_CAT)) foreach ($JAK_B2B_CAT as $c) {
          $entries[] = new xml_sitemap_entry(str_replace(BASE_URL, '', html_entity_decode($c["parseurl"])), '1.0', 'monthly');
        }
      }

      if ($jkv["sitehttps"]) {
        $newURL = str_replace("https://", "", (JAK_USE_APACHE ? substr(BASE_URL_ORIG, 0, -1) : BASE_URL_ORIG));
      } else {
        $newURL = str_replace("http://", "", (JAK_USE_APACHE ? substr(BASE_URL_ORIG, 0, -1) : BASE_URL_ORIG));
      }

      $conf = new xml_sitemap_generator_config;
      $conf->setDomain($newURL);
      $conf->setPath(APP_PATH . $XMLSEOPATH);
      $conf->setFilename('sitemap.xml');
      $conf->setEntries($entries);

      $generator = new xml_sitemap_generator($conf);

      $xml_result = $generator->write();

      // Do the dirty work in mysql
      $result = $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
          WHEN "xmlseodate" THEN NOW()
        END
        WHERE varname IN ("xmlseodate")');
      $error  = $error;
    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlxml["xml_sec_title"]["xmlt1"];
    $SECTION_DESC  = $tlxml["xml_sec_desc"]["xmld1"];

    // EN: Load the template
    // CZ: Načti template (šablonu)
    $plugin_template = 'plugins/xml_seo/admin/template/xml_seo_create.php';

    break;

  // View Sitemap XML
  case 'view':

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $defaults = $_POST;

      // Show/Hide Sitemap.xml
      if (isset($defaults['submit_one'])) {
        // Content of file
        $filexml = APP_PATH . $XMLSEOPATH . "sitemap.xml";
        if (file_exists($filexml)) {
          // File exist, get content
          $contentxml = file_get_contents($filexml);
        } else {
          // File not exist
          $contentxml = 'File not exist. Please create sitemap.xml firstly.';
        }
      } else if (isset($defaults['submit_two'])) {

      } else {
        die("Invalid submission");
      }
    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlxml["xml_sec_title"]["xmlt2"];
    $SECTION_DESC  = $tlxml["xml_sec_desc"]["xmld2"];

    // EN: Load the template
    // CZ: Načti template (šablonu)
    $plugin_template = 'plugins/xml_seo/admin/template/xml_seo_view.php';

    break;

  // Settings
  default:

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // XML SEO settings
      $defaults = $_POST;

      // Get value from From 1
      $path    = $defaults['jak_xmlseopath'];
      $txtfile = $defaults['jak_filetxt'];

      // Folder settings - Check if last character is '/'
      if (!empty($defaults['jak_xmlseopath'])) {
        $path = rtrim($path, '/') . '/';
      }

      // Check if directory is valid and save setting to db and file
      if (!is_dir(APP_PATH . $path)) {
        $error1 = $tlxml["xml_error"]["xmler1"] . ' ' . BASE_URL_ORIG . $path;
      } else if (!is_writable(APP_PATH . $path)) {
        $error2 = $tlxml["xml_error"]["xmler2"] . ' ' . BASE_URL_ORIG . $path;
      } else {
        $succes1 = str_replace("%s", BASE_URL_ORIG . $path, $tlxml["xml_error"]["xmler3"]);
        // Create backup file
        $file    = APP_PATH . "robots.txt";
        $newfile = APP_PATH . "robots.txt.backup";
        copy($file, $newfile);
        // Write to Robots.txt
        $content = stripslashes($txtfile);
        file_put_contents($file, $content);

        // Do the dirty work in mysql
        $result = $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
          WHEN "xmlseopath" THEN "' . smartsql($path) . '"
          WHEN "frequency_pages" THEN "' . smartsql($defaults['jak_frepages']) . '"
          WHEN "frequency_blog" THEN "' . smartsql($defaults['jak_freblog']) . '"
          WHEN "frequency_download" THEN "' . smartsql($defaults['jak_fredownload']) . '"
        END
        WHERE varname IN ("xmlseopath","frequency_pages","frequency_blog","frequency_download")');

        // Set new path and frequency change
        $XMLSEOPATH        = $path;
        $FREQUENCYPAGES    = $defaults['jak_frepages'];
        $FREQUENCYBLOG     = $defaults['jak_freblog'];
        $FREQUENCYDOWNLOAD = $defaults['jak_fredownload'];

      }
    }

    // Get the data - Change Frequency Pages
    $result = $jakdb->query('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE (varname = "frequency_pages")');
    $row    = $result->fetch_assoc();

    $FREQUENCYPAGES = $row['value'];

    // Get the data - Change Frequency Blog
    $result = $jakdb->query('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE (varname = "frequency_blog")');
    $row    = $result->fetch_assoc();

    $FREQUENCYBLOG = $row['value'];

    // Get the data - Change Frequency Download
    $result = $jakdb->query('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE (varname = "frequency_download")');
    $row    = $result->fetch_assoc();

    $FREQUENCYDOWNLOAD = $row['value'];

    // Get the xmlseo path and time from db
    $result = $jakdb->query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "xmlseopath"');
    $row    = $result->fetch_assoc();

    $XMLSEOPATH = $row['value'];

    $result = $jakdb->query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "xmlseodate"');
    $row    = $result->fetch_assoc();

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlxml["xml_sec_title"]["xmlt"];
    $SECTION_DESC  = $tlxml["xml_sec_desc"]["xmld"];

    // EN: Load the template
    // CZ: Načti template (šablonu)
    $plugin_template = 'plugins/xml_seo/admin/template/xml_seo_setting.php';
}
?>