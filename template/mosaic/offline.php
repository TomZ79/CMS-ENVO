<?php include_once APP_PATH . 'template/mosaic/header.php'; ?>

	<div class="page-header">

		<!-- Heading -->
		<h1><?php echo $tl["general_error"]["generror6"]; ?></h1>

		<?php echo $tl["errorpage"]["ep"]; ?>

	</div>

<?php if ($USR_IP_BLOCKED) { ?>
	<div class="alert bg-info">
		<p><?php echo $USR_IP_BLOCKED; ?></p>
	</div>
<?php } ?>

<?php include_once APP_PATH . 'template/mosaic/footer.php'; ?>