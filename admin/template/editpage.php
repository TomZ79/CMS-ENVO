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
			// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
			echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
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
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc3"]);
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
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc4"]);
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
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc5"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_shownav', '1', ($JAK_FORM_DATA["shownav"] == '1') ? TRUE : FALSE, 'jak_shownav1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_shownav1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_shownav', '0', ($JAK_FORM_DATA["shownav"] == '0') ? TRUE : FALSE, 'jak_shownav2');
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
													echo $Html->addRadio('jak_showfooter', '1', ($JAK_FORM_DATA["showfooter"] == '1') ? TRUE : FALSE, 'jak_showfooter1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showfooter1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showfooter', '0', ($JAK_FORM_DATA["showfooter"] == '0') ? TRUE : FALSE, 'jak_showfooter2');
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
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc8"]);
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
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc11"]);
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
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc13"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<?php
													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showtags', '1', ($JAK_FORM_DATA["showtags"] == '1') ? TRUE : FALSE, 'jak_showtags1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showtags1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showtags', '0', ($JAK_FORM_DATA["showtags"] == '0') ? TRUE : FALSE, 'jak_showtags2');
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
													echo $Html->addRadio('jak_showlogin', '1', ($JAK_FORM_DATA["showlogin"] == '1') ? TRUE : FALSE, 'jak_showlogin1');
													// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
													echo $Html->addLabel('jak_showlogin1', $tl["checkbox"]["chk"]);

													// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
													echo $Html->addRadio('jak_showlogin', '0', ($JAK_FORM_DATA["showlogin"] == '0') ? TRUE : FALSE, 'jak_showlogin2');
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
												echo $Html->addInput('text', 'jak_password', '', '', 'form-control');
												?>

											</div>
										</div>
										<?php if ($JAK_FORM_DATA["password"]) { ?>
											<div class="row-form">
												<div class="col-md-5">

													<?php
													// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
													echo $Html->addTag('strong', $tl["page_box_content"]["pagebc16"]);
													?>

												</div>
												<div class="col-md-7">
													<div class="checkbox-singel check-success">

														<?php
														// Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
														// Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
														echo $Html->addCheckbox('jak_delete_password', '', FALSE, 'jak_delete_password');
														echo $Html->addLabel('jak_delete_password', '');
														?>

													</div>
												</div>
											</div>
										<?php } ?>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc17"]);
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
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc18"]);
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
												echo $Html->addTag('strong', $tl["page_box_content"]["pagebc19"]);
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
								// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
								echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
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
													echo $Html->addInput('text', 'jak_tags', '', '', 'form-control tags', array ('data-role' => 'tagsinput'));
													?>

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
								<h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt3"]; ?></h3>
							</div>
							<div class="box-body">
								<a href="../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=csseditor" class="ifManager"><?php echo $tl["global_text"]["globaltxt8"]; ?></a>
								<a href="javascript:;" id="addCssBlock"><?php echo $tl["global_text"]["globaltxt6"]; ?></a><br/>

								<?php
								// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
								echo $Html->addDiv('', 'csseditor');
								// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
								echo $Html->addTextarea('jak_css', $JAK_FORM_DATA["page_css"], '', '', array('id' => 'jak_css', 'class' => 'hidden'));
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
								<h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt4"]; ?></h3>
							</div>
							<div class="box-body">
								<a href="../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=javaeditor" class="ifManager"><?php echo $tl["global_text"]["globaltxt8"]; ?></a>
								<a href="javascript:;" id="addJavascriptBlock"><?php echo $tl["global_text"]["globaltxt7"]; ?></a><br/>

								<?php
								// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
								echo $Html->addDiv('', 'javaeditor');
								// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
								echo $Html->addTextarea('jak_javascript', $JAK_FORM_DATA["page_javascript"], '', '', array('id' => 'jak_javascript', 'class' => 'hidden'));
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

														<?php
														// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
														echo $Html->addInput('hidden', 'corder[]', $pg["orderid"], '', 'corder');
														echo $Html->addInput('hidden', 'real_id[]', $pg["id"]);
														?>

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

														<?php
														// Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
														echo $Html->addInput('hidden', 'corder[]', $pg["orderid"], '', 'corder');
														echo $Html->addInput('hidden', 'real_id[]', $pg["id"]);
														?>

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
								<h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt6"]; ?></h3>
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
		echo $Html->addInput('hidden', 'jak_oldcatid', $JAK_FORM_DATA["catid"]);
		?>

	</form>

<?php include "footer.php"; ?>