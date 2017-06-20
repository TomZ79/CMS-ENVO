<?php
echo $Html->addDoctype('html5');
?>

<html lang="<?php echo $site_language; ?>">
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title>ENVO - Admin Dashboard</title>
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <?php
    // Add Html Element -> endTag (Arguments: name, content)
    $meta = array(
      array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'),
      array('name' => 'apple-mobile-web-app-capable', 'content' => 'yes'),
      array('name' => 'apple-touch-fullscreen', 'content' => 'yes'),
      array('name' => 'apple-mobile-web-app-status-bar-style', 'content' => 'default'),
      array('name' => 'description', 'content' => ''),
      array('name' => 'author', 'content' => ''),
    );
    echo $Html->addMeta($meta);
    ?>

    <!-- BEGIN Vendor CSS-->
    <?php
    // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
    echo $Html->addStylesheet('assets/plugins/pace/pace-theme-flash.css');
    // Bootstrap
    echo $Html->addStylesheet('assets/plugins/bootstrapv3/css/bootstrap.min.css');
    // Font Awesomemin
    echo $Html->addStylesheet('../assets/plugins/font-awesome/4.7.0/css/font-awesome.css');
    // Scrollbar
    echo $Html->addStylesheet('assets/plugins/jquery-scrollbar/jquery.scrollbar.css', 'screen');
    //FileInput
    echo $Html->addStylesheet('assets/plugins/bootstrap-fileinput/css/fileinput.min.css', 'screen');
    // Bootstrap Select
    echo $Html->addStylesheet('assets/plugins/bootstrap-select2/4.0.3/css/select2.min.css', 'screen');
    // Bootstrap TagsInput
    echo $Html->addStylesheet('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css', 'screen');
    // Bootstrap DateTimePicker
    echo $Html->addStylesheet('assets/plugins/bootstrap-datetimepicker-4/css/bootstrap-datetimepicker.min.css');
    // Bootstrap IconPicker
    echo $Html->addStylesheet('assets/plugins/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css');
    // Bootstrap GlyphIcons
    echo $Html->addStylesheet('../assets/plugins/bootstrap-glyphicons/glyphicons-pro/css/glyphicons-pro.min.css');
    //
    echo $Html->addStylesheet('assets/plugins/switchery/css/switchery.min.css', 'screen');
    //
    echo $Html->addStylesheet('assets/plugins/prism/prism.css', 'screen');

    // Animate
    echo $Html->addStylesheet('assets/css/animate.min.css');
    ?>

    <!-- BEGIN Pages CSS-->
    <?php
    // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
    echo $Html->addStylesheet('pages/css/pages-icons.css');
    echo $Html->addStylesheet('pages/css/pages.css', '', array('class' => 'main-stylesheet'));
    ?>

    <!-- BEGIN General Stylesheet with custom modifications -->
    <?php
    // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
    echo $Html->addStylesheet('assets/css/style.css');
    ?>

    <!--[if lte IE 9]>
    <link href="pages/css/ie9.css" rel="stylesheet" type="text/css"/>
    <![endif]-->
    <script type="text/javascript">
      window.onload = function () {
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
<body class="fixed-header has-detached-right">
<?php if ($JAK_PROVED) { ?>
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar" data-pages="sidebar">
    <div id="appMenu" class="sidebar-overlay-slide from-top">
      <div class="row">
        <div class="col-xs-6 no-padding">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html->addAnchor('#', '<img src="assets/img/demo/social_app.svg" alt="socail">', '', 'p-l-40');
          ?>

        </div>
        <div class="col-xs-6 no-padding">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html->addAnchor('#', '<img src="assets/img/demo/email_app.svg" alt="socail">', '', 'p-l-10');
          ?>

        </div>
      </div>
      <div class="row">
        <div class="col-xs-6 m-t-20 no-padding">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html->addAnchor('#', '<img src="assets/img/demo/calendar_app.svg" alt="socail">', '', 'p-l-40');
          ?>

        </div>
        <div class="col-xs-6 m-t-20 no-padding">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html->addAnchor('#', '<img src="assets/img/demo/add_more.svg" alt="socail">', '', 'p-l-10');
          ?>

        </div>
      </div>

      <div class="sidebar-footer text-center hidden-xs">

        <?php
        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
        echo $Html->addAnchor('index.php?p=changelog', $tl["submenu"]["sm4"]);
        echo (' | ');
        echo $Html->addAnchor('index.php?p=cmshelp', 'CMS Help');
        ?>

      </div>
    </div>
    <!-- BEGIN SIDEBAR HEADER -->
    <div class="sidebar-header">
      <a href="<?php echo BASE_URL_ORIG ?>" target="_blank">
        <img src="assets/img/logo_white.png" alt="logo" class="brand" data-src="assets/img/logo_white.png" data-src-retina="assets/img/logo_white_2x.png" width="78" height="22">
      </a>

      <div class="sidebar-header-controls">
        <button data-pages-toggle="#appMenu" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" type="button">
          <i class="fa fa-angle-down fs-16"></i>
        </button>
        <button data-toggle-pin="sidebar" class="btn btn-link visible-lg-inline" type="button"><i class="fa fs-12"></i>
        </button>
      </div>
    </div>
    <!-- END SIDEBAR HEADER -->
    <!-- BEGIN SIDEBAR MENU -->
    <div class="sidebar-menu">

      <?php
      include_once APP_PATH . 'admin/template/navbar.php';
      // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
      echo $Html->addDiv('', '', array('class' => 'clearfix'));
      ?>

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
            <a href="<?php echo BASE_URL_ORIG ?>" target="_blank">
              <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- END MOBILE CONTROLS -->
    <div class=" pull-left sm-table hidden-xs hidden-sm">
      <div class="header-inner">
        <div class="brand inline">
          <a href="<?php echo BASE_URL_ORIG ?>" target="_blank">
            <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
          </a>
        </div>
        <div class="inline p-l-30">
          <!-- START QUICK LIST -->
          <ul class="quick-list no-margin hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
            <li class="p-r-15 inline">
              <div class="dropdown">
                <a href="javascript:;" id="notification-center" class="icon-set grid-box" data-toggle="dropdown"></a>
                <!-- START Quick Dropdown -->
                <div class="dropdown-menu quick-toggle" role="menu" aria-labelledby="notification-center">
                  <!-- START Quick -->
                  <div class="quick-panel grid-dropdown">
                    <!-- START Quick Body-->
                    <div class="quick-body scrollable">
                      <div class="row stacked">
                        <div class="col-xs-4">

                          <?php
                          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                          echo $Html->addAnchor('index.php?p=categories', '<i class="pg-unordered_list"></i>' . $tl["submenu"]["sm110"]);
                          ?>

                        </div>
                        <div class="col-xs-4">

                          <?php
                          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                          echo $Html->addAnchor('index.php?p=page', '<i class="fa fa-file"></i>' . $tl["submenu"]["sm120"]);
                          ?>

                        </div>
                        <div class="col-xs-4">

                          <?php
                          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                          echo $Html->addAnchor('index.php?p=news', '<i class="fa fa-newspaper-o"></i>' . $tl["submenu"]["sm160"]);
                          ?>

                        </div>
                      </div>

                      <?php $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Blog"');
                      if ($jakdb->affected_rows > 0) { ?>
                        <div class="row stacked">
                          <div class="col-md-12 pluginname">
                            Plugin Blog
                          </div>
                          <div class="col-xs-4">

                            <?php
                            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                            echo $Html->addAnchor('index.php?p=blog&amp;sp=categories', '<i class="pg-unordered_list"></i>' . $tlblog["blog_menu"]["blogm4"]);
                            ?>

                          </div>
                          <div class="col-xs-4">

                            <?php
                            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                            echo $Html->addAnchor('index.php?p=blog', '<i class="fa fa-file"></i>' . $tlblog["blog_menu"]["blogm1"]);
                            ?>

                          </div>
                          <div class="col-xs-4">

                            <?php
                            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                            echo $Html->addAnchor('index.php?p=blog&amp;sp=setting', '<i class="pg-settings_small"></i>' . $tlblog["blog_menu"]["blogm9"]);
                            ?>

                          </div>
                        </div>
                      <?php } ?>

                      <?php $jakdb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Download"');
                      if ($jakdb->affected_rows > 0) { ?>
                        <div class="row stacked">
                          <div class="col-md-12 pluginname">
                            Plugin Download
                          </div>
                          <div class="col-xs-4">

                            <?php
                            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                            echo $Html->addAnchor('index.php?p=download&amp;sp=categories', '<i class="pg-unordered_list"></i>' . $tld["downl_menu"]["downlm4"]);
                            ?>

                          </div>
                          <div class="col-xs-4">

                            <?php
                            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                            echo $Html->addAnchor('index.php?p=download', '<i class="fa fa-file"></i>' . $tld["downl_menu"]["downlm1"]);
                            ?>

                          </div>
                          <div class="col-xs-4">

                            <?php
                            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                            echo $Html->addAnchor('index.php?p=download&amp;sp=setting', '<i class="pg-settings_small"></i>' . $tld["downl_menu"]["downlm9"]);
                            ?>

                          </div>
                        </div>
                      <?php } ?>

                      <style>
                        .header .quick-list {
                          display: inline-block;
                        }

                        .quick-toggle {
                          top: 35px;
                          left: -26px;
                          padding: 0;
                        }

                        .quick-toggle:before {
                          border-bottom: 0 !important;
                        }

                        .quick-toggle:after {
                          border-bottom: 0 !important;
                        }

                        .quick-panel {
                          background-color: #FFF;
                          border: 1px solid #E6E6E6;
                        }

                        .quick-panel .quick-body {
                          height: auto;
                          max-height: 350px;
                          position: relative;
                          overflow: hidden;
                        }

                        .grid-dropdown {
                          width: 300px;
                          text-align: center;
                          font-size: 16px;
                          color: #252932;
                        }

                        .stacked {
                          margin: 0;
                        }

                        .stacked .pluginname {
                          background-color: #F9F9F9;
                        }

                        .stacked > [class*="col-"] {
                          padding-left: 0;
                          padding-right: 0;
                          margin: 0 !important;
                        }

                        .stacked a {
                          font-size: 13px;
                          color: #38464A;
                          width: 100%;
                          padding: 10px;
                          line-height: 30px;
                          display: block;
                          font-weight: 300;
                          vertical-align: middle;
                          text-align: center;
                          cursor: pointer;
                        }

                        .stacked a:hover {
                          background: #626262;
                          color: #FFF;
                        }

                        .stacked a i {
                          font-size: 25px;
                          line-height: 30px;
                          height: 30px;
                          display: block;
                          color: #697a7a;
                        }

                        .stacked a:hover i {
                          color: #FFF;
                        }
                      </style>
                    </div>
                    <!-- END Quick Body-->
                  </div>
                  <!-- END Quick -->
                </div>
                <!-- END Quick Dropdown -->
              </div>
            </li>
          </ul>
          <!-- END QUICK LIST -->
          <a href="#" class="search-link" data-toggle="search">
            <i class="pg-search"></i>
            <?php echo $tl["hf_text"]["hftxt7"]; ?>
          </a>
        </div>
      </div>
    </div>
    <div class=" pull-right">
      <!-- START User Info-->
      <div class="visible-lg visible-md m-t-10">
        <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
          <span class="bold"><?php echo $JAK_WELCOME_NAME; ?></span>
        </div>
        <div class="dropdown pull-right">
          <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="thumbnail-wrapper d32 circular inline m-t-5">
              <img src="<?php echo BASE_URL_ORIG . basename(JAK_FILES_DIRECTORY) . '/userfiles/' . $jakuser->getVar("picture"); ?>" alt="" data-src="<?php echo BASE_URL_ORIG . basename(JAK_FILES_DIRECTORY) . '/userfiles/' . $jakuser->getVar("picture"); ?>" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="32" height="32">
            </span>
          </button>
          <ul class="dropdown-menu profile-dropdown" role="menu">
            <li>
              <a href="index.php?p=user&amp;sp=edit&amp;ssp=<?php echo JAK_USERID; ?>">
                <i class="pg-settings_small"></i> <?php echo $tl["hf_text"]["hftxt4"]; ?>
              </a>
            </li>
            <li>
              <a href="<?php echo BASE_URL_ADMIN; ?>template/help.php" class="contentHelp"><i class="fa fa-info"></i> <?php echo $tl["hf_text"]["hftxt5"]; ?>
              </a></li>
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
  <div class="page-content-wrapper <?php if ($page == 'cmshelp') echo 'full-height'; ?>">
  <!-- START PAGE CONTENT -->
  <div class="content <?php if ($page == 'cmshelp') echo 'full-height'; ?>">
  <!-- START JUMBOTRON -->
  <?php if ($page != 'cmshelp') { ?>
    <div class="jumbotron" data-pages="parallax">
      <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
        <?php if ($page != '404' && !empty($page)) { ?>
          <div class="inner">
            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
              <li><h5 class="title bold"><?php echo $SECTION_TITLE; ?></h5></li>
              <li><span class="desc"><?php echo $SECTION_DESC; ?></span></li>
            </ul>
            <!-- END BREADCRUMB -->
          </div>
        <?php } ?>
      </div>
    </div>
  <?php } ?>
  <!-- END JUMBOTRON -->
  <!-- START CONTAINER FLUID -->
  <?php if ($page != 'cmshelp') { ?>
    <div class="container-fluid container-fixed-lg">
  <?php } ?>
  <!-- BEGIN PLACE PAGE CONTENT HERE -->

<?php } else { ?>

<?php } ?>