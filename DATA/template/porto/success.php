<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

	<!-- SUCCESS SECTION -->
	<section class="pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<hr class="tall">
					<h3 class="text-uppercase">
						<a href="<?= $_SERVER['HTTP_REFERER'] ?>"><?= $tl["global_text"]["gtxt7"] ?></a></h3>
					<hr class="tall">
				</div>
			</div>
		</div>
	</section>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>