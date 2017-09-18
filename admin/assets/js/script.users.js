/*
 * CMS ENVO
 * JS for Users - ADMIN
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

$(function () {

  /* Check all checkbox */
  $("#jak_delete_all").click(function () {
    var checkedStatus = this.checked;
    $(".highlight").each(function () {
      $(this).prop('checked', checkedStatus);
    });
    $('#button_delete').prop('disabled', function (i, v) {
      return !v;
    });
  });

  /* Check all checkbox */
  $("#jak_delete_all_approve").click(function () {
    var checkedStatus = this.checked;
    $(".highlight_approve").each(function () {
      $(this).prop('checked', checkedStatus);
    });
    $('#button_delete_approve').prop('disabled', function (i, v) {
      return !v;
    });
  });

  /* Disable submit button if checkbox is not checked */
  $(".highlight").change(function () {
    if (this.checked) {
      $("#button_delete").removeAttr("disabled");
    } else {
      $("#button_delete").attr("disabled", "disabled");
    }
  });

  /* Disable submit button if checkbox is not checked */
  $(".highlight_approve").change(function () {
    if (this.checked) {
      $("#button_delete_approve").removeAttr("disabled");
    } else {
      $("#button_delete_approve").attr("disabled", "disabled");
    }
  });

});

/** 02. DateTimePicker
 * @require: DateTimePicker Plugin
 ========================================================================*/

$(function () {

  /* DateTimePicker
   ========================================= */
  $('#datepicker').datetimepicker({
    // Language
    locale: envoWeb.envo_lang,
    // Date-Time format
    format: 'YYYY-MM-DD HH:mm:ss',
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
    keepInvalid: true,
    minDate: moment()
  });

});