/*
 * CMS ENVO
 * JS for Users - ADMIN
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

	/* Check all checkbox */
	$('#envo_delete_all_approve').click(function () {
		var checkedStatus = this.checked;
		if (checkedStatus) {
			$('#button_delete_approve').prop('disabled', false);
		} else {
			$('#button_delete_approve').attr('disabled', true);
		}
		$('.highlight_approve').each(function () {
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

	/* Disable submit button if checkbox is not checked */
	$('.highlight_approve').change(function () {
		if (this.checked) {
			$('#button_delete_approve').prop('disabled', false);
		} else {
			if ($('.highlight_approve').filter(':checked').length < 1) {
				$('#envo_delete_all_approve').prop('checked', false);
				$('#button_delete_approve').attr('disabled', true);
			}
		}
	});

});

/** DATETIMEPICKER
 * @require: DateTimePicker Plugin
 ========================================================================*/

$(function () {

	/* DateTimePicker
	 ========================================= */
	$('#datepicker').datetimepicker({
		// Language
		locale: envoWeb.envo_lang,
		// Date-Time format
		format: 'YYYY-MM-DD HH:mm:ss',
		// Icons
		icons: $.AdminEnvo.DateTimepicker.icons(),
		// Tooltips
		tooltips: $.AdminEnvo.DateTimepicker.tooltips(),
		// Show Button
		showTodayButton: true,
		showClear: true,
		// Other
		calendarWeeks: true,
		ignoreReadonly: true,
		keepInvalid: true,
		minDate: moment()
	});

});
