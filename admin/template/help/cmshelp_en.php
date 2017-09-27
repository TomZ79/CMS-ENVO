<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<!-- START SECONDARY SIDEBAR MENU-->
<nav class="secondary-sidebar padding-30" id="myScrollspy">
  <ul class="nav main-menu">
    <li class="active">
      <a href="#introduction">
        <span class="title"><i class="pg-sent"></i> Úvod do CMS</span>
      </a>
      <ul class="sub-menu no-padding">
        <li>
          <a href="#introduction">
            <span class="title">Začínáme</span>
          </a>
        </li>
        <li>
          <a href="#supported_browsers">
            <span class="title">Podporované prohlížeče</span>
          </a>
        </li>
        <li>
          <a href="#requirements">
            <span class="title">Minimální požadavky</span>
          </a>
        </li>
        <li>
          <a href="#installation">
            <span class="title">Instalace</span>
          </a>
        </li>
        <li>
          <a href="#htaccess">
            <span class="title">CMS and htaccess (Seo)</span>
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a href="#elements">
        <span class="title"><i class="pg-folder"></i> UI Elements</span>
      </a>
      <ul class="sub-menu no-padding">
        <li>
          <a href="#elementscolor">
            <span class="title">Color</span>
          </a>
        </li>
        <li>
          <a href="#elementstypography">
            <span class="title">Typography</span>
          </a>
        </li>
        <li>
          <a href="#elementsicons">
            <span class="title">Icons</span>
          </a>
          <ul class="sub-menu-child no-padding">
            <li><a href="#elementsenvoicons">Envo Icons</a></li>
            <li><a href="#elementsfontawesomeicons">Font Awesome Icons</a></li>
          </ul>
        </li>
        <li>
          <a href="#elementsbuttons">
            <span class="title">Buttons</span>
          </a>
        </li>
        <li>
          <a href="#elementscreate">
            <span class="title">Create HTML Element</span>
          </a>
          <ul class="sub-menu-child no-padding">
            <li><a href="#elementscreate-doctype">DOCTYPE</a></li>
            <li><a href="#elementscreate-meta">META</a></li>
            <li><a href="#elementscreate-stylesheet">STYLESHEET</a></li>
            <li><a href="#elementscreate-script">SCRIPT</a></li>
            <li><a href="#elementscreate-startend">START - END</a></li>
            <li><a href="#elementscreate-anchor">ANCHOR</a></li>
            <li><a href="#elementscreate-image">IMAGE</a></li>
            <li><a href="#elementscreate-buttonf">BUTTONF</a></li>
            <li><a href="#elementscreate-button">BUTTON</a></li>
            <li><a href="#elementscreate-submitf">SUBMITF BUTTON</a></li>
            <li><a href="#elementscreate-submit">SUBMIT BUTTON</a></li>
            <li><a href="#elementscreate-textareaf">TEXTAREAF</a></li>
            <li><a href="#elementscreate-textarea">TEXTAREA</a></li>
            <li><a href="#elementscreate-radiof">LABELF - RADIOF BUTTON</a></li>
            <li><a href="#elementscdreate-checkboxf">LABELF - CHECKBOXF BUTTON</a></li>
            <li><a href="#elementscdreate-radio">LABEL - RADIO BUTTON</a></li>
            <li><a href="#elementscdreate-checkbox">LABEL - CHECKBOX BUTTON</a></li>
            <li><a href="#elementscdreate-input">INPUT</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li>
      <a href="#plugins">
        <span class="title"><i class="pg-folder"></i> Plugins</span>
      </a>
      <ul class="sub-menu no-padding">
        <li>
          <a href="#pluginbelowheader">
            <span class="title">Below Header</span>
          </a>
        </li>
        <li>
          <a href="#pluginblog">
            <span class="title">Blog</span>
          </a>
        </li>
        <li>
          <a href="#plugindownload">
            <span class="title">Download</span>
          </a>
        </li>
        <li>
          <a href="#pluginfaq">
            <span class="title">FAQ</span>
          </a>
        </li>
        <li>
          <a href="#plugingrowl">
            <span class="title">Growl</span>
          </a>
        </li>
        <li>
          <a href="#pluginnewsletter">
            <span class="title">Newsletter</span>
          </a>
        </li>
        <li>
          <a href="#pluginopenurl">
            <span class="title">Open URL</span>
          </a>
        </li>
        <li>
          <a href="#pluginregisterform">
            <span class="title">Register Form</span>
          </a>
        </li>
        <li>
          <a href="#pluginsiteeditor">
            <span class="title">Site Editor</span>
          </a>
        </li>
        <li>
          <a href="#pluginurlmapping">
            <span class="title">URL Mapping</span>
          </a>
        </li>
        <li>
          <a href="#pluginxmlseo">
            <span class="title">XML Seo</span>
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a href="#hooks">
        <span class="title"><i class="pg-folder"></i> Hooks</span>
      </a>
      <ul class="sub-menu no-padding">
        <li>
          <a href="#php_search">
            <span class="title">Hook: php_search</span>
          </a>
        </li>
        <li>
          <a href="#php_tags">
            <span class="title">Hook: php_tags</span>
          </a>
        </li>
        <li>
          <a href="#php_sitemap">
            <span class="title">Hook: php_sitemap</span>
          </a>
        </li>
        <li>
          <a href="#php_index_top">
            <span class="title">Hook: php_index_top</span>
          </a>
        </li>
        <li>
          <a href="#php_rss">
            <span class="title">Hook: php_rss</span>
          </a>
        </li>
        <li>
          <a href="#php_index_bottom">
            <span class="title">Hook: php_index_bottom</span>
          </a>
        </li>
        <li>
          <a href="#php_index_page">
            <span class="title">Hook: php_index_page</span>
          </a>
        </li>
        <li>
          <a href="#php_lang">
            <span class="title">Hook: php_lang</span>
          </a>
        </li>
        <li>
          <a href="#php_pages_news">
            <span class="title">Hook: php_pages_news</span>
          </a>
        </li>
        <li>
          <a href="#php_admin_usergroup">
            <span class="title">Hook: php_admin_usergroup</span>
          </a>
        </li>
        <li>
          <a href="#php_admin_user_rename">
            <span class="title">Hook: php_admin_user_rename</span>
          </a>
        </li>
        <li>
          <a href="#php_admin_user_delete">
            <span class="title">Hook: php_admin_user_delete</span>
          </a>
        </li>
        <li>
          <a href="#php_admin_user_delete_mass">
            <span class="title">Hook: php_admin_user_delete_mass</span>
          </a>
        </li>
        <li>
          <a href="#php_admin_lang">
            <span class="title">Hook: php_admin_lang</span>
          </a>
        </li>
        <li>
          <a href="#php_admin_setting">
            <span class="title">Hook: php_admin_setting</span>
          </a>
        </li>
        <li>
          <a href="#php_admin_setting_post">
            <span class="title">Hook: php_admin_setting_post</span>
          </a>
        </li>
        <li>
          <a href="#php_admin_user">
            <span class="title">Hook: php_admin_user</span>
          </a>
        </li>
        <li>
          <a href="#php_admin_user_edit">
            <span class="title">Hook: php_admin_user_edit</span>
          </a>
        </li>
        <li>
          <a href="#php_admin_index">
            <span class="title">Hook: php_admin_index</span>
          </a>
        </li>
        <li>
          <a href="#php_admin_fulltext_add">
            <span class="title">Hook: php_admin_fulltext_add</span>
          </a>
        </li>
        <li>
          <a href="#php_admin_fulltext_remove">
            <span class="title">Hook: php_admin_fulltext_remove</span>
          </a>
        </li>
        <li>
          <a href="#php_admin_pages_sql">
            <span class="title">Hook: php_admin_pages_sql</span>
          </a>
        </li>
        <li>
          <a href="#php_admin_news_sql">
            <span class="title">Hook: php_admin_news_sql</span>
          </a>
        </li>
        <li>
          <a href="#php_admin_pages_news_info">
            <span class="title">Hook: php_admin_pages_news_info</span>
          </a>
        </li>
        <li>
          <a href="#php_admin_widgets_sql">
            <span class="title">Hook: php_admin_widgets_sql</span>
          </a>
        </li>
        <li>
          <a href="#tpl_body_top">
            <span class="title">Hook: tpl_body_top</span>
          </a>
        </li>
        <li>
          <a href="#tpl_between_head">
            <span class="title">Hook: tpl_between_head</span>
          </a>
        </li>
        <li>
          <a href="#tpl_header">
            <span class="title">Hook: tpl_header</span>
          </a>
        </li>
        <li>
          <a href="#tpl_below_header">
            <span class="title">Hook: tpl_below_header</span>
          </a>
        </li>
        <li>
          <a href="#tpl_sidebar">
            <span class="title">Hook: tpl_sidebar</span>
          </a>
        </li>
        <li>
          <a href="#tpl_page">
            <span class="title">Hook: tpl_page</span>
          </a>
        </li>
        <li>
          <a href="#tpl_footer">
            <span class="title">Hook: tpl_footer</span>
          </a>
        </li>
        <li>
          <a href="#tpl_footer_end">
            <span class="title">Hook: tpl_footer_end</span>
          </a>
        </li>
        <li>
          <a href="#tpl_tags">
            <span class="title">Hook: tpl_tags</span>
          </a>
        </li>
        <li>
          <a href="#tpl_sitemap">
            <span class="title">Hook: tpl_sitemap</span>
          </a>
        </li>
        <li>
          <a href="#tpl_search">
            <span class="title">Hook: tpl_search</span>
          </a>
        </li>
        <li>
          <a href="#tpl_page_news_grid">
            <span class="title">Hook: tpl_page_news_grid</span>
          </a>
        </li>
        <li>
          <a href="#tpl_admin_usergroup_edit">
            <span class="title">Hook: tpl_admin_usergroup_edit</span>
          </a>
        </li>
        <li>
          <a href="#tpl_admin_usergroup">
            <span class="title">Hook: tpl_admin_usergroup</span>
          </a>
        </li>
        <li>
          <a href="#tpl_admin_setting">
            <span class="title">Hook: tpl_admin_setting</span>
          </a>
        </li>
        <li>
          <a href="#tpl_admin_head">
            <span class="title">Hook: tpl_admin_head</span>
          </a>
        </li>
        <li>
          <a href="#tpl_admin_footer">
            <span class="title">Hook: tpl_admin_footer</span>
          </a>
        </li>
        <li>
          <a href="#tpl_admin_page_news">
            <span class="title">Hook: tpl_admin_page_news</span>
          </a>
        </li>
        <li>
          <a href="#tpl_admin_page_news_new">
            <span class="title">Hook: tpl_admin_page_news_new</span>
          </a>
        </li>
        <li>
          <a href="#tpl_admin_user">
            <span class="title">Hook: tpl_admin_user</span>
          </a>
        </li>
        <li>
          <a href="#tpl_admin_user_edit">
            <span class="title">Hook: tpl_admin_user_edit</span>
          </a>
        </li>
        <li>
          <a href="#tpl_admin_index">
            <span class="title">Hook: tpl_admin_index</span>
          </a>
        </li>
        <li>
          <a href="#tpl_footer_widgets">
            <span class="title">Hook: tpl_footer_widgets</span>
          </a>
        </li>
        <li>
          <a href="#tpl_below_content">
            <span class="title">Hook: tpl_below_content</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
<!-- END SECONDARY SIDEBAR MENU -->

