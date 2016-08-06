<?php

// Check if the file is accessed only via index.php if not stop the script from running
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die('You cannot access this file directly.');

// Check if the user has access to this file
if (!JAK_USERID || !$jakuser->jakModuleaccess(JAK_USERID, $jkv["accessmanage"])) jak_redirect(BASE_URL);




// Title and Description
$SECTION_TITLE = "Site Editor";
$SECTION_DESC = "Edit your basic site files - .htaccess and robots.txt";

// Call the template
$plugin_template = 'plugins/site_editor/admin/template/site_editor.php';
?>