/*
 * CMS ENVO
 * JS for Plugin Register Form - ADMIN
 * -----------------------------------------------------------------------
 * Author: Thomas Zukal
 * Email: tzukal@email.cz
 * Copyright (c) 2016 - 2022
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

if ($('#htmleditorlight').length > 0) {
	var htmlACE = ace.edit('htmleditorlight');
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

	texthtml = $("#envo_editor_light").val();
	htmlACE.session.setValue(texthtml);
}

if ($('#htmleditorlight1').length > 0) {
	var htmlACE1 = ace.edit("htmleditorlight1");
	htmlACE1.setTheme('ace/theme/' + aceEditor.acetheme);
	htmlACE1.session.setUseWrapMode(aceEditor.aceactivewrap);
	htmlACE1.session.setWrapLimitRange($wrapLimitRange.min, $wrapLimitRange.max);
	htmlACE1.setOptions({
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
	htmlACE1.$blockScrolling = Infinity;

	texthtml = $("#envo_editor_light1").val();
	htmlACE1.session.setValue(texthtml);
}

$(function () {
	/* Submit Form
	 ========================================= */
	$('form').submit(function () {
		if ($('#envo_editor_light').length > 0) {
			$("#envo_editor_light").val(htmlACE.getValue());
			$("#envo_editor_light1").val(htmlACE1.getValue());
		}
	});

});
