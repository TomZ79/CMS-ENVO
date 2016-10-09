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
            <li><a href="<?php echo $jkv["homeLinks_canvas_tpl"]; ?>"><?php echo $tlcanvas["header"]["h"]; ?></a></li>
            <li><a href="<?php echo $jkv["contactLinks_canvas_tpl"]; ?>"><?php echo $tlcanvas["header"]["h1"]; ?></a></li>
            <li>
              <a href="<?php echo $jkv["loginLinks_canvas_tpl"]; ?>">
              <?php if (!JAK_USERID) {
                echo $tlcanvas["header"]["h2"];
              } else {
                echo $tlcanvas["header"]["h3"];
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
                  <button type="submit" name="login" class="button button-3d button-mini button-rounded button-green nomargin btn-block"><?php echo $tl["general"]["g146"]; ?></button>
                  <input type="hidden" name="home" value="0"/>
                </form>
              <?php } else { ?>
                <h4><?php echo sprintf($JAK_USERNAME, $tl["general"]["g8"]); ?></h4>
                <a href="<?php echo $P_USR_LOGOUT; ?>" class="button button-3d button-mini button-rounded button-red nomargin btn-block"><?php echo $tl["title"]["t6"]; ?></a>

              <?php } ?>

              </div>
            </li>
            <?php if (!JAK_USERID) { ?>
            <li><a href="<?php echo $jkv["registerLinks_canvas_tpl"]; ?>"><?php echo $tlcanvas["header"]["h4"]; ?></a></li>
            <?php } ?>
          </ul>
        </div><!-- .top-links end -->

      </div>

      <div class="col_half fright col_last nobottommargin">

        <!-- Top Social
        ============================================= -->
        <div id="top-social">
          <ul>
            <?php if ($jkv["facebookShow_canvas_tpl"] == 1 ) { ?>
            <li><a href="<?php echo $jkv["facebookLinks_canvas_tpl"]; ?>" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
            <?php } if ($jkv["twitterShow_canvas_tpl"] == 1 ) { ?>
            <li><a href="<?php echo $jkv["twitterLinks_canvas_tpl"]; ?>" class="si-twitter"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
            <?php } if ($jkv["googleShow_canvas_tpl"] == 1 ) { ?>
            <li><a href="<?php echo $jkv["googleLinks_canvas_tpl"]; ?>" class="si-google"><span class="ts-icon"><i class="icon-google"></i></span><span class="ts-text">Google Plus</span></a></li>
            <?php } if ($jkv["phoneShow_canvas_tpl"] == 1 ) { ?>
            <li><a href="tel:<?php echo $jkv["phoneLinks_canvas_tpl"]; ?>" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text"><?php echo $jkv["phoneLinks_canvas_tpl"]; ?></span></a></li>
            <?php } if ($jkv["emailShow_canvas_tpl"] == 1 ) { ?>
            <li><a href="mailto:<?php echo $jkv["emailLinks_canvas_tpl"]; ?>" class="si-email3"><span class="ts-icon"><i class="icon-email3"></i></span><span class="ts-text"><?php echo $jkv["emailLinks_canvas_tpl"]; ?></span></a></li>
            <?php } ?>
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
        <a href="<?php echo BASE_URL; ?>" class="standard-logo">
          <img src="<?php echo $jkv["logo1_canvas_tpl"]; ?>" alt="<?php echo $jkv["title"]; ?>">
        </a>
        <a href="<?php echo BASE_URL; ?>" class="retina-logo">
          <img src="<?php echo $jkv["logo2_canvas_tpl"]; ?>" alt="<?php echo $jkv["title"]; ?>">
        </a>
      </div><!-- #logo end -->

      <ul class="header-extras">
        <li>
          <i class="i-plain icon-email3 nomargin"></i>
          <div class="he-text">
            <?php echo $tlcanvas["header"]["h5"]; ?>
            <span><?php echo $jkv["emailLinks1_canvas_tpl"]; ?></span>
          </div>
        </li>
        <li>
          <i class="i-plain icon-call nomargin"></i>
          <div class="he-text">
            <?php echo $tlcanvas["header"]["h6"]; ?>
            <span><?php echo $jkv["phoneLinks1_canvas_tpl"]; ?></span>
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
              <input type="text" name="q" class="form-control" value="" placeholder="<?php echo $tlcanvas["header"]["h7"]; ?>">
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

    <section id="page-title">

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