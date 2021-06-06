<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/news.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

//
if (!file_exists('../../class/class.search.php')) die('ajax/[page.php] class.search.php not exist');
include_once '../../class/class.search.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

$SearchInput = strip_tags(smartsql($_GET['q']));

// Narrow down search, only three charactars and more
if (strlen($SearchInput) >= 3) {
	$url       = $_GET['url'];
	$urldetail = $_GET['url_detail'];

// Standard search for all pages
	$news = new ENVO_search($SearchInput);
	$news -> envoSetTable("news", ''); // array for pages and cat
	$news -> envoAndor("OR"); // We do an OR so it will search thru title and content and display one of them
	$news -> envoFieldActive("active"); // Only if the page is active
	$news -> envoFieldTitle("title");
	$news -> envoFieldCut("content"); // The content will be cuted to fit nicely
	$news -> envoFieldstoSearch(array ('title', 'content')); // This fields will be searched
	$news -> envoFieldstoSelect("id, title" . ", content"); // This will be the output for the template, packed in a array

	$newsarray = $news -> set_result($urldetail, 'news-article', $_GET['seo']);

	if (isset($newsarray) && is_array($newsarray)) {
		ENVO_search ::search_cloud($SearchInput);
		foreach ($newsarray as $row) {

			// Now display the countries
			$text .= '
		<div class="ajaxsResult">
			<h4><a href="' . $url . str_replace(BASE_URL, '', $row['parseurl']) . '">' . $row['title'] . '</a></h4>
			<p>' . $row['content'] . '</p>
		</div>
		';
		}
	}

	echo $text;

}

?>