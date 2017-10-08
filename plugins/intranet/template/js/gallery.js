/*
 * CMS ENVO
 * JS for Plugin Intranet - Frontend
 * Copyright (c) 2016 - 2017 Bluesat.cz
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
  var qsRegex;
  var filters;

  // Init Isotope
  var $gallery = $('#gallery');
  $gallery.isotope({
    itemSelector: 'div[class^="gallery-item-"]',
    masonry: {
      columnWidth: $gallery.width()/3,
      gutter: 15,         // The horizontal space between item elements
      fitWidth: true
    },
    filter: function () {
      var $this = $(this);
      var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
      var buttonResult = filters ? $this.is(filters) : true;
      return searchResult && buttonResult;
    }

  });

  $('.filters').on('click', '.filter', function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    var $this = $(this);
    // set filter for group
    filters = $(this).attr('data-filter');
    $gallery.isotope();
  });

  // Use value of search field to filter
  var $quicksearch = $('#quicksearch').keyup(debounce(function () {
    qsRegex = new RegExp($quicksearch.val(), 'gi');
    $gallery.isotope();
  }));


  // Change is-checked class on buttons
  $('.filter').on('click', function () {
    $('.filters').find('.active').removeClass('active');
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
    $gallery.isotope('layout');
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
    }
  });

});


/** 03. XXXX
 * @require: Codrops DialogFx Plugin
 * @example
 * Attribute 'data-dialog' in button => ID of dialog 'div' block
 * -----------------
 * <button class="dialog-open" type="button" data-dialog="itemDetails"></button>
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

  $('.dialog-open').on('click', function(){
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

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