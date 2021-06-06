(function ($) {

  $.fn.disableMouse = function (options) {
    var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
    var $this = $(this);

    // Default options
    var settings = $.extend({
      // Disable mouse right click
      disableRightClick: false,
      // Disable Possibility to Copy Text and Images
      disableCopy: false,
      // Disable Possibility to Drag out Images with the Mouse from the Browser onto the Desktop
      disableImageDragging: false,
      // Disable Possibility to Keydown
      disableKey: false
    }, options);

    return this.each(function () {

      // Disable Mouse Right Click
      if (settings.disableRightClick) {
        $this.on('contextmenu', function () {
          return false;
        });
      }

      // Disable Possibility to Copy Text and Images
      if (settings.disableCopy) {
        $this.on('cut copy paste', function (e) {

          // Element that triggered a specific event
          var tag = e.target.tagName.toLowerCase();

          if (tag != 'input' && tag != 'textarea') {
            e.preventDefault();
            e.stopPropagation();
            return false;
          } else {
            return;
          }
        });

        $this.on('keydown', function (e) {

          // Element that triggered a specific event
          var tag = e.target.tagName.toLowerCase();

          if ((tag != 'input' && tag != 'textarea') && e.metaKey) {
            switch (code) {
              case 67:// Block Ctrl+C
                e.preventDefault();
                e.stopPropagation();
                break;
              case 86:// Block Ctrl+V
                e.preventDefault();
                e.stopPropagation();
                break;
              case 88:// Block Ctrl+X
                e.preventDefault();
                e.stopPropagation();
                break;
            }
          }

        });

        $this.on('contextmenu', function (e) {
          e.preventDefault();
          e.stopPropagation();
          return false;
        });

        if (isMobile) {
          $('img').on('touchstart', function (e) {
            $('img').css({
              '-webkit-touch-callout': 'none',
              '-webkit-user-select': 'none',
              'pointer-events': 'none',
              '-moz-user-select': 'none'
            });
            e.preventDefault();
            return false;
          });
        }
      }

      // Disable Possibility to Drag out Images with the Mouse from the Browser onto the Desktop
      if (settings.disableImageDragging) {
        $('img').on('contextmenu dragstart', function () {
          return false;
        });

        if (isMobile) {
          $('img').on('touchstart', function (e) {
            $('img').css({
              '-webkit-touch-callout': 'none',
              '-webkit-user-select': 'none',
              'pointer-events': 'none',
              '-moz-user-select': 'none'
            });
            e.preventDefault();
            return false;
          });
        }
      }

      // Disable Possibility Keyboard
      if (settings.disableKey) {
        $(document).on('keydown', function (e) {

          // Use either which or keyCode, depending on browser support
          var code = e.charCode || e.keyCode;
          // Element that triggered a specific event
          var tag = e.target.tagName.toLowerCase();

          // Debug
          // console.log("Unicode CHARACTER KEY code: " + code);

          if ((tag != 'input' && tag != 'textarea') && e.ctrlKey) {
            switch (code) {
              case 67:// Block Ctrl+C
                e.preventDefault();
                e.stopPropagation();
                break;
              case 86:// Block Ctrl+V
                e.preventDefault();
                e.stopPropagation();
                break;
              case 88:// Block Ctrl+X
                e.preventDefault();
                e.stopPropagation();
                break;
            }
          }
          if (e.ctrlKey) {
            switch (code) {
              case 83:// Block Ctrl+S
                break;
              case 85:// Block Ctrl+U
                e.preventDefault();
                e.stopPropagation();
                break;
              case 87:// Block Ctrl+W --Not work in Chrome
                break;
            }
          }
          if (code == 123) {
            // F12
            e.preventDefault();
            e.stopPropagation();
            return false;
          }
          if (e.ctrlKey && e.shiftKey && code == 73) {
            // Prevent from Ctrl + Shift + I
            e.preventDefault();
            e.stopPropagation();
            return false;
          }

        });
      }

    });

  };

}(jQuery));