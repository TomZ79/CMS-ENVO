/*
 *
 * CMS ENVO
 * JS for Plugin Intranet - Frontend
 * Copyright © 2016 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Isotope photo gallery
 *
 */

/* 01. ISOTOPE PHOTO GALLERY
 ========================================================================*/
$(function () {

  /* GRID
   -------------------------------------------------------------*/

  /* Apply Isotope plugin - isotope.metafizzy.co
   ========================================= */

  // Quick search regex
  var qsRegex;
  var filters;

  // Init Isotope
  var $gallery = $('#gallery');
  $gallery.isotope({
    itemSelector: 'div[class^="gallery-item-"]',
    masonry: {
      columnWidth: 220,
      gutter: 10,         // The horizontal space between item elements
      isFitWidth: true
    },
    filter: function () {
      var $this = $(this);
      var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
      var buttonResult = filters ? $this.is(filters) : true;
      return searchResult && buttonResult;
    }

  });

  $('.filters').on('click', '.filter', function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    var $this = $(this);
    // set filter for group
    filters = $(this).attr('data-filter');
    $gallery.isotope();
  });

  // Use value of search field to filter
  var $quicksearch = $('#quicksearch').keyup(debounce(function () {
    qsRegex = new RegExp($quicksearch.val(), 'gi');
    $gallery.isotope();
  }));


  // Change is-checked class on buttons
  $('.filter').on('click', function () {
    $('.filters').find('.active').removeClass('active');
    $(this).addClass('active');
  });


  // Debounce so filtering doesn't happen every millisecond
  function debounce(fn, threshold) {
    var timeout;
    return function debounced() {
      if (timeout) {
        clearTimeout(timeout);
      }
      function delayed() {
        fn();
        timeout = null;
      }

      setTimeout(delayed, threshold || 100);
    };
  }

  $('a[href="#tabs7"]').on('shown.bs.tab', function (e) {
    $gallery.isotope('layout');
  });

});