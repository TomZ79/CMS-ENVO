<?php
/*
 * PLUGIN Site Editor - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site header:
 *      - css styles
 *      - external css files
 *      - the file 'plugins/site_editor/admin/css/style.site_editor.css'
 * CZ: Soubor vkládá další soubory do záhlaví webu:
 *      - css styly
 *      - externí css soubory
 *      - soubor 'plugins/site_editor/admin/css/style.site_editor.css'
 *
 */

if ($page == 'site-editor') {

  echo PHP_EOL . "\t";
  echo '<!-- Start CSS Site Editor -->';

  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Plugin Css style
  echo $Html->addStylesheet(BASE_URL_ORIG . 'plugins/site_editor/admin/css/style.site_editor.min.css');

  echo PHP_EOL . "\t";
  echo '<!-- End CSS Site Editor -->';

}

// New line in source code
echo PHP_EOL;
?>