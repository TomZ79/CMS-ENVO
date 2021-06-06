<?php

if ($page == ENVO_PLUGIN_VAR_DOWNLOAD) {

	echo PHP_EOL . "\t";
	echo '<!-- Download plugins - CSS -->';
	echo PHP_EOL . "\t";

	// Get file
	$pluginsite_template = APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/download/css/css.download.php';

	if (file_exists($pluginsite_template)) {
		include APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/download/css/css.download.php';
	} else {
		include APP_PATH . 'plugins/download/assets/css/css.download.php';
	}

	echo PHP_EOL . "\t";
}

?>