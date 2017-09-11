<?php if ($JAK_PROVED) { ?>
  <!-- END PLACE PAGE CONTENT HERE -->
  <?php if ($page != 'cmshelp') { ?></div><?php } ?><!-- END CONTAINER FLUID -->
  </div><!-- END PAGE CONTENT -->
  <!-- START FOOTER -->
  <?php if ($page != 'cmshelp') { ?>
    <div class="container-fluid container-fixed-lg footer">
      <div class="copyright sm-text-center">
        <p class="small no-margin pull-left sm-pull-reset">
          <span class="hint-text"><?php echo $tl["hf_text"]["hftxt1"]; ?> - <?php echo date('Y'); ?> by </span>
          <span><strong><a href="http://www.bluesat.cz" target="_blank">BLUESAT</a></strong></span>.
          <span class="hint-text">All rights reserved.</span>
        </p>
        <p class="small no-margin pull-right sm-pull-reset">
          <?php echo sprintf($tl["hf_text"]["hftxt"], $jkv["version"]); ?>
          <span class="hint-text">&amp; Made with Love</span>
        </p>
        <div class="clearfix"></div>
      </div>
    </div>
  <?php } ?>
  <!-- END FOOTER -->
  </div><!-- END PAGE CONTENT WRAPPER -->
  </div><!-- END PAGE CONTAINER -->
  <!-- START OVERLAY -->
  <div class="overlay hide" data-pages="search">
    <!-- BEGIN Overlay Content !-->
    <div class="overlay-content has-results m-t-20">
      <!-- BEGIN Overlay Header !-->
      <div class="container-fluid">
        <!-- BEGIN Overlay Logo !-->
        <img class="overlay-brand" src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
        <!-- END Overlay Logo !-->
        <!-- BEGIN Overlay Close !-->
        <a href="#" class="close-icon-light overlay-close text-black fs-16">
          <i class="pg-close"></i>
        </a>
        <!-- END Overlay Close !-->
      </div>
      <!-- END Overlay Header !-->
      <div class="container-fluid">
        <!-- BEGIN Overlay Controls !-->
        <input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="<?php echo $tl["search_overlay"]["so1"]; ?>" autocomplete="off" spellcheck="false">
        <br>
        <!-- END Overlay Controls !-->
      </div>
      <!-- BEGIN Overlay Search Results, This part is for demo purpose, you can add anything you like !-->
      <div class="container-fluid p-t-10">
        <span>
          <strong><?php echo $tl["search_overlay"]["so2"]; ?></strong>
        </span>
        <span id="overlay-suggestions"></span>
        <br>
        <div class="search-results m-t-30">
          <p class="bold"><?php echo $tl["search_overlay"]["so3"]; ?></p>
          <div class="results-container">
            <!-- Results are appended here -->
          </div>
        </div>
      </div>
      <!-- END Overlay Search Results !-->
    </div>
    <!-- END Overlay Content !-->
  </div>
  <!-- END OVERLAY -->

<?php } else { ?>

<?php } ?>

<!-- BEGIN VENDOR JS -->

<script>
  // Pace.min.js config
  window.paceOptions = {
    target: '#pace',
    restartOnPushState: false,
    restartOnRequestAfter: false
  }
</script>

<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html->addScript('assets/plugins/pace/pace.min.js');
echo $Html->addScript('/assets/plugins/jquery/jquery-2.1.1.min.js');
echo $Html->addScript('//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js');
echo $Html->addScript('assets/plugins/modernizr.custom.js');
echo $Html->addScript('assets/plugins/bootstrapv3/js/bootstrap.min.js');
echo $Html->addScript('assets/plugins/bootstrap-select2/4.0.3/js/select2.full.min.js');
echo $Html->addScript('assets/plugins/bootstrap-select2/4.0.3/js/i18n/cs.js');
echo $Html->addScript('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js');
echo $Html->addScript('assets/plugins/bootstrap-notify/bootstrap-notify.js');
echo $Html->addScript('assets/plugins/bootstrap-bootboxjs/bootbox.min.js');
echo $Html->addScript('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js');
echo $Html->addScript('assets/plugins/bootstrap-iconpicker/js/iconset/iconset-all.min.js');
echo $Html->addScript('assets/plugins/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js');
echo $Html->addScript('assets/plugins/bootstrap-datetimepicker-4/js/bootstrap-datetimepicker.js');
echo $Html->addScript('assets/plugins/jquery/jquery-easy.js');
echo $Html->addScript('assets/plugins/jquery-unveil/jquery.unveil.min.js');
echo $Html->addScript('assets/plugins/jquery-bez/jquery.bez.min.js');
echo $Html->addScript('assets/plugins/jquery-ios-list/jquery.ioslist.min.js');
echo $Html->addScript('assets/plugins/imagesloaded/imagesloaded.pkgd.min.js');
echo $Html->addScript('assets/plugins/jquery-actual/jquery.actual.min.js');
echo $Html->addScript('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js');
?>

