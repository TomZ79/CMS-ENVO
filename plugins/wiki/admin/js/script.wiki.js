/*
 * CMS ENVO
 * JS for Plugin Wiki - ADMIN
 * Copyright (c) 2016 - 2018 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Basic config for plugin's administration
 * 02. Slug
 * 03. Bootstrap Icon Picker
 * 04. NestedSortable
 * 05. DataTable Initialisation
 *
 */

/** 01. Basic config for plugin's administration
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

if ($('#htmleditor').length) {
  var htmlACE = ace.edit('htmleditor');
  htmlACE.setTheme('ace/theme/' + aceEditor.acetheme);
  htmlACE.session.setUseWrapMode(aceEditor.aceactivewrap);
  htmlACE.session.setWrapLimitRange($wrapLimitRange.min, $wrapLimitRange.max);
  htmlACE.setOptions({
    // session options
    mode: "ace/mode/html",
    tabSize: aceEditor.acetabSize,
    useSoftTabs: true,
    highlightActiveLine: aceEditor.aceactiveline,
    // renderer options
    showInvisibles: aceEditor.aceinvisible,
    showGutter: aceEditor.acegutter
  });
  // This is to remove following warning message on console:
  // Automatically scrolling cursor into view after selection change this will be disabled in the next version
  // set editor.$blockScrolling = Infinity to disable this message
  htmlACE.$blockScrolling = Infinity;

  texthtml = $('#envo_editor').val();
  htmlACE.session.setValue(texthtml);
}

if ($('#csseditor').length) {
  var cssACE = ace.edit("csseditor");
  cssACE.setTheme("ace/theme/chrome");
  cssACE.session.setMode("ace/mode/css");
  textcss = $("#envo_css").val();
  cssACE.session.setValue(textcss);
  cssACE.$blockScrolling = Infinity;
}

if ($('#javaeditor').length) {
  var jsACE = ace.edit("javaeditor");
  jsACE.setTheme("ace/theme/chrome");
  jsACE.session.setMode("ace/mode/javascript");
  textjs = $("#envo_javascript").val();
  jsACE.session.setValue(textjs);
  jsACE.$blockScrolling = Infinity;
}

/* Responsive Filemanager
 ========================================= */
function responsive_filemanager_callback(field_id) {

  if (field_id == "csseditor" || field_id == "javaeditor" || field_id == "htmleditor") {

    // get the path for the ace file
    var acefile = jQuery('#' + field_id).val();

    if (field_id == "csseditor") {
      cssACE.insert('<link rel="stylesheet" href="' + acefile + '" type="text/css" />');
    } else if (field_id == "javaeditor") {
      jsACE.insert('<script src="' + acefile + '"><\/script>');
    } else {
      htmlACE.insert(acefile);
    }
  }
}

$(function () {
  /* Insert block to ACE Editor
   ========================================= */
  $("#addCssBlock").click(function () {
    cssACE.insert(insert_cssblock());
  });
  $("#addJavascriptBlock").click(function () {
    jsACE.insert(insert_javascript());
  });

  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    if ($('#envo_editor').length) {
      $("#envo_editor").val(htmlACE.getValue());
    }
    if ($('#csseditor').length) {
      $("#envo_css").val(cssACE.getValue());
    }
    if ($('#javaeditor').length) {
      $("#envo_javascript").val(jsACE.getValue());
    }
  });

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

/** 02. Slug
 ========================================================================*/

$(function () {

  $("#envo_name").keyup(function () {
    // Checked, copy values
    $("#envo_varname").val(envoSlug($("#envo_name").val()));
  });

});

/** 03. Bootstrap Icon Picker
 * @require: Icon Picker Plugin
 ========================================================================*/

$(function () {

  $('.iconpicker').iconpicker({
    arrowClass: 'btn-info',
    icon: iconPicker.icon,
    iconset: 'fontawesome',
    searchText: iconPicker.searchText,
    labelFooter: iconPicker.labelFooter,
    arrowPrevIconClass: 'fa fa-chevron-left',
    arrowNextIconClass: 'fa fa-chevron-right',
    selectedClass: 'btn-success',
    unselectedClass: '',
    rows: 5,
    cols: 8
  });

  $('.iconpicker').on('change', function (e) {
    $("#envo_img").val('fa ' + e.icon);
  });

  $('.iconpicker1').iconpicker({
    arrowClass: 'btn-info',
    icon: iconPicker.icon,
    iconset: 'glyphicons',
    searchText: iconPicker.searchText,
    labelFooter: iconPicker.labelFooter,
    arrowPrevIconClass: 'fa fa-chevron-left',
    arrowNextIconClass: 'fa fa-chevron-right',
    selectedClass: 'btn-success',
    unselectedClass: '',
    rows: 5,
    cols: 8
  });

  $('.iconpicker1').on('change', function (e) {
    $("#envo_img").val('glyphicons ' + e.icon);
  });

});

/** 04. NestedSortable
 * @require: NestedSortable Plugin
 ========================================================================*/

