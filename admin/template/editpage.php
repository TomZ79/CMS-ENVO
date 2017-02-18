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

	<form class="inline-form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<!-- Fixed Button for save form -->
		<div class="savebutton hidden-xs">

			<?php
			// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
			echo $htmlE->addButtonSubmit('save', '', 'btn btn-success button', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ');
			?>

		</div>

		<!-- Form Content -->
		<ul id="EditP" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
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

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["page_box_content"]["pagebc3"] . $htmlE->endTag('strong');
												echo $htmlE->startTag('span', array ('class' => 'star-item text-danger-800 m-l-10')) . '*' . $htmlE->endTag('span');
												?>

											</div>
											<div class="col-md-7">
												<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													echo $htmlE->addInput('text', 'jak_title', '', 'form-control', $JAK_FORM_DATA["title"], '');
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["page_box_content"]["pagebc4"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													($JAK_FORM_DATA["showtitle"] == '1') ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput('radio', 'jak_showtitle', 'jak_showtitle1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor('jak_showtitle1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													($JAK_FORM_DATA["showtitle"] == '0') ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput('radio', 'jak_showtitle', 'jak_showtitle2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor('jak_showtitle2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["page_box_content"]["pagebc5"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													($JAK_FORM_DATA["shownav"] == '1') ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput('radio', 'jak_shownav', 'jak_shownav1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor('jak_shownav1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													($JAK_FORM_DATA["shownav"] == '0') ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput('radio', 'jak_shownav', 'jak_shownav2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor('jak_shownav2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["page_box_content"]["pagebc6"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													($JAK_FORM_DATA["showfooter"] == '1') ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput('radio', 'jak_showfooter', 'jak_showfooter1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor('jak_showfooter1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													($JAK_FORM_DATA["showfooter"] == '0') ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput('radio', 'jak_showfooter', 'jak_showfooter2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor('jak_showfooter2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["page_box_content"]["pagebc7"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													($JAK_FORM_DATA["showdate"] == '1') ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput('radio', 'jak_showdate', 'jak_showdate1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor('jak_showdate1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													($JAK_FORM_DATA["showdate"] == '0') ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput('radio', 'jak_showdate', 'jak_showdate2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor('jak_showdate2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["page_box_content"]["pagebc8"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													($JAK_FORM_DATA["sidebar"] == '1') ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput('radio', 'jak_sidebar', 'jak_sidebar1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor('jak_sidebar1', $tl["checkbox"]["chk2"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													($JAK_FORM_DATA["sidebar"] == '0') ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput('radio', 'jak_sidebar', 'jak_sidebar2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor('jak_sidebar2', $tl["checkbox"]["chk3"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["page_box_content"]["pagebc11"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													($JAK_FORM_DATA["socialbutton"] == '1') ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput('radio', 'jak_social', 'jak_social1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor('jak_social1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													($JAK_FORM_DATA["socialbutton"] == '0') ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput('radio', 'jak_social', 'jak_social2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor('jak_social2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["page_box_content"]["pagebc13"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													($JAK_FORM_DATA["showtags"] == '1') ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput('radio', 'jak_showtags', 'jak_showtags1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor('jak_showtags1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													($JAK_FORM_DATA["showtags"] == '0') ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput('radio', 'jak_showtags', 'jak_showtags2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor('jak_showtags2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["page_box_content"]["pagebc14"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													($JAK_FORM_DATA["showlogin"] == '1') ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput('radio', 'jak_showlogin', 'jak_showlogin1', '', '1', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor('jak_showlogin1', $tl["checkbox"]["chk"]);

													// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
													($JAK_FORM_DATA["showlogin"] == '0') ? $checked = 'yes' : $checked = 'no';
													echo $htmlE->addInput('radio', 'jak_showlogin', 'jak_showlogin2', '', '0', $checked);
													// Arguments: for (id of associated form element), text
													echo $htmlE->addLabelFor('jak_showlogin2', $tl["checkbox"]["chk1"]);
													?>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["page_box_content"]["pagebc15"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">

												<?php
												// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
												echo $htmlE->addInput('text', 'jak_password', '', 'form-control', '', '');
												?>

											</div>
										</div>
										<?php if ($JAK_FORM_DATA["password"]) { ?>
											<div class="row-form">
												<div class="col-md-5">

													<?php
													// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
													// Add Html Element -> endTag (Arguments: tag)
													echo $htmlE->startTag('strong') . $tl["page_box_content"]["pagebc16"] . $htmlE->endTag('strong');
													?>

												</div>
												<div class="col-md-7">
													<div class="checkbox-singel check-success">
														<input type="checkbox" id="jak_delete_password" name="jak_delete_password"/>
														<label for="jak_delete_password"></label>
													</div>
												</div>
											</div>
										<?php } ?>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["page_box_content"]["pagebc17"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="checkbox-singel check-success">
													<input type="checkbox" id="jak_delete_rate" name="jak_delete_rate"/>
													<label for="jak_delete_rate"></label>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["page_box_content"]["pagebc18"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="checkbox-singel check-success">
													<input type="checkbox" id="jak_delete_hits" name="jak_delete_hits"/>
													<label for="jak_delete_hits"></label>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
												// Add Html Element -> endTag (Arguments: tag)
												echo $htmlE->startTag('strong') . $tl["page_box_content"]["pagebc19"] . $htmlE->endTag('strong');
												?>

											</div>
											<div class="col-md-7">
												<div class="checkbox-singel check-success">
													<input type="checkbox" id="jak_update_time" name="jak_update_time"/>
													<label for="jak_update_time"></label>
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
								<h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt1"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-12">
												<select name="jak_catid" class="form-control selectpicker" data-size="5">
													<option value="0"<?php if ($JAK_FORM_DATA["catid"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tl["page_box_content"]["pagebc"]; ?></option>
													<?php if (isset($JAK_CAT_NOTUSED) && is_array ($JAK_CAT_NOTUSED)) foreach ($JAK_CAT_NOTUSED as $v) { ?>
														<option value="<?php echo $v["id"]; ?>"<?php if ($v["id"] == $JAK_FORM_DATA["catid"]) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
													<?php if (isset($JAK_CAT) && is_array ($JAK_CAT)) foreach ($JAK_CAT as $z) {
														if ($z["id"] == $JAK_FORM_DATA["catid"]) { ?>
															<option value="<?php echo $z["id"]; ?>" selected="selected"><?php echo $z["name"]; ?></option><?php }
													} ?>
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
						<?php if (JAK_TAGS) { ?>
							<div class="box box-success">
								<div class="box-header with-border">
									<h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt2"]; ?></h3>
								</div>
								<div class="box-body">
									<div class="block">
										<div class="block-content">
											<div class="row-form">
												<div class="col-md-5">

													<?php
													// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
													// Add Html Element -> endTag (Arguments: tag)
													echo $htmlE->startTag('strong') . 'Choose tags from predefined list' . $htmlE->endTag('strong');
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
													// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
													// Add Html Element -> endTag (Arguments: tag)
													echo $htmlE->startTag('strong') . 'Choose tags from list' . $htmlE->endTag('strong');
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
													<input type="text" name="jak_tags" class="form-control tags" value="" data-role="tagsinput"/>
												</div>
											</div>
											<?php if ($JAK_TAGLIST) { ?>
												<div class="row-form">
													<div class="col-md-12">
														<div class="form-group">
															<label><?php echo $tl["general"]["g27"]; ?></label>
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
									// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
									echo $htmlE->addButtonSubmit('save', '', 'btn btn-success pull-right', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"]);
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
								<h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt3"]; ?></h3>
							</div>
							<div class="box-body">
								<a href="../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=csseditor" class="ifManager"><?php echo $tl["global_text"]["globaltxt8"]; ?></a>
								<a href="javascript:;" id="addCssBlock"><?php echo $tl["global_text"]["globaltxt6"]; ?></a><br/>

								<?php
								// Add Html Element -> addSimpleDiv (Arguments: id, value, optional assoc. array)
								echo $htmlE->addSimpleDiv ('csseditor', '');
								// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
								echo $htmlE->addTextArea ('jak_css', '', '', $JAK_FORM_DATA["page_css"], array ('id' => 'jak_css', 'class' => 'hidden'));
								?>

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

								<?php
								// Add Html Element -> addSimpleDiv (Arguments: id, value, optional assoc. array)
								echo $htmlE->addSimpleDiv ('javaeditor', '');
								// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
								echo $htmlE->addTextArea ('jak_javascript', '', '', $JAK_FORM_DATA["page_javascript"], array ('id' => 'jak_javascript', 'class' => 'hidden'));
								?>

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

									<?php if (isset($JAK_PAGE_GRID) && is_array ($JAK_PAGE_GRID)) foreach ($JAK_PAGE_GRID as $pg) {

										if ($pg["pluginid"] != 0) {

											if ($pg["pluginid"] == '9999') { ?>

												<li class="jakcontent">
													<div class="text"><?php echo $tl["page"]["p4"]; ?></div>
													<div class="actions">

														<input type="hidden" name="corder[]" class="corder" value="<?php echo $pg["orderid"]; ?>"/>
														<input type="hidden" name="real_id[]" value="<?php echo $pg["id"]; ?>"/>

													</div>
												</li>

											<?php }
											if ($pg["pluginid"] == '9997' && $JAK_CONTACT_FORM) { ?>

												<li class="jakcontent">
													<div class="form-group">
														<label><?php echo $tl["global_text"]["globaltxt14"]; ?></label>
														<select name="jak_showcontact" class="form-control selectpicker" data-size="5">
															<option value="0"<?php if (isset($JAK_FORM_DATA["showcontact"]) && $JAK_FORM_DATA["showcontact"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tl["global_text"]["globaltxt13"]; ?></option>
															<?php if (isset($JAK_CONTACT_FORMS) && is_array ($JAK_CONTACT_FORMS)) foreach ($JAK_CONTACT_FORMS as $cf) { ?>
																<option value="<?php echo $cf["id"]; ?>"<?php if (isset($JAK_FORM_DATA["showcontact"]) && $cf["id"] == $JAK_FORM_DATA["showcontact"]) { ?> selected="selected"<?php } ?>><?php echo $cf["title"]; ?></option><?php } ?>
														</select>
													</div>
													<div class="actions">

														<input type="hidden" name="corder[]" class="corder" value="<?php echo $pg["orderid"]; ?>"/>
														<input type="hidden" name="real_id[]" value="<?php echo $pg["id"]; ?>"/>

													</div>
												</li>

											<?php }
											if ($pg["pluginid"] == '9998') { ?>

												<li class="jakcontent">
													<div class="form-group">
														<label><?php echo $tl["global_text"]["globaltxt9"]; ?></label>
														<div class="row">
															<div class="col-md-4">
																<select name="jak_shownewsorder" class="form-control selectpicker" data-size="5">
																	<option value="ASC"<?php if (isset($JAK_FORM_DATA["shownewsorder"]) && $JAK_FORM_DATA["shownewsorder"] == "ASC") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tl["global_text"]["globaltxt10"]; ?></option>
																	<option value="DESC"<?php if (isset($JAK_FORM_DATA["shownewsorder"]) && $JAK_FORM_DATA["shownewsorder"] == "DESC") { ?> selected="selected"<?php } ?>><?php echo $tl["global_text"]["globaltxt11"]; ?></option>
																</select>
															</div>
															<div class="col-md-4">
																<select name="jak_shownewsordern" class="form-control selectpicker">
																	<option value="id"<?php if ($JAK_FORM_DATA['shownewswhat'] == "id") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel9"]; ?></option>
																	<option value="title"<?php if ($JAK_FORM_DATA['shownewswhat'] == "title") { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel10"]; ?></option>
																	<option value="time"<?php if ($JAK_FORM_DATA['shownewswhat'] == "time") { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel11"]; ?></option>
																	<option value="hits"<?php if ($JAK_FORM_DATA['shownewswhat'] == "hits") { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel12"]; ?></option>
																</select>
															</div>
															<div class="col-md-4">
																<select name="jak_shownewsmany" class="form-control selectpicker" data-size="5">
																	<?php for ($i = 0; $i <= 10; $i ++) { ?>
																		<option value="<?php echo $i ?>"<?php if (isset($JAK_FORM_DATA["shownewsmany"]) && $JAK_FORM_DATA["shownewsmany"] == $i) { ?> selected="selected"<?php } ?>><?php echo $i; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</div>

													<div class="form-group">
														<label><?php echo $tl["global_text"]["globaltxt12"]; ?></label>
														<select name="jak_shownews[]" multiple="multiple" class="form-control">
															<option value="0"<?php if (isset($JAK_FORM_DATA["shownews"]) && $JAK_FORM_DATA["shownews"] == 0) { ?> selected="selected"<?php } ?>><?php echo $tl["global_text"]["globaltxt13"]; ?></option>
															<?php if (isset($JAK_GET_NEWS) && is_array ($JAK_GET_NEWS)) foreach ($JAK_GET_NEWS as $gn) { ?>
																<option value="<?php echo $gn["id"]; ?>"<?php if (isset($JAK_FORM_DATA["shownews"]) && (in_array ($gn["id"], explode (',', $JAK_FORM_DATA["shownews"]))) ) { ?> selected="selected"<?php } ?>><?php echo $gn["title"]; ?></option>
															<?php } ?>
														</select>
													</div>

													<div class="actions">

														<input type="hidden" name="corder[]" class="corder" value="<?php echo $pg["orderid"]; ?>"/>
														<input type="hidden" name="real_id[]" value="<?php echo $pg["id"]; ?>"/>

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
								// Add Html Element -> addButtonSubmit (Arguments: name, id, class, value, optional assoc. array)
								echo $htmlE->addButtonSubmit('save', '', 'btn btn-success pull-right', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"]);
								?>

							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt6"]; ?></h3>
							</div>
							<div class="box-body">
								<?php include "sidebar_widget.php"; ?>
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
		</div>
		<input type="hidden" name="jak_oldcatid" value="<?php echo $JAK_FORM_DATA["catid"]; ?>"/>
	</form>

<?php include "footer.php"; ?>