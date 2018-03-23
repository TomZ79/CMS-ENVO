/*
 * CMS ENVO
 * JS for Pages - ADMIN
 * Copyright (c) 2016 - 2018 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Basic config for plugin's administration
 * 02. DataTable Initialisation
 *
 */

/** 01. Basic config for plugin's administration
 ========================================================================*/

/** ACE Editor
 * Initialisation of ACE Editor
 * @require: ACE Editor Plugin
 *
 * Set variable in php file as array (script.tv-tower.php)
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
 *  aceEditor['otherconfigvariable'] = <?php echo json_encode($othervalue); ?>;
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

  var texthtml = $('#envo_editor').val();
  htmlACE.session.setValue(texthtml);
}


if ($('#csseditor').length) {
  var cssACE = ace.edit("csseditor");
  cssACE.setTheme("ace/theme/chrome");
  cssACE.session.setMode("ace/mode/html");
  textcss = $('#envo_css').val();
  cssACE.session.setValue(textcss);
  cssACE.$blockScrolling = Infinity;
}

if ($('#javaeditor').length) {
  var jsACE = ace.edit("javaeditor");
  jsACE.setTheme("ace/theme/chrome");
  jsACE.session.setMode("ace/mode/html");
  textjs = $('#envo_javascript').val();
  jsACE.session.setValue(textjs);
  jsACE.$blockScrolling = Infinity;
}

/* Responsive Filemanager
 ========================================= */
function responsive_filemanager_callback(field_id) {

  if (field_id == "csseditor" || field_id == "javaeditor" || field_id == "htmleditor") {

    // Get the path for the ACE file
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

  /** Restore content of ACE Editor
   * @param: 'notification.confirmRestore' from generated_admin_js.php
   * @param: 'globalSettings.pageID2' from script.page.php
   * @param: 'globalSettings.advEditor' from generated_admin_js.php
   ========================================= */
  if ($('#restorcontent').length) {
    $('#restorcontent').change(function () {
      if ($(this).val() != 0) {
        if (!confirm(notification.confirmRestore)) {
          $("#restorcontent").val(0);
          return false;
        } else {
          restoreContent('pageid', globalSettings.pageID2, $(this).val());
        }
      }
    });
  }

  /* Insert block to ACE Editor
   ========================================= */
  $('#addCssBlock').click(function () {
    cssACE.insert(insert_cssblock());
  });
  $('#addJavascriptBlock').click(function () {
    jsACE.insert(insert_javascript());
  });

  /* Insert Short Code to ACE Editor
   ========================================= */
  $('.short-sc').click(function () {
    htmlACE.insert(insert_code_member_guest());
  });

  $('.short-sc1').click(function () {
    htmlACE.insert(insert_code_member());
  });

  $('.short-sc2').click(function () {
    htmlACE.insert(insert_code_guest());
  });

  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    if ($('#envo_editor').length) {
      $('#envo_editor').val(htmlACE.getValue());
    }
    if ($('#csseditor').length) {
      $('#envo_css').val(cssACE.getValue());
    }
    if ($('#javaeditor').length) {
      $('#envo_javascript').val(jsACE.getValue());
    }
  });

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

/** 02. DataTable Initialisation
 * @require: DataTable Plugin
 ========================================================================*/

$(function () {

  // If exist 'table' -> init Plugin DataTable
  if ($('#pages_table').length > 0) {
    $('#pages_table').dataTable({
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
      "dom": "<'row'<'col-sm-6'<'pull-left m-b-20'f>><'col-sm-6'<'pull-right m-r-20 hidden-xs'B>>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-7'i><'col-sm-5'p>>",
      // Init bootstrap responsive table for mobile
      "initComplete": function (settings, json) {
        $(this).wrap('<div class="table-responsive"></div>');
      }
    });
  }

});