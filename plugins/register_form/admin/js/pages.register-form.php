<script src="assets/plugins/ace/ace.js" type="text/javascript"></script>
<script type="text/javascript">

  /* ACE Editor
   ========================================= */
  if ($('#htmleditorlight').length) {
    var htmlACE = ace.edit("htmleditorlight");
    htmlACE.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
    htmlACE.session.setUseWrapMode(true);
    htmlACE.session.setWrapLimitRange(80,80);
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

    texthtml = $("#jak_editor_light").val();
    htmlACE.session.setValue(texthtml);
  }

  if ($('#htmleditorlight1').length) {
    var htmlACE1 = ace.edit("htmleditorlight1");
    htmlACE1.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
    htmlACE1.session.setUseWrapMode(true);
    htmlACE1.session.setWrapLimitRange(80,80);
    htmlACE1.setOptions({
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
    htmlACE1.$blockScrolling = Infinity;

    texthtml = $("#jak_editor_light1").val();
    htmlACE1.session.setValue(texthtml);
  }

  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    if ($('#jak_editor_light').length) {
      $("#jak_editor_light").val(htmlACE.getValue());
      $("#jak_editor_light1").val(htmlACE1.getValue());
    }
  });
</script>