/*
 * CMS ENVO
 * JS - Catorder - ADMIN
 * Copyright (c) 2016 - 2017 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: Thomas
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Sortable Initialisation
 * 02. Save sortable menu
 *
 */

/** 01. Sortable Initialisation
 * @require: jQuery UI Nested Sortable
 ========================================================================*/

$(function () {

  $('.sortable').nestedSortable({
    // Nested Sortable config
    // --------------------------

    // The list type used
    listType: "ul",
    // How far right or left (in pixels) the item has to travel in order to be nested or to be sent outside its current list
    tabSize: 25,
    // How long (in ms) to wait before expanding a collapsed node (useful only if isTree: true)
    expandOnHover: 700,
    // Set this to true if you want the plugin to collapse the tree on page load
    startCollapsed: false,
    // Set this to true if you want to use the new tree functionality
    isTree: true,
    // The maximum depth of nested items the list can accept. If set to '0' the levels are unlimited
    maxLevels: 5,

    // Jquery UI Sortable config
    // --------------------------

    // Size of Placeholder ( true, false )
    forcePlaceholderSize: true,
    // Restricts sort start click to the specified element
    handle: "div",
    // Specifies which items inside the element should be sortable
    items: "li",
    // Allows for a helper element to be used for dragging display ( original, clone )
    helper: "clone",
    // Defines the opacity of the helper while sorting ( From 0.01 to 1 )
    opacity: .6,
    // A class name that gets applied to the otherwise white space
    placeholder: "placeholder",
    // Whether the sortable items should revert to their new positions using a smooth animation
    revert: 250,
    // Specifies which mode to use for testing whether the item being moved is hovering over another item ( intersect, pointer )
    tolerance: "pointer"
  });

});

/** 02. Save sortable menu
 * @require: Bootstrap Notify
 ========================================================================*/

$(function () {

  $('.save-menu').on('click', function () {
    mlist = $(this).data('menu');
    serialized = $('#' + mlist).nestedSortable('serialize');

    /* Sending the form fileds to any post request: */
    var request = $.ajax({
      url: "index.php?p=categories",
      type: "POST",
      data: serialized,
      dataType: "json",
      cache: false
    });
    request.done(function (data) {

      if (data.status == 'success') {
        // IF DATA SUCCESS

        $('#' + mlist + ' li').animate({backgroundColor: '#C9FFC9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
        $.notify({icon: 'fa fa-check-square-o', message: data.html}, {type: 'success'});

      } else {
        // IF DATA ERROR

        $('#' + mlist + ' li').animate({backgroundColor: '#FFC9C9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
        $.notify({icon: 'fa fa-exclamation-triangle', message: data.html}, {type: 'danger'});

      }

    });
  });

});
