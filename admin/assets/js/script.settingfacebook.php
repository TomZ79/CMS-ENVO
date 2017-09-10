<script src="assets/plugins/ace/ace.js" type="text/javascript"></script>

<script type="text/javascript">

  /* ACE Editor
   ========================================= */
  if ($('#txteditor').length) {
    var txtACE = ace.edit("txteditor");
    txtACE.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
    txtACE.session.setUseWrapMode(true);
    txtACE.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
    txtACE.setOptions({
      // session options
      mode: "ace/mode/<?php echo $acemode;?>",
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
    txtACE.$blockScrolling = Infinity;

    textcontent = $("#jak_filecontent").val();
    txtACE.session.setValue(textcontent);
  }

  if ($('#txteditor1').length) {
    var txtACE1 = ace.edit("txteditor1");
    txtACE1.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
    txtACE1.session.setUseWrapMode(true);
    txtACE1.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
    txtACE1.setOptions({
      // session options
      mode: "ace/mode/<?php echo $acemode;?>",
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
    txtACE1.$blockScrolling = Infinity;

    textcontent1 = $("#jak_filecontent1").val();
    txtACE1.session.setValue(textcontent1);
  }

  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    $("#jak_filecontent").val(txtACE.getValue());
    $("#jak_filecontent1").val(txtACE1.getValue());
  });

  /* Other config
   ========================================= */
  $(document).ready(function () {
    $(".txtautogrow").autoGrow();
  });
</script>
