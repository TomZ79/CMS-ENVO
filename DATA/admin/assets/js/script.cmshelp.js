/*
 * CMS ENVO
 * JS for Help - ADMIN
 * -----------------------------------------------------------------------
 * Author: Thomas Zukal
 * Email: tzukal@email.cz
 * Copyright (c) 2016 - 2022
 * =======================================================================
 */


/** SEARCH ICONS
 * @require: Without external plugin
 ========================================================================*/

$(function () {

	$('#filter').keyup(function () {

		// Retrieve the input field text and reset the count to zero
		var filter = $(this).val(), count = 0;

		// Loop through the comment list
		$('#pgicons li').each(function () {

			// If the list item does not contain the text phrase fade it out
			if ($(this).text().search(new RegExp(filter, "i")) < 0) {
				$(this).hide();

				// Show the list item if the phrase matches and increase the count by 1
			} else {
				$(this).show();
				count++;
			}
		});

		// Update the count
		var numberItems = count;
		if (filter == '') {
			$('#filter-count').text('');
		} else {
			$('#filter-count').text("Počet vyhledaných ikon : " + count);
		}
	});

});