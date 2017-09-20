<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>METRICS Template Documentation</title>

  <!-- ======= FONTS ======= -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&subset=latin-ext" rel="stylesheet">
  <link rel="stylesheet" href="icons/custom-icons/css/custom-icons.css">

  <!-- ======= CSS STYLE ======= -->
  <link rel="stylesheet" href="/assets/doc/css/doc.css">
  <link rel="stylesheet" href="/assets/doc/js/syntaxhighlighter/styles/shCoreKreatura.css">
  <link rel="stylesheet" href="/assets/doc/js/syntaxhighlighter/styles/shThemeKreatura.css">

</head>
<body>

<header>
  <h1>Nápověda - METRICS Template</h1>
  <div class="clear"></div>
</header>

<nav id="subnav">
  <h3>Obsah</h3>
  <h3>Aktuální kapitola: <span id="curnav" class="light"> Getting Started </span></h3>
</nav>

<aside>
  <nav>
    <ul id="sidebar">
      <li class="active">
        <span>O šabloně METRICS</span>
        <ul>
          <li data-deeplink="getting-started" class="active">Getting Started</li>
          <li data-deeplink="folders-files">Složky-Soubory</li>
          <li data-deeplink="site-layout">Rozložení Stránky</li>
          <li data-deeplink="jquery-plugins">Jquery Pluginy</li>
        </ul>
      </li>
      <li>
        <span>HTML Struktura</span>
        <ul>
          <li data-deeplink="html-structure">HTML Struktura</li>
          <li data-deeplink="Slider">Slider</li>
          <li data-deeplink="sectionpage">Sekce Stránky</li>
          <li data-deeplink="footernavigation">Zápatí</li>
          <li data-deeplink="shortcodes">Kódy a komponenty</li>
          <li data-deeplink="classes">Třídy</li>
          <li data-deeplink="buttons">Buttons</li>
        </ul>
      </li>
    </ul>
  </nav>
</aside>

<div id="content">
  <div>

    <!-- About METRICS Template -->
    <section class="active">

      <!-- Getting Started -->
      <article class="active">
        <h4>Getting Started</h4>

      </article>

      <!-- Složky-Soubory -->
      <article>
        <h4>Složky-Soubory</h4>

      </article>

      <!-- Site Layout -->
      <article>
        <h4>Rozložení Stránky</h4>

      </article>

      <!-- Jquery Plugins -->
      <article>
        <h4>Jquery Pluginy</h4>
        <hr>

      </article>

    </section>

    <!-- HTML Structure -->
    <section>

      <!-- HTML Structure -->
      <article>
        <h4>HTML Struktura</h4>

      </article>

      <!-- Slider -->
      <article>
        <h4>Slider</h4>

      </article>

      <!-- Section of Page -->
      <article>
        <h4>Sekce Stránky</h4>

      </article>

      <!-- Footer -->
      <article>
        <h4>Zápatí</h4>
        <hr>
        <h5>Západí - Text Horního Bloku</h5>
        <p>Ukázka kódu použitých v horním bloku</p>
        <pre name="code" class="brush: html;">
<div class="join-team footer-subscribe clearfix">
  <div class="col-md-7">
    <p>Our social marketing solutions help more than 2500 companies around the world deliver great results. We can't stand average, and our clients can't either.</p>
  </div>
  <div class="col-md-5">
   <div class="all-link pricinig-head-btn footer-top-btn">
      <a href="#">Take The Tour</a>
      <a href="#">Get Started</a>
   </div>
  </div>
</div>
        </pre>

        <h5>Západí - Copyright</h5>
        <p>Ukázka kódu použitého jako Copyright:</p>
        <pre name="code" class="brush: html;">
