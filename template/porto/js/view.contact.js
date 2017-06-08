/*
 Name: 			View - Contact
 Written by: 	Okler Themes - (http://www.okler.net)
 Theme Version:	5.7.2
 */

(function ($) {

  'use strict';

  /*
   Contact Form: Basic
   */
  $('#contactForm').validate({
    invalidHandler: function (form, validator) {
      var errors = validator.numberOfInvalids();
      if (errors) {
        // var firstInvalidElement = $(validator.errorList[0].element);
        // $('html,body').scrollTop(firstInvalidElement.offset().top - 200);
        // firstInvalidElement.focus();
        $('html, body').animate({
          scrollTop: $(validator.errorList[0].element).offset().top - 200
        }, 500);
      }
    },
    ignore: ".ignore", // Important for reCaptcha v2 - ignores hidden fields
    rules: {
      name: {
        required: true
      },
      email: {
        required: true,
        email: true
      },
      phone: {
        required: true,
        number: true,
        minlength: 8,
        maxlength: 20
      },
      subject: {
        required: false
      },
      message: {
        required: true
      },
      hiddenRecaptcha: {
        required: function () {
          if (grecaptcha.getResponse() == '') {
            return true;
          } else {
            return false;
          }
        }
      }
    },
    messages: {
      name: "Zadejte celé jméno",
      email: {
        required: "Zadejte Vaši emailovou adresu",
        email: "Správný formát - xxxx@domena.cz"
      },
      phone: "Zadejte Vaše telefonní číslo",
      message: "Zadejte zprávu, kterou nám chcete odeslat",
      hiddenRecaptcha: {
        required: "Jste si jistý, že nejste robot?"
      }
    },

    submitHandler: function (form) {

      var $form = $(form),
        $messageSuccess = $('#contactSuccess'),
        $messageError = $('#contactError'),
        $submitButton = $(this.submitButton),
        $errorMessage = $('#mailErrorMessage');

      $submitButton.button('loading');

      // Ajax Submit
      $.ajax({
        type: 'POST',
        url: $form.attr('action'),
        data: {
          name: $form.find('#name').val(),
          email: $form.find('#email').val(),
          phone: $form.find('#phone').val(),
          subject: $form.find('#subject').val(),
          message: $form.find('#message').val()
        }
      }).always(function (data, textStatus, jqXHR) {

        $errorMessage.empty().hide();

        if (data.response == 'success') {

          $messageSuccess.removeClass('hidden');
          $messageError.addClass('hidden');

          // Reset Form
          $form.find('.form-control')
            .val('')
            .blur()
            .parent()
            .removeClass('has-success')
            .removeClass('has-error')
            .find('label.error')
            .remove();

          if (($messageSuccess.offset().top - 200) < $(window).scrollTop()) {
            $('html, body').animate({
              scrollTop: $messageSuccess.offset().top - 200
            }, 300);
          }

          $submitButton.button('reset');

          return;

        } else if (data.response == 'error' && typeof data.errorMessage !== 'undefined') {
          $errorMessage.html(data.errorMessage).show();
        } else {
          $errorMessage.html(data.responseText).show();
        }

        $messageError.removeClass('hidden');
        $messageSuccess.addClass('hidden');

        if (($messageError.offset().top - 200) < $(window).scrollTop()) {
          $('html, body').animate({
            scrollTop: $messageError.offset().top - 200
          }, 500);
        }

        $form.find('.has-success')
          .removeClass('has-success');

        $submitButton.button('reset');

        grecaptcha.reset();

      });
    }
  });

}).apply(this, [jQuery]);