<?php if ($pg["pluginid"] == JAK_PLUGIN_FAQ) { ?>

  <li class="jakcontent">
    <div class="form-group">
      <label class="control-label"><?php echo $tlf["faq_connect"]["faqc7"]; ?></label>
      <div class="row">
        <div class="col-md-6">
          <select name="jak_showfaqorder" class="form-control selectpicker" data-size="5">

            <?php
            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
            echo $Html->addOption('ASC', $tl["selection"]["sel13"], (isset($JAK_FORM_DATA["showfaqorder"]) && $JAK_FORM_DATA["showfaqorder"] == "ASC") ? TRUE : FALSE);
            echo $Html->addOption('DESC', $tl["selection"]["sel14"], (isset($JAK_FORM_DATA["showfaqorder"]) && $JAK_FORM_DATA["showfaqorder"] == "DESC") ? TRUE : FALSE);
            ?>

          </select>
        </div>
        <div class="col-md-6">
          <select name="jak_showfaqmany" class="form-control selectpicker" data-size="5">

            <?php for ($i = 0; $i <= 10; $i++) {

              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
              echo $Html->addOption($i, $i, ((isset($JAK_FORM_DATA["showfaqmany"]) && $JAK_FORM_DATA["showfaqmany"] == $i)) ? TRUE : FALSE);

            } ?>

          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label"><?php echo $tlf["faq_connect"]["faqc8"]; ?></label>
      <select name="jak_showfaq[]" multiple="multiple" class="form-control">

        <?php
        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
        $selected = (isset($JAK_FORM_DATA["showfaq"]) && $JAK_FORM_DATA["showfaq"] == 0) ? TRUE : FALSE;

        echo $Html->addOption('0', $tlf["faq_connect"]["faqc9"], $selected);
        if (isset($JAK_GET_FAQ) && is_array($JAK_GET_FAQ)) foreach ($JAK_GET_FAQ as $fq) {

          echo $Html->addOption($fq["id"], $fq["title"], (isset($JAK_FORM_DATA["showfaq"]) && (in_array($fq["id"], explode(',', $JAK_FORM_DATA["showfaq"])))) ? TRUE : FALSE);

        }
        ?>

      </select>
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
  $faq_exist = 1;
} ?>
