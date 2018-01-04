<?php
/*
 * PLUGIN Blog - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site header:
 *      - css styles
 *      - external css files
 *      - the file 'plugins/blog/admin/css/style.blog.css'
 * CZ: Soubor vkládá další soubory do záhlaví webu:
 *      - css styly
 *      - externí css soubory
 *      - soubor 'plugins/blog/admin/css/style.blog.css'
 *
 */

if ($page == 'blog') {

  echo PHP_EOL . "\t";
  echo '<!-- Start CSS Blog -->';

  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Plugin DataTable
  echo $Html->addStylesheet('https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css');
  // Plugin Css style
  echo $Html->addStylesheet(BASE_URL_ORIG . 'plugins/blog/admin/css/style.blog.min.css');

  echo PHP_EOL . "\t";
  echo '<!-- End CSS Blog -->';

}

// New line in source code
echo PHP_EOL;
?>