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
					if (isset($errors["e2"])) echo $errors["e2"];?>',
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
		<ul id="cmsTab" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
			<li role="presentation" class="active">
				<a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
					<span class="text"><?php echo $tlgwl["gwl_section_tab"]["gwltab"]; ?></span>
				</a>
			</li>
			<li role="presentation" class="next">
				<a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
					<span class="text"><?php echo $tlgwl["gwl_section_tab"]["gwltab1"]; ?></span>
				</a>
			</li>
		</ul>

		<div id="cmsTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
				<div class="row">
					<div class="col-md-6">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlgwl["gwl_box_title"]["gwlbt"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-4">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tlgwl["gwl_box_content"]["gwlbc"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-8">
												<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													echo $htmlE->addInput ('text', 'jak_title', '', 'form-control', '', '');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-4">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tlgwl["gwl_box_content"]["gwlbc28"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-8">
												<div class="input-group">
													<input type="text" name="jak_img" id="jak_img" class="form-control" value="<?php if (isset($_REQUEST["jak_img"])) echo $_REQUEST["jak_img"]; ?>"/>
													<span class="input-group-btn">
														<a class="btn btn-info ifManager" type="button" href="../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=1&subfolder=&editor=mce_0&lang=eng&fldr=&field_id=jak_img"><?php echo $tl["global_text"]["globaltxt8"]; ?></a>
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
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlgwl["gwl_box_title"]["gwlbt1"]; ?>
									<a class="cms-help" data-content="<?php echo $tlgwl["gwl_help"]["gwlh1"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tlgwl["gwl_help"]["gwlh"]; ?>">
										<i class="fa fa-question-circle"></i>
									</a>
								</h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-12">
												<select name="jak_pageid[]" multiple="multiple" class="form-control">
													<option value="0"<?php if (isset($_REQUEST["jak_pageid"]) && $_REQUEST["jak_pageid"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tlgwl["gwl_box_content"]["gwlbc1"]; ?></option>

													<?php if (isset($JAK_PAGES) && is_array ($JAK_PAGES)) foreach ($JAK_PAGES as $v) { ?>
														<option value="<?php echo $v["id"]; ?>"><?php echo $v["title"]; ?></option>
													<?php } ?>
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
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlgwl["gwl_box_title"]["gwlbt2"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-7">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tlgwl["gwl_box_content"]["gwlbc2"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-5">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_all"]) && $_REQUEST["jak_all"] == '1') || !isset($_REQUEST["jak_all"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_all', 'jak_all1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_all1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_all"]) && $_REQUEST["jak_all"] == '0')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_all', 'jak_all2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_all2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-7">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tlgwl["gwl_box_content"]["gwlbc3"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-5">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_cookies"]) && $_REQUEST["jak_cookies"] == '1')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_cookies', 'jak_cookies1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_cookies1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_cookies"]) && $_REQUEST["jak_cookies"] == '0') || !isset($_REQUEST["jak_cookies"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_cookies', 'jak_cookies2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_cookies2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-7">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tlgwl["gwl_box_content"]["gwlbc4"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-5">
												<select name="jak_cookiestime" class="form-control selectpicker" data-live-search="true" data-size="5">
													<?php for ($i = 1; $i <= 99; $i ++) { ?>
														<option value="<?php echo $i ?>"<?php if (isset($_REQUEST["jak_cookiestime"]) && $_REQUEST["jak_cookiestime"] == $i) { ?> selected="selected"<?php } ?>><?php echo $i; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-7">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tlgwl["gwl_box_content"]["gwlbc5"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-5">
												<select name="jak_dur" class="form-control selectpicker" data-size="5">
													<option value="3000"<?php if (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 3000) { ?> selected="selected"<?php } ?>>3</option>
													<option value="4000"<?php if (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 4000) { ?> selected="selected"<?php } ?>>4</option>
													<option value="5000"<?php if (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 5000) { ?> selected="selected"<?php } ?>>5</option>
													<option value="6000"<?php if (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 6000) { ?> selected="selected"<?php } ?>>6</option>
													<option value="7000"<?php if (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 7000) { ?> selected="selected"<?php } ?>>7</option>
													<option value="8000"<?php if (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 8000) { ?> selected="selected"<?php } ?>>8</option>
													<option value="9000"<?php if (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 9000) { ?> selected="selected"<?php } ?>>9</option>
												</select>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-7">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tlgwl["gwl_box_content"]["gwlbc6"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-5">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_sticky"]) && $_REQUEST["jak_sticky"] == '1')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_sticky', 'jak_sticky1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_sticky1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_sticky"]) && $_REQUEST["jak_sticky"] == '0') || !isset($_REQUEST["jak_sticky"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_sticky', 'jak_sticky2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_sticky2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-7">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tlgwl["gwl_box_content"]["gwlbc7"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-5">
												<select name="jak_class" class="form-control selectpicker" data-size="3">
													<option value="top-right"<?php if (isset($_REQUEST["jak_class"]) && $_REQUEST["jak_class"] == "top-right") { ?> selected="selected"<?php } ?>><?php echo $tlgwl["gwl_box_content"]["gwlbc8"]; ?></option>
													<option value="top-left"<?php if (isset($_REQUEST["jak_class"]) && $_REQUEST["jak_class"] == "top-left") { ?> selected="selected"<?php } ?>><?php echo $tlgwl["gwl_box_content"]["gwlbc9"]; ?></option>
													<option value="center"<?php if (isset($_REQUEST["jak_class"]) && $_REQUEST["jak_class"] == "center") { ?> selected="selected"<?php } ?>><?php echo $tlgwl["gwl_box_content"]["gwlbc10"]; ?></option>
													<option value="bottom-left"<?php if (isset($_REQUEST["jak_class"]) && $_REQUEST["jak_class"] == "bottom-left") { ?> selected="selected"<?php } ?>><?php echo $tlgwl["gwl_box_content"]["gwlbc11"]; ?></option>
													<option value="bottom-right"<?php if (isset($_REQUEST["jak_class"]) && $_REQUEST["jak_class"] == "bottom-right") { ?> selected="selected"<?php } ?>><?php echo $tlgwl["gwl_box_content"]["gwlbc12"]; ?></option>
												</select>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-7">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tlgwl["gwl_box_content"]["gwlbc13"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-5">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_color"]) && $_REQUEST["jak_color"] == '1') || !isset($_REQUEST["jak_color"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_color', 'jak_color1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_color1', $tlgwl["gwl_box_content"]["gwlbc14"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_color"]) && $_REQUEST["jak_color"] == '0')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_color', 'jak_color2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_color2', $tlgwl["gwl_box_content"]["gwlbc15"]);
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
					<div class="col-md-6">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlgwl["gwl_box_title"]["gwlbt3"]; ?>
									<a class="cms-help" data-content="<?php echo $tlgwl["gwl_help"]["gwlh1"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tlgwl["gwl_help"]["gwlh"]; ?>">
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
													<option value="0"<?php if (isset($_REQUEST["jak_permission"]) && $_REQUEST["jak_permission"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tlgwl["gwl_box_content"]["gwlbc16"]; ?></option>
													<?php if (isset($JAK_USERGROUP) && is_array ($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) { ?>
														<option value="<?php echo $v["id"]; ?>"<?php if (isset($_REQUEST["jak_permission"]) && $v["id"] == $_REQUEST["jak_permission"]) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
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
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlgwl["gwl_box_title"]["gwlbt4"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tlgwl["gwl_box_content"]["gwlbc17"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">
													<input type="text" name="jak_datefrom" id="datepickerFrom" class="form-control" value="<?php if (isset($_REQUEST["jak_datefrom"])) echo $_REQUEST["jak_datefrom"]; ?>" readonly/>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tlgwl["gwl_box_content"]["gwlbc18"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">
													<input type="text" name="jak_dateto" id="datepickerTo" class="form-control" value="<?php if (isset($_REQUEST["jak_dateto"])) echo $_REQUEST["jak_dateto"]; ?>" readonly/>
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
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlgwl["gwl_box_title"]["gwlbt5"]; ?>
									<a class="cms-help" data-content="<?php echo $tlgwl["gwl_help"]["gwlh1"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tlgwl["gwl_help"]["gwlh"]; ?>">
										<i class="fa fa-question-circle"></i>
									</a>
								</h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tlgwl["gwl_box_content"]["gwlbc19"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<select name="jak_newsid[]" multiple="multiple" class="form-control">
													<option value="0"<?php if (isset($_REQUEST["jak_newsid"]) && $_REQUEST["jak_newsid"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tlgwl["gwl_box_content"]["gwlbc1"]; ?></option>

													<?php if (isset($JAK_NEWS) && is_array ($JAK_NEWS)) foreach ($JAK_NEWS as $n) { ?>
														<option value="<?php echo $n["id"]; ?>"><?php echo $n["title"]; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tlgwl["gwl_box_content"]["gwlbc20"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_mainnews"]) && $_REQUEST["jak_mainnews"] == '1')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_mainnews', 'jak_mainnews1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_mainnews1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_mainnews"]) && $_REQUEST["jak_mainnews"] == '0') || !isset($_REQUEST["jak_mainnews"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_mainnews', 'jak_mainnews2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_mainnews2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<?php if (JAK_TAGS) { ?>
											<div class="row-form">
												<div class="col-md-5">

													<?php
													// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
													// Add Html Element -> endTag (Arguments: tag)
													echo $htmlE->startTag('strong') . $tlgwl["gwl_box_content"]["gwlbc21"] . $htmlE->endTag('strong');
													?>

												</div>
												<div class="col-md-7">
													<div class="radio radio-success">

														<?php
														// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
														((isset($_REQUEST["jak_tags"]) && $_REQUEST["jak_tags"] == '1')) ? $checked = 'yes' : $checked = 'no';
														echo $htmlE->addInput ('radio', 'jak_tags', 'jak_tags1', '', '1', $checked);
														// Arguments: for (id of associated form element), text
														echo $htmlE->addLabelFor ('jak_tags1', $tl["checkbox"]["chk"]);

														// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
														((isset($_REQUEST["jak_tags"]) && $_REQUEST["jak_tags"] == '0') || !isset($_REQUEST["jak_tags"])) ? $checked = 'yes' : $checked = 'no';
														echo $htmlE->addInput ('radio', 'jak_tags', 'jak_tags2', '', '0', $checked);
														// Arguments: for (id of associated form element), text
														echo $htmlE->addLabelFor ('jak_tags2', $tl["checkbox"]["chk1"]);
														?>

													</div>
												</div>
											</div>
										<?php } ?>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tlgwl["gwl_box_content"]["gwlbc22"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_search"]) && $_REQUEST["jak_search"] == '1')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_search', 'jak_search1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_search1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_search"]) && $_REQUEST["jak_search"] == '0') || !isset($_REQUEST["jak_search"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_search', 'jak_search2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_search2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tlgwl["gwl_box_content"]["gwlbc23"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_sitemap"]) && $_REQUEST["jak_sitemap"] == '1')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_sitemap', 'jak_sitemap1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_sitemap1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_sitemap"]) && $_REQUEST["jak_sitemap"] == '0') || !isset($_REQUEST["jak_sitemap"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_sitemap', 'jak_sitemap2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_sitemap2', $tl["checkbox"]["chk1"]);
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
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
				<div class="row">
					<div class="col-md-12">
						<?php include_once APP_PATH . "admin/template/editor_new.php"; ?>
					</div>
				</div>
			</div>
		</div>
	</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>