<div class="inner-content padding-20">

  <!-- Introduction -->
  <section id="introduction" class="scrollspyoffset">
    <h1 class="text-center">CMS - ENVO Documentation</h1>
    <h5 class="text-center">Beautifully Hand Crafted, Light Weight, Hardware Accelerated UI Framework </h5>
    <hr>
    <h3>Introduction</h3>
    <p>CMS ENVO is carefully well thought UI frame work that is built on top of Bootstrap 3, Its hand crafted components look great on all devices and works super fast even on mobile</p>
    <p>This documentation guide for all Pages users who can even be a beginner to Web development</p>
    <p>CMS is a software to build modern websites based on <strong>HTML5 and CSS3 and Bootstrap 3</strong>.</p>
    <p>Basic code is from J&eacute;r&ocirc;me Kaegi by
      <a href="http://wwww.jakweb.ch" target="_blank">wwww.jakweb.ch</a></p>
    <p>CMS is build on PHP widely used on web servers. MySQL for storing all the necessary data and HTML5/CSS3.</p>
    <p><strong>CMS is using a few third party products like:</strong></p>
    <ul>
      <li>jQuery</li>
      <li>Bootstrap</li>
      <li>tinyMCE - Editor</li>
      <li>Shadowbox</li>
      <li>jQuery Tags - XoXco</li>
    </ul>
    <p>CMS has been tested on many different web servers including windows based server, as long you have the minimum requirements and read the installation manual carefully you should not run into any problems.</p>
    <p class="all-caps fs-12 bold">Minimum Requirements :</p>
    <ul>
      <li>PHP 5.3</li>
      <li>MySQL 5.0.7</li>
    </ul>
    <p class="all-caps fs-12 bold">Optional, good to have :</p>
    <ul>
      <li>Apache based web server</li>
      <li>MySQLi Support</li>
    </ul>
  </section>

  <!-- Browser Support -->
  <section id="supported_browsers" class="scrollspyoffset">
    <h2 class="text-center">Browser Support</h2>
    <hr>
    <p>Pages is built keeping mind to support a wide range of browsers and devices. We all major browers Google Chrome, Mozilla Firefox, Safari, Opera, Internet Explorer 9 and Above</p>
    <p></p>
    <p>Pages not only is supported by major browser but also is hardware accelarated using the GPU </p>
    <br>
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-condensed">
        <thead>
        <tr>
          <td></td>
          <th>Chrome</th>
          <th>Firefox</th>
          <th>Internet Explorer</th>
          <th>Opera</th>
          <th>Safari</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <th>Android</th>
          <td class="text-success"><span class="fa fa-check"></span> Supported</td>
          <td class="text-success"><span class="fa fa-check"></span> Supported</td>
          <td class="text-muted" rowspan="3" style="vertical-align: middle;">N/A</td>
          <td class="text-danger"><span class="fa fa-times"></span> Not Supported</td>
          <td class="text-muted">N/A</td>
        </tr>
        <tr>
          <th>iOS</th>
          <td class="text-success"><span class="fa fa-check"></span> Supported</td>
          <td class="text-muted">N/A</td>
          <td class="text-danger"><span class="fa fa-times"></span> Not Supported</td>
          <td class="text-success"><span class="fa fa-check"></span> Supported</td>
        </tr>
        <tr>
          <th>Mac OS X</th>
          <td class="text-success"><span class="fa fa-check"></span> Supported</td>
          <td class="text-success"><span class="fa fa-check"></span> Supported</td>
          <td class="text-success"><span class="fa fa-check"></span> Supported</td>
          <td class="text-success"><span class="fa fa-check"></span> Supported</td>
        </tr>
        <tr>
          <th>Windows</th>
          <td class="text-success"><span class="fa fa-check"></span> Supported</td>
          <td class="text-success"><span class="fa fa-check"></span> Supported</td>
          <td class="text-success"><span class="fa fa-check"></span> Supported</td>
          <td class="text-success"><span class="fa fa-check"></span> Supported</td>
          <td class="text-danger"><span class="fa fa-times"></span> Not Supported</td>
        </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- Requirements -->
  <section id="requirements" class="scrollspyoffset">
    <h2 class="text-center">Minimální požadavky</h2>
    <hr>
    <p>You need a web server to run CMS.</p>
    <p>The web server must have PHP and MySQL with one available database.</p>
    <p>If your web server is running on Apache you can use the build in URL optimizer and get a slightly better search engine performance.</p>
    <p class="all-caps fs-12 bold">Minimum requirements for your web server :</p>
    <ul>
      <li>Minimum PHP 5.3</li>
      <li>Minimum MySQL 5.2</li>
      <li>Session in working order</li>
      <li>GD Library</li>
      <li>$_SERVER vars (standard)</li>
      <li>MySQLi Support</li>
    </ul>
    <p class="all-caps fs-12 bold">Optional for better SEO :</p>
    <ul>
      <li>Apache Server</li>
    </ul>
  </section>

  <!-- Installation - First Step -->
  <section id="installation" class="scrollspyoffset">
    <h2 class="text-center">Installation - First Step</h2>
    <hr>
    <p>When you install CMS the first time, please
      <strong>read the installation manual very carefully!</strong> Installing CMS is very simple and the installation wizard will guide you thru in only two steps.
    </p>
    <p>Important information about the db.php file. Please open this file in any text or php editor, the file is located in the include/ directory.</p>
    <p class="all-caps fs-12 bold">Database Connection :</p>
    <pre class="prettyprint linenums lang-php">
define('DB_HOST', 'localhost'); // Database host ## Datenbank Server
define('DB_PORT', 3306); // Enter the database port for your mysql server
define('DB_USER', ''); // Database user ## Datenbank Benutzername
define('DB_PASS', ''); // Database password ## Datenbank Passwort
define('DB_NAME', ''); // Database name ## Datenbank Name
define('DB_PREFIX', ''); // Database prefix use (a-z) and (_)
</pre>
    <p>This should be clear, important information for PHP to connect to your MySQL database and table. Please choose a strong password when you setup your MySQL table. For example:
      <strong>4k2+!kSSowk9</strong></p>
    <p class="all-caps fs-12 bold">Define a unique key :</p>
    <pre class="prettyprint linenums lang-php">
define('DB_PASS_HASH', '');
</pre>
    <p>This unique key will be used to make the password of your members even stronger, do not change this key after setup, otherwise your members cannot login again. Use a very strong key to protect your members password. For example:
      <strong>%3ko**è,LwlKK</strong></p>
    <p>The rest should be clear...</p>
  </section>

  <!-- CMS and htaccess (Seo) -->
  <section id="htaccess" class="scrollspyoffset">
    <h2 class="text-center">CMS and htaccess (Seo)</h2>
    <hr>
    <p>If you server is running on Apache you can use the build in optimisation for short url's. This gives you the possibilities to have shorter and cleaner URL's and a better search engine performance.</p>
    <p>To use the build in SEO in CMS you need to do two things, first open the db.php file and set following definition:</p>
    <pre class="prettyprint linenums lang-php">
define('ENVO_USE_APACHE', 1);
</pre>
    <p>Then upload the .htaccess file provided in the download package or create your own with following content:</p>
    <pre class="prettyprint linenums lang-php">
# Enable the Rewrite engine
RewriteEngine On

# SEO Url friendly
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . index.php [L]

# URL not found
ErrorDocument 404 /404/

# URL Canonicalization
RewriteCond %{HTTP_HOST} !^www.yoursite.cz$ [NC]
RewriteRule ^(.*)$ http://www.yoursite.cz/$1 [L,R=301]

# Gzip compression
# compress text, html, javascript, css, xml:
AddOutputFilterByType DEFLATE text/plain
AddOutputFilterByType DEFLATE text/html
AddOutputFilterByType DEFLATE text/xml
AddOutputFilterByType DEFLATE text/css
AddOutputFilterByType DEFLATE application/xml
AddOutputFilterByType DEFLATE application/xhtml+xml
AddOutputFilterByType DEFLATE application/rss+xml
AddOutputFilterByType DEFLATE application/javascript
AddOutputFilterByType DEFLATE application/x-javascript

