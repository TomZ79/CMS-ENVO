<link rel="stylesheet" href="<?php echo BASE_URL; ?>template/canvas/css/ui-mosaic_1.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>template/canvas/css/themes/color-styles_1.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css"/>
<?php if ($jkv["design_mosaic_tpl"] == "dark") { ?>
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>template/canvas/css/dark.css?=<?php echo $jkv["updatetime"]; ?>"
		id="tplmosaic" type="text/css"/>
<?php } else { ?>
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>template/canvas/css/screen.css?=<?php echo $jkv["updatetime"]; ?>"
		id="tplmosaic" type="text/css"/>
<?php } ?>

<?php if ($jkv["fontg_mosaic_tpl"] != "NonGoogle") { ?>
	<link rel="stylesheet"
		href="http://fonts.googleapis.com/css?family=<?php echo $jkv["fontg_mosaic_tpl"]; ?>:regular,italic,bold,bolditalic"
		type="text/css"/>
<?php }
if ($jkv["font_mosaic_tpl"] == "Roboto") { ?>
	<link rel="stylesheet"
		href="http://fonts.googleapis.com/css?family=<?php echo $jkv["font_mosaic_tpl"]; ?>:regular,italic,bold,bolditalic"
		type="text/css"/>
<?php } ?>

<style type="text/css">
	h1, h2, h3, h4, h5, h6 {
		font-family: <?php if ($jkv["fontg_mosaic_tpl"] != "NonGoogle") echo '"'.str_replace("+", " ", $jkv["fontg_mosaic_tpl"]).'", '; echo $jkv["font_mosaic_tpl"];?>, sans-serif;
	<?php echo ($jkv["hcolour_mosaic_tpl"] ? 'color:'.$jkv["hcolour_mosaic_tpl"].';' : '');?>
	}

	body, code, input[type="text"], textarea {
		font-family: <?php echo $jkv["font_mosaic_tpl"];?>, sans-serif;
	}

	<?php echo ($jkv["txtcolour_mosaic_tpl"] ? 'body, .text-muted, .info-board h4 { color:'.$jkv["txtcolour_mosaic_tpl"].'; }' : '');?>

	<?php if ($jkv["mainbg_mosaic_tpl"]) { ?>
	body, #sb-site {
		background-image: none;
		background-color: <?php echo $jkv["mainbg_mosaic_tpl"];?>;
	}

	<?php } if (!$jkv["mainbg_mosaic_tpl"] && $jkv["pattern_mosaic_tpl"]) { ?>
	body, #sb-site {
		background-image: url("<?php echo BASE_URL;?>template/canvas/img/patterns/<?php echo $jkv["pattern_mosaic_tpl"];?>.png");
	}

	<?php } if (!$jkv["navbarstyle_mosaic_tpl"]) { ?>
	#sb-site {
		margin-top: 0;
	}

	.navbar {
		margin-bottom: 0;
	}

	<?php } else { ?>
	#sb-site {
		margin-top: 115px;
	}

	<?php } if ($jkv["boxpattern_mosaic_tpl"]) { ?>
	.boxed-layout {
		background-image: url("<?php echo BASE_URL;?>template/canvas/img/patterns/<?php echo $jkv["boxpattern_mosaic_tpl"];?>.png");
	}

	<?php } if ($jkv["boxbg_mosaic_tpl"]) { ?>
	.boxed-layout {
		background: <?php echo $jkv["boxbg_mosaic_tpl"];?>;
	}

	<?php } if ($jkv["navbarcolor_mosaic_tpl"]) { ?>
	.navbar {
		background: <?php echo $jkv["navbarcolor_mosaic_tpl"];?>;
	}

	<?php } if ($jkv["navbarlinkcolor_mosaic_tpl"]) { ?>
	.navbar a {
		color: <?php echo $jkv["navbarlinkcolor_mosaic_tpl"];?> !important;
	}

	<?php } if ($jkv["navbarcolorlinkbg_mosaic_tpl"]) { ?>
	.navbar-default .navbar-nav > .active > a, ul.nav-main ul.dropdown-menu li:hover > a {
		background: <?php echo $jkv["navbarcolorlinkbg_mosaic_tpl"];?>;
	}

	<?php } if ($jkv["navbarcolorsubmenu_mosaic_tpl"]) { ?>
	ul.nav-main ul.dropdown-menu {
		background: <?php echo $jkv["navbarcolorsubmenu_mosaic_tpl"];?>;
	}

	<?php } if ($jkv["sectionbg_mosaic_tpl"]) { ?>
	.section-white {
		background: <?php echo $jkv["sectionbg_mosaic_tpl"];?>;
	}

	<?php } if ($jkv["sectiontc_mosaic_tpl"]) { ?>
	.section-white h3 {
		background: <?php echo $jkv["sectiontc_mosaic_tpl"];?>;
	}

	<?php } if ($jkv["footerc_mosaic_tpl"]) { ?>
	.footer {
		background: <?php echo $jkv["footerc_mosaic_tpl"];?>;
	}

	<?php } if ($jkv["footercte_mosaic_tpl"]) { ?>
	.footer {
		color: <?php echo $jkv["footercte_mosaic_tpl"];?>;
	}

	<?php } if ($jkv["footerct_mosaic_tpl"]) { ?>
	.footer h3 {
		color: <?php echo $jkv["footerct_mosaic_tpl"];?>;
	}

	<?php } ?>

</style>