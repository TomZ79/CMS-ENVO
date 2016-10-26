<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page2 == "e") { ?>
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
          if (isset($errors["e3"])) echo $errors["e3"]; ?>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <ul class="nav nav-tabs" id="cmsTab">
      <li class="active"><a href="#faqArt1"><?php echo $tl["page"]["p4"]; ?></a></li>
      <li><a href="#faqArt2"><?php echo $tl["general"]["g89"]; ?></a></li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane active" id="faqArt1">
        <div class="row">
          <div class="col-md-7">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["title"]["t13"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped first-column v-text-center">
                  <tr>
                    <td><?php echo $tlf["faq"]["d8"]; ?></td>
                    <td>
                      <?php include_once APP_PATH . "admin/template/title_new.php"; ?>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["page"]["p3"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_showtitle" value="1"<?php if (isset($_REQUEST["jak_showtitle"]) && $_REQUEST["jak_showtitle"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_showtitle" value="0"<?php if (isset($_REQUEST["jak_showtitle"]) && $_REQUEST["jak_showtitle"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <?php if (isset($JAK_CONTACT_FORMS) && is_array($JAK_CONTACT_FORMS)) { ?>
                    <tr>
                      <td><?php echo $tl["page"]["p7"]; ?></td>
                      <td>
                        <select name="jak_showcontact" class="form-control selectpicker">
                          <option value="0"<?php if (isset($_REQUEST["jak_showcontact"]) && $_REQUEST["jak_showcontact"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tl["cform"]["c18"]; ?></option>
                          <?php foreach ($JAK_CONTACT_FORMS as $cf) { ?>
                            <option value="<?php echo $cf["id"]; ?>"<?php if (isset($_REQUEST["jak_showcontact"]) && $cf["id"] == $_REQUEST["jak_showcontact"]) { ?> selected="selected"<?php } ?>><?php echo $cf["title"]; ?></option><?php } ?>
                        </select>
                      </td>
                    </tr>
                  <?php } ?>
                  <tr>
                    <td><?php echo $tl["page"]["p8"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_showdate" value="1"<?php if (isset($_REQUEST["jak_showdate"]) && $_REQUEST["jak_showdate"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_showdate" value="0"<?php if (isset($_REQUEST["jak_showdate"]) && $_REQUEST["jak_showdate"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tlf["faq"]["d19"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_comment" value="1"<?php if (isset($_REQUEST["jak_comment"]) && $_REQUEST["jak_comment"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_comment" value="0"<?php if (isset($_REQUEST["jak_comment"]) && $_REQUEST["jak_comment"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["general"]["g85"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_vote" value="1"<?php if (isset($_REQUEST["jak_vote"]) && $_REQUEST["jak_vote"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_vote" value="0"<?php if (isset($_REQUEST["jak_vote"]) && $_REQUEST["jak_vote"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["page"]["p9"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_social" value="1"<?php if (isset($_REQUEST["jak_social"]) && $_REQUEST["jak_social"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_social" value="0"<?php if (isset($_REQUEST["jak_social"]) && $_REQUEST["jak_social"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["general"]["g87"]; ?></td>
                    <td>
                      <div class="input-group">
                        <input type="text" name="jak_img" id="jak_img" class="form-control" value="<?php if (isset($_REQUEST["jak_img"])) echo $_REQUEST["jak_img"]; ?>"/>
		<span class="input-group-btn">
		  <a class="btn btn-info ifManager" type="button"
         href="../js/editor/plugins/filemanager/dialog.php?type=1&subfolder=&editor=mce_0&lang=eng&fldr=&field_id=jak_img"><?php echo $tl["general"]["g69"]; ?></a>
		</span>
                      </div><!-- /input-group -->
                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save"
                        class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["title"]["t12"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">

                <table class="table table-striped">
                  <tr>
                    <td><?php echo $tl["page"]["p1"]; ?></td>
                    <td>
                      <select name="jak_catid" class="form-control selectpicker">
                        <option value="0"<?php if (!$page1) { ?> selected="selected"<?php } ?>><?php echo $tl["general"]["g24"]; ?></option>
                        <?php if (isset($JAK_CAT) && is_array($JAK_CAT)) foreach ($JAK_CAT as $v) { ?>

                          <option value="<?php echo $v["id"]; ?>"<?php if ($v["id"] == $page2) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option>

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
            <?php if (JAK_TAGS) { ?>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $tl["title"]["t31"]; ?></h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-striped v-text-center">
                    <tr>
                      <td>Choose tags from predefined list</td>
                      <td>
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
                      </td>
                    </tr>
                    <tr>
                      <td>Choose tags from list</td>
                      <td>

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
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <input type="text" name="jak_tags" id="jak_tags" class="tags form-control" value="<?php if (isset($_REQUEST["jak_tags"])) echo $_REQUEST["jak_tags"]; ?>" data-role="tagsinput"/>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="box-footer">
                  <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>

        <?php include_once APP_PATH . "admin/template/editor_new.php"; ?>

      </div>
      <div class="tab-pane" id="faqArt2">

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["general"]["g89"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <?php include APP_PATH . 'admin/template/sidebar_widget_new.php'; ?>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>

      </div>
    </div>
  </form>

<?php if ($jkv["adv_editor"]) { ?>
  <script src="js/ace/ace.js" type="text/javascript"></script>
<?php } ?>
  <script type="text/javascript">

    // ACE editor
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

    $(document).ready(function () {

      /* Bootstrap Tab Activation */
      $('#cmsTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
      });

    });

    // Responsive Filemanager
    <?php if ($jkv["adv_editor"]) { ?>
    function responsive_filemanager_callback(field_id) {

      if (field_id == "htmleditor") {
        // get the path for the ace file
        var acefile = jQuery('#' + field_id).val();
        htmlACE.insert(acefile);
      }
    }

    // Submit Form
    $('form').submit(function () {
      $("#jak_editor").val(htmlACE.getValue());
    });
    <?php } ?>
  </script>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>