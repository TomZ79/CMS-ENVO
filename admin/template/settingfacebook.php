<?php include "header.php"; ?>

<?php if ($JAK_FILE_SUCCESS) { ?>
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
if ($JAK_FILE_ERROR) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["error"]["e37"];?>',
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
      <li class="active"><a href="#cmsPage1"><?php echo $tl["general_cmd"]["g14"]; ?></a></li>
      <li><a href="#cmsPage2">Facebook Name</a></li>
      <li><a href="#cmsPage3">Facebook Description</a></li>
    </ul>

    <div class="tab-content">

      <div id="cmsPage1" class="tab-pane active fade in">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["general_cmd"]["g14"]; ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="margin-bottom-20">
              <p><?php echo $tl["setting_cmd"]["s62"]; ?></p>
              <hr>
              <p><?php echo $tl["setting_cmd"]["s63"]; ?></p>
              <ul>
                <li>Plugin Download ( Pro sdílení webu před stažením dokumentu. Více v nastavení pluginu Download )</li>
              </ul>
            </div>
            <table class="table table-striped">
              <tr>
                <td>
                  <textarea name="jak_facebookconnect" cols="60" rows="10" class="form-control txtautogrow"><?php echo $jkv["facebookconnect"]; ?></textarea>
                </td>
              </tr>
            </table>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>
      </div>

      <div id="cmsPage2" class="tab-pane fade">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["general"]["g50"]; ?></h3>
          </div>
          <div class="box-body">
            <table class="table">
              <tr <?php if (!$JAK_FILECONTENT) { ?> class="hidden"<?php } ?>>
                <td><h4>File: <small><strong><?php echo $JAK_FILEURL; ?></strong></small></h4></td>
              </tr>
              <?php if ($JAK_FILECONTENT) { ?>
                <tr>
                  <td>
                    <label for="jak_filecontent"><?php echo $tl["general"]["g54"]; ?></label>
                    <div id="txteditor"></div>
                    <textarea name="jak_filecontent" id="jak_filecontent" class="form-control hidden"><?php echo $JAK_FILECONTENT; ?></textarea>
                  </td>
                </tr>
              <?php } ?>
            </table>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>

        <input type="hidden" name="jak_file" value="<?php echo $JAK_FILEURL; ?>"/>
      </div>

      <div id="cmsPage3" class="tab-pane fade">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["general"]["g50"]; ?></h3>
          </div>
          <div class="box-body">
            <table class="table">
              <tr <?php if (!$JAK_FILECONTENT1) { ?> class="hidden"<?php } ?>>
                <td><h4>File: <small><strong><?php echo $JAK_FILEURL1; ?></strong></small></h4></td>
              </tr>
              <?php if ($JAK_FILECONTENT1) { ?>
                <tr>
                  <td>
                    <label for="jak_filecontent1"><?php echo $tl["general"]["g54"]; ?></label>
                    <div id="txteditor1"></div>
                    <textarea name="jak_filecontent1" id="jak_filecontent1" class="form-control hidden"><?php echo $JAK_FILECONTENT1; ?></textarea>
                  </td>
                </tr>
              <?php } ?>
            </table>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>

        <input type="hidden" name="jak_file1" value="<?php echo $JAK_FILEURL1; ?>"/>
      </div>

    </div>
  </form>

  <script src="js/ace/ace.js" type="text/javascript"></script>
  <script type="text/javascript">

    /* ACE Editor
     ========================================= */
    var txtACE = ace.edit("txteditor");
    txtACE.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
    txtACE.session.setUseWrapMode(true);
    txtACE.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
    txtACE.setOptions({
      // session options
      mode: "ace/mode/<?php echo $acemode;?>",
      tabSize: <?php echo $jkv["acetabSize"]; ?>,
      useSoftTabs: true,
      highlightActiveLine: <?php echo $jkv["aceactiveline"]; ?>,
      // renderer options
      showInvisibles: <?php echo $jkv["aceinvisible"]; ?>,
      showGutter: <?php echo $jkv["acegutter"]; ?>,
    });

    textcontent = $("#jak_filecontent").val();
    txtACE.session.setValue(textcontent);

    var txtACE1 = ace.edit("txteditor1");
    txtACE1.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
    txtACE1.session.setUseWrapMode(true);
    txtACE1.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
    txtACE1.setOptions({
      // session options
      mode: "ace/mode/<?php echo $acemode;?>",
      tabSize: <?php echo $jkv["acetabSize"]; ?>,
      useSoftTabs: true,
      highlightActiveLine: <?php echo $jkv["aceactiveline"]; ?>,
      // renderer options
      showInvisibles: <?php echo $jkv["aceinvisible"]; ?>,
      showGutter: <?php echo $jkv["acegutter"]; ?>,
    });

    textcontent1 = $("#jak_filecontent1").val();
    txtACE1.session.setValue(textcontent1);

    /* Other config
     ========================================= */
    $(document).ready(function () {

      /* Bootstrap Tab Activation */
      $('#cmsTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
      });

    });

    /* Submit Form
     ========================================= */
    $('form').submit(function () {
      $("#jak_filecontent").val(txtACE.getValue());
      $("#jak_filecontent1").val(txtACE1.getValue());
    });
  </script>

<?php include "footer.php"; ?>


