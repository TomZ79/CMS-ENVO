/***************************************************************************************************************
 ||||||||||||||||||||||||||||        CUSTOM SCRIPT FOR LEBUILD                       ||||||||||||||||||||||||||||
 ****************************************************************************************************************
 ||||||||||||||||||||||||||||              TABLE OF CONTENT                  ||||||||||||||||||||||||||||||||||||
 ****************************************************************************************************************
 ****************************************************************************************************************

 01. Revolution slider
 02. Sticky header
 03. Prealoader
 04. Language switcher
 05. prettyPhoto
 06. BrandCarousel
 07. Testimonial carousel
 08. ScrollToTop
 09. Cart Touch Spin
 10. PriceFilter
 11. Cart touch spin
 12. Fancybox activator
 13. ContactFormValidation
 14. Scoll to target
 15. PrettyPhoto

 ****************************************************************************************************************
 ||||||||||||||||||||||||||||            End TABLE OF CONTENT                ||||||||||||||||||||||||||||||||||||
 ****************************************************************************************************************/


"use strict";

/*! Backstretch - v2.0.4 - 2013-06-19
* http://srobbin.com/jquery-plugins/backstretch/
* Copyright (c) 2013 Scott Robbin; Licensed MIT */
(function(a,d,p){a.fn.backstretch=function(c,b){(c===p||0===c.length)&&a.error("No images were supplied for Backstretch");0===a(d).scrollTop()&&d.scrollTo(0,0);return this.each(function(){var d=a(this),g=d.data("backstretch");if(g){if("string"==typeof c&&"function"==typeof g[c]){g[c](b);return}b=a.extend(g.options,b);g.destroy(!0)}g=new q(this,c,b);d.data("backstretch",g)})};a.backstretch=function(c,b){return a("body").backstretch(c,b).data("backstretch")};a.expr[":"].backstretch=function(c){return a(c).data("backstretch")!==p};a.fn.backstretch.defaults={centeredX:!0,centeredY:!0,duration:5E3,fade:0};var r={left:0,top:0,overflow:"hidden",margin:0,padding:0,height:"100%",width:"100%",zIndex:-999999},s={position:"absolute",display:"none",margin:0,padding:0,border:"none",width:"auto",height:"auto",maxHeight:"none",maxWidth:"none",zIndex:-999999},q=function(c,b,e){this.options=a.extend({},a.fn.backstretch.defaults,e||{});this.images=a.isArray(b)?b:[b];a.each(this.images,function(){a("<img />")[0].src=this});this.isBody=c===document.body;this.$container=a(c);this.$root=this.isBody?l?a(d):a(document):this.$container;c=this.$container.children(".backstretch").first();this.$wrap=c.length?c:a('<div class="backstretch"></div>').css(r).appendTo(this.$container);this.isBody||(c=this.$container.css("position"),b=this.$container.css("zIndex"),this.$container.css({position:"static"===c?"relative":c,zIndex:"auto"===b?0:b,background:"none"}),this.$wrap.css({zIndex:-999998}));this.$wrap.css({position:this.isBody&&l?"fixed":"absolute"});this.index=0;this.show(this.index);a(d).on("resize.backstretch",a.proxy(this.resize,this)).on("orientationchange.backstretch",a.proxy(function(){this.isBody&&0===d.pageYOffset&&(d.scrollTo(0,1),this.resize())},this))};q.prototype={resize:function(){try{var a={left:0,top:0},b=this.isBody?this.$root.width():this.$root.innerWidth(),e=b,g=this.isBody?d.innerHeight?d.innerHeight:this.$root.height():this.$root.innerHeight(),j=e/this.$img.data("ratio"),f;j>=g?(f=(j-g)/2,this.options.centeredY&&(a.top="-"+f+"px")):(j=g,e=j*this.$img.data("ratio"),f=(e-b)/2,this.options.centeredX&&(a.left="-"+f+"px"));this.$wrap.css({width:b,height:g}).find("img:not(.deleteable)").css({width:e,height:j}).css(a)}catch(h){}return this},show:function(c){if(!(Math.abs(c)>this.images.length-1)){var b=this,e=b.$wrap.find("img").addClass("deleteable"),d={relatedTarget:b.$container[0]};b.$container.trigger(a.Event("backstretch.before",d),[b,c]);this.index=c;clearInterval(b.interval);b.$img=a("<img />").css(s).bind("load",function(f){var h=this.width||a(f.target).width();f=this.height||a(f.target).height();a(this).data("ratio",h/f);a(this).fadeIn(b.options.speed||b.options.fade,function(){e.remove();b.paused||b.cycle();a(["after","show"]).each(function(){b.$container.trigger(a.Event("backstretch."+this,d),[b,c])})});b.resize()}).appendTo(b.$wrap);b.$img.attr("src",b.images[c]);return b}},next:function(){return this.show(this.index<this.images.length-1?this.index+1:0)},prev:function(){return this.show(0===this.index?this.images.length-1:this.index-1)},pause:function(){this.paused=!0;return this},resume:function(){this.paused=!1;this.next();return this},cycle:function(){1<this.images.length&&(clearInterval(this.interval),this.interval=setInterval(a.proxy(function(){this.paused||this.next()},this),this.options.duration));return this},destroy:function(c){a(d).off("resize.backstretch orientationchange.backstretch");clearInterval(this.interval);c||this.$wrap.remove();this.$container.removeData("backstretch")}};var l,f=navigator.userAgent,m=navigator.platform,e=f.match(/AppleWebKit\/([0-9]+)/),e=!!e&&e[1],h=f.match(/Fennec\/([0-9]+)/),h=!!h&&h[1],n=f.match(/Opera Mobi\/([0-9]+)/),t=!!n&&n[1],k=f.match(/MSIE ([0-9]+)/),k=!!k&&k[1];l=!((-1<m.indexOf("iPhone")||-1<m.indexOf("iPad")||-1<m.indexOf("iPod"))&&e&&534>e||d.operamini&&"[object OperaMini]"==={}.toString.call(d.operamini)||n&&7458>t||-1<f.indexOf("Android")&&e&&533>e||h&&6>h||"palmGetResource"in d&&e&&534>e||-1<f.indexOf("MeeGo")&&-1<f.indexOf("NokiaBrowser/8.5.0")||k&&6>=k)})(jQuery,window);

