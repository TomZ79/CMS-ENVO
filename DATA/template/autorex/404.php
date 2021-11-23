<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header_blank.php'; ?>

	<!-- 404 SECTION -->
	<section class="error-section" style="background-image:url(/_files/image/bg-404.jpg)">
		<div class="auto-container">
			<div class="content">
				<h1><?= $tlautorex["error_text"]["et"] ?></h1>
				<h2><?= $tlautorex["error_text"]["et2"] ?></h2>
				<div class="text"><?= $tlautorex["error_text"]["et3"] ?></div>
				<a href="<?= BASE_URL ?>" class="theme-btn btn-style-one"><?= $tlautorex["error_text"]["et4"] ?></a>
			</div>
		</div>
	</section>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer_blank.php'; ?>