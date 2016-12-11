<?php

// Check if the file is accessed only via index.php if not stop the script from running
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die('You cannot access this file directly.');

// Check if the user has access to this file
if (!JAK_USERID || !$JAK_MODULES) jak_redirect(BASE_URL);

// Title and Description
$SECTION_TITLE = $tl["cmenumenu_cmd"]["c1"];
$SECTION_DESC = $tl["cmdesc_cmd"]["d1"];

// Call the template
$template = 'changelog.php';

?>