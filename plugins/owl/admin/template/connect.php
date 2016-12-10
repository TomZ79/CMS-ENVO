<li class="jakcontent">
	<div class="form-group">
	    <label class="control-label"><?php echo $tlowl["owl"]["p"];?></label>
	<div class="radio">
	<label>
	<input type="radio" name="jak_showowl" value="1"<?php if (isset($_REQUEST["jak_showowl"]) && $_REQUEST["jak_showowl"] == '1' || $JAK_FORM_DATA["showowl"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"];?>
	</label></div>
	<div class="radio"><label>
	<input type="radio" name="jak_showowl" value="0"<?php if (isset($_REQUEST["jak_showowl"]) && $_REQUEST["jak_showowl"] == '0' || $JAK_FORM_DATA["showowl"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"];?>
	</label>
	</div>
	</div>
	<div class="actions">
	
		<input type="hidden" name="corder[]" class="corder" value="<?php echo $pg["orderid"];?>" /> <input type="hidden" name="real_id[]" value="<?php echo $pg["id"];?>" />
	
	</div>
</li>

<?php 

// only fire new form when not exist
$owl_exist = true;

?>