<?php include "header.php"; ?>

<?php if ($success) { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($success["s"])) echo $success["s"];?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
	</script>
<?php }
if ($errors) { ?>
	<script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
	</script>
<?php } ?>

	<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data">
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-success">
					<div class="box-header with-border">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('h3', $tl["mtn_box_title"]["mtnbt"], 'box-title');
						?>

					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-sm-5"><strong><?= $tl["mtn_box_content"]["mtnbc"] ?></strong></div>
									<div class="col-sm-7">
										<button type="submit" name="optimize" class="btn btn-success"><?= $tl["button"]["btn13"] ?></button>
									</div>
								</div>
								<div class="row-form">
									<div class="col-sm-5"><strong><?= $tl["mtn_box_content"]["mtnbc1"] ?></strong></div>
									<div class="col-sm-7">
										<button type="submit" name="download" class="btn btn-info"><?= $tl["button"]["btn14"] ?></button>
									</div>
								</div>
								<div class="row-form">
									<div class="col-sm-5"><strong><?= $tl["mtn_box_content"]["mtnbc2"] ?></strong></div>
									<div class="col-sm-7">
										<div class="fileinput fileinput-new" data-provides="fileinput">
                      <span class="btn btn-default btn-file">
                        <span class="fileinput-new"><?= $tl["button"]["btn15"] ?></span>
                        <span class="fileinput-exists"><?= $tl["button"]["btn16"] ?></span>
                        <input type="file" name="uploaddb" accept=".xml">
                      </span>
											<span class="fileinput-filename"></span>
											<a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
										</div>
										<button type="submit" name="import" class="btn btn-warning" data-confirm="<?= $tl["mtn_notification"]["import"] ?>">
											<?= $tl["button"]["btn17"] ?>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="box box-success">
					<div class="box-header with-border">

						<?php
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('h3', $tl["mtn_box_title"]["mtnbt1"], 'box-title');
						?>

					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-sm-12"><?= sprintf($tl["mtn_box_content"]["mtnbc3"], $setting["version"]) ?></div>
								</div>
								<div class="row-form">
									<div class="col-sm-12">
										<?php include_once('include/cms_update.php'); ?>
									</div>
								</div>
							</div>
						</div>
						<p></p>

					</div>
				</div>
			</div>
		</div>
	</form>

<?php include "footer.php"; ?>