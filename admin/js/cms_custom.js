/*
 *
 * BLUESAT.CZ
 * Extra Custom JS for Admin Control Panel with custom modification
 * Copyright © 2016 Bluesat.cz
 *
 * -----------------------------------------------------------------------
 * Author: Almsaeed Studio
 * Website: Almsaeed Studio <http://almsaeedstudio.com>
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Written by: Bluesat.cz - (http://www.bluesat.cz)
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 *
 */

/* 01. MODIFICATION - INIT and CONFIG BOOTSTRAP TAGSINPUT PLUGIN
 ========================================================================*/
$(function() {
  // Add value from Bootstrap Select to Bootstrap TagsInput
  $('#selecttags1').on('changed.bs.select', function (e) {
    $("input[name='jak_tags']").tagsinput('add', $(this).val());
  });
  $('#selecttags2').on('changed.bs.select', function (e) {
    $("input[name='jak_tags']").tagsinput('add', $(this).val());
  });
  // Init Booststrap TagsInput
  $("input[name='jak_tags'].tags").tagsinput('items')
});

/* 01. MODIFICATION - SHOW/HIDE Help for each page
 ========================================================================*/
$(function() {
  if( $('.control-sidebar').length ) {
    $('#control-sb').removeClass('hidden');
  }
});
