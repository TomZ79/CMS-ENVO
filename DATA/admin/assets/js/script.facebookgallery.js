/*
 * CMS ENVO
 * JS for Facebook Gallery - ADMIN
 * Copyright (c) 2016 - 2019 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 */

/** INITIALISATION FILEINPUT
 * @require: FileInput Plugin
 ========================================================================*/

$(function () {

	if ($('#images').length) {
		$('#images').fileinput({
			theme: 'fa',
			language: 'cz',
			maxFileSize: 4500,
			allowedFileExtensions: ['jpg', 'png', 'gif'],
			uploadAsync: false,
			uploadUrl: "ajax/uploadfacebook.php", // your upload server url
			maxFileCount: 3,
			layoutTemplates: {
				main1: '{preview}\n' +
				'<div class="input-group {class}">\n' +
				'   <div class="input-group-btn">\n' +
				'       {browse}\n' +
				'       {upload}\n' +
				'       {remove}\n' +
				'   </div>\n' +
				'   {caption}\n' +
				'</div>',
				actions: '<div class="file-actions">\n' +
				'    <div class="file-footer-buttons">\n' +
				'        {upload} {delete} {zoom} {other}' +
				'    </div>\n' +
				'    {drag}\n' +
				'    <div class="file-upload-indicator" title="{indicatorTitle}">{indicator}</div>\n' +
				'    <div class="clearfix"></div>\n' +
				'</div>'
			}
		});
	}

});


/** TOGGLE LIST AND GRID VIEW
 * @require: without external plugin
 ========================================================================*/

$(function () {

	$('.btn-toggle').click(function () {
		$('.toggle').toggleClass('hidden visible');
		$('.btn-toggle i').toggleClass("fa-th-list fa-th");
	});

});