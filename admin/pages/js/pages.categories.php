<script src="assets/js/catorder.js" type="text/javascript"></script>
<script src="assets/js/slug.js" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function () {

		$("#jak_name").keyup(function () {
			// Checked, copy values
			$("#jak_varname").val(jakSlug($("#jak_name").val()));
		});

		/* Bootstrap Icon Picker
		$('.iconpicker').iconpicker({
			iconset: 'fontawesome',
			icon: '<?php if (isset($JAK_FORM_DATA["catimg"])) { echo $JAK_FORM_DATA["catimg"]; } else { echo 'fa-font'; }?>',
			searchText: '<?php echo $tl["placeholder"]["p4"]; ?>',
			arrowPrevIconClass: 'fa fa-chevron-left',
			arrowNextIconClass: 'fa fa-chevron-right',
			rows: 5,
			cols: 6,
		});
		$('.iconpicker').on('change', function(e) {
			$("#jak_img").val(e.icon);
		});
		 */

		/* Copy Value */
		$("#copy1").click(function () {
			$("#jak_editor_light_meta_desc").val($("#content").val());
		});
	});
</script>
