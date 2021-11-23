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
<html lang="<?= $site_language ?>">
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

  <!-- Google Webmaste Tools
  ================================================== -->
  <meta name="google-site-verification" content="s4oCyzc_RZ6-oBFDsGRdkZRZx7As2jQTSy75qo07X3c"/>

  <!-- CSS and FONTS
  ================================================== -->
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Open+Sans:300,400,600,700,800|Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.min.css?=v4.7.0" media="none" onload="if(media!='all')media='all'">
  <!-- Plugins -->
  <link rel="stylesheet" href="/assets/plugins/bootstrap/bootstrapv3/css/bootstrap.min.css?=v3.3.7">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/css/plugins.css">
  <!-- Basic Style -->
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/css/style.css">
  <!-- Template -->
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/css/template.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/css/skin/skin-1.min.css">
  <!-- Revolution Slider Css -->
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/plugins/revolution/v5.4.3/css/settings.css">
  <link rel="stylesheet" href="/template/<?= ENVO_TEMPLATE ?>/plugins/revolution/v5.4.3/css/navigation.css">

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
<body id="bg">

<div class="page-wraper"><!-- START PAGE WRAPPER -->

  <div id="loading-area"><div id="loading-area-item"></div></div><!-- PRELOADER -->

  <?php if ($ENVO_SHOW_NAVBAR) { ?>

    <!-- =========================
      START HEADER SECTION
    ============================== -->
    <header class="site-header <?= $skincarzone_header ?>">

      <?php if ($setting["HeShowTopbar_carzone_tpl"] == 1) { ?>
        <div class="<?= $setting["skinCarzoneTopbar_tpl"] ?>">
          <div class="container">
            <div class="row">

              <?php if ($setting["HeShowLinks1_carzone_tpl"] == 1 || $setting["HeShowLinks2_carzone_tpl"] == 1 || $setting["HeShowLogin_carzone_tpl"] == 1) { ?>

                <div class="dlab-topbar-left">
                  <ul class="list-topbar-left">

                    <?php
                    if ($setting["HeShowLinks1_carzone_tpl"] == 1) echo '<li><a href="' . $setting["HeLinks1_carzone_tpl"] . '">' . $setting["HeText1_carzone_tpl"] . '</a></li>';
                    if ($setting["HeShowLinks2_carzone_tpl"] == 1) echo '<li><a href="' . $setting["HeLinks2_carzone_tpl"] . '">' . $setting["HeText2_carzone_tpl"] . '</a></li>';
                    if ($setting["HeShowLogin_carzone_tpl"] == 1) {
                      if (!ENVO_USERID) {
                        echo '<li><a href="/login" id="login">';
                        // If Register Form is Active (installed) or Not Active (not installed)
                        if ($setting["rf_active"]) {
                          echo $tlcarzone["header_text"]["ht"] . ' / ' . $tlcarzone["header_text"]["ht3"];
                        } else {
                          echo $tlcarzone["header_text"]["ht"];
                        }
                        echo '</a></li>';
                      } else {
                        echo '<li><a href="' . $P_USR_LOGOUT . '" id="logout">';
                        echo sprintf($tlcarzone["header_text"]["ht1"], $envouser->getVar("username"));
                        echo '</a></li>';
                        if (ENVO_ACCESS) {
                          echo '<li><a href="' . BASE_URL . 'admin/">' . $tlcarzone["header_text"]["ht2"] . '</a></li>';
                        }
                      }
                    }
                    ?>

                  </ul>
                </div>
              <?php } ?>

              <div class="dlab-topbar-right topbar-social">
                <ul>

                  <?php if ($setting["HeShowEmail_carzone_tpl"] == 1) { ?>
                    <li>
                      <a href="mailto:<?= $setting["HeEmailLinks_carzone_tpl"] ?>" class="emaillink"><i class="fa fa-envelope-o"></i> <?= $setting["HeEmailText_carzone_tpl"] ?></a>
                    </li>
                  <?php }
                  if ($setting["facebookHeShow_carzone_tpl"] == 1) { ?>
                    <li>
                      <a href="<?= $setting["facebookHeLinks_carzone_tpl"] ?>" class="site-button-link facebook hover" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                  <?php }
                  if ($setting["youtubeHeShow_carzone_tpl"] == 1) { ?>
                    <li>
                      <a href="<?= $setting["youtubeHeLinks_carzone_tpl"] ?>" class="site-button-link youtube hover" target="_blank"><i class="fa fa-youtube-play"></i></a>
                    </li>
                  <?php }
                  if ($setting["twitterHeShow_carzone_tpl"] == 1) { ?>
                    <li>
                      <a href="<?= $setting["twitterHeLinks_carzone_tpl"] ?>" class="site-button-link twitter hover" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                  <?php }
                  if ($setting["googleHeShow_carzone_tpl"] == 1) { ?>
                    <li>
                      <a href="<?= $setting["googleHeLinks_carzone_tpl"] ?>" class="site-button-link google-plus hover" target="_blank"><i class="fa fa-google"></i></a>
                    </li>
                  <?php }
                  if ($setting["linkedinHeShow_carzone_tpl"] == 1) { ?>
                    <li>
                      <a href="<?= $setting["linkedinHeLinks_carzone_tpl"] ?>" class="site-button-link linkedin hover" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </li>
                  <?php } ?>

                </ul>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

      <!-- main header -->
      <div class="<?= $setting["HeActiveSticky_carzone_tpl"] == 1 ? 'sticky-header' : '' ?> main-bar-wraper <?= $skincarzone_mainheader ?>">
        <div class="main-bar clearfix ">
          <div class="container clearfix">
            <!-- website logo -->
            <div class="logo-header mostion">
              <a href="<?= BASE_URL ?>"><img src="<?= $setting["HeLogo1Carzone_tpl"] ?>" class="logo" alt=""></a>
            </div>
            <!-- nav toggle button -->
            <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed" aria-expanded="false">
              <i class="fa fa-bars"></i>
            </button>
            <!-- extra nav -->
            <div class="extra-nav">
              <div class="extra-cell">
                <button id="quik-search-btn" type="button" class="site-button-link"><i class="fa fa-search"></i>
                </button>
              </div>
            </div>
            <!-- Quik search -->
            <div class="dlab-quik-search bg-primary ">
              <!-- Search box -->
              <?php if (ENVO_SEARCH && ENVO_USER_SEARCH) { ?>

                <form action="<?= $P_SEAERCH_LINK ?>" id="search-inner" method="POST">
                  <input name="envoSH" value="" type="text" class="form-control" placeholder="<?php echo $tl["placeholder"]["plc"];
                  if ($setting["fulltextsearch"]) echo $tl["placeholder"]["plc1"]; ?>">
                  <span id="quik-search-remove"><i class="fa fa-close"></i></span>
                </form>

              <?php } ?>

            </div>

            <!-- Main nav -->
            <div class="header-nav navbar-collapse collapse">

              <!-- Main navigation -->
              <?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/navbar.php'; ?>
              <!-- Hook -->
              <?php if (isset($ENVO_HOOK_HEADER) && is_array($ENVO_HOOK_HEADER)) foreach ($ENVO_HOOK_HEADER as $hheader) {
                include_once APP_PATH . $hheader['phpcode'];
              } ?>

            </div>
          </div>
        </div>
      </div>
      <!-- main header END -->
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
