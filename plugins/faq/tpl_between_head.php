<?php

if ($page == ENVO_PLUGIN_VAR_FAQ) {

	echo PHP_EOL . "\t";
	echo '<!-- FAQ plugins - CSS -->';
	echo PHP_EOL . "\t";

	// Get file
	$pluginsite_template = APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/faq/css/css.faq.php';

	if (file_exists($pluginsite_template)) {
		include APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/faq/css/css.faq.php';
	} else {
		include APP_PATH . 'plugins/faq/assets/css/css.faq.php';
	}

	echo PHP_EOL . "\t";

}

?>