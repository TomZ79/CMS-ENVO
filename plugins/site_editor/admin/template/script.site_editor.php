<?php
/*
 * PLUGIN Site Editor - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'plugins/site_editor/admin/js/script.site_editor.js
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'plugins/site_editor/admin/js/script.site_editor.js'
 *
 */

if ($page == 'site-editor') {

  echo PHP_EOL . '<!-- Start JS Site Editor -->';

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Plugin Javascript
  echo $Html->addScript(BASE_URL_ORIG . 'plugins/site_editor/admin/js/script.site_editor.min.js');

  echo PHP_EOL . '<!-- End JS Site Editor -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>