/*
 * CMS ENVO
 * JS for Changelog - ADMIN
 * Copyright (c) 2016 - 2019 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 */

/** SCROLLSPY OFFSET
 * @require: ???
 ========================================================================*/

$(function () {

	/* Resize sidebar on scroll
	 ========================================= */

	// Resize detached sidebar vertically when bottom reached
	function resizeDetached () {
		$(window).on('load scroll', function () {
			if ($(window).scrollTop() > $(document).height() - $(window).height() - 40) {
				$('.sidebar-scroll').addClass('fixed-sidebar-space');
			}
			else {
				$('.sidebar-scroll').removeClass('fixed-sidebar-space');
			}
		});
	}

	/* Affix detached sidebar
	 ========================================= */
	// Init nicescroll when sidebar affixed
	$('.sidebar-scroll').on('affix.bs.affix', function () {
		resizeDetached();
	});
	// Attach BS affix component to the sidebar
	$('.sidebar-scroll').affix({
		offset: {
			top: $('.sidebar-scroll').offset().top - 60 // top offset - computed line height
		}
	});
	// Remove affix and scrollbar on mobile
	$(window).on('resize', function () {
		setTimeout(function () {
			if ($(window).width() <= 768) {
				// Remove affix on mobile
				$(window).off('.affix');
				$('.sidebar-scroll').removeData('affix').removeClass('affix affix-top affix-bottom');
			}
		}, 100);
	}).resize();

});