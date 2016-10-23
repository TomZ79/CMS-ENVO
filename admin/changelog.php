<?php

// Check if the file is accessed only via index.php if not stop the script from running
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die('You cannot access this file directly.');

// Check if the user has access to this file
if (!JAK_USERID || !$JAK_MODULES) jak_redirect(BASE_URL);

switch ($page1) {
  default:

    // Title and Description
    $SECTION_TITLE = "Changelog";
    $SECTION_DESC = "All notable changes made to a project";

    // Call the template
    $template = 'changelog.php';
}
?>