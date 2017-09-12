<?php
/*
 * AKP Log of user login - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'assets/js/script.logs.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/script.logs.js'
 *
 */

if ($page == 'logs') {

  echo PHP_EOL . '<!-- Start JS AKP Log of user login -->';

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Plugin Javascript
  echo $Html->addScript('assets/js/script.logs.js');

  echo PHP_EOL . '<!-- End JS AKP Log of user login -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>
