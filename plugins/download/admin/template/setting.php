<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page2 == "s") { ?>
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
if ($page2 == "e") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["general_error"]["generror1"];?>'
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
					if (isset($errors["e2"])) echo $errors["e2"];
					if (isset($errors["e3"])) echo $errors["e3"];
					if (isset($errors["e4"])) echo $errors["e4"];
					if (isset($errors["e5"])) echo $errors["e5"];
					if (isset($errors["e6"])) echo $errors["e6"];?>'
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
		<div class="savebutton-small hidden-xs">

			<?php
			// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
			echo $Html->addButtonSubmit('save', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
			?>

		</div>

		<!-- Form Content -->
		<ul id="cmsTab" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
			<li role="presentation" class="active">
				<a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
					<span class="text"><?php echo $tld["downl_section_tab"]["downltab"]; ?></span>
				</a>
			</li>
			<li role="presentation" class="next">
				<a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
					<span class="text"><?php echo $tld["downl_section_tab"]["downltab1"]; ?></span>
				</a>
			</li>
			<li role="presentation">
				<a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
					<span class="text"><?php echo $tld["downl_section_tab"]["downltab2"]; ?></span>
				</a>
			</li>
			<li role="presentation">
				<a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
					<span class="text"><?php echo $tld["downl_section_tab"]["downltab3"]; ?></span>
				</a>
			</li>
		</ul>

		<div id="cmsTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
				<div class="row">
					<div class="col-md-7">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html->addTag('h3', $tld["downl_box_title"]["downlbt"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
													<input type="text" name="jak_title" class="form-control" value="<?php echo $JAK_FORM_DATA["title"]; ?>"/>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc1"]);
												?>

											</div>
											<div class="col-md-7">
												<textarea name="jak_lcontent" class="form-control" rows="4"><?php echo jak_edit_safe_userpost ($JAK_FORM_DATA["content"]); ?></textarea>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc2"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">
													<input class="form-control" type="text" name="jak_email" value="<?php echo $jkv["downloademail"]; ?>"/>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc3"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="row">
													<div class="col-md-6">
														<select name="jak_showdlordern" class="form-control selectpicker">
															<option value="id"<?php if ($JAK_SETTING['showdlwhat'] == "id") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tld["dload"]["d22"]; ?></option>
															<option value="name"<?php if ($JAK_SETTING['showdlwhat'] == "name") { ?> selected="selected"<?php } ?>><?php echo $tld["dload"]["d23"]; ?></option>
															<option value="time"<?php if ($JAK_SETTING['showdlwhat'] == "time") { ?> selected="selected"<?php } ?>><?php echo $tld["dload"]["d24"]; ?></option>
															<option value="hits"<?php if ($JAK_SETTING['showdlwhat'] == "hits") { ?> selected="selected"<?php } ?>><?php echo $tld["dload"]["d25"]; ?></option>
															<option value="countdl"<?php if ($JAK_SETTING['showdlwhat'] == "countdl") { ?> selected="selected"<?php } ?>><?php echo $tld["dload"]["d9"]; ?></option>
														</select>
													</div>
													<div class="col-md-6">
														<select name="jak_showdlorder" class="form-control selectpicker">
															<option value="ASC"<?php if ($JAK_SETTING['showdlorder'] == "ASC") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tl["general"]["g90"]; ?></option>
															<option value="DESC"<?php if ($JAK_SETTING['showdlorder'] == "DESC") { ?> selected="selected"<?php } ?>><?php echo $tl["general"]["g91"]; ?></option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc5"]);
												?>

											</div>
											<div class="col-md-7">
												<input type="text" name="jak_maxpost" class="form-control" value="<?php echo $jkv["downloadmaxpost"]; ?>"/>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc6"]);
												echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
												?>

											</div>
											<div class="col-md-7">
												<div class="form-group<?php if (isset($errors["e3"])) echo " has-error"; ?> no-margin">
													<input type="text" name="jak_date" class="form-control" value="<?php echo $jkv["downloaddateformat"]; ?>"/>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc7"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="form-group<?php if (isset($errors["e4"])) echo " has-error"; ?> no-margin">
													<input type="text" name="jak_time" class="form-control" value="<?php echo $jkv["downloadtimeformat"]; ?>"/>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc8"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="radio">
													<label class="checkbox-inline">
														<input type="radio" name="jak_downloadurl" value="1"<?php if ($jkv["downloadurl"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
													</label>
													<label class="checkbox-inline">
														<input type="radio" name="jak_downloadurl" value="0"<?php if ($jkv["downloadurl"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
													</label>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc9"] . ' / ' . $tld["downl_box_content"]["downlbc10"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="form-group<?php if (isset($errors["e7"])) echo " has-error"; ?> no-margin">
													<input type="text" name="jak_rssitem" class="form-control" value="<?php echo $jkv["downloadrss"]; ?>"/>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc11"]);
												?>

											</div>
											<div class="col-md-7">
												<div class="form-group<?php if (isset($errors["e6"])) echo " has-error"; ?> no-margin">
													<input type="text" class="form-control" name="jak_path" value="<?php echo $jkv["downloadpath"]; ?>"/>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc12"]);
												?>

											</div>
											<div class="col-md-7">
												<input type="text" name="jak_twitter" class="form-control" value="<?php echo $jkv["downloadtwitter"]; ?>"/>
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
					<div class="col-md-5">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html->addTag('h3', $tld["downl_box_title"]["downlbt1"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-6">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc13"]);
												?>

											</div>
											<div class="col-md-6">
												<div class="<?php if (isset($errors["e5"])) echo " has-error"; ?>">
													<select name="jak_mid" class="form-control selectpicker">

														<?php
														// Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
														echo $Html->addOption('2', $tl["selection"]["sel1"], ($jkv['downloadpagemid'] == 2) ? TRUE : FALSE);
														echo $Html->addOption('4', $tl["selection"]["sel2"], ($jkv['downloadpagemid'] == 4) ? TRUE : FALSE);
														echo $Html->addOption('6', $tl["selection"]["sel3"], ($jkv['downloadpagemid'] == 6) ? TRUE : FALSE);
														echo $Html->addOption('8', $tl["selection"]["sel4"], ($jkv['downloadpagemid'] == 8) ? TRUE : FALSE);
														echo $Html->addOption('10', $tl["selection"]["sel5"], ($jkv['downloadpagemid'] == 10) ? TRUE : FALSE);
														?>

													</select>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-6">

												<?php
												// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
												echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc14"]);
												?>

											</div>
											<div class="col-md-6">
												<div class="form-group<?php if (isset($errors["e5"])) echo " has-error"; ?> no-margin">
													<input type="text" name="jak_item" class="form-control" value="<?php echo $jkv["downloadpageitem"]; ?>"/>
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
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html->addTag('h3', $tld["downl_box_title"]["downlbt2"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<a href="../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=csseditor" class="ifManager"><?php echo $tl["general"]["g69"]; ?></a>
								<a href="javascript:;" id="addCssBlock"><?php echo $tl["general"]["g101"]; ?></a><br/>
								<div id="csseditor"></div>
								<textarea name="jak_css" class="form-control hidden" id="jak_css" rows="20"><?php echo $jkv["download_css"]; ?></textarea>
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
			<div role="tabpanel" class="tab-pane fade" id="cmsPage3" aria-labelledby="cmsPage3-tab">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-success">
							<div class="box-header with-border">

								<?php
								// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
								echo $Html->addTag('h3', $tld["downl_box_title"]["downlbt3"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<a href="../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=javaeditor" class="ifManager"><?php echo $tl["general"]["g69"]; ?></a>
								<a href="javascript:;" id="addJavascriptBlock"><?php echo $tl["general"]["g102"]; ?></a><br/>
								<div id="javaeditor"></div>
								<textarea name="jak_javascript" class="form-control hidden" id="jak_javascript" rows="20"><?php echo $jkv["download_javascript"]; ?></textarea>
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
								echo $Html->addTag('h3', $tld["downl_box_title"]["downlbt4"], 'box-title');
								?>

							</div>
							<div class="box-body">
								<?php include APP_PATH . "admin/template/sidebar_widget.php"; ?>
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

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>