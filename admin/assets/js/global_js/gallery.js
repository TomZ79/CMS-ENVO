/* ============================================================
 * Gallery
 * Showcase your portfolio or even use it for an online store!
 * For DEMO purposes only. Extract what you need.
 * ============================================================ */

$(function () {


  /* DETAIL VIEW
   -------------------------------------------------------------*/

  /*
   Toggle detail view using DialogFx
   http://tympanus.net/Development/DialogEffects/
   */

  $('.dialog-open-img').click(openDialogImg);
  $('.dialog-open-video').click(openDialogVideo);

  $('.close').click(function(event){
    event.stopPropagation();
  });

});