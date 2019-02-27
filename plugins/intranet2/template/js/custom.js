/*
 * CMS ENVO
 * JS for Plugin Intranet2 - Frontend
 * Copyright (c) 2018 - 2019 Bluesat.cz
 * -----------------------------------------------------------------------
 * Css Template: Limitless v2.1
 * Theme : Default
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================*/

/** 00. PROTOTYPE CONSTRUCTOR FUNCTION
 ========================================================================*/

(function ($) {

  'use strict';

  var Limitless = function () {
    this.VERSION = "2.1";
    this.AUTHOR = "BluesatKV";
    this.SUPPORT = "bluesatkv@gmail.com";
    this.$body = $('body');
  };

  /**
   * Tooltip
   * @require: Bootstrap v4
   */
  Limitless.prototype.initTooltipPlugin = function () {
    $.fn.tooltip && $('body').tooltip({
      selector: '[data-toggle="tooltipEnvo"]',
      placement: 'bottom',
      trigger: 'hover',
      container: 'body',
      html: true
    });
  };

  /**
   * Progress bar animation
   * @requires Jquery Animate Number Plugin
   */
  Limitless.prototype.initProgress = function () {
    // Use the jQuery.isFunction() method to see if $.fn.someMethod is indeed a function
    if (typeof $.fn.animateNumbers !== 'undefined' && $.isFunction($.fn.animateNumbers)) {
      $.fn.animateNumbers && $('[data-init="animate-number"], .animate-number').each(function () {
        var data = $(this).data();
        $(this).animateNumbers(data.value, true, parseInt(data.animationDuration, 10));
      });
    } else {
      // Output to console
      console.log('Error E01: $.fn.animateNumbers is not function');
    }

    $('[data-init="animate-progress-bar"], .animate-progress-bar').each(function () {
      var data = $(this).data();
      $(this).css('width', data.percentage);
    });
  };

  /** @function initCustomSelect2Plugin
   * @description Initialize select2 dropdown
   * @param {(Element|JQuery)} [context] - A DOM Element, Document, or jQuery to use as context.
   * @requires select2.js version 4.0.x
   */
  Limitless.prototype.initSelect2Plugin = function (context) {
    // Use the jQuery.isFunction() method to see if $.fn.someMethod is indeed a function
    if ((typeof $.fn.select2 !== 'undefined' && $.isFunction($.fn.select2))) {
      $.fn.select2 && $('.select2', context).each(function () {
        $(this).select2({
          minimumResultsForSearch: ($(this).attr('data-search-select2') == 'true' ? 1 : -1),
          dropdownParent: $('.content-wrapper'),
          containerCssClass: 'text-teal-400 border-teal-400 border-2',
          dropdownCssClass: 'border-teal-400 zindex1060',
          theme: 'bootstrap',
          width: '100%'
        });
      });
    } else {
      // Output to console
      console.log('Error E02: $.fn.select2 is not function');
    }
  };

  /**
   * Uniform css styled
   * @requires Jquery Uniform Plugin
   */
  Limitless.prototype.componentUniform = function () {
    // Use the jQuery.isFunction() method to see if $.fn.someMethod is indeed a function
    if (typeof $.fn.uniform !== 'undefined' && $.isFunction($.fn.uniform)) {
      $.fn.uniform && $('.form-input-styled').uniform({
        fileButtonClass: 'action btn bg-pink-400'
      });
    } else {
      // Output to console
      console.log('Error E03: $.fn.uniform is not function');
    }
  };

  /**
   * Call initializers
   */
  Limitless.prototype.init = function () {
    // init layout
    this.initProgress();
    // init plugins
    this.initTooltipPlugin();
    this.initSelect2Plugin();
    this.componentUniform();
  };

  $.Limitless = new Limitless();
  $.Limitless.Constructor = Limitless;

})(window.jQuery);

/** 00. Initialize layouts and plugins
 ========================================================================*/
$(function () {

  'use strict';

  // Initialize layouts and plugins
  $.Limitless.init();

});

/** 00. TASK MANAGER
 ========================================================================*/

$(function () {

  $('.taskheader').click(function () {
    $header = $(this);
    //getting text element
    $text = $header.children('span.collapsetask');
    //getting the next element
    $content = $header.next().next();
    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
    $content.slideToggle(500, function () {
      //execute this after slideToggle is done
      //change text of header based on visibility of content div
      $text.text(function () {
        //change text based on condition
        return $content.is(':visible') ? '-' : '+';
      });
    });
  });

});

/** 00. Bootstrap 4: Keep selected tab on page refresh
 ========================================================================*/

$(function () {
  'use strict';

  $('#responsiveTabs a').click(function (event) {
    event.preventDefault();
    $(this).tab('show');
  });

  /**
   * On load of the page: switch to the currently selected tab
   * @type {string}
   */
  var hash = window.location.hash;
  $('#responsiveTabs a[href="' + hash + '"]').tab('show');

  /**
   * Hash on clicking a tab
   */
  $(document).on('show.bs.tab', '#responsiveTabs [data-toggle="tab"]', function (event) {
    // store the currently selected tab in the hash value
    var id = $(event.target).attr('href').substr(1);
    window.location.hash = id;

  });
});

