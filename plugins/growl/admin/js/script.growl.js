/*
 * CMS ENVO
 * JS for Plugin Growl - ADMIN
 * Copyright (c) 2016 - 2017 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Basic config for plugin's administration
 * 02. DateTimePicker
 *
 */

/** 01. Basic config for plugin's administration
 ========================================================================*/

/** ACE Editor
 * Initialisation of ACE Editor
 * @require: ACE Editor Plugin
 * @variable_setting: Set variable in php file as array (script.tv-tower.php)
 *
 * @example: Example variable setting
 *
 * var aceEditor = {
   *    acetheme: <?php echo json_encode($jkv["acetheme"]); ?>,
   *    acewraplimit: <?php echo json_encode($jkv["acewraplimit"]); ?>,
   *    acetabSize: <?php echo json_encode($jkv["acetabSize"]); ?>,
   *    aceactiveline: <?php echo json_encode($jkv["aceactiveline"]); ?>,
   *    aceinvisible: <?php echo json_encode($jkv["aceinvisible"]); ?>,
   *    acegutter: <?php echo json_encode($jkv["acegutter"]); ?>
   * };
 ========================================= */
// Set WrapLimitRange from generated_js.php
$wrapLimitRange = {
  min: aceEditor.acewraplimit,
  max: aceEditor.acewraplimit
};


if ($('#htmleditor').length) {
  var htmlACE = ace.edit('htmleditor');
  htmlACE.setTheme('ace/theme/' + aceEditor.acetheme);
  htmlACE.session.setUseWrapMode(true);
  htmlACE.session.setWrapLimitRange($wrapLimitRange.min, $wrapLimitRange.max);
  htmlACE.setOptions({
    // session options
    mode: "ace/mode/ini",
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

  texthtml = $('#jak_editor').val();
  htmlACE.session.setValue(texthtml);
}

/* Responsive Filemanager
 ========================================= */
function responsive_filemanager_callback(field_id) {

  if (field_id == "htmleditor") {
    // get the path for the ace file
    var acefile = jQuery('#' + field_id).val();
    htmlACE.insert(acefile);
  }
}

$(function () {
  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    if ($('#jak_editor').length) {
      $("#jak_editor").val(htmlACE.getValue());
    }
  });

  /* Check all checkbox
   ========================================= */
  $("#jak_delete_all").click(function () {
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

/** 02. DateTimePicker
 * @require: DateTimePicker Plugin
 ========================================================================*/

$(function () {

  /* DateTimePicker
   ========================================= */
  $('#datepickerFrom').datetimepicker({
    // Language
    locale: envoWeb.envo_lang,
    // Date-Time format
    format: 'YYYY-MM-DD HH:mm',
    // Icons
    icons: $.AdminEnvo.DateTimepicker.icons(),
    // Tooltips
    tooltips: $.AdminEnvo.DateTimepicker.tooltips(),
    // Show Button
    showTodayButton: true,
    showClear: true,
    // Other
    calendarWeeks: true,
    ignoreReadonly: true,
    keepInvalid: true
  });

  $('#datepickerTo').datetimepicker({
    // Language
    locale: envoWeb.envo_lang,
    // Date-Time format
    format: 'YYYY-MM-DD HH:mm',
    // Icons
    icons: $.AdminEnvo.DateTimepicker.icons(),
    // Tooltips
    tooltips: $.AdminEnvo.DateTimepicker.tooltips(),
    // Show Button
    showTodayButton: true,
    showClear: true,
    // Other
    calendarWeeks: true,
    ignoreReadonly: true,
    useCurrent: false //Important! See issue #1075
  });

  $("#datepickerFrom").on("dp.change", function (e) {
    $('#datepickerTo').data("DateTimePicker").minDate(e.date);
  });
  $("#datepickerTo").on("dp.change", function (e) {
    $('#datepickerFrom').data("DateTimePicker").maxDate(e.date);
  });

});