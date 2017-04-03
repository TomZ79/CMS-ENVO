<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Belowheader Plugin Documentation</title>

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
  <h1>Nápověda - Plugin Belowheader</h1>
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
        <h4>O Pluginu</h4>
        <p>Plugin <strong>Belowheader</strong> umožnuje vkládat zvláštní obsah do stránky před a za obsah stránky.</p>
        <p>Pomocí pluginu můžeme vkládat například:</p>
        <ul>
          <li>Carousel obrázky</li>
          <li>Statické obrazky</li>
          <li>Jakékoliv texty</li>
        </ul>
        <h5>Rozložení Belowheader</h5>
        <hr>
        <p><img src="/assets/doc/img/belowheader1.png" alt=""></p>
        <h5>Použití Pluginu</h5>
        <hr>
        <p>Zobrazení obsahu před a za stránkou můžeme přiřadit jednotlivým uživatelským skupinám. </p>
        <p>Obsah Belowheader <strong>můžeme zobrazit</strong> v následujících stránkách a dalších pluginech:</p>
        <ul>
          <li>V jednotlivých stránkách</li>
          <li>V pluginu Zprávy na hlavní stránce a v jednotlivých zprávách</li>
          <li>Ve Štítkách (Tagy)</li>
          <li>Ve vyhledávání</li>
          <li>V mapě stránek</li>
        </ul>
        <p>Obsah Belowheader <strong>nemůžeme zobrazit</strong> v následujících pluginech:</p>
        <ul>
          <li>V Blogu (Novinky)</li>
          <li>V Download (Ke stažení)</li>
          <li>V FAQ (Často kladené otázky)</li>
          <li>V Register Form</li>
        </ul>

      </article>

      <!-- Folders and Files -->
      <article>
        <h4>Soubory a Složky</h4>
        <div class="css-treeview">
          <ul>
            <li>
              <input type="checkbox" id="item-0"/>
              <label for="item-0">admin</label>
              <span>(administrace pluginu)</span>
              <ul>
                <li>
                  <input type="checkbox" id="item-0-0"/>
                  <label for="item-0-0">js</label>
                  <span>(javascript a jquery soubory)</span>
                  <ul>
                    <li class="file">pages.belowheader.php</li>
                  </ul>
                </li>
                <li>
                  <input type="checkbox" id="item-0-1"/>
                  <label for="item-0-1">lang</label>
                  <span>(jazykové soubory)</span>
                  <ul>
                    <li class="file">cs.ini</li>
                    <li class="file">en.ini</li>
                  </ul>
                </li>
                <li>
                  <input type="checkbox" id="item-0-2"/>
                  <label for="item-0-2">template</label>
                  <span>(šablony pro administrační rozhraní)</span>
                  <ul>
                    <li class="file">bh.php</li>
                    <li class="file">bhnav.php</li>
                    <li class="file">editbh.php</li>
                    <li class="file">newbh.php</li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="file">bhinput.php</li>
            <li class="file">bhinputb.php</li>
            <li class="file">help.php</li>
            <li class="file">install.php</li>
            <li class="file">uninstall.php</li>
          </ul>
        </div>
      </article>

      <!-- Changelog -->
      <article>
        <h4>Changelog</h4>
        <h5>v 1.1</h5>
        <pre name="code" class="brush: plain;">
// # List of new components
// ------------------------------

[new] Better notification
[new] Use class for create hmtl element
[new] Add help for plugin
[new] Better install/unistall wizard
[new] New design

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

    <!-- Hooks -->
    <section>

      <!-- Hook: tpl_below_header -->
      <article>
        <h4>Hook: tpl_below_header</h4>
        <p>Template Hook: tpl_below_header</p>
        <p>This hook is located below the header, display advertising, buttons or whatever you like below the navigation and logo.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/belowheader/bhinput.php
        </pre>

      </article>

      <!-- Hook: tpl_below_content -->
      <article>
        <h4>Hook: tpl_below_content</h4>
        <p>Template Hook: tpl_below_content</p>
        <p>This is the brother from the below_header hook. You can close some divs or add some extra stuff that doesn't fit in the main section.</p>

        <p>You can include a file, for example:</p>
        <pre name="code" class="brush: php;">
plugins/belowheader/bhinputb.php
        </pre>

      </article>

      <!-- Hook: php_admin_lang -->
      <article>
        <h4>Hook: php_admin_lang</h4>
        <p>Use this hook to execute PHP language code in the admin/index.php file.</p>

        <p>For example:</p>
        <pre name="code" class="brush: php;">
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