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
 *      - the file 'assets/js/script.plugins.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/script.plugins.js'
 *
 */

if ($page == 'plugins') {

  echo PHP_EOL . '<!-- Start JS AKP Plugins -->';

  // Setting variable for Jquery external script
  ?>

  <script>
    // Add to Global settings javascript object
    globalSettings['pageID2'] = <?=(!empty($page2) && is_numeric($page2) ? $page2 : '""')?>;
  </script>

  <?php

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Load 'ace.js'  - only for selected pages
  if (($page1 == 'hooks' && $page2 == 'newhook' || ($page1 == 'hooks' && $page2 == 'edithook'))) {
    // Plugin ACE Editor
    echo $Html->addScript('assets/plugins/ace/ace.js');
  }
  // Load 'pluginorder.js'  - only for selected pages
  if ($page == 'plugins' && $page1 == '') {
    // Plugin ACE Editor
    echo $Html->addScript('assets/js/global_js/pluginorder.min.js');
  }
  // Load 'hookorder.js'  - only for selected pages
  if ($page1 == 'hooks' && $page2 == 'sorthooks') {
    // Plugin ACE Editor
    echo $Html->addScript('assets/js/global_js/hookorder.min.js');
  }
  // Plugin Javascript
  echo $Html->addScript('assets/js/script.plugins.min.js');

  echo PHP_EOL . '<!-- End JS AKP Plugins -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>