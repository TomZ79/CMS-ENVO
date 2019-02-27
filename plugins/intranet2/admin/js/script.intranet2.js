/*
 * CMS ENVO
 * JS for INTRANTET 2 - ADMIN
 * Copyright (c) 2016 - 2018 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 */

/**
 * @description Setting for debug
 */
var debug = true;

/* 00. JQUERY CODE SNIPPET TO GET THE DYNAMIC VARIABLE
 ======================================================================== */
/* jQuery code snippet to get the dynamic variables stored in the url as parameters and
 * store them as JavaScript variables ready for use with your scripts.
 *
 * EXAMPLE
 * --------
 * 1) url: example.com?param1=name&param2=&id=6
 *
 * $.urlParam('param1');  => name
 * $.urlParam('id');      => 6
 * $.urlParam('param2');  => null
 *
 * 2) url: http://www.jquery4u.com?city=Gold Coast
 *
 * $.urlParam('city');                     => Gold%20Coast
 * decodeURIComponent($.urlParam('city'))  => Gold Coast
 */

$.urlParam = function (name) {
  var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
  if (results == null) {
    return null;
  }
  else {
    return decodeURI(results[1]) || 0;
  }
};

/**
 * @description Setting variable from url for other uses
 */
var pageID = $.urlParam('id');
var page = $.urlParam('p');
var page1 = $.urlParam('sp');
var page2 = $.urlParam('ssp');

if (debug) {
  console.log('Jquery Parse URL | Data => pageID - ' + pageID + ' | page - ' + page + ' | page1 - ' + page1 + ' | page2 - ' + page2 + '')
}

/** 00. Basic config for plugin's administration
 ========================================================================*/

/** ACE Editor
 * Initialisation of ACE Editor
 * @require: ACE Editor Plugin
 *
 * Set variable in php file as array
 * @param: 'aceEditor.acetheme' from generated_admin_js.php
 * @param: 'aceEditor.acewraplimit' from generated_admin_js.php
 * @param: 'aceEditor.acetabSize' from generated_admin_js.php
 * @param: 'aceEditor.aceactiveline' from generated_admin_js.php
 * @param: 'aceEditor.aceinvisible' from generated_admin_js.php
 * @param: 'aceEditor.acegutter' from generated_admin_js.php
 *
 * @example: Example add other variable setting to aceEditor object in script.download.php
 *
 * <script>
 *  // Add to aceEditor settings javascript object
 *  aceEditor['otherconfigvariable'] = <?=json_encode($othervalue)?>;
 * </script>
 ========================================= */
// Set WrapLimitRange from generated_admin_js.php
$wrapLimitRange = {
  min: aceEditor.acewraplimit,
  max: aceEditor.acewraplimit
};

function aceboolean (param) {
  if (param == '1') {
    return true;
  } else {
    return false;
  }
}

if ($('#htmleditor').length) {
  var htmlACE = ace.edit('htmleditor');
  htmlACE.setTheme('ace/theme/' + aceEditor.acetheme);
  htmlACE.session.setUseWrapMode(aceEditor.aceactivewrap);
  htmlACE.session.setWrapLimitRange($wrapLimitRange.min, $wrapLimitRange.max);
  htmlACE.setOptions({
    // session options
    mode: "ace/mode/html_ruby",
    tabSize: aceEditor.acetabSize,
    useSoftTabs: true,
    indentedSoftWrap: false,
    highlightActiveLine: aceboolean(aceEditor.aceactiveline),
    // renderer options
    showPrintMargin: false,
    fontSize: aceEditor.fontSize,
    showInvisibles: aceEditor.aceinvisible,
    showGutter: aceboolean(aceEditor.acegutter)
  });
  // This is to remove following warning message on console:
  // Automatically scrolling cursor into view after selection change this will be disabled in the next version
  // set editor.$blockScrolling = Infinity to disable this message
  htmlACE.$blockScrolling = Infinity;

  var texthtml = $('#envo_editor').val();
  htmlACE.session.setValue(texthtml);
}

/**
 * @description Jquery Function - Get GPS Coordinates from OpenStreeMaps
 * @callaction
 * $('#elementID').click(getGPS_Data_OSM);
 */
function getGPS_Data_OSM (event) {
  // Stop, the default action of the event will not be triggered
  event.preventDefault();

  if (debug) {
    console.log('----------- fn getGPS_Data_OSM -----------')
  }

  // Disable 'button'
  if ($('#saveEnt').length) {
    $('#saveEnt').attr('disabled', true);
  }
  if ($('#udpateEnt').length) {
    $('#udpateEnt').attr('disabled', true);
  }
  // Getting parent 'id'
  var parent = $(this).parents(':eq(4)').attr('id');
  // Street and City from Form
  var street = $('#' + parent + ' input[name="envo_entstreet"]').val();
  var streettrim = $.trim(street).replace(/\s/g, '+');
  var city = $('select[name="envo_housecity"]').find(':selected').data('city_name');
  var citytrim = $.trim(city).replace(/\s/g, '+');

  if (debug) {
    console.log('GPS Click fn | Parent ID: ' + parent);
    console.log('GPS Click fn | Adress: ' + street + ', ' + city);
  }

  // Ajax
  $.ajax({
    url: '/plugins/intranet2/admin/ajax/gpscoordinates_osm.php',
    type: 'POST',
    dataType: 'json',
    data: {
      street: streettrim,
      city: citytrim
    },
    cache: false,
    // Timeout 20s
    timeout: 20000,
    beforeSend: function () {

      // Show progress text
      $('#' + parent + ' .loadingdata_gps').html('Načítání ... Prosím počkejte').css('visibility', 'visible');
      $('#' + parent + ' .loadingdata_ikatastr').html('Načítání ... Prosím počkejte').css('visibility', 'visible');
    },
    success: function (data) {

      /**
       * @description Check if JSON format is empty
       * Works for any Object Including JSON(key value pair) or Array.
       * var arr = [];
       * var jsonObj = {};
       */
      if (jQuery.isEmptyObject(data)) {
        // JSON object is empty
        if (debug) {
          console.log('NO GPS DATA | Empty JSON Object');
        }

        // Add data to 'input'
        $('#' + parent + ' input[name=envo_housegpslat]').val('NO GPS DATA').css('background-color', '#FCC');
        $('#' + parent + ' input[name=envo_housegpslng]').val('NO GPS DATA').css('background-color', '#FCC');
        $('#' + parent + ' input[name=envo_houseikatastr]').val('NO GPS DATA').css('background-color', '#FCC');

      } else {

        // Parse JSON data
        var str = JSON.stringify(data);
        var result = JSON.parse(str);
        // Get variable
        var wgslat = data['data'].lat;
        var wgslon = data['data'].lon;

        if (debug) {
          console.log('GPS Coordinates - Latitude: ' + wgslat + ' / Longitude: ' + wgslon);
        }

        // Set ikatastr text for input
        var ikatastr = 'https://www.ikatastr.cz/#kde=' + wgslat + ',' + wgslon + ',19&mapa=osm&vrstvy=parcelybudovy&info=' + wgslat + ',' + wgslon;

        // Add data to 'input'
        $('#' + parent + ' input[name=envo_housegpslat]').val(wgslat).css('background-color', '#FFF5CC');
        $('#' + parent + ' input[name=envo_housegpslng]').val(wgslon).css('background-color', '#FFF5CC');
        $('#' + parent + ' input[name=envo_houseikatastr]').val(ikatastr).css('background-color', '#FFF5CC');

        // Change background color - default color
        setTimeout(function () {
          $('#' + parent + ' input[name=envo_housegpslat]').css('background-color', '#FFF');
          $('#' + parent + ' input[name=envo_housegpslng]').css('background-color', '#FFF');
          $('#' + parent + ' input[name=envo_houseikatastr]').css('background-color', '#FFF');
        }, 8000);

        // Change 'attr' in anchor
        $('#' + parent + ' .gps_link a.mapycz').attr('href', 'https://mapy.cz/zakladni?x=' + wgslon + '&y=' + wgslat + '&z=18&l=0&source=coor&id=' + wgslon + '%2C' + wgslat);
        $('#' + parent + ' .gps_link a.openstreet').attr('href', 'https://www.openstreetmap.org/?mlat=' + wgslat + '&mlon=' + wgslon + '&zoom=16#map=18/' + wgslat + '/' + wgslon);
        $('#' + parent + ' .ikatastrlink a.ikatastr').attr('href', ikatastr);

        // Show 'div'
        $('#' + parent + ' .gps_link').show();

      }

      // Hide progress text
      setTimeout(function () {
        $('#' + parent + ' .loadingdata_gps').html('').css('visibility', 'hidden');
        $('#' + parent + ' .loadingdata_ikatastr').html('').css('visibility', 'hidden');
        // Enable 'button'
        if ($('#saveEnt').length) {
          $('#saveEnt').attr('disabled', false);
        }
        if ($('#udpateEnt').length) {
          $('#udpateEnt').attr('disabled', false);
        }
      }, 1000);

    },
    error: function (jqXHR, textStatus, errorThrown) {
      // Hide progress text
      setTimeout(function () {
        $('#' + parent + ' .loadingdata_gps').html('').css('visibility', 'hidden');
        $('#' + parent + ' .loadingdata_ikatastr').html('').css('visibility', 'hidden');
      }, 1000);

      if (debug) {
        console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
      }
    },
    complete: function () {
    }
  });

}

/**
 * @description  Convert miliseconds to time
 */
function msToTime (s) {

  // Pad to 2 or 3 digits, default is 2
  function pad (n, z) {
    z = z || 2;
    return ('00' + n).slice(-z);
  }

  var ms = s % 1000;
  s = (s - ms) / 1000;
  var secs = s % 60;
  s = (s - secs) / 60;
  var mins = s % 60;
  var hrs = (s - mins) / 60;

  // return pad(hrs) + ':' + pad(mins) + ':' + pad(secs) + '.' + pad(ms, 3);
  return pad(mins) + ':' + pad(secs) + '.' + pad(ms, 3);
}

/**
 * @description  Init TinyMCE
 */
function initializeTinyMce (selector, height) {
  if (selector == undefined) {
    selector = 'textarea';
  }

  if ( $(selector).length) {
    tinymce.init({
      selector: selector,
      theme: "modern",
      width: "100%",
      height: height,
      language: envoWeb.envo_lang,
      content_style: ".mce-content-body {font-size:12px;}",
      //UTF-8 Setting
      entity_encoding: "raw",
      // Plugins
      plugins: [
        "advlist autolink link charmap hr insertdatetime textcolor responsivefilemanager",
        "searchreplace visualblocks paste",
        "table"
      ],
      // Default settings after init
      paste_as_text: true,
      // Header Menubar
      menubar: "edit insert view format table",
      // Header Toolbar
      toolbar: "undo redo | bold italic | alignleft aligncenter alignjustify | bullist numlist | forecolor backcolor",
      // Footer Statusbar
      statusbar: false,
      // Valid Elements
      valid_elements: "*[*]",
      // Custom date time formats
      insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%d.%m.%Y", "%I:%M:%S %p", "%D"],
      // Responsive Filemanager
      external_filemanager_path: "/assets/plugins/tinymce/plugins/filemanager/",
      filemanager_title: "Filemanager",
      external_plugins: {
        "filemanager": "plugins/filemanager/plugin.min.js"
      }
    });
  }

}

/**
 * @description  Init DateTimePicker
 */
function initializeDateTimePicker (selector) {
  /** DateTimePicker
   * @require: DateTimePicker Plugin
   ========================================= */
  $(selector).datetimepicker({
    // Language
    locale: envoWeb.envo_lang,
    // Date-Time format
    format: 'DD.MM.YYYY',
    // Icons
    icons: $.AdminEnvo.DateTimepicker.icons(),
    // Tooltips
    tooltips: $.AdminEnvo.DateTimepicker.tooltips(),
    // Show Button
    showTodayButton: true,
    showClear: true,
    // Other
    calendarWeeks: true,
    ignoreReadonly: true
  });
}

/**
 * @description  Helper function that formats the file sizes
 */
function formatFileSize (bytes) {
  if (typeof bytes !== 'number') {
    return '';
  }

  if (bytes >= 1000000000) {
    return (bytes / 1000000000).toFixed(2) + ' GB';
  }

  if (bytes >= 1000000) {
    return (bytes / 1000000).toFixed(2) + ' MB';
  }

  return (bytes / 1000).toFixed(2) + ' KB';
}

/**
 * @description  Copy to Clipboard
 * @callaction
 * <button onclick="copyToClipboard('#p1')">Copy TEXT 1</button>
 */
function copyToClipboard (element) {
  var temp = $('<input>');
  $('body').append(temp);
  temp.val($(element).val()).select();
  document.execCommand('copy');
  temp.remove();
}

/**
 * @description  Check if URL exists
 * @callaction
 *
 * urlExists('path_to_file', function (success) {
      if (success) {
        alert('Yay!');
      } else {
        alert('Oh no!');
      }
    });
 */
var urlExists = function (url, callback) {

  if (!$.isFunction(callback)) {
    throw Error('Not a valid callback');
  }

  $.ajax({
    type: 'HEAD',
    url: url,
    success: $.proxy(callback, this, true),
    error: $.proxy(callback, this, false)
  });

};

/** 00. TinyMCE Initialisation
 * @require: TinyMCE Plugin
 ========================================================================*/

$(function () {
  'use strict';

  if (page2 != null && page1 != 'search_db') {
    initializeTinyMce('textarea.envoEditorLarge', '200');
  }

});


/** 00. LOAD ARES, IKATASTR, JUSTICE, GPS
 ========================================================================*/

