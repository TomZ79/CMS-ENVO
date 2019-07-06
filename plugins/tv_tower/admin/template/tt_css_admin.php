<?php
/*
 * PLUGIN TV Tower - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site header:
 *      - css styles
 *      - external css files
 *      - the file 'plugins/tv_tower/admin/css/style.tv_tower.css'
 * CZ: Soubor vkládá další soubory do záhlaví webu:
 *      - css styly
 *      - externí css soubory
 *      - soubor 'plugins/tv_tower/admin/css/style.tv_tower.css'
 *
 */

if ($page == 'tv-tower') {

	echo PHP_EOL . "\t";
	echo '<!-- Start CSS TV Tower -->';

	// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
	// Plugin DataTable
	echo $Html -> addStylesheet('https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css');
	// Plugin Css style
	echo $Html -> addStylesheet('/plugins/tv_tower/admin/css/style.tv_tower.min.css');

	echo PHP_EOL . "\t";
	echo '<!-- End CSS TV Tower -->';

}

// New line in source code
echo PHP_EOL;
?>