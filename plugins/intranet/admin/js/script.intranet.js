/*
 *
 * CMS ENVO
 * JS for Plugin Intranet
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
      url: "/plugins/intranet/admin/ajax/int_table_upload_docu.php",
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

/* 00. DATATABLE CONFIG
 ========================================================================*/

$(function () {

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
    "pageLength": 15,
    // Show entries
    //"lengthMenu": [ [10,20, -1], [10,20, "All"] ],
    // Design Table items
    "dom": "<'row'<'col-sm-6'<'pull-left m-b-20'f>><'col-sm-6'<'pull-right m-r-20 hidden-xs'B>>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-7'i><'col-sm-5'p>>",
    // Export table
    buttons: [
      {
        extend: 'excel',
        exportOptions: {
          columns: [0, 2, 3, 4, 5]
        }
      },
      {
        extend: 'pdf',
        exportOptions: {
          columns: [0, 2, 3, 4, 5]
        },
        customize: function (doc) {
          doc.content[1].table.widths =
            Array(doc.content[1].table.body[0].length + 1).join('*').split('');
        }

      },
      {
        extend: 'print',
        exportOptions: {
          columns: [0, 2, 3, 4, 5]
        }
      }
    ],
  });

});


/* 00. TABLEDIT CONFIG
 ========================================================================*/

