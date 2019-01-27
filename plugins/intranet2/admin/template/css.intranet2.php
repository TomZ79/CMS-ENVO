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

if ($page == 'intranet2') {

	echo PHP_EOL . "\t";
	echo '<!-- Start CSS INTRANET2 Plugin -->';

	// Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
	// Plugin DataTable
	echo $Html -> addStylesheet('https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css');
	// Plugin Fancybox
	echo $Html -> addStylesheet('/assets/plugins/fancybox/3.2.5/css/jquery.fancybox.min.css');
	// Plugin DialogFX
	echo $Html -> addStylesheet('assets/plugins/codrops-dialogFx/dialog.min.css');
	echo $Html -> addStylesheet('assets/plugins/codrops-dialogFx/dialog-sandra.min.css');
	// Icon technology fonts
	echo $Html -> addStylesheet('/plugins/intranet2/fonts/fonts.css');
	// Plugin Css style
	echo $Html -> addStylesheet('/plugins/intranet2/admin/css/style.intranet2.css');

	echo PHP_EOL . "\t";
	echo '<!-- End CSS INTRANET2 Plugin -->';

}

// New line in source code
echo PHP_EOL;
?>