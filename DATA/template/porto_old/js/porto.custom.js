/*
 *
 * CMS ENVO - PORTO TEMPLATE
 * CSS with custom modification
 * -----------------------------------------------------------------------
 * Author: Thomas Zukal
 * Email: tzukal@email.cz
 * Copyright (c) 2016 - 2022
 * =======================================================================
 */

/*
 |--------------------------------------------------------------------------
 | AJAX - CONTACT FORM SIDEBAR for widget/widget-contact-sidebar.php
 |--------------------------------------------------------------------------
 */
(function ($) {

  'use strict';

  /*
   Contact Form: Sidebar
   */
  $('#contactFormSidebar').validate({
    invalidHandler: function (form, validator) {
      var errors = validator.numberOfInvalids();
      if (errors) {
        // var firstInvalidElement = $(validator.errorList[0].element);
        // $('html,body').scrollTop(firstInvalidElement.offset().top - 200);
        // firstInvalidElement.focus();
        $('html, body').animate({
          scrollTop: $(validator.errorList[0].element).offset().top - 150
        }, 500);
      }
    },
    submitHandler: function (form) {

      var $form = $(form),
        $messageSuccess = $('#contactSuccess'),
        $messageError = $('#contactError'),
        $submitButton = $(this.submitButton),
        $errorMessage = $('#mailErrorMessage');

      $submitButton.button('loading');

      // Ajax Submit
      $.ajax({
        type: 'POST',
        url: $form.attr('action'),
        data: {
          name: $form.find('#name').val(),
          email: $form.find('#email').val(),
          phone: $form.find('#phone').val(),
          message: $form.find('#message').val()
        }
      }).always(function (data, textStatus, jqXHR) {

        $errorMessage.empty().hide();

        $messageSuccess.removeClass('hidden');
        $messageError.addClass('hidden');

        // Reset Form
        $form.find('.form-control')
          .val('')
          .blur()
          .parent()
          .removeClass('has-success')
          .removeClass('has-error')
          .find('label.error')
          .remove();

        $submitButton.button('reset');

      });
    }
  });

}).apply(this, [jQuery]);

/*
 |--------------------------------------------------------------------------
 | FORM VALIDATION and AJAX CALL
 |--------------------------------------------------------------------------
 */

(function ($) {
  'use strict';

  /*
   Register Form - login.page
   */
  $('#registerForm').validate({
    onkeyup: false,
    onclick: false,
    rules: {
      username: {
        required: true
      },
      email: {
        required: true,
        email: true
      },
      'captcha': {
        captcha: true
      }
    },

    focusInvalid: false,
    invalidHandler: function (form, validator) {

      // March Height for Featured Boxes
      $('.featured-boxes .featured-box').matchHeight();

      if (!validator.numberOfInvalids())
        return;

      // Scroll animate to first error
      $('html, body').animate({
        scrollTop: $(validator.errorList[0].element).offset().top - 150
      }, 500);

    }

  });

}).apply(this, [jQuery]);

(function ($) {
  'use strict';

  /*
   Login Form - login.page
   */
  $('#loginForm').validate({
    rules: {
      loginusername: {
        required: true
      },
      loginpassword: {
        required: true
      }
    },

    focusInvalid: false,
    invalidHandler: function (form, validator) {

      // March Height for Featured Boxes
      $('.featured-boxes .featured-box').matchHeight();

      if (!validator.numberOfInvalids())
        return;

      // Scroll animate to first error
      $('html, body').animate({
        scrollTop: $(validator.errorList[0].element).offset().top - 150
      }, 500);

    }

  });

  /*
   Form Forget Password - login.page
   */
  $('#loginFormPassword').validate({
    rules: {
      jakE: {
        required: true,
        email: true
      }
    },

    focusInvalid: false,
    invalidHandler: function (form, validator) {

      if (!validator.numberOfInvalids())
        return;

      // Scroll animate to first error
      $('html, body').animate({
        scrollTop: $(validator.errorList[0].element).offset().top - 150
      }, 500);

    }

  });

}).apply(this, [jQuery]);

