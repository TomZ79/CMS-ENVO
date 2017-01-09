<script type="text/javascript">
	$(document).ready(function () {

		/* Check all checkbox */
		$("#jak_delete_all").click(function () {
			var checkedStatus = this.checked;
			$(".highlight").each(function () {
				$(this).prop('checked', checkedStatus);
			});
			$('#button_delete').prop('disabled', function(i, v) { return !v; });
		});

		/* Disable submit button if checkbox is not checked */
		$(".highlight").change(function() {
			if(this.checked) {
				$("#button_delete").removeAttr("disabled");
			} else {
				$("#button_delete").attr("disabled", "disabled");
			}
		});

	});
</script>

<script type="text/javascript">
	$(document).ready(function () {
		/* Sticky active
		 ========================================= */
		var $stickyName= 'input[name="jak_sticky"]';
		var $stickyVal = ($('input[name="jak_sticky"]:checked').val());
		if ($stickyVal == '1') {
			$('tr.disablerow').addClass('warning');
			$('tr.disablerow select').attr("disabled", "disabled");
		}
		$($stickyName).change(
			function(){
				if ($(this).is(':checked') && $(this).val() == '1') {
					$('tr.disablerow').addClass('warning');
					$('tr.disablerow button').addClass('disabled');
				} else {
					$('tr.disablerow').removeClass('warning');
					$('tr.disablerow select').removeAttr("disabled");
					$('tr.disablerow button').removeClass('disabled');
				}
			}
		);

		/* DateTimePicker
		 ========================================= */
		$('#datepickerFrom').datetimepicker({
			// Language
			locale: '<?php echo $site_language;?>',
			// Date-Time format
			format: 'YYYY-MM-DD HH:mm',
			// Show Button
			showTodayButton: true,
			showClear: true,
			// Other
			ignoreReadonly: true,
			keepInvalid: true,
			minDate: <?php if ($JAK_FORM_DATA["startdate"]) echo "'" . date("Y-m-d H:i", $JAK_FORM_DATA["startdate"]) . "'"; else echo 'moment()'; ?>
		});

		$('#datepickerTo').datetimepicker({
			// Language
			locale: '<?php echo $site_language;?>',
			// Date-Time format
			format: 'YYYY-MM-DD HH:mm',
			// Show Button
			showTodayButton: true,
			showClear: true,
			// Other
			ignoreReadonly: true,
			minDate: <?php if ($JAK_FORM_DATA["startdate"]) echo "'" . date("Y-m-d H:i", $JAK_FORM_DATA["startdate"]) . "'"; else echo 'moment()'; ?>,
			useCurrent: false //Important! See issue #1075
		});

		$("#datepickerFrom").on("dp.change", function (e) {
			$('#datepickerTo').data("DateTimePicker").minDate(e.date);
		});
		$("#datepickerTo").on("dp.change", function (e) {
			$('#datepickerFrom').data("DateTimePicker").maxDate(e.date);
		});

	});
</script>