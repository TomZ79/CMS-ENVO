<?php
#######################################################################
#				PHP Simple Captcha Script
#	Script Url: http://toolspot.org/php-simple-captcha.php
########################################################################
session_start ();
$code             = rand (1000, 9999);
$_SESSION["code"] = $code;

//generate image
$im = imagecreatetruecolor (50, 24);
$bg = imagecolorallocate ($im, 98, 98, 98);
$fg = imagecolorallocate ($im, 255, 255, 255);

//draw text:
imagefill ($im, 0, 0, $bg);
imagestring ($im, 5, 5, 5, $code, $fg);

// prevent client side  caching
header ("Cache-Control: no-cache, must-revalidate");
header ('Content-type: image/png');

//send image to browser
imagepng ($im);
imagedestroy ($im);
?>