/*
 *
 * CMS ENVO
 * JS for Plugin URL Mapping - Admin
 * Copyright © 2016 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 */

/** 01.
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

  $('#jak_newurl').keyup(function () {
    this.value = this.value.replace(/[^a-zA-Z0-9\-_.]/g, '');
  });

  $('#jak_newurl').bind("keypress click", function () {
    $("#0").prop("checked", true);
  });

});