$(function () {

  $(".sortable").nestedSortable({maxLevels: 2});

  $(".save-menu-plugin").on("click", function () {
    mlist = $(this).data("menu");
    serialized = $("#" + mlist).nestedSortable("serialize");

    /* Sending the form fileds to any post request: */
    var request = $.ajax({
      url: "index.php?p=wiki&amp;sp=categories",
      type: "POST",
      data: serialized,
      dataType: "json",
      cache: false
    });
    request.done(function (data) {
      if (data.status == 1) {
        $("#" + mlist + " li").animate({backgroundColor: '#C9FFC9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
        $.notify({icon: 'fa fa-check-square-o', message: data.html}, {type: 'success'});
      } else {
        $("#" + mlist + " li").animate({backgroundColor: '#FFC9C9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
        $.notify({icon: 'fa fa-exclamation-triangle', message: data.html}, {type: 'danger'});
      }
    });
  });

});

/** 05. DataTable Initialisation
 * @require: DataTable Plugin
 ========================================================================*/

$(function () {

  // If exist 'table' -> init Plugin DataTable
  if ($('#wiki_table').length > 0) {
    $('#wiki_table').dataTable({
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
      "dom": "<'row'<'col-sm-6'<'pull-left m-b-20'f>><'col-sm-6'<'float-right m-r-20 hidden-xs'B>>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-7'i><'col-sm-5'p>>",
      // Init bootstrap responsive table for mobile
      "initComplete": function (settings, json) {
        $(this).wrap('<div class="table-responsive"></div>');
      }
    });
  }

});

/** 06. DateTimePicker
 * @require: DateTimePicker Plugin
 ========================================================================*/

$(function () {

  /* DateTimePicker
   ========================================= */
  $('#datepickerTime').datetimepicker({
    // Language
    locale: envoWeb.envo_lang,
    // Date-Time format
    format: 'YYYY-MM-DD HH:mm:ss',
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
  }).on('dp.change', function (e) {
    // Grab the time value
    var date = $(this).data('date');
    $('input[name="envo_created"]').val(date);
  });

});

/** 07. Add new Rows
 ========================================================================*/

$(function () {

  function DeleteRow() {
    var par = $(this).closest('tr');
    par.remove();
  }

  //
  $('.deleteRow1').bind('click', DeleteRow);

  //
  $('#addRowTab1').click(function (e) {
    e.preventDefault();

    var tabledata = '';

    // Ajax
    $.ajax({
      url: "/plugins/wiki/admin/ajax/wiki_literature.php",
      type: 'POST',
      datatype: 'json',
      beforeSend: function () {

      },
      success: function (data) {
        // Console log
        // console.log(data);

        var dataInt = parseInt(data.data);
        var max = 0;
        var nextmax = '1'; // value '1', if not exists some row

        $('#wiki_table_1 .rowid1').each(function () {
          $this = parseInt($(this).val());
          if ($this > max) max = $this;
        });

        nextmax = dataInt + 1;
        console.log('Wiki Table 1');
        console.log('----------------');
        console.log('Data:' + dataInt);
        console.log('Max:' + max);
        console.log('NetMax:' + nextmax);

        if (dataInt == max) {
          nextmax = dataInt + 1;
        } else {
          if (max == 0) {
            nextmax = dataInt + 1;
          } else {
            nextmax = max + 1;
          }
        }

        tabledata += '<tr>' +
          '<td class="text-center">' + nextmax + '<input type="hidden" name="envo_literature_0[]" class="rowid1" value="' + nextmax + '"/></td>' +
          '<td><input type="text" name="envo_literature_1[]" class="form-control"></td>' +
          '<td class="text-center"><button type="button" class="btn btn-danger btn-xs deleteRow1"><i class="fa fa-trash-o"></i></button></td>' +
          '</tr>';

        //
        if ($('#wiki_table_1 .nodata').length) {
          $('#wiki_table_1 .nodata').remove();
        }

        // Put data to table
        $('#wiki_table_1 tbody').prepend(tabledata);

        // Update Jquery Function
        $('#wiki_table_1 .deleteRow1').bind("click", DeleteRow);

      },
      error: function () {

      }
    });

  });

  //
  $('.deleteRow2').bind('click', DeleteRow);

  //
  $('#addRowTab2').click(function (e) {
    e.preventDefault();

    var tabledata = '';

    // Ajax
    $.ajax({
      url: "/plugins/wiki/admin/ajax/wiki_link.php",
      type: 'POST',
      datatype: 'json',
      beforeSend: function () {

      },
      success: function (data) {
        // Console log
        // console.log(data);

        var dataInt = parseInt(data.data);
        var max = 0;
        var nextmax = '1'; // value '1', if not exists some row

        $('#wiki_table_2 .rowid2').each(function () {
          $this = parseInt($(this).val());
          if ($this > max) max = $this;
        });

        nextmax = dataInt + 1;
        console.log('Wiki Table 2');
        console.log('----------------');
        console.log('Data:' + dataInt);
        console.log('Max:' + max);
        console.log('NetMax:' + nextmax);

        if (dataInt == max) {
          nextmax = dataInt + 1;
        } else {
          if (max == 0) {
            nextmax = dataInt + 1;
          } else {
            nextmax = max + 1;
          }
        }

        tabledata += '<tr>' +
          '<td class="text-center">' + nextmax + '<input type="hidden" name="envo_links_0[]" class="rowid2" value="' + nextmax + '"/></td>' +
          '<td><input type="text" name="envo_links_1[]" class="form-control"></td>' +
          '<td class="text-center"><button type="button" class="btn btn-danger btn-xs deleteRow2"><i class="fa fa-trash-o"></i></button></td>' +
          '</tr>';

        //
        if ($('#wiki_table_2 .nodata').length) {
          $('#wiki_table_2 .nodata').remove();
        }

        // Put data to table
        $('#wiki_table_2 tbody').prepend(tabledata);

        // Update Jquery Function
        $('#wiki_table_2 .deleteRow2').bind("click", DeleteRow);

      },
      error: function () {

      }
    });

  });

});