/*
 * CMS ENVO
 * JS for Settings - ADMIN
 * Copyright (c) 2016 - 2018 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Basic config for plugin's administration
 * 02. AutoGrow text block
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

if ($('#txteditor').length) {
  var txtACE = ace.edit("txteditor");
  txtACE.setTheme('ace/theme/' + aceEditor.acetheme);
  txtACE.session.setUseWrapMode(true);
  txtACE.session.setWrapLimitRange($wrapLimitRange.min, $wrapLimitRange.max);
  txtACE.setOptions({
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
  txtACE.$blockScrolling = Infinity;

  textcontent = $('#envo_filecontent').val();
  txtACE.session.setValue(textcontent);
}

if ($('#txteditor1').length) {
  var txtACE1 = ace.edit("txteditor1");
  txtACE1.setTheme('ace/theme/' + aceEditor.acetheme);
  txtACE1.session.setUseWrapMode(true);
  txtACE1.session.setWrapLimitRange($wrapLimitRange.min, $wrapLimitRange.max);
  txtACE1.setOptions({
    // session options
    mode: "ace/mode/php",
    tabSize: aceEditor.acetabSize,
    useSoftTabs: true,
    highlightActiveLine: aceEditor.aceactiveline,
    // renderer options
    showInvisibles: aceEditor.aceinvisible,
    showGutter: aceEditor.acegutter
  });
  txtACE1.$blockScrolling = Infinity;

  textcontent1 = $('#envo_filecontent1').val();
  txtACE1.session.setValue(textcontent1);
}

$(function () {

  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    $('#envo_filecontent').val(txtACE.getValue());
    $('#envo_filecontent1').val(txtACE1.getValue());
  });

});

/** 02. AutoGrow text block
 * @require: AutoGrow Plugin
 ========================================================================*/

$(function () {

  $('.txtautogrow').autoGrow();

});