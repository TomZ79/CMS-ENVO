(function () {
	nlCMS = {
		nlcms_url: ""
	}
})();

$(document).ready(function () {
	/* The following code is executed once the DOM is loaded */

	/* This flag will prevent multiple comment submits: */
	var working = false;

	/* Listening for the submit event of the form: */
	$('.envo-ajaxform').submit(function (e) {

		e.preventDefault();
		if (working) return false;

		working = true;
		var envoform = $(this);
		var button = $(this).find('.envo-submit');
		$(this).find('.form-group').removeClass("has-error");
		$(this).find('.form-group').removeClass("has-success");

		$(button).html(envoWeb.envo_submitwait);

		/* Sending the form fileds to any post request: */
		$.post(envoWeb.envo_url + nlCMS.nlcms_url, $(this).serialize(), function (msg) {

			working = false;
			$(button).html(envoWeb.envo_submit);

			if (msg.status) {

				$(envoform).find('.envo-thankyou').addClass("alert bg-success").fadeIn(1000).html(msg.html);
				$(envoform)[0].reset();

				// Fade out the form
				$(button).fadeOut().delay('500');


			} else if (msg.login) {

				window.location.replace(msg.link);

			} else {
				/*
				 /	If there were errors, loop through the
				 /	msg.errors object and display them on the page
				 /*/

				$.each(msg.errors, function (k, v) {
					$(envoform).find('label[for=' + k + ']').closest(".form-group").addClass("has-error");
				});
			}
		}, 'json');

	});

});