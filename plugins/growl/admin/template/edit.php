<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page3 == "s") { ?>
  <script type="text/javascript">
    // Notification
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
    // Notification
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
<?php } if ($errors) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function() {
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
      <li class="active"><a href="#cmsPage1"><?php echo $tl["general"]["g5"]; ?></a></li>
      <li><a href="#cmsPage2"><?php echo $tl["title"]["t14"]; ?></a></li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane active" id="cmsPage1">
        <div class="row">
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["title"]["t13"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <table class="table table-striped v-text-center">
                  <tr>
                    <td><?php echo $tlgwl["growl"]["d"]; ?></td>
                    <td>
                      <?php include_once APP_PATH . "admin/template/title_edit.php"; ?>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["general"]["g87"]; ?></td>
                    <td>
                      <div class="input-group">
                        <input type="text" name="jak_img" id="jak_img" class="form-control" value="<?php echo $JAK_FORM_DATA["previmg"]; ?>"/>
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

            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tlgwl["growl"]["d9"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <table class="table table-striped v-text-center">
                  <tr>
                    <td><?php echo $tlgwl["growl"]["d8"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_all" value="1"<?php if ($JAK_FORM_DATA["everywhere"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_all" value="0"<?php if ($JAK_FORM_DATA["everywhere"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tlgwl["growl"]["d10"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_cookies" value="1"<?php if ($JAK_FORM_DATA["remember"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_cookies" value="0"<?php if ($JAK_FORM_DATA["remember"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tlgwl["growl"]["d22"]; ?></td>
                    <td>
                      <select name="jak_cookiestime" class="form-control selectpicker" data-live-search="true" data-size="5">
                        <?php for ($i = 1; $i <= 99; $i++) { ?>
                          <option value="<?php echo $i ?>"<?php if ($JAK_FORM_DATA["remembertime"] == $i) { ?> selected="selected"<?php } ?>><?php echo $i; ?></option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr>
                  <tr class="disablerow">
                    <td><?php echo $tlgwl["growl"]["d11"]; ?></td>
                    <td>
                      <select name="jak_dur" class="form-control selectpicker" data-size="5">
                        <option value="3000"<?php if ($JAK_FORM_DATA["duration"] == 3000) { ?> selected="selected"<?php } ?>>
                          3
                        </option>
                        <option value="4000"<?php if ($JAK_FORM_DATA["duration"] == 4000) { ?> selected="selected"<?php } ?>>
                          4
                        </option>
                        <option value="5000"<?php if ($JAK_FORM_DATA["duration"] == 5000) { ?> selected="selected"<?php } ?>>
                          5
                        </option>
                        <option value="6000"<?php if ($JAK_FORM_DATA["duration"] == 6000) { ?> selected="selected"<?php } ?>>
                          6
                        </option>
                        <option value="7000"<?php if ($JAK_FORM_DATA["duration"] == 7000) { ?> selected="selected"<?php } ?>>
                          7
                        </option>
                        <option value="8000"<?php if ($JAK_FORM_DATA["duration"] == 8000) { ?> selected="selected"<?php } ?>>
                          8
                        </option>
                        <option value="9000"<?php if ($JAK_FORM_DATA["duration"] == 9000) { ?> selected="selected"<?php } ?>>
                          9
                        </option>
                      </select></td>
                  </tr>
                  <tr>
                    <td><?php echo $tlgwl["growl"]["d12"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_sticky" value="1"<?php if ($JAK_FORM_DATA["sticky"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_sticky" value="0"<?php if ($JAK_FORM_DATA["sticky"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tlgwl["growl"]["d13"]; ?></td>
                    <td>
                      <select name="jak_class" class="form-control selectpicker" data-size="5">
                        <option value="top-right"<?php if ($JAK_FORM_DATA["position"] == "top-right") { ?> selected="selected"<?php } ?>><?php echo $tlgwl["growl"]["d16"]; ?></option>
                        <option value="top-left"<?php if ($JAK_FORM_DATA["position"] == "top-left") { ?> selected="selected"<?php } ?>><?php echo $tlgwl["growl"]["d14"]; ?></option>
                        <option value="center"<?php if ($JAK_FORM_DATA["position"] == "center") { ?> selected="selected"<?php } ?>><?php echo $tlgwl["growl"]["d15"]; ?></option>
                        <option value="bottom-left"<?php if ($JAK_FORM_DATA["position"] == "bottom-left") { ?> selected="selected"<?php } ?>><?php echo $tlgwl["growl"]["d17"]; ?></option>
                        <option value="bottom-right"<?php if ($JAK_FORM_DATA["position"] == "bottom-right") { ?> selected="selected"<?php } ?>><?php echo $tlgwl["growl"]["d18"]; ?></option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tlgwl["growl"]["d19"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_color" value="1"<?php if ($JAK_FORM_DATA["color"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tlgwl["growl"]["d20"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_color" value="0"<?php if ($JAK_FORM_DATA["color"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tlgwl["growl"]["d21"]; ?>
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

            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["news"]["n4"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <table class="table table-striped v-text-center">
                  <tr>
                    <td><?php echo $tlgwl["growl"]["d23"]; ?></td>
                    <td>

                      <div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">
                        <input type="text" name="jak_datefrom" id="datepickerFrom" class="form-control" value="<?php if ($JAK_FORM_DATA["startdate"]) echo date("Y-m-d H:i", $JAK_FORM_DATA["startdate"]); ?>" readonly />
                      </div>

                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tlgwl["growl"]["d24"]; ?></td>
                    <td>

                      <div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?> no-margin">
                        <input type="text" name="jak_dateto" id="datepickerTo" class="form-control" value="<?php if ($JAK_FORM_DATA["enddate"]) echo date("Y-m-d H:i", $JAK_FORM_DATA["enddate"]); ?>" readonly />
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
          <div class="col-md-6">

            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tlgwl["growl"]["d2"]; ?>
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

                      <select name="jak_pageid[]" multiple="multiple" class="form-control">

                        <option value="0"<?php if ($JAK_FORM_DATA["pageid"] == 0) { ?> selected="selected"<?php } ?>><?php echo $tl["cform"]["c18"]; ?></option>
                        <?php if (isset($JAK_PAGES) && is_array($JAK_PAGES)) foreach ($JAK_PAGES as $z) { ?>

                          <option value="<?php echo $z["id"]; ?>"<?php if (in_array($z["id"], explode(',', $JAK_FORM_DATA["pageid"]))) { ?> selected="selected"<?php } ?>><?php echo $z["title"]; ?></option>

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

            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tlgwl["growl"]["d3"]; ?>
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
                    <td colspan="2">

                      <select name="jak_newsid[]" multiple="multiple" class="form-control">

                        <option value="0"<?php if ($JAK_FORM_DATA["newsid"] == 0) { ?> selected="selected"<?php } ?>><?php echo $tl["cform"]["c18"]; ?></option>

                        <?php if (isset($JAK_NEWS) && is_array($JAK_NEWS)) foreach ($JAK_NEWS as $n) { ?>
                          <option value="<?php echo $n["id"]; ?>"<?php if (in_array($n["id"], explode(',', $JAK_FORM_DATA["newsid"]))) { ?> selected="selected"<?php } ?>><?php echo $n["title"]; ?></option>
                        <?php } ?>

                      </select>

                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tlgwl["growl"]["d4"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_mainnews" value="1"<?php if ($JAK_FORM_DATA["newsmain"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_mainnews" value="0"<?php if ($JAK_FORM_DATA["newsmain"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <?php if (JAK_TAGS) { ?>
                    <tr>
                      <td><?php echo $tlgwl["growl"]["d5"]; ?></td>
                      <td>
                        <div class="radio">
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_tags" value="1"<?php if ($JAK_FORM_DATA["tags"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                          </label>
                          <label class="checkbox-inline">
                            <input type="radio" name="jak_tags" value="0"<?php if ($JAK_FORM_DATA["tags"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                          </label>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                  <tr>
                    <td><?php echo $tlgwl["growl"]["d6"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_search" value="1"<?php if ($JAK_FORM_DATA["search"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_search" value="0"<?php if ($JAK_FORM_DATA["search"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tlgwl["growl"]["d7"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_sitemap" value="1"<?php if ($JAK_FORM_DATA["sitemap"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_sitemap" value="0"<?php if ($JAK_FORM_DATA["sitemap"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
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
                    <td><?php echo $tl["general"]["g88"]; ?></td>
                    <td>
                      <select name="jak_permission[]" multiple="multiple" class="form-control">
                        <option value="0"<?php if ($JAK_FORM_DATA["permission"] == '0') { ?> selected="selected"<?php } ?>><?php echo $tl["general"]["g84"]; ?></option>
                        <?php if (isset($JAK_USERGROUP) && is_array($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) { ?>
                          <option value="<?php echo $v["id"]; ?>"<?php if (in_array($v["id"], explode(',', $JAK_FORM_DATA["permission"]))) { ?> selected="selected"<?php } ?>><?php echo $v["name"]; ?></option><?php } ?>
                      </select></td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane" id="cmsPage2">
        <?php include_once APP_PATH . "admin/template/editor_edit.php"; ?>
      </div>
    </div>

  </form>

<?php if ($jkv["adv_editor"]) { ?>
  <script src="js/ace/ace.js" type="text/javascript"></script>
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

    // Responsive Filemanager
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
  </script>
<?php } ?>

  <script type="text/javascript">
    $(document).ready(function () {
      /* Sticky active
       ========================================= */
      var $stickyName= 'input[name="jak_sticky"]';
      var $stickyVal = ($('input[name="jak_sticky"]:checked').val());
      if ($stickyVal == '1') {
        $('tr.disablerow').addClass('warning');
        $('tr.disablerow select').attr("disabled", "disabled");
      }
      $($stickyName).change(
        function(){
          if ($(this).is(':checked') && $(this).val() == '1') {
            $('tr.disablerow').addClass('warning');
            $('tr.disablerow button').addClass('disabled');
          } else {
            $('tr.disablerow').removeClass('warning');
            $('tr.disablerow select').removeAttr("disabled");
            $('tr.disablerow button').removeClass('disabled');
          }
        }
      );

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
        minDate: <?php if ($JAK_FORM_DATA["startdate"]) echo "'" . date("Y-m-d H:i", $JAK_FORM_DATA["startdate"]) . "'"; else echo 'moment()'; ?>
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
        minDate: <?php if ($JAK_FORM_DATA["startdate"]) echo "'" . date("Y-m-d H:i", $JAK_FORM_DATA["startdate"]) . "'"; else echo 'moment()'; ?>,
        useCurrent: false //Important! See issue #1075
      });

      $("#datepickerFrom").on("dp.change", function (e) {
        $('#datepickerTo').data("DateTimePicker").minDate(e.date);
      });
      $("#datepickerTo").on("dp.change", function (e) {
        $('#datepickerFrom').data("DateTimePicker").maxDate(e.date);
      });

      /* Other config
       ========================================= */
      /* Bootstrap Tab Activation */
      $('#cmsTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
      });
    });
  </script>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>