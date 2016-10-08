<?php

/* Config file */
if (!file_exists('config.php')) die('[index.php] config.php not found');
require_once 'config.php';

?>

<!DOCTYPE html>
<html dir="ltr" lang="<?php echo $site_language; ?>">
<head>

  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <meta name="keywords" content="<?php echo trim($PAGE_KEYWORDS); ?>">
  <meta name="description" content="<?php echo trim($PAGE_DESCRIPTION); ?>">
  <meta name="author" content="<?php echo $jkv["metaauthor"]; ?>">
  <?php if ($page == '404') { ?>
    <meta name="robots" content="noindex, follow">
  <?php } else { ?>
    <meta name="robots" content="<?php echo $jk_robots; ?>">
  <?php }
  if ($page == "success" or $page == "logout") { ?>
    <meta http-equiv="refresh" content="1;URL=<?php echo $_SERVER['HTTP_REFERER']; ?>">
  <?php } ?>
  <link rel="canonical" href="<?php echo (JAK_USE_APACHE ? substr(BASE_URL, 0, -1) : BASE_URL) . JAK_rewrite::jakParseurl($page, $page1, $page2, $page3, $page4, $page5, $page6); ?>">

  <?php if (isset($JAK_RSS_DISPLAY) && isset($JAK_RSS_TITLE)) { ?>
    <link rel="alternate" type="application/rss+xml" title="<?php echo $JAK_RSS_TITLE; ?> RSS 2.0" href="<?php echo $P_RSS_LINK; ?>">
  <?php } ?>

  <!-- Stylesheets
  ============================================= -->
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/stylesheet.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/bootstrap/bootstrap.min.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/template/canvas/css/canvas/style.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/template/canvas/css/canvas/dark.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/template/canvas/css/canvas/font-icons.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/template/canvas/css/canvas/animate.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>template/canvas/css/screen.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css"/>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>template/canvas/css/canvas.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css"/>

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/template/canvas/css/canvas/responsive.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--[if lt IE 9]>
  <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
  <![endif]-->

  <!-- Basic Jquery
  ============================================= -->
  <script type="text/javascript" src="<?php echo BASE_URL; ?>template/canvas/js/canvas/jquery.js?=<?php echo $jkv["updatetime"]; ?>"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>/js/bootstrap/bootstrap.min.js?=<?php echo $jkv["updatetime"]; ?>"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>js/functions.js?=<?php echo $jkv["updatetime"]; ?>"></script>

  <!-- Document Title
  ============================================= -->
  <title><?php echo $jkv["title"];
    if ($jkv["title"]) { ?> &raquo; <?php }
    echo $PAGE_TITLE; ?></title>

  <!-- Import templates for in between head
  ============================================= -->
  <?php if (isset($JAK_HOOK_HEAD_TOP) && is_array($JAK_HOOK_HEAD_TOP)) foreach ($JAK_HOOK_HEAD_TOP as $headt) {
    include_once APP_PATH . $headt['phpcode'];
  }
  echo $JAK_HEADER_CSS; ?>
