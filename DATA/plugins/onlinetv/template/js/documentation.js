$(function ($) {

  'use strict';

  /* ----------------------------------------------------------- */
  /*  Breaking news slider
  /* ----------------------------------------------------------- */
  if ($('#breaking_slider2').length > 0) {
    $('#breaking_slider2').slick({
      speed: 10000,
      autoplay: true,
      autoplaySpeed: 0,
      centerMode: true,
      cssEase: 'linear',
      slidesToShow: 1,
      slidesToScroll: 1,
      variableWidth: true,
      infinite: true,
      initialSlide: 1,
      arrows: false,
      buttons: false
    });
  }

  if ($('#breaking_slider3').length > 0) {
    $('#breaking_slider3').slick({
      speed: 10000,
      autoplay: true,
      autoplaySpeed: 0,
      centerMode: true,
      cssEase: 'linear',
      slidesToShow: 1,
      slidesToScroll: 1,
      variableWidth: true,
      infinite: true,
      initialSlide: 1,
      arrows: false,
      buttons: false
    });
  }


});