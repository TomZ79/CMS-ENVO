<?php
/*
 * AKP Setting Facebook - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'assets/js/script.settingfacebook.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/script.settingfacebook.js'
 *
 */

if ($page == 'settingfacebook') {

  echo PHP_EOL . '<!-- Start JS AKP Setting Facebook -->';

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Plugin ACE Editor
  echo $Html->addScript('assets/plugins/ace/ace.js');
  // Plugin Javascript
  echo $Html->addScript('assets/js/script.settingfacebook.js');

  echo PHP_EOL . '<!-- End JS AKP Setting Facebook -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>