</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

  <!-- Offline Website
  ============================================= -->
  <?php if ($jkv["offline"] == 1 && JAK_ASACCESS) { ?>
    <div class="alert-offline"><?php echo $tl["title"]["t10"]; ?></div>
  <?php } ?>

  <?php if ($JAK_SHOW_NAVBAR) { ?>

  <!-- Import templates before everything
  ============================================= -->
  <?php if (isset($JAK_HOOK_BODY_TOP) && is_array($JAK_HOOK_BODY_TOP)) foreach ($JAK_HOOK_BODY_TOP as $bodyt) {
    include_once APP_PATH . $bodyt['phpcode'];
  } ?>


  <!-- Top Bar
		============================================= -->
  <div id="top-bar">

    <div class="container clearfix">

      <div class="col_half nobottommargin">

        <!-- Top Links
        ============================================= -->
        <div class="top-links">
          <ul>
            <li><a href="#">Úvod</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Kontakt</a></li>
            <li>
              <a href="#">
              <?php if (!JAK_USERID) {
                echo 'Přihlásit / Registrovat';
              } else {
                echo 'Odhlásit';
              } ?>

              </a>
              <div class="top-link-section">

              <?php if (!JAK_USERID) { ?>
                <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                  <div class="input-group bottommargin-sm" id="top-login-username">
                    <span class="input-group-addon"><i class="icon-user"></i></span>
                    <input type="text" class="form-control" name="jakU" id="username" value="<?php if (isset($_REQUEST["jakU"])) echo $_REQUEST["jakU"]; ?>" placeholder="<?php echo $tl["login"]["l1"]; ?>"/>
                  </div>
                  <div class="input-group" id="top-login-password">
                    <span class="input-group-addon"><i class="icon-key"></i></span>
                    <input type="password" class="form-control" name="jakP" id="password" placeholder="<?php echo $tl["login"]["l2"]; ?>"/>
                  </div>
                  <label class="checkbox">
                    <input type="checkbox" name="lcookies" value="1"> <?php echo $tl["general"]["g7"]; ?>
                  </label>
                  <button type="submit" name="login" class="btn btn-success btn-block"><?php echo $tl["general"]["g146"]; ?></button>
                  <input type="hidden" name="home" value="0"/>
                </form>
              <?php } else { ?>
                <h4><?php echo sprintf($JAK_USERNAME, $tl["general"]["g8"]); ?></h4>
                <a href="<?php echo $P_USR_LOGOUT; ?>" class="btn btn-danger" style="width: 100%;"><?php echo $tl["title"]["t6"]; ?></a>

              <?php } ?>

              </div>
            </li>
          </ul>
        </div><!-- .top-links end -->

      </div>

      <div class="col_half fright col_last nobottommargin">

        <!-- Top Social
        ============================================= -->
        <div id="top-social">
          <ul>
            <li><a href="#" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
            <li><a href="#" class="si-twitter"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
            <li><a href="#" class="si-dribbble"><span class="ts-icon"><i class="icon-dribbble"></i></span><span class="ts-text">Dribbble</span></a></li>
            <li><a href="#" class="si-github"><span class="ts-icon"><i class="icon-github-circled"></i></span><span class="ts-text">Github</span></a></li>
            <li><a href="#" class="si-pinterest"><span class="ts-icon"><i class="icon-pinterest"></i></span><span class="ts-text">Pinterest</span></a></li>
            <li><a href="#" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
            <li><a href="tel:+91.11.85412542" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text">+91.11.85412542</span></a></li>
            <li><a href="mailto:info@canvas.com" class="si-email3"><span class="ts-icon"><i class="icon-email3"></i></span><span class="ts-text">info@canvas.com</span></a></li>
          </ul>
        </div><!-- #top-social end -->

      </div>

    </div>

  </div><!-- #top-bar end -->

        <!-- Header
        ============================================= -->
  <header id="header" class="sticky-style-2">

    <div class="container clearfix">

      <!-- Logo
      ============================================= -->
      <div id="logo">
        <a href="<?php echo BASE_URL; ?>" class="standard-logo" data-dark-logo="template/canvas/img/logo-dark.png">
          <img src="template/canvas/img/logo.png" alt="<?php echo $jkv["title"]; ?>">
        </a>
        <a href="<?php echo BASE_URL; ?>" class="retina-logo" data-dark-logo="template/canvas/img/logo-dark@2x.png">
          <img src="template/canvas/img/logo@2x.png" alt="<?php echo $jkv["title"]; ?>">
        </a>
      </div><!-- #logo end -->

      <ul class="header-extras">
        <li>
          <i class="i-plain icon-email3 nomargin"></i>
          <div class="he-text">
            Email
            <span>info@canvas.com</span>
          </div>
        </li>
        <li>
          <i class="i-plain icon-call nomargin"></i>
          <div class="he-text">
            Zavolejte nám
            <span>+420 000 000 000</span>
          </div>
        </li>
      </ul>

    </div>

    <div id="header-wrap">

      <!-- Primary Navigation
      ============================================= -->
      <nav id="primary-menu" class="style-2">

        <div class="container clearfix">

          <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

          <!-- Menu -->
          <?php include_once APP_PATH . 'template/canvas/navbar.php'; ?>
          <!-- Hook -->
          <?php if (isset($JAK_HOOK_HEADER) && is_array($JAK_HOOK_HEADER)) foreach ($JAK_HOOK_HEADER as $hheader) {
            include_once APP_PATH . $hheader['phpcode'];
          } ?>

          <!-- Top Search
          ============================================= -->
          <div id="top-search">
            <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
            <form action="search.html" method="get">
              <input type="text" name="q" class="form-control" value="" placeholder="Zadejte hledaný výraz ...">
            </form>
          </div><!-- #top-search end -->

        </div>

      </nav><!-- #primary-menu end -->

    </div>

  </header><!-- #header end -->

  <!-- Import templates Below header
  ============================================= -->
  <?php if (isset($JAK_HOOK_BELOW_HEADER) && is_array($JAK_HOOK_BELOW_HEADER)) foreach ($JAK_HOOK_BELOW_HEADER as $bheader) {
    include_once APP_PATH . $bheader['phpcode'];
  } ?>

  <!-- Page Title
		============================================= -->
  <?php if (!isset($page) || empty($page)) { // Code for homepage ?>

  <?php } elseif (isset($page)) { // Code for all page without home page ?>

    <section id="page-title" class="page-title-pattern">

      <div class="container clearfix">
        <h1><?php echo $PAGE_TITLE; ?></h1>
        <span>A Short Page Title Tagline</span>
        <ol class="breadcrumb">
          <li>
            <a href="<?php echo BASE_URL; ?>"><?php foreach ($jakcategories as $ca) if ($ca['catorder'] == 1 && $ca['showmenu'] == 1 && $ca['showfooter'] == 0) { echo $ca["name"]; } ?></a>
          </li>
          <?php if ($JAK_TPL_PLUG_T && !empty($page1) && !is_numeric($page1)) { ?>
            <li><a href="<?php echo $JAK_TPL_PLUG_URL; ?>"><?php echo $JAK_TPL_PLUG_T; ?></a></li>
          <?php } ?>
          <li class="active">
            <?php if ($page == "edit-profile") {
              echo sprintf($tl["login"]["l15"], $jakuser->getVar("username"));
            } else {
              echo $PAGE_TITLE;
            } ?>
          </li>
        </ol>
      </div>

    </section><!-- #page-title end -->

  <?php } ?>

  <!-- Content
  ============================================= -->
  <section id="content">

    <div class="content-wrap">

      <div class="container clearfix">

        <!-- Sidebar
        ============================================= -->
        <?php if (!empty($JAK_HOOK_SIDE_GRID)) { ?>
        <div class="sidebar nobottommargin clearfix <?php if (!empty($JAK_HOOK_SIDE_GRID) && $jkv["sidebar_location_tpl"] == "right") echo " col_last "; ?>">
          <div class="sidebar-widgets-wrap">

            <!-- Sidebar if exist -->
            <?php if (!empty($JAK_HOOK_SIDE_GRID)) include_once APP_PATH . 'template/jakweb/sidebar.php'; ?>


          </div>
        </div><!-- .sidebar end -->
        <?php }?>

        <!-- Post Content
        ============================================= -->
        <div class="nobottommargin clearfix <?php if (!empty($JAK_HOOK_SIDE_GRID)) echo " postcontent "; if (!empty($JAK_HOOK_SIDE_GRID) && $jkv["sidebar_location_tpl"] == "left") echo " col_last "; ?>">

  <?php } ?>