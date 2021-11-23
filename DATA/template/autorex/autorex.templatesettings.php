<?php
// EN: Start a PHP Session
// CZ: Start PHP Session
session_start();
?>

<style>
    #htmleditor2,
    #htmleditor3,
    #htmleditor4,
    #htmleditor5 {
      height: 200px !important;
    }
    #htmleditor6 {
      height: 500px !important;
    }
</style>

<script>

  /* Clear document root
 ========================================= */
  $('#btncleardark').click(function () {
    var inputid = $('#MainLogoDark');
    var spanid = $('#docurootdark');
    var inputval = inputid.val();
    var spantext = spanid.text();
    input = inputval.replace(spantext, '');
    inputid.val(input);
  });

  $('#btnclearlight').click(function () {
    var inputid = $('#MainLogoLight');
    var spanid = $('#docurootlight');
    var inputval = inputid.val();
    var spantext = spanid.text();
    input = inputval.replace(spantext, '');
    inputid.val(input);
  });

  /* ACE Editor
   ========================================= */
  if ($('#htmleditor2').length) {
    var htmlefACE2 = ace.edit("htmleditor2");
    htmlefACE2.setTheme("ace/theme/<?=$setting["acetheme"]?>");
    htmlefACE2.session.setUseWrapMode(true);
    htmlefACE2.session.setWrapLimitRange(<?=$setting["acewraplimit"] . ',' . $setting["acewraplimit"]?>);
    htmlefACE2.setOptions({
      // session options
      mode: "ace/mode/<?=$_SESSION['acemode3']?>",
      tabSize: <?=$setting["acetabSize"]?>,
      useSoftTabs: true,
      highlightActiveLine: <?=$setting["aceactiveline"]?>,
      // renderer options
      showInvisibles: <?=$setting["aceinvisible"]?>,
      showGutter: <?=$setting["acegutter"]?>,
      // lines
      maxLines: 10
    });
    // This is to remove following warning message on console:
    // Automatically scrolling cursor into view after selection change this will be disabled in the next version
    // set editor.$blockScrolling = Infinity to disable this message
    htmlefACE2.$blockScrolling = Infinity;

    texthtmlef = $("#FooterUpper").val();
    htmlefACE2.session.setValue(texthtmlef);
  }

  if ($('#htmleditor3').length) {
    var htmlefACE3 = ace.edit("htmleditor3");
    htmlefACE3.setTheme("ace/theme/<?=$setting["acetheme"]?>");
    htmlefACE3.session.setUseWrapMode(true);
    htmlefACE3.session.setWrapLimitRange(<?=$setting["acewraplimit"] . ',' . $setting["acewraplimit"]?>);
    htmlefACE3.setOptions({
      // session options
      mode: "ace/mode/<?=$_SESSION['acemode3']?>",
      tabSize: <?=$setting["acetabSize"]?>,
      useSoftTabs: true,
      highlightActiveLine: <?=$setting["aceactiveline"]?>,
      // renderer options
      showInvisibles: <?=$setting["aceinvisible"]?>,
      showGutter: <?=$setting["acegutter"]?>,
      // lines
      maxLines: 10
    });
    // This is to remove following warning message on console:
    // Automatically scrolling cursor into view after selection change this will be disabled in the next version
    // set editor.$blockScrolling = Infinity to disable this message
    htmlefACE3.$blockScrolling = Infinity;

    texthtmlef = $("#FooterBox1").val();
    htmlefACE3.session.setValue(texthtmlef);
  }

  if ($('#htmleditor4').length) {
    var htmlefACE4 = ace.edit("htmleditor4");
    htmlefACE4.setTheme("ace/theme/<?=$setting["acetheme"]?>");
    htmlefACE4.session.setUseWrapMode(true);
    htmlefACE4.session.setWrapLimitRange(<?=$setting["acewraplimit"] . ',' . $setting["acewraplimit"]?>);
    htmlefACE4.setOptions({
      // session options
      mode: "ace/mode/<?=$_SESSION['acemode3']?>",
      tabSize: <?=$setting["acetabSize"]?>,
      useSoftTabs: true,
      highlightActiveLine: <?=$setting["aceactiveline"]?>,
      // renderer options
      showInvisibles: <?=$setting["aceinvisible"]?>,
      showGutter: <?=$setting["acegutter"]?>,
      // lines
      maxLines: 10
    });
    // This is to remove following warning message on console:
    // Automatically scrolling cursor into view after selection change this will be disabled in the next version
    // set editor.$blockScrolling = Infinity to disable this message
    htmlefACE4.$blockScrolling = Infinity;

    texthtmlef = $("#FooterBox2").val();
    htmlefACE4.session.setValue(texthtmlef);
  }

  if ($('#htmleditor5').length) {
    var htmlefACE5 = ace.edit("htmleditor5");
    htmlefACE5.setTheme("ace/theme/<?=$setting["acetheme"]?>");
    htmlefACE5.session.setUseWrapMode(true);
    htmlefACE5.session.setWrapLimitRange(<?=$setting["acewraplimit"] . ',' . $setting["acewraplimit"]?>);
    htmlefACE5.setOptions({
      // session options
      mode: "ace/mode/<?=$_SESSION['acemode3']?>",
      tabSize: <?=$setting["acetabSize"]?>,
      useSoftTabs: true,
      highlightActiveLine: <?=$setting["aceactiveline"]?>,
      // renderer options
      showInvisibles: <?=$setting["aceinvisible"]?>,
      showGutter: <?=$setting["acegutter"]?>,
      // lines
      maxLines: 10
    });
    // This is to remove following warning message on console:
    // Automatically scrolling cursor into view after selection change this will be disabled in the next version
    // set editor.$blockScrolling = Infinity to disable this message
    htmlefACE5.$blockScrolling = Infinity;

    texthtmlef = $("#FooterBox3").val();
    htmlefACE5.session.setValue(texthtmlef);
  }

  if ($('#htmleditor6').length) {
    var htmlefACE6 = ace.edit("htmleditor6");
    htmlefACE6.setTheme("ace/theme/<?=$setting["acetheme"]?>");
    htmlefACE6.session.setUseWrapMode(true);
    htmlefACE6.session.setWrapLimitRange(<?=$setting["acewraplimit"] . ',' . $setting["acewraplimit"]?>);
    htmlefACE6.setOptions({
      // session options
      mode: "ace/mode/<?=$_SESSION['acemode4']?>",
      tabSize: <?=$setting["acetabSize"]?>,
      useSoftTabs: true,
      highlightActiveLine: <?=$setting["aceactiveline"]?>,
      // renderer options
      showInvisibles: <?=$setting["aceinvisible"]?>,
      showGutter: <?=$setting["acegutter"]?>,
      // lines
      // maxLines: 40
    });
    // This is to remove following warning message on console:
    // Automatically scrolling cursor into view after selection change this will be disabled in the next version
    // set editor.$blockScrolling = Infinity to disable this message
    htmlefACE6.$blockScrolling = Infinity;

    texthtmlef = $("#envo_filecontent_1").val();
    htmlefACE6.session.setValue(texthtmlef);
  }

  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    $("#FooterUpper").val(htmlefACE2.getValue());
    $("#FooterBox1").val(htmlefACE3.getValue());
    $("#FooterBox2").val(htmlefACE4.getValue());
    $("#FooterBox3").val(htmlefACE5.getValue());
    $("#envo_filecontent_1").val(htmlefACE6.getValue());
  });
</script>