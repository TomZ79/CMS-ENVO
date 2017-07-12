<?php

/* GRID SYSTEM FOR DIFFERENT PAGE - show main section without sidebar - END TAG */

if ((empty($JAK_HOOK_SIDE_GRID) && (!empty($page)) && (!$PAGE_PASSWORD)) &&
  ($page != 'offline') &&
  ($page != '404') &&
  ($jkv["searchform"]) ||
  (empty($JAK_HOOK_SIDE_GRID) && $PAGE_PASSWORD && $PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID]) ||
  (empty($JAK_HOOK_SIDE_GRID) && $PAGE_PASSWORD && JAK_ASACCESS)
) {
  ?>
  </div>
  </div>
  </section>
<?php } ?>

<?php

/* GRID SYSTEM FOR DIFFERENT PAGE - show main section with sidebar - END TAG */

if ((!empty($JAK_HOOK_SIDE_GRID) && $PAGE_PASSWORD && $PAGE_PASSWORD == $_SESSION['pagesecurehash' . $PAGE_ID]) ||
  (!empty($JAK_HOOK_SIDE_GRID) && !$PAGE_PASSWORD) ||
  (!empty($JAK_HOOK_SIDE_GRID) && $PAGE_PASSWORD && JAK_ASACCESS) ||
  (!empty($JAK_HOOK_SIDE_GRID) && !empty($page) && !$PAGE_PASSWORD)
) {
  ?>
  </div>

  <!-- Sidebar if right -->
  <?php if (!empty($JAK_HOOK_SIDE_GRID) && $jkv["sidebar_location_tpl"] == "right") {
    include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/sidebar.php';
  } ?>

  </div>
  </div>
  </section>
<?php } ?>

<?php if ($JAK_SHOW_FOOTER) {
  // Import templates below header
  if (isset($JAK_HOOK_BELOW_CONTENT) && is_array($JAK_HOOK_BELOW_CONTENT)) foreach ($JAK_HOOK_BELOW_CONTENT as $bcontent) {
    include_once APP_PATH . $bcontent['phpcode'];
  }
} ?>

