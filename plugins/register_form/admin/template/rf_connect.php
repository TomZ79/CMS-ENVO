<li class="jakcontent">
  <div class="form-group">
    <div class="jakcontent_header"><?php echo $tlrf["reg_connect"]["regc"]; ?></div>
    <label class="control-label"><?php echo $tlrf["reg_box_content"]["regbc"]; ?></label>
    <div class="radio radio-success">

      <?php
      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
      echo $Html->addRadio('jak_rfconnect', '1', (isset($_REQUEST["jak_rfconnect"]) && $_REQUEST["jak_rfconnect"] == '1' || $JAK_FORM_DATA["showregister"] == '1') ? TRUE : FALSE, 'jak_rfconnect1');
      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
      echo $Html->addLabel('jak_rfconnect1', $tl["checkbox"]["chk"]);

      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
      echo $Html->addRadio('jak_rfconnect', '0', (isset($_REQUEST["jak_rfconnect"]) && $_REQUEST["jak_rfconnect"] == '0' || $JAK_FORM_DATA["showregister"] == '0') ? TRUE : FALSE, 'jak_rfconnect2');
      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
      echo $Html->addLabel('jak_rfconnect2', $tl["checkbox"]["chk1"]);
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