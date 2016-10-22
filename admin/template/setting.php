<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
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
if ($page1 == "e") { ?>
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
          if (isset($errors["e3"])) echo $errors["e3"];
          if (isset($errors["e4"])) echo $errors["e4"];
          if (isset($errors["e5"])) echo $errors["e5"];
          if (isset($errors["e6"])) echo $errors["e6"];
          if (isset($errors["e7"])) echo $errors["e7"];?>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php }
if ($success) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($success["e"])) echo $success["e"];?>',
      }, {
        // settings
        type: 'success',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" class="jak_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

    <ul class="nav nav-tabs" id="settTab">
      <li class="active"><a href="#general"><?php echo $tl["title"]["t4"]; ?></a></li>
      <li><a href="#aceeditor"><?php echo $tl["setting_cmd"]["s50"]; ?></a></li>
      <li><a href="#mailsettings"><?php echo $tl["setting"]["s21"]; ?></a></li>
      <li><a href="#user"><?php echo $tl["title"]["t23"]; ?></a></li>
      <li><a href="#analytics"><?php echo $tl["general"]["g98"]; ?></a></li>
      <?php if (isset($JAK_HOOK_ADMIN_SETTING_EDIT)) { ?>
      <li><a href="#plugins">Plugin settings</a></li>
      <?php } ?>
    </ul>

    <div class="tab-content">
      <div id="general" class="tab-pane active fade in">
        <div class="row">
          <div class="col-md-8">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["title"]["t4"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped v-text-center first-column">
                  <tr>
                    <td><?php echo $tl["setting"]["s"]; ?></td>
                    <td>
                      <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
                        <input type="text" name="jak_email" class="form-control"
                               value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                                 if ($v["varname"] == 'email') {
                                   echo $v["value"];
                                 }
                               } ?>" placeholder="<?php echo $tl["setting"]["s"]; ?>"/>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["setting"]["s27"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_shttp"
                                 value="0"<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                            if ($v["varname"] == 'sitehttps' && $v["value"] == '0') { ?> checked="checked"<?php }
                          } ?> /> <?php echo $tl["setting"]["s28"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_shttp"
                                 value="1"<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                            if ($v["varname"] == 'sitehttps' && $v["value"] == '1') { ?> checked="checked"<?php }
                          } ?> /> <?php echo $tl["setting"]["s29"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["setting"]["s2"]; ?></td>
                    <td>
                      <select name="jak_lang" class="form-control selectpicker" data-size="5">
                        <?php if (isset($acp_lang_files) && is_array($lang_files)) foreach ($lang_files as $lf) { ?>
                          <option value="<?php echo $lf; ?>"<?php if ($jkv["lang"] == $lf) { ?> selected="selected"<?php } ?>><?php echo ucwords($lf); ?></option><?php } ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["setting"]["s17"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_langd" value="1"<?php if ($jkv["langdirection"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["setting"]["s18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_langd" value="0"<?php if ($jkv["langdirection"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["setting"]["s19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["setting"]["s4"]; ?></td>
                    <td>
                      <div class="form-group no-margin<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                        <input type="text" name="jak_date" class="form-control" value="<?php echo $jkv["dateformat"]; ?>"/>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["setting"]["s5"]; ?></td>
                    <td>
                      <div class="form-group no-margin<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                        <input type="text" name="jak_time" class="form-control" value="<?php echo $jkv["timeformat"]; ?>"/>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["setting"]["s31"]; ?></td>
                    <td>
                      <select name="jak_timezone_server" class="form-control selectpicker" data-live-search="true" data-size="5">
                        <?php include_once "timezoneserver.php"; ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["general"]["g138"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_time_ago" value="1"<?php if ($jkv["time_ago_show"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_time_ago" value="0"<?php if ($jkv["time_ago_show"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["menu"]["m21"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_hvm" value="1"<?php if ($jkv["hvm"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_hvm" value="0"<?php if ($jkv["hvm"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
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
          <div class="col-md-4">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["title"]["t6"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped v-text-center">
                  <tr>
                    <td><?php echo $tl["setting"]["s8"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_contact"
                                 value="1"<?php if ($jkv["contactform"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_contact"
                                 value="0"<?php if ($jkv["contactform"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save"
                        class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["title"]["t20"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped v-text-center">
                  <tr>
                    <td><?php echo $tl["general"]["g58"]; ?></td>
                    <td>

                      <select name="jak_shownews" class="form-control selectpicker" data-size="5">
                        <?php for ($i = 0; $i <= 10; $i++) { ?>
                          <option value="<?php echo $i ?>"<?php if ($jkv["shownews"] == $i) { ?> selected="selected"<?php } ?>><?php echo $i; ?></option>
                        <?php } ?>
                      </select>

                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save"
                        class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["title"]["t47"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped">
                  <tr>
                    <td>
                      <div class="form-group no-margin<?php if (isset($errors["e3"])) echo " has-error"; ?>">
                        <input type="text" name="jak_shortmsg" class="form-control"
                               value="<?php echo $jkv["shortmsg"]; ?>"/>
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
                <h3 class="box-title"><?php echo $tl["title"]["t40"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped v-text-center">
                  <tr>
                    <td><?php echo $tl["general"]["g40"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_rss" value="1"<?php if ($jkv["rss"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_rss" value="0"<?php if ($jkv["rss"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["general"]["g41"]; ?></td>
                    <td>
                      <div class="form-group no-margin<?php if (isset($errors["e5"])) echo " has-error"; ?>">
                        <input type="text" name="jak_rssitem" class="form-control" value="<?php echo $jkv["rssitem"]; ?>"/>
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
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["title"]["t29"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table class="table table-striped">
              <tr>
                <td><?php echo $tl["setting"]["s11"]; ?></td>
                <td>
                  <div class="<?php if (isset($errors["e4"])) echo " has-error"; ?>">
                    <select name="jak_mid" class="form-control selectpicker">
                      <option value="2"<?php if ($jkv["adminpagemid"] == 2) { ?> selected="selected"<?php } ?>>
                        Range 1 page
                      </option>
                      <option value="4"<?php if ($jkv["adminpagemid"] == 4) { ?> selected="selected"<?php } ?>>
                        Range 2 page
                      </option>
                      <option value="6"<?php if ($jkv["adminpagemid"] == 6) { ?> selected="selected"<?php } ?>>
                        Range 3 page
                      </option>
                      <option value="8"<?php if ($jkv["adminpagemid"] == 8) { ?> selected="selected"<?php } ?>>
                        Range 4 page
                      </option>
                      <option value="10"<?php if ($jkv["adminpagemid"] == 10) { ?> selected="selected"<?php } ?>>
                        Range 5 page
                      </option>
                    </select>
                  </div>
                </td>
              </tr>
              <tr>
                <td><?php echo $tl["setting"]["s12"]; ?></td>
                <td>
                  <div class="form-group no-margin<?php if (isset($errors["e4"])) echo " has-error"; ?>">
                    <input type="text" name="jak_item" class="form-control" value="<?php echo $jkv["adminpageitem"]; ?>"/>
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

      <div id="aceeditor" class="tab-pane fade">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["title"]["t4"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table class="table table-striped v-text-center first-column">
              <tr>
                <td><?php echo $tl["setting"]["s10"]; ?></td>
                <td>
                  <div class="radio">
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_editor" value="1"<?php if ($jkv["adv_editor"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                    </label>
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_editor" value="0"<?php if ($jkv["adv_editor"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td><?php echo $tl["setting_cmd"]["s51"]; ?></td>
                <td>
                  <select name="jak_acetheme" class="form-control selectpicker" data-live-search="true" data-size="5">
                    <optgroup label="Light">
                      <option value="chrome" <?php if ($jkv["acetheme"] == 'chrome') { ?> selected="selected"<?php } ?>>Chrome</option>
                    </optgroup>
                    <optgroup label="Dark">
                      <option value="cobalt" <?php if ($jkv["acetheme"] == 'cobalt') { ?> selected="selected"<?php } ?>>Cobalt</option>
                      <option value="monokai" <?php if ($jkv["acetheme"] == 'monokai') { ?> selected="selected"<?php } ?>>Monokai</option>
                      <option value="vibrant_ink" <?php if ($jkv["acetheme"] == 'vibrant_ink') { ?> selected="selected"<?php } ?>>Vibrant Ink</option>
                    </optgroup>
                  </select>
                </td>
              </tr>
              <tr>
                <td><?php echo $tl["setting_cmd"]["s52"]; ?></td>
                <td>
                  <div class="form-group no-margin<?php if (isset($errors["e4"])) echo " has-error"; ?>">
                    <input type="text" name="jak_acetabSize" class="form-control" value="<?php echo $jkv["acetabSize"]; ?>"/>
                  </div>
                </td>
              </tr>
              <tr>
                <td><?php echo $tl["setting_cmd"]["s53"]; ?></td>
                <td>
                  <div class="form-group no-margin<?php if (isset($errors["e4"])) echo " has-error"; ?>">
                    <input type="text" name="jak_acewraplimit" class="form-control" value="<?php echo $jkv["acewraplimit"]; ?>"/>
                  </div>
                </td>
              </tr>
              <tr>
                <td><?php echo $tl["setting_cmd"]["s54"]; ?></td>
                <td>
                  <div class="radio">
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_acegutter" value="1"<?php if ($jkv["acegutter"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                    </label>
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_acegutter" value="0"<?php if ($jkv["acegutter"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td><?php echo $tl["setting_cmd"]["s55"]; ?></td>
                <td>
                  <div class="radio">
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_aceactiveline" value="1"<?php if ($jkv["aceactiveline"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                    </label>
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_aceactiveline" value="0"<?php if ($jkv["aceactiveline"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td><?php echo $tl["setting_cmd"]["s56"]; ?></td>
                <td>
                  <div class="radio">
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_aceinvisible" value="1"<?php if ($jkv["aceinvisible"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                    </label>
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_aceinvisible" value="0"<?php if ($jkv["aceinvisible"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
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

      <div id="mailsettings" class="tab-pane fade">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["setting"]["s21"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-striped first-column v-text-center">
                <tr>
                  <td><?php echo $tl["setting"]["s22"]; ?></td>
                  <td>
                    <div class="radio">
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_smpt" value="0"<?php if ($jkv["smtp_or_mail"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["setting"]["s23"]; ?>
                      </label>
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_smpt" value="1"<?php if ($jkv["smtp_or_mail"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["setting"]["s24"]; ?>
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><?php echo $tl["setting"]["s25"]; ?></td>
                  <td><input type="text" class="form-control" name="jak_host" value="<?php echo $jkv["smtp_host"]; ?>"/>
                  </td>
                </tr>
                <tr>
                  <td><?php echo $tl["setting"]["s26"]; ?></td>
                  <td>
                    <div class="form-group">
                      <input type="text" name="jak_port" class="form-control" value="<?php echo $jkv["smtp_port"]; ?>" placeholder="25"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><?php echo $tl["setting"]["s32"]; ?></td>
                  <td>
                    <div class="radio">
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_alive" value="1"<?php if ($jkv["smtp_alive"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                      </label>
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_alive" value="0"<?php if ($jkv["smtp_alive"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><?php echo $tl["setting"]["s33"]; ?></td>
                  <td>
                    <div class="radio">
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_auth" value="1"<?php if ($jkv["smtp_auth"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                      </label>
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_auth" value="0"<?php if ($jkv["smtp_auth"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><?php echo $tl["setting"]["s34"]; ?></td>
                  <td>
                    <input type="text" name="jak_prefix" class="form-control" value="<?php echo $jkv["smtp_prefix"]; ?>" placeholder="ssl/tls/true/false"/>
                  </td>
                </tr>
                <tr>
                  <td><?php echo $tl["setting"]["s39"]; ?></td>
                  <td><input type="text" name="jak_smtpusername" class="form-control" value="<?php echo $jkv["smtp_user"]; ?>"/></td>
                </tr>
                <tr>
                  <td><?php echo $tl["setting"]["s40"]; ?></td>
                  <td><input type="password" name="jak_smtppassword" class="form-control" value="<?php echo $jkv["smtp_password"]; ?>"/></td>
                </tr>
                <tr>
                  <td><?php echo $tl["setting"]["s41"]; ?></td>
                  <td>
                    <button type="submit" name="testMail" class="btn btn-success" id="sendTM">
                      <i id="loader" class="fa fa-spinner fa-pulse"></i> <?php echo $tl["setting"]["s42"]; ?>
                    </button>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>
      </div>

      <div id="user" class="tab-pane fade">
        <div class="row">
          <div class="col-md-5">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["title"]["t23"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped first-column v-text-center">
                  <tr>
                    <td><?php echo $tl["setting"]["s36"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_loginside" value="1"<?php if ($jkv["showloginside"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_loginside" value="0"<?php if ($jkv["showloginside"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["setting"]["s35"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_sprint" value="1"<?php if ($jkv["printme"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_sprint" value="0"<?php if ($jkv["printme"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["setting"]["s1"]; ?></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_smilies" value="1"<?php if ($jkv["usr_smilies"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="jak_smilies" value="0"<?php if ($jkv["usr_smilies"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["setting"]["s14"]; ?></td>
                    <td>
                      <div class="form-group no-margin<?php if (isset($errors["e7"])) echo " has-error"; ?>">
                        <div class="row">
                          <div class="col-md-6">
                            <input type="text" name="jak_avatwidth" class="form-control"
                                   value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                                     if ($v["varname"] == 'useravatwidth') {
                                       echo $v["value"];
                                     }
                                   } ?>" placeholder="<?php echo $tl["setting"]["s15"]; ?>"/>
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="jak_avatheight" class="form-control"
                                   value="<?php if (isset($JAK_SETTING) && is_array($JAK_SETTING)) foreach ($JAK_SETTING as $v) {
                                     if ($v["varname"] == 'useravatheight') {
                                       echo $v["value"];
                                     }
                                   } ?>" placeholder="<?php echo $tl["setting"]["s16"]; ?>"/>
                          </div>
                        </div>
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
          <div class="col-md-7">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $tl["general"]["g97"]; ?></h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped v-text-center">
                  <tr>
                    <td><?php echo $tl["general"]["g95"]; ?></td>
                    <td><textarea name="ip_block" cols="50" rows="5" class="form-control txtautogrow" placeholder="32.12.153.14,127.0.0.1,52.12.54.199,23.21.1.4:255.255.255.0"><?php echo $jkv["ip_block"]; ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["general"]["g96"]; ?></td>
                    <td><textarea name="email_block" cols="50" rows="4" class="form-control txtautogrow" placeholder="one@mail.com,two@mail.com,three@mail.com,@domain.com"><?php echo $jkv["email_block"]; ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td><?php echo $tl["general"]["g137"]; ?></td>
                    <td><textarea name="username_block" cols="50" rows="3" class="form-control txtautogrow" placeholder="admin,demo,administrator"><?php echo $jkv["username_block"]; ?></textarea>
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
      </div>

      <div id="analytics" class="tab-pane fade">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["general"]["g98"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table class="table table-striped">
              <tr>
                <td>
                  <textarea name="jak_analytics" cols="60" rows="5" class="form-control txtautogrow"><?php echo $jkv["analytics"]; ?></textarea>
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
            <h3 class="box-title"><?php echo $tl["general"]["g127"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table class="table table-striped">
              <tr>
                <td>
                  <div class="radio">
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_heatmap" value="1"<?php if ($jkv["heatmap"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                    </label>
                    <label class="checkbox-inline">
                      <input type="radio" name="jak_heatmap" value="0"<?php if ($jkv["heatmap"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                    </label>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <div class="box-footer">
            <a href="index.php?p=setting&amp;sp=trunheat" class="btn btn-warning btn-sm"><?php echo $tl["general"]["g128"]; ?></a>
            <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>
      </div>

      <?php if (isset($JAK_HOOK_ADMIN_SETTING_EDIT) && is_array($JAK_HOOK_ADMIN_SETTING_EDIT)) foreach ($JAK_HOOK_ADMIN_SETTING_EDIT as $hs) { ?>
      <div id="plugins" class="tab-pane fade">
        <?php include_once APP_PATH . $hs['phpcode']; ?>
      </div>
      <?php } ?>
    </div>

  </form>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar1" data-toggle="tab"><strong>1.</strong></a></li>
      <li><a href="#control-sidebar2" data-toggle="tab"><strong>2.</strong></a></li>
      <li><a href="#control-sidebar3" data-toggle="tab"><strong>3.</strong></a></li>
      <li><a href="#control-sidebar4" data-toggle="tab"><strong>4.</strong></a></li>
      <li><a href="#control-sidebar5" data-toggle="tab"><strong>5.</strong></a></li>
      <li><a href="#control-sidebar6" data-toggle="tab"><strong>6.</strong></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Tab 1. -->
      <div class="tab-pane active" id="control-sidebar1">
        <h4>Obecná Nastavení</h4>
        <p>Obecná nastavení pro ACP a webovou síť.</p>
        <hr>

        <h5><strong>Vaše Emailová Adresa</strong></h5>
        <p></p>

        <h5><strong>Server is running on</strong></h5>
        <p></p>

        <h5><strong>Jazyk</strong></h5>
        <p>Výběr jazyka pro ACP</p>

        <h5><strong>Směr Textu</strong></h5>
        <p></p>

        <h5><strong>Formát Datumu</strong></h5>
        <p></p>

        <h5><strong>Formát Času</strong></h5>
        <p></p>

        <h5><strong>Vaše Časová Zóna</strong></h5>
        <p></p>

        <h5><strong>Show time in minutes/hours/days ago</strong></h5>
        <p></p>

        <h5><strong>Captcha</strong></h5>
        <p></p>

        <h5><strong>Zobrazit Formulář</strong></h5>
        <p></p>

        <h5><strong>Choose how many</strong></h5>
        <p></p>

        <h5><strong>Short Message Length</strong></h5>
        <p></p>

        <h5><strong>Aktivovat RSS</strong></h5>
        <p></p>

        <h5><strong>Items</strong></h5>
        <p></p>

        <h5><strong>Page Mid Range</strong></h5>
        <p></p>

        <h5><strong>Items per Page</strong></h5>
        <p></p>

      </div>
      <!-- Tab 2. -->
      <div class="tab-pane" id="control-sidebar2">
        <h4>ACE Editor</h4>
        <p>Nastavení ACE Editoru. Tento editor umožňuje pracovat se zdrojovým html kódem stránek.</p>
        <hr>

        <h5><strong>Aktivovat Rozšířený Editor (ACE editor)</strong></h5>
        <p>Aktivace ACE Editoru.</p>

        <h5><strong>Color Themes</strong></h5>
        <p>Výběr barevného tématu pro ACE Editor.</p>

        <h5><strong>ACE Tab Size</strong></h5>
        <p></p>

        <h5><strong>Set Wrap Limit</strong></h5>
        <p></p>

        <h5><strong>Show Gutter</strong></h5>
        <p></p>

        <h5><strong>Highlight Active Line</strong></h5>
        <p></p>

        <h5><strong>Show Invisible</strong></h5>
        <p></p>
      </div>
      <!-- Tab 3. -->
      <div class="tab-pane" id="control-sidebar3">
        <h4>Nastavení Emailu</h4>
        <hr>

        <h5><strong>Protokol pro Email</strong></h5>
        <p></p>

        <h5><strong>Host</strong></h5>
        <p></p>

        <h5><strong>Port</strong></h5>
        <p></p>

        <h5><strong>Keep SMTP alive?</strong></h5>
        <p></p>

        <h5><strong>SMTP Authentication</strong></h5>
        <p></p>

        <h5><strong>SMTP Server Prefix</strong></h5>
        <p></p>

        <h5><strong>SMTP Username</strong></h5>
        <p></p>

        <h5><strong>SMPT Password</strong></h5>
        <p></p>

        <h5><strong>Test Email Settings</strong></h5>
        <p></p>

      </div>
      <!-- Tab 4. -->
      <div class="tab-pane" id="control-sidebar4">
        <h4>Uživatelské Nastavení</h4>
        <hr>

        <h5><strong>Show Login in Sidebar</strong></h5>
        <p></p>

        <h5><strong>Print Function Active</strong></h5>
        <p></p>

        <h5><strong>Parse Smilies</strong></h5>
        <p></p>

        <h5><strong>Avatar Size</strong></h5>
        <p></p>

        <h5><strong>IP Block List</strong></h5>
        <p></p>

        <h5><strong>Email Block List</strong></h5>
        <p></p>

        <h5><strong>Prohibited Usernames</strong></h5>
        <p></p>

      </div>
      <!-- Tab 5. -->
      <div class="tab-pane" id="control-sidebar5">
        <h4>Analitycké Kódy</h4>
        <hr>

        <h5><strong>XXXX</strong></h5>
        <p></p>

        <h5><strong>Activate Click Heat Map</strong></h5>
        <p></p>

        <h5><strong>Truncate Clicks</strong></h5>
        <p></p>

      </div>
      <!-- Tab 6. -->
      <div class="tab-pane" id="control-sidebar6">
        <h4>Plugin Settings</h4>
        <hr>
        <p></p>

      </div>
    </div>

  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#settTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
      });
      $(".txtautogrow").autoGrow();

      $("#loader").hide();

      <!-- JavaScript to disable send button and show loading.gif image -->
      $("#sendTM").click(function () {
        $("#loader").show();
        $('#sendTM').attr("disabled", "disabled");
        $('.jak_form').submit();
      });

    });
  </script>

<?php include "footer.php"; ?>