// Add tabs functionality to the right side content
function jgtContentTabs() {
  var tabsNav = $('#menu'), tabsWrap = $('#main');

  tabsWrap.find('.main-section:gt(0)').hide();
  tabsNav.find('li:first').addClass('active');
  tabsNav.find('a').click(function(e) {
    tabsWrap.find('.main-section').hide();
    tabsWrap.find($($(this).attr('href'))).fadeIn(800);
    tabsNav.find('li').removeClass('active');
    $(this).parent().addClass('active');
    e.preventDefault();

    // Fix the map in the hidden div
    if ($('#map-canvas').length > 0) {
      google.maps.event.trigger(map, 'resize');
      map.setCenter(mapLatLng);
    }

    // Fix background
    $('.left-wrap .bg').backstretch('resize');
  });
}

//Submenu Dropdown Toggle
if ($('.main-header li.dropdown ul').length) {
  $('.main-header .navigation li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-right"></span></div>');
}


//Mobile Nav Hide Show
if ($('.mobile-menu').length) {

  $('.mobile-menu .menu-box').mCustomScrollbar();

  var mobileMenuContent = $('.main-header .nav-outer .main-menu').html();
  $('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);
  $('.sticky-header .main-menu').append(mobileMenuContent);

  //Dropdown Button
  $('.mobile-menu li.dropdown .dropdown-btn').on('click', function () {
    $(this).toggleClass('open');
    $(this).prev('ul').slideToggle(500);
  });


  //Dropdown Button
  $('.mobile-menu li.dropdown .dropdown-btn').on('click', function () {
    $(this).prev('.megamenu').slideToggle(900);
  });


  //Menu Toggle Btn
  $('.mobile-nav-toggler').on('click', function () {
    $('body').addClass('mobile-menu-visible');
  });

  //Menu Toggle Btn
  $('.mobile-menu .menu-backdrop,.mobile-menu .close-btn').on('click', function () {
    $('body').removeClass('mobile-menu-visible');
  });
}


// Scroll to a Specific Div
if ($('.scroll-to-target').length) {
  $(".scroll-to-target").on('click', function () {
    var target = $(this).attr('data-target');
    // animate
    $('html, body').animate({
      scrollTop: $(target).offset().top
    }, 1000);

  });
}


//Parallax Scene for Icons
if ($('.parallax-scene-1').length) {
  var scene = $('.parallax-scene-1').get(0);
  var parallaxInstance = new Parallax(scene);
}
if ($('.parallax-scene-2').length) {
  var scene = $('.parallax-scene-2').get(0);
  var parallaxInstance = new Parallax(scene);
}
if ($('.parallax-scene-3').length) {
  var scene = $('.parallax-scene-3').get(0);
  var parallaxInstance = new Parallax(scene);
}
if ($('.parallax-scene-4').length) {
  var scene = $('.parallax-scene-4').get(0);
  var parallaxInstance = new Parallax(scene);
}
if ($('.parallax-scene-5').length) {
  var scene = $('.parallax-scene-5').get(0);
  var parallaxInstance = new Parallax(scene);
}


//Add One Page nav
if ($('.scroll-nav').length) {
  $('.scroll-nav').onePageNav();
}


// body-layout
function bodylayout() {
  if ($('.boxed_switch_menu').length) {

    $('.body_switch_btn button').on('click', function () {
      $('.body_switcher').toggleClass('switcher-show')
    });

    $("#myonoffswitch").on('click', function () {
      $(".fixed").toggleClass("static");
    });

    $("#boxed").on('click', function () {
      $(".main_page").addClass("active_boxlayout");
      $('body').addClass('bg')
    });
    $("#full_width").on('click', function () {
      $(".main_page").removeClass("active_boxlayout");
      $('body').removeClass('bg')
    });
  }
  ;
}


// Color switcher
function swithcerMenu() {
  if ($('.switch_menu').length) {

    $('.switch_btn button').on('click', function () {
      $('.switch_menu').toggle(500)
    });

    $('#styleOptions').styleSwitcher({
      hasPreview: true,
      fullPath: 'assets/css/color/',
      cookie: {
        expires: 30,
        isManagingLoad: true
      }
    });

  }
  ;
}


//Update Header Style and Scroll to Top
function headerStyle() {
  if ($('.main-header').length) {
    var windowpos = $(window).scrollTop();
    var siteHeader = $('.main-header');
    var scrollLink = $('.scroll-top');
    if (windowpos >= 350) {
      siteHeader.addClass('fixed-header');
      scrollLink.fadeIn(300);
    } else {
      siteHeader.removeClass('fixed-header');
      scrollLink.fadeOut(300);
    }
  }
}

headerStyle();


//Accordion Box
function accordion() {
  if ($('.accordion-box').length) {
    $(".accordion-box").on('click', '.accord-btn', function () {

      if ($(this).hasClass('active') !== true) {
        $('.accordion .accord-btn').removeClass('active');

      }

      if ($(this).next('.accord-content').is(':visible')) {
        $(this).removeClass('active');
        $(this).next('.accord-content').slideUp(500);
      } else {
        $(this).addClass('active');
        $('.accordion .accord-content').slideUp(500);
        $(this).next('.accord-content').slideDown(500);
      }
    });
  }
}


//===Language switcher===
function languageSwitcher() {
  if ($("#polyglot-language-options").length) {
    $('#polyglotLanguageSwitcher').polyglotLanguageSwitcher({
      effect: 'slide',
      animSpeed: 500,
      testMode: true,
      onChange: function (evt) {
        alert("The selected language is: " + evt.selectedItem);
      }

    });
  }
  ;
}


//===Search box ===
function searchbox() {
  //Search Box Toggle
  if ($('.seach-toggle').length) {
    //Dropdown Button
    $('.seach-toggle').on('click', function () {
      $(this).toggleClass('active');
      $(this).next('.search-box').toggleClass('now-visible');
    });
  }
}


// Date picker
function datepicker() {
  if ($('#datepicker').length) {
    $('#datepicker').datepicker();
  }
  ;
}


// Time picker
function timepicker() {
  if ($('input[name="time"]').length) {
    $('input[name="time"]').ptTimeSelect();
  }
}


//Hide Loading Box (Preloader)
function handlePreloader() {
  if ($('.loader-wrap').length) {
    $('.loader-wrap').delay(1000).fadeOut(500);
  }
  TweenMax.to($(".loader-wrap .overlay"), 1.2, {
    force3D: true,
    left: "100%",
    ease: Expo.easeInOut,
  });
}

if ($(".preloader-close").length) {
  $(".preloader-close").on("click", function () {
    $('.loader-wrap').delay(200).fadeOut(500);
  })
}


//  Fact counter
function CounterNumberChanger() {
  var timer = $('.timer');
  if (timer.length) {
    timer.appear(function () {
      timer.countTo();
    })
  }
}


// Price Filter
function priceFilter() {
  if ($('.price-ranger').length) {
    $('.price-ranger #slider-range').slider({
      range: true,
      min: 10,
      max: 200,
      values: [11, 99],
      slide: function (event, ui) {
        $('.price-ranger .ranger-min-max-block .min').val('$' + ui.values[0]);
        $('.price-ranger .ranger-min-max-block .max').val('$' + ui.values[1]);
      }
    });
    $('.price-ranger .ranger-min-max-block .min').val('$' + $('.price-ranger #slider-range').slider('values', 0));
    $('.price-ranger .ranger-min-max-block .max').val('$' + $('.price-ranger #slider-range').slider('values', 1));
  }
  ;
}


// ===Project===
function projectMasonaryLayout() {
  if ($('.masonary-layout').length) {
    $('.masonary-layout').isotope({
      layoutMode: 'masonry'
    });
  }
  if ($('.post-filter').length) {
    $('.post-filter li').children('.filter-text').on('click', function () {
      var Self = $(this);
      var selector = Self.parent().attr('data-filter');
      $('.post-filter li').removeClass('active');
      Self.parent().addClass('active');
      $('.filter-layout').isotope({
        filter: selector,
        animationOptions: {
          duration: 500,
          easing: 'linear',
          queue: false
        }
      });
      return false;
    });
  }

  if ($('.post-filter.has-dynamic-filters-counter').length) {
    // var allItem = $('.single-filter-item').length;
    var activeFilterItem = $('.post-filter.has-dynamic-filters-counter').find('li');
    activeFilterItem.each(function () {
      var filterElement = $(this).data('filter');
      var count = $('.filter-layout').find(filterElement).length;
      $(this).children('.filter-text').append('<span class="count">' + count + '</span>');
    });
  }
  ;
}


//=== CountDownTimer===
function countDownTimer() {
  if ($('.time-countdown').length) {
    $('.time-countdown').each(function () {
      var Self = $(this);
      var countDate = Self.data('countdown-time'); // getting date

      Self.countdown(countDate, function (event) {
        $(this).html('<h2>' + event.strftime('%D : %H : %M : %S') + '</h2>');
      });
    });
  }
  ;
  if ($('.time-countdown-two').length) {
    $('.time-countdown-two').each(function () {
      var Self = $(this);
      var countDate = Self.data('countdown-time'); // getting date

      Self.countdown(countDate, function (event) {
        $(this).html('<li> <div class="box"> <span class="days">' + event.strftime('%D') + '</span> <span class="timeRef">days</span> </div> </li> <li> <div class="box"> <span class="hours">' + event.strftime('%H') + '</span> <span class="timeRef clr-1">Hours</span> </div> </li> <li> <div class="box"> <span class="minutes">' + event.strftime('%M') + '</span> <span class="timeRef clr-2">Minutes</span> </div> </li> <li> <div class="box"> <span class="seconds">' + event.strftime('%S') + '</span> <span class="timeRef clr-3">Seconds</span> </div> </li>');
      });
    });
  }
  ;
}


// ===Image Hover Script===
function onHoverthreeDmovement() {
  var tiltBlock = $('.js-tilt');
  if (tiltBlock.length) {
    $('.js-tilt').tilt({
      maxTilt: 20,
      perspective: 700,
      glare: true,
      maxGlare: 0
    })
  }
}


// Tab Box
function tabBox() {
  if ($('.tabs-box').length) {
    $('.tabs-box .tab-buttons .tab-btn').on('click', function (e) {
      e.preventDefault();
      var target = $($(this).attr('data-tab'));

      if ($(target).is(':visible')) {
        return false;
      } else {
        target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
        $(this).addClass('active-btn');
        target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
        target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
        $(target).fadeIn(300);
        $(target).addClass('active-tab');
      }
    });
  }
}


// Cart Touch Spin
function cartTouchSpin() {
  if ($('.quantity-spinner').length) {
    $("input.quantity-spinner").TouchSpin({
      verticalbuttons: true
    });
  }
}


// page direction
function directionswitch() {
  if ($('.page_direction').length) {

    $('.direction_switch button').on('click', function () {
      $('.boxed_wrapper').toggleClass(function () {
        return $(this).is('.rtl, .ltr') ? 'rtl ltr' : 'rtl';
      })
    });
  }
  ;
}


/////////////////////////////
//Universal Code for All Owl Carousel Sliders
/////////////////////////////

if ($('.theme-carousel').length) {
  $(".theme-carousel").each(function (index) {
    var $owlAttr = {},
      $extraAttr = $(this).data("options");
    $.extend($owlAttr, $extraAttr);
    $(this).owlCarousel($owlAttr);
  });
}


// Main Slider Carousel
if ($('.banner-carousel').length) {
  $('.banner-carousel').owlCarousel({
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    loop: true,
    margin: 0,
    dots: true,
    nav: true,
    singleItem: true,
    smartSpeed: 500,
    autoplay: true,
    autoplayTimeout: 6000,
    navText: ['<span class="flaticon-left-arrow"></span>', '<span class="flaticon-right-arrow"></span>'],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1024: {
        items: 1
      }
    }
  });
}


