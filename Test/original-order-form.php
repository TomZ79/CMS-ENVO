<?php
session_cache_limiter('nocache');
header('Expires: ' . gmdate('r', 0));

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-type: application/json');

require_once($_SERVER['DOCUMENT_ROOT'] . '/template/porto/php/php-mailer/PHPMailerAutoload.php');

// Function to get the client ip address
function get_client_ip_server()
{
  $ipaddress = '';
  if ($_SERVER['HTTP_CLIENT_IP'])
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if ($_SERVER['HTTP_X_FORWARDED_FOR'])
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if ($_SERVER['HTTP_X_FORWARDED'])
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if ($_SERVER['HTTP_FORWARDED_FOR'])
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if ($_SERVER['HTTP_FORWARDED'])
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if ($_SERVER['REMOTE_ADDR'])
    $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
    $ipaddress = 'UNKNOWN';

  return $ipaddress;
}

// BASIC VARIABLE
//-------------------------
// Subject of email
$email_subject = 'Zpráva z webového formuláře - Bluesat.cz';

// Fields
$postvalue = array (
  'name'    => $_POST['name'],
  'email'   => $_POST['email'],
  'phone'   => $_POST['phone'],
  'subject' => $_POST['subject'],
  'message' => $_POST['message']
);

// Email address
$emails = array (
  'tomas.zukal@bluesat.cz' => 'xxx',
  $postvalue['email']      => $postvalue['name']
  // ..
);

// PHP CODE
//-------------------------
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  if ($_POST['cnumber'] == $_POST['captcha']) {
    if ($emails) {
      $message = "";

      // SEND TEST EMAIL
      // Retrieve the email template required
      $message = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/template/porto/php/php-mailer-template/order-form.html');

      // Replace the % with the actual information
      $message = str_replace('%name%', $postvalue['name'], $message);
      $message = str_replace('%email%', $postvalue['email'], $message);
      $message = str_replace('%phone%', $postvalue['phone'], $message);
      $message = str_replace('%subjectform%', $postvalue['subject'], $message);
      $message = str_replace('%message%', $postvalue['message'], $message);
      $message = str_replace('%phonelink%', $postvalue['phone'], $message);
      $message = str_replace('%ipaddress%', get_client_ip_server(), $message);

      // Create a new PHPMailer instance
      $mail = new PHPMailer;

      //$mail->IsSMTP();                                      	// Set mailer to use SMTP

      // Optional Settings
      //$mail->Host = 'mail.yourserver.com';				  					// Specify main and backup server
      //$mail->SMTPAuth = true;                             		// Enable SMTP authentication
      //$mail->Username = 'username';             		  				// SMTP username
      //$mail->Password = 'secret';                         		// SMTP password
      //$mail->SMTPSecure = 'tls';                          		// Enable encryption, 'ssl' also accepted

      // Email odesílatele
      $mail -> From     = $postvalue['email'];
      // Jméno odesílatele
      $mail -> FromName = $postvalue['name'];
      // Email příjemce
      foreach ($emails as $email => $name) {
        $mail -> AddAddress($email, $name);
      }
      // Reply email
      $mail -> AddReplyTo($postvalue['email'], $postvalue['name']);
      // Nastavení formátu emailu
      $mail -> IsHTML(true);
      // Nastavíme kódování, ve kterém odesíláme e-mail
      $mail -> CharSet  = 'UTF-8';
      // Nastavení zalomení textu v těle zprávy (po 50 znacích)
      $mail -> WordWrap = 50;

      $mail -> Subject = $email_subject;
      $mail -> Body    = $message;

      if (!$mail -> Send()) {
        $arrResult = array ( 'response' => 'error' );
      }

      $arrResult = array ( 'response' => 'success' );

      // Return JSON output
      $json_output = json_encode($arrResult);
      echo $json_output;

    } else {

      $arrResult = array ( 'response' => 'error' );

      // Return JSON output
      $json_output = json_encode($arrResult);
      echo $json_output;

    }
  } else {

    $arrResult = array ( 'response' => 'error' );

    // Return JSON output
    $json_output = json_encode($arrResult);
    echo $json_output;

  }
}

?>