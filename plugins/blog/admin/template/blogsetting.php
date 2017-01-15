<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page2 == "s") { ?>
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
if ($page2 == "e") { ?>
	<script type="text/javascript">
		// Notification
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php echo $tl["general_error"]["generror1"];?>',
			}, {
				// settings
				type: 'success',
				delay: 5000,
			});
		}, 1000);
	</script>
<?php } ?>

<?php if ($errors) { ?>
	<div class="alert bg-danger fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<?php if (isset($errors["e"])) echo $errors["e"];
		if (isset($errors["e1"])) echo $errors["e1"];
		if (isset($errors["e2"])) echo $errors["e2"];
		if (isset($errors["e3"])) echo $errors["e3"];
		if (isset($errors["e4"])) echo $errors["e4"];
		if (isset($errors["e5"])) echo $errors["e5"];
		if (isset($errors["e6"])) echo $errors["e6"];
		if (isset($errors["e7"])) echo $errors["e7"]; ?>
	</div>
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
		<ul id="cmsTabSetBL" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
			<li role="presentation" class="active">
				<a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
					<span class="text"><?php echo $tlblog["blog_section_tab"]["blogtab"]; ?></span>
				</a>
			</li>
			<li role="presentation" class="next">
				<a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
					<span class="text"><?php echo $tlblog["blog_section_tab"]["blogtab1"]; ?></span>
				</a>
			</li>
			<li role="presentation">
				<a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
					<span class="text"><?php echo $tlblog["blog_section_tab"]["blogtab2"]; ?></span>
				</a>
			</li>
			<li role="presentation">
				<a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
					<span class="text"><?php echo $tlblog["blog_section_tab"]["blogtab3"]; ?></span>
				</a>
			</li>
		</ul>

		<div id="cmsTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
				<div class="row">
					<div class="col-md-7">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlblog["blog_box_title"]["blogbt"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlblog["blog_box_content"]["blogbc"]; ?></strong></div>
											<div class="col-md-7">
												<?php include_once APP_PATH . "admin/template/title_edit.php"; ?>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlblog["blog_box_content"]["blogbc1"]; ?></strong></div>
											<div class="col-md-7">
												<textarea name="jak_lcontent" class="form-control" rows="4"><?php echo jak_edit_safe_userpost ($JAK_FORM_DATA["content"]); ?></textarea>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlblog["blog_box_content"]["blogbc2"]; ?></strong></div>
											<div class="col-md-7">
												<div class="form-group no-margin<?php if (isset($errors["e2"])) echo " has-error"; ?>">
													<input class="form-control" type="text" name="jak_email" value="<?php echo $jkv["blogemail"]; ?>"/>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlblog["blog_box_content"]["blogbc3"]; ?></strong></div>
											<div class="col-md-7">
												<div class="row">
													<div class="col-md-6">
														<select name="jak_showblogordern" class="form-control selectpicker">
															<option value="id"<?php if ($JAK_SETTING['showblogwhat'] == "id") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel9"]; ?></option>
															<option value="title"<?php if ($JAK_SETTING['showblogwhat'] == "title") { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel10"]; ?></option>
															<option value="time"<?php if ($JAK_SETTING['showblogwhat'] == "time") { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel11"]; ?></option>
															<option value="hits"<?php if ($JAK_SETTING['showblogwhat'] == "hits") { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel12"]; ?></option>
														</select>
													</div>
													<div class="col-md-6">
														<select name="jak_showblogorder" class="form-control selectpicker">
															<option value="ASC"<?php if ($JAK_SETTING['showblogorder'] == "ASC") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel13"]; ?></option>
															<option value="DESC"<?php if ($JAK_SETTING['showblogorder'] == "DESC") { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel14"]; ?></option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlblog["blog_box_content"]["blogbc4"]; ?></strong></div>
											<div class="col-md-7">
												<select name="jak_bloglimit" class="form-control selectpicker">
													<?php for ($i = 0; $i <= 50; $i ++) { ?>
														<option value="<?php echo $i; ?>"<?php if ($jkv["bloghlimit"] == $i) { ?> selected="selected"<?php } ?>><?php echo $i; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlblog["blog_box_content"]["blogbc5"]; ?></strong></div>
											<div class="col-md-7">
												<input type="text" name="jak_maxpost" class="form-control" value="<?php echo $jkv["blogmaxpost"]; ?>"/>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlblog["blog_box_content"]["blogbc6"]; ?></strong></div>
											<div class="col-md-7">
												<div class="form-group no-margin<?php if (isset($errors["e3"])) echo " has-error"; ?>">
													<input type="text" name="jak_date" class="form-control" value="<?php echo $jkv["blogdateformat"]; ?>"/>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlblog["blog_box_content"]["blogbc7"]; ?></strong></div>
											<div class="col-md-7">
												<div class="form-group no-margin<?php if (isset($errors["e4"])) echo " has-error"; ?>">
													<input type="text" name="jak_time" class="form-control" value="<?php echo $jkv["blogtimeformat"]; ?>"/>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlblog["blog_box_content"]["blogbc8"]; ?></strong></div>
											<div class="col-md-7">
												<div class="radio radio-success">

													<input type="radio" id="jak_blogurl1" name="jak_blogurl" value="1"<?php if ($jkv["blogurl"] == 1) { ?> checked="checked"<?php } ?> />
													<label for="jak_blogurl1"><?php echo $tl["checkbox"]["chk"]; ?></label>

													<input type="radio" id="jak_blogurl2" name="jak_blogurl" value="0"<?php if ($jkv["blogurl"] == 0) { ?> checked="checked"<?php } ?> />
													<label for="jak_blogurl2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">
												<strong><?php echo $tlblog["blog_box_content"]["blogbc9"]; ?> / <?php echo $tlblog["blog_box_content"]["blogbc10"]; ?></strong>
											</div>
											<div class="col-md-7">
												<div class="form-group no-margin<?php if (isset($errors["e7"])) echo " has-error"; ?>">
													<input type="text" name="jak_rssitem" class="form-control" value="<?php echo $jkv["blogrss"]; ?>"/>
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
								<h3 class="box-title"><?php echo $tlblog["blog_box_title"]["blogbt1"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-6"><strong><?php echo $tlblog["blog_box_content"]["blogbc11"]; ?></strong>
											</div>
											<div class="col-md-6">
												<div class="<?php if (isset($errors["e5"])) echo " has-error"; ?>">
													<select name="jak_mid" class="form-control selectpicker">
														<option value="2"<?php if ($jkv["blogpagemid"] == 2) { ?> selected="selected"<?php } ?>>
															<?php echo $tl["selection"]["sel1"]; ?>
														</option>
														<option value="4"<?php if ($jkv["blogpagemid"] == 4) { ?> selected="selected"<?php } ?>>
															<?php echo $tl["selection"]["sel2"]; ?>
														</option>
														<option value="6"<?php if ($jkv["blogpagemid"] == 6) { ?> selected="selected"<?php } ?>>
															<?php echo $tl["selection"]["sel3"]; ?>
														</option>
														<option value="8"<?php if ($jkv["blogpagemid"] == 8) { ?> selected="selected"<?php } ?>>
															<?php echo $tl["selection"]["sel4"]; ?>
														</option>
														<option value="10"<?php if ($jkv["blogpagemid"] == 10) { ?> selected="selected"<?php } ?>>
															<?php echo $tl["selection"]["sel5"]; ?>
														</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-6"><strong><?php echo $tlblog["blog_box_content"]["blogbc12"]; ?></strong>
											</div>
											<div class="col-md-6">
												<div class="form-group no-margin<?php if (isset($errors["e5"])) echo " has-error"; ?>">
													<input type="text" name="jak_item" class="form-control" value="<?php echo $jkv["blogpageitem"]; ?>"/>
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
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlblog["blog_box_title"]["blogbt2"]; ?></h3>
							</div>
							<div class="box-body">
								<a href="../../../../js/editor/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=csseditor" class="ifManager"><?php echo $tl["global_text"]["globaltxt8"]; ?></a>
								<a href="javascript:;" id="addCssBlock"><?php echo $tl["global_text"]["globaltxt6"]; ?></a><br/>
								<div id="csseditor"></div>
								<textarea name="jak_css" class="form-control hidden" id="jak_css" rows="20"><?php echo $jkv["blog_css"]; ?></textarea>
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
			<div role="tabpanel" class="tab-pane fade" id="cmsPage3" aria-labelledby="cmsPage3-tab">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlblog["blog_box_title"]["blogbt3"]; ?></h3>
							</div>
							<div class="box-body">
								<a href="../../../../js/editor/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=javaeditor" class="ifManager"><?php echo $tl["global_text"]["globaltxt8"]; ?></a>
								<a href="javascript:;" id="addJavascriptBlock"><?php echo $tl["global_text"]["globaltxt7"]; ?></a><br/>
								<div id="javaeditor"></div>
								<textarea name="jak_javascript" class="form-control hidden" id="jak_javascript" rows="20"><?php echo $jkv["blog_javascript"]; ?></textarea>
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
								<h3 class="box-title"><?php echo $tlblog["blog_box_title"]["blogbt4"]; ?></h3>
							</div>
							<div class="box-body">
								<?php include APP_PATH . "admin/template/sidebar_widget.php"; ?>
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

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>