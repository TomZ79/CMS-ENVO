<li class="envocontent">
  <div class="form-group">
    <div class="envocontent_header"><?=$tlrf["reg_connect"]["regc"]?></div>
    <label class="control-label"><?=$tlrf["reg_box_content"]["regbc"]?></label>
    <div class="radio radio-success">

      <?php
      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
      echo $Html->addRadio('envo_rfconnect', '1', (isset($_REQUEST["envo_rfconnect"]) && $_REQUEST["envo_rfconnect"] == '1' || $ENVO_FORM_DATA["showregister"] == '1') ? TRUE : FALSE, 'envo_rfconnect1');
      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
      echo $Html->addLabel('envo_rfconnect1', $tl["checkbox"]["chk"]);

      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
      echo $Html->addRadio('envo_rfconnect', '0', (isset($_REQUEST["envo_rfconnect"]) && $_REQUEST["envo_rfconnect"] == '0' || $ENVO_FORM_DATA["showregister"] == '0') ? TRUE : FALSE, 'envo_rfconnect2');
      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
      echo $Html->addLabel('envo_rfconnect2', $tl["checkbox"]["chk1"]);
      ?>

    </div>
  </div>
  <div class="actions">

    <?php
    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
    echo $Html->addInput('hidden', 'corder[]', $pg["orderid"], '', 'corder');
    echo $Html->addInput('hidden', 'real_id[]', $pg["id"]);
    ?>

  </div>
</li>

<?php
// only fire new form when not exist
$rf_exist = TRUE;

?>