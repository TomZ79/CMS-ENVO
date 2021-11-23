<?php

// EN: Start a PHP Session
// CZ: Start PHP Session
session_start();

// EN: Set template dir
// CZ: Nastavení složky šablony
$templatedir = '/template/' . $row['value'];

// EN: Set css, js, lang dir
// CZ: Nastavení css, js, lang složky
$cssdir  = '..' . $templatedir . '/assets/css/';
$jsdir  = '..' . $templatedir . '/assets/js/';
$langdir  = '..' . $templatedir . '/lang/';

// EN: Set css file
// CZ: Nastavení css souboru
$cssfile = $cssdir . 'theme-custom.css';

// EN: Set language file
// CZ: Nastavení jazykového souboru
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

      WHEN "LogoDark_autorex_tpl" THEN "' . smartsql($defaults['MainLogoDark']) . '"
      WHEN "LogoLight_autorex_tpl" THEN "' . smartsql($defaults['MainLogoLight']) . '"
      WHEN "ShowTextLeft_autorex_tpl" THEN "' . smartsql($defaults['ShowTextLeft']) . '"
      WHEN "headerblocktextleft_autorex_tpl" THEN "' . smartsql($defaults['headerblocktextleft']) . '"
      WHEN "ShowTextCenter_autorex_tpl" THEN "' . smartsql($defaults['ShowTextCenter']) . '"
      WHEN "headerblocktextcenter_autorex_tpl" THEN "' . smartsql($defaults['headerblocktextcenter']) . '"
      WHEN "ShowTextRight_autorex_tpl" THEN "' . smartsql($defaults['ShowTextRight']) . '"
      WHEN "headerblocktextright_autorex_tpl" THEN "' . smartsql($defaults['headerblocktextright']) . '"
      WHEN "ShowTextBtn_autorex_tpl" THEN "' . smartsql($defaults['ShowBtn']) . '"
      WHEN "TextBtn_autorex_tpl" THEN "' . smartsql($defaults['headerblocktextbtn']) . '"
      WHEN "LinksBtn_autorex_tpl" THEN "' . smartsql($defaults['headerblocklinksbtn']) . '"
      
      WHEN "ShowFooterUpper_autorex_tpl" THEN "' . smartsql($defaults['ShowFooterUpper']) . '"
      WHEN "FooterUpper_autorex_tpl" THEN "' . smartsql($defaults['FooterUpper']) . '"
      WHEN "ShowFooterBox1_autorex_tpl" THEN "' . smartsql($defaults['ShowFooterBox1']) . '"
      WHEN "FooterBox1_autorex_tpl" THEN "' . smartsql($defaults['FooterBox1']) . '"
      WHEN "ShowFooterBox2_autorex_tpl" THEN "' . smartsql($defaults['ShowFooterBox2']) . '"
      WHEN "FooterBox2_autorex_tpl" THEN "' . smartsql($defaults['FooterBox2']) . '"
      WHEN "ShowFooterBox3_autorex_tpl" THEN "' . smartsql($defaults['ShowFooterBox3']) . '"
      WHEN "FooterBox3_autorex_tpl" THEN "' . smartsql($defaults['FooterBox3']) . '"
     
      
      END
        WHERE varname IN ("LogoDark_autorex_tpl", "LogoLight_autorex_tpl", "ShowTextLeft_autorex_tpl", "headerblocktextleft_autorex_tpl", "ShowTextCenter_autorex_tpl", "headerblocktextcenter_autorex_tpl", "ShowTextRight_autorex_tpl", "headerblocktextright_autorex_tpl", "ShowTextBtn_autorex_tpl", "TextBtn_autorex_tpl","LinksBtn_autorex_tpl", "ShowFooterUpper_autorex_tpl", "FooterUpper_autorex_tpl", "ShowFooterBox1_autorex_tpl", "FooterBox1_autorex_tpl", "ShowFooterBox2_autorex_tpl", "FooterBox2_autorex_tpl", "ShowFooterBox3_autorex_tpl", "FooterBox3_autorex_tpl")');

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

  // EN: Save css file
  // CZ: Uložení css souboru
  // ---------------------------------------------------------------------
  $openfedit = fopen($defaults['envo_file_1'], "w+");
  $datasave  = $defaults['envo_filecontent_1'];
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

// EN: Get data from databases table 'setting'
// CZ:
// ---------------------------------------------------------------------
$result = $envodb -> query('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE product = "tpl_autorex"');
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

// EN: Open css file
// CZ:
// ---------------------------------------------------------------------
if (file_exists($cssfile)) {
  $openfile         = fopen($cssfile, 'r');
  $filecontent      = @fread($openfile, filesize($cssfile));
  $displaycontent   = preg_replace('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
  $ENVO_FILECONTENT_1 = $displaycontent;
  $ENVO_FILEURL_1     = $cssfile;

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

// EN: Set ACE Editor mode
// CZ: Nastavení módu ACE Editoru
// ---------------------------------------------------------------------
$_SESSION['acemode']  = 'ini';
$_SESSION['acemode2'] = 'javascript';
$_SESSION['acemode3'] = 'html';
$_SESSION['acemode4'] = 'css';

?>