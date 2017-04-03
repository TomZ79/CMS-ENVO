<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Download Plugin Documentation</title>

  <!-- ======= FONTS ======= -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&subset=latin-ext" rel="stylesheet">

  <!-- ======= CSS STYLE ======= -->
  <link rel="stylesheet" href="/assets/doc/css/doc.css">
  <link rel="stylesheet" href="/assets/doc/js/syntaxhighlighter/styles/shCoreKreatura.css">
  <link rel="stylesheet" href="/assets/doc/js/syntaxhighlighter/styles/shThemeKreatura.css">

  <!--[if lt IE 9]>
  <script src="/assets/doc/js/html5.js"></script>
  <![endif]-->

</head>
<body>

<header>
  <h1>Nápověda - Plugin Download</h1>
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

      </article>

      <!-- Folders and Files -->
      <article>
        <h4>Soubory a Složky</h4>

      </article>

      <!-- Changelog -->
      <article>
        <h4>Changelog</h4>
        <h5>v 1.2</h5>
        <pre name="code" class="brush: plain;">
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
        <pre name="code" class="brush: plain;">
// # List of new components
// ------------------------------

[new] Better notification
[new] Use class for create hmtl element
[new] Add help for plugin
[new] Better install/unistall wizard
[new] New design
[new] Add edit of article's time

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
<script src="/assets/plugins/jquery/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="/assets/doc/js/syntaxhighlighter/scripts/shCore.js" type="text/javascript"></script>
<script src="/assets/doc/js/syntaxhighlighter/scripts/shBrushJScript.js" type="text/javascript"></script>
<script src="/assets/doc/js/syntaxhighlighter/scripts/shBrushXml.js" type="text/javascript"></script>
<script src="/assets/doc/js/syntaxhighlighter/scripts/shBrushCss.js" type="text/javascript"></script>
<script src="/assets/doc/js/syntaxhighlighter/scripts/shBrushPhp.js" type="text/javascript"></script>
<script src="/assets/doc/js/syntaxhighlighter/scripts/shBrushPlain.js" type="text/javascript"></script>
<script src="/assets/doc/js/doc.js"></script>

<script>
  $(document).ready(function () {
    //Initialize Pages core
    hljs.initHighlightingOnLoad();
  });
</script>

</body>
</html>