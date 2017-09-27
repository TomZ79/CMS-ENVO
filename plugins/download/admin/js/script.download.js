/*
 * CMS ENVO
 * JS for Plugin Download - ADMIN
 * Copyright (c) 2016 - 2017 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Basic config for plugin's administration
 * 02. Slug
 * 03. Bootstrap Icon Picker
 * 04. DateTimePicker
 * 05. NestedSortable
 *
 */


/** 01. Basic config for plugin's administration
 ========================================================================*/

/** ACE Editor
 * Initialisation of ACE Editor
 * @require: ACE Editor Plugin
 *
 * Set variable in php file as array (script.tv-tower.php)
 * @param: 'aceEditor.acetheme' from generated_js.php
 * @param: 'aceEditor.acewraplimit' from generated_js.php
 * @param: 'aceEditor.acetabSize' from generated_js.php
 * @param: 'aceEditor.aceactiveline' from generated_js.php
 * @param: 'aceEditor.aceinvisible' from generated_js.php
 * @param: 'aceEditor.acegutter' from generated_js.php
 *
 * @example: Example add other variable setting to aceEditor object in script.download.php
 *
 * <script>
 *  // Add to aceEditor settings javascript object
 *  aceEditor['otherconfigvariable'] = <?php echo json_encode($othervalue); ?>;
 * </script>
 ========================================= */
// Set WrapLimitRange from generated_js.php
$wrapLimitRange = {
  min: aceEditor.acewraplimit,
  max: aceEditor.acewraplimit
};

if ($('#htmleditor').length) {
  var htmlACE = ace.edit('htmleditor');
  htmlACE.setTheme('ace/theme/' + aceEditor.acetheme);
  htmlACE.session.setUseWrapMode(true);
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
  cssACE.session.setMode("ace/mode/html");
  textcss = $("#envo_css").val();
  cssACE.session.setValue(textcss);
  cssACE.$blockScrolling = Infinity;
}

if ($('#javaeditor').length) {
  var jsACE = ace.edit("javaeditor");
  jsACE.setTheme("ace/theme/chrome");
  jsACE.session.setMode("ace/mode/html");
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

  /* Check all checkbox
   ========================================= */
  $("#envo_delete_all").click(function () {
    var checkedStatus = this.checked;
    $(".highlight").each(function () {
      $(this).prop('checked', checkedStatus);
    });
    $('#button_delete').prop('disabled', function (i, v) {
      return !v;
    });
  });

  /* Disable submit button if checkbox is not checked
   ========================================= */
  $(".highlight").change(function () {
    if (this.checked) {
      $("#button_delete").removeAttr("disabled");
    } else {
      $("#button_delete").attr("disabled", "disabled");
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

/** 04. DateTimePicker
 * @require: DateTimePicker Plugin
 ========================================================================*/

$(function () {

  /* DateTimePicker
   ========================================= */
  $('#datepickerTime').datetimepicker({
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

});

/** 05. NestedSortable
 * @require: NestedSortable Plugin
 ========================================================================*/

$(function () {

  $(".sortable").nestedSortable({maxLevels: 2});

  $(".save-menu-plugin").on("click", function () {
    mlist = $(this).data("menu");
    serialized = $("#" + mlist).nestedSortable("serialize");

    /* Sending the form fileds to any post request: */
    var request = $.ajax({
      url: "index.php?p=download&amp;sp=categories",
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