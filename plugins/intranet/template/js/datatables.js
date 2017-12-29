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
 * 01. Datatable - custom pagination
 * 02. Datatable initialisation
 *
 */

/* 01. DATATABLE - CUSTOM PAGINATION
 ========================================================================*/
/* API method to get paging information */
$.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
  return {
    "iStart": oSettings._iDisplayStart,
    "iEnd": oSettings.fnDisplayEnd(),
    "iLength": oSettings._iDisplayLength,
    "iTotal": oSettings.fnRecordsTotal(),
    "iFilteredTotal": oSettings.fnRecordsDisplay(),
    "iPage": oSettings._iDisplayLength === -1 ? 0 : Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
    "iTotalPages": oSettings._iDisplayLength === -1 ? 0 : Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
  };
};


/* Bootstrap style pagination control */
$.extend($.fn.dataTableExt.oPagination, {
  "bootstrap": {
    "fnInit": function (oSettings, nPaging, fnDraw) {
      var fnClickHandler = function (e) {
        e.preventDefault();
        if (oSettings.oApi._fnPageChange(oSettings, e.data.action)) {
          fnDraw(oSettings);
        }
      };

      $(nPaging).addClass('pagination').append(
        '<ul>' +
        '<li class="prev disabled"><a href="#"><i class="fa fa-chevron-left"></i></a></li>' +
        '<li class="next disabled"><a href="#"><i class="fa fa-chevron-right"></i></a></li>' +
        '</ul>'
      );
      var els = $('a', nPaging);
      $(els[0]).bind('click.DT', {action: "previous"}, fnClickHandler);
      $(els[1]).bind('click.DT', {action: "next"}, fnClickHandler);
    },

    "fnUpdate": function (oSettings, fnDraw) {
      var iListLength = 5;
      var oPaging = oSettings.oInstance.fnPagingInfo();
      var an = oSettings.aanFeatures.p;
      var i, ien, j, sClass, iStart, iEnd, iHalf = Math.floor(iListLength / 2);

      if (oPaging.iTotalPages < iListLength) {
        iStart = 1;
        iEnd = oPaging.iTotalPages;
      }
      else if (oPaging.iPage <= iHalf) {
        iStart = 1;
        iEnd = iListLength;
      } else if (oPaging.iPage >= (oPaging.iTotalPages - iHalf)) {
        iStart = oPaging.iTotalPages - iListLength + 1;
        iEnd = oPaging.iTotalPages;
      } else {
        iStart = oPaging.iPage - iHalf + 1;
        iEnd = iStart + iListLength - 1;
      }

      for (i = 0, ien = an.length; i < ien; i++) {
        // Remove the middle elements
        $('li:gt(0)', an[i]).filter(':not(:last)').remove();

        // Add the new list items and their event handlers
        for (j = iStart; j <= iEnd; j++) {
          sClass = (j == oPaging.iPage + 1) ? 'class="active"' : '';
          $('<li ' + sClass + '><a href="#">' + j + '</a></li>')
            .insertBefore($('li:last', an[i])[0])
            .bind('click', function (e) {
              e.preventDefault();
              oSettings._iDisplayStart = (parseInt($('a', this).text(), 10) - 1) * oPaging.iLength;
              fnDraw(oSettings);
            });
        }

        // Add / remove disabled classes from the static elements
        if (oPaging.iPage === 0) {
          $('li:first', an[i]).addClass('disabled');
        } else {
          $('li:first', an[i]).removeClass('disabled');
        }

        if (oPaging.iPage === oPaging.iTotalPages - 1 || oPaging.iTotalPages === 0) {
          $('li:last', an[i]).addClass('disabled');
        } else {
          $('li:last', an[i]).removeClass('disabled');
        }
      }
    }
  }
});

/* 02. DATATABLE INITIALISATION
 ========================================================================*/
$(function () {

  var tableElement = $('#datatable');

  tableElement.dataTable({
    // Language
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Czech.json"
    },
    "order": [],
    "columnDefs": [{
      "targets": 'no-sort',
      "orderable": false
    }],
    // Design Table items
    "sDom": "<'row'<'col-sm-6'<'pull-left m-b-20'f>><'col-sm-6'<'pull-right m-r-20 hidden-xs'B>>>" + "<'row'<'col-sm-12'tr>>" + "<'row  m-t-30'<'col-sm-12'p i>>",
    "sPaginationType": "bootstrap",
    // Init bootstrap responsive table for mobile
    "initComplete": function(settings, json) {
      $(this).wrap('<div class="table-responsive"></div>');
    }
  });

});