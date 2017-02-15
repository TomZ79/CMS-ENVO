<?php

if ($jkv["adv_editor"]) {

	// Add Html Element -> addSimpleDiv (Arguments: id, value, optional assoc. array)
	echo $htmlE->addSimpleDiv('htmleditorlight', '');
	// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
	echo $htmlE->addTextArea('jak_lcontent', '', '', '', array('id' => 'jak_editor_light', 'class' => 'form-control hidden'));

} else {

	// Add Html Element -> Textarea (Arguments: name, rows, cols, value, optional assoc. array)
	echo $htmlE->addTextArea('jak_lcontent', '40', '', '', array('id' => 'jakEditor', 'class' => 'jakEditorLight'));

}

?>
