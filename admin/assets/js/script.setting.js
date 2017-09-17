/*
 * CMS ENVO
 * JS for Settings - Admin
 * Copyright © 2016 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Show/Hide block form SMTP settings
 * 02. AutoGrow text block
 */


/** 01. Show/Hide block form SMTP settings
 ========================================================================*/

$(function () {

  $("input[name=jak_smpt]:radio").change(function () {
    if ($('input[name=jak_smpt]:checked').val() == "1") {
      $('#smtpsettings').show();

    } else if ($('input[name=jak_smpt]:checked').val() == "0") {
      $('#smtpsettings').hide();

    }
  });

});

/** 02. AutoGrow text block
 * @required_plugin: AutoGrow Plugin
 ========================================================================*/

$(function () {

  $(".txtautogrow").autoGrow();

});