/*
 |--------------------------------------------------------------------------
 | NECESSARY CODE !!!
 | bootstrap3-showmanyslideonecarousel - v1.0.0 - 2015-03-27
 | https://github.com/rtpHarry/Bootstrap3-ShowManySlideOneCarousel
 |
 | Change the number of slides visible at any one time
 |  - https://github.com/rtpHarry/Bootstrap3-ShowManySlideOneCarousel/wiki/Change-the-number-of-slides-visible-at-any-one-time
 | About basic Bootstrap Carousel
 |  - https://getbootstrap.com/javascript/#carousel
 |--------------------------------------------------------------------------
 */
(function () {
  $('.carousel-showmanymoveone .item').each(function () {
    var itemToClone = $(this);

    for (var i = 1; i < 4; i++) {
      itemToClone = itemToClone.next();

      // wrap around if at end of item collection
      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }

      // grab item, clone, add marker class, add to collection
      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-" + (i))
        .appendTo($(this));
    }
  });

  // setup your carousels as you normally would using JS
  // or via data attributes according to the documentation
  // https://getbootstrap.com/javascript/#carousel
  $('#carouselDownload').carousel({
    interval: 5000
  })
}());


/*
 |--------------------------------------------------------------------------
 | NECESSARY CODE !!! - 'envoWeb' - definition
 |--------------------------------------------------------------------------
 */
(function () {
  envoWeb = {
    envo_lang: "",
    envo_url: "",
    envo_url_orig: "",
    request_uri: "",
    envo_search_link: "",
    envo_template: "",
    envo_quickedit: "",
    envo_jslang: "",
    envo_forgotlogin: ""
  }
})();

/*
 |--------------------------------------------------------------------------
 | NECESSARY CODE !!! - Quick edit
 |--------------------------------------------------------------------------
 */

$(function () {

  $('.quickedit').on('click', function (e) {
    e.preventDefault();
    frameSrc = $(this).attr("href");
    $('#ENVOModalLabel').html(envoWeb.envo_quickedit);
    $('#ENVOModal').on('show.bs.modal', function () {
      $('<iframe src="' + frameSrc + '" width="100%" height="450" frameborder="0">').appendTo('.modal-body');
    });
    $('#ENVOModal').on('hidden.bs.modal', function () {
      window.location.reload();
    });
    $('#ENVOModal').modal({show: true});
  });

});

/*
 |--------------------------------------------------------------------------
 | NECESSARY CODE !!! - Responsive sidebar menu - change icon on touch device
 |--------------------------------------------------------------------------
 */

