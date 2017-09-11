/*
 * CMS ENVO
 * JS for Plugins - Admin
 * Copyright © 2016 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Basic config for plugin's administration
 * 02. Show iFrame in modal - Plugins
 *
 */

/** 01. Basic config for plugin's administration
 ========================================================================*/

/** ACE Editor
 * Initialisation of ACE Editor
 * @required_plugin: ACE Editor Plugin
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
  var htmlefACE = ace.edit("htmleditor");
  htmlACE.setTheme('ace/theme/' + aceEditor.acetheme); // Theme chrome, monokai
  htmlefACE.session.setUseWrapMode(true);
  htmlACE.session.setWrapLimitRange(aceEditor.acewraplimit + ',' + aceEditor.acewraplimit);
  htmlefACE.setOptions({
    // session options
    mode: "ace/mode/php",
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
  htmlefACE.$blockScrolling = Infinity;

  texthtmlef = $("#jak_phpcode").val();
  htmlefACE.session.setValue(texthtmlef);
}

$(function () {

  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    $("#jak_phpcode").val(htmlefACE.getValue());
  });

  /* Check all checkbox */
  $("#jak_delete_all").click(function () {
    var checkedStatus = this.checked;
    $(".highlight").each(function () {
      $(this).prop('checked', checkedStatus);
    });
    $('#button_delete').prop('disabled', function (i, v) {
      return !v;
    });
  });

  /* Disable submit button if checkbox is not checked */
  $(".highlight").change(function () {
    if (this.checked) {
      $("#button_delete").removeAttr("disabled");
    } else {
      $("#button_delete").attr("disabled", "disabled");
    }
  });

});

/** 02. Show iFrame in modal - Plugins
 ========================================================================*/

$(function () {

  // Close modal dialog from iFrame - call this by onclick="window.parent.closeModal(); from iFrame"
  window.closeModal = function () {
    $('#ENVOModal').modal('hide');
  };

  // Show iFrame in modal - install and uninstall
  $('.plugInst').on('click', function (e) {
    e.preventDefault();
    frameSrc = $(this).attr("href");
    $('#ENVOModalLabel').html("<?php echo ucwords($page);?>");
    $('#ENVOModal').on('show.bs.modal', function () {
      $('#ENVOModal .modal-dialog').addClass('modal-w-90p');
      $('<iframe src="' + frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">').appendTo('.body-content');
    });
    $('#ENVOModal').on('hidden.bs.modal', function () {
      $(this).removeData();
      window.location.reload();
    });
    $('#ENVOModal').modal({show: true});
  });

  // Show iFrame in modal - help
  $('.plugHelp').on('click', function (e) {
    e.preventDefault();
    frameSrc = $(this).attr("href");
    $('#ENVOModalLabel').html("<?php echo ucwords($page);?>");
    $('#ENVOModal').on('show.bs.modal', function () {
      $('#ENVOModal .modal-dialog').addClass('modal-w-90p');
      $('<iframe src="' + frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">').appendTo('.body-content');
    });
    $('#ENVOModal').on('hidden.bs.modal', function () {
      $(this).removeData();
      window.location.reload();
    });
    $('#ENVOModal').modal({show: true});
  });


});