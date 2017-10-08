<?php
/*
 * AKP User Group - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'assets/js/script.usergroup.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/script.usergroup.js'
 *
 */

if ($page == 'usergroup') {

  echo PHP_EOL . '<!-- Start JS AKP User Group -->';

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Plugin Javascript
  echo $Html->addScript('assets/js/script.usergroup.min.js');

  echo PHP_EOL . '<!-- End JS AKP User Group -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>
