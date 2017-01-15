<script type="text/javascript">
	$(function () {
		$('body').addClass('overflow-hidden');

		// Switch buttons from "Log In" to "Forget password"
		$(".lost-pwd").click(function (e) {
			e.preventDefault();
			$(".loginF").slideToggle();
			$(".forgotP").toggleClass('hide');
		});

		$('#form-login').validate();
		$('#form-email').validate();

		<?php if ($errorfp) { ?>
		$(".loginF").hide();
		$(".forgotP").removeClass("hide");
		$(".forgotP").addClass("shake");
		<?php } if ($ErrLogin) { ?>
		$(".loginF").addClass("shake");
		<?php } ?>
	})
</script>
