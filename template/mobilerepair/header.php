<?php

// EN: Include the config file of template ...
// CZ: Vložení konfiguračního souboru šablony ...
if (!file_exists(APP_PATH . 'template/' . ENVO_TEMPLATE . '/config.php')) die(ENVO_TEMPLATE . '/[header.php] config.php not found');
require_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/config.php';

?>

<!DOCTYPE html>
<html dir="ltr" lang="<?php echo $site_language; ?>">
<head>

  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

  <!-- Document Title
  ============================================= -->
  <title><?php echo $setting["title"];
    if ($setting["title"]) { ?> &raquo; <?php }
    echo $PAGE_TITLE; ?></title>

  <meta name="keywords" content="<?php echo trim($PAGE_KEYWORDS); ?>">
  <meta name="description" content="<?php echo trim($PAGE_DESCRIPTION); ?>">
  <meta name="author" content="<?php echo $setting["metaauthor"]; ?>">

  <?php if ($page == '404') { ?>
    <meta name="robots" content="noindex, follow">
  <?php } else { ?>
    <meta name="robots" content="<?php echo $jk_robots; ?>">
  <?php }
  if ($page == "success" or $page == "logout") { ?>
    <meta http-equiv="refresh" content="1;URL=<?php echo $_SERVER['HTTP_REFERER']; ?>">
  <?php } ?>
  <link rel="canonical" href="<?php echo (ENVO_USE_APACHE ? substr(BASE_URL, 0, -1) : BASE_URL) . ENVO_rewrite::envoParseurl($page, $page1, $page2, $page3, $page4, $page5, $page6); ?>">

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width,initial-scale=1.0"/>

  <!-- CSS styles and FONTS
  ================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="/assets/plugins/bootstrapv3/css/bootstrap.min.css?=v3.3.7">
  <link rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/css/jquery-ui.min.css">
  <!-- CSS | css plugin collection for this theme -->
  <link rel="stylesheet" href="/assets/plugins/animate/animate.min.css">
  <!-- CSS | css plugin collection for this theme -->
  <link rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/css/css-plugin-collections.css">
  <!-- CSS | menuzord megamenu skins -->
  <link href="/template/<?php echo ENVO_TEMPLATE; ?>/css/menuzord-megamenu.css" rel="stylesheet"/>
  <link id="menuzord-menu-skins" href="/template/<?php echo ENVO_TEMPLATE; ?>/css/menuzord-skins/menuzord-boxed.css" rel="stylesheet"/>
  <!-- CSS | Main style file -->
  <link href="/template/<?php echo ENVO_TEMPLATE; ?>/css/style-main.css" rel="stylesheet" type="text/css">
  <!-- CSS | Custom Margin Padding Collection -->
  <link href="/template/<?php echo ENVO_TEMPLATE; ?>/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
  <!-- CSS | Responsive media queries -->
  <link href="/template/<?php echo ENVO_TEMPLATE; ?>/css/responsive.css" rel="stylesheet" type="text/css">
  <!-- CSS | Theme Color -->
  <link href="template/<?php echo ENVO_TEMPLATE; ?>/css/colors/theme-skin-color-set1.css" rel="stylesheet" type="text/css">

  <!-- CSS | Social button - Sollist -->
  <?php if ($SHOWSOCIALBUTTON) { ?>
    <!-- Sollist -->
    <link href="/assets/plugins/jquery-sollist/jquery.sollist.min.css" rel="stylesheet" type="text/css" media="screen"/>
  <?php } ?>

  <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
  <link href="/template/<?php echo ENVO_TEMPLATE; ?>/css/style.css" rel="stylesheet" type="text/css">

  <!-- Import templates for in between head
  ============================================= -->
  <?php if (isset($ENVO_HOOK_HEAD_TOP) && is_array($ENVO_HOOK_HEAD_TOP)) foreach ($ENVO_HOOK_HEAD_TOP as $headt) {
    include_once APP_PATH . $headt['phpcode'];
  } ?>

  <!-- Import CSS for Current page in between head
  ============================================= -->
  <?php if (isset($ENVO_HEADER_CSS)) echo $ENVO_HEADER_CSS; ?>

  <!-- JS Library
  ================================================== -->
  <script src="/assets/plugins/jquery/jquery-2.2.4.min.js"></script>
  <script src="/template/mobilerepair/js/jquery-ui.min.js"></script>
  <!-- JS | bootstrap -->
  <script src="/assets/plugins/bootstrapv3/js/bootstrap.min.js?=v3.3.7"></script>
  <!-- JS | bootstrap notify -->
  <script src="/assets/plugins/bootstap-notify/bootstrap-notify.min.js?=v3.1.5" async defer></script>
  <!-- JS | jquery plugin collection for this theme -->
  <script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/jquery-plugin-collection.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="has-fixed-footer">
