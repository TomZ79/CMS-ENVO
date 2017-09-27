<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$ENVO_MODULES) envo_redirect(BASE_URL);

// EN: Title and Description
// CZ: Titulek a Popis
$SECTION_TITLE = '';
$SECTION_DESC  = '';

// EN: Load the php template
// CZ: Načtení php template (šablony)
$template = 'help/cmshelp_' . $site_language . '.php';

?>