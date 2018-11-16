<?php if (!isset($wiki_exist)) { ?>

  <li class="envocontent">
    <div class="envocontent_header"><?= $tlw["wiki_connect"]["wikic10"] ?></div>
    <div class="form-group">
      <label class="control-label"><?= $tlw["wiki_connect"]["wikic7"] ?></label>
      <div class="row">
        <div class="col-sm-6">
          <select name="envo_showwikiorder" class="form-control selectpicker">

            <?php
            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
            echo $Html -> addOption('ASC', $tl["selection"]["sel13"], ((isset($_REQUEST["envo_showwikiorder"]) && $_REQUEST["envo_showwikiorder"] == "ASC") || !isset($_REQUEST["envo_showwikiorder"])) ? TRUE : FALSE);
            echo $Html -> addOption('DESC', $tl["selection"]["sel14"], (isset($_REQUEST["envo_showwikiorder"]) && $_REQUEST["envo_showwikiorder"] == "DESC") ? TRUE : FALSE);
            ?>

          </select>
        </div>
        <div class="col-sm-6">
          <select name="envo_showwikimany" class="form-control selectpicker">

            <?php for ($i = 0; $i <= 10; $i++) {

              if (isset($_REQUEST["envo_showwikimany"]) && $_REQUEST["envo_showwikimany"] == $i) {
                $selected = TRUE;
              } elseif (!isset($_REQUEST["envo_showwikimany"]) && ($i == 0)) {
                $selected = TRUE;
              } else {
                $selected = FALSE;
              }

              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
              echo $Html -> addOption($i, $i, $selected);

            } ?>

          </select>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label"><?= $tlw["wiki_connect"]["wikic8"] ?></label>
      <select name="envo_showwiki[]" multiple="multiple" class="form-control">

        <?php
        // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
        $selected = ((isset($_REQUEST["envo_showwiki"]) && ($_REQUEST["envo_showwiki"] == '0' || (in_array('0', $_REQUEST["envo_showwiki"]))) || !isset($_REQUEST["envo_showwiki"]))) ? TRUE : FALSE;

        echo $Html -> addOption('0', $tlw["wiki_connect"]["wikic9"], $selected);
        if (isset($ENVO_GET_DOWNLOAD) && is_array($ENVO_GET_DOWNLOAD)) foreach ($ENVO_GET_DOWNLOAD as $w) {

          if (isset($_REQUEST["envo_showwiki"]) && (in_array($w["id"], $_REQUEST["envo_showwiki"]))) {
            if (isset($_REQUEST["envo_showwiki"]) && (in_array('0', $_REQUEST["envo_showwiki"]))) {
              $selected = FALSE;
            } else {
              $selected = TRUE;
            }
          } else {
            $selected = FALSE;
          }

          echo $Html -> addOption($w["id"], $w["title"], $selected);

        }
        ?>

      </select>
    </div>
    <div class="actions">

      <?php
      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
      echo $Html -> addInput('hidden', 'corder_new[]', '3', '', 'corder');
      echo $Html -> addInput('hidden', 'real_plugin_id[]', ENVO_PLUGIN_WIKI);
      ?>

    </div>
  </li>

<?php } ?>