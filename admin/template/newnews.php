<?php include "header.php"; ?>

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
          if (isset($errors["e2"])) echo $errors["e2"]; ?>',
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
      <li class="active"><a href="#style_tabs-1"><?php echo $tl["page"]["p4"]; ?></a></li>
      <li><a href="#style_tabs-2"><?php echo $tl["general"]["g53"]; ?></a></li>
      <li><a href="#style_tabs-3"><?php echo $tl["general"]["g100"]; ?></a></li>
      <li><a href="#style_tabs-4"><?php echo $tl["general"]["g121"]; ?></a></li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane active" id="style_tabs-1">
        <div class="row">
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["title"]["t13"]; ?></h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped first-column v-text-center">
                  <tr>
                    <td><?php echo $tl["page"]["p"]; ?></td>
                    <td>
                      <?php include_once "title_new.php"; ?>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["page"]["p3"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_showtitle" value="1"<?php if (isset($_REQUEST["showtitle"]) && $JAK_FORM_DATA["showtitle"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_showtitle" value="0"<?php if ((isset($_REQUEST["showtitle"]) && $JAK_FORM_DATA["showtitle"] == '0') || !isset($_REQUEST["showtitle"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["page"]["p8"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_showdate" value="1"<?php if (isset($_REQUEST["jak_showdate"]) && $_REQUEST["jak_showdate"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_showdate" value="0"<?php if ((isset($_REQUEST["jak_showdate"]) && $_REQUEST["jak_showdate"] == '0') || !isset($_REQUEST["jak_showdate"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["general"]["g134"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_showhits" value="1"<?php if (isset($_REQUEST["jak_showhits"]) && $_REQUEST["jak_showhits"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_showhits" value="0"<?php if ((isset($_REQUEST["jak_showhits"]) && $_REQUEST["jak_showhits"] == '0') || !isset($_REQUEST["jak_showhits"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
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
                          <input type="radio" name="jak_social" value="0"<?php if ((isset($_REQUEST["jak_social"]) && $_REQUEST["jak_social"] == '0') || !isset($_REQUEST["jak_social"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
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
                          <input type="radio" name="jak_vote" value="0"<?php if ((isset($_REQUEST["jak_vote"]) && $_REQUEST["jak_vote"] == '0') || !isset($_REQUEST["jak_vote"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["general"]["g124"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_sidebar" value="1"<?php if (isset($_REQUEST["jak_sidebar"]) && $_REQUEST["jak_sidebar"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g125"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_sidebar" value="0"<?php if ((isset($_REQUEST["jak_sidebar"]) && $_REQUEST["jak_sidebar"] == '0') || !isset($_REQUEST["jak_sidebar"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g126"]; ?>
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
                          <a class="btn btn-info ifManager" type="button" href="../js/editor/plugins/filemanager/dialog.php?type=1&subfolder=&editor=mce_0&lang=eng&fldr=&field_id=jak_img"><?php echo $tl["general"]["g69"]; ?></a>
                        </span>
                      </div><!-- /input-group -->
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
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["general"]["g88"]; ?> <a class="cms-help"
                                                                              data-content="<?php echo $tl["help"]["h"]; ?>"
                                                                              href="javascript:void(0)"
                                                                              data-original-title="<?php echo $tl["title"]["t21"]; ?>"><i
                      class="fa fa-question-circle"></i></a></h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped">
                  <tr>
                    <td><select name="jak_permission[]" multiple="multiple" class="form-control">
                        <option
                          value="0"<?php if (isset($_REQUEST["jak_permission"]) && in_array(0, $_REQUEST["jak_permission"])) { ?> selected="selected"<?php } ?>><?php echo $tl["general"]["g84"]; ?></option>
                        <?php if (isset($JAK_USERGROUP) && is_array($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) { ?>
                          <option value="<?php echo $v["id"]; ?>"<?php if (isset($_REQUEST["jak_permission"]) && in_array($v["id"], $_REQUEST["jak_permission"])) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
                      </select></td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save"
                        class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>

            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["news"]["n4"]; ?></h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped v-text-center">
                  <tr>
                    <td><?php echo $tl["news"]["n2"]; ?></td>
                    <td>
                      <div class="form-group no-margin<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                        <input type="text" class="form-control" name="jak_datefrom" id="datepickerFrom" value="<?php if (isset($_REQUEST["jak_datefrom"])) echo $_REQUEST["jak_datefrom"]; ?>" readonly />
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["news"]["n3"]; ?></td>
                    <td>
                      <div class="form-group no-margin<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                        <input type="text" class="form-control" name="jak_dateto" id="datepickerTo" value="<?php if (isset($_REQUEST["jak_dateto"])) echo $_REQUEST["jak_dateto"]; ?>" readonly />
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>

            <?php if (JAK_TAGS) { ?>
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $tl["title"]["t31"]; ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-striped">
                    <tr>
                      <td>
                        <input type="text" name="jak_tags" id="jak_tags" class="form-control tags" value="<?php if (isset($_REQUEST["jak_tags"])) echo $_REQUEST["jak_tags"]; ?>"/></td>
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

        <?php include_once "editor_new.php"; ?>

      </div>

      <div class="tab-pane" id="style_tabs-2">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["general"]["g53"]; ?></h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <a href="../js/editor/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=csseditor"
               class="ifManager"><?php echo $tl["general"]["g69"]; ?></a> <a href="javascript:;"
                                                                             id="addCssBlock"><?php echo $tl["general"]["g101"]; ?></a><br/>
            <div id="csseditor"></div>
            <textarea name="jak_css" id="jak_css"
                      class="hidden"><?php if (isset($_REQUEST["jak_css"])) echo $_REQUEST["jak_css"]; ?></textarea>
          </div>
          <div class="box-footer">
            <button type="submit" name="save"
                    class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="style_tabs-3">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["general"]["g100"]; ?></h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <a href="../js/editor/plugins/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&fldr=&field_id=javaeditor"
               class="ifManager"><?php echo $tl["general"]["g69"]; ?></a> <a href="javascript:;"
                                                                             id="addJavascriptBlock"><?php echo $tl["general"]["g102"]; ?></a><br/>
            <div id="javaeditor"></div>
            <textarea name="jak_javascript" id="jak_javascript"
                      class="hidden"><?php if (isset($_REQUEST["jak_javascript"])) echo $_REQUEST["jak_javascript"]; ?></textarea>
          </div>
          <div class="box-footer">
            <button type="submit" name="save"
                    class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="style_tabs-4">
        <div class="row">
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["page"]["p4"]; ?></h3>
              </div><!-- /.box-header -->
              <div class="box-body">

                <!-- Moving stuff -->
                <ul class="jak_content_move">

                  <?php if (isset($JAK_CONTACT_FORMS) && is_array($JAK_CONTACT_FORMS)) { ?>

                    <li class="jakcontent">
                      <div class="form-group">
                        <label><?php echo $tl["page"]["p7"]; ?></label>
                        <select name="jak_showcontact" class="form-control selectpicker" data-size="5">
                          <option
                            value="0"<?php if (isset($_REQUEST["jak_showcontact"]) && $_REQUEST["jak_showcontact"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tl["cform"]["c18"]; ?></option>
                          <?php foreach ($JAK_CONTACT_FORMS as $cf) { ?>
                            <option value="<?php echo $cf["id"]; ?>"<?php if (isset($_REQUEST["jak_showcontact"]) && $cf["id"] == $_REQUEST["jak_showcontact"]) { ?> selected="selected"<?php } ?>><?php echo $cf["title"]; ?></option><?php } ?>
                        </select>
                      </div>
                      <div class="actions">

                        <input type="hidden" name="corder_new[]" class="corder" value="1"/> <input type="hidden"
                                                                                                   name="real_plugin_id[]"
                                                                                                   value="9997"/>

                      </div>
                    </li>

                  <?php }
                  if (isset($JAK_HOOK_ADMIN_PAGE_NEW) && is_array($JAK_HOOK_ADMIN_PAGE_NEW)) {
                    foreach ($JAK_HOOK_ADMIN_PAGE_NEW as $hspn) {
                      include_once APP_PATH . $hspn["phpcode"];
                    }
                  } ?>

                </ul>

                <!-- END Moving Stuff -->

              </div>
              <div class="box-footer">
                <button type="submit" name="save"
                        class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>

          </div>
          <div class="col-md-6">

            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["general"]["g89"]; ?></h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <?php include "sidebar_widget_new.php"; ?>
              </div>
              <div class="box-footer">
                <button type="submit" name="save"
                        class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
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
      $('#jak_tags').tagsInput({
        defaultText: '<?php echo $tl["general"]["g83"];?>',
        taglimit: 10
      });
      $('#jak_tags_tag').alphanumeric({nocaps: true});

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

      /* DateTimePicker
       ========================================= */
      $('#datepickerFrom').datetimepicker({
        // Language
        locale: '<?php echo $site_language;?>',
        // Date-Time format
        format: 'YYYY-MM-DD HH:mm',
        // Show Button
        showTodayButton: true,
        showClear: true,
        // Other
        ignoreReadonly: true,
        keepInvalid: true,
        minDate: moment()
      });

      $('#datepickerTo').datetimepicker({
        // Language
        locale: '<?php echo $site_language;?>',
        // Date-Time format
        format: 'YYYY-MM-DD HH:mm',
        // Show Button
        showTodayButton: true,
        showClear: true,
        // Other
        ignoreReadonly: true,
        minDate: moment(),
        useCurrent: false //Important! See issue #1075
      });

      $("#datepickerFrom").on("dp.change", function (e) {
        $('#datepickerTo').data("DateTimePicker").minDate(e.date);
      });
      $("#datepickerTo").on("dp.change", function (e) {
        $('#datepickerFrom').data("DateTimePicker").maxDate(e.date);
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