// Main Slider Carousel
if ($('.banner-carousel-rtl').length) {
  $('.banner-carousel-rtl').owlCarousel({
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    loop: true,
    margin: 0,
    dots: false,
    nav: true,
    singleItem: true,
    smartSpeed: 500,
    autoplay: true,
    rtl: true,
    autoplayTimeout: 6000,
    navText: ['<span class="fas fa fa-angle-left"></span>', '<span class="fas fa fa-angle-right"></span>'],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1024: {
        items: 1
      }
    }
  });
}


// One Item Carousel
if ($('.one-item-carousel').length) {
  $('.one-item-carousel').owlCarousel({
    loop: true,
    margin: 50,
    dots: false,
    nav: true,
    stagePadding: 0,
    singleItem: true,
    smartSpeed: 500,
    autoplay: true,
    autoplayTimeout: 6000,
    navText: ['<span class="fa fa-angle-left left"></span>', '<span class="fa fa-angle-right right"></span>'],
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 1
      },
      850: {
        items: 1
      },
      992: {
        items: 1
      },
      1200: {
        items: 1
      }
    }
  });
}


//  Partner Carousel
if ($('.partner-carousel').length) {
  $('.partner-carousel').owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: false,
    stagePadding: 0,
    singleItem: true,
    smartSpeed: 500,
    autoplay: true,
    autoplayTimeout: 6000,
    navText: ['<span class="flaticon-next left"></span>', '<span class="flaticon-next right"></span>'],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1024: {
        items: 6
      }
    }
  });
}


