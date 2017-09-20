<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <title>Blog Plugin Dokumentace</title>

  <!-- ======= FONTS ======= -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&subset=latin-ext" rel="stylesheet">

  <!-- ======= CSS STYLE ======= -->
  <!-- Code-prettify -->
  <link href="/admin/assets/plugins/code-prettify-master/themes/github/github.css" rel="stylesheet" type="text/css"/>
  <script src="/admin/assets/plugins/code-prettify-master/src/prettify.js"></script>
  <!-- Main style -->
  <link rel="stylesheet" href="/admin/assets/doc/css/doc.css">


  <!--[if lt IE 9]>
  <script src="/admin/assets/doc/js/html5.js"></script>
  <![endif]-->

</head>
<body>

<header>
  <h1>Nápověda - Plugin Blog</h1>
  <div class="clear"></div>
</header>

<nav id="subnav">
  <h3>Obsah</h3>
  <h3>Aktuální kapitola: <span id="curnav" class="light"> O Pluginu </span></h3>
</nav>

<aside>
  <nav>
    <ul id="sidebar">
      <li class="active">
        <span>O Pluginu</span>
        <ul>
          <li data-deeplink="about-plugin" class="active">O Pluginu</li>
          <li data-deeplink="folders-files">Složky-Soubory</li>
          <li data-deeplink="changelog">Changelog</li>
        </ul>
      </li>
      <li>
        <span>Hooks</span>
        <ul>
          <li data-deeplink="php_rss">Hook: php_rss</li>
          <li data-deeplink="php_admin_fulltext_add">Hook: php_admin_fulltext_add</li>
          <li data-deeplink="php_admin_fulltext_remove">Hook: php_admin_fulltext_remove</li>
          <li data-deeplink="php_admin_pages_sql">Hook: php_admin_pages_sql</li>
          <li data-deeplink="php_admin_news_sql">Hook: php_admin_news_sql</li>
          <li data-deeplink="php_admin_pages_news_info">Hook: php_admin_pages_news_info</li>
          <li data-deeplink="php_admin_user_delete">Hook: php_admin_user_delete</li>
          <li data-deeplink="php_admin_user_rename">Hook: php_admin_user_rename</li>
          <li data-deeplink="php_admin_user_delete_mass">Hook: php_admin_user_delete_mass</li>
          <li data-deeplink="php_admin_usergroup">Hook: php_admin_usergroup</li>
          <li data-deeplink="php_admin_lang">Hook: php_admin_lang</li>
          <li data-deeplink="php_lang">Hook: php_lang</li>
          <li data-deeplink="php_sitemap">Hook: php_sitemap</li>
          <li data-deeplink="php_search">Hook: php_search</li>
          <li data-deeplink="php_tags">Hook: php_tags</li>
          <li data-deeplink="tpl_admin_page_news">Hook: tpl_admin_page_news</li>
          <li data-deeplink="tpl_admin_page_news_new">Hook: tpl_admin_page_news_new</li>
          <li data-deeplink="tpl_page_news_grid">Hook: tpl_page_news_grid</li>
          <li data-deeplink="tpl_search">Hook: tpl_search</li>
          <li data-deeplink="tpl_admin_usergroup">Hook: tpl_admin_usergroup</li>
          <li data-deeplink="tpl_admin_usergroup_edit">Hook: tpl_admin_usergroup_edit</li>
          <li data-deeplink="tpl_tags">Hook: tpl_tags</li>
          <li data-deeplink="tpl_sidebar">Hook: tpl_sidebar</li>
        </ul>
      </li>
    </ul>
  </nav>
</aside>

