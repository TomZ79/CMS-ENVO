<?php if ($pg["pluginid"] == ENVO_PLUGIN_DOWNLOAD) { ?>

  <li class="envocontent">
    <div class="envocontent_header"><?= $tld["downl_connect"]["downlc11"] ?></div>
    <div class="form-group">
      <label class="control-label"><?= $tld["downl_connect"]["downlc8"] ?></label>
      <div class="row">
        <div class="col-sm-6">
          <select name="envo_showdlorder" class="form-control selectpicker">

            <?php
            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
            echo $Html -> addOption('ASC', $tl["selection"]["sel13"], (isset($ENVO_FORM_DATA["showdlorder"]) && $ENVO_FORM_DATA["showdlorder"] == "ASC") ? TRUE : FALSE);
            echo $Html -> addOption('DESC', $tl["selection"]["sel14"], (isset($ENVO_FORM_DATA["showdlorder"]) && $ENVO_FORM_DATA["showdlorder"] == "DESC") ? TRUE : FALSE);
            ?>

          </select>
        </div>
        <div class="col-sm-6">
          <select name="envo_showdlmany" class="form-control selectpicker">

            <?php for ($i = 0; $i <= 10; $i++) {

              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
              echo $Html -> addOption($i, $i, ($ENVO_FORM_DATA["showdlmany"] == $i) ? TRUE : FALSE);

            } ?>

          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label"><?= $tld["downl_connect"]["downlc9"] ?></label>
      <select name="envo_showdl[]" multiple="multiple" class="form-control">

        <?php
        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
        $selected = (isset($ENVO_FORM_DATA["showdownload"]) && $ENVO_FORM_DATA["showdownload"] == 0) ? TRUE : FALSE;

        echo $Html -> addOption('0', $tld["downl_connect"]["downlc10"], $selected);
        if (isset($ENVO_GET_DOWNLOAD) && is_array($ENVO_GET_DOWNLOAD)) foreach ($ENVO_GET_DOWNLOAD as $dl) {

          echo $Html -> addOption($dl["id"], $dl["title"], (isset($ENVO_FORM_DATA["showdownload"]) && (in_array($dl["id"], explode(',', $ENVO_FORM_DATA["showdownload"])))) ? TRUE : FALSE);

        }
        ?>

      </select>
    </div>

    <div class="actions">

      <?php
      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
      echo $Html -> addInput('hidden', 'corder[]', $pg["orderid"], '', 'corder');
      echo $Html -> addInput('hidden', 'real_id[]', $pg["id"]);
      ?>

    </div>
  </li>

  <?php
  // only fire new form when not exist
  $dl_exist = 1;
} ?>

