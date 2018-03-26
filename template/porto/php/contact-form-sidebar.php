<?php
session_cache_limiter('nocache');
header('Expires: ' . gmdate('r', 0));

header('Content-type: application/json');

require_once('php-mailer/PHPMailerAutoload.php');

// Step 1 - Enter your email address below.
$email = 'obchod@bluesat.cz';

$subject = 'Zpráva z webového formuláře Bluesat.cz';

if($email) {
  $fields = array(
    0 => array(
      'text' => 'Jméno',
      'val' => $_POST['name']
    ),
    1 => array(
      'text' => 'Email',
      'val' => $_POST['email']
    ),
    2 => array(
      'text' => 'Telefon',
      'val' => $_POST['phone']
    ),
    3 => array(
      'text' => 'Zpráva',
      'val' => $_POST['message']
    )
  );

  $message = "";

  foreach($fields as $field) {
    $message .= $field['text'].": " . htmlspecialchars($field['val'], ENT_QUOTES) . "<br>\n";
  }

  $mail = new PHPMailer;

  //$mail->IsSMTP();                                      	// Set mailer to use SMTP

  // Optional Settings
  //$mail->Host = 'mail.yourserver.com';				  					// Specify main and backup server
  //$mail->SMTPAuth = true;                             		// Enable SMTP authentication
  //$mail->Username = 'username';             		  				// SMTP username
  //$mail->Password = 'secret';                         		// SMTP password
  //$mail->SMTPSecure = 'tls';                          		// Enable encryption, 'ssl' also accepted

  $mail->From = $_POST['email'];														// Email odesílatele
  $mail->FromName = $_POST['name'];													// Jméno odesílatele
  $mail->AddAddress($email);								  							// Add a recipient
  $mail->AddReplyTo($_POST['email'], $name);

  $mail->IsHTML(true);                                  		// Set email format to HTML

  $mail->CharSet = 'UTF-8';																	// Nastavíme kódování, ve kterém odesíláme e-mail
  $mail->WordWrap = 50;   																	// Nastavení zalomení textu v těle zprávy (po 50 znacích)

  $mail->Subject = $subject;
  $mail->Body    = $message;

  if(!$mail->Send()) {
    $arrResult = array ('response'=>'error');
  }

  $arrResult = array ('response'=>'success');

  echo json_encode($arrResult);

} else {

  $arrResult = array ('response'=>'error');
  echo json_encode($arrResult);

}
?>