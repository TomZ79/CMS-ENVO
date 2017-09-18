<?php
/*
 * PLUGIN Blog - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'plugins/blog/admin/js/script.blog.js
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'plugins/blog/admin/js/script.blog.js'
 *
 */

if ($page == 'blog') {

  echo PHP_EOL . '<!-- Start JS Blog -->';

  // Setting variable for Jquery external script
  if (isset($ENVO_FORM_DATA["catimg"])) {
    $str = $ENVO_FORM_DATA["catimg"];

    if (strpos($str, 'glyphicons ') !== FALSE) {
      $categoryimg = str_replace('glyphicons ', '', $ENVO_FORM_DATA["catimg"]);
    } else {
      $categoryimg = str_replace('fa ', '', $ENVO_FORM_DATA["catimg"]);
    }
  } else {
    $categoryimg = 'fa-font';
  }
  ?>

  <script>
    // Add to Global settings javascript object
    iconPicker['icon'] = <?php echo json_encode($categoryimg); ?>;
    globalSettings['pageID2'] = <?php echo (!empty($page2) && is_numeric($page2) ? $page2 : '""'); ?>;
  </script>

  <?php
  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Plugin ACE Editor
  echo $Html->addScript('assets/plugins/ace/ace.js');
  // Plugin Slug
  echo $Html->addScript('assets/js/global_js/slug.js');
  // Categories plugin and script
  echo $Html->addScript('assets/plugins/jquery-nestedsortable/jquery.mjs.nestedSortable.min.js');
  echo $Html->addScript('assets/js/global_js/catorder.js');
  // Plugin DataTable
  echo $Html->addScript('https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/datatables.min.js');
  // Plugin Javascript
  echo $Html->addScript(BASE_URL_ORIG . 'plugins/blog/admin/js/script.blog.js');

  echo PHP_EOL . '<!-- End JS Blog -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>