<?php include "header.php"; ?>

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
					if (isset($errors["e3"])) echo $errors["e3"];
					if (isset($errors["e4"])) echo $errors["e4"];?>',
			}, {
				// settings
				type: 'danger',
				delay: 5000,
			});
		}, 1000);
	</script>
<?php } ?>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
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

										<?php
										// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
										echo $htmlE->addInput ('text', 'jak_name', '', 'form-control', $JAK_FORM_DATA["name"], '');
										?>

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
											echo $htmlE->addInput ('text', 'jak_email', '', 'form-control', $JAK_FORM_DATA["email"], '');
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
											echo $htmlE->addInput ('text', 'jak_username', '', 'form-control', $JAK_FORM_DATA["username"], '');
											echo $htmlE->addInput ('hidden', 'jak_username_old', '', 'form-control', $JAK_FORM_DATA["username"], '');
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
													<option value="<?php echo $v["id"]; ?>"<?php if ($v["id"] == $JAK_FORM_DATA["usergroupid"]) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php }
											} ?>
										</select>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tl["user_box_content"]["userbc8"]; ?></strong></div>
									<div class="col-md-7">

										<?php
										// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
										echo $htmlE->addInput ('text', 'jak_backtime', 'datepicker', 'form-control', $JAK_FORM_DATA["backtime"], '', array ('readonly' => 'readonly'));
										?>

									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tl["user_box_content"]["userbc9"]; ?></strong></div>
									<div class="col-md-7">
										<select name="jak_usergroupback" class="form-control selectpicker" data-size="5">
											<option value="0"><?php echo $tl["selection"]["sel8"]; ?></option>
											<?php if (isset($JAK_USERGROUP_ALL) && is_array ($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $v) {
												if ($v["id"] != "1") { ?>
													<option value="<?php echo $v["id"]; ?>"<?php if ($v["id"] == $JAK_FORM_DATA["backtogroup"]) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php }
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
											($JAK_FORM_DATA["access"] == 1) ? $checked = 'yes' : $checked = 'no';
											echo $htmlE->addInput ('radio', 'jak_access', 'jak_access1', '', '1', $checked);
											// Arguments: for (id of associated form element), text
											echo $htmlE->addLabelFor ('jak_access1', $tl["checkbox"]["chk"]);

											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											($JAK_FORM_DATA["access"] == 0) ? $checked = 'yes' : $checked = 'no';
											echo $htmlE->addInput ('radio', 'jak_access', 'jak_access2', '', '0', $checked);
											// Arguments: for (id of associated form element), text
											echo $htmlE->addLabelFor ('jak_access2', $tl["checkbox"]["chk1"]);
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tl["user_box_content"]["userbc10"]; ?></strong></div>
									<div class="col-md-7">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
												<img src="<?php echo BASE_URL_ORIG . basename (JAK_FILES_DIRECTORY) . '/userfiles/' . $JAK_FORM_DATA["picture"]; ?>" alt="avatar" class="img-polaroid"/>
											</div>
											<div>
                        <span class="btn btn-default btn-file">
                          <span class="fileinput-new"><?php echo $tl["button"]["btn22"]; ?></span>
                          <span class="fileinput-exists"><?php echo $tl["button"]["btn16"]; ?></span>

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													echo $htmlE->addInput ('file', 'uploadpp', '', '', '', '', array ('accept' => 'image/*'));
													?>

                        </span>
												<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo $tl["button"]["btn23"]; ?></a>
											</div>
										</div>
									</div>
								</div>
								<?php if ($JAK_FORM_DATA["picture"] != "/standard.png") { ?>
									<div class="row-form">
										<div class="col-md-5"><strong><?php echo $tl["user_box_content"]["userbc11"]; ?></strong></div>
										<div class="col-md-7"><input type="checkbox" name="jak_delete_avatar"/></div>
									</div>
								<?php } ?>
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
									<div class="col-md-5"><strong><?php echo $tl["user_box_content"]["userbc12"]; ?></strong></div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if (isset($errors["e5"]) || isset($errors["e6"])) echo " has-error"; ?>">
											<div class="label-indicator-absolute">

												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												echo $htmlE->addInput ('text', 'jak_password', '', 'form-control', '', '');
												?>

												<span class="label password-indicator-label-absolute"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tl["user_box_content"]["userbc13"]; ?></strong></div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if (isset($errors["e5"]) || isset($errors["e6"])) echo " has-error"; ?>">
											<div class="label-indicator-absolute">

												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												echo $htmlE->addInput ('text', 'jak_confirm_password', '', 'form-control', '', '');
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
				<?php if (isset($JAK_HOOK_ADMIN_USER_EDIT) && is_array ($JAK_HOOK_ADMIN_USER_EDIT)) foreach ($JAK_HOOK_ADMIN_USER_EDIT as $hsue) {
					include_once APP_PATH . $hsue['phpcode'];
				}
				if ($extrafields) { ?>
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tl["user_box_title"]["userbt2"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<?php echo $extrafields; ?>
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
				<?php } ?>
			</div>
		</div>
	</form>

<?php include "footer.php"; ?>