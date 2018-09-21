/*
 * CMS ENVO
 * JS for Plugin Intranet - Frontend
 * Copyright (c) 2016 - 2018 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Prototype constructor function
 * 02. Begin main menu toggle
 * 03. Bind Functions Jquery- LAYOUT OPTIONS API
 * 04. Initialize layouts and plugins
 * 05. Bootstrap 3: Keep selected tab on page refresh
 * 06. Bootstrap Tooltip
 * 07. Bootstrap Table Search
 * 08. Task manager
 *
 */


/** 01. PROTOTYPE CONSTRUCTOR FUNCTION
 ========================================================================*/

(function ($) {

  'use strict';

  var Webarch = function () {
    this.VERSION = "2.8.1";
    this.AUTHOR = "Revox and Bluesat";
    this.SUPPORT = "support@revox.io and bluesatkv@gmail.com";
    this.$body = $('body');
    //COLORS
    this.color_green = "#27cebc";
    this.color_blue = "#00acec";
    this.color_yellow = "#FDD01C";
    this.color_red = "#f35958";
    this.color_grey = "#dce0e8";
    this.color_black = "#1b1e24";
    this.color_purple = "#6d5eac";
    this.color_primary = "#6d5eac";
    this.color_success = "#4eb2f5";
    this.color_danger = "#f35958";
    this.color_warning = "#f7cf5e";
    this.color_info = "#3b4751";
  };

  /**
   * Page preloader
   * @require: Pace
   */
  Webarch.prototype.initPagePreloader = function () {
    $(window).on('load', function () {
      if ($('body > .pageload').length) {
        if ($('body').hasClass('page-loaded')) {
          return;
        }
        $('body').addClass('page-loaded').removeClass('page-loading').removeAttr('style');
        $('body > .pageload').fadeOut();
      }
    });
  };

  /**
   * Tooltip
   * @require: Bootstrap v3
   */
  Webarch.prototype.initTooltipPlugin = function () {
    $.fn.tooltip && $('[data-toggle="tooltip"]').tooltip();
  };

  /**
   * Popover
   * @require: Bootstrap v3
   */
  Webarch.prototype.initPopoverPlugin = function () {
    $.fn.popover && $('[data-toggle="popover"]').popover();
  };

  /**
   * Auto Scroll Up
   */
  Webarch.prototype.initScrollUp = function () {
    $('[data-webarch="scrollup"]').click(function () {
      $("html, body").animate({
        scrollTop: 0
      }, 700);
      return false;
    });
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $('[data-webarch="scrollup"]').fadeIn();
      } else {
        $('[data-webarch="scrollup"]').fadeOut();
      }
    });
  };

  /**
   * Portlet / Panel Tools
   */
  Webarch.prototype.initPortletTools = function () {
    var $this = this;
    $('.grid .tools a.remove').on('click', function () {
      var removable = jQuery(this).parents(".grid");
      if (removable.next().hasClass('grid') || removable.prev().hasClass('grid')) {
        jQuery(this).parents(".grid").remove();
      } else {
        jQuery(this).parents(".grid").parent().remove();
      }
    });


    $('.grid .tools .collapse, .grid .tools .expand').on('click', function () {
      var el = jQuery(this).parents(".grid").children(".grid-body");
      if (jQuery(this).hasClass("collapse")) {
        jQuery(this).removeClass("collapse").addClass("expand");
        el.slideUp(200);
      } else {
        jQuery(this).removeClass("expand").addClass("collapse");
        el.slideDown(200);
      }
    });
    $('.widget-item > .controller .remove').click(function () {
      $(this).parent().parent().parent().addClass('animated fadeOut');
      $(this).parent().parent().parent().attr('id', 'id_remove_temp_id');
      setTimeout(function () {
        $('#id_remove_temp_id').remove();
      }, 400);
    });

    $('.tiles .controller .remove').click(function () {
      $(this).parent().parent().parent().parent().addClass('animated fadeOut');
      $(this).parent().parent().parent().parent().attr('id', 'id_remove_temp_id');
      setTimeout(function () {
        $('#id_remove_temp_id').remove();
      }, 400);
    });
    if (!jQuery().sortable) {
      return;
    }
    $(".sortable").sortable({
      connectWith: '.sortable',
      iframeFix: false,
      items: 'div.grid',
      opacity: 0.8,
      helper: 'original',
      revert: true,
      forceHelperSize: true,
      placeholder: 'sortable-box-placeholder round-all',
      forcePlaceholderSize: true,
      tolerance: 'pointer'
    });
  };

  /**
   * Scrollbar Plugin
   */
  Webarch.prototype.initScrollBar = function () {
    $.fn.scrollbar && $('.scroller').each(function () {
      var h = $(this).attr('data-height');
      $(this).scrollbar({
        ignoreMobile: true
      });
      if (h != null || h != "") {
        if ($(this).parent('.scroll-wrapper').length > 0)
          $(this).parent().css('max-height', h);
        else
          $(this).css('max-height', h);
      }
    });
  };

  /**
   * Sidebar
   */
  Webarch.prototype.initSideBar = function () {
    var sidebar = $('.page-sidebar');
    var sidebarWrapper = $('.page-sidebar .page-sidebar-wrapper');
    sidebar.find('li > a').on('click', function (e) {
      if ($(this).next().hasClass('sub-menu') === false) {
        return;
      }
      var parent = $(this).parent().parent();
      parent.children('li.open').children('a').children('.arrow').removeClass('open');
      parent.children('li.open').children('a').children('.arrow').removeClass('active');
      parent.children('li.open').children('.sub-menu').slideUp(200);
      parent.children('li').removeClass('open');

      var sub = jQuery(this).next();
      if (sub.is(":visible")) {
        jQuery('.arrow', jQuery(this)).removeClass("open");
        jQuery(this).parent().removeClass("active");
        sub.slideUp(200, function () {
        });
      } else {
        jQuery('.arrow', jQuery(this)).addClass("open");
        jQuery(this).parent().addClass("open");
        sub.slideDown(200, function () {
        });
      }
      e.preventDefault();
    });
    //Auto close open menus in Condensed menu
    if (sidebar.hasClass('mini')) {
      var elem = jQuery('.page-sidebar ul');
      elem.children('li.open').children('a').children('.arrow').removeClass('open');
      elem.children('li.open').children('a').children('.arrow').removeClass('active');
      elem.children('li.open').children('.sub-menu').slideUp(200);
      elem.children('li').removeClass('open');
    }
    $.fn.scrollbar && sidebarWrapper.scrollbar();
  };

  /**
   * Sidebar Toggler
   */
  Webarch.prototype.initSideBarToggle = function () {
    var $this = this;
    $('[data-webarch="toggle-left-side"]').on('touchstart click', function (e) {
      e.preventDefault();
      $this.toggleLeftSideBar();
    });
  };

  /**
   * Left Side Bar / Mobile
   */
  Webarch.prototype.toggleLeftSideBar = function () {
    var timer;
    if ($('body').hasClass('open-menu-left')) {
      $('body').removeClass('open-menu-left');
      timer = setTimeout(function () {
        $('.page-sidebar').removeClass('visible');
      }, 300);

    }
    else {
      clearTimeout(timer);
      $('.page-sidebar').addClass('visible');
      setTimeout(function () {
        $('body').addClass('open-menu-left');
      }, 50);
    }
  };

  /**
   * Util Functions
   */
  Webarch.prototype.initUtil = function () {
    $('[data-height-adjust="true"]').each(function () {
      var h = $(this).attr('data-elem-height');
      $(this).css("min-height", h);
      $(this).css('background-image', 'url(' + $(this).attr("data-background-image") + ')');
      $(this).css('background-repeat', 'no-repeat');
      if ($(this).attr('data-background-image')) {

      }
    });

    $('[data-aspect-ratio="true"]').each(function () {
      $(this).height($(this).width());
    });

    $('[data-sync-height="true"]').each(function () {
      equalHeight($(this).children());
    });

    $('[data-webarch-toggler="checkall"]').on('click', function () {
      var $el = $(this);
      var $table = $el.closest('table');
      if ($el.is(':checked')) {
        $table.find(':checkbox').attr('checked', true);
        $table.find('tr').addClass('row_selected');
      } else {
        $table.find(':checkbox').attr('checked', false);
        $table.find('tr').removeClass('row_selected');
      }
    });

    $(window).resize(function () {
      $('[data-aspect-ratio="true"]').each(function () {
        $(this).height($(this).width());
      });
      $('[data-sync-height="true"]').each(function () {
        equalHeight($(this).children());
      });

    });
    function equalHeight(group) {
      var tallest = 0;
      group.each(function () {
        var thisHeight = $(this).height();
        if (thisHeight > tallest) {
          tallest = thisHeight;
        }
      });
      group.height(tallest);
    }

    $('#my-task-list').popover({
      html: true,
      content: function () {
        return $('#notification-list').html();
      }
    });

    $('#user-options').click(function () {
      $('#my-task-list').popover('hide');
    });

    $('table th .checkall').on('click', function () {
      if ($(this).is(':checked')) {
        $(this).closest('table').find(':checkbox').attr('checked', true);
        $(this).closest('table').find('tr').addClass('row_selected');
        //$(this).parent().parent().parent().toggleClass('row_selected');
      } else {
        $(this).closest('table').find(':checkbox').attr('checked', false);
        $(this).closest('table').find('tr').removeClass('row_selected');
      }
    });
  };

  /**
   * Progress bar animation
   */
  Webarch.prototype.initProgress = function () {
    $('[data-init="animate-number"], .animate-number').each(function () {
      var data = $(this).data();
      $(this).animateNumbers(data.value, true, parseInt(data.animationDuration, 10));
    });
    $('[data-init="animate-progress-bar"], .animate-progress-bar').each(function () {
      var data = $(this).data();
      $(this).css('width', data.percentage);
    });
  };

  /**
   * Form Elements
   */
  Webarch.prototype.initFormElements = function () {
    $(".inside").children('input').blur(function () {
      $(this).parent().children('.add-on').removeClass('input-focus');
    });

    $(".inside").children('input').focus(function () {
      $(this).parent().children('.add-on').addClass('input-focus');
    });

    $(".input-group.transparent").children('input').blur(function () {
      $(this).parent().children('.input-group-addon').removeClass('input-focus');
    });

    $(".input-group.transparent").children('input').focus(function () {
      $(this).parent().children('.input-group-addon').addClass('input-focus');
    });

    $(".bootstrap-tagsinput input").blur(function () {
      $(this).parent().removeClass('input-focus');
    });

    $(".bootstrap-tagsinput input").focus(function () {
      $(this).parent().addClass('input-focus');
    });
  };

  /**
   * Call initializers
   */
  Webarch.prototype.init = function () {
    // init layout
    this.initPagePreloader();
    this.initScrollUp();
    this.initPortletTools();
    this.initSideBar();
    this.initSideBarToggle();
    this.initProgress();
    this.initFormElements();
    // init plugins
    this.initTooltipPlugin();
    this.initPopoverPlugin();
    this.initScrollBar();
    this.initUtil();
  };

  $.Webarch = new Webarch();
  $.Webarch.Constructor = Webarch;

})(window.jQuery);


