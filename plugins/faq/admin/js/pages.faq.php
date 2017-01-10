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

<?php if ($jkv["adv_editor"]) { ?>
	<script src="js/ace/ace.js" type="text/javascript"></script>
<?php } ?>
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
	<?php if ($jkv["adv_editor"]) { ?>
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
	<?php } ?>
</script>

<script src="js/slug.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#jak_name").keyup(function () {
			// Checked, copy values
			$("#jak_varname").val(jakSlug($("#jak_name").val()));
		});

		/* Bootstrap Icon Picker */
		$('.iconpicker').iconpicker({
			iconset: 'fontawesome',
			icon: '<?php if (isset($JAK_FORM_DATA["catimg"])) {
				echo $JAK_FORM_DATA["catimg"];
			} else {
				echo 'fa-font';
			}?>',
			searchText: '<?php echo $tl["placeholder"]["p4"]; ?>',
			arrowPrevIconClass: 'fa fa-chevron-left',
			arrowNextIconClass: 'fa fa-chevron-right',
			rows: 5,
			cols: 6,
		});
		$('.iconpicker').on('change', function (e) {
			$("#jak_img").val(e.icon);
		});

	});
</script>

<script type="text/javascript" src="js/catorder.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		$(".sortable").nestedSortable({maxLevels: 2});

		$(".save-menu-plugin").on("click", function () {
			mlist = $(this).data("menu");
			serialized = $("#" + mlist).nestedSortable("serialize");

			/* Sending the form fileds to any post request: */
			var request = $.ajax({
				url: "index.php?p=faq&amp;sp=categories",
				type: "POST",
				data: serialized,
				dataType: "json",
				cache: false
			});
			request.done(function (data) {
				if (data.status == 1) {
					$("#" + mlist + " li").animate({backgroundColor: '#c9ffc9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
					$.notify({icon: 'fa fa-check-square-o', message: data.html}, {type: 'success'});
				} else {
					$("#" + mlist + " li").animate({backgroundColor: '#ffc9c9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
					$.notify({icon: 'fa fa-exclamation-triangle', message: data.html}, {type: 'danger'});
				}
			});
		});

	});
</script>