<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	<!-- Fixed Button for save form -->
	<div class="savebutton-small hidden-xs">

		<?php
		// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
		echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
		?>

	</div>

	<!-- Form Content -->
	<ul class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
		<li role="presentation" class="active">
			<a href="#cmsPage1" id="cmsPage1-tab" role="tab"  data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
				<span class="text"><?php echo $tlporto["tplset_section_tab"]["tplsettab"]; ?></span>
			</a>
		</li>
		<li role="presentation" class="next">
			<a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
				<span class="text"><?php echo $tlporto["tplset_section_tab"]["tplsettab1"]; ?></span>
			</a>
		</li>
		<li role="presentation">
			<a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
				<span class="text"><?php echo $tlporto["tplset_section_tab"]["tplsettab2"]; ?></span>
			</a>
		</li>
		<li role="presentation">
			<a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
				<span class="text"><?php echo $tlporto["tplset_section_tab"]["tplsettab3"]; ?></span>
			</a>
		</li>
		<li role="presentation">
			<a href="#cmsPage5" role="tab" id="cmsPage5-tab" data-toggle="tab" aria-controls="cmsPage5">
				<span class="text"><?php echo $tlporto["tplset_section_tab"]["tplsettab4"]; ?></span>
			</a>
		</li>
	</ul>

	<div class="tab-content">
		<div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
			<div class="row">

				<div class="col-md-6">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html->addTag('h3', $tlporto["sb_box_title"]["sbbt"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-5"><strong><?php echo $tlporto["sb_box_content"]["sbbc"]; ?></strong></div>
										<div class="col-md-7">
											<select name="headerMetrics" class="form-control selectpicker" data-size="5">
												<option value="header-area navbar-fixed-top"<?php if ($jktpl["header_metrics_tpl"] == 'header-area navbar-fixed-top') { ?> selected="selected"<?php } ?>>Header 1</option>
												<option value="header-area navbar-fixed-top header-type-bg"<?php if ($jktpl["header_metrics_tpl"] == 'header-area navbar-fixed-top header-type-bg') { ?> selected="selected"<?php } ?>>Header 2</option>
												<option value="header-area header-11 navbar-fixed-top"<?php if ($jktpl["header_metrics_tpl"] == 'header-area header-11 navbar-fixed-top') { ?> selected="selected"<?php } ?>>Header 11</option>
												<option value="header-area header-11 header-12 navbar-fixed-top"<?php if ($jktpl["header_metrics_tpl"] == 'header-area header-11 header-12 navbar-fixed-top') { ?> selected="selected"<?php } ?>>Header 12</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
							?>

						</div>
					</div>
				</div>
				<div class="col-md-6">

				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
			<div class="row">
				<div class="col-md-7">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html->addTag('h3', $tlporto["sh_box_title"]["shbt"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-3">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											echo $Html->startTag('strong');
											echo $tlporto["sh_box_content"]["shbc"];
											// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
											echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tlporto["sh_help"]["shh1"], 'data-original-title' => $tlporto["sh_help"]["shh"]));
											// Add Html Element -> endTag (Arguments: tag)
											echo $Html->endTag('strong');
											?>

										</div>
										<div class="col-md-4">
											<div class="radio radio-success">

												<input type="radio" id="sitemapShow1" name="sitemapShow" value="1" <?php if ($jktpl["sitemapShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="sitemapShow1"><?php echo $tlporto["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="sitemapShow2" name="sitemapShow" value="0" <?php if ($jktpl["sitemapShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="sitemapShow2"><?php echo $tlporto["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
										<div class="col-md-1"><?php echo $tlporto["sh_box_content"]["shbc9"]; ?></div>
										<div class="col-md-4">
											<input type="text" name="sitemapLinks" class="form-control" value="<?php echo $jktpl["sitemapLinks_porto_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-3"><strong><?php echo $tlporto["sh_box_content"]["shbc1"]; ?></strong></div>
										<div class="col-md-9">
											<div class="radio radio-success">

												<input type="radio" id="loginShow1" name="loginShow" value="1" <?php if ($jktpl["loginShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="loginShow1"><?php echo $tlporto["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="loginShow2" name="loginShow" value="0" <?php if ($jktpl["loginShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="loginShow2"><?php echo $tlporto["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
							?>

						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html->addTag('h3', $tlporto["sh_box_title"]["shbt1"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-5"><strong><?php echo $tlporto["sh_box_content"]["shbc2"]; ?></strong></div>
										<div class="col-md-7">
											<div class="input-group">
												<input type="text" name="standardlogo1" id="sclogo1" class="form-control" value="<?php echo $jktpl["logo1_porto_tpl"]; ?>"/>
                        <span class="input-group-btn">

													<?php
													// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
													echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=1&lang='.$managerlang.'&fldr=&field_id=sclogo1', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array('type' => 'button', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i22"]));
													?>

                        </span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
							?>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html->addTag('h3', $tlporto["sh_box_title"]["shbt2"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlporto["sh_box_content"]["shbc3"]; ?></strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="facebookheaderShow1" name="facebookheaderShow1" value="1" <?php if ($jktpl["facebookheaderShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="facebookheaderShow1"><?php echo $tlporto["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="facebookheaderShow2" name="facebookheaderShow1" value="0" <?php if ($jktpl["facebookheaderShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="facebookheaderShow2"><?php echo $tlporto["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
										<div class="col-md-2"><?php echo $tlporto["sh_box_content"]["shbc9"]; ?></div>
										<div class="col-md-5">
											<input type="text" name="facebookheaderLinks1" class="form-control" value="<?php echo $jktpl["facebookheaderLinks_porto_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlporto["sh_box_content"]["shbc4"]; ?></strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="twitterheaderShow1" name="twitterheaderShow1" value="1" <?php if ($jktpl["twitterheaderShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="twitterheaderShow1"><?php echo $tlporto["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="twitterheaderShow2" name="twitterheaderShow1" value="0" <?php if ($jktpl["twitterheaderShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="twitterheaderShow2"><?php echo $tlporto["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
										<div class="col-md-2"><?php echo $tlporto["sh_box_content"]["shbc9"]; ?></div>
										<div class="col-md-5">
											<input type="text" name="twitterheaderLinks1" class="form-control" value="<?php echo $jktpl["twitterheaderLinks_porto_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlporto["sh_box_content"]["shbc5"]; ?></strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="googleheaderShow1" name="googleheaderShow1" value="1" <?php if ($jktpl["googleheaderShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="googleheaderShow1"><?php echo $tlporto["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="googleheaderShow2" name="googleheaderShow1" value="0" <?php if ($jktpl["googleheaderShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="googleheaderShow2"><?php echo $tlporto["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
										<div class="col-md-2"><?php echo $tlporto["sh_box_content"]["shbc9"]; ?></div>
										<div class="col-md-5">
											<input type="text" name="googleheaderLinks1" class="form-control" value="<?php echo $jktpl["googleheaderLinks_porto_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlporto["sh_box_content"]["shbc6"]; ?></strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="instagramheaderShow1" name="instagramheaderShow1" value="1" <?php if ($jktpl["instagramheaderShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="instagramheaderShow1"><?php echo $tlporto["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="instagramheaderShow2" name="instagramheaderShow1" value="0" <?php if ($jktpl["instagramheaderShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="instagramheaderShow2"><?php echo $tlporto["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
										<div class="col-md-2"><?php echo $tlporto["sh_box_content"]["shbc9"]; ?></div>
										<div class="col-md-5">
											<input type="text" name="instagramheaderLinks1" class="form-control" value="<?php echo $jktpl["instagramheaderLinks_porto_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlporto["sh_box_content"]["shbc7"]; ?></strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="phoneheaderShow1" name="phoneheaderShow1" value="1" <?php if ($jktpl["phoneheaderShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="phoneheaderShow1"><?php echo $tlporto["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="phoneheaderShow2" name="phoneheaderShow1" value="0" <?php if ($jktpl["phoneheaderShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="phoneheaderShow2"><?php echo $tlporto["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
										<div class="col-md-2"><?php echo $tlporto["sh_box_content"]["shbc10"]; ?></div>
										<div class="col-md-5">
											<input type="text" name="phoneheaderLinks1" class="form-control" value="<?php echo $jktpl["phoneheaderLinks_porto_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlporto["sh_box_content"]["shbc8"]; ?></strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="emailheaderShow1" name="emailheaderShow1" value="1" <?php if ($jktpl["emailheaderShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="emailheaderShow1"><?php echo $tlporto["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="emailheaderShow2" name="emailheaderShow1" value="0" <?php if ($jktpl["emailheaderShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="emailheaderShow2"><?php echo $tlporto["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
										<div class="col-md-2"><?php echo $tlporto["sh_box_content"]["shbc11"]; ?></div>
										<div class="col-md-5">
											<input type="text" name="emailheaderLinks1" class="form-control" value="<?php echo $jktpl["emailheaderLinks_porto_tpl"]; ?>"/>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
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
							echo $Html->addTag('h3', $tlporto["sl_box_title"]["slbt"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form <?php if (!$JAK_FILECONTENT1) {
										echo "hidden";
									} ?>">
										<div class="col-md-12">
											<h4>
												<?php echo $tlporto["sl_box_title"]["slbt1"]; ?>
												<small><strong><?php echo $JAK_FILEURL1; ?></strong></small>
											</h4>
											<hr>
											<p><?php echo $tlporto["sl_box_title"]["slbt3"]; ?></p>
										</div>
									</div>
									<?php if ($JAK_FILECONTENT1) { ?>
										<div class="row-form">
											<div class="col-md-12">
												<label for="jak_filecontent2"><?php echo $tlporto["sl_box_title"]["slbt2"]; ?></label>
												<div id="htmleditor2"></div>
												<textarea name="jak_filecontent2" id="jak_filecontent2" class="form-control hidden"><?php echo $JAK_FILECONTENT1; ?></textarea>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
							?>

						</div>
					</div>

					<input type="hidden" name="jak_file2" value="<?php echo $JAK_FILEURL1; ?>"/>

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
							echo $Html->addTag('h3', $tlporto["sf_box_title"]["sfbt"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="row-form">
								<div class="col-md-12">

									<?php
									// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
									echo $Html->addTag('strong', $tlporto["sf_box_content"]["sfbc"]);
									// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
									echo $Html->addDiv('', 'htmleditor3', array('class' => 'm-t-10'));
									// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
									echo $Html->addTextarea('footerblocktext1', $jktpl["footerblocktext1_porto_tpl"], '8', '', array('id' => 'footerblocktext1', 'class' => 'form-control hidden'));
									?>

								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
							?>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html->addTag('h3', $tlporto["sf_box_title"]["sfbt1"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-5"><strong><?php echo $tlporto["sf_box_content"]["sfbc8"]; ?></strong></div>
										<div class="col-md-7">
											<div class="input-group">
												<input type="text" name="standardlogo2" id="sclogo2" class="form-control" value="<?php echo $jktpl["logo2_porto_tpl"]; ?>"/>
												<span class="input-group-btn">

													<?php
													// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
													echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=1&lang='.$managerlang.'&fldr=&field_id=sclogo2', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array('type' => 'button', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i22"]));
													?>

                        </span>
											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlporto["sf_box_content"]["sfbc2"]; ?></strong></div>
										<div class="col-md-10">
											<input type="text" name="socialfooterText" class="form-control" value="<?php echo $jktpl["socialfooterText_porto_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlporto["sf_box_content"]["sfbc3"]; ?></strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="facebookfooterShow1" name="facebookfooterShow" value="1" <?php if ($jktpl["facebookfooterShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="facebookfooterShow1"><?php echo $tlporto["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="facebookfooterShow2" name="facebookfooterShow" value="0" <?php if ($jktpl["facebookfooterShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="facebookfooterShow2"><?php echo $tlporto["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
										<div class="col-md-2"><?php echo $tlporto["sf_box_content"]["sfbc7"]; ?></div>
										<div class="col-md-5">
											<input type="text" name="facebookfooterLinks" class="form-control" value="<?php echo $jktpl["facebookfooterLinks_porto_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlporto["sf_box_content"]["sfbc4"]; ?></strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="twitterfooterShow1" name="twitterfooterShow" value="1" <?php if ($jktpl["twitterfooterShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="twitterfooterShow1"><?php echo $tlporto["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="twitterfooterShow2" name="twitterfooterShow" value="0" <?php if ($jktpl["twitterfooterShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="twitterfooterShow2"><?php echo $tlporto["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
										<div class="col-md-2"><?php echo $tlporto["sf_box_content"]["sfbc7"]; ?></div>
										<div class="col-md-5">
											<input type="text" name="twitterfooterLinks" class="form-control" value="<?php echo $jktpl["twitterfooterLinks_porto_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlporto["sf_box_content"]["sfbc5"]; ?></strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="googlefooterShow1" name="googlefooterShow" value="1" <?php if ($jktpl["googlefooterShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="googlefooterShow1"><?php echo $tlporto["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="googlefooterShow2" name="googlefooterShow" value="0" <?php if ($jktpl["googlefooterShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="googlefooterShow2"><?php echo $tlporto["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
										<div class="col-md-2"><?php echo $tlporto["sf_box_content"]["sfbc7"]; ?></div>
										<div class="col-md-5">
											<input type="text" name="googlefooterLinks" class="form-control" value="<?php echo $jktpl["googlefooterLinks_porto_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlporto["sf_box_content"]["sfbc6"]; ?></strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="instagramfooterShow1" name="instagramfooterShow" value="1" <?php if ($jktpl["instagramfooterShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="instagramfooterShow1"><?php echo $tlporto["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="instagramfooterShow2" name="instagramfooterShow" value="0" <?php if ($jktpl["instagramfooterShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="instagramfooterShow2"><?php echo $tlporto["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
										<div class="col-md-2"><?php echo $tlporto["sf_box_content"]["sfbc7"]; ?></div>
										<div class="col-md-5">
											<input type="text" name="instagramfooterLinks" class="form-control" value="<?php echo $jktpl["instagramfooterLinks_porto_tpl"]; ?>"/>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
							?>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="cmsPage5" aria-labelledby="cmsPage5-tab">
			<div class="row">
				<div class="col-md-12">

					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html->addTag('h3', $tlporto["sl_box_title"]["slbt"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form <?php if (!$JAK_FILECONTENT) {
										echo "hidden";
									} ?>">
										<div class="col-md-12">
											<h4>
												<?php echo $tlporto["sl_box_title"]["slbt1"]; ?>
												<small><strong><?php echo $JAK_FILEURL; ?></strong></small>
											</h4>
										</div>
									</div>
									<?php if ($JAK_FILECONTENT) { ?>
										<div class="row-form">
											<div class="col-md-12">
												<label for="jak_filecontent"><?php echo $tlporto["sl_box_title"]["slbt2"]; ?></label>
												<div id="htmleditor"></div>
												<textarea name="jak_filecontent" id="jak_filecontent" class="form-control hidden"><?php echo $JAK_FILECONTENT; ?></textarea>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
							?>

						</div>
					</div>

					<input type="hidden" name="jak_file" value="<?php echo $JAK_FILEURL; ?>"/>

				</div>
			</div>
		</div>
	</div>
</form>
