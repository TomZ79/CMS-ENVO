<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/ajaxsearch.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

//
if (!file_exists('../../class/class.search.php')) die('ajaxsearch/[wiki.php] class.search.php not exist');
include_once '../../class/class.search.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

$SearchInput = strip_tags(smartsql(strtolower($_GET['q'])));

// Narrow down search, only three charactars and more
if (strlen($SearchInput) >= 3) {
  $url       = $_GET['url'];
  $urldetail = $_GET['url_detail'];

  $wiki = new ENVO_search($SearchInput);
  $wiki -> envoSetTable('wiki', "");
  $wiki -> envoAndor("OR");
  $wiki -> envoFieldActive("active");
  $wiki -> envoFieldTitle("title");
  $wiki -> envoFieldCut("content");
  $wiki -> envoFieldstoSearch(array ( 'title', 'content' ));
  $wiki -> envoFieldstoSelect("id, title, content");

  $wikiarray = $wiki -> set_result($urldetail, 'wiki-article', $_GET['seo']);

  if (isset($wikiarray) && is_array($wikiarray)) {
    ENVO_search ::search_cloud($SearchInput);
    $text = '';
    foreach ($wikiarray as $row) {

      // Now display the countries
      $text .= '
	<div class="ajaxsResult">
		<h4><a href="' . (ENVO_USE_APACHE ? substr($url, 0, -1) : $url) . str_replace(BASE_URL, '', $row['parseurl']) . '">' . $row['title'] . '</a></h4>
		<p>' . $row['content'] . '</p>
	</div>
	';
    }
  }

  echo $text;

}

?>