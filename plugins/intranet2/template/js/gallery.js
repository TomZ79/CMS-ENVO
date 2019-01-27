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

  // Choose what buttons to display by default
  $.fancybox.defaults.buttons = [
    'zoom',
    'fullScreen',
    'download',
    'thumbs',
    'close'
  ];

  // Update download link source
  $('[data-fancybox]').fancybox({
    // Internationalization
    lang: envoWebIntranet.envo_lang,
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

  $('.dialog-open-info').on('click', function () {
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

  $('.dialog-listopen-info').on('click', function () {
    // Get Data-Dialog
    thisDataDialog = $(this).attr('data-dialog');
    // Get ID of image
    var imageID = $(this).attr('data-id');

    console.log(thisDataDialog);
    // Ajax
    $.ajax({
      url: "/plugins/intranet/template/ajax/int_list_table_dialog_img.php",
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
 * @require: Fileuploader Plugin
 ========================================================================*/

$(function () {

  // Enable fileuploader plugin
  if ($('input[name="files"]').length) {

    // Define the form and the file input
    var $form = $('#form_list_upload_img');
    var $fileuploaderInput = $('input[name="files"]');

    // Enable fileuploader plugin
    $fileuploaderInput.fileuploader({
      // Validations - allowed extensions or file types
      extensions: ['jpg', 'jpeg', 'png', 'gif'],
      // Templates - thumbnails for files
      thumbnails: {
        // show a confirmation dialog by removing a file? {Boolean}
        // it will not be shown in upload mode by canceling an upload
        // you can call your own dialog box using dialogs option
        removeConfirmation: false
      },
      // Captions - use captions option to tranlate the plugin into your language.
      captions: {
        button: function (options) {
          return 'Prohledat ' + (options.limit == 1 ? 'Složku' : 'Složky');
        },
        feedback: function (options) {
          return 'Vybrat ' + (options.limit == 1 ? 'soubor' : 'soubory') + ' pro upload';
        },
        feedback2: function (options) {
          return options.length + ' ' + (options.length > 1 ? ' souborů bylo' : ' soubor byl') + (options.length > 1 ? ' vybráno' : ' vybrán');
        }
      },
      // Others - enable addMore mode to add files from different folders
      addMore: true,
      // Others - enable Api methods
      enableApi: true,

    });

    // Form submit
    $form.on('submit', function (e) {
      e.preventDefault();

      var formData = new FormData(),
        api = $.fileuploader.getInstance($fileuploaderInput),
        _formInputs = [];

      // append form's inputs to the formdata
      // using this long version because of missing method formData.delete() many browsers
      $.each($form.find("[name]:input"), function (index, input) {
        var $input = $(input),
          name = $input.attr('name'),
          type = $input.attr('type') || "",
          value = $input.val();

        if ($.inArray(name, _formInputs) > 0)
          return;
        _formInputs.push(name);

        if (typeof value == "undefined")
          return true;

        if (type == 'file') {
          // add fileuploader files to the formdata
          if (name == $fileuploaderInput.attr('name')) {
            var files = api.getChoosedFiles();

            for (var i = 0; i < files.length; i++) {
              formData.append(name, files[i].file, (files[i].name ? files[i].name : false));
            }

            api.disable(true);
          }
        } else {
          formData.append(name, value);
        }

      });

      //
      // Adding extra parameters to form_data
      var houseID = $(this).find('input[type="submit"]').data('houseid');
      formData.append('houseID', houseID);

      //
      $.ajax({
        url: $form.attr('action') || "#",
        data: formData,
        type: $form.attr('method') || 'POST',
        enctype: $form.attr('enctype') || 'multipart/form-data',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $form.find('.form-status').html('<div class="progressbar-holder"><div class="progressbar"></div></div>');
          $form.find('input[type="submit"]').attr('disabled', 'disabled');
        },
        xhr: function () {
          var xhr = $.ajaxSettings.xhr();

          if (xhr.upload) {
            xhr.upload.addEventListener("progress", this.progress, false);
          }

          return xhr;
        },
        success: function (result, textStatus, jqXHR) {

          try {
            // Block of code to try

            // Parse JSON
            var data = JSON.parse(result);

            // If isSuccess
            if (data.isSuccess) {

              // Update input values
              $.each(data, function (key, data) {
                // console.log('Key: ' + key + ' => ' + 'Value: ' + data);

                if (key === 'files') {

                  $.each(api.getChoosedFiles(), function (index, item) {
                    // Clear all items

                    // remove an item by giving an item Object or item HTML element
                    api.remove(item);
                  });

                }

              });

              // Show Status
              $form.find('.form-status').html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>' + data.message + '</div>');
              $form.find('input[type="submit"]').removeAttr('disabled');

            }

            // If hasWarnings
            if (data.hasWarnings) {

              // Show Status
              $form.find('.form-status').html('<div class="alert alert-warning"><button class="close" data-dismiss="alert"></button>' + data.message + '</div>');
              $form.find('input[type="submit"]').removeAttr('disabled');

            }

          } catch (e) {
            // Block of code to handle errors

          }

          api.enable();


        },
        error: function (jqXHR, textStatus, errorThrown) {
          $form.find('.form-status').html('<p class="text-error">Error!</p>');
          $form.find('input[type="submit"]').removeAttr('disabled');
        },
        progress: function (e) {
          if (e.lengthComputable) {
            var t = Math.round(e.loaded * 100 / e.total).toString();

            $form.find('.form-status .progressbar').css('width', t + '%');
          }
        }
      });
    });
  }

});
