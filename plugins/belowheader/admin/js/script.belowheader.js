/*
 * CMS ENVO
 * JS for Belowheader - ADMIN
 * Copyright (c) 2016 - 2017 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Basic config for plugin's administration
 *
 */


/** 01. Basic config for plugin's administration
 ========================================================================*/

/** ACE Editor
 * Initialisation of ACE Editor
 * @require: ACE Editor Plugin
 *
 * Set variable in php file as array (script.tv-tower.php)
 * @param: 'aceEditor.acetheme' from generated_js.php
 * @param: 'aceEditor.acewraplimit' from generated_js.php
 * @param: 'aceEditor.acetabSize' from generated_js.php
 * @param: 'aceEditor.aceactiveline' from generated_js.php
 * @param: 'aceEditor.aceinvisible' from generated_js.php
 * @param: 'aceEditor.acegutter' from generated_js.php
 *
 * @example: Example add other variable setting to aceEditor object in script.download.php
 *
 * <script>
 *  // Add to aceEditor settings javascript object
 *  aceEditor['otherconfigvariable'] = <?php echo json_encode($othervalue); ?>;
 * </script>
 ========================================= */
// Set WrapLimitRange from generated_js.php
$wrapLimitRange = {
  min: aceEditor.acewraplimit,
  max: aceEditor.acewraplimit
};

// ACE editor 1
if ($('#htmleditor').length) {
  var htmlACE = ace.edit('htmleditor');
  htmlACE.setTheme('ace/theme/' + aceEditor.acetheme);
  htmlACE.session.setUseWrapMode(true);
  htmlACE.session.setWrapLimitRange($wrapLimitRange.min, $wrapLimitRange.max);
  htmlACE.setOptions({
    // session options
    mode: "ace/mode/html",
    tabSize: aceEditor.acetabSize,
    useSoftTabs: true,
    highlightActiveLine: aceEditor.aceactiveline,
    // renderer options
    showInvisibles: aceEditor.aceinvisible,
    showGutter: aceEditor.acegutter
  });
  // This is to remove following warning message on console:
  // Automatically scrolling cursor into view after selection change this will be disabled in the next version
  // set editor.$blockScrolling = Infinity to disable this message
  htmlACE.$blockScrolling = Infinity;

  var texthtml = $("#envo_editor").val();
  htmlACE.session.setValue(texthtml);
}

// ACE editor 2
if ($('#htmleditor2').length) {
  var htmlACE2 = ace.edit('htmleditor2');
  htmlACE2.setTheme('ace/theme/' + aceEditor.acetheme);
  htmlACE2.session.setUseWrapMode(true);
  htmlACE2.session.setWrapLimitRange($wrapLimitRange.min, $wrapLimitRange.max);
  htmlACE2.setOptions({
    // session options
    mode: "ace/mode/html",
    tabSize: aceEditor.acetabSize,
    useSoftTabs: true,
    highlightActiveLine: aceEditor.aceactiveline,
    // renderer options
    showInvisibles: aceEditor.aceinvisible,
    showGutter: aceEditor.acegutter
  });
  // This is to remove following warning message on console:
  // Automatically scrolling cursor into view after selection change this will be disabled in the next version
  // set editor.$blockScrolling = Infinity to disable this message
  htmlACE2.$blockScrolling = Infinity;

  var texthtml = $("#envo_editor2").val();
  htmlACE2.session.setValue(texthtml);
}

/* Responsive Filemanager
 * @require: TinyMCE Filemanager Plugin
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

$(function () {

  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    if ($('#envo_editor').length) {
      $("#envo_editor").val(htmlACE.getValue());
    }
    if ($('#envo_editor2').length) {
      $("#envo_editor2").val(htmlACE2.getValue());
    }
  });

  /* Check all checkbox
   ========================================= */
  $("#envo_delete_all").click(function () {
    var checkedStatus = this.checked;
    $(".highlight").each(function () {
      $(this).prop('checked', checkedStatus);
    });
    $('#button_delete').prop('disabled', function (i, v) {
      return !v;
    });
  });

  /* Disable submit button if checkbox is not checked
   ========================================= */
  $(".highlight").change(function () {
    if (this.checked) {
      $("#button_delete").removeAttr("disabled");
    } else {
      $("#button_delete").attr("disabled", "disabled");
    }
  });

});