# 1 WEEK
&lt;FilesMatch &quot;\.(jpg|jpeg|png|gif|swf)$&quot;&gt;
Header set Cache-Control "max-age=604800, public"
&lt;/FilesMatch&gt;
</pre>
    <p>Upload both files into the correct location .htaccess needs to be in the root directory and enjoy the apache version of CMS.</p>
  </section>

  <!-- UI Elements -->
  <section id="elements" class="scrollspyoffset">
    <h2 class="text-center">UI Elements</h2>
    <hr>

  </section>

  <!-- UI Elements - Color -->
  <section id="elementscolor" class="scrollspyoffset">
    <h2 class="text-center">UI Elements - Color</h2>
    <hr>
    <p>Every color used throughout the theme has been generated by using the following eight base colors, which are defined in the
      <code>var.less</code>file. This makes theme customization a matter of changing few LESS variables.
    </p>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <div class="bg-master b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <p class="small no-margin pull-left">Master color</p>
            <p class="small no-margin pull-right">#626262</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="bg-primary b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left">Primary color</p>
            <p class="small no-margin pull-right">#6D5CAE</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="bg-complete b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <p class="small no-margin pull-left">Complete color</p>
            <p class="small no-margin pull-right">#48B0F7</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="bg-success b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <p class="small no-margin pull-left">Success color</p>
            <p class="small no-margin pull-right">#10CFBD</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <div class="bg-menu b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <p class="small no-margin pull-left">Menu color</p>
            <p class="small no-margin pull-right">#202328</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="bg-info b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <p class="small no-margin pull-left">Info color</p>
            <p class="small no-margin pull-right">#3B4752</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="bg-danger b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <p class="small no-margin pull-left">Danger color</p>
            <p class="small no-margin pull-right">#F55753</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="bg-warning b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <p class="small no-margin pull-left">Warning color</p>
            <p class="small no-margin pull-right">#F8D053</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <h4 class="m-t-50">Monochrome color shades</h4>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <p>Menu options</p>
        <div class="bg-master-darkest b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <p class="small no-margin pull-left hint-text">.bg-master-darkest</p>
            <p class="small no-margin pull-right hint-text">#000000</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Menu</p>
        <div class="bg-master-darker b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <p class="small no-margin pull-left hint-text">.bg-master-darker</p>
            <p class="small no-margin pull-right hint-text">#1A1A1A</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Text heading</p>
        <div class="bg-master-dark b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <p class="small no-margin pull-left hint-text">.bg-master-dark</p>
            <p class="small no-margin pull-right hint-text">#2C2C2C</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Default text (base)</p>
        <div class="bg-master b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <p class="small no-margin pull-left hint-text">.bg-master</p>
            <p class="small no-margin pull-right hint-text">#626262</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <p>Dividers</p>
        <div class="bg-master-light b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <p class="small no-margin pull-left hint-text">.bg-master-light</p>
            <p class="small no-margin pull-right hint-text">#000000</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Cover page</p>
        <div class="bg-master-lighter b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <p class="small no-margin pull-left hint-text">.bg-master-lighter</p>
            <p class="small no-margin pull-right hint-text">#1A1A1A</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Background</p>
        <div class="bg-master-lightest b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <p class="small no-margin pull-left hint-text">.bg-master-lightest</p>
            <p class="small no-margin pull-right hint-text">#2C2C2C</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <h4 class="m-t-50">Primary color shades</h4>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <p>Notification text</p>
        <div class="bg-primary-darker b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-primary-darker</p>
            <p class="small no-margin pull-right hint-text">#413768</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Text color</p>
        <div class="bg-primary-dark b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-primary-dark</p>
            <p class="small no-margin pull-right hint-text">#5B4D91</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Base color</p>
        <div class="bg-primary b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-primary</p>
            <p class="small no-margin pull-right hint-text">#6D5CAE</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Button overlay</p>
        <div class="bg-primary-light b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-primary-light</p>
            <p class="small no-margin pull-right hint-text">#8A7DBE</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <p>Background opt.</p>
        <div class="bg-primary-lighter b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-primary-lighter</p>
            <p class="small no-margin pull-right hint-text">#E2DEEF</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <h4 class="m-t-50">Complete color shades</h4>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <p>Notification text</p>
        <div class="bg-complete-darker b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-complete-darker</p>
            <p class="small no-margin pull-right hint-text">#2B6A94</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Text color</p>
        <div class="bg-complete-dark b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-complete-dark</p>
            <p class="small no-margin pull-right hint-text">#3C93CE</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Base color</p>
        <div class="bg-complete b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-complete</p>
            <p class="small no-margin pull-right hint-text">#48B0F7</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Button overlay</p>
        <div class="bg-complete-light b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-complete-light</p>
            <p class="small no-margin pull-right hint-text">#6DC0F9</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <p>Background opt.</p>
        <div class="bg-complete-lighter b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-complete-lighter</p>
            <p class="small no-margin pull-right hint-text">#DAEFFD</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <h4 class="m-t-50">Success color shades</h4>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <p>Notification text</p>
        <div class="bg-success-darker b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-success-darker</p>
            <p class="small no-margin pull-right hint-text">#0A7C71</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Text color</p>
        <div class="bg-success-dark b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-success-dark</p>
            <p class="small no-margin pull-right hint-text">#0DAD9E</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Base color</p>
        <div class="bg-success b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-success</p>
            <p class="small no-margin pull-right hint-text">#10CFBD</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Button overlay</p>
        <div class="bg-success-light b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-success-light</p>
            <p class="small no-margin pull-right hint-text">#40D9CA</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <p>Background opt.</p>
        <div class="bg-success-lighter b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-success-lighter</p>
            <p class="small no-margin pull-right hint-text">#CFF5F2</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <h4 class="m-t-50">Warning color shades</h4>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <p>Notification text</p>
        <div class="bg-warning-darker b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-warning-darker</p>
            <p class="small no-margin pull-right hint-text">#957D32</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Text color</p>
        <div class="bg-warning-dark b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-warning-dark</p>
            <p class="small no-margin pull-right hint-text">#CFAE45</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Base color</p>
        <div class="bg-warning b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-warning</p>
            <p class="small no-margin pull-right hint-text">#F8D053</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Button overlay</p>
        <div class="bg-warning-light b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-warning-light</p>
            <p class="small no-margin pull-right hint-text">#F9D975</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <p>Background opt.</p>
        <div class="bg-warning-lighter b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-warning-lighter</p>
            <p class="small no-margin pull-right hint-text">#FEF6DD</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <h4 class="m-t-50">Danger color shades</h4>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <p>Notification text</p>
        <div class="bg-danger-darker b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-danger-darker</p>
            <p class="small no-margin pull-right hint-text">#933432</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Text color</p>
        <div class="bg-danger-dark b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-danger-dark</p>
            <p class="small no-margin pull-right hint-text">#CD4945</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Base color</p>
        <div class="bg-danger b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-danger</p>
            <p class="small no-margin pull-right hint-text">#F55753</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Button overlay</p>
        <div class="bg-danger-light b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-danger-light</p>
            <p class="small no-margin pull-right hint-text">#F77975</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <p>Background opt.</p>
        <div class="bg-danger-lighter b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-danger-lighter</p>
            <p class="small no-margin pull-right hint-text">#FDDDDD</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <h4 class="m-t-50">Info color shades</h4>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <p>Notification text</p>
        <div class="bg-info-darker b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-info-darker</p>
            <p class="small no-margin pull-right hint-text">#232B31</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Text color</p>
        <div class="bg-info-dark b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-info-dark</p>
            <p class="small no-margin pull-right hint-text">#313B44</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Base color</p>
        <div class="bg-info b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-info</p>
            <p class="small no-margin pull-right hint-text">#3B4752</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Button overlay</p>
        <div class="bg-info-light b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-info-light</p>
            <p class="small no-margin pull-right hint-text">#626C75</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <p>Background opt.</p>
        <div class="bg-info-lighter b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-info-lighter</p>
            <p class="small no-margin pull-right hint-text">#D8DADC</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <h4 class="m-t-50">Menu color shades</h4>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <p>Menu open color</p>
        <div class="bg-menu-light b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-menu-light</p>
            <p class="small no-margin pull-right hint-text">#191B1F</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Base color</p>
        <div class="bg-menu b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-menu</p>
            <p class="small no-margin pull-right hint-text">#202328</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Text/icon color</p>
        <div class="bg-menu-light b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-menu-dark</p>
            <p class="small no-margin pull-right hint-text">#646972</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <h4 class="m-t-50">Other colors</h4>
    <div class="row m-t-30">
      <div class="col-md-3 col-sm-6">
        <p>White color</p>
        <div class="bg-white b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-white</p>
            <p class="small no-margin pull-right hint-text">#ffffff</p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <p>Transparent</p>
        <div class="bg-transparent b-a b-grey">
          <div class="bg-white m-t-45 padding-10 text-master">
            <p class="small no-margin pull-left hint-text">.bg-transparent</p>
            <p class="small no-margin pull-right hint-text"></p>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- UI Elements - Typography -->
  <section id="elementstypography" class="scrollspyoffset">
    <h2 class="text-center">UI Elements - Typography</h2>
    <hr>
    <p>Font rendering will deffer from browser to browser and even platform to platform and sometimes it will look good on a Mac and would look horrible on Windows, this is something we see in most of the websites, We took web framework to whole new level where it looks good in all devices! no matter what platform browser or device you will you use it will look great</p>
    <p>We Developed an algorithm that will automatically select which font is best rendered as for your operating system. This is how it the render performance looks like</p>

    <h4 class="m-t-50">Font Color Classes</h4>
    <hr>
    <p>You can add these classes to any element and its color of the font will change</p>
    <div class="row m-t-30">
      <div class="col-sm-3">
        <p class="text-heading-color">
          Heading color
        </p>
        <div class="bg-master-darkest b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <div class="hint-text clearfix">
              <p class="small v-align-middle pull-left">
                .text-black
              </p>
              <p class="small text-right v-align-middle pull-right">
                #2c2c2c
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <p class="">
          Body text
        </p>
        <div class="bg-master b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <div class="clearfix hint-text">
              <p class="small v-align-middle pull-left no-margin">
                Default
              </p>
              <p class="small text-right v-align-middle pull-right no-margin">
                #626262
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <p class="">
          Hinted text
        </p>
        <div class="b-a b-grey" style="background-color:#939393">
          <div class="bg-white m-t-45 padding-10">
            <div class="clearfix hint-text">
              <p class="small v-align-middle pull-left no-margin">
                .hint-text
              </p>
              <p class="small text-right v-align-middle pull-right no-margin">
                #2c2c2c
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <p class="text-heading-color">
          Primary color
        </p>
        <div class="bg-primary b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <div class="clearfix text-black hint-text">
              <p class="small v-align-middle pull-left no-margin">
                .text-primary
              </p>
              <p class="small text-right v-align-middle pull-righ no-margin">
                #62549a
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row m-t-30 m-b-30">
      <div class="col-sm-3">
        <p class="">
          Success color
        </p>
        <div class="bg-success b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <div class="clearfix hint-text">
              <p class="small v-align-middle pull-left no-margin">
                .text-success
              </p>
              <p class="small text-right v-align-middle pull-right no-margin">
                #4aa9e9
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <p class="">
          Complete color
        </p>
        <div class="bg-complete b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <div class="clearfix hint-text">
              <p class="small v-align-middle pull-left no-margin">
                .text-complete
              </p>
              <p class="small text-right v-align-middle pull-right no-margin">
                #23b9a9
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <p class="text-heading-color">
          Danger color
        </p>
        <div class="bg-danger b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <div class="clearfix hint-text">
              <p class="small v-align-middle pull-left no-margin">
                .text-danger
              </p>
              <p class="small text-right v-align-middle pull-right no-margin">
                #ce4e4d
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <p class="">
          Warning color
        </p>
        <div class="bg-warning b-a b-grey">
          <div class="bg-white m-t-45 padding-10">
            <div class="clearfix hint-text">
              <p class="small v-align-middle pull-left no-margin">
                .text-warning
              </p>
              <p class="small text-right v-align-middle pull-right no-margin">
                #eac459
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <p class="all-caps fs-12 bold">Example :</p>
    <pre class="prettyprint linenums lang-html">
&lt;!-- In Paragraph --&gt;
&lt;p class=&quot;text-primary&quot;&gt;Font Colour Changes! &lt;/p&gt;

&lt;!-- In any other tag --&gt;
&lt;div class=&quot;text-success&quot;&gt;Font Colour Changes! &lt;/div&gt;
</pre>

    <h4 class="m-t-50">Font Size Classes</h4>
    <hr>
    <p class="m-b-15">If you wish to change the default font size, then you can apply the following classes</p>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <p class="fs-12">Font Size 12px </p>
      <p class="fs-13">Font Size 13px </p>
      <p class="fs-14">Font Size 14px </p>
      <p class="fs-15">Font Size 15px </p>
      <p class="fs-16">Font Size 16px </p>
    </div>
    <pre class="prettyprint linenums lang-html">
&lt;!-- In Font Size 12 --&gt;
&lt;p class=&quot;fs-12&quot;&gt;Font Size 12px &lt;/p&gt;

&lt;!-- In Font Size 13 --&gt;
&lt;p class=&quot;fs-13&quot;&gt;Font Size 13px &lt;/p&gt;

&lt;!-- In Font Size 14 --&gt;
&lt;p class=&quot;fs-14&quot;&gt;Font Size 14px &lt;/p&gt;

&lt;!-- In Font Size 15 --&gt;
&lt;p class=&quot;fs-15&quot;&gt;Font Size 15px &lt;/p&gt;

&lt;!-- In Font Size 16 --&gt;
&lt;p class=&quot;fs-16&quot;&gt;Font Size 16px &lt;/p&gt;
</pre>

    <h4 class="m-t-50">Font Weights</h4>
    <hr>
    <p class="m-b-15">Try out different font weights, this can be applied if the font supports it only, works partial support for Arial - Paragraphs Full support for Headings</p>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <h5 class="light">Thinnest</h5>
      <h5 class="semi-bold">Semi-bold</h5>
      <h5 class="bold">Most Boldest</h5>
    </div>
    <pre class="prettyprint linenums lang-html">
&lt;!-- Heading Light Weight --&gt;
&lt;h5 class=&quot;light&quot;&gt;Thinnest&lt;/h5&gt;

&lt;!-- Heading Semi-bold Weight --&gt;
&lt;h5 class=&quot;semi-bold&quot;&gt;Semi-bold&lt;/h5&gt;

&lt;!-- Heading bold Weight --&gt;
&lt;h5 class=&quot;bold&quot;&gt;Most Boldest&lt;/h5&gt;
</pre>

    <h4 class="m-t-50">Font Face Switching</h4>
    <hr>
    <p class="m-b-15">Apply heading font to paragraph or apply paragraph font to heading, you can switch it either way</p>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <h5 class="font-arial">Im now Arial</h5>
      <p class="font-montserrat">I look different now</p>
    </div>
    <pre class="prettyprint linenums lang-html">
&lt;!-- Heading with Arial font --&gt;
&lt;h5 class=&quot;font-arial&quot;&gt;Im now Arial&lt;/h5&gt;

&lt;!-- Paragraph with heading font --&gt;
&lt;p class=&quot;font-montserrat&quot;&gt;I look different now&lt;/p&gt;
</pre>

    <div class="well bs-ref m-t-50 clearfix">
      <span class="pull-left">For native Bootstrap typography classes </span><a href="http://getbootstrap.com/css/#type" target="_blank" class="btn btn-primary pull-right ">Bootstrap Documentation</a>
    </div>
  </section>

  <!-- UI Elements - Icons -->
  <section id="elementsicons" class="scrollspyoffset">
    <h2 class="text-center">UI Elements - Icons</h2>
    <hr>

  </section>

  <!-- UI Elements - Envo Icons  -->
  <section id="elementsenvoicons" class="scrollspyoffset">
    <h4>Envo Icons</h4>
    <hr>
    <p>Follow these steps to include an icon on to your page </p>
    <h5 class="semi-bold">Step one</h5>
    <p>Check if the following Style sheet is already added inside the <code>&lt;head&gt;</code> tag</p>
    <pre class="prettyprint linenums lang-html">
&lt;link href=&quot;pages/css/pages-icon.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot;&gt;
</pre>
    <h5 class="semi-bold">Step two</h5>
    <p>
      Place the icon class in a <code>&lt;i&gt;&lt;/i&gt;</code> tag, pages icon prefix class starts with
      <code>pg-</code>.
    </p>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <p><i class="pg-social"></i></p>
    </div>
    <pre class="prettyprint linenums lang-html">