$(function () {
  'use strict';

  /**
   * @description   Change links to ARES - JUSTICE by 'IČ'
   */
  $('input[name="envo_houseic"]').on('keyup keypress input paste change', function () {

    // Get value
    var getic = $.trim($(this).val()).replace(/\s/g, '');

    $('#ares_res a:first').attr('href', 'https://wwwinfo.mfcr.cz/cgi-bin/ares/darv_res.cgi?ico=' + getic + '&jazyk=cz&xml=1');
    $('#ares_res a:last-child').attr('href', 'https://wwwinfo.mfcr.cz/cgi-bin/ares/darv_vreo.cgi?ico=' + getic + '&jazyk=cz&xml=1');
    $('#justice_vor a').attr('href', 'https://or.justice.cz/ias/ui/rejstrik-$firma?ico=' + getic + '&jenPlatne=VSECHNY');

  });

  /**
   * @description   Show ARES links
   */
  $('input[name="envo_houseares"]').change(function () {

    if (this.value == '1') {
      $('#ares_res').show();
    } else if (this.value == '0') {
      $('#ares_res').hide();
    }

  });

  /**
   * @description   Show JUSTICE links
   */

  $('input[name="envo_housejustice"]').change(function () {

    if (this.value == '1') {
      $('#justice_vor').show();
    } else if (this.value == '0') {
      $('#justice_vor').hide();
    }

  });

  /**
   * @description   Get GPS Coordinates from OpenStreeMaps
   */
  $('.getgps').click(getGPS_Data_OSM);

  /**
   * @description   Get GPS Coordinates from OpenStreeMaps
   */
  $('input[name=envo_houseikatastr]').keyup(function () {

    // Getting parent 'id'
    var parent = $(this).parents(':eq(4)').attr('id');
    var getkatastr = $.trim($(this).val()).replace(/\s/g, '');

    if ($(this).val().length > 0) {
      $('#' + parent + ' .ikatastrlink a').attr('href', getkatastr);
    } else {
      $('#' + parent + ' .ikatastrlink a').attr('href', 'https://www.ikatastr.cz/');
    }

    if (debug) {
      console.log('Katastr Keyup fn | Parent ID: ' + parent + ' | Text: ' + getkatastr);
    }

  });

  /**
   * @description   Load data from ARES by 'IČ'
   */
  $('#loadAres').click(function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    if (debug) {
      console.log('----------- fn #loadAres click -----------')
    }

    // Get value
    var ic = $.trim($('input[name="envo_dataares"]').val()).replace(/\s/g, '');
    // Ajax time
    var ajaxTime = new Date().getTime();

    // Ajax
    $.ajax({
      url: '/plugins/intranet2/admin/ajax/ares.php',
      type: 'POST',
      dataType: 'json',
      data: {
        ic: ic
      },
      cache: false,
      // Timeout 20s
      timeout: 20000,
      beforeSend: function () {

        // Show progress circle
        $('#loadingdata').html('<div style="display:block;position:fixed;top:50%;left:50%;transform:translate(-35%, -50%);-ms-transform:translate(-35%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20 text-center"><span style="float: left;width: 100%;margin-bottom: 10px;font-weight: bold;font-size: 2em;">ARES</span><span style="float: left;width: 100%;margin-bottom: 10px;">Načítání ... Prosím počkejte ...</span><span>Načítání dat může trvat i několik sekund / minut</span></div></div>').show();


      },
      success: function (data) {

        if (data.status == 'upload_success') {
          // IF DATA SUCCESS

          if (debug) {
            console.log('ID města: ' +
              '' + data.mesto_id);
          }

          // Data variable for output
          var divdata = '';
          divdata += '<div class="col-sm-12"><h5>Získaná data z databáze Ares</h5><hr>' +
            '<p><strong>' + data.status_msg + '</strong></p>' +
            '<p>Doba zpracování požadavku: <span id="ajaxTime">' + totalTime + '</span></p><hr>' +
            '<table class="table">' +
            '<tbody>' +
            '<tr class="row">' +
            '<th style="border-top: none;border-bottom: 1px solid #DEE2E6;" class="col-sm-4">Název</th>' +
            '<td class="col-sm-8">' + data.name + '</td>' +
            '</tr>' +
            '<tr class="row">' +
            '<th style="border-top: none;border-bottom: 1px solid #DEE2E6;" class="col-sm-4">Katastrální území</th>' +
            '<td class="col-sm-8">' + data.katastralniuzemi + '</td>' +
            '</tr>' +
            '</tbody>' +
            '</table>' +
            '</div>';

          // Output Data
          $('#outputaresdate').html('').prepend(divdata).show();

          // Add data to element
          $('input[name=envo_housename]').val('SVJ domu ');
          $('input[name=envo_househeadquarters]').val(
            data.ulice + ', ' + data.mesto + ' - ' + data.katastralniuzemi + ', PSČ ' + data.psc
          ).css('background-color', '#FFF5CC');
          $('input[name=envo_houseic]').val(data.ic).css('background-color', '#FFF5CC');
          $('input[name=envo_housestreet]').val(data.ulice).css('background-color', '#FFF5CC');
          $('select[name="envo_housecity"]').val(data.mesto_id);
          $('select[name="envo_housecity"] + span span.select2-selection').css('background-color', '#FFF5CC');
          $('input[name=envo_housepsc]').val(data.psc).css('background-color', '#FFF5CC');

          if ($('input[name=envo_housefname]').length) {
            $('input[name=envo_housefname]').val(data.name).css('background-color', '#FFF5CC');
          }
          if ($('input[name=envo_housefstreet]').length) {
            $('input[name=envo_housefstreet]').val(data.ulice).css('background-color', '#FFF5CC');
          }
          if ($('input[name=envo_housefcity]').length) {
            $('input[name=envo_housefcity]').val(data.mesto).css('background-color', '#FFF5CC');
          }
          if ($('input[name=envo_housefpsc]').length) {
            $('input[name=envo_housefpsc]').val(data.psc).css('background-color', '#FFF5CC');
          }
          if ($('input[name=envo_housefic]').length) {
            $('input[name=envo_housefic]').val(data.ic).css('background-color', '#FFF5CC');
          }
          if ($('input[name=envo_housefdic]').length) {
            $('input[name=envo_housefdic]').val(data.dic).css('background-color', '#FFF5CC');
          }

          // Change background color - default color
          setTimeout(function () {
            // Selector array
            var array = [
              'input[name=envo_househeadquarters]',
              'input[name=envo_housestreet]',
              'select[name="envo_housecity"] + span span.select2-selection',
              'input[name=envo_housepsc]',
              'input[name=envo_houseic]',
              'input[name=envo_housefname]',
              'input[name=envo_housefstreet]',
              'input[name=envo_housefcity]',
              'input[name=envo_housefpsc]',
              'input[name=envo_housefic]',
              'input[name=envo_housefdic]'
            ];
            var element = $(array.join(', '));
            // Change background color
            element.css({
              'background-color': '#FFF'
            });
          }, 8000);

          // Change 'attr' in anchor
          $('#ares_res a:first').attr('href', 'https://wwwinfo.mfcr.cz/cgi-bin/ares/darv_res.cgi?ico=' + ic + '&jazyk=cz&xml=1');
          $('#ares_res a:last-child').attr('href', 'https://wwwinfo.mfcr.cz/cgi-bin/ares/darv_vreo.cgi?ico=' + ic + '&jazyk=cz&xml=1');
          $('#justice_vor a').attr('href', 'https://or.justice.cz/ias/ui/rejstrik-$firma?ico=' + ic + '&jenPlatne=VSECHNY');
          // Checkbox prop
          $('input[name=envo_houseares][value="1"]').prop('checked', true);
          $('input[name=envo_housejustice][value="1"]').prop('checked', true);
          // Show anchor
          $('#ares_res,#justice_vor').show();

          // ReInit Select2 plugin
          $('select[name=envo_housecity]').trigger('change');

          // Ajax time
          var totalTime = msToTime(Math.floor(new Date().getTime() - ajaxTime));
          $('#ajaxTime').html(totalTime);
          if (debug) {
            console.log('ajaxTime | Success Time: ' + totalTime);
            console.log($('select[name="envo_housecity"]').find(':selected').data('city_name'));
          }
          // Loading data progress
          $('#loadingdata').hide().html('');

        } else {
          // IF DATA ERROR

          // Data variable for output
          var divdata = '';
          divdata += '<div class="col-sm-12"><h5>Výstup z Ares</h5>' +
            '<p style="color: #C10000;"><i class="fa fa-exclamation"></i> <strong>' + data.status_msg + '</strong></p>' +
            '<p>Doba zpracování požadavku: <span id="ajaxTime">' + totalTime + '</span></p><hr>' +
            '<p>' + data.status_info + '</p>' +
            '</div>';

          // Output Data
          $('#outputaresdate').html('').prepend(divdata).show();

          // Ajax time
          var totalTime = msToTime(Math.floor(new Date().getTime() - ajaxTime));
          if (debug) {
            console.log('ajaxTime | Success Time: ' + totalTime);
          }
          // Loading data progress
          $('#loadingdata').hide().html('');

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              icon: 'fa fa-exclamation',
              message: '<strong>Error:</strong> ' + data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 2000
            });
          }, 1000);

        }

      },
      error: function (jqXHR, textStatus, errorThrown) {

        // Loading data progress
        $('#loadingdata').html('<div style="display:block;position:fixed;top:50%;left:50%;transform:translate(-35%, -50%);-ms-transform:translate(-35%, -50%);"><div class="m-t-20 text-center"><span style="float: left;width: 100%;margin-bottom: 10px;font-weight: bold;font-size: 2em;">ARES</span><span style="float: left;width: 100%;margin-bottom: 10px;color: #C10000;font-weight: 700;">Vypršel časový limit pro komunikaci se serverem Ares</span><span style="float: left;width: 100%;color: #C10000;font-weight: 700;">Server Ares neodpovídá -> obnovte stránku a zkuste hledání později!</span><button type="button" class="btn btn-success mt-3" onClick="window.location.reload()">Obnovit stránku</button></div></div>');

        if (debug) {
          console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
        }

        if (textStatus === 'timeout') {
          if (debug) console.log('Timeout: ' + textStatus + ': ' + errorThrown);
        } else {
          if (debug) console.log(textStatus + ': ' + errorThrown);
        }

      },
      complete: function () {

      }
    });

  });

  /**
   * @description   Load data from CUZK by GPS
   */
  $('#loadCuzk').click(function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    if (debug) {
      console.log('----------- fn #loadCuzk click -----------')
    }

    // Get value
    var street = $('input[name="envo_housestreet"]').val();
    var streettrim = $.trim(street).replace(/\s/g, '+');
    var city = $('select[name="envo_housecity"]').find(':selected').data('city_name');
    var citytrim = $.trim(city).replace(/\s/g, '+');
    var converter = new JTSK_Converter();
    // Ajax time
    var ajaxTime = new Date().getTime();

    if (debug) {
      console.log('Data for Ajax => streettrim: ' + streettrim + ' / citytrim: ' + citytrim);
    }

    // Ajax
    $.ajax({
      url: '/plugins/intranet2/admin/ajax/gpscoordinates_osm.php',
      type: 'POST',
      dataType: 'json',
      data: {
        street: streettrim,
        city: citytrim
      },
      cache: false,
      // Timeout 20s
      timeout: 20000,
      beforeSend: function () {

        // Show progress circle
        $('#loadingdata').html('<div style="display:block;position:fixed;top:50%;left:50%;transform:translate(-35%, -50%);-ms-transform:translate(-35%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20 text-center"><span style="float: left;width: 100%;margin-bottom: 10px;font-weight: bold;font-size: 2em;">ČÚZK</span><span style="float: left;width: 100%;margin-bottom: 10px;">Načítání ... Prosím počkejte ...</span><span>Načítání dat může trvat i několik sekund / minut</span></div></div>').show();


      },
      success: function (data) {

        // Parse JSON data
        var str = JSON.stringify(data);
        var result = JSON.parse(str);
        // Get variable
        var wgslat = data['data'].lat;
        var wgslon = data['data'].lon;

        if (debug) {
          console.log('GPS Coordinates - Latitude: ' + wgslat + ' / Longitude: ' + wgslon);
        }

        var jtsk = converter.WGS84toJTSK(wgslat, wgslon);

        var strX = jtsk.y;
        // Convert a number into a string - only two decimals
        var substrX = strX.toFixed(2);
        // Split a string into an array of substrings
        var x = substrX.split('.')[0];

        var strY = jtsk.x;
        // Convert a number into a string - only two decimals
        var substrY = strY.toFixed(2);
        // Split a string into an array of substrings
        var y = substrY.split('.')[0];

        if (debug) {
          console.log(jtsk);
          console.log('WGS84.lat: ' + wgslat);
          console.log('WGS84.lon: ' + wgslon);
          console.log('JTSK.x: ' + jtsk.y);
          console.log('JTSK.y: ' + jtsk.x);
          console.log('WGS84.lat -> JTSK.x: ' + substrX);
          console.log('WGS84.lon -> JTSK.y: ' + substrY);
        }

        // Ajax
        $.ajax({
          url: "/plugins/intranet2/admin/ajax/cuzk.php",
          type: 'POST',
          dataType: 'html',
          data: {
            x: x,
            y: y,
            street: street,
            city: city
          },
          cache: false,
          success: function (data) {

            // Find KU Name/Code in 'data'
            var ku_obec = $(data).find('#ku_obec').text();
            var ku_ncode = $(data).find('#ku_name_code').text();
            if (debug) {
              console.log('Finding Data | KU Obec: ' + ku_obec + '| KU Katastrální území: ' + ku_ncode);
            }

            // Setting value
            var ku_code1 = ku_obec.match(/\d+/);
            var ku_code2 = ku_ncode.match(/\d+/);
            if (debug) {
              console.log('KU Data | KU Kód Obce: ' + ku_code1 + ' | KU Kód Katastrálního území: ' + ku_code2)
            }

            // Output Data
            $('#outputajaxdata_katastr').html('').prepend(data).show();

            // Add data to element
            $('select[name="envo_house_cuzk_city"] option[data-city_cuzk_code="' + ku_code1 + '"]').attr('selected', 'selected');
            $('select[name="envo_house_cuzk_city"] + span span.select2-selection').css('background-color', '#FFF5CC');
            $('select[name="envo_house_cuzk_ku"] option[data-ku_cuzk_code="' + ku_code2 + '"]').attr('selected', 'selected');
            $('select[name="envo_house_cuzk_ku"] + span span.select2-selection').css('background-color', '#FFF5CC');

            // ReInit Select2 plugin
            $('select[name=envo_house_cuzk_city]').trigger('change');
            $('select[name=envo_house_cuzk_ku]').trigger('change');

            // Change background color - default color
            setTimeout(function () {
              $('select[name="envo_house_cuzk_city"] + span span.select2-selection').css('background-color', '#FFF');
              $('select[name="envo_house_cuzk_ku"] + span span.select2-selection').css('background-color', '#FFF');
            }, 8000);

            // Ajax time
            var totalTime = msToTime(Math.floor(new Date().getTime() - ajaxTime));
            $('#ajaxTime_katastr').html(totalTime);
            if (debug) {
              console.log('ajaxTime | Success Time: ' + totalTime);
            }

            // Loading data progress
            $('#loadingdata').hide().html('');

          },
          error: function (jqXHR, textStatus, errorThrown) {
            if (debug) {
              console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
            }
          },
          complete: function () {

          }
        });

      },
      error: function (jqXHR, textStatus, errorThrown) {
        if (debug) {
          console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
        }
      },
      complete: function () {

      }
    });

    return false;

  });

  /**
   * @description   Load data from CUZK by GPS - Object code
   */
  $('#loadObjCode').click(function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    if (debug) {
      console.log('----------- fn #loadObjCode click -----------');
    }

    // Get value
    var street = $('input[name="envo_housestreet"]').val();
    var streettrim = $.trim(street).replace(/\s/g, '+');
    var city = $('select[name="envo_housecity"]').find(':selected').data('city_name');
    var citytrim = $.trim(city).replace(/\s/g, '+');
    var converter = new JTSK_Converter();
    // Ajax time
    var ajaxTime = new Date().getTime();

    if (debug) {
      console.log('Data from FORM => street:' + streettrim + ' | city: ' + citytrim);
    }

    // Ajax
    $.ajax({
      url: '/plugins/intranet2/admin/ajax/gpscoordinates_osm.php',
      type: 'POST',
      dataType: 'json',
      data: {
        street: streettrim,
        city: citytrim
      },
      cache: false,
      // Timeout 20s
      timeout: 20000,
      beforeSend: function () {

        // Show progress circle
        $('#loadingdata').html('<div style="display:block;position:fixed;top:50%;left:50%;transform:translate(-35%, -50%);-ms-transform:translate(-35%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20 text-center"><span style="float: left;width: 100%;margin-bottom: 10px;font-weight: bold;font-size: 2em;">ČÚZK</span><span style="float: left;width: 100%;margin-bottom: 10px;">Načítání ... Prosím počkejte ...</span><span>Načítání dat může trvat i několik sekund / minut</span></div></div>').show();


      },
      success: function (data) {

        // Parse JSON data
        var str = JSON.stringify(data);
        var result = JSON.parse(str);
        // Get variable
        var wgslat = data['data'].lat;
        var wgslon = data['data'].lon;

        if (debug) {
          console.log('GPS Coordinates - Latitude: ' + wgslat + ' / Longitude: ' + wgslon);
        }


        var jtsk = converter.WGS84toJTSK(wgslat, wgslon);

        var strX = jtsk.y;
        // Convert a number into a string - only two decimals
        var substrX = strX.toFixed(2);
        // Split a string into an array of substrings
        var x = substrX.split('.')[0];

        var strY = jtsk.x;
        // Convert a number into a string - only two decimals
        var substrY = strY.toFixed(2);
        // Split a string into an array of substrings
        var y = substrY.split('.')[0];

        if (debug) {
          console.log(jtsk);
          console.log('WGS84.lat: ' + wgslat);
          console.log('WGS84.lon: ' + wgslon);
          console.log('JTSK.x: ' + jtsk.y);
          console.log('JTSK.y: ' + jtsk.x);
          console.log('WGS84.lat -> JTSK.x: ' + substrX);
          console.log('WGS84.lon -> JTSK.y: ' + substrY);
        }

        $.ajax({
          url: 'https://services.cuzk.cz/wfs/inspire-ad-wfs.asp?service=WFS&version=2.0.0&request=GetFeature&StoredQuery_id=GetFeatureByPoint&srsName=urn:ogc:def:crs:EPSG::4326&POINT=' + wgslat + ',' + wgslon + '&FEATURE_TYPE=Address',
          type: 'POST',
          dataType: 'xml',
          cache: false,
          success: function (data) {

            // Extract relevant data from XML
            var adId = data.getElementsByTagName("base:localId")[0];
            var adIdtxt = adId.innerHTML;

            if (debug) {
              console.log('adId: ' + adIdtxt);
              console.log('Links: http://vdp.cuzk.cz/vdp/ruian/adresnimista/' + adIdtxt.split('.')[1]);
            }
          },
          error: function () {

          },
          complete: function () {

          }
        });

        $.ajax({
          url: 'https://services.cuzk.cz/wfs/inspire-cp-wfs.asp?service=WFS&version=2.0.0&request=GetFeature&StoredQuery_id=GetFeatureByPoint&srsName=urn:ogc:def:crs:EPSG::4326&POINT=' + wgslat + ',' + wgslon + '&FEATURE_TYPE=CadastralParcel',
          type: 'POST',
          dataType: 'xml',
          cache: false,
          success: function (data) {


          },
          error: function () {

          },
          complete: function () {

          }
        });

        $.ajax({
          url: 'https://services.cuzk.cz/wfs/inspire-bu-wfs.asp?service=WFS&version=2.0.0&request=GetFeature&StoredQuery_id=GetFeatureByPoint&srsName=urn:ogc:def:crs:EPSG::4326&POINT=' + wgslat + ',' + wgslon + '&FEATURE_TYPE=Building',
          type: 'POST',
          dataType: 'xml',
          cache: false,
          success: function (data) {

            // Extract relevant data from XML
            var buId = data.getElementsByTagName("base:localId")[0];
            var name = data.getElementsByTagName("bu-base:name")[0];
            name && (name = (name = name.getElementsByTagName("gn:text")) ? name[0].textContent : null);
            var buVdpId = data.getElementsByTagName("bu-base:reference")[0].textContent;

            if (debug) {
              console.log('buId: ' + buId.innerHTML);
              console.log('buTag: ' + name);
              console.log('buVdpId: ' + buVdpId);
            }

            // Data variable for output DIV
            var divdata = '';
            divdata += '<div  class="col-sm-12">' +
              '<h5>Získaná data z databáze ČÚZK dle adresy sídla</h5><hr>' +
              '<p><strong>ČÚZK: GPS data byla nalezena a data byla stažena</strong></p>' +
              '<p>Doba zpracování požadavku: <span id="ajaxTime_katastr">' + totalTime + '</span></p><hr>' +
              '<p>Vybraná adresa pro vyhledání dat: ' + street + ', ' + city + '</p><hr>' +
              '<p><strong>buId: </strong> ' + buId.innerHTML + '</p>' +
              '<p><strong style="color: #C10000;">Kód objektu (buVdpId): </strong> ' + buVdpId + '</p>' +
              '<p><strong>Stavba na pozemku (buTag): </strong> ' + name + '</p>' +
              '<p><strong>Detail stavebního objektu: </strong><a href="http://vdp.cuzk.cz/vdp/ruian/stavebniobjekty/' + buVdpId + '" target="WindowCUZK">Zobrazit detail objektu na ČÚZK</a></p><hr>' +
              '</div>';

            // Output Data
            $('#outputajaxdata_katastr').html('').prepend(divdata).show();
            $('input[name="envo_house_cuzk_objcode"]').val(buVdpId).css('background-color', '#FFF5CC');
            $('#cuzk_objdetail_link').html('');
            $('<a/>', {
              href: 'http://vdp.cuzk.cz/vdp/ruian/stavebniobjekty/' + buVdpId,
              text: 'Zobrazit detail objektu',
              target: 'WindowCUZK'
            }).appendTo($('#cuzk_objdetail_link'));

            // Remove background color from 'input'
            setTimeout(function () {
              $('input[name="envo_house_cuzk_objcode"]').css('background-color', '#FFF');
            }, 8000);

            // Ajax time
            var totalTime = msToTime(Math.floor(new Date().getTime() - ajaxTime));
            $('#ajaxTime_katastr').html(totalTime);
            if (debug) {
              console.log('ajaxTime | Success Time: ' + totalTime);
            }

            // Loading data progress
            $('#loadingdata').hide().html('');

          },
          error: function (jqXHR, textStatus, errorThrown) {

            // Loading data progress
            $('#loadingdata').html('<div style="display:block;position:fixed;top:50%;left:50%;transform:translate(-35%, -50%);-ms-transform:translate(-35%, -50%);"><div class="m-t-20 text-center"><span style="float: left;width: 100%;margin-bottom: 10px;font-weight: bold;font-size: 2em;">ČÚZK</span><span style="float: left;width: 100%;margin-bottom: 10px;color: #C10000;font-weight: 700;">Vypršel časový limit pro komunikaci se serverem ČÚZK</span><span style="color: #C10000; font-weight: 700;">Server ČÚZK neodpovídá -> obnovte stránku a zkuste hledání později!</span></div></div>');

            if (debug) {
              console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
            }

            if (textStatus === 'timeout') {
              if (debug) console.log('Timeout: ' + textStatus + ': ' + errorThrown);
            } else {
              if (debug) console.log(textStatus + ': ' + errorThrown);
            }
          },
          complete: function () {

          }
        });

      },
      error: function (jqXHR, textStatus, errorThrown) {
        if (debug) {
          console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
        }
      },
      complete: function () {

      }
    });

  });

  /**
   * @description   Load iKatastr
   */
  $('#loadIkatastr').click(function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    if (debug) {
      console.log('----------- fn #loadIkatastr click -----------');
    }

    // Get value
    var street = $('input[name="envo_housestreet"]').val();
    var streettrim = $.trim(street).replace(/\s/g, '+');
    var city = $('select[name="envo_housecity"]').find(':selected').data('city_name');
    var citytrim = $.trim(city).replace(/\s/g, '+');
    // Ajax time
    var ajaxTime = new Date().getTime();

    // Ajax
    $.ajax({
      url: '/plugins/intranet2/admin/ajax/gpscoordinates_osm.php',
      type: 'POST',
      dataType: 'json',
      data: {
        street: streettrim,
        city: citytrim
      },
      cache: false,
      // Timeout 20s
      timeout: 20000,
      success: function (data) {

        // Parse JSON data
        var str = JSON.stringify(data);
        var result = JSON.parse(str);
        // Get variable
        var wgslat = data['data'].lat;
        var wgslon = data['data'].lon;

        if (debug) {
          console.log('GPS Coordinates - Latitude: ' + wgslat + ' / Longitude: ' + wgslon);
        }

        // Set ikatastr text for input
        var ikatastr = 'https://www.ikatastr.cz/#kde=' + wgslat + ',' + wgslon + ',19&mapa=osm&vrstvy=parcelybudovy&info=' + wgslat + ',' + wgslon;

        // Data variable for output DIV
        var divdata = '';
        divdata += '<div  class="col-sm-12">' +
          '<h5>iKatastr - Link</h5><hr>' +
          '<p>Doba zpracování požadavku: <span id="ajaxTime_katastr">' + totalTime + '</span></p><hr>' +
          '<p>Vybraná adresa pro vyhledání dat: ' + street + ', ' + city + '</p><hr>' +
          '<p><a href="' + ikatastr + '" target="WindowKATASTR">Zobrazit informace z Katastru</a></p><hr>' +
          '</div>';

        // Output Data
        $('#outputajaxdata_katastr').html('').prepend(divdata).show();

        // Ajax time
        var totalTime = msToTime(Math.floor(new Date().getTime() - ajaxTime));
        $('#ajaxTime_katastr').html(totalTime);
        if (debug) {
          console.log('ajaxTime | Success Time: ' + totalTime);
        }

      },
      error: function (jqXHR, textStatus, errorThrown) {
        if (debug) {
          console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
        }
      },
      complete: function () {

      }
    });

  });

  /**
   * @description   Load Statistical data
   */
  $('#loadStatistic').click(function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    if (debug) {
      console.log('----------- fn #loadStatistic click -----------');
    }

    // Get value
    var objcode = $.trim($('input[name="envo_house_cuzk_objcode"]').val()).replace(/\s/g, '+');
    // Ajax time
    var ajaxTime = new Date().getTime();

    // Ajax
    $.ajax({
      url: '/plugins/intranet2/admin/ajax/statistics.php',
      type: 'POST',
      dataType: 'html',
      data: {
        objcode: objcode
      },
      cache: false,
      // Timeout 20s
      timeout: 20000,
      beforeSend: function () {

        // Show progress circle
        $('#loadingdata').html('<div style="display:block;position:fixed;top:50%;left:50%;transform:translate(-35%, -50%);-ms-transform:translate(-35%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20 text-center"><span style="float: left;width: 100%;margin-bottom: 10px;font-weight: bold;font-size: 2em;">STATISTIKA</span><span style="float: left;width: 100%;margin-bottom: 10px;">Načítání ... Prosím počkejte ...</span><span>Načítání dat může trvat i několik sekund / minut</span></div></div>').show();


      },
      success: function (data) {

        // Output Data
        $('#outputajaxdata_statistics').html('').prepend(data).show();

        // Ajax time
        var totalTime = msToTime(Math.floor(new Date().getTime() - ajaxTime));
        $('#ajaxTime_statistics').html(totalTime);
        if (debug) {
          console.log('ajaxTime | Success Time: ' + totalTime);
        }

        // Loading data progress
        $('#loadingdata').hide().html('');

        //
        $('.123456').each(function () {
          var value = $(this).data('val');
          var valueupl = $(this).data('val-upl');
          var element = $(this).data('el');
          var elementname = $(this).data('el-name');
          var targetel = $(element + '[name="' + elementname + '"]');
          var targetelupl = $('input[name="' + elementname + '_upl"]');

          targetelupl.val(valueupl);

          if (element == 'select') {
            // Add Data
            $('select[name="' + elementname + '"]').val(value);
            // Change background color
            $('select[name="' + elementname + '"] + span span.select2-selection').css('background-color', '#FFF5CC');
            // ReInit Select2 plugin
            $('select[name="' + elementname + '"]').trigger('change');

            // Change background color - default color
            setTimeout(function () {
              $('select[name="' + elementname + '"] + span span.select2-selection').css('background-color', '#FFF');
            }, 8000);
          } else {
            // Change background color
            $('input[name="' + elementname + '"]').val(value).css('background-color', '#FFF5CC');

            // Remove background color from 'input'
            setTimeout(function () {
              $('input[name="' + elementname + '"]').css('background-color', '#FFF');
            }, 8000);
          }

        });

      },
      error: function (jqXHR, textStatus, errorThrown) {
        if (debug) {
          console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
        }
      },
      complete: function () {

      }
    });

  });

  /**
   *
   */
  $('#testgps_osm').click(function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    if (debug) {
      console.log('----------- fn #Testgps_osm click -----------');
    }

    // Get value
    var street = $('input[name="envo_housestreet"]').val();
    var streettrim = $.trim(street).replace(/\s\s+/g, '+');
    var city = $('select[name="envo_housecity"]').find(':selected').data('city_name');
    var citytrim = $.trim(city).replace(/\s\s+/g, '+');
    // Ajax time
    var ajaxTime = new Date().getTime();

    if (debug) {
      console.log('Testgps_osm Click fn | Adress: ' + street + ', ' + city);
    }

    // Ajax
    $.ajax({
      url: '/plugins/intranet2/admin/ajax/gpscoordinates_osm.php',
      type: 'POST',
      dataType: 'json',
      data: {
        street: streettrim,
        city: citytrim
      },
      cache: false,
      // Timeout 20s
      timeout: 20000,
      beforeSend: function () {

      },
      success: function (data) {

        // Get variable
        var wgslat = data['data'].lat;
        var wgslon = data['data'].lon;

        // Ajax time
        var totalTime = msToTime(Math.floor(new Date().getTime() - ajaxTime));
        if (debug) {
          console.log('ajaxTime | Success Time: ' + totalTime);
          console.log('GPS Coordinates - Latitude: ' + wgslat + ' / Longitude: ' + wgslon);
        }

      },
      error: function (jqXHR, textStatus, errorThrown) {
        if (debug) {
          console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
        }
      },
      complete: function () {

      }
    });

  });

  /**
   *
   */
  $('#testgps_mapy').click(function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    if (debug) {
      console.log('----------- fn #Testgps_mapy click -----------');
    }

    // Get value
    var street = $('input[name="envo_housestreet"]').val();
    var streettrim = $.trim(street).replace(/\s\s+/g, '+');
    var city = $('select[name="envo_housecity"]').find(':selected').data('city_name');
    var citytrim = $.trim(city).replace(/\s\s+/g, '+');
    // Ajax time
    var ajaxTime = new Date().getTime();

    if (debug) {
      console.log('Testgps_mapy Click fn | Adress: ' + street + ', ' + city);
    }

    // Ajax
    $.ajax({
      url: '/plugins/intranet2/admin/ajax/gpscoordinates_mapy.php',
      type: 'POST',
      dataType: 'json',
      data: {
        street: streettrim,
        city: citytrim
      },
      cache: false,
      // Timeout 20s
      timeout: 20000,
      beforeSend: function () {

      },
      success: function (data) {

        // Parse JSON data
        var str = JSON.stringify(data);
        var result = JSON.parse(str);

        var wgslat, wgslon = '';

        // Get variable
        $.each(data.data, function (item) {

          console.log (data.data[item]);

          wgslat = data.data[item].y;
          wgslon = data.data[item].x;

        });
        // Ajax time
        var totalTime = msToTime(Math.floor(new Date().getTime() - ajaxTime));
        if (debug) {
          console.log('ajaxTime | Success Time: ' + totalTime);
          console.log('GPS Coordinates - Latitude: ' + wgslat + ' / Longitude: ' + wgslon);
        }

      },
      error: function (jqXHR, textStatus, errorThrown) {
        if (debug) {
          console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
        }
      },
      complete: function () {

      }
    });

  });

});

