/*
 * CMS ENVO
 * JS for PLUGIN Online TV - ADMIN
 * Copyright (c) 2016 - 2019 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 */

/** INIT TinyMCE
 *  @require: TinyMCE Plugin
 ========================================================================*/
function initializeTinyMce (selector, height) {
  if (selector == undefined) {
    selector = 'textarea';
  }

  if ($(selector).length) {
    tinymce.init({
      selector: selector,
      theme: "silver",
      width: "100%",
      height: height,
      language: envoWeb.envo_lang,
      content_style: ".mce-content-body {font-size:12px;}",
      //UTF-8 Setting
      entity_encoding: "raw",
      // Plugins
      plugins: [
        "advlist autolink link charmap hr insertdatetime responsivefilemanager",
        "searchreplace visualblocks paste",
        "table"
      ],
      // Default settings after init
      paste_as_text: true,
      // Header Menubar
      menubar: "edit insert view format table",
      // Header Toolbar
      toolbar: "undo redo | bold italic | alignleft aligncenter alignjustify | bullist numlist | forecolor backcolor",
      // Footer Statusbar
      statusbar: false,
      // Valid Elements
      valid_elements: "*[*]",
      // Custom date time formats
      insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%d.%m.%Y", "%I:%M:%S %p", "%D"],
      // Responsive Filemanager
      external_filemanager_path: "/assets/plugins/tinymce/5.3.1/plugins/filemanager/",
      filemanager_title: "Filemanager",
      external_plugins: {
        "filemanager": "5.3.1/plugins/filemanager/plugin.min.js"
      }
    });
  }

}

initializeTinyMce('textarea.envoEditorSmall', '200');

/** INIT and CONFIG BOOTSTRAP TAGSINPUT PLUGIN
 *  @require: Bootstrap Tagsinput Plugin
 ========================================================================*/

$(function () {

  'use strict';

  /* Init Booststrap TagsInput for metakey in ACP
   * confirm key code
   * 13 - enter
   * 44 - comma ' , '
   * 32 - space bar
   *
   */
  $('input[name="envo_filmdirection"], input[name="envo_filmtemplate"], input[name="envo_filmscreenplay"], input[name="envo_filmactors"]').tagsinput({
    confirmKeys: [13, 44]
  });

});

/** NAME OF FUNCTION
 ========================================================================*/

$(function () {

  'use strict';

});