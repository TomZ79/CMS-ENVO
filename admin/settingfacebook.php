<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$ENVO_MODULES) envo_redirect(BASE_URL);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Reset Array (output the error in a array)
// CZ: Reset Pole (výstupní chyby se ukládají do pole)
$success = array();

// EN: Import important settings for the template from the DB
// CZ: Importuj důležité nastavení pro šablonu z DB
$ENVO_SETTING = envo_get_setting('setting');

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$ENVO_SETTING_VAL = envo_get_setting_val('setting');

// Basic settings Facebook
$facebookDir      = ENVO_FILES_DIRECTORY . '/facebook/';
$facebookNameFile = $facebookDir . 'facebook_name.txt';
$facebookDescFile = $facebookDir . 'facebook_description.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // EN: Default Variable
  // CZ: Hlavní proměnné
  $defaults = $_POST;

  $txtfile  = $defaults['envo_filecontent'];
  $txtfile1 = $defaults['envo_filecontent1'];

  // Write Facebook name file
  if (is_writable(APP_PATH . $defaults['envo_file'])) {
    $openfedit = fopen(APP_PATH . $defaults['envo_file'], "w+");
    $datasave  = $txtfile;
    $datasave  = preg_replace('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
    $datasave  = stripslashes($datasave);
    if (fwrite($openfedit, $datasave)) {
      $ENVO_FILE_SUCCESS = 1;
    }
  } else {
    $ENVO_FILE_ERROR = 1;
  }

  fclose($openfedit);

  // Write Facebook description file
  if (is_writable(APP_PATH . $defaults['envo_file1'])) {
    $openfedit = fopen(APP_PATH . $defaults['envo_file1'], "w+");
    $datasave  = $txtfile1;
    $datasave  = preg_replace('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
    $datasave  = stripslashes($datasave);
    if (fwrite($openfedit, $datasave)) {
      $ENVO_FILE_SUCCESS1 = 1;
    }
  } else {
    $ENVO_FILE_ERROR1 = 1;
  }

  fclose($openfedit);


  /* EN: Convert value
   * smartsql - secure method to insert form data into a MySQL DB
   * ------------------
   * CZ: Převod hodnot
   * smartsql - secure method to insert form data into a MySQL DB
  */
  $result = $envodb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
              WHEN "facebookconnect" THEN "' . smartsql($defaults['envo_facebookconnect']) . '"
            END
              WHERE varname IN ("facebookconnect")');

  if (!$result) {
    // EN: Redirect page
    // CZ: Přesměrování stránky
    envo_redirect(BASE_URL . 'index.php?p=settingfacebook&status=e');
  } else {
    // EN: Redirect page
    // CZ: Přesměrování stránky
    envo_redirect(BASE_URL . 'index.php?p=settingfacebook&status=s');
  }
}

// Open Facebook name file
if (file_exists(APP_PATH . $facebookNameFile)) {
  $openfile        = fopen(APP_PATH . $facebookNameFile, 'r');
  $filecontent     = @fread($openfile, filesize(APP_PATH . $facebookNameFile));
  $displaycontent  = preg_replace('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
  $ENVO_FILECONTENT = $displaycontent;
  $ENVO_FILEURL     = '/' . $facebookNameFile;

  fclose($openfile);
} else {
  $ENVO_FILEURL = $ENVO_FILECONTENT = " ";
}

// Open Facebook description file
if (file_exists(APP_PATH . $facebookDescFile)) {
  $openfile         = fopen(APP_PATH . $facebookDescFile, 'r');
  $filecontent      = @fread($openfile, filesize(APP_PATH . $facebookDescFile));
  $displaycontent   = preg_replace('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
  $ENVO_FILECONTENT1 = $displaycontent;
  $ENVO_FILEURL1     = '/' . $facebookDescFile;

  fclose($openfile);
} else {
  $ENVO_FILEURL1 = $ENVO_FILECONTENT1 = " ";
}

// EN: Title and Description
// CZ: Titulek a Popis
$SECTION_TITLE = $tl["fb_sec_title"]["fbt"];
$SECTION_DESC  = $tl["fb_sec_desc"]["fbd"];

// EN: Set ACE Editor mode
// CZ: Nastavení módu ACE Editoru
$_SESSION['acemode']='plain_text';

// EN: Load the php template
// CZ: Načtení php template (šablony)
$template = 'settingfacebook.php';


?>