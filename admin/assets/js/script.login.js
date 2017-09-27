/*
 * CMS ENVO
 * JS for Login - ADMIN
 * Copyright (c) 2016 - 2017 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 */

/** 00. XXXX
 ========================================================================*/

$(function () {

  $('body').addClass('overflow-hidden');

  // Switch buttons from "Log In" to "Forget password"
  $('.lost-pwd').click(function (event) {
    event.preventDefault();
    $('.loginF').slideToggle();
    $('.forgotP').toggleClass('hide');
  });

  $('#form-login').validate();
  $('#form-email').validate();

});