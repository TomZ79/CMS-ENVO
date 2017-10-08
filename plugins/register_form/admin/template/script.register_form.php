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
  // Plugin ACE Editor
  echo $Html->addScript('assets/plugins/ace/ace.js');
  // Plugin Javascript
  echo $Html->addScript(BASE_URL_ORIG . 'plugins/register_form/admin/js/script.register_form.min.js');

  echo PHP_EOL . '<!-- End JS Register Form -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>