/** 02. BEGIN Main Menu Toggle
 ========================================================================*/
$(function () {

  $('#layout-condensed-toggle').click(function () {
    if ($('#main-menu').attr('data-inner-menu') == '1') {
      //Do nothing
      console.log("Menu is already condensed");
    } else {
      if ($('#main-menu').hasClass('mini')) {
        $('body').removeClass('grey');
        $('body').removeClass('condense-menu');
        $('#main-menu').removeClass('mini');
        $('.page-content').removeClass('condensed');
        $('.scrollup').removeClass('to-edge');
        $('.header-seperation').show();
        //Bug fix - In high resolution screen it leaves a white margin
        $('.header-seperation').css('height', '61px');
        $('.footer-widget').show();
      } else {
        $('body').addClass('grey');
        $('#main-menu').addClass('mini');
        $('.page-content').addClass('condensed');
        $('.scrollup').addClass('to-edge');
        $('.header-seperation').hide();
        $('.footer-widget').hide();
        $('.main-menu-wrapper').scrollbar('destroy');
      }
    }
  });

});

/** 03. Bind Functions Jquery- LAYOUT OPTIONS API
 ========================================================================*/
(function ($) {

  /**
   * Show/Hide Main Menu
   */
  $.fn.toggleMenu = function () {
    var windowWidth = window.innerWidth;
    if (windowWidth > 768) {
      $(this).toggleClass('hide-sidebar');
    }
  };

  /**
   * Condense Main Menu
   */
  $.fn.condensMenu = function () {
    var windowWidth = window.innerWidth;
    if (windowWidth > 768) {
      if ($(this).hasClass('hide-sidebar')) $(this).toggleClass('hide-sidebar');

      $(this).toggleClass('condense-menu');
      $(this).find('#main-menu').toggleClass('mini');
    }
  };

  /**
   * Toggle Fixed Menu Options
   */
  $.fn.toggleFixedMenu = function () {
    var windowWidth = window.innerWidth;
    if (windowWidth > 768) {
      $(this).toggleClass('menu-non-fixed');
    }
  };

  $.fn.toggleHeader = function () {
    $(this).toggleClass('hide-top-content-header');
  };

  $.fn.toggleChat = function () {
    $.Webarch.toggleRightSideBar();
  };

  $.fn.layoutReset = function () {
    $(this).removeClass('hide-sidebar');
    $(this).removeClass('condense-menu');
    $(this).removeClass('hide-top-content-header');
    if (!$('body').hasClass('extended-layout'))
      $(this).find('#main-menu').removeClass('mini');
  };

})(jQuery);

