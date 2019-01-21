<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Download Plugin Documentation</title>

	<!-- ======= FONTS ======= -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&subset=latin-ext" rel="stylesheet">

	<!-- ======= CSS STYLE ======= -->
	<!-- Code-prettify -->
	<link href="/admin/assets/plugins/code-prettify-master/themes/github/github.css" rel="stylesheet" type="text/css"/>
	<script src="/admin/assets/plugins/code-prettify-master/src/prettify.js"></script>
	<!-- Main style -->
	<link rel="stylesheet" href="/admin/assets/doc/css/doc.css">


	<!--[if lt IE 9]>
	<script src="/admin/assets/doc/js/html5.js"></script>
	<![endif]-->

</head>
<body>

<header>
	<h1>Documentation - Plugin Download</h1>
	<div class="clear"></div>
</header>

<nav id="subnav">
	<h3>Content</h3>
	<h3>Current chapter: <span id="curnav" class="light"> About Plugin </span></h3>
</nav>

<aside>
	<nav>
		<ul id="sidebar">
			<li class="active">
				<span>About Plugin</span>
				<ul>
					<li data-deeplink="about-plugin" class="active">About Plugin</li>
					<li data-deeplink="folders-files">Folder-Files</li>
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
				<h4>About Plugin</h4>

			</article>

			<!-- Folders and Files -->
			<article>
				<h4>Folders and Files</h4>

			</article>

			<!-- Changelog -->
			<article>
				<h4>Changelog</h4>
				<h5>v 1.2.1</h5>
				<pre class="prettyprint">
// # List of new components
// ------------------------------

[new] Add static page into CMS Dashboard
[new] Added the ability to insert images for FB

// # List of fixed bugs
// ------------------------------

[fixed] Reformat code
[fixed] Language file cs.ini
[fixed] Fix typo

// # List of removed components
// ------------------------------

[removed] Remove unnecessary code
				</pre>

				<h5>v 1.2</h5>
				<pre class="prettyprint">
// # List of new components
// ------------------------------

[new] Add new value '$DOWNLOAD_CATLIST' and '$DOWNLOAD_CAT' for downloadfile.php ( Category for download file )
[new] If download file not exist, show notification
[new] If download file not access, show notification
[new] If not exist frontend template, load basic download template

// # List of fixed bugs
// ------------------------------

[fixed] Reformat code
[fixed] Language file cs.ini
[fixed] Fix typo

// # List of removed components
// ------------------------------

[removed] Remove unnecessary code
				</pre>

				<h5>v 1.1</h5>
				<pre class="prettyprint">
// # List of new components
// ------------------------------

[new] Better notification
[new] Use class for create hmtl element
[new] Add help for plugin
[new] Better install/unistall wizard
[new] New design
[new] Add edit of articles time

// # List of fixed bugs
// ------------------------------

[fixed] Reformat code
[fixed] Language file cs.ini
[fixed] Fix typo

// # List of removed components
// ------------------------------

[removed] Remove unnecessary code
				</pre>

				<h5>v 1.0</h5>
				<p>Basic initial</p>
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