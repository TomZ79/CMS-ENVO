<?php

if ($jkv["adv_editor"]) {

    // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
    echo $Html->addDiv('', 'htmleditorlight');
    // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
    echo $Html->addTextarea('jak_lcontent', (isset($JAK_FORM_DATA["content"])) ? jak_edit_safe_userpost (htmlspecialchars ($JAK_FORM_DATA["content"])) : '', '', '', array('id' => 'jak_editor_light', 'class' => 'form-control hidden'));

} else {

  // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
  echo $Html->addTextarea('jak_lcontent', (isset($JAK_FORM_DATA["content"])) ? jak_edit_safe_userpost ($JAK_FORM_DATA["content"]) : '', '40', '', array('id' => 'jakEditor', 'class' => 'jakEditorLight'));

}

?>
