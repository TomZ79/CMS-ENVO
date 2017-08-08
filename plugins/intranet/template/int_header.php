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

<body class="page-loading header-blue">
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
      <!-- toggle small sidebar menu -->
      <a href="javascript:;" class="toggle-apps hidden-xs" data-toggle="quick-launch">
        <i class="icon-grid"></i>
      </a>
      <!-- /toggle small sidebar menu -->
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
    <ul class="quick-launch-apps hide">
      <li>
        <a href="apps-gallery.html">
            <span class="app-icon bg-danger text-white">
            G
            </span>
          <span class="app-title">Gallery</span>
        </a>
      </li>
      <li>
        <a href="apps-messages.html">
            <span class="app-icon bg-success text-white">
            M
            </span>
          <span class="app-title">Messages</span>
        </a>
      </li>
      <li>
        <a href="apps-social.html">
            <span class="app-icon bg-primary text-white">
            S
            </span>
          <span class="app-title">Social</span>
        </a>
      </li>
      <li>
        <a href="apps-travel.html">
            <span class="app-icon bg-info text-white">
            T
            </span>
          <span class="app-title">Travel</span>
        </a>
      </li>
    </ul>
    <!-- main navigation -->
    <nav role="navigation">
      <ul class="nav">
        <!-- dashboard -->
        <li>
          <a href="index.html">
            <i class="icon-compass"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <!-- /dashboard -->
        <!-- menu levels -->
        <li>
          <a href="javascript:;">
            <i class="icon-frame"></i>
            <span>Menu Level</span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="javascript:;">
                <i class="toggle-accordion"></i>
                <span>Level</span>
              </a>
              <ul class="sub-menu">
                <li>
                  <a href="javascript:;">
                    <i class="toggle-accordion"></i>
                    <span>Level</span>
                  </a>
                  <ul class="sub-menu">
                    <li>
                      <a href="javascript:;">
                        <span>Level</span>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:;">
                        <span>Level</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="javascript:;">
                    <span>Level</span>
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a href="javascript:;">
                <span>Level</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- menu levels -->
      </ul>
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
              <a href="<?php echo BASE_URL; ?>">Websíť <?php echo $jkv["title"]; ?></a>
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