<?php

// EN: Start a PHP Session
// CZ: Start PHP Session
session_start();

// EN: Set template dir
// CZ: Nastavení složky šablony
$templatedir = '/template/' . $row['value'];

// EN: Set language file
// CZ: Nastavení jazykového souboru
$langdir     = '..' . $templatedir . '/lang/';
$langfile    = $langdir . $site_language . '.ini';

// EN: Check if folder is writable
// CZ: Kontrola zda je lze zapisovat do složky
if (!is_writable ($phpdir) || !is_writable ($langdir)) {
  $ENVO_FILE_ERROR = 1;
}

// EN: Save data from Form to DB (method POST)
// CZ: Uložení data z Formuláře do DB (metoda POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // EN: Default Variable
  // CZ: Hlavní proměnné
  $defaults = $_POST;

	$result1 = $envodb->query ('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
     
      WHEN "HeLogo1Carzone_tpl" THEN "' . smartsql ($defaults['HeLogo1']) . '"
      WHEN "HeLogo2Carzone_tpl" THEN "' . smartsql ($defaults['HeLogo2']) . '"
      WHEN "PageTitleImg_tpl" THEN "' . smartsql ($defaults['PageTitleImg']) . '"
      WHEN "FoLogo1Carzone_tpl" THEN "' . smartsql ($defaults['FoLogo1']) . '"
      
      WHEN "skin_Carzone_tpl" THEN "' . smartsql ($defaults['skinCarzone']) . '"
      WHEN "HeActiveSticky_carzone_tpl" THEN "' . smartsql ($defaults['HeActiveSticky']) . '"
      WHEN "HeShowTopbar_carzone_tpl" THEN "' . smartsql ($defaults['HeShowTopbar']) . '"
      WHEN "skinCarzoneTopbar_tpl" THEN "' . smartsql ($defaults['skinCarzoneTopbar']) . '"
      WHEN "HeShowLinks1_carzone_tpl" THEN "' . smartsql ($defaults['HeShowLinks1']) . '"
      WHEN "HeLinks1_carzone_tpl" THEN "' . smartsql ($defaults['HeLinks1']) . '"
      WHEN "HeText1_carzone_tpl" THEN "' . smartsql ($defaults['HeText1']) . '"
      WHEN "HeShowLinks2_carzone_tpl" THEN "' . smartsql ($defaults['HeShowLinks2']) . '"
      WHEN "HeLinks2_carzone_tpl" THEN "' . smartsql ($defaults['HeLinks2']) . '"
      WHEN "HeText2_carzone_tpl" THEN "' . smartsql ($defaults['HeText2']) . '"
      WHEN "HeShowLogin_carzone_tpl" THEN "' . smartsql ($defaults['HeShowLogin']) . '"
      WHEN "HeShowEmail_carzone_tpl" THEN "' . smartsql ($defaults['HeShowEmail']) . '"
      WHEN "HeEmailLinks_carzone_tpl" THEN "' . smartsql ($defaults['HeEmailLinks']) . '"
      WHEN "HeEmailText_carzone_tpl" THEN "' . smartsql ($defaults['HeEmailText']) . '"
      
      WHEN "facebookHeShow_carzone_tpl" THEN "' . smartsql ($defaults['facebookHeShow']) . '"
      WHEN "facebookHeLinks_carzone_tpl" THEN "' . smartsql ($defaults['facebookHeLinks']) . '"
      WHEN "youtubeHeShow_carzone_tpl" THEN "' . smartsql ($defaults['youtubeHeShow']) . '"
      WHEN "youtubeHeLinks_carzone_tpl" THEN "' . smartsql ($defaults['youtubeHeLinks']) . '"
      WHEN "twitterHeShow_carzone_tpl" THEN "' . smartsql ($defaults['twitterHeShow']) . '"
      WHEN "twitterHeLinks_carzone_tpl" THEN "' . smartsql ($defaults['twitterHeLinks']) . '"
      WHEN "googleHeShow_carzone_tpl" THEN "' . smartsql ($defaults['googleHeShow']) . '"
      WHEN "googleHeLinks_carzone_tpl" THEN "' . smartsql ($defaults['googleHeLinks']) . '"
      WHEN "linkedinHeShow_carzone_tpl" THEN "' . smartsql ($defaults['linkedinHeShow']) . '"
      WHEN "linkedinHeLinks_carzone_tpl" THEN "' . smartsql ($defaults['linkedinHeLinks']) . '"

      WHEN "facebookFoShow_carzone_tpl" THEN "' . smartsql ($defaults['facebookFoShow']) . '"
      WHEN "facebookFoLinks_carzone_tpl" THEN "' . smartsql ($defaults['facebookFoLinks']) . '"
      WHEN "youtubeFoShow_carzone_tpl" THEN "' . smartsql ($defaults['youtubeFoShow']) . '"
      WHEN "youtubeFoLinks_carzone_tpl" THEN "' . smartsql ($defaults['youtubeFoLinks']) . '"
      WHEN "twitterFoShow_carzone_tpl" THEN "' . smartsql ($defaults['twitterFoShow']) . '"
      WHEN "twitterFoLinks_carzone_tpl" THEN "' . smartsql ($defaults['twitterFoLinks']) . '"
      WHEN "googleFoShow_carzone_tpl" THEN "' . smartsql ($defaults['googleFoShow']) . '"
      WHEN "googleFoLinks_carzone_tpl" THEN "' . smartsql ($defaults['googleFoLinks']) . '"
      WHEN "linkedinFoShow_carzone_tpl" THEN "' . smartsql ($defaults['linkedinFoShow']) . '"
      WHEN "linkedinFoLinks_carzone_tpl" THEN "' . smartsql ($defaults['linkedinFoLinks']) . '"
            
      END
        WHERE varname IN ("HeLogo1Carzone_tpl", "HeLogo2Carzone_tpl", "PageTitleImg_tpl", "FoLogo1Carzone_tpl", "skin_Carzone_tpl", "HeActiveSticky_carzone_tpl","HeShowTopbar_carzone_tpl", "skinCarzoneTopbar_tpl", "HeShowLinks1_carzone_tpl", "HeLinks1_carzone_tpl", "HeText1_carzone_tpl", "HeShowLinks2_carzone_tpl", "HeLinks2_carzone_tpl", "HeText2_carzone_tpl", "HeShowLogin_carzone_tpl", "HeShowEmail_carzone_tpl", "HeEmailLinks_carzone_tpl", "HeEmailText_carzone_tpl",  "facebookHeShow_carzone_tpl", "facebookHeLinks_carzone_tpl", "youtubeHeShow_carzone_tpl", "youtubeHeLinks_carzone_tpl", "twitterHeShow_carzone_tpl", "twitterHeLinks_carzone_tpl", "googleHeShow_carzone_tpl", "googleHeLinks_carzone_tpl", "linkedinHeShow_carzone_tpl", "linkedinHeLinks_carzone_tpl", "facebookFoShow_carzone_tpl", "facebookFoLinks_carzone_tpl", "youtubeFoShow_carzone_tpl", "youtubeFoLinks_carzone_tpl", "twitterFoShow_carzone_tpl", "twitterFoLinks_carzone_tpl", "googleFoShow_carzone_tpl", "googleFoLinks_carzone_tpl", "linkedinFoShow_carzone_tpl", "linkedinFoLinks_carzone_tpl" )');

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

}

if ($result1) {
	// EN: Redirect page
	// CZ: Přesměrování stránky
  envo_redirect (BASE_URL . 'index.php?p=template&sp=settings&status=s');
}

// Get data for template
$result = $envodb->query ('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE product = "tpl_carzone"');
while ($row = $result->fetch_assoc ()) {
	// Now check if sting contains html and do something about it!
	if (strlen ($row['value']) != strlen (filter_var ($row['value'], FILTER_SANITIZE_STRING))) {
		$defvar = htmlspecialchars_decode (htmlspecialchars ($row['value']));
	} else {
		$defvar = $row['value'];
	}

	$envotpl[ $row['varname'] ] = $defvar;
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
$_SESSION['acemode']='ini';

?>