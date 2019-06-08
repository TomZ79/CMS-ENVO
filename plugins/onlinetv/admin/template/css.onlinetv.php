<?php
/*
 * PLUGIN Online TV - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site header:
 *      - css styles
 *      - external css files
 *      - the file 'plugins/onlinetv/admin/css/style.onlinetv.css'
 * CZ: Soubor vkládá další soubory do záhlaví webu:
 *      - css styly
 *      - externí css soubory
 *      - soubor 'plugins/onlinetv/admin/css/style.onlinetv.css'
 *
 */

if ($page == 'onlinetv') {

	echo PHP_EOL . "\t";
	echo '<!-- Start CSS Online TV -->';

	// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
	// Plugin Css style
	echo $Html -> addStylesheet('/plugins/onlinetv/admin/css/style.onlinetv.min.css');

	echo PHP_EOL . "\t";
	echo '<!-- End CSS Online TV -->';

}

// New line in source code
echo PHP_EOL;
?>