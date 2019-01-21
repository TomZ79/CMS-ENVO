<?php

if ($page == ENVO_PLUGIN_VAR_BLOG) {

	echo PHP_EOL . "\t";
	echo '<!-- BLOG plugins - Javascript -->';
	echo PHP_EOL . "\t";

	// Get file
	$pluginsite_template = APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/blog/js/script.blog.php';

	if (file_exists($pluginsite_template)) {
		include APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/blog/js/script.blog.php';
	} else {
		include APP_PATH . 'plugins/blog/assets/js/script.blog.php';
	}

	echo PHP_EOL . "\t";

}

?>
