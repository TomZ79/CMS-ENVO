<?php include_once APP_PATH . 'admin/template/header.php'; ?>

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
			// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
			echo $htmlE->addButtonSubmit('save', '', 'btn btn-success button', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ');
			?>

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

										<?php
										// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
										// Add Html Element -> endTag (Arguments: tag)
										echo $htmlE->startTag('strong') . $tlblog["blog_box_content"]["blogbc19"] . $htmlE->endTag('strong');
										echo $htmlE->startTag('span', array ('class' => 'star-item text-danger-800 m-l-10')) . '*' . $htmlE->endTag('span');
										?>

									</div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											echo $htmlE->addInput ('text', 'jak_name', 'jak_name', 'form-control', $JAK_FORM_DATA["name"], '');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
										// Add Html Element -> endTag (Arguments: tag)
										echo $htmlE->startTag('strong') . $tlblog["blog_box_content"]["blogbc20"] . $htmlE->endTag('strong');
										?>

										<a class="cms-help" data-content="<?php echo $tlblog["blog_help"]["blogh2"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tlblog["blog_help"]["blogh"]; ?>">
											<i class="fa fa-question-circle"></i>
										</a>

										<?php
										// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
										// Add Html Element -> endTag (Arguments: tag)
										echo $htmlE->startTag('span', array ('class' => 'star-item text-danger-800 m-l-10')) . '*' . $htmlE->endTag('span');
										?>

									</div>
									<div class="col-md-7">
										<div class="form-group no-margin<?php if (isset($errors["e2"]) || isset($errors["e3"])) echo " has-error"; ?>">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											echo $htmlE->addInput ('text', 'jak_varname', 'jak_varname', 'form-control', $JAK_FORM_DATA["varname"], '');
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
										// Add Html Element -> endTag (Arguments: tag)
										echo $htmlE->startTag('strong') . $tlblog["blog_box_content"]["blogbc21"] . $htmlE->endTag('strong');
										?>

									</div>
									<div class="col-md-7">

										<?php
										// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
										echo $htmlE->addTextArea ('jak_lcontent', '4', '', jak_edit_safe_userpost ($JAK_FORM_DATA["content"]), array ('id' => 'content', 'class' => 'form-control'));
										?>

									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
										// Add Html Element -> endTag (Arguments: tag)
										echo $htmlE->startTag('strong') . $tlblog["blog_box_content"]["blogbc22"] . $htmlE->endTag('strong');
										?>

									</div>
									<div class="col-md-7">
										<div class="radio radio-success">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											($JAK_FORM_DATA["active"] == '1') ? $checked = 'yes' : $checked = 'no';
											echo $htmlE->addInput ('radio', 'jak_active', 'jak_active1', '', '1', $checked);
											// Arguments: for (id of associated form element), text
											echo $htmlE->addLabelFor ('jak_active1', $tl["checkbox"]["chk"]);

											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											($JAK_FORM_DATA["active"] == '0') ? $checked = 'yes' : $checked = 'no';
											echo $htmlE->addInput ('radio', 'jak_active', 'jak_active2', '', '0', $checked);
											// Arguments: for (id of associated form element), text
											echo $htmlE->addLabelFor ('jak_active2', $tl["checkbox"]["chk1"]);
											?>

										</div>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-5">

										<?php
										// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
										// Add Html Element -> endTag (Arguments: tag)
										echo $htmlE->startTag('strong') . $tlblog["blog_box_content"]["blogbc23"] . $htmlE->endTag('strong');
										?>

									</div>
									<div class="col-md-7">
										<div class="input-group">

											<?php
											// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
											echo $htmlE->addInput ('text', 'jak_img', 'jak_img', 'form-control', $JAK_FORM_DATA["catimg"], '');
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

						<?php
						// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
						echo $htmlE->addButtonSubmit('save', '', 'btn btn-success pull-right', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"]);
						?>

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
											<option value="0"<?php if ($JAK_FORM_DATA["permission"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tlblog["blog_box_content"]["blogbc24"]; ?></option>
											<?php if (isset($JAK_USERGROUP) && is_array ($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) { ?>
												<option value="<?php echo $v["id"]; ?>"<?php if (in_array ($v["id"], explode (',', $JAK_FORM_DATA["permission"]))) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
										</select>
									</div>
								</div>
							</div>
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