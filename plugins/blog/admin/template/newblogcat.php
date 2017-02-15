<?php include_once APP_PATH . 'admin/template/header.php'; ?>

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
					if (isset($errors["e3"])) echo $errors["e3"];
					if (isset($errors["e4"])) echo $errors["e4"];?>',
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
			<div class="col-md-8">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tlblog["blog_box_title"]["blogbt5"]; ?></h3>
					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-md-5">
										<strong><?php echo $tlblog["blog_box_content"]["blogbc19"]; ?></strong>
										<span class="star-item text-danger-800 m-l-10">*</span>
									</div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											echo $htmlE->addInput ('text', 'jak_name', 'jak_name', 'form-control', $_REQUEST["jak_name"], '');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">
										<strong><?php echo $tlblog["blog_box_content"]["blogbc20"]; ?></strong>
										<a class="cms-help" data-content="<?php echo $tlblog["blog_help"]["blogh2"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tlblog["blog_help"]["blogh"]; ?>">
											<i class="fa fa-question-circle"></i>
										</a>
										<span class="star-item text-danger-800 m-l-10">*</span>
									</div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if (isset($errors["e2"]) || isset($errors["e3"])) echo " has-error"; ?>">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											echo $htmlE->addInput ('text', 'jak_varname', 'jak_varname', 'form-control', $_REQUEST["jak_varname"], '');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tlblog["blog_box_content"]["blogbc21"]; ?></strong></div>
									<div class="col-md-7">

										<?php
										// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
										echo $htmlE->addTextArea ('jak_lcontent', '4', '', jak_edit_safe_userpost ($_REQUEST["jak_lcontent"]), array ('id' => 'content', 'class' => 'form-control'));
										?>

									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tlblog["blog_box_content"]["blogbc22"]; ?></strong></div>
									<div class="col-md-7">
										<div class="radio radio-success">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											((isset($_REQUEST["jak_active"]) && $_REQUEST["jak_active"] == '1') || !isset($_REQUEST["jak_active"])) ? $checked = 'yes' : $checked = 'no';
											echo $htmlE->addInput ('radio', 'jak_active', 'jak_active1', '', '1', $checked);
											// Arguments: for (id of associated form element), text
											echo $htmlE->addLabelFor ('jak_active1', $tl["checkbox"]["chk"]);

											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											((isset($_REQUEST["jak_active"]) && $_REQUEST["jak_active"] == '0')) ? $checked = 'yes' : $checked = 'no';
											echo $htmlE->addInput ('radio', 'jak_active', 'jak_active2', '', '0', $checked);
											// Arguments: for (id of associated form element), text
											echo $htmlE->addLabelFor ('jak_active2', $tl["checkbox"]["chk1"]);
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5"><strong><?php echo $tlblog["blog_box_content"]["blogbc23"]; ?></strong></div>
									<div class="col-md-7">
										<div class="input-group">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											echo $htmlE->addInput ('text', 'jak_img', 'jak_img', 'form-control', $_REQUEST["jak_img"], '');
											?>

                    <span class="input-group-btn">
                      <button class="btn btn-default iconpicker" data-placement="top" role="iconpicker"></button>
                    </span>
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
			<div class="col-md-4">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo $tlblog["blog_box_title"]["blogbt6"]; ?>
							<a class="cms-help" data-content="<?php echo $tlblog["blog_help"]["blogh1"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tlblog["blog_help"]["blogh"]; ?>">
								<i class="fa fa-question-circle"></i>
							</a>
						</h3>
					</div>
					<div class="box-body">
						<div class="block">
							<div class="block-content">
								<div class="row-form">
									<div class="col-md-12">
										<select name="jak_permission[]" multiple="multiple" class="form-control">
											<option value="0" selected="selected"><?php echo $tlblog["blog_box_content"]["blogbc24"]; ?></option>
											<?php if (isset($JAK_USERGROUP) && is_array ($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) { ?>
												<option value="<?php echo $v["id"]; ?>"><?php echo $v["name"]; ?></option><?php } ?>
										</select>
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
		</div>
	</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>