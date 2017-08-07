<?php

// EN: Include the config file of template ...
// CZ: Vložení konfiguračního souboru šablony ...
if (!file_exists(APP_PATH . 'template/' . ENVO_TEMPLATE . '/config.php')) die('[index.php] config.php not found');
require_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/config.php';

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="<?php echo $site_language; ?>"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="<?php echo $site_language; ?>"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="<?php echo $site_language; ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="<?php echo $site_language; ?>">
<!--<![endif]-->
<head>

  <meta charset="utf-8">
  <!-- Document Title
  ============================================= -->
  <title><?php echo $jkv["title"];
    if ($jkv["title"]) { ?> &raquo; <?php }
    echo $PAGE_TITLE; ?></title>

  <meta name="keywords" content="<?php echo trim($PAGE_KEYWORDS); ?>">
  <meta name="description" content="<?php echo trim($PAGE_DESCRIPTION); ?>">
  <meta name="author" content="<?php echo $jkv["metaauthor"]; ?>">

  <!-- Share Social Network
  ============================================= -->
  <!-- Facebook - Open Graph data -->
  <meta property="og:title" content="<?php echo $PAGE_TITLE; ?>"/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"/>
  <meta property="og:image" content="<?php echo($FB_IMAGE ? $FB_IMAGE : ($SHOWIMG ? BASE_URL . ltrim($SHOWIMG, '/') : '')); ?>"/>
  <meta property="og:image:width" content="<?php echo $FB_IMAGE_W; ?>"/>
  <meta property="og:image:height" content="<?php echo $FB_IMAGE_H; ?>"/>
  <meta property="og:description" content="<?php echo trim($PAGE_DESCRIPTION); ?>"/>

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
    <meta name="robots" content="<?php echo $jk_robots; ?>">
  <?php }
  if ($page == "success" or $page == "logout") { ?>
    <meta http-equiv="refresh" content="1;URL=<?php echo $_SERVER['HTTP_REFERER']; ?>">
  <?php } ?>
  <link rel="canonical" href="<?php echo (JAK_USE_APACHE ? substr(BASE_URL, 0, -1) : BASE_URL) . JAK_rewrite::jakParseurl($page, $page1, $page2, $page3, $page4, $page5, $page6); ?>">

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Google Webmaste Tools
  ================================================== -->
  <meta name="google-site-verification" content="s4oCyzc_RZ6-oBFDsGRdkZRZx7As2jQTSy75qo07X3c"/>

  <!-- CSS and FONTS
  ================================================== -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
  <!-- Fontawesome icon -->
  <link rel="stylesheet" href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.min.css?=v4.7.0">
  <link rel="stylesheet" href="/assets/plugins/bootstrap-table-master/dist/bootstrap-table.min.css">
  <!-- Simple icon -->
  <link rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/plugins/simple-line-icons/css/simple-line-icons.min.css?=v2.4.0">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/plugins/bootstrap/css/bootstrap.min.css?=v3.3.7">
  <!-- Animate -->
  <link rel="stylesheet" href="/assets/plugins/animate/animate.min.css?=v3.5.1">
  <!-- OWL Carousel -->
  <link rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/plugins/owl.carousel/assets/owl.carousel.min.css?=v2.1.6">
  <link rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/plugins/owl.carousel/assets/owl.theme.default.min.css?=v2.1.6">
  <!-- Magnific-popup -->
  <link rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/plugins/magnific-popup/magnific-popup.min.css?=v1.1.0">
  <!-- RS5.0 Main Stylesheetm, Layers and Navigation Styles -->
  <link rel="stylesheet" type="text/css" href="/assets/plugins/revolution-slider/css/settings.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/plugins/revolution-slider/css/layers.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/plugins/revolution-slider/css/navigation.min.css">
  <!-- Theme CSS -->
  <link rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/css/theme-complete.min.css">
  <!-- Skin CSS -->
  <link rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/css/skins/skin-bluesat.min.css">
  <!-- Print CSS -->
  <link rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/css/bootstrap-print.css" media="print"/>
  <link rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/css/bootstrap-print-md.css" media="print"/>

  <?php if ($SHOWSOCIALBUTTON) { ?>
    <!-- Sollist -->
    <link href="/assets/plugins/jquery-sollist/jquery.sollist.min.css" rel="stylesheet" type="text/css" media="screen"/>
  <?php } ?>

  <link rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/css/screen.min.css" type="text/css"/>

  <!-- CUSTOM CSS
  ================================================== -->
  <?php if (!$JAK_SHOW_NAVBAR) { ?>
    <style type="text/css">
      /* Fix 'body padding' if navbar is hidden */
      body {
        padding-top: 0;
      }
    </style>
  <?php } ?>

  <!-- Favicons
  ================================================== -->
  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png">

  <!-- Import templates for in between head
  ============================================= -->
  <?php if (isset($JAK_HOOK_HEAD_TOP) && is_array($JAK_HOOK_HEAD_TOP)) foreach ($JAK_HOOK_HEAD_TOP as $headt) {
    include_once APP_PATH . $headt['phpcode'];
  } ?>

  <!-- Import CSS for Current page in between head
  ============================================= -->
  <?php if (isset($JAK_HEADER_CSS)) echo $JAK_HEADER_CSS; ?>

  <!-- Head Libs -->
  <script src="/template/<?php echo ENVO_TEMPLATE; ?>/plugins/modernizr/modernizr.min.js"></script>

