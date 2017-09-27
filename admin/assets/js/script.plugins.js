/*
 * CMS ENVO
 * JS for Plugins - ADMIN
 * Copyright (c) 2016 - 2017 Bluesat.cz
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
  htmlACE.$blockScrolling = Infinity;

  texthtmlef = $('#envo_phpcode').val();
  htmlACE.session.setValue(texthtmlef);
}

$(function () {

  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    $('#envo_phpcode').val(htmlACE.getValue());
  });

  /* Check all checkbox */
  $('#envo_delete_all').click(function () {
    var checkedStatus = this.checked;
    $('.highlight').each(function () {
      $(this).prop('checked', checkedStatus);
    });
    $('#button_delete').prop('disabled', function (i, v) {
      return !v;
    });
  });

  /* Disable submit button if checkbox is not checked */
  $('.highlight').change(function () {
    if (this.checked) {
      $('#button_delete').removeAttr("disabled");
    } else {
      $('#button_delete').attr("disabled", "disabled");
    }
  });

});

/** 02. Show iFrame in modal - Plugins
 ========================================================================*/

$(function () {

  var element = $('#ENVOModal');

  // Close modal dialog from iFrame - call this by onclick="window.parent.closeModal(); from iFrame"
  window.closeModal = function () {
    element.modal('hide');
  };

  // Show iFrame in Bootstrap modal  - Install and Uninstall
  $('.plugInst').on('click', function (e) {
    e.preventDefault();
    $frameSrc = $(this).attr('href');

    element.on('shown.bs.modal', function (e) {

      $(this).find('.modal-dialog').addClass('modal-w-90p');
      $(this).find('.body-content').html('<iframe src="' + $frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">');

    }).on('hidden.bs.modal', function (e) {

      window.location.reload();

    }).modal('show');

  });

  // Show iFrame in Bootstrap modal - Help
  $('.plugHelp').on('click', function (e) {
    e.preventDefault();
    $frameSrc = $(this).attr('href');

    element.on('shown.bs.modal', function (e) {

      $(this).find('.modal-dialog').addClass('modal-w-90p');
      $(this).find('.body-content').html('<iframe src="' + $frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">');

    }).on('hidden.bs.modal', function (e) {

      $(this).find('.body-content').html('');

    }).modal('show');

  });

});