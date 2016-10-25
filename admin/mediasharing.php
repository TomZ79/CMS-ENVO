<?php

// Check if the file is accessed only via index.php if not stop the script from running
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die('You cannot access this file directly.');

// Check if the user has access to this file
if (!JAK_USERID || !$JAK_MODULES) jak_redirect(BASE_URL);

// reset
$success = array();

// Important template Stuff
$JAK_SETTING = jak_get_setting('mediasharing');

// Let's go on with the script
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $defaults = $_POST;

  if (isset($defaults['save'])) {


    if (count($errors) == 0) {

      // Do the dirty work in mysql
      $result = $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
        WHEN "md_facebook" THEN "' . smartsql($defaults['jak_md_facebook']) . '"
        WHEN "md_googleplus" THEN "' . smartsql($defaults['jak_md_googleplus']) . '"
        WHEN "md_instagram" THEN "' . smartsql($defaults['jak_md_instagram']) . '"
        WHEN "md_twitter" THEN "' . smartsql($defaults['jak_md_twitter']) . '"
        WHEN "md_youtube" THEN "' . smartsql($defaults['jak_md_youtube']) . '"
        WHEN "md_vimeo" THEN "' . smartsql($defaults['jak_md_vimeo']) . '"
        WHEN "md_email" THEN "' . smartsql($defaults['jak_md_email']) . '"
        WHEN "md_mediaSize" THEN "' . smartsql($defaults['jak_mediaSize']) . '"
        WHEN "md_iconSize" THEN "' . smartsql($defaults['jak_iconSize']) . '"
        WHEN "md_mediatheme" THEN "' . smartsql($defaults['jak_mediatheme']) . '"
        WHEN "md_mediahover" THEN "' . smartsql($defaults['jak_mediahover']) . '"
    END
    	WHERE varname IN ("md_facebook","md_googleplus","md_instagram","md_twitter","md_youtube","md_vimeo","md_email","md_mediaSize","md_iconSize","md_mediatheme","md_mediahover")');

      if (!$result) {
        jak_redirect(BASE_URL . 'index.php?p=mediasharing&sp=e');
      } else {
        jak_redirect(BASE_URL . 'index.php?p=mediasharing&sp=s');
      }
    } else {

      $errors['e'] = $tl['error']['e'];
      $errors = $errors;
    }

  }
}

// Title and Description
$SECTION_TITLE = "Social Media Sharing";
$SECTION_DESC = "Setting for sharing on social networks";

// Call the template
$template = 'mediasharing.php';
?>