<?php if ($jkv["adv_editor"]) { ?>
  <script src="assets/plugins/ace/ace.js" type="text/javascript"></script>
<?php } ?>

<script type="text/javascript">
  <?php if ($jkv["adv_editor"]) { ?>

  /* ACE Editor
   ========================================= */
  // ACE editor 1
  if ($('#htmleditor').length) {
    var htmlACE = ace.edit("htmleditor");
    htmlACE.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
    htmlACE.session.setUseWrapMode(true);
    htmlACE.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
    htmlACE.setOptions({
      // session options
      mode: "ace/mode/html",
      tabSize: <?php echo $jkv["acetabSize"]; ?>,
      useSoftTabs: true,
      highlightActiveLine: <?php echo $jkv["aceactiveline"]; ?>,
      // renderer options
      showInvisibles: <?php echo $jkv["aceinvisible"]; ?>,
      showGutter: <?php echo $jkv["acegutter"]; ?>,
    });
    // This is to remove following warning message on console:
    // Automatically scrolling cursor into view after selection change this will be disabled in the next version
    // set editor.$blockScrolling = Infinity to disable this message
    htmlACE.$blockScrolling = Infinity;

    texthtml = $("#jak_editor").val();
    htmlACE.session.setValue(texthtml);
  }

  // ACE editor 2
  if ($('#htmleditor2').length) {
    var htmlACE2 = ace.edit("htmleditor2");
    htmlACE2.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
    htmlACE2.session.setUseWrapMode(true);
    htmlACE2.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
    htmlACE2.setOptions({
      // session options
      mode: "ace/mode/html",
      tabSize: <?php echo $jkv["acetabSize"]; ?>,
      useSoftTabs: true,
      highlightActiveLine: <?php echo $jkv["aceactiveline"]; ?>,
      // renderer options
      showInvisibles: <?php echo $jkv["aceinvisible"]; ?>,
      showGutter: <?php echo $jkv["acegutter"]; ?>,
    });
    // This is to remove following warning message on console:
    // Automatically scrolling cursor into view after selection change this will be disabled in the next version
    // set editor.$blockScrolling = Infinity to disable this message
    htmlACE2.$blockScrolling = Infinity;

    texthtml2 = $("#jak_editor2").val();
    htmlACE2.session.setValue(texthtml2);
  }

  /* Submit Form
   ========================================= */
  $('form').submit(function () {

    <?php if ($jkv["adv_editor"]) { ?>
    if ($('#jak_editor').length) {
      $("#jak_editor").val(htmlACE.getValue());
    }
    if ($('#jak_editor2').length) {
      $("#jak_editor2").val(htmlACE2.getValue());
    }
    <?php } ?>

  });

  <?php } ?>

  /* Responsive Filemanager
   ========================================= */
  function responsive_filemanager_callback(field_id) {

    // get the path for the ace file
    var acefile = jQuery('#' + field_id).val();

    if (field_id == "htmleditor") {
      htmlACE.insert(acefile);
    } else if (field_id == "htmleditor2") {
      htmlACE2.insert(acefile);
    }
  }

  /* Other config
   ========================================= */
  $(document).ready(function () {

    /* Check all checkbox */
    $("#jak_delete_all").click(function () {
      var checkedStatus = this.checked;
      $(".highlight").each(function () {
        $(this).prop('checked', checkedStatus);
      });
      $('#button_delete').prop('disabled', function (i, v) {
        return !v;
      });
    });

    /* Disable submit button if checkbox is not checked */
    $(".highlight").change(function () {
      if (this.checked) {
        $("#button_delete").removeAttr("disabled");
      } else {
        $("#button_delete").attr("disabled", "disabled");
      }
    });

  });
</script>
