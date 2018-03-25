<?php if ($pg["pluginid"] == ENVO_PLUGIN_BLOG) { ?>

  <li class="envocontent">
    <div class="envocontent_header"><?=$tlblog["blog_connect"]["blogc10"]?></div>
    <div class="form-group">
      <label class="control-label"><?=$tlblog["blog_connect"]["blogc"]?></label>
      <div class="row">
        <div class="col-sm-6">
          <select name="envo_showblogorder" class="form-control selectpicker">

            <?php
            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
            echo $Html->addOption('ASC', $tl["selection"]["sel13"], (isset($ENVO_FORM_DATA["showblogorder"]) && $ENVO_FORM_DATA["showblogorder"] == "ASC") ? TRUE : FALSE);
            echo $Html->addOption('DESC', $tl["selection"]["sel14"], (isset($ENVO_FORM_DATA["showblogorder"]) && $ENVO_FORM_DATA["showblogorder"] == "DESC") ? TRUE : FALSE);
            ?>

          </select>
        </div>
        <div class="col-sm-6">
          <select name="envo_showblogmany" class="form-control selectpicker">

            <?php for ($i = 0; $i <= 10; $i++) {

              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
              echo $Html->addOption($i, $i, ($ENVO_FORM_DATA["showblogmany"] == $i) ? TRUE : FALSE);

            } ?>

          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label"><?=$tlblog["blog_connect"]["blogc1"]?></label>
      <select name="envo_showblog[]" multiple="multiple" class="form-control">

        <?php
        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
        $selected = (isset($ENVO_FORM_DATA["showblog"]) && $ENVO_FORM_DATA["showblog"] == 0) ? TRUE : FALSE;

        echo $Html->addOption('0', $tlblog["blog_connect"]["blogc2"], $selected);
        if (isset($ENVO_GET_BLOG) && is_array($ENVO_GET_BLOG)) foreach ($ENVO_GET_BLOG as $fq) {

          echo $Html->addOption($fq["id"], $fq["title"], (isset($ENVO_FORM_DATA["showblog"]) && (in_array($fq["id"], explode(',', $ENVO_FORM_DATA["showblog"])))) ? TRUE : FALSE);

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
  $blog_exist = 1;
} ?>

