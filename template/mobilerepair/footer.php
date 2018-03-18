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
      include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/sidebar.php';
    }

    echo '</div>';
    echo '</div>';
    echo '</section>';

    break;
  default:

}

?>

</div>
<!-- END MAIN CONTENT -->

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
  <footer id="footer" class="footer fixed-footer">
    <div class="container pt-70 pb-40">
      <div class="row border-bottom-black">
        <?php echo $setting["footerblocktext_mobilerepair_tpl"]; ?>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-md-6 sm-text-center">
            <p class="font-13 text-black-777 m-0"><?php echo $setting["copyright"]; ?></p>
          </div>
          <div class="col-md-6 text-right flip sm-text-center">
            <div class="widget no-border m-0">
              <ul class="styled-icons icon-dark icon-circled icon-sm">

                <?php if ($setting["facebookfooterShow_mobilerepair_tpl"] == 1) { ?>
                  <li><a href="<?php echo $setting["facebookfooterLinks_mobilerepair_tpl"]; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <?php }
                if ($setting["twitterfooterShow_mobilerepair_tpl"] == 1) { ?>
                  <li><a href="<?php echo $setting["twitterfooterLinks_mobilerepair_tpl"]; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <?php }
                if ($setting["googlefooterShow_mobilerepair_tpl"] == 1) { ?>
                  <li><a href="<?php echo $setting["googlefooterLinks_mobilerepair_tpl"]; ?>" target="_blank"><i class="fa fa-google"></i></a></li>
                <?php }
                if ($setting["instagramfooterShow_mobilerepair_tpl"] == 1) { ?>
                  <li><a href="<?php echo $setting["instagramfooterLinks_mobilerepair_tpl"]; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <?php }
                if ($setting["youtubefooterShow_mobilerepair_tpl"] == 1) { ?>
                  <li><a href="<?php echo $setting["youtubefooterLinks_mobilerepair_tpl"]; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                <?php }
                if ($setting["pinterestfooterShow_mobilerepair_tpl"] == 1) { ?>
                  <li><a href="<?php echo $setting["pinterestfooterLinks_mobilerepair_tpl"]; ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                <?php }
                if ($ENVO_RSS_DISPLAY) { ?>
                  <li><a href="<?php echo $P_RSS_LINK; ?>" target="_blank"><i class="fa fa-rss"></i></a></li>
                <?php } ?>

              </ul>
            </div>
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
    <footer id="footer" class="footer fixed-footer">
      <div class="container pt-70 pb-40">
        <div class="row border-bottom-black">
          <?php echo $setting["footerblocktext_mobilerepair_tpl"]; ?>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container pt-20 pb-20">
          <div class="row">
            <div class="col-md-6 sm-text-center">
              <p class="font-13 text-black-777 m-0"><?php echo $setting["copyright"]; ?></p>
            </div>
            <div class="col-md-6 text-right flip sm-text-center">
              <div class="widget no-border m-0">
                <ul class="styled-icons icon-dark icon-circled icon-sm">

                  <?php if ($setting["facebookfooterShow_mobilerepair_tpl"] == 1) { ?>
                    <li><a href="<?php echo $setting["facebookfooterLinks_mobilerepair_tpl"]; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                  <?php }
                  if ($setting["twitterfooterShow_mobilerepair_tpl"] == 1) { ?>
                    <li><a href="<?php echo $setting["twitterfooterLinks_mobilerepair_tpl"]; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                  <?php }
                  if ($setting["googlefooterShow_mobilerepair_tpl"] == 1) { ?>
                    <li><a href="<?php echo $setting["googlefooterLinks_mobilerepair_tpl"]; ?>" target="_blank"><i class="fa fa-google"></i></a></li>
                  <?php }
                  if ($setting["instagramfooterShow_mobilerepair_tpl"] == 1) { ?>
                    <li><a href="<?php echo $setting["instagramfooterLinks_mobilerepair_tpl"]; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                  <?php }
                  if ($setting["youtubefooterShow_mobilerepair_tpl"] == 1) { ?>
                    <li><a href="<?php echo $setting["youtubefooterLinks_mobilerepair_tpl"]; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                  <?php }
                  if ($setting["pinterestfooterShow_mobilerepair_tpl"] == 1) { ?>
                    <li><a href="<?php echo $setting["pinterestfooterLinks_mobilerepair_tpl"]; ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                  <?php }
                  if ($ENVO_RSS_DISPLAY) { ?>
                    <li><a href="<?php echo $P_RSS_LINK; ?>" target="_blank"><i class="fa fa-rss"></i></a></li>
                  <?php } ?>

                </ul>
              </div>
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

  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- END WRAPPER -->

<!-- End Document  ================================================== -->
<!-- JS | Custom script for all pages -->
<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/mobilerepair.custom.js"></script>

<!-- Definition JS value -->
<script>
  envoWeb.envo_lang = '<?php echo $site_language;?>';
  envoWeb.envo_jslang = '<?php echo $jslangdata_output;?>';
  envoWeb.envo_url = '<?php echo BASE_URL;?>';
  envoWeb.envo_url_orig = '<?php echo BASE_URL;?>';
  envoWeb.envo_search_link = '<?php echo $ENVO_SEARCH_LINK;?>';
  envoWeb.request_uri = '<?php echo ENVO_PARSE_REQUEST;?>';
  envoWeb.envo_quickedit = '<?php echo $tl["global_text"]["gtxt6"];?>';
  envoWeb.envo_forgotlogin = '<?php echo (isset($errorfp) && !empty($errorfp) ? '1' : '0') ?>';
</script>

<?php
// Hook footer code
if (isset($ENVO_HOOK_FOOTER_END) && is_array($ENVO_HOOK_FOOTER_END)) foreach ($ENVO_HOOK_FOOTER_END as $hfootere) {
  include_once APP_PATH . $hfootere['phpcode'];
}

// Analytics code
if (isset($setting["analytics"])) echo $setting["analytics"];

// Javascript for page - FOOTER
if (isset($ENVO_FOOTER_JAVASCRIPT)) echo $ENVO_FOOTER_JAVASCRIPT;

// Social Buttons Script
if ($SHOWSOCIALBUTTON) {
  include APP_PATH . 'template/' . ENVO_TEMPLATE . '/socialbutton.php';
}
?>

<?php if (isset($ENVO_NEWS_IN_CONTENT) && is_array($ENVO_NEWS_IN_CONTENT)) {

} ?>

<!-- Notification -->
<script>
  // Load script after page loading
  $(window).on("load", function () {
    <?php if (isset($_SESSION["infomsg"])) { ?>
    $.notify({icon: 'fa fa-info', message: '<?php echo $_SESSION["infomsg"];?>'}, {type: 'info'});
    <?php }
    if (isset($_SESSION["successmsg"])) { ?>
    $.notify({icon: 'fa fa-check', message: '<?php echo $_SESSION["successmsg"];?>'}, {type: 'success'});
    <?php }
    if (isset($_SESSION["errormsg"])) { ?>
    $.notify({icon: 'fa fa-exclamation-triangle', message: '<?php echo $_SESSION["errormsg"];?>'}, {type: 'danger'});
    <?php }
    if (isset($_SESSION["warningmsg"])) { ?>
    $.notify({icon: 'fa fa-exclamation', message: '<?php echo $_SESSION["warningmsg"];?>'}, {type: 'warning'});
    <?php }
    if ($errorpp) { ?>
    $.notify({icon: 'fa fa-exclamation-triangle', message: '<?php echo $errorpp["e"];?>'}, {type: 'danger'});
    <?php }
    if ($PAGE_PASSWORD && ENVO_ASACCESS) { ?>
    $.notify({icon: 'fa fa-info', message: '<?php echo $tl["notification"]["n5"];?>'}, {type: 'info', delay: 0});
    <?php }
    if ($setting["offline"] == 1 && ENVO_ASACCESS) { ?>
    $.notify({
      // Options
      icon: 'fa fa-bolt',
      message: '<?php echo $tl["notification"]["n1"];?>'
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

<!-- Search script -->
<?php if ($setting["ajaxsearch"] && $AJAX_SEARCH_PLUGIN_URL) { ?>
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
<?php if ($setting["eucookie_enabled"] == 1) {
  include APP_PATH . '/assets/js/eu-cookies.php';
} ?>

<!-- Facebook SDK connection -->
<?php if (isset($ENVO_FACEBOOK_SDK_CONNECTION)) echo $ENVO_FACEBOOK_SDK_CONNECTION; ?>

<!-- Download plugins -->
<?php if (ENVO_PLUGIN_DOWNLOAD && ENVO_DOWNLOADCAN) {
  $pluginsite_template = 'template/' . ENVO_TEMPLATE . '/plugintemplate/download/downloadfile.php';

  if (file_exists($pluginsite_template)) {
    include APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/download/js/script.download.php';
  } else {
    include APP_PATH . 'plugins/download/js/script.download.php';
  }

} ?>

<!-- RegisterForm plugins -->
<?php if (ENVO_PLUGIN_REGISTER_FORM && $page == $PLUGIN_RF_CAT["varname"]) {
  $pluginsite_template = 'template/' . ENVO_TEMPLATE . '/plugintemplate/register_form/js/script.registerform.php';

  if (file_exists($pluginsite_template)) {
    include APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/register_form/js/script.registerform.php';
  } else {
    include APP_PATH . 'plugins/register_form/js/script.registerform.php';
  }

  ?>
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
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $tl["global_text"]["gtxt5"]; ?></button>
      </div>
    </div>
  </div>
</div>

</body>
</html>