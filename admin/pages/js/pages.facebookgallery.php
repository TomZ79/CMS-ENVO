<?php
// Load FileInput Jquery Plugin  - only for selected pages
if ($page1 == 'newfacebook') {
?>
<script src="assets/plugins/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-fileinput/js/locales/cz.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-fileinput/themes/fa/theme.js" type="text/javascript"></script>
<script>
	$(document).on("ready", function () {
		$("#images").fileinput({
			theme: 'fa',
			language: 'cz',
			maxFileSize: 4500,
			allowedFileExtensions: ['jpg', 'png', 'gif'],
			uploadAsync: false,
			uploadUrl: "ajax/uploadfacebook.php", // your upload server url
			maxFileCount: 3,
			layoutTemplates: {
				main1: '{preview}\n' +
				'<div class="input-group {class}">\n' +
				'   <div class="input-group-btn">\n' +
				'       {browse}\n' +
				'       {upload}\n' +
				'       {remove}\n' +
				'   </div>\n' +
				'   {caption}\n' +
				'</div>',
				actions: '<div class="file-actions">\n' +
				'    <div class="file-footer-buttons">\n' +
				'        {upload} {delete} {zoom} {other}' +
				'    </div>\n' +
				'    {drag}\n' +
				'    <div class="file-upload-indicator" title="{indicatorTitle}">{indicator}</div>\n' +
				'    <div class="clearfix"></div>\n' +
				'</div>'
			},
		});
	});
</script>
<?php } ?>

<script>
	/* Toggle list and grid view */
	$('.btn-toggle').click(function () {
		$('.toggle').toggleClass('hidden visible');
		$('.btn-toggle i').toggleClass("fa-th-list fa-th");
	});
</script>

<style type="text/css">
	.gridview {
		display: block;
		padding: 4px;
		margin-bottom: 20px;
		line-height: 1.42857143;
		background-color: #fff;
		border: 1px solid #ddd;
		border-radius: 4px;
	}

	.gridview .caption {
		padding: 9px;
		color: #333;
	}

	.center-cropped {
		width: 100%;
		height: 150px;
		overflow: hidden;
	}

	.center-cropped img {
		width: 100%;
		top: 50%;
		position: relative;
	}

	.hovereffect.gridview {
		float: left;
		overflow: hidden;
		position: relative;
		cursor: default;
		text-align: left;
	}

	.hovereffect.gridview img {
		display: block;
		-webkit-transition: all .4s linear;
		transition: all .4s linear;
	}

	.hovereffect.gridview:hover img {
		top: 0;
		left: 0;
		-ms-transform: scale(1.2);
		-webkit-transform: scale(1.2);
		transform: scale(1.2);
	}

	/* USER LIST TABLE */
	.image-list tbody td > img {
		position: relative;
		max-width: 65px;
		float: left;
		margin-right: 15px;
	}

	.image-list tbody td .image-link {
		display: block;
		font-size: 1.25em;
		padding-top: 3px;
		margin-left: 60px;
	}

	.image-list tbody td .text-subhead {
		font-size: 0.875em;
		font-style: italic;
	}

	/* TABLES */
	.table {
		border-collapse: separate;
	}

	.table tbody > tr > td {
		background: #f5f5f5;
		border-top: 10px solid #fff;
		vertical-align: middle;
		padding: 12px 8px;
	}

	.table tbody > tr > td:first-child,
	.table thead > tr > th:first-child {
		padding-left: 30px;
	}

	.table > tbody > tr:hover > td {
		background-color: #eee;
	}

	.table > tbody > tr > td {
		-webkit-transition: background-color 0.15s ease-in-out 0s;
		transition: background-color 0.15s ease-in-out 0s;
	}

</style>