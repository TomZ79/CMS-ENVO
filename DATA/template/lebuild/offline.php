<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="<?=$site_language?>" class="no-js"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="<?=$site_language?>" class="no-js"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="<?=$site_language?>" class="no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="<?= $site_language ?>" class="no-js">
<!--<![endif]-->
<head>

  <meta charset="UTF-8" />
  <!-- Document Title
  ============================================= -->
  <title>
    <?php
    echo $setting["title"];
    if ($setting["title"]) {
      echo " &raquo; ";
    }
    echo $PAGE_TITLE;
    ?>
  </title>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="HalfTime - Coming Soon Template by Just Good Themes" />

  <!-- Included CSS files -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,700,700italic" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/offline.css">


</head>
<body>

<!-- LEFT SIDE -->
<div class="left-wrap">

  <div class="inner fadeInLeft">

    <!-- Header -->
    <header class="site-header">
      <h1 class="site-title"><img src="/template/<?= ENVO_TEMPLATE ?>/assets/images/Logo_Orbyt_2.png" width="400" height="169" alt="ORBYT s.r.o." /></h1>
    </header>

    <!-- Intro -->
    <div class="intro">
      <div class="intro-title">
        <?php if ($USR_IP_BLOCKED) { ?>

          <!-- IP USER BLOCKED -->
          <h6 class="m-b20 text-uppercase"><?=$USR_IP_BLOCKED?></h6>

        <?php } else { ?>

          <!-- OFFLINE PAGE -->
          <h5 class="m-b20 text-uppercase"><?=$tl["general_error"]["generror6"]?></h5>
          <!-- <p style="font-size: 25px;"><?=$tl["general_error"]["generror7"]?></p> -->
          <p style="font-size: 25px;">V tuto chvíli je požadovaná stránka nedostupná, dochází k úpravě webu.</p>

        <?php } ?>
      </div>
    </div>

  </div>

  <!-- Background image and overlay -->
  <div class="bg"></div>
  <div class="bg-overlay"></div>

</div>
<!-- END LEFT SIDE -->

