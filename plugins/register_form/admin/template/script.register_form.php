<?php
/*
 * PLUGIN Register Form - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'plugins/register_form/admin/js/script.register_form.js
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'plugins/register_form/admin/js/script.register_form.js'
 *
 */

if ($page == 'register-form') {

  echo PHP_EOL . '<!-- Start JS Register Form -->';

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
  echo $Html->addScript(BASE_URL_ORIG . 'plugins/register_form/admin/js/script.register_form.js');

  echo PHP_EOL . '<!-- End JS Register Form -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>