/** 00. DateTimePicker
 * @require: DateTimePicker Plugin
 ========================================================================*/

$(function () {
  'use strict';

  /* DateTimePicker
   ========================================= */
  // Init DateTimePicker
  initializeDateTimePicker('#datepickerTime');

});

/** 00. DATATABLE CONFIG
 * @require: SearchHighlight Plugin
 * @source:
 * https://bartaz.github.io/sandbox.js/jquery.highlight.js
 * https://cdn.datatables.net/plug-ins/1.10.10/features/searchHighlight/dataTables.searchHighlight.min.js
 ========================================================================*/

$(function () {
  'use strict';

  // Init Datatable plugin
  var table = $('#int2_table');

  if (table.length) {
    table.DataTable({
      // Language
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Czech.json"
      },
      "order": [],
      "columnDefs": [
        {
          "targets": 'no-sort',
          "orderable": false
        }],
      // Page lenght
      "pageLength": dataTablesSettings.pageLenght,
      // Show entries
      //"lengthMenu": [ [10,20, -1], [10,20, "All"] ],
      // Design Table items
      "dom": "<'row'<'col-sm-6'<'float-left m-b-20'f>><'col-sm-6'<'float-right m-r-20 hidden-xs'B>>>" + "<'row'<'col-sm-12'tr>>" + "<'row '<'col-sm-7'i><'float-right col-sm-5'p>>",
      // Enable datatables.mark.js highlighting
      mark: true
    });
  }

});

/** CHECKBOX - DELETE ROW
 ========================================================================*/

$(function () {
  'use strict';

  /* Check all checkbox */
  $('#envo_delete_all').click(function () {
    var checkedStatus = this.checked;
    if (checkedStatus) {
      $('#button_delete').prop('disabled', false);
    } else {
      $('#button_delete').attr('disabled', true);
    }
    $('.highlight').each(function () {
      $(this).prop('checked', checkedStatus);
    });
  });

  /* Disable submit button if checkbox is not checked */
  $('.highlight').change(function () {
    if (this.checked) {
      $('#button_delete').prop('disabled', false);
    } else {
      if ($('.highlight').filter(':checked').length < 1) {
        $('#envo_delete_all').prop('checked', false);
        $('#button_delete').attr('disabled', true);
      }
    }
  });

});

/** 00. COPY HOUSE DATA
 ========================================================================*/

