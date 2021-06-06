<?php
/*
 * AKP News - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'assets/js/script.news.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/script.mediasharing.js'
 *
 */

if ($page == 'news') {

	echo PHP_EOL . '<!-- Start JS AKP News -->';

	// Setting variable for Jquery external script
	?>

	<script>
		// Add to Global settings javascript object
		globalSettings['pageID2'] = <?=(!empty($page2) && is_numeric($page2) ? $page2 : '""')?>;
	</script>

	<?php

	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	// Plugin ACE Editor
	echo $Html -> addScript('assets/plugins/ace/ace.js');
	// Plugin Javascript
	echo $Html -> addScript('assets/js/script.news.min.js');

	echo PHP_EOL . '<!-- End JS AKP News -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>
