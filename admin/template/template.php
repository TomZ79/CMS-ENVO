<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
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
if ($page1 == "s1") { ?>
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

		setTimeout(function () {
			$.notify({
				// options
				icon: 'fa fa-info-circle',
				message: '<?php echo $tl["notification"]["n1"]; ?>',
			}, {
				// settings
				type: 'info',
				delay: 5000,
				timer: 3000,
			});
		}, 2000);
	</script>
<?php }
if ($page1 == "e") { ?>
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

<?php if (is_dir_empty('../template/')) { ?>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 error-page">
			<h1 class="text-warning bold"><?php echo $tl["notetemplate"]["nh"]; ?></h1>
			<div class="error-content">
				<h3><i class="fa fa-warning text-warning"></i> <?php echo $tl["notetemplate"]["n1"]; ?></h3>
				<p><?php echo $tl["notetemplate"]["n4"]; ?></p>
			</div>
		</div>
	</div>
<?php } else { ?>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<div class="row">
			<?php if (isset($site_style_files) && is_array ($site_style_files)) foreach ($site_style_files as $l) {

				if (isset($jkv["cms_tpl"])) {
					$template_addon = true;
				} else {
					$template_addon = false;
				}

				?>

				<div class="col-sm-6 col-md-12 m-b-20 row-table no-padding">
					<div class="col-md-3 col-table">
						<div class="thumbnail" style="background: rgb(217, 217, 217) none repeat scroll 0% 0%; border: medium none; border-radius: 0px; margin: 0px; padding: 24px;">
							<div class="thumbnail-container">
								<img class="img-responsive" src="../template/<?php echo $l; ?>/preview.jpg" alt="<?php echo $l; ?>"/>
							</div>
						</div>
					</div>
					<div class="col-md-9 col-table" style="background: white none repeat scroll 0% 0%;">
						<div class="caption">
							<h3><?php echo $l; ?><?php if ($jkv["sitestyle"] == $l) echo ' <i class="fa fa-check text-success-800"></i>'; ?></h3>
							<p>
								<?php
								// Content of file
								$file = APP_PATH . '/template/' . $l . "/description.txt";
								if (file_exists ($file)) {
									// File exist, get content
									$content = file_get_contents ($file);
									echo htmlspecialchars ($content);
								} else {
									// File not exist
									echo $tl["tpl_box_content"]["tplbc"];
								}
								?>
							</p>
							<p>

								<?php if ($jkv["sitestyle"] != $l && !$template_addon) { ?>
									<button value="<?php echo $l; ?>" name="save" class="btn btn-primary btn-sm"><?php echo $tl["button"]["btn5"]; ?></button>
									<a class="btn btn-info btn-sm tempSett" href="../template/<?php echo $l; ?>/help.html">
										<?php echo $tl["button"]["btn6"]; ?>
									</a>
								<?php } elseif ($jkv["sitestyle"] == $l && file_exists ('../template/' . $l . '/install.php') && !$template_addon) { ?>

									<a class="btn btn-success btn-sm tempInst" href="../template/<?php echo $l; ?>/install.php">
										<?php echo $tl["button"]["btn7"]; ?>
									</a>
									<?php if (file_exists ('../template/' . $l . '/help.html')) { ?>
										<a class="btn btn-info btn-sm tempSett" href="../template/<?php echo $l; ?>/help.html">
											<?php echo $tl["button"]["btn6"]; ?>
										</a>
									<?php } ?>

								<?php } elseif ($jkv["sitestyle"] == $l && file_exists ('../template/' . $l . '/uninstall.php') && $template_addon) {
									if (file_exists ('../template/' . $l . '/styleswitcher.php')) { ?>
										<a class="btn btn-<?php if ($jkv["styleswitcher_tpl"]) {
											echo 'success';
										} else {
											echo 'default';
										} ?> btn-sm" href="index.php?p=template&amp;sp=active&amp;ssp=<?php echo $l; ?>"><i class="fa fa-css3"></i> <?php echo $tl["button"]["btn8"]; ?>
										</a>
									<?php } ?>
									<a class="btn btn-danger btn-sm tempInst" href="../template/<?php echo $l; ?>/uninstall.php">
										<i class="fa fa-remove"></i> <?php echo $tl["button"]["btn9"]; ?>
									</a>
									<a class="btn btn-primary btn-sm <?php if (!file_exists ('../template/' . $l . '/templatesettings.php')) echo 'disabled'; ?>" href="index.php?p=template&amp;sp=settings">
										<?php echo $tl["button"]["btn10"]; ?>
									</a>
									<?php if (file_exists ('../template/' . $l . '/help.html')) { ?>
										<a class="btn btn-info btn-sm tempHelp" href="../template/<?php echo $l; ?>/help.html">
											<?php echo $tl["button"]["btn6"]; ?>
										</a>
									<?php }
								}
								else { ?>
							<div class="col-md-5">
								<div class="row">
									<div class="alert bg-danger" style="width: 100%; padding: 5px 10px; text-align: center;">
										<?php echo str_replace ("%s", $jkv["sitestyle"], $tl["tpl_box_content"]["tplbc1"]); ?>
									</div>
								</div>
							</div>
							<?php if (file_exists ('../template/' . $l . '/help.html')) { ?>
								<div class="col-md-2">
									<a class="btn btn-info btn-sm tempHelp" href="../template/<?php echo $l; ?>/help.html">
										<?php echo $tl["button"]["btn6"]; ?>
									</a>
								</div>
							<?php } ?>

							<?php } ?>

							</p>
						</div>
					</div>
				</div>

			<?php } ?>
		</div>
	</form>

<?php } ?>

<?php include "footer.php"; ?>