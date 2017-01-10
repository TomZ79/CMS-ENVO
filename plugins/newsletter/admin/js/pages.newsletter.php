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

<script type="text/javascript">
	$(document).ready(function () {

		$('.nlprev').on('click', function (e) {
			e.preventDefault();
			frameSrc = $(this).attr("href");
			$('#JAKModalLabel').html("FileManager");
			$('#JAKModal').on('show.bs.modal', function () {
				$('#JAKModal .modal-body').html('<iframe src="' + frameSrc + '" width="100%" height="400" frameborder="0">');
			});
			$('#JAKModal').on('hidden.bs.modal', function () {
				$('#JAKModal .modal-body').html("");
			});
			$('#JAKModal').modal({show: true});
		});

		$(".nlTheme").click(function () {

			if (!confirm('<?php echo $tlnl["nletter"]["skin"];?>')) return false;

			$.ajax({
				type: "POST",
				url: '../plugins/newsletter/admin/ajax/loadskin.php',
				data: "skinUrl=" + $(this).attr("id"),
				dataType: 'json',
				beforeSend: function (x) {
					$('#loader').show();
				},
				success: function (msg) {

					$('#loader').hide();

					if (parseInt(msg.status) != 1) {
						return false;

					} else {

						tinymce.activeEditor.insertContent(msg.rcontent);
					}

				}
			});

		});
	});
</script>

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

		/*  */
		$('.nlbox').on('click', function (e) {
			e.preventDefault();
			frameSrc = $(this).attr("href");
			$('#JAKModalLabel').html("FileManager");
			$('#JAKModal').on('show.bs.modal', function () {
				$('#JAKModal .modal-body').html('<iframe src="' + frameSrc + '" width="100%" height="400" frameborder="0">');
			});
			$('#JAKModal').on('hidden.bs.modal', function () {
				$('#JAKModal .modal-body').html("");
			});
			$('#JAKModal').modal({show: true});
		});

	});
</script>

<!-- JavaScript to disable send button and show loading.gif image -->
<script type="text/javascript">
	$(document).ready(function () {
		// onclick
		$("input:submit").click(function () {
			$("#loader").show();
			$('#sendNL').val("<?php echo $tlnl["nletter"]["d31"];?>");
			$('#sendNL').attr("disabled", "disabled");
			$('.jak_form').submit();
		});
	});
</script>

<!-- JavaScript to disable send button and show loading.gif image -->
<script type="text/javascript">
	$(document).ready(function () {
		// onclick
		$("#sendTM").click(function () {
			$("#loader").show();
			$('#sendTM').val("<?php echo $tlnl["nletter"]["d31"];?>");
			$('#sendTM').attr("disabled", "disabled");
			$('.jak_form').submit();
		});
	});
</script>

<!-- JavaScript to disable send button and show loading.gif image -->
<script type="text/javascript">
	$(document).ready(function () {
		// onclick
		$("#sendNl").click(function () {
			$("#loader").show();
			$('#sendNL').val("<?php echo $tlnl["nletter"]["d31"];?>");
			$('#sendNL').attr("disabled", true);
		});
	});
</script>