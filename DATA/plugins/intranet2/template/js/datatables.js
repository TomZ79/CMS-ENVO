/*
 * CMS ENVO
 * JS for Plugin Intranet - Frontend
 * -----------------------------------------------------------------------
 * Author: Thomas Zukal
 * Email: tzukal@email.cz
 * Copyright (c) 2016 - 2022
 * =======================================================================
 *
 */

/** DATATABLE INITIALISATION
 * @require: DataTable Plugin
 ========================================================================*/

$(function () {

  'use strict';

  // Init Datatable plugin
  var tableElement = $('#datatable');
  tableElement.DataTable({
    // Language
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Czech.json"
    },
    "order": [0, 'asc'],
    "columnDefs": [
      {
        "targets": 'no-sort',
        "orderable": false
      }
    ],
    // Page lenght
    "pageLength": 15,
    // Show entries
    //"lengthMenu": [ [10,20, -1], [10,20, "All"] ],
    // Design Table items
    "dom": "<'row'<'col-12 col-md-6'<'m-b-20'f>><'col-12 col-md-6'<'float-md-right m-r-20'B>>>" + "<'row'<'col-12 col-md-12'tr>>" + "<'row '<'col-12 col-md-7'i><'col-12 col-md-5'p>>",
    // Buttons
    buttons: [
      'csv',
      'excel',
      {
        extend: 'pdf',
        // Page Orientation
        orientation: 'landscape',
        // Page Size
        pageSize: 'A4',
        // Title
        title: 'Seznam Bytových Domů',
        customize: function (doc) {
          // Console log
          console.log(doc.content)
          // Style for Title
          doc.styles.title = {
            color: '#08c',
            fontSize: '32',
            bold: true,
            alignment: 'center'
          }
          // Table widht 100%
          // doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('')
        },
        // Bottom message
        messageTop: 'Bluesat.cz'
      },
      {
        extend: 'print',
        text: 'Tisk',
        title: 'Seznam Bytových Domů'
      }
    ],
    // Init bootstrap responsive table for mobile
    "initComplete": function (settings, json) {
      $(this).wrap('<div class="table-responsive"></div>');
    }
  });

});