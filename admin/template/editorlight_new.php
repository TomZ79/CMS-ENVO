<?php if ($jkv["adv_editor"]) { ?>
  <div id="htmleditorlight"></div>
  <textarea name="jak_lcontent" class="form-control hidden" id="jak_editor_light"><?php if (isset($_REQUEST["jak_lcontent"])) echo jak_edit_safe_userpost(htmlspecialchars($_REQUEST["jak_lcontent"])); ?></textarea>
<?php } else { ?>
  <textarea name="jak_lcontent" class="jakEditorLight" id="jakEditor" rows="40"><?php if (isset($_REQUEST["jak_lcontent"])) echo jak_edit_safe_userpost($_REQUEST["jak_lcontent"]); ?></textarea>
<?php } ?>

<?php if ($jkv["adv_editor"]) { ?>
  <script src="js/ace/ace.js" type="text/javascript"></script>
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
<?php } ?>