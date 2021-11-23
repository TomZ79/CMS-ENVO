/*
 * CMS ENVO
 * JS - Pluginorder - ADMIN
 * Copyright (c) 2016 - 2022 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 */

$(function () {
	/* The following code is executed once the DOM is loaded */

	$('.todoList').sortable({
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
			var arr = $(".todoList").sortable('toArray');


			// Striping the todo- prefix of the ids:

			arr = $.map(arr, function (val, key) {
				return val.replace('todo-', '');
			});

			// Saving with AJAX
			$.get('ajax/todo.php', {action: 'rearrange', positions: arr},
				function (data) {
					if (data == 1) {
						$(".todo").animate({backgroundColor: '#C9FFC9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
					} else {
						$(".todo").animate({backgroundColor: '#FFC9C9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
					}
				});
		},
		stop: function (e, ui) {
			/* Opera fix: */
			ui.item.css({'top': '0', 'left': '0'});
			ui.item.css('opacity', '1');
		}
	});

	// A global variable, holding a jQuery object 
	// containing the current todo item:

	var currentTODO;

	// When a double click occurs, just simulate a click on the edit button:
	$(document).on('dblclick', '.todo', function () {
		$(this).find('a.edit').click();
	});

	// If any link in the todo is clicked, assign
	// the todo item to the currentTODO variable for later use.
	$(document).on('click', '.todo a', function (e) {

		currentTODO = $(this).closest('.todo');
		currentTODO.data('id', currentTODO.attr('id').replace('todo-', ''));

		e.preventDefault();
	});

	// Listening for a click on a delete button:
	$(document).on('click', '.todo a.delete', function () {

		$.get("ajax/todo.php", {"action": "delete", "id": currentTODO.data('id')}, function (msg) {
			currentTODO.fadeOut('fast');
		})

	});

	// Listening for a click on a done button:
	$(document).on('click', '.todo a.done, .todo a.notdone', function () {

		var doneLink = $(this);
		var textEl = '#' + currentTODO.attr('id') + ' div.text';

		$.get("ajax/todo.php", {"action": "done", "id": currentTODO.data('id')}, function (msg) {

			if (doneLink.hasClass("notdone")) {
				doneLink.removeClass("notdone").addClass("done");
				$(textEl).css({
					'text-decoration': 'line-through',
					'color': '#CCC'
				});

				console.log($(textEl).html());
			} else {
				doneLink.removeClass("done").addClass("notdone");
				$(textEl).css({
					'text-decoration': 'none',
					'color': '#626262'
				});
			}
		})

	});

	// Listening for a click on a edit button
	$(document).on('click', '.todo a.edit', function () {

		var container = currentTODO.find('.text');

		if (!currentTODO.data('origText')) {
			// Saving the current value of the ToDo so we can
			// restore it later if the user discards the changes:

			currentTODO.data('origText', container.text());
		}
		else {
			// This will block the edit button if the edit box is already open:
			return false;
		}

		$('<input type="text" class="form-control ip_xs">').val(container.text()).appendTo(container.empty());

		// Appending the save and cancel links:
		container.append(
			'<div class="editTodo">' +
			'<a class="saveChanges" href="#">Save</a> or <a class="discardChanges" href="#">Cancel</a>' +
			'</div>'
		);

	});

	// The cancel edit link:
	$(document).on('click', '.todo a.discardChanges', function () {
		currentTODO.find('.text')
			.text(currentTODO.data('origText'))
			.end()
			.removeData('origText');
	});

	// The save changes link:
	$(document).on('click', '.todo a.saveChanges', function () {
		var text = currentTODO.find("input[type=text]").val();

		$.get("ajax/todo.php", {'action': 'edit', 'id': currentTODO.data('id'), 'text': text});

		currentTODO.removeData('origText')
			.find(".text")
			.text(text);
	});


	// The Add New ToDo button:
	var timestamp = 0;
	$('#addTodo').click(function (e) {

		// Only one todo per 5 seconds is allowed:
		if ((new Date()).getTime() - timestamp < 5000) return false;

		$.get("ajax/todo.php", {
			'action': 'new',
			'text': 'New Todo Item. Doubleclick to Edit.',
			'rand': Math.random()
		}, function (msg) {

			// Appending the new todo and fading it into view:
			$(msg).hide().appendTo('.todoList').fadeIn();
		});

		// Updating the timestamp:
		timestamp = (new Date()).getTime();

		// Countdown - 5 seconds
		$(this).timedDisable(5);

		e.preventDefault();
	});

});