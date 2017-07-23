/*
 |--------------------------------------------------------------------------
 | GLOBAL LANG DEFINITION
 |--------------------------------------------------------------------------
 * Lang definition from 'envoWeb.envo_jslang' by php parse ini lang file
 *
 * EXAMPLE - use value from json
 *
 * Example Definiton of JSON Array
 * {"name": "mkyong","age": 30,"address": {"streetAddress": "88 8nd Street","city": "New York"},"phoneNumber": [{"type": "home","number": "111 111-1111"},{"type": "fax","number": "222 222-2222"}]}
 *
 * Using
 * console.log(jslangdata["name"]); //mkyong
 * console.log(jslangdata.name); //mkyong
 * console.log(jslangdata.address.streetAddress); //88 8nd Street
 * console.log(jslangdata["address"].city); //New York
 * console.log(jslangdata.phoneNumber[0].number); //111 111-1111
 * console.log(jslangdata.phoneNumber[1].type); //fax
 * console.log(jslangdata.phoneNumber.number); //undefined
 *
 */
var jslangdata = JSON.parse(envoWeb.envo_jslang);

/*
 |--------------------------------------------------------------------------
 | PROGRAM WIZARD for tvtower_wizard.php
 |--------------------------------------------------------------------------
 */
(function ($) {
// PROGRAM WIZARD

  // Init SumoSelect plugin
  $('#selectTrans').SumoSelect({
    placeholder: jslangdata.btnplaceholder1,
    captionFormat:'{0} ' + jslangdata.captionformat,
    captionFormatAllSelected:'{0} - ' + jslangdata.captionformatall,
    locale: [jslangdata.locale1, jslangdata.locale2, jslangdata.locale3],
    selectAll: true
  });
  $('#selectChannel').SumoSelect({
    placeholder: jslangdata.btnplaceholder2,
    captionFormat:'{0} ' + jslangdata.captionformat,
    captionFormatAllSelected:'{0} - ' + jslangdata.captionformatall,
    locale: [jslangdata.locale1, jslangdata.locale2, jslangdata.locale3],
    selectAll: true
  });

  // Select TV Tower - change function
  $('#selectTrans').on('change', function () {
    // Getting selection value
    var transID = $(this).val();

    if (transID) {

      // Get programs by value from selection
      $.ajax({
        url: '/plugins/tv_tower/ajax/selectchannel.php',
        type: 'POST',
        datatype: 'json',
        data: {
          transId: transID
        },
        success: function (data) {
          var $select = $('#selectChannel');
          $select.empty();

          var res = $.parseJSON(data);

          // console.log(data);

          $.each(res, function (key, data) {
            // console.log(key);

            var $optgroup = $("<optgroup>", {label: key});
            $optgroup.appendTo($select);

            $.each(data, function (key, data) {
              // console.log(key);

              $.each(data, function (index, data) {
                // console.log('TowerID: ', data['towerid']);
                // console.log('TowerNAME: ', data['towername']);
                // console.log('ChannelID: ', data['channelid']);
                // console.log('ChannelNUMBER: ', data['channelnumber']);

                var $option = $("<option>", {
                  text: data['channelnumber'] + ' K',
                  value: data['towerid'] + ',' + data['channelid'] + ',' + data['channelnumber']
                });
                $option.appendTo($optgroup);

              })
            });
          });

          $('#selectChannel')[0].sumo.reload();
        }
      });
    } else {
      $('#selectChannel').html('');
      $('#selectChannel')[0].sumo.reload();
    }

  });

  $('#searchprogram').click(function () {
    var channelIDs = $('#selectChannel').val();

    if (channelIDs) {
      $('#resultData').empty();
      $('#bounceLoader').show();

      $.ajax({
        url: '/plugins/tv_tower/ajax/selectchannel2.php',
        type: 'POST',
        datatype: 'html',
        data: {
          channelIDs: channelIDs
        },
        success: function (data) {

          setTimeout(function () {
            $('#bounceLoader').hide();
            $('#resultData').append(data);
          }, 1500);

        }
      });
    } else {
      $('#resultData').html('<div class="alert alert-danger">Vyberte kanál ze seznamu kanálů</div>');
    }

  });


})(jQuery);

/*
 |--------------------------------------------------------------------------
 | PROGRAM LIST for tvtower_list.php
 |--------------------------------------------------------------------------
 */
(function ($) {
// PROGRAM LIST

  // Init SumoSelect plugin
  $('.sumoselect').SumoSelect();

  // BOOTSTRAP-EXPAND table rows
  $('.table-expandable').each(function () {
    var table = $(this);
    if (table.children('tbody').children('tr').hasClass('noresult')) {

    } else {
      table.children('thead').children('tr').append('<th></th>');
      table.children('tbody').children('tr').filter(':odd').hide();
      table.children('tbody').children('tr').filter(':even').click(function () {
        var element = $(this);
        element.toggleClass('active');
        element.next('tr').toggle('fast');
        element.find(".table-expandable-arrow").toggleClass("up");
      });
      table.children('tbody').children('tr').filter(':even').each(function () {
        var element = $(this);
        element.append('<td><div class="table-expandable-arrow"></div></td>');
      });
    }
  });

  // FILTER TABLE BY MUX - TRANSMITTER
  $('select[id^="SelectTrans"]').on('change', function () {
    // Get the value of the select box
    var val = $(this).find("option:selected").val();

    // Get parent div by transmitter
    var parentel = $(this).parents('div[id^="tramsmitter-"]');
    console.log(parentel);

    // Show all tr rows in transmitter table
    parentel.find('div[id^="Transmitter"] table tbody tr').show();

    // Show all the rows
    $('.table-expandable').each(function () {
      var table = $(this);
      table.children('tbody').children('tr').filter(':odd').hide();
    });
    // If there is a value hide all the rows except the ones with a data-year of that value
    if (val) {
      // Find tr with 'data-mux' in parent div
      parentel.find('div[id^="Transmitter"] table tbody tr').not($('tbody tr[data-mux="' + val + '"]')).hide();
      $('.table-expandable').each(function () {
        var table = $(this);
        table.children('tbody').children('tr').filter(':odd').hide();
        // Remove class from Bootstrap expand table rows
        table.find(".table-expandable-arrow").removeClass("up");
        table.find(".active").removeClass("active");
      });
    }
  });

})(jQuery);