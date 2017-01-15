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
				delay: 5000,
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
				delay: 5000,
			});
		}, 1000);
	</script>
<?php } ?>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<!-- Fixed Button for save form -->
		<div class="savebutton">
			<button type="submit" name="save" class="btn btn-success button">
				<i class="fa fa-save margin-right-5"></i>
				<?php echo $tl["button"]["btn1"]; ?> !!
			</button>
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
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlgwl["gwl_box_title"]["gwlbt"]; ?></h3>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
									</button>
								</div>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-4"><strong><?php echo $tlgwl["gwl_box_content"]["gwlbc"]; ?></strong></div>
											<div class="col-md-8">
												<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
													<input type="text" name="jak_title" class="form-control" value=""/>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-4"><strong><?php echo $tl["gwl_box_content"]["gwlbc28"]; ?></strong></div>
											<div class="col-md-8">
												<div class="input-group">
													<input type="text" name="jak_img" id="jak_img" class="form-control" value="<?php if (isset($_REQUEST["jak_img"])) echo $_REQUEST["jak_img"]; ?>"/>
                        <span class="input-group-btn">
                          <a class="btn btn-info ifManager" type="button" href="../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=1&subfolder=&editor=mce_0&lang=eng&fldr=&field_id=jak_img"><?php echo $tl["gwl_box_content"]["globaltxt8"]; ?></a>
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
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlgwl["gwl_box_title"]["gwlbt1"]; ?>
									<a class="cms-help" data-content="<?php echo $tlgwl["gwl_help"]["gwlh1"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tlgwl["gwl_help"]["gwlh"]; ?>">
										<i class="fa fa-question-circle"></i>
									</a>
								</h3>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
									</button>
								</div>
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
								<button type="submit" name="save" class="btn btn-success pull-right">
									<i class="fa fa-save margin-right-5"></i>
									<?php echo $tl["button"]["btn1"]; ?>
								</button>
							</div>
						</div>
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlgwl["gwl_box_title"]["gwlbt2"]; ?></h3>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
									</button>
								</div>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-7"><strong><?php echo $tlgwl["gwl_box_content"]["gwlbc2"]; ?></strong></div>
											<div class="col-md-5">
												<div class="radio">
													<label class="checkbox-inline">
														<input type="radio" name="jak_all" value="1"<?php if (isset($_REQUEST["jak_all"]) && $_REQUEST["jak_all"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
													</label>
													<label class="checkbox-inline">
														<input type="radio" name="jak_all" value="0"<?php if ((isset($_REQUEST["jak_all"]) && $_REQUEST["jak_all"] == '0') || !isset($_REQUEST["jak_all"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
													</label>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-7"><strong><?php echo $tlgwl["gwl_box_content"]["gwlbc3"]; ?></strong></div>
											<div class="col-md-5">
												<div class="radio">
													<label class="checkbox-inline">
														<input type="radio" name="jak_cookies" value="1"<?php if (isset($_REQUEST["jak_cookies"]) && $_REQUEST["jak_cookies"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
													</label>
													<label class="checkbox-inline">
														<input type="radio" name="jak_cookies" value="0"<?php if ((isset($_REQUEST["jak_cookies"]) && $_REQUEST["jak_cookies"] == '0') || !isset($_REQUEST["jak_cookies"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
													</label>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-7"><strong><?php echo $tlgwl["gwl_box_content"]["gwlbc4"]; ?></strong></div>
											<div class="col-md-5">
												<select name="jak_cookiestime" class="form-control selectpicker" data-live-search="true" data-size="5">
													<?php for ($i = 1; $i <= 99; $i ++) { ?>
														<option value="<?php echo $i ?>"<?php if (isset($_REQUEST["jak_cookiestime"]) && $_REQUEST["jak_cookiestime"] == $i) { ?> selected="selected"<?php } ?>><?php echo $i; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="row-form disablerow">
											<div class="col-md-7"><strong><?php echo $tlgwl["gwl_box_content"]["gwlbc5"]; ?></strong></div>
											<div class="col-md-5">
												<select name="jak_dur" class="form-control selectpicker" data-size="5">
													<option value="3000"<?php if (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 3000) { ?> selected="selected"<?php } ?>>
														3
													</option>
													<option value="4000"<?php if (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 4000) { ?> selected="selected"<?php } ?>>
														4
													</option>
													<option value="5000"<?php if (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 5000) { ?> selected="selected"<?php } ?>>
														5
													</option>
													<option value="6000"<?php if (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 6000) { ?> selected="selected"<?php } ?>>
														6
													</option>
													<option value="7000"<?php if (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 7000) { ?> selected="selected"<?php } ?>>
														7
													</option>
													<option value="8000"<?php if (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 8000) { ?> selected="selected"<?php } ?>>
														8
													</option>
													<option value="9000"<?php if (isset($_REQUEST["jak_dur"]) && $_REQUEST["jak_dur"] == 9000) { ?> selected="selected"<?php } ?>>
														9
													</option>
												</select>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-7"><strong><?php echo $tlgwl["gwl_box_content"]["gwlbc6"]; ?></strong></div>
											<div class="col-md-5">
												<div class="radio">
													<label class="checkbox-inline">
														<input type="radio" name="jak_sticky" value="1"<?php if ((isset($_REQUEST["jak_sticky"]) && $_REQUEST["jak_sticky"] == '1') || !isset($_REQUEST["jak_sticky"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
													</label>
													<label class="checkbox-inline">
														<input type="radio" name="jak_sticky" value="0"<?php if (isset($_REQUEST["jak_sticky"]) && $_REQUEST["jak_sticky"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
													</label>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-7"><strong><?php echo $tlgwl["gwl_box_content"]["gwlbc7"]; ?></strong></div>
											<div class="col-md-5">
												<select name="jak_class" class="form-control selectpicker" data-size="5">
													<option value="top-right"<?php if (isset($_REQUEST["jak_class"]) && $_REQUEST["jak_class"] == "top-right") { ?> selected="selected"<?php } ?>><?php echo $tlgwl["gwl_box_content"]["gwlbc8"]; ?></option>
													<option value="top-left"<?php if (isset($_REQUEST["jak_class"]) && $_REQUEST["jak_class"] == "top-left") { ?> selected="selected"<?php } ?>><?php echo $tlgwl["gwl_box_content"]["gwlbc9"]; ?></option>
													<option value="center"<?php if (isset($_REQUEST["jak_class"]) && $_REQUEST["jak_class"] == "center") { ?> selected="selected"<?php } ?>><?php echo $tlgwl["gwl_box_content"]["gwlbc10"]; ?></option>
													<option value="bottom-left"<?php if (isset($_REQUEST["jak_class"]) && $_REQUEST["jak_class"] == "bottom-left") { ?> selected="selected"<?php } ?>><?php echo $tlgwl["gwl_box_content"]["gwlbc11"]; ?></option>
													<option value="bottom-right"<?php if (isset($_REQUEST["jak_class"]) && $_REQUEST["jak_class"] == "bottom-right") { ?> selected="selected"<?php } ?>><?php echo $tlgwl["gwl_box_content"]["gwlbc12"]; ?></option>
												</select>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-7"><strong><?php echo $tlgwl["gwl_box_content"]["gwlbc13"]; ?></strong></div>
											<div class="col-md-5">
												<div class="radio">
													<label class="checkbox-inline">
														<input type="radio" name="jak_color" value="1"<?php if ((isset($_REQUEST["jak_color"]) && $_REQUEST["jak_color"] == '1') || !isset($_REQUEST["jak_color"])) { ?> checked="checked"<?php } ?> /> <?php echo $tlgwl["gwl_box_content"]["gwlbc14"]; ?>
													</label>
													<label class="checkbox-inline">
														<input type="radio" name="jak_color" value="0"<?php if (isset($_REQUEST["jak_color"]) && $_REQUEST["jak_color"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tlgwl["gwl_box_content"]["gwlbc15"]; ?>
													</label>
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
					<div class="col-md-6">
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlgwl["gwl_box_title"]["gwlbt3"]; ?>
									<a class="cms-help" data-content="<?php echo $tlgwl["gwl_help"]["gwlh1"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tlgwl["gwl_help"]["gwlh"]; ?>">
										<i class="fa fa-question-circle"></i>
									</a>
								</h3>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
									</button>
								</div>
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
								<button type="submit" name="save" class="btn btn-success pull-right">
									<i class="fa fa-save margin-right-5"></i>
									<?php echo $tl["button"]["btn1"]; ?>
								</button>
							</div>
						</div>
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlgwl["gwl_box_title"]["gwlbt4"]; ?></h3>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
									</button>
								</div>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlgwl["gwl_box_content"]["gwlbc17"]; ?></strong></div>
											<div class="col-md-7">
												<div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">
													<input type="text" name="jak_datefrom" id="datepickerFrom" class="form-control" value="<?php if (isset($_REQUEST["jak_datefrom"])) echo $_REQUEST["jak_datefrom"]; ?>" readonly/>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlgwl["gwl_box_content"]["gwlbc18"]; ?></strong></div>
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
								<button type="submit" name="save" class="btn btn-success pull-right">
									<i class="fa fa-save margin-right-5"></i>
									<?php echo $tl["button"]["btn1"]; ?>
								</button>
							</div>
						</div>
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlgwl["gwl_box_title"]["gwlbt5"]; ?>
									<a class="cms-help" data-content="<?php echo $tlgwl["gwl_help"]["gwlh1"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tlgwl["gwl_help"]["gwlh"]; ?>">
										<i class="fa fa-question-circle"></i>
									</a>
								</h3>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
									</button>
								</div>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlgwl["gwl_box_content"]["gwlbc19"]; ?></strong></div>
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
											<div class="col-md-5"><strong><?php echo $tlgwl["gwl_box_content"]["gwlbc20"]; ?></strong></div>
											<div class="col-md-7">
												<div class="radio">
													<label class="checkbox-inline">
														<input type="radio" name="jak_mainnews" value="1"<?php if (isset($_REQUEST["jak_mainnews"]) && $_REQUEST["jak_mainnews"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
													</label>
													<label class="checkbox-inline">
														<input type="radio" name="jak_mainnews" value="0"<?php if ((isset($_REQUEST["jak_mainnews"]) && $_REQUEST["jak_mainnews"] == '0') || !isset($_REQUEST["jak_mainnews"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
													</label>
												</div>
											</div>
										</div>
										<?php if (JAK_TAGS) { ?>
											<div class="row-form">
												<div class="col-md-5"><strong><?php echo $tlgwl["gwl_box_content"]["gwlbc21"]; ?></strong></div>
												<div class="col-md-7">
													<div class="radio">
														<label class="checkbox-inline">
															<input type="radio" name="jak_tags" value="1"<?php if (isset($_REQUEST["jak_tags"]) && $_REQUEST["jak_tags"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
														</label>
														<label class="checkbox-inline">
															<input type="radio" name="jak_tags" value="0"<?php if ((isset($_REQUEST["jak_tags"]) && $_REQUEST["jak_tags"] == '0') || !isset($_REQUEST["jak_tags"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
														</label>
													</div>
												</div>
											</div>
										<?php } ?>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlgwl["gwl_box_content"]["gwlbc22"]; ?></strong></div>
											<div class="col-md-7">
												<div class="radio">
													<label class="checkbox-inline">
														<input type="radio" name="jak_search" value="1"<?php if (isset($_REQUEST["jak_search"]) && $_REQUEST["jak_search"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
													</label>
													<label class="checkbox-inline">
														<input type="radio" name="jak_search" value="0"<?php if ((isset($_REQUEST["jak_search"]) && $_REQUEST["jak_search"] == '0') || !isset($_REQUEST["jak_search"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
													</label>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlgwl["gwl_box_content"]["gwlbc23"]; ?></strong></div>
											<div class="col-md-7">
												<div class="radio">
													<label class="checkbox-inline">
														<input type="radio" name="jak_sitemap" value="1"<?php if (isset($_REQUEST["jak_sitemap"]) && $_REQUEST["jak_sitemap"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
													</label>
													<label class="checkbox-inline">
														<input type="radio" name="jak_sitemap" value="0"<?php if ((isset($_REQUEST["jak_sitemap"]) && $_REQUEST["jak_sitemap"] == '0') || !isset($_REQUEST["jak_sitemap"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
													</label>
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

<?php if ($jkv["adv_editor"]) { ?>
	<script src="js/ace/ace.js" type="text/javascript"></script>
	<script type="text/javascript">

		// ACE editor
		<?php if ($jkv["adv_editor"]) { ?>
		var htmlACE = ace.edit("htmleditor");
		htmlACE.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
		htmlACE.session.setUseWrapMode(true);
		htmlACE.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
		htmlACE.setOptions({
			// session options
			mode: "ace/mode/html",
			tabSize: <?php echo $jkv["acetabSize"]; ?>,
			useSoftTabs: true,
			highlightActiveLine: <?php echo $jkv["aceactiveline"]; ?>,
			// renderer options
			showInvisibles: <?php echo $jkv["aceinvisible"]; ?>,
			showGutter: <?php echo $jkv["acegutter"]; ?>,
		});

		texthtml = $("#jak_editor").val();
		htmlACE.session.setValue(texthtml);
		<?php } ?>

		// Responsive Filemanager
		function responsive_filemanager_callback(field_id) {

			if (field_id == "htmleditor") {
				// get the path for the ace file
				var acefile = jQuery('#' + field_id).val();
				htmlACE.insert(acefile);
			}
		}

		// Submit Form
		$('form').submit(function () {
			$("#jak_editor").val(htmlACE.getValue());
		});
	</script>
<?php } ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>