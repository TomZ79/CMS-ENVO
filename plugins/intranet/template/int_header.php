<!DOCTYPE html>
<html lang="<?php echo $site_language; ?>">
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
  <meta charset="utf-8"/>
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
  <!-- BEGIN PLUGIN CSS -->

  <?php
  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Bootstrap
  echo $Html->addStylesheet('/assets/plugins/bootstrapv3/css/bootstrap.min.css?=v3.3.7');
  // Fontawesome icon
  echo $Html->addStylesheet('/assets/plugins/font-awesome/4.7.0/css/font-awesome.min.css?=v4.7.0');
  // Animate
  echo $Html->addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/jquery-scrollbar/jquery.scrollbar.min.css');
  // Google Fonts
  echo $Html->addStylesheet('https://fonts.googleapis.com/icon?family=Material+Icons');
  // DataTables (Stylesheet only for pages which contains 'table')
  if ($page1 == 'house' && empty($page2)) echo $Html->addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/jquery-datatable/extra/css/jquery.webarch_dataTables.min.css');
  ?>

  <!-- END PLUGIN CSS -->
  <!-- BEGIN CORE CSS FRAMEWORK -->

  <?php
  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Main StyleSheet
  echo $Html->addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'css/webarch.css');
  ?>

  <!-- END CORE CSS FRAMEWORK -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse ">
  <!-- BEGIN TOP NAVIGATION BAR -->
  <div class="navbar-inner">
    <div class="header-seperation">
      <ul class="nav pull-left notifcation-center visible-xs visible-sm">
        <li class="dropdown">
          <a href="#main-menu" data-webarch="toggle-left-side">
            <i class="material-icons">menu</i>
          </a>
        </li>
      </ul>
      <!-- BEGIN LOGO -->
      <a href="<?php echo JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_INTRANET, '', '', '', '') ?>">
        <img src="/plugins/intranet/template/img/logo.png" class="logo" alt="" width="106" height="21"/>
      </a>
      <!-- END LOGO -->
      <ul class="nav pull-right notifcation-center">
        <li class="dropdown hidden-xs hidden-sm">
          <a href="<?php echo JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_INTRANET, '', '', '', '') ?>" class="dropdown-toggle">
            <i class="material-icons">dashboard</i>
          </a>
        </li>
      </ul>
    </div>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <div class="header-quick-nav">
      <!-- BEGIN TOP NAVIGATION MENU -->
      <div class="pull-left">
        <ul class="nav quick-section">
          <li class="quicklinks">
            <a href="#" class="" id="layout-condensed-toggle">
              <i class="material-icons">menu</i>
            </a>
          </li>
        </ul>
        <ul class="nav quick-section">
          <li class="quicklinks"><span class="h-seperate"></span></li>
          <li class="quicklinks">
            <a href="#" class="" id="my-task-list" data-placement="bottom" data-content='' data-toggle="dropdown" data-original-title="Notifications">
              <i class="material-icons">email</i>
              <span class="badge badge-important animated bounceIn">2</span>
            </a>
          </li>
        </ul>
      </div>
      <div id="notification-list" style="display:none">
        <div style="width:300px">
          <div class="notification-messages info">
            <div class="user-profile">
              <img src="assets/img/profiles/d.jpg" alt="" width="35" height="35">
            </div>
            <div class="message-wrapper">
              <div class="heading">
                David Nester - Commented on your wall
              </div>
              <div class="description">
                Meeting postponed to tomorrow
              </div>
              <div class="date pull-left">
                A min ago
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="notification-messages danger">
            <div class="iconholder">
              <i class="icon-warning-sign"></i>
            </div>
            <div class="message-wrapper">
              <div class="heading">
                Server load limited
              </div>
              <div class="description">
                Database server has reached its daily capicity
              </div>
              <div class="date pull-left">
                2 mins ago
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="notification-messages success">
            <div class="user-profile">
              <img src="assets/img/profiles/h.jpg" alt="" width="35" height="35">
            </div>
            <div class="message-wrapper">
              <div class="heading">
                You haveve got 150 messages
              </div>
              <div class="description">
                150 newly unread messages in your inbox
              </div>
              <div class="date pull-left">
                An hour ago
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <!-- END TOP NAVIGATION MENU -->
      <!-- BEGIN CHAT TOGGLER -->
      <div class="pull-right">
        <div class="chat-toggler sm">
          <div class="profile-pic">
            <img src="<?php echo '/' . basename(JAK_FILES_DIRECTORY) . '/userfiles/' . $ENVO_USER_AVATAR; ?>" alt="" width="35" height="35"/>
            <div class="availability-bubble online"></div>
          </div>
        </div>
        <ul class="nav quick-section ">
          <li class="quicklinks">
            <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
              <i class="material-icons">tune</i>
            </a>
            <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
              <li>
                <a href="#"> My Account</a>
              </li>
              <li>
                <a href="#"> Messages
                  <span class="badge badge-important animated bounceIn">2</span>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="<?php echo $P_USR_LOGOUT; ?>"><i class="material-icons">power_settings_new</i>&nbsp;&nbsp;Log Out</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- END CHAT TOGGLER -->
    </div>
    <!-- END TOP NAVIGATION MENU -->
  </div>
  <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar " id="main-menu">
    <!-- BEGIN MINI-PROFILE -->
    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
      <div class="user-info-wrapper sm">
        <div class="profile-wrapper sm">
          <img src="<?php echo '/' . basename(JAK_FILES_DIRECTORY) . '/userfiles/' . $ENVO_USER_AVATAR; ?>" alt="" width="69" height="69"/>
          <div class="availability-bubble online"></div>
        </div>
        <div class="user-info sm">
          <div class="username"><?php echo $ENVO_USER_NAME; ?></div>
          <div class="status"><?php echo $ENVO_USER_GROUP; ?> ...</div>
        </div>
      </div>
      <!-- END MINI-PROFILE -->
      <!-- BEGIN SIDEBAR MENU -->
      <p class="menu-title sm">MENU </p>
      <?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_nav.php'; ?>
      <div class="clearfix"></div>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
  <a href="#" class="scrollup">Scroll</a>

  <?php if ($ENVO_MODULES) { ?>

    <div class="footer-widget">
      <div class="progress transparent progress-small no-radius no-margin">
        <div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="<?php echo get_server_cpu_usage() . '%'; ?>"></div>
      </div>
      <div class="pull-right">
        <div class="details-status">
          <span class="animate-number" data-value="<?php echo get_server_cpu_usage(); ?>" data-animation-duration="560" data-toggle="tooltip" title="Server CPU usage">0</span>%
        </div>
      </div>
    </div>

  <?php } ?>

  <!-- END SIDEBAR -->
  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here</div>
    </div>
    <div class="clearfix"></div>
    <div class="content ">
      <!-- START PAGE -->