<?php include "header.php"; ?>

<?php if ($page2 == "s") { ?>
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
if ($page2 == "e") { ?>
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
          if (isset($errors["e2"])) echo $errors["e2"];
          if (isset($errors["e3"])) echo $errors["e3"];?>',
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
    <ul id="cmsTabNewsS" class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
      <li role="presentation" class="active">
        <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
          <span class="text"><?php echo $tl["news_section_tab"]["newstab"]; ?></span>
        </a>
      </li>
      <li role="presentation" class="next">
        <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
          <span class="text"><?php echo $tl["news_section_tab"]["newstab1"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
          <span class="text"><?php echo $tl["news_section_tab"]["newstab2"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
          <span class="text"><?php echo $tl["news_section_tab"]["newstab3"]; ?></span>
        </a>
      </li>
    </ul>

    <div id="cmsTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
        <div class="row">
          <div class="col-md-7">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["news_box_title"]["newsbt"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["news_box_content"]["newsbc"]; ?></strong></div>
                      <div class="col-md-7"><?php include_once "title_edit.php"; ?></div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["news_box_content"]["newsbc1"]; ?></strong></div>
                      <div class="col-md-7">
                        <textarea name="jak_lcontent" class="form-control" rows="4"><?php echo jak_edit_safe_userpost($JAK_FORM_DATA["content"]); ?></textarea>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["news_box_content"]["newsbc2"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="row">
                          <div class="col-md-6">
                            <select name="jak_shownewsordern" class="form-control selectpicker">
                              <option value="id"<?php if ($JAK_SETTING['shownewswhat'] == "id") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel9"]; ?></option>
                              <option value="title"<?php if ($JAK_SETTING['shownewswhat'] == "title") { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel10"]; ?></option>
                              <option value="time"<?php if ($JAK_SETTING['shownewswhat'] == "time") { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel11"]; ?></option>
                              <option value="hits"<?php if ($JAK_SETTING['shownewswhat'] == "hits") { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel12"]; ?></option>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <select name="jak_shownewsorder" class="form-control selectpicker">
                              <option value="ASC"<?php if ($JAK_SETTING['shownewsorder'] == "ASC") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel13"]; ?></option>
                              <option value="DESC"<?php if ($JAK_SETTING['shownewsorder'] == "DESC") { ?> selected="selected"<?php } ?>><?php echo $tl["selection"]["sel14"]; ?></option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["news_box_content"]["newsbc3"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="form-group no-margin <?php if (isset($errors["e1"])) echo "has-error"; ?>">
                          <input class="form-control" type="text" name="jak_date" value="<?php echo $jkv["newsdateformat"]; ?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["news_box_content"]["newsbc4"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="form-group no-margin <?php if (isset($errors["e3"])) echo "has-error"; ?>">
                          <input class="form-control" type="text" name="jak_time" value="<?php echo $jkv["newstimeformat"]; ?>"/>
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
                <h3 class="box-title"><?php echo $tl["news_box_title"]["newsbt1"]; ?></h3>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-6"><strong><?php echo $tl["news_box_content"]["newsbc5"]; ?></strong></div>
                      <div class="col-md-6 <?php if (isset($errors["e2"])) echo "has-error"; ?>">
                        <select name="jak_mid" class="form-control selectpicker">
                          <option value="2"<?php if ($jkv["newspagemid"] == 2) { ?> selected="selected"<?php } ?>>
                            <?php echo $tl["selection"]["sel1"]; ?>
                          </option>
                          <option value="4"<?php if ($jkv["newspagemid"] == 4) { ?> selected="selected"<?php } ?>>
                            <?php echo $tl["selection"]["sel2"]; ?>
                          </option>
                          <option value="6"<?php if ($jkv["newspagemid"] == 6) { ?> selected="selected"<?php } ?>>
                            <?php echo $tl["selection"]["sel3"]; ?>
                          </option>
                          <option value="8"<?php if ($jkv["newspagemid"] == 8) { ?> selected="selected"<?php } ?>>
                            <?php echo $tl["selection"]["sel4"]; ?>
                          </option>
                          <option value="10"<?php if ($jkv["newspagemid"] == 10) { ?> selected="selected"<?php } ?>>
                            <?php echo $tl["selection"]["sel5"]; ?>
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-6"><strong><?php echo $tl["news_box_content"]["newsbc6"]; ?></strong></div>
                      <div class="col-md-6 <?php if (isset($errors["e3"])) echo "has-error"; ?>">
                        <input class="form-control" type="text" name="jak_item" value="<?php echo $jkv["newspageitem"]; ?>"/>
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
                <h3 class="box-title"><?php echo $tl["news_box_title"]["newsbt2"]; ?></h3>
              </div>
              <div class="box-body">
                <a href="../js/editor/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=csseditor" class="ifManager"><?php echo $tl["global_text"]["globaltxt8"]; ?></a>
                <a href="javascript:;" id="addCssBlock"><?php echo $tl["global_text"]["globaltxt6"]; ?></a><br/>
                <div id="csseditor"></div>
                <textarea name="jak_css" class="form-control hidden" id="jak_css" rows="20"><?php echo $jkv["news_css"]; ?></textarea>
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
                <h3 class="box-title"><?php echo $tl["news_box_title"]["newsbt3"]; ?></h3>
              </div>
              <div class="box-body">
                <a href="../js/editor/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=javaeditor" class="ifManager"><?php echo $tl["global_text"]["globaltxt8"]; ?></a>
                <a href="javascript:;" id="addJavascriptBlock"><?php echo $tl["global_text"]["globaltxt7"]; ?></a><br/>
                <div id="javaeditor"></div>
                <textarea name="jak_javascript" class="form-control hidden" id="jak_javascript" rows="20"><?php echo $jkv["news_javascript"]; ?></textarea>
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
                <h3 class="box-title"><?php echo $tl["news_box_title"]["newsbt4"]; ?></h3>
              </div>
              <div class="box-body">
                <?php include "sidebar_widget.php"; ?>
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

<?php include "footer.php"; ?>