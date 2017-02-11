<?php include "header.php"; ?>

	<div class="row">
		<div class="col-md-6 col-sm-offset-3 text-center error-page">
			<h2 class="headline text-warning">404</h2>
			<div class="error-content">
				<h3><i class="fa fa-warning text-warning"></i> <?php echo $tl["error"]["404"]; ?></h3>
				<p><?php echo str_replace ("%s", BASE_URL, $tl["error"]["404_text"]); ?></p>
			</div>
		</div>
	</div>

<?php include "footer.php"; ?>