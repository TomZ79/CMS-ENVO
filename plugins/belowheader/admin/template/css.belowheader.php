<?php
/*
 * PLUGIN Belowheader - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site header:
 *      - css styles
 *      - external css files
 *      - the file 'plugins/belowheader/admin/css/style.belowheader.css'
 * CZ: Soubor vkládá další soubory do záhlaví webu:
 *      - css styly
 *      - externí css soubory
 *      - soubor 'plugins/belowheader/admin/css/style.belowheader.css'
 *
 */

if ($page == 'belowheader') {

  echo PHP_EOL . "\t";
  echo '<!-- Start CSS Belowheader -->';

  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Plugin DataTable
  echo $Html->addStylesheet('https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css');
  // Plugin Css style
  echo $Html->addStylesheet(BASE_URL_ORIG . 'plugins/belowheader/admin/css/style.belowheader.min.css');

  echo PHP_EOL . "\t";
  echo '<!-- End CSS Belowheader -->';

}

// New line in source code
echo PHP_EOL;
?>