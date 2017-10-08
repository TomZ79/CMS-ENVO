<?php
/*
 * AKP Contact Form - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'assets/js/script.contactform.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/script.contactform.js'
 *
 */

if ($page == 'contactform') {

  echo PHP_EOL . '<!-- Start JS AKP Contact Form -->';

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Plugin Javascript
  echo $Html->addScript('assets/js/script.contactform.min.js');

  echo PHP_EOL . '<!-- End JS AKP Contact Form -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>
