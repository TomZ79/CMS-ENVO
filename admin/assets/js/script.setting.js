/*
 * CMS ENVO
 * JS for Settings - ADMIN
 * Copyright (c) 2016 - 2019 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 */


/** SHOW/HIDE BLOCK - SMTP SETTINGS
 * @require: Without external plugin
 ========================================================================*/

$(function () {

	$('input[name=envo_smpt]:radio').change(function () {
		if ($('input[name=envo_smpt]:checked').val() == "1") {
			$('#smtpsettings').show();

		} else if ($('input[name=envo_smpt]:checked').val() == "0") {
			$('#smtpsettings').hide();

		}
	});

});

/** AUTOGROW TEXT BLOCK
 * @require: AutoGrow Plugin
 ========================================================================*/

$(function () {

	$('.txtautogrow').autoGrow();

});