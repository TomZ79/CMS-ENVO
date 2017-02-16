<?php
// Load 'ace.js'  - only for selected pages
if ($page1 == 'newhook' || ($page1 == 'hooks' && $page2 == 'edit')) {
	?>
	<script src="assets/plugins/ace/ace.js" type="text/javascript"></script>
<?php }
// Load 'pluginorder.js'  - only for selected pages
if ($page == 'plugins' && $page1 == '') {
	?>
	<script src="assets/js/pluginorder.js" type="text/javascript"></script>
<?php }
// Load 'pluginorder.js'  - only for selected pages
if ($page == 'plugins' && $page1 == 'sorthooks') {
?>
<script src="assets/js/hookorder.js" type="text/javascript"></script>w
<?php } ?>

<script type="text/javascript">
	<?php
	// Init ACE Editor  - only for selected pages
	if ($page1 == 'newhook' || ($page1 == 'hooks' && $page2 == 'edit')) {
	?>

	/* ACE Editor
	 ========================================= */
	if ($('#htmleditor').length) {
		var htmlefACE = ace.edit("htmleditor");
		htmlefACE.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
		htmlefACE.session.setUseWrapMode(true);
		htmlefACE.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
		htmlefACE.setOptions({
			// session options
			mode: "ace/mode/php",
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
		htmlefACE.$blockScrolling = Infinity;

		texthtmlef = $("#jak_phpcode").val();
		htmlefACE.session.setValue(texthtmlef);
	}

	/* Submit Form
	 ========================================= */
	$('form').submit(function () {
		$("#jak_phpcode").val(htmlefACE.getValue());
	});

	<?php } ?>

	/* Other config
	 ========================================= */
	$(document).ready(function () {
		// Close modal dialog from iFrame - call this by onclick="window.parent.closeModal(); from iFrame"
		window.closeModal = function () {
			$('#JAKModal').modal('hide');
		};

		// Show iFrame in modal - install and uninstall
		$('.plugInst').on('click', function (e) {
			e.preventDefault();
			frameSrc = $(this).attr("href");
			$('#JAKModalLabel').html("<?php echo ucwords ($page);?>");
			$('#JAKModal').on('show.bs.modal', function () {
				$('#JAKModal .modal-dialog').addClass('modal-w-90p');
				$('<iframe src="' + frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">').appendTo('.body-content');
			});
			$('#JAKModal').on('hidden.bs.modal', function () {
				$(this).removeData();
				window.location.reload();
			});
			$('#JAKModal').modal({show: true});
		});

		// Show iFrame in modal - help
		$('.plugHelp').on('click', function (e) {
			e.preventDefault();
			frameSrc = $(this).attr("href");
			$('#JAKModalLabel').html("<?php echo ucwords ($page);?>");
			$('#JAKModal').on('show.bs.modal', function () {
				$('#JAKModal .modal-dialog').addClass('modal-w-90p');
				$('<iframe src="' + frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">').appendTo('.body-content');
			});
			$('#JAKModal').on('hidden.bs.modal', function () {
				$(this).removeData();
				window.location.reload();
			});
			$('#JAKModal').modal({show: true});
		});

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

