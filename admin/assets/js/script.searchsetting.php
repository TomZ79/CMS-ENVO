<?php
/*
 * AKP Search Settings - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'assets/js/script.searchsetting.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/script.searchsetting.js'
 *
 */

if ($page == 'searchsetting') {

  echo PHP_EOL . '<!-- Start JS AKP Search Settings -->';

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Plugin Javascript
  echo $Html->addScript('assets/js/script.searchsetting.js');

  echo PHP_EOL . '<!-- End JS AKP Search Settings -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>
