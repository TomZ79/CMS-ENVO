<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (ENVO_ACCESS) $apedit = BASE_URL . 'admin/index.php?p=tv-tower&amp;sp=setting'; ?>

<div class="col-md-12" style="margin: 10px 0 10px 0;">

	<div class="row tvtower">
		<div class="col-md-12">
			<div class="col-md-4 col-md-offset-2 text-center">
				<div class="image">
					<img src="/plugins/tv_tower/assets/img/tvtower_image_04.png" class="img-responsive" alt="TV Tower" style="display: inline-block;">
				</div>
				<div class="text">
					<h3 class="title">Seznam programů</h3>
					<div class="description">Export seznamu programů do PDF ze všech vysílačů jejichž signál lze přijímat v Karlovarském kraji</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1">
						<form class="dl-list" style="width: 100%;margin-bottom:50px;" action="/plugins/tv_tower/pdf_programlist.php" target="_blank">
							<button type="submit" class="btn btn-info" style="width: 100%;margin-bottom:50px;">Exportovat do PDF</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4 text-center">
				<div class="image">
					<img src="/plugins/tv_tower/assets/img/tvtower_image_05.png" class="img-responsive" alt="TV Tower" style="display: inline-block;">
				</div>
				<div class="text">
					<h3 class="title">Identifikátory programů</h3>
					<div class="description">Export identifikátorů sítí, televizních a rozhlasových programů, ostatních služeb do PDF</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1">
						<form class="dl-list" style="width: 100%;margin-bottom:50px;" action="/plugins/tv_tower/pdf_identifiers.php" target="_blank">
							<button type="submit" class="btn btn-info" style="width: 100%;margin-bottom:50px;">Exportovat do PDF</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>
