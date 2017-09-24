<script type="text/javascript">

  /* ACE Editor
   ========================================= */
  if ($('#htmleditor2').length) {
    var htmlefACE2 = ace.edit("htmleditor2");
    htmlefACE2.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>");
    htmlefACE2.session.setUseWrapMode(true);
    htmlefACE2.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
    htmlefACE2.setOptions({
      // session options
      mode: "ace/mode/<?php echo $acemode2;?>",
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
    htmlefACE2.$blockScrolling = Infinity;

    texthtmlef = $("#jak_filecontent2").val();
    htmlefACE2.session.setValue(texthtmlef);
  }

  if ($('#htmleditor3').length) {
    var htmlefACE3 = ace.edit("htmleditor3");
    htmlefACE3.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>");
    htmlefACE3.session.setUseWrapMode(true);
    htmlefACE3.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
    htmlefACE3.setOptions({
      // session options
      mode: "ace/mode/<?php echo $acemode3;?>",
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
    htmlefACE3.$blockScrolling = Infinity;

    texthtmlef = $("#footerblocktext1").val();
    htmlefACE3.session.setValue(texthtmlef);
  }

  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    $("#jak_filecontent2").val(htmlefACE2.getValue());
    $("#footerblocktext1").val(htmlefACE3.getValue());
  });
</script>