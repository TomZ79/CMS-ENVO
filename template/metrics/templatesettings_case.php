<?php

// EN: Set template dir
// CZ: Nastavení složky šablony
$templatedir = '/template/' . $row['value'];

// EN: Set php file
// CZ: Nastavení php souboru
$phpdir     = '..' . $templatedir . '/js/';
$phpfile    = $phpdir . 'metrics-revolutionSlider.php';

// EN: Set language file
// CZ: Nastavení jazykového souboru
$langdir     = '..' . $templatedir . '/lang/';
$langfile    = $langdir . $site_language . '.ini';

// EN: Check if folder is writable
// CZ: Kontrola zda je lze zapisovat do složky
if (!is_writable ($phpdir) || !is_writable ($langdir)) {
  $JAK_FILE_ERROR = 1;
}

// EN: Save data from Form to DB (method POST)
// CZ: Uložení data z Formuláře do DB (metoda POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // EN: Default Variable
  // CZ: Hlavní proměnné
  $defaults = $_POST;

	$result1 = $jakdb->query ('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname

      WHEN "header_metrics_tpl" THEN "' . smartsql ($defaults['headerMetrics']) . '"
      
      WHEN "sitemapShow_metrics_tpl" THEN "' . smartsql ($defaults['sitemapShow']) . '"
			WHEN "sitemapLinks_metrics_tpl" THEN "' . smartsql ($defaults['sitemapLinks']) . '"
			WHEN "loginShow_metrics_tpl" THEN "' . smartsql ($defaults['loginShow']) . '"
			WHEN "logo1_metrics_tpl" THEN "' . smartsql ($defaults['standardlogo1']) . '"
      WHEN "facebookheaderShow_metrics_tpl" THEN "' . smartsql ($defaults['facebookheaderShow1']) . '"
      WHEN "facebookheaderLinks_metrics_tpl" THEN "' . smartsql ($defaults['facebookheaderLinks1']) . '"
      WHEN "twitterheaderShow_metrics_tpl" THEN "' . smartsql ($defaults['twitterheaderShow1']) . '"
      WHEN "twitterheaderLinks_metrics_tpl" THEN "' . smartsql ($defaults['twitterheaderLinks1']) . '"
      WHEN "googleheaderShow_metrics_tpl" THEN "' . smartsql ($defaults['googleheaderShow1']) . '"
      WHEN "googleheaderLinks_metrics_tpl" THEN "' . smartsql ($defaults['googleheaderLinks1']) . '"
      WHEN "instagramheaderShow_metrics_tpl" THEN "' . smartsql ($defaults['instagramheaderShow1']) . '"
      WHEN "instagramheaderLinks_metrics_tpl" THEN "' . smartsql ($defaults['instagramheaderLinks1']) . '"
      WHEN "phoneheaderShow_metrics_tpl" THEN "' . smartsql ($defaults['phoneheaderShow1']) . '"
      WHEN "phoneheaderLinks_metrics_tpl" THEN "' . smartsql ($defaults['phoneheaderLinks1']) . '"
      WHEN "emailheaderShow_metrics_tpl" THEN "' . smartsql ($defaults['emailheaderShow1']) . '"
      WHEN "emailheaderLinks_metrics_tpl" THEN "' . smartsql ($defaults['emailheaderLinks1']) . '"
      WHEN "buttonheaderShow_metrics_tpl" THEN "' . smartsql ($defaults['buttonheaderShow1']) . '"
      WHEN "buttonheaderText_metrics_tpl" THEN "' . smartsql ($defaults['buttonheaderText1']) . '"
      WHEN "buttonheaderLinks_metrics_tpl" THEN "' . smartsql ($defaults['buttonheaderLinks1']) . '"
			
      WHEN "footerblocktext1_metrics_tpl" THEN "' . smartsql ($defaults['footerblocktext1']) . '"
      WHEN "footerblocktext2_metrics_tpl" THEN "' . smartsql ($defaults['footerblocktext2']) . '"
      
      WHEN "socialfooterText_metrics_tpl" THEN "' . smartsql ($defaults['socialfooterText']) . '"
      WHEN "logo2_metrics_tpl" THEN "' . smartsql ($defaults['standardlogo2']) . '"
      WHEN "facebookfooterShow_metrics_tpl" THEN "' . smartsql ($defaults['facebookfooterShow']) . '"
      WHEN "facebookfooterLinks_metrics_tpl" THEN "' . smartsql ($defaults['facebookfooterLinks']) . '"
      WHEN "twitterfooterShow_metrics_tpl" THEN "' . smartsql ($defaults['twitterfooterShow']) . '"
      WHEN "twitterfooterLinks_metrics_tpl" THEN "' . smartsql ($defaults['twitterfooterLinks']) . '"
      WHEN "googlefooterShow_metrics_tpl" THEN "' . smartsql ($defaults['googlefooterShow']) . '"
      WHEN "googlefooterLinks_metrics_tpl" THEN "' . smartsql ($defaults['googlefooterLinks']) . '"
      WHEN "instagramfooterShow_metrics_tpl" THEN "' . smartsql ($defaults['instagramfooterShow']) . '"
      WHEN "instagramfooterLinks_metrics_tpl" THEN "' . smartsql ($defaults['instagramfooterLinks']) . '"
      
      END
        WHERE varname IN ("header_metrics_tpl", "sitemapShow_metrics_tpl", "sitemapLinks_metrics_tpl", "loginShow_metrics_tpl", "logo1_metrics_tpl", "facebookheaderShow_metrics_tpl", "facebookheaderLinks_metrics_tpl", "twitterheaderShow_metrics_tpl", "twitterheaderLinks_metrics_tpl", "googleheaderShow_metrics_tpl", "googleheaderLinks_metrics_tpl", "instagramheaderShow_metrics_tpl", "instagramheaderLinks_metrics_tpl", "phoneheaderShow_metrics_tpl", "phoneheaderLinks_metrics_tpl", "emailheaderShow_metrics_tpl", "emailheaderLinks_metrics_tpl", "buttonheaderShow_metrics_tpl", "buttonheaderLinks_metrics_tpl", "footerblocktext1_metrics_tpl", "footerblocktext2_metrics_tpl", "socialfooterText_metrics_tpl", "logo2_metrics_tpl", "facebookfooterShow_metrics_tpl", "facebookfooterLinks_metrics_tpl", "twitterfooterShow_metrics_tpl", "twitterfooterLinks_metrics_tpl", "googlefooterShow_metrics_tpl", "googlefooterLinks_metrics_tpl", "instagramfooterShow_metrics_tpl", "instagramfooterLinks_metrics_tpl" )');

  // EN: Save php file
  // CZ: Uložení php souboru
  $openfedit = fopen ($defaults['jak_file4'], "w+");
  $datasave  = $defaults['jak_filecontent4'];
  $datasave  = preg_replace ('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
  $datasave  = stripslashes ($datasave);
  if (fwrite ($openfedit, $datasave)) {
    $JAK_FILE_SUCCESS = 1;
  }

  fclose ($openfedit);

  // EN: Save lang file
  // CZ: Uložení jazykového souboru
  $openfedit = fopen ($defaults['jak_file'], "w+");
  $datasave  = $defaults['jak_filecontent'];
  $datasave  = preg_replace ('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
  $datasave  = stripslashes ($datasave);
  if (fwrite ($openfedit, $datasave)) {
    $JAK_FILE_SUCCESS = 1;
  }

  fclose ($openfedit);
}

if ($result1) {
	// EN: Redirect page
	// CZ: Přesměrování stránky
  envo_redirect (BASE_URL . 'index.php?p=template&sp=settings&status=s');
}

// Reset the database settings so we have it unique
$result = $jakdb->query ('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE product = "tpl_metrics"');
while ($row1 = $result->fetch_assoc ()) {
	// Now check if sting contains html and do something about it!
	if (strlen ($row1['value']) != strlen (filter_var ($row1['value'], FILTER_SANITIZE_STRING))) {
		$defvar = htmlspecialchars_decode (htmlspecialchars ($row1['value']));
	} else {
		$defvar = $row1["value"];
	}

	$jktpl[ $row1['varname'] ] = $defvar;
}

// Open php file
if (file_exists ($phpfile)) {
  $openfile        = fopen ($phpfile, 'r');
  $filecontent     = @fread ($openfile, filesize ($phpfile));
  $displaycontent  = preg_replace ('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
  $JAK_FILECONTENT = $displaycontent;
  $JAK_FILEURL     = $phpfile;

  fclose ($openfile);
}

// Open language file
if (file_exists ($langfile)) {
  $openfile1        = fopen ($langfile, 'r');
  $filecontent1     = @fread ($openfile1, filesize ($langfile));
  $displaycontent1  = preg_replace ('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent1);
  $JAK_FILECONTENT1 = $displaycontent1;
  $JAK_FILEURL1     = $langfile;

  fclose ($openfile1);
}

// EN: Set ACE Editor mode
// CZ: Nastavení módu ACE Editoru
$acemode2 = 'html';
$acemode3 = 'html';
$acemode4 = 'html';

?>