<?php if ($JAK_SHOW_FOOTER && JAK_ASACCESS) { ?>
  <!-- =========================
  START FOOTER SECTION
  ============================== -->
  <section class="footer-area">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php echo $jkv["footerblocktext1_metrics_tpl"]; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-main-content footer-1-main-content">
      <div class="container">
        <div class="row">
          <div class=" col-sm-6 col-md-3">
            <div class="footer-main-content-inner footer-first-content">
              <a href="<?php echo BASE_URL; ?>"><img src="<?php echo $jkv["logo2_metrics_tpl"]; ?>" alt=""/></a>
              <p><?php echo $jkv["socialfooterText_metrics_tpl"]; ?></p>
              <div class="footer-social-box">
                <ul>
                  <?php if ($jkv["facebookfooterShow_metrics_tpl"] == 1) { ?>
                    <li>
                      <a href="<?php echo $jkv["facebookfooterLinks_metrics_tpl"]; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                  <?php }
                  if ($jkv["twitterfooterShow_metrics_tpl"] == 1) { ?>
                    <li>
                      <a href="<?php echo $jkv["twitterfooterLinks_metrics_tpl"]; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                  <?php }
                  if ($jkv["googlefooterShow_metrics_tpl"] == 1) { ?>
                    <li>
                      <a href="<?php echo $jkv["googlefooterLinks_metrics_tpl"]; ?>" target="_blank"><i class="fa fa-google"></i></a>
                    </li>
                  <?php }
                  if ($jkv["instagramfooterShow_metrics_tpl"] == 1) { ?>
                    <li>
                      <a href="<?php echo $jkv["instagramfooterLinks_metrics_tpl"]; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                    </li>
                  <?php }
                  if ($JAK_RSS_DISPLAY) { ?>
                    <li>
                      <a href="<?php echo $P_RSS_LINK; ?>" target="_blank"><i class="fa fa-rss"></i></a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
          <div class=" col-sm-6 col-md-9">
            <?php echo $jkv["footerblocktext2_metrics_tpl"]; ?>
          </div>
        </div>
        <div class="system-icons pull-right">
          <?php if ($apedit) { ?>
            <a class="btn btn-filled btn-primary btn-sm" href="<?php echo $apedit; ?>" title="<?php echo $tl["button"]["btn1"]; ?>">
              <?php echo $tl["button"]["btn1"]; ?>
            </a>
            <?php if ($qapedit) { ?>
              <a class="btn btn-filled btn-primary btn-sm quickedit" href="<?php echo $qapedit; ?>" title="<?php echo $tl["button"]["btn2"]; ?>">
                <?php echo $tl["button"]["btn2"]; ?>
              </a>
            <?php }
          }
          if ($jkv["printme"] && $printme) { ?>
            <a class="btn btn-filled btn-primary btn-sm" id="jakprint" href="#" title="<?php echo $tl["button"]["btn6"]; ?>">
              <?php echo $tl["button"]["btn6"]; ?>
            </a>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="footer-bottom-content clearfix">
              <div class="col-sm-6 col-md-6 no-padding-left">
                <div class="footer-bottom-left">
                  <?php echo build_menu_metrics(0, $mfooter, TRUE, $page, 'footer-list-style', '', '', '', '', JAK_ASACCESS); ?>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 no-padding-right">
                <div class="footer-bottom-right">
                  <p><?php echo $jkv["copyright"]; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- =========================
  END FOOTER SECTION
  ============================== -->
<?php } else {
  if ($JAK_SHOW_FOOTER) { ?>
    <!-- =========================
    START FOOTER SECTION
    ============================== -->
    <section class="footer-area">
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <?php echo $jkv["footerblocktext1_metrics_tpl"]; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-main-content footer-1-main-content">
        <div class="container">
          <div class="row">
            <div class=" col-sm-6 col-md-3">
              <div class="footer-main-content-inner footer-first-content">
                <a href="<?php echo BASE_URL; ?>"><img src="<?php echo $jkv["logo2_metrics_tpl"]; ?>" alt=""/></a>
                <p><?php echo $jkv["socialfooterText_metrics_tpl"]; ?></p>
                <div class="footer-social-box">
                  <ul>
                    <?php if ($jkv["facebookfooterShow_metrics_tpl"] == 1) { ?>
                      <li class="facebook">
                        <a href="<?php echo $jkv["facebookfooterLinks_metrics_tpl"]; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                      </li>
                    <?php }
                    if ($jkv["twitterfooterShow_metrics_tpl"] == 1) { ?>
                      <li class="twitter">
                        <a href="<?php echo $jkv["twitterfooterLinks_metrics_tpl"]; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                      </li>
                    <?php }
                    if ($jkv["googlefooterShow_metrics_tpl"] == 1) { ?>
                      <li class="google">
                        <a href="<?php echo $jkv["googlefooterLinks_metrics_tpl"]; ?>" target="_blank"><i class="fa fa-google"></i></a>
                      </li>
                    <?php }
                    if ($jkv["instagramfooterShow_metrics_tpl"] == 1) { ?>
                      <li class="instagram">
                        <a href="<?php echo $jkv["instagramfooterLinks_metrics_tpl"]; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                      </li>
                    <?php }
                    if ($JAK_RSS_DISPLAY) { ?>
                      <li class="rss">
                        <a href="<?php echo $P_RSS_LINK; ?>" target="_blank"><i class="fa fa-rss"></i></a>
                      </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
            <div class=" col-sm-6 col-md-9">
              <?php echo $jkv["footerblocktext2_metrics_tpl"]; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="footer-bottom-content clearfix">
                <div class="col-sm-6 col-md-6 no-padding-left">
                  <div class="footer-bottom-left">
                    <?php echo build_menu_metrics(0, $mfooter, TRUE, $page, 'footer-list-style', '', '', '', '', JAK_ASACCESS); ?>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 no-padding-right">
                  <div class="footer-bottom-right">
                    <p><?php echo $jkv["copyright"]; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- =========================
    END FOOTER SECTION
    ============================== -->
  <?php }
}
if (!$JAK_SHOW_FOOTER) { ?>

<?php } ?>

<!-- End Document  ================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="/assets/plugins/jquery/jquery-1.11.3.min.js"></script>
<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js-plugins/jquery-ui/jquery-ui-1.11.4.js"></script>
<script src="/assets/plugins/bootstrapv3/js/bootstrap.min.js"></script>
<script src="/assets/plugins/bootstap-notify/bootstrap-notify.min.js"></script>
<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/menuzord.js"></script>

<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js-plugins/revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js-plugins/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js-plugins/owl-carousel/js/owl.carousel.min.js"></script>
<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/jquery.counterup.js"></script>
<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/waypoints.min.js"></script>
<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/countdown.js"></script>
<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/jquery.bootFolio.js"></script>
<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/jquery.magnific-popup.js"></script>
<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/jquery.bxslider.js"></script>
<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/smoothscroll.js"></script>
<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/wow.js"></script>

<!-- Metrics framework script -->
<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/main.js"></script>

<!-- Metrics Custom script -->
<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/metrics-custom.js"></script>

<!-- Definition Function and Notification -->
<script>
  envoWeb.envo_lang = "<?php echo $site_language;?>";
  envoWeb.envo_url = "<?php echo BASE_URL;?>";
  envoWeb.envo_url_orig = "<?php echo BASE_URL;?>";
  envoWeb.envo_search_link = "<?php echo $JAK_SEARCH_LINK;?>";
  envoWeb.request_uri = "<?php echo JAK_PARSE_REQUEST;?>";
  envoWeb.envo_quickedit = "<?php echo $tl["global_text"]["gtxt6"];?>"
</script>

<!-- Revolutin Slider 5.0 Initialization -->
<?php
include_once APP_PATH . '/template/' . ENVO_TEMPLATE . '/js/metrics-revolutionSlider.php'
?>

<!-- Comments Script -->
<?php if ($JAK_COMMENT_FORM) { ?>
  <script>
    <?php if ($jkv["hvm"]) { ?>
    jQuery(document).ready(function () {
      jQuery(".cFrom").append('<input type="hidden" name="<?php echo $random_name;?>" value="<?php echo $random_value;?>" />');
    });
    <?php } ?>
    envoWeb.envo_submit = "<?php echo $tl['form_text']['formt1'];?>";
    envoWeb.envo_submitwait = "<?php echo $tl['form_text']['formt2'];?>";
  </script>

  <script src="/assets/js/post.js"></script>
  <script src="/assets/plugins/tinymce/tinymce.min.js"></script>
  <script src="/assets/js/usreditor.js"></script>
<?php } ?>

<?php
if (isset($JAK_HOOK_FOOTER_END) && is_array($JAK_HOOK_FOOTER_END)) foreach ($JAK_HOOK_FOOTER_END as $hfootere) {
  include_once APP_PATH . $hfootere['phpcode'];
}

// Analytics code
if (isset($jkv["analytics"])) echo $jkv["analytics"];

// Javascript for page - FOOTER
if (isset($JAK_FOOTER_JAVASCRIPT)) echo $JAK_FOOTER_JAVASCRIPT;
?>

<!-- Social Buttons Script -->
<?php if ($SHOWSOCIALBUTTON) {
  include APP_PATH . 'template/' . ENVO_TEMPLATE . '/socialbutton.php';
} ?>

<?php if (isset($JAK_NEWS_IN_CONTENT) && is_array($JAK_NEWS_IN_CONTENT)) { ?>
  <!-- News in OWL Carousel -->
  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 50,
      nav: false,
      responsive: {
        0: {
          items: 1
        },
        479: {
          items: 1
        },
        768: {
          items: 2
        },
        979: {
          items: 3
        },
        1199: {
          items: 3
        }
      }
    });
  </script>
<?php } ?>

<!-- Notification -->
<script>
  // Load script after page loading
  $(window).on("load", function () {
    <?php if (isset($_SESSION["infomsg"])) { ?>
    $.notify({icon: 'icon-info', message: '<?php echo $_SESSION["infomsg"];?>'}, {type: 'info'});
    <?php }
    if (isset($_SESSION["successmsg"])) { ?>
    $.notify({icon: 'icon-check', message: '<?php echo $_SESSION["successmsg"];?>'}, {type: 'success'});
    <?php }
    if (isset($_SESSION["errormsg"])) { ?>
    $.notify({icon: 'icon-attention', message: '<?php echo $_SESSION["errormsg"];?>'}, {type: 'danger'});
    <?php }
    if (isset($_SESSION["warningmsg"])) { ?>
    $.notify({icon: '', message: '<?php echo $_SESSION["warningmsg"];?>'}, {type: 'warning'});
    <?php }
    if ($errorpp) { ?>
    $.notify({icon: 'icon-attention', message: '<?php echo $errorpp["e"];?>'}, {type: 'danger'});
    <?php }
    if ($PAGE_PASSWORD && JAK_ASACCESS) { ?>
    $.notify({icon: 'icon-info', message: '<?php echo $tl["notification"]["n5"];?>'}, {type: 'info', delay: 0});
    <?php }
    if ($jkv["offline"] == 1 && JAK_ASACCESS) { ?>
    $.notify({
      // Options
      icon: 'icon-flash',
      message: '<?php echo $tl["notification"]["n1"];?>'
    }, {
      // Settings
      type: 'offline',
      timer: 0,
      template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
      '<button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="color: #FFF;opacity: 0.8;">×</button>' +
      '<span data-notify="icon"></span> ' +
      '<span data-notify="title" style="display: block;font-weight: bold;">{1}</span> ' +
      '<span data-notify="message">{2}</span>' +
      '</div>' +
      '</div>'
    });

    <?php } ?>
  });
</script>

<!-- Metrics Print script -->
<?php if ($jkv["printme"]) { ?>
  <script src="/assets/js/jakprint.js?=<?php echo $jkv["updatetime"]; ?>"></script>

  <script>
    $(function () {

      $('#jakprint').on('click', function (e) {
        e.preventDefault();
        $('#printdiv').printThis({title: '<?php echo sprintf($tl["printpage"]["pp"], $jkv["title"]); ?>'});
      });

    });
  </script>
<?php } ?>

<!-- Modal -->
<div class="modal fullscreen fade" id="JAKModal" tabindex="-1" role="dialog" aria-labelledby="JAKModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="JAKModalLabel">&nbsp;</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $tl["global_text"]["gtxt5"]; ?></button>
      </div>
    </div>
  </div>
</div>

<!-- Search script -->
<?php if ($jkv["ajaxsearch"] && $AJAX_SEARCH_PLUGIN_URL) { ?>
  <script>
    $(document).ready(function () {

      $('#ajaxsearchForm').ajaxSearch({
        apiURL: '<?php echo BASE_URL . $AJAX_SEARCH_PLUGIN_URL;?>',
        msg: '<?php echo $tl["searching"]["stxt12"];?>',
        seo: <?php echo $AJAX_SEARCH_PLUGIN_SEO;?>});

      $('#Jajaxs').alphanumeric({nocaps: false, allow: ' +*'});
      $('.hideAdvSearchResult').fadeIn();

    });
  </script>
<?php } ?>

<!-- EU Cookies -->
<?php if ($jkv["eucookie_enabled"] == 1) {
  include APP_PATH . '/assets/js/eu-cookies.php';
} ?>

<!-- Facebook SDK connection -->
<?php if (isset($JAK_FACEBOOK_SDK_CONNECTION)) echo $JAK_FACEBOOK_SDK_CONNECTION; ?>

<!-- Download plugins -->
<?php if (JAK_PLUGIN_DOWNLOAD && JAK_DOWNLOADCAN) {
  $pluginsite_template = 'template/' . ENVO_TEMPLATE . '/plugintemplate/download/downloadfile.php';

  if (file_exists($pluginsite_template)) {
    include APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/download/js/script.download.php';
  } else {
    include APP_PATH . 'plugins/download/js/script.download.php';
  }

} ?>

<!-- RegisterForm plugins -->
<?php if (JAK_PLUGIN_REGISTER_FORM && $page == $PLUGIN_RF_CAT["varname"]) {
  $pluginsite_template = 'template/' . ENVO_TEMPLATE . '/plugintemplate/register_form/js/script.registerform.php';

  if (file_exists($pluginsite_template)) {
    include APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/register_form/js/script.registerform.php';
  } else {
    include APP_PATH . 'plugins/register_form/js/script.registerform.php';
  }

  ?>
<?php } ?>

</body>
</html>