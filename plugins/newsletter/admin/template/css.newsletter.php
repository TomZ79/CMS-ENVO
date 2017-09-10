<?php
/*
 * PLUGIN Newsletter - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site header:
 *      - css styles
 *      - external css files
 *      - the file 'plugins/newsletter/admin/css/style.newsletter.css'
 * CZ: Soubor vkládá další soubory do záhlaví webu:
 *      - css styly
 *      - externí css soubory
 *      - soubor 'plugins/newsletter/admin/css/style.newsletter.css'
 *
 */

if ($page == 'newsletter') {

  echo PHP_EOL . "\t";
  echo '<!-- Start CSS Newsletter -->';

  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Plugin Css style
  echo $Html->addStylesheet(BASE_URL_ORIG . 'plugins/newsletter/admin/css/style.newsletter.css');

  echo PHP_EOL . "\t";
  echo '<!-- End CSS Newsletter -->';

}

// New line in source code
echo PHP_EOL;
?>