<?php if (!isset($owl_exist)) { ?>

<li class="jakcontent">
	<div class="form-group">
	    <label class="control-label"><?php echo $tlowl["owl"]["p"];?></label>
	<div class="radio"><label><input type="radio" name="jak_showowl" value="1"<?php if ((isset($_REQUEST["jak_showowl"]) && $_REQUEST["jak_showowl"]) == '1' || (isset($JAK_FORM_DATA["showowl"]) && $JAK_FORM_DATA["showowl"] == '1')) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"];?>
	</label></div>
	<div class="radio"><label>
	<input type="radio" name="jak_showowl" value="0"<?php if ((isset($_REQUEST["jak_showowl"]) && $_REQUEST["jak_showowl"] != '1') || (isset($JAK_FORM_DATA["showowl"]) && $JAK_FORM_DATA["showowl"] != '1') || !isset($_REQUEST["jak_showowl"])) { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"];?>
	</label>
	</div>
	</div>
	<div class="actions">
	
		<input type="hidden" name="corder_new[]" class="corder" value="3"> <input type="hidden" name="real_plugin_id[]" value="<?php echo JAK_PLUGIN_OWL;?>">
	
	</div>
</li>

<?php } ?>