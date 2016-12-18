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
  <div class="alert bg-danger fade in">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <?php if (isset($errors["e"])) echo $errors["e"];
    if (isset($errors["e1"])) echo $errors["e1"];
    if (isset($errors["e2"])) echo $errors["e2"];
    if (isset($errors["e3"])) echo $errors["e3"];
    if (isset($errors["e4"])) echo $errors["e4"]; ?>
  </div>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tlbh["bh"]["d"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <table class="table table-striped">
              <tr>
                <td>
                  <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
                    <input class="form-control" type="text" name="jak_title" value="<?php if (isset($_REQUEST["jak_title"])) echo $_REQUEST["jak_title"]; ?>"/>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tlbh["bh"]["d2"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <table class="table table-striped">
              <tr>
                <td>

                  <select name="jak_pageid[]" multiple="multiple" class="form-control">

                    <option
                      value="0"<?php if (isset($_REQUEST["jak_pageid"]) && $_REQUEST["jak_pageid"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tl["cform"]["c18"]; ?></option>

                    <?php if (isset($JAK_PAGES) && is_array($JAK_PAGES)) foreach ($JAK_PAGES as $v) { ?>

                      <option value="<?php echo $v["id"]; ?>"><?php echo $v["title"]; ?></option>

                    <?php } ?>
                  </select>

                </td>
              </tr>
            </table>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["general"]["g88"]; ?>
              <a class="cms-help" data-content="<?php echo $tl["help"]["h"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tl["title"]["t21"]; ?>">
                <i class="fa fa-question-circle"></i>
              </a>
            </h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <table class="table table-striped">
              <tr>
                <td>
                  <select name="jak_permission[]" multiple="multiple" class="form-control">
                    <option value="0"<?php if (isset($_REQUEST["jak_permission"]) && $_REQUEST["jak_permission"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tl["general"]["g84"]; ?></option>
                    <?php if (isset($JAK_USERGROUP) && is_array($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) { ?>
                      <option value="<?php echo $v["id"]; ?>"<?php if (isset($_REQUEST["jak_permission"]) && $v["id"] == $_REQUEST["jak_permission"]) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
                  </select>
                </td>
              </tr>
            </table>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>
      </div>
      <div class="col-md-6">

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tlbh["bh"]["d3"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <table class="table table-striped first-column v-text-center">
              <tr>
                <td><?php echo $tl["menu"]["m8"]; ?></td>
                <td>

                  <select name="jak_newsid[]" multiple="multiple" class="form-control">

                    <option value="0"<?php if (isset($_REQUEST["jak_newsid"]) && $_REQUEST["jak_newsid"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tl["cform"]["c18"]; ?></option>

                    <?php if (isset($JAK_NEWS) && is_array($JAK_NEWS)) foreach ($JAK_NEWS as $n) { ?>

                      <option value="<?php echo $n["id"]; ?>"><?php echo $n["title"]; ?></option>

                    <?php } ?>
                  </select>

                </td>
              </tr>
              <tr>
                <td><?php echo $tlbh["bh"]["d4"]; ?></td>
                <td>
                  <div class="radio">
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_mainnews" value="1"<?php if (isset($_REQUEST["jak_mainnews"]) && $_REQUEST["jak_mainnews"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                    </label>
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_mainnews" value="0"<?php if ((isset($_REQUEST["jak_mainnews"]) && $_REQUEST["jak_mainnews"] == '0') || !isset($_REQUEST["jak_mainnews"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                    </label>
                  </div>
                </td>
              </tr>
              <?php if (JAK_TAGS) { ?>
                <tr>
                  <td><?php echo $tlbh["bh"]["d5"]; ?></td>
                  <td>
                    <div class="radio">
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_tags" value="1"<?php if (isset($_REQUEST["jak_tags"]) && $_REQUEST["jak_tags"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                      </label>
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_tags" value="0"<?php if ((isset($_REQUEST["jak_tags"]) && $_REQUEST["jak_tags"] == '0') || !isset($_REQUEST["jak_tags"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                      </label>
                    </div>
                  </td>
                </tr>
              <?php } ?>
              <tr>
                <td><?php echo $tlbh["bh"]["d6"]; ?></td>
                <td>
                  <div class="radio">
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_search" value="1"<?php if (isset($_REQUEST["jak_search"]) && $_REQUEST["jak_search"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                    </label>
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_search" value="0"<?php if ((isset($_REQUEST["jak_search"]) && $_REQUEST["jak_search"] == '0') || !isset($_REQUEST["jak_search"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td><?php echo $tlbh["bh"]["d7"]; ?></td>
                <td>
                  <div class="radio">
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_sitemap" value="1"<?php if (isset($_REQUEST["jak_sitemap"]) && $_REQUEST["jak_sitemap"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                    </label>
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_sitemap" value="0"<?php if ((isset($_REQUEST["jak_sitemap"]) && $_REQUEST["jak_sitemap"] == '0') || !isset($_REQUEST["jak_sitemap"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                    </label>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>

      </div>
    </div>

    <?php $tl["title"]["t14"] = $tlbh["bh"]["d1"]; ?>

    <?php include_once APP_PATH . "admin/template/editor_new.php"; ?>

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $tlbh["bh"]["d8"]; ?></h3>
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
                <p>
                  <a href="../js/editor/plugins/filemanager/dialog.php?type=0&editor=mce_0&lang=eng&fldr=&field_id=htmleditor2" class="btn btn-default btn-xs ifManager">
                    <i class="fa fa-files-o"></i>
                  </a>
                </p>
                <div id="htmleditor2"></div>
                <textarea name="jak_contentb" class="form-control hidden" id="jak_editor2"><?php if (isset($_REQUEST["jak_contentb"])) echo jak_edit_safe_userpost(htmlspecialchars($_REQUEST["jak_contentb"])); ?></textarea>
              <?php } else { ?>
                <textarea name="jak_contentb" class="form-control jakEditor" id="jakEditor2" rows="40"><?php if (isset($_REQUEST["jak_contentb"])) echo jak_edit_safe_userpost($_REQUEST["jak_contentb"]); ?></textarea>
              <?php } ?>
            </td>
          </tr>
        </table>
      </div>
      <div class="box-footer">
        <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
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