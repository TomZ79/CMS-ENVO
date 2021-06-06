<?php

switch ($section) {
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
      include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/sidebar.php';
    }

    echo '</div>';
    echo '</div>';
    echo '</section>';

    break;
  default:

}

?>

</div><!-- END MAIN CONTENT -->

<?php if ($ENVO_SHOW_FOOTER) {
  // Import templates below header
  if (isset($ENVO_HOOK_BELOW_FOOTER) && is_array($ENVO_HOOK_BELOW_FOOTER)) foreach ($ENVO_HOOK_BELOW_FOOTER as $bfooter) {
    include_once APP_PATH . $bfooter['phpcode'];
  }
} ?>

<?php if ($ENVO_SHOW_FOOTER && ENVO_ASACCESS) { ?>
  <!-- =========================
  START FOOTER SECTION
  ============================== -->
  <footer id="footer" class="color color-quaternary">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <div class="row">
            <?= $setting["footerblocktext1_porto_tpl"] ?>
          </div>
        </div>
        <div class="col-md-2">
          <h4><?= $setting["socialfooterText_porto_tpl"] ?></h4>
          <ul class="social-icons">

            <?php if ($setting["facebookfooterShow_porto_tpl"] == 1) { ?>
              <li class="social-icons-facebook">
                <a href="<?= $setting[" facebookfooterLinks_porto_tpl"]?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
              </li>
            <?php }
            if ($setting["twitterfooterShow_porto_tpl"] == 1) { ?>
              <li class="social-icons-twitter">
                <a href="<?= $setting["twitterfooterLinks_porto_tpl"] ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
              </li>
            <?php }
            if ($setting["googlefooterShow_porto_tpl"] == 1) { ?>
              <li class="social-icons-googleplus">
                <a href="<?= $setting["googlefooterLinks_porto_tpl"] ?>" target="_blank" title="Google Plus"><i class="fa fa-google"></i></a>
              </li>
            <?php }
            if ($setting["instagramfooterShow_porto_tpl"] == 1) { ?>
              <li class="social-icons-instagram">
                <a href="<?= $setting["instagramfooterLinks_porto_tpl"] ?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a>
              </li>
            <?php }
            if ($ENVO_RSS_DISPLAY) { ?>
              <li class="social-icons-rss">
                <a href="<?= $P_RSS_LINK ?>" target="_blank" title="RSS"><i class="fa fa-rss"></i></a>
              </li>
            <?php } ?>

          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="system-icons pull-right">
            <?php if ($apedit) { ?>
              <a class="btn btn-filled btn-primary btn-sm" href="<?= $apedit ?>" title="<?= $tl["button"]["btn1"] ?>">
                <?= $tl["button"]["btn1"] ?>
              </a>
              <?php if ($qapedit) { ?>
                <a class="btn btn-filled btn-primary btn-sm quickedit" href="<?= $qapedit ?>" title="<?= $tl["button"]["btn2"] ?>">
                  <?= $tl["button"]["btn2"] ?>
                </a>
              <?php }
            }
            if ($setting["printme"] && $printme) { ?>
              <a class="btn btn-filled btn-primary btn-sm" id="envoprint" href="#" title="<?= $tl["button"]["btn6"] ?>">
                <?= $tl["button"]["btn6"] ?>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-1">
            <a href="<?= BASE_URL ?>" class="logo">
              <img alt="<?= $tlporto["image_desc"]["imdesc"] . $setting["title"] ?>" class="img-responsive" src="<?= $setting["logo2_porto_tpl"] ?>">
            </a>
          </div>
          <div class="col-md-7">
            <p><?= $setting["copyright"] ?></p>
          </div>
          <div class="col-md-4">
            <nav id="sub-menu">
              <?= build_menu_porto(0, $mfooter, TRUE, $page, '', '', '', '', '', ENVO_ASACCESS) ?>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- =========================
  END FOOTER SECTION
  ============================== -->
<?php } else {
  if ($ENVO_SHOW_FOOTER) { ?>
    <!-- =========================
    START FOOTER SECTION
    ============================== -->
    <footer id="footer" class="color color-quaternary">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <div class="row">
              <?= $setting["footerblocktext1_porto_tpl"] ?>
            </div>
          </div>
          <div class="col-md-2">
            <h4><?= $setting["socialfooterText_porto_tpl"] ?></h4>
            <ul class="social-icons">

              <?php if ($setting["facebookfooterShow_porto_tpl"] == 1) { ?>
                <li class="social-icons-facebook">
                  <a href="<?= $setting["facebookfooterLinks_porto_tpl"] ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
                </li>
              <?php }
              if ($setting["twitterfooterShow_porto_tpl"] == 1) { ?>
                <li class="social-icons-twitter">
                  <a href="<?= $setting["twitterfooterLinks_porto_tpl"] ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
                </li>
              <?php }
              if ($setting["googlefooterShow_porto_tpl"] == 1) { ?>
                <li class="social-icons-googleplus">
                  <a href="<?= $setting["googlefooterLinks_porto_tpl"] ?>" target="_blank" title="Google Plus"><i class="fa fa-google"></i></a>
                </li>
              <?php }
              if ($setting["instagramfooterShow_porto_tpl"] == 1) { ?>
                <li class="social-icons-instagram">
                  <a href="<?= $setting["instagramfooterLinks_porto_tpl"] ?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a>
                </li>
              <?php }
              if ($ENVO_RSS_DISPLAY) { ?>
                <li class="social-icons-rss">
                  <a href="<?= $P_RSS_LINK ?>" target="_blank" title="RSS"><i class="fa fa-rss"></i></a>
                </li>
              <?php } ?>

            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="system-icons pull-right">
              <?php if ($apedit) { ?>
                <a class="btn btn-filled btn-primary btn-sm" href="<?= $apedit ?>" title="<?= $tl["button"]["btn1"] ?>">
                  <?= $tl["button"]["btn1"] ?>
                </a>
                <?php if ($qapedit) { ?>
                  <a class="btn btn-filled btn-primary btn-sm quickedit" href="<?= $qapedit ?>" title="<?= $tl["button"]["btn2"] ?>">
                    <?= $tl["button"]["btn2"] ?>
                  </a>
                <?php }
              }
              if ($setting["printme"] && $printme) { ?>
                <a class="btn btn-filled btn-primary btn-sm" id="envoprint" href="#" title="<?= $tl["button"]["btn6"] ?>">
                  <?= $tl["button"]["btn6"] ?>
                </a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-1">
              <a href="<?= BASE_URL ?>" class="logo">
                <img alt="<?= $tlporto["image_desc"]["imdesc"] . $setting["title"] ?>" class="img-responsive" src="<?= $setting["logo2_porto_tpl"] ?>">
              </a>
            </div>
            <div class="col-md-7">
              <p><?= $setting["copyright"] ?></p>
            </div>
            <div class="col-md-4">
              <nav id="sub-menu">
                <?= build_menu_porto(0, $mfooter, TRUE, $page, '', '', '', '', '', ENVO_ASACCESS) ?>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- =========================
    END FOOTER SECTION
    ============================== -->
  <?php }
}
if (!$ENVO_SHOW_FOOTER) { ?>

<?php } ?>

</div><!-- END BODY -->

<!-- End Document  ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/assets/plugins/jquery/jquery-2.2.4.min.js?=v2.2.4"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/plugins/jquery.appear/jquery.appear.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/plugins/jquery.easing/jquery.easing.min.js?=v1.3" async defer></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/plugins/jquery-cookie/jquery-cookie.min.js?=v1.4.1"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/plugins/bootstrap/js/bootstrap.min.js?=v3.3.7"></script>
<script src="/assets/plugins/bootstrap-notify/bootstrap-notify.min.js?=v3.1.5" async defer></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/plugins/common/common.min.js?=v5.7.2"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/plugins/jquery.validation/jquery.validation.min.js?=v1.16.0"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/plugins/jquery.lazyload/jquery.lazyload.min.js?=v1.9.7" async defer></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/plugins/isotope/jquery.isotope.min.js?=v3.0.3"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/plugins/owl.carousel/owl.carousel.min.js?=v2.1.6"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/plugins/magnific-popup/jquery.magnific-popup.min.js?=v1.1.0"></script>
<script src="/assets/plugins/revolution-slider/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
<script src="/assets/plugins/revolution-slider/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>

<!-- Theme Base, Components and Settings -->
<script src="/template/<?= ENVO_TEMPLATE ?>/js/theme.min.js"></script>

<!-- Theme Function -->
<script src="/template/<?= ENVO_TEMPLATE ?>/js/porto.custom.min.js"></script>
<script src="/assets/js/generated_js.php"></script>

<!-- Theme Initialization Files -->
<script src="/template/<?= ENVO_TEMPLATE ?>/js/theme.init.min.js"></script>

<!-- Revolutin Slider 5.0 Initialization -->
<script src="/template/<?= ENVO_TEMPLATE ?>/js/porto-revolutionSlider.js"></script>

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
    var items = $('.owl-carousel .item').size();
    if (items > 1) {
      $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: false,
        responsive: {
          0: {
            items: 1
          },
          768: {
            items: 3
          },
          960: {
            items: 4
          },
          1200: {
            items: 4
          },
          1920: {
            items: 6
          }
        }
      });
    } else {
      // same as above but with loop: false;
      $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 50,
        nav: false
      });
    }
  </script>