// Three Item Carousel
if ($('.two-item-carousel').length) {
  $('.two-item-carousel').owlCarousel({
    loop: true,
    margin: 30,
    dots: false,
    nav: true,
    stagePadding: 0,
    singleItem: true,
    smartSpeed: 500,
    autoplay: true,
    autoplayTimeout: 6000,
    navText: ['<span class="fa fa-angle-left left"></span>', '<span class="fa fa-angle-right right"></span>'],
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 1
      },
      850: {
        items: 1
      },
      992: {
        items: 2
      },
      1200: {
        items: 2
      }
    }
  });
}


//=== Service Style3 Carousel===
if ($('.service-style3_carousel').length) {
  $('.service-style3_carousel').owlCarousel({
    dots: false,
    loop: true,
    margin: 30,
    nav: true,
    navText: [
      '<i class="fa fa-angle-left" aria-hidden="true"></i>',
      '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    autoplayHoverPause: false,
    autoplay: 20000,
    smartSpeed: 2000,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      800: {
        items: 2
      },
      1024: {
        items: 2
      },
      1100: {
        items: 3
      },
      1200: {
        items: 3
      }
    }
  });
}


//  Testimonial Carousel
if ($('.testimonial-style2-carousel').length) {
  $('.testimonial-style2-carousel').owlCarousel({
    loop: true,
    margin: 50,
    dots: false,
    nav: false,
    stagePadding: 0,
    singleItem: true,
    smartSpeed: 500,
    autoplay: true,
    autoplayTimeout: 6000,
    navText: ['<span class="flaticon-next left"></span>', '<span class="flaticon-next right"></span>'],
    responsive: {
      0: {
        items: 1
      },
      992: {
        items: 2
      },
      1399: {
        items: 3
      }
    }
  });
}


