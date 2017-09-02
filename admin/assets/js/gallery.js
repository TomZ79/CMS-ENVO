/* ============================================================
 * Gallery
 * Showcase your portfolio or even use it for an online store!
 * For DEMO purposes only. Extract what you need.
 * ============================================================ */

$(function () {

  /* GRID
   -------------------------------------------------------------*/

  /*  Apply Isotope plugin
   isotope.metafizzy.co
   */
  var $gallery = $('#gallery_envo');
  $gallery.isotope({
    itemSelector: 'div[class^="gallery-item-"]',
    masonry: {
      columnWidth: 280,
      gutter: 10,
      isFitWidth: true
    }
  });

  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    $gallery.isotope('layout');
  });

  /* DETAIL VIEW
   -------------------------------------------------------------*/

  /*
   Toggle detail view using DialogFx
   http://tympanus.net/Development/DialogEffects/
   */
  $('.dialog-open').click(function(){
    // Get Data-Dialog
    thisDataDialog = $(this).attr('data-dialog');
    // Copy outerHtml
    var parent = $(this).parents(":eq(3)").attr('id');
    var content = $('#' + parent + ' div.hidden div.content').html();
    $('#' + thisDataDialog + ' .dialog__overview').html(content);
    // Open DialogFX
    dialogEl = document.getElementById( thisDataDialog );
    dlg = new DialogFx( dialogEl );
    dlg.toggle(dlg);
  });

  $('.close').click(function(event){
    event.stopPropagation();
  });

});