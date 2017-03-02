<script src="assets/plugins/ace/ace.js" type="text/javascript"></script>
<script type="text/javascript">

	/* ACE Editor
	 ========================================= */
	<?php if ($jkv["adv_editor"]) { ?>
	if ($('#htmleditor').length) {
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
		// This is to remove following warning message on console:
		// Automatically scrolling cursor into view after selection change this will be disabled in the next version
		// set editor.$blockScrolling = Infinity to disable this message
		htmlACE.$blockScrolling = Infinity;

		texthtml = $("#jak_editor").val();
		htmlACE.session.setValue(texthtml);
	}
	<?php } ?>

	if ($('#javaeditor').length) {
		var jsACE = ace.edit("javaeditor");
		jsACE.setTheme("ace/theme/chrome");
		jsACE.session.setMode("ace/mode/html");
		textjs = $("#jak_javascript").val();
		jsACE.session.setValue(textjs);
	}

	if ($('#csseditor').length) {
		var cssACE = ace.edit("csseditor");
		cssACE.setTheme("ace/theme/chrome");
		cssACE.session.setMode("ace/mode/html");
		textcss = $("#jak_css").val();
		cssACE.session.setValue(textcss);
	}

	/* Other config
	 ========================================= */
	$(document).ready(function () {

		$("#addCssBlock").click(function () {
			cssACE.insert(insert_cssblock());
		});
		$("#addJavascriptBlock").click(function () {
			jsACE.insert(insert_javascript());
		});

	});

	/* Responsive Filemanager
	 ========================================= */
	function responsive_filemanager_callback(field_id) {

		if (field_id == "csseditor" || field_id == "javaeditor" || field_id == "htmleditor") {

			// get the path for the ace file
			var acefile = jQuery('#' + field_id).val();

			if (field_id == "csseditor") {
				cssACE.insert('<link rel="stylesheet" href="' + acefile + '" type="text/css" />');
			} else if (field_id == "javaeditor") {
				jsACE.insert('<script src="' + acefile + '"><\/script>');
			} else {
				htmlACE.insert(acefile);
			}
		}
	}

	/* Submit Form
	 ========================================= */
	$('form').submit(function () {
		$("#jak_css").val(cssACE.getValue());
		$("#jak_javascript").val(jsACE.getValue());
		<?php if ($jkv["adv_editor"]) { ?>
		if ($('#jak_editor').length) {
			$("#jak_editor").val(htmlACE.getValue());
		}
		<?php } ?>
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
