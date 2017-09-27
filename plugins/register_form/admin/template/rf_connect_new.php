<?php if (!isset($rf_exist)) { ?>

  <li class="envocontent">
    <div class="form-group">
      <div class="envocontent_header"><?php echo $tlrf["reg_connect"]["regc"]; ?></div>
      <label class="control-label"><?php echo $tlrf["reg_box_content"]["regbc"]; ?></label>
      <div class="radio radio-success">

        <?php
        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
        echo $Html->addRadio('envo_rfconnect', '1', ((isset($_REQUEST["envo_rfconnect"]) && $_REQUEST["envo_rfconnect"]) == '1' || (isset($ENVO_FORM_DATA["showregister"]) && $ENVO_FORM_DATA["showregister"] == '1')) ? TRUE : FALSE, 'envo_rfconnect1');
        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
        echo $Html->addLabel('envo_rfconnect1', $tl["checkbox"]["chk"]);

        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
        echo $Html->addRadio('envo_rfconnect', '0', ((isset($_REQUEST["envo_rfconnect"]) && $_REQUEST["envo_rfconnect"] != '1') || (isset($ENVO_FORM_DATA["showregister"]) && $ENVO_FORM_DATA["showregister"] != '1') || !isset($_REQUEST["envo_rfconnect"])) ? TRUE : FALSE, 'envo_rfconnect2');
        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
        echo $Html->addLabel('envo_rfconnect2', $tl["checkbox"]["chk1"]);
        ?>

      </div>
    </div>
    <div class="actions">

      <?php
      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
      echo $Html->addInput('hidden', 'corder_new[]', '3', '', 'corder');
      echo $Html->addInput('hidden', 'real_plugin_id[]', ENVO_PLUGIN_REGISTER_FORM);
      ?>

    </div>
  </li>

<?php } ?>