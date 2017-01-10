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

		/* DateTimePicker
		 =========================================
		 $('#datepicker').datetimepicker({
		 // Language
		 locale: '<?php echo $site_language;?>',
		 // Date-Time format
		 format: 'YYYY-MM-DD',
		 // Show Button
		 showTodayButton: true,
		 showClear: true,
		 // Other
		 ignoreReadonly: true,
		 keepInvalid: true,
		 minDate: moment()
		 });
		 */

	});
</script>

<style>
	.label-indicator-absolute {
		position: relative;
	}

	.label-indicator-absolute .password-indicator-label-absolute {
		position: absolute;
		top: 50%;
		margin-top: -9px;
		right: 7px;
		-webkit-transition: all 0.2s ease-in-out;
		-o-transition: all 0.2s ease-in-out;
		transition: all 0.2s ease-in-out;
	}
</style>
