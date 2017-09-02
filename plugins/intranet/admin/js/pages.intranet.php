<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html->addScript('https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/datatables.min.js');
echo $Html->addScript(BASE_URL_ORIG . 'plugins/intranet/admin/js/jquery.tabledit.js');
echo $Html->addScript(BASE_URL_ORIG . 'plugins/intranet/admin/js/script.intranet.js');
echo $Html->addScript('assets/plugins/classie/classie.js');
echo $Html->addScript('assets/plugins/codrops-dialogFx/dialogFx.js');
echo $Html->addScript('assets/plugins/jquery-isotope/isotope.pkgd.min.js');
echo $Html->addScript('../assets/plugins/fancybox/3.0/js/jquery.fancybox.min.js');
echo $Html->addScript('assets/js/gallery.js');
?>