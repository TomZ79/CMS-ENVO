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
					if (isset($errors["e2"])) echo $errors["e2"]; ?>',
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
		<ul id="cmsTabNewN" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
			<li role="presentation" class="active">
				<a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
					<span class="text"><?php echo $tl["news_section_tab"]["newstab4"]; ?></span>
				</a>
			</li>
			<li role="presentation" class="next">
				<a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
					<span class="text"><?php echo $tl["news_section_tab"]["newstab5"]; ?></span>
				</a>
			</li>
			<li role="presentation">
				<a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
					<span class="text"><?php echo $tl["news_section_tab"]["newstab1"]; ?></span>
				</a>
			</li>
			<li role="presentation">
				<a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
					<span class="text"><?php echo $tl["news_section_tab"]["newstab2"]; ?></span>
				</a>
			</li>
			<li role="presentation">
				<a href="#cmsPage5" role="tab" id="cmsPage5-tab" data-toggle="tab" aria-controls="cmsPage5">
					<span class="text"><?php echo $tl["news_section_tab"]["newstab3"]; ?></span>
				</a>
			</li>
		</ul>

		<div id="cmsTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
				<div class="row">
					<div class="col-md-7">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tl["news_box_title"]["newsbt5"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-5">
												<strong><?php echo $tl["news_box_content"]["newsbc11"]; ?></strong>
												<span class="star-item text-danger-800 m-l-10">*</span>
											</div>
											<div class="col-md-7">
												<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													echo $htmlE->addInput ('text', 'jak_title', '', 'form-control', $_REQUEST["jak_title"], '');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["news_box_content"]["newsbc12"]; ?></strong></div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_showtitle"]) && $_REQUEST["jak_showtitle"] == '1')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_showtitle', 'jak_showtitle1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_showtitle1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_showtitle"]) && $_REQUEST["jak_showtitle"] == '0') || !isset($_REQUEST["jak_showtitle"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_showtitle', 'jak_showtitle2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_showtitle2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["news_box_content"]["newsbc13"]; ?></strong></div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_showdate"]) && $_REQUEST["jak_showdate"] == '1')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_showdate', 'jak_showdate1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_showdate1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_showdate"]) && $_REQUEST["jak_showdate"] == '0') || !isset($_REQUEST["jak_showdate"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_showdate', 'jak_showdate2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_showdate2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["news_box_content"]["newsbc14"]; ?></strong></div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_showhits"]) && $_REQUEST["jak_showhits"] == '1')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_showhits', 'jak_showhits1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_showhits1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_showhits"]) && $_REQUEST["jak_showhits"] == '0') || !isset($_REQUEST["jak_showhits"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_showhits', 'jak_showhits2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_showhits2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["news_box_content"]["newsbc15"]; ?></strong></div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_social"]) && $_REQUEST["jak_social"] == '1')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_social', 'jak_social1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_social1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_social"]) && $_REQUEST["jak_social"] == '0') || !isset($_REQUEST["jak_social"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_social', 'jak_social2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_social2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["news_box_content"]["newsbc16"]; ?></strong></div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_vote"]) && $_REQUEST["jak_vote"] == '1')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_vote', 'jak_vote1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_vote1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_vote"]) && $_REQUEST["jak_vote"] == '0') || !isset($_REQUEST["jak_vote"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_vote', 'jak_vote2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_vote2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["news_box_content"]["newsbc17"]; ?></strong></div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_sidebar"]) && $_REQUEST["jak_sidebar"] == '1')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_sidebar', 'jak_sidebar1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_sidebar1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_sidebar"]) && $_REQUEST["jak_sidebar"] == '0') || !isset($_REQUEST["jak_sidebar"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_sidebar', 'jak_sidebar2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_sidebar2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["news_box_content"]["newsbc18"]; ?></strong></div>
											<div class="col-md-7">
												<div class="input-group">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													echo $htmlE->addInput ('text', 'jak_img', 'jak_img', 'form-control', $_REQUEST["jak_img"], '');
													?>

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
								<button type="submit" name="save" class="btn btn-success pull-right">
									<i class="fa fa-save margin-right-5"></i>
									<?php echo $tl["button"]["btn1"]; ?>
								</button>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title">
									<?php echo $tl["news_box_title"]["newsbt6"]; ?>
									<a class="cms-help" data-content="<?php echo $tl["news_help"]["newsh1"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tl["news_help"]["newsh"]; ?>">
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
													<option value="0" selected="selected"><?php echo $tl["news_box_content"]["newsbc22"]; ?></option>
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

						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tl["news_box_title"]["newsbt7"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["news_box_content"]["newsbc23"]; ?></strong></div>
											<div class="col-md-7">
												<div class="form-group no-margin <?php if (isset($errors["e2"])) echo "has-error"; ?>">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													echo $htmlE->addInput ('text', 'jak_datefrom', 'datepickerFrom', 'form-control', $_REQUEST["jak_datefrom"], '', array ('readonly' => 'readonly'));
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["news_box_content"]["newsbc24"]; ?></strong></div>
											<div class="col-md-7">
												<div class="form-group no-margin <?php if (isset($errors["e2"])) echo "has-error"; ?>">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													echo $htmlE->addInput ('text', 'jak_dateto', 'datepickerTo', 'form-control', $_REQUEST["jak_dateto"], '', array ('readonly' => 'readonly'));
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

						<?php if (JAK_TAGS) { ?>
							<div class="box box-success">
								<div class="box-header with-border">
									<h3 class="box-title"><?php echo $tl["news_box_title"]["newsbt8"]; ?></h3>
								</div>
								<div class="box-body">
									<div class="block">
										<div class="block-content">
											<div class="row-form">
												<div class="col-md-5"><strong>Choose tags from predefined list</strong></div>
												<div class="col-md-7">
													<select name="" id="selecttags1" class="form-control selectpicker" title="Choose tags ..." data-size="7" data-live-search="true">
														<optgroup label="Poskytovatelé TV">
															<option value="skylink">Skylink</option>
															<option value="freesat">freeSAT</option>
															<option value="digi-tv">Digi TV</option>
														</optgroup>
														<optgroup label="Vysílací technologie">
															<option value="dvb-t/t2">DVB-T/T2</option>
															<option value="dvb-s/s2">DVB-S/S2</option>
															<option value="dvb-c">DVB-C</option>
															<option value="dvb-h">DVB-H</option>
														</optgroup>
													</select>
												</div>
											</div>
											<div class="row-form">
												<div class="col-md-5"><strong>Choose tags from list</strong></div>
												<div class="col-md-7">
													<?php $JAK_TAG_ALL = jak_tag_name_admin ();
													if ($JAK_TAG_ALL) { ?>
														<select name="" id="selecttags2" class="form-control selectpicker" title="Choose tags ..." data-size="7" data-live-search="true">
															<?php foreach ($JAK_TAG_ALL as $v) { ?>
																<option value="<?php echo $v["tag"]; ?>"><?php echo $v["tag"]; ?></option>
															<?php } ?>
														</select>
													<?php } else { ?>
														<div>Tags cloud is empty!</div>
													<?php } ?>
												</div>
											</div>
											<div class="row-form">
												<div class="col-md-12">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													echo $htmlE->addInput ('text', 'jak_tags', 'jak_tags', 'form-control tags', $_REQUEST["jak_tags"], '', array ('data-role' => 'tagsinput'));
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
						<?php } ?>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
				<div class="row">
					<div class="col-md-12">
						<?php include_once "editor_new.php"; ?>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="cmsPage3" aria-labelledby="cmsPage3-tab">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tl["news_box_title"]["newsbt2"]; ?></h3>
							</div>
							<div class="box-body">
								<a href="../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=csseditor" class="ifManager"><?php echo $tl["global_text"]["globaltxt8"]; ?></a>
								<a href="javascript:;" id="addCssBlock"><?php echo $tl["global_text"]["globaltxt6"]; ?></a><br/>
								<div id="csseditor"></div>

								<?php
								// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
								echo $htmlE->addTextArea ('jak_css', '', '', $_REQUEST["jak_css"], array ('id' => 'jak_css', 'class' => 'hidden'));
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
			</div>
			<div role="tabpanel" class="tab-pane fade" id="cmsPage4" aria-labelledby="cmsPage4-tab">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tl["news_box_title"]["newsbt3"]; ?></h3>
							</div>
							<div class="box-body">
								<a href="../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=javaeditor" class="ifManager"><?php echo $tl["global_text"]["globaltxt8"]; ?></a>
								<a href="javascript:;" id="addJavascriptBlock"><?php echo $tl["global_text"]["globaltxt7"]; ?></a><br/>
								<div id="javaeditor"></div>

								<?php
								// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
								echo $htmlE->addTextArea ('jak_javascript', '', '', $_REQUEST["jak_javascript"], array ('id' => 'jak_javascript', 'class' => 'hidden'));
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
			</div>
			<div role="tabpanel" class="tab-pane fade" id="cmsPage5" aria-labelledby="cmsPage5-tab">
				<div class="row">
					<div class="col-md-6">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tl["news_box_title"]["newsbt9"]; ?></h3>
							</div>
							<div class="box-body">

								<!-- Moving stuff -->
								<ul class="jak_content_move">

									<?php if (isset($JAK_CONTACT_FORMS) && is_array ($JAK_CONTACT_FORMS)) { ?>

										<li class="jakcontent">
											<div class="form-group">
												<label><?php echo $tl["news_box_content"]["newsbc27"]; ?></label>
												<select name="jak_showcontact" class="form-control selectpicker" data-size="5">
													<option value="0" selected="selected"><?php echo $tl["news_box_content"]["newsbc25"]; ?></option>
													<?php foreach ($JAK_CONTACT_FORMS as $cf) { ?>
														<option value="<?php echo $cf["id"]; ?>"><?php echo $cf["title"]; ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="actions">

												<input type="hidden" name="corder_new[]" class="corder" value="1"/>
												<input type="hidden" name="real_plugin_id[]" value="9997"/>

											</div>
										</li>

									<?php }
									if (isset($JAK_HOOK_ADMIN_PAGE_NEW) && is_array ($JAK_HOOK_ADMIN_PAGE_NEW)) {
										foreach ($JAK_HOOK_ADMIN_PAGE_NEW as $hspn) {
											include_once APP_PATH . $hspn["phpcode"];
										}
									} ?>

								</ul>

								<!-- END Moving Stuff -->

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
								<h3 class="box-title"><?php echo $tl["news_box_title"]["newsbt4"]; ?></h3>
							</div>
							<div class="box-body">
								<?php include "sidebar_widget_new.php"; ?>
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