<!-- RIGHT SIDE -->
<div class="right-wrap">

  <div class="inner fadeInRight">

    <!-- Navigation -->
    <nav class="site-nav">
      <h3 class="visually-hidden">Navigation</h3>
      <ul id="menu">
        <li><a href="#about" title="About">O nás</a></li>
        <li><a href="#contacts" title="Contacts">Kontakt</a></li>
        <li><a href="#client" title="Contacts">KLIENTSKÁ ZÓNA</a></li>
      </ul>
    </nav>

    <!-- Main content -->
    <div id="main">

      <!-- Section About -->
      <section id="about" class="main-section">
        <h1>O nás</h1>
        <p>Naše kanceláře zajišťují správu a údržbu nemovitostí, zejména bytových domů. Fungujeme od roku 1992. Hlavním místem působnosti je Karlovarský kraj. Naše služby využívají i klkienti z Ústeckého nebo Středočeského kraje.</p>
        <p>V naší činnosti využíváme vlastní bohaté zkušenosti a odborné znalosti, ale spolupracujeme s celou řadou odborníků, ať už v oblasti práva, finančního poradenství, stavebnictví a dopravy.</p>
        <p>Všechny naše spolupracující firmy a společnosti patří ke špičce ve svém oboru.</p>

        <h1>Naše služby</h1>

        <!-- Services list -->
        <div class="service">
          <div class="service-icon">
            <i class="icon fa fa-book" aria-hidden="true"></i>
          </div>
          <div class="service-desc">
            <p><span class="highlight">Oblast ekonomická a účetní</span> Vedení předepsané formy účetnictví - buď daňové evidence nebo účetnictví (všichni je z minulosti známe jako podvojné účetnictví) dle platných zákonných předpisů. Co se pod tímto konkrétně skrývá? Převezmeme za Vás veškeré doklady, které řádně označíme, zkontrolujeme jejich správnost věcnou i formální. Pokud se jedná o přijaté faktury, jsou tyto řádně vedeny v knize přijatých faktur a je zajištěna jejich včasná a řádná úhrada po odsouhlasení pověřeným členem výboru společenství. Pokud se jedná o faktury vydané je postup obdobný s tím, že kontrolujeme, zda Vám byly faktury včas uhrazeny.</p>
          </div>
        </div>

        <div class="service">
          <div class="service-icon">
            <i class="icon fa fa-folder-open" aria-hidden="true"></i>
          </div>
          <div class="service-desc">
            <p><span class="highlight">Oblast evidence prostor a vlastníků</span> Jednotlivým vlastníků vystavujeme formou evidenčních listů měsíční předpis plateb spojených s užíváním bytů (nebytů), vč. dlouhodobé zálohy, tj. fondu oprav, tyto předpisy se upravují na základě rozhodnutí shromáždění, a to zejména rozhodnutí o navýšení tvorby fondu oprav, ale také v návaznosti na výsledky - zejména nedoplatky z vyúčtování nebo reagují na zvýšení cen medií (voda, teplo, atd.)</p>
          </div>
        </div>

        <div class="service">
          <div class="service-icon">
            <i class="icon fa fa-gavel" aria-hidden="true"></i>
          </div>
          <div class="service-desc">
            <p><span class="highlight">Oblast technická</span> Pomůžeme Vám nebo za Vás zajistíme kvalitní pojištění Vaší nemovitosti, včetně pojištění odpovědnosti členů statutárních orgánů.</p>
          </div>
        </div>

        <div class="service">
          <div class="service-icon">
            <i class="icon fa fa-users" aria-hidden="true"></i>
          </div>
          <div class="service-desc">
            <p><span class="highlight">Profesionální správce</span> Pokud se v rámci Vašeho společenství nepodaří zvolit výbor nebo předsedu, máme i pro tuto situaci řešení. Můžeme Vám nabídnout špičkové odborníky, kteří se touto problematikou dlouhodobě zabývají.</p>
          </div>
        </div>

      </section>

      <!-- Section Contacts -->
      <section id="contacts" class="main-section">
        <h1>Kontakt</h1>

        <!-- Contact details -->
        <div class="row">
          <div class="one-half">
            <h2><i class="icon fa fa-phone"></i>Telefon</h2>
            <p>Telefon: +420 353 590 332</p>
            <h2><i class="icon fa fa-envelope-o"></i>Email</h2>
            <p>info@orbyt.cz</p>
          </div>
          <div class="one-half">
            <h2><i class="icon fa fa-map-marker"></i>Adresa</h2>
            <p>Foersterova 1112/4<br /> Karlovy Vary<br /> 360 01</p>
          </div>
        </div>

      </section>

      <!-- Section Client -->
      <section id="client" class="main-section">
        <h1>KLIENTSKÁ ZÓNA</h1>

        <!-- Client details -->
        <div class="row">
          <div class="one">
            <div class="newsletter">
              <form action="http://klient.orbyt.cz/CheckLogin" method="post" id="newsletter-form">
                <input type="hidden" name="logdest" value="/main" >
                <input type="hidden" name="logqry" value="" >

                <p class="form-field">
                  <label for="newsletter_email" class="visually-hidden">Uživatelské jméno:</label>
                  <input type="text" name="USRNAME" id="newsletter_email" value="" placeholder="Uživatelské jméno" />
                </p>
                <p class="form-field">
                  <label for="newsletter_email" class="visually-hidden">Heslo:</label>
                  <input type="text" name="PSWD" id="newsletter_email" value="" placeholder="Heslo" />
                </p>
                <p class="form-field">
                  <input type="submit" name="newsletter_submit" id="newsletter_submit" value="Přihlásit se" />
                </p>
              </form>

            </div>
          </div>
        </div>

      </section>

    </div>

  </div>

</div>
<!-- END RIGHT SIDE -->

<!-- End Document  ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/custom.js"></script>
<script>
  $(document).ready(function () {

    // Add background image
    $('.left-wrap .bg').backstretch('https://forbesmedia.cz/uploads/2021/08/karlovy-vary.png');

    // Add tabs functionality to the right side content
    jgtContentTabs();

  });
</script>
</body>

</html>



