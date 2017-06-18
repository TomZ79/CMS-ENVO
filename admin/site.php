<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$JAK_MODULES) jak_redirect(BASE_URL);

// Let's go on with the script
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // EN: Default Variable
  // CZ: Hlavní proměnné
  $defaults = $_POST;

  if (empty($defaults['jak_title'])) {
    $errors['e2'] = $tl['general_error']['generror11'] . '<br>';
  }

  if (count($errors) == 0) {

    // Do the dirty work in mysql
    $result = $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
	        WHEN "offline" THEN ' . $defaults['jak_online'] . '
	        WHEN "offline_page" THEN "' . smartsql($defaults['jak_offpage']) . '"
	        WHEN "notfound_page" THEN "' . smartsql($defaults['jak_pagenotfound']) . '"
	        WHEN "title" THEN "' . smartsql($defaults['jak_title']) . '"
	        WHEN "metadesc" THEN "' . smartsql($defaults['jak_description']) . '"
	        WHEN "metakey" THEN "' . smartsql($defaults['jak_keywords']) . '"
	        WHEN "metaauthor" THEN "' . smartsql($defaults['jak_author']) . '"
	        WHEN "robots" THEN ' . $defaults['jak_robots'] . '
	        WHEN "copyright" THEN "' . smartsql($defaults['jak_copy']) . '"
	    END
			WHERE varname IN ("offline","offline_page","notfound_page","title","metadesc","metakey","metaauthor","robots","copyright")');

    if (!$result) {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      jak_redirect(BASE_URL . 'index.php?p=site&sp=e');
    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      jak_redirect(BASE_URL . 'index.php?p=site&sp=s');
    }

  } else {

    $errors['e'] = $tl['general_error']['generror'] . '<br>';
    $errors      = $errors;

  }
}

// Offline page categories
$JAK_CAT = jak_get_cat_info(DB_PREFIX . 'categories', 0);

// EN: Title and Description
// CZ: Titulek a Popis
$SECTION_TITLE = $tl["site_sec_title"]["sitet"];
$SECTION_DESC  = $tl["site_sec_desc"]["sited"];

// EN: Load the template
// CZ: Načti template (šablonu)
$template = 'site.php';

?>