<div id="content">
  <div>

    <!-- About Plugin -->
    <section class="active">

      <!-- About Plugin -->
      <article class="active">
        <h4>O Pluginu</h4>

      </article>

      <!-- Folders and Files -->
      <article>
        <h4>Soubory a Složky</h4>
        <div class="css-treeview">
          <ul>
            <li>
              <input type="checkbox" id="item-0"/>
              <label for="item-0">admin</label>
              <span>(administrace pluginu)</span>
              <ul>
                <li>
                  <input type="checkbox" id="item-0-0"/>
                  <label for="item-0-0">include</label>
                  <span>(vložené soubory)</span>
                  <ul>
                    <li class="file">functions.php <span>(backend funkce)</span></li>
                  </ul>
                </li>
                <li>
                  <input type="checkbox" id="item-0-1"/>
                  <label for="item-0-1">js</label>
                  <span>(javascript a jquery soubory)</span>
                  <ul>
                    <li class="file">pages.blog.php</li>
                  </ul>
                </li>
                <li>
                  <input type="checkbox" id="item-0-2"/>
                  <label for="item-0-2">lang</label>
                  <span>(jazykové soubory)</span>
                  <ul>
                    <li class="file">cs.ini</li>
                    <li class="file">en.ini</li>
                  </ul>
                </li>
                <li>
                  <input type="checkbox" id="item-0-3"/>
                  <label for="item-0-3">template</label>
                  <span>(šablony pro administrační rozhraní)</span>
                  <ul>
                    <li class="file">blog.php</li>
                    <li class="file">blog_connect.php</li>
                    <li class="file">blog_connect_new.php</li>
                    <li class="file">blogcat.php</li>
                    <li class="file">blogcatsort.php</li>
                    <li class="file">blognav.php <span>(backend - sidebar menu)</span></li>
                    <li class="file">blogsetting.php <span>(backend - nastavení)</span></li>
                    <li class="file">editblog.php <span>(backend - editace článku)</span></li>
                    <li class="file">editblogcat.php <span>(backend - editace kategorie)</span></li>
                    <li class="file">newblog.php <span>(backend - nový článek)</span></li>
                    <li class="file">newblogcat.php <span>(backend - nová kategorie)</span></li>
                    <li class="file">usergroup_edit.php</li>
                    <li class="file">usergroup_new.php</li>
                  </ul>
                </li>
                <li class="file">blog.php <span>(backend data)</span></li>
              </ul>
            </li>
            <li>
              <input type="checkbox" id="item-1"/>
              <label for="item-1">lang</label>
              <span>(jazykové soubory)</span>
              <ul>
                <li class="file">cs.ini <span>(frontend čeština)</span></li>
                <li class="file">en.ini <span>(frontend angličtina)</span></li>
              </ul>
            </li>
            <li>
              <input type="checkbox" id="item-2"/>
              <label for="item-2">template</label>
              <span>(frontend šablona)</span>
              <ul>
                <li class="file">footer_widget.php</li>
                <li class="file">footer_widget1.php</li>
                <li class="file">tag.php</li>
              </ul>
            </li>
            <li class="file">ajaxsearch.php <span>( frontend - ajax vyhledávání)</span></li>
            <li class="file">blog.php <span>(frontend data)</span></li>
            <li class="file">functions.php <span>(frontend funkce)</span></li>
            <li class="file">help.php <span>(backend nápověda)</span></li>
            <li class="file">install.php <span>(backend instalace)</span></li>
            <li class="file">uninstall.php <span>(backend odinstalace)</span></li>
          </ul>
        </div>
      </article>

      <!-- Changelog -->
      <article>
        <h4>Changelog</h4>
        <h5>v 1.1</h5>
        <pre class="prettyprint">
// # Seznam nových komponent
// ------------------------------

[nový] Better notification
[nový] Use class for create hmtl element
[nový] Add help for plugin
[nový] Better install/unistall wizard
[nový] New design
[nový] Add edit of articles time

// # Seznam opravených chyb
// ------------------------------

[opraveno] Reformat code
[opraveno] Language file cs.ini
[opraveno] Fix typo

// # Seznam odstraněných komponent
// ------------------------------

[odstraněno] Remove unnecessary code
				</pre>

        <h5>v 1.0</h5>
        <p>Basic initial</p>


      </article>

    </section>

    <!-- Hooks -->
    <section>

      <!-- Hook: php_rss -->
      <article>
        <h4>Hook: php_rss</h4>
        <p>Use this hook to execute PHP code in the rss.php file.</p>

        <pre class="prettyprint linenums lang-php">
