/*
 * CMS ENVO
 * JS for User Group - ADMIN
 * -----------------------------------------------------------------------
 * Author: Thomas Zukal
 * Email: tzukal@email.cz
 * Copyright (c) 2016 - 2022
 * =======================================================================
 */

/** BASIC CONFIG
 * @require: Required plugins are listed for each function
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

/** DATATABLE INITIALISATION
 * @require: DataTable Plugin
 ========================================================================*/

$(function () {

	// If exist 'table' -> init Plugin DataTable
	if ($('#usergroups_table').length > 0) {
		$('#usergroups_table').dataTable({
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