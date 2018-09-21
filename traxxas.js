/*
 * JS for Traxxas
 * Copyright (c) 2018 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 *
 */

/** 00. Add image to main page
 ========================================================================*/
$(function () {
  var url = window.location.pathname;
  var url = url.substring(1);

  console.log('Parse url: ' + url);

  // Quick and dirty will be true for '', null, undefined, 0, NaN and false.
  if (!url) {
    $('.content').prepend('<div class="banner1"></div>');
    $('.banner1').prepend($('<img>', {id: 'img1', src: 'https://1649.shopmaker.cz/local/docs/8-traxxas-04.jpg'}))
    $('#img1').css({
      'width': '100%',
      'height': 'auto',
      'margin-bottom': '20px'
    });
  }
});

/** 00. Add div block before footer
 ========================================================================*/
$(function () {
  $('.wrap-footer').prepend('<div class="footer-b"></div>');
  $('.footer-b').prepend('<div class="footer-widget"></div>');
  $('.footer-widget').prepend('<h3>Vše o Traxxas autech (manuály, návody, videa, parametry) na webu rc-traxxas.cz</h3>');
});