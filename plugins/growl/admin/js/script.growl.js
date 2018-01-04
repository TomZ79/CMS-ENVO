/*
 * CMS ENVO
 * JS for Plugin Growl - ADMIN
 * Copyright (c) 2016 - 2018 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Basic config for plugin's administration
 * 02. DateTimePicker
 * 03. DataTable Initialisation
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
   *    acetheme: <?php echo json_encode($setting["acetheme"]); ?>,
   *    acewraplimit: <?php echo json_encode($setting["acewraplimit"]); ?>,
   *    acetabSize: <?php echo json_encode($setting["acetabSize"]); ?>,
   *    aceactiveline: <?php echo json_encode($setting["aceactiveline"]); ?>,
   *    aceinvisible: <?php echo json_encode($setting["aceinvisible"]); ?>,
   *    acegutter: <?php echo json_encode($setting["acegutter"]); ?>
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

  texthtml = $('#envo_editor').val();
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
    if ($('#envo_editor').length) {
      $("#envo_editor").val(htmlACE.getValue());
    }
  });

  /* Check all checkbox */
  $('#envo_delete_all').click(function () {
    var checkedStatus = this.checked;
    if (checkedStatus) {
      $('#button_delete').prop('disabled', false);
    } else {
      $('#button_delete').attr('disabled',true);
    }
    $('.highlight').each(function () {
      $(this).prop('checked', checkedStatus);
    });
  });

  /* Disable submit button if checkbox is not checked */
  $('.highlight').change(function () {
    if (this.checked) {
      $('#button_delete').prop('disabled', false);
    } else {
      if ($('.highlight').filter(':checked').length < 1){
        $('#envo_delete_all').prop('checked', false);
        $('#button_delete').attr('disabled',true);
      }
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

/** 03. DataTable Initialisation
 * @require: DataTable Plugin
 ========================================================================*/

$(function () {

  // If exist 'table' -> init Plugin DataTable
  if ($('#growl_table').length > 0) {
    $('#growl_table').dataTable({
      // Language
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Czech.json"
      },

      "order": [],
      "columnDefs": [{
        "targets": 'no-sort',
        "orderable": false
      }],
      // Page lenght
      "pageLength": dataTablesSettings.pageLenght,
      // Show entries
      //"lengthMenu": [ [10,20, -1], [10,20, "All"] ],
      // Design Table items
      "dom": "<'row'<'col-sm-6'<'pull-left m-b-20'f>><'col-sm-6'<'pull-right m-r-20 hidden-xs'B>>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-7'i><'col-sm-5'p>>",
      // Init bootstrap responsive table for mobile
      "initComplete": function (settings, json) {
        $(this).wrap('<div class="table-responsive"></div>');
      }
    });
  }

});