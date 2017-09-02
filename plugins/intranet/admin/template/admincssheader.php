<?php
/*
 * PLUGIN INTRANET - POPIS SOUBORU admincssheader.php
 * ----------------------------------------------
 *
 * Soubor slouží pro vložení css stylů, externích css souborů a souboru 'plugins/intranet/admin/css/style.css' do záhlaví webu - admin
 *
 */
?>

<?php if ($page == 'intranet') {

  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  echo $Html->addStylesheet('https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/datatables.min.css');
  echo $Html->addStylesheet(BASE_URL_ORIG . 'plugins/intranet/admin/css/style.css');
  echo $Html->addStylesheet('../assets/plugins/fancybox/3.0/css/jquery.fancybox.min.css');
  echo $Html->addStylesheet('assets/plugins/codrops-dialogFx/dialog.css');
  echo $Html->addStylesheet('assets/plugins/codrops-dialogFx/dialog-sandra.css');

} ?>