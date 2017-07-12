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

  <!-- Share Social Network
  ============================================= -->
  <!-- for Google -->
  <meta name="keywords" content="<?php echo trim($PAGE_KEYWORDS); ?>">
  <meta name="description" content="<?php echo trim($PAGE_DESCRIPTION); ?>">
  <meta name="author" content="<?php echo $jkv["metaauthor"]; ?>">

  <!-- for Facebook -->
  <meta property="og:title" content="<?php echo $PAGE_TITLE; ?>"/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="<?php echo BASE_URL; ?>"/>
  <meta property="og:image" content="<?php echo(($PAGE_IMAGE) ? $PAGE_IMAGE : ($SHOWIMG) ? $SHOWIMG : $JAK_RANDOM_IMAGE); ?>"/>
  <meta property="og:description" content="<?php echo trim($PAGE_DESCRIPTION); ?>"/>

  <!-- for Twitter -->
  <meta name="twitter:card" content="summary"/>
  <meta name="twitter:title" content=""/>
  <meta name="twitter:description" content=""/>
  <meta name="twitter:image" content=""/>

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

  <!-- CSS and FONTS
  ================================================== -->
  <link href='http://fonts.googleapis.com/css?family=Hammersmith+One' rel='stylesheet' type='text/css'>
  <link type="text/css" rel="stylesheet" href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.min.css">
  <link type="text/css" rel="stylesheet" href="/assets/plugins/bootstrap-glyphicons/glyphicons-pro/css/glyphicons-pro.css">
  <?php if ($jkv["activeroyalslider_qed_tpl"] == 1) { ?>
    <link rel="stylesheet" type="text/css" href="/template/<?php echo ENVO_TEMPLATE; ?>/js-plugins/royalslider/royalslider.css"/>
    <link rel="stylesheet" type="text/css" href="/template/<?php echo ENVO_TEMPLATE; ?>/js-plugins/royalslider/skins/minimal-white/rs-minimal-white.css">
  <?php } ?>
  <link type="text/css" rel="stylesheet" href="/assets/plugins/bootstrapv3/css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/icons/custom-icons/css/custom-icons.css">
  <link type="text/css" rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/js-plugins/external-plugins.min.css">
  <link type="text/css" rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/css/layout/neko-framework-layout.css">
  <link type="text/css" rel="stylesheet" id="color" href="/template/<?php echo ENVO_TEMPLATE; ?>/css/color/neko-framework-<?php echo $jkv["color_qed_tpl"]; ?>.css">
  <link type="text/css" rel="stylesheet" id="color" href="/assets/plugins/owl.carousel/assets/owl.carousel.css">
  <link type="text/css" rel="stylesheet" id="color" href="/assets/plugins/owl.carousel/assets/owl.theme.green.css">
  <link href="/assets/plugins/full-screen-navigation/css/FSNav.css" rel="stylesheet">

  <?php if ($SHOWSOCIALBUTTON) { ?>
    <link href="/assets/plugins/jquery-sollist/jquery.sollist.min.css" rel="stylesheet" type="text/css" media="screen"/>
  <?php } ?>

  <link rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/css/screen.css" type="text/css"/>

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

  <!-- Basic Jquery
  ============================================= -->
  <script src="/template/<?php echo ENVO_TEMPLATE; ?>/js-plugins/modernizr/modernizr.custom.js"></script>

  <!-- Import templates for in between head
  ============================================= -->
  <?php if (isset($JAK_HOOK_HEAD_TOP) && is_array($JAK_HOOK_HEAD_TOP)) foreach ($JAK_HOOK_HEAD_TOP as $headt) {
    include_once APP_PATH . $headt['phpcode'];
  }
  echo $JAK_HEADER_CSS; ?>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="activate-appear-animation <?php if ($jkv["boxed_qed_tpl"] == 1) echo ' boxed-layout ';
echo $jkv["header_qed_tpl"]; ?> color-<?php echo $jkv["color_qed_tpl"]; ?>">

