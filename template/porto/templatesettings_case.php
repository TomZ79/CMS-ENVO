<?php

// EN: Start a PHP Session
// CZ: Start PHP Session
session_start();

// EN: Set template dir
// CZ: Nastavení složky šablony
$templatedir = '/template/' . $row['value'];

// EN: Set js file
// CZ: Nastavení php souboru
$jsdir  = '..' . $templatedir . '/js/';
$jsfile = $jsdir . 'porto-revolutionSlider.js';

// EN: Set language file
// CZ: Nastavení jazykového souboru
$langdir  = '..' . $templatedir . '/lang/';
$langfile = $langdir . $site_language . '.ini';

// EN: Check if folder is writable
// CZ: Kontrola zda je lze zapisovat do složky
if (!is_writable($phpdir) || !is_writable($langdir)) {
	$ENVO_FILE_ERROR = 1;
}

// EN: Save data from Form to DB (method POST)
// CZ: Uložení data z Formuláře do DB (metoda POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// EN: Default Variable
	// CZ: Hlavní proměnné
	$defaults = $_POST;

	// EN:
	// CZ:
	// ---------------------------------------------------------------------
	$result1 = $envodb -> query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname

      WHEN "skin_porto_tpl" THEN "' . smartsql($defaults['skinporto']) . '"
      WHEN "header_porto_tpl" THEN "' . smartsql($defaults['headerporto']) . '"
      WHEN "navi_porto_tpl" THEN "' . smartsql($defaults['naviporto']) . '"
      
      WHEN "sitemapShow_porto_tpl" THEN "' . smartsql($defaults['sitemapShow']) . '"
			WHEN "sitemapLinks_porto_tpl" THEN "' . smartsql($defaults['sitemapLinks']) . '"
			WHEN "loginShow_porto_tpl" THEN "' . smartsql($defaults['loginShow']) . '"
			WHEN "logo1_porto_tpl" THEN "' . smartsql($defaults['standardlogo1']) . '"
      WHEN "facebookheaderShow_porto_tpl" THEN "' . smartsql($defaults['facebookheaderShow1']) . '"
      WHEN "facebookheaderLinks_porto_tpl" THEN "' . smartsql($defaults['facebookheaderLinks1']) . '"
      WHEN "twitterheaderShow_porto_tpl" THEN "' . smartsql($defaults['twitterheaderShow1']) . '"
      WHEN "twitterheaderLinks_porto_tpl" THEN "' . smartsql($defaults['twitterheaderLinks1']) . '"
      WHEN "googleheaderShow_porto_tpl" THEN "' . smartsql($defaults['googleheaderShow1']) . '"
      WHEN "googleheaderLinks_porto_tpl" THEN "' . smartsql($defaults['googleheaderLinks1']) . '"
      WHEN "instagramheaderShow_porto_tpl" THEN "' . smartsql($defaults['instagramheaderShow1']) . '"
      WHEN "instagramheaderLinks_porto_tpl" THEN "' . smartsql($defaults['instagramheaderLinks1']) . '"
      WHEN "phoneheaderShow_porto_tpl" THEN "' . smartsql($defaults['phoneheaderShow1']) . '"
      WHEN "phoneheaderLinks_porto_tpl" THEN "' . smartsql($defaults['phoneheaderLinks1']) . '"
      WHEN "emailheaderShow_porto_tpl" THEN "' . smartsql($defaults['emailheaderShow1']) . '"
      WHEN "emailheaderLinks_porto_tpl" THEN "' . smartsql($defaults['emailheaderLinks1']) . '"
			
      WHEN "footerblocktext1_porto_tpl" THEN "' . smartsql($defaults['footerblocktext1']) . '"
      
      WHEN "logo2_porto_tpl" THEN "' . smartsql($defaults['standardlogo2']) . '"
      WHEN "socialfooterText_porto_tpl" THEN "' . smartsql($defaults['socialfooterText']) . '"
      WHEN "facebookfooterShow_porto_tpl" THEN "' . smartsql($defaults['facebookfooterShow']) . '"
      WHEN "facebookfooterLinks_porto_tpl" THEN "' . smartsql($defaults['facebookfooterLinks']) . '"
      WHEN "twitterfooterShow_porto_tpl" THEN "' . smartsql($defaults['twitterfooterShow']) . '"
      WHEN "twitterfooterLinks_porto_tpl" THEN "' . smartsql($defaults['twitterfooterLinks']) . '"
      WHEN "googlefooterShow_porto_tpl" THEN "' . smartsql($defaults['googlefooterShow']) . '"
      WHEN "googlefooterLinks_porto_tpl" THEN "' . smartsql($defaults['googlefooterLinks']) . '"
      WHEN "instagramfooterShow_porto_tpl" THEN "' . smartsql($defaults['instagramfooterShow']) . '"
      WHEN "instagramfooterLinks_porto_tpl" THEN "' . smartsql($defaults['instagramfooterLinks']) . '"
      
      WHEN "pageheader_porto_tpl" THEN "' . smartsql($defaults['pageheaderporto']) . '"
      
      END
        WHERE varname IN ("skin_porto_tpl", "header_porto_tpl", "navi_porto_tpl", "sitemapShow_porto_tpl", "sitemapLinks_porto_tpl", "loginShow_porto_tpl", "logo1_porto_tpl", "facebookheaderShow_porto_tpl", "facebookheaderLinks_porto_tpl", "twitterheaderShow_porto_tpl", "twitterheaderLinks_porto_tpl", "googleheaderShow_porto_tpl", "googleheaderLinks_porto_tpl", "instagramheaderShow_porto_tpl", "instagramheaderLinks_porto_tpl", "phoneheaderShow_porto_tpl", "phoneheaderLinks_porto_tpl", "emailheaderShow_porto_tpl", "emailheaderLinks_porto_tpl", "footerblocktext1_porto_tpl", "logo2_porto_tpl", "socialfooterText_porto_tpl", "facebookfooterShow_porto_tpl", "facebookfooterLinks_porto_tpl", "twitterfooterShow_porto_tpl", "twitterfooterLinks_porto_tpl", "googlefooterShow_porto_tpl", "googlefooterLinks_porto_tpl", "instagramfooterShow_porto_tpl", "instagramfooterLinks_porto_tpl", "pageheader_porto_tpl" )');

	// EN: Save images into the DB
	// CZ: Uložení obrázků do DB
	// ---------------------------------------------------------------------
	$result2 = $envodb -> query('TRUNCATE TABLE ' . DB_PREFIX . 'portotplheader_img');

	$countimg = $defaults['pageheader_img_0'];

	for ($i = 0, $j = count($countimg); $i < $j; $i++) {
		$img = $countimg[$i];
		if (!empty($img)) {
			// EN: Insert new row and update row if exists in DB
			// CZ: Vložení nového záznamu a update záznamu, který je již v DB
			$result1 = $envodb -> query('INSERT INTO ' . DB_PREFIX . 'portotplheader_img SET
                        id = "' . smartsql($defaults['pageheader_img_0'][$i]) . '",
                        catid = "' . smartsql($defaults['pageheader_img_1'][$i]) . '",
                        img = "' . smartsql($defaults['pageheader_img_2'][$i]) . '"');
		}
	}

	// EN: Save language file
	// CZ: Uložení jazykového souboru
	// ---------------------------------------------------------------------
	$openfedit = fopen($defaults['envo_file'], "w+");
	$datasave  = $defaults['envo_filecontent'];
	$datasave  = preg_replace('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
	$datasave  = stripslashes($datasave);
	if (fwrite($openfedit, $datasave)) {
		$ENVO_FILE_SUCCESS = 1;
	}

	fclose($openfedit);

	// EN: Save php file
	// CZ: Uložení php souboru
	// ---------------------------------------------------------------------
	$openfedit = fopen($defaults['envo_file2'], "w+");
	$datasave  = $defaults['envo_filecontent2'];
	$datasave  = preg_replace('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
	$datasave  = stripslashes($datasave);
	if (fwrite($openfedit, $datasave)) {
		$ENVO_FILE_SUCCESS = 1;
	}

	fclose($openfedit);
}

if ($result1) {
	// EN: Redirect page
	// CZ: Přesměrování stránky
	envo_redirect(BASE_URL . 'index.php?p=template&sp=settings&status=s');
}

// EN: Reset the database settings so we have it unique
// CZ:
// ---------------------------------------------------------------------
$result = $envodb -> query('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE product = "tpl_porto"');
while ($row1 = $result -> fetch_assoc()) {
	// Now check if sting contains html and do something about it!
	if (strlen($row1['value']) != strlen(filter_var($row1['value'], FILTER_SANITIZE_STRING))) {
		$defvar = htmlspecialchars_decode(htmlspecialchars($row1['value']));
	} else {
		$defvar = $row1["value"];
	}

	$jktpl[$row1['varname']] = $defvar;
}

// EN: Open language file
// CZ:
// ---------------------------------------------------------------------
if (file_exists($langfile)) {
	$openfile         = fopen($langfile, 'r');
	$filecontent      = @fread($openfile, filesize($langfile));
	$displaycontent   = preg_replace('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
	$ENVO_FILECONTENT = $displaycontent;
	$ENVO_FILEURL     = $langfile;

	fclose($openfile);
}

// EN: Open js file
// CZ:
// ---------------------------------------------------------------------
if (file_exists($jsfile)) {
	$openfile1         = fopen($jsfile, 'r');
	$filecontent1      = @fread($openfile1, filesize($jsfile));
	$displaycontent1   = preg_replace('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent1);
	$ENVO_FILECONTENT1 = $displaycontent1;
	$ENVO_FILEURL1     = $jsfile;

	fclose($openfile1);
}

// EN: Get data from table
// CZ:
// ---------------------------------------------------------------------
$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'portotplheader_img' . ' ORDER BY id ASC');
while ($row = $result -> fetch_assoc()) {
	// EN: Insert each record into array
	// CZ: Vložení získaných dat do pole
	$ENVO_TPL_IMG[] = $row;
}

// EN: Set ACE Editor mode
// CZ: Nastavení módu ACE Editoru
// ---------------------------------------------------------------------
$_SESSION['acemode']  = 'ini';
$_SESSION['acemode2'] = 'javascript';
$_SESSION['acemode3'] = 'html';

?>