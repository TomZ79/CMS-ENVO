<?php
/*
 * PLUGIN Blank - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site header:
 *      - css styles
 *      - external css files
 *      - the file 'plugins/blank_plugin/admin/css/style.blank_plugin.css'
 * CZ: Soubor vkládá další soubory do záhlaví webu:
 *      - css styly
 *      - externí css soubory
 *      - soubor 'plugins/blank_plugin/admin/css/style.blank_plugin.css'
 *
 */

if ($page == 'blank-plugin') {

  echo PHP_EOL . "\t";
  echo '<!-- Start CSS Blank Plugin -->';

  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Plugin Css style
  echo $Html->addStylesheet(BASE_URL_ORIG . 'plugins/blank_plugin/admin/css/style.blank_plugin.min.css');

  echo PHP_EOL . "\t";
  echo '<!-- End CSS Blank Plugin -->';

}

// New line in source code
echo PHP_EOL;
?>