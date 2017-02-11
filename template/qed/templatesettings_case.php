<?php

$templatedir = '/template/' . $row['value'];
$langdir     = '..' . $templatedir . '/lang/';
$langfile    = $langdir . $site_language . '.ini';

if (!is_writable ($langdir)) {
	$JAK_FILE_ERROR = 1;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$defaults = $_POST;

	$result1 = $jakdb->query ('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname

			WHEN "sitemapShow_qed_tpl" THEN "' . smartsql ($defaults['sitemapShow']) . '"
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

      END
        WHERE varname IN ("sitemapShow_qed_tpl", "loginShow_qed_tpl", "facebookShow_qed_tpl", "facebookLinks_qed_tpl", "twitterShow_qed_tpl", "twitterLinks_qed_tpl", "googleShow_qed_tpl", "googleLinks_qed_tpl", "instagramShow_qed_tpl", "instagramLinks_qed_tpl", "phoneShow_qed_tpl", "phoneLinks_qed_tpl", "emailShow_qed_tpl", "emailLinks_qed_tpl", "logo1_qed_tpl", "activeroyalslider_qed_tpl", "arrowsNav_qed_tpl", "arrowsNavAutoHide_qed_tpl", "arrowsNavHideOnTouch_qed_tpl", "controlNavigation_qed_tpl", "enabledAU_qed_tpl", "pauseOnHoverAU_qed_tpl", "delayAU_qed_tpl", "autoScaleSlider_qed_tpl", "autoScaleSliderWidth_qed_tpl", "autoScaleSliderHeight_qed_tpl", "imageAlignCenter_qed_tpl", "imgWidth_qed_tpl", "imgHeight_qed_tpl", "numImagesToPreload_qed_tpl", "fadeinLoadedSlide_qed_tpl", "transitionType_qed_tpl", "transitionSpeed_qed_tpl" )');

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
	jak_redirect (BASE_URL . 'index.php?p=template&sp=settings&ssp=s');
}

// Get the sidebar templates
$result = $jakdb->query ('SELECT id, name, widgetcode, exorder, pluginid FROM ' . DB_PREFIX . 'pluginhooks WHERE hook_name = "tpl_footer_widgets" AND active = 1 ORDER BY exorder ASC');
while ($row = $result->fetch_assoc ()) {
	$plhooks[] = $row;
}
// Get all plugins out the databse
$JAK_HOOKS = $plhooks;

// Reset the database settings so we have it unique
$result = $jakdb->query ('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE product = "tpl_qed"');
while ($row1 = $result->fetch_assoc ()) {
	// collect each record into a define

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