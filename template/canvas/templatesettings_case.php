<?php

$templatedir = '/template/' .$row['value'];
$langdir = '..' . $templatedir . '/lang/';
$langfile = $langdir . $site_language . '.ini';

if (!is_writable($langdir)) {
  $JAK_FILE_ERROR = 1;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $defaults = $_POST;

  $result1 = $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
      WHEN "homeLinks_canvas_tpl" THEN "' . smartsql($defaults['homeLinks']) . '"
      WHEN "contactLinks_canvas_tpl" THEN "' . smartsql($defaults['contactLinks']) . '"
      WHEN "loginLinks_canvas_tpl" THEN "' . smartsql($defaults['loginLinks']) . '"
      WHEN "registerLinks_canvas_tpl" THEN "' . smartsql($defaults['registerLinks']) . '"

      WHEN "facebookShow_canvas_tpl" THEN "' . smartsql($defaults['facebookShow']) . '"
      WHEN "facebookLinks_canvas_tpl" THEN "' . smartsql($defaults['facebookLinks']) . '"

      WHEN "twitterShow_canvas_tpl" THEN "' . smartsql($defaults['twitterShow']) . '"
      WHEN "twitterLinks_canvas_tpl" THEN "' . smartsql($defaults['twitterLinks']) . '"

      WHEN "googleShow_canvas_tpl" THEN "' . smartsql($defaults['googleShow']) . '"
      WHEN "googleLinks_canvas_tpl" THEN "' . smartsql($defaults['googleLinks']) . '"

      WHEN "instagramShow_canvas_tpl" THEN "' . smartsql($defaults['instagramShow']) . '"
      WHEN "instagramLinks_canvas_tpl" THEN "' . smartsql($defaults['instagramLinks']) . '"

      WHEN "phoneShow_canvas_tpl" THEN "' . smartsql($defaults['phoneShow']) . '"
      WHEN "phoneLinks_canvas_tpl" THEN "' . smartsql($defaults['phoneLinks']) . '"

      WHEN "emailShow_canvas_tpl" THEN "' . smartsql($defaults['emailShow']) . '"
      WHEN "emailLinks_canvas_tpl" THEN "' . smartsql($defaults['emailLinks']) . '"

      WHEN "logo1_canvas_tpl" THEN "' . smartsql($defaults['standardlogo']) . '"
      WHEN "logo2_canvas_tpl" THEN "' . smartsql($defaults['retinalogo']) . '"
      WHEN "phoneLinks1_canvas_tpl" THEN "' . smartsql($defaults['phoneLinks1']) . '"
      WHEN "emailLinks1_canvas_tpl" THEN "' . smartsql($defaults['emailLinks1']) . '"

      WHEN "section_canvas_tpl" THEN "' . smartsql($defaults['cb1']) . '"

      END
        WHERE varname IN ("homeLinks_canvas_tpl", "contactLinks_canvas_tpl", "loginLinks_canvas_tpl", "registerLinks_canvas_tpl", "facebookShow_canvas_tpl", "facebookLinks_canvas_tpl", "twitterShow_canvas_tpl", "twitterLinks_canvas_tpl", "googleShow_canvas_tpl", "googleLinks_canvas_tpl", "instagramShow_canvas_tpl", "instagramLinks_canvas_tpl", "phoneShow_canvas_tpl", "phoneLinks_canvas_tpl", "emailShow_canvas_tpl", "emailLinks_canvas_tpl", "logo1_canvas_tpl", "logo2_canvas_tpl", "phoneLinks1_canvas_tpl", "emailLinks1_canvas_tpl", "section_canvas_tpl")');

  $openfedit = fopen($defaults['jak_file'], "w+");
  $datasave = $defaults['jak_filecontent'];
  $datasave = preg_replace('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
  $datasave = stripslashes($datasave);
  if (fwrite($openfedit, $datasave)) {
    $JAK_FILE_SUCCESS = 1;
  }

  fclose($openfedit);

}

if ($result1) {
  // EN: Redirect page
  // CZ: Přesměrování stránky
  jak_redirect(BASE_URL . 'index.php?p=template&sp=settings&ssp=s');
}

// Get the sidebar templates
$result = $jakdb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . DB_PREFIX . 'pluginhooks WHERE hook_name = "tpl_footer_widgets" AND active = 1 ORDER BY exorder ASC');
while ($row = $result->fetch_assoc()) {
  $plhooks[] = $row;
}
// Get all plugins out the databse
$JAK_HOOKS = $plhooks;

// Reset the database settings so we have it unique
$result = $jakdb->query('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE product = "tpl_canvas"');
while ($row1 = $result->fetch_assoc()) {
  // collect each record into a define

  // Now check if sting contains html and do something about it!
  if (strlen($row1['value']) != strlen(filter_var($row1['value'], FILTER_SANITIZE_STRING))) {
    $defvar = htmlspecialchars_decode(htmlspecialchars($row1['value']));
  } else {
    $defvar = $row1["value"];
  }

  $jktpl[$row1['varname']] = $defvar;
}

// Open language file
if (file_exists($langfile)) {
  $openfile = fopen($langfile, 'r');
  $filecontent = @fread($openfile, filesize($langfile));
  $displaycontent = preg_replace('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
  $JAK_FILECONTENT = $displaycontent;
  $JAK_FILEURL = $langfile;

  fclose($openfile);
}

?>