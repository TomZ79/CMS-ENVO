/*
 * CMS ENVO
 * JS for Login - ADMIN
 * -----------------------------------------------------------------------
 * Author: Thomas Zukal
 * Email: tzukal@email.cz
 * Copyright (c) 2016 - 2022
 * =======================================================================
 */

/** 00. XXXX
 * @require: Without external plugin
 ========================================================================*/

$(function () {

	$('body').addClass('overflow-hidden');

	// Switch buttons from "Log In" to "Forget password"
	$('.lost-pwd').click(function (event) {
		event.preventDefault();
		$('.loginF').slideToggle();
		$('.forgotP').toggleClass('hide');
	});

	$('#form-login').validate();
	$('#form-email').validate();

});