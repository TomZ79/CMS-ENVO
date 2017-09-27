<?php
// EN: Number of notifications
// CZ: Počet oznámení
if (isset($ENVO_NOTIFICATION) && is_array($ENVO_NOTIFICATION)) {
  $notifCount = $ENVO_NOTIFICATION[0]["count"];
}
?>

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
  //
  if ($page1 == 'house' && !empty($page2)) echo $Html->addStylesheet('/assets/plugins/fancybox/3.0/css/jquery.fancybox.min.css');
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
<body class="page-loading">
<!-- BEGIN PAGE PRELOADER -->
<div class="pageload">
  <div class="pageload-inner">
    <div class="sk-cube-grid">
      <div class="sk-cube sk-cube1"></div>
      <div class="sk-cube sk-cube2"></div>
      <div class="sk-cube sk-cube3"></div>
      <div class="sk-cube sk-cube4"></div>
      <div class="sk-cube sk-cube5"></div>
      <div class="sk-cube sk-cube6"></div>
      <div class="sk-cube sk-cube7"></div>
      <div class="sk-cube sk-cube8"></div>
      <div class="sk-cube sk-cube9"></div>
    </div>
  </div>
</div>
<!-- END PAGE PRELOADER -->
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
      <a href="<?php echo ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, '', '', '', '') ?>">
        <img src="/plugins/intranet/template/img/logo.png" class="logo" alt="" width="106" height="21"/>
      </a>
      <!-- END LOGO -->
      <ul class="nav pull-right notifcation-center">
        <li class="dropdown hidden-xs hidden-sm">
          <a href="<?php echo ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, '', '', '', '') ?>" class="dropdown-toggle">
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
            <a href="#" class="" id="my-task-list" data-placement="bottom" data-content='' data-toggle="dropdown" data-original-title="Notifikace">
              <i class="material-icons">email</i>

                <?php
                if ($notifCount > 0) {
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('span', $notifCount, 'badge badge-important animated bounceIn');
                }
                ?>

            </a>
          </li>
        </ul>
      </div>
      <div id="notification-list" style="display:none">
        <div style="width:300px">

          <?php

          if (isset($ENVO_NOTIFICATION) && is_array($ENVO_NOTIFICATION)) {

            if ($notifCount > 0) {

              // EN: Start foreach loop on array at the second item - First item is info obout count of notifications
              // CZ: Spuštění foreach smyčky na pole u druhé položky - První položka je informace o počtu oznámení
              foreach (array_slice($ENVO_NOTIFICATION, 1)  as $en) {

                // Start - Notification
                echo '<div class="notification-messages ' . $en["type"] . '">';
                echo '<div class="message-wrapper">';
                // Start - Heading
                echo '<div class="heading">';
                echo '<a href="' . $en["parseurl"] . '">' . $en["name"] . '</a>';
                echo '</div>';
                // End - Heading
                // Start - Description
                echo '<div class="description">';
                echo $en["shortdescription"];
                echo '</div>';
                // End - Description
                // Start - Date
                echo '<div class="date pull-left">';
                echo $en["created"];
                echo '</div>';
                // End - Date
                echo '</div>';
                echo '<div class="clearfix"></div>';
                echo '</div>';
                // End - Notification

              }

            } else {
              // Start - Notification not exists
              echo '<div class="text-center padding-10">';
              echo 'Žádná notifikace k zobrazení';
              echo '</div>';
              // End - Notification not exists
            }

          }

          ?>

        </div>
      </div>
      <!-- END TOP NAVIGATION MENU -->
      <!-- BEGIN CHAT TOGGLER -->
      <div class="pull-right">
        <div class="chat-toggler sm">
          <div class="profile-pic">
            <img src="<?php echo '/' . basename(ENVO_FILES_DIRECTORY) . '/userfiles/' . $ENVO_USER_AVATAR; ?>" alt="" width="35" height="35"/>
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
                <a href="<?php echo ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, 'notification', '', '', ''); ?>"> Notifikace

                  <?php
                  if ($notifCount > 0) {
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('span', $notifCount, 'badge badge-important animated bounceIn');
                  }
                  ?>

                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="<?php echo $P_USR_LOGOUT; ?>"><i class="material-icons">power_settings_new</i>&nbsp;&nbsp;Odhlásit</a>
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
          <img src="<?php echo '/' . basename(ENVO_FILES_DIRECTORY) . '/userfiles/' . $ENVO_USER_AVATAR; ?>" alt="" width="69" height="69"/>
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

  <div class="footer-widget">
    <div class="text-center">
      <span>Intranet verze <?php echo get_pluginversion('Intranet'); ?></span>
    </div>
  </div>

  <!-- END SIDEBAR -->
  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content">
    <div class="content ">
      <!-- START PAGE -->