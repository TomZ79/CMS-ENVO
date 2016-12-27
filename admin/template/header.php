<!DOCTYPE html>
<html lang="<?php echo $site_language; ?>">
<head>

  <meta charset="utf-8">
  <title><?php if ($page) echo ucwords($page) . ' - '; ?>ACP - <?php echo $jkv["title"]; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
  <meta name="description" content="CMS,Adminpanel,JAKWEB"/>
  <meta name="keywords" content="Your premium CMS from JAKWEB HTML5/CSS3"/>
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>

  <!-- AUTOMATIC PACE ================================================================================================ -->
  <!-- Pace -->
  <script type="text/javascript" src="js-plugins/pace/pace.min.js?=<?php echo $jkv["updatetime"]; ?>"></script>
  <link rel="stylesheet" href="js-plugins/pace/themes/teal/pace-theme-minimal.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css" media="screen"/>

  <!-- CSS STYLE ================================================================================================ -->
  <!-- General Stylesheet with custom modifications -->
  <link rel="stylesheet" href="../css/stylesheet.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css" media="screen"/>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css" media="screen"/>
  <!-- Theme style -->
  <link rel="stylesheet" href="css/admin.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css" media="screen"/>
  <link rel="stylesheet" href="css/admin-color.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css" media="screen"/>
  <!-- Animate style -->
  <link rel="stylesheet" href="css/animate.min.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css" media="screen"/>
  <!-- Perfect Scroll -->
  <link rel="stylesheet" href="js-plugins/perfect-scrollbar/css/perfect-scrollbar.css?=<?php echo $jkv["updatetime"];?>" type="text/css" media="screen" />
  <!-- Bootstrap Datetimpicker 4 -->
  <link rel="stylesheet" href="js-plugins/bootstrap-datetimepicker-4/css/bootstrap-datetimepicker.min.css?=<?php echo $jkv["updatetime"];?>" type="text/css" media="screen" />
  <!-- Bootstrap-Select CSS -->
  <link rel="stylesheet" href="js-plugins/bootstrap-select/css/bootstrap-select.min.css?=<?php echo $jkv["updatetime"];?>" type="text/css" media="screen" />
  <!-- Bootstrap-Iconpicker -->
  <link rel="stylesheet" href="js-plugins/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css" media="screen"/>
  <!-- Prism CSS -->
  <link rel="stylesheet" href="js-plugins/prism/prism.css?=<?php echo $jkv["updatetime"];?>" type="text/css" media="screen" />

  <?php if (!$jkv["langdirection"]) { ?>
    <!-- RTL Support -->
    <link rel="stylesheet" href="css/rtl/screen.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css" media="screen"/>
    <!-- End RTL Support -->
  <?php } ?>
  <?php if ($page == 'categories') { ?>
    <!-- EXTRA CSS SETTINGS FOR SOME PAGES -->
    <style type="text/css">
      /* Global page categories */
      .bootstrap-tagsinput {
        height: 112px;
        margin-top: 32px;
      }
    </style>
  <?php } ?>
  <style type="text/css">
    .main-sidebar {
      height: 100%; /* Or whatever you want (eg. 400px) */
    }
  </style>

  <!-- JQUERY SCRIPT and PLUGINS ================================================================================ -->
  <!-- jQuery -->
  <script src="../js/jquery.js?=<?php echo $jkv["updatetime"]; ?>"></script>
  <!-- General function -->
  <script type="text/javascript" src="../js/bootstrap/bootstrap.min.js?=<?php echo $jkv["updatetime"]; ?>"></script>
  <script type="text/javascript" src="js-plugins/moment/moment-with-locales.min.js?=<?php echo $jkv["updatetime"]; ?>"></script>
  <!-- Admin App function -->
  <script type="text/javascript" src="js/cms.js?=<?php echo $jkv["updatetime"]; ?>"></script>
  <!-- Perfect Scroll -->
  <script type="text/javascript" src="js-plugins/perfect-scrollbar/js/perfect-scrollbar.jquery.js?=<?php echo $jkv["updatetime"]; ?>"></script>
  <!-- Bootstrap Datetimpicker 4 -->
  <script type="text/javascript" src="js-plugins/bootstrap-datetimepicker-4/js/bootstrap-datetimepicker.js?=<?php echo $jkv["updatetime"]; ?>"></script>
  <!-- Bootstrap-Select JS -->
  <script type="text/javascript" src="js-plugins/bootstrap-select/js/bootstrap-select.min.js?=<?php echo $jkv["updatetime"]; ?>"></script>
  <script type="text/javascript" src="js-plugins/bootstrap-select/js/i18n/defaults-cs_CZ.min.js?=<?php echo $jkv["updatetime"]; ?>"></script>
  <!-- Bootstrap-Iconpicker -->
  <script type="text/javascript" src="js-plugins/bootstrap-iconpicker/js/iconset/iconset-fontawesome-4.2.0.min.js?=<?php echo $jkv["updatetime"]; ?>"></script>
  <script type="text/javascript" src="js-plugins/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js?=<?php echo $jkv["updatetime"]; ?>"></script>
  <!-- Prism JS -->
  <script type="text/javascript" src="js-plugins/prism/prism.js?=<?php echo $jkv["updatetime"]; ?>"></script>

  <!-- Custom Admin App function -->
  <script type="text/javascript" src="../js/functions.js?=<?php echo $jkv["updatetime"]; ?>"></script>
  <script type="text/javascript" src="js/cms_custom.js?=<?php echo $jkv["updatetime"]; ?>"></script>

  <!-- Jquery Upload Filer -->
  <script type="text/javascript" src="js-plugins/jquery-filter/js/jquery.filer.min.js?=<?php echo $jkv["updatetime"]; ?>"></script>
  <script type="text/javascript" src="js-plugins/jquery-filter/examples/dragdrop/js/custom.js?=<?php echo $jkv["updatetime"]; ?>"></script>

  <link rel="stylesheet" href="js-plugins/jquery-filter/css/jquery.filer.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css" media="screen"/>
  <link rel="stylesheet" href="js-plugins/jquery-filter/css/themes/jquery.filer-dragdropbox-theme.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css" media="screen"/>



  <!--[if lt IE 9]>
  <script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- Import all hooks for in between head -->
  <?php if (isset($JAK_HOOK_HEAD_ADMIN) && is_array($JAK_HOOK_HEAD_ADMIN)) foreach ($JAK_HOOK_HEAD_ADMIN as $headt) {
    include_once APP_PATH . $headt['phpcode'];
  } ?>