$(function () {
  'use strict';

  function selecthouse (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    var valID = $(this).attr("data-value");

    $.ajax({
      url: '/plugins/intranet2/admin/ajax/int2_houseselect_process.php',
      type: 'POST',
      datatype: 'json',
      data: {
        valID: valID
      },
      success: function (data) {

        var res = $.parseJSON(data);

        $('input[name="envo_housename"]').val(res.name);
        $('input[name="envo_househeadquarters"]').val(res.headquarters);
        $('input[name="envo_housestreet"]').val(res.street);
        $('select[name="envo_housecity"]').val(res.city);
        $('input[name="envo_housepsc"]').val(res.psc);
        $('input[name="envo_houseic"]').val(res.ic);
        $('input[name="envo_dataares"]').val(res.ic);
        $('input[name="envo_housefname"]').val(res.housefname);
        $('input[name="envo_housefstreet"]').val(res.housefstreet);
        $('input[name="envo_housefcity"]').val(res.housefcity);
        $('input[name="envo_housefpsc"]').val(res.housefpsc);
        $('input[name="envo_housefic"]').val(res.housefic);
        $('input[name="envo_housefdic"]').val(res.housefdic);
        $('select[name="envo_estatemanagement"]').val(res.estatemanagement);

        // ReInit Select2 plugin
        // Selector array
        var array = [
          'select[name=envo_housecity]',
          'select[name=envo_estatemanagement]'
        ];
        var element = $(array.join(', '));
        element.trigger('change');

        // Hide modal
        $("#ENVOModalPlugin").modal('hide');
      },
      error: function (jqXHR, textStatus, errorThrown) {
        if (debug) {
          console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
        }
      },
      complete: function () {

      }
    });

    return false;
  }

  $('#houseSelect').on('click', function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    if (debug) {
      console.log('----------- fn #houseSelect click -----------')
    }

    var altura = $(window).height() - 155; //value corresponding to the modal heading + footer
    $('#ENVOModalPlugin .modal-body').css({"height": altura, "overflow-y": "auto"});

    // AJAX request
    $.ajax({
      url: '/plugins/intranet2/admin/ajax/int2_houseselect_modal.php',
      type: 'POST',
      dataType: 'html',
      beforeSend: function () {

        // Show progress circle
        $('#ENVOModalPlugin .modal-body').html('<div style="display:block;position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20">Načítání ... Prosím počkejte</div></div>');

        // Display Modal
        $('#ENVOModalPlugin').modal('show');

      },
      success: function (data) {

        setTimeout(function () {

          // Add response in Modal body
          $('#ENVOModalPlugin .modal-body').hide().html(data).fadeIn(900);

          //
          $('.selecthouse').click(selecthouse);

          // Init Datatable plugin
          $('#int_table').dataTable({
            // Language
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Czech.json"
            },
            "order": [],
            "columnDefs": [{
              "targets": 'no-sort',
              "orderable": false
            }],
            // Page lenght
            "pageLength": dataTablesSettings.pageLenght,
            // Show entries
            //"lengthMenu": [ [10,20, -1], [10,20, "All"] ],
            // Design Table items
            "dom": "<'row'<'col-sm-6'<'float-left m-b-20'f>><'col-sm-6'<'float-right m-r-20 hidden-xs'B>>>" + "<'row'<'col-sm-12'tr>>" + "<'row '<'col-sm-7'i><'float-right col-sm-5'p>>"
          });

        }, 1000);

      },
      error: function (jqXHR, textStatus, errorThrown) {
        if (debug) {
          console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
        }
      },
      complete: function () {

      }
    });

  });

});

/** 00. COPY ADRESS TO CLIPBOARD
 ========================================================================*/

$(function () {
  'use strict';

  $('.copyadress').click(function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    if (debug) {
      console.log('----------- fn .copyadress click -----------')
    }

    // Getting value
    var street1 = $('input[name=envo_housestreet]').val();
    if ($('input[name=envo_entstreet]').length) {
      var street2 = $('input[name=envo_entstreet]').val();
    } else {
      var street2 = '';
    }
    var city = $('select[name="envo_housecity"]').find(':selected').data('city_name');

    if (street2.length > 0) {
      var adress = street2 + ', ' + city;
    } else {
      var adress = street1 + ', ' + city;
    }

    if (debug) {
      console.log('Copyadress Click fn | Adress: ' + adress)
    }
    // Create a dummy input to copy the string array inside it
    var dummy = document.createElement("input");

    // Add it to the document
    document.body.appendChild(dummy);

    // Set its ID
    dummy.setAttribute("id", "dummy_id");

    // Output the array into it
    document.getElementById("dummy_id").value = adress;

    // Select it
    dummy.select();

    // Copy its contents
    document.execCommand('copy');

    // Remove it as its not needed anymore
    document.body.removeChild(dummy);
  });

});

/** 00. TASKS MANAGER
 ========================================================================*/

$(function () {
  'use strict';

  /**
   * @description Click Task Header - House
   */
  function clickTaskHeader () {

    if (debug) {
      console.log('----------- fn clickTaskHeader -----------')
    }

    var header = $(this);
    //getting text element
    var text = header.children('span.collapsetask');
    //getting the next element
    var content = header.next().next();
    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
    content.slideToggle(500, function () {
      //execute this after slideToggle is done
      //change text of header based on visibility of content div
      text.text(function () {
        //change text based on condition
        return content.is(':visible') ? '-' : '+';
      });
    });
  }

  /**
   * @description Jquery Function - DialogFX Open - Task - House
   * @example
   * Attribute 'data-dialog' in button => ID of dialog 'div' block
   * -----------------
   * <button class="" id="" type="button" data-dialog="DialogNew"></button>
   *
   *  <div id="DialogNew" class="dialog dialog-details">
   *    <div class="dialog__overlay"></div>
   *    <div class="dialog__content">
   *      <div class="container-fluid">
   *        <div class="row dialog__overview">
   *
   *        </div>
   *      </div>
   *      <button class="close action top-right" type="button" data-dialog-close>
   *        <i class="pg-close fs-14"></i>
   *      </button>
   *    </div>
   *  </div>
   *  @calling_action
   *  element -> element for getting street
   *  $('#elementID').click(openDialogNewEnt);
   */
  function openDialogNewTask (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    if (debug) {
      console.log('----------- fn openDialogNewTask -----------')
    }

    // Get Data-Dialog and value
    var DataDialog = $(this).attr('data-dialog');
    var houseID = pageID;

    if (debug) {
      console.log('Add New Task Click fn | Dialog ID: ' + DataDialog);
    }

    // Show progress circle
    $('#' + DataDialog + ' .dialog__overview').html('<div style="display:block;position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20">Načítání ... Prosím počkejte</div></div>');

    // Load content do DIV
    setTimeout(function () {

      $('#' + DataDialog + ' .dialog__overview').load('/plugins/intranet2/admin/ajax/content_new_task.php', function (responseTxt, statusTxt, xhr) {

        if (statusTxt == "success") {
          if (debug) {
            console.log('Loading content | External content loaded successfully!');
          }

          // Init TinyMCE

          // Fix for NS_ERROR_UNEXPECTED in Mozilla
          try {
            tinymce.remove("textarea.envoEditorSmall");
          } catch (e) {
          }
          initializeTinyMce('textarea.envoEditorSmall', 300);

          // Init Select2 plugin
          $('#' + DataDialog + ' .selectpicker').select2({
            minimumResultsForSearch: -1,
            dropdownParent: $('.page-content-wrapper'),
            dropdownCssClass: 'zindex1060'
          });

          // Init DateTimePicker
          initializeDateTimePicker('input[name=envo_addtasktime]');
          initializeDateTimePicker('input[name=envo_addtaskreminder]');

        }

        if (statusTxt == "error") {
          if (debug) {
            console.log('Loading content | Error: ' + xhr.status + ': ' + xhr.statusText);
          }
        }

      });

    }, 1000);


    // Open DialogFX
    var dialogEl = document.getElementById(DataDialog);
    var dlg = new DialogFx(dialogEl, {
      onOpenDialog: function (instance) {
        // Open DialogFX
        if (debug) {
          console.log('DialogFX: OPEN');
        }
      },
      onCloseDialog: function (instance) {
        // Close DialogFX
        if (debug) {
          console.log('DialogFX: CLOSE');
        }

        //
        $('#' + DataDialog + ' .dialog__overview').html('');
        // Enable 'button'
        $('#saveTask').attr('disabled', false);
      }
    });
    dlg.toggle(dlg);

    return false;
  }

  /**
   * @description Jquery Function - DialogFX Open - Task - House
   * @example
   * Attribute 'data-dialog' in button => ID of dialog 'div' block
   * -----------------
   * <button class="dialog-open" type="button" data-dialog="DialogEdit"></button>
   *
   *  <div id="DialogEdit" class="dialog item-details">
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
   */
  function openDialogEditTask (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    if (debug) {
      console.log('----------- fn openDialogEditTask -----------')
    }

    // Get Data-Dialog
    var DataDialog = $(this).attr('data-dialog');
    // Get ID of Task
    var taskID = $(this).attr('data-id');

    // Ajax
    $.ajax({
      url: '/plugins/intranet2/admin/ajax/int2_table_dialog_task.php',
      type: 'POST',
      datatype: 'html',
      data: {
        taskID: taskID
      },
      beforeSend: function () {

        // Show progress circle
        $('#' + DataDialog + ' .dialog__overview').html('<div style="display:block;position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20">Načítání ... Prosím počkejte</div></div>');

      },
      success: function (data) {

        setTimeout(function () {
          // Add html data to 'div'
          $('#' + DataDialog + ' .dialog__overview').hide().html(data).fadeIn(900);

          // Init TinyMCE

          // Fix for NS_ERROR_UNEXPECTED in Mozilla
          try {
            tinymce.remove("textarea.envoEditorSmall");
          } catch (e) {
          }
          initializeTinyMce('textarea.envoEditorSmall', 300);

          // Init Select2 plugin
          $('#' + DataDialog + ' .selectpicker').select2({
            minimumResultsForSearch: -1,
            dropdownParent: $('.page-content-wrapper'),
            dropdownCssClass: 'zindex1060'
          });

          // Init DateTimePicker
          initializeDateTimePicker('input[name=envo_edittasktime]');
          initializeDateTimePicker('input[name=envo_edittaskreminder]');

        }, 1000);

      },
      error: function (jqXHR, textStatus, errorThrown) {
        if (debug) {
          console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
        }
      },
      complete: function () {

      }
    });

    // Open DialogFX
    var dialogEl = document.getElementById(DataDialog);
    var dlg = new DialogFx(dialogEl, {
      onOpenDialog: function (instance) {
        // Open DialogFX
        if (debug) {
          console.log('DialogFX: OPEN');
        }
      },
      onCloseDialog: function (instance) {
        // Close DialogFX
        if (debug) {
          console.log('DialogFX: CLOSE');
        }

        //
        $('#' + DataDialog + ' .dialog__overview').html('');
      }
    });
    dlg.toggle(dlg);

    return false;
  }

  /**
   * @description Jquery Function - Delete Task from DB - House
   * @example
   * Attribute 'data-id' in button => ID is id of image in DB
   * -----------------
   * <button class="deleteTask" type="button" data-id="id_of_task_in_DB"></button>
   *
   */
  function deleteTask (taskID) {

    if (debug) {
      console.log('----------- fn deleteTask -----------')
    }

    // Ajax
    $.ajax({
      url: '/plugins/intranet2/admin/ajax/int2_table_delete_task.php',
      type: 'POST',
      datatype: 'json',
      data: {
        taskID: taskID
      },
      success: function (data) {

        if (data.status == 'delete_success') {
          // IF DATA SUCCESS

          // Removes elements from the Isotope instance and DOM
          $('#task_' + data.data[0].id).remove();

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: '<strong>Success:</strong> ' + data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);

        } else {
          // IF DATA ERROR

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              icon: 'fa fa-exclamation',
              message: '<strong>Error:</strong> ' + data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 5000
            });
          }, 1000);

        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        if (debug) {
          console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
        }
      },
      complete: function () {

      }
    });

    return false;
  }

  function confirmDeleteTask (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    if (debug) {
      console.log('----------- fn confirmDeleteTask -----------')
    }

    // Get ID of Task
    var taskID = $(this).attr('data-id');

    // Show Message
    bootbox.setLocale(envoWeb.envo_lang);
    bootbox.confirm({
      title: "Potvrzení o odstranění!",
      message: $(this).attr('data-confirm-deltask'),
      className: "bootbox-confirm-del",
      animate: true,
      buttons: {
        confirm: {
          className: 'btn-success'
        },
        cancel: {
          className: 'btn-danger'
        }
      },
      callback: function (result) {
        if (result == true) {
          if (debug) {
            console.log('Delete Task - ID: ' + taskID);
          }
          deleteTask(taskID);
        }
      }
    });

    return false;
  }

  /**
   * @description  Show task description in task list
   */
  $('.taskheader').click(clickTaskHeader);

  /**
   * @description  Add new Task
   */
  $('#addTask').click(openDialogNewTask);

  /**
   * @description  Save Task
   */
  $('#saveTask').on('click', function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    if (debug) {
      console.log('----------- fn #saveTask click -----------')
    }

    // Storing $(this) in a variable
    var $this = $(this);
    // Get value
    var houseID = pageID;
    var priority = $('select[name=envo_addtaskpriority]').val();
    var status = $('select[name=envo_addtaskstatus]').val();
    var title = $('input[name=envo_addtasktitle]').val();
    var description = tinymce.get('envoEditorSmall').getContent();
    var reminder = $('input[name=envo_addtaskreminder]');
    var reminderval = reminder.val();
    var time = $('input[name=envo_addtasktime]');
    var timeval = time.val();

    if (debug) {
      console.log('Save Task Click fn | Data => houseID - ' + houseID + ' | priority -  ' + priority + ' | status - ' + status + ' | title - ' + title + ' | description - ' + description + ' | reminderval - ' + reminderval + ' | timeval - ' + timeval);
    }

    if (timeval.length) {
      if (reminderval.length) {

        // Ajax
        $.ajax({
          url: '/plugins/intranet2/admin/ajax/int2_table_addnew_task.php',
          type: 'POST',
          datatype: 'json',
          data: {
            houseID: houseID,
            priority: priority,
            status: status,
            title: title,
            description: description,
            reminder: reminderval,
            time: timeval
          },
          success: function (data) {

            // Parse JSON data
            var str = JSON.stringify(data);
            var result = JSON.parse(str);

            if (data.status == 'success') {
              // IF DATA SUCCESS

              var divdata = '';
              var dataID = '';

              $.each(result, function (key, data) {

                if (key === 'data') {

                  $.each(data, function (index, data) {

                    if (debug) {
                      console.log('Save Task Click fn | Ajax -> Key data[id]: ' + data['id']);
                    }

                    dataID = data["id"];

                    divdata += '<div id="task_' + data["id"] + '" class="task_' + data["id"] + '">' +
                      '<div class="taskheader bg-teal-600"><span>Task ID ' + data["id"] + '</span><span class="float-right collapsetask">+</span></div>' +
                      '<div class="taskinfo">' +
                      '<div class="table-responsive">' +
                      '<table class="table table-task">' +
                      '<thead>' +
                      '<tr>' +
                      '<th>Titulek</th>' +
                      '<th>Priorita</th>' +
                      '<th>Status</th>' +
                      '<th>Datum Úkolu</th>' +
                      '<th>Datum Připomenutí</th>' +
                      '<th></th>' +
                      '</tr>' +
                      '</thead>' +
                      '<tbody>' +
                      '<tr>' +
                      '<td>' + data["title"] + '</td>' +
                      '<td>' + data["priority"] + '</td>' +
                      '<td>' + data["status"] + '</td>' +
                      '<td>' + data["time"] + '</td>' +
                      '<td>' + data["reminder"] + '</td>' +
                      '<td class="text-center"><button type="button" id="editTask" class="btn btn-default btn-xs m-r-20 editTask" data-toggle="tooltipEnvo" title="" data-dialog="taskDialogEdit" data-original-title="Editovat" data-id="' + data["id"] + '"><i class="fa fa-edit"></i></button>' +
                      '<button type="button" class="btn btn-danger btn-xs deleteTask" data-confirm-deltask="Jste si jistý, že chcete odstranit úkol <strong>' + data["title"] + '</strong>" data-toggle="tooltipEnvo" title="Odstranit" data-id="' + data["id"] + '"><i class="fa fa-trash-o"></i></button></td>' +
                      '</tr>' +
                      '</tbody>' +
                      '</table>' +
                      '</div>' +
                      '</div>' +
                      '<div class="taskcontent">' +
                      '<p><strong >Popis Úkolu:</strong></p>' +
                      '<div class="taskdescription">' + data["description"] + '</div>' +
                      '</div>' +
                      '</div>';

                  })

                }

              });

              // Remove DIV element - Alert
              var divalert = $('#tasklist .alert.bg-info');

              if (divalert) {
                divalert.parent().remove();
              }

              // Put data to DIV
              $('#tasklist').prepend(divdata);

              // Call function
              $('#task_' + dataID + ' .taskheader').click(clickTaskHeader);
              $('#task_' + dataID + ' .editTask').click(openDialogEditTask);
              $('#task_' + dataID + ' .deleteTask').click(confirmDeleteTask);

              // Disable 'button'
              $this.attr('disabled', true);

              // Notification
              // Apply the plugin to the container
              $('#task_notify_add').pgNotification({
                style: 'bar',
                message: '<strong>Success:</strong> ' + data.status_msg,
                position: 'top',
                timeout: 2000,
                type: 'success',
                showClose: false
              }).show();

            } else {
              // IF DATA ERROR

              // Disable 'button'
              $this.attr('disabled', true);

              // Notification
              // Apply the plugin to the container
              $('#task_notify_add').pgNotification({
                style: 'bar',
                message: '<strong>Error:</strong> ' + data.status_msg,
                position: 'top',
                timeout: 2000,
                type: 'danger',
                showClose: false
              }).show();

            }

          },
          error: function (jqXHR, textStatus, errorThrown) {
            if (debug) {
              console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
            }
          },
          complete: function () {

          }
        });

      } else {
        // Set border for input - error
        reminder.parent().addClass('has-error');
        if (debug) {
          console.log('Save Task Click fn | Error E02')
        }
      }
    } else {
      // Set border for input - error
      time.parent().addClass('has-error');
      if (debug) {
        console.log('Save Task Click fn | Error E01')
      }
    }


  });

  /**
   * @description  Edit Task
   */
  $('.editTask').click(openDialogEditTask);

  /**
   * @description  Update Task
   */
  $('#udpateTask').on('click', function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    if (debug) {
      console.log('----------- fn #udpateTask click -----------')
    }

    // Get value
    var taskID = $('input[name=envo_edittaskid]').val();
    var houseID = pageID;
    var priority = $('select[name=envo_edittaskpriority]').val();
    var status = $('select[name=envo_edittaskstatus]').val();
    var title = $('input[name=envo_edittasktitle]').val();
    var description = tinymce.get('envoEditorSmall').getContent();
    var reminder = $('input[name=envo_edittaskreminder]');
    var reminderval = reminder.val();
    var time = $('input[name=envo_edittasktime]');
    var timeval = time.val();

    if (timeval.length) {
      if (reminderval.length) {

        // Ajax
        $.ajax({
          url: '/plugins/intranet2/admin/ajax/int2_table_update_task.php',
          type: 'POST',
          datatype: 'json',
          data: {
            taskID: taskID,
            houseID: houseID,
            priority: priority,
            status: status,
            title: title,
            description: description,
            reminder: reminderval,
            time: timeval
          },
          success: function (data) {

            // Parse JSON data
            var str = JSON.stringify(data);
            var result = JSON.parse(str);

            if (data.status == 'update_success') {
              // IF DATA SUCCESS

              var divdata = '';
              var dataID = '';

              $.each(result, function (key, data) {

                if (key === 'data') {

                  $.each(data, function (index, data) {

                    if (debug) {
                      console.log('Save Task Click fn | Ajax -> Key data[id]: ' + data['id']);
                    }

                    dataID = data["id"];

                    if (data["description"].length > 0) {
                      description = data["description"];
                    } else {
                      description = '<span class="bold text-warning-dark">Úkol nemá popis</span>';
                    }

                    divdata += '<div class="taskheader bg-teal-600"><span>Task ID ' + data["id"] + '</span><span class="float-right collapsetask">+</span></div>' +
                      '<div class="taskinfo">' +
                      '<div class="table-responsive">' +
                      '<table class="table table-task">' +
                      '<thead>' +
                      '<tr>' +
                      '<th>Titulek</th>' +
                      '<th>Priorita</th>' +
                      '<th>Status</th>' +
                      '<th>Datum Úkolu</th>' +
                      '<th>Datum Připomenutí</th>' +
                      '<th></th>' +
                      '</tr>' +
                      '</thead>' +
                      '<tbody>' +
                      '<tr>' +
                      '<td>' + data["title"] + '</td>' +
                      '<td>' + data["priority"] + '</td>' +
                      '<td>' + data["status"] + '</td>' +
                      '<td>' + data["time"] + '</td>' +
                      '<td>' + data["reminder"] + '</td>' +
                      '<td class="text-center"><button type="button" id="editTask" class="btn btn-default btn-xs m-r-20 editTask" data-toggle="tooltipEnvo" title="" data-dialog="taskDialogEdit" data-id="' + data["id"] + '" data-original-title="Editovat"><i class="fa fa-edit"></i></button>' +
                      '<button type="button" class="btn btn-danger btn-xs deleteTask" data-confirm-deltask="Jste si jistý, že chcete odstranit úkol <strong>' + data["title"] + '</strong>" data-toggle="tooltipEnvo" title="Odstranit" data-id="' + data["id"] + '"><i class="fa fa-trash-o"></i></button></td>' +
                      '</tr>' +
                      '</tbody>' +
                      '</table>' +
                      '</div>' +
                      '</div>' +
                      '<div class="taskcontent">' +
                      '<p><strong >Popis Úkolu:</strong></p>' +
                      '<div class="taskdescription">' + description + '</div>' +
                      '</div>';

                  })

                }

              });

              // Put data to DIV
              $('#task_' + dataID).html(divdata);

              // Call function
              $('#task_' + dataID + ' .taskheader').click(clickTaskHeader);
              $('#task_' + dataID + ' .editTask').click(openDialogEditTask);
              $('#task_' + dataID + ' .deleteTask').click(confirmDeleteTask);

              // Notification
              // Apply the plugin to the container
              $('#task_notify_edit').pgNotification({
                style: 'bar',
                message: '<strong>Success:</strong> ' + data.status_msg,
                position: 'top',
                timeout: 2000,
                type: 'success',
                showClose: false
              }).show();

            } else {
              // IF DATA ERROR

              // Notification
              // Apply the plugin to the container
              $('#task_notify_edit').pgNotification({
                style: 'bar',
                message: data.status_msg,
                position: 'top',
                timeout: 2000,
                type: 'danger',
                showClose: false
              }).show();

            }

          },
          error: function (jqXHR, textStatus, errorThrown) {
            if (debug) {
              console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
            }
          },
          complete: function () {

          }
        });

      } else {
        // Set border for input - error
        reminder.parent().addClass('has-error');
        if (debug) {
          console.log('Save Task Click fn | Error E02')
        }
      }
    } else {
      // Set border for input - error
      time.parent().addClass('has-error');
      if (debug) {
        console.log('Save Task Click fn | Error E01')
      }
    }

  });

  /**
   * @description  Delete Task
   */
  $('.deleteTask').click(confirmDeleteTask);

});

