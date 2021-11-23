<?php

// EN: Include the config file of template ...
// CZ: Vložení konfiguračního souboru šablony ...
if (!file_exists(APP_PATH . 'template/' . ENVO_TEMPLATE . '/config.php')) die('[' . __DIR__ . '/index.php] Template Autorex - config.php not found');
require_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/config.php';

// Get last modification time of the current PHP file
$file_last_mod_time = filemtime(__FILE__);

// Specification says ETag
$etag = md5_file(__FILE__);

// Set ETag header
header("Last-Modified: " . gmdate("D, d M Y H:i:s", $file_last_mod_time) . " GMT");
header("Etag: $etag");

// Expires 2 day
header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + ((60 * 60) * 48)));

// Check whether browser had sent
if (@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == $file_last_mod_time ||
  trim($_SERVER['HTTP_IF_NONE_MATCH']) == $etag) {
  header("HTTP/1.1 304 Not Modified");
  exit;
}

?>

<!DOCTYPE html><!--[if lt IE 7 ]>
<?= '<html class="ie ie6" lang="<?=$site_language?>"> <![endif]-->' ?>
<!--[if IE 7 ]>
<?= '<html class="ie ie7" lang="<?=$site_language?>"> <![endif]-->' ?>
<!--[if IE 8 ]>
<?= '<html class="ie ie8" lang="<?=$site_language?>"> <![endif]-->' ?>
<!--[if (gte IE 9)|!(IE)]><!-->
<?= '<html lang="' . $site_language . '">' ?>
<!--<![endif]-->
<head>

  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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

  <meta name="keywords" content="<?= trim($PAGE_KEYWORDS) ?>">
  <meta name="description" content="<?= trim($PAGE_DESCRIPTION) ?>">
  <meta name="author" content="<?= $setting["metaauthor"] ?>">

  <!-- Share Social Network
  ============================================= -->
  <!-- Facebook - Open Graph data -->
  <meta property="og:title" content="<?= $PAGE_TITLE ?>"/>
  <meta property="og:type" content="article"/>
  <meta property="og:url"
      content="<?= (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>"/>
  <meta property="og:image"
      content="<?= ($FB_IMAGE ? $FB_IMAGE : ($SHOWIMG ? BASE_URL . ltrim($SHOWIMG, '/') : '')) ?>"/>
  <meta property="og:image:width" content="<?= $FB_IMAGE_W ?>"/>
  <meta property="og:image:height" content="<?= $FB_IMAGE_H ?>"/>
  <meta property="og:description" content="<?= trim($PAGE_DESCRIPTION) ?>"/>

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@publisher_handle">
  <meta name="twitter:title" content="<?= $PAGE_TITLE ?>">
  <meta name="twitter:description" content="<?= trim($PAGE_DESCRIPTION) ?>">
  <meta name="twitter:creator" content="@author_handle">
  <!-- Twitter Summary card images must be at least 120x120px -->
  <meta name="twitter:image" content="https://www.example.com/image.jpg">

  <?php if ($page == '404') { ?>
    <meta name="robots" content="noindex, follow">
  <?php } else { ?>
    <meta name="robots" content="<?= $jk_robots ?>">
  <?php }
  if ($page == "success" or $page == "logout") { ?>
    <meta http-equiv="refresh" content="1;URL=<?= $_SERVER['HTTP_REFERER'] ?>">
  <?php } ?>
  <link rel="canonical"
      href="<?= (ENVO_USE_APACHE ? substr(BASE_URL, 0, -1) : BASE_URL) . ENVO_rewrite::envoParseurl($page, $page1, $page2, $page3, $page4, $page5, $page6) ?>">

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!--[if lt IE 9]>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
  <!--[if lt IE 9]>
  <script src="js/respond.js"></script><![endif]-->

  <!-- CSS and FONTS
  ================================================== -->
  <!-- Fonts - Defer non-critical CSS -->
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Yantramanav:wght@300;400;500;700;900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Yantramanav:wght@300;400;500;700;900&display=swap">
  </noscript>
  <!-- Icon -->
  <script type='text/javascript'>
    //<![CDATA[
    function loadCSS(e, t, n) {
      "use strict";
      var i = window.document.createElement("link");
      var o = t || window.document.getElementsByTagName("script")[0];
      i.rel = "stylesheet";
      i.href = e;
      i.media = "only x";
      o.parentNode.insertBefore(i, o);
      setTimeout(function () {
        i.media = n || "all"
      })
    }

    loadCSS("/template/<?= ENVO_TEMPLATE ?>/assets/css/fontawesome-all.css");
    //]]>
  </Script>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/bootstrap.css">

  <!-- Theme CSS -->
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/style.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/responsive.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/color.css">

  <!-- Print CSS -->

  <?php if ($SHOWSOCIALBUTTON) { ?>
    <!-- Sollist -->
    <link href="/assets/plugins/jquery-sollist/jquery.sollist.min.css" rel="stylesheet" type="text/css" media="screen"/>
  <?php } ?>

  <!-- Custom Autorex Style -->
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/theme-custom.css" type="text/css"/>

  <!-- Favicons
  ================================================== -->
  <link rel="shortcut icon" href="<?= (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/" ?>favicon.ico" type="image/x-icon">

  <!-- Import templates for in between head
  ============================================= -->
  <?php if (isset($ENVO_HOOK_HEAD_TOP) && is_array($ENVO_HOOK_HEAD_TOP)) foreach ($ENVO_HOOK_HEAD_TOP as $headt) {
    include_once APP_PATH . $headt['phpcode'];
  } ?>

  <!-- Import CSS for Current page in between head
  ============================================= -->
  <?php if (isset($ENVO_HEADER_CSS)) echo $ENVO_HEADER_CSS; ?>

  <?php
  // Analytics code
  if (isset($setting["analytics"])) echo $setting["analytics"];
  ?>

