<?php
/*
 * AKP Users - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'assets/js/script.users.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/script.users.js'
 *
 */

if ($page == 'users') {

	echo PHP_EOL . '<!-- Start JS AKP Users -->';

	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	// Plugin Javascript
	echo $Html -> addScript('assets/js/script.users.min.js');

	echo PHP_EOL . '<!-- End JS AKP Users -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>

<style>
	.label-indicator-absolute {
		position: relative;
	}

	.label-indicator-absolute .password-indicator-label-absolute {
		position: absolute;
		top: 50%;
		margin-top: -9px;
		right: 7px;
		-webkit-transition: all 0.2s ease-in-out;
		-o-transition: all 0.2s ease-in-out;
		transition: all 0.2s ease-in-out;
	}
</style>
