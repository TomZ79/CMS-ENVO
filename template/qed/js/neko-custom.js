/*
 |--------------------------------------------------------------------------
 | Other function
 |--------------------------------------------------------------------------
 */

$(function () {
  $("#LoginModal").FSNav({
    animation: "none"
  });

  $("#login").click(function (e) {
    e.preventDefault();
    $("#LoginModal").data("FSNav").showNav();
  });


  $("#full-screen-search").FSNav({
    animation: "none"
  });

  $("#show-nav").click(function (e) {
    e.preventDefault();
    $("#full-screen-search").data("FSNav").showNav();
    $('#Jajaxs2').focus();
  });

});

/*
 |--------------------------------------------------------------------------
 | Responsive sidebar menu - change icon on touch device
 |--------------------------------------------------------------------------
 */

(function() {
  "use strict";
  var toggles = document.querySelectorAll(".c-icons");

  for (var i = toggles.length - 1; i >= 0; i--) {
    var toggle = toggles[i];
    toggleHandler(toggle);
  };

  function toggleHandler(toggle) {
    toggle.addEventListener( "click", function(e) {
      e.preventDefault();
      (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
    });
  }

})();

/*
 |--------------------------------------------------------------------------
 | Responsive footer list - change icon on touch device
 |--------------------------------------------------------------------------
 */

(function() {
  $('.footer-links-holder h3').click(function () {
    $(this).parent().toggleClass('active');
  });
})();

/*
 |--------------------------------------------------------------------------
 | 'jakWeb' - definition
 |--------------------------------------------------------------------------
 */
(function () {
  jakWeb = {
    jak_lang: "",
    jak_url: "",
    jak_url_orig: "",
    request_uri: "",
    jak_search_link: "",
    envo_template: "",
    jak_quickedit: "",
    jak_acp_nav: false
  }
})();


/*
 |--------------------------------------------------------------------------
 | POPUP WINDOW - SHARE SOCIAL MEDIA
 |--------------------------------------------------------------------------
 */
$(function () {
  $('.pop a:not(.email)').click(function () {
    window.open($(this).attr('href'), 't', 'toolbar=0,resizable=1,status=0,width=640,height=528');
    return false
  })
});

/*
 |--------------------------------------------------------------------------
 | POPUP WINDOW - Bootstrap modal dialog
 |--------------------------------------------------------------------------
 */
$(function () {
  $(".jaktip").tooltip();

  $('.quickedit').on('click', function (e) {
    e.preventDefault();
    frameSrc = $(this).attr("href");
    $('#JAKModalLabel').html(jakWeb.jak_quickedit);
    $('#JAKModal').on('show.bs.modal', function () {
      $('<iframe src="' + frameSrc + '" width="100%" height="450" frameborder="0">').appendTo('.modal-body');
    });
    $('#JAKModal').on('hidden.bs.modal', function () {
      window.location.reload();
    });
    $('#JAKModal').modal({show: true});
  });

  $('.commedit').on('click', function (e) {
    e.preventDefault();
    frameSrc = $(this).attr("href");
    $('#JAKModalLabel').html(jakWeb.jak_quickedit);
    $('#JAKModal').on('show.bs.modal', function () {
      $('<iframe src="' + frameSrc + '" width="100%" height="400" frameborder="0">').appendTo('.modal-body');
    });
    $('#JAKModal').on('hidden.bs.modal', function () {
      window.location.reload();
    });
    $('#JAKModal').modal({show: true});
  });

});

/*
 |--------------------------------------------------------------------------
 | TIPS
 |--------------------------------------------------------------------------
 */

if ($('.category-label').length) $('.category-label').tooltip({placement: 'auto'});
if ($('.tag-cloud a').length) $('.tag-cloud a').tooltip({placement: 'auto'});

/*
 |--------------------------------------------------------------------------
 | AJAX SEARCH
 |--------------------------------------------------------------------------
 */

// Ajax Search
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
        url: jakWeb.jak_url,
        url_detail: jakWeb.jak_search_link,
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
 | ALPHANUMERIC, NUMERIC, ALPHA VALIDATION
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
