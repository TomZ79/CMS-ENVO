/*
 * CMS ENVO
 * JS for Plugin Site Editor - ADMIN
 * Copyright (c) 2016 - 2019 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 */

/** READONLY TEXTAREA
 * @require: Without external plugin
 ========================================================================*/

$(function () {

	$("#editfile").click(function (event) {
		event.preventDefault();
		$('#envo_file').removeAttr("readonly");
		$('button[name="save"]').prop("disabled", false);
		$('button[name="reset"]').removeClass("hidden");
		$(this).addClass("hidden");

		var txt = $("#envo_file");
		var time = new Date();

		if (txt.val().indexOf('CMS Robots File' && 'Last change') != -1) { // Value in txt = true

			var lines = $('#envo_file').val().split(/\n/);
			lines[1] = "#Last change - " + time;
			$("#envo_file").html(lines.join("\n"));

		} else {

			txt.val("#CMS Robots File\n#Last change - " + time + "\n\n" + txt.val());

		}
	});

});
