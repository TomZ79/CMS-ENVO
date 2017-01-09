<!DOCTYPE html>
<html lang="<?php echo $site_language; ?>">
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="utf-8" />
  <title>Pages - Admin Dashboard UI Kit</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="apple-touch-icon" href="pages/ico/60.png">
  <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
  <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta content="" name="description" />
  <meta content="" name="author" />
  <!-- BEGIN Vendor CSS-->
  <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css">
  <!-- BEGIN Pages CSS-->
  <link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
  <link class="main-stylesheet" href="pages/css/pages.css" rel="stylesheet" type="text/css" />
  <!-- BEGIN General Stylesheet with custom modifications -->
  <link href="assets/css/style.css" rel="stylesheet" type="text/css">
  <!--[if lte IE 9]>
  <link href="pages/css/ie9.css" rel="stylesheet" type="text/css" />
  <![endif]-->
  <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
    }
  </script>
  <!-- BEGIN HOOKS - HEADER -->
  <?php if (isset($JAK_HOOK_HEAD_ADMIN) && is_array($JAK_HOOK_HEAD_ADMIN)) foreach ($JAK_HOOK_HEAD_ADMIN as $headt) {
    include_once APP_PATH . $headt['phpcode'];
  } ?>
</head>
<body class="fixed-header has-detached-right" data-spy="scroll" data-target=".sidebar-detached">
<?php if ($JAK_PROVED) { ?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar" data-pages="sidebar">
  <div id="appMenu" class="sidebar-overlay-slide from-top">
    <div class="row">
      <div class="col-xs-6 no-padding">
        <a href="#" class="p-l-40"><img src="assets/img/demo/social_app.svg" alt="socail">
        </a>
      </div>
      <div class="col-xs-6 no-padding">
        <a href="#" class="p-l-10"><img src="assets/img/demo/email_app.svg" alt="socail">
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6 m-t-20 no-padding">
        <a href="#" class="p-l-40"><img src="assets/img/demo/calendar_app.svg" alt="socail">
        </a>
      </div>
      <div class="col-xs-6 m-t-20 no-padding">
        <a href="#" class="p-l-10"><img src="assets/img/demo/add_more.svg" alt="socail">
        </a>
      </div>
    </div>
  </div>
  <!-- BEGIN SIDEBAR HEADER -->
  <div class="sidebar-header">
    <img src="assets/img/logo_white.png" alt="logo" class="brand" data-src="assets/img/logo_white.png" data-src-retina="assets/img/logo_white_2x.png" width="78" height="22">
    <div class="sidebar-header-controls">
      <button data-pages-toggle="#appMenu" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" type="button"><i class="fa fa-angle-down fs-16"></i>
      </button>
      <button data-toggle-pin="sidebar" class="btn btn-link visible-lg-inline" type="button"><i class="fa fs-12"></i>
      </button>
    </div>
  </div>
  <!-- END SIDEBAR HEADER -->
  <!-- BEGIN SIDEBAR MENU -->
  <div class="sidebar-menu">
    <?php include_once APP_PATH . 'admin/template/navbar.php'; ?>
    <div class="clearfix"></div>
  </div>
  <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
<!-- START PAGE-CONTAINER -->
<div class="page-container">
  <!-- START PAGE HEADER WRAPPER -->
  <!-- START HEADER -->
  <div class="header ">
    <!-- START MOBILE CONTROLS -->
    <div class="container-fluid relative">
      <!-- LEFT SIDE -->
      <div class="pull-left full-height visible-sm visible-xs">
        <!-- START ACTION BAR -->
        <div class="header-inner">
          <a href="#" class="btn-link toggle-sidebar visible-sm-inline-block visible-xs-inline-block padding-5" data-toggle="sidebar">
            <span class="icon-set menu-hambuger"></span>
          </a>
        </div>
        <!-- END ACTION BAR -->
      </div>
      <div class="pull-center hidden-md hidden-lg">
        <div class="header-inner">
          <div class="brand inline">
            <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
          </div>
        </div>
      </div>
      <!-- RIGHT SIDE -->
      <div class="pull-right full-height visible-sm visible-xs">
        <!-- START ACTION BAR -->
        <div class="header-inner">
          <a href="#" class="btn-link visible-sm-inline-block visible-xs-inline-block" data-toggle="quickview" data-toggle-element="#quickview">
            <span class="icon-set menu-hambuger-plus"></span>
          </a>
        </div>
        <!-- END ACTION BAR -->
      </div>
    </div>
    <!-- END MOBILE CONTROLS -->
    <div class=" pull-left sm-table hidden-xs hidden-sm">
      <div class="header-inner">
        <div class="brand inline">
          <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
        </div>
        <!-- START NOTIFICATION LIST -->
        <ul class="notification-list no-margin hidden-sm hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
          <li class="p-r-15 inline">
            <div class="dropdown">
              <a href="javascript:;" id="notification-center" class="icon-set globe-fill" data-toggle="dropdown">
                <span class="bubble"></span>
              </a>
              <!-- START Notification Dropdown -->
              <div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">
                <!-- START Notification -->
                <div class="notification-panel">
                  <!-- START Notification Body-->
                  <div class="notification-body scrollable">
                    <!-- START Notification Item-->
                    <div class="notification-item unread clearfix">
                      <!-- START Notification Item-->
                      <div class="heading open">
                        <a href="#" class="text-complete pull-left">
                          <i class="pg-map fs-16 m-r-10"></i>
                          <span class="bold">Carrot Design</span>
                          <span class="fs-12 m-l-10">David Nester</span>
                        </a>
                        <div class="pull-right">
                          <div class="thumbnail-wrapper d16 circular inline m-t-15 m-r-10 toggle-more-details">
                            <div><i class="fa fa-angle-left"></i>
                            </div>
                          </div>
                          <span class=" time">few sec ago</span>
                        </div>
                        <div class="more-details">
                          <div class="more-details-inner">
                            <h5 class="semi-bold fs-16">“Apple’s Motivation - Innovation <br>
                              distinguishes between <br>
                              A leader and a follower.”</h5>
                            <p class="small hint-text">
                              Commented on john Smiths wall.
                              <br> via pages framework.
                            </p>
                          </div>
                        </div>
                      </div>
                      <!-- END Notification Item-->
                      <!-- START Notification Item Right Side-->
                      <div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
                        <a href="#" class="mark"></a>
                      </div>
                      <!-- END Notification Item Right Side-->
                    </div>
                    <!-- START Notification Body-->
                    <!-- START Notification Item-->
                    <div class="notification-item  clearfix">
                      <div class="heading">
                        <a href="#" class="text-danger pull-left">
                          <i class="fa fa-exclamation-triangle m-r-10"></i>
                          <span class="bold">98% Server Load</span>
                          <span class="fs-12 m-l-10">Take Action</span>
                        </a>
                        <span class="pull-right time">2 mins ago</span>
                      </div>
                      <!-- START Notification Item Right Side-->
                      <div class="option">
                        <a href="#" class="mark"></a>
                      </div>
                      <!-- END Notification Item Right Side-->
                    </div>
                    <!-- END Notification Item-->
                    <!-- START Notification Item-->
                    <div class="notification-item  clearfix">
                      <div class="heading">
                        <a href="#" class="text-warning-dark pull-left">
                          <i class="fa fa-exclamation-triangle m-r-10"></i>
                          <span class="bold">Warning Notification</span>
                          <span class="fs-12 m-l-10">Buy Now</span>
                        </a>
                        <span class="pull-right time">yesterday</span>
                      </div>
                      <!-- START Notification Item Right Side-->
                      <div class="option">
                        <a href="#" class="mark"></a>
                      </div>
                      <!-- END Notification Item Right Side-->
                    </div>
                    <!-- END Notification Item-->
                    <!-- START Notification Item-->
                    <div class="notification-item unread clearfix">
                      <div class="heading">
                        <div class="thumbnail-wrapper d24 circular b-white m-r-5 b-a b-white m-t-10 m-r-10">
                          <img width="30" height="30" data-src-retina="assets/img/profiles/1x.jpg" data-src="assets/img/profiles/1.jpg" alt="" src="assets/img/profiles/1.jpg">
                        </div>
                        <a href="#" class="text-complete pull-left">
                          <span class="bold">Revox Design Labs</span>
                          <span class="fs-12 m-l-10">Owners</span>
                        </a>
                        <span class="pull-right time">11:00pm</span>
                      </div>
                      <!-- START Notification Item Right Side-->
                      <div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
                        <a href="#" class="mark"></a>
                      </div>
                      <!-- END Notification Item Right Side-->
                    </div>
                    <!-- END Notification Item-->
                  </div>
                  <!-- END Notification Body-->
                  <!-- START Notification Footer-->
                  <div class="notification-footer text-center">
                    <a href="#" class="">Read all notifications</a>
                    <a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
                      <i class="pg-refresh_new"></i>
                    </a>
                  </div>
                  <!-- START Notification Footer-->
                </div>
                <!-- END Notification -->
              </div>
              <!-- END Notification Dropdown -->
            </div>
          </li>
          <li class="p-r-15 inline">
            <a href="#" class="icon-set clip"></a>
          </li>
          <li class="p-r-15 inline">
            <a href="#" class="icon-set grid-box" data-toggle="modal" data-target="#JAKModal"></a>
          </li>
        </ul>
        <!-- END NOTIFICATIONS LIST -->
        <a href="#" class="search-link" data-toggle="search"><i class="pg-search"></i>Type anywhere to <span class="bold">search</span></a> </div>
    </div>
    <div class=" pull-right">
      <div class="header-inner">
        <a href="#" class="btn-link icon-set menu-hambuger-plus m-l-20 sm-no-margin hidden-sm hidden-xs" data-toggle="quickview" data-toggle-element="#quickview"></a>
      </div>
    </div>
    <div class=" pull-right">
      <!-- START User Info-->
      <div class="visible-lg visible-md m-t-10">
        <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
          <span class="bold"><?php echo $JAK_WELCOME_NAME;?></span>
        </div>
        <div class="dropdown pull-right">
          <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="thumbnail-wrapper d32 circular inline m-t-5">
              <img src="<?php echo BASE_URL_ORIG . basename(JAK_FILES_DIRECTORY) . '/userfiles/' . $jakuser->getVar("picture"); ?>" alt="" data-src="<?php echo BASE_URL_ORIG . basename(JAK_FILES_DIRECTORY) . '/userfiles/' . $jakuser->getVar("picture"); ?>" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="32" height="32">
            </span>
          </button>
          <ul class="dropdown-menu profile-dropdown" role="menu">
            <li><a href="#"><i class="pg-settings_small"></i> Settings</a>
            </li>
            <li><a href="#"><i class="pg-outdent"></i> Feedback</a>
            </li>
            <li><a href="#"><i class="pg-signals"></i> Help</a>
            </li>
            <li class="bg-master-lighter">
              <a href="index.php?p=logout" data-confirm-logout="<?php echo $tl["log_out"]["logout1"]; ?>" class="clearfix">
                <span class="pull-left"><?php echo $tl["log_out"]["logout"]; ?></span>
                <span class="pull-right"><i class="pg-power"></i></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- END User Info-->
    </div>
  </div>
  <!-- END HEADER -->
  <!-- END PAGE HEADER WRAPPER -->
  <!-- START PAGE CONTENT WRAPPER -->
  <div class="page-content-wrapper">
    <!-- START PAGE CONTENT -->
    <div class="content">
      <!-- START JUMBOTRON -->
      <div class="jumbotron" data-pages="parallax">
        <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
          <div class="inner">
            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
              <li>
                <p>Pages</p>
              </li>
              <li><a href="#" class="active">Barebone template</a>
              </li>
            </ul>
            <!-- END BREADCRUMB -->
          </div>
        </div>
      </div>
      <!-- END JUMBOTRON -->
      <!-- START CONTAINER FLUID -->
      <div class="container-fluid container-fixed-lg">
        <!-- BEGIN PlACE PAGE CONTENT HERE -->

<?php } else { ?>

<?php } ?>