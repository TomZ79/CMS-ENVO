<?php if (!isset($dl_exist)) { ?>

  <li class="jakcontent">
    <div class="jakcontent_header"><?php echo $tld["downl_connect"]["downlc11"]; ?></div>
    <div class="form-group">
      <label class="control-label"><?php echo $tld["downl_connect"]["downlc8"]; ?></label>
      <div class="row">
        <div class="col-md-6">
          <select name="jak_showdlorder" class="form-control selectpicker">

            <?php
            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
            echo $Html->addOption('ASC', $tl["selection"]["sel13"], ((isset($_REQUEST["jak_showdlorder"]) && $_REQUEST["jak_showdlorder"] == "ASC") || !isset($_REQUEST["jak_showdlorder"])) ? TRUE : FALSE);
            echo $Html->addOption('DESC', $tl["selection"]["sel14"], (isset($_REQUEST["jak_showdlorder"]) && $_REQUEST["jak_showdlorder"] == "DESC") ? TRUE : FALSE);
            ?>

          </select>
        </div>
        <div class="col-md-6">
          <select name="jak_showdlmany" class="form-control selectpicker">

            <?php for ($i = 0; $i <= 10; $i++) {

              if (isset($_REQUEST["jak_showdlmany"]) && $_REQUEST["jak_showdlmany"] == $i) {
                $selected = TRUE;
              } elseif (!isset($_REQUEST["jak_showdlmany"]) && ($i == 0)) {
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
      <label class="control-label"><?php echo $tld["downl_connect"]["downlc9"]; ?></label>
      <select name="jak_showdl[]" multiple="multiple" class="form-control">

        <?php
        // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
        $selected = ((isset($_REQUEST["jak_showdl"]) && ($_REQUEST["jak_showdl"] == '0' || (in_array('0', $_REQUEST["jak_showdl"]))) || !isset($_REQUEST["jak_showdl"]))) ? TRUE : FALSE;

        echo $Html->addOption('0', $tld["downl_connect"]["downlc10"], $selected);
        if (isset($JAK_GET_DOWNLOAD) && is_array($JAK_GET_DOWNLOAD)) foreach ($JAK_GET_DOWNLOAD as $dl) {

          if (isset($_REQUEST["jak_showdl"]) && (in_array($dl["id"], $_REQUEST["jak_showdl"]))) {
            if (isset($_REQUEST["jak_showdl"]) && (in_array('0', $_REQUEST["jak_showdl"]))) {
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
      echo $Html->addInput('hidden', 'real_plugin_id[]', JAK_PLUGIN_DOWNLOAD);
      ?>

    </div>
  </li>

<?php } ?>