&lt;i class=&quot;pg-social&quot;&gt;&lt;/i&gt;
</pre>
    <div class="m-t-20">
      <h5 class="semi-bold">Envo Icons classes</h5>
      <form id="live-search" action="" class="live-search m-b-20" method="post">
        <p>Enter text to filter icons:</p>
        <input type="text" class="text-input" id="filter" value="" placeholder="Live Search ..."/>
        <span id="filter-count"></span>
      </form>

      <ul id="pgicons" class="show-icon">
        <li><i class="pg-signals"></i><span>pg-signals</span></li>
        <li><i class="pg-crop"></i><span>pg-crop</span></li>
        <li><i class="pg-folder_alt"></i><span>pg-folder_alt</span></li>
        <li><i class="pg-folder"></i><span>pg-folder</span></li>
        <li><i class="pg-theme"></i><span>pg-theme</span></li>
        <li><i class="pg-battery_empty"></i><span>pg-battery_empty</span></li>
        <li><i class="pg-battery"></i><span>pg-battery</span></li>
        <li><i class="pg-note"></i><span>pg-note</span></li>
        <li><i class="pg-server_hard"></i><span>pg-server_hard</span></li>
        <li><i class="pg-servers"></i><span>pg-servers</span></li>
        <li><i class="pg-menu_justify"></i><span>pg-menu_justify</span></li>
        <li><i class="pg-credit_card"></i><span>pg-credit_card</span></li>
        <li><i class="pg-fullscreen_restore"></i><span>pg-fullscreen_restore</span></li>
        <li><i class="pg-fullscreen"></i><span>pg-fullscreen</span></li>
        <li><i class="pg-minus"></i><span>pg-minus</span></li>
        <li><i class="pg-minus_circle"></i><span>pg-minus_circle</span></li>
        <li><i class="pg-plus_circle"></i><span>pg-plus_circle</span></li>
        <li><i class="pg-refresh_new"></i><span>pg-refresh_new</span></li>
        <li><i class="pg-close_line"></i><span>pg-close_line</span></li>
        <li><i class="pg-close"></i><span>pg-close</span></li>
        <li><i class="pg-arrow_down"></i><span>pg-arrow_down</span></li>
        <li><i class="pg-arrow_left_line_alt"></i><span>pg-arrow_left_line_alt</span></li>
        <li><i class="pg-arrow_left"></i><span>pg-arrow_left</span></li>
        <li><i class="pg-arrow_lright_line_alt"></i><span>pg-arrow_lright_line_alt</span></li>
        <li><i class="pg-arrow_maximize_line"></i><span>pg-arrow_maximize_line</span></li>
        <li><i class="pg-arrow_maximize"></i><span>pg-arrow_maximize</span></li>
        <li><i class="pg-arrow_minimize_line"></i><span>pg-arrow_minimize_line</span></li>
        <li><i class="pg-arrow_minimize"></i><span>pg-arrow_minimize</span></li>
        <li><i class="pg-arrow_right"></i><span>pg-arrow_right</span></li>
        <li><i class="pg-arrow_up"></i><span>pg-arrow_up</span></li>
        <li><i class="pg-more"></i><span>pg-more</span></li>
        <li><i class="pg-bag"></i><span>pg-bag</span></li>
        <li><i class="pg-bag1"></i><span>pg-bag1</span></li>
        <li><i class="pg-bold"></i><span>pg-bold</span></li>
        <li><i class="pg-calender"></i><span>pg-calender</span></li>
        <li><i class="pg-camera"></i><span>pg-camera</span></li>
        <li><i class="pg-centeralign"></i><span>pg-centeralign</span></li>
        <li><i class="pg-charts"></i><span>pg-charts</span></li>
        <li><i class="pg-clock"></i><span>pg-clock</span></li>
        <li><i class="pg-comment"></i><span>pg-comment</span></li>
        <li><i class="pg-contact_book"></i><span>pg-contact_book</span></li>
        <li><i class="pg-credit_card_line"></i><span>pg-credit_card_line</span></li>
        <li><i class="pg-cupboard"></i><span>pg-cupboard</span></li>
        <li><i class="pg-desktop"></i><span>pg-desktop</span></li>
        <li><i class="pg-download"></i><span>pg-download</span></li>
        <li><i class="pg-eraser"></i><span>pg-eraser</span></li>
        <li><i class="pg-extra"></i><span>pg-extra</span></li>
        <li><i class="pg-form"></i><span>pg-form</span></li>
        <li><i class="pg-grid"></i><span>pg-grid</span></li>
        <li><i class="pg-home"></i><span>pg-home</span></li>
        <li><i class="pg-image"></i><span>pg-image</span></li>
        <li><i class="pg-inbox"></i><span>pg-inbox</span></li>
        <li><i class="pg-indent"></i><span>pg-indent</span></li>
        <li><i class="pg-italic"></i><span>pg-italic</span></li>
        <li><i class="pg-laptop"></i><span>pg-laptop</span></li>
        <li><i class="pg-layouts"></i><span>pg-layouts</span></li>
        <li><i class="pg-layouts2"></i><span>pg-layouts2</span></li>
        <li><i class="pg-layouts3"></i><span>pg-layouts3</span></li>
        <li><i class="pg-layouts4"></i><span>pg-layouts4</span></li>
        <li><i class="pg-leftalign"></i><span>pg-leftalign</span></li>
        <li><i class="pg-like"></i><span>pg-like</span></li>
        <li><i class="pg-like1"></i><span>pg-like1</span></li>
        <li><i class="pg-lock"></i><span>pg-lock</span></li>
        <li><i class="pg-mail"></i><span>pg-mail</span></li>
        <li><i class="pg-map"></i><span>pg-map</span></li>
        <li><i class="pg-menu_lv"></i><span>pg-menu_lv</span></li>
        <li><i class="pg-menu"></i><span>pg-menu</span></li>
        <li><i class="pg-movie"></i><span>pg-movie</span></li>
        <li><i class="pg-ordered_list"></i><span>pg-ordered_list</span></li>
        <li><i class="pg-outdent"></i><span>pg-outdent</span></li>
        <li><i class="pg-phone"></i><span>pg-phone</span></li>
        <li><i class="pg-plus"></i><span>pg-plus</span></li>
        <li><i class="pg-power"></i><span>pg-power</span></li>
        <li><i class="pg-printer"></i><span>pg-printer</span></li>
        <li><i class="pg-refresh"></i><span>pg-refresh</span></li>
        <li><i class="pg-resize"></i><span>pg-resize</span></li>
        <li><i class="pg-right_align"></i><span>pg-right_align</span></li>
        <li><i class="pg-save"></i><span>pg-save</span></li>
        <li><i class="pg-search"></i><span>pg-search</span></li>
        <li><i class="pg-sent"></i><span>pg-sent</span></li>
        <li><i class="pg-settings_small_1"></i><span>pg-settings_small_1</span></li>
        <li><i class="pg-settings_small"></i><span>pg-settings_small</span></li>
        <li><i class="pg-settings"></i><span>pg-settings</span></li>
        <li><i class="pg-shopping_cart"></i><span>pg-shopping_cart</span></li>
        <li><i class="pg-social"></i><span>pg-social</span></li>
        <li><i class="pg-spam"></i><span>pg-spam</span></li>
        <li><i class="pg-suitcase"></i><span>pg-suitcase</span></li>
        <li><i class="pg-tables"></i><span>pg-tables</span></li>
        <li><i class="pg-tablet"></i><span>pg-tablet</span></li>
        <li><i class="pg-telephone"></i><span>pg-telephone</span></li>
        <li><i class="pg-text_style"></i><span>pg-text_style</span></li>
        <li><i class="pg-trash_line"></i><span>pg-trash_line</span></li>
        <li><i class="pg-trash"></i><span>pg-trash</span></li>
        <li><i class="pg-ui"></i><span>pg-ui</span></li>
        <li><i class="pg-underline"></i><span>pg-underline</span></li>
        <li><i class="pg-unordered_list"></i><span>pg-unordered_list</span></li>
        <li><i class="pg-video"></i><span>pg-video</span></li>
      </ul>
    </div>
  </section>

  <!-- UI Elements - Font Awesome Icons -->
  <section id="elementsfontawesomeicons" class="scrollspyoffset">
    <h4>Font Awesome Icons</h4>
    <hr>
    <p>Follow these steps to include an icon on to your page </p>
    <h5 class="semi-bold">Step one</h5>
    <p>Check if the following Style sheet is already added inside the <code>&lt;head&gt;</code> tag</p>
    <pre class="prettyprint linenums lang-html">
&lt;link href=&quot;'../assets/plugins/font-awesome/4.7.0/css/font-awesome.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; /&gt;
</pre>
    <h5 class="semi-bold">Step two</h5>
    <p>Place the icon class in a <code>&lt;i&gt;&lt;/i&gt;</code> tag, pages icon prefix class starts with
      <code>fa fa-</code>. To view all classes in Font Awesome go to
      <a href="http://fontawesome.io/icons/" target="_blank">icons example</a> . </p>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <p><i class="fa fa-address-book"></i></p>
    </div>
    <pre class="prettyprint linenums lang-html">
&lt;i class=&quot;fa fa-address-book&quot;&gt;&lt;/i&gt;
</pre>
  </section>

  <!-- UI Elements - Buttons -->
  <section id="elementsbuttons" class="scrollspyoffset">
    <h2 class="text-center">UI Elements - Buttons</h2>
    <hr>

    <h4 class="m-t-50">Colors</h4>
    <hr>
    <p>Pages buttons use the same contextual classes introduced in Bootstrap</p>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <button class="btn btn-primary btn-cons m-b-10">Primary</button>
      <button class="btn btn-success btn-cons m-b-10">Success</button>
      <button class="btn btn-complete btn-cons m-b-10">Complete</button>
      <button class="btn btn-info btn-cons m-b-10">Info</button>
      <button class="btn btn-warning btn-cons m-b-10">Warning</button>
      <button class="btn btn-danger btn-cons m-b-10">Danger</button>
    </div>
    <pre class="prettyprint linenums lang-html">
&lt;button class=&quot;btn btn-primary btn-cons&quot;&gt;Primary&lt;/button&gt;
&lt;button class=&quot;btn btn-success btn-cons&quot;&gt;Success&lt;/button&gt;
&lt;button class=&quot;btn btn-complete btn-cons&quot;&gt;Complete&lt;/button&gt;
&lt;button class=&quot;btn btn-info btn-cons&quot;&gt;Info&lt;/button&gt;
&lt;button class=&quot;btn btn-warning btn-cons&quot;&gt;Warning&lt;/button&gt;
&lt;button class=&quot;btn btn-danger btn-cons&quot;&gt;Danger&lt;/button&gt;
</pre>

    <h4 class="m-t-50">Button animation</h4>
    <hr>
    <p>Content inside a button can be animate on hover. Simply include the classes
      <code>.btn-animated</code> together with <code>.from-top</code> or
      <code>.from-left</code> to specify the animation direction, followed by the desired
      <a href="">icon font</a> class name (ex: <code>fa fa-check</code>)</p>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <button class="btn btn-primary btn-cons btn-animated from-left fa fa-check" type="button">
        <span>Checkbox</span>
      </button>
      <button class="btn btn-primary btn-cons btn-animated from-top pg pg-clock" type="button">
        <span>Clock</span>
      </button>
    </div>
    <pre class="prettyprint linenums lang-html">
&lt;button class=&quot;btn btn-primary btn-animated from-left fa fa-check&quot; type=&quot;button&quot;&gt;
  &lt;span&gt;Checkbox&lt;/span&gt;
&lt;/button&gt;
&lt;button class=&quot;btn btn-primary btn-animated from-top pg pg-clock&quot; type=&quot;button&quot;&gt;
  &lt;span&gt;Clock&lt;/span&gt;
&lt;/button&gt;
</pre>

    <h4 class="m-t-50">Default Dropdown</h4>
    <hr>
    <div class="alert alert-info">
      AngularJS users will have to append <code>pg-dropdown</code> directive to the
      <code>&lt;div class="btn-group dropdown-default"&gt;</code> element
    </div>
    <p>Tired of seeing the standard Bootstrap dropdown? Wrap your dropdown toggle button and dropdown menu within
      <code>.dropdown-default</code> to get a modern and clean feel</p>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <div class="btn-group dropdown-default">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> Dropdown <span class="caret"></span> </a>
        <ul class="dropdown-menu ">
          <li><a href="#">Arial</a>
          </li>
          <li><a href="#">Helvetica</a>
          </li>
          <li><a href="#">SegeoUI</a>
          </li>
        </ul>
      </div>
      <div class="btn-group dropdown-default dropup">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> Dropdown <span class="caret"></span> </a>
        <ul class="dropdown-menu ">
          <li><a href="#">Arial</a>
          </li>
          <li><a href="#">Helvetica</a>
          </li>
          <li><a href="#">SegeoUI</a>
          </li>
        </ul>
      </div>
    </div>
    <pre class="prettyprint linenums lang-html">
&lt;!-- Downside dropdown --&gt;
&lt;div class=&quot;btn-group dropdown-default&quot;&gt;
  &lt;a class=&quot;btn dropdown-toggle&quot; data-toggle=&quot;dropdown&quot; href=&quot;#&quot;&gt; Dropdown
    &lt;span class=&quot;caret&quot;&gt;&lt;/span&gt;
  &lt;/a&gt;
  &lt;ul class=&quot;dropdown-menu &quot;&gt;
    &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Arial&lt;/a&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Helvetica&lt;/a&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;a href=&quot;#&quot;&gt;SegeoUI&lt;/a&gt;
    &lt;/li&gt;
  &lt;/ul&gt;
&lt;/div&gt;

&lt;!-- Upside dropdown --&gt;
&lt;div class=&quot;btn-group dropdown-default dropup&quot;&gt;
  &lt;a class=&quot;btn dropdown-toggle&quot; data-toggle=&quot;dropdown&quot; href=&quot;#&quot;&gt; Dropdown
    &lt;span class=&quot;caret&quot;&gt;&lt;/span&gt;
  &lt;/a&gt;
  &lt;ul class=&quot;dropdown-menu &quot;&gt;
    &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Arial&lt;/a&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Helvetica&lt;/a&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;a href=&quot;#&quot;&gt;SegeoUI&lt;/a&gt;
    &lt;/li&gt;
  &lt;/ul&gt;
