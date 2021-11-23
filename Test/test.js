$('#codeform').submit(function (event) {
  // Prevent default action
  event.preventDefault();

  // Get form GET/POST method
  var request_method = $(this).attr("method");

  // Get form action url
  var post_url = $(this).attr("action");

  // Encode form elements for submission
  var formData = $(this).serialize();

  $.ajax({
    type: request_method,
    url: post_url,
    data: formData,
    dataType: 'json',
    encode: true,
    success: function (data) {
      // Console log
      console.log('Submission was successful.');
      console.log(data);

      if (data.status == 'success') {
        // IF DATA SUCCESS

        // Reset Form
        $('#codeform').trigger('reset');

        // Put data to 'div'
        $('#result-code').html(data.code);
        $('#result-price').html(data.price);
        $( '#result-codeform-error' ).hide();
        $('#result-codeform-success').slideDown(500);

      } else if (data.status == 'errorE02') {
        // IF DATA ERROR

        //
        $('#result-error-status').html(data.status);
        $('#result-error-msg').html(data.status_msg);
        $( '.result-codeform' ).hide();
        $('#result-codeform-error').slideDown(500);

      } else {
        // IF DATA ERROR

        //
        $('#result-error-status').html(data.status);
        $('#result-error-msg').html(data.status_msg);
        $( '.result-codeform' ).hide();
        $('#result-codeform-error').slideDown(500);

      }

    },
    error: function (data) {
      // Console log
      console.log('An error occurred.');
    },
  });

});

$('#code').keyup(function(){
  $(this).val($(this).val().toUpperCase());
});

$('#code').bind('keydown', function (event) {
  var maxLength = jQuery(this).val().length;
  switch (event.keyCode) {
    case 8:  // Backspace
    case 13: // Enter
    case 37: // Left
    case 39: // Right
    case 46: // Delete
      break;
    default:
      // allow A to Z, a to z and 0 to 9
      var regex = new RegExp("^[a-zA-Z0-9]+$");
      var key = event.key;
      if (maxLength >= 9) {
        return false;
      } else {
        if (!regex.test(key)) {
          event.preventDefault();
          return false;
        }
      }
      break;
  }
});

$( '.close' ).click(function() {
  $( '.result-codeform' ).slideUp(500);
});

$( '#find-code' ).click(function(event) {
  // Prevent default action
  event.preventDefault();

  //
  $( '.result-codeform' ).hide();
  $('#result-find-code').slideDown(500);
});