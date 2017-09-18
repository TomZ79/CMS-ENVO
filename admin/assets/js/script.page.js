/*
 * CMS ENVO
 * JS for Pages - ADMIN
 * Copyright (c) 2016 - 2017 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Basic config for plugin's administration
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
if ($('#htmleditor').length) {
  var htmlACE = ace.edit('htmleditor');
  htmlACE.setTheme('ace/theme/' + aceEditor.acetheme); // Theme chrome, monokai
  htmlACE.session.setUseWrapMode(true);
  htmlACE.session.setWrapLimitRange(aceEditor.acewraplimit +  ',' + aceEditor.acewraplimit);
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

  var texthtml = $("#jak_editor").val();
  htmlACE.session.setValue(texthtml);
}

if ($('#csseditor').length) {
  var cssACE = ace.edit("csseditor");
  cssACE.setTheme("ace/theme/chrome");
  cssACE.session.setMode("ace/mode/html");
  textcss = $("#jak_css").val();
  cssACE.session.setValue(textcss);
  cssACE.$blockScrolling = Infinity;
}

if ($('#javaeditor').length) {
  var jsACE = ace.edit("javaeditor");
  jsACE.setTheme("ace/theme/chrome");
  jsACE.session.setMode("ace/mode/html");
  textjs = $("#jak_javascript").val();
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
   * @param: 'notification.confirmRestore' from generated_js.php
   * @param: 'globalSettings.pageID2' from script.page.php
   * @param: 'globalSettings.advEditor' from generated_js.php
   ========================================= */
  if ($('#restorcontent').length) {
    $("#restorcontent").change(function () {
      if ($(this).val() != 0) {
        if (!confirm(notification.confirmRestore)) {
          $("#restorcontent").val(0);
          return false;
        } else {
          restoreContent('pageid', globalSettings.pageID2, globalSettings.advEditor, $(this).val());
        }
      }
    });
  }

  /* Insert block to ACE Editor
   ========================================= */
  $("#addCssBlock").click(function () {
    cssACE.insert(insert_cssblock());
  });
  $("#addJavascriptBlock").click(function () {
    jsACE.insert(insert_javascript());
  });

  /* Insert Short Code to ACE Editor
   ========================================= */
  $(".short-sc").click(function () {
    htmlACE.insert(insert_code_member_guest());
  });

  $(".short-sc1").click(function () {
    htmlACE.insert(insert_code_member());
  });

  $(".short-sc2").click(function () {
    htmlACE.insert(insert_code_guest());
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