//=== Testimonial Style3 Carousel===
if ($('.testimonial-style3_Carousel').length) {
  $('.testimonial-style3_Carousel').owlCarousel({
    dots: true,
    loop: true,
    margin: 30,
    nav: false,
    navText: [
      '<i class="fa fa-angle-left" aria-hidden="true"></i>',
      '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    autoplayHoverPause: false,
    autoplay: 20000,
    smartSpeed: 2000,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      800: {
        items: 1
      },
      1024: {
        items: 2
      },
      1100: {
        items: 2
      },
      1200: {
        items: 2
      }
    }
  });
}


//=== Locations Carousel===
if ($('.locations-Carousel').length) {
  $('.locations-Carousel').owlCarousel({
    dots: true,
    loop: true,
    margin: 30,
    nav: false,
    navText: [
      '<i class="fa fa-angle-left" aria-hidden="true"></i>',
      '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    autoplayHoverPause: false,
    autoplay: 20000,
    smartSpeed: 2000,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      800: {
        items: 1
      },
      1024: {
        items: 1
      },
      1100: {
        items: 1
      },
      1200: {
        items: 1
      }
    }
  });
}


if ($('.single-product-image-holder .bxslider2').length) {
  $('.single-product-image-holder .bxslider2').bxSlider({
    nextSelector: '.single-product-image-holder #slider-next',
    prevSelector: '.single-product-image-holder #slider-prev',
    nextText: '<i class="fa fa-angle-right"></i>',
    prevText: '<i class="fa fa-angle-left"></i>',
    mode: 'horizontal',
    auto: 'true',
    speed: '700',
    pagerCustom: '.single-product-image-holder .slider-pager .thumb-box'
  });
}
;


