<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <title>Belowheader Plugin Dokumentace</title>

  <!-- ======= FONTS ======= -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&subset=latin-ext" rel="stylesheet">

  <!-- ======= CSS STYLE ======= -->
  <!-- Main style -->
  <link rel="stylesheet" href="/admin/assets/doc/css/doc.css">

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
          <li data-deeplink="folders-files">Složky - Soubory</li>
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
        <p>Plugin <strong>Belowheader</strong> umožnuje vkládat zvláštní obsah do stránky před a za obsah stránky.</p>
        <p>Pomocí pluginu můžeme vkládat například:</p>
        <ul>
          <li>Carousel obrázky</li>
          <li>Statické obrazky</li>
          <li>Jakékoliv texty</li>
        </ul>
        <h5>Rozložení Belowheader</h5>
        <hr>
        <p></p>
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
        <p>Základní inicializace</p>


      </article>

    </section>

  </div>
</div>

<!-- ======= JQUERY SCRIPT ======= -->
<script src="/assets/plugins/jquery/jquery-2.2.4.min.js"></script>
<script src="/admin/assets/doc/js/doc.js"></script>

</body>
</html>