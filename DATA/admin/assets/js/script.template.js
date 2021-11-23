/*
 * CMS ENVO
 * JS for Template - ADMIN
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

if ($('#htmleditor').length) {
	var htmlefACE = ace.edit('htmleditor');
	htmlefACE.setTheme('ace/theme/' + aceEditor.acetheme);
	htmlefACE.session.setUseWrapMode(aceEditor.aceactivewrap);
	htmlefACE.session.setWrapLimitRange($wrapLimitRange.min, $wrapLimitRange.max);
	htmlefACE.setOptions({
		// session options
		mode: 'ace/mode/' + aceEditor.acemode,
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

	var texthtmlef = $('#envo_filecontent').val();
	htmlefACE.session.setValue(texthtmlef);
}

$(function () {

	/* Submit Form
	 ========================================= */
	$('form').submit(function () {
		$('#envo_filecontent').val(htmlefACE.getValue());
	});

});

/** AUTOGROW TEXT BLOCK
 * @require: AutoGrow Plugin
 ========================================================================*/

$(function () {

	$('.txtautogrow').autoGrow();

});

/** BOOTSTRAP MODAL
 * @require: Bootstrap Plugin
 ========================================================================*/

$(function () {

	var element = $('#ENVOModal');

	// Close modal dialog from iFrame - call this by onclick="window.parent.closeModal(); from iFrame"
	window.closeModal = function () {
		$('#ENVOModal').modal('hide');
	};

	// Show iFrame in Bootstrap modal  - Install and Uninstall
	$('.tempInst').on('click', function (e) {
		e.preventDefault();
		$frameSrc = $(this).attr('href');

		element.on('shown.bs.modal', function (e) {

			$(this).find('.modal-dialog').addClass('modal-w-70p');
			$(this).find('.body-content').html('<iframe src="' + $frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">');

		}).on('hidden.bs.modal', function (e) {

			window.location.reload();

		}).modal('show');

	});

	// Show iFrame in Bootstrap modal - Help
	$('.tempHelp').on('click', function (e) {
		e.preventDefault();
		$frameSrc = $(this).attr('href');

		element.on('shown.bs.modal', function (e) {

			$(this).find('.modal-dialog').addClass('modal-w-90p');
			$(this).find('.body-content').html('<iframe src="' + $frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">');

		}).on('hidden.bs.modal', function (e) {

			$(this).find('.body-content').html('');

		}).modal('show');

	});

	$('.disabled').click(function (e) {
		e.preventDefault();
	})

});