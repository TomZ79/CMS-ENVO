<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined ('JAK_ADMIN_PREVENT_ACCESS')) die('You cannot access this file directly.');

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$JAK_MODULES) jak_redirect (BASE_URL);

// EN: Title and Description
// CZ: Titulek a Popis
$SECTION_TITLE = $tl["ch_sec_title"]["cht"];
$SECTION_DESC  = $tl["ch_sec_desc"]["chd"];

// EN: Load the template
// CZ: Načti template (šablonu)
$template = 'changelog.php';

?>