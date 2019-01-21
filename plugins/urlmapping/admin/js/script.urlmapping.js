/*
 * CMS ENVO
 * JS for Plugin URL Mapping - ADMIN
 * Copyright (c) 2016 - 2018 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Basic config for plugin's administration
 * 02.
 * 03. Datatable config
 *
 */

/** 01. Basic config for plugin's administration
 ========================================================================*/

$(function () {

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

/** 02.
 ========================================================================*/

$(function () {

	$('#envo_newurl').keyup(function () {
		this.value = this.value.replace(/[^a-zA-Z0-9\-_.]/g, '');
	});

	$('#envo_newurl').bind("keypress click", function () {
		$("#0").prop("checked", true);
	});

});

/* 03. Datatable config
 ========================================================================*/

$(function () {

	// Init Datatable plugin
	$('#url_table').dataTable({
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
		"dom": "<'row'<'col-sm-6'<'pull-left m-b-20'f>><'col-sm-6'<'float-right m-r-20 hidden-xs'B>>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-7'i><'col-sm-5'p>>"
	});

});