if ($page1 == JAK_PLUGIN_VAR_BLOG) {

	if ($jkv["blogrss"]) {
		$sql = 'SELECT id, title, content, time FROM '.DB_PREFIX.'blog WHERE active = 1 ORDER BY time DESC LIMIT '.$jkv["blogrss"];
		$sURL = JAK_PLUGIN_VAR_BLOG;
		$sURL1 = 'a';
		$what = 1;
		$seowhat = $jkv["blogurl"];

		$JAK_RSS_DESCRIPTION = envo_cut_text($jkv["blogdesc"], $jkv["shortmsg"], '…');

	} else {
		envo_redirect(BASE_URL);
	}

}
        </pre>

      </article>

      <!-- Hook: php_admin_fulltext_add -->
      <article>
        <h4>Hook: php_admin_fulltext_add</h4>
        <p>Use this hook to execute PHP code in the admin/setting.php file.</p>

        <pre class="prettyprint linenums lang-php">
$jakdb->query('ALTER TABLE '.DB_PREFIX.'blog ADD FULLTEXT(`title`, `content`)');
        </pre>

      </article>

      <!-- Hook: php_admin_fulltext_remove -->
      <article>
        <h4>Hook: php_admin_fulltext_remove</h4>
        <p>Use this hook to execute PHP code in the admin/setting.php file.</p>

        <pre class="prettyprint linenums lang-php">
$jakdb->query('ALTER TABLE '.DB_PREFIX.'blog DROP INDEX `title`');
        </pre>

      </article>

      <!-- Hook: php_admin_pages_sql -->
      <article>
        <h4>Hook: php_admin_pages_sql</h4>
        <p>Use this hook to execute PHP code in the admin/page.php file on two locations. This hook is located when edit or create a new page.</p>

        <pre class="prettyprint linenums lang-php">
if (!isset($defaults['jak_showblog'])) {
	$bl = 0;
} else if (in_array(0, $defaults['jak_showblog'])) {
	$bl = 0;
} else {
	$bl = join(',', $defaults['jak_showblog']);
}

if (empty($bl) && !empty($defaults['jak_showblogmany'])) {
	$insert .= 'showblog = "'.$defaults['jak_showblogorder'].':'.$defaults['jak_showblogmany'].'",';
} else if (!empty($bl)) {
	$insert .= 'showblog = "'.$bl.'",';
} else {
  	$insert .= 'showblog = 0,';
}
        </pre>

      </article>

      <!-- Hook: php_admin_news_sql -->
      <article>
        <h4>Hook: php_admin_news_sql</h4>
        <p>Use this hook to execute PHP code in the admin/news.php file on two locations. This hook is located when edit or create a new news.</p>

        <pre class="prettyprint linenums lang-php">
if (!isset($defaults['jak_showblog'])) {
	$bl = 0;
} else if (in_array(0, $defaults['jak_showblog'])) {
	$bl = 0;
} else {
	$bl = join(',', $defaults['jak_showblog']);
}

if (empty($bl) && !empty($defaults['jak_showblogmany'])) {
	$insert .= 'showblog = "'.$defaults['jak_showblogorder'].':'.$defaults['jak_showblogmany'].'",';
} else if (!empty($bl)) {
	$insert .= 'showblog = "'.$bl.'",';
} else {
  	$insert .= 'showblog = 0,';
}
        </pre>

      </article>

      <!-- Hook: php_admin_pages_news_info -->
      <article>
        <h4>Hook: php_admin_pages_news_info</h4>
        <p>Use this hook to execute PHP code in the admin/page.php and admin/news.php file.</p>

        <pre class="prettyprint linenums lang-php">
$JAK_GET_BLOG = envo_get_page_info(DB_PREFIX.'blog', '');

if ($ENVO_FORM_DATA) {

$showblogarray = explode(":", $ENVO_FORM_DATA['showblog']);

if (is_array($showblogarray) && in_array("ASC", $showblogarray) || in_array("DESC", $showblogarray)) {

		$ENVO_FORM_DATA['showblogorder'] = $showblogarray[0];
		$ENVO_FORM_DATA['showblogmany'] = $showblogarray[1];

} }
        </pre>

      </article>

      <!-- Hook: php_admin_user_delete -->
      <article>
        <h4>Hook: php_admin_user_delete</h4>
        <p>Use this hook to execute PHP code in the admin/users.php file.</p>

        <pre class="prettyprint linenums lang-php">
$jakdb->query('UPDATE '.DB_PREFIX.'blogcomments SET userid = 0 WHERE userid = '.$page2.'');
        </pre>

      </article>

      <!-- Hook: php_admin_user_rename -->
      <article>
        <h4>Hook: php_admin_user_rename</h4>
        <p>Use this hook to execute PHP code in the admin/users.php file.</p>

        <pre class="prettyprint linenums lang-php">
