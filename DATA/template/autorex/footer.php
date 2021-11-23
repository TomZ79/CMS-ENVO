<?php

switch ($section) {
  case 'DEFAULT':

    break;
  case 'A':

    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</section>';

    break;
  case 'B':

    echo '</div>';

    // Sidebar if right
    if (!empty($ENVO_HOOK_SIDE_GRID) && $setting["sidebar_location_tpl"] == "right") {
      echo '<div class="col-sm-3 sidebar-side' . ($ENVO_HOOK_SIDE_GRID && $setting["sidebar_location_tpl"] == "left" ? 'sidebar-left' : 'sidebar-right') . '">';
      include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/sidebar.php';
      echo '</div>';
    }

    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</section>';

    break;
  default:

}

?>

<?php if ($ENVO_SHOW_FOOTER) {
  // Import templates below header
  if (isset($ENVO_HOOK_BELOW_FOOTER) && is_array($ENVO_HOOK_BELOW_FOOTER)) foreach ($ENVO_HOOK_BELOW_FOOTER as $bfooter) {
    include_once APP_PATH . $bfooter['phpcode'];
  }
} ?>

</div>
<!-- END MAIN CONTENT -->

<?php if ($ENVO_SHOW_FOOTER && ENVO_ACCESS) { ?>
  <!-- START FOOTER SECTION -->
  <footer class="main-footer">
    <!--Upper Box-->
    <div class="upper-box">
      <div class="auto-container">
        <div class="row no-gutters">

          <?php
          // Upper Box
          if ($setting["ShowFooterUpper_autorex_tpl"] == '1') {
            echo $setting["FooterUpper_autorex_tpl"];
          }
          ?>

        </div>
      </div>
    </div>

    <!--Widgets Section-->
    <div class="widgets-section">
      <div class="auto-container">
        <div class="widgets-inner-container">
          <div class="row clearfix">

            <?php
            // Footer Column 1
            if ($setting["ShowFooterBox1_autorex_tpl"] == '1') {
              echo $setting["FooterBox1_autorex_tpl"];
            }

            // Footer Column 2
            if ($setting["ShowFooterBox2_autorex_tpl"] == '1') {
              echo $setting["FooterBox2_autorex_tpl"];
            }

            // Footer Column 3
            if ($setting["ShowFooterBox3_autorex_tpl"] == '1') {
              echo $setting["FooterBox3_autorex_tpl"];
            }
            ?>

          </div>
          <div class="row">
            <div class="col">
              <ul class="system-icon float-right mr-5">
                <?php
                // System CMS anchor
                if ($apedit) {
                  echo '<li><a class="theme-btn btn-style-one btn-sm" href="' . $apedit . '" title="' . $tl["button"]["btn1"] . '" style="background-color:#EC7A09">' . $tl["button"]["btn1"] . '</a></li>';

                  if ($qapedit) {
                    echo '<li><a class="theme-btn btn-style-one btn-sm quickedit" href="' . $qapedit . '" title="' . $tl["button"]["btn2"] . '" style="background-color:#EC7A09">' . $tl["button"]["btn2"] . '</a></li>';
                  }
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Footer Bottom-->
    <div class="auto-container">
      <div class="footer-bottom">
        <div class="copyright-text"><?= $setting["copyright"] ?></div>
        <div class="text">
          <ul class="footer-links">

            <?php

            // Show links for Sitemap Plugin
            // Check if plugin exist throught PluginID
            if (defined('ENVO_PLUGIN_ID_SITEMAP') && is_numeric(ENVO_PLUGIN_ID_SITEMAP) && (ENVO_PLUGIN_ID_SITEMAP > 0)) {
              echo '<li><a href="/' . $PLUGIN_SM_CAT["varname"] . '">' . $PLUGIN_SM_CAT["name"] . '</a></li>';
            }

            // TODO: Vylepšit práci s pluginem REGISTER FORM

            // Show links for Register Form Plugin
            // Check if plugin exist throught PluginID
            if (defined('ENVO_PLUGIN_ID_REGISTER_FORM') && is_numeric(ENVO_PLUGIN_ID_REGISTER_FORM) && (ENVO_PLUGIN_ID_REGISTER_FORM > 0)) {
              echo '<li><a href="/' . $PLUGIN_RF_CAT["varname"] . '">' . $PLUGIN_RF_CAT["name"] . '</a></li>';
            }

            // Show links for login/logout
            echo '<li><a href="' . $P_USR_LOGOUT . '" id="logout">' . sprintf($tlautorex["header_text"]["ht2"], $envouser->getVar("username")) . '</a></li>';

            // Admin AKP
            if (ENVO_ACCESS) {
              echo '<li><a href="' . BASE_URL . 'admin/">' . $tlautorex["header_text"]["ht3"] . '</a></li>';
            }

            ?>

          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- END FOOTER SECTION -->

<?php } else {
  if ($ENVO_SHOW_FOOTER) { ?>
    <!-- START FOOTER SECTION -->
    <footer class="main-footer">
      <!--Upper Box-->
      <div class="upper-box">
        <div class="auto-container">
          <div class="row no-gutters">

            <?php
            // Upper Box
            if ($setting["ShowFooterUpper_autorex_tpl"] == '1') {
              echo $setting["FooterUpper_autorex_tpl"];
            }
            ?>

          </div>
        </div>
      </div>

      <!--Widgets Section-->
      <div class="widgets-section">
        <div class="auto-container">
          <div class="widgets-inner-container">
            <div class="row clearfix">

              <?php
              // Footer Column 1
              if ($setting["ShowFooterBox1_autorex_tpl"] == '1') {
                echo $setting["FooterBox1_autorex_tpl"];
              }

              // Footer Column 2
              if ($setting["ShowFooterBox2_autorex_tpl"] == '1') {
                echo $setting["FooterBox2_autorex_tpl"];
              }

              // Footer Column 3
              if ($setting["ShowFooterBox3_autorex_tpl"] == '1') {
                echo $setting["FooterBox3_autorex_tpl"];
              }
              ?>

            </div>
          </div>
        </div>
      </div>

      <!--Footer Bottom-->
      <div class="auto-container">
        <div class="footer-bottom">
          <div class="copyright-text"><?= $setting["copyright"] ?></div>
          <div class="text">
            <ul class="footer-links">

              <?php

              if (!ENVO_USERID) {

                // Show links for Sitemap Plugin
                // Check if plugin exist throught PluginID
                if (defined('ENVO_PLUGIN_ID_SITEMAP') && is_numeric(ENVO_PLUGIN_ID_SITEMAP) && (ENVO_PLUGIN_ID_SITEMAP > 0)) {
                  echo '<li><a href="/' . $PLUGIN_SM_CAT["varname"] . '">' . $PLUGIN_SM_CAT["name"] . '</a></li>';
                }

                // Show links for login/logout
                echo '<li><a href="/login" id="login">' . $tlautorex["header_text"]["ht1"] . '</a></li>';

              }

              ?>

            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- END FOOTER SECTION -->

  <?php }
}
if (!$ENVO_SHOW_FOOTER) { ?>

<?php } ?>

</div><!-- END BODY -->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-upwards-arrow"></span></div>

<!-- End Document  ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Necessary main scripts  -->
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.js"></script>
<script src="/assets/plugins/bootstrap-notify/bootstrap-notify.min.js?=v3.1.5"></script>
<!-- Theme script -->
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/bootstrap.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/bootstrap-select.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/owl.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/appear.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/wow.min.js"></script>

<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/lazyload.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/scrollbar.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/TweenMax.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/swiper.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.ajaxchimp.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/parallax-scroll.js"></script>

<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.alphanum.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/script.min.js"></script>

<!-- Theme Function -->
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/theme.custom.js"></script>
<script src="/assets/js/generated_js.php"></script>
<script>
  envoWeb.envo_forgotlogin = '<?= $FORGOT_LOGIN?>';
</script>

<?php
// Hook footer code
if (isset($ENVO_HOOK_FOOTER_END) && is_array($ENVO_HOOK_FOOTER_END)) foreach ($ENVO_HOOK_FOOTER_END as $hfootere) {
  include_once APP_PATH . $hfootere['phpcode'];
}

// Javascript for page - FOOTER
if (isset($ENVO_FOOTER_JAVASCRIPT)) echo $ENVO_FOOTER_JAVASCRIPT;

// Social Buttons Script
if ($SHOWSOCIALBUTTON) {
  include APP_PATH . 'template/' . ENVO_TEMPLATE . '/socialbutton.php';
}
?>

<?php if (isset($ENVO_NEWS_IN_CONTENT) && is_array($ENVO_NEWS_IN_CONTENT)) { ?>
  <!-- News in OWL Carousel -->
  <script>
    // Be more specific with your selector if .items is used elsewhere on the page.
    var items = $('.owl-carousel .item').length;
    if (items > 1) {
      $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 30,
        nav: true,
        dots: false,
        navText: [],
        responsive: {
          0: {
            items: 1
          },
          768: {
            items: 3
          },
          960: {
            items: 3
          },
          1200: {
            items: 3
          },
          1920: {
            items: 3
          }
        }
      });
    } else {
      // same as above but with loop: false;
      $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 50,
        nav: true,
        dots: false
      });
    }
  </script>
