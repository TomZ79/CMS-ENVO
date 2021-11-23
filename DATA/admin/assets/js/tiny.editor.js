/*
 * CMS ENVO
 * JS for Tiny Editor - ADMIN
 * -----------------------------------------------------------------------
 * Author: Thomas Zukal
 * Email: tzukal@email.cz
 * Copyright (c) 2016 - 2022
 * =======================================================================
 */

/** TINYEDITOR - CONFIG
 * @require: Tiny MCE Plugin
 ========================================================================*/

$(function () {

	tinymce.init({
		selector: "textarea.envoEditorLight, textarea.envoEditorLight2, textarea.envoEditorLight3",
		theme: "silver",
		width: "100%",
		height: 200,
		language: envoWeb.envo_lang,
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste responsivefilemanager"
		],
		toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code | clientcode",
		content_css: "<?=$customCSS?>",
		statusbar: false,
		menubar: false,
		relative_urls: false,
		remove_script_host: true,
		document_base_url: "/",
		valid_elements: "*[*]",
		external_filemanager_path: "../assets/plugins/tinymce/5.3.1/plugins/filemanager/",
		filemanager_title: "Filemanager",
		external_plugins: {"filemanager": "5.3.1/plugins/filemanager/plugin.min.js"}
	});

});

/** TINYEDITOR - CONFIG
 * @require: Tiny MCE Plugin
 ========================================================================*/

$(function () {

	tinymce.init({
		selector: "textarea.envoEditor, textarea.envoEditor2, textarea.envoEditor3",
		theme: "silver",
		width: "100%",
		height: 500,
		language: envoWeb.envo_lang,
		plugins: [
			"advlist autolink link image lists charmap preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"save table contextmenu directionality emoticons paste responsivefilemanager clientcode"
		],
		content_css: "<?=$customCSS?>",
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image | preview media fullpage | forecolor backcolor emoticons | clientcode",
		statusbar: false,
		image_advtab: true,
		relative_urls: false,
		remove_script_host: true,
		document_base_url: "/",
		valid_elements: "*[*]",
		external_filemanager_path: "../assets/plugins/tinymce/5.3.1/plugins/filemanager/",
		filemanager_title: "Filemanager",
		external_plugins: {"filemanager": "5.3.1/plugins/filemanager/plugin.min.js"}
	});

});

/** TINYEDITOR - CONFIG
 * @require: Tiny MCE Plugin
 ========================================================================*/

$(function () {

	tinymce.init({
		selector: "textarea.envoEditorF, textarea.envoEditorF2, textarea.envoEditorF3",
		theme: "silver",
		width: "100%",
		height: 500,
		language: envoWeb.envo_lang,
		plugins: [
			"advlist autolink link image lists charmap preview hr anchor pagebreak fullpage",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"save table contextmenu directionality emoticons paste responsivefilemanager clientcode"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image | preview media fullpage | forecolor backcolor emoticons | clientcode fullpage",
		statusbar: false,
		image_advtab: true,
		relative_urls: false,
		convert_urls: false,
		remove_script_host: true,
		document_base_url: "/",
		valid_elements: "*[*]",
		external_filemanager_path: "../assets/plugins/tinymce/5.3.1/plugins/filemanager/",
		filemanager_title: "Filemanager",
		external_plugins: {"filemanager": "5.3.1/plugins/filemanager/plugin.min.js"}
	});

});