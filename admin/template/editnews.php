<?php include "header.php"; ?>

<?php if ($page3 == "s") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["notification"]["n7"];?>'
			}, {
				// settings
				type: 'success',
				delay: 5000
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
				message: '<?php echo $tl["general_error"]["generror1"]; ?>'
			}, {
				// settings
				type: 'danger',
				delay: 10000
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
					if (isset($errors["e2"])) echo $errors["e2"]; ?>'
			}, {
				// settings
				type: 'danger',
				delay: 10000
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
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html->addAnchor('index.php?p=news',  $tl["button"]["btn19"], '', 'btn btn-info button');
			?>

		</div>

		<!-- Form Content -->
		<ul id="cmsTabEditN" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
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
					<div class="col-md-6">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html->addTag('h3', $tl["news_box_title"]["newsbt5"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["news_box_content"]["newsbc11"]);
												echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
												?>

											</div>
											<div class="col-md-7">
												<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html->addInput('text', 'jak_title', $JAK_FORM_DATA["title"], '', 'form-control');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["news_box_content"]["newsbc12"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showtitle', '1', ($JAK_FORM_DATA["showtitle"] == '1') ? TRUE : FALSE, 'jak_showtitle1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showtitle1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showtitle', '0', ($JAK_FORM_DATA["showtitle"] == '0') ? TRUE : FALSE, 'jak_showtitle2');
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
												echo $Html->addTag('strong', $tl["news_box_content"]["newsbc13"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showdate', '1', ($JAK_FORM_DATA["showdate"] == '1') ? TRUE : FALSE, 'jak_showdate1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showdate1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showdate', '0', ($JAK_FORM_DATA["showdate"] == '0') ? TRUE : FALSE, 'jak_showdate2');
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
												echo $Html->addTag('strong', $tl["news_box_content"]["newsbc14"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showhits', '1', ($JAK_FORM_DATA["showhits"] == '1') ? TRUE : FALSE, 'jak_showhits1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showhits1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showhits', '0', ($JAK_FORM_DATA["showhits"] == '0') ? TRUE : FALSE, 'jak_showhits2');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showhits2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["news_box_content"]["newsbc15"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_social', '1', ($JAK_FORM_DATA["socialbutton"] == '1') ? TRUE : FALSE, 'jak_social1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_social1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_social', '0', ($JAK_FORM_DATA["socialbutton"] == '0') ? TRUE : FALSE, 'jak_social2');
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
												echo $Html->addTag('strong', $tl["news_box_content"]["newsbc17"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_sidebar', '1', ($JAK_FORM_DATA["sidebar"] == '1') ? TRUE : FALSE, 'jak_sidebar1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_sidebar1', $tl["checkbox"]["chk2"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_sidebar', '0', ($JAK_FORM_DATA["sidebar"] == '0') ? TRUE : FALSE, 'jak_sidebar2');
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
												echo $Html->addTag('strong', $tl["news_box_content"]["newsbc18"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="input-group">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html->addInput('text', 'jak_img', $JAK_FORM_DATA["previmg"], 'jak_img', 'form-control');
													?>

                          <span class="input-group-btn">

														<?php
														// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
														echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=1&subfolder=&editor=mce_0&lang=eng&fldr=&field_id=jak_img', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array('type' => 'button', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i22"]));
														?>

                          </span>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["news_box_content"]["newsbc19"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="checkbox-singel check-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addCheckbox('jak_delete_rate', '', FALSE, 'jak_delete_rate');
													echo $Html->addLabel('jak_delete_rate', '');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["news_box_content"]["newsbc20"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="checkbox-singel check-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addCheckbox('jak_delete_hits', '', FALSE, 'jak_delete_hits');
													echo $Html->addLabel('jak_delete_hits', '');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["news_box_content"]["newsbc21"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="checkbox-singel check-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addCheckbox('jak_update_time', '', FALSE, 'jak_update_time');
													echo $Html->addLabel('jak_update_time', '');
													?>

												</div>
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
								// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
								echo $Html->startTag('h3', array ('class' => 'box-title'));
								echo $tl["news_box_title"]["newsbt6"];
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help',  array ('data-content' => $tl["news_help"]["newsh1"], 'data-original-title' => $tl["news_help"]["newsh"]));
								// Add Html Element -> endTag (Arguments: tag)
								echo $Html->endTag('h3');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-12">
												<select name="jak_permission[]" multiple="multiple" class="form-control">

													<?php
													// Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
													$selected = ($JAK_FORM_DATA["permission"] == '0') ? TRUE : FALSE;

													echo $Html->addOption('0', $tl["news_box_content"]["newsbc22"], $selected);
													if (isset($JAK_USERGROUP) && is_array ($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) {

														$selected = (in_array ($v["id"], explode (',', $JAK_FORM_DATA["permission"]))) ? TRUE : FALSE;
														echo $Html->addOption($v["id"], $v["name"], $selected);

													}
													?>

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

						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html->addTag('h3', $tl["news_box_title"]["newsbt7"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["news_box_content"]["newsbc23"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="form-group no-margin <?php if (isset($errors["e2"])) echo "has-error"; ?>">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html->addInput('text', 'jak_datefrom', ($JAK_FORM_DATA["startdate"]) ? date ("Y-m-d H:i", $JAK_FORM_DATA["startdate"]) : '', 'datepickerFrom', 'form-control', array('readonly' => 'readonly'));
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["news_box_content"]["newsbc24"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="form-group no-margin <?php if (isset($errors["e2"])) echo "has-error"; ?>">

													<?php
													// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
													echo $Html->addInput('text', 'jak_dateto', ($JAK_FORM_DATA["enddate"]) ? date ("Y-m-d H:i", $JAK_FORM_DATA["enddate"]) : '', 'datepickerTo', 'form-control', array('readonly' => 'readonly'));
													?>

												</div>
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
									echo $Html->addTag('h3', $tl["news_box_title"]["newsbt8"], 'box-title');
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

															<?php
															// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
															echo $Html->addOption('skylink', 'Skylink');
															echo $Html->addOption('freesat', 'freeSAT');
															echo $Html->addOption('digi-tv', 'Digi TV');
															?>

														</optgroup>
														<optgroup label="Vysílací technologie">

															<?php
															// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
															echo $Html->addOption('dvb-t/t2', 'DVB-T/T2');
															echo $Html->addOption('dvb-s/s2', 'DVB-S/S2');
															echo $Html->addOption('dvb-c', 'DVB-C');
															echo $Html->addOption('dvb-h', 'DVB-H');
															?>

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
															<?php
															foreach ($JAK_TAG_ALL as $v) {

																// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
																echo $Html->addOption($v["tag"], $v["tag"]);

															}
															?>

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
													echo $Html->addInput('text', 'jak_tags', '', '', 'form-control tags', array ('data-role' => 'tagsinput'));
													?>

												</div>
											</div>
											<?php if ($JAK_TAGLIST) { ?>
												<div class="row-form">
													<div class="col-md-12">
														<div class="form-group">
															<label for="tags"><?php echo $tl["news_box_content"]["newsbc26"]; ?></label>
															<span>Zaškrté tagy budou při uložení smazány</span>
															<div class="controls">
																<?php echo $JAK_TAGLIST; ?>
															</div>
														</div>
													</div>
												</div>
											<?php } ?>
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
						<?php include_once "editor_edit.php"; ?>
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
								echo $Html->addTag('h3', $tl["news_box_title"]["newsbt2"], 'box-title');
								?>

							</div>
							<div class="box-body">

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=csseditor', $tl["global_text"]["globaltxt8"], '', 'ifManager');
								echo $Html->addAnchor('javascript:;', $tl["global_text"]["globaltxt6"], 'addCssBlock');
								echo '<br/>';
								// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
								echo $Html->addDiv('', 'csseditor');
								// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
								echo $Html->addTextarea('jak_css', $JAK_FORM_DATA["news_css"], '', '', array('id' => 'jak_css', 'class' => 'hidden'));
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
								echo $Html->addTag('h3', $tl["news_box_title"]["newsbt3"], 'box-title');
								?>

							</div>
							<div class="box-body">

								<?php
								// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
								echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=javaeditor', $tl["global_text"]["globaltxt8"], '', 'ifManager');
								echo $Html->addAnchor('javascript:;', $tl["global_text"]["globaltxt7"], 'addJavascriptBlock');
								echo '<br/>';
								// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
								echo $Html->addDiv('', 'javaeditor');
								// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
								echo $Html->addTextarea('jak_javascript', $JAK_FORM_DATA["news_javascript"], '', '', array('id' => 'jak_javascript', 'class' => 'hidden'));
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
								echo $Html->addTag('h3', $tl["news_box_title"]["newsbt9"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<!-- Moving stuff -->
								<ul class="jak_content_move">

									<?php if (isset($JAK_PAGE_GRID) && is_array ($JAK_PAGE_GRID)) foreach ($JAK_PAGE_GRID as $pg) {
										if ($pg["pluginid"] != 0) {
											if ($pg["pluginid"] == '9997' && $JAK_CONTACT_FORM) { ?>

												<li class="jakcontent">
													<div class="form-group">

														<?php
														// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
														echo $Html->addLabel('', $tl["news_box_content"]["newsbc27"]);
														?>

														<select name="jak_showcontact" class="form-control selectpicker" data-size="5">

															<?php
															// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
															$selected = ($JAK_FORM_DATA["showcontact"] == '0') ? TRUE : FALSE;

															echo $Html->addOption('0', $tl["news_box_content"]["newsbc25"], $selected);
															if (isset($JAK_CONTACT_FORMS) && is_array ($JAK_CONTACT_FORMS)) foreach ($JAK_CONTACT_FORMS as $cf) {

																echo $Html->addOption($cf["id"], $cf["title"], ($cf["id"] == $JAK_FORM_DATA["showcontact"]) ? TRUE : FALSE);

															}
															?>

														</select>
													</div>
													<div class="actions">

														<?php
														// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
														echo $Html->addInput('hidden', 'corder[]', $pg["orderid"], '', 'corder');
														echo $Html->addInput('hidden', 'real_id[]', $pg["id"]);
														?>

													</div>
												</li>

											<?php }

											if (isset($JAK_HOOK_ADMIN_PAGE) && is_array ($JAK_HOOK_ADMIN_PAGE)) foreach ($JAK_HOOK_ADMIN_PAGE as $hsp) {

												eval($hsp["phpcode"]);

											}

										}
									}

									if (isset($JAK_HOOK_ADMIN_PAGE_NEW) && is_array ($JAK_HOOK_ADMIN_PAGE_NEW)) foreach ($JAK_HOOK_ADMIN_PAGE_NEW as $hspn) {

										include_once APP_PATH . $hspn["phpcode"];

									}

									?>

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
								echo $Html->addTag('h3', $tl["news_box_title"]["newsbt4"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<?php include "sidebar_widget.php"; ?>
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

		<?php
		// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
		echo $Html->addInput('hidden', 'jak_active', $JAK_FORM_DATA["active"]);
		?>

	</form>

<?php include "footer.php"; ?>