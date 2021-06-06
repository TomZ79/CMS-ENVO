<?php
/*
 * AKP Media Sharing - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'assets/js/script.mediasharing.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/script.mediasharing.js'
 *
 */

if ($page == 'mediasharing') {

	echo PHP_EOL . '<!-- Start JS AKP Media Sharing -->';

	// Setting variable for Jquery external script
	?>

	<script>
		var sollist = {
			pixels: <?=json_encode($setting["md_mediaSize"])?>,
			size: <?=json_encode($setting["md_iconSize"])?>,
			theme: <?=json_encode($setting["md_mediatheme"])?>,
			hoverEffect: <?=json_encode($setting["md_mediahover"])?>
		};
	</script>

	<?php

	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	//
	echo $Html -> addScript('/assets/plugins/jquery-sollist/jquery.sollist.min.js');
	// Plugin Javascript
	echo $Html -> addScript('assets/js/script.mediasharing.min.js');

	echo PHP_EOL . '<!-- End JS AKP Media Sharing -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>

<link href="/assets/plugins/jquery-sollist/jquery.sollist.min.css" rel="stylesheet" type="text/css" media="screen"/>
