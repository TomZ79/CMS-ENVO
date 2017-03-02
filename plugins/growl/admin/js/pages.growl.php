<?php if ($jkv["adv_editor"]) { ?>
<script src="assets/plugins/ace/ace.js" type="text/javascript"></script>
<script type="text/javascript">

	// ACE editor
	<?php if ($jkv["adv_editor"]) { ?>
	var htmlACE = ace.edit("htmleditor");
	htmlACE.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
	htmlACE.session.setUseWrapMode(true);
	htmlACE.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
	htmlACE.setOptions({
		// session options
		mode: "ace/mode/html",
		tabSize: <?php echo $jkv["acetabSize"]; ?>,
		useSoftTabs: true,
		highlightActiveLine: <?php echo $jkv["aceactiveline"]; ?>,
		// renderer options
		showInvisibles: <?php echo $jkv["aceinvisible"]; ?>,
		showGutter: <?php echo $jkv["acegutter"]; ?>,
	});

	texthtml = $("#jak_editor").val();
	htmlACE.session.setValue(texthtml);
	<?php } ?>

	// Responsive Filemanager
	function responsive_filemanager_callback(field_id) {

		if (field_id == "htmleditor") {
			// get the path for the ace file
			var acefile = jQuery('#' + field_id).val();
			htmlACE.insert(acefile);
		}
	}

	// Submit Form
	$('form').submit(function () {
		$("#jak_editor").val(htmlACE.getValue());
	});
</script>
<?php } ?>

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
	$(function () {
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