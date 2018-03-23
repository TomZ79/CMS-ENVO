<script type="text/javascript">

  /* ACE Editor
   ========================================= */
  if ($('#htmleditor2').length) {
    var htmlefACE2 = ace.edit("htmleditor2");
    htmlefACE2.setTheme("ace/theme/<?php echo $setting["acetheme"]; ?>");
    htmlefACE2.session.setUseWrapMode(true);
    htmlefACE2.session.setWrapLimitRange(<?php echo $setting["acewraplimit"] . ',' . $setting["acewraplimit"]; ?>);
    htmlefACE2.setOptions({
      // session options
      mode: "ace/mode/javascript",
      tabSize: <?php echo $setting["acetabSize"]; ?>,
      useSoftTabs: true,
      highlightActiveLine: <?php echo $setting["aceactiveline"]; ?>,
      // renderer options
      showInvisibles: <?php echo $setting["aceinvisible"]; ?>,
      showGutter: <?php echo $setting["acegutter"]; ?>
    });
    // This is to remove following warning message on console:
    // Automatically scrolling cursor into view after selection change this will be disabled in the next version
    // set editor.$blockScrolling = Infinity to disable this message
    htmlefACE2.$blockScrolling = Infinity;

    texthtmlef = $("#envo_filecontent2").val();
    htmlefACE2.session.setValue(texthtmlef);
  }

  if ($('#htmleditor3').length) {
    var htmlefACE3 = ace.edit("htmleditor3");
    htmlefACE3.setTheme("ace/theme/<?php echo $setting["acetheme"]; ?>");
    htmlefACE3.session.setUseWrapMode(true);
    htmlefACE3.session.setWrapLimitRange(<?php echo $setting["acewraplimit"] . ',' . $setting["acewraplimit"]; ?>);
    htmlefACE3.setOptions({
      // session options
      mode: "ace/mode/<?php echo $acemode3;?>",
      tabSize: <?php echo $setting["acetabSize"]; ?>,
      useSoftTabs: true,
      highlightActiveLine: <?php echo $setting["aceactiveline"]; ?>,
      // renderer options
      showInvisibles: <?php echo $setting["aceinvisible"]; ?>,
      showGutter: <?php echo $setting["acegutter"]; ?>
    });
    // This is to remove following warning message on console:
    // Automatically scrolling cursor into view after selection change this will be disabled in the next version
    // set editor.$blockScrolling = Infinity to disable this message
    htmlefACE3.$blockScrolling = Infinity;

    texthtmlef = $("#footerblocktext1").val();
    htmlefACE3.session.setValue(texthtmlef);
  }

  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    $("#envo_filecontent2").val(htmlefACE2.getValue());
    $("#footerblocktext1").val(htmlefACE3.getValue());
  });
</script>