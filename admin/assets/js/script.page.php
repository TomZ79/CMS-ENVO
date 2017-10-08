<?php
/*
 * AKP Pages - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'assets/js/script.page.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/script.page.js'
 *
 */

if ($page == 'page') {

  echo PHP_EOL . '<!-- Start JS AKP Pages -->';

  // Setting variable for Jquery external script
  ?>

  <script>
    // Add to Global settings javascript object
    globalSettings['pageID2'] = <?php echo (!empty($page2) && is_numeric($page2) ? $page2 : '""'); ?>;
  </script>

  <?php

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Plugin ACE Editor
  echo $Html->addScript('assets/plugins/ace/ace.js');
  // Plugin Javascript
  echo $Html->addScript('assets/js/script.page.min.js');

  echo PHP_EOL . '<!-- End JS AKP Pages -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>
