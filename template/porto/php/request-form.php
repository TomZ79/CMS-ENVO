<?php
session_cache_limiter('nocache');
header('Expires: ' . gmdate('r', 0));

header('Content-type: application/json');

require_once('php-mailer/PHPMailerAutoload.php');

// Step 1 - Enter your email address below.
$email = 'bluesatkv@gmail.com';

$subject = 'Poptávka z webového formuláře Bluesat';

if($email) {

  $message = "";

  // SEND TEST EMAIL
  // Retrieve the email template required
  $message = file_get_contents('php-mailer-template/request-form.html');

  // Replace the % with the actual information
  $message = str_replace('%title%', BASE_URL, $message);
  $message = str_replace('%subject%', $subject, $message);
  $message = str_replace('%name%', '<strong>Name : </strong>' . $_POST['name'], $message);
  $message = str_replace('%email%', '<strong>Email : </strong>' . $_POST['email'], $message);
  $message = str_replace('%phone%', '<strong>Phone : </strong>' . $_POST['phone'], $message);
  $message = str_replace('%subjectform%', '<strong>Subject : </strong>' . $_POST['subject'], $message);
  $message = str_replace('%location%', '<strong>Location : </strong>' . $_POST['location'], $message);
  $message = str_replace('%term%', '<strong>Term : </strong>' . $_POST['term'], $message);
  $message = str_replace('%message%', '<strong>Message : </strong>' . $_POST['message'], $message);
  $message = str_replace('%phonelink%', $_POST['phone'], $message);

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