/*
 * CMS ENVO
 * JS - Pluginorder - ADMIN
 * Copyright (c) 2016 - 2017 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Sortable Initialisation
 *
 */

/** 01. Sortable Initialisation
 * @require: Bootstrap Notify
 ========================================================================*/

$(function () {

	$('.jak_plugins_move').sortable({
		// Jquery UI Sortable config
		// --------------------------

		// A class name that gets applied to the otherwise white space
		placeholder: "ui-state-highlight",
		// If defined, the items can be dragged only horizontally or vertically ( x,y )
		axis: 'y',
		// Whether the sortable items should revert to their new positions using a smooth animation
		revert: 250,
		// Specifies which mode to use for testing whether the item being moved is hovering over another item ( intersect, pointer )
		tolerance: 'pointer',
		// Defines a bounding box that the sortable items are constrained to while dragging
		containment: 'document',
		// Size of Placeholder ( true, false )
		forcePlaceholderSize: true,
		// This event is triggered when sorting starts
		start: function (e, ui) {

			ui.placeholder.height(ui.item.height());
			ui.item.css('opacity', '0.6');
			ui.placeholder.css('background-color', '#CFF5F2');

		},
		// This event is triggered when the user stopped sorting and the DOM position has changed
		update: function () {

			// The toArray method returns an array with the ids of the todos
			var arr = $(".jak_plugins_move").sortable('toArray');

			// Striping the todo- prefix of the ids:
			arr = $.map(arr, function (val, key) {
				return val.replace('plugin-', '');
			});

			// Saving with AJAX
			var request = $.ajax({
				url: "ajax/pluginorder.php",
				type: "POST",
				data: {
					id: 1,
					positions: arr
				},
				dataType: "json",
				cache: false
			});
			request.done(function (data) {

				console.log(data.status);

				if (data.status == 'success') {
					// IF DATA SUCCESS

					$('.jakplugins').animate({backgroundColor: '#C9FFC9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
					$.notify({icon: 'fa fa-check-square-o', message: data.status_msg}, {type: 'success'});

				} else {
					// IF DATA ERROR

					$('.jakplugins').animate({backgroundColor: '#FFC9C9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
					$.notify({icon: 'fa fa-exclamation-triangle', message: data.status_msg}, {type: 'danger'});

				}

			});

		},
		// This event is triggered when sorting has stopped
		stop: function (e, ui) {
			/* Opera fix: */
			ui.item.css({'top': '0', 'left': '0'});
			ui.item.css('opacity', '1');
		}
	});

});