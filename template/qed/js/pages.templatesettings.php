<script type="text/javascript">
  $(document).ready(function () {
    $('input[name="onefooterblock"]').change(function(){
      if($(this).val()=="1"){
        $('#footerblock1-2').toggleClass('hidden');
      }
      if($(this).val()=="0"){
        $('#footerblock1-2').toggleClass('hidden');
      }
    });
  });
</script>
<script type="text/javascript">

  /* ACE Editor
   ========================================= */
  if ($('#htmleditor2').length) {
    var htmlefACE2 = ace.edit("htmleditor2");
    htmlefACE2.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
    htmlefACE2.session.setUseWrapMode(true);
    htmlefACE2.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
    htmlefACE2.setOptions({
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
    htmlefACE2.$blockScrolling = Infinity;

    texthtmlef = $("#onefooterblocktext").val();
    htmlefACE2.session.setValue(texthtmlef);
  }

  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    $("#onefooterblocktext").val(htmlefACE2.getValue());
  });
</script>
