<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	<!-- Fixed Button for save form -->
	<div class="savebutton-medium hidden-xs">
		<button type="submit" name="save" class="btn btn-success button">
			<i class="fa fa-save margin-right-5"></i>
			<?php echo $tl["button"]["btn1"]; ?> !!
		</button>
	</div>

	<!-- Form Content -->
	<ul id="cmsTab" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
		<li role="presentation" class="active">
			<a href="#cmsPage1" id="cmsPage1-tab" role="tab"  data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
				<span class="text"><?php echo $tlqed["tplset_section_tab"]["tplsettab"]; ?></span>
			</a>
		</li>
		<li role="presentation" class="next">
			<a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
				<span class="text"><?php echo $tlqed["tplset_section_tab"]["tplsettab1"]; ?></span>
			</a>
		</li>
		<li role="presentation">
			<a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
				<span class="text"><?php echo $tlqed["tplset_section_tab"]["tplsettab2"]; ?></span>
			</a>
		</li>
		<li role="presentation">
			<a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
				<span class="text"><?php echo $tlqed["tplset_section_tab"]["tplsettab3"]; ?></span>
			</a>
		</li>
		<li role="presentation">
			<a href="#cmsPage5" role="tab" id="cmsPage5-tab" data-toggle="tab" aria-controls="cmsPage5">
				<span class="text"><?php echo $tlqed["tplset_section_tab"]["tplsettab4"]; ?></span>
			</a>
		</li>
	</ul>

	<div id="cmsTabContent" class="tab-content">
		<div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
			<div class="row">
				<div class="col-md-6">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tlqed["sb_box_title"]["sbbt"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-5"><strong><?php echo $tlqed["sb_box_content"]["sbbc"]; ?></strong></div>
										<div class="col-md-7">
											<select name="colorQed" class="form-control selectpicker" data-size="5">
												<option value="blue"<?php if ($jktpl["color_qed_tpl"] == 'blue') { ?> selected="selected"<?php } ?>>Blue</option>
												<option value="coffee"<?php if ($jktpl["color_qed_tpl"] == 'coffee') { ?> selected="selected"<?php } ?>>Cofee</option>
												<option value="color"<?php if ($jktpl["color_qed_tpl"] == 'color') { ?> selected="selected"<?php } ?>>Color</option>
												<option value="color2"<?php if ($jktpl["color_qed_tpl"] == 'color2') { ?> selected="selected"<?php } ?>>Color 2</option>
												<option value="gold"<?php if ($jktpl["color_qed_tpl"] == 'gold') { ?> selected="selected"<?php } ?>>Gold</option>
												<option value="green"<?php if ($jktpl["color_qed_tpl"] == 'green') { ?> selected="selected"<?php } ?>>Green</option>
												<option value="light-blue"<?php if ($jktpl["color_qed_tpl"] == 'light-blue') { ?> selected="selected"<?php } ?>>Light Blue</option>
												<option value="orange"<?php if ($jktpl["color_qed_tpl"] == 'orange') { ?> selected="selected"<?php } ?>>Orange</option>
												<option value="red"<?php if ($jktpl["color_qed_tpl"] == 'red') { ?> selected="selected"<?php } ?>>Red</option>
												<option value="sea-green"<?php if ($jktpl["color_qed_tpl"] == 'sea-green') { ?> selected="selected"<?php } ?>>Sea Green</option>
												<option value="silver"<?php if ($jktpl["color_qed_tpl"] == 'silver') { ?> selected="selected"<?php } ?>>Silver</option>
												<option value="yellow"<?php if ($jktpl["color_qed_tpl"] == 'yellow') { ?> selected="selected"<?php } ?>>Yellow</option>
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
							<h3 class="box-title"><?php echo $tlqed["sb_box_title"]["sbbt1"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-5"><strong><?php echo $tlqed["sb_box_content"]["sbbc1"]; ?></strong></div>
										<div class="col-md-7">
											<select name="headerQed" class="form-control selectpicker" data-size="5">
												<option value=""<?php if ($jktpl["header_qed_tpl"] == '') { ?> selected="selected"<?php } ?>>Basic Header</option>
												<option value="header-2"<?php if ($jktpl["header_qed_tpl"] == 'header-2') { ?> selected="selected"<?php } ?>>Header 2</option>
												<option value="header-3"<?php if ($jktpl["header_qed_tpl"] == 'header-3') { ?> selected="selected"<?php } ?>>Header 3</option>
												<option value="header-4"<?php if ($jktpl["header_qed_tpl"] == 'header-4') { ?> selected="selected"<?php } ?>>Header 4</option>
												<option value="header-5"<?php if ($jktpl["header_qed_tpl"] == 'header-5') { ?> selected="selected"<?php } ?>>Header 5</option>
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
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tlqed["sb_box_title"]["sbbt2"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-5"><strong><?php echo $tlqed["sb_box_content"]["sbbc2"]; ?></strong></div>
										<div class="col-md-7">
											<div class="radio radio-success">

												<input type="radio" id="boxedQed1" name="boxedQed" value="1" <?php if ($jktpl["boxed_qed_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="boxedQed1">Yes</label>

												<input type="radio" id="boxedQed2" name="boxedQed" value="0" <?php if ($jktpl["boxed_qed_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="boxedQed2">No</label>

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
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tlqed["sb_box_title"]["sbbt3"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-5"><strong><?php echo $tlqed["sb_box_content"]["sbbc3"]; ?></strong></div>
										<div class="col-md-7">
											<select name="fsocialstyleQed" class="form-control selectpicker" data-size="5">
												<option value="squared"<?php if ($jktpl["fsocialstyle_qed_tpl"] == 'squared') { ?> selected="selected"<?php } ?>>Squared</option>
												<option value="circle"<?php if ($jktpl["fsocialstyle_qed_tpl"] == 'circle') { ?> selected="selected"<?php } ?>>Circle</option>
												<option value="rounded"<?php if ($jktpl["fsocialstyle_qed_tpl"] == 'rounded') { ?> selected="selected"<?php } ?>>Rounded</option>
											</select>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5"><strong>Social icons size</strong></div>
										<div class="col-md-7">
											<select name="fsocialsizeQed" class="form-control selectpicker" data-size="3">
												<option value=""<?php if ($jktpl["fsocialsize_qed_tpl"] == '') { ?> selected="selected"<?php } ?>>Small</option>
												<option value="medium"<?php if ($jktpl["fsocialsize_qed_tpl"] == 'medium') { ?> selected="selected"<?php } ?>>Medium</option>
												<option value="large"<?php if ($jktpl["fsocialsize_qed_tpl"] == 'large') { ?> selected="selected"<?php } ?>>Large</option>
												<option value="x-large"<?php if ($jktpl["fsocialsize_qed_tpl"] == 'x-large') { ?> selected="selected"<?php } ?>>X-Large</option>
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
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
			<div class="row">
				<div class="col-md-6">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tlqed["sh_box_title"]["shbt"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-5"><strong><?php echo $tlqed["sh_box_content"]["shbc"]; ?></strong></div>
										<div class="col-md-7">
											<div class="radio radio-success">

												<input type="radio" id="sitemapShow1" name="sitemapShow" value="1" <?php if ($jktpl["sitemapShow_qed_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="sitemapShow1">Show</label>

												<input type="radio" id="sitemapShow2" name="sitemapShow" value="0" <?php if ($jktpl["sitemapShow_qed_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="sitemapShow2">Hide</label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5"><strong><?php echo $tlqed["sh_box_content"]["shbc1"]; ?></strong></div>
										<div class="col-md-7">
											<div class="radio radio-success">

												<input type="radio" id="loginShow1" name="loginShow" value="1" <?php if ($jktpl["loginShow_qed_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="loginShow1">Show</label>

												<input type="radio" id="loginShow2" name="loginShow" value="0" <?php if ($jktpl["loginShow_qed_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="loginShow2">Hide</label>

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
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tlqed["sh_box_title"]["shbt1"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-5"><strong><?php echo $tlqed["sh_box_content"]["shbc2"]; ?></strong></div>
										<div class="col-md-7">
											<div class="input-group">
												<input type="text" name="standardlogo" id="sclogo1" class="form-control" value="<?php echo $jktpl["logo1_qed_tpl"]; ?>"/>
                        <span class="input-group-btn">
                          <a class="btn btn-info ifManager" type="button" href="../../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=1&subfolder=&editor=mce_0&lang=eng&fldr=&field_id=sclogo1"><i class="fa fa-photo"></i></a>
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
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tlqed["sh_box_title"]["shbt2"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlqed["sh_box_content"]["shbc3"]; ?></strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="facebookShow1" name="facebookShow" value="1" <?php if ($jktpl["facebookShow_qed_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="facebookShow1">Show</label>

												<input type="radio" id="facebookShow2" name="facebookShow" value="0" <?php if ($jktpl["facebookShow_qed_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="facebookShow2">Hide</label>

											</div>
										</div>
										<div class="col-md-2">Links</div>
										<div class="col-md-5">
											<input type="text" name="facebookLinks" class="form-control" value="<?php echo $jktpl["facebookLinks_qed_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlqed["sh_box_content"]["shbc4"]; ?></strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="twitterShow1" name="twitterShow" value="1" <?php if ($jktpl["twitterShow_qed_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="twitterShow1">Show</label>

												<input type="radio" id="twitterShow2" name="twitterShow" value="0" <?php if ($jktpl["twitterShow_qed_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="twitterShow2">Hide</label>

											</div>
										</div>
										<div class="col-md-2">Links</div>
										<div class="col-md-5">
											<input type="text" name="twitterLinks" class="form-control" value="<?php echo $jktpl["twitterLinks_qed_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlqed["sh_box_content"]["shbc5"]; ?></strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="googleShow1" name="googleShow" value="1" <?php if ($jktpl["googleShow_qed_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="googleShow1">Show</label>

												<input type="radio" id="googleShow2" name="googleShow" value="0" <?php if ($jktpl["googleShow_qed_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="googleShow2">Hide</label>

											</div>
										</div>
										<div class="col-md-2">Links</div>
										<div class="col-md-5">
											<input type="text" name="googleLinks" class="form-control" value="<?php echo $jktpl["googleLinks_qed_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlqed["sh_box_content"]["shbc6"]; ?></strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="instagramShow1" name="instagramShow" value="1" <?php if ($jktpl["instagramShow_qed_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="instagramShow1">Show</label>

												<input type="radio" id="instagramShow2" name="instagramShow" value="0" <?php if ($jktpl["instagramShow_qed_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="instagramShow2">Hide</label>

											</div>
										</div>
										<div class="col-md-2">Links</div>
										<div class="col-md-5">
											<input type="text" name="instagramLinks" class="form-control" value="<?php echo $jktpl["instagramLinks_qed_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlqed["sh_box_content"]["shbc7"]; ?></strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="phoneShow1" name="phoneShow" value="1" <?php if ($jktpl["phoneShow_qed_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="phoneShow1">Show</label>

												<input type="radio" id="phoneShow2" name="phoneShow" value="0" <?php if ($jktpl["phoneShow_qed_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="phoneShow2">Hide</label>

											</div>
										</div>
										<div class="col-md-2">Phone Number</div>
										<div class="col-md-5">
											<input type="text" name="phoneLinks" class="form-control" value="<?php echo $jktpl["phoneLinks_qed_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong><?php echo $tlqed["sh_box_content"]["shbc8"]; ?></strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="emailShow1" name="emailShow" value="1" <?php if ($jktpl["emailShow_qed_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="emailShow1">Show</label>

												<input type="radio" id="emailShow2" name="emailShow" value="0" <?php if ($jktpl["emailShow_qed_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="emailShow2">Hide</label>

											</div>
										</div>
										<div class="col-md-2">Email</div>
										<div class="col-md-5">
											<input type="text" name="emailLinks" class="form-control" value="<?php echo $jktpl["emailLinks_qed_tpl"]; ?>"/>
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
		<div role="tabpanel" class="tab-pane fade" id="cmsPage3" aria-labelledby="cmsPage3-tab">
			<div class="row">
				<div class="col-md-6">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tlqed["srs_box_title"]["srsbt"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-7"><strong>Active RoyalSlider</strong></div>
										<div class="col-md-5">
											<div class="radio radio-success">

												<input type="radio" id="activeroyalslider1" name="activeroyalslider" value="1" <?php if ($jktpl["activeroyalslider_qed_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="activeroyalslider1"><?php echo $tl["checkbox"]["chk"]; ?></label>

												<input type="radio" id="activeroyalslider2" name="activeroyalslider" value="0" <?php if ($jktpl["activeroyalslider_qed_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="activeroyalslider2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

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
							<h3 class="box-title"><?php echo $tlqed["srs_box_title"]["srsbt1"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-7"><strong>Show arrows navigation</strong></div>
										<div class="col-md-5">
											<div class="radio radio-success">

												<input type="radio" id="arrowsNav1" name="arrowsNav" value="true" <?php if ($jktpl["arrowsNav_qed_tpl"] == 'true') { ?> checked="checked"<?php } ?> />
												<label for="arrowsNav1"><?php echo $tl["checkbox"]["chk"]; ?></label>

												<input type="radio" id="arrowsNav2" name="arrowsNav" value="false" <?php if ($jktpl["arrowsNav_qed_tpl"] == 'false') { ?> checked="checked"<?php } ?> />
												<label for="arrowsNav2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-7"><strong>Auto hide arrows</strong></div>
										<div class="col-md-5">
											<div class="radio radio-success">

												<input type="radio" id="arrowsNavAutoHide1" name="arrowsNavAutoHide" value="true" <?php if ($jktpl["arrowsNavAutoHide_qed_tpl"] == 'true') { ?> checked="checked"<?php } ?> />
												<label for="arrowsNavAutoHide1"><?php echo $tl["checkbox"]["chk"]; ?></label>

												<input type="radio" id="arrowsNavAutoHide2" name="arrowsNavAutoHide" value="false" <?php if ($jktpl["arrowsNavAutoHide_qed_tpl"] == 'false') { ?> checked="checked"<?php } ?> />
												<label for="arrowsNavAutoHide2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-7"><strong>Hides arrows completely on touch devices</strong></div>
										<div class="col-md-5">
											<div class="radio radio-success">

												<input type="radio" id="arrowsNavHideOnTouch1" name="arrowsNavHideOnTouch" value="true" <?php if ($jktpl["arrowsNavHideOnTouch_qed_tpl"] == 'true') { ?> checked="checked"<?php } ?> />
												<label for="arrowsNavHideOnTouch1"><?php echo $tl["checkbox"]["chk"]; ?></label>

												<input type="radio" id="arrowsNavHideOnTouch2" name="arrowsNavHideOnTouch" value="false" <?php if ($jktpl["arrowsNavHideOnTouch_qed_tpl"] == 'false') { ?> checked="checked"<?php } ?> />
												<label for="arrowsNavHideOnTouch2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-7"><strong>Navigation type</strong></div>
										<div class="col-md-5">
											<select name="controlNavigation" class="form-control selectpicker">
												<option value="bullets"<?php if ($jktpl["controlNavigation_qed_tpl"] == 'bullets') { ?> selected="selected"<?php } ?>>Bullets</option>
												<option value="none"<?php if ($jktpl["controlNavigation_qed_tpl"] == 'none') { ?> selected="selected"<?php } ?>>None</option>
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
							<h3 class="box-title"><?php echo $tlqed["srs_box_title"]["srsbt2"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-7"><strong>Enable autoplay</strong></div>
										<div class="col-md-5">
											<div class="radio radio-success">

												<input type="radio" id="enabledAU1" name="enabledAU" value="true" <?php if ($jktpl["enabledAU_qed_tpl"] == 'true') { ?> checked="checked"<?php } ?> />
												<label for="arrowsNav1"><?php echo $tl["checkbox"]["chk"]; ?></label>

												<input type="radio" id="enabledAU2" name="enabledAU" value="false" <?php if ($jktpl["enabledAU_qed_tpl"] == 'false') { ?> checked="checked"<?php } ?> />
												<label for="enabledAU2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-7"><strong>Pause autoplay on hover</strong></div>
										<div class="col-md-5">
											<div class="radio radio-success">

												<input type="radio" id="pauseOnHoverAU1" name="pauseOnHoverAU" value="true" <?php if ($jktpl["pauseOnHoverAU_qed_tpl"] == 'true') { ?> checked="checked"<?php } ?> />
												<label for="pauseOnHoverAU1"><?php echo $tl["checkbox"]["chk"]; ?></label>

												<input type="radio" id="pauseOnHoverAU2" name="pauseOnHoverAU" value="false" <?php if ($jktpl["pauseOnHoverAU_qed_tpl"] == 'false') { ?> checked="checked"<?php } ?> />
												<label for="pauseOnHoverAU2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-7"><strong>Delay between items in ms</strong></div>
										<div class="col-md-5">
											<input type="text" name="delayAU" class="form-control" value="<?php echo $jktpl["delayAU_qed_tpl"]; ?>"/>
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
							<h3 class="box-title"><?php echo $tlqed["srs_box_title"]["srsbt3"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-7"><strong>Auto updates slider height based on base width</strong></div>
										<div class="col-md-5">
											<div class="radio radio-success">

												<input type="radio" id="autoScaleSlider1" name="autoScaleSlider" value="true" <?php if ($jktpl["autoScaleSlider_qed_tpl"] == 'true') { ?> checked="checked"<?php } ?> />
												<label for="autoScaleSlider1"><?php echo $tl["checkbox"]["chk"]; ?></label>

												<input type="radio" id="autoScaleSlider2" name="autoScaleSlider" value="false" <?php if ($jktpl["autoScaleSlider_qed_tpl"] == 'false') { ?> checked="checked"<?php } ?> />
												<label for="autoScaleSlider2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-7"><strong>Base slider width</strong></div>
										<div class="col-md-5">
											<input type="text" name="autoScaleSliderWidth" class="form-control" value="<?php echo $jktpl["autoScaleSliderWidth_qed_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-7"><strong>Base slider height</strong></div>
										<div class="col-md-5">
											<input type="text" name="autoScaleSliderHeight" class="form-control" value="<?php echo $jktpl["autoScaleSliderHeight_qed_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-7"><strong>Aligns image to center of slide</strong></div>
										<div class="col-md-5">
											<div class="radio radio-success">

												<input type="radio" id="imageAlignCenter1" name="imageAlignCenter" value="true" <?php if ($jktpl["imageAlignCenter_qed_tpl"] == 'true') { ?> checked="checked"<?php } ?> />
												<label for="imageAlignCenter1"><?php echo $tl["checkbox"]["chk"]; ?></label>

												<input type="radio" id="imageAlignCenter2" name="imageAlignCenter" value="false" <?php if ($jktpl["imageAlignCenter_qed_tpl"] == 'false') { ?> checked="checked"<?php } ?> />
												<label for="imageAlignCenter2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-7"><strong>Adds base width to all images</strong></div>
										<div class="col-md-5">
											<input type="text" name="imgWidth" class="form-control" value="<?php echo $jktpl["imgWidth_qed_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-7"><strong>Adds base height to all images</strong></div>
										<div class="col-md-5">
											<input type="text" name="imgHeight" class="form-control" value="<?php echo $jktpl["imgHeight_qed_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-7"><strong>Number of slides to preload on sides</strong></div>
										<div class="col-md-5">
											<input type="text" name="numImagesToPreload" class="form-control" value="<?php echo $jktpl["numImagesToPreload_qed_tpl"]; ?>"/>
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
							<h3 class="box-title"><?php echo $tlqed["srs_box_title"]["srsbt4"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-7"><strong>Fades in slide after it's loaded</strong></div>
										<div class="col-md-5">
											<div class="radio radio-success">

												<input type="radio" id="fadeinLoadedSlide1" name="fadeinLoadedSlide" value="true" <?php if ($jktpl["fadeinLoadedSlide_qed_tpl"] == 'true') { ?> checked="checked"<?php } ?> />
												<label for="fadeinLoadedSlide1"><?php echo $tl["checkbox"]["chk"]; ?></label>

												<input type="radio" id="fadeinLoadedSlide2" name="fadeinLoadedSlide" value="false" <?php if ($jktpl["fadeinLoadedSlide_qed_tpl"] == 'false') { ?> checked="checked"<?php } ?> />
												<label for="fadeinLoadedSlide2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-7"><strong>Fade transition</strong></div>
										<div class="col-md-5">
											<select name="transitionType" class="form-control selectpicker">
												<option value="move"<?php if ($jktpl["transitionType_qed_tpl"] == 'move') { ?> selected="selected"<?php } ?>>Move</option>
												<option value="fade"<?php if ($jktpl["transitionType_qed_tpl"] == 'fade') { ?> selected="selected"<?php } ?>>Fade</option>
											</select>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-7"><strong>Slider transition speed, in ms.</strong></div>
										<div class="col-md-5">
											<input type="text" name="transitionSpeed" class="form-control" value="<?php echo $jktpl["transitionSpeed_qed_tpl"]; ?>"/>
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
		<div role="tabpanel" class="tab-pane fade" id="cmsPage4" aria-labelledby="cmsPage4-tab">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tlqed["sf_box_title"]["sfbt"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="row-form">
								<div class="col-md-5"><strong>Active one block</strong></div>
								<div class="col-md-7">
									<div class="radio radio-success">

										<input type="radio" id="onefooterblock1" name="onefooterblock" value="1" <?php if ($jktpl["onefooterblock_qed_tpl"] == 1) { ?> checked="checked"<?php } ?> />
										<label for="onefooterblock1">Yes</label>

										<input type="radio" id="onefooterblock2" name="onefooterblock" value="0" <?php if ($jktpl["onefooterblock_qed_tpl"] == 0) { ?> checked="checked"<?php } ?> />
										<label for="onefooterblock2">No</label>

									</div>
								</div>
							</div>
							<div class="row-form">
								<div class="col-md-5"><strong>One Block Text</strong></div>
								<div class="col-md-7">
									<textarea name="onefooterblocktext" id="onefooterblocktext" rows="8" class="form-control txtautogrow"><?php echo $jktpl["onefooterblocktext_qed_tpl"]; ?></textarea>
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
			<div id="footerblock1-2" class="row <?php echo ($jkv["onefooterblock_qed_tpl"] == 1 ?  'hidden' : '');  ?>">
				<div class="col-md-6">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tlqed["sf_box_title"]["sfbt1"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="row-form">
								<div class="col-md-12"><strong>Block Text</strong></div>
							</div>
							<div class="row-form">
								<div class="col-md-12">
									<textarea name="footer1text" id="footer1text" rows="8" class="form-control txtautogrow"><?php echo $jktpl["footer1text_qed_tpl"]; ?></textarea>
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
							<h3 class="box-title"><?php echo $tlqed["sf_box_title"]["sfbt2"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="row-form">
								<div class="col-md-12"><strong>Block Text</strong></div>
							</div>
							<div class="row-form">
								<div class="col-md-12">
									<textarea name="footer2text" id="footer2text" rows="8" class="form-control txtautogrow"><?php echo $jktpl["footer2text_qed_tpl"]; ?></textarea>
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
			<div class="row">
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tlqed["sf_box_title"]["sfbt3"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="col-md-5">
								<div class="row-form">
									<div class="col-md-6"><strong>Company Name</strong></div>
									<div class="col-md-6">
										<input type="text" name="companyName" class="form-control" value="<?php echo $jktpl["companyName_qed_tpl"]; ?>"/>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-6"><strong>Company Phone</strong></div>
									<div class="col-md-6">
										<input type="text" name="companyPhone" class="form-control" value="<?php echo $jktpl["companyPhone_qed_tpl"]; ?>"/>
									</div>
								</div>
							</div>
							<div class="col-md-2"></div>
							<div class="col-md-5">
								<div class="row-form">
									<div class="col-md-6"><strong>Company Site</strong></div>
									<div class="col-md-6">
										<input type="text" name="companySite" class="form-control" value="<?php echo $jktpl["companySite_qed_tpl"]; ?>"/>
									</div>
								</div>
								<div class="row-form">
									<div class="col-md-6"><strong>Company Email</strong></div>
									<div class="col-md-6">
										<input type="text" name="companyEmail" class="form-control" value="<?php echo $jktpl["companyEmail_qed_tpl"]; ?>"/>
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
			<div class="row">
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tlqed["sf_box_title"]["sfbt4"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-2"><strong>Social media header text</strong></div>
										<div class="col-md-10">
											<input type="text" name="socialfooterText" class="form-control" value="<?php echo $jktpl["socialfooterText_qed_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong>Faceebook</strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="facebookfooterShow1" name="facebookfooterShow" value="1" <?php if ($jktpl["facebookfooterShow_qed_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="facebookfooterShow1">Show</label>

												<input type="radio" id="facebookfooterShow2" name="facebookfooterShow" value="0" <?php if ($jktpl["facebookfooterShow_qed_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="facebookfooterShow2">Hide</label>

											</div>
										</div>
										<div class="col-md-2">Links</div>
										<div class="col-md-5">
											<input type="text" name="facebookfooterLinks" class="form-control" value="<?php echo $jktpl["facebookfooterLinks_qed_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong>Twitter</strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="twitterfooterShow1" name="twitterfooterShow" value="1" <?php if ($jktpl["twitterfooterShow_qed_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="twitterfooterShow1">Show</label>

												<input type="radio" id="twitterfooterShow2" name="twitterfooterShow" value="0" <?php if ($jktpl["twitterfooterShow_qed_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="twitterfooterShow2">Hide</label>

											</div>
										</div>
										<div class="col-md-2">Links</div>
										<div class="col-md-5">
											<input type="text" name="twitterfooterLinks" class="form-control" value="<?php echo $jktpl["twitterfooterLinks_qed_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong>Google Plus</strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="googlefooterShow1" name="googlefooterShow" value="1" <?php if ($jktpl["googlefooterShow_qed_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="googlefooterShow1">Show</label>

												<input type="radio" id="googlefooterShow2" name="googlefooterShow" value="0" <?php if ($jktpl["googlefooterShow_qed_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="googlefooterShow2">Hide</label>

											</div>
										</div>
										<div class="col-md-2">Links</div>
										<div class="col-md-5">
											<input type="text" name="googlefooterLinks" class="form-control" value="<?php echo $jktpl["googlefooterLinks_qed_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-2"><strong>Instagram</strong></div>
										<div class="col-md-3">
											<div class="radio radio-success">

												<input type="radio" id="instagramfooterShow1" name="instagramfooterShow" value="1" <?php if ($jktpl["instagramfooterShow_qed_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="instagramfooterShow1">Show</label>

												<input type="radio" id="instagramfooterShow2" name="instagramfooterShow" value="0" <?php if ($jktpl["instagramfooterShow_qed_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="instagramfooterShow2">Hide</label>

											</div>
										</div>
										<div class="col-md-2">Links</div>
										<div class="col-md-5">
											<input type="text" name="instagramfooterLinks" class="form-control" value="<?php echo $jktpl["instagramfooterLinks_qed_tpl"]; ?>"/>
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
		<div role="tabpanel" class="tab-pane fade" id="cmsPage5" aria-labelledby="cmsPage5-tab">
			<div class="row">
				<div class="col-md-12">

					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $tlqed["sl_box_title"]["slbt"]; ?></h3>
						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form <?php if (!$JAK_FILECONTENT) {
										echo "hidden";
									} ?>">
										<div class="col-md-12">
											<h4>File:
												<small><strong><?php echo $JAK_FILEURL; ?></strong></small>
											</h4>
										</div>
									</div>
									<?php if ($JAK_FILECONTENT) { ?>
										<div class="row-form">
											<div class="col-md-12">
												<label for="jak_filecontent"><?php echo $tl["general"]["g54"]; ?></label>
												<div id="htmleditor"></div>
												<textarea name="jak_filecontent" id="jak_filecontent" class="form-control hidden"><?php echo $JAK_FILECONTENT; ?></textarea>
											</div>
										</div>
									<?php } ?>
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

					<input type="hidden" name="jak_file" value="<?php echo $JAK_FILEURL; ?>"/>

				</div>
			</div>
		</div>
	</div>
</form>