/** 00. HOUSE ENTRANCE
 ========================================================================*/

$(function () {
  'use strict';

  /**
   * @description Jquery function for getting iKatastr Link
   * @param event
   */
  function getiKatastr_Link (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    if (debug) {
      console.log('----------- fn getiKatastr_Link -----------')
    }

    // Getting parent 'id'
    var parent = $(this).parents(':eq(4)').attr('id');
    // Street and City from Form
    var wgslat = $.trim($('#' + parent + ' input[name="envo_housegpslat"]').val());
    var wgslon = $.trim($('#' + parent + ' input[name="envo_housegpslng"]').val());

    if (debug) {
      console.log('Parent ID: ' + parent);
      console.log('GPS Coordinates - Latitude: ' + wgslat + ' / Longitude: ' + wgslon);
    }

    // Set ikatastr text for input
    var ikatastr = 'https://www.ikatastr.cz/#kde=' + wgslat + ',' + wgslon + ',19&mapa=osm&vrstvy=parcelybudovy&info=' + wgslat + ',' + wgslon;

    // Add data to 'input'
    $('#' + parent + ' input[name=envo_houseikatastr]').val(ikatastr);
    // Change 'attr' in anchor
    $('#' + parent + ' .ikatastrlink a.ikatastr').attr('href', ikatastr);


  }

  /**
   * @description Jquery Function - DialogFX Open - Entrance - House
   * @example
   * Attribute 'data-dialog' in button => ID of dialog 'div' block
   * -----------------
   * <button class="" id="" type="button" data-dialog="DialogNew"></button>
   *
   *  <div id="DialogNew" class="dialog dialog-details">
   *    <div class="dialog__overlay"></div>
   *    <div class="dialog__content">
   *      <div class="container-fluid">
   *        <div class="row dialog__overview">
   *
   *        </div>
   *      </div>
   *      <button class="close action top-right" type="button" data-dialog-close>
   *        <i class="pg-close fs-14"></i>
   *      </button>
   *    </div>
   *  </div>
   *  @calling_action
   *  element -> element for getting street
   *  $('#elementID').click({ element: 'nameofelement' }, openDialogNewEnt);
   */
  function openDialogNewEnt (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    if (debug) {
      console.log('----------- fn openDialogNewEnt -----------')
    }

    // Get Data-Dialog and value
    var DataDialog = $(this).attr('data-dialog');
    var houseID = pageID;
    var entrance = $(event.data.element);
    var entranceval = entrance.val();

    if (debug) {
      console.log('Add New Entrance Click fn | Dialog ID: ' + DataDialog);
    }

    if (entranceval.length) {

      // Show progress circle
      $('#' + DataDialog + ' .dialog__overview').html('<div style="display:block;position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20">Načítání ... Prosím počkejte</div></div>');

      // Remove border for input - success
      entrance.parent().removeClass('has-error');

      setTimeout(function () {

        // Load content do DIV
        $('#' + DataDialog + ' .dialog__overview').load('/plugins/intranet2/admin/ajax/content_new_ent.php', function (responseTxt, statusTxt, xhr) {

          if (statusTxt == "success") {
            if (debug) {
              console.log('Loading content | External content loaded successfully!');
            }

            //  Add data
            $('#' + DataDialog + ' input[name="envo_entstreet"]').val(entranceval);

            // Init function
            $('.getgps').click(getGPS_Data_OSM);
            $('#getkatastrlink').click(getiKatastr_Link);

          }

          if (statusTxt == "error") {
            if (debug) {
              console.log('Loading content | Error: ' + xhr.status + ': ' + xhr.statusText);
            }
          }

        });

      }, 1000);


      // Open DialogFX
      var dialogEl = document.getElementById(DataDialog);
      var dlg = new DialogFx(dialogEl, {
        onOpenDialog: function (instance) {
          // Open DialogFX
          if (debug) {
            console.log('DialogFX: OPEN');
          }
        },
        onCloseDialog: function (instance) {
          // Close DialogFX
          if (debug) {
            console.log('DialogFX: CLOSE');
          }

          // Clearing
          entrance.val('');
          $('#' + DataDialog + ' .dialog__overview').html('');
          // Enable 'button'
          $('#saveEnt').attr('disabled', false);
        }
      });
      dlg.toggle(dlg);

    } else {
      // Notification
      setTimeout(function () {
        $.notify({
          // options
          icon: 'fa fa-exclamation',
          message: '<strong>Error:</strong> ' + 'Zadejte ulici a číslo vchodu.'
        }, {
          // settings
          type: 'danger',
          delay: 5000
        });
      }, 1000);

      // Add border for input - error
      entrance.parent().addClass('has-error');
    }

    return false;
  }

  /**
   * @description Jquery Function - DialogFX Open - Entrance - House
   * @example
   * Attribute 'data-dialog' in button => ID of dialog 'div' block
   * -----------------
   * <button class="" type="button" data-dialog="DialogEdit"></button>
   *
   *  <div id="DialogEdit" class="dialog item-details">
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
   *  @calling_action
   *  element -> element for getting street
   *  $('#elementID').click(openDialogEditEnt);
   */
  function openDialogEditEnt (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    if (debug) {
      console.log('----------- fn openDialogEditEnt -----------')
    }

    // Get Data-Dialog and value
    var DataDialog = $(this).attr('data-dialog');
    // Get ID of Task
    var entID = $(this).attr('data-id');

    // Ajax
    $.ajax({
      url: '/plugins/intranet2/admin/ajax/int2_table_dialog_ent.php',
      type: 'POST',
      datatype: 'html',
      data: {
        entID: entID
      },
      beforeSend: function () {

        // Show progress circle
        $('#entDialogEdit .dialog__overview').html('<div style="display:block;position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20">Načítání ... Prosím počkejte</div></div>');

      },
      success: function (data, statusTxt) {

        setTimeout(function () {

          if (statusTxt == "success") {
            if (debug) {
              console.log('Loading content | External content loaded successfully!');
            }

            // Add html data to 'div'
            $('#entDialogEdit .dialog__overview').hide().html(data).fadeIn(900);

            // Init function
            $('.getgps').click(getGPS_Data_OSM);
            $('#getkatastrlink').click(getiKatastr_Link);
          }

          if (statusTxt == "error") {
            if (debug) {
              console.log('Loading content | Error: ' + xhr.status + ': ' + xhr.statusText);
            }
          }

        }, 1000);

      },
      error: function (jqXHR, textStatus, errorThrown) {
        if (debug) {
          console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
        }
      },
      complete: function () {

      }
    });

    // Open DialogFX
    var dialogEl = document.getElementById(DataDialog);
    var dlg = new DialogFx(dialogEl, {
      onOpenDialog: function (instance) {
        // Open DialogFX
        if (debug) {
          console.log('DialogFX: OPEN');
        }
      },
      onCloseDialog: function (instance) {
        // Close DialogFX
        if (debug) {
          console.log('DialogFX: CLOSE');
        }

        //
        $('#' + DataDialog + ' .dialog__overview').html('');
      }
    });
    dlg.toggle(dlg);

    return false;
  }

  /**
   * @description Jquery Function - Delete Entrance from DB
   * @example
   * Attribute 'data-id' in button => ID is id of entrance in DB
   * -----------------
   * <button class="deleteEnt" type="button" data-id="id_of_ent_in_DB"></button>
   *
   */
  function deleteEnt (entID) {

    if (debug) {
      console.log('----------- fn deleteEnt -----------')
    }

    // Ajax
    $.ajax({
      url: '/plugins/intranet2/admin/ajax/int2_table_delete_ent.php',
      type: 'POST',
      datatype: 'json',
      data: {
        entID: entID
      },
      success: function (data) {

        if (data.status == 'delete_success') {
          // IF DATA SUCCESS

          // Removes elements from the Isotope instance and DOM
          $('#ent_' + data.data[0].id).remove();

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: '<strong>Success:</strong> ' + data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);

        } else {
          // IF DATA ERROR

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              icon: 'fa fa-exclamation',
              message: '<strong>Error:</strong> ' + data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 5000
            });
          }, 1000);

        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        if (debug) {
          console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
        }
      },
      complete: function () {

      }
    });

    return false;
  }

  function confirmDeleteEnt (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    if (debug) {
      console.log('----------- fn confirmDeleteEnt -----------')
    }

    // Get ID of Ent
    var entID = $(this).attr('data-id');

    // Show Message
    bootbox.setLocale(envoWeb.envo_lang);
    bootbox.confirm({
      title: "Potvrzení o odstranění!",
      message: $(this).attr('data-confirm-delent'),
      className: "bootbox-confirm-del",
      animate: true,
      buttons: {
        confirm: {
          className: 'btn-success'
        },
        cancel: {
          className: 'btn-danger'
        }
      },
      callback: function (result) {
        if (result == true) {
          if (debug) {
            console.log('Delete Entrance - ID: ' + entID);
          }
          deleteEnt(entID);
        }
      }
    });

    return false;
  }

  /**
   * @description   Add New Entrance
   */
  $('#addEnt').click({element: 'input[name="addEnt"]'}, openDialogNewEnt);

  /**
   * @description  Save Entrance
   */
  $('#saveEnt').on('click', function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    if (debug) {
      console.log('----------- fn #saveEnt click -----------')
    }

    // Storing $(this) in a variable
    var $this = $(this);
    // Disable 'button'
    $this.attr('disabled', true);
    // Getting parent 'id'
    var parent = $this.parents(':eq(3)').attr('id');
    // Get value
    var houseID = pageID;
    var street = $('#' + parent + ' input[name=envo_entstreet]').val();
    var elevator = $('#' + parent + ' input[name=envo_entelevator]:checked').val();
    var apartment = $('#' + parent + ' input[name=envo_entapartment]').val();
    var gpslat = $('#' + parent + ' input[name=envo_housegpslat]');
    var gpslatval = gpslat.val();
    var gpslng = $('#' + parent + ' input[name=envo_housegpslng]');
    var gpslngval = gpslng.val();
    var katastr = $('#' + parent + ' input[name=envo_houseikatastr]').val();

    if (debug) {
      console.log('Save Entrance Click fn | Data => parentID - ' + parent + ' | houseID - ' + houseID + ' | street -  ' + street + ' | elevator - ' + elevator + ' | apartment - ' + apartment + ' | gpslat - ' + gpslatval + ' | gpslng - ' + gpslngval + ' | katastr - ' + katastr);
    }

    if (gpslatval.length || gpslngval.length) {

      // Ajax
      $.ajax({
        url: '/plugins/intranet2/admin/ajax/int2_table_addnew_ent.php',
        type: 'POST',
        datatype: 'json',
        data: {
          houseID: houseID,
          street: street,
          elevator: elevator,
          apartment: apartment,
          gpslat: gpslatval,
          gpslng: gpslngval,
          katastr: katastr
        },
        success: function (data) {

          // Parse JSON data
          var str = JSON.stringify(data);
          var result = JSON.parse(str);

          if (data.status == 'success') {
            // IF DATA SUCCESS

            var divdata = '';
            var dataID = '';

            $.each(result, function (key, data) {

              if (key === 'data') {

                $.each(data, function (index, data) {

                  dataID = data["id"];

                  divdata += '<div class="box box-success"  id="ent_' + dataID + '">' +
                    '<div class="box-header with-border">' +
                    '<h3 class="box-title">Vchod <span class="bold">' + data["street"] + '</span></h3>' +
                    '<span class="float-right bold">Ent ID ' + dataID + '</span>' +
                    '</div>' +
                    '<div class="box-body no-padding">' +
                    '<div class="block">' +
                    '<div class="block-content">' +
                    '<div class="col-sm-6 p-3">' +
                    '<table class="table table-hover table-condensed">' +
                    '<caption style="caption-side: top;">' +
                    '<span class="m-r-20"><strong>GPS - Koordináty</strong></span>' +
                    '<a href="https://mapy.cz/zakladni?x=' + data["gpslng"] + '&y=' + data["gpslat"] + '&z=18&l=0&source=coor&id=' + data["gpslng"] + '%2C' + data["gpslat"] + '" class="mapycz" target="MapGPS">Zobrazit na Mapy.cz</a>' +
                    '<span class="m-l-10 m-r-10">|</span>' +
                    '<a href="https://www.openstreetmap.org/?mlat=' + data["gpslat"] + '&amp;mlon=12.7325868&amp;zoom=16#map=18/' + data["gpslat"] + '/12.7325868" class="openstreet" target="MapGPS">Zobrazit na OpenStreetMaps</a>' +
                    '</caption>' +
                    '<tbody>' +
                    '<tr>' +
                    '<th style="border-top: 1px solid rgba(230,230,230,0.7);border-bottom: 1px solid rgba(230,230,230,0.7);">' +
                    '<strong>GPS - Latitude</strong>' +
                    '</th>' +
                    '<td style="border-top: 1px solid rgba(230,230,230,0.7);border-bottom: 1px solid rgba(230,230,230,0.7);">' +
                    '<span>' + data["gpslat"] + '</span>' +
                    '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<th style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">' +
                    '<strong>GPS - Longitude</strong>' +
                    '</th>' +
                    '<td style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">' +
                    '<span>' + data["gpslng"] + '</span>' +
                    '</td>' +
                    '</tr>' +
                    '</tbody>' +
                    '</table>' +
                    '</div>' +
                    '<div class="col-sm-6 p-3">' +
                    '' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="box-footer">' +
                    '<button type="button" class="btn btn-danger  float-right deleteEnt" data-confirm-delent="Jste si jistý, že chcete odstranit vchod <strong>' + data["street"] + '</strong>" data-toggle="tooltipEnvo" data-placement="bottom" title="Odstranit" data-id="' + dataID + '"><i class="fa fa-trash-o"></i> Odstranění vchodu</button>' +
                    '<button type="button" id="editEnt" class="btn btn-default float-right m-r-20 editEnt" data-toggle="tooltipEnvo" data-placement="bottom" title="Editace" data-dialog="entDialogEdit" data-id="' + dataID + '"><i class="fa fa-edit"></i> Editace vchodu</button>' +
                    '</div>' +
                    '</div>';

                })

              }

            });

            // Remove DIV element - Alert
            var divalert = $('#entlist .alert.bg-info');

            if (divalert) {
              divalert.parent().remove();
            }

            // Put data to DIV
            $('#entlist').prepend(divdata);

            // Call function
            $('#ent_' + dataID + ' .editEnt').click(openDialogEditEnt);
            $('#ent_' + dataID + ' .deleteEnt').click(confirmDeleteEnt);

            // Notification
            // Apply the plugin to the container
            $('#ent_notify_add').pgNotification({
              style: 'bar',
              message: '<strong>Success:</strong> ' + data.status_msg,
              position: 'top',
              timeout: 2000,
              type: 'success',
              showClose: false
            }).show();

          } else {
            // IF DATA ERROR

            // Notification
            // Apply the plugin to the container
            $('#ent_notify_add').pgNotification({
              style: 'bar',
              message: '<strong>Error:</strong> ' + data.status_msg,
              position: 'top',
              timeout: 2000,
              type: 'danger',
              showClose: false
            }).show();

          }

        },
        error: function (jqXHR, textStatus, errorThrown) {
          if (debug) {
            console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
          }
        },
        complete: function () {

        }
      });

    } else {
      // Set border for input - error
      gpslat.parent().addClass('has-error');
      gpslng.parent().addClass('has-error');
      if (debug) {
        console.log('Save Ent Click fn | Error E01')
      }
    }

  });

  /**
   * @description  Edit Entrance
   */
  $('.editEnt').click(openDialogEditEnt);

  /**
   * @description  Update Entrance
   */
  $('#udpateEnt').on('click', function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    if (debug) {
      console.log('----------- fn #udpateEnt click -----------')
    }

    // Storing $(this) in a variable
    var $this = $(this);
    // Getting parent 'id'
    var parent = $this.parents(':eq(3)').attr('id');
    // Get value
    var entID = $('#' + parent + ' input[name=envo_editentid]').val();
    var street = $('#' + parent + ' input[name=envo_entstreet]').val();
    var elevator = $('#' + parent + ' input[name=envo_entelevator]:checked').val();
    var apartment = $('#' + parent + ' input[name=envo_entapartment]').val();
    var gpslat = $('#' + parent + ' input[name=envo_housegpslat]');
    var gpslatval = gpslat.val();
    var gpslng = $('#' + parent + ' input[name=envo_housegpslng]');
    var gpslngval = gpslng.val();
    var katastr = $('#' + parent + ' input[name=envo_houseikatastr]').val();

    if (debug) {
      console.log('Update Entrance Click fn | Data => parentID - ' + parent + ' | entID - ' + entID + ' | street -  ' + street + ' | elevator - ' + elevator + ' | apartment - ' + apartment + ' | gpslat - ' + gpslatval + ' | gpslng - ' + gpslngval + ' | katastr - ' + katastr);
    }

    if (gpslatval.length || gpslngval.length) {

      // Ajax
      $.ajax({
        url: '/plugins/intranet2/admin/ajax/int2_table_update_ent.php',
        type: 'POST',
        datatype: 'json',
        data: {
          entID: entID,
          street: street,
          elevator: elevator,
          apartment: apartment,
          gpslat: gpslatval,
          gpslng: gpslngval,
          katastr: katastr
        },
        success: function (data) {

          // Parse JSON data
          var str = JSON.stringify(data);
          var result = JSON.parse(str);

          if (data.status == 'update_success') {
            // IF DATA SUCCESS

            var divdata = '';
            var dataID = '';

            $.each(result, function (key, data) {

              if (key === 'data') {

                $.each(data, function (index, data) {

                  if (debug) {
                    console.log('Save Task Ent fn | Ajax -> Key data[id]: ' + data['id']);
                  }

                  dataID = data["id"];

                  divdata += '<div class="box-header with-border"><h3 class="box-title">Vchod <span class="bold">' + data["street"] + '</span></h3></div>' +
                    '<div class="box-body no-padding">' +
                    '<div class="block">' +
                    '<div class="block-content">' +
                    '<div class="col-sm-6 p-3">' +
                    '<table class="table table-hover table-condensed">' +
                    '<caption style="caption-side: top;">' +
                    '<span class="m-r-20"><strong>GPS - Koordináty</strong></span>' +
                    '' +
                    '</caption>' +
                    '<tbody>' +
                    '<tr>' +
                    '<th style="border-top: 1px solid rgba(230,230,230,0.7);border-bottom: 1px solid rgba(230,230,230,0.7);">' +
                    '<strong>GPS - Latitude</strong>' +
                    '</th>' +
                    '<td style="border-top: 1px solid rgba(230,230,230,0.7);border-bottom: 1px solid rgba(230,230,230,0.7);">' +
                    '<span>' + data["gpslat"] + '</span>' +
                    '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<th style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">' +
                    '<strong>GPS - Longitude</strong>' +
                    '</th>' +
                    '<td style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">' +
                    '<span>' + data["gpslng"] + '</span>' +
                    '</td>' +
                    '</tr>' +
                    '</tbody>' +
                    '</table>' +
                    '</div>' +
                    '<div class="col-sm-6 p-3">' +
                    '' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="box-footer">' +
                    '<button type="button" class="btn btn-danger  float-right deleteEnt" data-confirm-delent="Jste si jistý, že chcete odstranit vchod <strong>' + data["street"] + '</strong>" data-toggle="tooltipEnvo" data-placement="bottom" title="Odstranit" data-id="' + dataID + '"><i class="fa fa-trash-o"></i> Odstranění vchodu</button>' +
                    '<button type="button" id="editEnt" class="btn btn-default float-right m-r-20 editEnt" data-toggle="tooltipEnvo" data-placement="bottom" title="Editace" data-dialog="entDialogEdit" data-id="' + dataID + '"><i class="fa fa-edit"></i> Editace vchodu</button>' +
                    '</div>';

                })

              }

            });

            // Put data to DIV
            $('#ent_' + dataID).html(divdata);

            // Call function
            $('#ent_' + dataID + ' .editEnt').click(openDialogEditEnt);
            $('#ent_' + dataID + ' .deleteEnt').click(confirmDeleteEnt);

            // Notification
            // Apply the plugin to the container
            $('#ent_notify_edit').pgNotification({
              style: 'bar',
              message: '<strong>Success:</strong> ' + data.status_msg,
              position: 'top',
              timeout: 2000,
              type: 'success',
              showClose: false
            }).show();

          } else {
            // IF DATA ERROR

            // Notification
            // Apply the plugin to the container
            $('#ent_notify_edit').pgNotification({
              style: 'bar',
              message: '<strong>Error:</strong> ' + data.status_msg,
              position: 'top',
              timeout: 2000,
              type: 'danger',
              showClose: false
            }).show();

          }

        },
        error: function (jqXHR, textStatus, errorThrown) {
          if (debug) {
            console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
          }
        },
        complete: function () {

        }
      });

    } else {
      // Set border for input - error
      gpslat.parent().addClass('has-error');
      gpslng.parent().addClass('has-error');
      if (debug) {
        console.log('Update Ent Click fn | Error E01')
      }
    }

  });

  /**
   * @description  Delete Entrance
   */
  $('.deleteEnt').click(confirmDeleteEnt);

});

