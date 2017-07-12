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
  <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
  <!-- Fontawesome icon -->
  <link type="text/css" rel="stylesheet" href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Stroke gap icon -->
  <link type="text/css" rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/css/stroke-icon.css">
  <link type="text/css" rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/css/ie7.css">
  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="/assets/plugins/bootstrapv3/css/bootstrap.min.css">
  <!-- Menu -->
  <link type="text/css" rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/css/menuzord.css">
  <!-- Jquery UI -->
  <link type="text/css" rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/js-plugins/jquery-ui/jquery-ui-1.11.4.css">
  <!-- Revolution Slider -->
  <link type="text/css" rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/js-plugins/revolution/css/settings.css">
  <link type="text/css" rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/js-plugins/revolution/css/layers.css">
  <link type="text/css" rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/js-plugins/revolution/css/navigation.css">
  <!-- OWL Carousel -->
  <link type="text/css" rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/js-plugins/owl-carousel/css/owl.theme.default.css">
  <link type="text/css" rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/js-plugins/owl-carousel/css/owl.carousel.css">
  <!-- Main style -->
  <link type="text/css" rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/css/main.css">

  <?php if ($SHOWSOCIALBUTTON) { ?>
    <!-- Sollist -->
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

  <!-- Import templates for in between head
  ============================================= -->
  <?php if (isset($JAK_HOOK_HEAD_TOP) && is_array($JAK_HOOK_HEAD_TOP)) foreach ($JAK_HOOK_HEAD_TOP as $headt) {
    include_once APP_PATH . $headt['phpcode'];
  } ?>

  <!-- Import CSS for Current page in between head
  ============================================= -->
  <?php if (isset($JAK_HEADER_CSS)) echo $JAK_HEADER_CSS; ?>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body>

<?php if ($JAK_SHOW_NAVBAR) { ?>

<!-- =========================
      START HEADER SECTION
    ============================== -->
<div class="outslider_loading">
  <div class="la-ball-scale-ripple-multiple la-dark la-2x">
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<div class="full-page-search">
  <form class="form-search" action="/search" method="post">
    <input type="text" name="jakSH" id="Jajaxs2" class="search" placeholder="<?php echo $tlmetrics["searchbox_text"]["searcht1"]; ?>">
    <input type="submit" id="searchsubmit" value="Search">
  </form>
  <div class="sr-overlay"></div>
</div>
<div class="log-in-up">
  <div class="log-in-content">
    <div class="log-in-head text-center">
      <img src="/template/metrics/img/log-in-key.png" alt="">
      <h2><?php echo $tlmetrics["lform_text"]["lformt"]; ?></h2>
    </div>
    <?php if (!JAK_USERID) { ?>
      <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" class="form-login">
        <input type="text" class="form-control" name="jakU" id="username" value="<?php if (isset($_REQUEST["jakU"])) echo $_REQUEST["jakU"]; ?>" placeholder="<?php echo $tlmetrics["lform_text"]["lformt1"]; ?>">
        <input type="password" class="form-control" name="jakP" id="password" placeholder="<?php echo $tlmetrics["lform_text"]["lformt2"]; ?>"/>
        <div class="form-group">
          <label class="checkbox-inline">
            <input type="checkbox" name="lcookies" value="1"> <?php echo $tlmetrics["lform_text"]["lformt3"]; ?>
          </label>
        </div>

        <input type="submit" name="login" value="<?php echo $tlmetrics["lform_text"]["lformt4"]; ?>">
        <input type="hidden" name="home" value="0"/>
      </form>

    <?php } ?>

    <a href="#" class="remove-log-in"><img src="/template/metrics/img/log-in-cross.png" alt=""></a>
  </div>
  <div class="log-in-overlay"></div>
</div>
<div class="right-full-menu">
  <div class="right_menu_item">
    <div class="right_menu_item-content">
      <div class="right-menu-icon">
        <a href="<?php echo BASE_URL; ?>"><img src="<?php echo $jkv["logo1_metrics_tpl"]; ?>" alt=""/></a>
      </div>
      <div class="right-menu-list">
        <?php echo build_menu_metrics(0, $mheader, FALSE, $page, '', '', '', '', '', FALSE); ?>
      </div>
      <div class="right-menu-social-box">
        <ul class="cms-social">
          <?php if ($jkv["facebookheaderShow_metrics_tpl"] == 1) { ?>
            <li class="facebook">
              <a href="<?php echo $jkv["facebookheaderLinks_metrics_tpl"]; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
            </li>
          <?php }
          if ($jkv["twitterheaderShow_metrics_tpl"] == 1) { ?>
            <li class="twitter">
              <a href="<?php echo $jkv["twitterheaderLinks_metrics_tpl"]; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
            </li>
          <?php }
          if ($jkv["googleheaderShow_metrics_tpl"] == 1) { ?>
            <li class="google">
              <a href="<?php echo $jkv["googleheaderLinks_metrics_tpl"]; ?>" target="_blank"><i class="fa fa-google"></i></a>
            </li>
          <?php }
          if ($jkv["instagramheaderShow_metrics_tpl"] == 1) { ?>
            <li class="instagram">
              <a href="<?php echo $jkv["instagramheaderLinks_metrics_tpl"]; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
            </li>
          <?php }
          if ($jkv["phoneheaderShow_metrics_tpl"] == 1) { ?>
            <li class="phone">
              <a href="tel:<?php echo $jkv["phoneheaderLinks_metrics_tpl"]; ?>" target="_blank"><i class="fa fa-phone"></i> <?php echo $jkv["phoneheaderLinks_metrics_tpl"]; ?></a>
            </li>
          <?php }
          if ($jkv["emailheaderShow_metrics_tpl"] == 1) { ?>
            <li class="email">
              <a href="mailto:<?php echo envo_encode_email($jkv["emailheaderLinks_metrics_tpl"]); ?>" target="_blank"><i class="fa fa-envelope"></i></a>
            </li>
          <?php }
          if ($JAK_RSS_DISPLAY) { ?>
            <li class="rss">
              <a href="<?php echo $P_RSS_LINK; ?>" target="_blank"><i class="fa fa-rss"></i></a>
            </li>
          <?php } ?>
        </ul>
        <div class="footer-bottom-right right-menu-copyright">
          <p><?php echo $jkv["copyright"]; ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="close_ic"></div>
</div>
<header class="<?php echo $jkv["header_metrics_tpl"]; ?>">
  <div class="container custom-header">
    <div class="row">
      <div id="menuzord" class="menuzord">
        <a href="<?php echo BASE_URL; ?>" class="menuzord-brand">
          <img src="<?php echo $jkv["logo2_metrics_tpl"]; ?>" alt="">
          <span>Metrics</span>
        </a>
        <div class="header-contact">
          <ul>
            <?php if ($jkv["sitemapShow_metrics_tpl"] == 1) { ?>
              <li>
                <a href="/<?php echo $jkv["sitemapLinks_metrics_tpl"]; ?>" class="linkLeft"><?php echo $tlmetrics["header_text"]["ht"]; ?></a>
              </li>
            <?php }
            if ($jkv["loginShow_metrics_tpl"] == 1) {
              if (!JAK_USERID) { ?>
                <li class="log-in-search"><a href="#" id="login"><?php echo $tlmetrics["header_text"]["ht1"]; ?></a>
                </li>
              <?php } else { ?>
                <li>
                  <a href="<?php echo $P_USR_LOGOUT; ?>" id="logout"><?php echo $tlmetrics["header_text"]["ht2"]; ?></a>
                </li>
                <?php if (JAK_ASACCESS) { ?>
                  <li><a href="<?php echo BASE_URL; ?>admin/"><?php echo $tlmetrics["header_text"]["ht3"]; ?></a></li>
                <?php }
              }
            }
            if ($jkv["buttonheaderShow_metrics_tpl"] == 1) { ?>
              <li class="consult-search">
                <a href="/<?php echo $jkv["buttonheaderLinks_metrics_tpl"]; ?>"><?php echo $jkv["buttonheaderText_metrics_tpl"]; ?></a>
              </li>
            <?php } ?>
          </ul>
        </div>
        <div class="header-search">
          <ul>
            <li class="filter-search"><i class="fa fa-search"></i></li>
            <li class="right_menu"><a href="#"><i class="fa fa-bars"></i></a></li>
          </ul>
        </div>
        <!-- Main navigation -->
        <?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/navbar.php'; ?>
        <!-- Hook -->
        <?php if (isset($JAK_HOOK_HEADER) && is_array($JAK_HOOK_HEADER)) foreach ($JAK_HOOK_HEADER as $hheader) {
          include_once APP_PATH . $hheader['phpcode'];
        } ?>
      </div>
    </div>
  </div>
</header>
<!-- =========================
  END HEADER SECTION
============================== -->
<?php } ?>

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
    ($page == '404') ||
    (!$jkv["searchform"] || !JAK_USER_SEARCH)
    /* || ($PAGE_PASSWORD && !JAK_ASACCESS && $PAGE_PASSWORD != $_SESSION['pagesecurehash' . $PAGE_ID]) */
  ) {

    // Code for homepage and other blank page
    ?>

  <?php } elseif (isset($page)) {
    // Code for all page without home page
    ?>

    <section class="page-title-area feature-head-area page-title-4 page-title-6">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="about-head-content">
              <h2><?php echo envo_cut_text($PAGE_TITLE, 35, "..."); ?></h2>
            </div>
            <div class="breadcrumbs text-center">
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

<section class="pt-medium  mb-medium">

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

      <section class="pt-medium  mb-medium">

        <div class="container">
          <div class="row">

            <!-- Sidebar if left -->
            <?php if (!empty($JAK_HOOK_SIDE_GRID) && $jkv["sidebar_location_tpl"] == "left") include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/sidebar.php'; ?>
            <!-- / sidebar -->
            <div class="<?php echo($JAK_HOOK_SIDE_GRID ? "col-md-9" : "col-md-12"); ?>">

              <?php } ?>
