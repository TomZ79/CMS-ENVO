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
    <li class="nav-item">
      <a href="#" class="active" data-toggle="tab" data-target="#cmsPage1" role="tab">
        <span class="text"><?php echo $tlmr["tplset_section_tab"]["tplsettab"]; ?></span>
      </a>
    </li>
    <li class="nav-item next">
      <a href="#" class="" data-toggle="tab" data-target="#cmsPage2" role="tab">
        <span class="text"><?php echo $tlmr["tplset_section_tab"]["tplsettab1"]; ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="" data-toggle="tab" data-target="#cmsPage3" role="tab">
        <span class="text"><?php echo $tlmr["tplset_section_tab"]["tplsettab2"]; ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="" data-toggle="tab" data-target="#cmsPage4" role="tab">
        <span class="text"><?php echo $tlmr["tplset_section_tab"]["tplsettab3"]; ?></span>
      </a>
    </li>
	</ul>

	<div class="tab-content">
    <div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
			<div class="row">

				<div class="col-sm-6">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html->addTag('h3', $tlmr["sb_box_title"]["sbbt"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">

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
				<div class="col-sm-6">

				</div>
			</div>
		</div>
    <div class="tab-pane fade" id="cmsPage2" role="tabpanel">
			<div class="row">
				<div class="col-sm-5">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html->addTag('h3', $tlmr["sh_box_title"]["shbt"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
                  <div class="row-form">
                    <div class="col-sm-12">

                      <?php
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('', '<strong>' . $tlmr["sh_box_content"]["shbc"] . '</strong>');
                      // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                      echo $Html->addTextarea('envo_mininav_text', $jktpl["mininav_text_mobilerepair_tpl"], '3', '', array('class' => 'form-control', 'style' => 'height: auto;'));
                      ?>

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
				<div class="col-sm-7">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html->addTag('h3', $tlmr["sh_box_title"]["shbt1"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									
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
				<div class="col-sm-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html->addTag('h3', $tlmr["sh_box_title"]["shbt2"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
                  <div class="row-form">
                    <div class="col-md-5"><strong><?php echo $tlmr["sh_box_content"]["shbc1"]; ?></strong></div>
                    <div class="col-md-7">
                      <div class="input-group">
                        <input type="text" name="standardlogo1" id="sclogo1" class="form-control" value="<?php echo $jktpl["logo1_mobilerepair_tpl"]; ?>"/>
                        <span class="input-group-btn">

													<?php
                          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                          echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=1&lang='.$managerlang.'&fldr=&field_id=sclogo1', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array('type' => 'button', 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i22"]));
                          ?>

                        </span>
                      </div>
                    </div>
                  </div>
									<div class="row-form">
										<div class="col-sm-2"><strong><?php echo $tlmr["sh_box_content"]["shbc3"]; ?></strong></div>
										<div class="col-sm-3">
											<div class="radio radio-success">

												<input type="radio" id="facebookheaderShow1" name="facebookheaderShow1" value="1" <?php if ($jktpl["facebookheaderShow_mobilerepair_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="facebookheaderShow1"><?php echo $tlmr["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="facebookheaderShow2" name="facebookheaderShow1" value="0" <?php if ($jktpl["facebookheaderShow_mobilerepair_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="facebookheaderShow2"><?php echo $tlmr["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
										<div class="col-sm-2"><?php echo $tlmr["sh_box_content"]["shbc11"]; ?></div>
										<div class="col-sm-5">
											<input type="text" name="facebookheaderLinks1" class="form-control" value="<?php echo $jktpl["facebookheaderLinks_mobilerepair_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-2"><strong><?php echo $tlmr["sh_box_content"]["shbc4"]; ?></strong></div>
										<div class="col-sm-3">
											<div class="radio radio-success">

												<input type="radio" id="twitterheaderShow1" name="twitterheaderShow1" value="1" <?php if ($jktpl["twitterheaderShow_mobilerepair_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="twitterheaderShow1"><?php echo $tlmr["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="twitterheaderShow2" name="twitterheaderShow1" value="0" <?php if ($jktpl["twitterheaderShow_mobilerepair_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="twitterheaderShow2"><?php echo $tlmr["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
										<div class="col-sm-2"><?php echo $tlmr["sh_box_content"]["shbc11"]; ?></div>
										<div class="col-sm-5">
											<input type="text" name="twitterheaderLinks1" class="form-control" value="<?php echo $jktpl["twitterheaderLinks_mobilerepair_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-2"><strong><?php echo $tlmr["sh_box_content"]["shbc5"]; ?></strong></div>
										<div class="col-sm-3">
											<div class="radio radio-success">

												<input type="radio" id="googleheaderShow1" name="googleheaderShow1" value="1" <?php if ($jktpl["googleheaderShow_mobilerepair_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="googleheaderShow1"><?php echo $tlmr["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="googleheaderShow2" name="googleheaderShow1" value="0" <?php if ($jktpl["googleheaderShow_mobilerepair_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="googleheaderShow2"><?php echo $tlmr["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
										<div class="col-sm-2"><?php echo $tlmr["sh_box_content"]["shbc11"]; ?></div>
										<div class="col-sm-5">
											<input type="text" name="googleheaderLinks1" class="form-control" value="<?php echo $jktpl["googleheaderLinks_mobilerepair_tpl"]; ?>"/>
										</div>
									</div>
                  <div class="row-form">
                    <div class="col-sm-2"><strong><?php echo $tlmr["sh_box_content"]["shbc6"]; ?></strong></div>
                    <div class="col-sm-3">
                      <div class="radio radio-success">

                        <input type="radio" id="instagramheaderShow1" name="instagramheaderShow1" value="1" <?php if ($jktpl["instagramheaderShow_mobilerepair_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="instagramheaderShow1"><?php echo $tlmr["checkbox"]["chk2"]; ?></label>

                        <input type="radio" id="instagramheaderShow2" name="instagramheaderShow1" value="0" <?php if ($jktpl["instagramheaderShow_mobilerepair_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="instagramheaderShow2"><?php echo $tlmr["checkbox"]["chk3"]; ?></label>

                      </div>
                    </div>
                    <div class="col-sm-2"><?php echo $tlmr["sh_box_content"]["shbc11"]; ?></div>
                    <div class="col-sm-5">
                      <input type="text" name="instagramheaderLinks1" class="form-control" value="<?php echo $jktpl["instagramheaderLinks_mobilerepair_tpl"]; ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-2"><strong><?php echo $tlmr["sh_box_content"]["shbc9"]; ?></strong></div>
                    <div class="col-sm-3">
                      <div class="radio radio-success">

                        <input type="radio" id="youtubeheaderShow1" name="youtubeheaderShow1" value="1" <?php if ($jktpl["youtubeheaderShow_mobilerepair_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="youtubeheaderShow1"><?php echo $tlmr["checkbox"]["chk2"]; ?></label>

                        <input type="radio" id="youtubeheaderShow2" name="youtubeheaderShow1" value="0" <?php if ($jktpl["youtubeheaderShow_mobilerepair_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="youtubeheaderShow2"><?php echo $tlmr["checkbox"]["chk3"]; ?></label>

                      </div>
                    </div>
                    <div class="col-sm-2"><?php echo $tlmr["sh_box_content"]["shbc11"]; ?></div>
                    <div class="col-sm-5">
                      <input type="text" name="youtubeheaderLinks1" class="form-control" value="<?php echo $jktpl["youtubeheaderLinks_mobilerepair_tpl"]; ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-2"><strong><?php echo $tlmr["sh_box_content"]["shbc10"]; ?></strong></div>
                    <div class="col-sm-3">
                      <div class="radio radio-success">

                        <input type="radio" id="pinterestheaderShow1" name="pinterestheaderShow1" value="1" <?php if ($jktpl["pinterestheaderShow_mobilerepair_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="pinterestheaderShow1"><?php echo $tlmr["checkbox"]["chk2"]; ?></label>

                        <input type="radio" id="pinterestheaderShow2" name="pinterestheaderShow1" value="0" <?php if ($jktpl["pinterestheaderShow_mobilerepair_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="pinterestheaderShow2"><?php echo $tlmr["checkbox"]["chk3"]; ?></label>

                      </div>
                    </div>
                    <div class="col-sm-2"><?php echo $tlmr["sh_box_content"]["shbc11"]; ?></div>
                    <div class="col-sm-5">
                      <input type="text" name="pinterestheaderLinks1" class="form-control" value="<?php echo $jktpl["pinterestheaderLinks_mobilerepair_tpl"]; ?>"/>
                    </div>
                  </div>
									<div class="row-form">
										<div class="col-sm-2"><strong><?php echo $tlmr["sh_box_content"]["shbc7"]; ?></strong></div>
										<div class="col-sm-3">
											<div class="radio radio-success">

												<input type="radio" id="phoneheaderShow1" name="phoneheaderShow1" value="1" <?php if ($jktpl["phoneheaderShow_mobilerepair_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="phoneheaderShow1"><?php echo $tlmr["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="phoneheaderShow2" name="phoneheaderShow1" value="0" <?php if ($jktpl["phoneheaderShow_mobilerepair_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="phoneheaderShow2"><?php echo $tlmr["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
										<div class="col-sm-2"><?php echo $tlmr["sh_box_content"]["shbc12"]; ?></div>
										<div class="col-sm-5">
											<input type="text" name="phoneheaderLinks1" class="form-control" value="<?php echo $jktpl["phoneheaderLinks_mobilerepair_tpl"]; ?>"/>
										</div>
									</div>
									<div class="row-form">
										<div class="col-sm-2"><strong><?php echo $tlmr["sh_box_content"]["shbc8"]; ?></strong></div>
										<div class="col-sm-3">
											<div class="radio radio-success">

												<input type="radio" id="emailheaderShow1" name="emailheaderShow1" value="1" <?php if ($jktpl["emailheaderShow_mobilerepair_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="emailheaderShow1"><?php echo $tlmr["checkbox"]["chk2"]; ?></label>

												<input type="radio" id="emailheaderShow2" name="emailheaderShow1" value="0" <?php if ($jktpl["emailheaderShow_mobilerepair_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="emailheaderShow2"><?php echo $tlmr["checkbox"]["chk3"]; ?></label>

											</div>
										</div>
										<div class="col-sm-2"><?php echo $tlmr["sh_box_content"]["shbc13"]; ?></div>
										<div class="col-sm-5">
											<input type="text" name="emailheaderLinks1" class="form-control" value="<?php echo $jktpl["emailheaderLinks_mobilerepair_tpl"]; ?>"/>
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
    <div class="tab-pane fade" id="cmsPage3" role="tabpanel">
			<div class="row">
				<div class="col-sm-12">

					<div class="box box-success">
						<div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', $tlmr["sf_box_title"]["sfbt"], 'box-title');
              ?>

						</div>
						<div class="box-body">
              <div class="row-form">
                <div class="col-md-12">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', $tlmr["sf_box_content"]["sfbc"]);
                  // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                  echo $Html->addDiv('', 'htmleditor2', array('class' => 'm-t-10'));
                  // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                  echo $Html->addTextarea('footerblocktext', $jktpl["footerblocktext_mobilerepair_tpl"], '8', '', array('id' => 'footerblocktext', 'class' => 'form-control hidden'));
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

					<input type="hidden" name="envo_file2" value="<?php echo $ENVO_FILEURL1; ?>"/>

				</div>
			</div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', $tlmr["sf_box_title"]["sfbt1"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-md-2"><strong><?php echo $tlmr["sf_box_content"]["sfbc3"]; ?></strong></div>
                    <div class="col-md-3">
                      <div class="radio radio-success">

                        <input type="radio" id="facebookfooterShow1" name="facebookfooterShow" value="1" <?php if ($jktpl["facebookfooterShow_mobilerepair_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="facebookfooterShow1"><?php echo $tlmr["checkbox"]["chk2"]; ?></label>

                        <input type="radio" id="facebookfooterShow2" name="facebookfooterShow" value="0" <?php if ($jktpl["facebookfooterShow_mobilerepair_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="facebookfooterShow2"><?php echo $tlmr["checkbox"]["chk3"]; ?></label>

                      </div>
                    </div>
                    <div class="col-md-2"><?php echo $tlmr["sf_box_content"]["sfbc9"]; ?></div>
                    <div class="col-md-5">
                      <input type="text" name="facebookfooterLinks" class="form-control" value="<?php echo $jktpl["facebookfooterLinks_mobilerepair_tpl"]; ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-2"><strong><?php echo $tlmr["sf_box_content"]["sfbc4"]; ?></strong></div>
                    <div class="col-md-3">
                      <div class="radio radio-success">

                        <input type="radio" id="twitterfooterShow1" name="twitterfooterShow" value="1" <?php if ($jktpl["twitterfooterShow_mobilerepair_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="twitterfooterShow1"><?php echo $tlmr["checkbox"]["chk2"]; ?></label>

                        <input type="radio" id="twitterfooterShow2" name="twitterfooterShow" value="0" <?php if ($jktpl["twitterfooterShow_mobilerepair_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="twitterfooterShow2"><?php echo $tlmr["checkbox"]["chk3"]; ?></label>

                      </div>
                    </div>
                    <div class="col-md-2"><?php echo $tlmr["sf_box_content"]["sfbc9"]; ?></div>
                    <div class="col-md-5">
                      <input type="text" name="twitterfooterLinks" class="form-control" value="<?php echo $jktpl["twitterfooterLinks_mobilerepair_tpl"]; ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-2"><strong><?php echo $tlmr["sf_box_content"]["sfbc5"]; ?></strong></div>
                    <div class="col-md-3">
                      <div class="radio radio-success">

                        <input type="radio" id="googlefooterShow1" name="googlefooterShow" value="1" <?php if ($jktpl["googlefooterShow_mobilerepair_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="googlefooterShow1"><?php echo $tlmr["checkbox"]["chk2"]; ?></label>

                        <input type="radio" id="googlefooterShow2" name="googlefooterShow" value="0" <?php if ($jktpl["googlefooterShow_mobilerepair_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="googlefooterShow2"><?php echo $tlmr["checkbox"]["chk3"]; ?></label>

                      </div>
                    </div>
                    <div class="col-md-2"><?php echo $tlmr["sf_box_content"]["sfbc9"]; ?></div>
                    <div class="col-md-5">
                      <input type="text" name="googlefooterLinks" class="form-control" value="<?php echo $jktpl["googlefooterLinks_mobilerepair_tpl"]; ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-2"><strong><?php echo $tlmr["sf_box_content"]["sfbc6"]; ?></strong></div>
                    <div class="col-md-3">
                      <div class="radio radio-success">

                        <input type="radio" id="instagramfooterShow1" name="instagramfooterShow" value="1" <?php if ($jktpl["instagramfooterShow_mobilerepair_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="instagramfooterShow1"><?php echo $tlmr["checkbox"]["chk2"]; ?></label>

                        <input type="radio" id="instagramfooterShow2" name="instagramfooterShow" value="0" <?php if ($jktpl["instagramfooterShow_mobilerepair_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="instagramfooterShow2"><?php echo $tlmr["checkbox"]["chk3"]; ?></label>

                      </div>
                    </div>
                    <div class="col-md-2"><?php echo $tlmr["sf_box_content"]["sfbc9"]; ?></div>
                    <div class="col-md-5">
                      <input type="text" name="instagramfooterLinks" class="form-control" value="<?php echo $jktpl["instagramfooterLinks_mobilerepair_tpl"]; ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-2"><strong><?php echo $tlmr["sf_box_content"]["sfbc7"]; ?></strong></div>
                    <div class="col-md-3">
                      <div class="radio radio-success">

                        <input type="radio" id="youtubefooterShow1" name="youtubefooterShow" value="1" <?php if ($jktpl["youtubefooterShow_mobilerepair_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="youtubefooterShow1"><?php echo $tlmr["checkbox"]["chk2"]; ?></label>

                        <input type="radio" id="youtubefooterShow2" name="youtubefooterShow" value="0" <?php if ($jktpl["youtubefooterShow_mobilerepair_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="youtubefooterShow2"><?php echo $tlmr["checkbox"]["chk3"]; ?></label>

                      </div>
                    </div>
                    <div class="col-md-2"><?php echo $tlmr["sf_box_content"]["sfbc9"]; ?></div>
                    <div class="col-md-5">
                      <input type="text" name="youtubefooterLinks" class="form-control" value="<?php echo $jktpl["youtubefooterLinks_mobilerepair_tpl"]; ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-2"><strong><?php echo $tlmr["sf_box_content"]["sfbc8"]; ?></strong></div>
                    <div class="col-md-3">
                      <div class="radio radio-success">

                        <input type="radio" id="pinterestfooterShow1" name="pinterestfooterShow" value="1" <?php if ($jktpl["pinterestfooterShow_mobilerepair_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="pinterestfooterShow1"><?php echo $tlmr["checkbox"]["chk2"]; ?></label>

                        <input type="radio" id="pinterestfooterShow2" name="pinterestfooterShow" value="0" <?php if ($jktpl["pinterestfooterShow_mobilerepair_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="pinterestfooterShow2"><?php echo $tlmr["checkbox"]["chk3"]; ?></label>

                      </div>
                    </div>
                    <div class="col-md-2"><?php echo $tlmr["sf_box_content"]["sfbc9"]; ?></div>
                    <div class="col-md-5">
                      <input type="text" name="pinterestfooterLinks" class="form-control" value="<?php echo $jktpl["pinterestfooterLinks_mobilerepair_tpl"]; ?>"/>
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
    <div class="tab-pane fade" id="cmsPage4" role="tabpanel">
			<div class="row">
				<div class="col-sm-12">

					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html->addTag('h3', $tlmr["sl_box_title"]["slbt"], 'box-title');
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
												<?php echo $tlmr["sl_box_title"]["slbt1"]; ?>
												<small><strong><?php echo $ENVO_FILEURL; ?></strong></small>
											</h4>
										</div>
									</div>
									<?php if ($ENVO_FILECONTENT) { ?>
										<div class="row-form">
											<div class="col-sm-12">
												<label for="envo_filecontent"><?php echo $tlmr["sl_box_title"]["slbt2"]; ?></label>
												<div id="htmleditor"></div>
												<textarea name="envo_filecontent" id="envo_filecontent" class="form-control hidden"><?php echo $ENVO_FILECONTENT; ?></textarea>
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

					<input type="hidden" name="envo_file" value="<?php echo $ENVO_FILEURL; ?>"/>

				</div>
			</div>
		</div>
	</div>
</form>
