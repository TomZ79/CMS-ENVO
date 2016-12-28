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
    <div class="savebutton">
      <button type="submit" name="save" class="btn btn-primary button">
        <i class="fa fa-save margin-right-5"></i>
        <?php echo $tl["general"]["g20"]; ?> !!
      </button>
    </div>

    <!-- Form Content -->
    <ul class="nav nav-tabs" id="cmsTab">
      <li class="active"><a href="#cmsPage1"><?php echo $tl["page"]["p4"]; ?></a></li>
      <li><a href="#cmsPage2"><?php echo $tl["general"]["g53"]; ?></a></li>
      <li><a href="#cmsPage3"><?php echo $tl["general"]["g100"]; ?></a></li>
      <li><a href="#cmsPage4"><?php echo $tl["general"]["g121"]; ?></a></li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane active" id="cmsPage1">
        <div class="row">
          <div class="col-md-7">
            <div class="box box-primary">
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
                      <div class="col-md-7"><?php include_once "title_edit.php"; ?></div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["page"]["p5"]; ?></strong></div>
                      <div class="col-md-7">
                        <textarea name="jak_lcontent" class="form-control" rows="4"><?php echo jak_edit_safe_userpost($JAK_FORM_DATA["content"]); ?></textarea>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["setting_cmd"]["s61"]; ?></strong></div>
                      <div class="col-md-7">
                        <div class="row">
                          <div class="col-md-6">
                            <select name="jak_shownewsordern" class="form-control selectpicker">
                              <option value="id"<?php if ($JAK_SETTING['shownewswhat'] == "id") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tl["setting_cmd"]["s57"]; ?></option>
                              <option value="title"<?php if ($JAK_SETTING['shownewswhat'] == "title") { ?> selected="selected"<?php } ?>><?php echo $tl["setting_cmd"]["s58"]; ?></option>
                              <option value="time"<?php if ($JAK_SETTING['shownewswhat'] == "time") { ?> selected="selected"<?php } ?>><?php echo $tl["setting_cmd"]["s59"]; ?></option>
                              <option value="hits"<?php if ($JAK_SETTING['shownewswhat'] == "hits") { ?> selected="selected"<?php } ?>><?php echo $tl["setting_cmd"]["s60"]; ?></option>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <select name="jak_shownewsorder" class="form-control selectpicker">
                              <option value="ASC"<?php if ($JAK_SETTING['shownewsorder'] == "ASC") { ?> selected="selected"<?php } else { ?> selected="selected"<?php } ?>><?php echo $tl["general"]["g90"]; ?></option>
                              <option value="DESC"<?php if ($JAK_SETTING['shownewsorder'] == "DESC") { ?> selected="selected"<?php } ?>><?php echo $tl["general"]["g91"]; ?></option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["setting"]["s4"]; ?></strong></div>
                      <div class="col-md-7 <?php if (isset($errors["e1"])) echo "has-error"; ?>">
                        <input class="form-control" type="text" name="jak_date" value="<?php echo $jkv["newsdateformat"]; ?>"/></div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["setting"]["s5"]; ?></strong></div>
                      <div class="col-md-7" <?php if (isset($errors["e3"])) echo "has-error"; ?>>
                        <input class="form-control" type="text" name="jak_time" value="<?php echo $jkv["newstimeformat"]; ?>"/>
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
            <div class="box box-primary">
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
                      <div class="col-md-5"><strong><?php echo $tl["setting"]["s11"]; ?></strong></div>
                      <div class="col-md-7 <?php if (isset($errors["e2"])) echo "has-error"; ?>">
                        <select name="jak_mid" class="form-control selectpicker">
                          <option value="2"<?php if ($jkv["newspagemid"] == 2) { ?> selected="selected"<?php } ?>>
                            <?php echo $tl["option"]["o1"]; ?>
                          </option>
                          <option value="4"<?php if ($jkv["newspagemid"] == 4) { ?> selected="selected"<?php } ?>>
                            <?php echo $tl["option"]["o2"]; ?>
                          </option>
                          <option value="6"<?php if ($jkv["newspagemid"] == 6) { ?> selected="selected"<?php } ?>>
                            <?php echo $tl["option"]["o3"]; ?>
                          </option>
                          <option value="8"<?php if ($jkv["newspagemid"] == 8) { ?> selected="selected"<?php } ?>>
                            <?php echo $tl["option"]["o4"]; ?>
                          </option>
                          <option value="10"<?php if ($jkv["newspagemid"] == 10) { ?> selected="selected"<?php } ?>>
                            <?php echo $tl["option"]["o5"]; ?>
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tl["setting"]["s12"]; ?></strong></div>
                      <div class="col-md-7 <?php if (isset($errors["e3"])) echo "has-error"; ?>">
                        <input class="form-control" type="text" name="jak_item" value="<?php echo $jkv["newspageitem"]; ?>"/>
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
      <div class="tab-pane" id="cmsPage2">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["general"]["g53"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <a href="../js/editor/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=csseditor" class="ifManager"><?php echo $tl["general"]["g69"]; ?></a>
            <a href="javascript:;" id="addCssBlock"><?php echo $tl["general"]["g101"]; ?></a><br/>
            <div id="csseditor"></div>
            <textarea name="jak_css" class="form-control hidden" id="jak_css" rows="20"><?php echo $jkv["news_css"]; ?></textarea>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right">
              <i class="fa fa-save margin-right-5"></i>
              <?php echo $tl["general"]["g20"]; ?>
            </button>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="cmsPage3">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["general"]["g100"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <a href="../js/editor/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=javaeditor" class="ifManager"><?php echo $tl["general"]["g69"]; ?></a>
            <a href="javascript:;" id="addJavascriptBlock"><?php echo $tl["general"]["g102"]; ?></a><br/>
            <div id="javaeditor"></div>
            <textarea name="jak_javascript" class="form-control hidden" id="jak_javascript" rows="20"><?php echo $jkv["news_javascript"]; ?></textarea>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right">
              <i class="fa fa-save margin-right-5"></i>
              <?php echo $tl["general"]["g20"]; ?>
            </button>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="cmsPage4">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["general"]["g89"]; ?></h3>
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
              <?php echo $tl["general"]["g20"]; ?>
            </button>
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

      /* Bootstrap Tab Activation */
      $('#cmsTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
      });

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

<?php include "footer.php"; ?>