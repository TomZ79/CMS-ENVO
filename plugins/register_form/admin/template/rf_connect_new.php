<?php if (!isset($rf_exist)) { ?>

  <li class="jakcontent">
    <div class="form-group">
      <div class="jakcontent_header"><?php echo $tlrf["reg_connect"]["regc"]; ?></div>
      <label class="control-label"><?php echo $tlrf["reg_box_content"]["regbc"]; ?></label>
      <div class="radio radio-success">

        <?php
        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
        echo $Html->addRadio('jak_rfconnect', '1', ((isset($_REQUEST["jak_rfconnect"]) && $_REQUEST["jak_rfconnect"]) == '1' || (isset($JAK_FORM_DATA["showregister"]) && $JAK_FORM_DATA["showregister"] == '1')) ? TRUE : FALSE, 'jak_rfconnect1');
        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
        echo $Html->addLabel('jak_rfconnect1', $tl["checkbox"]["chk"]);

        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
        echo $Html->addRadio('jak_rfconnect', '0', ((isset($_REQUEST["jak_rfconnect"]) && $_REQUEST["jak_rfconnect"] != '1') || (isset($JAK_FORM_DATA["showregister"]) && $JAK_FORM_DATA["showregister"] != '1') || !isset($_REQUEST["jak_rfconnect"])) ? TRUE : FALSE, 'jak_rfconnect2');
        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
        echo $Html->addLabel('jak_rfconnect2', $tl["checkbox"]["chk1"]);
        ?>

      </div>
    </div>
    <div class="actions">

      <?php
      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
      echo $Html->addInput('hidden', 'corder_new[]', '3', '', 'corder');
      echo $Html->addInput('hidden', 'real_plugin_id[]', JAK_PLUGIN_REGISTER_FORM);
      ?>

    </div>
  </li>

<?php } ?>