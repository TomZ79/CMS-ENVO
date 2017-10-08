<?php
/*
 * AKP Tiny Editor - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'assets/js/tiny.editor.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/tiny.editor.js'
 *
 */

// Get the stylesheets
if (isset($tpl_customcss)) {
	$customCSS = "../assets/css/stylesheet.css," . $tpl_customcss . ",../assets/css/editorcustom.css";
} else {
	$customCSS = "../assets/css/stylesheet.css,../css/editorcustom.css";
}
// Tiny Editor Javascript
echo $Html->addScript('assets/js/tiny.editor.min.js');

// New line in source code
echo PHP_EOL;
?>