<?php } ?>

<!-- Notification -->
<?php if (isset($_SESSION)) { ?>

  <script>
    // Load script after page loading
    $(window).on("load", function () {
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
      if ($PAGE_PASSWORD && ENVO_ASACCESS) { ?>
      $.notify({icon: 'icon-info', message: '<?=$tl["notification"]["n5"]?>'}, {type: 'info', delay: 0});
      <?php }
      if ($setting["offline"] == 1 && ENVO_ASACCESS) { ?>
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


<!-- Porto Print script -->
<?php if ($setting["printme"]) { ?>
  <script src="/assets/js/envoprint.js?=<?= $setting["updatetime"] ?>"></script>

  <script>
    $(function () {

      $('#envoprint').on('click', function (e) {
        e.preventDefault();
        $('#printdiv').printThis({
          title: '<?=sprintf($tl["printpage"]["pp"], $setting["title"])?>',
          styles: ['template/porto/css/bootstrap-print-md.css']
        });
      });

    });
  </script>
<?php } ?>

<!-- Modal -->
<div class="modal fullscreen fade" id="ENVOModal" tabindex="-1" role="dialog" aria-labelledby="ENVOModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="ENVOModalLabel">&nbsp;</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?= $tl["global_text"]["gtxt5"] ?></button>
      </div>
    </div>
  </div>
</div>

<!-- Search box -->
<?php if (ENVO_SEARCH && ENVO_USER_SEARCH) { ?>

  <form action="<?= $P_SEAERCH_LINK ?>" id="search-inner" method="POST">
    <div class="input-data ">
      <div class="container">
        <input class="search-box" type="text" name="envoSH" id="search-box" placeholder="<?php echo $tl["placeholder"]["plc"];
        if ($setting["fulltextsearch"]) echo $tl["placeholder"]["plc1"]; ?>">
      </div>
    </div>
    <button type="button" id="close" class="close-searchbutton"></button>
  </form>

<?php } ?>

<!-- Search script -->
<?php if ($setting["ajaxsearch"] && $AJAX_SEARCH_PLUGIN_URL) { ?>
  <script>
    $(document).ready(function () {

      $('#ajaxsearchForm').ajaxSearch({
        apiURL: '<?=BASE_URL . $AJAX_SEARCH_PLUGIN_URL?>',
        msg: '<?=$tl["searching"]["stxt12"]?>',
        seo: <?=$AJAX_SEARCH_PLUGIN_SEO?>});

      $('#Jajaxs').alphanumeric({nocaps: false, allow: ' +*'});
      $('.hideAdvSearchResult').fadeIn();

    });
  </script>
<?php } ?>

<!-- EU Cookies -->
<?php if ($setting["eucookie_enabled"] == 1) {
  include APP_PATH . '/assets/js/eu-cookies.php';
} ?>

<!-- Facebook SDK connection -->
<?php if (isset($ENVO_FACEBOOK_SDK_CONNECTION)) echo $ENVO_FACEBOOK_SDK_CONNECTION; ?>

<!-- Download plugins -->
<?php if (defined('ENVO_PLUGIN_DOWNLOAD')) {
  $pluginsite_template = 'template/' . ENVO_TEMPLATE . '/plugintemplate/download/downloadfile.php';

  if (file_exists($pluginsite_template)) {
    include APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/download/js/script.download.php';
  } else {
    include APP_PATH . 'plugins/download/js/script.download.php';
  }

} ?>

<!-- RegisterForm plugins -->
<?php if (defined('ENVO_PLUGIN_REGISTER_FORM') && $page == $PLUGIN_RF_CAT["varname"]) {
  $pluginsite_template = 'template/' . ENVO_TEMPLATE . '/plugintemplate/register_form/js/script.registerform.php';

  if (file_exists($pluginsite_template)) {
    include APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/register_form/js/script.registerform.php';
  } else {
    include APP_PATH . 'plugins/register_form/js/script.registerform.php';
  }

  ?>
<?php } ?>

<!-- Login Page -->
<script>
  $(document).ready(function () {

    $(".forgotP").hide();
    // Switch buttons from "Log In | Register" to "Close Panel" on click
    $(".lost-pwd").click(function (e) {
      e.preventDefault();
      $(".loginF").slideToggle();
      $(".forgotP").slideToggle();
    });

    <?php if ($errorfp) { ?>
    $(".loginF").hide();
    $(".forgotP").show();
    <?php } ?>

  });
</script>

</body>
</html>