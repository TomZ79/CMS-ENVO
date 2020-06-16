<?php
/*
 * PLUGIN INTRANET2 - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site header:
 *      - css styles
 *      - external css files
 *      - the file 'plugins/intranet2/admin/css/style.int2.css'
 * CZ: Soubor vkládá další soubory do záhlaví webu:
 *      - css styly
 *      - externí css soubory
 *      - soubor 'plugins/intranet2/admin/css/style.int2.css'
 *
 */

echo PHP_EOL . "\t";
echo '<!-- Start CSS INTRANET2 Plugin -->';

if ($page == 'intranet2' && (($page1 == 'house' && $page2 == 'houselist') || ($page1 == 'contract' && $page2 == 'contractlist'))) {

	// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
	// Plugin DataTable
	echo $Html -> addStylesheet('https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css');

}

if ($page == 'intranet2' && $page1 == 'house' && ($page2 == 'edithouse' || $page2 == 'newhouse')) {

	// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
	// Plugin Fancybox
	echo $Html -> addStylesheet('/assets/plugins/fancybox/3.5.7/css/jquery.fancybox.min.css');
	// Icon technology fonts
	echo $Html -> addStylesheet('/plugins/intranet2/fonts/fonts.css');

}

if ($page == 'intranet2' && $page1 != 'maps') {

	// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
	// Plugin DialogFX
	echo $Html -> addStylesheet('assets/plugins/codrops-dialogFx/dialog.min.css');
	echo $Html -> addStylesheet('assets/plugins/codrops-dialogFx/dialog-sandra.min.css');
	// Plugin Css style
	echo $Html -> addStylesheet('/plugins/intranet2/admin/css/style.intranet2.css');

}

if ($page == 'intranet2' && $page1 == 'maps' && $page2 == 'maps1') {
	
	// OSM Css style
	echo $Html -> addStylesheet('https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css');
	echo $Html -> addStylesheet('https://cdn.jsdelivr.net/npm/ol-contextmenu@3.3.0/dist/ol-contextmenu.min.css');
	
}

echo PHP_EOL . "\t";
echo '<!-- End CSS INTRANET2 Plugin -->';

// New line in source code
echo PHP_EOL;
?>
