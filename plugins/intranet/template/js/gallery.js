/*
 * CMS ENVO
 * JS for Plugin Intranet - Frontend
 * Copyright (c) 2016 - 2018 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Isotope photo gallery
 * 02. Fancybox initialisation
 *
 */

/** 01. ISOTOPE PHOTO GALLERY
 * @require: Isotope Plugin
 ========================================================================*/
$(function () {

  /* GRID
   -------------------------------------------------------------*/

  /* Apply Isotope plugin - isotope.metafizzy.co
   ========================================= */

  // Quick search regex
  var qsRegexImg;
  var filtersImg;

  // Init Isotope
  var $imggallery = $('#imggallery');
  $imggallery.isotope({
    itemSelector: 'div[class^="gallery-item-"]',
    masonry: {
      columnWidth: $imggallery.width()/3,
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

  $('#imgfilters').on('click', '.filter', function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    var $this = $(this);
    // set filter for group
    filtersImg = $(this).attr('data-filter');
    $imggallery.isotope();
  });

  // Use value of search field to filter
  var $quicksearch = $('#quicksearch').keyup(debounce(function () {
    qsRegexImg = new RegExp($quicksearch.val(), 'gi');
    $imggallery.isotope();
  }));


  // Change is-checked class on buttons
  $('#imgfilters .filter').on('click', function () {
    $('#imgfilters').find('.active').removeClass('active');
    $(this).addClass('active');
  });



  // Debounce so filtering doesn't happen every millisecond
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

  $('a[href="#tabs8"]').on('shown.bs.tab', function (e) {
    $imggallery.isotope('layout');
  });

});

/** 00. ISOTOPE VIDEO GALLERY
 * @require: Isotope Plugin
 ========================================================================*/
$(function () {

  /* GRID
   -------------------------------------------------------------*/

  /* Apply Isotope plugin - isotope.metafizzy.co
   ========================================= */

  // Quick search regex
  var qsRegexVideo;
  var filtersVideo;

  // Init Isotope
  var $videogallery = $('#videogallery');
  $videogallery.isotope({
    itemSelector: 'div[class^="gallery-item-"]',
    masonry: {
      columnWidth: $videogallery.width()/3,
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

  $('#videofilters').on('click', '.filter', function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    var $this = $(this);
    // set filter for group
    filtersVideo = $(this).attr('data-filter');
    $videogallery.isotope();
  });

  // Use value of search field to filter
  var $quicksearch = $('#quicksearch').keyup(debounce(function () {
    qsRegexVideo = new RegExp($quicksearch.val(), 'gi');
    $videogallery.isotope();
  }));


  // Change is-checked class on buttons
  $('#videofilters .filter').on('click', function () {
    $('#videofilters').find('.active').removeClass('active');
    $(this).addClass('active');
  });



  // Debounce so filtering doesn't happen every millisecond
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

  $('a[href="#tabs9"]').on('shown.bs.tab', function (e) {
    $videogallery.isotope('layout');
  });

});


/** 02. Fancybox initialisation
 * @require: Fancybox 3 Plugin
 ========================================================================*/

$(function () {

  // Create template for download button
  $.fancybox.defaults.btnTpl.download = '<a download class="fancybox-button fancybox-download" title="{{DOWNLOADS}}"></a>';

  // Choose what buttons to display by default
  $.fancybox.defaults.buttons = [
    'slideShow',
    'fullScreen',
    'thumbs',
    'download',
    'close'
  ];

  // Update download link source
  $('[data-fancybox]').fancybox({
    // Internationalization
    lang : envoWebIntranet.envo_lang,
    i18n : {
      'en' : {
        DOWNLOADS   : 'Download Image'
      },
      'cs' : {
        CLOSE       : 'Zavřít',
        NEXT        : 'Další',
        PREV        : 'Předchozí',
        ERROR       : 'Požadovaný obsah nemůže být načten. <br/> Zkuste to prosím později.',
        PLAY_START  : 'Start Slideshow',
        PLAY_STOP   : 'Pause Slideshow',
        FULL_SCREEN : 'Celá Obrazovka',
        THUMBS      : 'Náhledy',
        DOWNLOADS   : 'Stáhnout Obrázek'
      }
    },
    //  Before open animation starts
    beforeShow: function (instance, current) {
      $('.fancybox-download').attr('href', current.src);
      this.title =  $(this.element).data("caption");
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

  $('.dialog-open-info').on('click', function(){
    // Get Data-Dialog
    thisDataDialog = $(this).attr('data-dialog');
    // Get ID of image
    var imageID = $(this).attr('data-id');

    console.log(thisDataDialog);
    // Ajax
    $.ajax({
      url: "/plugins/intranet/template/ajax/int_table_dialog_img.php",
      type: "POST",
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
    dialogEl = document.getElementById(thisDataDialog);
    dlg = new DialogFx(dialogEl);
    dlg.toggle(dlg);
  });

});

/** 04. Upload Photo Gallery
 ========================================================================*/

$(function () {

  // enable fileuploader plugin
  $('input[name="files"]').fileuploader({
    extensions: ['jpg', 'jpeg', 'png', 'gif', 'bmp'],
    changeInput: ' ',
    theme: 'thumbnails',
    enableApi: true,
    addMore: true,
    thumbnails: {
      box: '<div class="fileuploader-items">' +
      '<ul class="fileuploader-items-list">' +
      '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner">+</div></li>' +
      '</ul>' +
      '</div>',
      item: '<li class="fileuploader-item">' +
      '<div class="fileuploader-item-inner">' +
      '<div class="thumbnail-holder">${image}</div>' +
      '<div class="actions-holder">' +
      '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>' +
      '<span class="fileuploader-action-popup"></span>' +
      '</div>' +
      '<div class="progress-holder">${progressBar}</div>' +
      '</div>' +
      '</li>',
      item2: '<li class="fileuploader-item">' +
      '<div class="fileuploader-item-inner">' +
      '<div class="thumbnail-holder">${image}</div>' +
      '<div class="actions-holder">' +
      '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>' +
      '<span class="fileuploader-action-popup"></span>' +
      '</div>' +
      '</div>' +
      '</li>',
      startImageRenderer: true,
      canvasImage: false,
      _selectors: {
        list: '.fileuploader-items-list',
        item: '.fileuploader-item',
        start: '.fileuploader-action-start',
        retry: '.fileuploader-action-retry',
        remove: '.fileuploader-action-remove'
      },
      onItemShow: function(item, listEl) {
        var plusInput = listEl.find('.fileuploader-thumbnails-input');

        plusInput.insertAfter(item.html);

        if(item.format == 'image') {
          item.html.find('.fileuploader-item-icon').hide();
        }
      }
    },
    afterRender: function(listEl, parentEl, newInputEl, inputEl) {
      var plusInput = listEl.find('.fileuploader-thumbnails-input'),
        api = $.fileuploader.getInstance(inputEl.get(0));

      plusInput.on('click', function() {
        api.open();
      });
    },
    /*
    // while using upload option, please set
    // startImageRenderer: false
    // for a better effect
    upload: {
      url: './php/upload_file.php',
            data: null,
            type: 'POST',
            enctype: 'multipart/form-data',
            start: true,
            synchron: true,
            beforeSend: null,
            onSuccess: function(data, item) {
        setTimeout(function() {
          item.html.find('.progress-holder').hide();
          item.renderThumbnail();
        }, 400);
            },
            onError: function(item) {
        item.html.find('.progress-holder').hide();
        item.html.find('.fileuploader-item-icon i').text('Failed!');
            },
            onProgress: function(data, item) {
                var progressBar = item.html.find('.progress-holder');

                if(progressBar.length > 0) {
                    progressBar.show();
                    progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
                }
            }
        },
    dragDrop: {
      container: '.fileuploader-thumbnails-input'
    },
    onRemove: function(item) {
      $.post('php/upload_remove.php', {
        file: item.name
      });
    },
    */
  });

});