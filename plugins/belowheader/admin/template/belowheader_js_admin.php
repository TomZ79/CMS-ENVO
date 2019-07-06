<?php
/*
 * PLUGIN Belowheader - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'plugins/belowheader/admin/js/script.belowheader.js
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'plugins/belowheader/admin/js/script.belowheader.js'
 *
 */

if ($page == 'belowheader') {

  echo PHP_EOL . '<!-- Start JS Belowheader -->';

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Load 'ace.js'  - only for selected pages
  if ($setting["adv_editor"]) {
    // Plugin ACE Editor
    echo $Html -> addScript('assets/plugins/ace/ace.js');
  }
  // Plugin DataTable
  echo $Html -> addScript('https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js');
  // Plugin Javascript
  echo $Html -> addScript('/plugins/belowheader/admin/js/script.belowheader.min.js');

  echo PHP_EOL . '<!-- End JS Belowheader -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>