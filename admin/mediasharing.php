<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined ('JAK_ADMIN_PREVENT_ACCESS')) die('You cannot access this file directly.');

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$JAK_MODULES) jak_redirect (BASE_URL);

// EN: Reset Array (output the error in a array)
// CZ: Reset Pole (výstupní chyby se ukládají do pole)
$success = array ();

// EN: Import important settings for the template from the DB
// CZ: Importuj důležité nastavení pro šablonu z DB
$JAK_SETTING = jak_get_setting ('mediasharing');

// Let's go on with the script
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$defaults = $_POST;

	if (isset($defaults['save'])) {


		if (count ($errors) == 0) {

			// Do the dirty work in mysql
			$result = $jakdb->query ('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
																	WHEN "md_facebook" THEN "' . smartsql ($defaults['jak_md_facebook']) . '"
																	WHEN "md_googleplus" THEN "' . smartsql ($defaults['jak_md_googleplus']) . '"
																	WHEN "md_instagram" THEN "' . smartsql ($defaults['jak_md_instagram']) . '"
																	WHEN "md_twitter" THEN "' . smartsql ($defaults['jak_md_twitter']) . '"
																	WHEN "md_youtube" THEN "' . smartsql ($defaults['jak_md_youtube']) . '"
																	WHEN "md_vimeo" THEN "' . smartsql ($defaults['jak_md_vimeo']) . '"
																	WHEN "md_email" THEN "' . smartsql ($defaults['jak_md_email']) . '"
																	WHEN "md_mediaSize" THEN "' . smartsql ($defaults['jak_mediaSize']) . '"
																	WHEN "md_iconSize" THEN "' . smartsql ($defaults['jak_iconSize']) . '"
																	WHEN "md_mediatheme" THEN "' . smartsql ($defaults['jak_mediatheme']) . '"
																	WHEN "md_mediahover" THEN "' . smartsql ($defaults['jak_mediahover']) . '"
															END
																WHERE varname IN ("md_facebook","md_googleplus","md_instagram","md_twitter","md_youtube","md_vimeo","md_email","md_mediaSize","md_iconSize","md_mediatheme","md_mediahover")');

			if (!$result) {
				// EN: Redirect page
				// CZ: Přesměrování stránky
				jak_redirect (BASE_URL . 'index.php?p=mediasharing&sp=e');
			} else {
				// EN: Redirect page
				// CZ: Přesměrování stránky
				jak_redirect (BASE_URL . 'index.php?p=mediasharing&sp=s');
			}
		} else {

			$errors['e'] = $tl['error']['e'];
			$errors      = $errors;
		}

	}
}

// EN: Title and Description
// CZ: Titulek a Popis
$SECTION_TITLE = $tl["sms_sec_title"]["smst"];
$SECTION_DESC  = $tl["sms_sec_desc"]["smsd"];

// EN: Load the template
// CZ: Načti template (šablonu)
$template = 'mediasharing.php';
?>