<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

	<section class="main-color pt-medium pb-medium">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="text-center">
						<h1 class="x-large"><span class="counter" data-counterend="404"><?php echo $tl["general_error"]["generror"]; ?></span></h1>
						<p class="lead"><?php echo $tl["general_error"]["generror4"]; ?></p>
						<p><?php echo $tl["general_error"]["generror5"]; ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>