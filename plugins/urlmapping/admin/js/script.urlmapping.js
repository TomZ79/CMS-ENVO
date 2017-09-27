/*
 * CMS ENVO
 * JS for Plugin URL Mapping - ADMIN
 * Copyright (c) 2016 - 2017 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 */

/** 01.
 ========================================================================*/

$(function () {

  /* Check all checkbox */
  $("#envo_delete_all").click(function () {
    var checkedStatus = this.checked;
    $(".highlight").each(function () {
      $(this).prop('checked', checkedStatus);
    });
    $('#button_delete').prop('disabled', function (i, v) {
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

});

/** 02.
 ========================================================================*/

$(function () {

  $('#envo_newurl').keyup(function () {
    this.value = this.value.replace(/[^a-zA-Z0-9\-_.]/g, '');
  });

  $('#envo_newurl').bind("keypress click", function () {
    $("#0").prop("checked", true);
  });

});