<?php
session_cache_limiter('nocache');
header('Expires: ' . gmdate('r', 0));

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-type: application/json');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Use below lines for including PHPMailer in case of normal PHP Script only
require '../../template/autorex/php/src/PHPMailer.php';
require '../../template/autorex/php/src/Exception.php';
require '../../template/autorex/php/src/SMTP.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->setLanguage('cz', '../../template/autorex/php/language/phpmailer.lang-cs.php');

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

if (!file_exists('blocked_ips.txt')) {
  $deny_ips = array(
    '127.0.0.1',
    '192.168.1.163'
  );
} else {
  $deny_ips = file('blocked_ips.txt');
}

$ip = get_client_ip_server();

// search current IP in $deny_ips array
if ((array_search($ip, $deny_ips)) !== FALSE) {
  // address is blocked:
  $arrResult = array(
    'response'    => 'error',
    'responsemsg' => 'Your IP adress (' . $ip . ') was blocked!'
  );
} else {

// BASIC VARIABLE
//-------------------------
// Fields
  $postvalue = array(
    'ip'        => get_client_ip_server(),
    'name'      => $_POST['form_name'],
    'email'     => $_POST['form_email'],
    'phone'     => $_POST['form_phone'],
    'street'    => $_POST['form_street'],
    'hnumber'   => $_POST['form_house_number'],
    'city'      => $_POST['form_city'],
    'checkbox1' => $_POST['form_checkbox1'],
    'checkbox2' => $_POST['form_checkbox2'],
    'checkbox3' => $_POST['form_checkbox3'],
    'checkbox4' => $_POST['form_checkbox4'],
    'message'   => $_POST['form_message'],
    'subject'   => 'Umyjstřechu.cz - Objednávka'
  );

// Email address
  $emails = array(
    'tomas.zukal@bluesat.cz' => 'Tomáš Zukal'
  );

  if (isset($_POST['form_checkbox1'])){
    $order1 = $_POST['form_checkbox1'];
    $order1db = 1;
  } else { $order1db = 0; }

  if (isset($_POST['form_checkbox2'])){
    $order2 = $_POST['form_checkbox2'];
    $order3db = 1;
  } else { $order2db = 0; }

  if (isset($_POST['form_checkbox3'])){
    $order3 = $_POST['form_checkbox3'];
    $order3db = 1;
  }  else { $order3db = 0; }

  if (isset($_POST['form_checkbox4'])){
    $order4 = $_POST['form_checkbox4'];
    $order4db = 1;
  }  else { $order4db = 0; }

  $message = '
  <h4>Objednávka - Umyjstrechu.cz</h4>
  Jméno: ' . $postvalue['name'] . ' <br>
  Email: ' . $postvalue['email'] . ' <br>
  Telefon: ' . $postvalue['phone'] . ' <br>
  Ulice: ' . $postvalue['street'] . ' '. $postvalue['hnumber'] . ' <br>
  Město: ' . $postvalue['city'] . ' <br><hr>
  Služby:<br>' . $order1 . ' ' . $order2 . ' ' . $order3 . ' ' . $order4 . ' <br><hr>
  <strong>Zpráva:</strong><br>' . $postvalue['message'] . ' <br><hr>
  IP Adresa' . $postvalue['ip'] . ' <br>
  ';

// SEND MAIL
//-------------------------
  if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {

      // Email odesílatele
      $mail->setFrom($postvalue['email'], $postvalue['name']);
      // Email příjemce
      foreach ($emails as $email => $name) {
        $mail -> AddAddress($email, $name);
      }
      // Reply email
      $mail->AddReplyTo($postvalue['email'], $postvalue['name']);

      // Priority
      $mail->Priority = 1;
      // Nastavíme kódování, ve kterém odesíláme e-mail
      $mail->CharSet = 'UTF-8';
      // Nastavení zalomení textu v těle zprávy (po 50 znacích)
      $mail->WordWrap = 50;
      // Nastavení formátu emailu
      $mail->IsHTML(true);

      //Send HTML or Plain Text email
      $mail->Subject = $postvalue['subject'];
      $mail->Body    = $message;
      $mail->AltBody = $message;

      if (!$mail->Send()) {
        $arrResult = array(
          'response'    => 'error',
          'responsemsg' => 'Vaše zpráva nebyla odeslána! Chyba Error E01'
        );
      }

      $arrResult = array(
        'response'    => 'success',
        'responsemsg' => 'Vaše zpráva byla úspěšně odeslána!',
        'data'        => $postvalue
      );

    } catch (Exception $e) {
      $arrResult = array(
        'response'    => 'error',
        'responsemsg' => 'Zpráva nemůže být odeslána. Chyba Error E02: ' . $mail->ErrorInfo
      );
    }
  }

}

// INSERT INTO DB
//-------------------------

// Get the DB class
require_once '../../class/class.db.php';
include_once '../../include/functions.php';

// The DB connections data
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/db.php';

// MySQLi connection
$envodb = new ENVO_mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
$envodb -> set_charset("utf8");

// DB
$envodb -> query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "ordermail (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `housenumber` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `cleanroof` int(11) unsigned NOT NULL DEFAULT 1,
  `cleangutter` int(11) unsigned NOT NULL DEFAULT 1,
  `repairroof` int(11) unsigned NOT NULL DEFAULT 1,
  `repairconductortv` int(11) unsigned NOT NULL DEFAULT 1,
  `message` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `statusmsg` varchar(100) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE utf8_czech_ci AUTO_INCREMENT=1");

$envodb -> query('INSERT INTO ' . DB_PREFIX . 'ordermail SET
                    ip = "' . smartsql($postvalue['ip']) . '",
                    name = "' . smartsql($postvalue['name']) . '",
                    email = "' . smartsql($postvalue['email']) . '",
                    phone = "' . smartsql($postvalue['phone']) . '",
                    street = "' . smartsql($postvalue['street']) . '",
                    housenumber = "' . smartsql($postvalue['hnumber']) . '",
                    city = "' . smartsql($postvalue['city']) . '",
                    cleanroof = "' . smartsql($order1db) . '",
                    cleangutter = "' . smartsql($order2db) . '",
                    repairroof = "' . smartsql($order3db) . '",
                    repairconductortv = "' . smartsql($order4db) . '",
                    message = "' . smartsql($postvalue['message']) . '",
                    status = "' . smartsql($arrResult['response']) . '",
                    statusmsg = "' . smartsql($arrResult['responsemsg']) . '",
                    time = NOW()');

// Finally close all db connections
$envodb -> envo_close();

// Return JSON output
$json_output = json_encode($arrResult);
echo $json_output;

?>