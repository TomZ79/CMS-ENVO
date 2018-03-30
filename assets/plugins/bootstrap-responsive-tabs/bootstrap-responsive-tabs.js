/**
 * Responsive Tabs for Bootstrap 4
 * @type {{initialize: TabManager.initialize}}
 */
var TabManager = {
  initialize: function(parent) {
    var tabs = parent;
    var tabsHeight = tabs.innerHeight();

    if (tabsHeight >= 50) {
      while(tabsHeight > 50) {
        var children = tabs.children('li:not(:last-child)');
        var count = children.length;

        // Create the new menu item.
        var item = $(children[count-1]);
        var newMenuItem = '<a class="dropdown-item" href="' + item.children('a').attr('href') + '" data-toggle="tab">' + item.text() + '</a>';

        // Append the new menu item to the collapsed menu list.
        tabs.find('.collapsed-tabs').prepend(newMenuItem);

        // Remove the menu item from the main tab area.
        item.remove();

        tabsHeight = tabs.innerHeight();
      }
    }
    else {
      var count = 0;
      while(tabsHeight < 50 && (tabs.children('li').length > 0) && count++ < 20) {
        var collapsed = tabs.find('.collapsed-tabs').children('a');
        var count = collapsed.length;
        if (count) {
          // Create the new tab item.
          var item = $(collapsed[0]);
          var newMenuItem = "<li class='nav-item'>\n<a href='" + item.attr('href') + "' data-toggle='tab'>" + item.text() + "</a>\n</li>";

          // Insert the new tab item into the main tab area.
          tabs.children('li.collapsed-menu').before(newMenuItem);

          // Remove the tab item from the collapsed menu list.
          item.remove();

          tabsHeight = tabs.innerHeight();
        }
        else {
          break;
        }
      }
      if (tabsHeight > 50) {
        // Double chk height again.
        TabManager.initialize(parent);
      }
    }

    // Hide the collapsed menu list if no items are present.
    if (!tabs.find('.collapsed-tabs').children('a').length) {
      tabs.find('.collapsed-menu').hide();
    }
    else {
      tabs.find('.collapsed-menu').show();
    }
  }
};

$(function() {
  TabManager.initialize($('.nav-tabs-responsive'));

  $(window).resize(function() {
    TabManager.initialize($('.nav-tabs-responsive'))
  });
})