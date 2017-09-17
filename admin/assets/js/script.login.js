/*
 * CMS ENVO
 * JS for Login - ADMIN
 * Copyright © 2016 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas
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
  $(".lost-pwd").click(function (event) {
    event.preventDefault();
    $(".loginF").slideToggle();
    $(".forgotP").toggleClass('hide');
  });

  $('#form-login').validate();
  $('#form-email').validate();

});