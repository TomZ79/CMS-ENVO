<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
	<!-- Action button block -->
	<div class="actionbtn-block d-none d-sm-block">

		<?php
		// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
		echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
		?>

	</div>

	<!-- Form Content -->
	<ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
		<li class="nav-item">
			<a href="#cmsPage1" class="active" data-toggle="tab">
				<span class="text"><?= $tlcarzone["tplset_section_tab"]["tplsettab"] ?></span>
			</a>
		</li>
		<li class="nav-item next">
			<a href="#cmsPage2" class="" data-toggle="tab">
				<span class="text"><?= $tlcarzone["tplset_section_tab"]["tplsettab1"] ?></span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage3" class="" data-toggle="tab">
				<span class="text"><?= $tlcarzone["tplset_section_tab"]["tplsettab2"] ?></span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage4" class="" data-toggle="tab">
				<span class="text"><?= $tlcarzone["tplset_section_tab"]["tplsettab3"] ?></span>
			</a>
		</li>
		<li class='nav-item dropdown collapsed-menu hidden'>
			<a class="dropdown-toggle" data-toggle='dropdown' href='#' role='button' aria-haspopup="true" aria-expanded="false">
				... <span class="glyphicon glyphicon-chevron-right"></span>
			</a>
			<div class="dropdown-menu dropdown-menu-right collapsed-tabs" aria-labelledby="dropdownMenuButton">
			</div>
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
			<div class="row">
				<div class="col-md-6">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlcarzone["sb_box_title"]["sbbt"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-4">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											echo $Html -> startTag('strong');
											echo $tlcarzone["sb_box_content"]["sbbc"];
											// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
											echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tlcarzone["sh_help"]["shh1"], 'data-original-title' => $tlcarzone["sh_help"]["shh"]));
											// Add Html Element -> endTag (Arguments: tag)
											echo $Html -> endTag('strong');
											?>

										</div>
										<div class="col-md-8">
											<div class="input-group">
												<input type="text" name="HeLogo1" id="HeLogo1" class="form-control" value="<?= $envotpl["HeLogo1Carzone_tpl"] ?>"/>
												<span class="input-group-append">

													<?php
													// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
													echo $Html -> addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=1&lang=' . $managerlangTiny . '&fldr=&field_id=HeLogo1', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array ('type' => 'button', 'data-placement' => 'bottom', 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i22"]));
													?>

                        </span>
											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-4">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											echo $Html -> startTag('strong');
											echo $tlcarzone["sb_box_content"]["sbbc1"];
											// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
											echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tlcarzone["sh_help"]["shh2"], 'data-original-title' => $tlcarzone["sh_help"]["shh"]));
											// Add Html Element -> endTag (Arguments: tag)
											echo $Html -> endTag('strong');
											?>

										</div>
										<div class="col-md-8">
											<div class="input-group">
												<input type="text" name="HeLogo2" id="HeLogo2" class="form-control" value="<?= $envotpl["HeLogo2Carzone_tpl"] ?>"/>
												<span class="input-group-append">

													<?php
													// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
													echo $Html -> addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=1&lang=' . $managerlangTiny . '&fldr=&field_id=HeLogo2', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array ('type' => 'button', 'data-placement' => 'bottom', 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i22"]));
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
							echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
							?>

						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlcarzone["sb_box_title"]["sbbt1"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-4">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											echo $Html -> startTag('strong');
											echo $tlcarzone["sb_box_content"]["sbbc2"];
											// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
											echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tlcarzone["sh_help"]["shh3"], 'data-original-title' => $tlcarzone["sh_help"]["shh"]));
											// Add Html Element -> endTag (Arguments: tag)
											echo $Html -> endTag('strong');
											?>

										</div>
										<div class="col-md-8">
											<div class="input-group">
												<input type="text" name="PageTitleImg" id="PageTitleImg" class="form-control" value="<?= $envotpl["PageTitleImg_tpl"] ?>"/>
												<span class="input-group-append">

													<?php
													// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
													echo $Html -> addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=1&lang=' . $managerlangTiny . '&fldr=&field_id=PageTitleImg', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array ('type' => 'button', 'data-placement' => 'bottom', 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i22"]));
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
							echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
							?>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlcarzone["sb_box_title"]["sbbt2"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-4">

											<?php
											// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
											echo $Html -> startTag('strong');
											echo $tlcarzone["sb_box_content"]["sbbc"];
											// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
											echo $Html -> addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array ('data-content' => $tlcarzone["sh_help"]["shh4"], 'data-original-title' => $tlcarzone["sh_help"]["shh"]));
											// Add Html Element -> endTag (Arguments: tag)
											echo $Html -> endTag('strong');
											?>

										</div>
										<div class="col-md-8">
											<div class="input-group">
												<input type="text" name="FoLogo1" id="FoLogo1" class="form-control" value="<?= $envotpl["FoLogo1Carzone_tpl"] ?>"/>
												<span class="input-group-append">

													<?php
													// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
													echo $Html -> addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=1&lang=' . $managerlangTiny . '&fldr=&field_id=FoLogo1', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array ('type' => 'button', 'data-placement' => 'bottom', 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i22"]));
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
							echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
							?>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="cmsPage2" role="tabpanel">
			<div class="row">
				<div class="col-md-6">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlcarzone["sh_box_title"]["shbt"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-4"><strong><?= $tlcarzone["sh_box_content"]["shbc10"] ?></strong></div>
										<div class="col-md-8">
											<select name="skinCarzone" class="form-control selectpicker">

												<?php
												/**
												 * OPTION LIST
												 * array -> class header, class main header, ''
												 */
												$skinfull = array (
													'header, noclass , noclass' => 'Basic Header - fullwidth',

													'header-transparent fullwidth, noclass, noclass'              => 'Header Transparent - fullwidth',
													'header-transparent overlay fullwidth, noclass, noclass'      => 'Header Transparent Overlay - fullwidth',
													'header-transparent overlay fullwidth, header-curve, noclass' => 'Header Transparent Overlay  with Curve - fullwidth',

													'header dark fullwidth, noclass, noclass'      => 'Header Dark - fullwidth',
													'header dark fullwidth, header-curve, noclass' => 'Header Dark with Curve - fullwidth',

													'header blue fullwidth, noclass, noclass'      => 'Header Blue - fullwidth',
													'header blue fullwidth, header-curve, noclass' => 'Header Blue with Curve - fullwidth',

													'header primary fullwidth, noclass, noclass'      => 'Header Primary - fullwidth',
													'header primary fullwidth, header-curve, noclass' => 'Header Primary with Curve - fullwidth',

													'header purpal fullwidth, noclass, noclass'      => 'Header Purpal - fullwidth',
													'header purpal fullwidth, header-curve, noclass' => 'Header Purpal with Curve - fullwidth',

													'header red fullwidth, noclass, noclass'      => 'Header Red - fullwidth',
													'header red fullwidth, header-curve, noclass' => 'Header Red with Curve - fullwidth',

													'header yellow fullwidth, noclass, noclass'      => 'Header Yellow - fullwidth',
													'header yellow fullwidth, header-curve, noclass' => 'Header Yellow with Curve - fullwidth'
												);

												$skinbox = array (
													'header box, noclass, noclass'         => 'Basic Header - boxed',
													'header box dark, noclass, noclass'    => 'Header Dark - boxed',
													'header box overlay, noclass, noclass' => 'Header Overlay - boxed'
												);

												echo '<optgroup label="Fullwidth">';
												foreach ($skinfull as $sf => $kf):
													echo $envotpl["skin_Carzone_tpl"] == $sf ? '<option value="' . $sf . '" selected="selected">' . $kf . '</option>' : '<option value="' . $sf . '">' . $kf . '</option>';
												endforeach;
												echo '</optgroup>';
												echo '<optgroup label="Boxed">';
												foreach ($skinbox as $sb => $kb):
													echo $envotpl["skin_Carzone_tpl"] == $sb ? '<option value="' . $sb . '" selected="selected">' . $kb . '</option>' : '<option value="' . $sb . '">' . $kb . '</option>';
												endforeach;
												echo '</optgroup>';
												?>

											</select>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-5"><strong><?= $tlcarzone["sh_box_content"]["shbc12"] ?></strong></div>
										<div class="col-sm-7">
											<div class="radio radio-success">

												<input type="radio" id="HeActiveSticky1" name="HeActiveSticky" value="1" <?php if ($envotpl["HeActiveSticky_carzone_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="HeActiveSticky1"><?= $tlcarzone["checkbox"]["chk4"] ?></label>

												<input type="radio" id="HeActiveSticky2" name="HeActiveSticky" value="0" <?php if ($envotpl["HeActiveSticky_carzone_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="HeActiveSticky2"><?= $tlcarzone["checkbox"]["chk5"] ?></label>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
							?>

						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlcarzone["sh_box_title"]["shbt3"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-5"><strong><?= $tlcarzone["sh_box_content"]["shbc11"] ?></strong></div>
										<div class="col-sm-7">
											<div class="radio radio-success">

												<input type="radio" id="HeShowTopbar1" name="HeShowTopbar" value="1" <?php if ($envotpl["HeShowTopbar_carzone_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="HeShowTopbar1"><?= $tlcarzone["checkbox"]["chk2"] ?></label>

												<input type="radio" id="HeShowTopbar2" name="HeShowTopbar" value="0" <?php if ($envotpl["HeShowTopbar_carzone_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="HeShowTopbar2"><?= $tlcarzone["checkbox"]["chk3"] ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-5"><strong><?= $tlcarzone["sh_box_content"]["shbc11"] ?></strong></div>
										<div class="col-md-7">
											<select name="skinCarzoneTopbar" class="form-control selectpicker">

												<?php
												/**
												 * OPTION LIST
												 * array -> class Top Bar
												 */
												$skintbar = array (
													'top-bar'                       => 'Basic Color',
													'top-bar bg-black'              => 'Black Color',
													'top-bar bg-dark'               => 'Dark Color',
													'top-bar bg-light'              => 'Light Color',
													'top-bar bg-primary text-white' => 'Primary Color',
												);

												foreach ($skintbar as $st => $kt):
													echo $envotpl["skinCarzoneTopbar_tpl"] == $st ? '<option value="' . $st . '" selected="selected">' . $kt . '</option>' : '<option value="' . $st . '">' . $kt . '</option>';
												endforeach;
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
							echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
							?>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlcarzone["sh_box_title"]["shbt2"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-1"><strong><?= $tlcarzone["sh_box_content"]["shbc"] ?></strong></div>
										<div class="col-sm-3 text-center">
											<div class="radio radio-success">

												<input type="radio" id="HeShowLinks1_1" name="HeShowLinks1" value="1" <?php if ($envotpl["HeShowLinks1_carzone_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="HeShowLinks1_1"><?= $tlcarzone["checkbox"]["chk2"] ?></label>

												<input type="radio" id="HeShowLinks1_2" name="HeShowLinks1" value="0" <?php if ($envotpl["HeShowLinks1_carzone_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="HeShowLinks1_2"><?= $tlcarzone["checkbox"]["chk3"] ?></label>

											</div>
										</div>
										<div class="col-sm-1 text-center" style="border-left: 1px solid #D9D9D9;"><?= $tlcarzone["sh_box_content"]["shbc7"] ?></div>
										<div class="col-sm-3">
											<input type="text" name="HeLinks1" class="form-control" value="<?= $envotpl["HeLinks1_carzone_tpl"] ?>"/>
										</div>
										<div class="col-sm-1 text-center"><?= $tlcarzone["sh_box_content"]["shbc8"] ?></div>
										<div class="col-sm-3">
											<input type="text" name="HeText1" class="form-control" value="<?= $envotpl["HeText1_carzone_tpl"] ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-1"><strong><?= $tlcarzone["sh_box_content"]["shbc1"] ?></strong></div>
										<div class="col-sm-3 text-center">
											<div class="radio radio-success">

												<input type="radio" id="HeShowLinks2_1" name="HeShowLinks2" value="1" <?php if ($envotpl["HeShowLinks2_carzone_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="HeShowLinks2_1"><?= $tlcarzone["checkbox"]["chk2"] ?></label>

												<input type="radio" id="HeShowLinks2_2" name="HeShowLinks2" value="0" <?php if ($envotpl["HeShowLinks2_carzone_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="HeShowLinks2_2"><?= $tlcarzone["checkbox"]["chk3"] ?></label>

											</div>
										</div>
										<div class="col-sm-1 text-center" style="border-left: 1px solid #D9D9D9;"><?= $tlcarzone["sh_box_content"]["shbc7"] ?></div>
										<div class="col-sm-3">
											<input type="text" name="HeLinks2" class="form-control" value="<?= $envotpl["HeLinks2_carzone_tpl"] ?>"/>
										</div>
										<div class="col-sm-1 text-center"><?= $tlcarzone["sh_box_content"]["shbc8"] ?></div>
										<div class="col-sm-3">
											<input type="text" name="HeText2" class="form-control" value="<?= $envotpl["HeText2_carzone_tpl"] ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-3"><strong><?= $tlcarzone["sh_box_content"]["shbc2"] ?></strong></div>
										<div class="col-sm-3 text-center">
											<div class="radio radio-success">

												<input type="radio" id="HeShowLogin1" name="HeShowLogin" value="1" <?php if ($envotpl["HeShowLogin_carzone_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="HeShowLogin1"><?= $tlcarzone["checkbox"]["chk2"] ?></label>

												<input type="radio" id="HeShowLogin2" name="HeShowLogin" value="0" <?php if ($envotpl["HeShowLogin_carzone_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="HeShowLogin2"><?= $tlcarzone["checkbox"]["chk3"] ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-1"><strong><?= $tlcarzone["sh_box_content"]["shbc9"] ?></strong></div>
										<div class="col-sm-3 text-center">
											<div class="radio radio-success">

												<input type="radio" id="HeShowEmail1" name="HeShowEmail" value="1" <?php if ($envotpl["HeShowEmail_carzone_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="HeShowEmail1"><?= $tlcarzone["checkbox"]["chk2"] ?></label>

												<input type="radio" id="HeShowEmail2" name="HeShowEmail" value="0" <?php if ($envotpl["HeShowEmail_carzone_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="HeShowEmail2"><?= $tlcarzone["checkbox"]["chk3"] ?></label>

											</div>
										</div>
										<div class="col-sm-1 text-center" style="border-left: 1px solid #D9D9D9;"><?= $tlcarzone["sh_box_content"]["shbc7"] ?></div>
										<div class="col-sm-3">
											<input type="text" name="HeEmailLinks" class="form-control" value="<?= $envotpl["HeEmailLinks_carzone_tpl"] ?>"/>
										</div>
										<div class="col-sm-1 text-center"><?= $tlcarzone["sh_box_content"]["shbc8"] ?></div>
										<div class="col-sm-3">
											<input type="text" name="HeEmailText" class="form-control" value="<?= $envotpl["HeEmailText_carzone_tpl"] ?>"/>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
							?>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlcarzone["sh_box_title"]["shbt1"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-2"><strong><?= $tlcarzone["sh_box_content"]["shbc3"] ?></strong></div>
										<div class="col-sm-3">
											<div class="radio radio-success">

												<input type="radio" id="facebookHeShow1" name="facebookHeShow" value="1" <?php if ($envotpl["facebookHeShow_carzone_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="facebookHeShow1"><?= $tlcarzone["checkbox"]["chk2"] ?></label>

												<input type="radio" id="facebookHeShow2" name="facebookHeShow" value="0" <?php if ($envotpl["facebookHeShow_carzone_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="facebookHeShow2"><?= $tlcarzone["checkbox"]["chk3"] ?></label>

											</div>
										</div>
										<div class="col-sm-2"><?= $tlcarzone["sh_box_content"]["shbc7"] ?></div>
										<div class="col-sm-5">
											<input type="text" name="facebookHeLinks" class="form-control" value="<?= $envotpl["facebookHeLinks_carzone_tpl"] ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-2"><strong><?= $tlcarzone["sh_box_content"]["shbc14"] ?></strong></div>
										<div class="col-sm-3">
											<div class="radio radio-success">

												<input type="radio" id="youtubeHeShow1" name="youtubeHeShow" value="1" <?php if ($envotpl["youtubeHeShow_carzone_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="youtubeHeShow1"><?= $tlcarzone["checkbox"]["chk2"] ?></label>

												<input type="radio" id="youtubeHeShow2" name="youtubeHeShow" value="0" <?php if ($envotpl["youtubeHeShow_carzone_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="youtubeHeShow2"><?= $tlcarzone["checkbox"]["chk3"] ?></label>

											</div>
										</div>
										<div class="col-sm-2"><?= $tlcarzone["sh_box_content"]["shbc7"] ?></div>
										<div class="col-sm-5">
											<input type="text" name="youtubeHeLinks" class="form-control" value="<?= $envotpl["youtubeHeLinks_carzone_tpl"] ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-2"><strong><?= $tlcarzone["sh_box_content"]["shbc4"] ?></strong></div>
										<div class="col-sm-3">
											<div class="radio radio-success">

												<input type="radio" id="twitterHeShow1" name="twitterHeShow" value="1" <?php if ($envotpl["twitterHeShow_carzone_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="twitterHeShow1"><?= $tlcarzone["checkbox"]["chk2"] ?></label>

												<input type="radio" id="twitterHeShow2" name="twitterHeShow" value="0" <?php if ($envotpl["twitterHeShow_carzone_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="twitterHeShow2"><?= $tlcarzone["checkbox"]["chk3"] ?></label>

											</div>
										</div>
										<div class="col-sm-2"><?= $tlcarzone["sh_box_content"]["shbc7"] ?></div>
										<div class="col-sm-5">
											<input type="text" name="twitterHeLinks" class="form-control" value="<?= $envotpl["twitterHeLinks_carzone_tpl"] ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-2"><strong><?= $tlcarzone["sh_box_content"]["shbc5"] ?></strong></div>
										<div class="col-sm-3">
											<div class="radio radio-success">

												<input type="radio" id="googleHeShow1" name="googleHeShow" value="1" <?php if ($envotpl["googleHeShow_carzone_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="googleHeShow1"><?= $tlcarzone["checkbox"]["chk2"] ?></label>

												<input type="radio" id="googleHeShow2" name="googleHeShow" value="0" <?php if ($envotpl["googleHeShow_carzone_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="googleHeShow2"><?= $tlcarzone["checkbox"]["chk3"] ?></label>

											</div>
										</div>
										<div class="col-sm-2"><?= $tlcarzone["sh_box_content"]["shbc7"] ?></div>
										<div class="col-sm-5">
											<input type="text" name="googleHeLinks" class="form-control" value="<?= $envotpl["googleHeLinks_carzone_tpl"] ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-2"><strong><?= $tlcarzone["sh_box_content"]["shbc6"] ?></strong></div>
										<div class="col-sm-3">
											<div class="radio radio-success">

												<input type="radio" id="linkedinHeShow1" name="linkedinHeShow" value="1" <?php if ($envotpl["linkedinHeShow_carzone_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="linkedinHeShow1"><?= $tlcarzone["checkbox"]["chk2"] ?></label>

												<input type="radio" id="linkedinHeShow2" name="linkedinHeShow" value="0" <?php if ($envotpl["linkedinHeShow_carzone_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="linkedinHeShow2"><?= $tlcarzone["checkbox"]["chk3"] ?></label>

											</div>
										</div>
										<div class="col-sm-2"><?= $tlcarzone["sh_box_content"]["shbc7"] ?></div>
										<div class="col-sm-5">
											<input type="text" name="linkedinHeLinks" class="form-control" value="<?= $envotpl["linkedinHeLinks_carzone_tpl"] ?>"/>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
							?>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="cmsPage3" role="tabpanel">
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlcarzone["sh_box_title"]["shbt4"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-sm-2"><strong><?= $tlcarzone["sh_box_content"]["shbc3"] ?></strong></div>
										<div class="col-sm-3">
											<div class="radio radio-success">

												<input type="radio" id="facebookFoShow1" name="facebookFoShow" value="1" <?php if ($envotpl["facebookFoShow_carzone_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="facebookFoShow1"><?= $tlcarzone["checkbox"]["chk2"] ?></label>

												<input type="radio" id="facebookFoShow2" name="facebookFoShow" value="0" <?php if ($envotpl["facebookFoShow_carzone_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="facebookFoShow2"><?= $tlcarzone["checkbox"]["chk3"] ?></label>

											</div>
										</div>
										<div class="col-sm-2"><?= $tlcarzone["sh_box_content"]["shbc7"] ?></div>
										<div class="col-sm-5">
											<input type="text" name="facebookFoLinks" class="form-control" value="<?= $envotpl["facebookFoLinks_carzone_tpl"] ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-2"><strong><?= $tlcarzone["sh_box_content"]["shbc14"] ?></strong></div>
										<div class="col-sm-3">
											<div class="radio radio-success">

												<input type="radio" id="youtubeFoShow1" name="youtubeFoShow" value="1" <?php if ($envotpl["youtubeFoShow_carzone_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="youtubeFoShow1"><?= $tlcarzone["checkbox"]["chk2"] ?></label>

												<input type="radio" id="youtubeFoShow2" name="youtubeFoShow" value="0" <?php if ($envotpl["youtubeFoShow_carzone_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="youtubeFoShow2"><?= $tlcarzone["checkbox"]["chk3"] ?></label>

											</div>
										</div>
										<div class="col-sm-2"><?= $tlcarzone["sh_box_content"]["shbc7"] ?></div>
										<div class="col-sm-5">
											<input type="text" name="youtubeFoLinks" class="form-control" value="<?= $envotpl["youtubeFoLinks_carzone_tpl"] ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-2"><strong><?= $tlcarzone["sh_box_content"]["shbc4"] ?></strong></div>
										<div class="col-sm-3">
											<div class="radio radio-success">

												<input type="radio" id="twitterFoShow1" name="twitterFoShow" value="1" <?php if ($envotpl["twitterFoShow_carzone_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="twitterFoShow1"><?= $tlcarzone["checkbox"]["chk2"] ?></label>

												<input type="radio" id="twitterFoShow2" name="twitterFoShow" value="0" <?php if ($envotpl["twitterFoShow_carzone_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="twitterFoShow2"><?= $tlcarzone["checkbox"]["chk3"] ?></label>

											</div>
										</div>
										<div class="col-sm-2"><?= $tlcarzone["sh_box_content"]["shbc7"] ?></div>
										<div class="col-sm-5">
											<input type="text" name="twitterFoLinks" class="form-control" value="<?= $envotpl["twitterFoLinks_carzone_tpl"] ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-2"><strong><?= $tlcarzone["sh_box_content"]["shbc5"] ?></strong></div>
										<div class="col-sm-3">
											<div class="radio radio-success">

												<input type="radio" id="googleFoShow1" name="googleFoShow" value="1" <?php if ($envotpl["googleFoShow_carzone_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="googleFoShow1"><?= $tlcarzone["checkbox"]["chk2"] ?></label>

												<input type="radio" id="googleFoShow2" name="googleFoShow" value="0" <?php if ($envotpl["googleFoShow_carzone_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="googleFoShow2"><?= $tlcarzone["checkbox"]["chk3"] ?></label>

											</div>
										</div>
										<div class="col-sm-2"><?= $tlcarzone["sh_box_content"]["shbc7"] ?></div>
										<div class="col-sm-5">
											<input type="text" name="googleFoLinks" class="form-control" value="<?= $envotpl["googleFoLinks_carzone_tpl"] ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-2"><strong><?= $tlcarzone["sh_box_content"]["shbc6"] ?></strong></div>
										<div class="col-sm-3">
											<div class="radio radio-success">

												<input type="radio" id="linkedinFoShow1" name="linkedinFoShow" value="1" <?php if ($envotpl["linkedinFoShow_carzone_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="linkedinFoShow1"><?= $tlcarzone["checkbox"]["chk2"] ?></label>

												<input type="radio" id="linkedinFoShow2" name="linkedinFoShow" value="0" <?php if ($envotpl["linkedinFoShow_carzone_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="linkedinFoShow2"><?= $tlcarzone["checkbox"]["chk3"] ?></label>

											</div>
										</div>
										<div class="col-sm-2"><?= $tlcarzone["sh_box_content"]["shbc7"] ?></div>
										<div class="col-sm-5">
											<input type="text" name="linkedinFoLinks" class="form-control" value="<?= $envotpl["linkedinFoLinks_carzone_tpl"] ?>"/>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
							?>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="cmsPage4" role="tabpanel">
			<div class="row">
				<div class="col-sm-12">

					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlcarzone["sl_box_title"]["slbt"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form <?php if (!$ENVO_FILECONTENT) {
										echo "hidden";
									} ?>">
										<div class="col-sm-12">
											<h4>
												<?= $tlcarzone["sl_box_title"]["slbt1"] ?>
												<small><strong><?= $ENVO_FILEURL ?></strong></small>
											</h4>
										</div>
									</div>
									<?php if ($ENVO_FILECONTENT) { ?>
										<div class="row-form">
											<div class="col-sm-12">
												<label for="envo_filecontent"><?= $tlcarzone["sl_box_title"]["slbt2"] ?></label>
												<div id="htmleditor"></div>
												<textarea name="envo_filecontent" id="envo_filecontent" class="form-control hidden"><?= $ENVO_FILECONTENT ?></textarea>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
							// Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
							echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
							?>

						</div>
					</div>

					<input type="hidden" name="envo_file" value="<?= $ENVO_FILEURL ?>"/>

				</div>
			</div>
		</div>
	</div>
</form>
