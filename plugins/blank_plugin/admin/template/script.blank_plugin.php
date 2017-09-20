<?php
/*
 * PLUGIN Blank - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'plugins/blank_plugin/admin/js/script.blank_plugin.js
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'plugins/blank_plugin/admin/js/script.blank_plugin.js'
 *
 */

if ($page == 'blank-plugin') {

  echo PHP_EOL . '<!-- Start JS Blank Plugin -->';

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Plugin Javascript
  echo $Html->addScript('/plugins/blank_plugin/admin/js/script.blank_plugin.js');

  echo PHP_EOL . '<!-- End JS Blank Plugin -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>