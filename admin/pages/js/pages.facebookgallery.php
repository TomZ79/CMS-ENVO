<script>
	/* Toggle list and grid view */
	$('.button-icon').click(function(){
		$('.toggle').toggleClass('hidden visible');
		$('.button-icon i').toggleClass("fa-th-list fa-th");
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
		float:left;
		overflow:hidden;
		position:relative;
		cursor:default;
		text-align: left;
	}

	.hovereffect.gridview img {
		display:block;
		-webkit-transition:all .4s linear;
		transition:all .4s linear;
	}

	.hovereffect.gridview:hover img {
		top: 0;
		left: 0;
		-ms-transform:scale(1.2);
		-webkit-transform:scale(1.2);
		transform:scale(1.2);
	}

	.actionbutton {
		position: fixed;
		right: 0px;
		top: 54px;
		z-index: 1000;
		background: #f7f7f7;
		width: 114px;
		height: 50px;
	}
	.actionbutton button {
		margin: 10px 17px;
	}
	.button-icon {
		color: #94a7b1;
		border: 2px solid #D0D8DC;
		font-size: 14px !important;
		padding: 3px 6px 2px 6px !important;
		line-height: 20px !important;
	}
	.button-icon:hover {
		color: #26A69A;
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
	.table thead > tr > th:first-child{
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