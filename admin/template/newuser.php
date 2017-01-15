<?php include "header.php"; ?>

<?php if ($page2 == "e") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["general_error"]["generror1"];?>',
			}, {
				// settings
				type: 'danger',
				delay: 5000,
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
				delay: 5000,
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
			<div class="col-md-6">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tl["user_box_title"]["userbt"]; ?></h3>
					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tl["user_box_content"]["userbc3"]; ?></strong></div>
									<div class="col-md-7">
										<div class="form-group no-margin">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											echo $htmlE->addInput ('text', 'jak_name', '', 'form-control', $_REQUEST["jak_name"], '');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">
										<strong><?php echo $tl["user_box_content"]["userbc4"]; ?></strong>
										<span class="star-item text-danger-800 m-l-10">*</span>
									</div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if (isset($errors["e2"])) echo " has-error"; ?>">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											echo $htmlE->addInput ('text', 'jak_email', '', 'form-control', $_REQUEST["jak_email"], '');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">
										<strong><?php echo $tl["user_box_content"]["userbc5"]; ?></strong>
										<span class="star-item text-danger-800 m-l-10">*</span>
									</div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											echo $htmlE->addInput ('text', 'jak_username', '', 'form-control', $_REQUEST["jak_username"], '');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tl["user_box_content"]["userbc6"]; ?></strong></div>
									<div class="col-md-7">
										<select name="jak_usergroup" class="form-control selectpicker" data-size="5">
											<?php if (isset($JAK_USERGROUP_ALL) && is_array ($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $v) {
												if ($v["id"] != "1") { ?>
													<option value="<?php echo $v["id"]; ?>"><?php echo $v["name"]; ?></option><?php }
											} ?>
										</select>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tl["user_box_content"]["userbc7"]; ?></strong></div>
									<div class="col-md-7">
										<div class="radio radio-success">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											((isset($_REQUEST["jak_access"]) && $_REQUEST["jak_access"] == '1') || !isset($_REQUEST["jak_access"])) ? $checked = 'yes' : $checked = 'no';
											echo $htmlE->addInput ('radio', 'jak_access', 'jak_access1', '', '1', $checked);
											// Arguments: for (id of associated form element), text
											echo $htmlE->addLabelFor ('jak_access1', $tl["checkbox"]["chk"]);

											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											((isset($_REQUEST["jak_access"]) && $_REQUEST["jak_access"] == '0')) ? $checked = 'yes' : $checked = 'no';
											echo $htmlE->addInput ('radio', 'jak_access', 'jak_access2', '', '0', $checked);
											// Arguments: for (id of associated form element), text
											echo $htmlE->addLabelFor ('jak_access2', $tl["checkbox"]["chk1"]);
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
			</div>
			<div class="col-md-6">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tl["user_box_title"]["userbt1"]; ?></h3>
					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-md-5">
										<strong><?php echo $tl["user_box_content"]["userbc12"]; ?></strong>
										<span class="star-item text-danger-800 m-l-10">*</span>
									</div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if (isset($errors["e3"])) echo " has-error"; ?>">
											<div class="label-indicator-absolute">

												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												echo $htmlE->addInput ('text', 'jak_password', '', 'form-control', $_REQUEST["jak_password"], '');
												?>

												<span class="label password-indicator-label-absolute"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">
										<strong><?php echo $tl["user_box_content"]["userbc13"]; ?></strong>
										<span class="star-item text-danger-800 m-l-10">*</span>
									</div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if (isset($errors["e3"])) echo " has-error"; ?>">
											<div class="label-indicator-absolute">
												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												echo $htmlE->addInput ('text', 'jak_confirm_password', '', 'form-control', $_REQUEST["jak_confirm_password"], '');
												?>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button type="button" class="btn btn-info generate-label-absolute">
							<?php echo $tl["button"]["btn24"]; ?>
						</button>
						<button type="submit" name="save" class="btn btn-success pull-right">
							<i class="fa fa-save margin-right-5"></i>
							<?php echo $tl["button"]["btn1"]; ?>
						</button>
					</div>
				</div>
			</div>
		</div>
		<?php if (isset($JAK_HOOK_ADMIN_USER) && is_array ($JAK_HOOK_ADMIN_USER)) foreach ($JAK_HOOK_ADMIN_USER as $hsu) {
			include_once APP_PATH . $hsu['phpcode'];
		} ?>
	</form>

<?php include "footer.php"; ?>