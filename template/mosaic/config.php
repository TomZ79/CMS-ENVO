<?php

/*===============================================*\
|| ############################################# ||
|| # JAKWEB.CH                                 # ||
|| # ----------------------------------------- # ||
|| # Copyright 2016 JAKWEB All Rights Reserved # ||
|| ############################################# ||
\*===============================================*/

/* ### CONFIG FILE ### */

// Add Custom Stylesheet to tinyMCE Editor
if (isset($jkv["color_mosaic_tpl"]) && $jkv["color_mosaic_tpl"] == "dark") {
	$tpl_customcss = "template/mosaic/css/dark.css";
} else {
	$tpl_customcss = "template/mosaic/css/screen.css";
}