<?php if (!isset($dl_exist)) { ?>

  <li class="envocontent">
    <div class="envocontent_header"><?=$tld["downl_connect"]["downlc11"]?></div>
    <div class="form-group">
      <label class="control-label"><?=$tld["downl_connect"]["downlc8"]?></label>
      <div class="row">
        <div class="col-sm-6">
          <select name="envo_showdlorder" class="form-control selectpicker">

            <?php
            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
            echo $Html->addOption('ASC', $tl["selection"]["sel13"], ((isset($_REQUEST["envo_showdlorder"]) && $_REQUEST["envo_showdlorder"] == "ASC") || !isset($_REQUEST["envo_showdlorder"])) ? TRUE : FALSE);
            echo $Html->addOption('DESC', $tl["selection"]["sel14"], (isset($_REQUEST["envo_showdlorder"]) && $_REQUEST["envo_showdlorder"] == "DESC") ? TRUE : FALSE);
            ?>

          </select>
        </div>
        <div class="col-sm-6">
          <select name="envo_showdlmany" class="form-control selectpicker">

            <?php for ($i = 0; $i <= 10; $i++) {

              if (isset($_REQUEST["envo_showdlmany"]) && $_REQUEST["envo_showdlmany"] == $i) {
                $selected = TRUE;
              } elseif (!isset($_REQUEST["envo_showdlmany"]) && ($i == 0)) {
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
      <label class="control-label"><?=$tld["downl_connect"]["downlc9"]?></label>
      <select name="envo_showdl[]" multiple="multiple" class="form-control">

        <?php
        // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
        $selected = ((isset($_REQUEST["envo_showdl"]) && ($_REQUEST["envo_showdl"] == '0' || (in_array('0', $_REQUEST["envo_showdl"]))) || !isset($_REQUEST["envo_showdl"]))) ? TRUE : FALSE;

        echo $Html->addOption('0', $tld["downl_connect"]["downlc10"], $selected);
        if (isset($ENVO_GET_DOWNLOAD) && is_array($ENVO_GET_DOWNLOAD)) foreach ($ENVO_GET_DOWNLOAD as $dl) {

          if (isset($_REQUEST["envo_showdl"]) && (in_array($dl["id"], $_REQUEST["envo_showdl"]))) {
            if (isset($_REQUEST["envo_showdl"]) && (in_array('0', $_REQUEST["envo_showdl"]))) {
              $selected = FALSE;
            } else {
              $selected = TRUE;
            }
          } else {
            $selected = FALSE;
          }

          echo $Html->addOption($dl["id"], $dl["title"], $selected);

        }
        ?>

      </select>
    </div>

    <div class="actions">

      <?php
      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
      echo $Html->addInput('hidden', 'corder_new[]', '3', '', 'corder');
      echo $Html->addInput('hidden', 'real_plugin_id[]', ENVO_PLUGIN_DOWNLOAD);
      ?>

    </div>
  </li>

<?php } ?>