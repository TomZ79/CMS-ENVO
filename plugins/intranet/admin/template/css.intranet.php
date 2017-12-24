<?php
/*
 * PLUGIN Intranet - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site header:
 *      - css styles
 *      - external css files
 *      - the file 'plugins/intranet/admin/css/style.intranet.css'
 * CZ: Soubor vkládá další soubory do záhlaví webu:
 *      - css styly
 *      - externí css soubory
 *      - soubor 'plugins/intranet/admin/css/style.intranet.css'
 *
 */

if ($page == 'intranet') {

  echo PHP_EOL . "\t";
  echo '<!-- Start CSS Intranet -->';

  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Plugin DataTable
  echo $Html->addStylesheet('https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/datatables.min.css');
  // Plugin Fancybox
  echo $Html->addStylesheet('/assets/plugins/fancybox/3.1.25/css/jquery.fancybox.min.css');
  // Plugin DialogFX
  echo $Html->addStylesheet('assets/plugins/codrops-dialogFx/dialog.min.css');
  echo $Html->addStylesheet('assets/plugins/codrops-dialogFx/dialog-sandra.min.css');
  // Plugin Css style
  echo $Html->addStylesheet(BASE_URL_ORIG . 'plugins/intranet/admin/css/style.intranet.min.css');
  // Icon technology fonts
  echo $Html->addStylesheet(BASE_URL_ORIG . 'plugins/intranet/admin/fonts/fonts.css');

  echo PHP_EOL . "\t";
  echo '<!-- End CSS Intranet -->';

}

// New line in source code
echo PHP_EOL;
?>