<li class="jakcontent">
  <div class="form-group">
    <label class="control-label"><?php echo $tlrf["reg_box_content"]["regbc"]; ?></label>
    <div class="radio">
      <label class="checkbox-inline">
        <input type="radio" name="jak_rfconnect" value="1"<?php if (isset($_REQUEST["jak_rfconnect"]) && $_REQUEST["jak_rfconnect"] == '1' || $JAK_FORM_DATA["showregister"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk"]; ?>
      </label>
      <label class="checkbox-inline">
        <input type="radio" name="jak_rfconnect" value="0"<?php if (isset($_REQUEST["jak_rfconnect"]) && $_REQUEST["jak_rfconnect"] == '0' || $JAK_FORM_DATA["showregister"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["checkbox"]["chk1"]; ?>
      </label>
    </div>
  </div>
  <div class="actions">

    <input type="hidden" name="corder[]" class="corder" value="<?php echo $pg["orderid"]; ?>"/>
    <input type="hidden" name="real_id[]" value="<?php echo $pg["id"]; ?>"/>

  </div>
</li>

<?php

// only fire new form when not exist
$rf_exist = true;

?>