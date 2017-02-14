<!DOCTYPE html>
<html lang="<?php echo $site_language; ?>">
<head>
	<meta charset="utf-8">

	<!-- BEGIN Vendor CSS-->
	<link rel="stylesheet" href="../assets/plugins/bootstrapv3/css/bootstrap.min.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen"/>

	<!-- CUSTOM CSS -->
	<style type="text/css">
		/* Style for iframe */
		body {
			background-color: transparent;
		}
	</style>

	<!-- BEGIN VENDOR JS -->
	<script src="assets/plugins/jquery/jquery-1.11.1.min.js?=<?php echo $jkv["updatetime"]; ?>"></script>

	<!-- Import all hooks for in between head -->
	<?php if (isset($JAK_HOOK_HEAD_ADMIN) && is_array ($JAK_HOOK_HEAD_ADMIN)) foreach ($JAK_HOOK_HEAD_ADMIN as $headt) {
		include_once APP_PATH . $headt['phpcode'];
	} ?>

	<!--[if lt IE 9]>
	<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<section class="content-header">
				<h1><?php echo $tl["general"]["g135"]; ?></h1>