<!-- Prism -->
<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html->addScript('assets/plugins/prism/preCode.js');
echo $Html->addScript('assets/plugins/prism/prism.js');
?>

<!-- Validadion -->
<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html->addScript('assets/plugins/jquery-validation/js/jquery.validate.min.js');
if ($site_language = 'cs') {
  echo $Html->addScript('assets/plugins/jquery-validation/js/localization/messages_cs.js');
} ?>

<!-- BEGIN JS FUNCTION -->
<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html->addScript('../assets/js/functions.js?=' . $jkv["updatetime"]);
// Setting variable for Jquery external script files
echo $Html->addScript('generated_js.php', array('type' => 'text/javascript'));
?>

<!-- BEGIN CORE TEMPLATE JS -->
<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html->addScript('pages/js/pages.js');
?>

<!-- BEGIN PAGE LEVEL JS -->
<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html->addScript('assets/js/global_js/scripts.js');
?>

<!-- BEGIN JS FOR GENERAL PAGE and PLUGINS -->
<?php
$notify =
  '<script>' .
  '$.notify({' .
  '  message: "Soubor <strong>%s\</strong> neexistuje.<br>Kontaktujte vývojáře CMS !!!",' .
  '}, {' .
  ' type: "danger",' .
  ' delay: 5000,' .
  ' template: "<div data-notify=\"container\" role=\"alert\" class=\"col-xs-11 col-sm-2 col-md-5 alert alert-{0}\">\
                <button type=\"button\" class=\"close\" data-notify=\"dismiss\">\
                  <span aria-hidden=\"true\">×</span>\
                  <span class=\"sr-only\">Close</span>\
                </button>\
                <span data-notify=\"message\" style=\"padding-right:15px\">{2}</span>\
                <a href=\"{3}\" target=\"{4}\" data-notify=\"url\"></a>\
               </div>",' .
  '});' .
  '</script>';

// Init debug mode - debug to console.log
$debug = new PHPDebug();

if (!empty($page)) {
  $ap = array("logs", "searchlog", "changelog", "site", "setting", "plugins", "template", "maintenance", "facebookgallery", "settingfacebook", "mediasharing", "user", "usergroup", "categories", "page", "contactform", "sitemap", "searchsetting", "news", "tags", "cmshelp");

  if (in_array($page, $ap)) {
    $jscodeFile = 'assets/js/script.' . $page . '.php';
    if (file_exists($jscodeFile)) {
      include_once($jscodeFile);
    } else {
      echo sprintf($notify, $jscodeFile);
    }
    $debug->debug("JS Script path for this plugin or page: " . $jscodeFile, NULL, INFO);
  } elseif (!in_array($page, $ap) && !empty($page) && ($page != '404')) {
    $rPage = str_replace('-', '_', $page);
    $jscodeFile = '../plugins/' . $rPage . '/admin/template/script.' . $rPage . '.php';
    if (file_exists($jscodeFile)) {
      include_once($jscodeFile);
    } else {
      echo sprintf($notify, $jscodeFile);
    }
    $debug->debug("JS Script path for this plugin or page: " . $jscodeFile, NULL, INFO);
  }

} elseif (empty($page) && !JAK_USERID) {
  include_once 'assets/js/script.login.php';
} else {
  include_once 'assets/js/script.index.php';
}

