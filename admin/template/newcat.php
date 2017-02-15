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
		<ul id="cmsTabNewC" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
			<li role="presentation" class="active">
				<a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
					<span class="text"><?php echo $tl["cat_section_tab"]["cattab"]; ?></span>
				</a>
			</li>
			<li role="presentation" class="next">
				<a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
					<span class="text"><?php echo $tl["cat_section_tab"]["cattab1"]; ?></span>
				</a>
			</li>
		</ul>

		<div id="cmsTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
				<div class="row">
					<div class="col-md-8">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tl["cat_box_title"]["catbt6"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["cat_box_content"]["catbc"] . $htmlE->endTag('strong');
												echo $htmlE->startTag('span', array ('class' => 'star-item text-danger-800 m-l-10')) . '*' . $htmlE->endTag('span');
												?>

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

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["cat_box_content"]["catbc1"] . $htmlE->endTag('strong');
												?>

												<a class="cms-help" data-content="<?php echo $tl["cat_help"]["cath1"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tl["cat_help"]["cath"]; ?>">
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
													echo $htmlE->addInput ('text', 'jak_varname', 'jak_varname', 'form-control', $_REQUEST["jak_varname"], '');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["cat_box_content"]["catbc2"] . $htmlE->endTag('strong');
												?>

												<a href="javascript:void(0)" class="cms-help" data-content="<?php echo $tl["cat_help"]["cath2"]; ?>" data-original-title="<?php echo $tl["cat_help"]["cath"]; ?>">
													<i class="fa fa-question-circle"></i>
												</a>
											</div>
											<div class="col-md-7">

												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												echo $htmlE->addInput ('text', 'jak_url', '', 'form-control', $_REQUEST["jak_url"], '');
												?>

											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["cat_box_content"]["catbc3"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">

												<?php
												// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
												echo $htmlE->addTextArea ('jak_lcontent', '4', '', jak_edit_safe_userpost ($_REQUEST["jak_lcontent"]), array ('id' => 'content', 'class' => 'form-control'));
												?>

											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["cat_box_content"]["catbc4"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_menu"]) && $_REQUEST["jak_menu"] == '1') || !isset($_REQUEST["jak_menu"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_menu', 'jak_menu1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_menu1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_menu"]) && $_REQUEST["jak_menu"] == '0')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_menu', 'jak_menu2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_menu2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["cat_box_content"]["catbc5"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_footer"]) && $_REQUEST["jak_footer"] == '1')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_footer', 'jak_footer1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_footer1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_footer"]) && $_REQUEST["jak_footer"] == '0') || !isset($_REQUEST["jak_footer"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_footer', 'jak_footer2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_footer2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["cat_box_content"]["catbc6"] . $htmlE->endTag('strong');
												?>

											</div>
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
								<h3 class="box-title"><?php echo $tl["cat_box_title"]["catbt3"]; ?>
									<a href="javascript:void(0)" class="cms-help" data-content="<?php echo $tl["cat_help"]["cath3"]; ?>" data-original-title="<?php echo $tl["cat_help"]["cath"]; ?>">
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
													<option value="0" selected="selected"><?php echo $tl["cat_box_content"]["catbc7"]; ?></option>
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
			</div>
			<div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
				<div class="row">
					<div class="col-md-6">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tl["cat_box_title"]["catbt4"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-12">
												<button id="copy1" class="btn btn-primary btn-xs pull-right margin-bottom-10" type="button"><?php echo $tl["button"]["btn25"]; ?></button>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-12">

												<?php
												// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
												echo $htmlE->addTextArea ('jak_lcontent_meta_desc', '4', '', $_REQUEST["jak_lcontent_meta_desc"], array ('id' => 'jak_editor_light_meta_desc', 'class' => 'form-control', 'maxlength' => '400'));
												?>

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
								<h3 class="box-title"><?php echo $tl["cat_box_title"]["catbt5"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-12">

												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												echo $htmlE->addInput ('text', 'jak_lcontent_meta_key', 'jak_editor_light_meta_key', 'form-control', $_REQUEST["jak_lcontent_meta_key"], '');
												?>

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
			</div>
		</div>
	</form>

<?php include "footer.php"; ?>