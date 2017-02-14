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

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<!-- Fixed Button for save form -->
		<div class="savebutton hidden-xs">
			<button type="submit" name="save" class="btn btn-success button">
				<i class="fa fa-save margin-right-5"></i>
				<?php echo $tl["button"]["btn1"]; ?> !!
			</button>
		</div>

		<!-- Form Content -->
		<ul id="cmsTabNewP" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
			<li role="presentation" class="active">
				<a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
					<span class="text"><?php echo $tl["page_section_tab"]["pagetab"]; ?></span>
				</a>
			</li>
			<li role="presentation" class="next">
				<a href="#cmsPage2" id="cmsPage2-tab" role="tab" data-toggle="tab" aria-controls="cmsPage2" aria-expanded="true">
					<span class="text"><?php echo $tl["page_section_tab"]["pagetab1"]; ?></span>
				</a>
			</li>
			<li role="presentation">
				<a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
					<span class="text"><?php echo $tl["page_section_tab"]["pagetab2"]; ?></span>
				</a>
			</li>
			<li role="presentation">
				<a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
					<span class="text"><?php echo $tl["page_section_tab"]["pagetab3"]; ?></span>
				</a>
			</li>
			<li role="presentation">
				<a href="#cmsPage5" role="tab" id="cmsPage5-tab" data-toggle="tab" aria-controls="cmsPage5">
					<span class="text"><?php echo $tl["page_section_tab"]["pagetab4"]; ?></span>
				</a>
			</li>
		</ul>

		<div id="cmsTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
				<div class="row">
					<div class="col-md-6">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-5">
												<strong><?php echo $tl["page_box_content"]["pagebc3"]; ?></strong>
												<span class="star-item text-danger-800 m-l-10">*</span>
											</div>
											<div class="col-md-7">
												<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													echo $htmlE->addInput ('text', 'jak_title', '', 'form-control', $_REQUEST["jak_name"], '');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc4"]; ?></strong></div>
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
											<div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc5"]; ?></strong></div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_shownav"]) && $_REQUEST["jak_shownav"] == '1') || !isset($_REQUEST["jak_shownav"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_shownav', 'jak_shownav1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_shownav1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_shownav"]) && $_REQUEST["jak_shownav"] == '0')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_shownav', 'jak_shownav2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_shownav2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc6"]; ?></strong></div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_showfooter"]) && $_REQUEST["jak_showfooter"] == '1') || !isset($_REQUEST["jak_showfooter"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_showfooter', 'jak_showfooter1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_showfooter1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_showfooter"]) && $_REQUEST["jak_showfooter"] == '0')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_showfooter', 'jak_showfooter2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_showfooter2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc7"]; ?></strong></div>
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
											<div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc8"]; ?></strong></div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_sidebar"]) && $_REQUEST["jak_sidebar"] == '1') || !isset($_REQUEST["jak_sidebar"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_sidebar', 'jak_sidebar1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_sidebar1', $tl["page_box_content"]["pagebc9"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_sidebar"]) && $_REQUEST["jak_sidebar"] == '0')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_sidebar', 'jak_sidebar2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_sidebar2', $tl["page_box_content"]["pagebc10"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc11"]; ?></strong></div>
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
											<div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc12"]; ?></strong></div>
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
											<div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc13"]; ?></strong></div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_showtags"]) && $_REQUEST["jak_showtags"] == '1')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_showtags', 'jak_showtags1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_showtags1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_showtags"]) && $_REQUEST["jak_showtags"] == '0') || !isset($_REQUEST["jak_showtags"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_showtags', 'jak_showtags2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_showtags2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc14"]; ?></strong></div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_showlogin"]) && $_REQUEST["jak_showlogin"] == '1')) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_showlogin', 'jak_showlogin1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_showlogin1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													((isset($_REQUEST["jak_showlogin"]) && $_REQUEST["jak_showlogin"] == '0') || !isset($_REQUEST["jak_showlogin"])) ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput ('radio', 'jak_showlogin', 'jak_showlogin2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor ('jak_showlogin2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc15"]; ?></strong></div>
											<div class="col-md-7">

												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												echo $htmlE->addInput ('text', 'jak_password', '', 'form-control', $_REQUEST["jak_password"], '');
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
								<h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt1"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-12">
												<select name="jak_catid" class="form-control selectpicker" data-size="5">
													<option value="0"<?php if (!$page1) { ?> selected="selected"<?php } ?>><?php echo $tl["page_box_content"]["pagebc"]; ?></option>
													<?php if (isset($JAK_CAT_NOTUSED) && is_array ($JAK_CAT_NOTUSED)) foreach ($JAK_CAT_NOTUSED as $v) { ?>
														<option value="<?php echo $v["id"]; ?>"<?php if ($v["id"] == $page2) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
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
						<?php if (JAK_TAGS) { ?>
							<div class="box box-success">
								<div class="box-header with-border">
									<h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt2"]; ?></h3>
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
								<h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt3"]; ?></h3>
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
								<h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt4"]; ?></h3>
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
								<h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt5"]; ?></h3>
							</div>
							<div class="box-body">
								<!-- Moving stuff -->
								<ul class="jak_content_move">

									<li class="jakcontent">
										<div class="text"><?php echo $tl["page"]["p4"]; ?></div>
										<div class="actions">
											<input type="hidden" name="corder_new[]" class="corder" value="1"/>
											<input type="hidden" name="real_plugin_id[]" value="9999"/>
										</div>
									</li>

									<?php if (isset($JAK_CONTACT_FORMS) && is_array ($JAK_CONTACT_FORMS)) { ?>

										<li class="jakcontent">
											<div class="form-group">
												<label><?php echo $tl["global_text"]["globaltxt14"]; ?></label>
												<select name="jak_showcontact" class="form-control selectpicker" data-size="5">
													<option value="0" selected="selected"><?php echo $tl["global_text"]["globaltxt13"]; ?></option>
													<?php foreach ($JAK_CONTACT_FORMS as $cf) { ?>
														<option value="<?php echo $cf["id"]; ?>"><?php echo $cf["title"]; ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="actions">
												<input type="hidden" name="corder_new[]" class="corder" value="2"/>
												<input type="hidden" name="real_plugin_id[]" value="9997"/>
											</div>
										</li>

									<?php } ?>

									<li class="jakcontent">
										<div class="form-group">
											<label><?php echo $tl["global_text"]["globaltxt9"]; ?></label>
											<div class="row">
												<div class="col-md-4">
													<select name="jak_shownewsorder" class="form-control selectpicker" data-size="5">
														<option value="ASC" selected="selected"><?php echo $tl["global_text"]["globaltxt10"]; ?></option>
														<option value="DESC"><?php echo $tl["global_text"]["globaltxt11"]; ?></option>
													</select>
												</div>
												<div class="col-md-4">
													<select name="jak_shownewsordern" class="form-control selectpicker">
														<option value="id" selected="selected"><?php echo $tl["selection"]["sel9"]; ?></option>
														<option value="title"><?php echo $tl["selection"]["sel10"]; ?></option>
														<option value="time"><?php echo $tl["selection"]["sel11"]; ?></option>
														<option value="hits"><?php echo $tl["selection"]["sel12"]; ?></option>
													</select>
												</div>
												<div class="col-md-4">
													<select name="jak_shownewsmany" class="form-control selectpicker" data-size="5">
														<?php for ($i = 0; $i <= 10; $i ++) { ?>
															<option value="<?php echo $i ?>"<?php if ($i == 0) { ?> selected="selected"<?php } ?>><?php echo $i; ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label><?php echo $tl["global_text"]["globaltxt12"]; ?></label>
											<select name="jak_shownews[]" multiple="multiple" class="form-control">
												<option value="0" selected="selected"><?php echo $tl["global_text"]["globaltxt13"]; ?></option>
												<?php if (isset($JAK_GET_NEWS) && is_array ($JAK_GET_NEWS)) foreach ($JAK_GET_NEWS as $gn) { ?>
													<option value="<?php echo $gn["id"]; ?>"><?php echo $gn["title"]; ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="actions">
											<input type="hidden" name="corder_new[]" class="corder" value="3"/>
											<input type="hidden" name="real_plugin_id[]" value="9998"/>
										</div>
									</li>

									<?php if (isset($JAK_HOOK_ADMIN_PAGE_NEW) && is_array ($JAK_HOOK_ADMIN_PAGE_NEW)) foreach ($JAK_HOOK_ADMIN_PAGE_NEW as $hspn) {
										include_once APP_PATH . $hspn["phpcode"];
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
								<h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt6"]; ?></h3>
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