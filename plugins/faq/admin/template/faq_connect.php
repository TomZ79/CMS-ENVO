<?php if ($pg["pluginid"] == ENVO_PLUGIN_FAQ) { ?>

  <li class="envocontent">
    <div class="envocontent_header"><?php echo $tlf["faq_connect"]["faqc10"]; ?></div>
    <div class="form-group">
      <label class="control-label"><?php echo $tlf["faq_connect"]["faqc7"]; ?></label>
      <div class="row">
        <div class="col-md-6">
          <select name="envo_showfaqorder" class="form-control selectpicker">

            <?php
            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
            echo $Html->addOption('ASC', $tl["selection"]["sel13"], (isset($ENVO_FORM_DATA["showfaqorder"]) && $ENVO_FORM_DATA["showfaqorder"] == "ASC") ? TRUE : FALSE);
            echo $Html->addOption('DESC', $tl["selection"]["sel14"], (isset($ENVO_FORM_DATA["showfaqorder"]) && $ENVO_FORM_DATA["showfaqorder"] == "DESC") ? TRUE : FALSE);
            ?>

          </select>
        </div>
        <div class="col-md-6">
          <select name="envo_showfaqmany" class="form-control selectpicker">

            <?php for ($i = 0; $i <= 10; $i++) {

              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
              echo $Html->addOption($i, $i, ((isset($ENVO_FORM_DATA["showfaqmany"]) && $ENVO_FORM_DATA["showfaqmany"] == $i)) ? TRUE : FALSE);

            } ?>

          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label"><?php echo $tlf["faq_connect"]["faqc8"]; ?></label>
      <select name="envo_showfaq[]" multiple="multiple" class="form-control">

        <?php
        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
        $selected = (isset($ENVO_FORM_DATA["showfaq"]) && $ENVO_FORM_DATA["showfaq"] == 0) ? TRUE : FALSE;

        echo $Html->addOption('0', $tlf["faq_connect"]["faqc9"], $selected);
        if (isset($ENVO_GET_FAQ) && is_array($ENVO_GET_FAQ)) foreach ($ENVO_GET_FAQ as $fq) {

          echo $Html->addOption($fq["id"], $fq["title"], (isset($ENVO_FORM_DATA["showfaq"]) && (in_array($fq["id"], explode(',', $ENVO_FORM_DATA["showfaq"])))) ? TRUE : FALSE);

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