/* 00. SELECT FILE FOR UPLOAD TO SERVER
 ========================================================================*/

$(function () {
  'use strict';

  // Clear button
  $('.file-clear').click(function () {
    var parent = $(this).parents(":eq(1)").attr('id');

    $('#' + parent + ' .file-filename').val('');
    $('#' + parent + ' .file-clear').hide();
    $('#' + parent + ' .file-input input:file').val('');
    $('#' + parent + ' .file-input').css("border-radius", "3px 0 0 3px");
    $('#' + parent + ' .file-input-title').text('Vybrat Soubor');
  });

  // Change button
  $('.file-input input:file').change(function () {
    var parent = $(this).parents(":eq(2)").attr('id');
    var file = this.files[0];

    if (debug) {
      console.log($(this).val());
    }

    if ($(this).val() != '') {
      $('#' + parent + ' .file-input').css("border-radius", "0");
      $('#' + parent + ' .file-input-title').text('Změnit');
      $('#' + parent + ' .file-clear').show();
      $('#' + parent + ' .file-filename').val(file.name);
    } else {
      $('#' + parent + ' .file-filename').val('');
      $('#' + parent + ' .file-clear').hide();
      $('#' + parent + ' .file-input-title').text('Vybrat Soubor');
    }
  });

});

/** 00. UPLOAD FILE TO SERVER AND DELETE FILES FROM SERVER
 ========================================================================*/

$(function () {
  'use strict';

  /**
   * @description  Upload documents
   */
  $("#uploadBtnDocu").on('click', (function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    if (debug) {
      console.log('----------- fn #uploadBtnDocu click -----------')
    }

    // Get Data - value
    var desc = $('input[name="envo_descdocu"]');
    var descval = desc.val();
    // Get Data - properties of file from file field
    var file_data = $('#fileinput_doc').prop('files')[0];
    // Get Data - value of folder from file field
    var folder_path = $('input[name="folderpath"]').val();
    // Creating object of FormData class
    var form_data = new FormData();
    // Appending parameter named file with properties of file_field to form_data
    form_data.append('file', file_data);
    // Adding extra parameters to form_data
    form_data.append('folderpath', folder_path);
    form_data.append('houseID', pageID);
    form_data.append('description', descval);

    // Remove all error texts
    $('.has-error-text').remove();
    // Remove error borders for input
    desc.parent().removeClass('has-error');

    if (descval.length) {

      // Hide output
      $('#docuoutput').hide();
      // Show progress info
      $('#docuprogress').show();
      // Reset
      $("#docupercent").html('0%');

      // Ajax
      $.ajax({
        url: "/plugins/intranet2/admin/ajax/int2_table_upload_docu.php",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {

        },
        xhr: function () {
          // Create a new jqXHR
          var xhr = new window.XMLHttpRequest();
          //Upload progress bar
          xhr.upload.addEventListener("progress", function (evt) {
            // Make sure we can compute the length
            if (evt.lengthComputable) {

              var loaded = evt.loaded;
              var total = evt.total;

              // Append progress percentage
              var percent = (loaded / total) * 100;
              var percentComplete = percent.toFixed(2) + '%';

              // Bytes received
              var byteRec = formatFileSize(loaded);

              // Total bytes
              var totalByte = formatFileSize(total);

              // Progress output
              $('#docuprogressbar').css('width', percentComplete);
              $('#docupercent').html(percentComplete);
              $('#docubyterec').html(byteRec);
              $('#docubytetotal').html(totalByte);

            }
          }, false);

          return xhr;
        },
        success: function (data) {

          // Parse JSON data
          var str = JSON.stringify(data);
          var result = JSON.parse(str);

          if (data.status == 'upload_success') {
            // IF DATA SUCCESS

            $('#docuoutput').html('<div class="alert alert-success" role="alert">' +
              '<button class="close" data-dismiss="alert"></button>' +
              '<strong>Success: </strong>' + data.status_msg +
              '</div>');

            var tabledata = '';

            $.each(result, function (key, data) {

              if (key === 'data') {

                $.each(data, function (index, data) {

                  if (debug) {
                    console.log('Upload File fn | Data => id - ' + data['id'] + ' | fsize -  ' + data['fsize'] + ' | ftime - ' + data['ftime'] + ' | ficon - ' + data['ficon'] + ' | description - ' + data['description'] + ' | fullpath - ' + data['fullpath']);
                  }

                  tabledata += '<tr>' +
                    '<td class="text-center">' + data["id"] + '</td>' +
                    '<td class="text-center">' + data["ficon"] + '</td>' +
                    '<td>' + data["description"] + '</td>' +
                    '<td class="text-center"><a href="' + data["fullpath"] + '" target="_blank">Zobrazit</a> | <a href="' + data["fullpath"] + '" download>Stáhnout</a></td>' +
                    '</tr>';

                })

              }

            });

            // Put data to table
            $('#tabledocu tbody').html(tabledata);

            // Update Jquery Tabledit Plugin
            // $('#tabledocu').Tabledit('update', ({}));

            // Clearing
            desc.val('');
            $('#upload .file-filename').val('');
            $('#upload .file-clear').hide();
            $('#upload .file-input input:file').val('');
            $('#upload .file-input').css("border-radius", "3px 0 0 3px");
            $('#upload .file-input-title').text('Vybrat Soubor');

            // Notification
            setTimeout(function () {
              $.notify({
                // options
                message: '<strong>Success:</strong> ' + data.status_msg
              }, {
                // settings
                type: 'success',
                delay: 2000
              });
            }, 1000);

          } else if (data.status.indexOf('upload_error') != -1) {
            // IF DATA ERROR

            $('#docuoutput').html('<div class="alert alert-danger" role="alert">' +
              '<button class="close" data-dismiss="alert"></button>' +
              '<strong>Error: </strong>' + data.status + ' => ' + data.status_msg +
              '</div>');

            // Notification
            setTimeout(function () {
              $.notify({
                // options
                icon: 'fa fa-exclamation',
                message: '<strong>Error:</strong> ' + data.status_msg
              }, {
                // settings
                type: 'danger',
                delay: 2000
              });
            }, 1000);

          }

        },
        error: function (jqXHR, textStatus, errorThrown) {
          if (debug) {
            console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
          }
        },
        complete: function () {
          $('#docuprogress').hide();
          $('#docuprogressbar').css('width', '');
          $('#docuoutput').show();
        }
      });

    } else {
      // Notification
      setTimeout(function () {
        $.notify({
          // options
          icon: 'fa fa-exclamation',
          message: '<strong>Error:</strong> ' + 'Zadejte popis souboru.'
        }, {
          // settings
          type: 'danger',
          delay: 5000
        });
      }, 1000);

      // Add border for input - error
      desc.parent().addClass('has-error');
      // Show error texts
      $('<div/>', {
        class: 'has-error-text',
        css: {
          fontWeight: 'normal',
          color: '#C10000',
          position: 'absolute'
        },
        text: 'Vyplňte označenou položku'
      }).appendTo(desc.parent());
    }

  }));

});

