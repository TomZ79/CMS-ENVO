<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if ($USR_IP_BLOCKED) { ?>

	<!-- IP USER BLOCKED -->
	<section class="pt-small pb-small dark-color">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="text-center">
						<h3 class="no-margin"><?php echo $USR_IP_BLOCKED; ?></h3>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php } ?>

	<!-- OFFLINE PAGE -->
	<section class="pt-large pb-large light-color">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="text-center">
						<h1><?php echo $tl["general_error"]["generror6"]; ?></h1>
						<p><?php echo $tl["general_error"]["generror7"]; ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>