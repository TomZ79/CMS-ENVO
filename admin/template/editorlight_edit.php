<?php

if ($jkv["adv_editor"]) {

  // Add Html Element -> addSimpleDiv (Arguments: id, value, optional assoc. array)
  echo $htmlE->addSimpleDiv('htmleditorlight', '');
  // Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
  echo $htmlE->addTextArea('jak_lcontent', '', '', jak_edit_safe_userpost(htmlspecialchars($JAK_FORM_DATA["content"])), array('id' => 'jak_editor_light', 'class' => 'form-control hidden'));

} else {

  // Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
  echo $htmlE->addTextArea('jak_lcontent', '40', '', jak_edit_safe_userpost($JAK_FORM_DATA["content"]), array('id' => 'jakEditor', 'class' => 'jakEditorLight'));

}

?>
