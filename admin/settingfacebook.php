<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die('You cannot access this file directly.');

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$JAK_MODULES) jak_redirect(BASE_URL);

// EN: Reset Array (output the error in a array)
// CZ: Reset Pole (výstupní chyby se ukládají do pole)
$success = array();

// EN: Import important settings for the template from the DB
// CZ: Importuj důležité nastavení pro šablonu z DB
$JAK_SETTING = jak_get_setting('setting');

// Basic settings Facebook
$facebookDir = JAK_FILES_DIRECTORY . '/facebook/';
$facebookNameFile = $facebookDir . 'facebook_name.txt';
$facebookDescFile = $facebookDir . 'facebook_description.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $defaults = $_POST;

  $txtfile = $defaults['jak_filecontent'];
  $txtfile1 = $defaults['jak_filecontent1'];

  // Write Facebook name file
  if (is_writable(APP_PATH . $defaults['jak_file'])) {
    $openfedit = fopen(APP_PATH . $defaults['jak_file'], "w+");
    $datasave = $txtfile;
    $datasave = preg_replace('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
    $datasave = stripslashes($datasave);
    if (fwrite($openfedit, $datasave)) {
      $JAK_FILE_SUCCESS = 1;
    }
  } else {
    $JAK_FILE_ERROR = 1;
  }

  fclose($openfedit);

  // Write Facebook description file
  if (is_writable(APP_PATH . $defaults['jak_file1'])) {
    $openfedit = fopen(APP_PATH . $defaults['jak_file1'], "w+");
    $datasave = $txtfile1;
    $datasave = preg_replace('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
    $datasave = stripslashes($datasave);
    if (fwrite($openfedit, $datasave)) {
      $JAK_FILE_SUCCESS1 = 1;
    }
  } else {
    $JAK_FILE_ERROR1 = 1;
  }

  fclose($openfedit);


  // Do the dirty work in mysql
  $result = $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
        WHEN "facebookconnect" THEN "' . smartsql($defaults['jak_facebookconnect']) . '"
    END
    	WHERE varname IN ("facebookconnect")');

  if (!$result) {
    // EN: Redirect page
    // CZ: Přesměrování stránky
    jak_redirect(BASE_URL . 'index.php?p=settingfacebook&sp=e');
  } else {
    // EN: Redirect page
    // CZ: Přesměrování stránky
    jak_redirect(BASE_URL . 'index.php?p=settingfacebook&sp=s');
  }
}

// Open Facebook name file
if (file_exists(APP_PATH . $facebookNameFile)) {
  $openfile = fopen(APP_PATH . $facebookNameFile, 'r');
  $filecontent = @fread($openfile, filesize(APP_PATH . $facebookNameFile));
  $displaycontent = preg_replace('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
  $JAK_FILECONTENT = $displaycontent;
  $JAK_FILEURL = '/' . $facebookNameFile;

  fclose($openfile);
} else {
  $JAK_FILEURL = $JAK_FILECONTENT = " ";
}

// Open Facebook description file
if (file_exists(APP_PATH . $facebookDescFile)) {
  $openfile = fopen(APP_PATH . $facebookDescFile, 'r');
  $filecontent = @fread($openfile, filesize(APP_PATH . $facebookDescFile));
  $displaycontent = preg_replace('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
  $JAK_FILECONTENT1 = $displaycontent;
  $JAK_FILEURL1 = '/' . $facebookDescFile;

  fclose($openfile);
} else {
  $JAK_FILEURL1 = $JAK_FILECONTENT1 = " ";
}

// EN: Title and Description
// CZ: Titulek a Popis
$SECTION_TITLE = 'Facebook' . ' - ' . 'Nastavení';
$SECTION_DESC = 'Editace souborů';

// EN: Ace Mode
$acemode = 'plain_text';

// EN: Load the template
// CZ: Načti template (šablonu)
$template = 'settingfacebook.php';


?>