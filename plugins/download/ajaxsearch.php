<?php

if (!file_exists('../../config.php')) {
  die('plugins/download/[ajaxsearch.php] config.php not exist');
}
require_once '../../config.php';

if (!file_exists('../../class/class.search.php')) {
  die('ajaxsearch/[download.php] class.search.php not exist');
}

include_once '../../class/class.search.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

$SearchInput = strip_tags(smartsql(strtolower($_GET['q'])));

// Narrow down search, only three charactars and more
if (strlen($SearchInput) >= 3) {
  $url       = $_GET['url'];
  $urldetail = $_GET['url_detail'];

  $download = new ENVO_search($SearchInput);
  $download->envoSetTable('download', "");
  $download->envoAndor("OR");
  $download->envoFieldActive("active");
  $download->envoFieldTitle("title");
  $download->envoFieldCut("content");
  $download->envoFieldstoSearch(array('title', 'content'));
  $download->envoFieldstoSelect("id, title, content");

  $downloadarray = $download->set_result($urldetail, 'f', $_GET['seo']);

  if (isset($downloadarray) && is_array($downloadarray)) {
    ENVO_search::search_cloud($SearchInput);
    $text = '';
    foreach ($downloadarray as $row) {

      // Now display the countries
      $text .= '
	<div class="ajaxsResult">
		<h4><a href="' . (JAK_USE_APACHE ? substr($url, 0, -1) : $url) . str_replace(BASE_URL, '', $row['parseurl']) . '">' . $row['title'] . '</a></h4>
		<p>' . $row['content'] . '</p>
	</div>
	';
    }
  }

  echo $text;

}

?>