<?php
/*
 * PLUGIN Growl - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'plugins/growl/admin/js/script.growl.js
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'plugins/growl/admin/js/script.growl.js'
 *
 */

if ($page == 'growl') {

  echo PHP_EOL . '<!-- Start JS Growl -->';

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Setting variable for Jquery external script
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
  </script>

  <?php
  // Plugin ACE Editor
  echo $Html->addScript('assets/plugins/ace/ace.js');
  // Plugin Javascript
  echo $Html->addScript(BASE_URL_ORIG . 'plugins/growl/admin/js/script.growl.js');

  echo PHP_EOL . '<!-- End JS Growl -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>