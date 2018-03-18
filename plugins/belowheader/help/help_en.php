<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Belowheader Plugin Documentation</title>

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
      <li>
        <span>Hooks</span>
        <ul>
          <li data-deeplink="tpl_below_header">Hook: tpl_below_header</li>
          <li data-deeplink="tpl_below_content">Hook: tpl_below_content</li>
          <li data-deeplink="php_admin_lang">Hook: php_admin_lang</li>
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
        <h5>v 1.1</h5>
        <pre class="prettyprint">
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

    <!-- Hooks -->
    <section>

      <!-- Hook: tpl_below_header -->
      <article>
        <h4>Hook: tpl_below_header</h4>
        <p>Template Hook: tpl_below_header</p>
        <p>This hook is located below the header, display advertising, buttons or whatever you like below the navigation and logo.</p>

        <p>You can include a file, for example:</p>
        <pre class="prettyprint linenums lang-php">
plugins/belowheader/bh_header.php
</pre>

      </article>

      <!-- Hook: tpl_below_content -->
      <article>
        <h4>Hook: tpl_below_content</h4>
        <p>Template Hook: tpl_below_content</p>
        <p>This is the brother from the below_header hook. You can close some divs or add some extra stuff that doesn't fit in the main section.</p>

        <p>You can include a file, for example:</p>
        <pre class="prettyprint linenums lang-php">
plugins/belowheader/bh_footer.php
</pre>

      </article>

      <!-- Hook: php_admin_lang -->
      <article>
        <h4>Hook: php_admin_lang</h4>
        <p>Use this hook to execute PHP language code in the admin/index.php file.</p>

        <p>For example:</p>
        <pre class="prettyprint linenums lang-php">
if (file_exists(APP_PATH.'plugins/belowheader/admin/lang/'.$site_language.'.ini')) {
    $tlbh = parse_ini_file(APP_PATH.'plugins/belowheader/admin/lang/'.$site_language.'.ini', true);
} else {
    $tlbh = parse_ini_file(APP_PATH.'plugins/belowheader/admin/lang/en.ini', true);
}
</pre>

      </article>

    </section>

  </div>
</div>

<!-- ======= JQUERY SCRIPT ======= -->
<script src="/assets/plugins/jquery/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="/admin/assets/doc/js/doc.js"></script>

<script>
  // Init Code-Prettify
  window.onload = (function () {
    prettyPrint();
  });
</script>

</body>
</html>