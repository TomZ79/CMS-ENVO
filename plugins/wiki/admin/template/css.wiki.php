<?php
/*
 * PLUGIN Wiki - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site header:
 *      - css styles
 *      - external css files
 *      - the file 'plugins/wiki/admin/css/style.wiki.css'
 * CZ: Soubor vkládá další soubory do záhlaví webu:
 *      - css styly
 *      - externí css soubory
 *      - soubor 'plugins/wiki/admin/css/style.wiki.css'
 *
 */

if ($page == 'wiki') {

	echo PHP_EOL . "\t";
	echo '<!-- Start CSS Wiki -->';

	// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
	// Plugin DataTable
	echo $Html -> addStylesheet('https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css');
	// Plugin Css style
	echo $Html -> addStylesheet('/plugins/wiki/admin/css/style.wiki.min.css');

	echo PHP_EOL . "\t";
	echo '<!-- End CSS Wiki -->';

}

// New line in source code
echo PHP_EOL;
?>