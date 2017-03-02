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

			<?php
			// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
			echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
			?>

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

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html->addTag('h3', $tl["page_box_title"]["pagebt"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc3"]);
												echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
												?>

											</div>
											<div class="col-md-7">
												<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html->addInput('text', 'jak_title', $_REQUEST["jak_name"], '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc4"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showtitle', '1', ((isset($_REQUEST["jak_showtitle"]) && $_REQUEST["jak_showtitle"] == '1')) ? TRUE : FALSE, 'jak_showtitle1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showtitle1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showtitle', '0', ((isset($_REQUEST["jak_showtitle"]) && $_REQUEST["jak_showtitle"] == '0') || !isset($_REQUEST["jak_showtitle"])) ? TRUE : FALSE, 'jak_showtitle2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showtitle2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc5"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_shownav', '1', ((isset($_REQUEST["jak_shownav"]) && $_REQUEST["jak_shownav"] == '1') || !isset($_REQUEST["jak_shownav"])) ? TRUE : FALSE, 'jak_shownav1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_shownav1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_shownav', '0', ((isset($_REQUEST["jak_shownav"]) && $_REQUEST["jak_shownav"] == '0')) ? TRUE : FALSE, 'jak_shownav2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_shownav2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc6"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showfooter', '1', ((isset($_REQUEST["jak_showfooter"]) && $_REQUEST["jak_showfooter"] == '1') || !isset($_REQUEST["jak_showfooter"])) ? TRUE : FALSE, 'jak_showfooter1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showfooter1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showfooter', '0', ((isset($_REQUEST["jak_showfooter"]) && $_REQUEST["jak_showfooter"] == '0')) ? TRUE : FALSE, 'jak_showfooter2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showfooter2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc7"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showdate', '1', ((isset($_REQUEST["jak_showdate"]) && $_REQUEST["jak_showdate"] == '1')) ? TRUE : FALSE, 'jak_showdate1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showdate1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showdate', '0', ((isset($_REQUEST["jak_showdate"]) && $_REQUEST["jak_showdate"] == '0') || !isset($_REQUEST["jak_showdate"])) ? TRUE : FALSE, 'jak_showdate2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showdate2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc8"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_sidebar', '1', ((isset($_REQUEST["jak_sidebar"]) && $_REQUEST["jak_sidebar"] == '1') || !isset($_REQUEST["jak_sidebar"])) ? TRUE : FALSE, 'jak_sidebar1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_sidebar1', $tl["checkbox"]["chk2"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_sidebar', '0', ((isset($_REQUEST["jak_sidebar"]) && $_REQUEST["jak_sidebar"] == '0')) ? TRUE : FALSE, 'jak_sidebar2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_sidebar2', $tl["checkbox"]["chk3"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc11"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_social', '1', ((isset($_REQUEST["jak_social"]) && $_REQUEST["jak_social"] == '1')) ? TRUE : FALSE, 'jak_social1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_social1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_social', '0', ((isset($_REQUEST["jak_social"]) && $_REQUEST["jak_social"] == '0') || !isset($_REQUEST["jak_social"])) ? TRUE : FALSE, 'jak_social2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_social2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc13"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showtags', '1', ((isset($_REQUEST["jak_showtags"]) && $_REQUEST["jak_showtags"] == '1')) ? TRUE : FALSE, 'jak_showtags1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showtags1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showtags', '0', ((isset($_REQUEST["jak_showtags"]) && $_REQUEST["jak_showtags"] == '0') || !isset($_REQUEST["jak_showtags"])) ? TRUE : FALSE, 'jak_showtags2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showtags2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc14"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showlogin', '1', ((isset($_REQUEST["jak_showlogin"]) && $_REQUEST["jak_showlogin"] == '1')) ? TRUE : FALSE, 'jak_showlogin1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showlogin1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showlogin', '0', ((isset($_REQUEST["jak_showlogin"]) && $_REQUEST["jak_showlogin"] == '0') || !isset($_REQUEST["jak_showlogin"])) ? TRUE : FALSE, 'jak_showlogin2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showlogin2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc15"]);
												?>

											</div>
											<div class="col-md-7">

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html->addInput('text', 'jak_password', $_REQUEST["jak_password"], '', 'form-control');
												?>

											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
								?>

							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html->addTag('h3', $tl["page_box_title"]["pagebt1"], 'box-title');
								?>

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

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
								?>

							</div>
						</div>
						<?php if (JAK_TAGS) { ?>
							<div class="box box-success">
								<div class="box-header with-border">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html->addTag('h3', $tl["page_box_title"]["pagebt2"], 'box-title');
									?>

								</div>
								<div class="box-body">
									<div class="block">
										<div class="block-content">
											<div class="row-form">
												<div class="col-md-5">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html->addTag('strong', 'Choose tags from predefined list');
													?>

												</div>
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
												<div class="col-md-5">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html->addTag('strong', 'Choose tags from list');
													?>

												</div>
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
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html->addInput('text', 'jak_tags', $_REQUEST["jak_tags"], 'jak_tags', 'form-control tags', array ('data-role' => 'tagsinput'));
													?>

												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="box-footer">

									<?php
									// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
									echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
									?>

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

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html->addTag('h3', $tl["page_box_title"]["pagebt3"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<a href="../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=csseditor" class="ifManager"><?php echo $tl["global_text"]["globaltxt8"]; ?></a>
								<a href="javascript:;" id="addCssBlock"><?php echo $tl["global_text"]["globaltxt6"]; ?></a><br/>

								<?php
								// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
								echo $Html->addDiv('', 'csseditor');
								// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
								echo $Html->addTextarea('jak_css', $_REQUEST["jak_css"], '', '', array('id' => 'jak_css', 'class' => 'hidden'));
								?>

							</div>
							<div class="box-footer">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
								?>

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

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html->addTag('h3', $tl["page_box_title"]["pagebt4"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<a href="../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=javaeditor" class="ifManager"><?php echo $tl["global_text"]["globaltxt8"]; ?></a>
								<a href="javascript:;" id="addJavascriptBlock"><?php echo $tl["global_text"]["globaltxt7"]; ?></a><br/>

								<?php
								// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
								echo $Html->addDiv('', 'javaeditor');
								// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
								echo $Html->addTextarea('jak_javascript', $_REQUEST["jak_javascript"], '', '', array('id' => 'jak_javascript', 'class' => 'hidden'));
								?>

							</div>
							<div class="box-footer">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
								?>

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

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html->addTag('h3', $tl["page_box_title"]["pagebt5"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<!-- Moving stuff -->
								<ul class="jak_content_move">

									<li class="jakcontent">
										<div class="text"><?php echo $tl["page"]["p4"]; ?></div>
										<div class="actions">

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html->addInput('hidden', 'corder_new[]', '1', '', 'corder');
											echo $Html->addInput('hidden', 'real_plugin_id[]', '9999');
											?>

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

												<?php
												// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
												echo $Html->addInput('hidden', 'corder_new[]', '2', '', 'corder');
												echo $Html->addInput('hidden', 'real_plugin_id[]', '9997');
												?>

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

											<?php
											// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
											echo $Html->addInput('hidden', 'corder_new[]', '3', '', 'corder');
											echo $Html->addInput('hidden', 'real_plugin_id[]', '9998');
											?>

										</div>
									</li>

									<?php if (isset($JAK_HOOK_ADMIN_PAGE_NEW) && is_array ($JAK_HOOK_ADMIN_PAGE_NEW)) foreach ($JAK_HOOK_ADMIN_PAGE_NEW as $hspn) {
										include_once APP_PATH . $hspn["phpcode"];
									} ?>

								</ul>

								<!-- END Moving Stuff -->
							</div>
							<div class="box-footer">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
								?>

							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html->addTag('h3', $tl["page_box_title"]["pagebt6"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<?php include "sidebar_widget_new.php"; ?>
							</div>
							<div class="box-footer">

								<?php
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
								?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

<?php include "footer.php"; ?>