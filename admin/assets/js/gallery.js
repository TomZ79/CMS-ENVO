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

  $('a[href="#cmsPage8"]').on('shown.bs.tab', function (e) {
    $gallery.isotope('layout');
  });

  /* DETAIL VIEW
   -------------------------------------------------------------*/

  /*
   Toggle detail view using DialogFx
   http://tympanus.net/Development/DialogEffects/
   */

  $('.dialog-open').click(openDialog);

  $('.close').click(function(event){
    event.stopPropagation();
  });

});