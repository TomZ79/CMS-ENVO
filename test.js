function dialog_animation(x) {
  $(".modal .modal-dialog").attr("class", "modal-dialog " + x + "  animated");
};

$(".btn").on("click", function () {
    var bootbox_type = $("#bootbox_type").val();
    var option = {
      title: 'Modal title',
      message: '<p>One fine body&hellip;</p>'
    };

    if ((bootbox_type == "bootbox_alert") || (bootbox_type == "bootbox_alert_cb")) {
      if (bootbox_type == "bootbox_alert_cb") {
        option.callback = function (result) {
          Example.show("Bootbox Alert with callback");
        };
      }
      var dialog = bootbox.alert(option);
    } else if (bootbox_type == "bootbox_confirm") {
      option.message = '<p>Are you sure?</p>';
      option.callback = function (result) {
        Example.show("Bootbox Confirm result: " + result);
      };
      var dialog = bootbox.confirm(option);
    } else if ((bootbox_type == "bootbox_prompt") || (bootbox_type == "bootbox_prompt_dv")) {
      if ((bootbox_type == "bootbox_prompt_dv")) {
        option.value = "Bootbox";
        option.title = 'What is your real name?';
      } else {
        option.title = 'What is your name?';
      }
      option.callback = function (result) {
        if (result === null) {
          Example.show("Bootbox Prompt dismissed");
        } else {
          Example.show("Hi <b>" + result + "</b>");
        }
      };
      var dialog = bootbox.prompt(option);
    } else if (bootbox_type == "bootbox_custom") {
      option.title = "Custom title";
      option.message = "I am a custom dialog";
      option.buttons = {
        success: {
          label: "Success!",
          className: "btn-success",
          callback: function () {
            Example.show("great success");
          }
        },
        danger: {
          label: "Danger!",
          className: "btn-danger",
          callback: function () {
            Example.show("uh oh, look out!");
          }
        },
        main: {
          label: "Click ME!",
          className: "btn-primary",
          callback: function () {
            Example.show("Primary button");
          }
        }
      }
      var dialog = bootbox.dialog(option);
    }
    /*
    // not working!
    dialog
    .on('show.bs.modal', function (e) {
    var anim = $('#entrance').val();
    dialog_animation(anim);
    });
    */

// working :)
    var anim = $('#entrance').val();


    dialog.on('hide.bs.modal', function (e) {
        var anim = $('#exit').val();
        dialog_animation(anim);
      });
  });

/**
 * This tiny script just helps us demonstrate
 * what the various example callbacks are doing
 * http://bootboxjs.com
 */
$(function () {
  Example.init({
    "selector": ".bb-alert"
  });
});