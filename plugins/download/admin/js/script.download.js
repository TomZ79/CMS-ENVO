/*
 *
 * CMS ENVO
 * JS for Plugin Download - Admin
 * Copyright © 2016 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas
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

$(function () {

  /** ACE Editor
   * Initialisation of ACE Editor
   * @required_plugin: ACE Editor Plugin
   * @variable_setting: Set variable in php file as array (script.tv-tower.php)
   *
   * @example: Example variable setting
   *
   * var aceEditor = {
   *    acetheme: <?php echo json_encode($jkv["acetheme"]); ?>,
   *    acewraplimit: <?php echo json_encode($jkv["acewraplimit"]); ?>,
   *    acetabSize: <?php echo json_encode($jkv["acetabSize"]); ?>,
   *    aceactiveline: <?php echo json_encode($jkv["aceactiveline"]); ?>,
   *    aceinvisible: <?php echo json_encode($jkv["aceinvisible"]); ?>,
   *    acegutter: <?php echo json_encode($jkv["acegutter"]); ?>
   * };
   ========================================= */
  if ($('#htmleditor').length) {
    var htmlACE = ace.edit('htmleditor');
    htmlACE.setTheme('ace/theme/' + aceEditor['acetheme']); // Theme chrome, monokai
    htmlACE.session.setUseWrapMode(true);
    htmlACE.session.setWrapLimitRange(aceEditor['acewraplimit'] +  ',' + aceEditor['acewraplimit']);
    htmlACE.setOptions({
      // session options
      mode: "ace/mode/html",
      tabSize: aceEditor['acetabSize'],
      useSoftTabs: true,
      highlightActiveLine: aceEditor['aceactiveline'],
      // renderer options
      showInvisibles: aceEditor['aceinvisible'],
      showGutter: aceEditor['acegutter']
    });
    // This is to remove following warning message on console:
    // Automatically scrolling cursor into view after selection change this will be disabled in the next version
    // set editor.$blockScrolling = Infinity to disable this message
    htmlACE.$blockScrolling = Infinity;

    texthtml = $('#jak_editor').val();
    htmlACE.session.setValue(texthtml);
  }

  if ($('#csseditor').length) {
    var cssACE = ace.edit("csseditor");
    cssACE.setTheme("ace/theme/chrome");
    cssACE.session.setMode("ace/mode/html");
    textcss = $("#jak_css").val();
    cssACE.session.setValue(textcss);
    // This is to remove following warning message on console:
    // Automatically scrolling cursor into view after selection change this will be disabled in the next version
    // set editor.$blockScrolling = Infinity to disable this message
    htmlACE.$blockScrolling = Infinity;
  }

  if ($('#javaeditor').length) {
    var jsACE = ace.edit("javaeditor");
    jsACE.setTheme("ace/theme/chrome");
    jsACE.session.setMode("ace/mode/html");
    textjs = $("#jak_javascript").val();
    jsACE.session.setValue(textjs);
    // This is to remove following warning message on console:
    // Automatically scrolling cursor into view after selection change this will be disabled in the next version
    // set editor.$blockScrolling = Infinity to disable this message
    htmlACE.$blockScrolling = Infinity;
  }

  /* Insert block to ACE Editor
   ========================================= */
  $(document).ready(function () {

    $("#addCssBlock").click(function () {
      cssACE.insert(insert_cssblock());
    });
    $("#addJavascriptBlock").click(function () {
      jsACE.insert(insert_javascript());
    });
  });

  /* Submit Form
   ========================================= */
  $('form').submit(function () {

    if ($('#jak_editor').length) {
      $("#jak_editor").val(htmlACE.getValue());
    }

    if ($('#csseditor').length) {
      $("#jak_css").val(cssACE.getValue());
    }

    if ($('#javaeditor').length) {
      $("#jak_javascript").val(jsACE.getValue());
    }

  });

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

  /* Check all checkbox
   ========================================= */
  $("#jak_delete_all").click(function () {
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

  $("#jak_name").keyup(function () {
    // Checked, copy values
    $("#jak_varname").val(jakSlug($("#jak_name").val()));
  });

});

/** 03. Bootstrap Icon Picker
 ========================================================================*/

$(function () {

  $('.iconpicker').iconpicker({
    arrowClass: 'btn-info',
    icon: iconpicker['icon'],
    iconset: 'fontawesome',
    searchText: iconpicker['searchText'],
    labelFooter: iconpicker['labelFooter'],
    arrowPrevIconClass: 'fa fa-chevron-left',
    arrowNextIconClass: 'fa fa-chevron-right',
    selectedClass: 'btn-success',
    unselectedClass: '',
    rows: 5,
    cols: 8
  });

  $('.iconpicker').on('change', function (e) {
    $("#jak_img").val('fa ' + e.icon);
  });

  $('.iconpicker1').iconpicker({
    arrowClass: 'btn-info',
    icon: iconpicker['icon'],
    iconset: 'glyphicons',
    searchText: iconpicker['searchText'],
    labelFooter: iconpicker['labelFooter'],
    arrowPrevIconClass: 'fa fa-chevron-left',
    arrowNextIconClass: 'fa fa-chevron-right',
    selectedClass: 'btn-success',
    unselectedClass: '',
    rows: 5,
    cols: 8
  });

  $('.iconpicker1').on('change', function (e) {
    $("#jak_img").val('glyphicons ' + e.icon);
  });

});

/** 04. DateTimePicker
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
        $("#" + mlist + " li").animate({backgroundColor: '#c9ffc9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
        $.notify({icon: 'fa fa-check-square-o', message: data.html}, {type: 'success'});
      } else {
        $("#" + mlist + " li").animate({backgroundColor: '#ffc9c9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
        $.notify({icon: 'fa fa-exclamation-triangle', message: data.html}, {type: 'danger'});
      }
    });
  });

});