<!-- START WRAPPER -->
<div id="wrapper" class="clearfix">

  <?php if ($ENVO_SHOW_NAVBAR) { ?>

    <!-- =========================
        START HEADER SECTION
      ============================== -->
    <header id="header" class="header modern-header modern-header-theme-colored2">
      <div class="header-top bg-theme-colored2 sm-text-center">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="widget text-white">
                <?php echo $setting["mininav_text_mobilerepair_tpl"]; ?>
              </div>
            </div>
            <div class="col-md-7">
              <div class="widget m-0 pull-right sm-pull-none sm-text-center">
                <ul class="list-inline pull-right">
                  <li class="mb-0 pb-0">
                    <div class="top-dropdown-outer pt-0 pl-20 pb-0 pr-20">
                      <a class="top-search-box has-dropdown text-white text-hover-theme-colored"><i class="fa fa-search font-13"></i> &nbsp;</a>
                      <ul class="dropdown">
                        <li>
                          <div class="search-form-wrapper">
                            <form method="get" class="mt-10">
                              <input type="text" onfocus="if(this.value =='Enter your search') { this.value = ''; }" onblur="if(this.value == '') { this.value ='Enter your search'; }" value="Enter your search" id="searchinput" name="s" class="">
                              <label><input type="submit" name="submit" value=""></label>
                            </form>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="widget pull-right flip sm-pull-none">
                <ul class="list-inline text-right flip sm-text-center">
                  <li>
                    <a class="text-white" href="#">FAQ</a>
                  </li>
                  <li class="text-white">|</li>
                  <li>
                    <a class="text-white" href="#">Help Desk</a>
                  </li>
                  <li class="text-white">|</li>
                  <li>
                    <a class="text-white" href="#">Support</a>
                  </li>
                  <?php
                  if (!ENVO_USERID) {?>
                    <li class="text-white">|</li>
                    <li>
                      <a class="text-white" href="/login" id="login">
                        <?php
                        // If Register Form is Active (installed) or Not Active (not installed)
                        if ($setting["rf_active"]) {
                          echo $tlmr["header_text"]["ht1"] . ' / ' . $tlmr["header_text"]["ht4"];
                        } else {
                          echo $tlmr["header_text"]["ht1"];
                        }
                        ?>
                      </a>
                    </li>
                  <?php } else { ?>
                    <li class="text-white">|</li>
                    <li>
                      <a class="text-white" href="<?php echo $P_USR_LOGOUT; ?>" id="logout">
                        <?php
                        echo sprintf($tlmr["header_text"]["ht2"], $envouser->getVar("username"));
                        ?>
                      </a>
                    </li>
                    <?php if (ENVO_ASACCESS) { ?>
                      <li class="text-white">|</li>
                      <li>
                        <a class="text-white" href="<?php echo BASE_URL; ?>admin/">
                          <?php echo $tlmr["header_text"]["ht3"]; ?>
                        </a>
                      </li>
                    <?php } } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-middle p-0 bg-lightest xs-text-center pb-20">
        <div class="container pt-20 pb-20">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3">
              <a class="menuzord-brand pull-left flip sm-pull-center mb-15" href="<?php echo BASE_URL; ?>">
                <img src="<?php echo $setting["logo1_mobilerepair_tpl"]; ?>" alt="<?php echo $tlmr["image_desc"]["imdesc"] . $setting["title"]; ?>">
              </a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5">
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <?php if ($setting["emailheaderShow_mobilerepair_tpl"] == 1) { ?>
                    <div class="widget no-border sm-text-center mt-10 mb-10 m-0">
                      <i class="fa fa-envelope text-theme-colored font-32 mt-5 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
                      <a href="#" class="font-12 text-gray text-uppercase">Mail Us Today</a>
                      <h5 class="font-13 text-black m-0"><?php echo $setting["emailheaderLinks_mobilerepair_tpl"]; ?></h5>
                    </div>
                  <?php } ?>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <?php if ($setting["phoneheaderShow_mobilerepair_tpl"] == 1) { ?>
                    <div class="widget no-border sm-text-center mt-10 mb-10 m-0">
                      <i class="fa fa-phone-square text-theme-colored font-32 mt-5 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
                      <a href="#" class="font-12 text-gray text-uppercase">Call us for more details</a>
                      <h5 class="font-13 text-black m-0"><?php echo $setting["phoneheaderLinks_mobilerepair_tpl"]; ?></h5>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 hidden-sm">
              <div class="widget mt-10 mb-10 m-0 text-right">
                <ul class="styled-icons icon-dark mt-10">

                  <?php if ($setting["facebookheaderShow_mobilerepair_tpl"] == 1) { ?>
                    <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s" data-wow-offset="10">
                      <a href="<?php echo $setting["facebookheaderLinks_mobilerepair_tpl"]; ?>" target="_blank" data-bg-color="#3B5998">
                        <i class="fa fa-facebook"></i>
                      </a>
                    </li>
                  <?php }
                  if ($setting["twitterheaderShow_mobilerepair_tpl"] == 1) { ?>
                    <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s" data-wow-offset="10">
                      <a href="<?php echo $setting["twitterheaderLinks_mobilerepair_tpl"]; ?>" target="_blank" data-bg-color="#00aced">
                        <i class="fa fa-twitter"></i>
                      </a>
                    </li>
                  <?php }
                  if ($setting["googleheaderShow_mobilerepair_tpl"] == 1) { ?>
                    <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".3s" data-wow-offset="10">
                      <a href="<?php echo $setting["googleheaderLinks_mobilerepair_tpl"]; ?>" target="_blank" data-bg-color="#dd4b39">
                        <i class="fa fa-google"></i>
                      </a>
                    </li>
                  <?php }
                  if ($setting["instagramheaderShow_mobilerepair_tpl"] == 1) { ?>
                    <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s" data-wow-offset="10">
                      <a href="<?php echo $setting["instagramheaderLinks_mobilerepair_tpl"]; ?>" target="_blank" data-bg-color="#bc2a8d">
                        <i class="fa fa-instagram"></i>
                      </a>
                    </li>
                  <?php }
                  if ($setting["youtubeheaderShow_mobilerepair_tpl"] == 1) { ?>
                    <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".5s" data-wow-offset="10">
                      <a href="<?php echo $setting["youtubeheaderLinks_mobilerepair_tpl"]; ?>" target="_blank" data-bg-color="#bb0000">
                        <i class="fa fa-youtube"></i>
                      </a>
                    </li>
                  <?php }
                  if ($setting["pinterestheaderShow_mobilerepair_tpl"] == 1) { ?>
                    <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".5s" data-wow-offset="10">
                      <a href="<?php echo $setting["pinterestheaderLinks_mobilerepair_tpl"]; ?>" target="_blank" data-bg-color="#bb0000">
                        <i class="fa fa-pinterest-p"></i>
                      </a>
                    </li>
                  <?php } ?>

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed">
          <div class="container">
            <nav id="menuzord" class="menuzord">

              <!-- Main navigation -->
              <?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/navbar.php'; ?>
              <!-- Hook -->
              <?php if (isset($ENVO_HOOK_HEADER) && is_array($ENVO_HOOK_HEADER)) foreach ($ENVO_HOOK_HEADER as $hheader) {
                include_once APP_PATH . $hheader['phpcode'];
              } ?>

              <ul class="pull-right flip hidden-sm hidden-xs">
                <li>
                  <!-- Modal: Reservation Starts -->
                  <a class="btn btn-colored btn-flat bg-theme-colored text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15" data-toggle="modal" data-target="#BSParentModal" href="/template/mobilerepair/ajax-load/reservation-form.html">Book Now</a>
                  <!-- Modal: Reservation End -->
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- =========================
        END HEADER SECTION
      ============================== -->

  <?php } ?>

  <!-- START MAIN CONTENT -->
  <div class="main-content">

    <!-- =========================
    START PAGE TITLE SECTION
    ============================== -->
    <?php if ($ENVO_SHOW_NAVBAR) {

      /* GRID SYSTEM FOR DIFFERENT PAGE - hide page title */
      if (!$page || empty($page) || ($page == 'offline') || (!$setting["searchform"] || !ENVO_USER_SEARCH)) {
        // Code for homepage and other blank page

      }

      if (($page && $PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID]) || ($page && ENVO_ASACCESS)) {
        // Code for all page without home page
        ?>

        <!-- Section: Inner Header - Page Title -->
        <section class="inner-header divider parallax layer-overlay overlay-white-9" data-bg-img="http://www.consciousevolutionmedia.com/sites/default/files/cem-internet-tv_channels.jpg">
          <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
              <div class="row">
                <div class="col-sm-8 text-left flip xs-text-center">
                  <h2 class="title"><?php echo envo_cut_text($PAGE_TITLE, 35, "..."); ?></h2>
                </div>
                <div class="col-sm-4">
                  <ol class="breadcrumb text-right sm-text-center text-black mt-10">

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
                    echo '<li class="active text-theme-colored">';
                    echo envo_cut_text($PAGE_TITLE, 35, "...");
                    echo '</li>';
                    ?>

                  </ol>
                </div>
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
          if (ENVO_ASACCESS) {
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
          if (ENVO_ASACCESS) {
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
          if (ENVO_ASACCESS) {
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
      case 'DEFAULT':

        break;
      case 'A':

        echo '<section>';
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-md-12">';

        break;
      case 'B':

        echo '<section>';
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
