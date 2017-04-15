</section>
</div>
</div>
</div>

<script type="text/javascript">
  jakWeb.jak_url_orig = "<?php echo BASE_URL_ORIG;?>";
  jakWeb.jak_url = "<?php echo BASE_URL_ADMIN;?>";
  jakWeb.jak_path = "<?php echo BASE_PATH_ORIG;?>";
  jakWeb.jak_lang = "<?php echo $site_language;?>";
  jakWeb.jak_template = "<?php echo JAK_TEMPLATE;?>";

  <?php if (isset($_SESSION["infomsg"])) { ?>
  $.notify({icon: 'fa fa-info-circle', message: '<?php echo $_SESSION["infomsg"];?>'}, {type: 'info'});
  <?php } if (isset($_SESSION["successmsg"])) { ?>
  $.notify({icon: 'fa fa-check-square-o', message: '<?php echo $_SESSION["successmsg"];?>'}, {type: 'success'});
  <?php } if (isset($_SESSION["errormsg"])) { ?>
  $.notify({icon: 'fa fa-exclamation-triangle', message: '<?php echo $_SESSION["errormsg"];?>'}, {type: 'danger'});
  <?php } ?>
</script>

<?php if ($jkv["adv_editor"]) { ?>
  <script src="assets/plugins/ace/ace.js" type="text/javascript"></script>
  <script type="text/javascript">

    /* ACE Editor
     ========================================= */
    var htmlelACE = ace.edit("htmleditorlight");
    htmlelACE.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
    htmlelACE.session.setUseWrapMode(true);
    htmlelACE.session.setWrapLimitRange();
    htmlelACE.setOptions({
      // session options
      mode: "ace/mode/html",
      tabSize: <?php echo $jkv["acetabSize"]; ?>,
      useSoftTabs: true,
      highlightActiveLine: <?php echo $jkv["aceactiveline"]; ?>,
      // renderer options
      showInvisibles: <?php echo $jkv["aceinvisible"]; ?>,
      showGutter: <?php echo $jkv["acegutter"]; ?>,
    });

    texthtmlel = $("#jak_editor_light").val();
    htmlelACE.session.setValue(texthtmlel);

    /* Responsive Filemanager
     ========================================= */
    function responsive_filemanager_callback(field_id) {

      if (field_id == "htmleditorlight") {

        // get the path for the ace file
        var acefile = jQuery('#' + field_id).val();
        htmlelACE.insert(acefile);
      }
    }

    /* Submit Form
     ========================================= */
    $('form').submit(function () {
      $("#jak_editor_light").val(htmlelACE.getValue());
    });
  </script>
<?php }
if (!$jkv["adv_editor"]) { ?>
  <script type="text/javascript" src="../assets/plugins/tinymce/tinymce.min.js"></script>
  <?php include_once('pages/js/tiny.editor.php');
} ?>

<?php if (isset($JAK_HOOK_FOOTER_ADMIN) && is_array($JAK_HOOK_FOOTER_ADMIN)) foreach ($JAK_HOOK_FOOTER_ADMIN as $foota) {
  // Import all hooks for footer just before /body
  include_once APP_PATH . $foota["phpcode"];
} ?>

</body>
</html>
