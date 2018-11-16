<?php
/*
 * PLUGIN Intranet - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'plugins/intranet/admin/js/script.intranet.js
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'plugins/intranet/admin/js/script.intranet.js'
 *
 */

if ($page == 'intranet') {

  echo PHP_EOL . '<!-- Start JS Intranet -->';

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Load 'ace.js'  - only for selected pages
  if ($setting["adv_editor"] && !empty($page2)) {
    // Plugin ACE Editor
    echo $Html -> addScript('assets/plugins/ace/ace.js');
  }
  // TinyMCE Plugin
  if (!empty($page2)) {
    echo $Html -> addScript('/assets/plugins/tinymce/tinymce.min.js?=v4.3.12');
  }
  // Plugin DataTable
  echo $Html -> addScript('https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js');
  // Plugin Tabledit
  echo $Html -> addScript(BASE_URL_ORIG . 'plugins/intranet/admin/js/jquery.tabledit.min.js');
  // Plugin Fancybox
  echo $Html -> addScript('/assets/plugins/fancybox/3.2.5/js/jquery.fancybox.min.js');
  // Plugin DialogFX
  echo $Html -> addScript('assets/plugins/classie/classie.js');
  echo $Html -> addScript('assets/plugins/codrops-dialogFx/dialogFx.min.js');
  // Plugin Isotope
  echo $Html -> addScript('assets/plugins/jquery-isotope/isotope.pkgd.min.js');
  // Plugin Javascript
  echo $Html -> addScript(BASE_URL_ORIG . 'plugins/intranet/admin/js/script.intranet.js');

  echo PHP_EOL . '<!-- End JS Intranet -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>

<script>
  $(document).ready(function () {

    function DeleteRow() {
      var par = $(this).closest('tr');
      par.remove();
    }

    $('.deleteRow').bind("click", DeleteRow);

    //
    $('#addRowRegion').click(function (e) {
      e.preventDefault();

      var tabledata = '';
      var max = 0;
      var nextmax = '1'; // value '1', if not exists some row

      $('#setting_table_region .rowid').each(function () {
        $this = parseInt($(this).val());
        if ($this > max) max = $this;
        nextmax = max + 1;
      });

      tabledata += '<tr>' +
        '<td class="text-center">' + nextmax + '<input type="hidden" name="envo_region_0[]" class="rowid" value="' + nextmax + '"/></td>' +
        '<td><input type="text" name="envo_region_1[]" class="form-control"></td>' +
        '<td class="text-center"><button type="button" class="btn btn-danger btn-xs deleteRow"><i class="fa fa-trash-o"></i></button></td>' +
        '</tr>';

      //
      if ($('#setting_table_region .nodata').length) {
        $('#setting_table_region .nodata').remove();
      }

      // Put data to table
      $('#setting_table_region tbody').prepend(tabledata);

      // Update Jquery Function
      $('#setting_table_region .deleteRow').bind("click", DeleteRow);

    });

    //
    $('#addRowDistrict').click(function (e) {
      e.preventDefault();

      // Ajax
      $.ajax({
        type: "POST",
        url: "/plugins/intranet/admin/ajax/int_table_addnew_district.php",
        datatype: 'html',
        data: {},
        success: function (data) {

          //
          if ($('#setting_table_district .nodata').length) {
            $('#setting_table_district .nodata').remove();
          }

          // Add html data to 'table'
          $('#setting_table_district tbody').html(data);

          // Init Select2 plugin
          $('#setting_table_district .selectpicker').select2({
            minimumResultsForSearch: -1,
            dropdownParent: $('.page-content-wrapper'),
            dropdownCssClass: 'zindex1060'
          });

          // Update Jquery Function
          $('#setting_table_district .deleteRow').bind("click", DeleteRow);

        },
        error: function () {

        }
      });

    });

    //
    $('#addRowCity').click(function (e) {
      e.preventDefault();

      // Ajax
      $.ajax({
        type: "POST",
        url: "/plugins/intranet/admin/ajax/int_table_addnew_city.php",
        datatype: 'html',
        data: {},
        success: function (data) {

          //
          if ($('#setting_table_city .nodata').length) {
            $('#setting_table_city .nodata').remove();
          }

          // Add html data to 'table'
          $('#setting_table_city tbody').html(data);

          // Init Select2 plugin
          $('#setting_table_city .selectpicker').select2({
            minimumResultsForSearch: -1,
            dropdownParent: $('.page-content-wrapper'),
            dropdownCssClass: 'zindex1060'
          });

          // Update Jquery Function
          $('#setting_table_city .deleteRow').bind("click", DeleteRow);

        },
        error: function () {

        }
      });

    });

    //
    $('#addRowCityArea').click(function (e) {
      e.preventDefault();

      // Ajax
      $.ajax({
        type: "POST",
        url: "/plugins/intranet/admin/ajax/int_table_addnew_cityarea.php",
        datatype: 'html',
        data: {},
        success: function (data) {

          //
          if ($('#setting_table_cityarea .nodata').length) {
            $('#setting_table_cityarea .nodata').remove();
          }

          // Add html data to 'table'
          $('#setting_table_cityarea tbody').html(data);

          // Init Select2 plugin
          $('#setting_table_cityarea .selectpicker').select2({
            minimumResultsForSearch: -1,
            dropdownParent: $('.page-content-wrapper'),
            dropdownCssClass: 'zindex1060'
          });

          // Update Jquery Function
          $('#setting_table_cityarea .deleteRow').bind("click", DeleteRow);

        },
        error: function () {

        }
      });

    });

    //
    $('input[name="envo_houseic"]').on('keyup keypress input paste change', function () {
      var getic = $.trim($(this).val()).replace(/\s/g, '');
      $('#ares_res a').attr('href', 'https://wwwinfo.mfcr.cz/cgi-bin/ares/darv_res.cgi?ico=' + getic + '&jazyk=cz&xml=1');
      $('#justice_vor a').attr('href', 'https://or.justice.cz/ias/ui/rejstrik-$firma?ico=' + getic + '&jenPlatne=VSECHNY');
    });

    $('#ikatastr input').keyup(function () {
      var getkatastr = $.trim($(this).val()).replace(/\s/g, '');
      $('#ikatastrlink a').attr('href', getkatastr);
    });

    $('input[name="envo_houseares"]').change(function () {
      if (this.value == '1') {
        $('#ares_res').show();
      } else if (this.value == '0') {
        $('#ares_res').hide();
      }
    });

    $('input[name="envo_housejustice"]').change(function () {
      if (this.value == '1') {
        $('#justice_vor').show();
      } else if (this.value == '0') {
        $('#justice_vor').hide();
      }
    });

    $('#getgpscoordinates').click(function (e) {
      e.preventDefault();

      // Street and City from Form
      var street0 = $.trim($('input[name="envo_housestreet"]').val()).replace(/\s/g, '+');
      var city0 = $.trim($('select[name="envo_housecity"] option:selected').text()).replace(/\s/g, '+');
      // Basic address - after load ARES data
      var street1 = $.trim($('input[name="data_gps_street"]').val()).replace(/\s/g, '+');
      var city1 = $.trim($('input[name="data_gps_city"]').val()).replace(/\s/g, '+');

      if (street0.length && city1.length) {
        var datagps = street0 + ',' + city1;
      } else {
        var datagps = street0 + ',' + city0;
      }

      // Ajax
      $.ajax({
        url: 'https://nominatim.openstreetmap.org/search?q=' + datagps + '&format=json&addressdetails=1',
        dataType: 'json',
        timeout: 30000,
        success: function (data) {

          var str = JSON.stringify(data);
          var result = JSON.parse(str);

          $.each(result, function (key, data) {
            console.log('GPS data - Latitude: ' + data.lat + ' / Longitude: ' + data.lon);

            // Add data to 'input'
            $('input[name=envo_housegpslat]').val(data.lat).css('background-color', '#FFE680');
            $('input[name=envo_housegpslng]').val(data.lon).css('background-color', '#FFE680');

            // Remove backgroung color from 'input'
            setTimeout(function () {
              $('input[name=envo_housegpslat]').css('background-color', '#FFF');
              $('input[name=envo_housegpslng]').css('background-color', '#FFF');
            }, 4000);

            // Change 'attr' in anchor
            $('#gps_link a.mapycz').attr('href', 'http://www.mapy.cz/#q=' + data.lat + '%2C' + data.lon);
            $('#gps_link a.openstreet').attr('href', 'https://www.openstreetmap.org/?mlat=' + data.lat + '&mlon=' + data.lon + '&zoom=16#map=18/' + data.lat + '/' + data.lon);

            // Show 'div'
            $('#gps_link').show();

          });

        },
        error: function () {

        }
      });

    });

    $('#loadAres').click(function (e) {
      e.preventDefault();

      var ic = $.trim($('input[name="envo_dataares"]').val()).replace(/\s/g, '');

      // Ajax
      $.ajax({
        url: "/plugins/intranet/admin/ajax/ares.php",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        data: "ic=" + ic,
        cache: false,
        success: function (data) {

          if (data.status == 'upload_success') {

            // Add data to 'input'
            $('input[name=envo_househeadquarters]').val(
              data.sidlo + ', ' + data.mesto + ' - ' + data.katastralniuzemi + ', PSČ ' + data.psc
            ).css('background-color', '#FFE680');
            $('input[name=envo_houseic]').val(data.ic).css('background-color', '#FFE680');
            $('input[name=envo_housepsc]').val(data.psc).css('background-color', '#FFE680');
            $('input[name=data_gps_street]').val(data.sidlo);
            $('input[name=data_gps_city]').val(data.mesto);

            // Remove backgroung color from 'input'
            setTimeout(function () {
              $('input[name=envo_househeadquarters]').css('background-color', '#FFF');
              $('input[name=envo_houseic]').css('background-color', '#FFF');
              $('input[name=envo_housepsc]').css('background-color', '#FFF');
            }, 4000);

            // Change 'attr' in anchor
            $('#ares_res a').attr('href', 'https://wwwinfo.mfcr.cz/cgi-bin/ares/darv_res.cgi?ico=' + ic + '&jazyk=cz&xml=1');
            $('#justice_vor a').attr('href', 'https://or.justice.cz/ias/ui/rejstrik-$firma?ico=' + ic + '&jenPlatne=VSECHNY');

            // Alert status message
            alert(data.status_msg + '\r\n\n' + 'NÁZEV: ' + data.name);

          } else {

            // Alert status message
            alert(data.status_msg);

          }

        }
      });

    });

  });

</script>
