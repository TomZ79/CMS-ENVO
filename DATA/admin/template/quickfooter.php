</section>
</div>
</div>
</div>

<!-- BEGIN VENDOR JS -->
<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html->addScript('/assets/plugins/jquery/jquery-1.11.1.min.js');
?>

<!-- BEGIN JS FUNCTION -->
<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html->addScript('assets/js/global_js/functions.min.js?=' . $setting["updatetime"]);
// Setting variable for Jquery external script files
echo $Html->addScript('assets/js/global_js/generated_admin_js.php', array('type' => 'text/javascript'));
?>

<!-- BEGIN NOTIFY CONFIG JS -->
<?php if (isset($_SESSION)) { ?>

  <script>
    // Load script after page loading
    $(window).on("load", function () {
      <?php if (isset($_SESSION["infomsg"])) { ?>
      $.notify({icon: 'fa fa-info-circle', message: '<?=$_SESSION["infomsg"]?>'}, {type: 'info'});
      <?php } if (isset($_SESSION["successmsg"])) { ?>
      $.notify({icon: 'fa fa-check-square-o', message: '<?=$_SESSION["successmsg"]?>'}, {type: 'success'});
      <?php } if (isset($_SESSION["errormsg"])) { ?>
      $.notify({icon: 'fa fa-exclamation-triangle', message: '<?=$_SESSION["errormsg"]?>'}, {type: 'danger'});
      <?php } ?>
    });
  </script>

<?php } ?>

<?php if ($setting["adv_editor"]) { ?>

  <script src="assets/plugins/ace/ace.js"></script>
  <script>

    /* ACE Editor
     ========================================= */
    var htmlelACE = ace.edit("htmleditorlight");
    htmlelACE.setTheme("ace/theme/<?=$setting["acetheme"]?>");
    htmlelACE.session.setUseWrapMode(true);
    htmlelACE.session.setWrapLimitRange();
    htmlelACE.setOptions({
      // session options
      mode: "ace/mode/html",
      tabSize: <?=$setting["acetabSize"]?>,
      useSoftTabs: true,
      highlightActiveLine: <?=$setting["aceactiveline"]?>,
      // renderer options
      showInvisibles: <?=$setting["aceinvisible"]?>,
      showGutter: <?=$setting["acegutter"]?>
    });

    texthtmlel = $("#envo_editor_light").val();
    htmlelACE.session.setValue(texthtmlel);
    // This is to remove following warning message on console:
    // Automatically scrolling cursor into view after selection change this will be disabled in the next version
    // set editor.$blockScrolling = Infinity to disable this message
    htmlelACE.$blockScrolling = Infinity;

    /* Submit Form
     ========================================= */
    $('form').submit(function () {
      $("#envo_editor_light").val(htmlelACE.getValue());
    });
  </script>

<?php }
if (!$setting["adv_editor"]) { ?>
  <script src="../assets/plugins/tinymce/5.3.1/tinymce.min.js?=v5.3.1"></script>
  <?php include_once('assets/js/tiny.editor.php');
} ?>

<?php if (isset($ENVO_HOOK_FOOTER_ADMIN) && is_array($ENVO_HOOK_FOOTER_ADMIN)) foreach ($ENVO_HOOK_FOOTER_ADMIN as $foota) {
  // Import all hooks for footer just before /body
  include_once APP_PATH . $foota["phpcode"];
} ?>

</body>
</html>
