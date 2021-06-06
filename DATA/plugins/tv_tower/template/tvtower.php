<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=tv-tower&amp;sp=setting'; ?>

<div class="col-md-12" style="margin: 10px 0 10px 0;">

	<div class="row tvtower">
		<div class="col-md-12">
			<div class="text-center">
				<h4>V Karlovarském kraji lze přijímat programy z
					<span style="font-weight: bold;font-size: 25px;"><?= $COUNT_TVTOWER_ALL ?></span> vysílačů</h4>
			</div>
			<hr>
		</div>
		<div class="col-md-12">
			<div class="col-md-4 text-center">
				<div class="image">
					<img src="/plugins/tv_tower/assets/img/tvtower_image_01.png" class="img-responsive" alt="TV Tower" style="display: inline-block;">
				</div>
				<div class="text">
					<h3 class="title"><?= $tltt["tt_frontend_mainpage"]["ttmp"] ?></h3>
					<div class="description">Vyberte si ze všech programů jen ty, které si potřebujete naladit na Vaší TV</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1">
						<a href="/programova-nabidka/wizard" class="btn btn-info btn-block" style="width: 100%;margin-bottom:50px;"><?= $tltt["tt_frontend_mainpage"]["ttmp1"] ?></a>
					</div>
				</div>

			</div>
			<div class="col-md-4 text-center">
				<div class="image">
					<img src="/plugins/tv_tower/assets/img/tvtower_image_02.png" class="img-responsive" alt="TV Tower" style="display: inline-block;">
				</div>
				<div class="text">
					<h3 class="title"><?= $tltt["tt_frontend_mainpage"]["ttmp2"] ?></h3>
					<div class="description">Celkový seznam programů ze všech vysílačů jejichž signál lze přijmout v Karlovarském kraji</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1">
						<a href="/programova-nabidka/list" class="btn btn-info" style="width: 100%;margin-bottom:50px;"><?= $tltt["tt_frontend_mainpage"]["ttmp3"] ?></a>
					</div>
				</div>

			</div>
			<div class="col-md-4 text-center">
				<div class="image">
					<img src="/plugins/tv_tower/assets/img/tvtower_image_04.png" class="img-responsive" alt="TV Tower" style="display: inline-block;">
				</div>
				<div class="text">
					<h3 class="title"><?= $tltt["tt_frontend_mainpage"]["ttmp4"] ?></h3>
					<div class="description">Export seznamu programů do PDF ze všech vysílačů jejichž signál lze přijímat v Karlovarském kraji včetně identifikátorů ONID, NID, SID</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1">
						<a href="/programova-nabidka/export" class="btn btn-info" style="width: 100%;margin-bottom:50px;"><?= $tltt["tt_frontend_mainpage"]["ttmp5"] ?></a>
					</div>
				</div>

			</div>
		</div>
	</div>

</div>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>