$(function () {

  /* Tabledit init and config
   ========================================= */
  // If exist 'table' -> init Plugin Jquery-Tabledit
  if ($('#tableentrance').length > 0) {
    // Tabledit init config
    $('#tableentrance').Tabledit({
      url: '/plugins/intranet/admin/ajax/int_table_update.php',
      inputClass: 'form-control',
      restoreButton: false,
      lang: 'cz',
      mutedClass: 'text-muted warning',
      columns: {
        identifier: [0, 'id'],
        editable: [
          [1, 'entrance', 'input'],
          [2, 'countapartment', 'input'],
          [3, 'countetage', 'input'],
          [4, 'elevator', 'select', '{"0": "Není známo", "1": "Ano", "2": "Ne"}']
        ]
      }
    });
  }

  // If exist 'table' -> init Plugin Jquery-Tabledit
  if ($('#tablecontacts').length > 0) {
    // Tabledit init config
    $('#tablecontacts').Tabledit({
      url: '/plugins/intranet/admin/ajax/int_table_update_cont.php',
      inputClass: 'form-control',
      restoreButton: false,
      lang: 'cz',
      mutedClass: 'text-muted warning',
      columns: {
        identifier: [0, 'id'],
        editable: [
          [1, 'name', 'input'],
          [2, 'address', 'input'],
          [3, 'phone', 'input'],
          [4, 'email', 'input'],
          [5, 'commission', 'select', '{"0": "Není ve Výboru", "1": "Předseda", "2": "Člen Výboru", "3": "Pověřený vlastník"}']
        ]
      }
    });
  }

  // If exist 'table' -> init Plugin Jquery-Tabledit
  if ($('table[id^="tableapartment_"]').length > 0) {
    // Tabledit init config
    $('table[id^="tableapartment_"]').Tabledit({
      url: '/plugins/intranet/admin/ajax/int_table_update_apt.php',
      inputClass: 'form-control',
      restoreButton: false,
      lang: 'cz',
      mutedClass: 'text-muted warning',
      columns: {
        identifier: [0, 'id'],
        editable: [
          [1, 'number', 'input'],
          [2, 'etage', 'input'],
          [3, 'name', 'input'],
          [4, 'phone', 'input'],
          [5, 'commission', 'select', '{"0": "Není ve Výboru", "1": "Předseda", "2": "Člen Výboru", "3": "Pověřený vlastník"}']
        ]
      }
    });
  }

  // If exist 'table' -> init Plugin Jquery-Tabledit
  if ($('#tableadocu').length > 0) {
    // Tabledit init config
    $('#tableadocu').Tabledit({
      url: '/plugins/intranet/admin/ajax/int_table_update.php',
      inputClass: 'form-control',
      restoreButton: false,
      lang: 'cz',
      mutedClass: 'text-muted warning',
      columns: {
        identifier: [0, 'id'],
        editable: [
          [2, 'description', 'input']
        ]
      }
    });
  }

  /* Tabledit add new row to table
   ========================================= */
  $("#addRowCont").on('click', function () {
    // Get value
    var houseID = pageID;
    var contact = $('input[name="addRowCont"]');
    var contactval = contact.val();

    if (contactval.length > 0) {
      // Ajax
      $.ajax({
        type: "POST",
        url: "/plugins/intranet/admin/ajax/int_table_addnew_cont.php",
        datatype: 'json',
        data: {
          houseID: houseID,
          contact: contactval
        },
        success: function (data) {

          if (data.status == 'success') {
            // IF DATA SUCCESS

            var str = JSON.stringify(data);
            var result = JSON.parse(str);

            var tabledata = '';

            $.each(result, function (key, data) {
              //console.log('Key: ' + key + ' => ' + 'Value: ' + data);

              if (key === 'data') {

                $.each(data, function (index, data) {
                  // console.log('ID: ', data['id']);
                  // console.log('Name: ', data['name']);
                  // console.log('Address: ', data['address']);
                  // console.log('Phone: ', data['phone']);
                  // console.log('Email: ', data['email']);
                  // console.log('Commission: ', data['commission']);

                  tabledata += '<tr>' +
                    '<td>' + data["id"] + '</td>' +
                    '<td>' + data["name"] + '</td>' +
                    '<td>' + data["address"] + '</td>' +
                    '<td>' + data["phone"] + '</td>' +
                    '<td>' + data["email"] + '</td>' +
                    '<td>' + data["commission"] + '</td>' +
                    '</tr>';

                })

              }

            });

            // Put data to table
            $('#tablecontacts tbody').html(tabledata);

            // Update Jquery Tabledit Plugin
            $('#tablecontacts').Tabledit('update');

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

          } else {
            // IF DATA ERROR

            // Notification
            setTimeout(function () {
              $.notify({
                // options
                message: 'Záznam je již uložen v DB'
              }, {
                // settings
                type: 'danger',
                delay: 5000
              });
            }, 1000);

          }

        },
        error: function () {

        }
      })

      // Set border for input - error
      contact.parent().removeClass('has-error');

    } else {
      // Notification
      setTimeout(function () {
        $.notify({
          // options
          message: 'Před vložením nového kontaktu zadejte celé jméno'
        }, {
          // settings
          type: 'danger',
          delay: 5000
        });
      }, 1000);

      // Set border for input - error
      contact.parent().addClass('has-error');
    }

  });

  $("#addRowEdit").on('click', function () {
    // Get value
    var houseID = pageID;
    var entrance = $('input[name="addRowEnt"]');
    var entranceval = entrance.val();

    if (entranceval.length > 0) {
      // Ajax
      $.ajax({
        type: "POST",
        url: "/plugins/intranet/admin/ajax/int_table_addnew.php",
        datatype: 'json',
        data: {
          houseID: houseID,
          entrance: entranceval
        },
        success: function (data) {

          if (data.status == 'success') {
            // IF DATA SUCCESS

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
                    '<td>' + data["entrance"] + '</td>' +
                    '<td>' + data["countapartment"] + '</td>' +
                    '<td>' + data["countetage"] + '</td>' +
                    '<td>' + data["elevator"] + '</td>' +
                    '</tr>';

                })

              }

            });

            // Put data to table
            $('#tableentrance tbody').html(tabledata);

            // Update Jquery Tabledit Plugin
            $('#tableentrance').Tabledit('update');

            // Notification
            setTimeout(function () {
              $.notify({
                // options
                message: notifySuccess + ', stránka bude obnovena'
              }, {
                // settings
                type: 'success',
                delay: 2000
              });
            }, 1000);

            setInterval(function () {
              location.reload(true);
            }, 5000);

          } else {
            // IF DATA ERROR

            // Notification
            setTimeout(function () {
              $.notify({
                // options
                message: 'Záznam je již uložen v DB'
              }, {
                // settings
                type: 'danger',
                delay: 5000
              });
            }, 1000);

          }

        },
        error: function () {

        }
      });

      // Set border for input - error
      entrance.parent().removeClass('has-error');
    } else {
      // Notification
      setTimeout(function () {
        $.notify({
          // options
          message: 'Před vložením nového řádku zadejte číslo vchodu'
        }, {
          // settings
          type: 'danger',
          delay: 5000
        });
      }, 1000);

      // Set border for input - error
      entrance.parent().addClass('has-error');
    }

  });

  $(".addRowEditApt").on('click', function () {
    // Get value
    var houseID = pageID;
    var entrance = $(this).attr("data-entrance");

    $.ajax({
      type: "POST",
      url: "/plugins/intranet/admin/ajax/int_table_addnew_apt.php",
      datatype: 'html',
      data: {
        houseID: houseID,
        entrance: entrance
      },
      success: function (data) {
        $('#tableapartment_' + entrance + ' tbody').html(data);

        $('#tableapartment_' + entrance).Tabledit('update');

      },
      error: function () {

      }
    })
  });

});

/* 00. XXXX
 ========================================================================*/

$(function () {

  'use strict';


});