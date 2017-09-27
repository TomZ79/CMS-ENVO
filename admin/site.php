<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$ENVO_MODULES) envo_redirect(BASE_URL);

// Let's go on with the script
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // EN: Default Variable
  // CZ: Hlavní proměnné
  $defaults = $_POST;

  if (empty($defaults['envo_title'])) {
    $errors['e2'] = $tl['general_error']['generror11'] . '<br>';
  }

  if (count($errors) == 0) {

    /* EN: Convert value
     * smartsql - secure method to insert form data into a MySQL DB
     * ------------------
     * CZ: Převod hodnot
     * smartsql - secure method to insert form data into a MySQL DB
    */
    $result = $envodb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
                WHEN "offline" THEN ' . $defaults['envo_online'] . '
                WHEN "offline_page" THEN "' . smartsql($defaults['envo_offpage']) . '"
                WHEN "notfound_page" THEN "' . smartsql($defaults['envo_pagenotfound']) . '"
                WHEN "title" THEN "' . smartsql($defaults['envo_title']) . '"
                WHEN "metadesc" THEN "' . smartsql($defaults['envo_description']) . '"
                WHEN "metakey" THEN "' . smartsql($defaults['envo_keywords']) . '"
                WHEN "metaauthor" THEN "' . smartsql($defaults['envo_author']) . '"
                WHEN "robots" THEN ' . $defaults['envo_robots'] . '
                WHEN "copyright" THEN "' . smartsql($defaults['envo_copy']) . '"
              END
              WHERE varname IN ("offline","offline_page","notfound_page","title","metadesc","metakey","metaauthor","robots","copyright")');

    if (!$result) {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=site&status=e');
    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=site&status=s');
    }

  } else {

    $errors['e'] = $tl['general_error']['generror'] . '<br>';
    $errors      = $errors;

  }
}

// Offline page categories
$ENVO_CAT = envo_get_cat_info(DB_PREFIX . 'categories', 0);

// EN: Title and Description
// CZ: Titulek a Popis
$SECTION_TITLE = $tl["site_sec_title"]["sitet"];
$SECTION_DESC  = $tl["site_sec_desc"]["sited"];

// EN: Load the php template
// CZ: Načtení php template (šablony)
$template = 'site.php';

?>