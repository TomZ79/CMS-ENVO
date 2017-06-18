<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$jakuser->jakModuleaccess(JAK_USERID, JAK_ACCESSBLOG)) jak_redirect(BASE_URL);

// Now start with the plugin use a switch to access all pages
switch ($page1) {

  case 'setting':

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (count($errors) == 0) {
        // Do the dirty work in mysql
        $result = $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
		    	WHEN "digitalhousetitle" THEN "' . smartsql($defaults['jak_title']) . '"
		    END
				WHERE varname IN ("digitalhousetitle")');

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=digital-house&sp=setting&ssp=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=digital-house&sp=setting&ssp=s');
        }
      } else {
        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // EN: Import important settings for the template from the DB
    // CZ: Importuj důležité nastavení pro šablonu z DB
    $JAK_SETTING = jak_get_setting('digitalhouse');

    // EN: Import important settings for the template from the DB (only VALUE)
    // CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
    $JAK_SETTING_VAL = jak_get_setting_val('digitalhouse');

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tldh["dh_sec_title"]["dht"];
    $SECTION_DESC  = $tldh["dh_sec_desc"]["dhd"];

    // EN: Load the template
    // CZ: Načti template (šablonu)
    $plugin_template = 'plugins/digital_house/admin/template/digitalhousesetting.php';

    break;
  default:

}
?>