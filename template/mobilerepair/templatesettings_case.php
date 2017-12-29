<?php

// EN: Set template dir
// CZ: Nastavení složky šablony
$templatedir = '/template/' . $row['value'];

// EN: Set language file
// CZ: Nastavení jazykového souboru
$langdir     = '..' . $templatedir . '/lang/';
$langfile    = $langdir . $site_language . '.ini';

// EN: Check if folder is writable
// CZ: Kontrola zda je lze zapisovat do složky
if (!is_writable ($langdir)) {
  $ENVO_FILE_ERROR = 1;
}

// EN: Save data from Form to DB (method POST)
// CZ: Uložení data z Formuláře do DB (metoda POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // EN: Default Variable
  // CZ: Hlavní proměnné
  $defaults = $_POST;

	$result1 = $envodb->query ('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname

      WHEN "mininav_text_mobilerepair_tpl" THEN "' . smartsql ($defaults['envo_mininav_text']) . '"
      
      WHEN "logo1_mobilerepair_tpl" THEN "' . smartsql ($defaults['standardlogo1']) . '"
      WHEN "facebookheaderShow_mobilerepair_tpl" THEN "' . smartsql ($defaults['facebookheaderShow1']) . '"
      WHEN "facebookheaderLinks_mobilerepair_tpl" THEN "' . smartsql ($defaults['facebookheaderLinks1']) . '"
      WHEN "twitterheaderShow_mobilerepair_tpl" THEN "' . smartsql ($defaults['twitterheaderShow1']) . '"
      WHEN "twitterheaderLinks_mobilerepair_tpl" THEN "' . smartsql ($defaults['twitterheaderLinks1']) . '"
      WHEN "googleheaderShow_mobilerepair_tpl" THEN "' . smartsql ($defaults['googleheaderShow1']) . '"
      WHEN "googleheaderLinks_mobilerepair_tpl" THEN "' . smartsql ($defaults['googleheaderLinks1']) . '"
      WHEN "instagramheaderShow_mobilerepair_tpl" THEN "' . smartsql ($defaults['instagramheaderShow1']) . '"
      WHEN "instagramheaderLinks_mobilerepair_tpl" THEN "' . smartsql ($defaults['instagramheaderLinks1']) . '"
      WHEN "youtubeheaderShow_mobilerepair_tpl" THEN "' . smartsql ($defaults['youtubeheaderShow1']) . '"
      WHEN "youtubeheaderLinks_mobilerepair_tpl" THEN "' . smartsql ($defaults['youtubeheaderLinks1']) . '"
      WHEN "pinterestheaderShow_mobilerepair_tpl" THEN "' . smartsql ($defaults['pinterestheaderShow1']) . '"
      WHEN "pinterestheaderLinks_mobilerepair_tpl" THEN "' . smartsql ($defaults['pinterestheaderLinks1']) . '"
      WHEN "phoneheaderShow_mobilerepair_tpl" THEN "' . smartsql ($defaults['phoneheaderShow1']) . '"
      WHEN "phoneheaderLinks_mobilerepair_tpl" THEN "' . smartsql ($defaults['phoneheaderLinks1']) . '"
      WHEN "emailheaderShow_mobilerepair_tpl" THEN "' . smartsql ($defaults['emailheaderShow1']) . '"
      WHEN "emailheaderLinks_mobilerepair_tpl" THEN "' . smartsql ($defaults['emailheaderLinks1']) . '"
      
      WHEN "footerblocktext_mobilerepair_tpl" THEN "' . smartsql ($defaults['footerblocktext']) . '"
       WHEN "facebookfooterShow_mobilerepair_tpl" THEN "' . smartsql ($defaults['facebookfooterShow']) . '"
      WHEN "facebookfooterLinks_mobilerepair_tpl" THEN "' . smartsql ($defaults['facebookfooterLinks']) . '"
      WHEN "twitterfooterShow_mobilerepair_tpl" THEN "' . smartsql ($defaults['twitterfooterShow']) . '"
      WHEN "twitterfooterLinks_mobilerepair_tpl" THEN "' . smartsql ($defaults['twitterfooterLinks']) . '"
      WHEN "googlefooterShow_mobilerepair_tpl" THEN "' . smartsql ($defaults['googlefooterShow']) . '"
      WHEN "googlefooterLinks_mobilerepair_tpl" THEN "' . smartsql ($defaults['googlefooterLinks']) . '"
      WHEN "instagramfooterShow_mobilerepair_tpl" THEN "' . smartsql ($defaults['instagramfooterShow']) . '"
      WHEN "instagramfooterLinks_mobilerepair_tpl" THEN "' . smartsql ($defaults['instagramfooterLinks']) . '"
      
      WHEN "youtubefooterShow_mobilerepair_tpl" THEN "' . smartsql ($defaults['youtubefooterShow']) . '"
      WHEN "youtubefooterLinks_mobilerepair_tpl" THEN "' . smartsql ($defaults['youtubefooterLinks']) . '"
      WHEN "pinterestfooterShow_mobilerepair_tpl" THEN "' . smartsql ($defaults['pinterestfooterShow']) . '"
      WHEN "pinterestfooterLinks_mobilerepair_tpl" THEN "' . smartsql ($defaults['pinterestfooterLinks']) . '"
      
      END
        WHERE varname IN ("mininav_text_mobilerepair_tpl", "logo1_mobilerepair_tpl", "facebookheaderShow_mobilerepair_tpl", "facebookheaderLinks_mobilerepair_tpl", "twitterheaderShow_mobilerepair_tpl", "twitterheaderLinks_mobilerepair_tpl", "googleheaderShow_mobilerepair_tpl", "googleheaderLinks_mobilerepair_tpl", "instagramheaderShow_mobilerepair_tpl", "instagramheaderLinks_mobilerepair_tpl", "youtubeheaderShow_mobilerepair_tpl", "youtubeheaderLinks_mobilerepair_tpl", "pinterestheaderShow_mobilerepair_tpl", "pinterestheaderLinks_mobilerepair_tpl", "phoneheaderShow_mobilerepair_tpl", "phoneheaderLinks_mobilerepair_tpl", "emailheaderShow_mobilerepair_tpl", "emailheaderLinks_mobilerepair_tpl", "footerblocktext_mobilerepair_tpl", "facebookfooterShow_mobilerepair_tpl", "facebookfooterLinks_mobilerepair_tpl", "twitterfooterShow_mobilerepair_tpl", "twitterfooterLinks_mobilerepair_tpl", "googlefooterShow_mobilerepair_tpl", "googlefooterLinks_mobilerepair_tpl", "instagramfooterShow_mobilerepair_tpl", "instagramfooterLinks_mobilerepair_tpl", "youtubefooterShow_mobilerepair_tpl", "youtubefooterLinks_mobilerepair_tpl", "pinterestfooterShow_mobilerepair_tpl", "pinterestfooterLinks_mobilerepair_tpl" )');

  // EN: Save language file
  // CZ: Uložení jazykového souboru
  $openfedit = fopen ($defaults['envo_file'], "w+");
  $datasave  = $defaults['envo_filecontent'];
  $datasave  = preg_replace ('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
  $datasave  = stripslashes ($datasave);
  if (fwrite ($openfedit, $datasave)) {
    $ENVO_FILE_SUCCESS = 1;
  }

  fclose ($openfedit);

  if ($result1) {
    // EN: Redirect page
    // CZ: Přesměrování stránky
    envo_redirect (BASE_URL . 'index.php?p=template&sp=settings&status=s');
  }

}

// Reset the database settings so we have it unique
$result = $envodb->query ('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE product = "tpl_mobilerepair"');
while ($row1 = $result->fetch_assoc ()) {
	// Now check if sting contains html and do something about it!
	if (strlen ($row1['value']) != strlen (filter_var ($row1['value'], FILTER_SANITIZE_STRING))) {
		$defvar = htmlspecialchars_decode (htmlspecialchars ($row1['value']));
	} else {
		$defvar = $row1["value"];
	}

	$jktpl[ $row1['varname'] ] = $defvar;
}

// Open language file
if (file_exists ($langfile)) {
  $openfile        = fopen ($langfile, 'r');
  $filecontent     = @fread ($openfile, filesize ($langfile));
  $displaycontent  = preg_replace ('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
  $ENVO_FILECONTENT = $displaycontent;
  $ENVO_FILEURL     = $langfile;

  fclose ($openfile);
}

// EN: Set ACE Editor mode
// CZ: Nastavení módu ACE Editoru
$acemode2 = 'html';

?>