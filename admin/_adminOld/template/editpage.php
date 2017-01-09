<?php include "header.php"; ?>

<?php if ($page3 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["general"]["g7"];?>',
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
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["errorpage"]["sql"];?>',
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

  <form class="inline-form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton">
      <button type="submit" name="save" class="btn btn-primary button">
        <i class="fa fa-save margin-right-5"></i>
        <?php echo $tl["button"]["btn1"]; ?> !!
      </button>
    </div>

    <!-- Form Content -->
    <ul id="cmsTabEditPage" class="nav nav-tabs nav-tabs-responsive" role="tablist">
      <li role="presentation" class="active">
        <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
          <span class="text"><?php echo $tl["page_section_tab"]["pagetab"]; ?></span>
        </a>
      </li>
      <li role="presentation" class="next">
        <a href="#cmsPage2" id="cmsPage2-tab" role="tab" data-toggle="tab" aria-controls="cmsPage2" aria-expanded="true">
          <span class="text"><?php echo $tl["page_section_tab"]["pagetab1"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
          <span class="text"><?php echo $tl["page_section_tab"]["pagetab2"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
          <span class="text"><?php echo $tl["page_section_tab"]["pagetab3"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage5" role="tab" id="cmsPage5-tab" data-toggle="tab" aria-controls="cmsPage5">
          <span class="text"><?php echo $tl["page_section_tab"]["pagetab4"]; ?></span>
        </a>
      </li>
    </ul>

    <div id="cmsTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
        <div class="row">
          <div class="col-md-7">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc3"]; ?></strong></div>
                      <div class="col-md-7">
                        <?php include_once "title_edit.php"; ?>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc4"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_showtitle" value="1"<?php if ($JAK_FORM_DATA["showtitle"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_showtitle" value="0"<?php if ($JAK_FORM_DATA["showtitle"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc5"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_shownav" value="1"<?php if ($JAK_FORM_DATA["shownav"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_shownav" value="0"<?php if ($JAK_FORM_DATA["shownav"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc6"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_showfooter" value="1"<?php if ($JAK_FORM_DATA["showfooter"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_showfooter" value="0"<?php if ($JAK_FORM_DATA["showfooter"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc7"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_showdate" value="1"<?php if ($JAK_FORM_DATA["showdate"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_showdate" value="0"<?php if ($JAK_FORM_DATA["showdate"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc8"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_sidebar" value="1"<?php if ($JAK_FORM_DATA["sidebar"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["page_box_content"]["pagebc9"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_sidebar" value="0"<?php if ($JAK_FORM_DATA["sidebar"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["page_box_content"]["pagebc10"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc11"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_social" value="1"<?php if ($JAK_FORM_DATA["socialbutton"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_social" value="0"<?php if ($JAK_FORM_DATA["socialbutton"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc12"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_vote" value="1"<?php if ($JAK_FORM_DATA["showvote"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_vote" value="0"<?php if ($JAK_FORM_DATA["showvote"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc13"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_showtags" value="1"<?php if ($JAK_FORM_DATA["showtags"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_showtags" value="0"<?php if ($JAK_FORM_DATA["showtags"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc14"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_showlogin" value="1"<?php if ($JAK_FORM_DATA["showlogin"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_showlogin" value="0"<?php if ($JAK_FORM_DATA["showlogin"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc15"]; ?></strong></div>
                      <div class="col-md-7"><input type="text" name="jak_password" class="form-control"/></div>
                    </div>
                    <?php if ($JAK_FORM_DATA["password"]) { ?>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc16"]; ?></strong></div>
                      <div class="col-md-7"><input type="checkbox" name="jak_delete_password"/></div>
                    </div>
                    <?php } ?>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc17"]; ?></strong></div>
                      <div class="col-md-7"><input type="checkbox" name="jak_delete_rate"/></div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc18"]; ?></strong></div>
                      <div class="col-md-7"><input type="checkbox" name="jak_delete_hits"/></div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page_box_content"]["pagebc19"]; ?></strong></div>
                      <div class="col-md-7"><input type="checkbox" name="jak_update_time"/></div>
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
          <div class="col-md-5">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt1"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-12">
                        <select name="jak_catid" class="form-control selectpicker" data-size="5">
                          <option value="0"<?php if ($JAK_FORM_DATA["catid"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tl["page_box_content"]["pagebc"]; ?></option>
                          <?php if (isset($JAK_CAT_NOTUSED) && is_array($JAK_CAT_NOTUSED)) foreach ($JAK_CAT_NOTUSED as $v) { ?>
                            <option value="<?php echo $v["id"]; ?>"<?php if ($v["id"] == $JAK_FORM_DATA["catid"]) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
                          <?php if (isset($JAK_CAT) && is_array($JAK_CAT)) foreach ($JAK_CAT as $z) {
                            if ($z["id"] == $JAK_FORM_DATA["catid"]) { ?>
                              <option value="<?php echo $z["id"]; ?>" selected="selected"><?php echo $z["name"]; ?></option><?php }
                          } ?>
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
            <?php if (JAK_TAGS) { ?>
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt2"]; ?></h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="block">
                    <div class="block-content">
                      <div class="row-form">
                        <div class="col-md-5"><strong>Choose tags from predefined list</strong></div>
                        <div class="col-md-7">
                          <select name="" id="selecttags1" class="form-control selectpicker" title="Choose tags ..." data-size="7" data-live-search="true">
                            <optgroup label="Poskytovatelé TV">
                              <option value="skylink">Skylink</option>
                              <option value="freesat">freeSAT</option>
                              <option value="digi-tv">Digi TV</option>
                            </optgroup>
                            <optgroup label="Vysílací technologie">
                              <option value="dvb-t/t2">DVB-T/T2</option>
                              <option value="dvb-s/s2">DVB-S/S2</option>
                              <option value="dvb-c">DVB-C</option>
                              <option value="dvb-h">DVB-H</option>
                            </optgroup>
                          </select>
                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-md-5"><strong>Choose tags from list</strong></div>
                        <div class="col-md-7">
                          <?php $JAK_TAG_ALL = jak_tag_name_admin();
                          if ($JAK_TAG_ALL) { ?>
                            <select name="" id="selecttags2" class="form-control selectpicker" title="Choose tags ..." data-size="7" data-live-search="true">
                              <?php foreach ($JAK_TAG_ALL as $v) { ?>
                                <option value="<?php echo $v["tag"]; ?>"><?php echo $v["tag"]; ?></option>
                              <?php } ?>
                            </select>
                          <?php } else { ?>
                            <div>Tags cloud is empty!</div>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="row-form">
                        <div class="col-md-12">
                          <input type="text" name="jak_tags" class="form-control tags" value="" data-role="tagsinput"/>
                        </div>
                      </div>
                      <?php if ($JAK_TAGLIST) { ?>
                        <div class="row-form">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="tags"><?php echo $tl["general"]["g27"]; ?></label>
                              <span>Zaškrté tagy budou při uložení smazány</span>
                              <div class="controls">
                                <?php echo $JAK_TAGLIST; ?>
                              </div>
                            </div>
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
            <?php } ?>

          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
        <div class="row">
          <div class="col-md-12">
            <?php include_once "editor_edit.php"; ?>
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="cmsPage3" aria-labelledby="cmsPage3-tab">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt3"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <a href="../js/editor/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=csseditor"class="ifManager"><?php echo $tl["global_text"]["globaltxt8"]; ?></a> <a href="javascript:;" id="addCssBlock"><?php echo $tl["global_text"]["globaltxt6"]; ?></a><br/>
                <div id="csseditor"></div>
                <textarea name="jak_css" id="jak_css" class="form-control hidden"><?php echo $JAK_FORM_DATA["page_css"]; ?></textarea>
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
                <h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt4"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <a href="../js/editor/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=javaeditor" class="ifManager"><?php echo $tl["global_text"]["globaltxt8"]; ?></a>
                <a href="javascript:;" id="addJavascriptBlock"><?php echo $tl["global_text"]["globaltxt7"]; ?></a><br/>
                <div id="javaeditor"></div>
                <textarea name="jak_javascript" id="jak_javascript" class="form-control hidden"><?php echo $JAK_FORM_DATA["page_javascript"]; ?></textarea>
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
      <div role="tabpanel" class="tab-pane fade" id="cmsPage5" aria-labelledby="cmsPage5-tab">
        <div class="row">
          <div class="col-md-6">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt5"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">

                <!-- Moving stuff -->
                <ul class="jak_content_move">

                  <?php if (isset($JAK_PAGE_GRID) && is_array($JAK_PAGE_GRID)) foreach ($JAK_PAGE_GRID as $pg) {

                    if ($pg["pluginid"] != 0) {

                      if ($pg["pluginid"] == '9999') { ?>

                        <li class="jakcontent">
                          <div class="text"><?php echo $tl["page"]["p4"]; ?></div>
                          <div class="actions">

                            <input type="hidden" name="corder[]" class="corder" value="<?php echo $pg["orderid"]; ?>"/>
                            <input type="hidden" name="real_id[]" value="<?php echo $pg["id"]; ?>"/>

                          </div>
                        </li>

                      <?php }
                      if ($pg["pluginid"] == '9997' && $JAK_CONTACT_FORM) { ?>

                        <li class="jakcontent">
                          <div class="form-group">
                            <label><?php echo $tl["global_text"]["globaltxt14"]; ?></label>
                            <select name="jak_showcontact" class="form-control selectpicker" data-size="5">
                              <option value="0"<?php if (isset($JAK_FORM_DATA["showcontact"]) && $JAK_FORM_DATA["showcontact"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tl["global_text"]["globaltxt13"]; ?></option>
                              <?php if (isset($JAK_CONTACT_FORMS) && is_array($JAK_CONTACT_FORMS)) foreach ($JAK_CONTACT_FORMS as $cf) { ?>
                                <option value="<?php echo $cf["id"]; ?>"<?php if (isset($JAK_FORM_DATA["showcontact"]) && $cf["id"] == $JAK_FORM_DATA["showcontact"]) { ?> selected="selected"<?php } ?>><?php echo $cf["title"]; ?></option><?php } ?>
                            </select>
                          </div>
                          <div class="actions">

                            <input type="hidden" name="corder[]" class="corder" value="<?php echo $pg["orderid"]; ?>"/>
                            <input type="hidden" name="real_id[]" value="<?php echo $pg["id"]; ?>"/>

                          </div>
                        </li>

                      <?php }
                      if ($pg["pluginid"] == '9998') { ?>

                        <li class="jakcontent">
                          <div class="form-group">
                            <label><?php echo $tl["global_text"]["globaltxt9"]; ?></label>
                            <div class="row">
                              <div class="col-md-6">
                                <select name="jak_shownewsorder" class="form-control selectpicker" data-size="5">
                                  <option value="ASC"<?php if (isset($JAK_FORM_DATA["shownewsorder"]) && $JAK_FORM_DATA["shownewsorder"] == "ASC") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tl["global_text"]["globaltxt10"]; ?></option>
                                  <option value="DESC"<?php if (isset($JAK_FORM_DATA["shownewsorder"]) && $JAK_FORM_DATA["shownewsorder"] == "DESC") { ?> selected="selected"<?php } ?>><?php echo $tl["global_text"]["globaltxt11"]; ?></option>
                                </select>
                              </div>
                              <div class="col-md-6">
                                <select name="jak_shownewsmany" class="form-control selectpicker" data-size="5">
                                  <?php for ($i = 0; $i <= 10; $i++) { ?>
                                    <option value="<?php echo $i ?>"<?php if (isset($JAK_FORM_DATA["shownewsmany"]) && $JAK_FORM_DATA["shownewsmany"] == $i) { ?> selected="selected"<?php } ?>><?php echo $i; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label><?php echo $tl["global_text"]["globaltxt12"]; ?></label>
                            <select name="jak_shownews[]" multiple="multiple" class="form-control">
                              <option
                                value="0"<?php if (isset($JAK_FORM_DATA["shownews"]) && $JAK_FORM_DATA["shownews"] == 0) { ?> selected="selected"<?php } ?>><?php echo $tl["global_text"]["globaltxt13"]; ?></option>
                              <?php if (isset($JAK_GET_NEWS) && is_array($JAK_GET_NEWS)) foreach ($JAK_GET_NEWS as $gn) { ?>
                                <option
                                  value="<?php echo $gn["id"]; ?>"<?php if (isset($JAK_FORM_DATA["shownews"]) && $JAK_FORM_DATA["shownews"] == $gn["id"]) { ?> selected="selected"<?php } ?>><?php echo $gn["title"]; ?></option>
                              <?php } ?>
                            </select>
                          </div>

                          <div class="actions">

                            <input type="hidden" name="corder[]" class="corder" value="<?php echo $pg["orderid"]; ?>"/>
                            <input type="hidden" name="real_id[]" value="<?php echo $pg["id"]; ?>"/>

                          </div>
                        </li>

                      <?php }

                      if (isset($JAK_HOOK_ADMIN_PAGE) && is_array($JAK_HOOK_ADMIN_PAGE)) foreach ($JAK_HOOK_ADMIN_PAGE as $hsp) {

                        eval($hsp["phpcode"]);

                      }

                    }
                  }

                  if (isset($JAK_HOOK_ADMIN_PAGE_NEW) && is_array($JAK_HOOK_ADMIN_PAGE_NEW)) foreach ($JAK_HOOK_ADMIN_PAGE_NEW as $hspn) {

                    include_once APP_PATH . $hspn["phpcode"];

                  }

                  ?>

                </ul>

                <!-- END Moving Stuff -->

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
                <h3 class="box-title"><?php echo $tl["page_box_title"]["pagebt6"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <?php include "sidebar_widget.php"; ?>
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
    </div>
    <input type="hidden" name="jak_oldcatid" value="<?php echo $JAK_FORM_DATA["catid"]; ?>"/>
  </form>

  <script src="js/ace/ace.js" type="text/javascript"></script>
  <script type="text/javascript">

    /* ACE Editor
     ========================================= */
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

    var jsACE = ace.edit("javaeditor");
    jsACE.setTheme("ace/theme/chrome");
    jsACE.session.setMode("ace/mode/html");
    textjs = $("#jak_javascript").val();
    jsACE.session.setValue(textjs);

    var cssACE = ace.edit("csseditor");
    cssACE.setTheme("ace/theme/chrome");
    cssACE.session.setMode("ace/mode/html");
    textcss = $("#jak_css").val();
    cssACE.session.setValue(textcss);

    /* Other config
     ========================================= */
    $(document).ready(function () {

      $("#addCssBlock").click(function () {
        cssACE.insert(insert_cssblock());
      });
      $("#addJavascriptBlock").click(function () {
        jsACE.insert(insert_javascript());
      });

      $("#restorcontent").change(function () {
        if ($(this).val() != 0) {
          if (!confirm('<?php echo $tl["page_notification"]["restore"];?>')) {
            $("#restorcontent").val(0);
            return false;
          } else {
            restoreContent('pageid', <?php echo $page2;?>, <?php echo $jkv["adv_editor"];?>, $(this).val());
          }
        }
      });
    });

    /* Responsive Filemanager
     ========================================= */
    function responsive_filemanager_callback(field_id) {

      if (field_id == "csseditor" || field_id == "javaeditor" || field_id == "htmleditor") {

        // get the path for the ace file
        var acefile = jQuery('#' + field_id).val();

        if (field_id == "csseditor") {
          cssACE.insert('<link rel="stylesheet" href="' + acefile + '" type="text/css" />');
        } else if (field_id == "javaeditor") {
          jsACE.insert('<script src="' + acefile + '"><\/script>');
        } else {
          htmlACE.insert(acefile);
        }
      }
    }

    /* Submit Form
     ========================================= */
    $('form').submit(function () {
      $("#jak_css").val(cssACE.getValue());
      $("#jak_javascript").val(jsACE.getValue());
      <?php if ($jkv["adv_editor"]) { ?>
      $("#jak_editor").val(htmlACE.getValue());
      <?php } ?>
    });
  </script>

<?php include "footer.php"; ?>