<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/header.php'; ?>

	<section class="pt-large pb-large light-color">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="text-center">
						<h1><?php echo $tl["general_error"]["generror6"]; ?></h1>
						<?php echo $tl["general_error"]["generror7"]; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php if ($USR_IP_BLOCKED) { ?>
	<div class="alert bg-info">
		<p><?php echo $USR_IP_BLOCKED; ?></p>
	</div>
<?php } ?>

<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/footer.php'; ?>