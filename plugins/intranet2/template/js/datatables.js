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
 * 01. DATATABLE - CUSTOM PAGINATION
 * 02. DATATABLE INITIALISATION
 *
 */

/* 00. DATATABLE CONFIG
 ========================================================================*/

$(function () {

  // Init Datatable plugin
  var tableElement = $('#datatable');
  tableElement.DataTable({
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
    "dom": "<'row'<'col-sm-6'<'float-left m-b-20'f>><'col-sm-6'<'float-right m-r-20 hidden-xs'B>>>" + "<'row'<'col-sm-12'tr>>" + "<'row '<'col-sm-7'i><'float-right col-sm-5'p>>",
    // Init bootstrap responsive table for mobile
    "initComplete": function(settings, json) {
      $(this).wrap('<div class="table-responsive"></div>');
    }
  });

});