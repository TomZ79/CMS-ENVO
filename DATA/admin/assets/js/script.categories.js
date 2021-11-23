/*
 * CMS ENVO
 * JS for Categories - ADMIN
 * Copyright (c) 2016 - 2022 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 */

/** BOOTSTRAP ICON PICKER
 * @require: Icon Picker Plugin
 ========================================================================*/

$(function () {

	$('.iconpicker').iconpicker({
		arrowClass: 'btn-info',
		icon: iconPicker.icon,
		iconset: 'fontawesome',
		searchText: iconPicker.searchText,
		labelFooter: iconPicker.labelFooter,
		arrowPrevIconClass: 'fa fa-chevron-left',
		arrowNextIconClass: 'fa fa-chevron-right',
		selectedClass: 'btn-success',
		unselectedClass: '',
		rows: 5,
		cols: 8
	});

	$('.iconpicker').on('change', function (e) {
		$("#envo_img").val('fa ' + e.icon);
	});

	$('.iconpicker1').iconpicker({
		arrowClass: 'btn-info',
		icon: iconPicker.icon,
		iconset: 'glyphicons',
		searchText: iconPicker.searchText,
		labelFooter: iconPicker.labelFooter,
		arrowPrevIconClass: 'fa fa-chevron-left',
		arrowNextIconClass: 'fa fa-chevron-right',
		selectedClass: 'btn-success',
		unselectedClass: '',
		rows: 5,
		cols: 8
	});

	$('.iconpicker1').on('change', function (e) {
		$("#envo_img").val('glyphicons ' + e.icon);
	});

});

/** SLUG
 * @require: Slug Plugin
 ========================================================================*/

$(function () {

	$('#envo_name').keyup(function () {
		// Checked, copy values
		$('#envo_varname').val(envoSlug($('#envo_name').val()));
	});

});

/** COPY DESCRIPTION
 * @require: Without external plugin
 ========================================================================*/

$(function () {

	$('#copy1').click(function () {
		$('#envo_editor_light_meta_desc').val($('#content').val());
	});

});