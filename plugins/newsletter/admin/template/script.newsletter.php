<?php
/*
 * PLUGIN Newsletter - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'plugins/newsletter/admin/js/script.newsletter.js
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'plugins/newsletter/admin/js/script.newsletter.js'
 *
 */

if ($page == 'newsletter') {

  echo PHP_EOL . '<!-- Start JS Newsletter -->';

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // TinyMCE Plugin
  echo $Html->addScript('/assets/plugins/tinymce/tinymce.min.js?=v4.3.12');
  // Plugin Javascript
  echo $Html->addScript(BASE_URL_ORIG . 'plugins/newsletter/admin/js/script.newsletter.min.js');

  echo PHP_EOL . '<!-- End JS Newsletter -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>