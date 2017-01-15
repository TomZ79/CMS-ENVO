<script type="text/javascript">
	$(document).ready(function () {

		/* Check all checkbox */
		$("#jak_delete_all").click(function () {
			var checkedStatus = this.checked;
			$(".highlight").each(function () {
				$(this).prop('checked', checkedStatus);
			});
			$('#button_delete').prop('disabled', function (i, v) {
				return !v;
			});
		});

		/* Disable submit button if checkbox is not checked */
		$(".highlight").change(function () {
			if (this.checked) {
				$("#button_delete").removeAttr("disabled");
			} else {
				$("#button_delete").attr("disabled", "disabled");
			}
		});

	});
</script>
