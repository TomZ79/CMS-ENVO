<?php include "header.php"; ?>

<?php if ($page2 == "s") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["notification"]["n7"]?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php }
if ($page2 == "e" || $page2 == "edn") { ?>
  <script>
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
    echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=newhook', $tl["button"]["btn31"], '', 'btn btn-info button');
    ?>

  </div>

  <div class="btn-toolbar m-b-20">
    <div class="btn-group">

      <button class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#" style="width: 130px;">
        <?=$tl["button"]["btn4"]?>
        <span class="caret"></span>
      </button>
      <div class="dropdown-menu livefilter">
        <div class="search-box">

          <?php
          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
          echo $Html->addInput('text', 'envo_tags', '', 'input-bts-ex-1', 'form-control live-search', array('placeholder' => $tl["placeholder"]["p3"], 'aria-describedby' => 'search-icon1'));
          ?>

        </div>
        <div class="list-to-filter">
          <ul class="list-unstyled overflow">
            <?php if (isset($ENVO_HOOK_LOCATIONS) && is_array($ENVO_HOOK_LOCATIONS)) foreach ($ENVO_HOOK_LOCATIONS as $h) { ?>
              <li class="filter-item" data-filter="<?=$h?>">
                <a href="index.php?p=plugins&amp;sp=hooks&amp;ssp=sorthooks&amp;sssp=<?=$h?>"><?=$h?></a></li>
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

  <form method="post" action="<?=$_SERVER['REQUEST_URI']?>">
    <div class="box box-success">
      <div class="box-body no-padding">
        <div class="table-responsive">
          <table id="hooks_table" class="table table-striped table-hover">
            <thead>
            <tr>
              <th class="no-sort" style="width:5%">#</th>
              <th class="no-sort" style="width:4%">
                <div class="checkbox-singel check-success" style="margin: 0 auto;">

                  <?php
                  // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                  // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                  echo $Html->addCheckbox('', '', FALSE, 'envo_delete_all');
                  echo $Html->addLabel('envo_delete_all', '');
                  ?>

                </div>
              </th>
              <th style="width:40%"><?=$tl["hook_box_table"]["hooktb"]?></th>
              <th style="width:29%"><?=$tl["hook_box_table"]["hooktb1"]?></th>
              <th style="width:10%"><?=$tl["hook_box_table"]["hooktb2"]?></th>
              <th class="text-center no-sort" style="width:4%">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('lock', '<i class="fa fa-lock"></i>', 'button_lock', 'btn btn-default btn-xs');
                ?>

              </th>
              <th class="text-center no-sort" style="width:4%"></th>
              <th class="text-center no-sort" style="width:4%">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete', 'btn btn-danger btn-xs', array('disabled' => 'disabled', 'data-confirm-del' => $tl["hook_notification"]["delall"], 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'left', 'title' => $tl["icons"]["i30"]));
                ?>

              </th>
            </tr>
            </thead>
            <?php if (isset($ENVO_HOOKS) && is_array($ENVO_HOOKS)) foreach ($ENVO_HOOKS as $v) { ?>
              <tr>
                <td><?=$v["id"]?></td>
                <td>
                  <div class="checkbox-singel check-success" style="margin: 0 auto;">

                    <?php
                    // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                    // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                    echo $Html->addCheckbox('envo_delete_hook[]', $v["id"], FALSE, 'envo_delete_hook' . $v["id"], 'highlight');
                    echo $Html->addLabel('envo_delete_hook' . $v["id"], '');
                    ?>

                  </div>
                </td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=edithook&amp;id=' . $v["id"], $v["name"]);
                  ?>

                </td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=sorthooks&amp;sssp=' . $v["hook_name"], $v["hook_name"]);
                  ?>

                </td>
                <td>

                  <?php
                  if ($v["pluginid"] != '0') {
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=sorthooks&amp;id=' . $v["pluginid"], $v["pluginid"]);
                  } else {
                    echo $v["pluginid"];
                  }
                  ?>

                </td>
                <td class="text-center">

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=lock&amp;id=' . $v["id"], '<i class="fa fa-' . (($v["active"] == 0) ? 'lock' : 'check') . '"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => ($v["active"] == '0') ? $tl["icons"]["i5"] : $tl["icons"]["i6"]));
                  ?>

                </td>
                <td class="text-center">

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=edithook&amp;id=' . $v["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
                  ?>

                </td>
                <td class="text-center">

                  <?php
                  if ($v["id"] > 5) {
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=delete&amp;id=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => sprintf($tl["hook_notification"]["del"], $v["name"]), 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
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

  <div class="col-sm-12 m-b-30">
    <div class="icon_legend">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h3', $tl["icons"]["i"]);
      echo $Html->addTag('i', '', 'fa fa-check', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i6"]));
      echo $Html->addTag('i', '', 'fa fa-lock', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i5"]));
      echo $Html->addTag('i', '', 'fa fa-edit', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

<?php include "footer.php"; ?>