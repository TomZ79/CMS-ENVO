/*
 * CMS ENVO
 * JS for Plugin Site Editor - ADMIN
 * Copyright (c) 2016 - 2018 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Textarea - readonly
 *
 */

/** 01. Textarea - readonly
 ========================================================================*/

$(function () {

  $("#editfile1").click(function (event) {
    event.preventDefault();
    $('#envo_file1, button[name="save1"]').removeAttr("readonly");
    $('button[name="reset1"]').removeClass("hidden");
    $(this).addClass("hidden");

    var txt = $("#envo_file1");
    var time = new Date();

    if (txt.val().indexOf('CMS Robots File' && 'Last change') != -1) { // Value in txt = true

      var lines = $('#envo_file1').val().split(/\n/);
      lines[1] = "#Last change - " + time;
      $("#envo_file1").html(lines.join("\n"));

    } else {

      txt.val("#CMS Robots File\n#Last change - " + time + "\n\n" + txt.val());

    }
  });

});
