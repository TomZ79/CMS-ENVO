<script>
	$(document).ready(function () {
		$("a[href^='http']:not([href^='<?=BASE_URL?>'])")
			.attr({
				target: "_blank"
			})
	});
</script>