<p>© 2015 - 2016 Metrics. All Rights Reserved</p>
<p>With Love by <span><a href="http://themeforest.net/user/7oroof/portfolio?ref=7oroof" target="_blank">7oroof.com</a></span></p>
        </pre>

      </article>

      <!-- Shortcodes and components -->
      <article>
        <h4>Kódy a komponenty</h4>

      </article>

      <!-- Classes -->
      <article>
        <h4>Třídy</h4>
        <h5>Text</h5>
        <hr>
        <ul>
          <li><code>.text-left</code> - zarovnání textu vlevo</li>
          <li><code>.text-right</code> - zarovnání textu vpravo</li>
          <li><code>.text-center</code> - zarovnání textu na střed</li>
        </ul>

        <h5>No Margin - No Padding (odstranění okrajů)</h5>
        <hr>
        <ul>
          <li><code>.no-margin</code> - odstranění vnějších okrajů</li>
          <li><code>.no-mt</code> - odstranění horního okraje</li>
          <li><code>.no-mb</code> - odstranění spodního okraje</li>
          <li><code>.no-padding</code> - odstranění vnitřních okrajů</li>
          <li><code>.no-pb</code> - odstranění vnitřního horního okraje</li>
          <li><code>.no-pt</code> - odstranění vnitřního spodního okraje</li>
        </ul>
        <h5>Margin (nastavení okrajů)</h5>
        <hr>
        <p><strong>Margin bottom (nastavení spodního okraje prvku)</strong></p>
        <table class="table">
          <tr>
            <th>Třída</th>
            <th>Popis</th>
            <th>Velikost pro obrazovku DO 768px</th>
            <th>Velikost pro obrazovku NAD 768px</th>
          </tr>
          <tr>
            <td><code>.mb-small</code></td>
            <td>Vnější spodní okraj</td>
            <td>16px</td>
            <td>16px</td>
          </tr>
          <tr>
            <td><code>.mb</code></td>
            <td>Vnější spodní okraj</td>
            <td>24px</td>
            <td>24px</td>
          </tr>
          <tr>
            <td><code>.mb-medium</code></td>
            <td>Vnější spodní okraj</td>
            <td>48px</td>
            <td>72px</td>
          </tr>
          <tr>
            <td><code>.mb-large</code></td>
            <td>Vnější spodní okraj</td>
            <td>60px</td>
            <td>120px</td>
          </tr>
        </table>
        <p><strong>Třídy pouze pro mobilní a dotyková zařízení</strong></p>
        <table class="table">
          <tr>
            <th>Třída</th>
            <th>Popis</th>
            <th>Velikost pro obrazovku DO 767px</th>
          </tr>
          <tr>
            <td><code>.mb-xs</code></td>
            <td>Vnější spodní okraj</td>
            <td>24px</td>
          </tr>
        </table>
        <table class="table">
          <tr>
            <th>Třída</th>
            <th>Popis</th>
            <th>Velikost pro obrazovku DO 991px</th>
          </tr>
          <tr>
            <td><code>.mb-sm</code></td>
            <td>Vnější spodní okraj</td>
            <td>24px</td>
          </tr>
        </table>
        <p><strong>Margin top (nastavení horního okraje prvku)</strong></p>
        <table class="table">
          <tr>
            <th>Třída</th>
            <th>Popis</th>
            <th>Velikost pro obrazovku DO 768px</th>
            <th>Velikost pro obrazovku NAD 768px</th>
          </tr>
          <tr>
            <td><code>.mt-small</code></td>
            <td>Vnější horní okraj</td>
            <td>16px</td>
            <td>16px</td>
          </tr>
          <tr>
            <td><code>.mt</code></td>
            <td>Vnější horní okraj</td>
            <td>24px</td>
            <td>24px</td>
          </tr>
          <tr>
            <td><code>.mt-medium</code></td>
            <td>Vnější horní okraj</td>
            <td>36px</td>
            <td>72px</td>
          </tr>
          <tr>
            <td><code>.mt-large</code></td>
            <td>Vnější horní okraj</td>
            <td>60px</td>
            <td>120px</td>
          </tr>
        </table>
        <p><strong>Padding bottom (nastavení vnitřního spodního okraje prvku)</strong></p>
        <table class="table">
          <tr>
            <th>Třída</th>
            <th>Popis</th>
            <th>Velikost pro obrazovku DO 768px</th>
            <th>Velikost pro obrazovku NAD 768px</th>
          </tr>
          <tr>
            <td><code>.pb-small</code></td>
            <td>Vnitřní spodní okraj</td>
            <td>16px</td>
            <td>16px</td>
          </tr>
          <tr>
            <td><code>.pb</code></td>
            <td>Vnitřní spodní okraj</td>
            <td>24px</td>
            <td>24px</td>
          </tr>
          <tr>
            <td><code>.pb-medium</code></td>
            <td>Vnitřní spodní okraj</td>
            <td>36px</td>
            <td>72px</td>
          </tr>
          <tr>
            <td><code>.pb-large</code></td>
            <td>Vnitřní spodní okraj</td>
            <td>60px</td>
            <td>120px</td>
          </tr>
        </table>
        <p><strong>Padding top (nastavení vnitřního horního okraje prvku)</strong></p>
        <table class="table">
          <tr>
            <th>Třída</th>
            <th>Popis</th>
            <th>Velikost pro obrazovku DO 768px</th>
            <th>Velikost pro obrazovku NAD 768px</th>
          </tr>
          <tr>
            <td><code>.pt-small</code></td>
            <td>Vnitřní horní okraj</td>
            <td>16px</td>
            <td>16px</td>
          </tr>
          <tr>
            <td><code>.pt</code></td>
            <td>Vnitřní horní okraj</td>
            <td>24px</td>
            <td>24px</td>
          </tr>
          <tr>
            <td><code>.pt-medium</code></td>
            <td>Vnitřní horní okraj</td>
            <td>36px</td>
            <td>72px</td>
          </tr>
          <tr>
            <td><code>.pt-large</code></td>
            <td>Vnitřní horní okraj</td>
            <td>60px</td>
            <td>120px</td>
          </tr>
        </table>
        <h5>Border (rámečky)</h5>
        <hr>
        <table class="table">
          <tr>
            <th>Třída</th>
            <th>Popis</th>
            <th>Vlastnost</th>
          </tr>
          <tr>
            <td><code>.no-border</code></td>
            <td>Odstranění rámečků</td>
            <td>border: none !important;</td>
          </tr>
        </table>

      </article>

      <!-- Buttons -->
      <article>
        <h4>Buttons</h4>
        <h5>Button Size</h5>
        <hr>
        <img src="/template/metrics/help/img/buttons1.png" alt="">
        <p>Příklad:</p>
        <pre name="code" class="brush: html;">
