<?php if (!isset($blog_exist)) { ?>

  <li class="jakcontent">
    <div class="jakcontent_header"><?php echo $tlblog["blog_connect"]["blogc10"]; ?></div>
    <div class="form-group">
      <label class="control-label"><?php echo $tlblog["blog_connect"]["blogc"]; ?></label>
      <div class="row">
        <div class="col-md-6">
          <select name="jak_showblogorder" class="form-control selectpicker" data-size="5">

            <?php
            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
            echo $Html->addOption('ASC', $tl["selection"]["sel13"], ((isset($_REQUEST["jak_showblogorder"]) && $_REQUEST["jak_showblogorder"] == "ASC") || !isset($_REQUEST["jak_showblogorder"])) ? TRUE : FALSE);
            echo $Html->addOption('DESC', $tl["selection"]["sel14"], (isset($_REQUEST["jak_showblogorder"]) && $_REQUEST["jak_showblogorder"] == "DESC") ? TRUE : FALSE);
            ?>

          </select>
        </div>
        <div class="col-md-6">
          <select name="jak_showblogmany" class="form-control selectpicker" data-size="5">

            <?php for ($i = 0; $i <= 10; $i++) {

              if (isset($_REQUEST["jak_showblogmany"]) && $_REQUEST["jak_showblogmany"] == $i) {
                $selected = TRUE;
              } elseif (!isset($_REQUEST["jak_showblogmany"]) && ($i == 0)) {
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
      <label class="control-label"><?php echo $tlblog["blog_connect"]["blogc1"]; ?></label>
      <select name="jak_showblog[]" multiple="multiple" class="form-control">

        <?php
        // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
        $selected = ((isset($_REQUEST["jak_showblog"]) && ($_REQUEST["jak_showblog"] == '0' || (in_array('0', $_REQUEST["jak_showblog"]))) || !isset($_REQUEST["jak_showblog"]))) ? TRUE : FALSE;

        echo $Html->addOption('0', $tlblog["blog_connect"]["blogc2"], $selected);
        if (isset($JAK_GET_BLOG) && is_array($JAK_GET_BLOG)) foreach ($JAK_GET_BLOG as $bl) {

          if (isset($_REQUEST["jak_showblog"]) && (in_array($bl["id"], $_REQUEST["jak_showblog"]))) {
            if (isset($_REQUEST["jak_showblog"]) && (in_array('0', $_REQUEST["jak_showblog"]))) {
              $selected = FALSE;
            } else {
              $selected = TRUE;
            }
          } else {
            $selected = FALSE;
          }

          echo $Html->addOption($bl["id"], $bl["title"], $selected);

        }
        ?>

      </select>
    </div>
    <div class="actions">

      <?php
      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
      echo $Html->addInput('hidden', 'corder_new[]', '3', '', 'corder');
      echo $Html->addInput('hidden', 'real_plugin_id[]', JAK_PLUGIN_BLOG);
      ?>

    </div>
  </li>

<?php } ?>