/*
 *
 * CMS ENVO - CARZONE TEMPLATE
 * CSS with custom modification
 * Copyright © 2018  Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 */


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
 | TEMPLATE CARZONE COODE
 |--------------------------------------------------------------------------
 */

/* 'carzoneJs' definition */
(function () {
  carzoneJs = {
    logo1: "",
    logo2: ""
  }
})();

/**
 Core script to handle the entire theme and core functions
 **/
var CarDealer = function(){
  /* Search Bar ============ */
  siteUrl = 'http://localhost/project/cardealer/xhtml/';

  var homeSearch = function() {
    'use strict';
    /* top search in header on click function */
    var quikSearch = jQuery("#quik-search-btn");
    var quikSearchRemove = jQuery("#quik-search-remove");

    quikSearch.on('click',function() {

      jQuery('.dlab-quik-search').fadeIn(500);
      jQuery('.dlab-quik-search').addClass('On');

      //jQuery('.dlab-quik-search').animate({'width': '100%' });
      //jQuery('.dlab-quik-search').delay(500).css({'left': '0'  });
    });

    quikSearchRemove.on('click',function() {
      jQuery('.dlab-quik-search').fadeOut(500);
      jQuery('.dlab-quik-search').removeClass('On');

      //jQuery('.dlab-quik-search').animate({'width': '0%' ,  'right': '0'  });
      //jQuery('.dlab-quik-search').css({'left': 'auto'  });
    });
    /* top search in header on click function End*/
  }

  var cartButton = function(){
    $(".item-close").on('click',function(){
      $(this).closest(".cart-item").hide('500');
    });
    $('.cart-btn').on('click',function(){
      $(".cart-list").slideToggle('slow');
    })
    //$('.cart-btn').toggle(500,easing);
  }


  /* One Page Layout ============ */
  var onePageLayout = function() {
    'use strict';
    var headerHeight =   parseInt($('.onepage').css('height'), 10);
    $(".scroll").on('click',function(event)
    {
      event.preventDefault();

      if (this.hash !== "") {
        var hash = this.hash;
        var seactionPosition = $(hash).offset().top;
        var headerHeight =   parseInt($('.onepage').css('height'), 10);
        //alert(headerHeight);

        $('body').scrollspy({target: ".navbar", offset: headerHeight+2});

        var scrollTopPosition = seactionPosition - (headerHeight);

        $('html, body').animate({
          scrollTop: scrollTopPosition
        }, 800, function(){
          //window.location.hash = hash;
        });
      }
    });
    $('body').scrollspy({target: ".navbar", offset: headerHeight + 2});
  }

  /* Vertical Navigation Widget menu for Categories ============ */
  var verticalNav = function() {
    'use strict';
    $('.sub-menu ul').hide();
    $(".sub-menu a").click(function () {
      $(this).parent(".sub-menu").toggleClass("active");
      $(this).parent(".sub-menu").children("ul").slideToggle("100");
      $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
    });
  }

  /* Header Height ============ */
  var handelResizeElement = function(){
    var HeaderHeight = $('.header').height();
    $('.header').css('height', HeaderHeight);
  }

  /* Load File ============ */
  var dzTheme = function(){
    'use strict';
    var loadingImage = '<img src="/template/"' + envoWeb.envo_template + '"/img/loading.gif">';
    jQuery('.dzload').each(function(){
      var dzsrc =   siteUrl + $(this).attr('dzsrc');
      //jQuery(this).html(loadingImage);
      jQuery(this).hide(function(){
        jQuery(this).on('load',dzsrc, function(){
          jQuery(this).fadeIn('slow');
        });
      })

    });


    /* Search Area */
    if($('#searchable-area').length)
    {
      $('#searchable-area' ).searchable({
        searchField: '#container-search',
        selector: '.search-content',
        childSelector: '.search-content-area',
        show: function( elem ) {
          elem.slideDown(100);
        },
        hide: function( elem ) {
          elem.slideUp( 100 );
        }
      })
    }
    /* Search Area End */

    /* Car Search City Box */
    if($('#da-thumbs .item .city-box').length)
    {
      $('#da-thumbs .item .city-box').each( function() { $(this).hoverdir(); } );
    }

    $("input[name$='new_search']").on('click',function() {
      var searchBy = $(this).val();
      $("div.new_form_div").hide();
      $("#" + searchBy + "Div").show();
    });

    $("input[name$='used_search']").on('click',function() {
      var searchBy = $(this).val();
      $("div.used_form_div").hide();
      $("#" + searchBy + "Div").show();
    });
    /* Car Search City Box End */
  }

  /* Magnific Popup ============ */
  var MagnificPopup = function(){
    'use strict';
    /* magnificPopup function */
    jQuery('.mfp-gallery').magnificPopup({
      delegate: '.mfp-link',
      type: 'image',
      tLoading: 'Loading image #%curr%...',
      mainClass: 'mfp-img-mobile',
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
      },
      image: {
        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
        titleSrc: function(item) {
          return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
        }
      }
    });
    /* magnificPopup function end */

    /* magnificPopup for paly video function */
    jQuery('.video').magnificPopup({
      type: 'iframe',
      iframe: {
        markup: '<div class="mfp-iframe-scaler">'+
        '<div class="mfp-close"></div>'+
        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
        '<div class="mfp-title">Some caption</div>'+
        '</div>'
      },
      callbacks: {
        markupParse: function(template, values, item) {
          values.title = item.el.attr('title');
        }
      }
    });
    /* magnificPopup for paly video function end*/

  }

  /* Scroll To Top ============ */
  var scrollTop = function (){
    'use strict';
    var scrollTop = jQuery("button.scroltop");
    /* page scroll top on click function */
    scrollTop.on('click',function() {
      jQuery("html, body").animate({
        scrollTop: 0
      }, 1000);
      return false;
    })

    jQuery(window).on("scroll", function() {
      var scroll = jQuery(window).scrollTop();
      if (scroll > 900) {
        jQuery("button.scroltop").fadeIn(1000);
      } else {
        jQuery("button.scroltop").fadeOut(1000);
      }
    });
    /* page scroll top on click function end*/
  }

  /* Handel Accordian ============ */
  var handelAccordian = function(){
    /* accodin open close icon change */
    jQuery('#accordion').on('hidden.bs.collapse', function(e){
      jQuery(e.target)
        .prev('.panel-heading')
        .find("i.indicator")
        .toggleClass('glyphicon-minus glyphicon-plus');
    });
    jQuery('#accordion').on('shown.bs.collapse', function(e){
      jQuery(e.target)
        .prev('.panel-heading')
        .find("i.indicator")
        .toggleClass('glyphicon-minus glyphicon-plus');
    });
    /* accodin open close icon change end */
  }

  /* Handel Placeholder ============ */
  var handelPlaceholder = function(){
    /* input placeholder for ie9 & ie8 & ie7 */
    jQuery.support.placeholder = ('placeholder' in document.createElement('input'));
    /* input placeholder for ie9 & ie8 & ie7 end*/

    /*fix for IE7 and IE8  */
    if (!jQuery.support.placeholder) {
      jQuery("[placeholder]").focus(function () {
        if (jQuery(this).val() == jQuery(this).attr("placeholder")) jQuery(this).val("");
      }).blur(function () {
        if (jQuery(this).val() == "") jQuery(this).val(jQuery(this).attr("placeholder"));
      }).blur();

      jQuery("[placeholder]").parents("form").submit(function () {
        jQuery(this).find('[placeholder]').each(function() {
          if (jQuery(this).val() == jQuery(this).attr("placeholder")) {
            jQuery(this).val("");
          }
        });
      });
    }
    /*fix for IE7 and IE8 end */
  }

  /* Equal Height ============ */
  var equalHeight = function(container) {

    var currentTallest = 0,
      currentRowStart = 0,
      rowDivs = new Array(),
      $el, topPosition = 0;

    $(container).each(function() {
      $el = $(this);
      $($el).height('auto')
      topPostion = $el.position().top;

      if (currentRowStart != topPostion) {
        for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
          rowDivs[currentDiv].height(currentTallest);
        }
        rowDivs.length = 0; // empty the array
        currentRowStart = topPostion;
        currentTallest = $el.height();
        rowDivs.push($el);
      } else {
        rowDivs.push($el);
        currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
      }
      for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
        rowDivs[currentDiv].height(currentTallest);
      }
    });
  }

  /* Footer Align ============ */
  var footerAlign = function() {
    'use strict';
    jQuery('.site-footer').css('display', 'block');
    jQuery('.site-footer').css('height', 'auto');
    var footerHeight = jQuery('.site-footer').outerHeight();
    jQuery('.footer-fixed > .page-wraper').css('padding-bottom', footerHeight);
    jQuery('.site-footer').css('height', footerHeight);
  }

  /* File Input ============ */
  var fileInput = function(){
    'use strict';
    /* Input type file jQuery */
    jQuery(document).on('change', '.btn-file :file', function() {
      var input = jQuery(this);
      var	numFiles = input.get(0).files ? input.get(0).files.length : 1;
      var	label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [numFiles, label]);
    });

    jQuery('.btn-file :file').on('fileselect', function(event, numFiles, label) {
      var input = jQuery(this).parents('.input-group').find(':text');
      var log = numFiles > 10 ? numFiles + ' files selected' : label;

      if (input.length) {
        input.val(log);
      } else {
        if (log) alert(log);
      }
    });
    /* Input type file jQuery end*/
  }

  /* Header Fixed ============ */
  var headerFix = function(){
    'use strict';
    /* Main navigation fixed on top  when scroll down function custom */
    jQuery(window).on('scroll', function () {
      var menu = jQuery('.sticky-header');
      if ($(window).scrollTop() > menu.offset().top) {
        menu.addClass('is-fixed');
        $('.logo').attr('src',carzoneJs.logo2);
      } else {
        menu.removeClass('is-fixed');
        $('.logo').attr('src',carzoneJs.logo1)
      }
    });
    /* Main navigation fixed on top  when scroll down function custom end*/
  }

  /* Masonry Box ============ */
  var masonryBox = function(){
    'use strict';
    /* masonry by  = bootstrap-select.min.js */
    var self = $(".masonry");
    self.imagesLoaded(function () {
      self.masonry({
        gutterWidth: 15,
        isAnimated: true,
        itemSelector: ".card-container"
      });
    });

    jQuery(".filters").on('click','li',function(e) {
      e.preventDefault();
      var filter = $(this).attr("data-filter");
      self.masonryFilter({
        filter: function () {
          if (!filter) return true;
          //return $(this).attr("data-filter") == filter;
          return $(this).hasClass(filter);
        }
      });
    });
    /* masonry by  = bootstrap-select.min.js end */
  }

  /* Set Div Height ============ */
  var setDivHeight = function(){
    'use strict';
    var allHeights = [];
    jQuery('.dzseth > div, .dzseth .img-cover, .dzseth .equal').each(function(e){
      allHeights.push(jQuery(this).height());
    })

    jQuery('.dzseth > div, .dzseth .img-cover, .dzseth .equal').each(function(e){
      var maxHeight = Math.max.apply(Math,allHeights);
      jQuery(this).css('height',maxHeight);
    })

    allHeights = [];
    /* Removice */
    var screenWidth = $( window ).width();
    if(screenWidth < 991)
    {
      jQuery('.dzseth > div, .dzseth .img-cover, .dzseth .equal').each(function(e){
        jQuery(this).css('height','');
      })
    }
  }

  /* Counter Number ============ */
  var counter = function(){
    jQuery('.counter').counterUp({
      delay: 10,
      time: 3000
    });
  }

  /* Video Popup ============ */
  var handelVideo = function(){
    /* Video responsive function */
    jQuery('iframe[src*="youtube.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
    jQuery('iframe[src*="vimeo.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
    /* Video responsive function end */
  }

  /* Gallery Filter ============ */
  var handelFilterMasonary = function(){
    /* gallery filter activation = jquery.mixitup.min.js */
    if (jQuery('#image-gallery-mix').length) {
      jQuery('.gallery-filter').find('li').each(function () {
        $(this).addClass('filter');
      });
      jQuery('#image-gallery-mix').mixItUp();
    };
    if(jQuery('.gallery-filter.masonary').length){
      jQuery('.gallery-filter.masonary').on('click','span', function(){
        var selector = $(this).parent().attr('data-filter');
        jQuery('.gallery-filter.masonary span').parent().removeClass('active');
        jQuery(this).parent().addClass('active');
        jQuery('#image-gallery-isotope').isotope({ filter: selector });
        return false;
      });
    }
    /* gallery filter activation = jquery.mixitup.min.js */
  }

  /* Handel Bootstrap Select ============ */
  var handelBootstrapSelect = function(){
    /* Bootstrap Select box function by  = bootstrap-select.min.js */
    jQuery('select').selectpicker();
    /* Bootstrap Select box function by  = bootstrap-select.min.js end*/
  }

  /* Handel Bootstrap Touch Spin ============ */
  var handelBootstrapTouchSpin = function(){
    jQuery("input[name='demo_vertical2']").TouchSpin({
      verticalbuttons: true,
      verticalupclass: 'glyphicon glyphicon-plus',
      verticaldownclass: 'glyphicon glyphicon-minus'
    });

  }
  /* Resizebanner ============ */
  var handelBannerResize = function(){
    $(".full-height").css("height", $(window).height());
  }

  /* Countdown ============ */
  var handelCountDown = function(){
    /* Time Countr Down Js */
    if($(".countdown").length)
    {
      $('.countdown').countdown({date: '30 march 2018 23:5'}, function() {
        $('.countdown').text('we are live');
      });
    }
    /* Time Countr Down Js End */
  }

  /* Content Scroll ============ */
  var handelCustomScroll = function(){
    /* all available option parameters with their default values */
    if($(".content-scroll").length)
    {
      $(".content-scroll").mCustomScrollbar({
        setWidth:false,
        setHeight:false,
        axis:"y"
      });
    }
  }

  /* Left Menu ============ */
  var handelSideBarMenu = function(){
    $('.openbtn').on('click',function(e){
      e.preventDefault();
      if($('#mySidenav').length > 0)
      {
        document.getElementById("mySidenav").style.left = "0";
      }

      if($('#mySidenav1').length > 0)
      {
        document.getElementById("mySidenav1").style.right = "0";
      }

    })

    $('.closebtn').on('click',function(e){
      e.preventDefault();
      if($('#mySidenav').length > 0)
      {
        document.getElementById("mySidenav").style.left = "-300px";
      }

      if($('#mySidenav1').length > 0)
      {
        document.getElementById("mySidenav1").style.right = "-820px";
      }
    })
  }
  var priceslider = function(){

    if($(".price-slide, .price-slide-2").length > 0 ) {
      $("#slider-range,#slider-range-2").slider({
        range: true,
        min: 200,
        max: 5000,
        values: [0, 5000],
        slide: function(event, ui) {
          var min = ui.values[0],
            max = ui.values[1];
          $('#' + this.id).prev().val("$" + min + " - $" + max);
        }
      });
    }
  }

  var wowAnimation = function(){
    if($('.wow').length > 0)
    {
      var wow = new WOW(
        {
          boxClass:     'wow',      // animated element css class (default is wow)
          animateClass: 'animated', // animation css class (default is animated)
          offset:       100,          // distance to the element when triggering the animation (default is 0)
          mobile:       false       // trigger animations on mobile devices (true is default)
        });
      wow.init();
    }
  }

  var boxHover = function(){

    jQuery('.box-hover').on('mouseenter',function(){
      jQuery('.box-hover').removeClass('active');
      jQuery(this).addClass('active');

    })
  }

  var reposition = function (){
    'use strict';
    var modal = jQuery(this),
      dialog = modal.find('.modal-dialog');
    modal.css('display', 'block');

    /* Dividing by two centers the modal exactly, but dividing by three
     or four works better for larger screens.  */
    dialog.css("margin-top", Math.max(0, (jQuery(window).height() - dialog.height()) / 2));
  }

  var handelResize = function (){

    /* Reposition when the window is resized */
    jQuery(window).on('resize', function() {
      jQuery('.modal:visible').each(reposition);

      equalheight('.equal-wraper .equal-col');
      footerAlign();
    });
  }

  var  dezText = function(words, id) {
    'use strict';
    if($('#'+id).length > 0)
    {
      var visible = true;
      var letterCount = 1;
      var x = 1;
      var waiting = false;
      var target = document.getElementById(id);
      window.setInterval(function() {

        if (letterCount === 0 && waiting === false) {
          waiting = true;
          target.innerHTML = words[0].substring(0, letterCount);
          window.setTimeout(function() {
            var usedWord = words.shift();
            words.push(usedWord);
            x = 1;
            letterCount += x;
            waiting = false;
          }, 500)
        } else if (letterCount === words[0].length + 1 && waiting === false) {
          waiting = true;
          window.setTimeout(function() {
            x = -1;
            letterCount += x;
            waiting = false;
          }, 1000)
        } else if (waiting === false) {
          target.innerHTML = words[0].substring(0, letterCount);
          letterCount += x;
        }
      }, 70)
    }
  }


  /* Function ============ */
  return {
    init:function(){
      boxHover();
      priceslider();
      onePageLayout();
      dzTheme();
      verticalNav();
      handelResizeElement();
      homeSearch();
      MagnificPopup();
      handelAccordian();
      scrollTop();
      handelPlaceholder();
      footerAlign();
      fileInput();
      headerFix();
      setDivHeight();
      counter();
      handelVideo();
      handelFilterMasonary();
      handelCountDown();
      handelCustomScroll();
      handelSideBarMenu();
      cartButton();
      handelBannerResize();
      wowAnimation();
      handelResize();
      jQuery('.modal').on('show.bs.modal', reposition);
      dezText(['Best Accordians', 'Awesome Icon Box', 'Usefull Tabs', 'Attractive Alert Box', 'Client Testimonials', 'Buttons, Image Box, Widgets And Many More...  ' ], "text");
    },

    load:function(){
      masonryBox();
      handelBootstrapSelect();
      handelBootstrapTouchSpin();
      equalHeight('.equal-wraper .equal-col');

    }
  }

}();


/* Document.ready Start */
jQuery(document).ready(function() {
  'use strict';
  CarDealer.init();

});
/* Document.ready END */

/* Window Load START */
jQuery(window).load(function () {
  'use strict';
  CarDealer.load();

  setTimeout(function(){
    jQuery('#loading-area').remove();
  }, 0);

});

/*  Window Load END */