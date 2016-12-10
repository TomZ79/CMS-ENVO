<?php

/*===============================================*\
|| ############################################# ||
|| # JAKWEB.CH                                 # ||
|| # ----------------------------------------- # ||
|| # Copyright 2016 JAKWEB All Rights Reserved # ||
|| ############################################# ||
\*===============================================*/

// Check if the file is accessed only via index.php if not stop the script from running
if(!defined('JAK_ADMIN_PREVENT_ACCESS')) die('You cannot access this file directly.');

// Check if the user has access to this file
if (!JAK_USERID || !$jakuser->jakModuleaccess(JAK_USERID, JAK_ACCESSOWL)) jak_redirect(BASE_URL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$defaults = $_POST;

	// Do the dirty work in mysql
	$result = $jakdb->query('UPDATE '.DB_PREFIX.'setting SET value = CASE varname
		WHEN "owltitle" THEN "'.smartsql($defaults['jak_title']).'"
		WHEN "owldbhost" THEN "'.smartsql($defaults['jak_host']).'"
		WHEN "owldbport" THEN "'.smartsql($defaults['jak_port']).'"
		WHEN "owldbuser" THEN "'.smartsql($defaults['jak_user']).'"
		WHEN "owldbpass" THEN "'.smartsql($defaults['jak_pass']).'"
		WHEN "owldbname" THEN "'.smartsql($defaults['jak_dbname']).'"
		WHEN "owldbprefix" THEN "'.smartsql($defaults['jak_prefix']).'"
		WHEN "owldblimit" THEN "'.smartsql($defaults['jak_limit']).'"
	END
		WHERE varname IN ("owltitle","owldbhost","owldbport","owldbuser","owldbpass","owldbname","owldbprefix","owldblimit")');
	
	if (!$result) {
		jak_redirect(BASE_URL.'index.php?p=owl&sp=e');
	} else {
		jak_redirect(BASE_URL.'index.php?p=owl&sp=s');
	}
}

// Get the title in a nice format
$JAK_FORM_DATA["title"] = $jkv["owltitle"];		

// Title and Description
$SECTION_TITLE = $tlowl["owl"]["m"];
$SECTION_DESC = $tlowl["owl"]["t"];
			
// Call the template
$plugin_template = 'plugins/owl/admin/template/settings.php';
?>