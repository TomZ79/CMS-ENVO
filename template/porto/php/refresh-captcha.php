<?php
session_start();
$_SESSION = array();

include ('../../../assets/plugins/captcha/simple-php-captcha/simple-php-captcha.php');

$_SESSION['captcha'] = simple_php_captcha(array(
  'min_length'    => 4,
  'max_length'    => 4,
  'characters'      => '123456789',
  'min_font_size' => 28,
  'max_font_size' => 28,
  'angle_max'     => 3
));

$_SESSION['captchaCode'] = $_SESSION['captcha']['code'];

exit($_SESSION['captcha']['image_src']);
?>