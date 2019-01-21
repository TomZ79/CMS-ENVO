<?php
/*
 * PLUGIN TV Tower - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'plugins/tv-tower/admin/js/script.tv-tower.js
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'plugins/tv-tower/admin/js/script.tv-tower.js'
 *
 */

if ($page == 'tv-tower') {

	echo PHP_EOL . '<!-- Start JS TV Tower -->';

	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	// Plugin ACE Editor
	echo $Html -> addScript('assets/plugins/ace/ace.js');
	// Plugin DataTable
	echo $Html -> addScript('https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js');
	// Plugin Javascript
	echo $Html -> addScript('/plugins/tv_tower/admin/js/script.tv_tower.min.js');

	echo PHP_EOL . '<!-- End JS TV Tower -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>