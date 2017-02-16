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
					if (isset($errors["e2"])) echo $errors["e2"];?>',
			}, {
				// settings
				type: 'danger',
				delay: 10000,
			});
		}, 1000);
	</script>
<?php } ?>

	<div class="col-md-12 m-b-20">
		<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
			<div class="form-group">
				<label for="groupbase"><?php echo $tl["userg_box_content"]["usergbc"]; ?></label>
				<div class="input-group">
					<select name="jak_groupbase" id="groupbase" class="form-control selectpicker" data-size="5">
						<?php if (isset($JAK_USERGROUP_ALL) && is_array ($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $z) {
							if ($z["id"] != '1') { ?>
								<option value="<?php echo $z["id"]; ?>"><?php echo $z["name"]; ?></option>
							<?php }
						} ?>
					</select>
		    <span class="input-group-btn">
		    	<button class="btn btn-info" name="create" type="submit"><?php echo $tl["button"]["btn1"]; ?></button>
		    </span>
				</div>
			</div>
		</form>
	</div>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<!-- Fixed Button for save form -->
		<div class="savebutton hidden-xs">

			<?php
			// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
			echo $htmlE->addButtonSubmit('save', '', 'btn btn-success button', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ');
			?>

		</div>

		<!-- Form Content -->
		<ul id="cmsTabNewUG" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
			<li role="presentation" class="active">
				<a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
					<span class="text"><?php echo $tl["userg_section_tab"]["usergtab"]; ?></span>
				</a>
			</li>
			<?php if (isset($JAK_HOOK_ADMIN_USERGROUP_EDIT)) { ?>
				<li role="presentation" class="next">
					<a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
						<span class="text"><?php echo $tl["userg_section_tab"]["usergtab1"]; ?></span>
					</a>
				</li>
			<?php } ?>
		</ul>

		<div id="cmsTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
				<div class="row">
					<div class="col-md-8">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tl["userg_box_title"]["usergbt"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["userg_box_content"]["usergbc1"] . $htmlE->endTag('strong');
												echo $htmlE->startTag('span', array ('class' => 'star-item text-danger-800 m-l-10')) . '*' . $htmlE->endTag('span');
												?>

											</div>
											<div class="col-md-7">
												<div class="form-group no-margin<?php if (isset($errors["e1"]) || isset($errors["e2"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													if (!isset($JAK_FORM_DATA["name"]) && isset($_REQUEST["jak_name"])) {
														$value = $_REQUEST["jak_name"];
													} elseif (isset($JAK_FORM_DATA["name"])) {
														$value = $JAK_FORM_DATA["name"];
													}
													echo $htmlE->addInput ('text', 'jak_name', '', 'form-control', $value, '');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["userg_box_content"]["usergbc2"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">

												<?php
												// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
												echo $htmlE->addTextArea ('jak_lcontent', '4', '', jak_edit_safe_userpost($_REQUEST["jak_lcontent"]), array ('class' => 'form-control'));
												?>

											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["userg_box_content"]["usergbc3"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													if (isset($JAK_FORM_DATA["advsearch"]) && ($JAK_FORM_DATA["advsearch"] == '1')) {
														$checked = 'yes';
													} elseif (isset($_REQUEST["jak_advs"]) && ($_REQUEST["jak_advs"] == '1')) {
														$checked = 'yes';
													} else {
														$checked = 'no';
													}
													echo $htmlE->addInput ('radio', 'jak_advs', 'jak_advs1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_advs1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													if (isset($JAK_FORM_DATA["advsearch"]) && ($JAK_FORM_DATA["advsearch"] == '0')) {
														$checked = 'yes';
													} elseif (isset($_REQUEST["jak_advs"]) && ($_REQUEST["jak_advs"] == '0')) {
														$checked = 'yes';
													} elseif (($JAK_FORM_DATA["advsearch"] == '1') || ($_REQUEST["jak_advs"] == '1')) {
														$checked = 'no';
													} else {
														$checked = 'yes';
													}
													echo $htmlE->addInput ('radio', 'jak_advs', 'jak_advs2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_advs2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["userg_box_content"]["usergbc4"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													if (isset($JAK_FORM_DATA["canrate"]) && ($JAK_FORM_DATA["canrate"] == '1')) {
														$checked = 'yes';
													} elseif (isset($_REQUEST["jak_rate"]) && ($_REQUEST["jak_rate"] == '1')) {
														$checked = 'yes';
													} else {
														$checked = 'no';
													}
													echo $htmlE->addInput ('radio', 'jak_rate', 'jak_rate1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_rate1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													if (isset($JAK_FORM_DATA["canrate"]) && ($JAK_FORM_DATA["canrate"] == '0')) {
														$checked = 'yes';
													} elseif (isset($_REQUEST["jak_rate"]) && ($_REQUEST["jak_rate"] == '0')) {
														$checked = 'yes';
													} elseif (($JAK_FORM_DATA["canrate"] == '1') || ($_REQUEST["jak_rate"] == '1')) {
														$checked = 'no';
													} else {
														$checked = 'yes';
													}
													echo $htmlE->addInput ('radio', 'jak_rate', 'jak_rate2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_rate2', $tl["checkbox"]["chk1"]);
													?>

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
						<?php if (JAK_TAGS) { ?>
							<div class="box box-success">
								<div class="box-header with-border">
									<h3 class="box-title"><?php echo $tl["userg_box_title"]["usergbt1"]; ?></h3>
								</div>
								<div class="box-body">
									<div class="block">
										<div class="block-content">
											<div class="row-form">
												<div class="col-md-12">
													<div class="radio radio-success">

														<?php
														// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
														if (isset($JAK_FORM_DATA["tags"]) && ($JAK_FORM_DATA["tags"] == '1')) {
															$checked = 'yes';
														} elseif (isset($_REQUEST["jak_tags"]) && ($_REQUEST["jak_tags"] == '1')) {
															$checked = 'yes';
														} else {
															$checked = 'no';
														}
														echo $htmlE->addInput ('radio', 'jak_tags', 'jak_tags1', '', '1', $checked);
														// Arguments: for (id of associated form element), text
														echo $htmlE->addLabelFor ('jak_tags1', $tl["checkbox"]["chk"]);

														// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
														if (isset($JAK_FORM_DATA["tags"]) && ($JAK_FORM_DATA["tags"] == '0')) {
															$checked = 'yes';
														} elseif (isset($_REQUEST["jak_tags"]) && ($_REQUEST["jak_tags"] == '0')) {
															$checked = 'yes';
														} elseif (($JAK_FORM_DATA["tags"] == '1') || ($_REQUEST["jak_tags"] == '1')) {
															$checked = 'no';
														} else {
															$checked = 'yes';
														}
														echo $htmlE->addInput ('radio', 'jak_tags', 'jak_tags2', '', '0', $checked);
														// Arguments: for (id of associated form element), text
														echo $htmlE->addLabelFor ('jak_tags2', $tl["checkbox"]["chk1"]);
														?>

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
						<?php } ?>
					</div>
				</div>
			</div>

			<?php if (isset($JAK_HOOK_ADMIN_USERGROUP)) { ?>
				<div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
					<div class="row">
						<div class="col-md-12">
							<?php if (isset($JAK_HOOK_ADMIN_USERGROUP) && is_array ($JAK_HOOK_ADMIN_USERGROUP)) foreach ($JAK_HOOK_ADMIN_USERGROUP as $hs) {
								include_once APP_PATH . $hs['phpcode'];
							} ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</form>

<?php include "footer.php"; ?>