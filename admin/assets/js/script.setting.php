<?php
/*
 * AKP Setting - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'assets/js/script.setting.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/script.setting.js'
 *
 */

if ($page == 'setting') {

  echo PHP_EOL . '<!-- Start JS AKP Setting -->';

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Plugin Javascript
  echo $Html->addScript('assets/js/script.setting.js');

  echo PHP_EOL . '<!-- End JS AKP Setting -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>

<style>
  .cookie-consent-configurator {
    margin-top: 15px;
  }

  .cookie-consent-configurator .input-hidden {
    position: absolute;
    left: -9999px;
  }

  .cookie-consent-configurator input[type="radio"] + label {
    padding: 3px;
    border: 1px solid transparent;
  }

  .cookie-consent-configurator input[type="radio"]:checked + label {
    border-color: #1f323c;
  }

  .cookie-consent-configurator input[type=radio]:hover + label {
    border-color: rgba(31, 50, 60, .5);
    cursor: pointer
  }

  .theme-preview-container {
    background: black;
    height: 30px;
    width: 45px;
    padding: 5px;
  }

  .theme-preview-button {
    background: white;
    height: 10px;
    width: 15px;
    margin-top: 10px;
    margin-left: 20px;
  }
</style>
