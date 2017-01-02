<?php if ($JAK_PROVED) { ?>
  </section><!--Main Content -->

  </div><!-- Content Wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <?php echo sprintf($tl["hf_text"]["hftxt"], $jkv["version"]); ?>
    </div>
    <strong><?php echo $tl["hf_text"]["hftxt1"]; ?> - <?php echo date('Y'); ?> by <a href="http://www.bluesat.cz" target="_blank">BLUESAT</a>.</strong> All rights reserved.
  </footer>

  </div><!-- Wrapper -->

<?php } else { ?>
  </div>
  </div>
<?php } ?>

<script type="text/javascript">
  jakWeb.jak_url_orig = "<?php echo BASE_URL_ORIG;?>";
  jakWeb.jak_url = "<?php echo BASE_URL_ADMIN;?>";
  jakWeb.jak_path = "<?php echo BASE_PATH_ORIG;?>";
  jakWeb.jak_lang = "<?php echo $site_language;?>";
  jakWeb.jak_template = "<?php echo $jkv["sitestyle"];?>";

  <?php if (isset($_SESSION["loginmsg"])) { ?>
  $.notify({
    // Options
    title: 'Welcome back, <?php echo $JAK_WELCOME_NAME; ?>!',
    message: '<?php echo $_SESSION["loginmsg"];?>',
  },{
    // Settings
    timer: 8000,
    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert" role="alert" style="background-color: #263238;color: #fff">' +
    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="color: #fff;opacity: 0.8;">×</button>' +
    '<div style="float: left;margin-right: 20px;"><img src="<?php echo BASE_URL_ORIG . basename(JAK_FILES_DIRECTORY) . "/userfiles/" . $jakuser->getVar("picture"); ?>" alt="" style="width: 40px;"></div>' +
    '<span data-notify="title" style="display: block;font-weight: bold;">{1}</span> ' +
    '<span data-notify="message">{2}</span>' +
    '</div>' +
    '</div>'
  });
  <?php } if (isset($_SESSION["infomsg"])) { ?>
  $.notify({icon: 'fa fa-info-circle', message: '<?php echo $_SESSION["infomsg"];?>'}, {type: 'info'});
  <?php } if (isset($_SESSION["successmsg"])) { ?>
  $.notify({icon: 'fa fa-check-square-o', message: '<?php echo $_SESSION["successmsg"];?>'}, {type: 'success'});
  <?php } if (isset($_SESSION["errormsg"])) { ?>
  $.notify({icon: 'fa fa-exclamation-triangle', message: '<?php echo $_SESSION["errormsg"];?>'}, {type: 'danger'});
  <?php } ?>

  $('.wIframe').on('click', function (e) {
    e.preventDefault();
    $('#JAKModal').on('show.bs.modal', function () {
      $('#JAKModal .modal-lg').css("width", "90%");
    });
  });

  $(document).ready(function () {

    // Bootbox - Confirm dialog for Delete button
    $('[data-confirm]').click(function(e) {
      // Init
      var links = $(this).attr("href");
      $("a").tooltip('destroy');
      e.preventDefault();
      // Show Message
      bootbox.setLocale('<?php echo $site_language;?>');
      bootbox.confirm({
        title: "Potvrzení o odstranění!",
        message: "<i class='fa fa-trash'></i><span>" + $(this).attr('data-confirm') + "</span>",
        className: "bootbox-confirm-del",
        buttons: {
          confirm: {
            className: 'btn-success'
          },
          cancel: {
            className: 'btn-danger'
          }
        },
        callback: function (result) {
          if(result == true) {
            window.location = links;
          }
        }
      });
      // Add div to Bootbox Body
      $(".bootbox-body i").wrap( "<div class='col-md-2'></div>" );
    });

    // Bootbox - Confirm dialog for Delete button
    $("#button_delete").on("click", function (e) {
      // Init
      var self = $(this);
      e.preventDefault();
      // Show Message
      bootbox.setLocale('<?php echo $site_language;?>');
      bootbox.confirm({
        title: "Potvrzení o odstranění!",
        message: "<i class='fa fa-trash'></i><span>" + $(this).attr('data-confirm-del') + "</span>",
        className: "bootbox-confirm-del",
        buttons: {
          confirm: {
            className: 'btn-success'
          },
          cancel: {
            className: 'btn-danger'
          }
        },
        callback: function (result) {
          if (result) {
            self.off("click");
            self.click();
          }
        }
      });
    });

    // Bootbox - Confirm dialog for Truncate button
    $("#button_truncate").on("click", function (e) {
      // Init
      var links = $(this).attr("href");
      $("a").tooltip('destroy');
      e.preventDefault();
      // Show Message
      bootbox.setLocale('<?php echo $site_language;?>');
      bootbox.confirm({
        title: "Potvrzení o odstranění!",
        message: "<i class='fa fa-exclamation-triangle'></i><span>" + $(this).attr('data-confirm-trunc') + "</span>",
        className: "bootbox-confirm-trunc",
        buttons: {
          confirm: {
            className: 'btn-success'
          },
          cancel: {
            className: 'btn-danger'
          }
        },
        callback: function (result) {
          if(result == true) {
            window.location = links;
          }
        }
      });
    });

    // Bootbox - Confirm dialog for Logout
    $('[data-confirm-logout]').click(function(e) {
      // Init
      var links = $(this).attr("href");
      $("a").tooltip('destroy');
      e.preventDefault();
      // Show Message
      bootbox.setLocale('<?php echo $site_language;?>');
      bootbox.confirm({
        title: "Odhlášení!",
        message: "<i class='fa fa-sign-out'></i><span>" + $(this).attr('data-confirm-logout') + "</span>",
        className: "bootbox-confirm-logout",
        buttons: {
          confirm: {
            className: 'btn-info'
          },
          cancel: {
            className: 'btn-default'
          }
        },
        callback: function (result) {
          if(result == true) {
            window.location = links;
          }
        }
      });
    });

  });

</script>

<?php if ($JAK_PROVED) { ?>
  <script type="text/javascript" src="../js/editor/tinymce.min.js"></script>
  <?php include_once('js/editor.php');
} ?>

<!-- Import all hooks for footer just before /body -->
<?php if (isset($JAK_HOOK_FOOTER_ADMIN) && is_array($JAK_HOOK_FOOTER_ADMIN)) foreach ($JAK_HOOK_FOOTER_ADMIN as $foota) {
  include_once APP_PATH . $foota["phpcode"];
} ?>

<!-- Modal -->
<div class="modal fade" id="JAKModal" tabindex="-1" role="dialog" aria-labelledby="JAKModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="JAKModalLabel"></h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $tl["button"]["btn19"]; ?></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


</body>
</html>