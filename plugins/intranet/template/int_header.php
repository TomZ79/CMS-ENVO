<!DOCTYPE html>
<html class="no-js" lang="<?php echo $site_language; ?>">

<head>
  <meta charset="utf-8">

  <!-- Document Title
  ============================================= -->
  <title><?php echo $jkv["title"];
    if ($jkv["title"]) { ?> &raquo; <?php }
    echo $PAGE_TITLE; ?></title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

  <!-- CSS and FONTS
  ================================================== -->
  <link rel="stylesheet" href="<?php echo $SHORT_PLUGIN_URL; ?>styles/webfont.css">
  <link rel="stylesheet" href="<?php echo $SHORT_PLUGIN_URL; ?>styles/climacons-font.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="/assets/plugins/bootstrapv3/css/bootstrap.min.css?=v3.3.7">
  <!-- Fontawesome icon -->
  <link rel="stylesheet" href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.min.css?=v4.7.0">
  <!--  -->
  <link rel="stylesheet" href="<?php echo $SHORT_PLUGIN_URL; ?>styles/card.css">
  <!--  -->
  <link rel="stylesheet" href="<?php echo $SHORT_PLUGIN_URL; ?>styles/sli.css">
  <!-- Animate -->
  <link rel="stylesheet" href="<?php echo $SHORT_PLUGIN_URL; ?>styles/animate.css">
  <!-- App CSS -->
  <link rel="stylesheet" href="<?php echo $SHORT_PLUGIN_URL; ?>styles/app.css">
  <link rel="stylesheet" href="<?php echo $SHORT_PLUGIN_URL; ?>styles/app.skins.css">

</head>

<body class="page-loading <?php echo $ENVO_SETTING_VAL["intranetskin"]; ?>">
<!-- page loading spinner -->
<div class="pageload">
  <div class="pageload-inner">
    <div class="sk-rotating-plane"></div>
  </div>
</div>
<!-- /page loading spinner -->
<div class="app layout-fixed-header">
  <!-- sidebar panel -->
  <div class="sidebar-panel offscreen-left">
    <div class="brand">
      <!-- toggle offscreen menu -->
      <div class="toggle-offscreen">
        <a href="javascript:;" class="visible-xs hamburger-icon" data-toggle="offscreen" data-move="ltr">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
      <!-- /toggle offscreen menu -->
      <!-- logo -->
      <a class="brand-logo">
        <span>INTRANET</span>
      </a>
      <a href="#" class="small-menu-visible brand-logo">INT</a>
      <!-- /logo -->
    </div>
    <!-- main navigation -->
    <nav role="navigation">
      <?php include_once APP_PATH . 'plugins/intranet/template/int_nav.php'; ?>
    </nav>
    <!-- /main navigation -->
  </div>
  <!-- /sidebar panel -->
  <!-- content panel -->
  <div class="main-panel">
    <!-- top header -->
    <div class="header navbar">
      <div class="brand visible-xs">
        <!-- toggle offscreen menu -->
        <div class="toggle-offscreen">
          <a href="javascript:;" class="hamburger-icon visible-xs" data-toggle="offscreen" data-move="ltr">
            <span></span>
            <span></span>
            <span></span>
          </a>
        </div>
        <!-- /toggle offscreen menu -->
        <!-- logo -->
        <a class="brand-logo">
          <span>INTRANET</span>
        </a>
        <!-- /logo -->
      </div>
      <ul class="nav navbar-nav hidden-xs">
        <li>
          <a href="javascript:;" class="small-sidebar-toggle ripple" data-toggle="layout-small-menu">
            <i class="icon-toggle-sidebar"></i>
          </a>
        </li>
        <li class="searchbox">
          <a href="javascript:;" data-toggle="search">
            <i class="search-close-icon icon-close hide"></i>
            <i class="search-open-icon icon-magnifier"></i>
          </a>
        </li>
        <li class="navbar-form search-form hide">
          <input type="search" class="form-control search-input" placeholder="Start typing...">
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right m-r-md">
        <li>
          <a href="javascript:;" class="ripple" data-toggle="dropdown">
            <span><?php echo $jakuser->getVar("username"); ?></span>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="<?php echo BASE_URL; ?>" target="_blank">Websíť <?php echo $jkv["title"]; ?></a>
            </li>
            <li>
              <a href="<?php echo $P_USR_LOGOUT; ?>" id="logout">Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /top header -->
    <!-- main area -->
    <div class="main-content">

      <div class="page-title">
        <ul class="breadcrumb">
          <li><h5 class="title bold">Uživatelé - Editace</h5></li>
          <li><span class="desc">Editace uživatele</span></li>
        </ul>
      </div>