$jakdb->query('UPDATE '.DB_PREFIX.'blogcomments SET username = "'.smartsql($defaults['jak_username']).'" WHERE userid = '.smartsql($page2).'');
        </pre>

      </article>

      <!-- Hook: php_admin_user_delete_mass -->
      <article>
        <h4>Hook: php_admin_user_delete_mass</h4>
        <p>Use this hook to execute PHP code in the admin/users.php file.</p>

        <pre class="prettyprint linenums lang-php">
$jakdb->query('UPDATE '.DB_PREFIX.'blogcomments SET userid = 0 WHERE userid = '.$locked.'');
        </pre>

      </article>

      <!-- Hook: php_admin_usergroup -->
      <article>
        <h4>Hook: php_admin_usergroup</h4>
        <p>Use this hook to execute PHP code in the admin/usergroup.php file.</p>

        <p>For example:</p>
        <pre class="prettyprint linenums lang-php">
if (isset($defaults['jak_blog'])) {
	$insert .= 'blog = "'.$defaults['jak_blog'].'",'; }
        </pre>

      </article>

      <!-- Hook: php_admin_lang -->
      <article>
        <h4>Hook: php_admin_lang</h4>
        <p>Use this hook to execute PHP language code in the admin/index.php file.</p>

        <pre class="prettyprint linenums lang-php">
if (file_exists(APP_PATH.'plugins/blog/admin/lang/'.$site_language.'.ini')) {
    $tlblog = parse_ini_file(APP_PATH.'plugins/blog/admin/lang/'.$site_language.'.ini', true);
} else {
    $tlblog = parse_ini_file(APP_PATH.'plugins/blog/admin/lang/en.ini', true);
}
        </pre>

      </article>

      <!-- Hook: php_lang -->
      <article>
        <h4>Hook: php_lang</h4>
        <p>Use this hook to execute PHP language code in the index.php file.</p>

        <pre class="prettyprint linenums lang-php">
if (file_exists(APP_PATH.'plugins/blog/lang/'.$site_language.'.ini')) {
    $tlblog = parse_ini_file(APP_PATH.'plugins/blog/lang/'.$site_language.'.ini', true);
} else {
    $tlblog = parse_ini_file(APP_PATH.'plugins/blog/lang/en.ini', true);
}
        </pre>

      </article>

      <!-- Hook: php_sitemap -->
      <article>
        <h4>Hook: php_sitemap</h4>
        <p>Use this hook to execute PHP code in the sitemap.php file.</p>

        <pre class="prettyprint linenums lang-php">
include_once APP_PATH.'plugins/blog/functions.php';

$JAK_BLOG_ALL = envo_get_blog('', $jkv["blogorder"], '', '', $jkv["blogurl"], $tl['global_text']['gtxt4']);
$PAGE_TITLE = JAK_PLUGIN_NAME_BLOG;
        </pre>

      </article>

      <!-- Hook: php_search -->
      <article>
        <h4>Hook: php_search</h4>
        <p>Use this hook to execute PHP code in the search.php file.</p>

        <pre class="prettyprint linenums lang-php">
$blog = new JAK_search($SearchInput);
        	$blog->jakSettable('blog',"");
        	$blog->jakAndor("OR");
        	$blog->jakFieldactive("active");
        	$blog->jakFieldtitle("title");
        	$blog->jakFieldcut("content");
        	$blog->jakFieldstosearch(array("title","content"));
        	$blog->jakFieldstoselect("id, title, content");

        	// Load the array into template
        	$JAK_SEARCH_RESULT_BLOG = $blog->set_result(JAK_PLUGIN_VAR_BLOG, 'a', $jkv["blogurl"]);
        </pre>

      </article>

      <!-- Hook: php_tags -->
      <article>
        <h4>Hook: php_tags</h4>
        <p>Use this hook to execute PHP code in the tags.php file.</p>

        <pre class="prettyprint linenums lang-php">
