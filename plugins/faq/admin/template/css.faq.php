<?php
/*
 * PLUGIN Faq - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site header:
 *      - css styles
 *      - external css files
 *      - the file 'plugins/faq/admin/css/style.faq.css'
 * CZ: Soubor vkládá další soubory do záhlaví webu:
 *      - css styly
 *      - externí css soubory
 *      - soubor 'plugins/faq/admin/css/style.faq.css'
 *
 */

if ($page == 'faq') {

  echo PHP_EOL . "\t";
  echo '<!-- Start CSS Faq -->';

  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Plugin Css style
  echo $Html->addStylesheet(BASE_URL_ORIG . 'plugins/faq/admin/css/style.faq.css');

  echo PHP_EOL . "\t";
  echo '<!-- End CSS Faq -->';

}

// New line in source code
echo PHP_EOL;
?>