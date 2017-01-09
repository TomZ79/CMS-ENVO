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

  <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton">
      <button type="submit" name="save" class="btn btn-primary button">
        <i class="fa fa-save margin-right-5"></i>
        <?php echo $tl["button"]["btn1"]; ?> !!
      </button>
    </div>

    <!-- Form Content -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["cf_box_title"]["cfbt"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["cform"]["c2"]; ?></strong></div>
                  <div class="col-md-7">
                    <?php include_once "title_new.php"; ?>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["page"]["p3"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="radio">
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_showtitle" value="1"<?php if (isset($_REQUEST["showtitle"]) && $_REQUEST["showtitle"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
                      </label>
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_showtitle" value="0"<?php if (isset($_REQUEST["showtitle"]) && $_REQUEST["showtitle"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["cform"]["c20"]; ?></strong></div>
                  <div class="col-md-7">
                    <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
                      <input class="form-control" type="text" name="jak_email" value="<?php if (isset($_REQUEST["jak_email"])) echo $_REQUEST["jak_email"]; ?>" placeholder="email@domain.com,email1@domain.com,email2@domain.com"/>
                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5"><strong><?php echo $tl["cform"]["c3"]; ?></strong></div>
                  <div class="col-md-7">
                    <?php include_once "editorlight_new.php"; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right">
              <i class="fa fa-save margin-right-5"></i>
              <?php echo $tl["button"]["btn1"]; ?>
            </button>
          </div>
        </div>
        <div class="box">
          <div class="box-header with-border">
            <i class="fa fa-plus-square"></i>
            <h3 class="box-title"><?php echo $tl["cf_box_title"]["cfbt1"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <ul class="cform_drag">
              <li id="cform_drag">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <?php echo $tl["cform"]["c6"]; ?>
                      <input type="text" class="form-control jakread" readonly="readonly" name="jak_option[]" value=""/>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <?php echo $tl["cform"]["c9"]; ?>
                      <select name="jak_optionmandatory[]" class="form-control selectpicker" data-size="5">
                        <option value="0"><?php echo $tl["checkbox"]["chk1"]; ?></option>
                        <option value="1"><?php echo $tl["checkbox"]["chk"]; ?></option>
                        <option value="2"><?php echo $tl["cform"]["c16"]; ?></option>
                        <option value="3"><?php echo $tl["cform"]["c17"]; ?></option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <?php echo $tl["cform"]["c7"]; ?>
                      <select name="jak_optiontype[]" class="form-control selectpicker" data-size="5">
                        <option value="1"><?php echo $tl["cform"]["c10"]; ?></option>
                        <option value="2"><?php echo $tl["cform"]["c11"]; ?></option>
                        <option value="3"><?php echo $tl["cform"]["c12"]; ?></option>
                        <option value="4"><?php echo $tl["cform"]["c13"]; ?></option>
                        <option value="5"><?php echo $tl["cform"]["c14"]; ?></option>
                        <option value="6"><?php echo $tl["cform"]["c19"]; ?></option>
                        <option value="7"><?php echo $tl["cform"]["c23"]; ?></option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <?php echo $tl["cform"]["c8"]; ?>
                      <input type="text" class="form-control jakread" readonly="readonly" name="jak_options[]" value="female,male"/>
                    </div>
                  </div>
                  <input type="hidden" name="jak_optionsort[]" class="cforder-orig" value=""/>
                </div>
              </li>
            </ul>

            <div class="callout callout-info">
              <i class="fa fa-arrow-up"></i> <?php echo $tl["cform"]["c21"]; ?> <i class="fa fa-arrow-down"></i>
            </div>

            <ul id="cform_sort">
              <li class="jakcform">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <?php echo $tl["cform"]["c6"]; ?>
                      <input type="text" class="form-control" name="jak_option[]" value=""/>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <?php echo $tl["cform"]["c9"]; ?>
                      <select name="jak_optionmandatory[]" class="form-control selectpicker">
                        <option value="0"><?php echo $tl["checkbox"]["chk1"]; ?></option>
                        <option value="1"><?php echo $tl["checkbox"]["chk"]; ?></option>
                        <option value="2"><?php echo $tl["cform"]["c16"]; ?></option>
                        <option value="3"><?php echo $tl["cform"]["c17"]; ?></option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <?php echo $tl["cform"]["c7"]; ?>
                      <select name="jak_optiontype[]" class="form-control selectpicker" data-size="5">
                        <option value="1"><?php echo $tl["cform"]["c10"]; ?></option>
                        <option value="2"><?php echo $tl["cform"]["c11"]; ?></option>
                        <option value="3"><?php echo $tl["cform"]["c12"]; ?></option>
                        <option value="4"><?php echo $tl["cform"]["c13"]; ?></option>
                        <option value="5"><?php echo $tl["cform"]["c14"]; ?></option>
                        <option value="6"><?php echo $tl["cform"]["c19"]; ?></option>
                        <option value="7"><?php echo $tl["cform"]["c23"]; ?></option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <?php echo $tl["cform"]["c8"]; ?>
                      <input type="text" class="form-control" name="jak_options[]" value=""/>
                      <input type="hidden" name="jak_optionsort[]" class="cforder" value=""/>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right">
              <i class="fa fa-save margin-right-5"></i>
              <?php echo $tl["button"]["btn1"]; ?>
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>

<?php include "footer.php"; ?>