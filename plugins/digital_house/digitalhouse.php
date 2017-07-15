<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

$CHECK_USR_SESSION = session_id();

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'XXXX':

    break;
  default:

    // Check if we have a language and display the right stuff
    $PAGE_TITLE              = $jkv["digitalhousetitle"];
    $MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
    $MAIN_SITE_DESCRIPTION   = $jkv['metadesc'];

    // SEO from the category content if available
    if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
      $PAGE_DESCRIPTION = envo_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
    } else {
      $PAGE_DESCRIPTION = envo_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
    }

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $pluginbasic_template = 'plugins/digital_house/template/digitalhouse.php';
    $pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/digital_house/digitalhouse.php';

    if (file_exists($pluginsite_template)) {
      $plugin_template = $pluginsite_template;
    } else {
      $plugin_template = $pluginbasic_template;
    }

}
?>