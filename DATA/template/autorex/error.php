<?php
include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header_blank.php';
if ($PAGE_ACTIVE) {
	echo '<div class="alert alert-danger">' . $tl["general_error"]["generror2"] . '</div>';
}
?>

	<!-- ERROR SECTION -->
	<section class="error-section" style="background-image:url(/_files/image/bg-404.jpg)">
		<div class="auto-container">
			<div class="content">
				<h1>ERROR</h1>
				<h2><?= $PAGE_CONTENT ?></h2>
				<div class="text">Litujeme, ale stránka, kterou hledáte, neexistuje</div>
				<a href="<?= BASE_URL ?>" class="theme-btn btn-style-one">Domovská stránka</a>
			</div>
		</div>
	</section>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer_blank.php'; ?>