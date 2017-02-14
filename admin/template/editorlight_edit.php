<?php if ($jkv["adv_editor"]) { ?>
	<div id="htmleditorlight"></div>
	<textarea name="jak_lcontent" class="form-control hidden" id="jak_editor_light"><?php echo jak_edit_safe_userpost (htmlspecialchars ($JAK_FORM_DATA["content"])); ?></textarea>
<?php } else { ?>
	<textarea name="jak_lcontent" class="jakEditorLight" id="jakEditor" rows="40"><?php echo jak_edit_safe_userpost ($JAK_FORM_DATA["content"]); ?></textarea>
<?php } ?>