/* 00. PHOTO GALLERY - ISOTOPE, UPLOAD
 ========================================================================*/
$(function () {
  'use strict';

  /**
   * @description  Debounce so filtering doesn't happen every millisecond
   */
  function debounce (fn, threshold) {
    var timeout;
    return function debounced () {
      if (timeout) {
        clearTimeout(timeout);
      }

      function delayed () {
        fn();
        timeout = null;
      }

      setTimeout(delayed, threshold || 100);
    };
  }

  /**
   * @description Jquery Function - DialogFX Open - Image - House
   * @example
   * Attribute 'data-dialog' in button => ID of dialog 'div' block
   * -----------------
   * <button class="" type="button" data-dialog="DialogEdit"></button>
   *
   *  <div id="DialogEdit" class="dialog item-details">
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
   */
  function openDialogEditImg (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    if (debug) {
      console.log('----------- fn openDialogEditImg -----------')
    }

    // Get Data-Dialog and value
    var DataDialog = $(this).attr('data-dialog');
    // Get ID of image
    var imageID = $(this).parents(":eq(4)").attr('id');
    var imageSuffixID = parseInt(/^.*\_(\d+)$/.exec(imageID)[1]);

    if (debug) {
      console.log('Image ID from DIV: ' + imageSuffixID)
    }

    // Ajax
    $.ajax({
      url: '/plugins/intranet2/admin/ajax/int2_table_dialog_img.php',
      type: 'POST',
      datatype: 'html',
      data: {
        imageID: imageSuffixID
      },
      beforeSend: function () {

        // Show progress circle
        $('#imgDialogEdit .dialog__overview').html('<div style="display:block;position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20">Načítání ... Prosím počkejte</div></div>');

      },
      success: function (data) {

        setTimeout(function () {
          // Add html data to 'div'
          $('#imgDialogEdit .dialog__overview').hide().html(data).fadeIn(900);

          // Getting path of image original
          var imgo = $('#imgfolderoriginal_path').val();
          $('#imgfolderoriginal').attr('href', imgo);


          // Init Select2 plugin
          $('#info1 .selectpicker').select2({
            minimumResultsForSearch: -1,
            dropdownParent: $('.page-content-wrapper'),
            dropdownCssClass: 'zindex1060'
          });

        }, 1000);

      },
      error: function (jqXHR, textStatus, errorThrown) {
        if (debug) {
          console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
        }
      },
      complete: function () {

      }
    });

    // Open DialogFX
    var dialogEl = document.getElementById(DataDialog);
    var dlg = new DialogFx(dialogEl, {
      onOpenDialog: function (instance) {
        // Open DialogFX
        if (debug) {
          console.log('DialogFX: OPEN');
        }
      },
      onCloseDialog: function (instance) {
        // Close DialogFX
        if (debug) {
          console.log('DialogFX: CLOSE');
        }
      }
    });
    dlg.toggle(dlg);

    return false;
  }

  /**
   * @description Jquery Function - Delete Image from DB - House
   * @example
   * Attribute 'data-id' in button => ID is id of image in DB
   * -----------------
   * <button class="delete-img" type="button" data-id="id_of_image_in_DB"></button>
   *
   */
  function deleteImg (imageID) {

    if (debug) {
      console.log('----------- fn deleteImg -----------')
    }

    // Ajax
    $.ajax({
      url: '/plugins/intranet2/admin/ajax/int2_table_delete_img.php',
      type: 'POST',
      datatype: 'json',
      data: {
        imageID: imageID
      },
      success: function (data) {

        if (data.status == 'delete_success') {
          // IF DATA SUCCESS

          // Removes elements from the Photo Isotope instance and DOM
          var $removeItem = $('#gallery_1_' + data.data[0].id);
          $gallery.isotope('remove', $removeItem).isotope('layout');
          // Removes elements from Photo List
          $('#gallery_0_' + data.data[0].id).remove();

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: '<strong>Success:</strong> ' + data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);

        } else {
          // IF DATA ERROR

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              icon: 'fa fa-exclamation',
              message: '<strong>Error:</strong> ' + data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 5000
            });
          }, 1000);

        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        if (debug) {
          console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
        }
      },
      complete: function () {

      }
    });

    return false;
  }

  function confirmdeleteImg (event) {
// Stop, the default action of the event will not be triggered
    event.preventDefault();

    if (debug) {
      console.log('----------- fn confirmdeleteImg -----------')
    }

    // Get ID of Task
    var imageID = $(this).attr('data-id');

    // Show Message
    bootbox.setLocale(envoWeb.envo_lang);
    bootbox.confirm({
      title: "Potvrzení o odstranění!",
      message: $(this).attr('data-confirm-delimg'),
      className: "bootbox-confirm-del",
      animate: true,
      buttons: {
        confirm: {
          className: 'btn-success'
        },
        cancel: {
          className: 'btn-danger'
        }
      },
      callback: function (result) {
        if (result == true) {
          if (debug) {
            console.log('Delete Image - ID: ' + imageID);
          }
          deleteImg(imageID);
        }
      }
    });

    return false;
  }

  /**
   * @description  Isotop and searching
   * @require: Isotope plugin - isotope.metafizzy.co
   */

    // Init Isotope plugin
  var isotopgallery = $('#gallery_envo_1');

  if (isotopgallery.length) {
    // Quick search regex
    var qsRegex;
    // Filter for the buttons
    var buttonFilter;

    // Initialize Isotope
    var $gallery = $('#gallery_envo_1');
    $gallery.isotope({
      itemSelector: 'div[class^="gallery-item-"]',
      masonry: {
        columnWidth: 280,
        // The horizontal space between item elements
        gutter: 10,
        isFitWidth: true
      },
      filter: function () {

        var $this = $(this);
        var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
        var buttonResult = buttonFilter ? $this.is(buttonFilter) : true;
        return searchResult && buttonResult;
      }
    });

    // Use value of search field to filter
    var $quicksearch = $('#quicksearch').keyup(debounce(function () {
      qsRegex = new RegExp($quicksearch.val(), 'gi');
      $gallery.isotope();
    }));

    /**
     * @description
     */
    $('#imagefilters').on('click', '.filter', function (event) {
      // Stop, the default action of the event will not be triggered
      event.preventDefault();

      var $this = $(this);
      // Set filter for group
      buttonFilter = $(this).attr('data-filter');
      $gallery.isotope();
    });

    /**
     * @description Change is-checked class on buttons
     */
    $('#imagefilters .filter').on('click', function () {
      $('#imagefilters').find('.active').removeClass('active');
      $(this).addClass('active');
    });

    /**
     * @description  Relayout Isotop
     */
    $('a[href="#cmsPage11"]').on('shown.bs.tab', function (e) {
      $gallery.isotope('layout');
    });
  }

  /**
   * @description  Show Photo list by date
   */
  $('#showPhotoList').on('click', (function (e) {

    $(this).removeClass('btn-info').addClass('btn-complete');
    $('#showFiltrPhoto').removeClass('btn-complete').addClass('btn-info');
    $('#list_photo').fadeIn(500);
    $('#isotope_photo').fadeOut(500);

  }));

  /**
   * @description  Show Photo Isotop list
   */
  $('#showFiltrPhoto').on('click', (function (e) {

    $(this).removeClass('btn-info').addClass('btn-complete');
    $('#showPhotoList').removeClass('btn-complete').addClass('btn-info');
    $('#isotope_photo').fadeIn(500);
    $('#list_photo').fadeOut(500);
    setTimeout(function () {
      $gallery.isotope('layout');
    }, 500);

  }));

  /**
   * @description  Upload image
   */
  $("#uploadBtnImg").on('click', (function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    if (debug) {
      console.log('----------- fn #uploadBtnImg click -----------')
    }

    // Get Data - value
    var imgsdesc = $('input[name="envo_sdescimg"]');
    var imgsdescval = imgsdesc.val();
    var imgcat = $('select[name="envo_imgcategory"]');
    var imgcatval = imgcat.val();
    // Get Data - properties of file from file field
    var file_data = $('#fileinput_img').prop('files')[0];
    // Get Data - value of folder from file field
    var folder_path = $('input[name="folderpath"]').val();
    // Creating object of FormData class
    var form_data = new FormData();
    // Appending parameter named file with properties of file_field to form_data
    form_data.append('file', file_data);
    // Adding extra parameters to form_data
    form_data.append('folderpath', folder_path);
    form_data.append('houseID', pageID);
    form_data.append('imgSdesc', imgsdescval);
    form_data.append('imgCat', imgcatval);

    // Remove all error texts
    $('.has-error-text').remove();
    // Remove error borders for input
    imgsdesc.parent().removeClass('has-error');
    imgcat.parent().removeClass('has-error');

    if (imgcatval.length) {
      if (imgsdescval.length) {

        // Hide output
        $('#imgoutput').hide();
        // Show progress info
        $('#imgprogress').show();
        // Reset
        $('#imgpercent').html('0%');

        // Ajax
        $.ajax({
          url: "/plugins/intranet2/admin/ajax/int2_table_upload_img.php",
          type: "POST",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function () {

          },
          xhr: function () {
            var xhr = new window.XMLHttpRequest();
            //Upload progress bar
            xhr.upload.addEventListener("progress", function (evt) {
              // Make sure we can compute the length
              if (evt.lengthComputable) {

                var loaded = evt.loaded;
                var total = evt.total;

                // Append progress percentage
                var percent = (loaded / total) * 100;
                var percentComplete = percent.toFixed(2) + '%';

                // Bytes received
                var byteRec = formatFileSize(loaded);

                // Total bytes
                var totalByte = formatFileSize(total);

                // Progress output
                $('#imgprogressbar').css('width', percentComplete);
                $('#imgpercent').html(percentComplete);
                $('#imgbyterec').html(byteRec);
                $('#imgbytetotal').html(totalByte);

              }
            }, false);

            return xhr;
          },
          success: function (data) {

            // Parse JSON data
            var str = JSON.stringify(data);
            var result = JSON.parse(str);

            if (data.status == 'upload_success') {
              // IF DATA SUCCESS

              $('#imgoutput').html('<div class="alert alert-success" role="alert">' +
                '<button class="close" data-dismiss="alert"></button>' +
                '<strong>Success: </strong>' + data.status_msg +
                '</div>');

              var divdata = '';

              $.each(result, function (key, data) {

                if (key === 'data') {

                  $.each(data, function (index, data) {

                    // Create new Isotope item elements
                    var $isotopeContent = $('' +
                      '<div id="gallery_1_' + data["id"] + '" class="gallery-item-' + data["id"] + ' ' + data["category"] + '" data-width="1" data-height="1">' +
                      '<div class="img_container"><img src="' + data["filethumbpath"] + '" alt="" class="image-responsive-height"></div>' +
                      '<div class="overlays full-width">' +
                      '<div class="row full-height">' +
                      '<div class="col-5 full-height">' +
                      '<div class="text font-montserrat">' + data["filenamethumb"].substring(data["filenamethumb"].lastIndexOf('.') + 1).toUpperCase() + '</div>' +
                      '</div>' +
                      '<div class="col-7 full-height">' +
                      '<div class="text">' +
                      '<a data-fancybox="gallery" href="' + data["filethumbpath"] + '">' +
                      '<button class="btn btn-info btn-xs btn-mini mr-1 fs-14" type="button"><i class="pg-image"></i></button>' +
                      '</a>' +
                      '<button class="btn btn-info btn-xs btn-mini fs-14 dialog-open-img mr-1" type="button" data-dialog="imgDialogEdit"><i class="fa fa-edit"></i></button>' +
                      '<button class="btn btn-info btn-xs btn-mini fs-14 delete-img" type="button" data-id="' + data["id"] + '"  data-confirm-delimg="Jste si jistý, že chcete odstranit obrázek?"><i class="fa fa-trash"></i></button>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '<div class="full-width padding-10">' +
                      '<p class="bold">Krátký Popis</p><p class="shortdesc">' + data["shortdescription"] + '</p>' +
                      '</div>' +
                      '</div>');

                    // Isotope Plugin
                    // Adds and lays out newly prepended item elements at the beginning of layout
                    // Prepend items to gallery
                    $gallery.prepend($isotopeContent).isotope('prepended', $isotopeContent);

                    // Call dialogFX function for button
                    var elClass = $('#gallery_1_' + data["id"] + '.gallery-item-' + data["id"]);
                    elClass.find('.dialog-open-img').click(openDialogEditImg);
                    elClass.find('.delete-img').click(confirmdeleteImg);

                    // Remove DIV element - Alert
                    var divalert = $('#isotope_photo .alert.bg-info');

                    if (divalert) {
                      divalert.parent().remove();
                    }


                  });

                }

              });

              // Notification
              setTimeout(function () {
                $.notify({
                  // options
                  message: '<strong>Error:</strong> ' + data.status_msg
                }, {
                  // settings
                  type: 'success',
                  delay: 2000
                });
              }, 1000);

            } else if (data.status.indexOf('upload_error') != -1) {
              // IF DATA ERROR

              $('#imgoutput').html('<div class="alert alert-danger" role="alert">' +
                '<button class="close" data-dismiss="alert"></button>' +
                '<strong>Error: </strong>' + data.status + ' => ' + data.status_msg +
                '</div>');

              // Notification
              setTimeout(function () {
                $.notify({
                  // options
                  icon: 'fa fa-exclamation',
                  message: '<strong>Error:</strong> ' + data.status_msg
                }, {
                  // settings
                  type: 'danger',
                  delay: 2000
                });
              }, 1000);

            }

          },
          error: function (jqXHR, textStatus, errorThrown) {
            if (debug) {
              console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
            }
          },
          complete: function () {
            $('#imgprogress').hide();
            $('#imgprogressbar').css('width', '');
            $('#imgoutput').show();
          }
        });

      } else {
        // Notification
        setTimeout(function () {
          $.notify({
            // options
            icon: 'fa fa-exclamation',
            message: '<strong>Error:</strong> ' + 'Zadejte popis souboru.'
          }, {
            // settings
            type: 'danger',
            delay: 5000
          });
        }, 1000);

        // Add border for input - error
        imgsdesc.parent().addClass('has-error');
        // Show error texts
        $('<div/>', {
          class: 'has-error-text',
          css: {
            fontWeight: 'normal',
            color: '#C10000',
            position: 'absolute'
          },
          text: 'Vyplňte označenou položku'
        }).appendTo(imgsdesc.parent());
      }
    } else {
      // Notification
      setTimeout(function () {
        $.notify({
          // options
          icon: 'fa fa-exclamation',
          message: '<strong>Error:</strong> ' + 'Vyberte kategorii.'
        }, {
          // settings
          type: 'danger',
          delay: 5000
        });
      }, 1000);

      // Add border for input - error
      imgcat.parent().addClass('has-error');
      // Show error texts
      $('<div/>', {
        class: 'has-error-text',
        css: {
          fontWeight: 'normal',
          color: '#C10000',
          position: 'absolute'
        },
        text: 'Vyplňte označenou položku'
      }).appendTo(imgcat.parent());
    }


  }));

  /**
   * @description  Delete image
   */
  $('.delete-img').click(confirmdeleteImg);

  /**
   * @description  Edit Image
   */
  $('.dialog-open-img').click(openDialogEditImg);

  /**
   * @description   Update Image
   */
  $('#udpateImg').on('click', function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    if (debug) {
      console.log('----------- fn #udpateImg click -----------')
    }

    // Get value
    var imageID = $('input[name=envo_editimgid]').val();
    var descImage = $('#desc').val();
    var shortdescImage = $('#shortdesc').val();
    var catImage = $('select[name="envo_imgcategory_dialog"]').val();

    // Ajax
    $.ajax({
      url: '/plugins/intranet2/admin/ajax/int2_table_update_img.php',
      type: 'POST',
      datatype: 'json',
      data: {
        imageID: imageID,
        descImage: descImage,
        shortdescImage: shortdescImage,
        catImage: catImage
      },
      success: function (data) {

        if (data.status == 'update_success') {
          // IF DATA SUCCESS

          // Edit Time
          $('#timeedit').html(data.data[0].timeedit);

          // Add data.shortdescription to Isotop item
          var elClass0 = $('#gallery_1_' + data.data[0].id + '.gallery-item-' + data.data[0].id);
          elClass0.find('.shortdesc').text(data.data[0].shortdescription);

          // Add data.category to Isotop item
          var elClass1 = $('#gallery_1_' + data.data[0].id).attr('class').split(" ")[0];
          $('#gallery_1_' + data.data[0].id + '.' + elClass1).removeClass().addClass(elClass1 + ' ' + data.data[0].category);

          // Notification
          // Apply the plugin to the container
          $('#img_notify_edit').pgNotification({
            style: 'bar',
            message: '<strong>Success:</strong> ' + data.status_msg,
            position: 'top',
            timeout: 2000,
            type: 'success',
            showClose: false
          }).show();

        } else {
          // IF DATA ERROR

          // Notification
          // Apply the plugin to the container
          $('#img_notify_edit').pgNotification({
            style: 'bar',
            message: '<strong>Error:</strong> ' + data.status_msg,
            position: 'top',
            timeout: 2000,
            type: 'danger',
            showClose: false
          }).show();

        }

      },
      error: function (jqXHR, textStatus, errorThrown) {
        if (debug) {
          console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
        }
      },
      complete: function () {

      }
    });

  });


});

