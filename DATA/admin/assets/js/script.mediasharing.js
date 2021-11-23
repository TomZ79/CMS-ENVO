/*
 * CMS ENVO
 * JS for Media Sharing - ADMIN
 * -----------------------------------------------------------------------
 * Author: Thomas Zukal
 * Email: tzukal@email.cz
 * Copyright (c) 2016 - 2022
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