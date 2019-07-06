<!DOCTYPE html>
<html lang="cs">
<head>
	<meta charset="utf-8">
	<title>TV Tower Plugin Dokumentace</title>

	<!-- ======= FONTS ======= -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&subset=latin-ext" rel="stylesheet">

	<!-- ======= CSS STYLE ======= -->
	<!-- Main style -->
	<link rel="stylesheet" href="/admin/assets/doc/css/doc.css">


	<!--[if lt IE 9]>
	<script src="/admin/assets/doc/js/html5.js"></script>
	<![endif]-->

</head>
<body>

<header>
	<h1>Nápověda - Plugin TV Tower</h1>
	<div class="clear"></div>
</header>

<nav id="subnav">
	<h3>Obsah</h3>
	<h3>Aktuální kapitola: <span id="curnav" class="light"> O Pluginu </span></h3>
</nav>

<aside>
	<nav>
		<ul id="sidebar">
			<li class="active">
				<span>O Pluginu</span>
				<ul>
					<li data-deeplink="about-plugin" class="active">O Pluginu</li>
					<li data-deeplink="folders-files">Složky-Soubory</li>
					<li data-deeplink="changelog">Changelog</li>
				</ul>
			</li>
		</ul>
	</nav>
</aside>

<div id="content">
	<div>

		<!-- About Plugin -->
		<section class="active">

			<!-- About Plugin -->
			<article class="active">
				<h4>O Pluginu</h4>
				<hr>

			</article>

			<!-- Folders and Files -->
			<article>
				<h4>Soubory a Složky</h4>

			</article>

			<!-- Changelog -->
			<article>
				<h4>Changelog</h4>

			</article>

		</section>

	</div>
</div>

<!-- ======= JQUERY SCRIPT ======= -->
<script src="/assets/plugins/jquery/jquery-2.2.4.min.js"></script>
<script src="/admin/assets/doc/js/doc.js"></script>

<script>
  // Init Code-Prettify
  window.onload = (function () {
    prettyPrint();
  });
</script>

</body>
</html>