/*
 * CMS ENVO
 * JS for Search Log - ADMIN
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