(function () {
  "use strict";
  var toggles = document.querySelectorAll(".c-icons");

  for (var i = toggles.length - 1; i >= 0; i--) {
    var toggle = toggles[i];
    toggleHandler(toggle);
  }

  function toggleHandler(toggle) {
    toggle.addEventListener("click", function (e) {
      e.preventDefault();
      (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
    });
  }

})();

/*
 |--------------------------------------------------------------------------
 | NECESSARY CODE !!! - SEARCH
 |--------------------------------------------------------------------------
 */

$(function () {

  $('.searchIco a').on('click', function () {
    $('#search-inner').addClass('active-it');
    setTimeout(function () {
      $('input[name="envoSH"]').focus()
    }, 500);
  });

  $('#close').on('click', function () {
    $('#search-inner').removeClass('active-it');
  });

});


/*
 |--------------------------------------------------------------------------
 | NECESSARY CODE !!! - AJAX SEARCH
 |--------------------------------------------------------------------------
 */

(function ($) {

  $.fn.ajaxSearch = function (settings) {

    var defaultSettings = {
      apiURL: '',
      resultsDiv: $('#ajaxsearchR'),
      seo: '',
      searchid: '',
      msgtypeid: '',
      msg: 'No result were found',
      working: false,
      append: false
    }

    $('#ajaxsearchForm').submit(function () {

      /* Combining the default settings object with the supplied one */
      sett = $.extend(defaultSettings, settings);

      if (sett.working) return false;

      // Input id
      usrinput = $('#Jajaxs').val();

      sett.working = true;
      $('.loadSearchResult').fadeIn();

      // Get the result
      $.get(sett.apiURL, {
        q: usrinput,
        url: envoWeb.envo_url,
        url_detail: envoWeb.envo_search_link,
        seo: sett.seo,
        searchid: sett.searchid,
        msgtypeid: sett.msgtypeid
      }, function (r) {

        sett.working = false;
        $('.loadSearchResult').fadeOut();

        if (r.length) {

          // If results were returned, add them to a pageContainer div,
          // after which append them to the #resultsDiv:

          var pageContainer = $('<div>').addClass('ajaxspageContainer');


          pageContainer.append(r);

          if (!sett.append) {
            // This is executed when running a new search,
            // instead of clicking on the More button:
            sett.resultsDiv.empty();
          }

          pageContainer.append('<div class="clearfix"></div>').hide().appendTo(sett.resultsDiv).fadeIn('slow');

          $('.hideSearchResult').fadeIn();
          $('.hideAdvSearchResult').fadeOut();

        }
        // No result display the nothing found message
        else {

          $('.hideSearchResult').fadeOut();

          // No results were found for this search.

          sett.resultsDiv.empty();
          $('<div>', {html: sett.msg}).addClass('alert bg-danger').hide().appendTo(sett.resultsDiv).fadeIn();
        }
      });

      return false;

    });

    $('.hideSearchResult a').click(function (e) {
      e.preventDefault();
      defaultSettings.resultsDiv.empty();
      $('.hideSearchResult').fadeOut();
      $('.hideAdvSearchResult').fadeIn();
      $('#Jajaxs').val('');
    });
  };

})(jQuery);

/*
 |--------------------------------------------------------------------------
 | NECESSARY CODE !!! - ALPHANUMERIC, NUMERIC, ALPHA VALIDATION
 |--------------------------------------------------------------------------
 */

(function ($) {

  $.fn.alphanumeric = function (p) {

    p = $.extend({
      ichars: "öäüéàèô£†Ω°¡øπœ∑€®¢æ§¨!@#$%^&*()+=[]\\\';,/{}|:<>?~`. ",
      nchars: "",
      allow: ""
    }, p);

    return this.each
    (
      function () {

        if (p.nocaps) p.nchars += "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        if (p.allcaps) p.nchars += "abcdefghijklmnopqrstuvwxyz";

        s = p.allow.split('');
        for (i = 0; i < s.length; i++) if (p.ichars.indexOf(s[i]) != -1) s[i] = "\\" + s[i];
        p.allow = s.join('|');

        var reg = new RegExp(p.allow, 'gi');
        var ch = p.ichars + p.nchars;
        ch = ch.replace(reg, '');

        $(this).keypress
        (
          function (e) {

            if (!e.charCode) k = String.fromCharCode(e.which);
            else k = String.fromCharCode(e.charCode);

            if (ch.indexOf(k) != -1) e.preventDefault();
            if (e.ctrlKey && k == 'v') e.preventDefault();

          }
        );

        $(this).bind('contextmenu', function () {
          return false
        });

      }
    );

  };

  $.fn.numeric = function (p) {

    var az = "abcdefghijklmnopqrstuvwxyz";
    az += az.toUpperCase();

    p = $.extend({
      nchars: az
    }, p);

    return this.each(function () {
        $(this).alphanumeric(p);
      }
    );

  };

  $.fn.alpha = function (p) {

    var nm = "1234567890";

    p = $.extend({
      nchars: nm
    }, p);

    return this.each(function () {
        $(this).alphanumeric(p);
      }
    );

  };

})(jQuery);