//=== Shop Review Carousel===
if ($('.shop-review-carousel').length) {
  $('.shop-review-carousel').owlCarousel({
    dots: false,
    loop: true,
    margin: 30,
    nav: true,
    navText: [
      '<i class="fa fa-angle-left" aria-hidden="true"></i>',
      '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    autoplayHoverPause: false,
    autoplay: 20000,
    smartSpeed: 2000,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      800: {
        items: 1
      },
      1024: {
        items: 1
      },
      1100: {
        items: 2
      },
      1200: {
        items: 2
      }
    }
  });
}


if ($('.dial').length) {
  $('.dial').appear(function () {
    var elm = $(this);
    var color = elm.attr('data-fgColor');
    var perc = elm.attr('value');
    elm.knob({
      'value': 0,
      'min': 0,
      'max': 100,
      'skin': 'tron',
      'readOnly': true,
      'thickness': 0.25,
      'dynamicDraw': true,
      'displayInput': false
    });
    $({
      value: 0
    }).animate({
      value: perc
    }, {
      duration: 2000,
      easing: 'swing',
      progress: function () {
        elm.val(Math.ceil(this.value)).trigger('change');
      }
    });
    $(this).append(function () {
    });
  }, {
    accY: 20
  });
}


//Hidden Sidebar
if ($('.hidden-bar').length) {
  var hiddenBar = $('.hidden-bar');
  var hiddenBarOpener = $('.hidden-bar-opener');
  var hiddenBarCloser = $('.hidden-bar-closer');
  var navToggler = $('.nav-toggler');
  $('.hidden-bar-wrapper').mCustomScrollbar();

  //Show Sidebar
  hiddenBarOpener.on('click', function () {
    hiddenBar.toggleClass('visible-sidebar');
    navToggler.toggleClass('open');
  });

  //Hide Sidebar
  hiddenBarCloser.on('click', function () {
    hiddenBar.toggleClass('visible-sidebar');
    navToggler.toggleClass('open');
  });
}


//Progress Bar / Levels
if ($('.progress-levels .progress-box .bar-fill').length) {
  $(".progress-box .bar-fill").each(function () {
    $('.progress-box .bar-fill').appear(function () {
      var progressWidth = $(this).attr('data-percent');
      $(this).css('width', progressWidth + '%');
    });

  }, {accY: 0});
}