<a class="btn btn-filled btn-primary" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-filled btn-primary btn-xs" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-filled btn-primary btn-sm" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-filled btn-primary btn-lg" href="#" alt="">TEXT ON THE BUTTON</a>
        </pre>

        <h5>Button Colors</h5>
        <hr>
        <img src="/template/metrics/help/img/buttons.png" alt="">
        <p>Příklad:</p>
        <pre name="code" class="brush: html;">
<a class="btn" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-filled" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-primary" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-filled btn-primary" href="#" alt="">TEXT ON THE BUTTON</a>
        </pre>

        <h5>Button Hover Styles</h5>
        <hr>
        <img src="/template/metrics/help/img/buttons2.gif" alt="">
        <p>Příklad:</p>
        <pre name="code" class="brush: html;">
<a class="btn btn-hover-primary" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-hover-dark" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-filled btn-hover-primary" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-filled btn-hover-dark" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-primary btn-hover-primary" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-filled btn-primary btn-hover-primary" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-filled btn-primary btn-hover-dark" href="#" alt="">TEXT ON THE BUTTON</a>
        </pre>

        <h5>Button Hover Styles on dark background</h5>
        <hr>
        <img src="/template/metrics/help/img/buttons3.gif" alt="">
        <p>Příklad:</p>
        <pre name="code" class="brush: html;">
<a class="btn btn-white btn-hover-primary" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-white btn-hover-dark" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-filled btn-white btn-hover-primary" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-filled btn-white btn-hover-dark" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-white" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-primary btn-hover-white" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-filled btn-white" href="#" alt="">TEXT ON THE BUTTON</a>
<a class="btn btn-filled btn-primary btn-hover-white" href="#" alt="">TEXT ON THE BUTTON</a>
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
  $(document).ready(function(){
    $("#filter").keyup(function(){

      // Retrieve the input field text and reset the count to zero
      var filter = $(this).val(), count = 0;

      // Loop through the comment list
      $('.show-icon li').each(function(){

        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
          $(this).hide();

          // Show the list item if the phrase matches and increase the count by 1
        } else {
          $(this).show();
          count++;
        }
      });

      // Update the count
      var numberItems = count;
      if (filter == '')  {
        $("#filter-count").text('');
      } else {
        $("#filter-count").text("Počet vyhledaných ikon : " + count);
      }
    });
  });
</script>

</body>
</html>