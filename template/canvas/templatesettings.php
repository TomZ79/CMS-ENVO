  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton hidden-xs">
      <button type="submit" name="save" class="btn btn-success button">
        <i class="fa fa-save margin-right-5"></i>
        <?php echo $tl["button"]["btn1"]; ?> !!
      </button>
    </div>

    <!-- Form Content -->
    <ul id="cmsTab" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
      <li role="presentation" class="active">
        <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
          <span class="text">Header</span>
        </a>
      </li>
      <li role="presentation" class="next">
        <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
          <span class="text">Section</span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
          <span class="text">Footer</span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
          <span class="text">Language</span>
        </a>
      </li>
    </ul>

    <div id="cmsTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
        <div class="row">
          <div class="col-md-6">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Mini Navbar Content</h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5"><strong>'Home' Links</strong></div>
                      <div class="col-md-7">
                        <input type="text" name="homeLinks" class="form-control" value="<?php echo $jktpl["homeLinks_canvas_tpl"]; ?>"/>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong>'Contact' Links</strong></div>
                      <div class="col-md-7">
                        <input type="text" name="contactLinks" class="form-control" value="<?php echo $jktpl["contactLinks_canvas_tpl"]; ?>"/>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong>'Login / Logout' Links</strong></div>
                      <div class="col-md-7">
                        <input type="text" name="loginLinks" class="form-control" value="<?php echo $jktpl["loginLinks_canvas_tpl"]; ?>"/>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong>'Register' Links</strong></div>
                      <div class="col-md-7">
                        <input type="text" name="registerLinks" class="form-control" value="<?php echo $jktpl["registerLinks_canvas_tpl"]; ?>"/>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right">
                  <i class="fa fa-save margin-right-5"></i>
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Navbar Style</h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5"><strong>Standard Logo</strong></div>
                      <div class="col-md-7">
                        <div class="input-group">
                          <input type="text" name="standardlogo" id="sclogo1" class="form-control" value="<?php echo $jktpl["logo1_canvas_tpl"]; ?>"/>
                        <span class="input-group-btn">
                          <a class="btn btn-info ifManager" type="button" href="../../js/editor/plugins/filemanager/dialog.php?type=1&subfolder=&editor=mce_0&lang=eng&fldr=&field_id=sclogo1"><i class="fa fa-photo"></i></a>
                        </span>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong>Retina Logo</strong></div>
                      <div class="col-md-7">
                        <div class="input-group">
                          <input type="text" name="retinalogo" id="sclogo2" class="form-control" value="<?php echo $jktpl["logo2_canvas_tpl"]; ?>"/>
                          <span class="input-group-btn">
                            <a class="btn btn-info ifManager" type="button" href="../../js/editor/plugins/filemanager/dialog.php?type=1&subfolder=&editor=mce_0&lang=eng&fldr=&field_id=sclogo2"><i class="fa fa-photo"></i></a>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong>Phone</strong></div>
                      <div class="col-md-7">
                        <input type="text" name="phoneLinks1" class="form-control" value="<?php echo $jktpl["phoneLinks1_canvas_tpl"]; ?>"/>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong>Email</strong></div>
                      <div class="col-md-7">
                        <input type="text" name="emailLinks1" class="form-control" value="<?php echo $jktpl["emailLinks1_canvas_tpl"]; ?>"/>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right">
                  <i class="fa fa-save margin-right-5"></i>
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Mini Navbar Content - Social Icons</h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-2"><strong>Faceebook</strong></div>
                      <div class="col-md-3">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="facebookShow" value="1" <?php if ($jktpl["facebookShow_canvas_tpl"] == 1) { ?> checked="checked"<?php } ?> /> Show
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="facebookShow" value="0" <?php if ($jktpl["facebookShow_canvas_tpl"] == 0) { ?> checked="checked"<?php } ?> /> Hide
                          </label>
                        </div>
                      </div>
                      <div class="col-md-2">Links</div>
                      <div class="col-md-5">
                        <input type="text" name="facebookLinks" class="form-control" value="<?php echo $jktpl["facebookLinks_canvas_tpl"]; ?>"/>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-2"><strong>Twitter</strong></div>
                      <div class="col-md-3">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="twitterShow" value="1" <?php if ($jktpl["twitterShow_canvas_tpl"] == 1) { ?> checked="checked"<?php } ?> /> Show
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="twitterShow" value="0" <?php if ($jktpl["twitterShow_canvas_tpl"] == 0) { ?> checked="checked"<?php } ?> /> Hide
                          </label>
                        </div>
                      </div>
                      <div class="col-md-2">Links</div>
                      <div class="col-md-5">
                        <input type="text" name="twitterLinks" class="form-control" value="<?php echo $jktpl["twitterLinks_canvas_tpl"]; ?>"/>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-2"><strong>Google Plus</strong></div>
                      <div class="col-md-3">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="googleShow" value="1" <?php if ($jktpl["googleShow_canvas_tpl"] == 1) { ?> checked="checked"<?php } ?> /> Show
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="googleShow" value="0" <?php if ($jktpl["googleShow_canvas_tpl"] == 0) { ?> checked="checked"<?php } ?> /> Hide
                          </label>
                        </div>
                      </div>
                      <div class="col-md-2">Links</div>
                      <div class="col-md-5">
                        <input type="text" name="googleLinks" class="form-control" value="<?php echo $jktpl["googleLinks_canvas_tpl"]; ?>"/>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-2"><strong>Instagram</strong></div>
                      <div class="col-md-3">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="instagramShow" value="1" <?php if ($jktpl["instagramShow_canvas_tpl"] == 1) { ?> checked="checked"<?php } ?> /> Show
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="instagramShow" value="0" <?php if ($jktpl["instagramShow_canvas_tpl"] == 0) { ?> checked="checked"<?php } ?> /> Hide
                          </label>
                        </div>
                      </div>
                      <div class="col-md-2">Links</div>
                      <div class="col-md-5">
                        <input type="text" name="instagramLinks" class="form-control" value="<?php echo $jktpl["instagramLinks_canvas_tpl"]; ?>"/>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-2"><strong>Phone</strong></div>
                      <div class="col-md-3">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="phoneShow" value="1" <?php if ($jktpl["phoneShow_canvas_tpl"] == 1) { ?> checked="checked"<?php } ?> /> Show
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="phoneShow" value="0" <?php if ($jktpl["phoneShow_canvas_tpl"] == 0) { ?> checked="checked"<?php } ?> /> Hide
                          </label>
                        </div>
                      </div>
                      <div class="col-md-2">Phone Number</div>
                      <div class="col-md-5">
                        <input type="text" name="phoneLinks" class="form-control" value="<?php echo $jktpl["phoneLinks_canvas_tpl"]; ?>"/>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-2"><strong>Email</strong></div>
                      <div class="col-md-3">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="emailShow" value="1" <?php if ($jktpl["emailShow_canvas_tpl"] == 1) { ?> checked="checked"<?php } ?> /> Show
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="emailShow" value="0" <?php if ($jktpl["emailShow_canvas_tpl"] == 0) { ?> checked="checked"<?php } ?> /> Hide
                          </label>
                        </div>
                      </div>
                      <div class="col-md-2">Email</div>
                      <div class="col-md-5">
                        <input type="text" name="emailLinks" class="form-control" value="<?php echo $jktpl["emailLinks_canvas_tpl"]; ?>"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right">
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
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Section</h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5"><strong>Select Plugin</strong></div>
                      <div class="col-md-7">
                        <select name="cb1" id="cb1" class="form-control selectpicker" data-live-search="true" data-size="5">
                          <?php if (isset($JAK_HOOKS) && is_array($JAK_HOOKS)) foreach ($JAK_HOOKS as $v) { ?>
                            <option value="<?php echo $v["id"]; ?>"<?php if (is_numeric($jktpl["section_canvas_tpl"]) && $jktpl["section_canvas_tpl"] == $v["id"]) echo ' selected="selected"'; ?>><?php echo $v["name"]; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right">
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
          <div class="col-md-4">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Footer Block 1</h3>
              </div>
              <div class="box-body">

              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right">
                  <i class="fa fa-save margin-right-5"></i>
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Footer Block 2</h3>
              </div>
              <div class="box-body">

              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right">
                  <i class="fa fa-save margin-right-5"></i>
                  <?php echo $tl["button"]["btn1"]; ?>
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Footer Block 3</h3>
              </div>
              <div class="box-body">

              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right">
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

            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Editace Souboru</h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form <?php if (!$JAK_FILECONTENT) { echo "hidden"; } ?>">
                      <div class="col-md-12"><h4>File: <small><strong><?php echo $JAK_FILEURL; ?></strong></small></h4></div>
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
                <button type="submit" name="save" class="btn btn-primary pull-right">
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