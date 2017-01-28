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
			<button type="submit" name="save" class="btn btn-success button">
				<i class="fa fa-save margin-right-5"></i>
				<?php echo $tl["button"]["btn1"]; ?> !!
			</button>
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
										<strong><?php echo $tl["hook_box_content"]["hookbc"]; ?></strong>
										<span class="star-item text-danger-800 m-l-10">*</span>
									</div>
									<div class="col-md-7">
										<div class="form-group<?php if (isset($errors["e1"])) echo " has-error"; ?> no-margin">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											echo $htmlE->addInput ('text', 'jak_name', '', 'form-control', $JAK_FORM_DATA["name"], '');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">
										<strong><?php echo $tl["hook_box_content"]["hookbc1"]; ?></strong>
										<span class="star-item text-danger-800 m-l-10">*</span>
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
									<div class="col-md-5"><strong><?php echo $tl["hook_box_content"]["hookbc2"]; ?></strong></div>
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
										<strong><?php echo $tl["hook_box_content"]["hookbc3"]; ?></strong>
										<span class="star-item text-danger-800 m-l-10">*</span>
									</div>
									<div class="col-md-7">
										<div class="form-group<?php if (isset($errors["e3"])) echo " has-error"; ?> no-margin">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											echo $htmlE->addInput ('text', 'jak_exorder', '', 'form-control', $JAK_FORM_DATA["exorder"], '', array ('maxlength' => '5'));
											?>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button type="submit" name="save" class="btn btn-success pull-right">
							<i class="fa fa-save margin-right-5"></i>
							<?php echo $tl["button"]["btn1"]; ?>
						</button>
					</div>
				</div>
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tl["hook_box_title"]["hookbt2"]; ?></h3>
					</div>
					<div class="box-body">
						<div id="htmleditor"></div>

						<?php
						// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
						echo $htmlE->addTextArea ('jak_phpcode', '', '', $JAK_FORM_DATA["phpcode"], array ('id' => 'jak_phpcode', 'class' => 'form-control hidden'));
						?>

					</div>
					<div class="box-footer">
						<button type="submit" name="save" class="btn btn-success pull-right">
							<i class="fa fa-save margin-right-5"></i>
							<?php echo $tl["button"]["btn1"]; ?>
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>

<?php include "footer.php"; ?>