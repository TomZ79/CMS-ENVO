<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

$ErrLogin = $errorfp = FALSE;

// Login IN
if (!empty($_POST['action']) && $_POST['action'] == 'login') {

  $username = smartsql($_POST['username']);
  $userpass = smartsql($_POST['password']);
  $cookies  = FALSE;
  if (isset($_POST['lcookies'])) $cookies = TRUE;

  // Security fix
  $valid_agent = filter_var($_SERVER['HTTP_USER_AGENT'], FILTER_SANITIZE_STRING);
  $valid_ip    = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP);

  // Write the log file each time someone tries to login before
  $envouserlogin->envoWriteLoginLog($username, $_SERVER['REQUEST_URI'], $valid_ip, $valid_agent, 0);

  $user_check = $envouserlogin->envoCheckUserData($username, $userpass);

  if (!empty($username) && !empty($userpass)) {

    if ($user_check == TRUE) {

      // Now login in the user
      $envouserlogin->envoLogin($user_check, $userpass, $cookies);

      // Write the log file each time someone login after to show success
      $envouserlogin->envoWriteLoginLog($username, '', $valid_ip, '', 1);

      $_SESSION["loginmsg"] = $tl["log_in"]["login14"];

      if (isset($_SESSION['ENVORedirect'])) {
        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect($_SESSION['ENVORedirect']);
      } else {
        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL);
      }

    } else {
      $_SESSION["warningmsg"] = $tl['general_error']['generror33'];
      $ErrLogin               = '1';
    }

  }
}

// Forgot password
if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['forgotP'])) {
  // EN: Default Variable
  // CZ: Hlavní proměnné
  $defaults = $_POST;

  if ($defaults['email'] == '' || !filter_var($defaults['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['e'] = $tl['general_error']['generror24'];
  }

  // Transform user email
  $femail = filter_var($defaults['email'], FILTER_SANITIZE_EMAIL);
  $fwhen  = time();

  // Check if this user exist
  $user_check = $envouserlogin->envoForgotPassword($femail, $fwhen);

  if (!$user_check) {
    $errors['e'] = $tl['general_error']['generror24'];
    // EN: Create error message
    // CZ: Vytvoření chybové zprávy
    $_SESSION["errormsg"] = $tl["log_in"]["login13"];
  }

  if (count($errors) == 0) {

    $body = sprintf($tl['log_in']['login12'], $user_check, '<a href="' . (ENVO_USE_APACHE ? substr(BASE_URL_ORIG, 0, -1) : BASE_URL_ORIG) . html_entity_decode(ENVO_rewrite::envoParseurl('forgot-password', $fwhen, '', '', '')) . '">' . (ENVO_USE_APACHE ? substr(BASE_URL_ORIG, 0, -1) : BASE_URL_ORIG) . html_entity_decode(ENVO_rewrite::envoParseurl('forgot-password', $fwhen, '', '', '')) . '</a>', $setting["title"]);

    $mail = new PHPMailer(); // defaults to using php "mail()"
    $mail->SetFrom($setting["email"], $setting["title"]);
    $mail->AddAddress($femail, $user_check);
    $mail->Subject = $setting["title"] . ' - ' . $tl['email_text_message']['emailm1'];
    $mail->MsgHTML($body);
    $mail->AltBody = strip_tags($body);

    if ($mail->Send()) {
      // EN: Redirect page
      // CZ: Přesměrování stránky/
      $_SESSION["infomsg"] = $tl["log_in"]["login11"];
      envo_redirect(BASE_URL);

    }

  } else {
    $errorfp = $errors;
  }
}

// EN: Load the php template
// CZ: Načtení php template (šablony)
$template = 'login.php';

?>