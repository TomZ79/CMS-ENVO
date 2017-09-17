/*
 *
 * CMS ENVO
 * JS for Plugin Register Form - ADMIN
 * Copyright © 2016 Bluesat.cz
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
if ($('#htmleditorlight').length > 0) {
  var htmlACE = ace.edit('htmleditorlight');
  htmlACE.setTheme('ace/theme/' + aceEditor.acetheme); // Theme chrome, monokai
  htmlACE.session.setUseWrapMode(true);
  htmlACE.session.setWrapLimitRange(80, 80);
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

  texthtml = $("#jak_editor_light").val();
  htmlACE.session.setValue(texthtml);
}

if ($('#htmleditorlight1').length > 0) {
  var htmlACE1 = ace.edit("htmleditorlight1");
  htmlACE1.setTheme('ace/theme/' + aceEditor.acetheme); // Theme chrome, monokai
  htmlACE1.session.setUseWrapMode(true);
  htmlACE1.session.setWrapLimitRange(80, 80);
  htmlACE1.setOptions({
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
  htmlACE1.$blockScrolling = Infinity;

  texthtml = $("#jak_editor_light1").val();
  htmlACE1.session.setValue(texthtml);
}

$(function () {
  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    if ($('#jak_editor_light').length > 0) {
      $("#jak_editor_light").val(htmlACE.getValue());
      $("#jak_editor_light1").val(htmlACE1.getValue());
    }
  });

});
