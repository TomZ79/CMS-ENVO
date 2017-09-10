<?php
/*
 * PLUGIN Growl - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site header:
 *      - css styles
 *      - external css files
 *      - the file 'plugins/growl/admin/css/style.growl.css'
 * CZ: Soubor vkládá další soubory do záhlaví webu:
 *      - css styly
 *      - externí css soubory
 *      - soubor 'plugins/growl/admin/css/style.growl.css'
 *
 */

if ($page == 'growl') {

  echo PHP_EOL . "\t";
  echo '<!-- Start CSS Growl -->';

  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Plugin Css style
  echo $Html->addStylesheet(BASE_URL_ORIG . 'plugins/growl/admin/css/style.growl.css');

  echo PHP_EOL . "\t";
  echo '<!-- End CSS Growl -->';

}

// New line in source code
echo PHP_EOL;
?>