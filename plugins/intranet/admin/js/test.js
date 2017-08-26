/*
 *
 * CMS ENVO
 * JS for Plugin Intranet with custom modification
 * Copyright © 2016 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 *
 */

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

// Setting variable from url for other uses
// Page ID
var pageID = $.urlParam('id');

switch (envoWeb.envo_lang) {
  case 'en':

    var notifySuccess = 'Uložení zadaných dat proběhlo úspěšně';

    break;
  case 'cs':

    var notifySuccess = 'Uložení zadaných dat proběhlo úspěšně';

    break;
}

/* 00. UPLOAD FILE TO SERVER
 ========================================================================*/

$(function () {

  'use strict';

  $("#uploadBtn").on('click', (function (event) {
    event.preventDefault();

    // Hide output
    $('#docuoutput').hide();
    // Show progress info
    $('#docuprogress').show();
    // Reset
    $("#percent").html('0%');

    // Get Data - properties of file from file field
    var file_data = $('#fileinput').prop('files')[0];
    // Get Data - value of folder from file field
    var folder_path = $('input[name="folderdocumentspath"]').val();
    // Creating object of FormData class
    var form_data = new FormData();
    // Appending parameter named file with properties of file_field to form_data
    form_data.append('file', file_data);
    // Adding extra parameters to form_data
    form_data.append('folderdocumentspath', folder_path);
    form_data.append('houseID', pageID);

    // Ajax
    $.ajax({
      url: "/plugins/intranet/admin/ajax/int_table_documents_upload.php",
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
          if (evt.lengthComputable) {
            var percent = (evt.loaded / evt.total) * 100;
            var percentComplete = percent.toFixed(2) + '%';
            $('#percent').html(percentComplete);
          }
        }, false);

        return xhr;
      },
      success: function (data) {

        if (data.status == 'upload_success') {
          // IF DATA SUCCESS

          $('#docuoutput').html('<div class="alert alert-success" role="alert">' +
            '<button class="close" data-dismiss="alert"></button>' +
            '<strong>Success: </strong> File upload was successful.' +
            '</div>');

          var str = JSON.stringify(data);
          var result = JSON.parse(str);

          var tabledata = '';

          $.each(result, function (key, data) {
            //console.log('Key: ' + key + ' => ' + 'Value: ' + data);

            if (key === 'data') {

              $.each(data, function (index, data) {
                // console.log('ID: ', data['id']);
                // console.log('Entrance: ', data['entrance']);
                // console.log('Appartement: ', data['countapartment']);
                // console.log('Etage: ', data['countetage']);
                // console.log('Elevator: ', data['elevator']);

                tabledata += '<tr>' +
                  '<td>' + data["id"] + '</td>' +
                  '<td></td>' +
                  '<td>' + data["description"] + '</td>' +
                  '<td>' + data["filepath"] + '</td>' +
                  '</tr>';

              })

            }

          });

          // Put data to table
          $('#tableadocu tbody').html(tabledata);

          // Update Jquery Tabledit Plugin
          $('#tableadocu').Tabledit('update');

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: notifySuccess
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

        }

      },
      error: function () {

      },
      complete: function () {
        $("#docuprogress").hide();
        $("#docuoutput").show();
      }
    });
  }));

});

/* 00. SELECT FILE FOR UPLOAD TO SERVER
 ========================================================================*/

$(function () {

  // Clear button
  $('.file-clear').click(function () {
    $('.file').attr("data-content", "").popover('hide');
    $('.file-filename').val("");
    $('.file-clear').hide();
    $('.file-input input:file').val("");
    $(".file-input-title").text("Vybrat Soubor");
  });

  // Change button
  $(".file-input input:file").change(function () {
    var file = this.files[0];
    $(".file-input-title").text("Změnit");
    $(".file-clear").show();
    $(".file-filename").val(file.name);
  });

});

/* 00. XXXX
 ========================================================================*/

$(function () {

  'use strict';


});