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
					if (isset($errors["e3"])) echo $errors["e3"];
					if (isset($errors["e4"])) echo $errors["e4"];
					if (isset($errors["e5"])) echo $errors["e5"];
					if (isset($errors["e6"])) echo $errors["e6"];?>',
			}, {
				// settings
				type: 'success',
				delay: 5000,
			});
		}, 1000);
	</script>
<?php } ?>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<!-- Fixed Button for save form -->
		<div class="savebutton">
			<button type="submit" name="save" class="btn btn-primary button">
				<i class="fa fa-save margin-right-5"></i>
				<?php echo $tl["general"]["g20"]; ?> !!
			</button>
		</div>

		<!-- Form Content -->
		<ul id="cmsTab" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
			<li role="presentation" class="active">
				<a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
					<span class="text"><?php echo $tl["submenu"]["sm10"]; ?></span>
				</a>
			</li>
			<li role="presentation" class="next">
				<a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
					<span class="text"><?php echo $tl["general"]["g89"]; ?></span>
				</a>
			</li>
		</ul>

		<div id="cmsTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
				<div class="row">
					<div class="col-md-7">
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tl["title"]["t4"]; ?></h3>
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
											<div class="col-md-5"><strong><?php echo $tl["page"]["p"]; ?></strong></div>
											<div class="col-md-7">
												<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
													<input type="text" name="jak_title" class="form-control" value="<?php echo $JAK_FORM_DATA["title"]; ?>"/>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["page"]["p5"]; ?></strong></div>
											<div class="col-md-7">
												<textarea name="jak_lcontent" class="form-control" rows="4"><?php echo jak_edit_safe_userpost ($JAK_FORM_DATA["content"]); ?></textarea>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlf["faq"]["d16"]; ?></strong></div>
											<div class="col-md-7">
												<div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">
													<input class="form-control" type="text" name="jak_email" value="<?php echo $jkv["faqemail"]; ?>"/>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlf["faq"]["d15"]; ?></strong></div>
											<div class="col-md-7">
												<div class="row">
													<div class="col-md-6">
														<select name="jak_showfaqordern" class="form-control selectpicker">
															<option value="id"<?php if ($JAK_SETTING['showfaqwhat'] == "id") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tlf["faq"]["d22"]; ?></option>
															<option value="title"<?php if ($JAK_SETTING['showfaqwhat'] == "title") { ?> selected="selected"<?php } ?>><?php echo $tlf["faq"]["d8"]; ?></option>
															<option value="time"<?php if ($JAK_SETTING['showfaqwhat'] == "time") { ?> selected="selected"<?php } ?>><?php echo $tlf["faq"]["d24"]; ?></option>
															<option value="hits"<?php if ($JAK_SETTING['showfaqwhat'] == "hits") { ?> selected="selected"<?php } ?>><?php echo $tlf["faq"]["d25"]; ?></option>
														</select>
													</div>
													<div class="col-md-6">
														<select name="jak_showfaqorder" class="form-control selectpicker">
															<option value="ASC"<?php if ($JAK_SETTING['showfaqorder'] == "ASC") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tl["general"]["g90"]; ?></option>
															<option value="DESC"<?php if ($JAK_SETTING['showfaqorder'] == "DESC") { ?> selected="selected"<?php } ?>><?php echo $tl["general"]["g91"]; ?></option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlf["faq"]["d14"]; ?></strong></div>
											<div class="col-md-7">
												<input type="text" name="jak_maxpost" class="form-control" value="<?php echo $jkv["faqmaxpost"]; ?>"/>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["setting"]["s4"]; ?></strong></div>
											<div class="col-md-7">
												<div class="form-group<?php if (isset($errors["e3"])) echo " has-error"; ?> no-margin">
													<input type="text" name="jak_date" class="form-control" value="<?php echo $jkv["faqdateformat"]; ?>"/>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tl["setting"]["s5"]; ?></strong></div>
											<div class="col-md-7">
												<div class="form-group<?php if (isset($errors["e4"])) echo " has-error"; ?> no-margin">
													<input type="text" name="jak_time" class="form-control" value="<?php echo $jkv["faqtimeformat"]; ?>"/>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlf["faq"]["d7"]; ?></strong></div>
											<div class="col-md-7">
												<div class="radio">
													<label class="checkbox-inline">
														<input type="radio" name="jak_faqurl" value="1"<?php if ($jkv["faqurl"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
													</label>
													<label class="checkbox-inline">
														<input type="radio" name="jak_faqurl" value="0"<?php if ($jkv["faqurl"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
													</label>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-5">
												<strong><?php echo $tl["general"]["g40"]; ?> / <?php echo $tl["general"]["g41"]; ?></strong>
											</div>
											<div class="col-md-7">
												<div class="form-group<?php if (isset($errors["e7"])) echo " has-error"; ?> no-margin">
													<input type="text" class="form-control" name="jak_rssitem" value="<?php echo $jkv["faqrss"]; ?>"/>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer">
								<button type="submit" name="save" class="btn btn-primary pull-right">
									<i class="fa fa-save margin-right-5"></i>
									<?php echo $tl["general"]["g20"]; ?>
								</button>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tl["title"]["t29"]; ?></h3>
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
											<div class="col-md-6"><strong><?php echo $tl["setting"]["s11"]; ?></strong></div>
											<div class="col-md-6">
												<div class="<?php if (isset($errors["e5"])) echo " has-error"; ?>">
													<select name="jak_mid" class="form-control selectpicker">
														<option value="2"<?php if ($jkv["faqpagemid"] == 2) { ?> selected="selected"<?php } ?>>
															<?php echo $tl["option"]["o1"]; ?>
														</option>
														<option value="4"<?php if ($jkv["faqpagemid"] == 4) { ?> selected="selected"<?php } ?>>
															<?php echo $tl["option"]["o2"]; ?>
														</option>
														<option value="6"<?php if ($jkv["faqpagemid"] == 6) { ?> selected="selected"<?php } ?>>
															<?php echo $tl["option"]["o3"]; ?>
														</option>
														<option value="8"<?php if ($jkv["faqpagemid"] == 8) { ?> selected="selected"<?php } ?>>
															<?php echo $tl["option"]["o4"]; ?>
														</option>
														<option value="10"<?php if ($jkv["faqpagemid"] == 10) { ?> selected="selected"<?php } ?>>
															<?php echo $tl["option"]["o5"]; ?>
														</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-6"><strong><?php echo $tl["setting"]["s12"]; ?></strong></div>
											<div class="col-md-6">
												<div class="form-group<?php if (isset($errors["e5"])) echo " has-error"; ?> no-margin">
													<input type="text" name="jak_item" class="form-control" value="<?php echo $jkv["faqpageitem"]; ?>"/>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer">
								<button type="submit" name="save" class="btn btn-primary pull-right">
									<i class="fa fa-save margin-right-5"></i>
									<?php echo $tl["general"]["g20"]; ?>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
				<div class="row">
					<div class="col-md-12">
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tl["general"]["g89"]; ?></h3>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
									</button>
								</div>
							</div>
							<div class="box-body">
								<?php include APP_PATH . "admin/template/sidebar_widget.php"; ?>
							</div>
							<div class="box-footer">
								<button type="submit" name="save" class="btn btn-primary pull-right">
									<i class="fa fa-save margin-right-5"></i>
									<?php echo $tl["general"]["g20"]; ?>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>