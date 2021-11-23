<?php

// EN: Include the config file of template ...
// CZ: Vložení konfiguračního souboru šablony ...
if (!file_exists(APP_PATH . 'template/' . ENVO_TEMPLATE . '/config.php')) die('[' . __DIR__ . '/index.php] config.php not found');
require_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/config.php';

?>

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

  <meta charset="UTF-8">
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
  <meta property="og:url" content="<?= (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>"/>
  <meta property="og:image" content="<?= ($FB_IMAGE ? $FB_IMAGE : ($SHOWIMG ? BASE_URL . ltrim($SHOWIMG, '/') : '')) ?>"/>
  <meta property="og:image:width" content="<?= $FB_IMAGE_W ?>"/>
  <meta property="og:image:height" content="<?= $FB_IMAGE_H ?>"/>
  <meta property="og:description" content="<?= trim($PAGE_DESCRIPTION) ?>"/>

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@publisher_handle">
  <meta name="twitter:title" content="Page Title">
  <meta name="twitter:description" content="Page description less than 200 characters">
  <meta name="twitter:creator" content="@author_handle">
  <!-- Twitter Summary card images must be at least 120x120px -->
  <meta name="twitter:image" content="https://www.example.com/image.jpg">

  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="">
  <meta itemprop="description" content="">
  <meta itemprop="image" content="">

  <?php if ($page == '404') { ?>
    <meta name="robots" content="noindex, follow">
  <?php } else { ?>
    <meta name="robots" content="<?= $jk_robots ?>">
  <?php }
  if ($page == "success" or $page == "logout") { ?>
    <meta http-equiv="refresh" content="1;URL=<?= $_SERVER['HTTP_REFERER'] ?>">
  <?php } ?>
  <link rel="canonical" href="<?= (ENVO_USE_APACHE ? substr(BASE_URL, 0, -1) : BASE_URL) . ENVO_rewrite::envoParseurl($page, $page1, $page2, $page3, $page4, $page5, $page6) ?>">

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Google Webmaster Tools
  ================================================== -->


  <!-- CSS and FONTS
  ================================================== -->
  <!-- Plugins -->
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/aos.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/imp.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/custom-animate.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/flaticon.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/owl.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/magnific-popup.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/scrollbar.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/hiddenbar.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/icomoon.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/color.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/rtl.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/style.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/assets/css/responsive.css">

  <?php if ($SHOWSOCIALBUTTON) { ?>
    <!-- Sollist -->
    <link href="/assets/plugins/jquery-sollist/jquery.sollist.min.css" rel="stylesheet" type="text/css" media="screen"/>
  <?php } ?>

  <!-- CUSTOM CSS
  ================================================== -->
  <?php if (!$ENVO_SHOW_NAVBAR) { ?>
    <style type="text/css">

    </style>
  <?php } ?>

  <!-- Favicons
  ================================================== -->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png">

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

