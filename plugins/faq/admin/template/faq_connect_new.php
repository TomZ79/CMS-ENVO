<?php if (!isset($faq_exist)) { ?>

  <li class="envocontent">
    <div class="envocontent_header"><?php echo $tlf["faq_connect"]["faqc10"]; ?></div>
    <div class="form-group">
      <label class="control-label"><?php echo $tlf["faq_connect"]["faqc7"]; ?></label>
      <div class="row">
        <div class="col-md-6">
          <select name="envo_showfaqorder" class="form-control selectpicker">

            <?php
            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
            echo $Html->addOption('ASC', $tl["selection"]["sel13"], ((isset($_REQUEST["envo_showfaqorder"]) && $_REQUEST["envo_showfaqorder"] == "ASC") || !isset($_REQUEST["envo_showfaqorder"])) ? TRUE : FALSE);
            echo $Html->addOption('DESC', $tl["selection"]["sel14"], (isset($_REQUEST["envo_showfaqorder"]) && $_REQUEST["envo_showfaqorder"] == "DESC") ? TRUE : FALSE);
            ?>

          </select>
        </div>
        <div class="col-md-6">
          <select name="envo_showfaqmany" class="form-control selectpicker">

            <?php for ($i = 0; $i <= 10; $i++) {

              if (isset($_REQUEST["envo_showfaqmany"]) && $_REQUEST["envo_showfaqmany"] == $i) {
                $selected = TRUE;
              } elseif (!isset($_REQUEST["envo_showfaqmany"]) && ($i == 0)) {
                $selected = TRUE;
              } else {
                $selected = FALSE;
              }

              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
              echo $Html->addOption($i, $i, $selected);

            } ?>

          </select>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label"><?php echo $tlf["faq_connect"]["faqc8"]; ?></label>
      <select name="envo_showfaq[]" multiple="multiple" class="form-control">

        <?php
        // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
        $selected = ((isset($_REQUEST["envo_showfaq"]) && ($_REQUEST["envo_showfaq"] == '0' || (in_array('0', $_REQUEST["envo_showfaq"]))) || !isset($_REQUEST["envo_showfaq"]))) ? TRUE : FALSE;

        echo $Html->addOption('0', $tlf["faq_connect"]["faqc9"], $selected);
        if (isset($ENVO_GET_DOWNLOAD) && is_array($ENVO_GET_DOWNLOAD)) foreach ($ENVO_GET_DOWNLOAD as $fq) {

          if (isset($_REQUEST["envo_showfaq"]) && (in_array($fq["id"], $_REQUEST["envo_showfaq"]))) {
            if (isset($_REQUEST["envo_showfaq"]) && (in_array('0', $_REQUEST["envo_showfaq"]))) {
              $selected = FALSE;
            } else {
              $selected = TRUE;
            }
          } else {
            $selected = FALSE;
          }

          echo $Html->addOption($fq["id"], $fq["title"], $selected);

        }
        ?>

      </select>
    </div>
    <div class="actions">

      <?php
      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
      echo $Html->addInput('hidden', 'corder_new[]', '3', '', 'corder');
      echo $Html->addInput('hidden', 'real_plugin_id[]', ENVO_PLUGIN_FAQ);
      ?>

    </div>
  </li>

<?php } ?>