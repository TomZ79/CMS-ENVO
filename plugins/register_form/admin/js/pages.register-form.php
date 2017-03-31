<script src="assets/plugins/ace/ace.js" type="text/javascript"></script>
<script type="text/javascript">

  /* ACE Editor
   ========================================= */
  if ($('#htmleditor').length) {
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
    // This is to remove following warning message on console:
    // Automatically scrolling cursor into view after selection change this will be disabled in the next version
    // set editor.$blockScrolling = Infinity to disable this message
    htmlACE.$blockScrolling = Infinity;

    texthtmlel = $("#jak_editor_light").val();
    htmlelACE.session.setValue(texthtmlel);
  }

  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    $("#jak_editor_light").val(htmlelACE.getValue());
  });
</script>