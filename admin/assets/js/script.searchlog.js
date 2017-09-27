/*
 * CMS ENVO
 * JS for Search Log - ADMIN
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

$(function () {

  /* Check all checkbox */
  $('#envo_delete_all').click(function () {
    var checkedStatus = this.checked;
    $('.highlight').each(function () {
      $(this).prop('checked', checkedStatus);
    });
    $('#button_delete').prop('disabled', function (i, v) {
      return !v;
    });
  });

  /* Disable submit button if checkbox is not checked */
  $('.highlight').change(function () {
    if (this.checked) {
      $('#button_delete').removeAttr("disabled");
    } else {
      $('#button_delete').attr("disabled", "disabled");
    }
  });

});