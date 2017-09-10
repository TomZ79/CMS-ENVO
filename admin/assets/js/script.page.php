<?php

// Load 'ace.js'  - only for selected pages
if ($jkv["adv_editor"] && (($page == 'page' && $page1 == 'newpage') || ($page == 'page' && $page1 == 'edit'))) {

  ?>

  <script src="assets/plugins/ace/ace.js" type="text/javascript"></script>

<?php } ?>

<script type="text/javascript">

  /* ACE Editor
   ========================================= */
  <?php if ($jkv["adv_editor"]) { ?>
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
  <?php } ?>

  if ($('#csseditor').length) {
    var cssACE = ace.edit("csseditor");
    cssACE.setTheme("ace/theme/chrome");
    cssACE.session.setMode("ace/mode/html");
    textcss = $("#jak_css").val();
    cssACE.session.setValue(textcss);
  }

  if ($('#javaeditor').length) {
    var jsACE = ace.edit("javaeditor");
    jsACE.setTheme("ace/theme/chrome");
    jsACE.session.setMode("ace/mode/html");
    textjs = $("#jak_javascript").val();
    jsACE.session.setValue(textjs);
  }

  /* Submit Form
   ========================================= */
  $('form').submit(function () {

    <?php if ($jkv["adv_editor"]) { ?>
    if ($('#jak_editor').length) {
      $("#jak_editor").val(htmlACE.getValue());
    }
    <?php } ?>

    if ($('#csseditor').length) {
      $("#jak_css").val(cssACE.getValue());
    }

    if ($('#javaeditor').length) {
      $("#jak_javascript").val(jsACE.getValue());
    }

  });

  /* Responsive Filemanager
   ========================================= */
  function responsive_filemanager_callback(field_id) {

    if (field_id == "csseditor" || field_id == "javaeditor" || field_id == "htmleditor") {

      // get the path for the ace file
      var acefile = jQuery('#' + field_id).val();

      if (field_id == "csseditor") {
        cssACE.insert('<link rel="stylesheet" href="' + acefile + '" type="text/css" />');
      } else if (field_id == "javaeditor") {
        jsACE.insert('<script src="' + acefile + '"><\/script>');
      } else {
        htmlACE.insert(acefile);
      }
    }
  }

  /* Other config
   ========================================= */
  $(document).ready(function () {

    $("#addCssBlock").click(function () {
      cssACE.insert(insert_cssblock());
    });
    $("#addJavascriptBlock").click(function () {
      jsACE.insert(insert_javascript());
    });

    <?php
    if ($page == 'page' && $page1 == 'edit') {
    ?>
    $("#restorcontent").change(function () {
      if ($(this).val() != 0) {
        if (!confirm('<?php echo $tl["page_notification"]["restore"];?>')) {
          $("#restorcontent").val(0);
          return false;
        } else {
          restoreContent('pageid', <?php echo $page2;?>, <?php echo $jkv["adv_editor"];?>, $(this).val());
        }
      }
    });
    <?php } ?>

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

    /* Short Code Insert to ACE Editor */
    $(".short-sc").click(function () {
      htmlACE.insert(insert_code_member_guest());
    });

    $(".short-sc1").click(function () {
      htmlACE.insert(insert_code_member());
    });

    $(".short-sc2").click(function () {
      htmlACE.insert(insert_code_guest());
    });

  });
</script>
