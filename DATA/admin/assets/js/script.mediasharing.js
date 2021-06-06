/*
 * CMS ENVO
 * JS for Media Sharing - ADMIN
 * Copyright (c) 2016 - 2019 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 */

/** INITIALISATION OF SOLLIST
 * @require: Sollist Plugin
 ========================================================================*/

$(function () {

	$('#sollist-sharing').sollist({
		pixelsBetweenItems: sollist.pixels,
		size: sollist.size,
		theme: sollist.theme,
		hoverEffect: sollist.hoverEffect,
		profiles: {
			facebook: '',
			googleplus: '',
			instagram: '',
			twitter: '',
			youtube: '',
			vimeo: '',
			email: ''
		}
	});

});