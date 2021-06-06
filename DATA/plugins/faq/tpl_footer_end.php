<?php

if ($page == ENVO_PLUGIN_VAR_FAQ) {

	echo PHP_EOL . "\t";
	echo '<!-- FAQ plugins - Javascript -->';
	echo PHP_EOL . "\t";

	// Get file
	$pluginsite_template = APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/faq/js/script.faq.php';

	if (file_exists($pluginsite_template)) {
		include APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/faq/js/script.faq.php';
	} else {
		include APP_PATH . 'plugins/faq/assets/js/script.faq.php';
	}

	echo PHP_EOL . "\t";

}

?>