&lt;/div&gt;
</pre>

    <h4 class="m-t-50">Tag Options</h4>
    <hr>
    <p>Add <code>.btn-tag</code> followed by <code>.btn-tag-light</code> or
      <code>.btn-tag-dark</code> to have tag options with color variations for buttons. Additionally, rounded tags can be achieved by adding
      <code>.btn-tag-rounded</code></p>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <button class="btn btn-tag  btn-tag-light m-r-20">Link me</button>
      <button class="btn btn-tag  btn-tag-dark">Link me</button>
      <br>
      <br>
      <button class="btn btn-tag   btn-tag-light btn-tag-rounded m-r-20">Link me</button>
      <button class="btn btn-tag   btn-tag-dark btn-tag-rounded">Link me</button>
    </div>
    <pre class="prettyprint linenums lang-html">
&lt;!-- Tag with a light background --&gt;
&lt;button class=&quot;btn btn-tag  btn-tag-light m-r-20&quot;&gt;Link me&lt;/button&gt;

&lt;!-- Tag with a dark background --&gt;
&lt;button class=&quot;btn btn-tag  btn-tag-dark&quot;&gt;Link me&lt;/button&gt;

&lt;!-- Rounded tag with a light background --&gt;
&lt;button class=&quot;btn btn-tag   btn-tag-light btn-tag-rounded m-r-20&quot;&gt;Link me&lt;/button&gt;

&lt;!-- Rounded tag with a dark background --&gt;
&lt;button class=&quot;btn btn-tag   btn-tag-dark btn-tag-rounded&quot;&gt;Link me&lt;/button&gt;
</pre>

    <h4 class="m-t-50">Rounded buttons</h4>
    <hr>
    <p>Any button can be made to have rounded corners by adding <code>.btn-rounded</code></p>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <button class="btn btn-lg btn-rounded m-r-20 m-b-10">Large rounded</button>
      <br>
      <button class="btn btn-rounded m-b-10">Regular</button>
      <br>
      <button class="btn btn-sm btn-rounded">Small</button>
    </div>
    <pre class="prettyprint linenums lang-html">
&lt;!-- Large rounded button --&gt;
&lt;button class=&quot;btn btn-lg btn-rounded&quot;&gt;Large rounded&lt;/button&gt;

&lt;!-- Regular rounded button --&gt;
&lt;button class=&quot;btn btn-rounded&quot;&gt;Regular&lt;/button&gt;

&lt;!-- Small rounded button --&gt;
&lt;button class=&quot;btn btn-sm btn-rounded&quot;&gt;Small&lt;/button&gt;
</pre>

    <div class="well bs-ref m-t-50 clearfix">
      <span class="pull-left">For native Bootstrap button classes </span><a href="http://getbootstrap.com/css/#buttons" target="_blank" class="btn btn-primary pull-right ">Bootstrap Documentation</a>
    </div>

  </section>

  <!-- UI Elements - Create HTML Element -->
  <section id="elementscreate" class="scrollspyoffset">
    <h2 class="text-center">Create HTML Element</h2>
    <hr>

    <h4 class="m-t-50">XXXX</h4>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <p></p>
    </div>
    <pre class="prettyprint linenums lang-html">

</pre>
  </section>

  <!-- UI Elements - Create HTML Element - DOCTYPE html -->
  <section id="elementscreate-doctype" class="scrollspyoffset">
    <h4>DOCTYPE html</h4>
    <hr>
    <p>Create an doctype tag.</p>
    <div class="phpcode">
      <pre class="prettyprint linenums lang-php">
$Html->addDoctype(Arguments: type);
</pre>
    </div>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <p>&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"&gt;</p>
      <p>&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"&gt;</p>
      <p>&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"&gt;</p>
      <p>&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd"&gt;</p>
      <p>&lt;!DOCTYPE html&gt;</p>
      <p>&lt;!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"&gt;</p>
      <p>&lt;!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"&gt;</p>
      <p>&lt;!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd"&gt;</p>
    </div>
    <pre class="prettyprint linenums lang-php">
// returns &lt;!DOCTYPE html PUBLIC ... &gt;
echo $Html-&gt;addDoctype('xhtml11');

// returns &lt;!DOCTYPE html PUBLIC ... &gt;
echo $Html-&gt;addDoctype('xhtml1-strict');

// returns &lt;!DOCTYPE html PUBLIC ... &gt;
echo $Html-&gt;addDoctype('xhtml1-trans');

// returns &lt;!DOCTYPE html PUBLIC ... &gt;
echo $Html-&gt;addDoctype('xhtml1-frame');

// returns &lt;!DOCTYPE html&gt;
echo $Html-&gt;addDoctype('html5');

// returns &lt;!DOCTYPE html PUBLIC ... &gt;
echo $Html-&gt;addDoctype('html4-strict');

// returns &lt;!DOCTYPE html PUBLIC ... &gt;
echo $Html-&gt;addDoctype('html4-trans');

// returns &lt;!DOCTYPE html PUBLIC ... &gt;
echo $Html-&gt;addDoctype('html4-frame');
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - META Tag -->
  <section id="elementscreate-meta" class="scrollspyoffset">
    <h4>META Tag</h4>
    <hr>
    <p>Create meta tag or tags if multi-level array is supplied.</p>
    <div class="phpcode">
      <pre class="prettyprint linenums lang-php">
$Html->addMeta(Arguments: name, content);
</pre>
    </div>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <p>&lt;meta name="description" content="Meta Example!" /&gt;</p>
      <p>&lt;meta name="robots" content="no-cache" /&gt;</p>
      <p>&lt;meta name="robots" content="no-cache" /&gt;</p>
      <p>&lt;meta name="description" content="Meta Example!" /&gt;</p>
      <p>&lt;meta name="keywords" content="fuel, rocks" /&gt;</p>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> addMeta (Arguments: name, content)

// returns &lt;meta name="description" content="Meta Example!" /&gt;
echo $Html->addMeta('description', 'Meta Example!');

// returns &lt;meta name="robots" content="no-cache" /&gt;
echo $Html->addMeta('robots', 'no-cache');

//returns &lt;meta name="robots" content="no-cache" /&gt;
//returns &lt;meta name="description" content="Meta Example!" /&gt;
//returns &lt;meta name="keywords" content="fuel, rocks" /&gt;
$meta = array(
  array('name' => 'robots', 'content' => 'no-cache'),
  array('name' => 'description', 'content' => 'Meta Example'),
  array('name' => 'keywords', 'content' => 'fuel, rocks'),
);

echo $Html->addMeta($meta);
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - STYLESHEET Tag -->
  <section id="elementscreate-stylesheet" class="scrollspyoffset">
    <h4>STYLESHEET Tag</h4>
    <hr>
    <p>Create an stylesheet tag.</p>
    <div class="phpcode">
      <pre class="prettyprint linenums lang-php">
$Html->addStylesheet(Arguments: href, media, optional assoc. array);
</pre>
    </div>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <p>&lt;link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css"&gt;</p>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)

// returns &lt;link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css"&gt;
echo $Html->addStylesheet('assets/plugins/pace/pace-theme-flash.css');
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - SCRIPT Tag -->
  <section id="elementscreate-script" class="scrollspyoffset">
    <h4>SCRIPT Tag</h4>
    <hr>
    <p>Create an script tag.</p>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <p>&lt;script src="https://code.jquery.com/jquery-2.1.1.min.js"&gt;&lt;/script&gt;</p>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> addScript (Arguments: src, optional assoc. array)

// returns &lt;script src="https://code.jquery.com/jquery-2.1.1.min.js"&gt;&lt;/script&gt;
echo $Html->addScript('https://code.jquery.com/jquery-2.1.1.min.js');
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - START - END Tag -->
  <section id="elementscreate-startend" class="scrollspyoffset">
    <h4>START - END Tag</h4>
    <hr>
    <p>Create an HTML tag.</p>
    <div class="phpcode">
      <pre class="prettyprint linenums lang-php">
$Html->startTag(Arguments: tag, optional assoc. array);
$Html->endTag(Arguments: tag);
</pre>
    </div>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <table class="table">
        <thead>
        <tr>
          <th>Code</th>
          <th>Preview</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <code>&lt;strong&gt;Text in tag&lt;/strong&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->startTag('strong') . 'Text in tag' . $Html->endTag('strong');
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <code>&lt;strong style="color:red"&gt;Text in tag&lt;/strong&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->startTag('strong', array('style' => 'color:red')) . 'Text in tag' . $Html->endTag('strong');
            ?>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
// Add Html Element -> endTag (Arguments: tag)

// returns &lt;strong&gt;Text in tag&lt;/strong&gt;
echo $Html->startTag('strong') . 'Text in tag' . $Html->endTag('strong');

// returns &lt;strong style="color:red"&gt;Text in tag&lt;/strong&gt;
echo $Html->startTag('strong', array ('style' => 'color:red')) . 'Text in tag' . $Html->endTag('strong');
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - ANCHOR Tag -->
  <section id="elementscreate-anchor" class="scrollspyoffset">
    <h4>ANCHOR Tag</h4>
    <hr>
    <p>Create an HTML anchor tag.</p>
    <div class="phpcode">
      <pre class="prettyprint linenums lang-php">
$Html->addAnchor(Arguments: href_link, text, id, class, optional assoc. array);
</pre>
    </div>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <table class="table">
        <thead>
        <tr>
          <th class="col-md-10">Code</th>
          <th class="col-md-2">Preview</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <code>&lt;a href="http://www.google.com"&gt;Text in anchor&lt;/a&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addAnchor('http://www.google.com', 'Text in anchor');
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <code>&lt;a href="http://www.google.com" class="plugHelp"&gt;Text in anchor&lt;/a&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addAnchor('http://www.google.com', 'Text in anchor', '', 'plugHelp');
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <code>&lt;a href="http://www.google.com" id="cmshelp" class="plugHelp"&gt;Text in anchor&lt;/a&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addAnchor('http://www.google.com', 'Text in anchor', 'cmshelp', 'plugHelp');
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <code>&lt;a href="http://www.google.com" id="cmshelp" class="plugHelp" style="color:red"&gt;Text in anchor&lt;/a&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addAnchor('http://www.google.com', 'Text in anchor', 'cmshelp', 'plugHelp', array('style' => 'color:red'));
            ?>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)

// returns &lt;a href="http://www.google.com"&gt;Text in anchor&lt;/a&gt;
echo $Html->addAnchor('http://www.google.com', 'Text in anchor');

// returns &lt;a href="http://www.google.com" class="plugHelp"&gt;Text in anchor&lt;/a&gt;
echo $Html->addAnchor('http://www.google.com', 'Text in anchor', '', 'plugHelp');

// returns &lt;a href="http://www.google.com" id="cmshelp" class="plugHelp"&gt;Text in anchor&lt;/a&gt;
echo $Html->addAnchor('http://www.google.com', 'Text in anchor', 'cmshelp', 'plugHelp');

// returns &lt;a href="http://www.google.com" id="cmshelp" class="plugHelp" style="color:red"&gt;Text in anchor&lt;/a&gt;
echo $Html->addAnchor('http://www.google.com', 'Text in anchor', 'cmshelp', 'plugHelp',  array ('style' => 'color:red'));
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - IMAGE Tag -->
  <section id="elementscreate-image" class="scrollspyoffset">
    <h4>IMAGE Tag</h4>
    <hr>
    <p>Create an HTML image tag.</p>
    <div class="phpcode">
      <pre class="prettyprint linenums lang-php">
$Html->addImg(Arguments: src, optional assoc. array);
</pre>
    </div>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <table class="table">
        <thead>
        <tr>
          <th class="col-md-10">Code</th>
          <th class="col-md-2">Preview</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <code>&lt;img src="assets/img/logo.png" alt="image.png" /&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addImg('assets/img/logo.png');
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <code>&lt;img src="assets/img/logo.png" alt="Alt Message" class="myclass" /&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addImg('assets/img/logo.png', array("alt" => "Alt Message", 'class' => "myclass"));
            ?>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> addImg (Arguments: src, optional assoc. array)

// returns &lt;img src="path/to/image.png" alt="image.png" /&gt;
echo $Html->addImg('assets/img/logo.png');

// returns &lt;img src="path/to/image.png" alt="Alt Message" class="myclass" /&gt;
echo $Html->addImg('assets/img/logo.png', array("alt" => "Alt Message", 'class' => "myclass"));
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - BUTTONF Tag -->
  <section id="elementscreate-buttonf" class="scrollspyoffset">
    <h4>BUTTONF Tag</h4>
    <hr>
    <p>Creates an html button element.</p>
    <div class="phpcode">
      <pre class="prettyprint linenums lang-php">