// JS pages for Template Settings
if ($page == 'template' && $page1 == 'settings') {
  $jscodeFile = APP_PATH . '/template/' . ENVO_TEMPLATE . '/js/' . ENVO_TEMPLATE . '.templatesettings.php';
  if (file_exists($jscodeFile)) {
    include_once($jscodeFile);
  } else {
    echo sprintf($notify, $jscodeFile);
  }
  $debug->debug("JS Script path template settings page: " . $jscodeFile, NULL, INFO);
}

?>

<!-- BEGIN NOTIFY CONFIG JS -->
<?php if (isset($_SESSION["loginmsg"])) { ?>
  <script>
    $.notify({
      // Options
      title: '<?php echo $tl["hf_text"]["hftxt6"] . ' , ' . $JAK_WELCOME_NAME; ?>!',
      message: '<?php echo $_SESSION["loginmsg"];?>'
    }, {
      // Settings
      timer: 8000,
      template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert" role="alert" style="background-color: #263238;color: #FFF">' +
      '<button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="color: #FFF;opacity: 0.8;">×</button>' +
      '<div style="float: left;margin-right: 20px;"><img src="<?php echo BASE_URL_ORIG . basename(JAK_FILES_DIRECTORY) . "/userfiles/" . $jakuser->getVar("picture"); ?>" alt="" style="width: 40px;"></div>' +
      '<span data-notify="title" style="display: block;font-weight: bold;">{1}</span> ' +
      '<span data-notify="message">{2}</span>' +
      '</div>' +
      '</div>'
    });
  </script>
<?php }
if (isset($_SESSION["infomsg"])) { ?>
  <script>$.notify({
      icon: 'fa fa-info-circle',
      message: '<?php echo $_SESSION["infomsg"];?>'
    }, {type: 'info'});
  </script>
<?php }
if (isset($_SESSION["successmsg"])) { ?>
  <script>$.notify({
      icon: 'fa fa-check-square-o',
      message: '<?php echo $_SESSION["successmsg"];?>'
    }, {type: 'success'});
  </script>
<?php }
if (isset($_SESSION["errormsg"])) { ?>
  <script>$.notify({
      icon: 'fa fa-exclamation-triangle',
      message: '<?php echo $_SESSION["errormsg"];?>'
    }, {type: 'danger'});
  </script>
<?php }
if (isset($_SESSION["warningmsg"])) { ?>
  <script>$.notify({
      icon: 'fa fa-exclamation-triangle',
      message: '<?php echo $_SESSION["warningmsg"];?>'
    }, {type: 'warning'});
  </script>
<?php }
if ($JAK_PROVED && !isset($jkv["cms_tpl"])) { ?>
  <script>
    // Notification
    $.notify({
      // options
      icon: 'fa fa-exclamation-triangle fa-lg',
      message: '<?php echo $tl["general_error"]["generror6"];?>'
    }, {
      // settings
      type: 'danger',
      delay: 0,
      template: '<div data-notify="container" class="col-xs-11 col-sm-5 alert alert-{0}" role="alert">' +
      '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
      '<span data-notify="icon"></span> ' +
      '<span data-notify="message">{2}</span>' +
      '</div>'
    });
  </script>
<?php } ?>

<!-- BEGIN TINYMCE EDITOR -->
<?php if ($JAK_PROVED && (!$jkv["adv_editor"])) {
  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  echo $Html->addScript('../assets/plugins/tinymce/tinymce.min.js?=v4.5.2');
  include_once('assets/js/tiny.editor.php');
} ?>

<!-- BEGIN HOOKS - FOOTER -->
<?php if (isset($JAK_HOOK_FOOTER_ADMIN) && is_array($JAK_HOOK_FOOTER_ADMIN)) foreach ($JAK_HOOK_FOOTER_ADMIN as $foota) {
  // Import all hooks for footer just before /body
  include_once APP_PATH . $foota["phpcode"];
} ?>

<!-- MODAL DIALOG -->
<div class="modal fade fill-in" id="ENVOModal" tabindex="-1" role="dialog" aria-labelledby="ENVOModalLabel" aria-hidden="true">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
    <i class="pg-close"></i>
  </button>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body padding-0">
        <div class="row">
          <div class="col-md-12">
            <div class="body-content" style="display: flex;flex-direction: column;min-height: 90vh;"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>

</body>
</html>
