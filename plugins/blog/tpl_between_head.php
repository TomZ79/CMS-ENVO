<?php

if ($page == ENVO_PLUGIN_VAR_BLOG) {

	echo PHP_EOL . "\t";
	echo '<!-- BLOG plugins - CSS -->';
	echo PHP_EOL . "\t";

	// Get file
	$pluginsite_template = APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/blog/css/css.blog.php';

	if (file_exists($pluginsite_template)) {
		include APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/blog/css/css.blog.php';
	} else {
		include APP_PATH . 'plugins/blog/assets/css/css.blog.php';
	}

	echo PHP_EOL . "\t";

}

?>