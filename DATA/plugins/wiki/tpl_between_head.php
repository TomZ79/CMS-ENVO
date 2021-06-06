<?php

if ($page == ENVO_PLUGIN_VAR_WIKI) {

	echo PHP_EOL . "\t";
	echo '<!-- WIKI plugins - CSS -->';
	echo PHP_EOL . "\t";

	// Get file
	$pluginsite_template = APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/wiki/css/css.wiki.php';

	if (file_exists($pluginsite_template)) {
		include APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/wiki/css/css.wiki.php';
	} else {
		include APP_PATH . 'plugins/wiki/assets/css/css.wiki.php';
	}

	echo PHP_EOL . "\t";

}

?>