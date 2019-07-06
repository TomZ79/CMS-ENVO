<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Belowheader Plugin Documentation</title>

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
  <h1>Documentation - Plugin Belowheader</h1>
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
				<h5>v 1.3</h5>
				<pre>
// # Seznam opravených chyb
// ------------------------------

[opraveno] Reformat code
[opraveno] Fix typo

				</pre>

        <h5>v 1.2</h5>
				<pre>
// # Seznam nových komponent
// ------------------------------

[nový] New design
[nový] Add new placement option added - to all pages

// # Seznam opravených chyb
// ------------------------------

[opraveno] Reformat code
[opraveno] Language file cs.ini
[opraveno] Fix typo

// # Seznam odstraněných komponent
// ------------------------------

[odstraněno] Remove unnecessary code
				</pre>

        <h5>v 1.1</h5>
				<pre>
// # Seznam nových komponent
// ------------------------------

[nový] Better notification
[nový] Use class for create hmtl element
[nový] Add help for plugin
[nový] Better install/unistall wizard
[nový] New design

// # Seznam opravených chyb
// ------------------------------

[opraveno] Reformat code
[opraveno] Language file cs.ini
[opraveno] Fix typo

// # Seznam odstraněných komponent
// ------------------------------

[odstraněno] Remove unnecessary code
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