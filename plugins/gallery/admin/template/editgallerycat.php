<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page4 == "s") { ?>
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
<?php } if ($page4 == "e") { ?>
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
    <div class="row">
      <div class="col-md-8">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["title"]["t11"]; ?></h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table class="table table-striped first-column v-text-center">
              <tr>
                <td><?php echo $tl["cat"]["c4"]; ?></td>
                <td>
                  <?php include_once APP_PATH . "admin/template/cat_edit.php"; ?>
                </td>
              </tr>
              <tr>
                <td><?php echo $tl["cat"]["c5"]; ?></td>
                <td>
                  <div class="form-group<?php if ($errors["e2"] || $errors["e3"]) echo " has-error"; ?> no-margin">
                    <input type="text" name="jak_varname" id="jak_varname" class="form-control" value="<?php echo $JAK_FORM_DATA["varname"]; ?>"/>
                  </div>
                </td>
              </tr>
              <tr>
                <td><?php echo $tl["page"]["p5"]; ?></td>
                <td>
                  <?php include_once APP_PATH . "admin/template/editorlight_edit.php"; ?>
                </td>
              </tr>
              <tr>
                <td><?php echo $tlgal["gallery"]["d19"]; ?></td>
                <td>
                  <div class="radio">
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_comment" value="1"<?php if ($JAK_FORM_DATA["comments"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                    </label>
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_comment" value="0"<?php if ($JAK_FORM_DATA["comments"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td><?php echo $tl["general"]["g85"]; ?></td>
                <td>
                  <div class="radio">
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_vote" value="1"<?php if ($JAK_FORM_DATA["showvote"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                    </label>
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_vote" value="0"<?php if ($JAK_FORM_DATA["showvote"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td><?php echo $tl["page"]["p9"]; ?></td>
                <td>
                  <div class="radio">
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_social" value="1"<?php if ($JAK_FORM_DATA["socialbutton"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                    </label>
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_social" value="0"<?php if ($JAK_FORM_DATA["socialbutton"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td><?php echo $tlgal["gallery"]["d32"]; ?></td>
                <td>
                  <div class="radio">
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_uploadc" value="1"<?php if ($JAK_FORM_DATA["uploadc"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                    </label>
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_uploadc" value="0"<?php if ($JAK_FORM_DATA["uploadc"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td><?php echo $tlgal["gallery"]["d21"]; ?></td>
                <td>
                  <div class="radio">
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_active" value="1"<?php if ($JAK_FORM_DATA["active"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                    </label>
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_active" value="0"<?php if ($JAK_FORM_DATA["active"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td><?php echo $tl["general"]["g87"]; ?></td>
                <td>
                  <div class="input-group">
                    <input type="text" name="jak_img" id="jak_img" data-placement="topRight" class="form-control" value="<?php echo $JAK_FORM_DATA["catimg"]; ?>">
                    <span class="input-group-addon"></span>
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
      <div class="col-md-4">
        <?php if (JAK_TAGS) { ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $tl["title"]["t31"]; ?></h3>
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
                    <input type="text" name="jak_tags" class="form-control tags" value="" data-role="tagsinput"/>
                  </td>
                </tr>
                <?php if ($JAK_TAGLIST) { ?>
                  <tr>
                    <td colspan="2">
                      <div class="form-group">
                        <label for="tags"><?php echo $tl["general"]["g27"]; ?></label>
                        <div class="controls">
                          <?php echo $JAK_TAGLIST; ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
            <div class="box-footer">
              <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
            </div>
          </div>
        <?php } ?>
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["general"]["g88"]; ?>
              <a class="cms-help" data-content="<?php echo $tl["help"]["h"]; ?>" href="javascript:void(0)" data-original-title="<?php echo $tl["title"]["t21"]; ?>">
                <i class="fa fa-question-circle"></i>
              </a>
            </h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table class="table">
              <tr>
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
  </form>

  <script src="js/slug.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $("#jak_name").keyup(function () {
        // Checked, copy values
        $("#jak_varname").val(jakSlug($("#jak_name").val()));
      });

      $('#jak_img').iconpicker();
    });
  </script>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>