</head>

<body>

<div class="page-wrapper"><!-- START BODY -->

  <!-- Preloader -->
  <div class="loader-wrap">
    <div class="preloader">
      <div class="preloader-close">Preloader Close</div>
    </div>
    <div class="layer layer-one"><span class="overlay"></span></div>
    <div class="layer layer-two"><span class="overlay"></span></div>
    <div class="layer layer-three"><span class="overlay"></span></div>
  </div>

  <?php if ($ENVO_SHOW_NAVBAR) { ?>

    <!-- START HEADER SECTION -->
    <header class="main-header header-style-one">

      <!-- Header Top -->
      <div class="header-top">
        <div class="auto-container">
          <div class="inner-container">
            <div class="left-column">
              <div class="text header-min-height"><?= $setting["ShowTextLeft_autorex_tpl"] == '1' ? $setting["headerblocktextleft_autorex_tpl"] : '' ?></div>
              <div class="office-hour"><?= $setting["ShowTextCenter_autorex_tpl"] == '1' ? $setting["headerblocktextcenter_autorex_tpl"] : '' ?></div>
            </div>
            <div class="right-column">
              <div class="phone-number mr-5"><?= $setting["ShowTextRight_autorex_tpl"] == '1' ? $setting["headerblocktextright_autorex_tpl"] : '' ?></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Header Upper -->
      <div class="header-upper">
        <div class="auto-container">
          <div class="inner-container">
            <!--Logo-->
            <div class="logo-box">
              <div class="logo"><a href="<?= BASE_URL ?>">
                  <img src="<?= $setting["LogoDark_autorex_tpl"] ?>" width="180" height="43" alt="<?= $tlautorex["image_desc"]["imdesc"] . $setting["title"] ?>"></a>
              </div>
            </div>
            <div class="right-column">
              <!--Nav Box-->
              <div class="nav-outer">
                <!--Mobile Navigation Toggler-->
                <div class="mobile-nav-toggler">
                  <img src="/template/<?= ENVO_TEMPLATE ?>/assets/images/icons/icon-bar.png" width="25" height="14" alt="">
                </div>

                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md navbar-light">
                  <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                    <!-- Main navigation -->
                    <?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/navbar.php'; ?>
                    <!-- Hook -->
                    <?php if (isset($ENVO_HOOK_HEADER) && is_array($ENVO_HOOK_HEADER)) foreach ($ENVO_HOOK_HEADER as $hheader) {
                      include_once APP_PATH . $hheader['phpcode'];
                    } ?>

                  </div>
                </nav>
              </div>
              <div class="search-btn">
                <button type="button" class="theme-btn search-toggler">
                  <span class="stroke-gap-icon icon-Search"></span>
                </button>
              </div>

              <?= $setting["ShowTextBtn_autorex_tpl"] == '1' ? '<div class="link-btn"><a href="' . $setting["LinksBtn_autorex_tpl"] . '" class="theme-btn btn-style-one">' . $setting["TextBtn_autorex_tpl"] . '</a></div>' : '' ?>

            </div>
          </div>
        </div>
      </div>
      <!--End Header Upper-->

      <!-- Sticky Header  -->
      <div class="sticky-header">
        <!-- Header Upper -->
        <div class="header-upper">
          <div class="auto-container">
            <div class="inner-container">
              <!--Logo-->
              <div class="logo-box">
                <div class="logo"><a href="<?= BASE_URL ?>">
                    <img src="<?= $setting["LogoDark_autorex_tpl"] ?>" width="180" height="43" alt="<?= $tlautorex["image_desc"]["imdesc"] . $setting["title"] ?>"></a>
                </div>
              </div>
              <div class="right-column">
                <!--Nav Box-->
                <div class="nav-outer">
                  <!--Mobile Navigation Toggler-->
                  <div class="mobile-nav-toggler">
                    <img src="/template/<?= ENVO_TEMPLATE ?>/assets/images/icons/icon-bar.png" width="25" height="14" alt="">
                  </div>
                  <!-- Main Menu -->
                  <nav class="main-menu navbar-expand-md navbar-light"></nav>
                </div>
                <div class="search-btn">
                  <button type="button" class="theme-btn search-toggler">
                    <span class="stroke-gap-icon icon-Search"></span>
                  </button>
                </div>

                <?= $setting["ShowTextBtn_autorex_tpl"] == '1' ? '<div class="link-btn"><a href="' . $setting["LinksBtn_autorex_tpl"] . '" class="theme-btn btn-style-one">' . $setting["TextBtn_autorex_tpl"] . '</a></div>' : '' ?>
              </div>
            </div>
          </div>
        </div>
        <!--End Header Upper-->
      </div><!-- End Sticky Menu -->

      <!-- Mobile Menu  -->
      <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-remove"></span></div>

        <nav class="menu-box">
          <div class="nav-logo">
            <a href="<?= BASE_URL ?>">
              <img src="<?= $setting["LogoLight_autorex_tpl"] ?>" width="180" height="43" alt="<?= $tlautorex["image_desc"]["imdesc1"] . $setting["title"] ?>" title="">
            </a>
          </div>
          <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
          <!--Social Links-->
          <div class="social-links">
            <ul class="clearfix">
              <li><a href="#"><span class="fab fa-twitter"></span></a></li>
              <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
              <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
              <li><a href="#"><span class="fab fa-instagram"></span></a></li>
              <li><a href="#"><span class="fab fa-youtube"></span></a></li>
            </ul>
          </div>
        </nav>
      </div><!-- End Mobile Menu -->

      <div class="nav-overlay">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
      </div>
    </header>
    <!-- END HEADER SECTION -->

    <!-- Search box -->
    <?php if (ENVO_SEARCH && ENVO_USER_SEARCH) { ?>
      <!-- START SEARCH POPUP -->
      <div id="search-popup" class="search-popup">
        <div class="close-search theme-btn"><span class="flaticon-remove"></span></div>
        <div class="popup-inner">
          <div class="overlay-layer"></div>
          <div class="search-form">
            <form action="<?= $P_SEAERCH_LINK ?>" id="search-inner" method="POST">
              <div class="form-group">
                <fieldset>
                  <input class="form-control" type="search" name="envoSH" id="search-box" placeholder="<?php echo $tl["placeholder"]["plc"];
                  if ($setting["fulltextsearch"]) echo $tl["placeholder"]["plc1"]; ?>">
                  <input type="submit" value="<?= $tlautorex["searchbox_text"]["searcht"] ?>" class="theme-btn">
                </fieldset>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- END SEARCH POPUP -->
    <?php } ?>

  <?php } ?>

  <!-- START MAIN CONTENT -->
  <div class="maincontent">

    <!-- START PAGE TITLE SECTION -->
    <?php if ($ENVO_SHOW_NAVBAR) {

      // Random image
      // Show random image: echo $randomImage;
      $photoAreas = array(
        "/_files/image/bg-1.jpg",
        "/_files/image/bg-2.jpg",
        "/_files/image/bg-3.jpg",
        "/_files/image/bg-4.jpg"
      );

      $randomNumber = array_rand($photoAreas);
      $randomImage  = $photoAreas[$randomNumber];


      /* GRID SYSTEM FOR DIFFERENT PAGE - hide page title */
      if (!$page || empty($page) || ($page == 'offline') || (!$setting["searchform"] || !ENVO_USER_SEARCH)) {
        // Code for homepage and other blank page

      }

      if (($page && $PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID] && ($page != 'login')) || ($page && ENVO_ACCESS && ($page != 'login'))) {
        // Code for all page without home page

        ?>

        <!-- Page Title -->
        <section class="page-title" style="background-image:url(<?= $randomImage ?>)">
          <div class="auto-container">
            <h2><?= envo_cut_text($PAGE_TITLE, 35, "...") ?></h2>
            <ul class="page-breadcrumb">

              <?php
              echo '<li>';
              echo '<a href=' . BASE_URL . '>';
              foreach ($envocategories as $ca) if ($ca['catorder'] == 1 && $ca['showmenu'] == 1 && $ca['showfooter'] == 0) {
                echo $ca["name"];
              }
              echo '</a>';
              echo '</li>';
              if ($ENVO_TPL_PLUG_T && !empty($page1) && !is_numeric($page1)) {
                echo '<li>' . $ENVO_TPL_PLUG_T . '</li>';
              }
              echo '<li class="active">';
              echo envo_cut_text($PAGE_TITLE, 35, "...");
              echo '</li>';
              ?>

            </ul>
          </div>
          <h1 data-parallax='{"x": 200}'><?= envo_cut_text($PAGE_TITLE, 35, "...") ?></h1>
        </section>

        <?php
      }

      if ($page == 'login') {
        // Code for only login page
        ?>

        <!-- Page Title -->
        <section class="page-title" style="background-image:url(<?= $randomImage ?>)">
          <div class="auto-container">
            <h2><?= envo_cut_text($PAGE_TITLE, 35, "...") ?></h2>
            <ul class="page-breadcrumb">

              <?php
              echo '<li>';
              echo '<a href=' . BASE_URL . '>';
              foreach ($envocategories as $ca) if ($ca['catorder'] == 1 && $ca['showmenu'] == 1 && $ca['showfooter'] == 0) {
                echo $ca["name"];
              }
              echo '</a>';
              echo '</li>';
              if ($ENVO_TPL_PLUG_T && !empty($page1) && !is_numeric($page1)) {
                echo '<li>' . $ENVO_TPL_PLUG_T . '</li>';
              }
              echo '<li class="active">';
              echo envo_cut_text($PAGE_TITLE, 35, "...");
              echo '</li>';
              ?>

            </ul>
          </div>
          <h1 data-parallax='{"x": 200}'><?= envo_cut_text($PAGE_TITLE, 35, "...") ?></h1>
        </section>

        <?php
      }
    } ?>
    <!-- END PAGE TITLE SECTION -->

    <?php
    if (isset($ENVO_HOOK_BELOW_HEADER) && is_array($ENVO_HOOK_BELOW_HEADER)) foreach ($ENVO_HOOK_BELOW_HEADER as $bheader) {
      // Import templates below header
      include_once APP_PATH . $bheader['phpcode'];
    }
    ?>


    <?php

    if (!$page) {
      // Jedná se o titulní stránku - $page neobsahuje žádnou hodnotu

      // Titulní stránka má Grid systém nebo heslo
      if ($ENVO_HOOK_SIDE_GRID || $PAGE_PASSWORD) {

      } else {

      }

      $section = 'DEFAULT';

    } else {
      // Jedná se o speciální stránku - $page obsahuje hodnotu 'offline' nebo '404'
      // Nejedná se o titulní stránku - $page obsahuje hodnotu

      // Stránka - $page obsahuje hodnotu 'offline' => Web je v offline režimu
      if ($page == 'offline') {
        // SÍŤ JE OFFLINE
        // Pokud není přihlášen administrátor '$page má hodnotu offline', pokud je administrátor přihlášen '$page nemá hodnotu offline' ale má hodnotu názvu stránky dle parsování URL adresy

        $section = 'DEFAULT';

      }

      // Stránka - $page obsahuje hodnotu '404' => Chybová stránka
      if ($page == '404') {

        $section = 'DEFAULT';

      }

      // Stránka - $page neobsahuje hodnotu 'offline' nebo '404' - jedná se o různé stránky
      if ($page != 'offline' && $page != '404') {

        if ($PAGE_PASSWORD && ($PAGE_PASSWORD != $_SESSION['pagesecurehash' . $PAGE_ID])) {
          // STRÁNKA MÁ HESLO A HESLO NEBYLO SPRÁVNĚ ZADANÉ VE STRÁNCE

          // Přihlášení administrátora
          if (ENVO_ACCESS) {
            // ADMINISTRÁTOR JE PŘIHLÁŠEN

            if ($ENVO_SHOW_GRID) {
              // Stránka má povoleno zobrazení Grid systému

              if ($ENVO_HOOK_SIDE_GRID) {
                // Stránka má Grid systém

                $section = 'B';

              } else {
                // Stránka nema Grid systém

                $section = 'A';

              }

            } else {
              // Stránka nemá povoleno zobrazení Grid systému

              $section = 'DEFAULT';

            }

          } else {
            // ADMINISTRÁTOR NENÍ PŘIHLÁŠEN

            if ($ENVO_SHOW_GRID) {
              // Stránka má povoleno zobrazení Grid systému

              if ($ENVO_HOOK_SIDE_GRID) {
                // Stránka má Grid systém

                $section = 'B';

              } else {
                // Stránka nema Grid systém

                $section = 'A';

              }

            } else {
              // Stránka nemá povoleno zobrazení Grid systému

              $section = 'DEFAULT';

            }

          }

        } elseif ($PAGE_PASSWORD && ($PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID])) {
          // STRÁNKA MÁ HESLO A HESLO BYLO SPRÁVNĚ ZADANÉ VE STRÁNCE

          // Přihlášení administrátora
          if (ENVO_ACCESS) {
            // ADMINISTRÁTOR JE PŘIHLÁŠEN

            if ($ENVO_SHOW_GRID) {
              // Stránka má povoleno zobrazení Grid systému

              if ($ENVO_HOOK_SIDE_GRID) {
                // Stránka má Grid systém

                $section = 'B';

              } else {
                // Stránka nema Grid systém

                $section = 'A';

              }

            } else {
              // Stránka nemá povoleno zobrazení Grid systému

              $section = 'DEFAULT';

            }

          } else {
            // ADMINISTRÁTOR NENÍ PŘIHLÁŠEN

            if ($ENVO_SHOW_GRID) {
              // Stránka má povoleno zobrazení Grid systému

              if ($ENVO_HOOK_SIDE_GRID) {
                // Stránka má Grid systém

                $section = 'B';

              } else {
                // Stránka nema Grid systém

                $section = 'A';

              }

            } else {
              // Stránka nemá povoleno zobrazení Grid systému

              $section = 'DEFAULT';

            }

          }

        } else {
          // STRÁNKA NEMÁ HESLO

          // Přihlášení administrátora
          if (ENVO_ACCESS) {
            // ADMINISTRÁTOR JE PŘIHLÁŠEN

            if ($ENVO_SHOW_GRID) {
              // Stránka má povoleno zobrazení Grid systému

              if ($ENVO_HOOK_SIDE_GRID) {
                // Stránka má Grid systém

                $section = 'B';

              } else {
                // Stránka nema Grid systém

                $section = 'A';

              }

            } else {
              // Stránka nemá povoleno zobrazení Grid systému

              $section = 'DEFAULT';

            }

          } else {
            // ADMINISTRÁTOR NENÍ PŘIHLÁŠEN

            if ($ENVO_SHOW_GRID) {
              // Stránka má povoleno zobrazení Grid systému

              if ($ENVO_HOOK_SIDE_GRID) {
                // Stránka má Grid systém

                $section = 'B';

              } else {
                // Stránka nema Grid systém

                $section = 'A';

              }

            } else {
              // Stránka nemá povoleno zobrazení Grid systému

              $section = 'DEFAULT';

            }

          }

        }

      }

    }

    switch ($section) {
      case 'DEFAULT':

        break;
      case 'A':

        echo '<section class="pt-5 mb-5">';
        echo '<div class="auto-container">';
        echo '<div class="row">';
        echo '<div class="col">';

        break;
      case 'B':

        echo '<section>';
        echo '<div class="sidebar-page-container">';
        echo '<div class="auto-container">';
        echo '<div class="row">';

        // Sidebar if left
        if (!empty($ENVO_HOOK_SIDE_GRID) && $setting["sidebar_location_tpl"] == "left") {
          echo '<div class="col-sm-3 sidebar-side' . ($ENVO_HOOK_SIDE_GRID && $setting["sidebar_location_tpl"] == "left" ? 'sidebar-left' : 'sidebar-right') . '">';
          include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/sidebar.php';
          echo '</div>';
        }

        echo '<div class="' . ($ENVO_HOOK_SIDE_GRID ? 'col-sm-9' : 'col-sm-12') . '">';

        break;
      default:

    }

    ?>

