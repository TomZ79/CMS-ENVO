/*
 * CMS ENVO
 * JS for Help - ADMIN
 * Copyright © 2016 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Scrollspy offset
 * 02. Search icons
 *
 */

/** 01. Scrollspy offset
 ========================================================================*/

$(function () {

  $('body').scrollspy({
    target: '#myScrollspy',
    offset: 70
  });

  // Spy and scroll menu boogey - animate
  $("#myScrollspy ul li a[href^='#']").on('click', function (e) {
    // prevent default anchor click behavior
    e.preventDefault();
    // store hash
    var hash = this.hash;
    // animate
    $('html, body').animate({
      scrollTop: $(this.hash).offset().top
    }, 400, function () {
      window.location.hash = hash
    })
  })

});

/** 02. Search icons
 ========================================================================*/

$(function () {

  $('#filter').keyup(function(){

    // Retrieve the input field text and reset the count to zero
    var filter = $(this).val(), count = 0;

    // Loop through the comment list
    $('#pgicons li').each(function(){

      // If the list item does not contain the text phrase fade it out
      if ($(this).text().search(new RegExp(filter, "i")) < 0) {
        $(this).hide();

        // Show the list item if the phrase matches and increase the count by 1
      } else {
        $(this).show();
        count++;
      }
    });

    // Update the count
    var numberItems = count;
    if (filter == '')  {
      $("#filter-count").text('');
    } else {
      $("#filter-count").text("Počet vyhledaných ikon : " + count);
    }
  });

});