<script type="text/javascript">
	$(function() {
		// Switch buttons from "Log In" to "Forget password"
		$(".lost-pwd").click(function (e) {
			e.preventDefault();
			$(".forgotP").toggleClass('hide');
			$(".loginF").slideToggle();
		});

		$('#form-login').validate();
		$('#form-email').validate();
	})
</script>
