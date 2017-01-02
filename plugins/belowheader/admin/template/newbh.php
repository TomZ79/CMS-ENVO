<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page3 == "s") { ?>
  <script type="text/javascript">
    setTimeout(function() {
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
<?php } if ($page3 == "e") { ?>
  <script type="text/javascript">
    setTimeout(function() {
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
<?php } ?>

<?php if ($errors) { ?>
  <script type="text/javascript">
    setTimeout(function() {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
            if (isset($errors["e1"])) echo $errors["e1"];
            if (isset($errors["e2"])) echo $errors["e2"];
            if (isset($errors["e3"])) echo $errors["e3"];
            if (isset($errors["e4"])) echo $errors["e4"];?>',
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
    <ul id="cmsTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
      <li role="presentation" class="active">
        <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
          <span class="text"><?php echo $tlbh["bh_section_tab"]["bhtab"]; ?></span>
        </a>
      </li>
      <li role="presentation" class="next">
        <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
          <span class="text"><?php echo $tlbh["bh_section_tab"]["bhtab1"]; ?></span>
        </a>
      </li>
      <li role="presentation">
        <a href="#cmsPage3" role="tab" id="cmsPage3-tab" data-toggle="tab" aria-controls="cmsPage3">
          <span class="text"><?php echo $tlbh["bh_section_tab"]["bhtab2"]; ?></span>
        </a>
      </li>
    </ul>

    <div id="cmsTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
        <div class="row">
          <div class="col-md-6">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tlbh["bh_box_title"]["bhbt"]; ?></h3>
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
                        <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
                          <input class="form-control" type="text" name="jak_title" value="<?php if (isset($_REQUEST["jak_title"])) echo $_REQUEST["jak_title"]; ?>"/>
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
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tlbh["bh_box_title"]["bhbt1"]; ?></h3>
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
                        <select name="jak_pageid[]" multiple="multiple" class="form-control" style="min-height: 330px;">
                          <option value="0"<?php if (isset($_REQUEST["jak_pageid"]) && $_REQUEST["jak_pageid"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tlbh["bh_box_content"]["bhbc1"]; ?></option>

                          <?php if (isset($JAK_PAGES) && is_array($JAK_PAGES)) foreach ($JAK_PAGES as $v) { ?>
                            <option value="<?php echo $v["id"]; ?>"><?php echo $v["title"]; ?></option>
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
                  <?php echo $tl["general"]["g20"]; ?>
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tlbh["bh_box_title"]["bhbt2"]; ?>
                  <a class="cms-help" data-content="<?php echo $tlbh["bh_help"]["bhh1"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tlbh["bh_help"]["bhh"]; ?>">
                    <i class="fa fa-question-circle"></i>
                  </a>
                </h3>
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
                        <select name="jak_permission[]" multiple="multiple" class="form-control">
                          <option value="0"<?php if (isset($_REQUEST["jak_permission"]) && $_REQUEST["jak_permission"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tlbh["bh_box_content"]["bhbc2"]; ?></option>
                          <?php if (isset($JAK_USERGROUP) && is_array($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) { ?>
                            <option value="<?php echo $v["id"]; ?>"<?php if (isset($_REQUEST["jak_permission"]) && $v["id"] == $_REQUEST["jak_permission"]) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
                        </select>
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
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tlbh["bh_box_title"]["bhbt3"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5"><strong><?php echo $tlbh["bh_box_content"]["bhbc3"]; ?></strong></div>
                      <div class="col-md-7">
                        <select name="jak_newsid[]" multiple="multiple" class="form-control">
                          <option value="0"<?php if (isset($_REQUEST["jak_newsid"]) && $_REQUEST["jak_newsid"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tlbh["bh_box_content"]["bhbc1"]; ?></option>

                          <?php if (isset($JAK_NEWS) && is_array($JAK_NEWS)) foreach ($JAK_NEWS as $n) { ?>
                            <option value="<?php echo $n["id"]; ?>"><?php echo $n["title"]; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-7"><strong><?php echo $tlbh["bh_box_content"]["bhbc4"]; ?></strong></div>
                      <div class="col-md-5">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_mainnews" value="1"<?php if (isset($_REQUEST["jak_mainnews"]) && $_REQUEST["jak_mainnews"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_mainnews" value="0"<?php if ((isset($_REQUEST["jak_mainnews"]) && $_REQUEST["jak_mainnews"] == '0') || !isset($_REQUEST["jak_mainnews"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <?php if (JAK_TAGS) { ?>
                    <div class="row-form">
                      <div class="col-md-7"><strong><?php echo $tlbh["bh_box_content"]["bhbc5"]; ?></strong></div>
                      <div class="col-md-5">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_tags" value="1"<?php if (isset($_REQUEST["jak_tags"]) && $_REQUEST["jak_tags"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_tags" value="0"<?php if ((isset($_REQUEST["jak_tags"]) && $_REQUEST["jak_tags"] == '0') || !isset($_REQUEST["jak_tags"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                    <div class="row-form">
                      <div class="col-md-7"><strong><?php echo $tlbh["bh_box_content"]["bhbc6"]; ?></strong></div>
                      <div class="col-md-5">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_search" value="1"<?php if (isset($_REQUEST["jak_search"]) && $_REQUEST["jak_search"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_search" value="0"<?php if ((isset($_REQUEST["jak_search"]) && $_REQUEST["jak_search"] == '0') || !isset($_REQUEST["jak_search"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-7"><strong><?php echo $tlbh["bh_box_content"]["bhbc7"]; ?></strong></div>
                      <div class="col-md-5">
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_sitemap" value="1"<?php if (isset($_REQUEST["jak_sitemap"]) && $_REQUEST["jak_sitemap"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_sitemap" value="0"<?php if ((isset($_REQUEST["jak_sitemap"]) && $_REQUEST["jak_sitemap"] == '0') || !isset($_REQUEST["jak_sitemap"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                          </label>
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
        <?php $tl["title"]["t14"] = $tlbh["bh_box_title"]["bhbt4"]; ?>

        <div class="row">
          <div class="col-md-12">
            <?php include_once APP_PATH . "admin/template/editor_new.php"; ?>
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="cmsPage3" aria-labelledby="cmsPage3-tab">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tlbh["bh_box_title"]["bhbt5"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <table class="table table-striped">
                  <tr>
                    <td>
                      <?php if ($jkv["adv_editor"]) { ?>
                        <div id="cover2">
                          <div class="cover-header">
                            <a href="../js/editor/plugins/filemanager/dialog.php?type=0&editor=mce_0&lang=eng&fldr=&field_id=htmleditor2" class="btn btn-primary btn-xs ifManager" title="Show Filemanager">
                              <i class="fa fa-files-o"></i>
                            </a>
                          </div>
                          <div id="editorContainer2">
                            <div id="htmleditor2"></div>
                          </div>
                        </div>
                        <textarea name="jak_contentb" class="form-control hidden" id="jak_editor2"><?php if (isset($_REQUEST["jak_contentb"])) echo jak_edit_safe_userpost(htmlspecialchars($_REQUEST["jak_contentb"])); ?></textarea>
                      <?php } else { ?>
                        <textarea name="jak_contentb" class="form-control jakEditor" id="jakEditor2" rows="40"><?php if (isset($_REQUEST["jak_contentb"])) echo jak_edit_safe_userpost($_REQUEST["jak_contentb"]); ?></textarea>
                      <?php } ?>
                    </td>
                  </tr>
                </table>
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

<?php if ($jkv["adv_editor"]) { ?>
  <script src="js/ace/ace.js" type="text/javascript"></script>
  <script type="text/javascript">

    /* ACE Editor
     ========================================= */
    // ACE editor 1
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

    // ACE editor 2
    var htmlACE2 = ace.edit("htmleditor2");
    htmlACE2.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
    htmlACE2.session.setUseWrapMode(true);
    htmlACE2.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
    htmlACE2.setOptions({
      // session options
      mode: "ace/mode/html",
      tabSize: <?php echo $jkv["acetabSize"]; ?>,
      useSoftTabs: true,
      highlightActiveLine: <?php echo $jkv["aceactiveline"]; ?>,
      // renderer options
      showInvisibles: <?php echo $jkv["aceinvisible"]; ?>,
      showGutter: <?php echo $jkv["acegutter"]; ?>,
    });

    texthtml2 = $("#htmleditor2").val();
    htmlACE2.session.setValue(texthtml2);

    /* Responsive Filemanager
     ========================================= */
    function responsive_filemanager_callback(field_id) {

      // get the path for the ace file
      var acefile = jQuery('#' + field_id).val();

      if (field_id == "htmleditor") {
        htmlACE.insert(acefile);
      } else if (field_id == "htmleditor2") {
        htmlACE2.insert(acefile);
      }
    }

    /* Submit Form
     ========================================= */
    $('form').submit(function () {
      $("#jak_editor").val(htmlACE.getValue());
      $("#jak_editor2").val(htmlACE2.getValue());
    });

  </script>
<?php } ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>