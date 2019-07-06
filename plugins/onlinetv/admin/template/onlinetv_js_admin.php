<?php
/*
 * PLUGIN Online TV - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'plugins/onlinetv/admin/js/script.onlinetv.js
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'plugins/onlinetv/admin/js/script.onlinetv.js'
 *
 */

if ($page == 'onlinetv') {

	echo PHP_EOL . '<!-- Start JS Online TV -->';

	if ($page == 'onlinetv' && $page1 == 'film') {

		// TinyMCE Plugin
		if (!empty($page2)) {
			echo $Html -> addScript('/assets/plugins/tinymce/tinymce.min.js?=v4.3.12');
		}
		// Plugin Fancybox
		echo $Html -> addScript('/assets/plugins/fancybox/3.5.7/js/jquery.fancybox.min.js');
		// Plugin Isotope
		echo $Html -> addScript('assets/plugins/jquery-isotope/isotope.pkgd.min.js');

	}

	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	// Plugin Javascript
	echo $Html -> addScript('/plugins/onlinetv/admin/js/script.onlinetv.js');

	echo PHP_EOL . '<!-- End JS Online TV -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>