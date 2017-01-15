$(document).ready(function () {

	$(".jak_plugins_move").sortable({
		placeholder: "ui-state-highlight",
		axis: 'y',
		revert: 250,
		tolerance: 'pointer',
		containment: 'document',
		forcePlaceholderSize: true,
		start: function (e, ui) {

			ui.placeholder.height(ui.item.height());
			ui.item.css('opacity', '0.6');
			ui.placeholder.css('background-color', '#CFF5F2');

		},
		update: function () {

			// The toArray method returns an array with the ids of the todos
			var arr = $(".jak_plugins_move").sortable('toArray');

			// Striping the todo- prefix of the ids:
			arr = $.map(arr, function (val, key) {
				return val.replace('plugin-', '');
			});

			// Saving with AJAX
			$.post('ajax/pluginorder.php', {id: 1, positions: arr},
				function (data) {
					if (data == 1) {
						$(".jakplugins").animate({backgroundColor: '#e7fdfb'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
						$.notify({icon: 'fa fa-check-square-o', message: 'Save OK'}, {type: 'success'});
					} else {
						$(".jakplugins").animate({backgroundColor: '#fccfcf'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
						$.notify({icon: 'fa fa-exclamation-triangle', message: 'Problem !!!'}, {type: 'danger'});
					}
				});
		},
		stop: function (e, ui) {
			/* Opera fix: */
			ui.item.css({'top': '0', 'left': '0'});
			ui.item.css('opacity', '1');
		}
	});
});