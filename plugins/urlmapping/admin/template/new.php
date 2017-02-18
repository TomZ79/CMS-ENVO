<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page3 == "s") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["notification"]["n7"];?>',
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
				message: '<?php echo $tl["general_error"]["generror1"];?>',
			}, {
				// settings
				type: 'danger',
				delay: 10000,
			});
		}, 1000);
	</script>
<?php } ?>

<?php if ($errors) { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php if (isset($errors["e"])) echo $errors["e"];
					if (isset($errors["e1"])) echo $errors["e1"];
					if (isset($errors["e2"])) echo $errors["e2"];
					if (isset($errors["e3"])) echo $errors["e3"];?>',
			}, {
				// settings
				type: 'danger',
				delay: 10000,
			});
		}, 1000);
	</script>
<?php } ?>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<!-- Fixed Button for save form -->
		<div class="savebutton">

			<?php
			// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
			echo $htmlE->addButtonSubmit('save', '', 'btn btn-success button', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ');
			?>

		</div>

		<!-- Form Content -->
		<div class="row">
			<div class="col-md-6">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tlum["url_box_title"]["urlbt"]; ?></h3>
					</div>
					<div class="box-body boxbody-height110">
						<div class="form-group no-margin<?php if (isset($errors["e1"]) || isset($errors["e2"])) echo " has-error"; ?>">

							<?php
							// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
							echo $htmlE->addInput ('text', 'jak_oldurl', '', 'form-control', $_REQUEST["jak_oldurl"], '');
							?>

						</div>
					</div>
					<div class="box-footer">

						<?php
						// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
						echo $htmlE->addButtonSubmit('save', '', 'btn btn-success pull-right', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"]);
						?>

					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tlum["url_box_title"]["urlbt1"]; ?></h3>
					</div>
					<div class="box-body boxbody-height110">
						<div class="form-group no-margin<?php if (isset($errors["e1"]) || isset($errors["e3"])) echo " has-error"; ?>">

							<?php
							// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
							echo $htmlE->addInput ('text', 'jak_newurl', '', 'form-control', $_REQUEST["jak_newurl"], '');
							?>

						</div>
						<table class="table">
							<tr>
								<td style="vertical-align: middle">

									<?php
									// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
									// Add Html Element -> endTag (Arguments: tag)
									echo $htmlE->startTag('strong') . $tlum["url_box_content"]["urlbc"] . $htmlE->endTag('strong');
									?>

								</td>
								<td>
									<div class="radio radio-success">

										<?php
										// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
										((isset($_REQUEST["jak_baseurl"]) && $_REQUEST["jak_baseurl"] == '1')) ? $checked = 'yes' : $checked = 'no';
										echo $htmlE->addInput ('radio', 'jak_baseurl', 'jak_baseurl1', '', '1', $checked);
										// Arguments: for (id of associated form element), text
										echo $htmlE->addLabelFor ('jak_baseurl1', $tl["checkbox"]["chk"]);

										// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
										((isset($_REQUEST["jak_baseurl"]) && $_REQUEST["jak_baseurl"] == '0') || !isset($_REQUEST["jak_baseurl"])) ? $checked = 'yes' : $checked = 'no';
										echo $htmlE->addInput ('radio', 'jak_baseurl', 'jak_baseurl2', '', '0', $checked);
										// Arguments: for (id of associated form element), text
										echo $htmlE->addLabelFor ('jak_baseurl2', $tl["checkbox"]["chk1"]);
										?>

									</div>
								</td>
							</tr>
						</table>
					</div>
					<div class="box-footer">

						<?php
						// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
						echo $htmlE->addButtonSubmit('save', '', 'btn btn-success pull-right', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"]);
						?>

					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tlum["url_box_title"]["urlbt2"]; ?></h3>
					</div>
					<div class="box-body">
						<div class="form-group no-margin">
							<select name="jak_redirect" class="form-control selectpicker">
								<option value="301"<?php if (isset($_REQUEST["jak_redirect"]) && $_REQUEST["jak_redirect"] == '301') { ?> selected="selected"<?php } ?>><?php echo $tlum["url_box_content"]["urlbc1"]; ?></option>
								<option value="302"<?php if (isset($_REQUEST["jak_redirect"]) && $_REQUEST["jak_redirect"] == '302') { ?> selected="selected"<?php } ?>><?php echo $tlum["url_box_content"]["urlbc2"]; ?></option>
							</select>
						</div>
					</div>
					<div class="box-footer">

						<?php
						// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
						echo $htmlE->addButtonSubmit('save', '', 'btn btn-success pull-right', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"]);
						?>

					</div>
				</div>
			</div>
		</div>
	</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>