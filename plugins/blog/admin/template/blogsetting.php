<?php include_once APP_PATH . 'admin/template/header.php'; ?>

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
        type: 'success',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

<?php if ($errors) { ?>
  <div class="alert bg-danger fade in">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <?php if (isset($errors["e"])) echo $errors["e"];
    if (isset($errors["e1"])) echo $errors["e1"];
    if (isset($errors["e2"])) echo $errors["e2"];
    if (isset($errors["e3"])) echo $errors["e3"];
    if (isset($errors["e4"])) echo $errors["e4"];
    if (isset($errors["e5"])) echo $errors["e5"];
    if (isset($errors["e6"])) echo $errors["e6"];
    if (isset($errors["e7"])) echo $errors["e7"]; ?>
  </div>
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
    <ul id="cmsTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
      <li role="presentation" class="active">
        <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
          <span class="text"><?php echo $tl["submenu"]["sm10"]; ?></span>
        </a>
      </li>
      <li role="presentation" class="next">
        <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
          <span class="text"><?php echo $tl["general"]["g53"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
          <span class="text"><?php echo $tl["general"]["g100"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
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
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page"]["p"]; ?></strong></div>
                      <div class="col-md-7">
                        <?php include_once APP_PATH . "admin/template/title_edit.php"; ?>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page"]["p5"]; ?></strong></div>
                      <div class="col-md-7">
                        <textarea name="jak_lcontent" class="form-control" rows="4"><?php echo jak_edit_safe_userpost($JAK_FORM_DATA["content"]); ?></textarea>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tlblog["blog"]["d16"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                          <input class="form-control" type="text" name="jak_email" value="<?php echo $jkv["blogemail"]; ?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tlblog["blog"]["d15"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="row">
                          <div class="col-md-6">
                            <select name="jak_showblogordern" class="form-control selectpicker">
                              <option value="id"<?php if ($JAK_SETTING['showblogwhat'] == "id") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tlblog["blog"]["d22"]; ?></option>
                              <option value="title"<?php if ($JAK_SETTING['showblogwhat'] == "title") { ?> selected="selected"<?php } ?>><?php echo $tlblog["blog"]["d8"]; ?></option>
                              <option value="time"<?php if ($JAK_SETTING['showblogwhat'] == "time") { ?> selected="selected"<?php } ?>><?php echo $tlblog["blog"]["d24"]; ?></option>
                              <option value="hits"<?php if ($JAK_SETTING['showblogwhat'] == "hits") { ?> selected="selected"<?php } ?>><?php echo $tlblog["blog"]["d25"]; ?></option>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <select name="jak_showblogorder" class="form-control selectpicker">
                              <option value="ASC"<?php if ($JAK_SETTING['showblogorder'] == "ASC") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tl["general"]["g90"]; ?></option>
                              <option value="DESC"<?php if ($JAK_SETTING['showblogorder'] == "DESC") { ?> selected="selected"<?php } ?>><?php echo $tl["general"]["g91"]; ?></option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["general"]["g58"]; ?></strong></div>
                      <div class="col-md-7">
                        <select name="jak_bloglimit" class="form-control selectpicker">
                          <?php for ($i = 0; $i <= 50; $i++) { ?>
                            <option value="<?php echo $i; ?>"<?php if ($jkv["bloghlimit"] == $i) { ?> selected="selected"<?php } ?>><?php echo $i; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tlblog["blog"]["d14"]; ?></strong></div>
                      <div class="col-md-7">
                        <input type="text" name="jak_maxpost" class="form-control" value="<?php echo $jkv["blogmaxpost"]; ?>"/>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["setting"]["s4"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e3"])) echo " has-error"; ?>">
                          <input type="text" name="jak_date" class="form-control" value="<?php echo $jkv["blogdateformat"]; ?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["setting"]["s5"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e4"])) echo " has-error"; ?>">
                          <input type="text" name="jak_time" class="form-control" value="<?php echo $jkv["blogtimeformat"]; ?>"/>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tlblog["blog"]["d7"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_blogurl" value="1"<?php if ($jkv["blogurl"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_blogurl" value="0"<?php if ($jkv["blogurl"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["general"]["g40"]; ?> / <?php echo $tl["general"]["g41"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e7"])) echo " has-error"; ?>">
                          <input type="text" name="jak_rssitem" class="form-control" value="<?php echo $jkv["blogrss"]; ?>"/>
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
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
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
                            <option value="2"<?php if ($jkv["blogpagemid"] == 2) { ?> selected="selected"<?php } ?>>
                              <?php echo $tl["option"]["o1"]; ?>
                            </option>
                            <option value="4"<?php if ($jkv["blogpagemid"] == 4) { ?> selected="selected"<?php } ?>>
                              <?php echo $tl["option"]["o2"]; ?>
                            </option>
                            <option value="6"<?php if ($jkv["blogpagemid"] == 6) { ?> selected="selected"<?php } ?>>
                              <?php echo $tl["option"]["o3"]; ?>
                            </option>
                            <option value="8"<?php if ($jkv["blogpagemid"] == 8) { ?> selected="selected"<?php } ?>>
                              <?php echo $tl["option"]["o4"]; ?>
                            </option>
                            <option value="10"<?php if ($jkv["blogpagemid"] == 10) { ?> selected="selected"<?php } ?>>
                              <?php echo $tl["option"]["o5"]; ?>
                            </option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-6"><strong><?php echo $tl["setting"]["s12"]; ?></strong></div>
                      <div class="col-md-6">
                        <div class="form-group no-margin<?php if (isset($errors["e5"])) echo " has-error"; ?>">
                          <input type="text" name="jak_item" class="form-control" value="<?php echo $jkv["blogpageitem"]; ?>"/>
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
                <h3 class="box-title"><?php echo $tl["general"]["g53"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <a href="../../../../js/editor/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=csseditor" class="ifManager"><?php echo $tl["general"]["g69"]; ?></a> <a href="javascript:;" id="addCssBlock"><?php echo $tl["general"]["g101"]; ?></a><br/>
                <div id="csseditor"></div>
                <textarea name="jak_css" class="form-control hidden" id="jak_css" rows="20"><?php echo $jkv["blog_css"]; ?></textarea>
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
      <div role="tabpanel" class="tab-pane fade" id="cmsPage3" aria-labelledby="cmsPage3-tab">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["general"]["g100"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <a href="../../../../js/editor/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=javaeditor" class="ifManager"><?php echo $tl["general"]["g69"]; ?></a> <a href="javascript:;" id="addJavascriptBlock"><?php echo $tl["general"]["g102"]; ?></a><br/>
                <div id="javaeditor"></div>
                <textarea name="jak_javascript" class="form-control hidden" id="jak_javascript" rows="20"><?php echo $jkv["blog_javascript"]; ?></textarea>
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
      <div role="tabpanel" class="tab-pane fade" id="cmsPage4" aria-labelledby="cmsPage4-tab">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["general"]["g89"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
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

  <script src="js/ace/ace.js" type="text/javascript"></script>
  <script type="text/javascript">

    /* ACE Editor
     ========================================= */
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
    });

    /* Responsive Filemanager
     ========================================= */
    function responsive_filemanager_callback(field_id) {

      if (field_id == "csseditor" || field_id == "javaeditor") {

        // get the path for the ace file
        var acefile = jQuery('#' + field_id).val();

        if (field_id == "csseditor") {
          cssACE.insert('<link rel="stylesheet" href="' + acefile + '" type="text/css" />');
        } else if (field_id == "javaeditor") {
          jsACE.insert('<script src="' + acefile + '"><\/script>');
        }
      }
    }

    /* Submit Form
     ========================================= */
    $('form').submit(function () {
      $("#jak_css").val(cssACE.getValue());
      $("#jak_javascript").val(jsACE.getValue());
    });
  </script>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>