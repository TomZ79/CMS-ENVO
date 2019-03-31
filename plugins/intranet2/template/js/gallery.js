/*
 * CMS ENVO
 * JS for Plugin Intranet - Frontend
 * Copyright (c) 2016 - 2019 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 */

/**
 * @description  Debounce so filtering doesn't happen every millisecond
 */
function debounce(fn, threshold) {
  var timeout;
  return function debounced() {
    if (timeout) {
      clearTimeout(timeout);
    }

    function delayed() {
      fn();
      timeout = null;
    }

    setTimeout(delayed, threshold || 100);
  };
}

/** 01. ISOTOPE PHOTO GALLERY
 * @require: Isotope Plugin
 ========================================================================*/
$(function () {

  'use strict';

  // -------- Init FUNCTION ----------//
  // Quick search regex
  var qsRegexImg;
  // Filter for the buttons
  var filtersImg;

  // Init Isotope
  var $imggallery = $('#imggallery1');
  $imggallery.isotope({
    itemSelector: 'div[class^="gallery-item-"]',
    masonry: {
      columnWidth: $imggallery.width() / 3,
      gutter: 15,         // The horizontal space between item elements
      fitWidth: true
    },
    filter: function () {
      var $this = $(this);
      var searchResultImg = qsRegexImg ? $this.text().match(qsRegexImg) : true;
      var buttonResultImg = filtersImg ? $this.is(filtersImg) : true;
      return searchResultImg && buttonResultImg;
    }

  });

  // -------- Filter FUNCTION ----------//
  $('#imgfilters').on('click', '.filter', function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    var $this = $(this);
    // set filter for group
    filtersImg = $(this).attr('data-filter');
    $imggallery.isotope({ filter: filtersImg });
  });

  // Change is-checked class on buttons
  $('#imgfilters .filter').on('click', function () {
    $('#imgfilters').find('.active').removeClass('active');
    $(this).addClass('active');
  });

  // ----------- Search FUNCTION --------//
  // Use value of search field to filter
  var $quicksearchimg = $('#quicksearchimg').keyup(debounce(function () {
    qsRegexImg = new RegExp($quicksearchimg.val(), 'gi');
    $imggallery.isotope();
  }, 200));

  // ----------- Other FUNCTION --------//
  $('a[href="#tabs9"]').on('shown.bs.tab', function (e) {
    $imggallery.isotope('layout');
  });

  $('#showPhotoList').on('click', (function (e) {

    $(this).removeClass('btn-info').addClass('btn-success');
    $('#showFiltrPhoto').removeClass('btn-success').addClass('btn-info');
    $('#list_photo').fadeIn(500);
    $('#isotope_photo').fadeOut(500);

  }));

  $('#showFiltrPhoto').on('click', (function (e) {

    $(this).removeClass('btn-info').addClass('btn-success');
    $('#showPhotoList').removeClass('btn-success').addClass('btn-info');
    $('#isotope_photo').fadeIn(500);
    $('#list_photo').fadeOut(500);
    setTimeout(function () {
      $imggallery.isotope('layout');
    }, 500);

  }));

});

/** 00. ISOTOPE VIDEO GALLERY
 * @require: Isotope Plugin
 ========================================================================*/
$(function () {

  'use strict';

  // -------- Init FUNCTION ----------//
  // Quick search regex
  var qsRegexVideo;
  // Filter for the buttons
  var filtersVideo;

  // Init Isotope
  var $videogallery = $('#videogallery');
  $videogallery.isotope({
    itemSelector: 'div[class^="gallery-item-"]',
    masonry: {
      columnWidth: $videogallery.width() / 3,
      gutter: 15,         // The horizontal space between item elements
      fitWidth: true
    },
    filter: function () {
      var $this = $(this);
      var searchResultVideo = qsRegexVideo ? $this.text().match(qsRegexVideo) : true;
      var buttonResultVideo = filtersVideo ? $this.is(filtersVideo) : true;
      return searchResultVideo && buttonResultVideo;
    }

  });

  // -------- Filter FUNCTION ----------//
  $('#videofilters').on('click', '.filter', function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    var $this = $(this);
    // set filter for group
    filtersVideo = $(this).attr('data-filter');
    // set filter for Isotope
    $videogallery.isotope({ filter: filtersVideo });
  });

  // Change is-checked class on buttons
  $('#videofilters .filter').on('click', function () {
    $('#videofilters').find('.active').removeClass('active');
    $(this).addClass('active');
  });

  // ----------- Search FUNCTION --------//
  // Use value of search field to filter
  var $quicksearchvideo = $('#quicksearchvideo').keyup(debounce(function () {
    qsRegexVideo = new RegExp($quicksearchvideo.val(), 'gi');
    $videogallery.isotope();
  }, 200));

  // ----------- Reset FUNCTION --------//
  // https://codepen.io/desandro/pen/pJPwpy
  $('#resetvideofilter').on( 'click', function() {
    // reset filters
    filtersVideo = {};
    $videogallery.isotope({ filter: '*' });
  });

  // ----------- Other FUNCTION --------//
  $('a[href="#tabs10"]').on('shown.bs.tab', function (e) {
    $videogallery.isotope('layout');
  });

});


