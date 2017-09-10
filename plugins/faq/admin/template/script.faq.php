<?php
/*
 * PLUGIN Faq - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'plugins/faq/admin/js/script.faq.js
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'plugins/faq/admin/js/script.faq.js'
 *
 */

if ($page == 'faq') {

  echo PHP_EOL . '<!-- Start JS Faq -->';

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
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
    var aceEditor = {
      acetheme: <?php echo json_encode($jkv["acetheme"]); ?>,
      acewraplimit: <?php echo json_encode($jkv["acewraplimit"]); ?>,
      acetabSize: <?php echo json_encode($jkv["acetabSize"]); ?>,
      aceactiveline: <?php echo json_encode($jkv["aceactiveline"]); ?>,
      aceinvisible: <?php echo json_encode($jkv["aceinvisible"]); ?>,
      acegutter: <?php echo json_encode($jkv["acegutter"]); ?>
    };

    var iconpicker = {
      icon: <?php echo json_encode($categoryimg); ?>,
      searchText: <?php echo json_encode($tl["placeholder"]["p4"]); ?>,
      labelFooter: <?php echo json_encode($tl["global_text"]["globaltxt18"]); ?>
    };
  </script>

  <?php
  // Plugin ACE Editor
  echo $Html->addScript('assets/plugins/ace/ace.js');
  // Plugin Slug
  echo $Html->addScript('assets/js/slug.js');
  // Order Category
  echo $Html->addScript('assets/js/catorder.js');
  // Plugin Javascript
  echo $Html->addScript(BASE_URL_ORIG . 'plugins/faq/admin/js/script.faq.js');

  echo PHP_EOL . '<!-- End JS Faq -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>