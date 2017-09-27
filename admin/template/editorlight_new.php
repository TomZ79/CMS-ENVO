<?php

if ($jkv["adv_editor"]) {

  // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
  echo $Html->addDiv('', 'htmleditorlight');
  // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
  echo $Html->addTextarea('envo_lcontent', '', '', '', array('id' => 'envo_editor_light', 'class' => 'form-control hidden'));

} else {

  // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
  echo $Html->addTextarea('envo_lcontent', '', '40', '', array('id' => 'envoEditor', 'class' => 'envoEditorLight'));

}

?>
