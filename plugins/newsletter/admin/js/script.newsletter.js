/*
 * CMS ENVO
 * JS for Plugin Newsletter - ADMIN
 * Copyright (c) 2016 - 2017 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Basic config for plugin's administration
 * 02. Show/Hide block form SMTP settings
 * 03. Short Code Insert to TinyMCE
 * 04. TinyMCE Initialisation
 * 05. Show iFrame in modal - Newsletter
 * 06. JavaScript to disable send button and show loading.gif image
 *
 */

/** 01. Basic config for plugin's administration
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

/** 02. Show/Hide block form SMTP settings
 ========================================================================*/

$(function () {

  $("input[name=envo_smpt]:radio").change(function () {
    if ($('input[name=envo_smpt]:checked').val() == "1") {
      $('#smtpsettings').show();

    } else if ($('input[name=envo_smpt]:checked').val() == "0") {
      $('#smtpsettings').hide();

    }
  });

});

/** 03. Short Code Insert to TinyMCE
 * @require: TinyMCE Plugin
 ========================================================================*/

$(function () {

  $(".short-sc").click(function () {
    var myField = tinyMCE.get($(this).data('short-scf'));
    if (document.selection) {
      myField.focus();
      sel = document.selection.createRange();
      sel.text = $(this).find('span').html();
    }
    else if (document.getSelection) {
      tinyMCE.activeEditor.selection.setContent($(this).find('span').html());
      myField.focus();
    }
  });

});

/** 04. TinyMCE Initialisation
 * @require: TinyMCE Plugin
 ========================================================================*/

$(function () {

  tinymce.init({
    selector: "textarea.envoEditorF, textarea.envoEditorF2, textarea.envoEditorF3",
    theme: "modern",
    width: "100%",
    height: 500,
    language: envoWeb.envo_lang,
    plugins: [
      "advlist autolink link image lists charmap preview hr anchor pagebreak fullpage",
      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
      "save table contextmenu directionality emoticons paste textcolor responsivefilemanager clientcode bootstrap3"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image | preview media fullpage | forecolor backcolor emoticons | clientcode fullpage bootstrap3",
    statusbar: false,
    image_advtab: true,
    relative_urls: false,
    convert_urls: false,
    remove_script_host: true,
    document_base_url: "/",
    valid_elements: "*[*]",
    external_filemanager_path: "../assets/plugins/tinymce/plugins/filemanager/",
    filemanager_title: "Filemanager",
    external_plugins: {"filemanager": "plugins/filemanager/plugin.min.js"}
  });

});

/** 05. Show iFrame in modal - Newsletter
 ========================================================================*/

$(function () {

  // Show iFrame in modal - Newsletter preview
  $('.nlprev').on('click', function (e) {
    e.preventDefault();
    frameSrc = $(this).attr("href");
    $('#ENVOModalLabel').html("FileManager");
    $('#ENVOModal').one('shown.bs.modal', function (e) {
      $('#ENVOModal .modal-dialog').addClass('modal-w-70p');
      $('.body-content').html('<iframe src="' + frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">');
    }).one('hidden.bs.modal', function (e) {
      $(".body-content").html('');
    }).modal('show');
  });

  $(".nlTheme").click(function () {
    if (!confirm('<?php echo $tlnl["newsletter_notification"]["skin"];?>')) return false;
    $.ajax({
      type: "POST",
      url: '../plugins/newsletter/admin/ajax/loadskin.php',
      data: "skinUrl=" + $(this).attr("id"),
      dataType: 'json',
      beforeSend: function (x) {
        $('#spinner').css('visibility', 'visible');
      },
      success: function (msg) {

        setTimeout(function () {
          $('#spinner').css('visibility', 'hidden');
        }, 2000);

        if (parseInt(msg.status) != 1) {
          return false;
        } else {
          tinymce.activeEditor.insertContent(msg.rcontent);
        }

      }
    });
  });

  // Show iFrame in modal - Newsletter statistic
  $('.nlbox').on('click', function (e) {
    e.preventDefault();
    frameSrc = $(this).attr("href");
    $('#ENVOModalLabel').html("FileManager");
    $('#ENVOModal').one('shown.bs.modal', function (e) {
      $('#ENVOModal .modal-dialog').addClass('modal-w-70p');
      $('.body-content').html('<iframe src="' + frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">');
    }).one('hidden.bs.modal', function (e) {
      $(".body-content").html('');
    }).modal('show');
  });

});

/** 06. JavaScript to disable send button and show loading.gif image
 ========================================================================*/

$(function () {

  // Button 'Send Mail'
  $('button[name = "btnSendMail"]').on('click', function () {
    var $this = $(this);
    $this.button('loading');
    setTimeout(function () {
      $this.button('reset');
    }, 1000);
  });

});