/*
 * CMS ENVO
 * JS for Facebook Gallery - ADMIN
 * Copyright (c) 2016 - 2017 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Initialisation fo Fileinput Plugin
 * 02. Toggle list and grid view
 *
 */

/** 01. Initialisation fo Fileinput Plugin
 * @require: FileInput Plugin
 ========================================================================*/

$(function () {

  if ($('#images').length) {
    $('#images').fileinput({
      theme: 'fa',
      language: 'cz',
      maxFileSize: 4500,
      allowedFileExtensions: ['jpg', 'png', 'gif'],
      uploadAsync: false,
      uploadUrl: "ajax/uploadfacebook.php", // your upload server url
      maxFileCount: 3,
      layoutTemplates: {
        main1: '{preview}\n' +
        '<div class="input-group {class}">\n' +
        '   <div class="input-group-btn">\n' +
        '       {browse}\n' +
        '       {upload}\n' +
        '       {remove}\n' +
        '   </div>\n' +
        '   {caption}\n' +
        '</div>',
        actions: '<div class="file-actions">\n' +
        '    <div class="file-footer-buttons">\n' +
        '        {upload} {delete} {zoom} {other}' +
        '    </div>\n' +
        '    {drag}\n' +
        '    <div class="file-upload-indicator" title="{indicatorTitle}">{indicator}</div>\n' +
        '    <div class="clearfix"></div>\n' +
        '</div>'
      }
    });
  }

});


/** 02. Toggle list and grid view
 ========================================================================*/

$(function () {

  $('.btn-toggle').click(function () {
    $('.toggle').toggleClass('hidden visible');
    $('.btn-toggle i').toggleClass("fa-th-list fa-th");
  });

});