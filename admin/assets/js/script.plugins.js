/*
 * CMS ENVO
 * JS for Plugins - ADMIN
 * Copyright (c) 2016 - 2018 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Basic config for plugin's administration
 * 02. Show iFrame in modal - Plugins
 * 03. DataTable Initialisation
 *
 */

/** 01. Basic config for plugin's administration
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

if ($('#htmleditor').length) {
	var htmlACE = ace.edit('htmleditor');
	htmlACE.setTheme('ace/theme/' + aceEditor.acetheme);
	htmlACE.session.setUseWrapMode(aceEditor.aceactivewrap);
	htmlACE.session.setWrapLimitRange($wrapLimitRange.min, $wrapLimitRange.max);
	htmlACE.setOptions({
		// session options
		mode: "ace/mode/php",
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
		if (checkedStatus) {
			$('#button_delete').prop('disabled', false);
		} else {
			$('#button_delete').attr('disabled', true);
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
			if ($('.highlight').filter(':checked').length < 1) {
				$('#envo_delete_all').prop('checked', false);
				$('#button_delete').attr('disabled', true);
			}
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

/** 03. DataTable Initialisation
 * @require: DataTable Plugin
 ========================================================================*/

$(function () {

	// If exist 'table' -> init Plugin DataTable
	if ($('#hooks_table').length > 0) {
		$('#hooks_table').dataTable({
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