<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$JAK_MODULES) envo_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable = DB_PREFIX . 'categories';

// EN: Reset Array (output the error in a array)
// CZ: Reset Pole (výstupní chyby se ukládají do pole)
$success = array();

// EN: Get all the php Hook by name of Hook for setting top
// CZ: Načtení všech php dat z Hook podle jména Hook
$getsettinghook = $jakhooks->jakGethook("php_admin_setting");
if ($getsettinghook) foreach ($getsettinghook as $sh) {
  eval($sh['phpcode']);
}

// EN: Get all the php Hook by name of Hook for setting template
// CZ: Načtení všech php dat z Hook podle jména Hook pro nastavení šablony
$JAK_HOOK_ADMIN_SETTING_EDIT = $jakhooks->jakGethook("tpl_admin_setting");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["btnSave"])) {
    // EN: If button "Save Changes" clicked
    // CZ: Pokud bylo stisknuto tlačítko "Uložit"

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $defaults = $_POST;

    // EN: Get all the php Hook by name of Hook for setting top
    // CZ: Načtení všech php dat z Hook podle jména Hook
    $getsettingpost = $jakhooks->jakGethook("php_admin_setting_post");
    if ($getsettingpost) foreach ($getsettingpost as $shp) {
      eval($shp['phpcode']);
    }

    if ($defaults['jak_email'] == '' || !filter_var($defaults['jak_email'], FILTER_VALIDATE_EMAIL)) {
      $errors['e1'] = $tl['general_error']['generror7'] . '<br>';
    }

    if ($defaults['jak_lang'] == '') {
      $errors['e2'] = $tl['general_error']['generror8'] . '<br>';
    }

    if ($defaults['jak_locale'] == '') {
      $errors['e9'] = $tl['general_error']['generror16'] . '<br>';
    }

    if (empty($defaults['jak_date'])) {
      $errors['e3'] = $tl['general_error']['generror9'] . '<br>';
    }

    if (!is_numeric($defaults['jak_shortmsg'])) {
      $errors['e4'] = $tl['general_error']['generror10'] . '<br>';
    }

    if (!is_numeric($defaults['jak_item'])) {
      $errors['e5'] = $tl['general_error']['generror10'] . '<br>';
    }

    if (!is_numeric($defaults['jak_mid'])) {
      $errors['e6'] = $tl['general_error']['generror10'] . '<br>';
    }

    if (!is_numeric($defaults['jak_rssitem'])) {
      $errors['e7'] = $tl['general_error']['generror10'] . '<br>';
    }

    if (!is_numeric($defaults['jak_avatwidth']) || !is_numeric($defaults['jak_avatheight'])) {
      $errors['e8'] = $tl['general_error']['generror10'] . '<br>';
    }

    // EN: Color settings for EU Cookie by theme
    // CZ: Nastavení barev pro EU Cookie podle vybraného tématu
    if ($defaults['jak_eucookie_theme'] == 'eucookie_theme1') {
      $eucookie_pbck = '#000';
      $eucookie_ptxt = '#FFF';
      $eucookie_bbck = '#F1D600';
      $eucookie_btxt = '#000';
    }

    if ($defaults['jak_eucookie_theme'] == 'eucookie_theme2') {
      $eucookie_pbck = '#000';
      $eucookie_ptxt = '#FFF';
      $eucookie_bbck = '#FFF';
      $eucookie_btxt = '#000';
    }

    if ($defaults['jak_eucookie_theme'] == 'eucookie_theme3') {
      $eucookie_pbck = '#EAF7F7';
      $eucookie_ptxt = '#5C7291';
      $eucookie_bbck = '#56CBDB';
      $eucookie_btxt = '#FFF';
    }

    if ($defaults['jak_eucookie_theme'] == 'eucookie_theme4') {
      $eucookie_pbck = '#252E39';
      $eucookie_ptxt = '#FFF';
      $eucookie_bbck = '#14A7D0';
      $eucookie_btxt = '#FFF';
    }

    if ($defaults['jak_eucookie_theme'] == 'eucookie_theme5') {
      $eucookie_pbck = '#237AFC';
      $eucookie_ptxt = '#FFF';
      $eucookie_bbck = '#FFF';
      $eucookie_btxt = '#237AFC';
    }

    if ($defaults['jak_eucookie_theme'] == 'eucookie_theme6') {
      $eucookie_pbck = '#EDEFF5';
      $eucookie_ptxt = '#838391';
      $eucookie_bbck = '#4B81E8';
      $eucookie_btxt = '#FFF';
    }

    if ($defaults['jak_eucookie_theme'] == 'eucookie_theme7') {
      $eucookie_pbck = '#000';
      $eucookie_ptxt = '#FFF';
      $eucookie_bbck = '#80AA1D';
      $eucookie_btxt = '#000';
    }

    // EN: Write data to MySQL DB
    // CZ: Zápis dat do databáze MySQL a vyhodnocení výsledku zápisu
    if (count($errors) == 0) {

      /* EN: Convert value
       * smartsql - secure method to insert form data into a MySQL DB
       * ------------------
       * CZ: Převod hodnot
       * smartsql - secure method to insert form data into a MySQL DB
      */
      $result = $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
                  WHEN "email" THEN "' . smartsql($defaults['jak_email']) . '"
                  WHEN "sitehttps" THEN "' . smartsql($defaults['jak_shttp']) . '"
                  WHEN "lang" THEN "' . smartsql($defaults['jak_lang']) . '"
                  WHEN "locale" THEN "' . smartsql($defaults['jak_locale']) . '"
                  WHEN "showloginside" THEN "' . smartsql($defaults['jak_loginside']) . '"
                  WHEN "useravatwidth" THEN "' . smartsql($defaults['jak_avatwidth']) . '"
                  WHEN "useravatheight" THEN "' . smartsql($defaults['jak_avatheight']) . '"
                  WHEN "printme" THEN "' . smartsql($defaults['jak_sprint']) . '"
                  WHEN "shortmsg" THEN "' . smartsql($defaults['jak_shortmsg']) . '"
                  WHEN "dateformat" THEN "' . smartsql($defaults['jak_date']) . '"
                  WHEN "timeformat" THEN "' . smartsql($defaults['jak_time']) . '"
                  WHEN "time_ago_show" THEN "' . smartsql($defaults['jak_time_ago']) . '"
                  WHEN "hvm" THEN "' . smartsql($defaults['jak_hvm']) . '"
                  WHEN "adv_editor" THEN "' . smartsql($defaults['jak_editor']) . '"
                  WHEN "timezoneserver" THEN "' . smartsql($defaults['jak_timezone_server']) . '"
                  WHEN "contactform" THEN "' . smartsql($defaults['jak_contact']) . '"
                  WHEN "shownews" THEN "' . smartsql($defaults['jak_shownews']) . '"
                  WHEN "rss" THEN "' . smartsql($defaults['jak_rss']) . '"
                  WHEN "rssitem" THEN "' . smartsql($defaults['jak_rssitem']) . '"
                  WHEN "adminpagemid" THEN "' . smartsql($defaults['jak_mid']) . '"
                  WHEN "adminpageitem" THEN "' . smartsql($defaults['jak_item']) . '"
                  WHEN "ip_block" THEN "' . smartsql($defaults['ip_block']) . '"
                  WHEN "email_block" THEN "' . smartsql($defaults['email_block']) . '"
                  WHEN "username_block" THEN "' . smartsql($defaults['username_block']) . '"
                  WHEN "analytics" THEN "' . smartsql($defaults['jak_analytics']) . '"
                  WHEN "smtp_or_mail" THEN "' . smartsql($defaults['jak_smpt']) . '"
                  WHEN "smtp_host" THEN "' . smartsql($defaults['jak_host']) . '"
                  WHEN "smtp_port" THEN "' . smartsql($defaults['jak_port']) . '"
                  WHEN "smtp_alive" THEN "' . smartsql($defaults['jak_alive']) . '"
                  WHEN "smtp_auth" THEN "' . smartsql($defaults['jak_auth']) . '"
                  WHEN "smtp_prefix" THEN "' . smartsql($defaults['jak_prefix']) . '"
                  WHEN "smtp_user" THEN "' . smartsql($defaults['jak_smtpusername']) . '"
                  WHEN "smtp_password" THEN "' . smartsql($defaults['jak_smtppassword']) . '"
                  WHEN "acetheme" THEN "' . smartsql($defaults['jak_acetheme']) . '"
                  WHEN "acetabSize" THEN "' . smartsql($defaults['jak_acetabSize']) . '"
                  WHEN "acegutter" THEN "' . smartsql($defaults['jak_acegutter']) . '"
                  WHEN "aceinvisible" THEN "' . smartsql($defaults['jak_aceinvisible']) . '"
                  WHEN "acewraplimit" THEN "' . smartsql($defaults['jak_acewraplimit']) . '"
                  WHEN "aceactiveline" THEN "' . smartsql($defaults['jak_aceactiveline']) . '"
                  WHEN "eucookie_enabled" THEN "' . smartsql($defaults['jak_eucookie_enabled']) . '"
                  WHEN "eucookie_name" THEN "' . smartsql($defaults['jak_eucookie_name']) . '"
                  WHEN "eucookie_expiryDays" THEN "' . smartsql($defaults['jak_eucookie_expiryDays']) . '"
                  WHEN "eucookie_position" THEN "' . smartsql($defaults['jak_eucookie_position']) . '"
                  WHEN "eucookie_style" THEN "' . smartsql($defaults['jak_eucookie_style']) . '"
                  WHEN "eucookie_theme" THEN "' . smartsql($defaults['jak_eucookie_theme']) . '"
                  WHEN "eucookie_pbck" THEN "' . $eucookie_pbck . '"
                  WHEN "eucookie_ptxt" THEN "' . $eucookie_ptxt . '"
                  WHEN "eucookie_bbck" THEN "' . $eucookie_bbck . '"
                  WHEN "eucookie_btxt" THEN "' . $eucookie_btxt . '"
                  WHEN "eucookie_alpha" THEN "' . smartsql($defaults['jak_eucookie_alpha']) . '"
                  WHEN "eucookie_message" THEN "' . smartsql($defaults['jak_eucookie_message']) . '"
                  WHEN "eucookie_dismiss" THEN "' . smartsql($defaults['jak_eucookie_dismiss']) . '"
                  WHEN "eucookie_link" THEN "' . smartsql($defaults['jak_eucookie_link']) . '"
                  WHEN "eucookie_href" THEN "' . smartsql($defaults['jak_eucookie_href']) . '"
                END
                  WHERE varname IN ("email","sitehttps","lang","locale","showloginside","loginside","useravatwidth","useravatheight","userpath","printme","shortmsg","dateformat","timeformat","time_ago_show","timezoneserver","hvm","adv_editor","contactform","shownews","rss","rssitem","adminpagemid","adminpageitem","ip_block","email_block","username_block","analytics","smtp_or_mail","smtp_host","smtp_port","smtp_alive","smtp_auth","smtp_prefix","smtp_user","smtp_password","acetheme","acetabSize","acegutter","aceinvisible","acewraplimit","aceactiveline","eucookie_enabled","eucookie_name","eucookie_expiryDays","eucookie_position","eucookie_style","eucookie_theme","eucookie_pbck","eucookie_ptxt","eucookie_bbck","eucookie_btxt","eucookie_alpha","eucookie_message","eucookie_dismiss","eucookie_link","eucookie_href")');

      if (!$result) {
        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL . 'index.php?p=setting&status=e');
      } else {
        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL . 'index.php?p=setting&status=s');
      }
    } else {

      $errors['e'] = $tl['general_error']['generror'] . '<br>';
      $errors      = $errors;
    }

  } else if (isset($_POST["btnTestMail"])) {
    // EN: If button "Test Mail" clicked
    // CZ: Pokud bylo stisknuto tlačítko "Test Mail"

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $defaults = $_POST;

    /* EN: Convert value
     * smartsql - secure method to insert form data into a MySQL DB
     * ------------------
     * CZ: Převod hodnot
     * smartsql - secure method to insert form data into a MySQL DB
    */
    $result = $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
                WHEN "smtp_or_mail" THEN "' . smartsql($defaults['jak_smpt']) . '"
                WHEN "smtp_host" THEN "' . smartsql($defaults['jak_host']) . '"
                WHEN "smtp_port" THEN "' . smartsql($defaults['jak_port']) . '"
                WHEN "smtp_alive" THEN "' . smartsql($defaults['jak_alive']) . '"
                WHEN "smtp_auth" THEN "' . smartsql($defaults['jak_auth']) . '"
                WHEN "smtp_prefix" THEN "' . smartsql($defaults['jak_prefix']) . '"
                WHEN "smtp_user" THEN "' . smartsql($defaults['jak_smtpusername']) . '"
                WHEN "smtp_password" THEN "' . smartsql($defaults['jak_smtppassword']) . '"
              END
                WHERE varname IN ("smtp_or_mail","smtp_host","smtp_port","smtp_alive","smtp_auth","smtp_prefix","smtp_user","smtp_password")');

    // SEND TEST EMAIL
    // Retrieve the email template required
    $message = file_get_contents('template/template_email/setting_testemail.html');

    // Replace the % with the actual information
    $message = str_replace('%version%', $jkv["version"], $message);
    $message = str_replace('%baseurllink%', BASE_URL_ADMIN, $message);

    $mail = new PHPMailer(TRUE); // the true param means it will throw exceptions on errors, which we need to catch

    // Send email the smpt way or else the mail way
    if (!empty($defaults['jak_smpt'])) {

      // SMTP

      // Replace the % with the actual information
      $message = str_replace('%protocol%', 'SMTP', $message);

      try {
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->Host          = $jkv["smtp_host"];
        $mail->SMTPAuth      = ($jkv["smtp_auth"] ? TRUE : FALSE); // enable SMTP authentication
        $mail->SMTPSecure    = $jkv["smtp_prefix"]; // sets the prefix to the server
        $mail->SMTPKeepAlive = ($jkv["smtp_alive"] ? TRUE : FALSE); // SMTP connection will not close after each email sent
        $mail->Port          = $jkv["smtp_port"]; // set the SMTP port for the GMAIL server
        $mail->Username      = $jkv["smtp_user"]; // SMTP account username
        $mail->Password      = $jkv["smtp_password"];        // SMTP account password
        $mail->SetFrom($jkv["email"], $jkv["title"]);
        $mail->AddReplyTo($jkv["email"], $jkv["title"]);
        $mail->AddAddress($jkv["email"], $jkv["title"]);
        $mail->AltBody = "SMTP Mail"; // optional, comment out and test
        $mail->Subject = $tl["email_text_message"]["emailm2"];
        $mail->MsgHTML(sprintf($tl["email_text_message"]["emailm3"], 'SMTP'));
        $mail->Send();
        $success['e'] = sprintf($tl["gs_message"]["gsm"], 'SMTP');
      } catch (phpmailerException $e) {
        $errors['e'] = $e->errorMessage(); //Pretty error messages from PHPMailer
      } catch (Exception $e) {
        $errors['e'] = $e->getMessage(); //Boring error messages from anything else!
      }

    } else {

      // PHPMAILER

      // Replace the % with the actual information
      $message = str_replace('%protocol%', 'PHP Mail()', $message);

      try {
        $mail->SetFrom($jkv["email"], $jkv["title"]);
        $mail->AddReplyTo($jkv["email"], $jkv["title"]);
        $mail->AddAddress($jkv["email"], $jkv["title"]);
        // Set the subject
        $mail->Subject = $tl["email_text_message"]["emailm2"];
        //Set the message
        $mail->MsgHTML($message);
        $mail->AltBody = "PHP Mail()";
        // Send the email
        $mail->Send();
        $success['e'] = sprintf($tl["gs_message"]["gsm"], 'PHP Mail()');
      } catch (phpmailerException $e) {
        $errors['e'] = $e->errorMessage(); //Pretty error messages from PHPMailer
      } catch (Exception $e) {
        $errors['e'] = $e->getMessage(); //Boring error messages from anything else!
      }

    }

  } else {
    // EN: If no button pressed
    // CZ: Pokud nebylo stisknuto žádné tlačítko

  }
}

// EN: Import important settings for the template from the DB (as ARRAY)
// CZ: Importuj důležité nastavení pro šablonu z DB (POLE)
$JAK_SETTING = envo_get_setting('setting');

// EN: Import important settings for the template from the DB (only VALUE)
// CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
$JAK_SETTING_VAL = envo_get_setting_val('setting');

// Call the settings function
$acp_lang_files = envo_get_lang_files(TRUE);
$lang_files     = envo_get_lang_files(FALSE);

// EN: Title and Description
// CZ: Titulek a Popis
$SECTION_TITLE = $tl["gs_sec_title"]["gst"];
$SECTION_DESC  = $tl["gs_sec_desc"]["gsd"];

// EN: Load the php template
// CZ: Načtení php template (šablony)
$template = 'setting.php';


?>