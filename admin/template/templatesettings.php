<?php include "header.php"; ?>

<?php if ($page2 == "s") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["notification"]["n7"]; ?>',
			}, {
				// settings
				type: 'success',
				delay: 5000,
			});
		}, 1000);
	</script>
<?php }
if ($page3 == "e") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["general_error"]["generror1"]; ?>',
			}, {
				// settings
				type: 'danger',
				delay: 5000,
			});
		}, 1000);
	</script>
<?php } ?>

<?php if (!isset($jkv["cms_tpl"])) { ?>
	<section class="content">
		<div class="error-page">
			<div class="error-content">
				<h3><i class="fa fa-warning text-warning-800"></i> <?php echo $tl["notetemplate"]["nh"]; ?></h3>
				<h4><?php echo $tl["notetemplate"]["n1"]; ?></h4>
				<p><?php echo $tl["notetemplate"]["n2"]; ?></p>
			</div>
		</div>
	</section>
<?php } else {

	// Include template settings from each template if exists
	$filename = '../template/' . $jkv["sitestyle"] . '/templatesettings.php';

	if (file_exists ($filename)) {
		include $filename;
	} else { ?>

		<section class="content">
			<div class="error-page">
				<div class="error-content">
					<h3>
						<i class="fa fa-warning text-warning-800"></i> <?php echo sprintf ($tl["notetemplate"]["nh1"], $jkv["sitestyle"]); ?>
					</h3>
					<?php echo sprintf ($tl["notetemplate"]["n3"], $filename); ?>
				</div>
			</div>
		</section>

	<?php }
} ?>

<?php include "footer.php"; ?>