<?php include_once "header.php"; ?>

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
<?php } ?>

  <form method="post" class="jak_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

    <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Nastavení Social Media Sharing Icon</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <table class="table table-striped v-text-center">
                <tr>
                  <td>Facebook</td>
                  <td>
                    <div class="radio">
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_md_facebook" value="1"<?php if ($jkv["md_facebook"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                      </label>
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_md_facebook" value="0"<?php if ($jkv["md_facebook"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Google +</td>
                  <td>
                    <div class="radio">
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_md_googleplus" value="1"<?php if ($jkv["md_googleplus"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                      </label>
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_md_googleplus" value="0"<?php if ($jkv["md_googleplus"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Instagram</td>
                  <td>
                    <div class="radio">
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_md_instagram" value="1"<?php if ($jkv["md_instagram"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                      </label>
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_md_instagram" value="0"<?php if ($jkv["md_instagram"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Twitter</td>
                  <td>
                    <div class="radio">
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_md_twitter" value="1"<?php if ($jkv["md_twitter"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                      </label>
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_md_twitter" value="0"<?php if ($jkv["md_twitter"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Youtube</td>
                  <td>
                    <div class="radio">
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_md_youtube" value="1"<?php if ($jkv["md_youtube"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                      </label>
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_md_youtube" value="0"<?php if ($jkv["md_youtube"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Vimeo</td>
                  <td>
                    <div class="radio">
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_md_vimeo" value="1"<?php if ($jkv["md_vimeo"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                      </label>
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_md_vimeo" value="0"<?php if ($jkv["md_vimeo"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>
                    <div class="radio">
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_md_email" value="1"<?php if ($jkv["md_email"] == 1) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                      </label>
                      <label class="checkbox-inline">
                        <input type="radio" name="jak_md_email" value="0"<?php if ($jkv["md_email"] == 0) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                      </label>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-md-6">
              <table class="table table-striped v-text-center">
                <tr>
                  <td>Space between icons (px)</td>
                  <td>
                    <div class="form-group no-margin">
                      <input type="text" name="jak_mediaSize" class="form-control" value="<?php echo $jkv["md_mediaSize"]; ?>"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Icon size</td>
                  <td>
                    <div class="form-group no-margin">
                      <input type="text" name="jak_iconSize" class="form-control" value="<?php echo $jkv["md_iconSize"]; ?>"/>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Color Themes</td>
                  <td>
                    <select name="jak_mediatheme" class="form-control selectpicker" data-size="5">
                      <option value="lee-gargano-circle-color" <?php if ($jkv["md_mediatheme"] == 'lee-gargano-circle-color') { ?> selected="selected"<?php } ?>>Lee-gargano-circle-color</option>
                      <option value="lee-gargano-square-color" <?php if ($jkv["md_mediatheme"] == 'lee-gargano-square-color') { ?> selected="selected"<?php } ?>>Lee-gargano-square-color</option>
                      <option value="mikymeg-color" <?php if ($jkv["md_mediatheme"] == 'mikymeg-color') { ?> selected="selected"<?php } ?>>Mikymeg-color</option>
                      <option value="mikymeg-grey" <?php if ($jkv["md_mediatheme"] == 'mikymeg-grey') { ?> selected="selected"<?php } ?>>Mikymeg-grey</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Hover Effect</td>
                  <td>
                    <select name="jak_mediahover" class="form-control selectpicker" data-size="5">
                      <option value="fade-out" <?php if ($jkv["md_mediahover"] == 'fade-out') { ?> selected="selected"<?php } ?>>Fade-out</option>
                      <option value="fade-in" <?php if ($jkv["md_mediahover"] == 'fade-in') { ?> selected="selected"<?php } ?>>Fade-in</option>
                      <option value="rise" <?php if ($jkv["md_mediahover"] == 'rise') { ?> selected="selected"<?php } ?>>Rise</option>
                      <option value="rotate" <?php if ($jkv["md_mediahover"] == 'rotate') { ?> selected="selected"<?php } ?>>Rotate</option>
                      <option value="shrink" <?php if ($jkv["md_mediahover"] == 'shrink') { ?> selected="selected"<?php } ?>>Shrink</option>
                      <option value="bounce" <?php if ($jkv["md_mediahover"] == 'bounce') { ?> selected="selected"<?php } ?>>Bounce</option>
                      <option value="grow" <?php if ($jkv["md_mediahover"] == 'grow') { ?> selected="selected"<?php } ?>>Grow</option>
                    </select>
                  </td>
                </tr>
              </table>
              <div style="position: relative;height: 200px;">

                <div id="sollist-sharing" style="position: absolute;display: table-cell;top: 30%;left: 10%;"></div>

                <script type="text/javascript">
                  $(function(){
                    $("#sollist-sharing").sollist({
                      pixelsBetweenItems: <?php echo $jkv["md_mediaSize"] ?>,
                      size: <?php echo $jkv["md_iconSize"] ?>,
                      theme: '<?php echo $jkv["md_mediatheme"] ?>',
                      hoverEffect: '<?php echo $jkv["md_mediahover"] ?>',
                      profiles: {
                        facebook: '',
                        googleplus: '',
                        instagram: '',
                        twitter: '',
                        youtube: '',
                        vimeo: '',
                        email: '',
                      }
                    });
                  });
                </script>
              </div>
            </div>
          </div>

        </div>
        <div class="box-footer">
          <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
        </div>
      </div>
    </div>
  </div>

  </form>

  <script type="text/javascript">

  </script>

<?php include_once "footer.php"; ?>

