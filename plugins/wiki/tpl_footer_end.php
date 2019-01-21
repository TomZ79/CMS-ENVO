<?php

if ($page == ENVO_PLUGIN_VAR_WIKI) {

	echo PHP_EOL . "\t";
	echo '<!-- WIKI plugins - Javascript -->';
	echo PHP_EOL . "\t";

	// Get file
	$pluginsite_template =  APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/wiki/js/script.wiki.php';

	if (file_exists($pluginsite_template)) {
		include APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/wiki/js/script.wiki.php';
	} else {
		include APP_PATH . 'plugins/wiki/assets/js/script.wiki.php';
	}

	echo PHP_EOL . "\t";

}

?>
