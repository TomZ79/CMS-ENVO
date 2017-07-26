<?php include "header.php"; ?>

<?php if ($page2 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["notification"]["n7"];?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php }
if ($page2 == "e" || $page2 == "edn") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo($page2 == "e" ? $tl["general_error"]["generror1"] : $tl["hook_error"]["hookerror4"]);?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <!-- Fixed Button for save form -->
  <div class="savebutton-medium hidden-xs">

    <?php
    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
    echo $Html->addAnchor('index.php?p=plugins&sp=newhook', $tl["button"]["btn31"], '', 'btn btn-info button');
    ?>

  </div>

  <div class="btn-toolbar m-b-20">
    <div class="btn-group">

      <button class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#" style="width: 130px;">
        <?php echo $tl["button"]["btn4"]; ?>
        <span class="caret"></span>
      </button>
      <div class="dropdown-menu livefilter">
        <div class="search-box">

          <?php
          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
          echo $Html->addInput('text', 'jak_tags', '', 'input-bts-ex-1', 'form-control live-search', array('placeholder' => $tl["placeholder"]["p3"], 'aria-describedby' => 'search-icon1'));
          ?>

        </div>
        <div class="list-to-filter">
          <ul class="list-unstyled overflow">
            <?php if (isset($JAK_HOOK_LOCATIONS) && is_array($JAK_HOOK_LOCATIONS)) foreach ($JAK_HOOK_LOCATIONS as $h) { ?>
              <li class="filter-item" data-filter="<?php echo $h; ?>">
                <a href="index.php?p=plugins&sp=sorthooks&ssp=<?php echo $h; ?>"><?php echo $h; ?></a></li>
            <?php } ?>
          </ul>
          <div class="no-search-results">

            <?php
            // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
            echo $Html->addDiv($tl["selection"]["sel6"], '', array('class' => 'no-results', 'role' => 'alert'));
            ?>

          </div>
        </div>
      </div>

    </div>
  </div>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box box-success">
      <div class="box-body no-padding">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th>
                <div class="checkbox-singel check-success">

                  <?php
                  // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                  // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                  echo $Html->addCheckbox('', '', FALSE, 'jak_delete_all');
                  echo $Html->addLabel('jak_delete_all', '');
                  ?>

                </div>
              </th>
              <th><?php echo $tl["hook_box_table"]["hooktb"]; ?></th>
              <th><?php echo $tl["hook_box_table"]["hooktb1"]; ?></th>
              <th><?php echo $tl["hook_box_table"]["hooktb2"]; ?></th>
              <th>

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('lock', '<i class="fa fa-lock"></i>', 'button_lock', 'btn btn-default btn-xs');
                ?>

              </th>
              <th></th>
              <th>

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete', 'btn btn-danger btn-xs', array('disabled' => 'disabled', 'data-confirm-del' => $tl["hook_notification"]["delall"]));
                ?>

              </th>
            </tr>
            </thead>
            <?php if (isset($JAK_HOOKS) && is_array($JAK_HOOKS)) foreach ($JAK_HOOKS as $v) { ?>
              <tr>
                <td><?php echo $v["id"]; ?></td>
                <td>
                  <div class="checkbox-singel check-success">

                    <?php
                    // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                    // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                    echo $Html->addCheckbox('jak_delete_hook[]', $v["id"], FALSE, 'jak_delete_hook' . $v["id"], 'highlight');
                    echo $Html->addLabel('jak_delete_hook' . $v["id"], '');
                    ?>

                  </div>
                </td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=edit&amp;sssp=' . $v["id"], $v["name"]);
                  ?>

                </td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=plugins&amp;sp=sorthooks&amp;ssp=' . $v["hook_name"], $v["hook_name"]);
                  ?>

                </td>
                <td>

                  <?php
                  if ($v["pluginid"] != '0') {
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('index.php?p=plugins&amp;sp=sorthooks&amp;ssp=' . $v["pluginid"], $v["pluginid"]);
                  } else {
                    echo $v["pluginid"];
                  }
                  ?>

                </td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=lock&amp;sssp=' . $v["id"], '<i class="fa fa-' . (($v["active"] == 0) ? 'lock' : 'check') . '"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltipEnvo', 'title' => ($v["active"] == '0') ? $tl["icons"]["i5"] : $tl["icons"]["i6"]));
                  ?>

                </td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=edit&amp;sssp=' . $v["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));
                  ?>

                </td>
                <td>

                  <?php
                  if ($v["id"] > 5) {
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=delete&amp;sssp=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => sprintf($tl["hook_notification"]["del"], $v["name"]), 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));
                  }
                  ?>

                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </form>

  <div class="col-md-12 m-b-30">
    <div class="icon_legend">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h3', $tl["icons"]["i"]);
      echo $Html->addTag('i', '', 'fa fa-check', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i6"]));
      echo $Html->addTag('i', '', 'fa fa-lock', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i5"]));
      echo $Html->addTag('i', '', 'fa fa-edit', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

<?php if ($JAK_PAGINATE) {
  echo $JAK_PAGINATE;
} ?>

<?php include "footer.php"; ?>