if ($row['pluginid'] == JAK_PLUGIN_ID_BLOG) {
	$blogtagData[] = JAK_tags::jakTagsql("blog", $row['itemid'], "id, title, content", "content", JAK_PLUGIN_VAR_BLOG, "a", $jkv["blogurl"]);
	$JAK_TAG_BLOG_DATA = $blogtagData;
}
        </pre>

      </article>

      <!-- Hook: tpl_admin_page_news -->
      <article>
        <h4>Hook: tpl_admin_page_news</h4>
        <p>Template Hook: tpl_admin_page_news</p>
        <p>This hook is located in admin/template/footer.php and will work together with the grid system, you can use PHP and HTML code.</p>

        <pre class="prettyprint linenums lang-php">
if ($pg['pluginid'] == JAK_PLUGIN_BLOG) {
	include_once APP_PATH.'plugins/blog/admin/template/blog_connect.php';
}
        </pre>

      </article>

      <!-- Hook: tpl_admin_page_news_new -->
      <article>
        <h4>Hook: tpl_admin_page_news_new</h4>
        <p>Template Hook: tpl_admin_page_news_new</p>
        <p>This hook is located in admin/template/footer.php and will be executed to display new plugin stuff in the grid system.</p>

        <pre class="prettyprint linenums lang-php">
plugins/blog/admin/template/blog_connect_new.php
        </pre>

      </article>

      <!-- Hook: tpl_page_news_grid -->
      <article>
        <h4>Hook: tpl_page_news_grid</h4>
        <p>Template Hook: tpl_page_news_grid</p>
        <p>This hook is located in template/yourtemplate/page.php / template/yourtemplate/newsart.php and will be executed to display your plugin grid result.</p>

        <pre class="prettyprint linenums lang-php">
if (JAK_PLUGIN_ACCESS_BLOG && $pg['pluginid'] == JAK_PLUGIN_ID_BLOG && !empty($row['showblog'])) {
	include_once APP_PATH.'template/'.ENVO_TEMPLATE.'/plugintemplate/blog/pages_news.php';
}
        </pre>

      </article>

      <!-- Hook: tpl_search -->
      <article>
        <h4>Hook: tpl_search</h4>
        <p>Template Hook: tpl_search</p>
        <p>This hook is located in template/yourtemplate/search.php and will be executed to display your plugin search result.</p>

        <pre class="prettyprint linenums lang-php">
include_once APP_PATH.'template/'.ENVO_TEMPLATE.'/plugintemplate/blog/search.php';
        </pre>

      </article>

      <!-- Hook: tpl_admin_usergroup -->
      <article>
        <h4>Hook: tpl_admin_usergroup</h4>
        <p>Template Hook: tpl_admin_usergroup</p>
        <p>This hook is located in admin/template/editusergroup.php and will be executed to display your plugin user-group permission.</p>

        <pre class="prettyprint linenums lang-php">
plugins/blog/admin/template/usergroup_new.php
        </pre>

      </article>

      <!-- Hook: tpl_admin_usergroup_edit -->
      <article>
        <h4>Hook: tpl_admin_usergroup_edit</h4>
        <p>Template Hook: tpl_admin_usergroup_edit</p>
        <p>This hook is located in admin/template/editusergroup.php and will be executed to display your plugin user-group permission.</p>

        <pre class="prettyprint linenums lang-php">
plugins/blog/admin/template/usergroup_edit.php
        </pre>

      </article>

      <!-- Hook: tpl_tags -->
      <article>
        <h4>Hook: tpl_tags</h4>
        <p>Template Hook: tpl_tags</p>
        <p>This hook is located in template/yourtemplate/tags.php and will be executed to display your plugin tags.</p>

        <pre class="prettyprint linenums lang-php">
plugins/blog/template/tag.php
        </pre>

      </article>

      <!-- Hook: tpl_sidebar -->
      <article>
        <h4>Hook: tpl_sidebar</h4>
        <p>Template Hook: tpl_sidebar</p>
        <p>This hook is in the sidebar and does work together with the grid/widget system, display advertising, buttons or whatever you like in the sidebar.</p>

        <pre class="prettyprint linenums lang-php">
include_once APP_PATH.'template/'.ENVO_TEMPLATE.'/plugintemplate/blog/blogsidebar.php';
        </pre>

      </article>

    </section>

  </div>
</div>

<!-- ======= JQUERY SCRIPT ======= -->
<script src="/assets/plugins/jquery/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="/admin/assets/doc/js/doc.js"></script>

<script>
  // Init Code-Prettify
  window.onload = (function () {
    prettyPrint();
  });
</script>

</body>
</html>