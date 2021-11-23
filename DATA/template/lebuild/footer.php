<?php

switch ($section) {
  case 'A':

    break;
  case 'B':

    echo '</div>';

    // Sidebar if right
    if (!empty($ENVO_HOOK_SIDE_GRID) && $setting["sidebar_location_tpl"] == "right") {
      include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/sidebar.php';
    }

    echo '</div>';
    echo '</div>';
    echo '</div>';

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

<?php if ($ENVO_SHOW_FOOTER && ENVO_ACCESS) { ?>
  <!-- =========================
  START FOOTER SECTION
  ============================== -->
  <footer class="site-footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-6 footer-col-4">
            <div class="widget widget_about">
              <div class="logo-footer"><img src="<?= $setting["FoLogo1Carzone_tpl"] ?>" alt=""></div>
              <p class="m-tb20 text-center">
                Provoz webu a eshopu zajišťuje firma <a href="https://www.bluesat.cz" class="primary-link" target="_blank">Bluesat s.r.o.</a> .
              </p>
              <ul class="dlab-contact-info">
                <li><i class="fa fa-map-marker"></i><strong>Adresa</strong> <br> Karlovy Vary 36005</li>
                <li><i class="fa fa-phone"></i><strong>Telefon</strong> <br> +420 777 192 315</li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-6 footer-col-4">
            <div class="widget widget_services">
              <h4 class="m-b15 text-uppercase">Odkazy</h4>
              <div class="dlab-separator bg-primary"></div>
              <ul>
                <li><a href="#">Links 1</a></li>
                <li><a href="#">Links 2</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-6 footer-col-4">
            <div class="widget widget_services">
              <h4 class="m-b15 text-uppercase">Odkazy</h4>
              <div class="dlab-separator bg-primary"></div>
              <ul>
                <li><a href="#">Links 1</a></li>
                <li><a href="#">Links 2</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-6 footer-col-4">
            <div class="widget ">
              <h4 class="m-b15 text-uppercase"><?= $tlcarzone["global_text"]["gt"] ?></h4>
              <div class="dlab-separator bg-primary"></div>
              <p class="m-tb20"><?= $tlcarzone["global_text"]["gt1"] ?></p>
              <form class="dlab-subscribe-form">
                <div class="input-group m-b15">
                  <input name="dzEmail" required="" class="form-control " type="email" placeholder="<?= $tlcarzone["global_text"]["gt2"] ?>">
                </div>
                <div class="input-group">
                  <button name="submit" type="submit" value="Submit" class="site-button btn-block">
                    <?= $tlcarzone["global_text"]["gt3"] ?><i class="fa fa-angle-right font-18 m-l10"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="clearfix">
          <ul class="full-social-icon clearfix">

            <?php if ($setting["facebookFoShow_carzone_tpl"] == 1) { ?>
              <li class="fb col-md-3 col-sm-6 col-xs-6 m-b30">
                <a href="<?= $setting["facebookFoLinks_carzone_tpl"] ?>" target="_blank"><i class="fa fa-facebook"></i> Share On Facebook </a>
              </li>
            <?php } if ($setting["youtubeFoShow_carzone_tpl"] == 1) { ?>
              <li class="fb col-md-3 col-sm-6 col-xs-6 m-b30">
                <a href="<?= $setting["youtubeFoLinks_carzone_tpl"] ?>" target="_blank"><i class="fa fa-youtube-square"></i> Share On Youtube </a>
              </li>
            <?php }
            if ($setting["twitterFoShow_carzone_tpl"] == 1) { ?>
              <li class="tw col-md-3 col-sm-6 col-xs-6 m-b30">
                <a href="<?= $setting["twitterFoLinks_carzone_tpl"] ?>" target="_blank"><i class="fa fa-twitter"></i> Tweet About it </a>
              </li>
            <?php }
            if ($setting["googleFoShow_carzone_tpl"] == 1) { ?>
              <li class="gplus col-md-3 col-sm-6 col-xs-6 m-b30">
                <a href="<?= $setting["googleFoLinks_carzone_tpl"] ?>" target="_blank"><i class="fa fa-google"></i> Google Plus </a>
              </li>
            <?php }
            if ($setting["linkedinFoShow_carzone_tpl"] == 1) { ?>
              <li class="linkd col-md-3 col-sm-6 col-xs-6 m-b30">
                <a href="<?= $setting["linkedinFoLinks_carzone_tpl"] ?>" target="_blank"><i class="fa fa-linkedin"></i> Linkedin </a>
              </li>
            <?php } ?>

          </ul>
        </div>
      </div>
    </div>
    <!-- footer bottom part -->
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 text-left"><?= $setting["copyright"] ?></div>
          <div class="col-md-6 col-sm-6 text-right ">

            <?= build_fmenu_lebuild(0, $mfooter, $page) ?>

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
    <footer class="site-footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6 footer-col-4">
              <div class="widget widget_about">
                <div class="logo-footer"><img src="<?= $setting["FoLogo1Carzone_tpl"] ?>" alt=""></div>
                <p class="m-tb20 text-center">
                  Provoz webu a eshopu zajišťuje firma <a href="https://www.bluesat.cz" class="primary-link" target="_blank">Bluesat s.r.o.</a> .
                </p>
                <ul class="dlab-contact-info">
                  <li><i class="fa fa-map-marker"></i><strong>Adresa</strong> <br> Karlovy Vary 36005</li>
                  <li><i class="fa fa-phone"></i><strong>Telefon</strong> <br> +420 777 192 315</li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 footer-col-4">
              <div class="widget widget_services">
                <h4 class="m-b15 text-uppercase">Odkazy</h4>
                <div class="dlab-separator bg-primary"></div>
                <ul>
                  <li><a href="#">Links 1</a></li>
                  <li><a href="#">Links 2</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 footer-col-4">
              <div class="widget widget_services">
                <h4 class="m-b15 text-uppercase">Odkazy</h4>
                <div class="dlab-separator bg-primary"></div>
                <ul>
                  <li><a href="#">Links 1</a></li>
                  <li><a href="#">Links 2</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 footer-col-4">
              <div class="widget ">
                <h4 class="m-b15 text-uppercase"><?= $tlcarzone["global_text"]["gt"] ?></h4>
                <div class="dlab-separator bg-primary"></div>
                <p class="m-tb20"><?= $tlcarzone["global_text"]["gt1"] ?></p>
                <form class="dlab-subscribe-form">
                  <div class="input-group m-b15">
                    <input name="dzEmail" required="" class="form-control " type="email" placeholder="<?= $tlcarzone["global_text"]["gt2"] ?>">
                  </div>
                  <div class="input-group">
                    <button name="submit" type="submit" value="Submit" class="site-button btn-block">
                      <?= $tlcarzone["global_text"]["gt3"] ?><i class="fa fa-angle-right font-18 m-l10"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="clearfix">
            <ul class="full-social-icon clearfix">

              <?php if ($setting["facebookFoShow_carzone_tpl"] == 1) { ?>
                <li class="fb col-md-3 col-sm-6 col-xs-6 m-b30">
                  <a href="<?= $setting["facebookFoLinks_carzone_tpl"] ?>" target="_blank"><i class="fa fa-facebook"></i> Share On Facebook </a>
                </li>
              <?php }
              if ($setting["twitterFoShow_carzone_tpl"] == 1) { ?>
                <li class="tw col-md-3 col-sm-6 col-xs-6 m-b30">
                  <a href="<?= $setting["twitterFoLinks_carzone_tpl"] ?>" target="_blank"><i class="fa fa-twitter"></i> Tweet About it </a>
                </li>
              <?php }
              if ($setting["googleFoShow_carzone_tpl"] == 1) { ?>
                <li class="gplus col-md-3 col-sm-6 col-xs-6 m-b30">
                  <a href="<?= $setting["googleFoLinks_carzone_tpl"] ?>" target="_blank"><i class="fa fa-google"></i> Google Plus </a>
                </li>
              <?php }
              if ($setting["linkedinFoShow_carzone_tpl"] == 1) { ?>
                <li class="linkd col-md-3 col-sm-6 col-xs-6 m-b30">
                  <a href="<?= $setting["linkedinFoLinks_carzone_tpl"] ?>" target="_blank"><i class="fa fa-linkedin"></i> Linkedin </a>
                </li>
              <?php } ?>

            </ul>
          </div>
        </div>
      </div>
      <!-- footer bottom part -->
      <div class="footer-bottom">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-6 text-left"><?= $setting["copyright"] ?></div>
            <div class="col-md-6 col-sm-6 text-right ">

              <?= build_fmenu_lebuild(0, $mfooter, $page) ?>

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

<button class="scroltop fa fa-chevron-up"></button><!-- SCROLLTOTOP BUTTON -->

</div><!-- END PAGE WRAPPER -->

<!-- End Document  ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/aos.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/appear.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/bootstrap-select.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/isotope.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.bxslider.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.countdown.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.countTo.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.easing.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.enllax.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.fancybox.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.paroller.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery-ui.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/knob.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/map-script.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/owl.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/pagenav.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/parallax.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/scrollbar.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/slick.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/timePicker.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/validation.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/wow.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/TweenMax.min.js"></script>

<!-- Theme Function -->
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/custom.js"></script>
<script src="/assets/js/generated_js.php"></script>
<script>
  jQuery(document).ready(function () {
    'use strict';
    dz_rev_slider_1();
  });
  /*ready*/
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
      if ($PAGE_PASSWORD && ENVO_ACCESS) { ?>
      $.notify({icon: 'icon-info', message: '<?=$tl["notification"]["n5"]?>'}, {type: 'info', delay: 0});
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