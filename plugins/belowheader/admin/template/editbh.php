<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page3 == "s") { ?>
	<script type="text/javascript">
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
<?php } ?>

<?php if ($errors) { ?>
	<script type="text/javascript">
		setTimeout(function () {
			$.notify({
				// options
				message: '<?php if (isset($errors["e"])) echo $errors["e"];
					if (isset($errors["e1"])) echo $errors["e1"];?>',
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
		<div class="savebutton hidden-xs">
			<button type="submit" name="save" class="btn btn-success button">
				<i class="fa fa-save margin-right-5"></i>
				<?php echo $tl["button"]["btn1"]; ?> !!
			</button>
		</div>

		<!-- Form Content -->
		<ul id="cmsTabEditBH" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
			<li role="presentation" class="active">
				<a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
					<span class="text"><?php echo $tlbh["bh_section_tab"]["bhtab"]; ?></span>
				</a>
			</li>
			<li role="presentation" class="next">
				<a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
					<span class="text"><?php echo $tlbh["bh_section_tab"]["bhtab1"]; ?></span>
				</a>
			</li>
			<li role="presentation">
				<a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
					<span class="text"><?php echo $tlbh["bh_section_tab"]["bhtab2"]; ?></span>
				</a>
			</li>
		</ul>

		<div id="cmsTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
				<div class="row">
					<div class="col-md-6">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlbh["bh_box_title"]["bhbt"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-5">
												<strong><?php echo $tlbh["bh_box_content"]["bhbc"]; ?></strong>
												<span class="star-item text-danger-800 m-l-10">*</span>
											</div>
											<div class="col-md-7">
												<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
													<input class="form-control" type="text" name="jak_title" value="<?php echo $JAK_FORM_DATA["title"]; ?>"/>
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
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlbh["bh_box_title"]["bhbt1"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-12">
												<select name="jak_pageid[]" multiple="multiple" class="form-control" style="min-height: 330px;">
													<option value="0"<?php if ($JAK_FORM_DATA["pageid"] == 0) { ?> selected="selected"<?php } ?>><?php echo $tlbh["bh_box_content"]["bhbc1"]; ?></option>
													<?php if (isset($JAK_PAGES) && is_array ($JAK_PAGES)) foreach ($JAK_PAGES as $z) { ?>
														<option value="<?php echo $z["id"]; ?>"<?php if (in_array ($z["id"], explode (',', $JAK_FORM_DATA["pageid"]))) { ?> selected="selected"<?php } ?>><?php echo $z["title"]; ?></option>
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
					</div>
					<div class="col-md-6">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlbh["bh_box_title"]["bhbt2"]; ?>
									<a class="cms-help" data-content="<?php echo $tlbh["bh_help"]["bhh"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tlbh["bh_help"]["bhh"]; ?>">
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
													<option value="0"<?php if ($JAK_FORM_DATA["permission"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tlbh["bh_box_content"]["bhbc2"]; ?></option>
													<?php if (isset($JAK_USERGROUP) && is_array ($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) { ?>
														<option value="<?php echo $v["id"]; ?>"<?php if (in_array ($v["id"], explode (',', $JAK_FORM_DATA["permission"]))) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
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
								<h3 class="box-title"><?php echo $tlbh["bh_box_title"]["bhbt3"]; ?></h3>
							</div>
							<div class="box-body">
								<div class="block">
									<div class="block-content">
										<div class="row-form">
											<div class="col-md-5"><strong><?php echo $tlbh["bh_box_content"]["bhbc3"]; ?></strong></div>
											<div class="col-md-7">
												<select name="jak_newsid[]" multiple="multiple" class="form-control">
													<option value="0"<?php if ($JAK_FORM_DATA["newsid"] == 0) { ?> selected="selected"<?php } ?>><?php echo $tlbh["bh_box_content"]["bhbc1"]; ?></option>
													<?php if (isset($JAK_NEWS) && is_array ($JAK_NEWS)) foreach ($JAK_NEWS as $n) { ?>
														<option value="<?php echo $n["id"]; ?>"<?php if (in_array ($n["id"], explode (',', $JAK_FORM_DATA["newsid"]))) { ?> selected="selected"<?php } ?>><?php echo $n["title"]; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-7"><strong><?php echo $tlbh["bh_box_content"]["bhbc4"]; ?></strong></div>
											<div class="col-md-5">
												<div class="radio radio-success">

													<input type="radio" id="jak_mainnews1" name="jak_mainnews" value="1"<?php if ($JAK_FORM_DATA["newsmain"] == '1') { ?> checked="checked"<?php } ?> />
													<label for="jak_mainnews1"><?php echo $tl["checkbox"]["chk"]; ?></label>

													<input type="radio" id="jak_mainnews2" name="jak_mainnews" value="0"<?php if ($JAK_FORM_DATA["newsmain"] == '0') { ?> checked="checked"<?php } ?> />
													<label for="jak_mainnews2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

												</div>
											</div>
										</div>
										<?php if (JAK_TAGS) { ?>
											<div class="row-form">
												<div class="col-md-7"><strong><?php echo $tlbh["bh_box_content"]["bhbc5"]; ?></strong></div>
												<div class="col-md-5">
													<div class="radio radio-success">

														<input type="radio" id="jak_tags1" name="jak_tags" value="1"<?php if ($JAK_FORM_DATA["tags"] == '1') { ?> checked="checked"<?php } ?> />
														<label for="jak_tags1"><?php echo $tl["checkbox"]["chk"]; ?></label>

														<input type="radio" id="jak_tags2" name="jak_tags" value="0"<?php if ($JAK_FORM_DATA["tags"] == '0') { ?> checked="checked"<?php } ?> />
														<label for="jak_tags2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

													</div>
												</div>
											</div>
										<?php } ?>
										<div class="row-form">
											<div class="col-md-7"><strong><?php echo $tlbh["bh_box_content"]["bhbc6"]; ?></strong></div>
											<div class="col-md-5">
												<div class="radio radio-success">

													<input type="radio" id="jak_search1" name="jak_search" value="1"<?php if ($JAK_FORM_DATA["search"] == '1') { ?> checked="checked"<?php } ?> />
													<label for="jak_search1"><?php echo $tl["checkbox"]["chk"]; ?></label>

													<input type="radio" id="jak_search2" name="jak_search" value="0"<?php if ($JAK_FORM_DATA["search"] == '0') { ?> checked="checked"<?php } ?> />
													<label for="jak_search2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

												</div>
											</div>
										</div>
										<div class="row-form">
											<div class="col-md-7"><strong><?php echo $tlbh["bh_box_content"]["bhbc7"]; ?></strong></div>
											<div class="col-md-5">
												<div class="radio radio-success">

													<input type="radio" id="jak_sitemap1" name="jak_sitemap" value="1"<?php if ($JAK_FORM_DATA["sitemap"] == '1') { ?> checked="checked"<?php } ?> />
													<label for="jak_sitemap1"><?php echo $tl["checkbox"]["chk"]; ?></label>

													<input type="radio" id="jak_sitemap2" name="jak_sitemap" value="0"<?php if ($JAK_FORM_DATA["sitemap"] == '0') { ?> checked="checked"<?php } ?> />
													<label for="jak_sitemap2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

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
				<?php $tl["title"]["t14"] = $tlbh["bh_box_title"]["bhbt4"]; ?>

				<div class="row">
					<div class="col-md-12">
						<?php include_once APP_PATH . "admin/template/editor_edit.php"; ?>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="cmsPage3" aria-labelledby="cmsPage3-tab">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $tlbh["bh_box_title"]["bhbt5"]; ?></h3>
							</div>
							<div class="box-body">
								<table class="table table-striped">
									<tr>
										<td>
											<?php if ($jkv["adv_editor"]) { ?>
												<div id="cover2">
													<div class="cover-header">
														<a href="../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=0&editor=mce_0&lang=eng&fldr=&field_id=htmleditor2" class="btn btn-primary btn-xs ifManager">
															<i class="fa fa-files-o"></i>
														</a>
													</div>
													<div id="editorContainer2">
														<div id="htmleditor2"></div>
													</div>
												</div>
												<textarea name="jak_contentb" class="form-control hidden" id="jak_editor2"><?php echo jak_edit_safe_userpost (htmlspecialchars ($JAK_FORM_DATA["content_below"])); ?></textarea>
											<?php } else { ?>
												<textarea name="jak_contentb" class="form-control jakEditor" id="jakEditor2" rows="40"><?php echo jak_edit_safe_userpost ($JAK_FORM_DATA["content_below"]); ?></textarea>
											<?php } ?>
										</td>
									</tr>
								</table>
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