<div class="boxed_wrapper ltr"><!-- START PAGE WRAPPER -->

  <!-- Preloader -->
  <div class="loader-wrap">
    <div class="preloader"><div class="preloader-close">Preloader Close</div></div>
    <div class="layer layer-one"><span class="overlay"></span></div>
    <div class="layer layer-two"><span class="overlay"></span></div>
    <div class="layer layer-three"><span class="overlay"></span></div>
  </div>

  <?php if ($ENVO_SHOW_NAVBAR) { ?>

    <!-- =========================
      START HEADER SECTION
    ============================== -->
    <header class="main-header header-style-three">

      <!--Start Header Top-->
      <div class="header-top-style3">
        <div class="container">
          <div class="outer-box clearfix">

            <div class="header-top-style3_left pull-left">
              <div class="header-contact-info-two">
                <ul>
                  <li><span class="flaticon-wall-clock"></span>Mon - Sat 8:00 - 17:30, Sunday - CLOSED</li>
                  <li><span class="flaticon-envelope-2"></span><a href="mailto:logistic@email.com">Email: bioxin0011@gmail.com</a></li>
                </ul>
              </div>
            </div>

            <div class="header-top-style3_right pull-right">
              <div class="header-social-link-1">
                <div class="social-link">
                  <ul class="clearfix">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!--End Header Top-->

      <!--Start Header-->
      <div class="header">
        <div class="container">
          <div class="outer-box clearfix">
            <div class="header-left clearfix pull-left">
              <div class="logo">
                <a href="index.html"><img src="assets/images/resources/logo.png" alt="Awesome Logo" title=""></a>
              </div>
            </div>
            <div class="header-right pull-right">
              <div class="header-contact-info2 clearfix">
                <ul class="clearfix">
                  <li>
                    <div class="icon">
                      <span class="flaticon-phone-call-1 clr1"></span>
                    </div>
                    <div class="text">
                      <p>24/7 Phone Services</p>
                      <h4><a href="tel:123456789">555 666 999 00</a></h4>
                    </div>
                  </li>
                  <li>
                    <div class="icon">
                      <span class="flaticon-placeholder-1 clr1"></span>
                    </div>
                    <div class="text">
                      <p>Visit Our Place</p>
                      <h4>NY 11209, United States</h4>
                    </div>
                  </li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>
      <!--End header-->

      <!--Start Header-->
      <div class="header-bottom">
        <div class="container">
          <div class="outer-box clearfix">

            <div class="header-bottom_left pull-left">
              <div class="nav-outer style1 clearfix">
                <!--Mobile Navigation Toggler-->
                <div class="mobile-nav-toggler">
                  <div class="inner">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </div>
                </div>
                <!-- Main Menu -->
                <nav class="main-menu style1 navbar-expand-md navbar-light">
                  <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                    <ul class="navigation clearfix">
                      <li class="dropdown current"><a href="#">Home</a>
                        <ul>
                          <li><a href="index.html">Home Page 01</a></li>
                          <li><a href="index-2.html">Home Page 02</a></li>
                          <li><a href="index-3.html">Home Page 03</a></li>
                          <li><a href="index-4.html">Home Page 04</a></li>
                          <li><a href="index-onepage.html">Home OnePage</a></li>
                          <li class="dropdown"><a href="#">Header Styles</a>
                            <ul>
                              <li><a href="index.html">Header Style One</a></li>
                              <li><a href="index-2.html">Header Style Two</a></li>
                              <li><a href="index-3.html">Header Style Three</a></li>
                              <li><a href="index-4.html">Header Style Four</a></li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li><a href="about.html">About us</a></li>
                      <li class="dropdown"><a href="#">Services</a>
                        <ul>
                          <li><a href="services.html">View All Services</a></li>
                          <li><a href="services-detail.html">Services Details</a></li>
                        </ul>
                      </li>
                      <li class="dropdown"><a href="#">Pages</a>
                        <ul>
                          <li><a href="project.html">Our Project</a></li>
                          <li><a href="project-details.html">Project Details</a></li>
                          <li><a href="team.html">Our Team</a></li>
                          <li><a href="testimonials.html">Testimonials</a></li>
                          <li><a href="faq.html">Faq</a></li>
                          <li><a href="shop.html">Our Products</a></li>
                          <li><a href="shop-single.html">Products Single</a></li>
                          <li><a href="shopping-cart.html">Shopping Cart</a></li>
                          <li><a href="checkout.html">Checkout</a></li>
                          <li><a href="account.html">My Account</a></li>
                          <li><a href="error.html">404 Error page</a></li>
                        </ul>
                      </li>
                      <li class="dropdown"><a href="#">News</a>
                        <ul>
                          <li><a href="blog.html">View All News</a></li>
                          <li><a href="blog-single.html">News Details</a></li>
                        </ul>
                      </li>
                      <li><a href="contact.html">Contact</a></li>
                    </ul>
                  </div>
                </nav>
                <!-- Main Menu End-->
              </div>
            </div>

            <div class="header-bottom_right pull-right">
              <div class="outer-search-box-style1">
                <div class="seach-toggle"><span class="flaticon-magnifiying-glass"></span></div>
                <ul class="search-box">
                  <li>
                    <form method="post" action="http://mehedi.asiandevelopers.com/demo/lebuild/index.html">
                      <div class="form-group">
                        <input type="search" name="search" placeholder="Search Here" required="">
                        <button type="submit"><i class="fa fa-search"></i></button>
                      </div>
                    </form>
                  </li>
                </ul>
              </div>
              <div class="header-bottom_right__btn_style2">
                <a href="#">Get A Quote<span class="flaticon-right-arrow-1 right-arrow"></span></a>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!--End header-->


      <!--Sticky Header-->
      <div class="sticky-header">
        <div class="container">
          <div class="clearfix">
            <!--Logo-->
            <div class="logo float-left">
              <a href="index.html" class="img-responsive"><img src="assets/images/resources/sticky-logo.png" alt="" title=""></a>
            </div>
            <!--Right Col-->
            <div class="right-col float-right">
              <!-- Main Menu -->
              <nav class="main-menu clearfix">
                <!--Keep This Empty / Menu will come through Javascript-->
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!--End Sticky Header-->

      <!-- Mobile Menu  -->
      <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon fa fa-times-circle"></span></div>

        <nav class="menu-box">
          <div class="nav-logo"><a href="index.html"><img src="assets/images/resources/mobilemenu-logo.png" alt="" title=""></a></div>
          <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
          <!--Social Links-->
          <div class="social-links">
            <ul class="clearfix">
              <li><a href="#"><span class="fab fa fa-facebook-square"></span></a></li>
              <li><a href="#"><span class="fab fa fa-twitter-square"></span></a></li>
              <li><a href="#"><span class="fab fa fa-pinterest-square"></span></a></li>
              <li><a href="#"><span class="fab fa fa-google-plus-square"></span></a></li>
              <li><a href="#"><span class="fab fa fa-youtube-square"></span></a></li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- End Mobile Menu -->

    </header>
    <!-- =========================
      END HEADER SECTION
    ============================== -->

  <?php } ?>

  <!-- START MAIN CONTENT -->
  <div class="page-content">

    <!-- =========================
    START PAGE TITLE SECTION
    ============================== -->
    <?php if ($ENVO_SHOW_NAVBAR) {

      /* GRID SYSTEM FOR DIFFERENT PAGE - hide page title */
      if (!$page || empty($page) || (!$setting["searchform"] || !ENVO_USER_SEARCH)) {
        // Code for homepage and other blank page

      }

      if (($page) || ($page && $PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID]) || ($page && ENVO_ACCESS)) {
        // Code for all page without home page
        ?>

        <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(<?= $setting["PageTitleImg_tpl"] ?>);">
          <div class="container">
            <div class="dlab-bnr-inr-entry">
              <h1 class="text-white"><?= envo_cut_text($PAGE_TITLE, 50, "...") ?></h1>
            </div>
          </div>
        </div>
        <div class="breadcrumb-row">
          <div class="container">
            <ul class="list-inline">

              <?php
              echo '<li>';
              echo '<a href=' . BASE_URL . '>';
              foreach ($envocategories as $ca) if ($ca['catorder'] == 1 && $ca['showmenu'] == 1 && $ca['showfooter'] == 0) {
                echo $ca["name"];
              }
              echo '</a>';
              echo '</li>';
              if ($ENVO_TPL_PLUG_T && !empty($page1) && !is_numeric($page1)) {
                echo '<li><a href="' . $ENVO_TPL_PLUG_URL . '">' . $ENVO_TPL_PLUG_T . '</a></li>';
              }
              echo '<li class="active">';
              echo envo_cut_text($PAGE_TITLE, 35, "...");
              echo '</li>';
              ?>

            </ul>
          </div>
        </div>

      <?php }
    } ?>
    <!-- =========================
    END PAGE TITLE SECTION
    ============================== -->

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

        // Stránka má heslo, heslo ve stránce bylo správně zadané, stránka nemá heslo
        if ($PAGE_PASSWORD && ($PAGE_PASSWORD != $_SESSION['pagesecurehash' . $PAGE_ID])) {
          // STRÁNKA MÁ HESLO

          // Přihlášení administrátora
          if (ENVO_ACCESS) {
            // ADMINISTRÁTOR JE PŘIHLÁŠEN

            // Stránka má Grid systém
            if ($ENVO_HOOK_SIDE_GRID) {

              $section = 'B';

            } else {

              $section = 'A';

            }

          } else {
            // ADMINISTRÁTOR NENÍ PŘIHLÁŠEN

            // Stránka má Grid systém
            if ($ENVO_HOOK_SIDE_GRID) {

              $section = 'DEFAULT';

            } else {

              $section = 'DEFAULT';

            }

          }

        } elseif ($PAGE_PASSWORD && ($PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID])) {
          // STRÁNKA MÁ HESLO A HESLO BYLO SPRÁVNĚ ZADANÉ VE STRÁNCE

          // Přihlášení administrátora
          if (ENVO_ACCESS) {
            // ADMINISTRÁTOR JE PŘIHLÁŠEN

            // Stránka má Grid systém
            if ($ENVO_HOOK_SIDE_GRID) {

              $section = 'B';

            } else {

              $section = 'A';

            }

          } else {
            // ADMINISTRÁTOR NENÍ PŘIHLÁŠEN

            // Stránka má Grid systém
            if ($ENVO_HOOK_SIDE_GRID) {

              $section = 'B';

            } else {

              $section = 'A';

            }

          }

        } else {
          // STRÁNKA NEMÁ HESLO

          // Přihlášení administrátora
          if (ENVO_ACCESS) {
            // ADMINISTRÁTOR JE PŘIHLÁŠEN

            // Stránka má Grid systém
            if ($ENVO_HOOK_SIDE_GRID) {

              $section = 'B';

            } else {

              $section = 'A';

            }

          } else {
            // ADMINISTRÁTOR NENÍ PŘIHLÁŠEN

            // Stránka má Grid systém
            if ($ENVO_HOOK_SIDE_GRID) {

              $section = 'B';

            } else {

              $section = 'A';

            }

          }

        }

      }

    }

    switch ($section) {
      case 'A':

        break;
      case 'B':

        echo '<div class="content-area">';
        echo '<div class="container">';
        echo '<div class="row">';

        // Sidebar if left
        if (!empty($ENVO_HOOK_SIDE_GRID) && $setting["sidebar_location_tpl"] == "left") {
          include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/sidebar.php';
        }

        echo '<div class="' . ($ENVO_HOOK_SIDE_GRID ? 'col-md-9' : 'col-md-12') . '">';

        break;
      default:

    }

    ?>