/** 02. Fancybox initialisation
 * @require: Fancybox 3 Plugin
 ========================================================================*/

$(function () {

  'use strict';

  // Update download link source
  $('[data-fancybox]').fancybox({
    // Internationalization
    lang: envoWebIntranet2.envo_lang,
    i18n: {
      'en': {
        DOWNLOAD: 'Download Image'
      },
      'cs': {
        CLOSE: 'Zavřít',
        NEXT: 'Další',
        PREV: 'Předchozí',
        ERROR: 'Požadovaný obsah nemůže být načten. <br/> Zkuste to prosím později.',
        PLAY_START: 'Start Slideshow',
        PLAY_STOP: 'Pause Slideshow',
        FULL_SCREEN: 'Celá Obrazovka',
        THUMBS: 'Náhledy',
        DOWNLOAD: 'Stáhnout Obrázek',
        ZOOM: "Zoom"
      }
    },
    buttons: [
      "zoom",
      "fullScreen",
      "download",
      "thumbs",
      "close"
    ],
    thumbs : {
      autoStart : true
    }
  });

});

/** 03. XXXX
 * @require: Codrops DialogFx Plugin
 * @example
 * Attribute 'data-dialog' in button => ID of dialog 'div' block
 * -----------------
 * <button class="dialog-open-info" type="button" data-dialog="itemDetails"></button>
 *
 *  <div id="itemDetails" class="dialog item-details">
 *    <div class="dialog__overlay"></div>
 *    <div class="dialog__content">
 *      <div class="container-fluid">
 *        <div class="row dialog__overview">
 *          <!-- Data over AJAX  -->
 *        </div>
 *      </div>
 *      <button class="close action top-right" type="button" data-dialog-close>
 *        <i class="pg-close fs-14"></i>
 *      </button>
 *    </div>
 *  </div>
 ========================================================================*/

$(function () {

  'use strict';

  $('.dialog-open-img-info').on('click', function () {
    // Get Data-Dialog
    var thisDataDialog = $(this).attr('data-dialog');
    // Get ID of image
    var imageID = $(this).attr('data-id');

    // Ajax
    $.ajax({
      url: '/plugins/intranet2/template/ajax/int2_table_dialog_img.php',
      type: 'POST',
      datatype: 'html',
      data: {
        imageID: imageID
      },
      beforeSend: function () {

        // Show progress circle
        $('#itemDetails .dialog__overview').html('<div style="display:block;position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20">Načítání ... Prosím počkejte</div></div>');

      },
      success: function (data) {

        setTimeout(function () {
          // Add html data to 'div'
          $('#itemDetails .dialog__overview').hide().html(data).fadeIn(900);

        }, 1000);

      },
      error: function () {

      }
    });

    // Open DialogFX
    var dialogEl = document.getElementById(thisDataDialog);
    var dlg = new DialogFx(dialogEl);
    dlg.toggle(dlg);
  });

  $('.dialog-open-video-info').on('click', function () {
    // Get Data-Dialog
    var thisDataDialog = $(this).attr('data-dialog');
    // Get ID of video
    var videoID = $(this).attr('data-id');

    // Ajax
    $.ajax({
      url: '/plugins/intranet2/template/ajax/int2_table_dialog_video.php',
      type: 'POST',
      datatype: 'html',
      data: {
        videoID: videoID
      },
      beforeSend: function () {

        // Show progress circle
        $('#itemDetails .dialog__overview').html('<div style="display:block;position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20">Načítání ... Prosím počkejte</div></div>');

      },
      success: function (data) {

        setTimeout(function () {
          // Add html data to 'div'
          $('#itemDetails .dialog__overview').hide().html(data).fadeIn(900);

        }, 1000);

      },
      error: function () {

      }
    });

    // Open DialogFX
    var dialogEl = document.getElementById(thisDataDialog);
    var dlg = new DialogFx(dialogEl);
    dlg.toggle(dlg);
  });

});
