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
        message: '<?php echo $tl["error"]["e37"];?></div>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } else { ?>

<?php if (!isset($jkv["cms_tpl"])) { ?>
    <section class="content">
      <div class="error-page">
        <div class="error-content">
          <h3><i class="fa fa-warning text-warning-800"></i> <?php echo $tl["notetemplate"]["nh"]; ?></h3>
          <h4><?php echo $tl["notetemplate"]["n1"]; ?></h4>
          <p><?php echo $tl["notetemplate"]["n2"]; ?></p>
        </div>
      </div>
    </section>
<?php } else { ?>
  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $tl["general"]["g50"]; ?></h3>
      </div>
      <div class="box-body">
        <table class="table">
          <tr <?php if ($JAK_FILECONTENT) { ?> class="hidden"<?php } ?>>
            <td>
              <label for="jak_file_edit"><?php echo $tl["general"]["g51"]; ?></label>
              <select name="jak_file_edit" id="jak_file_edit" class="form-control selectpicker" data-live-search="true" data-size="5" >
                <?php
                $pathLen = strlen($ROOT_DIR);
                getTemplateFiles($ROOT_DIR, 0, strlen($ROOT_DIR));
                ?>
              </select>
            </td>
          </tr>
          <tr <?php if (!$JAK_FILECONTENT) { ?> class="hidden"<?php } ?>>
            <td><h4>File: <small><strong><?php echo $JAK_FILEURL; ?></strong></small></h4></td>
          </tr>
          <?php if ($JAK_FILECONTENT) { ?>
            <tr>
              <td>
                <label for="jak_filecontent"><?php echo $tl["general"]["g54"]; ?></label>
                <div id="htmleditor"></div>
                <textarea name="jak_filecontent" id="jak_filecontent" class="form-control hidden"><?php echo $JAK_FILECONTENT; ?></textarea>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>

    <div class="form-actions">
      <?php if ($JAK_GET_TEMPLATE_FILES) { ?>
        <?php if ($JAK_FILEURL) { ?>
          <button type="submit" name="reset" class="btn btn-success"><?php echo $tl["general"]["g72"]; ?></button>
        <?php }
        if (!$JAK_FILECONTENT) { ?>
          <button type="submit" name="edit" class="btn btn-primary pull-right"><?php echo $tl["general"]["g77"]; ?></button>
        <?php } else { ?>
          <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
        <?php }
      } ?>
    </div>

    <input type="hidden" name="jak_file" value="<?php echo $JAK_FILEURL; ?>"/>
  </form>

<?php } } if ($JAK_FILECONTENT) { ?>
  <script src="js/ace/ace.js" type="text/javascript"></script>
  <script type="text/javascript">

    /* ACE Editor
     ========================================= */
    var htmlefACE = ace.edit("htmleditor");
    htmlefACE.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
    htmlefACE.session.setUseWrapMode(true);
    htmlefACE.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
    htmlefACE.setOptions({
      // session options
      mode: "ace/mode/<?php echo $acemode;?>",
      tabSize: <?php echo $jkv["acetabSize"]; ?>,
      useSoftTabs: true,
      highlightActiveLine: <?php echo $jkv["aceactiveline"]; ?>,
      // renderer options
      showInvisibles: <?php echo $jkv["aceinvisible"]; ?>,
      showGutter: <?php echo $jkv["acegutter"]; ?>,
    });

    texthtmlef = $("#jak_filecontent").val();
    htmlefACE.session.setValue(texthtmlef);

    /* Submit Form
     ========================================= */
    $('form').submit(function () {
      $("#jak_filecontent").val(htmlefACE.getValue());
    });
  </script>
<?php }

include "footer.php"; ?>