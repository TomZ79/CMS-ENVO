<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $tlnl["nletter"]["d"]; ?></h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <table class="table table-striped first-column v-text-center">
      <tr>
        <td><?php echo $tlnl["nletter"]["d3"]; ?></td>
        <td>
          <div class="radio">
            <label class="checkbox-inline">
              <input type="radio" name="jak_newsletter" value="1"<?php if (!$JAK_FORM_DATA) {
                if ($_REQUEST["jak_newsletter"] == '1') { ?> checked="checked"<?php }
              } else {
                if ($JAK_FORM_DATA["newsletter"] == '1') { ?> checked="checked"<?php }
              } ?> /> <?php echo $tl["general"]["g18"]; ?>
            </label>
            <label class="checkbox-inline">
              <input type="radio" name="jak_newsletter" value="0"<?php if (!$JAK_FORM_DATA) {
                if ($_REQUEST["jak_newsletter"] == '0') { ?> checked="checked"<?php }
              } else {
                if ($JAK_FORM_DATA["newsletter"] == '0') { ?> checked="checked"<?php }
              } ?> /> <?php echo $tl["general"]["g19"]; ?>
            </label>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <div class="box-footer">
    <button type="submit" name="save" class="btn btn-primary pull-right">
      <i class="fa fa-save margin-right-5"></i>
      <?php echo $tl["general"]["g20"]; ?>
    </button>
  </div>
</div>