/** 04. Initialize layouts and plugins
 ========================================================================*/
$(function () {

  'use strict';

  // Initialize layouts and plugins
  $.Webarch.init();

});

/** 05. Bootstrap 3: Keep selected tab on page refresh
 ========================================================================*/

$(function () {

  $('#keepTabs a').click(function (event) {
    event.preventDefault();
    $(this).tab('show');
  });

  /**
   * Responsive Tabs on clicking a tab
   */
  $(document).on('show.bs.tab', '.nav-tabs-responsive [data-toggle="tab"]', function (event) {
    // store the currently selected tab in the hash value
    var id = $(event.target).attr("href").substr(1);
    window.location.hash = id;

    var $target = $(event.target);
    var $tabs = $target.closest('.nav-tabs-responsive');
    var $current = $target.closest('li');
    var $next = $current.next();
    var $prev = $current.prev();

    $tabs.find('>li').removeClass('current next prev');
    $current.addClass('current');
    $prev.addClass('prev');
    $next.addClass('next');

  });

  /**
   * On load of the page: switch to the currently selected tab
   * @type {string}
   */
  var hash = window.location.hash;
  $('#keepTabs a[href="' + hash + '"]').tab('show');

  /**
   * On load of the page: Create Responsive Tabs
   * @type {void|jQuery|HTMLElement}
   */
  var $target = $('.nav-tabs-responsive');
  var $current = $target.find('li a[href="' + hash + '"]').parents('li');
  var $current = hash.length > 0 ? $target.find('li a[href="' + hash + '"]').parents('li') : $target.find('li:first-child');
  var $next = $current.next();
  var $prev = $current.prev();

  $current.addClass('current');
  $prev.addClass('prev');
  $next.addClass('next');

});