<!-- global-wrapper -->
<div id="global-wrapper">

  <?php if ($JAK_SHOW_NAVBAR) { ?>

    <!-- header -->
    <header class="menu-header navbar-fixed-top" role="banner">
      <section id="pre-header">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 hidden-xs">
              <ul class="quick-menu">
                <?php if ($jkv["sitemapShow_qed_tpl"] == 1) { ?>
                  <li>
                    <a href="/<?php echo $jkv["sitemapLinks_qed_tpl"]; ?>" class="linkLeft"><?php echo $tlqed["header_text"]["ht"]; ?></a>
                  </li>
                <?php }
                if ($jkv["loginShow_qed_tpl"] == 1) {
                  if (!JAK_USERID) { ?>
                    <li><a href="/" id="login"><?php echo $tlqed["header_text"]["ht1"]; ?></a></li>
                  <?php } else { ?>
                    <li>
                      <a href="<?php echo $P_USR_LOGOUT; ?>" id="logout"><?php echo $tlqed["header_text"]["ht2"]; ?></a>
                    </li>
                    <?php if (JAK_ASACCESS) { ?>
                      <li><a href="<?php echo BASE_URL; ?>admin/"><?php echo $tlqed["header_text"]["ht3"]; ?></a></li>
                    <?php }
                  }
                } ?>
              </ul>
            </div>
            <div class="col-sm-6 col-xs-12 quick-contact">
              <?php if ($jkv["phoneShow_qed_tpl"] == 1) { ?>
                <div class="contact-phone">
                  <i class="icon-mobile"></i>
                  <a href="tel:<?php echo $jkv["phoneLinks_qed_tpl"]; ?>"><span><?php echo $jkv["phoneLinks_qed_tpl"]; ?></span></a>
                </div>
              <?php } ?>

              <ul class="social-icons">
                <?php if ($jkv["facebookShow_qed_tpl"] == 1) { ?>
                  <li>
                    <a href="<?php echo $jkv["facebookLinks_qed_tpl"]; ?>" target="_blank"><i class="icon-facebook"></i></a>
                  </li>
                <?php }
                if ($jkv["twitterShow_qed_tpl"] == 1) { ?>
                  <li>
                    <a href="<?php echo $jkv["twitterLinks_qed_tpl"]; ?>" target="_blank"><i class="icon-twitter"></i></a>
                  </li>
                <?php }
                if ($jkv["googleShow_qed_tpl"] == 1) { ?>
                  <li>
                    <a href="<?php echo $jkv["googleLinks_qed_tpl"]; ?>" target="_blank"><i class="icon-gplus"></i></a>
                  </li>
                <?php }
                if ($jkv["instagramShow_qed_tpl"] == 1) { ?>
                  <li>
                    <a href="<?php echo $jkv["instagramLinks_qed_tpl"]; ?>" target="_blank"><i class="icon-instagramm"></i></a>
                  </li>
                <?php }
                if ($jkv["emailShow_qed_tpl"] == 1) { ?>
                  <li>
                    <a href="mailto:<?php echo envo_encode_email($jkv["emailLinks_qed_tpl"]); ?>" target="_blank"><i class="icon-mail"></i></a>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <div class="container">
        <nav class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <!-- hamburger button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only"><?php echo $tlqed["navigation_text"]["navt"]; ?></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- / hamburger button -->

            <!-- Logo -->
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>"><img src="<?php echo $jkv["logo1_qed_tpl"]; ?>" alt=""/></a>
            <!-- /Logo -->
          </div>
          <div class="collapse navbar-collapse pull-right">
            <!-- Main navigation -->
            <?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/navbar.php'; ?>
            <!-- Hook -->
            <?php if (isset($JAK_HOOK_HEADER) && is_array($JAK_HOOK_HEADER)) foreach ($JAK_HOOK_HEADER as $hheader) {
              include_once APP_PATH . $hheader['phpcode'];
            } ?>
            <!-- Search -->
            <div class="search-box pull-right hidden-xs">
              <div id="show-nav"><i class="icon-search"></i></div>
            </div>

            <div class="responsive-search-box pull-right visible-xs">
              <hr>
              <form class="form-search" action="/search" method="post">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="jakSH" id="Jajaxs1" class="form-control search" placeholder="Vyhledat ...">
                    <span class="input-group-addon"><button type="submit" class="icon-search"></button></span>
                  </div>
                </div>
              </form>
            </div>
            <!-- / End main navigation -->
          </div>
        </nav>
      </div>

    </header>
    <!-- header -->

  <?php } ?>

  <!-- content -->
  <main id="content">

    <!-- Page Title -->
    <?php if ($JAK_SHOW_NAVBAR) {

      /* GRID SYSTEM FOR DIFFERENT PAGE - hide page title
       * !isset($page =>
       * empty($page) =>
       * $page == 'offline' =>
       * $page == '404' =>
       * !$jkv["searchform"] || !JAK_USER_SEARCH =>
       * ($PAGE_PASSWORD && !JAK_ASACCESS && $PAGE_PASSWORD != $_SESSION['pagesecurehash' . $PAGE_ID]) => If page have password and password isn't same as in Session without Administrator access
       */
      if (!isset($page) ||
        empty($page) ||
        ($page == 'offline') ||
        ($page == '404') ||
        (!$jkv["searchform"] || !JAK_USER_SEARCH) ||
        ($PAGE_PASSWORD && !JAK_ASACCESS && $PAGE_PASSWORD != $_SESSION['pagesecurehash' . $PAGE_ID])
      ) {

        // Code for homepage and other blank page
        ?>

      <?php } elseif (isset($page)) {
        // Code for all page without home page
        ?>

        <header class="page-header light-color">

          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h1><?php echo envo_cut_text($PAGE_TITLE, 30, "..."); ?></h1>
              </div>
              <div class="col-md-6">
                <ol class="breadcrumb">

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

                </ol>
              </div>
            </div>
          </div>

        </header>

      <?php }
    } ?>

    <?php
    if (isset($JAK_HOOK_BELOW_HEADER) && is_array($JAK_HOOK_BELOW_HEADER)) foreach ($JAK_HOOK_BELOW_HEADER as $bheader) {
      // Import templates below header
      include_once APP_PATH . $bheader['phpcode'];
    }
    ?>

    <?php

    /* GRID SYSTEM FOR DIFFERENT PAGE - show main section without sidebar
     * (empty($JAK_HOOK_SIDE_GRID) && (!empty($page)) && (!$PAGE_PASSWORD) => show section if page have not GRID, isn't HOME PAGE and not exist password for page
     * ($page != 'offline') => show section if site isn't offline
     * ($page != '404') => show section if page isn't 404
     * ($jkv["searchform"]) =>
     * ((empty($JAK_HOOK_SIDE_GRID) && $PAGE_PASSWORD && $PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID]) => show section if page have not GRID, have password and password is different as password in SESSION
     * (empty($JAK_HOOK_SIDE_GRID) && $PAGE_PASSWORD && JAK_ASACCESS) => show section if page have not GRID, have password, but user access is Administrator
     */

    if ((empty($JAK_HOOK_SIDE_GRID) && (!empty($page)) && (!$PAGE_PASSWORD)) &&
    ($page != 'offline') &&
    ($page != '404') &&
    ($jkv["searchform"]) ||
    (empty($JAK_HOOK_SIDE_GRID) && $PAGE_PASSWORD && $PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID]) ||
    (empty($JAK_HOOK_SIDE_GRID) && $PAGE_PASSWORD && JAK_ASACCESS)) {

    ?>

    <section class="pt-medium">

      <div class="container">
        <div class="row">

          <?php } ?>

          <?php

          /* GRID SYSTEM FOR DIFFERENT PAGE - hide all main section
           * (empty($JAK_HOOK_SIDE_GRID) && empty($page) && $PAGE_PASSWORD) => hide section if page have not GRID, is HOME PAGE and exist password for page
           * ($page == 'offline') => hide section if site is offline
           * ($page == '404') => hide section if page is 404
           * (!$jkv["searchform"]) =>
           * ($PAGE_PASSWORD && $PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID]) => hide section if page have password and pasword is different as password in SESSION
           */

          if ((empty($JAK_HOOK_SIDE_GRID) && empty($page) && $PAGE_PASSWORD) ||
            ($page == 'offline') ||
            ($page == '404') ||
            (!$jkv["searchform"]) ||
            ($PAGE_PASSWORD && $PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID])
          ) {

            ?>

          <?php } ?>


          <?php

          /* GRID SYSTEM FOR DIFFERENT PAGE - show main section with sidebar
           * (!empty($JAK_HOOK_SIDE_GRID) && $PAGE_PASSWORD && $PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID]) => show section if page have GRID (have sidebar), have password and password is same as password  in SESSION
           * (!empty($JAK_HOOK_SIDE_GRID) && !$PAGE_PASSWORD) => show section if page have GRID (have sidebar), have not password
           * (!empty($JAK_HOOK_SIDE_GRID) && $PAGE_PASSWORD && JAK_ASACCESS) => show section if page have GRID (have sidebar), have password, but user access is Administrator
           * (!empty($JAK_HOOK_SIDE_GRID) && !empty($page) && !$PAGE_PASSWORD) => show section if page have GRID, page isn't blank (isn't home page), have not password
           */

          if ((!empty($JAK_HOOK_SIDE_GRID) && $PAGE_PASSWORD && $PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID]) ||
          (!empty($JAK_HOOK_SIDE_GRID) && !$PAGE_PASSWORD) ||
          (!empty($JAK_HOOK_SIDE_GRID) && $PAGE_PASSWORD && JAK_ASACCESS) ||
          (!empty($JAK_HOOK_SIDE_GRID) && !empty($page) && !$PAGE_PASSWORD)) {

          ?>

          <section class="pt-medium">

            <div class="container">
              <div class="row">

                <!-- Sidebar if left -->
                <?php if (!empty($JAK_HOOK_SIDE_GRID) && $jkv["sidebar_location_tpl"] == "left") include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/sidebar.php'; ?>
                <!-- / sidebar -->
                <div class="<?php echo($JAK_HOOK_SIDE_GRID ? "col-md-9" : "col-md-12"); ?>">

                  <?php } ?>