<?php } ?>

<!-- Notification -->
<?php if (isset($_SESSION)) { ?>

  <script>
    // Load script after page loading
    $(window).on("load", function () {
      $.notifyDefaults({
        delay: 2000,
        timer: 5000,
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert" style="border-radius: 0;">' +
          '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
          '<span data-notify="icon"></span> ' +
          '<span data-notify="title" style="display: block;font-weight: bold;">{1}</span> ' +
          '<span data-notify="message">{2}</span>' +
          '</div>' +
          '</div>'
      });

      <?php if (isset($_SESSION["infomsg"])) { ?>
      $.notify({icon: 'icon-info', message: '<?=$_SESSION["infomsg"]?>'}, {type: 'info'});
      <?php }
      if (isset($_SESSION["successmsg"])) { ?>
      $.notify({icon: 'icon-check', message: '<?=$_SESSION["successmsg"]?>'}, {type: 'success'});
      <?php }
      if (isset($_SESSION["errormsg"])) { ?>
      $.notify({icon: 'icon-attention', message: '<?=$_SESSION["errormsg"]?>'}, {type: 'danger'});
      <?php }
      if (isset($_SESSION["warningmsg"])) { ?>
      $.notify({icon: '', message: '<?=$_SESSION["warningmsg"]?>'}, {type: 'warning'});
      <?php }
      if ($errorpp) { ?>
      $.notify({icon: 'icon-attention', message: '<?=$errorpp["e"]?>'}, {type: 'danger'});
      <?php }
      if ($PAGE_PASSWORD && ENVO_ACCESS) { ?>
      $.notify({icon: 'icon-info', message: '<?=$tl["notification"]["n5"]?>'}, {type: 'info'});
      <?php }
      if ($setting["offline"] == 1 && ENVO_ACCESS) { ?>
      $.notify({
        // Options
        icon: 'icon-flash',
        message: '<?=$tl["notification"]["n1"]?>'
      }, {
        // Settings
        type: 'offline',
        timer: 0,
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
          '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
          '<span data-notify="icon"></span> ' +
          '<span data-notify="title" style="display: block;font-weight: bold;">{1}</span> ' +
          '<span data-notify="message">{2}</span>' +
          '</div>' +
          '</div>'
      });

      <?php } ?>
    });
  </script>

<?php } ?>

<!-- Modal -->
<div class="modal fullscreen fade" id="ENVOModal" tabindex="-1" role="dialog" aria-labelledby="ENVOModal"
    aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="ENVOModalLabel"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
        </button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal"><?= $tl["global_text"]["gtxt5"] ?></button>
      </div>
    </div>
  </div>
</div>

<!-- EU Cookies -->
<?php if ($setting["eucookie_enabled"] == 1) {
  include APP_PATH . '/assets/js/eu-cookies.php';
} ?>

<!-- Facebook SDK connection -->
<?php if (isset($ENVO_FACEBOOK_SDK_CONNECTION)) echo $ENVO_FACEBOOK_SDK_CONNECTION; ?>

<!-- RegisterForm plugins -->
<?php if (defined('ENVO_PLUGIN_REGISTER_FORM') && $page == $PLUGIN_RF_CAT["varname"]) {
  $pluginsite_template = 'template/' . ENVO_TEMPLATE . '/plugintemplate/register_form/js/script.registerform.php';

  if (file_exists($pluginsite_template)) {
    include APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/register_form/js/script.registerform.php';
  } else {
    include APP_PATH . 'plugins/register_form/js/script.registerform.php';
  }
} ?>

</body></html>