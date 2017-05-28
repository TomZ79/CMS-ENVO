<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Open URL Blank Plugin Documentation</title>

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
  <h1>Documentation - Plugin Open URL Blank</h1>
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
        <hr>
        <p>The plugin <strong>Open URL</strong> will add a tiny javascript code to open all external URL's in a new page/tab. That is better for SEO and easier for the administrator.</p>
        <p>The javascript code is as follow:</p>
        <pre name="code" class="brush: plain;">
$("a[href^='http']:not([href^=''])")
  .attr({
    target: "_blank"
  })
});
    </pre>

      </article>

      <!-- Folders and Files -->
      <article>
        <h4>Folders and Files</h4>

      </article>

      <!-- Changelog -->
      <article>
        <h4>Changelog</h4>

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