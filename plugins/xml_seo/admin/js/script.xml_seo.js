/*
 * CMS ENVO
 * JS for Plugin XML Seo - ADMIN
 * Copyright (c) 2016 - 2017 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Step Form wizard initialisation
 *
 */

/** 01. Step Form wizard initialisation
 * @require: Step Form Wizard plugin
 ========================================================================*/

$(function () {

  $("#wizard_example").stepFormWizard({
    height: 'auto',
    nextBtn: $('<a class="next-btn sf-right sf-btn" href="#">' + stepForm.nextBtn + '</a>'),
    prevBtn: $('<a class="prev-btn sf-left sf-btn" href="#">' + stepForm.prevBtn + '</a>'),
    finishBtn: $('<a class="finish-btn sf-right sf-btn" href="#">' + stepForm.finishBtn + '</a>'),
    onNext: function(i) {
      // Step 0 -> 1
      if(i == '0') {
        // Get folder path
        var baseurl = envoWeb.envo_url_orig;

        if($("input[name='jak_xmlseopath']").val()) {
          var inputval = $("input[name='jak_xmlseopath']").val() + '/';
        } else {
          var inputval = '';
        }

        var sitemap = 'Sitemap: ' + baseurl.slice(0, -1) + '/' + inputval + 'sitemap.xml';
        $('#sitemapcode').text( sitemap );

        // Change date in file
        var txt = $("#jak_filetxt");
        var time = new Date();

        if (txt.val().indexOf('CMS Robots File' && 'Last change') != -1) { // Value in txt = true

          var lines = $('#jak_filetxt').val().split(/\n/);
          lines[1] = "#Last change - " + time;
          $("#jak_filetxt").html(lines.join("\n"));

        } else {

          txt.val("#CMS Robots File\n#Last change - " + time + "\n\n" + txt.val());

        }
      }

      return true; // move to next step
    }
  });

});