/** 06. Bootstrap Tooltip
 ========================================================================*/
$(function () {

  $('body').tooltip({
    selector: '[data-toggle="tooltipEnvo"]',
    placement: 'bottom',
    trigger: 'hover',
    container: 'body'
  });

});

/** 07. Bootstrap Table Search
 * @link: https://codepen.io/adobewordpress/pen/gbewLV
 ========================================================================*/
$(function () {

  $('[class^=searchTable]').keyup(function () {
    var searchTerm = $(this).val();
    var searchTable = $(this).attr('data-table');
    var listItem = $('#' + searchTable + ' tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('");

    $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
      return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
    });

    $('#' + searchTable + ' tbody tr').each(function(e){
      $(this).removeClass('hidden');
    });

    $('#' + searchTable + ' tbody tr').not(":containsi('" + searchSplit + "')").each(function(e){
      $(this).attr('visible','false').addClass('hidden');
    });

    $('#' + searchTable + ' tbody tr:containsi("' + searchSplit + '")').each(function(e){
      $(this).attr('visible','true');
    });

    // un-stripe table, since bootstrap striping doesn't work for filtered rows
    $('#' + searchTable).removeClass('table-striped').addClass('table-filtred');
    $('#' + searchTable + ' tbody tr:not(.hidden)').each(function (index) {
      $(this).toggleClass('stripe', !!(index & 1));
    });

    var jobCount = $('#' + searchTable + ' tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' položek');

    if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
  });
  
});

/** 08. Task manager
 ========================================================================*/

$(function () {

  $('.taskheader').click(function(){
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
