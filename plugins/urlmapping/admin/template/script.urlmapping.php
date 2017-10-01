<?php
/*
 * PLUGIN URL Mapping - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'plugins/urlmapping/admin/js/script.urlmapping.js
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'plugins/urlmapping/admin/js/script.urlmapping.js'
 *
 */

if ($page == 'urlmapping') {

  echo PHP_EOL . '<!-- Start JS URL Mapping -->';

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Plugin DataTable
  echo $Html->addScript('https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/datatables.min.js');
  // Plugin Javascript
  echo $Html->addScript(BASE_URL_ORIG . 'plugins/urlmapping/admin/js/script.urlmapping.js');

  echo PHP_EOL . '<!-- End JS URL Mapping -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>