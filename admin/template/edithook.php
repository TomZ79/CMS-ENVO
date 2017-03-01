<?php include "header.php"; ?>

<?php if ($page4 == "s") { ?>
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
if ($page4 == "e") { ?>
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
<?php }
if ($errors) { ?>
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
		<div class="savebutton hidden-xs">

			<?php
			// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
			echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
			?>

		</div>

		<!-- Form Content -->
		<div class="row tab-content-singel">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tl["hook_box_title"]["hookbt1"]; ?></h3>
					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["hook_box_content"]["hookbc"]);
										echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
										?>

									</div>
									<div class="col-md-7">
										<div class="form-group<?php if (isset($errors["e1"])) echo " has-error"; ?> no-margin">

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html->addInput('text', 'jak_name', $JAK_FORM_DATA["name"], 'jak_name', 'form-control');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["hook_box_content"]["hookbc1"]);
										echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
										?>

									</div>
									<div class="col-md-7">
										<div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">
											<select name="jak_hook" class="form-control selectpicker" data-live-search="true" data-size="5">
												<option value="0"<?php if ($JAK_FORM_DATA["hook_name"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel7"]; ?></option>
												<?php if (isset($JAK_HOOK_LOCATIONS) && is_array ($JAK_HOOK_LOCATIONS)) foreach ($JAK_HOOK_LOCATIONS as $h) { ?>
													<option value="<?php echo $h; ?>"<?php if ($h == $JAK_FORM_DATA["hook_name"]) { ?> selected="selected"<?php } ?>><?php echo $h; ?></option><?php } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["hook_box_content"]["hookbc2"]);
										?>

									</div>
									<div class="col-md-7">
										<select name="jak_plugin" class="form-control selectpicker" data-live-search="true" data-size="5">
											<option value="0"<?php if ($JAK_FORM_DATA["pluginid"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tl["cform"]["c18"]; ?></option>
											<?php if (isset($JAK_PLUGINS) && is_array ($JAK_PLUGINS)) foreach ($JAK_PLUGINS as $p) { ?>
												<option value="<?php echo $p["id"]; ?>"<?php if ($p["id"] == $JAK_FORM_DATA["pluginid"]) { ?> selected="selected"<?php } ?>><?php echo $p["name"]; ?></option><?php } ?>
										</select>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
										echo $Html->addTag('strong', $tl["hook_box_content"]["hookbc3"]);
										echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
										?>

									</div>
									<div class="col-md-7">
										<div class="form-group<?php if (isset($errors["e3"])) echo " has-error"; ?> no-margin">

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html->addInput('text', 'jak_exorder', $JAK_FORM_DATA["exorder"], '', 'form-control', array ('maxlength' => '5'));
											?>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">

						<?php
						// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
						echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
						?>

					</div>
				</div>
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tl["hook_box_title"]["hookbt2"]; ?></h3>
					</div>
					<div class="box-body">

						<?php
						// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
						echo $Html->addDiv('', 'htmleditor');
						// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
						echo $Html->addTextarea('jak_phpcode', $JAK_FORM_DATA["phpcode"], '', '', array('id' => 'jak_phpcode', 'class' => 'form-control hidden'));
						?>

					</div>
					<div class="box-footer">

						<?php
						// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
						echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
						?>

					</div>
				</div>
			</div>
		</div>
	</form>

<?php include "footer.php"; ?>