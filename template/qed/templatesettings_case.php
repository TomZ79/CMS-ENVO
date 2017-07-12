<?php

// EN: Set template dir
// CZ: Nastavení složky šablony
$templatedir = '/template/' . $row['value'];

// EN: Set language file
// CZ: Nastavení jazykového souboru
$langdir     = '..' . $templatedir . '/lang/';
$langfile    = $langdir . $site_language . '.ini';

if (!is_writable ($langdir)) {
	$JAK_FILE_ERROR = 1;
}

// EN: Save data from Form to DB (method POST)
// CZ: Uložení data z Formuláře do DB (metoda POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // EN: Default Variable
  // CZ: Hlavní proměnné
  $defaults = $_POST;

	$result1 = $jakdb->query ('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname

			WHEN "color_qed_tpl" THEN "' . smartsql ($defaults['colorQed']) . '"
			WHEN "header_qed_tpl" THEN "' . smartsql ($defaults['headerQed']) . '"
			WHEN "boxed_qed_tpl" THEN "' . smartsql ($defaults['boxedQed']) . '"
			WHEN "fsocialstyle_qed_tpl" THEN "' . smartsql ($defaults['fsocialstyleQed']) . '"
			WHEN "fsocialsize_qed_tpl" THEN "' . smartsql ($defaults['fsocialsizeQed']) . '"

			WHEN "sitemapShow_qed_tpl" THEN "' . smartsql ($defaults['sitemapShow']) . '"
			WHEN "sitemapLinks_qed_tpl" THEN "' . smartsql ($defaults['sitemapLinks']) . '"
			WHEN "loginShow_qed_tpl" THEN "' . smartsql ($defaults['loginShow']) . '"
			WHEN "facebookShow_qed_tpl" THEN "' . smartsql ($defaults['facebookShow']) . '"
      WHEN "facebookLinks_qed_tpl" THEN "' . smartsql ($defaults['facebookLinks']) . '"
      WHEN "twitterShow_qed_tpl" THEN "' . smartsql ($defaults['twitterShow']) . '"
      WHEN "twitterLinks_qed_tpl" THEN "' . smartsql ($defaults['twitterLinks']) . '"
      WHEN "googleShow_qed_tpl" THEN "' . smartsql ($defaults['googleShow']) . '"
      WHEN "googleLinks_qed_tpl" THEN "' . smartsql ($defaults['googleLinks']) . '"
      WHEN "instagramShow_qed_tpl" THEN "' . smartsql ($defaults['instagramShow']) . '"
      WHEN "instagramLinks_qed_tpl" THEN "' . smartsql ($defaults['instagramLinks']) . '"
      WHEN "phoneShow_qed_tpl" THEN "' . smartsql ($defaults['phoneShow']) . '"
      WHEN "phoneLinks_qed_tpl" THEN "' . smartsql ($defaults['phoneLinks']) . '"
      WHEN "emailShow_qed_tpl" THEN "' . smartsql ($defaults['emailShow']) . '"
      WHEN "emailLinks_qed_tpl" THEN "' . smartsql ($defaults['emailLinks']) . '"
      WHEN "logo1_qed_tpl" THEN "' . smartsql ($defaults['standardlogo']) . '"

      WHEN "activeroyalslider_qed_tpl" THEN "' . smartsql ($defaults['activeroyalslider']) . '"
      WHEN "arrowsNav_qed_tpl" THEN "' . smartsql ($defaults['arrowsNav']) . '"
      WHEN "arrowsNavAutoHide_qed_tpl" THEN "' . smartsql ($defaults['arrowsNavAutoHide']) . '"
      WHEN "arrowsNavHideOnTouch_qed_tpl" THEN "' . smartsql ($defaults['arrowsNavAutoHide']) . '"
      WHEN "controlNavigation_qed_tpl" THEN "' . smartsql ($defaults['controlNavigation']) . '"

      WHEN "enabledAU_qed_tpl" THEN "' . smartsql ($defaults['enabledAU']) . '"
      WHEN "pauseOnHoverAU_qed_tpl" THEN "' . smartsql ($defaults['pauseOnHoverAU']) . '"
      WHEN "delayAU_qed_tpl" THEN "' . smartsql ($defaults['delayAU']) . '"

      WHEN "autoScaleSlider_qed_tpl" THEN "' . smartsql ($defaults['autoScaleSlider']) . '"
      WHEN "autoScaleSliderWidth_qed_tpl" THEN "' . smartsql ($defaults['autoScaleSliderWidth']) . '"
      WHEN "autoScaleSliderHeight_qed_tpl" THEN "' . smartsql ($defaults['autoScaleSliderHeight']) . '"
      WHEN "imageAlignCenter_qed_tpl" THEN "' . smartsql ($defaults['imageAlignCenter']) . '"
      WHEN "imgWidth_qed_tpl" THEN "' . smartsql ($defaults['imgWidth']) . '"
      WHEN "imgHeight_qed_tpl" THEN "' . smartsql ($defaults['imgHeight']) . '"
      WHEN "numImagesToPreload_qed_tpl" THEN "' . smartsql ($defaults['numImagesToPreload']) . '"

      WHEN "fadeinLoadedSlide_qed_tpl" THEN "' . smartsql ($defaults['fadeinLoadedSlide']) . '"
      WHEN "transitionType_qed_tpl" THEN "' . smartsql ($defaults['transitionType']) . '"
      WHEN "transitionSpeed_qed_tpl" THEN "' . smartsql ($defaults['transitionSpeed']) . '"

      WHEN "onefooterblock_qed_tpl" THEN "' . smartsql ($defaults['onefooterblock']) . '"
      WHEN "onefooterblocktext_qed_tpl" THEN "' . smartsql ($defaults['onefooterblocktext']) . '"
      WHEN "footer1text_qed_tpl" THEN "' . smartsql ($defaults['footer1text']) . '"
      WHEN "footer2text_qed_tpl" THEN "' . smartsql ($defaults['footer2text']) . '"

      WHEN "companyName_qed_tpl" THEN "' . smartsql ($defaults['companyName']) . '"
      WHEN "companyPhone_qed_tpl" THEN "' . smartsql ($defaults['companyPhone']) . '"
      WHEN "companySite_qed_tpl" THEN "' . smartsql ($defaults['companySite']) . '"
      WHEN "companyEmail_qed_tpl" THEN "' . smartsql ($defaults['companyEmail']) . '"

      WHEN "socialfooterText_qed_tpl" THEN "' . smartsql ($defaults['socialfooterText']) . '"
      WHEN "facebookfooterShow_qed_tpl" THEN "' . smartsql ($defaults['facebookfooterShow']) . '"
      WHEN "facebookfooterLinks_qed_tpl" THEN "' . smartsql ($defaults['facebookfooterLinks']) . '"
      WHEN "twitterfooterShow_qed_tpl" THEN "' . smartsql ($defaults['twitterfooterShow']) . '"
      WHEN "twitterfooterLinks_qed_tpl" THEN "' . smartsql ($defaults['twitterfooterLinks']) . '"
      WHEN "googlefooterShow_qed_tpl" THEN "' . smartsql ($defaults['googlefooterShow']) . '"
      WHEN "googlefooterLinks_qed_tpl" THEN "' . smartsql ($defaults['googlefooterLinks']) . '"
      WHEN "instagramfooterShow_qed_tpl" THEN "' . smartsql ($defaults['instagramfooterShow']) . '"
      WHEN "instagramfooterLinks_qed_tpl" THEN "' . smartsql ($defaults['instagramfooterLinks']) . '"

      END
        WHERE varname IN ("fsocialsize_qed_tpl", "fsocialstyle_qed_tpl", "boxed_qed_tpl", "header_qed_tpl", "color_qed_tpl", "sitemapShow_qed_tpl", "sitemapLinks_qed_tpl", "loginShow_qed_tpl", "facebookShow_qed_tpl", "facebookLinks_qed_tpl", "twitterShow_qed_tpl", "twitterLinks_qed_tpl", "googleShow_qed_tpl", "googleLinks_qed_tpl", "instagramShow_qed_tpl", "instagramLinks_qed_tpl", "phoneShow_qed_tpl", "phoneLinks_qed_tpl", "emailShow_qed_tpl", "emailLinks_qed_tpl", "logo1_qed_tpl", "activeroyalslider_qed_tpl", "arrowsNav_qed_tpl", "arrowsNavAutoHide_qed_tpl", "arrowsNavHideOnTouch_qed_tpl", "controlNavigation_qed_tpl", "enabledAU_qed_tpl", "pauseOnHoverAU_qed_tpl", "delayAU_qed_tpl", "autoScaleSlider_qed_tpl", "autoScaleSliderWidth_qed_tpl", "autoScaleSliderHeight_qed_tpl", "imageAlignCenter_qed_tpl", "imgWidth_qed_tpl", "imgHeight_qed_tpl", "numImagesToPreload_qed_tpl", "fadeinLoadedSlide_qed_tpl", "transitionType_qed_tpl", "transitionSpeed_qed_tpl", "onefooterblock_qed_tpl", "onefooterblocktext_qed_tpl", "footer1text_qed_tpl", "footer2text_qed_tpl", "companyName_qed_tpl", "companyPhone_qed_tpl", "companySite_qed_tpl", "companyEmail_qed_tpl", "socialfooterText_qed_tpl", "facebookfooterShow_qed_tpl", "facebookfooterLinks_qed_tpl", "twitterfooterShow_qed_tpl", "twitterfooterLinks_qed_tpl", "googlefooterShow_qed_tpl", "googlefooterLinks_qed_tpl", "instagramfooterShow_qed_tpl", "instagramfooterLinks_qed_tpl" )');

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
$result = $jakdb->query ('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE product = "tpl_qed"');
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
	$JAK_FILECONTENT = $displaycontent;
	$JAK_FILEURL     = $langfile;

	fclose ($openfile);
}

?>