<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $tlgal["gallery"]["d"]; ?></h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <table class="table table-striped first-column v-text-center">
      <tr>
        <td><?php echo $tlgal["gallery"]["d1"]; ?></td>
        <td>
          <div class="radio">
            <label class="checkbox-inline">
              <input type="radio" name="jak_gallery" value="1"<?php if ($JAK_FORM_DATA["gallery"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
            </label>
            <label class="checkbox-inline">
              <input type="radio" name="jak_gallery" value="0"<?php if ($JAK_FORM_DATA["gallery"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <td><?php echo $tlgal["gallery"]["d2"]; ?></td>
        <td>
          <div class="radio">
            <label class="checkbox-inline">
              <input type="radio" name="jak_gallerypost" value="1"<?php if ($JAK_FORM_DATA["gallerypost"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
            </label>
            <label class="checkbox-inline">
              <input type="radio" name="jak_gallerypost" value="0"<?php if ($JAK_FORM_DATA["gallerypost"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <td><?php echo $tlgal["gallery"]["d3"]; ?></td>
        <td>
          <div class="radio">
            <label class="checkbox-inline">
              <input type="radio" name="jak_gallerypostapprove" value="0"<?php if ($JAK_FORM_DATA["gallerypostapprove"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
            </label>
            <label class="checkbox-inline">
              <input type="radio" name="jak_gallerypostapprove" value="1"<?php if ($JAK_FORM_DATA["gallerypostapprove"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <td><?php echo $tlgal["gallery"]["d4"]; ?></td>
        <td>
          <div class="radio">
            <label class="checkbox-inline">
              <input type="radio" name="jak_gallerypostdelete" value="1"<?php if ($JAK_FORM_DATA["gallerypostdelete"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
            </label>
            <label class="checkbox-inline">
              <input type="radio" name="jak_gallerypostdelete" value="0"<?php if ($JAK_FORM_DATA["gallerypostdelete"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <td><?php echo $tlgal["gallery"]["d5"]; ?></td>
        <td>
          <div class="radio">
            <label class="checkbox-inline">
              <input type="radio" name="jak_galleryrate" value="1"<?php if ($JAK_FORM_DATA["galleryrate"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
            </label>
            <label class="checkbox-inline">
              <input type="radio" name="jak_galleryrate" value="0"<?php if ($JAK_FORM_DATA["galleryrate"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <td><?php echo $tlgal["gallery"]["d31"]; ?></td>
        <td>
          <div class="radio">
            <label class="checkbox-inline">
              <input type="radio" name="jak_galleryupload" value="1"<?php if ($JAK_FORM_DATA["galleryupload"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
            </label>
            <label class="checkbox-inline">
              <input type="radio" name="jak_galleryupload" value="0"<?php if ($JAK_FORM_DATA["galleryupload"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <td><?php echo $tlgal["gallery"]["d6"]; ?></td>
        <td>
          <div class="radio">
            <label class="checkbox-inline">
              <input type="radio" name="jak_gallerymoderate" value="1"<?php if ($JAK_FORM_DATA["gallerymoderate"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
            </label>
            <label class="checkbox-inline">
              <input type="radio" name="jak_gallerymoderate" value="0"<?php if ($JAK_FORM_DATA["gallerymoderate"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
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