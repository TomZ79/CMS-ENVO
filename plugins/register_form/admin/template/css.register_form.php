<?php
/*
 * PLUGIN Register Form - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site header:
 *      - css styles
 *      - external css files
 *      - the file 'plugins/register_form/admin/css/style.register_form.css'
 * CZ: Soubor vkládá další soubory do záhlaví webu:
 *      - css styly
 *      - externí css soubory
 *      - soubor 'plugins/register_form/admin/css/style.register_form.css'
 *
 */

if ($page == 'register-form') {

  echo PHP_EOL . "\t";
  echo '<!-- Start CSS Register Form -->';

  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Plugin Css style
  echo $Html->addStylesheet(BASE_URL_ORIG . 'plugins/register_form/admin/css/style.register_form.min.css');

  echo PHP_EOL . "\t";
  echo '<!-- End CSS Register Form -->';

}

// New line in source code
echo PHP_EOL;
?>