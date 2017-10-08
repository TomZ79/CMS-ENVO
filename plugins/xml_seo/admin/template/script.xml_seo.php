<?php
/*
 * PLUGIN XML SEO - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'plugins/xml_seo/admin/js/script.xml_seo.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'plugins/xml_seo/admin/js/script.xml_seo.js'
 *
 */

if ($page == 'xml_seo') {

  echo PHP_EOL . '<!-- Start JS XML Seo -->';

  // Setting variable for Jquery external script
  ?>

  <script>
    var stepForm = {
      nextBtn: <?php echo json_encode($tlxml["xml_button"]["xmlbtn"]); ?>,
      prevBtn: <?php echo json_encode($tlxml["xml_button"]["xmlbtn1"]); ?>,
      finishBtn: <?php echo json_encode($tlxml["xml_button"]["xmlbtn2"]); ?>
    };
  </script>

  <?php

  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Code-prettify CSS
  echo $Html->addStylesheet('assets/plugins/code-prettify-master/themes/github/github.min.css');

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Code-prettify JS
  echo $Html->addScript('assets/plugins/code-prettify-master/src/prettify.js');
  // Step Form Wizard plugin
  echo $Html->addScript('/assets/plugins/step-form-wizard/2.3/step-form-wizard/js/step-form-wizard.js');
  // Plugin Javascript
  echo $Html->addScript(BASE_URL_ORIG . 'plugins/xml_seo/admin/js/script.xml_seo.min.js');

  ?>

  <script>
    // Init Code-Prettify
    window.onload = (function () {
      prettyPrint();
    });
  </script>

  <?php

  echo PHP_EOL . '<!-- End JS XML Seo -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>