</head>
<body class="loading-overlay-showing" data-loading-overlay>
<div class="loading-overlay">
  <div class="bounce-loader">
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
  </div>
</div>

<div class="body"><!-- START BODY -->
  <?php if ($JAK_SHOW_NAVBAR) { ?>

    <!-- =========================
      START HEADER SECTION
    ============================== -->
    <header id="header" class="header-narrow" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 57, 'stickySetTop': '-57px', 'stickyChangeLogo': false}">
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
                if (is_numeric(JAK_PLUGIN_ID_REGISTER_FORM) && JAK_PLUGIN_ID_REGISTER_FORM > 0) {
                  echo '<li><a href="/' . $PLUGIN_RF_CAT["varname"] . '">' . $PLUGIN_RF_CAT["name"] . '</a></li>';
                }
                ?>


                <?php if ($jkv["sitemapShow_porto_tpl"] == 1) { ?>
                  <li>
                    <a href="/<?php echo $jkv["sitemapLinks_porto_tpl"]; ?>"><?php echo $tlporto["header_text"]["ht"]; ?></a>
                  </li>
                <?php }
                if ($jkv["loginShow_porto_tpl"] == 1) {
                  if (!JAK_USERID) { ?>
                    <li>
                      <a href="/login" id="login">
                        <?php
                        // If Register Form is Active (installed) or Not Active (not installed)
                        if ($jkv["rf_active"]) {
                          echo $tlporto["header_text"]["ht1"] . ' / ' . $tlporto["header_text"]["ht4"];
                        } else {
                          echo $tlporto["header_text"]["ht1"];
                        }
                        ?>
                      </a>
                    </li>
                  <?php } else { ?>
                    <li>
                      <a href="<?php echo $P_USR_LOGOUT; ?>" id="logout">
                        <?php
                        echo sprintf($tlporto["header_text"]["ht2"], $jakuser->getVar("username"));
                        ?>
                      </a>
                    </li>
                    <?php if (JAK_ASACCESS) { ?>
                      <li><a href="<?php echo BASE_URL; ?>admin/"><?php echo $tlporto["header_text"]["ht3"]; ?></a></li>
                    <?php }
                  }
                } ?>

              </ul>
            </div>
            <ul class="header-social-icons social-icons social-icons-transparent social-icons-icon-light pull-right ml-xs mt-xs hidden-xs">

              <?php if ($jkv["facebookheaderShow_porto_tpl"] == 1) { ?>
                <li class="social-icons-facebook">
                  <a href="<?php echo $jkv["facebookheaderLinks_porto_tpl"]; ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
                </li>
              <?php }
              if ($jkv["twitterheaderShow_porto_tpl"] == 1) { ?>
                <li class="social-icons-twitter">
                  <a href="<?php echo $jkv["twitterheaderLinks_porto_tpl"]; ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
                </li>
              <?php }
              if ($jkv["googleheaderShow_porto_tpl"] == 1) { ?>
                <li class="social-icons-googleplus">
                  <a href="<?php echo $jkv["googleheaderLinks_porto_tpl"]; ?>" target="_blank" title="Google Plus"><i class="fa fa-google"></i></a>
                </li>
              <?php }
              if ($jkv["instagramheaderShow_porto_tpl"] == 1) { ?>
                <li class="social-icons-instagram">
                  <a href="<?php echo $jkv["instagramheaderLinks_porto_tpl"]; ?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a>
                </li>
              <?php }
              if ($jkv["emailheaderShow_porto_tpl"] == 1) { ?>
                <li class="social-icons-email">
                  <a href="mailto:<?php echo envo_encode_email($jkv["emailheaderLinks_porto_tpl"]); ?>" target="_blank" title="Email"><i class="fa fa-envelope"></i></a>
                </li>
              <?php } ?>

            </ul>
            <p class="pull-right text-color-light">
            <span class="mr-xs">

              <?php if ($jkv["phoneheaderShow_porto_tpl"] == 1) { ?>
                <i class="icon-call-end icons mr-xs"></i>
                <a class="phone" href="tel:<?php echo $jkv["phoneheaderLinks_porto_tpl"]; ?>" target="_blank"><?php echo $jkv["phoneheaderLinks_porto_tpl"]; ?></a>
              <?php } ?>

            </span>
            </p>
          </div>
        </div>
        <div class="header-container container">
          <div class="header-row">
            <div class="header-column">
              <div class="header-logo">
                <a href="<?php echo BASE_URL; ?>">
                  <img alt="<?php echo $tlporto["image_desc"]["imdesc"] . $jkv["title"]; ?>" height="48" src="<?php echo $jkv["logo1_porto_tpl"]; ?>">
                </a>
              </div>
            </div>
            <div class="header-column">
              <div class="header-row">
                <div class="header-nav header-nav-dark-dropdown">
                  <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                    <i class="fa fa-bars"></i>
                  </button>
                  <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                    <nav>

                      <!-- Main navigation -->
                      <?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/navbar.php'; ?>
                      <!-- Hook -->
                      <?php if (isset($JAK_HOOK_HEADER) && is_array($JAK_HOOK_HEADER)) foreach ($JAK_HOOK_HEADER as $hheader) {
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

  <div role="main" class="main"><!-- START MAIN CONTENT -->

    <!-- =========================
    START PAGE TITLE SECTION
    ============================== -->
    <?php if ($JAK_SHOW_NAVBAR) {

      /* GRID SYSTEM FOR DIFFERENT PAGE - hide page title
       * !isset($page =>
       * empty($page) =>
       * $page == 'offline' =>
       * $page == '404' =>
       * !$jkv["searchform"] || !JAK_USER_SEARCH =>
       * * ($PAGE_PASSWORD && !JAK_ASACCESS && $PAGE_PASSWORD != $_SESSION['pagesecurehash' . $PAGE_ID]) => If page have password and password isn't same as in Session without Administrator access
       */
      if (!isset($page) ||
        empty($page) ||
        ($page == 'offline') ||
        /* ($page == '404') || */
        (!$jkv["searchform"] || !JAK_USER_SEARCH)
        /* || ($PAGE_PASSWORD && !JAK_ASACCESS && $PAGE_PASSWORD != $_SESSION['pagesecurehash' . $PAGE_ID]) */
      ) {

        // Code for homepage and other blank page
        ?>

      <?php } elseif (isset($page)) {
        // Code for all page without home page
        ?>

        <section class="page-header page-header-custom-background" style="background-image: url(/template/porto/img/header-bg-2.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h1><?php echo envo_cut_text($PAGE_TITLE, 35, "..."); ?></h1>
                <ul class="breadcrumb breadcrumb-valign-mid">

                  <?php
                  echo '<li>';
                  echo '<a href=' . BASE_URL . '>';
                  foreach ($jakcategories as $ca) if ($ca['catorder'] == 1 && $ca['showmenu'] == 1 && $ca['showfooter'] == 0) {
                    echo $ca["name"];
                  }
                  echo '</a>';
                  echo '</li>';
                  if ($JAK_TPL_PLUG_T && !empty($page1) && !is_numeric($page1)) {
                    echo '<li><a href="' . $JAK_TPL_PLUG_URL . '">' . $JAK_TPL_PLUG_T . '</a></li>';
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
    if (isset($JAK_HOOK_BELOW_HEADER) && is_array($JAK_HOOK_BELOW_HEADER)) foreach ($JAK_HOOK_BELOW_HEADER as $bheader) {
      // Import templates below header
      include_once APP_PATH . $bheader['phpcode'];
    }
    ?>


    <?php

    if (!$page) {
      // Jedná se o titulní stránku - $page neobsahuje žádnou hodnotu

      // Titulní stránka má Grid systém nebo heslo
      if ($JAK_HOOK_SIDE_GRID || $PAGE_PASSWORD) {
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
          if (JAK_ASACCESS) {
            // ADMINISTRÁTOR JE PŘIHLÁŠEN

            // Stránka má Grid systém
            if ($JAK_HOOK_SIDE_GRID) {

              $section = 'B';

            } else {

              $section = 'A';

            }

          } else {
            // ADMINISTRÁTOR NENÍ PŘIHLÁŠEN

            // Stránka má Grid systém
            if ($JAK_HOOK_SIDE_GRID) {

              $section = 'DEFAULT';

            } else {

              $section = 'DEFAULT';

            }

          }

        } elseif ($PAGE_PASSWORD && ($PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID])) {
          // STRÁNKA MÁ HESLO A HESLO BYLO SPRÁVNĚ ZADANÉ VE STRÁNCE

          // Přihlášení administrátora
          if (JAK_ASACCESS) {
            // ADMINISTRÁTOR JE PŘIHLÁŠEN

            // Stránka má Grid systém
            if ($JAK_HOOK_SIDE_GRID) {

              $section = 'B';

            } else {

              $section = 'A';

            }

          } else {
            // ADMINISTRÁTOR NENÍ PŘIHLÁŠEN

            // Stránka má Grid systém
            if ($JAK_HOOK_SIDE_GRID) {

              $section = 'B';

            } else {

              $section = 'A';

            }

          }

        } else {
          // STRÁNKA NEMÁ HESLO

          // Přihlášení administrátora
          if (JAK_ASACCESS) {
            // ADMINISTRÁTOR JE PŘIHLÁŠEN

            // Stránka má Grid systém
            if ($JAK_HOOK_SIDE_GRID) {

              $section = 'B';

            } else {

              $section = 'A';

            }

          } else {
            // ADMINISTRÁTOR NENÍ PŘIHLÁŠEN

            // Stránka má Grid systém
            if ($JAK_HOOK_SIDE_GRID) {

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

        break;
      case 'B':

        echo '<section class="pt-small mb-small">';
        echo '<div class="container">';
        echo '<div class="row">';

        // Sidebar if left
        if (!empty($JAK_HOOK_SIDE_GRID) && $jkv["sidebar_location_tpl"] == "left") {
          include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/sidebar.php';
        }

        echo '<div class="' . ($JAK_HOOK_SIDE_GRID ? 'col-md-9' : 'col-md-12') . '">';

        break;
      default:

    }

    ?>

