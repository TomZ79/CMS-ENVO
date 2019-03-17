/*
 * CMS ENVO
 * JS for Plugin XML Seo - ADMIN
 * Copyright (c) 2016 - 2019 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 */

/** FORM WIZARD INITIALISATION
 * @require: Step Form Wizard plugin
 ========================================================================*/

$(function () {

	$("#wizard_example").stepFormWizard({
		height: 'auto',
		nextBtn: $('<a class="next-btn sf-right sf-btn" href="#">' + stepForm.nextBtn + '</a>'),
		prevBtn: $('<a class="prev-btn sf-left sf-btn" href="#">' + stepForm.prevBtn + '</a>'),
		finishBtn: $('<a class="finish-btn sf-right sf-btn" href="#">' + stepForm.finishBtn + '</a>'),
		onNext: function (i) {
			// Step 0 -> 1
			if (i == '0') {
				// Get folder path
				var baseurl = envoWeb.envo_url_orig;

				if ($("input[name='envo_xmlseopath']").val()) {
					var inputval = $("input[name='envo_xmlseopath']").val() + '/';
				} else {
					var inputval = '';
				}

				var sitemap = 'Sitemap: ' + baseurl.slice(0, -1) + '/' + inputval + 'sitemap.xml';
				$('#sitemapcode').text(sitemap);

				// Change date in file
				var txt = $("#envo_filetxt");
				var time = new Date();

				if (txt.val().indexOf('CMS Robots File' && 'Last change') != -1) { // Value in txt = true

					var lines = $('#envo_filetxt').val().split(/\n/);
					lines[1] = "#Last change - " + time;
					$("#envo_filetxt").html(lines.join("\n"));

				} else {

					txt.val("#CMS Robots File\n#Last change - " + time + "\n\n" + txt.val());

				}
			}

			return true; // move to next step
		}
	});

});