<?php

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if ($PAGE_ACTIVE) {
	echo '<div class="alert alert-danger">' . $tl["general_error"]["generror2"] . '</div>';
}

?>

	<!-- ERROR SECTION -->
	<section class="pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<hr class="tall">
					<h1 class="small text-uppercase"><?= $PAGE_CONTENT ?></h1>
					<hr class="tall">
				</div>
			</div>
		</div>
	</section>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>