<?php
/*
 * AKP Changelog - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'assets/js/script.changelog.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/script.changelog.js'
 *
 */

if ($page == 'changelog') {

  echo PHP_EOL . '<!-- Start JS AKP Changelog -->';

  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Code-prettify CSS
  echo $Html->addStylesheet('assets/plugins/code-prettify-master/themes/github/github.min.css');

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Code-prettify JS
  echo $Html->addScript('assets/plugins/code-prettify-master/src/prettify.js');
  // Plugin Javascript
  echo $Html->addScript('assets/js/script.changelog.min.js');

  ?>

  <script>
    // Init Code-Prettify
    window.onload = (function () {
      prettyPrint();
    });
  </script>

  <?php

  echo PHP_EOL . '<!-- End JS AKP Changelog -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>

<style type="text/css">
  body {
    position: relative;
  }

  .scrollspyoffset {
    padding-top: 56px;
    margin-top: -56px;
  }
</style>
