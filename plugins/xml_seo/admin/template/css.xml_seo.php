<?php
/*
 * PLUGIN XML SEO - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site header:
 *      - css styles
 *      - external css files
 *      - the file 'plugins/xml_seo/admin/css/style.xml_seo.css'
 * CZ: Soubor vkládá další soubory do záhlaví webu:
 *      - css styly
 *      - externí css soubory
 *      - soubor 'plugins/xml_seo/admin/css/style.xml_seo.css'
 *
 */

if ($page == 'xml_seo') {

  echo PHP_EOL . "\t";
  echo '<!-- Start CSS XML Seo -->';

  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Step Form Wizard plugin
  echo $Html->addStylesheet('/assets/plugins/step-form-wizard/2.3/step-form-wizard/css/step-form-wizard-all.css');
  // Plugin Css style
  echo $Html->addStylesheet(BASE_URL_ORIG . 'plugins/xml_seo/admin/css/style.xml_seo.min.css');

  echo PHP_EOL . "\t";
  echo '<!-- End CSS XML Seo -->';

}

// New line in source code
echo PHP_EOL;
?>