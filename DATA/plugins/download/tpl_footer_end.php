<?php

if ($page == ENVO_PLUGIN_VAR_DOWNLOAD) {

	echo PHP_EOL . "\t";
	echo '<!-- Download plugins - Javascript -->';
	echo PHP_EOL . "\t";

	// Get file
	$pluginsite_template = APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/download/js/script.download.php';

	if (file_exists($pluginsite_template)) {
		include APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/download/js/script.download.php';
	} else {
		include APP_PATH . 'plugins/download/assets/js/script.download.php';
	}

	echo PHP_EOL . "\t";

}

?>