//Fact Counter + Text Count
if ($('.count-box').length) {
  $('.count-box').appear(function () {

    var $t = $(this),
      n = $t.find(".count-text").attr("data-stop"),
      r = parseInt($t.find(".count-text").attr("data-speed"), 10);

    if (!$t.hasClass("counted")) {
      $t.addClass("counted");
      $({
        countNum: $t.find(".count-text").text()
      }).animate({
        countNum: n
      }, {
        duration: r,
        easing: "linear",
        step: function () {
          $t.find(".count-text").text(Math.floor(this.countNum));
        },
        complete: function () {
          $t.find(".count-text").text(this.countNum);
        }
      });
    }

  }, {accY: 0});
}


//Accordion Box
if ($('.accordion-box').length) {
  $(".accordion-box").on('click', '.acc-btn', function () {

    var outerBox = $(this).parents('.accordion-box');
    var target = $(this).parents('.accordion');

    if ($(this).hasClass('active') !== true) {
      $(outerBox).find('.accordion .acc-btn').removeClass('active');
    }

    if ($(this).next('.acc-content').is(':visible')) {
      return false;
    } else {
      $(this).addClass('active');
      $(outerBox).children('.accordion').removeClass('active-block');
      $(outerBox).find('.accordion').children('.acc-content').slideUp(300);
      target.addClass('active-block');
      $(this).next('.acc-content').slideDown(300);
    }
  });
}


//====== Magnific Popup
$('.video-popup').magnificPopup({
  type: 'iframe'
  // other options
});


//LightBox / Fancybox
if ($('.lightbox-image').length) {
  $('.lightbox-image').fancybox({
    openEffect: 'fade',
    closeEffect: 'fade',

    youtube: {
      controls: 0,
      showinfo: 0
    },

    helpers: {
      media: {}
    }
  });
}


if ($('.paroller').length) {
  $('.paroller').paroller({
    factor: -0.1,            // multiplier for scrolling speed and offset, +- values for direction control
    factorLg: -0.1,          // multiplier for scrolling speed and offset if window width is less than 1200px, +- values for direction control
    type: 'foreground',     // background, foreground
    direction: 'vertical' // vertical, horizontal
  });
}


if ($('.paroller-2').length) {
  $('.paroller-2').paroller({
    factor: 0.05,            // multiplier for scrolling speed and offset, +- values for direction control
    factorLg: 0.05,          // multiplier for scrolling speed and offset if window width is less than 1200px, +- values for direction control
    type: 'foreground',     // background, foreground
    direction: 'horizontal' // vertical, horizontal
  });
}


// Elements Animation
if ($('.wow').length) {
  var wow = new WOW(
    {
      boxClass: 'wow',      // animated element css class (default is wow)
      animateClass: 'animated', // animation css class (default is animated)
      offset: 0,          // distance to the element when triggering the animation (default is 0)
      mobile: false,       // trigger animations on mobile devices (default is true)
      live: true       // act on asynchronously loaded content (default is true)
    }
  );
  wow.init();
}


// AOS Animation
if ($("[data-aos]").length) {
  AOS.init({
    duration: 1000,
    mirror: true
  });
}


//Contact Form Validation
if ($("#contact-form").length) {
  $("#contact-form").validate({
    submitHandler: function (form) {
      var form_btn = $(form).find('button[type="submit"]');
      var form_result_div = '#form-result';
      $(form_result_div).remove();
      form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
      var form_btn_old_msg = form_btn.html();
      form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
      $(form).ajaxSubmit({
        dataType: 'json',
        success: function (data) {
          if (data.status = 'true') {
            $(form).find('.form-control').val('');
          }
          form_btn.prop('disabled', false).html(form_btn_old_msg);
          $(form_result_div).html(data.message).fadeIn('slow');
          setTimeout(function () {
            $(form_result_div).fadeOut('slow')
          }, 6000);
        }
      });
    }
  });
}

// Dom Ready Function
jQuery(document).on('ready', function () {
  (function ($) {
    // add your functions
    languageSwitcher();
    searchbox();
    datepicker();
    timepicker();
    tabBox();
    cartTouchSpin();
    directionswitch();

    CounterNumberChanger();
    priceFilter();
    accordion();
    bodylayout();
    swithcerMenu();
    onHoverthreeDmovement();
    countDownTimer();


  })(jQuery);
});


jQuery(window).on('scroll', function () {
  (function ($) {

    headerStyle();

  })(jQuery);
});


// Instance Of Fuction while Window Load event
jQuery(window).on('load', function () {
  (function ($) {
    handlePreloader();
    projectMasonaryLayout();


  })(jQuery);
});


$(window).enllax();


