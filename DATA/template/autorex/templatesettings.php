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
		<li class="nav-item next">
			<a href="#cmsPage1" class="" data-toggle="tab">
				<span class="text"><?= $tlautorex["tplset_section_tab"]["tplsettab"] ?></span>
			</a>
		</li>
		<li class="nav-item">
			<a href="#cmsPage2" class="" data-toggle="tab">
				<span class="text"><?= $tlautorex["tplset_section_tab"]["tplsettab1"] ?></span>
			</a>
		</li>
    <li class="nav-item">
      <a href="#cmsPage3" class="" data-toggle="tab">
        <span class="text"><?= $tlautorex["tplset_section_tab"]["tplsettab2"] ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage4" class="" data-toggle="tab">
        <span class="text"><?= $tlautorex["tplset_section_tab"]["tplsettab3"] ?></span>
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
				<div class="col-md-4">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlautorex["sh_box_title"]["shbt"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-6"><strong><?= $tlautorex["sh_box_content"]["shbc"] ?></strong></div>
										<div class="col-md-6">
											<div class="radio radio-success">

												<input type="radio" id="ShowTextLeft1" name="ShowTextLeft" value="1" <?php if ($jktpl["ShowTextLeft_autorex_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="ShowTextLeft1"><?= $tlautorex["checkbox"]["chk"] ?></label>

												<input type="radio" id="ShowTextLeft2" name="ShowTextLeft" value="0" <?php if ($jktpl["ShowTextLeft_autorex_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="ShowTextLeft2"><?= $tlautorex["checkbox"]["chk1"] ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-12">
											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', $tlautorex["sh_box_content"]["shbc1"]);
											// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
											echo $Html -> addTextarea('headerblocktextleft', $jktpl["headerblocktextleft_autorex_tpl"], '4', '', array ('id' => 'headerblocktextleft', 'class' => 'form-control'));
											?>
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
				<div class="col-md-4">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlautorex["sh_box_title"]["shbt1"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-6"><strong><?= $tlautorex["sh_box_content"]["shbc"] ?></strong></div>
										<div class="col-md-6">
											<div class="radio radio-success">

												<input type="radio" id="ShowTextCenter1" name="ShowTextCenter" value="1" <?php if ($jktpl["ShowTextCenter_autorex_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="ShowTextCenter1"><?= $tlautorex["checkbox"]["chk"] ?></label>

												<input type="radio" id="ShowTextCenter2" name="ShowTextCenter" value="0" <?php if ($jktpl["ShowTextCenter_autorex_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="ShowTextCenter2"><?= $tlautorex["checkbox"]["chk1"] ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-12">
											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', $tlautorex["sh_box_content"]["shbc1"]);
											// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
											echo $Html -> addTextarea('headerblocktextcenter', $jktpl["headerblocktextcenter_autorex_tpl"], '4', '', array ('id' => 'headerblocktextcenter', 'class' => 'form-control'));
											?>
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
				<div class="col-md-4">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlautorex["sh_box_title"]["shbt2"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-6"><strong><?= $tlautorex["sh_box_content"]["shbc"] ?></strong></div>
										<div class="col-md-6">
											<div class="radio radio-success">

												<input type="radio" id="ShowTextRight1" name="ShowTextRight" value="1" <?php if ($jktpl["ShowTextRight_autorex_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="ShowTextRight1"><?= $tlautorex["checkbox"]["chk"] ?></label>

												<input type="radio" id="ShowTextRight2" name="ShowTextRight" value="0" <?php if ($jktpl["ShowTextRight_autorex_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="ShowTextRight2"><?= $tlautorex["checkbox"]["chk1"] ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-12">
											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', $tlautorex["sh_box_content"]["shbc1"]);
											// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
											echo $Html -> addTextarea('headerblocktextright', $jktpl["headerblocktextright_autorex_tpl"], '4', '', array ('id' => 'headerblocktextright', 'class' => 'form-control'));
											?>
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
							echo $Html -> addTag('h3', $tlautorex["sh_box_title"]["shbt3"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-5"><strong><?= $tlautorex["sh_box_content"]["shbc2"] ?></strong></div>
										<div class="col-md-7">
											<div class="input-group">
												<input type="text" name="MainLogoDark" id="MainLogoDark" class="form-control" value="<?= $jktpl["LogoDark_autorex_tpl"] ?>"/>
												<div class="input-group-append">
													<span class="input-group-btn">

													<?php
													// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
													echo $Html -> addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=1&lang=' . $managerlangTiny . '&fldr=_files&field_id=MainLogoDark', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array ('type' => 'button', 'data-placement' => 'bottom', 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i22"]));
													?>

                        	</span>
												</div>

											</div>
										</div>
									</div>
                  <div class="row-form">
                    <div class="col-md-5"><strong>CESTA - DOCUMENT_ROOT</strong></div>
                    <div class="col-md-7">
                       <span id="docurootdark"><?= $_SERVER['DOCUMENT_ROOT'] ?></span>
                    </div>
                  </div>
								</div>
							</div>
						</div>
						<div class="box-footer">

							<?php
              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
              echo $Html -> addButton('button', '', 'Odstranit cestu', '', 'btncleardark', 'btn btn-warning');
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
              echo $Html -> addTag('h3', $tlautorex["sh_box_title"]["shbt9"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-md-5"><strong><?= $tlautorex["sh_box_content"]["shbc5"] ?></strong></div>
                    <div class="col-md-7">
                      <div class="input-group">
                        <input type="text" name="MainLogoLight" id="MainLogoLight" class="form-control" value="<?= $jktpl["LogoLight_autorex_tpl"] ?>"/>
                        <div class="input-group-append">
													<span class="input-group-btn">

													<?php
                          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                          echo $Html -> addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=1&lang=' . $managerlangTiny . '&fldr=_files&field_id=MainLogoLight', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array ('type' => 'button', 'data-placement' => 'bottom', 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i22"]));
                          ?>

                        	</span>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-5"><strong>CESTA - DOCUMENT_ROOT</strong></div>
                    <div class="col-md-7">
                      <span id="docurootlight"><?= $_SERVER['DOCUMENT_ROOT'] ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">

              <?php
              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
              echo $Html -> addButton('button', '', 'Odstranit cestu', '', 'btnclearlight', 'btn btn-warning');
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html -> addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right');
              ?>

            </div>
          </div>
        </div>
			</div>
      <div class="row">
        <div class="col-md-4">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html -> addTag('h3', $tlautorex["sh_box_title"]["shbt4"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-md-6"><strong><?= $tlautorex["sh_box_content"]["shbc"] ?></strong></div>
                    <div class="col-md-6">
                      <div class="radio radio-success">

                        <input type="radio" id="ShowBtn1" name="ShowBtn" value="1" <?php if ($jktpl["ShowTextBtn_autorex_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="ShowBtn1"><?= $tlautorex["checkbox"]["chk"] ?></label>

                        <input type="radio" id="ShowBtn2" name="ShowBtn" value="0" <?php if ($jktpl["ShowTextBtn_autorex_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="ShowBtn2"><?= $tlautorex["checkbox"]["chk1"] ?></label>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-12">
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html -> addTag('strong', $tlautorex["sh_box_content"]["shbc3"]);
                      // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                      echo $Html -> addTextarea('headerblocktextbtn', $jktpl["TextBtn_autorex_tpl"], '1', '', array ('id' => 'headerblocktextbtn', 'class' => 'form-control'));
                      ?>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-12">
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html -> addTag('strong', $tlautorex["sh_box_content"]["shbc4"]);
                      // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                      echo $Html -> addTextarea('headerblocklinksbtn', $jktpl["LinksBtn_autorex_tpl"], '1', '', array ('id' => 'headerblocklinksbtn', 'class' => 'form-control'));
                      ?>
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
        <div class="col-md-8"></div>
      </div>
		</div>
		<div class="tab-pane fade" id="cmsPage2" role="tabpanel">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlautorex["sh_box_title"]["shbt5"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-2"><strong><?= $tlautorex["sh_box_content"]["shbc"] ?></strong></div>
										<div class="col-md-10 float-left">
											<div class="radio radio-success">

												<input type="radio" id="ShowFooterUpper1" name="ShowFooterUpper" value="1" <?php if ($jktpl["ShowFooterUpper_autorex_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="ShowFooterUpper1"><?= $tlautorex["checkbox"]["chk"] ?></label>

												<input type="radio" id="ShowFooterUpper2" name="ShowFooterUpper" value="0" <?php if ($jktpl["ShowFooterUpper_autorex_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="ShowFooterUpper2"><?= $tlautorex["checkbox"]["chk1"] ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-12">
											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', $tlautorex["sh_box_content"]["shbc1"]);
											// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
											echo $Html -> addDiv('', 'htmleditor2', array ('class' => 'm-t-10'));
											// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
											echo $Html -> addTextarea('FooterUpper', $jktpl["FooterUpper_autorex_tpl"], '4', '', array ('id' => 'FooterUpper', 'class' => 'form-control hidden'));
											?>
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
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlautorex["sh_box_title"]["shbt6"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-2"><strong><?= $tlautorex["sh_box_content"]["shbc"] ?></strong></div>
										<div class="col-md-10 float-left">
											<div class="radio radio-success">

												<input type="radio" id="ShowFooterBox1" name="ShowFooterBox1" value="1" <?php if ($jktpl["ShowFooterBox1_autorex_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="ShowFooterBox1"><?= $tlautorex["checkbox"]["chk"] ?></label>

												<input type="radio" id="ShowFooterBox2" name="ShowFooterBox1" value="0" <?php if ($jktpl["ShowFooterBox1_autorex_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="ShowFooterBox2"><?= $tlautorex["checkbox"]["chk1"] ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-12">
											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', $tlautorex["sh_box_content"]["shbc1"]);
											// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
											echo $Html -> addDiv('', 'htmleditor3', array ('class' => 'm-t-10'));
											// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
											echo $Html -> addTextarea('FooterBox1', $jktpl["FooterBox1_autorex_tpl"], '4', '', array ('id' => 'FooterBox1', 'class' => 'form-control hidden'));
											?>
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
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlautorex["sh_box_title"]["shbt7"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-2"><strong><?= $tlautorex["sh_box_content"]["shbc"] ?></strong></div>
										<div class="col-md-10 float-left">
											<div class="radio radio-success">

												<input type="radio" id="ShowFooterBox3" name="ShowFooterBox2" value="1" <?php if ($jktpl["ShowFooterBox2_autorex_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="ShowFooterBox3"><?= $tlautorex["checkbox"]["chk"] ?></label>

												<input type="radio" id="ShowFooterBox4" name="ShowFooterBox2" value="0" <?php if ($jktpl["ShowFooterBox2_autorex_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="ShowFooterBox4"><?= $tlautorex["checkbox"]["chk1"] ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-12">
											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', $tlautorex["sh_box_content"]["shbc1"]);
											// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
											echo $Html -> addDiv('', 'htmleditor4', array ('class' => 'm-t-10'));
											// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
											echo $Html -> addTextarea('FooterBox2', $jktpl["FooterBox2_autorex_tpl"], '4', '', array ('id' => 'FooterBox2', 'class' => 'form-control hidden'));
											?>
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
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">

							<?php
							// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
							echo $Html -> addTag('h3', $tlautorex["sh_box_title"]["shbt8"], 'box-title');
							?>

						</div>
						<div class="box-body">
							<div class="block">
								<div class="block-content">
									<div class="row-form">
										<div class="col-md-2"><strong><?= $tlautorex["sh_box_content"]["shbc"] ?></strong></div>
										<div class="col-md-10 float-left">
											<div class="radio radio-success">

												<input type="radio" id="ShowFooterBox5" name="ShowFooterBox3" value="1" <?php if ($jktpl["ShowFooterBox3_autorex_tpl"] == 1) { ?> checked="checked"<?php } ?> />
												<label for="ShowFooterBox5"><?= $tlautorex["checkbox"]["chk"] ?></label>

												<input type="radio" id="ShowFooterBox6" name="ShowFooterBox3" value="0" <?php if ($jktpl["ShowFooterBox3_autorex_tpl"] == 0) { ?> checked="checked"<?php } ?> />
												<label for="ShowFooterBox6"><?= $tlautorex["checkbox"]["chk1"] ?></label>

											</div>
										</div>
									</div>
									<div class="row-form">
										<div class="col-md-12">
											<?php
											// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
											echo $Html -> addTag('strong', $tlautorex["sh_box_content"]["shbc1"]);
											// Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
											echo $Html -> addDiv('', 'htmleditor5', array ('class' => 'm-t-10'));
											// Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
											echo $Html -> addTextarea('FooterBox3', $jktpl["FooterBox3_autorex_tpl"], '4', '', array ('id' => 'FooterBox3', 'class' => 'form-control hidden'));
											?>
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
        <div class="col-md-12">

          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html -> addTag('h3', $tlautorex["sl_box_title"]["slbt"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form <?php if (!$ENVO_FILECONTENT) {
                    echo "hidden";
                  } ?>">
                    <div class="col-md-12">
                      <h4>
                        <?= $tlautorex["sl_box_title"]["slbt1"] ?>
                        <small><strong><?= $ENVO_FILEURL ?></strong></small>
                      </h4>
                    </div>
                  </div>
                  <?php if ($ENVO_FILECONTENT) { ?>
                    <div class="row-form">
                      <div class="col-md-12">
                        <label for="envo_filecontent"><?= $tlautorex["sl_box_title"]["slbt2"] ?></label>
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
    <div class="tab-pane fade" id="cmsPage4" role="tabpanel">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html -> addTag('h3', $tlautorex["sl_box_title"]["slbt"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form <?php if (!$ENVO_FILECONTENT_1) { echo "hidden";} ?>">
                    <div class="col-md-12">
                      <h4>
                        <?= $tlautorex["sl_box_title"]["slbt1"] ?>
                        <small><strong><?= $ENVO_FILEURL_1 ?></strong></small>
                      </h4>
                    </div>
                  </div>
                  <?php if ($ENVO_FILECONTENT_1) { ?>
                    <div class="row-form">
                      <div class="col-md-12">
                        <label for="envo_filecontent_1"><?= $tlautorex["sl_box_title"]["slbt2"] ?></label>
                        <div id="htmleditor6"></div>
                        <textarea name="envo_filecontent_1" id="envo_filecontent_1" class="form-control hidden"><?= $ENVO_FILECONTENT_1 ?></textarea>
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

          <input type="hidden" name="envo_file_1" value="<?= $ENVO_FILEURL_1 ?>"/>

        </div>
      </div>
    </div>
	</div>
</form>