/** 00. SEARCH IC in ARES
 ========================================================================*/

$(function () {
  'use strict';

  /**
   * @description Init Pages Cards
   */
  $('#card-help').card();
  $('#card-basic').card();
  $('#card-result').card();

  /**
   * @description   Search object by IC in ARES
   */
  $('#searchAresIc').submit(function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    if (debug) {
      console.log('----------- fn #searchAresIc submit -----------');
    }

    // Get value
    var form = $(this);
    var ares_ico = $('input[name="ares_ico"]');
    var ares_icoval = $.trim(ares_ico.val());
    // Ajax time
    var ajaxTime = new Date().getTime();
    // Remove all error texts
    $('.has-error-text').remove();
    // Remove error borders for input
    ares_ico.parent().removeClass('has-error');

    if (ares_icoval.length && ($.isNumeric(ares_icoval))) {

      // Ajax
      $.ajax({
        url: '/plugins/intranet2/admin/ajax/searchares_ic.php',
        type: form.attr('method'),
        dataType: 'json',
        data: {
          ares_ico: ares_icoval
        },
        cache: false,
        // Timeout 20s
        timeout: 20000,
        beforeSend: function () {

          // Show progress circle
          $('#loadingdata').html('<div style="display:block;position:fixed;top:50%;left:50%;transform:translate(-35%, -50%);-ms-transform:translate(-35%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20 text-center"><span style="float: left;width: 100%;margin-bottom: 10px;font-weight: bold;font-size: 2em;">ARES</span><span style="float: left;width: 100%;margin-bottom: 10px;">Načítání ... Prosím počkejte ...</span><span>Načítání dat může trvat i několik sekund / minut</span></div></div>').show();


        },
        success: function (data) {

          // Parse JSON data
          var str = JSON.stringify(data);
          var result = JSON.parse(str);

          // Ajax time
          var totalTime = msToTime(Math.floor(new Date().getTime() - ajaxTime));
          if (debug) {
            console.log('ajaxTime | Success Time: ' + totalTime);
          }

          // Loading data progress
          $('#loadingdata').hide().html('');

          if (data.status == 'upload_success') {
            // IF DATA SUCCESS

            // Data variable for output
            var divdata = '';
            divdata += '<p><strong>' + data.status_msg + '</strong></p>' +
              '<p>Doba zpracování požadavku: <span id="ajaxTime">' + totalTime + '</span><span class="float-right">Počet nalezených záznamů: <strong>' + data.count_data + '</strong></span></p>' +
              '<p>Vyhledávací řetězec: <span>ico=' + result.search_string.ares_ico + '</span></p><hr>';

            divdata += '<table class="table">';
            divdata += '<thead><tr><th>IČ</th><th>Název subjektu</th><th>Sídlo</th></tr></thead>';
            divdata += '<tbody>';

            $.each(data, function (key, value) {

              if (key === 'data') {

                $.each(value, function (key1, value1) {
                  divdata += '<tr><td>' + value1.ico + '</td><td>' + value1.ojm + '</td><td>' + value1.jmn + '</td></tr>';
                });

              }

            });

            divdata += '</tbody></table>';

          } else {
            // IF DATA ERROR

            // Data variable for output
            var divdata = '';
            divdata += '<p style="color: #C10000;"><i class="fa fa-exclamation"></i> <strong>' + data.status_msg + '</strong></p>' +
              '<p>Doba zpracování požadavku: <span id="ajaxTime">' + totalTime + '</span><span class="float-right">Počet nalezených záznamů: <strong>' + data.count_data + '</strong></span></p>' +
              '<p>Vyhledávací řetězec: <span>ares_obec=' + result.search_string.ares_obec + ' ares_ulice=' + result.search_string.ares_ulice + ' ares_corientacni=' + result.search_string.ares_corientacni + ' ares_cpopisne=' + result.search_string.ares_cpopisne + '</span></p><hr>' +
              '<p>' + data.status_info + ' => ';

            $.each(data.data, function (key, value) {

              $.each(value, function (key1, value1) {
                divdata += '<span>' + value1 + '</span> ';
              });

            });

            divdata += '</p>';

            // Notification
            setTimeout(function () {
              $.notify({
                // options
                icon: 'fa fa-exclamation',
                message: '<strong>Error:</strong> ' + data.status_msg
              }, {
                // settings
                type: 'danger',
                delay: 2000
              });
            }, 1000);

          }

          // Output Data
          $('#outputaresdata').html('').prepend(divdata);
          // Ajax time
          $('#ajaxTime').html(totalTime);

        },
        error: function (jqXHR, textStatus, errorThrown) {

          // Loading data progress
          $('#loadingdata').html('<div style="display:block;position:fixed;top:50%;left:50%;transform:translate(-35%, -50%);-ms-transform:translate(-35%, -50%);"><div class="m-t-20 text-center"><span style="float: left;width: 100%;margin-bottom: 10px;font-weight: bold;font-size: 2em;">ARES</span><span style="float: left;width: 100%;margin-bottom: 10px;color: #C10000;font-weight: 700;">Vypršel časový limit pro komunikaci se serverem Ares</span><span style="float: left;width: 100%;color: #C10000;font-weight: 700;">Server Ares neodpovídá -> obnovte stránku a zkuste hledání později!</span><button type="button" class="btn btn-success mt-3" onClick="window.location.reload()">Obnovit stránku</button></div></div>');

          if (debug) {
            console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
          }

          if (textStatus === 'timeout') {
            if (debug) console.log('Timeout: ' + textStatus + ': ' + errorThrown);
          } else {
            if (debug) console.log(textStatus + ': ' + errorThrown);
          }

        },
        complete: function () {

        }
      });

    } else {

      // Notification
      setTimeout(function () {
        $.notify({
          // options
          icon: 'fa fa-exclamation',
          message: '<strong>Error:</strong> ' + 'Zadejte IČ ve správném formátu. Zadejte jen čísla 0-9'
        }, {
          // settings
          type: 'danger',
          delay: 5000
        });
      }, 1000);

      // Add border for input - error
      ares_ico.parent().addClass('has-error');
      // Show error texts
      $('<div/>', {
        class: 'has-error-text',
        css: {
          fontWeight: 'normal',
          color: '#C10000',
          position: ''
        },
        text: 'Vyplňte označenou položku'
      }).appendTo(ares_ico.parent());

      if (debug) {
        console.log('#searchAresIc submit fn | Error E01')
      }
    }

  });

  /**
   * @description   Search object by address in ARES
   */
  $('#searchAresOther').submit(function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    if (debug) {
      console.log('----------- fn #searchAresOther submit -----------');
    }

    // Get value
    var form = $(this);
    var ares_maxcount = $('#ares_maxcount');
    var ares_maxcountval = ares_maxcount.val();
    var ares_sort = $('#ares_sort');
    var ares_sortval = ares_sort.val();
    var ares_word = $('#ares_word');
    var ares_wordval = ares_word.val();
    var ares_obec = $('select[name="ares_obec"]');
    var ares_obecval = $.trim(ares_obec.val());
    var ares_ulice = $('select[name="ares_ulice"]');
    var ares_uliceval = $.trim(ares_ulice.val());
    var ares_corientacni = $('input[name="ares_corientacni"]');
    var ares_corientacnival = $.trim(ares_corientacni.val());
    var ares_cpopisne = $('input[name="ares_cpopisne"]');
    var ares_cpopisneval = $.trim(ares_cpopisne.val());
    var ares_record = $('input[name=recordDb]:checked');
    var ares_recordval = ares_record.val();
    // Ajax time
    var ajaxTime = new Date().getTime();
    // Remove all error texts
    $('.has-error-text').remove();
    // Remove error borders for input
    ares_obec.parent().removeClass('has-error');
    ares_ulice.parent().removeClass('has-error');

    if (ares_obecval.length && ($.isNumeric(ares_obecval))) {

      // Ajax
      $.ajax({
        url: '/plugins/intranet2/admin/ajax/searchares_other.php',
        type: form.attr('method'),
        dataType: 'json',
        data: {
          ares_maxcount: ares_maxcountval,
          ares_sort: ares_sortval,
          ares_word: ares_wordval,
          ares_obec: ares_obecval,
          ares_ulice: ares_uliceval,
          ares_corientacni: ares_corientacnival,
          ares_cpopisne: ares_cpopisneval,
          ares_record: ares_recordval
        },
        cache: false,
        // Timeout 20s
        timeout: 20000,
        beforeSend: function () {

          // Show progress circle
          $('#loadingdata').html('<div style="display:block;position:fixed;top:50%;left:50%;transform:translate(-35%, -50%);-ms-transform:translate(-35%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20 text-center"><span style="float: left;width: 100%;margin-bottom: 10px;font-weight: bold;font-size: 2em;">ARES</span><span style="float: left;width: 100%;margin-bottom: 10px;">Načítání ... Prosím počkejte ...</span><span>Načítání dat může trvat i několik sekund / minut</span></div></div>').show();


        },
        success: function (data) {

          // Parse JSON data
          var str = JSON.stringify(data);
          var result = JSON.parse(str);

          // Ajax time
          var totalTime = msToTime(Math.floor(new Date().getTime() - ajaxTime));
          if (debug) {
            console.log('ajaxTime | Success Time: ' + totalTime);
          }

          // Loading data progress
          $('#loadingdata').hide().html('');

          if (data.status == 'upload_success') {
            // IF DATA SUCCESS

            // Data variable for output
            var divdata = '';
            divdata += '<p><strong>' + data.status_msg + '</strong></p>' +
              '<p>Doba zpracování požadavku: <span id="ajaxTime">' + totalTime + '</span><span class="float-right">Počet nalezených záznamů: <strong>' + data.count_data + '</strong></span></p>' +
              '<p>Vyhledávací řetězec: <span>ares_obec=' + result.search_string.ares_obec + ' ares_ulice=' + result.search_string.ares_ulice + ' ares_corientacni=' + result.search_string.ares_corientacni + ' ares_cpopisne=' + result.search_string.ares_cpopisne + '</span></p><hr>';

            divdata += '<table class="table">';
            divdata += '<thead><tr><th>IČ</th><th>Název subjektu</th><th>Sídlo</th></tr></thead>';
            divdata += '<tbody>';

            $.each(data, function (key, value) {

              if (key === 'data') {

                $.each(value, function (key1, value1) {
                  divdata += '<tr><td>' + value1.ico + '</td><td>' + value1.ojm + '</td><td>' + value1.jmn + '</td></tr>';

                });

              }

            });

            divdata += '</tbody></table>';

          } else {
            // IF DATA ERROR

            // Data variable for output
            var divdata = '';
            divdata += '<p style="color: #C10000;"><i class="fa fa-exclamation"></i> <strong>' + data.status_msg + '</strong></p>' +
              '<p>Doba zpracování požadavku: <span id="ajaxTime">' + totalTime + '</span><span class="float-right">Počet nalezených záznamů: <strong>' + data.count_data + '</strong></span></p>' +
              '<p>Vyhledávací řetězec: <span>ares_obec=' + result.search_string.ares_obec + ' ares_ulice=' + result.search_string.ares_ulice + ' ares_corientacni=' + result.search_string.ares_corientacni + ' ares_cpopisne=' + result.search_string.ares_cpopisne + '</span></p><hr>' +
              '<p>' + data.status_info + ' => ';

            $.each(data.data, function (key, value) {

              $.each(value, function (key1, value1) {
                divdata += '<span>' + value1 + '</span> ';
              });

            });

            divdata += '</p>';

            // Notification
            setTimeout(function () {
              $.notify({
                // options
                icon: 'fa fa-exclamation',
                message: '<strong>Error:</strong> ' + data.status_msg
              }, {
                // settings
                type: 'danger',
                delay: 2000
              });
            }, 1000);

          }

          // Output Data
          $('#outputaresdata').html('').prepend(divdata);
          // Ajax time
          $('#ajaxTime').html(totalTime);

        },
        error: function (jqXHR, textStatus, errorThrown) {

          // Loading data progress
          $('#loadingdata').html('<div style="display:block;position:fixed;top:50%;left:50%;transform:translate(-35%, -50%);-ms-transform:translate(-35%, -50%);"><div class="m-t-20 text-center"><span style="float: left;width: 100%;margin-bottom: 10px;font-weight: bold;font-size: 2em;">ARES</span><span style="float: left;width: 100%;margin-bottom: 10px;color: #C10000;font-weight: 700;">Vypršel časový limit pro komunikaci se serverem Ares</span><span style="float: left;width: 100%;color: #C10000;font-weight: 700;">Server Ares neodpovídá -> obnovte stránku a zkuste hledání později!</span><button type="button" class="btn btn-success mt-3" onClick="window.location.reload()">Obnovit stránku</button></div></div>');

          if (debug) {
            console.log('Could not get posts, server response: ' + textStatus + ': ' + errorThrown);
          }

          if (textStatus === 'timeout') {
            if (debug) console.log('Timeout: ' + textStatus + ': ' + errorThrown);
          } else {
            if (debug) console.log(textStatus + ': ' + errorThrown);
          }

        },
        complete: function () {

        }
      });

    } else {

      // Notification
      setTimeout(function () {
        $.notify({
          // options
          icon: 'fa fa-exclamation',
          message: '<strong>Error:</strong> ' + 'Zadejte obec ve správném formátu. Zadejte jen čísla 0-9'
        }, {
          // settings
          type: 'danger',
          delay: 5000
        });
      }, 1000);

      // Add border for input - error
      ares_obec.parent().addClass('has-error');
      // Show error texts
      $('<div/>', {
        class: 'has-error-text',
        css: {
          fontWeight: 'normal',
          color: '#C10000',
          position: ''
        },
        text: 'Vyplňte označenou položku'
      }).appendTo(ares_obec.parent());

      if (debug) {
        console.log('#searchAresOther submit fn | Error E01')
      }

    }

  });

});

/** 00. xxxx
 ========================================================================*/

$(function () {
  'use strict';

});