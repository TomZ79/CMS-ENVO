/*
 Name: 			Send - Only Phone
 Written by: 	Bluesat.cz
 Theme Version:	Porto 5.7.2
 */

(function ($) {

  'use strict';

  /*
   Allowed number (0-9) for enter phone number in input tag
   */
  $("#phone").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
      // Allow: Ctrl+A, Command+A
      (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
      // Allow: home, end, left, right, down, up
      (e.keyCode >= 35 && e.keyCode <= 40)) {
      // let it happen, don't do anything
      return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
      e.preventDefault();
    }
  });

  /*
   Phone Form: Basic
   */
  $('#sendPhone').validate({
    ignore: ".ignore", // Important for reCaptcha v2 - ignores hidden fields
    rules: {
      phone: {
        required: true,
        number: true,
        minlength: 9,
        maxlength: 20
      }
    },
    messages: {
      phone: "Zadejte Vaše telefonní číslo ve správném formátu 123456789"
    },

    submitHandler: function (form) {

      var $form = $(form),
        $phoneSuccess = $('#phoneSuccess'),
        $phoneError = $('#phoneError'),
        $submitButton = $(this.submitButton),
        $errorMessage = $('#mailErrorMessage');

      $submitButton.button('loading');

      // Ajax Submit
      $.ajax({
        type: 'POST',
        url: $form.attr('action'),
        data: {
          phone: $form.find('#phone').val()
        }
      }).always(function (data, textStatus, jqXHR) {

        $errorMessage.empty().hide();

        if (data.response == 'success') {

          $phoneSuccess.removeClass('hidden');
          $phoneError.addClass('hidden');

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

          return;

        } else if (data.response == 'error' && typeof data.errorMessage !== 'undefined') {
          $errorMessage.html(data.errorMessage).show();
        } else {
          $errorMessage.html(data.responseText).show();
        }

        $phoneError.removeClass('hidden');
        $phoneSuccess.addClass('hidden');

        $form.find('.has-success')
          .removeClass('has-success');

        $submitButton.button('reset');

      });
    }
  });

}).apply(this, [jQuery]);