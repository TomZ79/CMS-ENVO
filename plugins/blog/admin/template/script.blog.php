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
    var iconPicker = {
      icon: <?php echo json_encode($categoryimg); ?>
    };
    // Global settings
    var global = {
      pageID: <?php echo json_encode($page); ?>,
      pageID1: <?php echo json_encode($page1); ?>,
      pageID2: <?php echo json_encode($page2); ?>,
      pageID3: <?php echo json_encode($page3); ?>,
      pageID4: <?php echo json_encode($page4); ?>,
      pageID5: <?php echo json_encode($page5); ?>,
      pageID6: <?php echo json_encode($page6); ?>
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
  echo $Html->addScript(BASE_URL_ORIG . 'plugins/blog/admin/js/script.blog.js');

  echo PHP_EOL . '<!-- End JS Blog -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>