$Html->addButtonF(Arguments: fieldname, value, optional assoc. array);
</pre>
    </div>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <table class="table">
        <thead>
        <tr>
          <th class="col-md-10">Code</th>
          <th class="col-md-2">Preview</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <code>&lt;button type="button" class="btn btn-success" name="subject"&gt;Value&lt;/button&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addButtonF('subject', 'Value', array('type' => 'button', 'class' => 'btn btn-success'));
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <code>&lt;button type="button" class="btn btn-success" style="color:black" name="subject"&gt;Value&lt;/button&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addButtonF('subject', 'Value', array('type' => 'button', 'class' => 'btn btn-success', 'style' => 'color:black'));
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <code>&lt;button type="button" class="btn btn-success" disabled="disabled" name="subject"&gt;Value&lt;/button&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addButtonF('subject', 'Value', array('type' => 'button', 'class' => 'btn btn-success', 'disabled' => 'disabled'));
            ?>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> addButtonF (Arguments: fieldname, value, optional assoc. array)

// returns &lt;button type="button" class="btn btn-success" name="subject"&gt;Value&lt;/button&gt;
echo $Html->addButtonF('subject', 'Value', array('type' => 'button', 'class' => 'btn btn-success'));

// returns &lt;button type="button" class="btn btn-success" style="color:black" name="subject"&gt;Value&lt;/button&gt;
echo $Html->addButtonF('subject', 'Value', array('type' => 'button', 'class' => 'btn btn-success', 'style' => 'color:black'));

// returns &lt;button type="button" class="btn btn-success" disabled="disabled" name="subject"&gt;Value&lt;/button&gt;
echo $Html->addButtonF('subject', 'Value', array('type' => 'button', 'class' => 'btn btn-success', 'disabled' => 'disabled'));
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - BUTTON Tag -->
  <section id="elementscreate-button" class="scrollspyoffset">
    <h4>BUTTON Tag</h4>
    <hr>
    <p>Creates an html button element.</p>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <table class="table">
        <thead>
        <tr>
          <th class="col-md-10">Code</th>
          <th class="col-md-2">Preview</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <code>&lt;button type="button" name="button" class="btn btn-success"&gt;Button&lt;/button&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addButton('button', '', 'Button', 'button', '', 'btn btn-success');
            ?>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)

// returns &lt;button type="button" name="button" class="btn btn-success"&gt;Button&lt;/button&gt;
echo $Html->addButton('button', '', 'Button', 'button', '', 'btn btn-success');
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - SUBMITF BUTTON Tag -->
  <section id="elementscreate-submitf" class="scrollspyoffset">
    <h4>SUBMITF BUTTON Tag</h4>
    <hr>
    <p>Creates an html button element.</p>
    <div class="phpcode">
      <pre class="prettyprint linenums lang-php">
$Html->addSubmitF(Arguments: fieldname, value, optional assoc. array);
</pre>
    </div>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <table class="table">
        <thead>
        <tr>
          <th class="col-md-10">Code</th>
          <th class="col-md-2">Preview</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <code>&lt;button name="submit" value="Submit" type="submit"&gt;Submit&lt;/button&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addSubmitF();
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <code>&lt;button name="submit" value="Submit" id="a1" class="sample" style="color:red" type="submit"&gt;Submit&lt;/button&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addSubmitF('submit', 'Submit', array('id' => 'a1', 'class' => 'sample', 'style' => 'color:red'));
            ?>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> addSubmitF (Arguments: fieldname, value, optional assoc. array)

// returns &lt;button name="submit" value="Submit" type="submit"&gt;Submit&lt;/button&gt;
echo $Html->addSubmitF();

// returns &lt;button name="submit" value="Submit" id="a1" class="sample" style="color:red" type="submit"&gt;Submit&lt;/button&gt;
echo $Html->addSubmitF('submit', 'Submit', array('id' => 'a1', 'class' => 'sample', 'style' => 'color:red'));
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - SUBMIT BUTTON Tag -->
  <section id="elementscreate-submit" class="scrollspyoffset">
    <h4>SUBMIT BUTTON Tag</h4>
    <hr>
    <p>Creates an html button element.</p>
    <div class="phpcode">
      <pre class="prettyprint linenums lang-php">
$Html->addButtonSubmit(Arguments: name, value, id, class, optional assoc. array);
</pre>
    </div>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <table class="table">
        <thead>
        <tr>
          <th class="col-md-10">Code</th>
          <th class="col-md-2">Preview</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <code>&lt;button type="submit" name="submit"&gt;Submit&lt;/button&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addButtonSubmit();
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <code>&lt;button type="submit" name="save" class="btn btn-success"&gt;&lt;i class="fa fa-save m-r-5"&gt;&lt;/i&gt; Submit&lt;/button&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i> Submit', '', 'btn btn-success');
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <code>&lt;button type="submit" name="save" class="btn btn-success" style="color:red"&gt;&lt;i class="fa fa-save m-r-5"&gt;&lt;/i&gt; Submit&lt;/button&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i> Submit', '', 'btn btn-success', array('style' => 'color:red'));
            ?>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)

// returns &lt;button type="submit" name="submit"&gt;Submit&lt;/button&gt;
echo $Html->addButtonSubmit();

// returns &lt;button type="submit" name="save" class="btn btn-success"&gt;&lt;i class="fa fa-save m-r-5"&gt;&lt;/i&gt; Submit&lt;/button&gt;
echo $Html->addButtonSubmit('save', '&lt;i class="fa fa-save m-r-5"&gt;&lt;/i&gt; Submit', '', 'btn btn-success');

// returns &lt;button type="submit" name="save" class="btn btn-success" style="color:red"&gt;&lt;i class="fa fa-save m-r-5"&gt;&lt;/i&gt; Submit&lt;/button&gt;
echo $Html->addButtonSubmit('save', '&lt;i class="fa fa-save m-r-5"&gt;&lt;/i&gt; Submit', '', 'btn btn-success', array('style' => 'color:red'));
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - TEXTAREAF Tag -->
  <section id="elementscreate-textareaf" class="scrollspyoffset">
    <h4>TEXTAREAF Tag</h4>
    <hr>
    <p>Creates an html textarea element.</p>
    <div class="phpcode">
      <pre class="prettyprint linenums lang-php">
$Html->addTextareaF(Arguments: fieldname, value, optional assoc. array);
</pre>
    </div>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <table class="table">
        <thead>
        <tr>
          <th class="col-md-9">Code</th>
          <th class="col-md-3">Preview</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <code>&lt;textarea rows="4" cols="12" name="editor"&gt;Text for textarea&lt;/textarea&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addTextareaF('editor', 'Text for textarea', array('rows' => 4, 'cols' => 12));
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <code>&lt;textarea id="editor" class="form-control" maxlength="400" name="editor"&gt;Text for textarea&lt;/textarea&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addTextareaF('editor', 'Text for textarea', array('id' => 'editor', 'class' => 'form-control', 'maxlength' => '400'));
            ?>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> addTextareaF (Arguments: fieldname, value, optional assoc. array)

//returns &lt;textarea rows="4" cols="12" name="editor"&gt;Text for textarea&lt;/textarea&gt;
echo $Html->addTextareaF('editor', 'Text for textarea', array('rows' => 4, 'cols' => 12));

//returns &lt;textarea id="editor" class="form-control" maxlength="400" name="editor"&gt;Text for textarea&lt;/textarea&gt;
echo $Html->addTextareaF('editor', 'Text for textarea', array('id' => 'editor', 'class' => 'form-control', 'maxlength' => '400'));
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - TEXTAREA Tag -->
  <section id="elementscreate-textarea" class="scrollspyoffset">
    <h4>TEXTAREA Tag</h4>
    <hr>
    <p>Creates an html textarea element.</p>
    <div class="phpcode">
      <pre class="prettyprint linenums lang-php">
$Html->addTextarea(Arguments: name, value, rows, cols, optional assoc. array);
</pre>
    </div>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <table class="table">
        <thead>
        <tr>
          <th class="col-md-10">Code</th>
          <th class="col-md-2">Preview</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <code>&lt;textarea name="content"&gt;Text for textarea&lt;/textarea&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addTextarea('content', 'Text for textarea');
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <code>&lt;textarea name="content" id="editor" class="form-control"&gt;Text for textarea&lt;/textarea&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addTextarea('content', 'Text for textarea', '', '', array('id' => 'editor', 'class' => 'form-control'));
            ?>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)

// returns &lt;textarea name="content"&gt;Text for textarea&lt;/textarea&gt;
echo $Html->addTextarea('content', 'Text for textarea');

// returns &lt;textarea name="content" id="editor" class="form-control"&gt;Text for textarea&lt;/textarea&gt;
echo $Html->addTextarea('content', 'Text for textarea', '', '', array('id' => 'editor', 'class' => 'form-control'));
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - LABELF and RADIOF BUTTON Tag -->
  <section id="elementscreate-radiof" class="scrollspyoffset">
    <h4>LABELF and RADIOF BUTTON Tag</h4>
    <hr>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <table class="table">
        <thead>
        <tr>
          <th class="col-md-10">Code</th>
          <th class="col-md-2">Preview</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <code>&lt;input name="gender" value="Female" id="gender1" type="radio"&gt;</code><br>
            <code>&lt;label for="gender1"&gt;Male&lt;/label&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addRadioF('gender', 'Female', 'gender1');
            echo $Html->addLabelF('Male', 'gender1');
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <code>&lt;input name="gender" value="Male" checked="checked" id="gender2" type="radio"&gt;</code><br>
            <code>&lt;label for="gender2"&gt;Female&lt;/label&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addRadioF('gender', 'Male', 'gender2', TRUE);
            echo $Html->addLabelF('Female', 'gender2');
            ?>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> addLabelF (Arguments: label, id, optional assoc. array)
// Add Html Element -> addRadioF (Arguments: fieldname, value, id, checked, optional assoc. array)

// returns
// &lt;label for="gender1"&gt;Male&lt;/label&gt;
// &lt;input name="gender" value="Female" id="gender1" type="radio"&gt;
echo $Html->addLabelF('Male', 'gender1');
echo $Html->addRadioF('gender', 'Female','gender1');

// returns
// &lt;label for="gender2"&gt;Female&lt;/label&gt;
// &lt;input name="gender" value="Male" checked="checked" id="gender2" type="radio"&gt;
echo $Html->addLabelF('Female', 'gender2');
echo $Html->addRadioF('gender', 'Male', 'gender2', true);
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - LABELF and CHECKBOXF BUTTON Tag -->
  <section id="elementscdreate-checkboxf" class="scrollspyoffset">
    <h4>LABELF and CHECKBOXF BUTTON Tag</h4>
    <hr>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <table class="table">
        <thead>
        <tr>
          <th class="col-md-10">Code</th>
          <th class="col-md-2">Preview</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <code>&lt;input name=&quot;gender&quot; value=&quot;Male&quot; id=&quot;gender3&quot; type=&quot;checkbox&quot;&gt;</code><br>
            <code>&lt;label for=&quot;gender3&quot;&gt;Male&lt;/label&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addCheckboxF('gender', 'Male', 'gender3');
            echo $Html->addLabelF('Male', 'gender3');
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <code>&lt;input name=&quot;gender&quot; value=&quot;Female&quot; checked=&quot;checked&quot; id=&quot;gender4&quot; type=&quot;checkbox&quot;&gt;</code><br>
            <code>&lt;label for=&quot;gender4&quot;&gt;Female&lt;/label&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addCheckboxF('gender', 'Female', 'gender4', TRUE);
            echo $Html->addLabelF('Female', 'gender4');
            ?>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> addLabelF (Arguments: label, id, optional assoc. array)
// Add Html Element -> addCheckboxF (Arguments: fieldname, value, id, checked, optional assoc. array)

// returns
// &lt;label for=&quot;gender3&quot;&gt;Male&lt;/label&gt;
// &lt;input name=&quot;gender&quot; value=&quot;Male&quot; id=&quot;gender3&quot; type=&quot;checkbox&quot;&gt;
echo $Html->addLabelF('Male', 'gender3');
echo $Html->addCheckboxF('gender', 'Male', 'gender3');

