<?php

// EN: Include the config file of template ...
// CZ: Vložení konfiguračního souboru šablony ...
if (!file_exists(APP_PATH . 'template/' . ENVO_TEMPLATE . '/config.php')) die('[' . __DIR__ . '/index.php] config.php not found');
require_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/config.php';

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="<?=$site_language?>"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="<?=$site_language?>"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="<?=$site_language?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="<?=$site_language?>">
<!--<![endif]-->
<head>

  <meta charset="utf-8">
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

  <meta name="keywords" content="<?=trim($PAGE_KEYWORDS)?>">
  <meta name="description" content="<?=trim($PAGE_DESCRIPTION)?>">
  <meta name="author" content="<?=$setting["metaauthor"]?>">

  <!-- Share Social Network
  ============================================= -->
  <!-- Facebook - Open Graph data -->
  <meta property="og:title" content="<?=$PAGE_TITLE?>"/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="<?=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>"/>
  <meta property="og:image" content="<?=($FB_IMAGE ? $FB_IMAGE : ($SHOWIMG ? BASE_URL . ltrim($SHOWIMG, '/') : ''))?>"/>
  <meta property="og:image:width" content="<?=$FB_IMAGE_W?>"/>
  <meta property="og:image:height" content="<?=$FB_IMAGE_H?>"/>
  <meta property="og:description" content="<?=trim($PAGE_DESCRIPTION)?>"/>

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
    <meta name="robots" content="<?=$jk_robots?>">
  <?php }
  if ($page == "success" or $page == "logout") { ?>
    <meta http-equiv="refresh" content="1;URL=<?=$_SERVER['HTTP_REFERER']?>">
  <?php } ?>
  <link rel="canonical" href="<?=(ENVO_USE_APACHE ? substr(BASE_URL, 0, -1) : BASE_URL) . ENVO_rewrite::envoParseurl($page, $page1, $page2, $page3, $page4, $page5, $page6)?>">

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Google Webmaste Tools
  ================================================== -->
  <meta name="google-site-verification" content="s4oCyzc_RZ6-oBFDsGRdkZRZx7As2jQTSy75qo07X3c"/>

  <!-- CSS and FONTS
  ================================================== -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css" media="none" onload="if(media!='all')media='all'">
  <!-- Fontawesome icon -->
  <link rel="stylesheet" href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.min.css?=v4.7.0" media="none" onload="if(media!='all')media='all'">
  <!-- Bluesat icon -->
  <link rel="stylesheet" href="/template/<?=ENVO_TEMPLATE?>/plugins/bluesat-icons/css/bluesat-icons.min.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="/template/<?=ENVO_TEMPLATE?>/plugins/bootstrap/css/bootstrap.min.css?=v3.3.7">
  <!-- Bootstrap Table -->
  <link rel="stylesheet" href="/assets/plugins/bootstrap-table-master/dist/bootstrap-table.min.css">
  <!-- Animate -->
  <link rel="stylesheet" href="/assets/plugins/animate/3.5.1/animate.min.css">
  <!-- OWL Carousel -->
  <link rel="stylesheet" href="/template/<?=ENVO_TEMPLATE?>/plugins/owl.carousel/assets/owl.carousel.min.css?=v2.1.6">
  <link rel="stylesheet" href="/template/<?=ENVO_TEMPLATE?>/plugins/owl.carousel/assets/owl.theme.default.min.css?=v2.1.6">
  <!-- Magnific-popup -->
  <link rel="stylesheet" href="/template/<?=ENVO_TEMPLATE?>/plugins/magnific-popup/magnific-popup.min.css?=v1.1.0">
  <!-- RS5.0 Main Stylesheetm, Layers and Navigation Styles -->
  <link rel="stylesheet" type="text/css" href="/assets/plugins/revolution-slider/css/settings.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/plugins/revolution-slider/css/layers.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/plugins/revolution-slider/css/navigation.min.css">
  <!-- Theme CSS -->
  <link rel="stylesheet" href="/template/<?=ENVO_TEMPLATE?>/css/theme-complete.min.css">
  <!-- Skin CSS -->
  <link rel="stylesheet" href="/template/<?=ENVO_TEMPLATE . '/css/skins/' . $setting["skin_porto_tpl"] . '.min.css'?>">
  <!-- Print CSS -->
  <link rel="stylesheet" href="/template/<?=ENVO_TEMPLATE?>/css/bootstrap-print.css" media="print"/>
  <link rel="stylesheet" href="/template/<?=ENVO_TEMPLATE?>/css/bootstrap-print-md.css" media="print"/>

  <?php if ($SHOWSOCIALBUTTON) { ?>
    <!-- Sollist -->
    <link href="/assets/plugins/jquery-sollist/jquery.sollist.min.css" rel="stylesheet" type="text/css" media="screen"/>
  <?php } ?>

  <!-- Custom Porto Style -->
  <link rel="stylesheet" href="/template/<?=ENVO_TEMPLATE?>/css/screen.min.css" type="text/css"/>
  <link rel="stylesheet" href="/template/<?=ENVO_TEMPLATE?>/custom/css/customstyle.min.css" type="text/css"/>

  <!-- CUSTOM CSS
  ================================================== -->
  <?php if (!$ENVO_SHOW_NAVBAR) { ?>
    <style type="text/css">
      /* Fix 'body padding' if navbar is hidden */
      body {
        padding-top: 0;
      }
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

  <!-- Head Libs -->
  <script src="/template/<?=ENVO_TEMPLATE?>/plugins/modernizr/modernizr.min.js"></script>

  <?php
  // Analytics code
  if (isset($setting["analytics"])) echo $setting["analytics"];
  ?>

</head>
<body class="loading-overlay-showing" data-loading-overlay>
<div class="loading-overlay">
  <div class="loader-inner">
    <div class="ball-scale-multiple">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
</div>

<div class="body"><!-- START BODY -->
  <?php if ($ENVO_SHOW_NAVBAR) { ?>

    <!-- =========================
      START HEADER SECTION
    ============================== -->
    <header id="header" class="<?=$PORTONAVTYPE?>" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 57, 'stickySetTop': '-57px', 'stickyChangeLogo': false}">
      <div class="header-body">
        <div class="header-top header-top-quaternary header-top-style-3">
          <div class="container">
            <div class="usernav pull-left">
              <label for="drop" class="toggle">Uživatelské MENU</label>
              <input type="checkbox" id="drop"/>
              <ul class="header-links text-color-light">

                <?php
                // Show links for Register Form Plugin
                // Check if plugin exist throught PluginID
                if (defined(ENVO_TEMPLATE) && is_numeric(ENVO_PLUGIN_ID_REGISTER_FORM) && ENVO_PLUGIN_ID_REGISTER_FORM > 0) {
                  echo '<li><a href="/' . $PLUGIN_RF_CAT["varname"] . '">' . $PLUGIN_RF_CAT["name"] . '</a></li>';
                }
                ?>


                <?php if ($setting["sitemapShow_porto_tpl"] == 1) { ?>
                  <li>
                    <a href="/<?=$setting["sitemapLinks_porto_tpl"]?>"><?=$tlporto["header_text"]["ht"]?></a>
                  </li>
                <?php }
                if ($setting["loginShow_porto_tpl"] == 1) {
                  if (!ENVO_USERID) { ?>
                    <li>
                      <a href="/login" id="login">
                        <?php
                        // If Register Form is Active (installed) or Not Active (not installed)
                        if ($setting["rf_active"]) {
                          echo $tlporto["header_text"]["ht1"] . ' / ' . $tlporto["header_text"]["ht4"];
                        } else {
                          echo $tlporto["header_text"]["ht1"];
                        }
                        ?>
                      </a>
                    </li>
                  <?php } else { ?>
                    <li>
                      <a href="<?=$P_USR_LOGOUT?>" id="logout">
                        <?php
                        echo sprintf($tlporto["header_text"]["ht2"], $envouser->getVar("username"));
                        ?>
                      </a>
                    </li>
                    <?php if (ENVO_ACCESS) { ?>
                      <li><a href="<?=BASE_URL?>admin/"><?=$tlporto["header_text"]["ht3"]?></a></li>
                    <?php }
                  }
                } ?>

              </ul>
            </div>
            <div class="pull-right ">
              <p class="text-color-light mr-xs ">

                <?php if ($setting["phoneheaderShow_porto_tpl"] == 1) { ?>
                  <i class="icon-call-end icons mr-xs"></i>
                  <a class="phone" href="tel:<?=$setting["phoneheaderLinks_porto_tpl"]?>" target="_blank"><?=$setting["phoneheaderLinks_porto_tpl"]?></a>
                <?php } ?>

              </p>
              <ul class="header-social-icons social-icons social-icons-transparent social-icons-icon-light ml-xs mt-xs mr-xs hidden-xs">

                <?php if ($setting["facebookheaderShow_porto_tpl"] == 1) { ?>
                  <li class="social-icons-facebook">
                    <a href="<?=$setting["facebookheaderLinks_porto_tpl"]?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
                  </li>
                <?php }
                if ($setting["twitterheaderShow_porto_tpl"] == 1) { ?>
                  <li class="social-icons-twitter">
                    <a href="<?=$setting["twitterheaderLinks_porto_tpl"]?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
                  </li>
                <?php }
                if ($setting["googleheaderShow_porto_tpl"] == 1) { ?>
                  <li class="social-icons-googleplus">
                    <a href="<?=$setting["googleheaderLinks_porto_tpl"]?>" target="_blank" title="Google Plus"><i class="fa fa-google"></i></a>
                  </li>
                <?php }
                if ($setting["instagramheaderShow_porto_tpl"] == 1) { ?>
                  <li class="social-icons-instagram">
                    <a href="<?=$setting["instagramheaderLinks_porto_tpl"]?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a>
                  </li>
                <?php }
                if ($setting["emailheaderShow_porto_tpl"] == 1) { ?>
                  <li class="social-icons-email">
                    <a href="mailto:<?=envo_encode_email($setting["emailheaderLinks_porto_tpl"])?>" target="_blank" title="Email"><i class="fa fa-envelope"></i></a>
                  </li>
                <?php } ?>

              </ul>
              <p class="text-color-light ml-xs searchIco">

                <a href="#"><i class="fa fa-search"></i></a>

              </p>
            </div>
          </div>
        </div>
        <div class="header-container container mt-sm">
          <div class="header-row">
            <div class="header-column">
              <div class="header-logo">
                <a href="<?=BASE_URL?>">
                  <img alt="<?=$tlporto["image_desc"]["imdesc"] . $setting["title"]?>" height="48" src="<?=$setting["logo1_porto_tpl"]?>">
                </a>
              </div>
            </div>
            <div class="header-column">
              <div class="header-row">
                <div class="header-nav <?=$PORTONAVTYPE1?>">
                  <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                    <i class="fa fa-bars"></i>
                  </button>
                  <div class="header-nav-main <?=$PORTONAVTYPE2?> header-nav-main-sub-effect-1 collapse">
                    <nav>

                      <!-- Main navigation -->
                      <?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/navbar.php'; ?>
                      <!-- Hook -->
                      <?php if (isset($ENVO_HOOK_HEADER) && is_array($ENVO_HOOK_HEADER)) foreach ($ENVO_HOOK_HEADER as $hheader) {
                        include_once APP_PATH . $hheader['phpcode'];
                      } ?>

                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- =========================
      END HEADER SECTION
    ============================== -->

  <?php } ?>

  <!-- START MAIN CONTENT -->
  <div role="main" class="main">

    <!-- =========================
    START PAGE TITLE SECTION
    ============================== -->
    <?php if ($ENVO_SHOW_NAVBAR) {

      /* GRID SYSTEM FOR DIFFERENT PAGE - hide page title */
      if (!$page || empty($page) || ($page == 'offline') || (!$setting["searchform"] || !ENVO_USER_SEARCH)) {
        // Code for homepage and other blank page

      }

      if (($page && $PAGE_PASSWORD == $_SESSION[ 'pagesecurehash' . $PAGE_ID ]) || ($page && ENVO_ACCESS)) {
        // Code for all page without home page
        ?>

        <section class="page-header page-header-custom-background" style="background-image: url(/template/porto/img/header-bg-2.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h1 class="text-uppercase"><?=envo_cut_text($PAGE_TITLE, 50, "...")?></h1>
                <ul class="breadcrumb breadcrumb-valign-mid">

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
          </div>
        </section>

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

        echo '<section class="pt-small mb-small">';
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-md-12">';

        break;
      case 'B':

        echo '<section class="pt-small mb-small">';
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

