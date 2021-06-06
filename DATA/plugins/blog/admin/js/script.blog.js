/*
 * CMS ENVO
 * JS for Plugin Blog - ADMIN
 * Copyright (c) 2016 - 2019 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 */

/** BASIC CONFIG
 * @require: Required plugins are listed for each function
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

function aceboolean(param) {
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
 * @require: TinyMCE Filemanager Plugin
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
    if ($('#envo_editor').length > 0) {
      $("#envo_editor").val(htmlACE.getValue());
    }
    if ($('#csseditor').length > 0) {
      $("#envo_css").val(cssACE.getValue());
    }
    if ($('#javaeditor').length > 0) {
      $("#envo_javascript").val(jsACE.getValue());
    }
  });

  /** Restore content of ACE Editor
   * @param: 'notification.confirmRestore' from generated_admin_js.php
   * @param: 'globalSettings.pageID2' from script.page.php
   * @param: 'globalSettings.advEditor' from generated_admin_js.php
   ========================================= */
  if ($('#restorcontent').length) {
    $("#restorcontent").change(function () {
      if ($(this).val() != 0) {
        if (!confirm(notification.confirmRestore)) {
          $("#restorcontent").val(0);
          return false;
        } else {
          restoreContent('blogid', globalSettings.pageID2, $(this).val());
        }
      }
    });
  }

  /* Check all checkbox */
  $('#envo_delete_all').click(function () {
    var checkedStatus = this.checked;
    if (checkedStatus) {
      $('#button_delete').prop('disabled', false);
    } else {
      $('#button_delete').attr('disabled',true);
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
      if ($('.highlight').filter(':checked').length < 1){
        $('#envo_delete_all').prop('checked', false);
        $('#button_delete').attr('disabled',true);
      }
    }
  });

});

/** SLUG
 * @require: Slug Plugin
 ========================================================================*/

$(function () {

  $("#envo_name").keyup(function () {
    // Checked, copy values
    $("#envo_varname").val(envoSlug($("#envo_name").val()));
  });

});

/** BOOTSTRAP ICON PICKER
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

/** DATETIMEPICKER
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
  });

  /* DateTimePicker
   ========================================= */
  $('#datepickerFrom').datetimepicker({
    // Language
    locale: envoWeb.envo_lang,
    // Date-Time format
    format: 'YYYY-MM-DD HH:mm',
    // Icons
    icons: $.AdminEnvo.DateTimepicker.icons(),
    // Tooltips
    tooltips: $.AdminEnvo.DateTimepicker.tooltips(),
    // Show Button
    showTodayButton: true,
    showClear: true,
    // Other
    calendarWeeks: true,
    ignoreReadonly: true,
    keepInvalid: true
  });

  $('#datepickerTo').datetimepicker({
    // Language
    locale: envoWeb.envo_lang,
    // Date-Time format
    format: 'YYYY-MM-DD HH:mm',
    // Icons
    icons: $.AdminEnvo.DateTimepicker.icons(),
    // Tooltips
    tooltips: $.AdminEnvo.DateTimepicker.tooltips(),
    // Show Button
    showTodayButton: true,
    showClear: true,
    // Other
    calendarWeeks: true,
    ignoreReadonly: true,
    useCurrent: false //Important! See issue #1075
  });

  $("#datepickerFrom").on("dp.change", function (e) {
    $('#datepickerTo').data("DateTimePicker").minDate(e.date);
  });
  $("#datepickerTo").on("dp.change", function (e) {
    $('#datepickerFrom').data("DateTimePicker").maxDate(e.date);
  });

});

/** NESTEDSORTABLE
 * @require: NestedSortable Plugin
 ========================================================================*/

$(function () {

  $(".sortable").nestedSortable({maxLevels: 2});

  $(".save-menu-plugin").on("click", function () {
    mlist = $(this).data("menu");
    serialized = $("#" + mlist).nestedSortable("serialize");

    /* Sending the form fileds to any post request: */
    var request = $.ajax({
      url: "index.php?p=blog&amp;sp=categories",
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


/** KEEP SELECTED TAB ON PAGE REFRESH
 * @require: Bootstrap Plugin
 ========================================================================*/

$(function () {

  if ($('.nav.nav-tabs.nav-tabs-fillup').length > 0) {
    // Responsive Tabs on clicking a tab
    $(document).on('show.bs.tab', '.nav.nav-tabs.nav-tabs-fillup', function (event) {
      // store the currently selected tab in the hash value
      var id = $(event.target).attr("href").substr(1);
      window.location.hash = id;
    });

    // On load of the page: switch to the currently selected tab
    var hash = window.location.hash;
    $('.nav.nav-tabs.nav-tabs-fillup a[href="' + hash + '"]').tab('show');
  }

});

/** DATATABLE INITIALISATION
 * @require: DataTable Plugin
 ========================================================================*/

$(function () {

  // If exist 'table' -> init Plugin DataTable
  if ($('#blog_table').length > 0) {
    $('#blog_table').dataTable({
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