// returns
// &lt;label for=&quot;gender4&quot;&gt;Female&lt;/label&gt;
// &lt;input name=&quot;gender&quot; value=&quot;Female&quot; checked=&quot;checked&quot; id=&quot;gender4&quot; type=&quot;checkbox&quot;&gt;
echo $Html->addLabelF('Female', 'gender4');
echo $Html->addCheckboxF('gender', 'Female', 'gender4', true);
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - LABEL and RADIO BUTTON Tag -->
  <section id="elementscdreate-radio" class="scrollspyoffset">
    <h4>LABEL and RADIO BUTTON Tag</h4>
    <hr>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <table class="table">
        <thead>
        <tr>
          <th class="col-md-10">Code</th>
          <th class="col-md-2">Preview</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <code>&lt;input name=&quot;gender&quot; id=&quot;gender5&quot; value=&quot;Female&quot; checked=&quot;checked&quot; type=&quot;radio&quot;&gt;</code><br>
            <code>&lt;label for=&quot;gender5&quot;&gt;Female&lt;/label&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addRadio('gender', 'Female', TRUE, 'gender5');
            echo $Html->addLabel('gender5', 'Female');
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <code>&lt;input name=&quot;gender&quot; id=&quot;gender6&quot; value=&quot;Male&quot; type=&quot;radio&quot;&gt;</code><br>
            <code>&lt;label for=&quot;gender6&quot;&gt;Male&lt;/label&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addRadio('gender', 'Male', '', 'gender6');
            echo $Html->addLabel('gender6', 'Male');
            ?>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
// Add Html Element -> addRadio (Arguments: name, value, checked, id, class, optional assoc. array)

// returns
// &lt;label for=&quot;gender5&quot;&gt;Female&lt;/label&gt;
// &lt;input name=&quot;gender&quot; id=&quot;gender5&quot; value=&quot;Female&quot; checked=&quot;checked&quot; type=&quot;radio&quot;&gt;
echo $Html->addLabel('gender5', 'Female');
echo $Html->addRadio('gender', 'Female', true, 'gender5');

// returns
// &lt;label for=&quot;gender6&quot;&gt;Male&lt;/label&gt;
// &lt;input name=&quot;gender&quot; id=&quot;gender6&quot; value=&quot;Male&quot; type=&quot;radio&quot;&gt;
echo $Html->addLabel('gender6', 'Male');
echo $Html->addRadio('gender', 'Male', '', 'gender6');
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - LABEL and CHECKBOX BUTTON Tag -->
  <section id="elementscdreate-checkbox" class="scrollspyoffset">
    <h4>LABEL and CHECKBOX BUTTON Tag</h4>
    <hr>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <table class="table">
        <thead>
        <tr>
          <th class="col-md-10">Code</th>
          <th class="col-md-2">Preview</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <code>&lt;input name=&quot;gender&quot; id=&quot;gender7&quot; value=&quot;Female&quot; checked=&quot;checked&quot; type=&quot;checkbox&quot;&gt;</code><br>
            <code>&lt;label for=&quot;gender7&quot;&gt;Female&lt;/label&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addCheckbox('gender', 'Female', TRUE, 'gender7');
            echo $Html->addLabel('gender7', 'Female');
            ?>
          </td>
        </tr>
        <tr>
          <td>
            <code>&lt;input name=&quot;gender&quot; id=&quot;gender8&quot; value=&quot;Male&quot; type=&quot;checkbox&quot;&gt;</code><br>
            <code>&lt;label for=&quot;gender8&quot;&gt;Male&lt;/label&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addCheckbox('gender', 'Male', '', 'gender8');
            echo $Html->addLabel('gender8', 'Male');
            ?>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)

// returns
// &lt;label for=&quot;gender7&quot;&gt;Female&lt;/label&gt;
// &lt;input name=&quot;gender&quot; id=&quot;gender7&quot; value=&quot;Female&quot; checked=&quot;checked&quot; type=&quot;checkbox&quot;&gt;
echo $Html->addLabel('gender7', 'Female');
echo $Html->addCheckbox('gender', 'Female', true, 'gender7');

// returns
// &lt;label for=&quot;gender8&quot;&gt;Male&lt;/label&gt;
// &lt;input name=&quot;gender&quot; id=&quot;gender8&quot; value=&quot;Male&quot; type=&quot;checkbox&quot;&gt;
echo $Html->addLabel('gender8', 'Male');
echo $Html->addCheckbox('gender', 'Male', '', 'gender8');
</pre>
  </section>

  <!-- UI Elements - Create HTML Element - INPUT Tag -->
  <section id="elementscdreate-input" class="scrollspyoffset">
    <h4>INPUT Tag</h4>
    <hr>
    <div class="phpcode">
      <pre class="prettyprint linenums lang-php">
$Html->addInput(Arguments: type, name, value, id, class, optional assoc. array);
</pre>
    </div>
    <table class="parameters">
      <thead>
      <tr>
        <th>Arguments</th>
        <th>Default</th>
        <th class="description">Description</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <th><kbd>$type</kbd></th>
        <td><i>Required</i></td>
        <td></td>
      </tr>
      <tr>
        <th><kbd>$name</kbd></th>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th><kbd>$value</kbd></th>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th><kbd>$id</kbd></th>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th><kbd>$class</kbd></th>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th><kbd>$optional assoc. array</kbd></th>
        <td>array()</td>
        <td>These will be used as html tag properties.</td>
      </tr>
      </tbody>
    </table>
    <div class="example">
      <p class="all-caps fs-12 bold">Example :</p>
      <table class="table">
        <thead>
        <tr>
          <th class="col-md-10">Code</th>
          <th class="col-md-2">Preview</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <code>&lt;input name=&quot;text&quot; id=&quot;text&quot; value=&quot;Text for textinput&quot; type=&quot;text&quot;&gt;</code>
          </td>
          <td>
            <?php
            echo $Html->addInput('text', 'text', 'Text for textinput');
            ?>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <pre class="prettyprint linenums lang-php">
// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)

// returns &lt;input name=&quot;text&quot; id=&quot;text&quot; value=&quot;Text for textinput&quot; type=&quot;text&quot;&gt;
echo $Html->addInput('text', 'text', 'Text for textinput');
</pre>
  </section>

  <!-- Plugins -->
  <section id="plugins" class="scrollspyoffset">
    <h2 class="text-center">Plugins</h2>
    <hr>

  </section>

  <!-- Plugins - Below Header -->
  <section id="pluginbelowheader" class="scrollspyoffset">
    <h2 class="text-center">Below Header</h2>
    <hr>

  </section>

  <!-- Plugins - Blog -->
  <section id="pluginblog" class="scrollspyoffset">
    <h2 class="text-center">Blog</h2>
    <hr>

  </section>

  <!-- Plugins - Download -->
  <section id="plugindownload" class="scrollspyoffset">
    <h2 class="text-center">Download</h2>
    <hr>

  </section>

  <!-- Plugins - FAQ -->
  <section id="pluginfaq" class="scrollspyoffset">
    <h2 class="text-center">FAQ</h2>
    <hr>

  </section>

  <!-- Plugins - Growl -->
  <section id="plugingrowl" class="scrollspyoffset">
    <h2 class="text-center">Growl</h2>
    <hr>

  </section>

  <!-- Plugins - Newsletter -->
  <section id="pluginnewsletter" class="scrollspyoffset">
    <h2 class="text-center">Newsletter</h2>
    <hr>

  </section>

  <!-- Plugins - Open URL -->
  <section id="pluginopenurl" class="scrollspyoffset">
    <h2 class="text-center">Open URL</h2>
    <hr>
    <p>The plugin
      <strong>Open URL</strong> will add a tiny javascript code to open all external URL's in a new page/tab. That is better for SEO and easier for the administrator.
    </p>
    <p>The javascript code is as follow:</p>
    <pre class="prettyprint linenums lang-php">
$("a[href^='http']:not([href^=''])")
  .attr({
    target: "_blank"
  })
});
</pre>
  </section>

  <!-- Plugins - Register Form -->
  <section id="pluginregisterform" class="scrollspyoffset">
    <h2 class="text-center">Register Form</h2>
    <hr>

  </section>

  <!-- Plugins - Site Editor -->
  <section id="pluginsiteeditor" class="scrollspyoffset">
    <h2 class="text-center">Site Editor</h2>
    <hr>

  </section>

  <!-- Plugins - URL Mapping -->
  <section id="pluginurlmapping" class="scrollspyoffset">
    <h2 class="text-center">URL Mapping</h2>
    <hr>
    <p>This plugin will simply forward the client from the old to the new url with the appropriate header. Create and manage your changed URL's easily via your administration panel.</p>
  </section>

  <!-- Plugins - XML Seo -->
  <section id="pluginxmlseo" class="scrollspyoffset">
    <h2 class="text-center">XML Seo</h2>
    <hr>

  </section>

  <!-- Hooks -->
  <section id="hooks" class="scrollspyoffset">
    <h2 class="text-center">Hooks</h2>
    <hr>

  </section>

  <!-- Hooks - Hook: php_search -->
  <section id="php_search" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_search</h2>
    <hr>
    <p>Use this hook to execute PHP code in the search.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
if ($SearchInput) { echo "Your search term: ".$SearchInput; }
</pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: php_tags -->
  <section id="php_tags" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_tags</h2>
    <hr>
    <p>Use this hook to execute PHP code in the tags.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
if ($cleanTag) { echo "Your tag: ".$cleanTag; }
</pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: php_sitemap -->
  <section id="php_sitemap" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_sitemap</h2>
    <hr>
    <p>Use this hook to execute PHP code in the sitemap.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
if ($cat) { echo "Categories: ".$cat; }
</pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: php_index_top -->
  <section id="php_index_top" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_index_top</h2>
    <hr>
    <p>Use this hook to execute PHP code in the index.php file before anything else.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
define('MY_VAR', "cool");
</pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: php_rss -->
  <section id="php_rss" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_rss</h2>
    <hr>
    <p>Use this hook to execute PHP code in the rss.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
if ($displayRSS) { echo "My RSS: ".$displayRSS; }
</pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: php_index_bottom -->
  <section id="php_index_bottom" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_index_bottom</h2>
    <hr>
    <p>Use this hook to execute PHP code at the very end in the index.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
if (isset($page3)) { echo "CMS is ready..."; } else { echo "CMS is always ready..."; }
</pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: php_index_page -->
  <section id="php_index_page" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_index_page</h2>
    <hr>
    <p>Use this hook to execute PHP code in the index.php file between the page.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
// Confirm user
if ($page == 'rf_ual') {
  if (is_numeric($page1) && is_numeric($page2) && envo_row_exist($page1, DB_PREFIX.'user') && envo_field_not_exist($page2, DB_PREFIX.'user', 'activatenr')) {

    $result = $envodb->query('UPDATE '.DB_PREFIX.'user SET access = access - 1, activatenr = 0 WHERE id = "'.smartsql($page1).'" AND activatenr = "'.smartsql($page2).'"');

   	if (!$result) {
   		envo_redirect(ENVO_PARSE_ERROR);
   		exit;
   	} else {

   		$userlink = BASE_URL.'admin/index.php?p=users&sp=edit&ssp='.$page1;

   		$admail = new PHPMailer();
   		$adlinkmessage = $tl['xxxxx']['yyyyy'].$userlink;
   		$adbody = str_ireplace("[]",'',$adlinkmessage);
   		$admail->SetFrom(ENVO_EMAIL, ENVO_TITLE);
   		$admail->AddAddress(ENVO_EMAIL, ENVO_TITLE);
   		$admail->Subject = ENVO_TITLE.' - '.$tl['xxxxx']['yyyyy'];
   		$admail->MsgHTML($adbody);
   		$admail->Send(); // Send email without any warnings

   		envo_redirect(ENVO_PARSE_SUCCESS);
   		exit;
   	}
  } else {
    envo_redirect(BASE_URL);
    exit;
  }
}
</pre>
  </section>

  <!-- Hooks - Hook: php_lang -->
  <section id="php_lang" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_lang</h2>
    <hr>
    <p>Use this hook to execute PHP language code in the index.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
if (file_exists(APP_PATH.'plugins/yourplugin/lang/'.$jkv["lang"].'.ini')) {
  $tlt = parse_ini_file(APP_PATH.'plugins/yourplugin/lang/'.$jkv["lang"].'.ini', true);
} else {
  $tlt = parse_ini_file(APP_PATH.'plugins/yourplugin/lang/en.ini', true);
}
</pre>
  </section>

  <!-- Hooks - Hook: php_pages_news -->
  <section id="php_pages_news" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_pages_news</h2>
    <hr>
    <p>Use this hook to execute PHP code in the index.php and news.php file. This hook is used in pages and news, the same php code will be executed.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
if (!empty($PAGE_ACTIVE)) { $myplugin = 1; }
</pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: php_admin_usergroup -->
  <section id="php_admin_usergroup" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_admin_usergroup</h2>
    <hr>
    <p>Use this hook to execute PHP code in the admin/usergroup.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
if (isset($defaults['envo_download'])) {
	$insert .= 'download = "'.$defaults['envo_download'].'", downloadpost = "'.$defaults['envo_downloadpost'].'", downloadpostapprove = "'.$defaults['envo_downloadpostapprove'].'", downloadpostdelete = "'.$defaults['envo_downloadpostdelete'].'", downloadrate = "'.$defaults['envo_downloadrate'].'", downloadmoderate = "'.$defaults['envo_downloadmoderate'].'",'; }
</pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: php_admin_user_rename -->
  <section id="php_admin_user_rename" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_admin_user_rename</h2>
    <hr>
    <p>Use this hook to execute PHP code in the admin/users.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
$envodb->query('UPDATE '.DB_PREFIX.'faqcomments SET username = "'.smartsql($defaults['envo_username']).'" WHERE userid = '.smartsql($page2).'');
</pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: php_admin_user_delete -->
  <section id="php_admin_user_delete" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_admin_user_delete</h2>
    <hr>
    <p>Use this hook to execute PHP code in the admin/users.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
$envodb->query('UPDATE '.DB_PREFIX.'faqcomments SET userid = 0 WHERE userid = '.$page2.'');
</pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: php_admin_user_delete_mass -->
  <section id="php_admin_user_delete_mass" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_admin_user_delete_mass</h2>
    <hr>
    <p>Use this hook to execute PHP code in the admin/users.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
$envodb->query('UPDATE '.DB_PREFIX.'faqcomments SET userid = 0 WHERE userid = '.$page2.'');
</pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: php_admin_lang -->
  <section id="php_admin_lang" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_admin_lang</h2>
    <hr>
    <p>Use this hook to execute PHP language code in the admin/index.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
if (file_exists(APP_PATH.'plugins/yourplugin../assets/lang/'.$jkv["lang"].'.ini')) {
  $tld = parse_ini_file(APP_PATH.'plugins/yourplugin../assets/lang/'.$jkv["lang"].'.ini', true);
} else {
  $tld = parse_ini_file(APP_PATH.'plugins/yourplugin../assets/lang/en.ini', true);
}
</pre>
  </section>

  <!-- Hooks - Hook: php_admin_setting -->
  <section id="php_admin_setting" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_admin_setting</h2>
    <hr>
    <p>Use this hook to execute PHP code in the admin/setting.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
$plugin_setting = "working...";
</pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: php_admin_setting_post -->
  <section id="php_admin_setting_post" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_admin_setting_post</h2>
    <hr>
    <p>Use this hook to execute PHP code in the admin/setting.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
if ($defaults['envo_lang'] == '') { $errors['e6'] = $tl['general_error']['generror']; }
</pre>
  </section>

  <!-- Hooks - Hook: php_admin_user -->
  <section id="php_admin_user" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_admin_user</h2>
    <hr>
    <p>Use this hook to execute PHP code in the admin/users.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
$plugin_user = "Display stuff when showing user in admin";
</pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: php_admin_user_edit -->
  <section id="php_admin_user_edit" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_admin_user_edit</h2>
    <hr>
    <p>Use this hook to execute PHP code in the admin/users.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
$plugin_user_edit = "Display stuff when edit user";
</pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: php_admin_index -->
  <section id="php_admin_index" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_admin_index</h2>
    <hr>
    <p>Use this hook to execute PHP code in the admin/index.php file. This hook is located when you open the administration panel.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
$ENVO_CMS_VERSION = $envonewversion;
$ENVO_CMS_NEWS = $envonewnews;
</pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: php_admin_fulltext_add -->
  <section id="php_admin_fulltext_add" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_admin_fulltext_add</h2>
    <hr>
    <p>Use this hook to execute PHP code in the admin/setting.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
$envodb->query('ALTER TABLE '.DB_PREFIX.'pages ADD FULLTEXT(`title`, `content`)');
</pre>
  </section>

  <!-- Hooks - Hook: php_admin_fulltext_remove -->
  <section id="php_admin_fulltext_remove" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_admin_fulltext_remove</h2>
    <hr>
    <p>Use this hook to execute PHP code in the admin/setting.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
$envodb->query('ALTER TABLE '.DB_PREFIX.'pages DROP INDEX `title`');
</pre>
  </section>

  <!-- Hooks - Hook: php_admin_pages_sql -->
  <section id="php_admin_pages_sql" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_admin_pages_sql</h2>
    <hr>
    <p>Use this hook to execute PHP code in the admin/page.php file on two locations. This hook is located when edit or create a new page.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
if (empty($news) && !empty($defaults['envo_shownewsmany'])) {
  $insert .= $defaults['envo_showorder'];
}
</pre>
  </section>

  <!-- Hooks - Hook: php_admin_news_sql -->
  <section id="php_admin_news_sql" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_admin_news_sql</h2>
    <hr>
    <p>Use this hook to execute PHP code in the admin/news.php file on two locations. This hook is located when edit or create a new news.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
if (empty($news) && !empty($defaults['envo_shownewsmany'])) {
  $insert .= $defaults['envo_showorder'];
}
</pre>
  </section>

  <!-- Hooks - Hook: php_admin_pages_news_info -->
  <section id="php_admin_pages_news_info" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_admin_pages_news_info</h2>
    <hr>
    <p>Use this hook to execute PHP code in the admin/page.php and admin/news.php file.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
$ENVO_GET_TICKETING = envo_get_page_info(DB_PREFIX.'tickets', '');
</pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: php_admin_widgets_sql -->
  <section id="php_admin_widgets_sql" class="scrollspyoffset">
    <h2 class="text-center">Hook: php_admin_widgets_sql</h2>
    <hr>
    <p>This hook enables to fire some sql in the admin widgets section.</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
$getpoll = $ENVO_GET_POLL = envo_get_page_info(DB_PREFIX.'polls', '');
 </pre>

    <p>If you like to include a file:</p>
    <pre class="prettyprint linenums lang-php">
APP_PATH . 'plugins/yourplugin/file_to_include.php';
</pre>
  </section>

  <!-- Hooks - Hook: tpl_body_top -->
  <section id="tpl_body_top" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_body_top</h2>
    <hr>
    <p>You can include a file on the very top in the template. This hook is located between theand the very first</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/body_top.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_between_head -->
  <section id="tpl_between_head" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_between_head</h2>
    <hr>
    <p>This hook is located between thetag.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/css.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_header -->
  <section id="tpl_header" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_header</h2>
    <hr>
    <p>This hook is located in between the header, display advertising, buttons or whatever you like next to the logo.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/css.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_below_header -->
  <section id="tpl_below_header" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_below_header</h2>
    <hr>
    <p>This hook is located below the header, display advertising, buttons or whatever you like below the navigation and logo.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/advert.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_sidebar -->
  <section id="tpl_sidebar" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_sidebar</h2>
    <hr>
    <p>This hook is in the sidebar and does work together with the grid/widget system, display advertising, buttons or whatever you like in the sidebar.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/sidebar.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_page -->
  <section id="tpl_page" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_page</h2>
    <hr>
    <p>This hook is located in template/yourtemplate/page.php and will be executed between title and content.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/page.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_footer -->
  <section id="tpl_footer" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_footer</h2>
    <hr>
    <p>This hook is located in template/yourtemplate/footer.php and will be executed at the very beginning in the footer template.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/footer.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_footer_end -->
  <section id="tpl_footer_end" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_footer_end</h2>
    <hr>
    <p>This hook is located in template/yourtemplate/footer.php and will be executed at the very end just before the tag.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/end.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_tags -->
  <section id="tpl_tags" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_tags</h2>
    <hr>
    <p>This hook is located in template/yourtemplate/tags.php and will be executed to display your plugin tags.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/tags.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_sitemap -->
  <section id="tpl_sitemap" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_sitemap</h2>
    <hr>
    <p>This hook is located in template/yourtemplate/sitemap.php and will be executed to display your plugin sitemap list.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/sitemap.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_search -->
  <section id="tpl_search" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_search</h2>
    <hr>
    <p>This hook is located in template/yourtemplate/search.php and will be executed to display your plugin search result.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/mysearchresult.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_page_news_grid -->
  <section id="tpl_page_news_grid" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_page_news_grid</h2>
    <hr>
    <p>This hook is located in template/yourtemplate/page.php / template/yourtemplate/newsart.php and will be executed to display your plugin grid result.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
if ($pg['pluginid'] == ENVO_PLUGIN_ID_FAQ && ENVO_PLUGIN_ID_FAQ && !empty($row['showfaq'])) {

  include_once APP_PATH.'plugins/faq/functions.php';

  $showfaqarray = explode(":", $row['showfaq']);

  if (is_array($showfaqarray) && in_array("ASC", $showfaqarray) || in_array("DESC", $showfaqarray)) {
    $ENVO_FAQ = envo_get_faq('LIMIT '.$showfaqarray[1], 't1.id '.$showfaqarray[0], '', 't1.id');
  } else {
    $ENVO_FAQ = envo_get_faq('', 't1.id ASC', $row['showfaq'], 't1.id');
  }

}
</pre>
  </section>

  <!-- Hooks - Hook: tpl_admin_usergroup_edit -->
  <section id="tpl_admin_usergroup_edit" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_admin_usergroup_edit</h2>
    <hr>
    <p>This hook is located in admin/template/editusergroup.php and will be executed to display your plugin user-group permission.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/usergroup_edit.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_admin_usergroup -->
  <section id="tpl_admin_usergroup" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_admin_usergroup</h2>
    <hr>
    <p>This hook is located in admin/template/editusergroup.php and will be executed to display your plugin user-group permission.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/usergroup_new.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_admin_setting -->
  <section id="tpl_admin_setting" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_admin_setting</h2>
    <hr>
    <p>This hook is located in admin/template/setting.php and will be executed to display your plugin settings.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/my_setting.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_admin_head -->
  <section id="tpl_admin_head" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_admin_head</h2>
    <hr>
    <p>This hook is located in admin/template/header.php and will be executed for your css or javascript files needed for your plugin.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/my_css_javascript.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_admin_footer -->
  <section id="tpl_admin_footer" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_admin_footer</h2>
    <hr>
    <p>This hook is located in admin/template/footer.php and will be executed at the very end just before the tag.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/my_copyright.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_admin_page_news -->
  <section id="tpl_admin_page_news" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_admin_page_news</h2>
    <hr>
    <p>This hook is located in admin/template/footer.php and will work together with the grid system, you can use PHP and HTML code.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
if ($pg['pluginid'] == ENVO_PLUGIN_FAQ) {
  include_once APP_PATH.'plugins/faq../assets/template/faq_connect.php';
}
</pre>
  </section>

  <!-- Hooks - Hook: tpl_admin_page_news_new -->
  <section id="tpl_admin_page_news_new" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_admin_page_news_new</h2>
    <hr>
    <p>This hook is located in admin/template/footer.php and will be executed to display new plugin stuff in the grid system.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/faq../assets/template/connect_new.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_admin_user -->
  <section id="tpl_admin_user" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_admin_user</h2>
    <hr>
    <p>This hook is located in admin/template/newuser.php.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/more_user_information.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_admin_user_edit -->
  <section id="tpl_admin_user_edit" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_admin_user_edit</h2>
    <hr>
    <p>This hook is located in admin/template/edituser.php.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/more_user_information_edit.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_admin_index -->
  <section id="tpl_admin_index" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_admin_index</h2>
    <hr>
    <p>This hook is located in admin/template/index.php and is made for displaying news about your plugin.</p>

    <p>You can include a file, for example:</p>
    <pre class="prettyprint linenums lang-php">
plugins/yourplugin/template/news_on_index.php
</pre>
  </section>

  <!-- Hooks - Hook: tpl_footer_widgets -->
  <section id="tpl_footer_widgets" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_footer_widgets</h2>
    <hr>
    <p>Place some widgets dynamically in the footer. This is an example how igrid used this hook:</p>

    <p class="all-caps fs-12 bold">For example :</p>
    <pre class="prettyprint linenums lang-php">
if (is_numeric(ENVO_BCONTENT1_IGRID_TPL)) {
  if (isset($ENVO_HOOK_FOOTER_WIDGET) && is_array($ENVO_HOOK_FOOTER_WIDGET)) foreach($ENVO_HOOK_FOOTER_WIDGET as $hfw) {
    if ($hfw["id"] == ENVO_BCONTENT1_IGRID_TPL) {
      include_once $hfw["phpcode"];
    }
  }
} else {
  echo ENVO_BCONTENT1_IGRID_TPL;
}
</pre>
  </section>

  <!-- Hooks - Hook: tpl_below_content -->
  <section id="tpl_below_content" class="scrollspyoffset">
    <h2 class="text-center">Hook: tpl_below_content</h2>
    <hr>
    <p>This is the brother from the below_header hook. You can close some divs or add some extra stuff that doesn't fit in the main section.</p>
  </section>

  <!-- XXXX -->
  <section id="XXX" class="scrollspyoffset">
    <h2 class="text-center">XXXX</h2>
    <hr>

  </section>
</div>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
