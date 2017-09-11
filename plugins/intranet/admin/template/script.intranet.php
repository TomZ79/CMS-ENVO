<?php
/*
 * PLUGIN Intranet - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'plugins/intranet/admin/js/script.intranet.js
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'plugins/intranet/admin/js/script.intranet.js'
 *
 */

if ($page == 'intranet') {

  echo PHP_EOL . '<!-- Start JS Intranet -->';

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Plugin DataTable
  echo $Html->addScript('https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/datatables.min.js');
  // Plugin Tabledit
  echo $Html->addScript(BASE_URL_ORIG . 'plugins/intranet/admin/js/jquery.tabledit.js');
  // Plugin Fancybox
  echo $Html->addScript('/assets/plugins/fancybox/3.0/js/jquery.fancybox.min.js');
  // Plugin DialogFX
  echo $Html->addScript('assets/plugins/classie/classie.js');
  echo $Html->addScript('assets/plugins/codrops-dialogFx/dialogFx.js');
  // Plugin Isotope
  echo $Html->addScript('assets/plugins/jquery-isotope/isotope.pkgd.min.js');
  //
  echo $Html->addScript('assets/js/global_js/gallery.js');
  // Plugin Javascript
  echo $Html->addScript(BASE_URL_ORIG . 'plugins/intranet/admin/js/script.intranet.js');

  echo PHP_EOL . '<!-- End JS Intranet -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>