</head>
<body class="skin-teal sidebar-mini fixed<?php if (!$JAK_PROVED) echo " login-page"; ?> has-detached-right" data-spy="scroll" data-target=".sidebar-detached">
<?php if ($JAK_PROVED) { ?>
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a class="logo" href="<?php echo BASE_URL_ORIG; ?>" target="_blank">
      <!-- Mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">ACP</span>
      <!-- Logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo $jkv["title"]; ?></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-home"></i><span
                class="hidden-xs hidden-sm"> <?php echo $tl["menu"]["mh"]; ?> <b class="caret"></b></span></a>
            <ul class="dropdown-menu right">
              <li><a href="<?php echo BASE_URL_ADMIN; ?>"><?php echo $tl["menu"]["mh"]; ?></a></li>
              <li><a href="index.php?p=site"><?php echo $tl["cmenu"]["c1"]; ?></a></li>
              <li><a href="index.php?p=logs"><?php echo $tl["cmenu"]["c48"]; ?></a></li>
              <li><a href="index.php?p=searchlog"><?php echo $tl["cmenu"]["c49"]; ?></a></li>
            </ul>
          </li>
          <?php if ($JAK_MODULEM) { ?>
            <li><a href="index.php?p=page"><i class="fa fa-file-text-o"></i><span
                  class="hidden-xs hidden-sm"> <?php echo $tl["menu"]["m7"]; ?></span></a></li>
            <li><a href="index.php?p=categories"><i class="fa fa-list"></i><span
                  class="hidden-xs hidden-sm"> <?php echo $tl["menu"]["m5"]; ?></span></a></li>
          <?php }
          if ($JAK_MODULES) { ?>
            <li><a href="index.php?p=setting"><i class="fa fa-cogs"></i><span
                  class="hidden-xs hidden-sm"> <?php echo $tl["general"]["g5"]; ?></span></a></li>
          <?php } ?>
            <li><a class="wIframe" data-title='CMS - FAQ' href="<?php echo BASE_URL_ADMIN; ?>template/help.php"><i class="fa fa-ambulance"></i><span class="hidden-xs hidden-sm"> <?php echo $tl["title"]["t21"];?></span></a></li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img
                src="<?php echo BASE_URL_ORIG . basename(JAK_FILES_DIRECTORY) . '/userfiles/' . $jakuser->getVar("picture"); ?>"
                class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $jakuser->getVar("name"); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img
                  src="<?php echo BASE_URL_ORIG . basename(JAK_FILES_DIRECTORY) . '/userfiles/' . $jakuser->getVar("picture"); ?>"
                  class="img-circle" alt="User Image">
                <p>
                  <?php echo $JAK_WELCOME_NAME; ?>
                  <small>
                    <?php
                    $date = strtotime($jakuser->getVar("time"));
                    echo sprintf($tl["user"]["u18"], date($jkv["dateformat"] . $jkv["timeformat"],$date));
                    ?>
                  </small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="index.php?p=user&amp;sp=edit&amp;ssp=<?php echo JAK_USERID; ?>"
                     class="btn btn-default btn-flat"><?php echo $tl["general"]["g77"]; ?></a>
                </div>
                <div class="pull-right">
                  <a href="index.php?p=logout" data-confirm-logout="<?php echo $tl["logout"]["l2"]; ?>" class="btn btn-default btn-flat"><?php echo $tl["logout"]["l"]; ?></a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li id="control-sb" class="hidden hidden-xs">
            <a href="#" data-toggle="control-sidebar" ><i class="fa fa-question"></i></a>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style -->
    <section id="sidebar" class="sidebar">
      <?php include_once APP_PATH . 'admin/template/navbar.php'; ?>
    </section>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php if ($page != '404' && !empty($page))	{ ?>
      <!-- Header - content -->
      <section class="section-header">
        <!-- Title section -->
        <div class="content-header" style="height: 60px;">
          <h1 class="pull-left"><?php echo $SECTION_TITLE;?><small><?php echo $SECTION_DESC;?></small></h1>
        </div>
      </section>
    <?php } ?>

    <!-- Main content -->
    <section class="content">
      <?php } else { ?>
      <div class="container">
        <div class="col-md-12">
<?php } ?>