<?php
/*
 * PLUGIN INTRANET - ADMIN
 * EN: Description of file 'admincssheader.php'
 * CZ: Popis souboru 'admincssheader.php'
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site header:
 *      - css styles
 *      - external css files
 *      - the file 'plugins/intranet/admin/css/style.css'
 * CZ: Soubor vkládá další soubory do záhlaví webu:
 *      - css styly
 *      - externí css soubory
 *      - soubor 'plugins/intranet/admin/css/style.css'
 *
 */

if ($page == 'intranet') {

  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  echo $Html->addStylesheet('https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/datatables.min.css');
  echo $Html->addStylesheet(BASE_URL_ORIG . 'plugins/intranet/admin/css/style.css');
  echo $Html->addStylesheet('../assets/plugins/fancybox/3.0/css/jquery.fancybox.min.css');
  echo $Html->addStylesheet('assets/plugins/codrops-dialogFx/dialog.css');
  echo $Html->addStylesheet('assets/plugins/codrops-dialogFx/dialog-sandra.css');

} ?>